<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/8
 * Time: 10:40
 */
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function __construct(){
        parent::__construct();
//        $this ->session();
    }

    public function index(){
        return view('backend.home');
    }
}