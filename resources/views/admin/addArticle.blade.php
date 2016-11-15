@extends('admin.admin')
@section('Style')
    <link rel="stylesheet" href="/Static/Editor/css/wangEditor.min.css">
    <link rel="stylesheet" href="/Static/Fileinput/css/fileinput.min.css">
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
                                        <label class="col-md-3 control-label">标题</label>
                                        <div class="col-md-9">
                                            <input type="title" placeholder="title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">置顶</label>
                                        <div class="col-md-9">
                                            <label class="checkbox">
                                                <input type="checkbox" data-toggle="checkbox" value="1" >
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Banner</label>
                                        <div class="col-md-9">
                                            <input type="file" class="file" id="uploadBanner" multiple>
                                            <div id="ErrorBlock" class="help-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">内容</label>
                                        <div class="col-md-9">
                                            <textarea id="articleEditor" style="display:none; height: 400px;"></textarea>
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
                                        <option value="id">Bahasa Indonesia</option>
                                        <option value="sv">Svenska</option>
                                        <option value="tr">Türkçe</option>
                                        <option value="is">Íslenska</option>
                                        <option value="cs">Čeština</option>
                                        <option value="ru">Русский</option>
                                        <option value="th">ภาษาไทย</option>
                                        <option value="zh">中文 (简体)</option>
                                        <option value="zh-TW">中文 (繁體)</option>
                                        <option value="ja">日本語</option>
                                        <option value="ko">한국어</option>
                                    </select>
                                    <div class="content-full-width" style="height: 50px; margin-top: 30px;">
                                        <button id="sabeGarbage" class="btn btn-danger btn-simple">移至垃圾箱</button>
                                        <button type="submit" class="btn btn-info btn-fill pull-right">发布</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">文章标签</h4>
                                </div>
                                <div class="content">
                                    <input name="tagsinput" class="tagsinput tag-azure" value="" />
                                </div>
                            </div>
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">文章信息</h4>
                                </div>
                                <div class="content">
                                    <div class="col-md-6 articleInfo">
                                        <h3>tizips</h3>
                                        <p>Author</p>
                                    </div>
                                    <div class="col-md-6 articleInfo">
                                        <p>Word</p>
                                        <h3 id="wordCount">1248</h3>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
@endsection
@section('JavaScript')
    <script src="/Static/Editor/js/wangEditor.min.js"></script>
    <script src="/Static/Fileinput/js/fileinput.min.js"></script>
    <script src="/Static/Fileinput/locales/zh.js"></script>
            <script>

                $("#uploadBanner").fileinput({
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
                }
                // editor.config.uploadImgFileName = 'myFileName';

                // 隐藏网络图片
                // editor.config.hideLinkImg = true;

                // 表情显示项
                editor.config.emotionsShow = 'value';
                editor.config.emotions = {
                    'default': {
                        title: '默认',
                        data: './emotions.data'
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

                // 只粘贴纯文本
                // editor.config.pasteText = true;

                // 跨域上传
                // editor.config.uploadImgUrl = 'http://localhost:8012/upload';

                // 第三方上传
                // editor.config.customUpload = true;

                // 普通菜单配置
                // editor.config.menus = [
                //     'img',
                //     'insertcode',
                //     'eraser',
                //     'fullscreen'
                // ];
                // 只排除某几个菜单（兼容IE低版本，不支持ES5的浏览器），支持ES5的浏览器可直接用 [].map 方法
                // editor.config.menus = $.map(wangEditor.config.menus, function(item, key) {
                //     if (item === 'insertcode') {
                //         return null;
                //     }
                //     if (item === 'fullscreen') {
                //         return null;
                //     }
                //     return item;
                // });

                // onchange 事件
                // editor.onchange = function () {
                //     console.log(this.$txt.html());
                // };

                // 取消过滤js
                // editor.config.jsFilter = false;

                // 取消粘贴过来
                // editor.config.pasteFilter = false;

                // 设置 z-index
                // editor.config.zindex = 20000;

                // 语言
                // editor.config.lang = wangEditor.langs['en'];

                // 自定义菜单UI
                // editor.UI.menus.bold = {
                //     normal: '<button style="font-size:20px; margin-top:5px;">B</button>',
                //     selected: '.selected'
                // };
                // editor.UI.menus.italic = {
                //     normal: '<button style="font-size:20px; margin-top:5px;">I</button>',
                //     selected: '<button style="font-size:20px; margin-top:5px;"><i>I</i></button>'
                // };
                editor.create();
            </script>
@endsection