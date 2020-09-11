<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Model\Songs;
use App\Model\Singer;
use App\Model\Writer;
use App\Helper\SongsHelper;
use App\Model\Band;
use App\Model\Production;
use App\Model\Studio;

class SongsController extends Controller
{
    public function store(Request $request)
    {

        $validators = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'singer_name' => 'required',
                'writer_name' => 'required',
                'production_name' => 'required',
                'band_name' => 'required',
                'studio_name' => 'required',
                'album_title' => 'required'
            ]
        );

        if ($validators->fails()) {
            return response()->json(
                [
                    'error' => 'This field is required'
                ],
                422
            );
        }
        $data = [
            'title' => $request->input('title'),
            'singer_name' => $request->input('singer_name'),
            'writer_name' => $request->input('writer_name'),
            'production_name' => $request->input('production_name'),
            'band_name' => $request->input('band_name'),
            'studio_name' => $request->input('studio_name'),
            'album_title' => $request->input('album_title')
        ];

        $song = SongsHelper::storeSongs($data);

        // $songs = SongsHelper::storeSongs($data['title'], $singer->id, $writer->id, $production->id, $band->id, $studio->id);

        if ($song) {
            return response()->json(
                [
                    'data' => 'Created successfully',$song->id,$song->title
                ],
                200
            );
        }
    }

    public function show()
    {
        $song = SongsHelper::show();
        if (empty($song)) {
            return response()->json(
                [
                    'message' => 'singer data not found'
                ],
                404
            );
        }
        return response()->json(
            [
                'data' => $song
            ],
            200
        );
    }
}
