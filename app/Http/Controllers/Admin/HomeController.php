<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/7
 * Time: 14:28
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class HomeController extends Controller {

    /**
     * 后台首页
     */
    public function index(){

        return view('admin-copy.home');
    }


    public function create(Request $request){
        // 判断get 是否 post
        if($request -> isMethod('get')){
            return view('');
        }else{

            // 过滤数据
            $data = $request -> except('_token');

            UserModel::create($data);
            return redirect('/admin-copy');// 跳转路径
        }
    }

    public function getList(){
        $tree = UserModel::get() -> toArray();
        return view('list',['tree_list' => $tree]);
    }

}