<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $connection='mysql';
    protected $fillable = ['name', 'course'];
}
