<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27
 * Time: 16:09
 */

namespace App\Http\Controllers\Demo;

use App\Models\UserModel;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;


class DemoController extends Controller
{
    public function index(){
        return 'hello laravel';
    }

    /**
     * 接受带参数的路由控制器
     * @param $id
     */
    public function show($id){

    }

    /**
     * url redirect重定向 （跳转路由优先设置）
     */
    public function demo(){
//        return redirect('login/index');
//        return redirect('http://www.baidu.com');
//        return redirect()->action('DemoController@index');

        // 传递参数
//        return redirect()->action(
//            'LoginController@index',
//            ['id' => 1]
//        );

        // 门面类
        return Redirect::to('/index');
    }

    /**
     *  用于接口返回json数据
     *  response（）以函数方式存在
     */
    public function json(){
        $data = [];
        $data['name'] = '';
        return response()->json($data);
    }

    /**
     * response()用于下载
     */
    public function download(){
        return response()->download('文件绝对路径');
    }

    /**
     * request 类使用
     */
    public function request(Request $request){
        $request -> method(); // 获取当前http请求的方法
        $request -> isMethod('get'); // 判断当前的请求方式是否正确
        $request -> url(); // 获取当前的url地址

        $request -> all();// 获取所有数据
        $request -> input('input'); // 获取表单中具体参数
        $request -> except('_token'); // 去除表单中不需要的数据
    }

    /**
     * 视图文件
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(){
        return view('layout.view', ['name' => '呵呵哒']);
    }

    /**
     * 模板继承
     */
    public function template(){
        $sql = 'select * from my_admin';
        $result = DB::select($sql);

        $h = '<h1>带标签的字符串输出</h1>';
        return view('templates.child',['welcome' => '呵呵哒', 'result' => $result, 'h' => $h]);
    }

    /**
     * 模型使用
     */
    public function model(){
        $result = UserModel::all();
        $result = UserModel::get() -> toArray();

        // 一条对象
        $result = UserModel::where('admin_name','admin-copy') -> first();
        $res = $result -> toArray();

        // 指定字段值
        $result = UserModel::where('admin_name','admin-copy') -> value('admin_name');

        $result = UserModel::where('admin_name','admin-copy') -> select('admin_id','admin_name') -> get() -> toArray();
        dd($result);
    }

    /**
     * 自带分页
     */
    public function page(){
        // 基本分页
        $page = UserModel::simplePaginate(2);
        // 模板输出(两个感叹号表示原样输出) {!!$page -> render()!!}

        // 带页码分页
        $page = UserModel::Paginate(3);
        $page = DB::table('pages') -> Paginate(3);

        return view('demo',['page' => $page]);
    }

}