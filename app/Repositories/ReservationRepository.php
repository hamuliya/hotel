<?php

namespace App\Repositories;

use App\Models\Reservation;
use InfyOm\Generator\Common\BaseRepository;

class ReservationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'roomId',
        'customerId',
        'Paid',
        'status',
        'startDate',
        'endDate',
        'needCarPark',
        'payWay',
        'sum',
        'bookWay',
        'Commend'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Reservation::class;
    }
}
