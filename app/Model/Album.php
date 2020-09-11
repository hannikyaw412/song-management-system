<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';
    protected $connection = 'mysql';
    protected $guarded = [];

    public function songs()
    {
        return $this->hasMany('App\Model\Songs');
    }
}
