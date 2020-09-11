<?php

namespace App\Helper;

use App\Model\Production;
use Productions;

class ProductionHelper
{

    public static function getProduction()
    {

        return Production::all();
    }

    public static function storeProduction($data)
    {
        $production = Production::updateOrCreate(
            [
                'name' => $data['name'],
                'phone' => $data['phone'],
                'address' => $data['address']
            ]
        );
        return $production;
    }
}
