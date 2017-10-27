@extends('layout.base')

@section('content')
    <div class="col-md-12" style="padding-top: 20px;">
        <section class="panel">
            <header class="panel-heading "><div class="external-event label label-success ui-draggable" style="position: relative;">文章列表</div></header>
            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-striped responsive" data-sortable="" data-sortable-initialized="true">
                        <thead>
                        <tr>
                            <th style="width: 100px;">文章ID</th>
                            <th style="width: 350px;">文章名称</th>
                            <th style="width: 250px;">关键词</th>
                            <th style="width: 100px;">作者</th>
                            <th>文章描述</th>
                            <th style="width: 50px;">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $v)
                            <tr>
                                <td style="align-content: center;">{{$v['art_id']}}</td>
                                <td>{{$v['art_name']}}</td>
                                <td>{{$v['art_tag']}}</td>
                                <td>{{$v['art_editor']}}</td>
                                <td>{{$v['art_desc']}}</td>
                                <td>
                                    <a href="{{url('backend/article/'.$v["art_id"]).'/edit'}}">编辑</a>
                                    <a href="javascript:;" onclick="delart({{ $v['art_id'] }})">删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <script>
        // 删除分类
        function delart(art_id) {
            layer.confirm('您确定要删除嘛？', {
                btn: ['确定','再考虑一下'] //按钮
            }, function(){
                $.post("{{url('backend/article/')}}/"+art_id, {'_token':'{{ csrf_token() }}','_method':'delete', 'art_id':art_id},
                        function (data) {
                            if(data.status = 1){
                                location.reload();
                                layer.alert(data.msg, {icon: 6});
                            }else {
                                layer.alert(data.msg, {icon: 5});
                            }
                })
            });
        }
    </script>
@endsection