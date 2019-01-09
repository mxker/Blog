<?php

namespace App\Http\Controllers\Blog;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request){

        $keywords = $request->input('keywords');
        if( !empty($keywords) ){
            $articlePageList = Article::query()
                ->where('art_name','like','%'.$keywords.'%')
                ->orderBy('art_time', 'desc')
                ->Paginate(3);
        }else{
            $articlePageList = Article::query()
                ->orderBy('art_time', 'desc')
                ->Paginate(3);
        }

        $articleList = $articlePageList ->items();
        if ($articleList){
            foreach ($articleList as $key => $value){
                if($value['art_thumb']){
                    $artThumbUrl = Storage::url($value['art_thumb']);
                }else{
                    $artThumbUrl = 'blog/images/article_0'. rand(1,9) .'.jpg';
                }
                $articleList[$key]['artThumbUrl'] = $artThumbUrl;
            }
        }

        $hotArticle = Article::query()->where(['is_hot' => 1])->limit(3)->get()->toArray();
        $markArticle = Article::query()->where(['is_mark' => 1])->limit(3)->get()-> toArray();

        return view('blog.home', compact('hotArticle', 'markArticle', 'articleList'))
            ->with('page', $articlePageList);
    }
}
