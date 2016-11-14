@extends('admin.admin')
@section('Style')

@endsection

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="form-horizontal">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="header">{{ $title }}</div>
                                <div class="content">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">名称</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="网站名称" name="name" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">网址</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="网站网址" name="url" value="http://" class="form-control" url="true" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">站长</label>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" placeholder="站长名称" name="admin" required="required" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">联系邮箱</label>
                                        <div class="col-md-9">
                                            <input type="text" placeholder="站长联系邮箱" name="email" class="form-control" email="true" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">排列位置</label>
                                        <div class="col-md-9">
                                            <input type="text" name="order" placeholder="友链排列位置" class="form-control" number="true" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">网站简述</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" name="description" placeholder="网站简述 ..."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">隐藏</label>
                                        <div class="col-md-9">
                                            <label class="checkbox">
                                                <input type="checkbox" name="status" data-toggle="checkbox" value="1" >
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"></label>
                                        <div class="col-md-9">
                                            <button name="submit" class="btn btn-info btn-fill btn-wd">提交</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
@endsection

@section('JavaScript')

    <script type="text/javascript">

        //        $('#firendLinkValidatioin').validate();
        $("button[name=submit]").click(function () {
//            var status = 0;
//            if ($("input[name=status]:checked")) status = $("input[name=status]:checked").val();

            $.ajax({
            url: '/admin/toAddLink',
            type: 'POST',
            data: {
            _token: '{{ csrf_token() }}',
            web_name: $('input[name=name]').val(),
            web_url: $('input[name=url]').val(),
            web_admin: $('input[name=admin]').val(),
            web_email: $('input[name=email]').val(),
            web_logo: '',
            web_order: $('input[name=order]').val(),
            web_status: $("input[name=status]:checked").val(),
            web_description: $('textarea[name=description]').val()
            },
            success: function (data) {
                if (data['status'] ==1) {
                    notify('success' , data['msg']);
                }else if (data['status'] == 0) {
                    notify('error' , data['msg']);
                }else {
                    notify('error' , '服务器错误，请稍后重试');
                }
            },
            error: function () {
                notify('error' , '服务器错误，请稍后重试');
            }
            });
        });

    </script>
@endsection