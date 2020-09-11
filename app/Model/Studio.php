<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    protected $table = "studios";
    protected $connection = "mysql";
    protected $guarded=[];

    public function songs()
    {
        return $this->hasMany('App\Model\Songs');
    }
}
