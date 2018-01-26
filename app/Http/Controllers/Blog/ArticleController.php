<?php

namespace App\Http\Controllers\Blog;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index($id){
        $data = Article::all() -> toArray();

        $articleInfo = Article::find($id);
        $articleViews = $articleInfo -> art_view + 1;
        Article::where('art_id', $id) -> update(['art_view'=>$articleViews]);

        if($articleInfo['art_thumb']){
            $artThumbUrl = Storage::url($articleInfo['art_thumb']);
        }else{
            $artThumbUrl = 'blog/images/article_0'. rand(1,4) .'.jpg';
        }
        $articleInfo['artThumbUrl'] = $artThumbUrl;

        return view('blog.article', compact('data', 'articleInfo'));
    }
}