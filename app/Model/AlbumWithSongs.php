<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AlbumWithSongs extends Model
{
    protected $table='albumWithSongs';
    protected $connection='mysql';
    protected $guarded=[];
}
