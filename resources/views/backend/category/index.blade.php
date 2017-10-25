@extends('layout.base')

@section('content')
    <div class="col-md-12" style="padding-top: 20px;">
        <section class="panel">
            <header class="panel-heading "><div class="external-event label label-success ui-draggable" style="position: relative;">分类列表</div></header>
            <div class="panel-body no-padding">
                <div class="table-responsive">
                    <table class="table table-striped responsive" data-sortable="" data-sortable-initialized="true">
                        <thead>
                        <tr>
                            <th>排序</th>
                            <th>分类名称</th>
                            <th>分类标题</th>
                            <th>分类关键词</th>
                            <th>分类描述</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $v)
                            <tr>
                                <td><input style="width: 20px; align-content: center;" onchange="changeOrder(this,{{ $v['cate_id'] }})" type="text" value="{{$v['cate_order']}}" /></td>
                                <td>{{$v['cate_name']}}</td>
                                <td>{{$v['cate_title']}}</td>
                                <td>{{$v['cate_keywords']}}</td>
                                <td>{{$v['cate_description']}}</td>
                                <td>
                                    <a href="{{url('backend/category/'.$v["cate_id"]).'/edit'}}">编辑</a>
                                    <a href="javascript:;" onclick="delCate({{ $v['cate_id'] }})">删除</a>
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
        //  改变分类排序
        function changeOrder(obj,cate_id) {
            var cate_order = $(obj).val();
            $.post('{{ url('/backend/category/changeOrder') }}',
                    {'_token':'{{ csrf_token() }}','cate_order':cate_order, 'cate_id':cate_id},
                    function (data) {
                        if(data.status = 1){
                            layer.alert(data.msg, {icon: 6});
                        }else {
                            layer.alert(data.msg, {icon: 5});
                        }
            });
        }

        // 删除分类
        function delCate(cate_id) {
            layer.confirm('您确定要删除嘛？', {
                btn: ['确定','再考虑一下'] //按钮
            }, function(){
                $.post("{{url('backend/category/')}}/"+cate_id, {'_token':'{{ csrf_token() }}','_method':'delete', 'cate_id':cate_id},
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