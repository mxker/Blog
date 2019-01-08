@extends('layouts.backend')

@section('content')
    <div class="col-lg-12" style="padding-top: 20px;">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @if(is_object($errors))
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @endif
                </ul>
            </div>
        @endif
        <section class="panel">
            <header class="panel-heading"><div class="external-event label label-success ui-draggable" style="position: relative;">编辑文章</div></header>
            <div class="panel-body">
                <form class="form-horizontal bordered-group" role="form" action="{{ url('backend/article/'.$articleInfo['art_id']) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">文章名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="art_name" class="form-control input-rounded" value="{{ $articleInfo['art_name'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">关键词</label>
                        <div class="col-sm-10">
                            <input type="text" name="art_tag" class="form-control input-rounded" value="{{ $articleInfo['art_tag'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">文章分类</label>
                        <div class="col-sm-10">
                            <select class="form-control input-rounded" name="cate_id">
                                <option value="0">请选择分类</option>
                                @foreach($category as $v)
                                    <option value="{{$v->cate_id}}"  @if($v->cate_id == $articleInfo['cate_id'])selected @endif >{{$v->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">作者名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="art_editor" class="form-control input-rounded" value="{{ $articleInfo['art_editor'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">文章图片</label>
                        <div class="col-sm-10">
                            <input type="file" name="art_thumb" value="{{ $articleInfo['art_thumb'] }}">
                            <p class="help-block">请上传jpg、jpeg、png等大小不超过2M的图片.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">文章描述</label>
                        <div class="col-sm-10">
                            <textarea class="form-control input-rounded" rows="3" name="art_desc">{{ $articleInfo['art_desc'] }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">文章内容</label>
                        <div class="col-sm-10">

                        {{-- 富文本编辑器 --}}
                        @include('UEditor::head')
                        <!-- 加载编辑器的容器 -->
                            <script id="container" name="art_content" type="text/plain" style='width:100%;height:300px;'></script>
                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('container');
                                ue.ready(function(){
                                    ue.setContent('{!! $articleInfo['art_content'] !!}');
                                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');
                                });
                            </script>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label"></label>
                        <div class="col-sm-10"><button class="btn btn-success btn-rounded" type="submit">编辑文章</button></div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection