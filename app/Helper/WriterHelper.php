<?php

namespace App\Helper;

use App\Model\Singer;
use App\Model\Writer;

class WriterHelper
{

    public static function getWriter()
    {

        return Writer::all();
    }

    public static function storeWriter($data)
    {
        $singer = Singer::where('name', '$data->name')->get('id');
        //$writer=Writer::where('name','$data->name')->get('id');
        $result = Writer::updateOrCreate(
            [
                'name' => $data['name'],
                'gender' => $data['gender'],
                'phone' => $data['phone'],
                'address' => $data['address']
            ]
        );
        return $result;
       // return $singer;
    }
}
