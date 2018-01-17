<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\Room;
use App\Models\RoomType;
use App\Repositories\RoomRepository;
use InfyOm\Generator\Controller\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RoomController extends AppBaseController
{
    /** @var  RoomRepository */
    private $roomRepository;

    public function __construct(RoomRepository $roomRepo)
    {
        $this->roomRepository = $roomRepo;
    }

    /**
     * Display a listing of the Room.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $roomTypesArray[0]='';
        $roomTypesArray=$roomTypesArray+ $this->getRoomType();
        $roomtypeId=$request->get('roomTypeId');
        $roomstatus=$request->get('roomStatus');



       //filtered by room type and room status
        if ($roomtypeId!=0||$roomstatus!='')
        {

            if ($roomtypeId!=0 &&$roomstatus!='')
            {

                $rooms = DB::table('rooms')
                    ->where([
                        ['rooms.roomTypeId','=',$roomtypeId],
                        ['roomStatus','=',$roomstatus],
                        ['rooms.deleted_at', '=', NULL],
                    ])
                    ->leftJoin('room_types', 'rooms.roomTypeId', '=', 'room_types.id')
                    ->select('rooms.*','room_types.*','rooms.id as id')
                    ->orderby('roomName')
                    ->Paginate(10);

            }
            else
            {
                //filtered by room type
                if ($roomtypeId!=0)
                {



                    $rooms = DB::table('rooms')
                        ->where([
                            ['rooms.roomTypeId','=',$roomtypeId],
                            ['rooms.deleted_at', '=', NULL],
                        ])
                        ->leftJoin('room_types', 'rooms.roomTypeId', '=', 'room_types.id')
                        ->select('rooms.*','room_types.*','rooms.id as id')
                        ->orderby('roomName')
                        ->Paginate(10);



                }
                //filtered by room status
                if ($roomstatus!='')
                {

                    $rooms = DB::table('rooms')
                        ->where([
                            ['rooms.roomStatus','=',$roomstatus],
                            ['rooms.deleted_at', '=', NULL],
                        ])
                        ->leftJoin('room_types', 'rooms.roomTypeId', '=', 'room_types.id')
                        ->select('rooms.*','room_types.*','rooms.id as id')
                        ->orderby('roomName')
                        ->Paginate(10);



                }
            }

        }

        else
        {
            //search all


            $rooms = DB::table('rooms')
                ->where([
                    ['rooms.deleted_at', '=', NULL],
                ])
                ->leftJoin('room_types', 'rooms.roomTypeId', '=', 'room_types.id')
                ->select('rooms.*','room_types.*','rooms.id as id')
                ->orderby('roomName')
                ->Paginate(10);

        }

        return view('rooms.index', compact('rooms','roomTypesArray'));

    }

    /**
     * Show the form for creating a new Room.
     *
     * @return Response
     *
     *
     */

    private function getRoomType()
    {

        $roomTypes=RoomType::where('deleted_at',NULL)->get();

        $roomTypesArray=array();
        foreach ($roomTypes as $roomType)
        {

            $roomTypesArray[$roomType->id]=$roomType->roomType;
        }
        return $roomTypesArray;
    }

    private function getSingleRoomType($roomTypeId)
    {
        $roomTypeRecord=DB::table('room_types')->where('deleted_at',NULL)->where('id',$roomTypeId)->first();
        return $roomTypeRecord;
    }

    public function create()
    {

        $roomTypesArray= $this->getRoomType();
        return view('rooms.create')->with('roomTypesArray',$roomTypesArray);
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param CreateRoomRequest $request
     *
     * @return Response
     */
    public function store(CreateRoomRequest $request)
    {
        $input = $request->all();

        $this->roomRepository->create($input);

        Flash::success('Room saved successfully.');

        return redirect(route('rooms.index'));
    }

    /**
     * Display the specified Room.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $room = $this->roomRepository->findWithoutFail($id);


        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }

        $roomType=DB::table('room_types')->where('deleted_at',NULL)->where('id',$room->roomTypeId)->first();
        return view('rooms.show')->with('room', $room)->with('roomType',$roomType->roomType);


    }


    /**
     * Show the form for editing the specified Room.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {




        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }

        $roomTypesArray= $this->getRoomType();

        return view('rooms.edit')->with('room', $room)->with('roomTypesArray',$roomTypesArray);
    }

    /**
     * Update the specified Room in storage.
     *
     * @param  int              $id
     * @param UpdateRoomRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRoomRequest $request)
    {
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }

        $room = $this->roomRepository->update($request->all(), $id);

        Flash::success('Room updated successfully.');

        return redirect(route('rooms.index'));
    }

    /**
     * Remove the specified Room from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $room = $this->roomRepository->findWithoutFail($id);

        if (empty($room)) {
            Flash::error('Room not found');

            return redirect(route('rooms.index'));
        }

        $this->roomRepository->delete($id);

        Flash::success('Room deleted successfully.');

        return redirect(route('rooms.index'));
    }
}
