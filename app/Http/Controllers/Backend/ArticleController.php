<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function articleList(){

        return view('backend.article_list');
    }


    public function add(Request $request){
        file_put_contents('F:/demo.txt',var_export($request,true),FILE_APPEND);
        if($request -> isMethod('post')){

            // 验证数据
//            $this -> validate($request,[
//                'article_name' => 'required|max:30',
//                'art_description' => 'required|max:100',
//            ]);
        }

        return view('backend.article_add');
    }

}
