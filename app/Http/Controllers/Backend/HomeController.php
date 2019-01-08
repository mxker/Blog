<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/8
 * Time: 10:40
 */
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\UserModel;

class HomeController extends Controller {

    public function index($id){
        $userInfo = UserModel::query()->where(['admin_id' => $id])->first()-> toArray();
        return view('backend.home',[
            'activeTab' => 'home',
            'userInfo' => $userInfo
        ]);
    }
}