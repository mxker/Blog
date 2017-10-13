@extends('layout.base')

@section('content')
    <div class="col-lg-12" style="padding-top: 20px;">
    <section class="panel">
        <header class="panel-heading"><div class="external-event label label-success ui-draggable" style="position: relative;">添加分类</div></header>
        <div class="panel-body">
            <form class="form-horizontal bordered-group" role="form" action="/backend/article/add" method="post">
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类名称</label>
                    <div class="col-sm-10">
                        <input type="text" name="article_name" class="form-control input-rounded">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类层级</label>
                    <div class="col-sm-10">
                        <select class="form-control input-rounded">
                            <option value="">第一级分类</option>
                            <option value="">第二级分类</option>
                            <option value="">第三级分类</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类排序</label>
                    <div class="col-sm-10">
                        <input class="form-control input-rounded" id="focusedInput" type="text" value="This is focused">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类图片</label>
                    <div class="col-sm-10">
                        <input type="file">
                        {{--<p class="help-block">Example block-level help text here.</p>--}}
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">分类描述</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-rounded" rows="3" name="art_description"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-10"><a href="javascript:;" class="btn btn-success btn-rounded">添加分类</a></div>
                </div>
            </form>
        </div>
    </section>
    </div>
@endsection