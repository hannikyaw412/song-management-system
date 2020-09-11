<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Songs extends Model
{
    protected $table = "songs";
    protected $connection = "mysql";
    protected $guarded = [];

    public function singer()
    {
        return $this->belongsTo('App\Model\Singer');
    }

    public function writer()
    {
        return $this->belongsTo('App\Model\Writer');
    }

    public function production()
    {
        return $this->belongsTo('App\Model\Production');
    }

    public function studio()
    {
        return $this->belongsTo('App\Model\Studio');
    }

    public function band()
    {
        return $this->belongsTo('App\Model\Band');
    }
}
