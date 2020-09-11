<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $table = 'singers';
    protected $connection = 'mysql';
    // public $fillable = ['name', 'gender', 'phone', 'address'];
    protected $guarded = [];

    public function songs()
    {
        return $this->hasMany('App\Model\Songs');
    }
}
