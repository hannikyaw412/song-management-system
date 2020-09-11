<?php

namespace App\Helper;

use App\Model\Band;

class BandHelper
{
    public static function getBand()
    {
        return Band::all();
    }

    public static function store($data)
    {

        $result = Band::updateOrCreate(
            [
                'name' => $data['name'],
                'group_count' => $data['group_count'],
                'phone' => $data['phone'],
                'address' => $data['address'],
            ]
        );
        return $result;
    }
}
