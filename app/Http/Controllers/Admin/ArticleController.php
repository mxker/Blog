<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Services\ArticleService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Scalar\String_;

class ArticleController extends Controller
{
    public $articleService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index(){
        $paginate = $this->articleService->page();
        return view('backend.article.index',[
            'activeTab' => 'article',
            'data' => $this->parsePage($paginate->items()),
            'page' => $paginate
        ]);
    }

    public function create(){
        $data = Category::all();
        return view('backend.article.add',[
            'activeTab' => 'article.add',
            'data' => $data
        ]);
    }

    public function store(Request $request){
        $input = Input::except('_token','s');

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
            $input['is_hot'] = (isset($input['is_hot']) && $input['is_hot'] == 'on') ? 1 : 0;
            $input['is_mark'] = (isset($input['is_mark']) && $input['is_mark'] == 'on') ? 1 : 0;
            $result = $this->articleService->save($input);
            if($result){
                return redirect('/backend/article');
            }else{
                return back()->with('errors', '添加失败，请稍后重试');
            }
        }else{
            return back()->withErrors($validator);
        }

    }

    public function edit($artId){

//        $articleInfo = Article::query()->find($artId) -> toArray();
        $articleInfo = $this->articleService->detail($artId);

        $artThumbUrl = Storage::url($articleInfo['art_thumb']);
        $articleInfo['artThumbUrl'] = $artThumbUrl;

        $category = Category::query()->where('cate_pid', 0)->get();

        return view('backend.article.edit',[
            'activeTab' => 'article',
            'articleInfo' => $articleInfo,
            'category' => $category
        ]);
    }

    public function update($artId, Request $request){
        $update = Input::except('_method','_token','s');
        if(!empty($update['art_thumb'])){
            $suffix = substr($_FILES['art_thumb']['name'],strripos($_FILES['art_thumb']['name'],'.'));
            $path = $request -> file('art_thumb') -> storeAs('public/article', 'article_'.time().$suffix);
            if($path){
                $update['art_thumb'] = $path;
            }
        }
        $update['update_time'] = strtotime(Carbon::now());

        if( isset($update['is_hot']) ){
            $update['is_hot'] = 1;
        }
        if( isset($update['is_mark']) ){
            $update['is_mark'] = 1;
        }
        $result = $this->articleService->update($artId,$update);
        if($result){
            return redirect('/backend/article');
        }else{
            return back()->with('errors', '更新失败，请稍后重试');
        }
    }

    public function show($artId){
        $artInfo = Article::find($artId);
        dd($artInfo);
    }

    public function destroy($artId)
    {
        $artInfo = Article::find($artId);
        if ($artInfo){
            $result = $this->articleService->del($artId);
            return $result ? 1 : 0;
        }else{
            return back()->with('errors', 'Article does not exist');
        }
    }
}
