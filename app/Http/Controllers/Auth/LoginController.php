<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/auth/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('blog.login');
    }

    /**
     * @return string
     */
    public function login()
    {
        $input = Input::except('_token','s');
        $rule = [
            'username' => 'required',
            'password' => 'required'
        ];
        $message = [
            'username.required' => '用户名不能为空',
            'password.required' => '密码不能为空'
        ];
        $validator = Validator::make($input,$rule,$message);
        if($validator->passes()){

            if(true){
                return redirect('/');
            }else{
                return back()->with('errors', '登录失败，请稍后重试');
            }
        }else{
            return back()->withErrors($validator);
        }
    }


    public function admin(){
        $sql = "select * from my_admin";
        $result = DB::select($sql);

        return view('layout.view', ['result' => $result]);
    }

}
