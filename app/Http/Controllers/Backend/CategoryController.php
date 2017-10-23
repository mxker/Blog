<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    /**
     *  全部分类列表
     *  GET|HEAD backend/category
     */
    public function index(){
        $categoryList = (new Category()) -> tree();
        return view('backend.category.index')->with('data', $categoryList);
    }

    public function changeOrder(){
        $input = Input::all();
        $cate = Category::find($input['cate_id']);
        $cate->cate_order = $input['cate_order'];
        $result = $cate->update();
        $data = [];
        if($result){
            $data['status'] = 1;
            $data['msg'] = '分类排序变更成功';
        }else{
            $data['status'] = 0;
            $data['msg'] = '分类排序变更失败，请稍后再试';
        }

        return $data;
    }

    /**
     * 创建分类
     * GET|HEAD backend/category/create
     */
    public function create(Request $request){
        return view('backend.category.create');
    }

    /**
     * 删除分类
     * DELETE backend/category/{category}
     */
    public function destroy(){

    }

    /**
     * 更新分类
     * PUT|PATCH backend/category/{category}
     */
    public function update(){

    }

    /**
     * 单个分类
     * GET|HEAD backend/category/{category}
     */
    public function show(){

    }

    /**
     * 编辑分类
     * GET|HEAD backend/category/{category}/edit
     */
    public function edit(){

    }

    public function store(){

    }
}
