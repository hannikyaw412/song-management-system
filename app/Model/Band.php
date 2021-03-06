<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'bands';
    protected $connection = 'mysql';
    protected $guarded = [];

    public function songs()
    {
        return $this->hasMany('App\Model\Songs');
    }
}
