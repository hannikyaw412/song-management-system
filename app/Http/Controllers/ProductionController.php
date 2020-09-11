<?php

namespace App\Http\Controllers;

use App\Helper\ProductionHelper;
use Illuminate\Http\Request;
use App\Model\Production;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class ProductionController extends Controller
{
    public function store(Request $request)
    {
        $validators = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
            ]
        );
        if ($validators->fails()) {
            return response()->json(
                [
                    'error' => "Please enter all fields"
                ],
                422
            );
        }
        $data = [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
        ];
       // dd($data);

        $result = ProductionHelper::storeProduction($data);

        if ($result) {
            return response()->json(
                [
                    'data' => 'created successfully'
                ],
                200
            );
        }
    }

    public function show()
    {
        $production = ProductionHelper::getProduction();

        if (empty($production)) {
            return response()->json(
                [
                    'data' => 'production data not found'
                ],
                404
            );
        }
        return response()->json(

            [
                'data' => $production
            ],
            200
        );
    }
}
