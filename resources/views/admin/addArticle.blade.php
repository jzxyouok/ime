@extends('admin.admin')
@section('Style')
    <link rel="stylesheet" href="/Static/Editor/css/wangEditor.min.css">
    {{--<link rel="stylesheet" href="/Static/Fileinput/css/fileinput.min.css">--}}
    <link href="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/css/fileinput.min.css" rel="stylesheet">
@endsection
@section('content')
            <div class="container-fluid">
                <div class="row">
                    <form class="form-horizontal">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="header">撰写新文章</div>
                                <div class="content">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">标题</label>
                                        <div class="col-md-10">
                                            <input type="text" name="title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">置顶</label>
                                        <div class="col-md-10">
                                            <label class="checkbox">
                                                <input type="checkbox" data-toggle="checkbox" name="top" />
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Banner</label>
                                        <div class="col-md-10">
                                            <input type="file" class="file" name="banner" id="uploadBanner" data-min-file-count="1" />
                                            <div id="ErrorBlock" class="help-block"></div>
                                        </div>
                                        <input type="hidden" name="bannerPic" />
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">内容</label>
                                        <div class="col-md-10">
                                            <textarea name="content" id="articleEditor" style="display:none; height: 400px;"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">发布</h4>
                                </div>
                                <div class="content">
                                    <button id="saveDraft" class="btn btn-default">保存草稿</button>
                                    <button class="btn btn-default pull-right">预览</button>
                                    <div class="clear" style="margin-bottom: 50px;"></div>
                                    <select name="cities" class="selectpicker" data-title="文章栏目" data-style="btn-default btn-block" data-menu-style="dropdown-blue">
                                        @foreach($cat as $value)
                                        <option value="{{ $value['id'] }}">{{ $value['cat_title'] }}</option>
                                        @endforeach
                                    </select>
                                    <div class="content-full-width" style="height: 50px; margin-top: 30px;">
                                        <button id="sabeGarbage" class="btn btn-danger btn-simple">移至垃圾箱</button>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">发布</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">文章 SEO 信息</h4>
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin: 0px;">
                                                <label>SEO 关键词</label>
                                                <input name="tags" class="tagsinput tag-azure" value="" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin: 0px;">
                                                <label>seo 标题</label>
                                                <input type="text" class="form-control" placeholder="SEO title">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" style="margin: 0px;">
                                                <label>seo 描述</label>
                                                <textarea name="description" rows="5" class="form-control" placeholder="SEO 描述"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
@endsection
@section('JavaScript')
    <script src="/Static/Editor/js/wangEditor.min.js"></script>
    {{--<script src="/Static/Fileinput/js/fileinput.min.js"></script>--}}
    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/js/fileinput.min.js"></script>
    {{--<script src="/Static/Fileinput/js/locales/zh.js"></script>--}}
    <script src="https://cdn.bootcss.com/bootstrap-fileinput/4.3.5/js/locales/zh.min.js"></script>
    <script>

        $("#uploadBanner").fileinput({
            language: 'zh',
            uploadUrl: '/admin/uploadPic', // you must set a valid URL here else you will get an error
            allowedFileExtensions: ['jpg', 'png','gif'],
            elErrorContainer: '#ErrorBlock',
            showUpload: false,
            showRemove: false,
            showCaption: true,
            dropZoneEnabled: false,
//            overwriteInitial: false,
            maxFileCount: 1,
            uploadExtraData: {
                _token: '{{ csrf_token() }}'
            },
//            initialPreview: [
//                "<img src='/upload/article/1201611160138.jpg' width='100%' class='file-preview-image' alt='Desert' title='Desert'>"
//            ],
            slugCallback: function(filename) {
                return filename.replace('(', '_').replace(']', '_');
            }
        }).on('fileuploaded' , function (e, data) {
            if (data.response['info'] ==1) {
                $("input[name=bannerPic]").val(data.response['cont']);
            }
        });
        /**
         图片上传完成之后的回调函数
         */
    </script>
    <script type="text/javascript">
        // 阻止输出log
        // wangEditor.config.printLog = false;

        var editor = new wangEditor('articleEditor');

        // 上传图片
        editor.config.uploadImgUrl = '/upload';
        editor.config.uploadParams = {
            // token1: 'abcde',
            // token2: '12345'
        };
        editor.config.uploadHeaders = {
            // 'Accept' : 'text/x-json'
        };
        editor.config.mapAk = 'QYu5Yl0TRPZh3BkySY6rlN1UGKLairhE';

        // 隐藏网络图片
        // editor.config.hideLinkImg = true;

        // 表情显示项
        editor.config.emotionsShow = 'value';
        editor.config.emotions = {
            'default': {
                title: '默认',
                data: '/Static/Editor/emotion/emotions.data'
            },
            'weibo': {
                title: '微博表情',
                data: [
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/7a/shenshou_thumb.gif',
                        value: '[草泥马]'
                    },
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/60/horse2_thumb.gif',
                        value: '[神马]'
                    },
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/bc/fuyun_thumb.gif',
                        value: '[浮云]'
                    },
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/c9/geili_thumb.gif',
                        value: '[给力]'
                    },
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/f2/wg_thumb.gif',
                        value: '[围观]'
                    },
                    {
                        icon: 'http://img.t.sinajs.cn/t35/style/images/common/face/ext/normal/70/vw_thumb.gif',
                        value: '[威武]'
                    }
                ]
            }
        };

//         只粘贴纯文本
//         editor.config.pasteText = true;
//
//         跨域上传
//         editor.config.uploadImgUrl = 'http://localhost:8012/upload';
//
//         第三方上传
//         editor.config.customUpload = true;
//
//         普通菜单配置
//         editor.config.menus = [
//             'img',
//             'insertcode',
//             'eraser',
//             'fullscreen'
//         ];
//         只排除某几个菜单（兼容IE低版本，不支持ES5的浏览器），支持ES5的浏览器可直接用 [].map 方法
//         editor.config.menus = $.map(wangEditor.config.menus, function(item, key) {
//             if (item === 'insertcode') {
//                 return null;
//             }
//             if (item === 'fullscreen') {
//                 return null;
//             }
//             return item;
//         });
//
//         onchange 事件
//         editor.onchange = function () {
//             console.log(this.$txt.html());
//         };
//
//         取消过滤js
//         editor.config.jsFilter = false;
//
//         取消粘贴过来
//         editor.config.pasteFilter = false;
//
//         设置 z-index
//         editor.config.zindex = 20000;
//
//         语言
//         editor.config.lang = wangEditor.langs['en'];
//
//         自定义菜单UI
//         editor.UI.menus.bold = {
//             normal: '<button style="font-size:20px; margin-top:5px;">B</button>',
//             selected: '.selected'
//         };
//         editor.UI.menus.italic = {
//             normal: '<button style="font-size:20px; margin-top:5px;">I</button>',
//             selected: '<button style="font-size:20px; margin-top:5px;"><i>I</i></button>'
//         };
        editor.create();
    </script>
@endsection