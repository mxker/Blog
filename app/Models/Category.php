<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'cate_id';
    public $timestamps = false;

    /**
     * 分类
     * @return array
     */
    public function tree()
    {
        $categoryList = $this->orderBy('cate_order', 'asc')->get();
        return $this->_getTree($categoryList,'cate_name','cate_id','cate_pid');
    }

    /**
     * 分类的树形结构
     * @param $data
     * @param $filedName
     * @param $filedId
     * @param $filedPid
     * @param int $pid
     * @return array
     */
    private function _getTree($data,$filedName,$filedId,$filedPid,$pid=0){
        $array = [];
        foreach ($data as $k => $v){
            if($v[$filedPid] == $pid){
                $array[] = $data[$k];
                foreach ($data as $m => $n){
                    if($n[$filedPid] == $v[$filedId]){
                        $data[$m][$filedName] = '├─ '.$data[$m][$filedName];
                        $array[] = $data[$m];
                    }
                }
            }
        }

        return $array;
    }
}
