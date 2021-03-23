<?php


namespace App\Services;


use App\Models\Article;
use App\Models\ArticleContent;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

/**
 * @Description: 文章服务类
 * @Author: mxker
 * @Date: 2021-03-22 16:32
 */
class ArticleService
{

    private $articleContentModel;
    
    public function __construct()
    {
        $this->articleContentModel = new  ArticleContent();
    }

    public function save($params)
    {
        try {
            DB::beginTransaction();
            $result = Article::create($params);
            $this->articleContentModel->create([
                'article_id' => $result->art_id,
                'content'    => $params['art_content']
            ]);
            DB::commit();
            return true;
        }catch (\Exception $e){
            DB::rollBack();
            return false;
        }
    }

    public function del($artId)
    {
        return Article::query()->where('art_id', $artId) -> update(['art_status' => 0]);
    }

    public function update($artId, $update)
    {
        try {
            DB::beginTransaction();
            ArticleContent::query()->where('article_id',$artId)->update(['content'=>$update['art_content']]);
            unset($update['art_content']);
            Article::query()->where('art_id', $artId) -> update($update);
            DB::commit();
            return true;
        }catch (Exception $e){
            DB::rollBack();
            return false;
        }
    }

    public function page()
    {
        return Article::query()->where(['art_status'=>1])->latest()->paginate(10);
    }

    public function detail($id)
    {
        return Article::query()
            ->leftJoin('article_content','article.art_id','=','article_content.article_id')
            ->where(['article.art_status'=>1])->find($id);
    }

    public function updateView($id,$update){
        return  Article::query()->where('art_id', $id) -> update($update);
    }
}