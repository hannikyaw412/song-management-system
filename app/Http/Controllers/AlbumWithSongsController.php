<?php

namespace App\Http\Controllers;

use App\Helper\AlbumWithSongsHelper;
use Illuminate\Http\Request;

class AlbumWithSongsController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
    }

    public function show()
    {

        $aws = AlbumWithSongsHelper::getAll();

        if ($aws) {
            return response()->json(
                [
                    'data' => $aws
                ],
                200
            );
        }
    }

    // public function index( $data)// enter album_name to get song_name
    // {
    //     dd($data);

    //     $song = AlbumWithSongsHelper::showById($data);

    //     return response()->json(
    //         [
    //             'data' => $song->title
    //         ],
    //         200
    //     );
    // }
}
