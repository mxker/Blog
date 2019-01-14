<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 分页列表解析器
     * @param $parse
     * @return string
     */
    public function parsePage($parse){
        return json_decode(json_encode($parse),true);
    }

    public function parentCategory()
    {
        return Category::query()->where('cate_pid',0)->latest('cate_order')->get();
    }
}
