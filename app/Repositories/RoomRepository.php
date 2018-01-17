<?php

namespace App\Repositories;

use App\Models\Room;
use InfyOm\Generator\Common\BaseRepository;

class RoomRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'roomName',
        'roomTypeId',
        'max',
        'roomStatus'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Room::class;
    }
}
