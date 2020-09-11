<?php

namespace App\Http\Controllers;

use App\Helper\WriterHelper;
use Illuminate\Http\Request;
use App\Model\Writer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class WriterController extends Controller
{
    public function store(Request $request)
    {
        $validators = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string'],
                'phone' => ['required', 'string'],
                'address' => ['required', 'string'],
                'gender' => ['required', 'string'],
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
            'address' => $request->input('address'),
        ];

        // $result = WriterHelper::storeWriter($data);

        // if ($result) {

        //     return redirect()->action('WriterController@show');
        // }
        $writer = WriterHelper::storeWriter($data);

        return response()->json(
            [
                'data' => "Created Successfully"
            ],
            200
        );
    } //Finish create function

    

    public function show()
    {
        $writer = WriterHelper::getWriter();

        if (empty($writer)) {
            return response()->json(
                [
                    'message' => 'writer data not found'
                ],
                404
            );
        }
        return response()->json([
            'data' => $writer
        ], 200);
    }
}
