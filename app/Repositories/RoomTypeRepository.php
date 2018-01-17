<?php

namespace App\Repositories;

use App\Models\RoomType;
use InfyOm\Generator\Common\BaseRepository;

class RoomTypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'roomType',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return RoomType::class;
    }
}
