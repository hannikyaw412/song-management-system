<?php

namespace App\Http\Controllers;

use App\Helper\BandHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BandController extends Controller
{
    public function store(Request $request)
    {
        $validators = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'group_count' => 'required',
                'phone' => 'required',
                'address' => 'required'
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
            'group_count' => $request->input('group_count'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')
        ];

        $result = BandHelper::store($data);

        if ($result) {

            //return redirect()->action('BandController@show');
            return response()->json(
                [
                    'data'=>'Created successfully'
                ],
                200
            );
        }
    }

    public function show()
    {
        $band=BandHelper::getBand();

        if (empty($band)) {
            return response()->json(
                [
                    'message' => 'singer data not found'
                ],
                404
            );
        }
        return response()->json([
            'data' => $band
        ], 200);
    }
}
