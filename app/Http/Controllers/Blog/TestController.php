<?php


namespace App\Http\Controllers\Blog;


use App\Models\Admin;

/**
 * @Description: 测试
 * @Author: mxker
 * @Date: 2021-03-31 16:26
 */
class TestController
{
    /**
     * 压测结果：
     *  1、单接口数据库处理：mysql 处理基本一样
     *  2、AB压测： ab -n 100 -c 10 http://127.0.0.1:8030/ab
     *  2.1  FPM 结果耗时  61.226 seconds
     *      Concurrency Level:      10
            Time taken for tests:   61.226 seconds
            Complete requests:      100
            Failed requests:        0
            Total transferred:      94870 bytes
            HTML transferred:       3300 bytes
            Requests per second:    1.63 [#/sec] (mean)
            Time per request:       6122.634 [ms] (mean)
            Time per request:       612.263 [ms] (mean, across all concurrent requests)
            Transfer rate:          1.51 [Kbytes/sec] received
     *  2.2 Swoole 结果耗时  6.566 seconds
     *      Concurrency Level:      10
            Time taken for tests:   6.566 seconds
            Complete requests:      100
            Failed requests:        0
            Total transferred:      92048 bytes
            HTML transferred:       3300 bytes
            Requests per second:    15.23 [#/sec] (mean)
            Time per request:       656.575 [ms] (mean)
            Time per request:       65.658 [ms] (mean, across all concurrent requests)
            Transfer rate:          13.69 [Kbytes/sec] received
     */
    public function index()
    {
        $start = time();
//        for ($i= 0; $i < 100 ;$i++){
////            Admin::query()->insert([
////                'admin_name' => "admin_".$i,
////                'admin_password' => '123456',
////                'admin_email' => 'email_'.$i
////            ]);
//            Admin::query()->where(['admin_id' => 1])->first();
//        }
        Admin::query()->where(['admin_id' => 1])->first();
        $end = time();
        $time = $end-$start;
        var_dump('执行时间是：'.$time);
    }
}