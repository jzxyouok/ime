@extends('admin.admin')

@section('Style')
    <link rel="stylesheet" href="/Static/Fileinput/css/fileinput.min.css">
@endsection

@section('content')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">{{ $title }}</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>用户名</label>
                                                <input type="text" class="form-control" disabled placeholder="Company" value="tizips">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>笔名</label>
                                                <input type="text" class="form-control" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>头像</label>
                                                <input type="file" class="file" id="uploadThumb" multiple>
                                                <div id="ErrorBlock" class="help-block"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>邮箱</label>
                                                <input type="text" class="form-control" placeholder="***@example.com" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Github</label>
                                                <input type="text" class="form-control" placeholder="https://github.com/tizips/" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>个人简介</label>
                                                <textarea rows="5" class="form-control" placeholder="请一句话介绍你自己，大部分情况下会在你的头像和名字旁边显示" value="Mike"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Update Profile</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="/Static/admin/images/full-screen-image-3.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="/Static/admin/images/default-avatar.png" alt="..."/>

                                        <h4 class="title">Tania Andrew<br />
                                            <small>michael24</small>
                                        </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> "Lamborghini Mercy <br>
                                    Your chick she so thirsty <br>
                                    I'm in that two seat Lambo"
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <button href="#" class="btn btn-simple"><i class="fa fa-github"></i></button>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
@endsection

@section('JavaScript')

    <script src="/Static/Fileinput/js/fileinput.min.js"></script>
    <script src="/Static/Fileinput/locales/zh.js"></script>
    <script>

        $("#uploadThumb").fileinput({
            language: 'zh',
            uploadUrl: '#', // you must set a valid URL here else you will get an error
            allowedFileExtensions : ['jpg', 'png','gif'],
            elErrorContainer: '#ErrorBlock',
            overwriteInitial: false,
            showPreview: false,
            maxFileSize: 400,
            maxFilesNum: 10,
            slugCallback: function(filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        });
        /*
         $("#test-upload").on('fileloaded', function(event, file, previewId, index) {
         alert('i = ' + index + ', id = ' + previewId + ', file = ' + file.name);
         });
         图片上传完成之后的回调函数
         */
    </script>
@endsection