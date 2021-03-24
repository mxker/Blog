<?php

namespace App\Http\Controllers\Blog;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request){

        $keywords = $request->input('keywords');
        $cateId = $request->input('cate_id');
        if( !empty($keywords) ){
            $articlePageList = Article::query()
                ->where('art_name','like','%'.$keywords.'%')
                ->where('art_status','=',1)
                ->orderBy('art_time', 'desc')
                ->Paginate(3);

        }elseif (!empty($cateId)){
            $articlePageList = Article::query()
                ->where('cate_id',$cateId)
                ->where('art_status','=',1)
                ->orderBy('art_time', 'desc')
                ->Paginate(3);
        }else{
            $articlePageList = Article::query()
                ->where('art_status','=',1)
                ->orderBy('is_hot','desc')
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

        $hotArticle = Article::query()
            ->where('is_hot',1)
            ->where('art_status','=',1)
            ->orderByRaw('RAND()')
            ->take(3)->get()->toArray();

        $markArticle = Article::query()
            ->where('is_mark',1)
            ->where('art_status','=',1)
            ->orderByRaw('RAND()')
            ->take(3)->get()-> toArray();

        return view('blog.home', compact('hotArticle', 'markArticle', 'articleList'))
            ->with([
                'category' => $this->parentCategory(),
                'page'=> $articlePageList,
                'keywords' => $request->input('keywords'),
                'cate_id' => $request->input('cate_id')
            ]);
    }
}
