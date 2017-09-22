@extends('templates.master')

{{--复写父模板的内容--}}
@section('top')
    {{--再次继承父模板的内容--}}
    @parent
    这是child top
@endsection

{{$welcome}}

转义标签    {{$h}}
非转义标签    {{!! $h !!}}

@if(count($result) !== 0)
    @foreach($result as $value)
        序号： {{$value->admin_id}}
        姓名： {{$value->admin_name}}
        密码： {{$value->admin_password}}
    @endforeach
@elseif(count($result) === 2)
    elseif中给出的数据
@else
    if语句的结束
@endif