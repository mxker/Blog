<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $categoryList = (new Category()) -> tree();

        return view('backend.category.index',[
            'activeTab' => 'category',
            'data' => $categoryList
        ]);
    }

    public function changeOrder(){
        $input = Input::all();
        $cate = Category::query()->find($input['cate_id']);
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

    public function create(){
        $data = Category::query()->where('cate_pid', 0)->get();

        return view('backend.category.add',[
            'activeTab' => 'category',
            'data' => $data
        ]);
    }

    public function store(){
        $input = Input::except('_token');
        $rule = [
            'cate_name' => 'required',
            'cate_title' => 'required',
        ];
        $message = [
            'cate_name.required' => '分类名称不能为空',
            'cate_title.required' => '分类标题不能为空',
        ];
        $validator = Validator::make($input,$rule,$message);
        if($validator->passes()){
            $result = Category::query()->insert($input);
            if($result){
                return redirect('/backend/category');
            }else{
                return back()->with('errors', '添加失败，请稍后重试');
            }
        }else{
            return back()->withErrors($validator);
        }

    }


    public function edit($cate_id){
        $cateInfo = Category::query()->find($cate_id);
        $parentCategory = Category::query()->where('cate_pid', 0)->get();

        return view('backend.category.edit',[
            'activeTab' => 'category.edit',
            'cateInfo' => $cateInfo,
            'parentCategory' => $parentCategory
        ]);
    }

    public function update($cate_id){
        $update = Input::except('_method','_token');
        $result = Category::query()->where('cate_id', $cate_id) -> update($update);
        if($result){
            return redirect('/backend/category');
        }else{
            return back()->with('errors', '更新失败，请稍后重试');
        }
    }

    public function destroy($cate_id){
        $result = Category::query()->where('cate_id', $cate_id)->delete();
        Category::query()->where('cate_pid', $cate_id)->update(['cate_pid' => 0]);
        $data = [];
        if($result){
            $data['status'] = 1;
            $data['msg'] = '分类删除成功';
        }else{
            $data['status'] = 0;
            $data['msg'] = '分类删除失败，请稍后再试';
        }

        return $data;
    }

    /**
     * 单个分类
     * GET|HEAD backend/category/{category}
     */
    public function show(){

    }
}
