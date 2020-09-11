<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $table = 'writers';
    protected $connection = 'mysql';
    protected $fillable = ['name', 'gender', 'phone', 'address'];
    //protected $guarded = []; //when use updateOrCreate

    public function songs()
    {
        return $this->hasMany('App\Model\Songs');
    }
}
