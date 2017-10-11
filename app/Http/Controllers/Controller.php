<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function session(Request $request){
        $session = $request ->session()-> get('loginInfo');
        file_put_contents('F:/demo.txt',var_export($session,true),FILE_APPEND);
        if($session){
            return redirect('/backend/home');
        }else{
            return redirect('/backend/login');
        }
    }
}
