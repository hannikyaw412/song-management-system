<?php

namespace App\Http\Controllers;

use App\Helper\AlbumHelper;
use App\Model\Album;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Validator;

class AlbumController extends Controller
{
    public function store(Request $request)
    {
        $validators = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'type' => 'required',
                'production_date' => 'required'


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
            'title'=>$request->input('title'),
            'type'=>$request->input('type'),
            'production_date'=>$request->input('production_date')
        ];
        //dd($data);

        $result=AlbumHelper::store($data);

        if($result){
            return response()->json(
                [
                    'data'=>'created successfully'
                ],
                200
            );
        }
    }

    public function show(){

        $album = AlbumHelper::getStudio();

        if (empty($album)) {

            return response()->json(
                [
                    "message" => "Studio data not found"
                ],
                404
            );
        }
        return response()->json(
            [
                "data" => $album
            ],
            200
        );

    }

}

