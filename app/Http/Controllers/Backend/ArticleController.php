<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function articleList(){

        return view('backend.article_list');
    }

    public function add(){

        return view('backend.article_add');
    }
}
