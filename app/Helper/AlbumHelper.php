<?php

namespace App\Helper;

use App\Model\Album;

class AlbumHelper
{

    public static function getStudio()
    {
        return Album::all();
    }

    public static function store($data)
    {

        $album = Album::updateOrCreate(
            [
                'title' => $data['title'],
                'type' => $data['type'],
                'production_date' => $data['production_date']
            ]
        );
        return $album;
    }
}
