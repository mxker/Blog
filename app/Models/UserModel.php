<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/5
 * Time: 11:21
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserModel extends Model {

    protected $table = 'admin';

    public $timestamps = false;

    /**
     * 用户名和密码验证
     * @param Request $request (值传递)
     * @param $username
     * @param $password
     * @return bool
     */
    public static function check($request,$username, $password){
        $userInfo = UserModel::query()->where(['admin_name' => $username]) -> first();
        if($userInfo){
            if($password == decrypt($userInfo->admin_password)){
                $request -> session()-> put('userInfo',[
                    'isLogin' => 1,
                    'userName' => $userInfo->admin_name,
                ]);

                $isLogin = DB::table('sessions') -> where(['user_id' => $userInfo->admin_id]) -> first();
                if($isLogin){
                    DB::table('sessions') -> where('id',$isLogin->id)->update(['token' => 222]);
                }else{
                    DB::table('sessions') -> insert([
                        'user_id'    => $userInfo->admin_id,
                        'ip_address' => '192.168.1.90',
                        'token'      => 'string',
                        'login_time' => time(),
                    ]);
                }

                return $userInfo;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * 数据插入返回ID
     * @param $data
     * @return mixed
     */
    public static function insert($data){
        $id = UserModel::query()->insertGetId([
            'admin_name'        => $data['admin_name'],
            'admin_password'    => encrypt($data['admin_password']),
            'admin_email'       => $data['admin_email'],
            'admin_login_time'  => time(),
            'admin_is_super'    => $data['admin_is_super'],
        ]);

        return $id;
    }

    /**
     * 分类树状结构
     * @return array
     */
    public static function tree(){
        $cate = self::query()->get() -> toArray();
        $tree = self::sortOut($cate);

        return $tree;
    }

    /**
     * 递归函数
     * @param $cate
     * @param int $pid
     * @param int $level
     * @param string $html
     * @return array
     */
    public static function sortOut($cate, $pid = 0, $level = 0, $html = '--'){
        $tree = [];
        foreach ($cate as $v){
            if($v['pid'] == $pid){
                $v['level'] = $level;
                $v['html'] = str_repeat($html, $level);
                $tree[] = $v;
                $tree = array_merge($tree, self::sortOut($cate, $v['id'], $level + 1, $html));
            }
        }

        return $tree;
    }
}