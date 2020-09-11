<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Iso\Isop;
use Illuminate\Http\Request;
use App\Model\Singer;
use App\Helper\SingerHelper;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class SingerController extends Controller
{
    public function store(Request $request)
    {

        $validators = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'gender' => 'required'
            ]
        );

        if ($validators->fails()) {
            return response()->json(
                [
                    'error' => 'Please enter all fields'
                ],
                422
            );
        }

        $data = [
            'name' => $request->input('name'),
            'gender' => $request->input('gender'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
        ];

        $result = SingerHelper::storeSinger($data);

        if ($result) {

            return response()->json(
                [
                    'data' => 'Created successfully'
                ],
                200
            );
        }
    }

    public function show()
    {
        $singer = SingerHelper::getSinger();

        if (empty($singer)) {
            return response()->json(
                [
                    'message' => 'singer data not found'
                ],
                404
            );
        }
        return response()->json([
            'data' => $singer
        ], 200);
    }


    public function showIndex(Request $request, $id)
    {
        $singer = SingerHelper::getSinger_id($id);

        if (empty($singer)) {
            return response()->json(
                [
                    'message' => 'singer data not found'
                ],
                404
            );
        }
        return response()->json([
            'data' => $singer
        ], 200);
    }
}


 //  Log::debug("COME HERE". print_r(json_encode($request->all()),true));

        //  return response()->json([
        //     'data' => "Hello"
        // ], 200);


//$name = $request->input('name', '');
        //$data = $request->all();
        // $data['id'] = $id;
        // $result = 400;

        //$result = SingerHelper::
        //??
        // ? 
        //pagination total() // Helper, Controller 
        //first -> object // (Model)
        //get -> !empty  Helper, Controller //array 
