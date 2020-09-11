<?php

namespace App\Helper;

use App\Model\Singer;

class SingerHelper
{
    public static function getSinger()
    {
        return Singer::all();
        // $singers = Singer::all();
    }

    public static function storeSinger($data)
    {
        $result = Singer::updateOrCreate(
            [
                'name' => $data['name'],
                'gender' => $data['gender'],
                'phone' => $data['phone'],
                'address' => $data['address'],
            ]
        );

        return $result;
    }


    public static function getSinger_id($id)
    {
        return Singer::where('id', '>', $id)->get();
    }
}
