<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/12
 * Time: 14:07
 */
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Illuminate\Http\Request;

class LoginController extends Controller {

    protected $captcha_id = 'db3de8f0bbb7e83cc74388966f84c94c';
    protected $private_key = 'c2dcfdc04a51c7568c30ab5eec141535';

    public function login(){
        return view('backend.login');
    }

    /**
     * 登录验证
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function checkLogin(Request $request){
        $username = $request -> input('username');
        $password = $request -> input('password');

        // 验证数据
        $this -> validate($request,[
            'username' => 'required|max:30|alpha_num',
            'password' => 'required|between:6,18',
        ]);

        $userInfo = UserModel::check($request, $username, $password);
        if($userInfo){
            return redirect('/backend/home/'.$userInfo->admin_id);
        }else{
            // 使用一次性session做提示
            $request->session()->flash('message', '账号和密码错误');
            return redirect('/backend/login');
        }
    }

    /**
     * 用户退出登录状态
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request){
        $result = $request -> session() -> remove('userInfo');
        if($result){
            return redirect('/backend/login');
        }
    }

    /**
     * 用户注册
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory
     */
    public function register(Request $request){
        if($request -> isMethod('get')){
            return view('backend.register');
        }else{

            // 验证数据
            $this -> validate($request,[
                'username'  => 'required|max:30|alpha_num',
                'email'     => 'required|email',
                'password'  => 'required|between:6,18|confirmed',
                'password_confirmation'  => 'required',
            ]);

            $data = [];
            $data['admin_name']     = $request->input('username');
            $data['admin_password'] = $request->input('password');
            $data['admin_email']    = $request->input('email');
            $data['admin_is_super'] = 0;

            $result = UserModel::insert($data);
            if($result){
                return redirect('/backend/login');
            }else{
                $request->session()->flash('message', '注册失败，请稍后重试');
                return redirect('/backend/register');
            }
        }
    }
}