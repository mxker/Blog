@extends('layouts.backend')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">文章列表</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">–</span>
                    <span class="expand-icon">+</span>
                </a>
                {{--<a href="#" data-toggle="remove">--}}
                    {{--×--}}
                {{--</a>--}}
            </div>
        </div>
        <div class="panel-body">

            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    // $("#example-2").dataTable({
                    //     dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                    //     aoColumns: [
                    //         {bSortable: false},
                    //         null,
                    //         null,
                    //         null,
                    //         null
                    //     ],
                    // });

                    // Replace checkboxes when they appear
                    var $state = $("#example-2 thead input[type='checkbox']");

                    $("#example-2").on('draw.dt', function()
                    {
                        cbr_replace();

                        $state.trigger('change');
                    });

                    // Script to select all checkboxes
                    $state.on('change', function(ev)
                    {
                        var $chcks = $("#example-2 tbody input[type='checkbox']");

                        if($state.is(':checked'))
                        {
                            $chcks.prop('checked', true).trigger('change');
                        }
                        else
                        {
                            $chcks.prop('checked', false).trigger('change');
                        }
                    });
                });
            </script>

            <div id="example-2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                <table class="table table-bordered table-striped dataTable no-footer" id="example-2" role="grid" aria-describedby="example-2_info">
                    <thead>
                    <tr role="row"><th class="no-sorting sorting_asc" rowspan="1" colspan="1" aria-label="" style="width: 44px;">
                            <div class="cbr-replaced"><div class="cbr-input"><input type="checkbox" class="cbr cbr-done"></div>
                                <div class="cbr-state">
                                    <span></span>
                                </div>
                            </div>
                        </th>
                        <th tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Student Name: activate to sort column ascending" style="width: 246px;">文章名称</th>
                        <th tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 145px;">文章分类</th>
                        <th tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Average Grade: activate to sort column ascending" style="width: 194px;">关键词</th>
                        <th tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: 145px;">作者</th>
                        <th tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: 45px;">热搜</th>
                        <th tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Curriculum / Occupation: activate to sort column ascending" style="width: 45px;">推荐</th>
                        <th class="sorting" tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 155px;">添加时间</th>
                        <th tabindex="0" aria-controls="example-2" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 205px;">操作</th>
                    </tr>
                    </thead>

                    <tbody class="middle-align">
                    @foreach($data as $k=>$v)
                        <tr role="row" @if($k%2 !== 0) class="odd" @else class="even" @endif>
                            <td class="sorting_1">
                                <div class="cbr-replaced"><div class="cbr-input"><input type="checkbox" class="cbr cbr-done"></div><div class="cbr-state"><span></span></div></div>
                            </td>
                            <td>{{$v['art_name']}}</td>
                            <td>{{$v['cate_name']}}</td>
                            <td>{{$v['art_tag']}}</td>
                            <td>{{$v['art_editor']}}</td>
                            <td>{{ $v['is_hot'] == 1 ? '是':'否' }}</td>
                            <td>{{ $v['is_mark'] == 1 ? '是':'否' }}</td>
                            <td>{{ date('Y-m-d H:i:s',$v['art_time']) }}</td>
                            <td>
                                <a href="{{ url('backend/article/'.$v['art_id'].'/edit') }}" class="btn btn-secondary btn-sm btn-icon icon-left">
                                    Edit
                                </a>

                                <a href="javascript:;" onclick="delart({{ $v['art_id'] }})" class="btn btn-danger btn-sm btn-icon icon-left">
                                    Delete
                                </a>

{{--                                <a href="{{ url('backend/article/'.$v["art_id"]) }}" class="btn btn-info btn-sm btn-icon icon-left">--}}
{{--                                    Profile--}}
{{--                                </a>--}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                @if(!empty($data))
                <div class="row">
                    <div class="col-xs-6">
                        <div class="dataTables_info" id="example-2_info" role="status" aria-live="polite">Showing 1 to 10 of 60 entries</div>
                    </div>
                    <div class="col-xs-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="example-2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button previous disabled" aria-controls="example-2" tabindex="0" id="example-2_previous"><a href="{{ $page->url(1) }}">Previous</a></li>
                                @for($i = 1; $i <= $page->lastpage(); $i++)
                                    <li class="paginate_button {{ $page->currentPage() == $i ? 'active' : '' }}" aria-controls="example-2" tabindex="0"><a href="{{ $page->url($i) }}">{{ $i }}</a></li>
                                @endfor
                                <li class="paginate_button next" aria-controls="example-2" tabindex="0" id="example-2_next"><a href="{{ $page->url($page->lastPage()) }}">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

            </div>

        </div>
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