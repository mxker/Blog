@extends('layouts.blogLogin')

@section('content')
<div class="container">
    <div class="right">
        <h3>Sign In Form</h3>
        <div class="sign-in">
            <form action="#" method="post">
                <input type="text" class="name" name="username" placeholder="Username" required="">
                <input type="password" class="password" name="password" placeholder="Password" required="">
                <ul>
                    <li>
                        <input type="checkbox" id="brand1" value="">
                        <label for="brand1"><span></span>Remember me</label>
                    </li>
                </ul>
                <input type="submit" value="Sign In">
                <div class="clear"></div>
            </form>
        </div>
        <h3>Recover Form</h3>
        <div class="recover">
            <form action="#" method="post">
                <input type="text" class="email" name="email" placeholder="Email" required="">
                <input type="text" class="number" name="phone number" placeholder="Phone Number" required="">
                <input type="submit" class="send" value="Send">
                <input type="submit" class="done" value="Done">
            </form>
        </div>
        <h3>Subscribe Form</h3>
        <div class="subscribe">
            <form action="#" method="post">
                <input type="text" class="email" name="email" placeholder="Email" required="">
                <input type="submit" value="Subscribe">
                <input type="submit" class="no-thanks" value="No,Thanks">
            </form>
        </div>
        <h3>Follow Us</h3>
        <div class="socialicons w3">
            <ul>
                <li><a class="facebook" href="#"></a></li>
                <li><a class="twitter" href="#"></a></li>
                <li><a class="google" href="#"></a></li>
                <li><a class="pinterest" href="#"></a></li>
                <li><a class="linkedin" href="#"></a></li>
            </ul>
        </div>
    </div>
    <div class="clear"></div>
</div>
@endsection