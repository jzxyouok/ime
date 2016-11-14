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
                                <tr>
                                    <td></td>
                                    <td>1</td>
                                    <td>音乐</td>
                                    <td>$36,738</td>
                                    <td>Niger</td>
                                    <td>15:57:23 16.8.19</td>
                                    <td>
                                        <button rel="tooltip" title="草稿" class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>2</td>
                                    <td>Minerva Hooper</td>
                                    <td>$23,789</td>
                                    <td>Curaçao</td>
                                    <td>15:57:23 16.8.19</td>
                                    <td>
                                        <button class="btn btn-info btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                            <i class="fa fa-check-circle"></i>
                                            </span>
                                            发布
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>3</td>
                                    <td>Sage Rodriguez</td>
                                    <td>$56,142</td>
                                    <td>Netherlands</td>
                                    <td>Baileux</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>4</td>
                                    <td>Philip Chaney</td>
                                    <td>$38,735</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>5</td>
                                    <td>Doris Greene</td>
                                    <td>$63,542</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>6</td>
                                    <td>Mason Porter</td>
                                    <td>$78,615</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>7</td>
                                    <td>Alden Chen</td>
                                    <td>$63,929</td>
                                    <td>Finland</td>
                                    <td>Gary</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>8</td>
                                    <td>Colton Hodges</td>
                                    <td>$93,961</td>
                                    <td>Nicaragua</td>
                                    <td>Nicaragua</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>9</td>
                                    <td>Illana Nelson</td>
                                    <td>$56,142</td>
                                    <td>$56,142</td>
                                    <td>Heard Island</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>10</td>
                                    <td>Nicole Lane</td>
                                    <td>Nicole Lane</td>
                                    <td>$93,148</td>
                                    <td>Cayman Islands</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>11</td>
                                    <td>Chaim Saunders</td>
                                    <td>$5,502</td>
                                    <td>Romania</td>
                                    <td>Romania</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>12</td>
                                    <td>Josiah Simon</td>
                                    <td>$50,265</td>
                                    <td>$50,265</td>
                                    <td>Christmas Island</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>13</td>
                                    <td>Ila Poole</td>
                                    <td>Ila Poole</td>
                                    <td>$67,413</td>
                                    <td>Montenegro</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>14</td>
                                    <td>Shana Mejia</td>
                                    <td>Shana Mejia</td>
                                    <td>$58,566</td>
                                    <td>Afghanistan</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>15</td>
                                    <td>Lana Ryan</td>
                                    <td>$64,151</td>
                                    <td>$64,151</td>
                                    <td>Martinique</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>16</td>
                                    <td>Daquan Bender</td>
                                    <td>Daquan Bender</td>
                                    <td>$91,906</td>
                                    <td>Sao Tome and Principe</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>17</td>
                                    <td>17</td>
                                    <td>Connor Wagner</td>
                                    <td>$86,537</td>
                                    <td>Germany</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>18</td>
                                    <td>18</td>
                                    <td>Boris Horton</td>
                                    <td>$35,094</td>
                                    <td>Laos</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>19</td>
                                    <td>Winifred Ryan</td>
                                    <td>$64,436</td>
                                    <td>Ireland</td>
                                    <td>Ireland</td>
                                    <td>
                                        <button class="btn btn-warning btn-xs btn-fill btn-round">
                                            <span class="btn-label">
                                                <i class="fa fa-warning"></i>
                                            </span>
                                            草稿
                                        </button>
                                    </td>
                                    <td></td>
                                </tr>
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