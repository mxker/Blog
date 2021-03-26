@extends('layouts.blogLogin')

@section('content')
<div class="container">
    <div class="centered">
        <h3>Sign In</h3>
        <div class="sign-in">
            <form action="{{ url('login') }}" method="post">
                <input type="text" class="name" name="username" placeholder="Username" required="用户名支持手机或邮箱">
                <input type="password" class="password" name="password" placeholder="Password" required="密码为大小写，加数字组合">
                <ul>
                    <li>
                        <input type="checkbox" id="brand1" name="remember" value="">
                        <label for="brand1"><span></span>Remember me</label>
                    </li>
                </ul>
                <input type="submit" value="Sign In">
                <div class="clear"></div>
            </form>
        </div>
    </div>
    <div class="clear"></div>
</div>
@endsection