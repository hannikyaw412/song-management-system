<?php

namespace App\Http\Controllers;

use App\Helper\StudioHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudioController extends Controller
{
    public function store(Request $request)
    {
        $validators = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required'


            ]
        );
        if($validators->fails()){
            return response()->json(
                [
                    'error'=>'Please enter all fields'
                ],
                422
            );
        }
        $data=[
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
         ];

        $studio=StudioHelper::store($data);

        if($studio){
            return response()->json(
                [
                    'data'=>'created successfully'
                ],
                200
            );
        }
    }

    public function show()
    {

        $studio = StudioHelper::getStudio();

        if (empty($studio)) {

            return response()->json(
                [
                    "message" => "Studio data not found"
                ],
                404
            );
        }
        return response()->json(
            [
                "data" => $studio
            ],
            200
        );
    }
}
