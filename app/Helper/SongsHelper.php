<?php

namespace App\Helper;

use App\Model\Album;
use App\Model\AlbumWithSongs;
use App\Model\Songs;
use App\Model\Singer;
use App\Model\Production;
use App\Model\Studio;
use App\Model\Writer;
use App\Model\Band;

class SongsHelper
{
    public static function storeSongs($data)

    {

        $singer = Singer::where('name', $data['singer_name'])->first();
        $writer = Writer::where('name', $data['writer_name'])->first();
        $production = Production::where('name', $data['production_name'])->first();
        $band = Band::where('name', $data['band_name'])->first();
        $studio = Studio::where('name', $data['studio_name'])->first();
        $album = Album::where('title', $data['album_title'])->first();

        $song = Songs::firstOrCreate(
            [
                'title' => $data['title'],
                'singer_id' => $singer->id,
                'writer_id' => $writer->id,
                'production_id' => $production->id,
                'band_id' => $band->id,
                'studio_id' => $studio->id,

            ]
        );
        return $song;

        $album = AlbumWithSongs::firstOrCreate(
            [
                'album_id' => $album->id,
                'song_id' => $song->id
            ]
        );

        return $album;
    }

    public static function show()
    {
        return Songs::all();
    }
}
