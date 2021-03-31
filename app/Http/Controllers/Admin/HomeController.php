<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/8
 * Time: 10:40
 */
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;

class HomeController extends Controller {

    public function index($id){
        $userInfo = Admin::query()->where(['admin_id' => $id])->first()-> toArray();
        return view('backend.home',[
            'activeTab' => 'home',
            'userInfo' => $userInfo
        ]);
    }
}