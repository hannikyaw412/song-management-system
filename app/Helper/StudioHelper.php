<?php

namespace App\Helper;

use App\Model\Album;
use App\Model\Studio;

class StudioHelper
{

    public static function getStudio()
    {
        return Studio::all();
    }

    public static function store($data)
    {

        $studio= Studio::updateOrCreate(
            [
                'name' => $data['name'],
                'phone' => $data['phone'],
                'address' => $data['address']
            ]
        );
        return $studio;
    }
}
