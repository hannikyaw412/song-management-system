<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    protected $table='productions';
    protected $connection='mysql';
    protected $guarded=[];

    public function songs()
    {
        return $this->hasMany('App\Model\Songs');
    }
}
