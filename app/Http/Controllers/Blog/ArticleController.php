<?php

namespace App\Http\Controllers\Blog;

use App\Models\Article;
use App\Services\ArticleService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    private $articleService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function index($id){
        $data = Article::all()->toArray();
        $articleInfo = $this->articleService->detail($id);
        $this->articleService->update($id,['art_view'=>$articleInfo -> art_view + 1]);
        if($articleInfo['art_thumb']){
            $artThumbUrl = Storage::url($articleInfo['art_thumb']);
        }else{
            $artThumbUrl = 'blog/images/article_0'. rand(1,9) .'.jpg';
        }
        $articleInfo['artThumbUrl'] = $artThumbUrl;

        return view('blog.article', compact('data', 'articleInfo'))
            ->with([
                'category' => $this->parentCategory()
            ]);
    }
}
