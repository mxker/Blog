<?php

namespace App\Http\Controllers\backend;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{
    /**
     *  全部文章列表
     *  GET|HEAD backend/article
     */
    public function index(){
        $articleList = Article::all();
        return view('backend.article.index')->with('data',$articleList);
    }

    /**
     * 创建分类
     * GET|HEAD backend/article/create
     */
    public function create(){
        $data = Category::all();
        return view('backend.article.add',compact('data'));
    }

    /**
     *  添加文章提交
     *  POST  backend/article
     */
    public function store(){
        $input = Input::except('_token');

        $rule = [
            'art_name' => 'required',
            'art_tag' => 'required',
            'art_content' => 'required',
            'art_editor' => 'required',
        ];
        $message = [
            'art_name.required' => '文章名称不能为空',
            'art_tag.required' => '文章关键词不能为空',
            'art_editor.required' => '文章作者不能为空',
            'art_content.required' => '文章内容不能为空',
        ];
        $validator = Validator::make($input,$rule,$message);
        if($validator->passes()){
            $result = Article::insert($input);
            if($result){
                return redirect('/backend/article');
            }else{
                return back()->with('errors', '添加失败，请稍后重试');
            }
        }else{
            return back()->withErrors($validator);
        }

    }

    /**
     * 文章详情
     * GET|HEAD backend/article/{article}
     */
    public function show($art_id){
        $artInfo = Article::find($art_id);
        dd($artInfo);
    }
}
