<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Models\Customer;
use App\Models\Reservation;
use App\Models\Room;
use App\Repositories\ReservationRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use InfyOm\Generator\Controller\AppBaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Laracasts\Flash\Flash;


class ReservationController extends AppBaseController
{
    /** @var  ReservationRepository */
    private $reservationRepository;

    public function __construct(ReservationRepository $reservationRepo)
    {
        $this->reservationRepository = $reservationRepo;


    }


    private function getRoomsName()
    {

        $roomsName = Room::where('deleted_at', NULL)->orderby('roomName')->get();

        $roomsNameArray = array();
        foreach ($roomsName as $room) {
            $roomsNameArray[$room->id] = $room->roomName;
        }
        return $roomsNameArray;
    }


    private function getCustomersName()
    {

        $customersName = Customer::where('deleted_at', NULL)->orderby('firstName', 'lastName')->get();
        $customersNameArray = array();
        foreach ($customersName as $customer) {
            $customersNameArray[$customer->id] = $customer->firstName . ' ' . $customer->lastName;
        }
        return $customersNameArray;
    }


    /**
     * Display a listing of the Reservation.
     *
     * @param Request $request
     * @return Response
     */


    public function index(Request $request)
    {


        $startDate = Carbon::today();
        $startDay = $startDate->day;
        $startMonth = $startDate->month;
        $startYear = $startDate->year;


        $endDate = Carbon::today()->addDays(1);
        $endDay = $endDate->day;
        $endMonth = $endDate->month;
        $endYear = $endDate->year;


        $firstName = $request->get('firstName');
        $lastName = $request->get('lastName');
        if ($request->get('startDate') != null) {
            $startDate = $request->get('startDate');

        }

        if ($request->get('endDate') != null) {
            $endDate = $request->get('endDate');

        }


        if ($firstName != "" || $lastName != "") {

            if ($firstName != "" && $lastName != "") {

                $reservations = DB::table('reservations')
                    ->where([
                        ['reservations.deleted_at', '=', NULL],
                    ])
                    ->leftJoin('rooms', 'reservations.roomId', '=', 'rooms.id')
                    ->leftJoin('customers', 'reservations.customerId', '=', 'customers.Id')
                    ->select('reservations.*', 'rooms.roomName', 'customers.firstName as firstName', 'customers.lastName as lastName', 'reservations.id as id')
                    ->where([['startDate', '>=', $startDate],
                        ['startDate', '<=', $endDate],
                        ['rooms.deleted_at', '=', NULL],
                        ['firstName', 'like', $firstName . '%'],
                        ['lastName', 'like', $lastName . '%']
                    ])
                    ->orderby('startDate')
                    ->Paginate(10);

            } else {

                if ($firstName != "") {

                    $reservations = DB::table('reservations')
                        ->where([
                            ['reservations.deleted_at', '=', NULL],
                        ])
                        ->leftJoin('rooms', 'reservations.roomId', '=', 'rooms.id')
                        ->leftJoin('customers', 'reservations.customerId', '=', 'customers.Id')
                        ->select('reservations.*', 'rooms.roomName', 'customers.firstName as firstName', 'customers.lastName as lastName', 'reservations.id as id')
                        ->where([['startDate', '>=', $startDate],
                            ['startDate', '<=', $endDate],
                            ['rooms.deleted_at', '=', NULL],
                            ['firstName', 'like', $firstName . '%'],
                        ])
                        ->orderby('startDate')
                        ->Paginate(10);

                }
                if ($lastName != "") {

                    $reservations = DB::table('reservations')
                        ->where([
                            ['reservations.deleted_at', '=', NULL],
                        ])
                        ->leftJoin('rooms', 'reservations.roomId', '=', 'rooms.id')
                        ->leftJoin('customers', 'reservations.customerId', '=', 'customers.Id')
                        ->select('reservations.*', 'rooms.roomName', 'customers.firstName as firstName', 'customers.lastName as lastName', 'reservations.id as id')
                        ->where([['startDate', '>=', $startDate],
                            ['startDate', '<=', $endDate],
                            ['rooms.deleted_at', '=', NULL],
                            ['lastName', 'like', $lastName . '%']
                        ])
                        ->orderby('startDate')
                        ->Paginate(10);
                }


            }


        } else {


            $reservations = DB::table('reservations')
                ->where([
                    ['reservations.deleted_at', '=', NULL],
                ])
                ->leftJoin('rooms', 'reservations.roomId', '=', 'rooms.id')
                ->leftJoin('customers', 'reservations.customerId', '=', 'customers.Id')
                ->select('reservations.*', 'rooms.roomName', 'customers.firstName as firstName', 'customers.lastName as lastName', 'reservations.id as id')
                ->where([['startDate', '>=', $startDate],
                    ['startDate', '<=', $endDate],
                    ['rooms.deleted_at', '=', NULL]
                ])
                ->orderby('startDate')
                ->Paginate(10);


        }
        return view('reservations.index', compact('reservations', 'startDay', 'startMonth', 'startYear', 'endDay', 'endMonth', 'endYear'));

    }

    /**
     * Show the form for creating a new Reservation.
     *
     * @return Response
     */
    public function create()
    {
        $roomsNameArray = $this->getRoomsName();
        $customersNameArray = $this->getCustomersName();

        $startDate = Carbon::today();
        $startDay = $startDate->day;
        $startMonth = $startDate->month;
        $startYear = $startDate->year;

        $endDate = Carbon::today()->addDays(1);
        $endDay = $endDate->day;
        $endMonth = $endDate->month;
        $endYear = $endDate->year;

        return view('reservations.create', compact('roomsNameArray', 'customersNameArray', 'startDay', 'startMonth', 'startYear', 'endDay', 'endMonth', 'endYear'));
    }

    /**
     * Store a newly created Reservation in storage.
     *
     * @param CreateReservationRequest $request
     *
     * @return Response
     */
    public function store(CreateReservationRequest $request)
    {
        $input = $request->all();


        $this->reservationRepository->create($input);


        Flash::success('Reservation saved successfully.');

        return redirect(route('reservations.index'));
    }

    /**
     * Display the specified Reservation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $reservation = $this->reservationRepository->findWithoutFail($id);

        if (empty($reservation)) {
            Flash::error('Reservation not found');

            return redirect(route('reservations.index'));
        }

        return view('reservations.show')->with('reservation', $reservation);
    }

    /**
     * Show the form for editing the specified Reservation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $roomsNameArray = $this->getRoomsName();
        $customersNameArray = $this->getCustomersName();
        $reservation = $this->reservationRepository->findWithoutFail($id);

        if (empty($reservation)) {
            Flash::error('Reservation not found');

            return redirect(route('reservations.index'));
        }


        $startDate = Carbon::parse($reservation->startDate);
        $startDay = $startDate->day;
        $startMonth = $startDate->month;
        $startYear = $startDate->year;

        $endDate = Carbon::parse($reservation->endDate);
        $endDay = $endDate->day;
        $endMonth = $endDate->month;
        $endYear = $endDate->year;


        return view('reservations.edit', compact('reservation', 'roomsNameArray', 'customersNameArray', 'startDay', 'startMonth', 'startYear', 'endDay', 'endMonth', 'endYear'));
    }

    /**
     * Update the specified Reservation in storage.
     *
     * @param  int $id
     * @param UpdateReservationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReservationRequest $request)
    {
        $reservation = $this->reservationRepository->findWithoutFail($id);

        if (empty($reservation)) {
            Flash::error('Reservation not found');

            return redirect(route('reservations.index'));
        }

        $this->reservationRepository->update($request->all(), $id);


        Flash::success('Reservation updated successfully.');

        return redirect(route('reservations.index'));
    }

    /**
     * Remove the specified Reservation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $reservation = $this->reservationRepository->findWithoutFail($id);

        if (empty($reservation)) {
            Flash::error('Reservation not found');

            return redirect(route('reservations.index'));
        }

        $this->reservationRepository->delete($id);

        Flash::success('Reservation deleted successfully.');

        return redirect(route('reservations.index'));
    }
}
