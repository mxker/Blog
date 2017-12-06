<?php

namespace App\Http\Controllers\backend;

use App\Models\Article;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
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
     * 创建文章
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
    public function store(Request $request){
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

        if(!empty($input['art_thumb'])){
            $suffix = substr($_FILES['art_thumb']['name'],strripos($_FILES['art_thumb']['name'],'.'));
            $path = $request -> file('art_thumb') -> storeAs('public/article', 'article_'.time().$suffix);
            if($path){
                $input['art_thumb'] = $path;
            }
        }

        $input['art_time'] = strtotime(Carbon::now());

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
     * 编辑文章
     * GET|HEAD backend/category/{category}/edit
     */
    public function edit($art_id){
        $articleInfo = Article::find($art_id) -> toArray();

        $artThumbUrl = Storage::url($articleInfo['art_thumb']);
        $articleInfo['artThumbUrl'] = $artThumbUrl;

        $data = Category::where('cate_pid', 0)->get();
        return view('backend.article.edit',compact('articleInfo', 'data'));
    }

    /**
     *  更新文章
     * PUT|PATCH backend/update/{update}
     */
    public function update($art_id, Request $request){
        $update = Input::except('_method','_token');
        if(!empty($update['art_thumb'])){
            $suffix = substr($_FILES['art_thumb']['name'],strripos($_FILES['art_thumb']['name'],'.'));
            $path = $request -> file('art_thumb') -> storeAs('public/article', 'article_'.time().$suffix);
            if($path){
                $update['art_thumb'] = $path;
            }
        }
        $update['update_time'] = strtotime(Carbon::now());

        $result = Article::where('art_id', $art_id) -> update($update);
        if($result){
            return redirect('/backend/article');
        }else{
            return back()->with('errors', '更新失败，请稍后重试');
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
