@extends('admin.admin')

@section('Style')
@endsection

@section('content')
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="toolbar">
                                {{--Here you can write extra buttons/actions for the toolbar --}}
                            </div>

                            <table id="bootstrap-table" class="table">
                                <thead>
                                <th data-field="state" data-checkbox="true"></th>
                                <th data-field="id" class="text-center">ID</th>
                                <th data-field="title" data-sortable="true">文章标题</th>
                                <th data-field="category" data-sortable="true">栏目</th>
                                <th data-field="author" data-sortable="true">作者</th>
                                <th data-field="time" data-sortable="true">时间</th>
                                <th data-field="status" data-sortable="true">状态</th>
                                <th data-field="actions" class="td-actions text-right" data-events="operateEvents" data-formatter="operateFormatter">操作</th>
                                </thead>
                                <tbody>
                                {{--<tr>--}}
                                    {{--<td></td>--}}
                                    {{--<td>2</td>--}}
                                    {{--<td>Minerva Hooper</td>--}}
                                    {{--<td>$23,789</td>--}}
                                    {{--<td>Curaçao</td>--}}
                                    {{--<td>15:57:23 16.8.19</td>--}}
                                    {{--<td>--}}
                                        {{--<button class="btn btn-info btn-xs btn-fill btn-round">--}}
                                            {{--<span class="btn-label">--}}
                                            {{--<i class="fa fa-check-circle"></i>--}}
                                            {{--</span>--}}
                                            {{--发布--}}
                                        {{--</button>--}}
                                    {{--</td>--}}
                                    {{--<td></td>--}}
                                {{--</tr>--}}
                                @foreach($article as $value)
                                    <tr>
                                        <td></td>
                                        <td>{{ $value -> id }}</td>
                                        <td>{{ $value -> article_title }}</td>
                                        <td>{{ $value -> cat_name }}</td>
                                        <td>{{ $value -> author }}</td>
                                        <td>{{ $value -> updated_at }}</td>
                                        <td>
                                            <button rel="tooltip" title="{{ $value -> article_status_name }}" class="btn @if($value -> article_status == 0) btn-success @elseif($value -> article_status == 1) btn-warning @endif btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                @if($value -> article_status == 0)
                                                    <i class="fa fa-check-circle"></i>
                                                @elseif($value -> article_status == 1)
                                                    <i class="fa fa-warning"></i>
                                                @endif

                                            </span>
                                                {{ $value -> article_status_name }}
                                            </button>
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!--  end card  -->
                    </div> <!-- end col-md-12 -->
                </div> <!-- end row -->

            </div>
@endsection
@section('JavaScript')
    <script type="text/javascript">

        var $table = $('#bootstrap-table');

        function operateFormatter(value, row, index) {
            return [
                '<div class="table-icons">',
                '<a rel="tooltip" title="垃圾箱" class="btn btn-simple btn-warning btn-icon table-action view" href="javascript:void(0)">',
                '<i class="iconfont">&#xe656;</i>',
                '</a>',
                '<a rel="tooltip" title="编辑" class="btn btn-simple btn-info btn-icon table-action edit" href="javascript:void(0)">',
                '<i class="iconfont">&#xe668;</i>',
                '</a>',
                '<a rel="tooltip" title="删除" class="btn btn-simple btn-danger btn-icon table-action remove" href="javascript:void(0)">',
                '<i class="iconfont">&#xe6b9;</i>',
                '</a>',
                '</div>',
            ].join('');
        }

        $().ready(function(){
            window.operateEvents = {
                'click .view': function (e, value, row, index) {
                    var info = JSON.stringify(row);

                    swal('You click view icon, row: ', info);
                    console.log(info);
                },
                'click .edit': function (e, value, row, index) {
                    var info = JSON.stringify(row);

                    swal('You click edit icon, row: ', info);
                    console.log(info);
                },
                'click .remove': function (e, value, row, index) {
                    console.log(row);
                    $table.bootstrapTable('remove', {
                        field: 'id',
                        values: [row.id]
                    });
                }
            };

            $table.bootstrapTable({
                toolbar: ".toolbar",
                clickToSelect: true,
                showRefresh: true,
                search: true,
                showToggle: true,
                showColumns: true,
                pagination: true,
                searchAlign: 'left',
                pageSize: 8,
                clickToSelect: false,
                pageList: [8,10,25,50,100],

                formatShowingRows: function(pageFrom, pageTo, totalRows){
                    {{-- 在这里什么都不做，我们不想显示文本“显示X的Y从……” --}}
                },
                formatRecordsPerPage: function(pageNumber){
                    return pageNumber + " rows visible";
                },
                icons: {
                    refresh: 'fa fa-refresh',
                    toggle: 'fa fa-th-list',
                    columns: 'fa fa-columns',
                    detailOpen: 'fa fa-plus-circle',
                    detailClose: 'ti-close'
                }
            });

            {{-- 激活提示后的数据表的初始化 --}}
            $('[rel="tooltip"]').tooltip();

            $(window).resize(function () {
                $table.bootstrapTable('resetView');
            });
        });

    </script>
@endsection