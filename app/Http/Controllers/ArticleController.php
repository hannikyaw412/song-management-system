<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
   /* public function index()
{

return view ('articles/index') ;
}
*/
public function detail($id)
{
return "Controller - Article Detail - $id";
}


public function index()
{

$data = [
[ "id" => 1, "title" => "First Article" ],
[ "id" => 2, "title" => "Second Article" ],
];
return view('articles.index', [
'articles' => $data
]);

}


}
