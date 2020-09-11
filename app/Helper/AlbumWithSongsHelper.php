<?php

namespace App\Helper;

use App\Model\Album;
use App\Model\AlbumWithSongs;
use App\Model\Songs;

class AlbumWithSongsHelper
{

    public static function getAll()
    {
        return AlbumWithSongs::all();
    }

    public static function showById($request){

        $result=Album::where('title', $request)->get();

        $album_id=$result->id;
    dd( $album_id);

        $res=AlbumWithSongs::where('album_id',  $album_id)->get();

        $aws_id=$res->id;

        $song=Songs::where('id', $aws_id)->get();

        return $song;

       
   
    }
}