<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>{{ $title }} - {{ config('site.web_name') }}</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <meta name="keywords" content="">
    <meta name="description" content="">

    <link href="https://cdn.css.net/files/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/Static/admin/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
    <link href="/Static/admin/css/demo.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.css.net/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
    @yield('Style')

    <link href="https://cdn.css.net/files/fontawesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.css.network/css?family=Roboto:400,700,300" rel="stylesheet" type="text/css">
    <link href="/Static/admin/css/pe-icon-7-stroke.css" rel="stylesheet" />

    <style>
        @font-face {
            font-family: 'iconfont';
            src: url('//at.alicdn.com/t/font_1473690180_9971838.eot'); /* IE9*/
            src: url('//at.alicdn.com/t/font_1473690180_9971838.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('//at.alicdn.com/t/font_1473690180_9971838.woff') format('woff'), /* chrome、firefox */
            url('//at.alicdn.com/t/font_1473690180_9971838.ttf') format('truetype'), /* chrome、firefox、opera、Safari, Android, iOS 4.2+*/
            url('//at.alicdn.com/t/font_1473690180_9971838.svg#iconfont') format('svg'); /* iOS 4.1- */
        }

        .iconfont{font-family:"iconfont";
            font-size:16px;font-style:normal;}
    </style>

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="black" data-image="/Static/admin/images/full-screen-image-4.jpg">

        <div class="logo">
            <a href="{{ config('site.web_url') }}" class="logo-text">
                {{ config('site.web_name') }}
            </a>
        </div>

        <div class="sidebar-wrapper">
            <div class="user">
                <div class="photo">
                    <img src="/Static/admin/images/default-avatar.png" />
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        tizips
                        <b class="caret"></b>
                    </a>
                    <div class="collapse" id="collapseExample">
                        <ul class="nav">
                            <li><a href="/admin/profile">个人资料</a></li>
                            <li><a href="/admin/editPwd">修改密码</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <ul class="nav">
                <li>
                    <a href="/admin/system">
                        <i class="pe-7s-graph"></i>
                        <p>仪盘</p>
                    </a>
                </li>
                <li>
                    <a data-toggle="collapse" href="#Article">
                        <i class="pe-7s-plugin"></i>
                        <p>文章
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="Article">
                        <ul class="nav">
                            <li><a href="/admin/art">文章管理</a></li>
                            <li><a href="/admin/addArt">添加文章</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#Category">
                        <i class="pe-7s-note2"></i>
                        <p>栏目
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="Category">
                        <ul class="nav">
                            <li><a href="/admin/cat">栏目管理</a></li>
                            <li><a href="/admin/addCat">添加栏目</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="/admin/msg">
                        <i class="pe-7s-graph1"></i>
                        <p>留言</p>
                    </a>
                </li>
                <li>
                    <a href="/admin/comment">
                        <i class="pe-7s-graph1"></i>
                        <p>评论</p>
                    </a>
                </li>

                <li>
                    <a data-toggle="collapse" href="#Link">
                        <i class="pe-7s-news-paper"></i>
                        <p>友链
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="Link">
                        <ul class="nav">
                            <li><a href="/admin/link">友链管理</a></li>
                            <li><a href="/admin/addLink">添加友链</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a data-toggle="collapse" href="#Setting">
                        <i class="pe-7s-map-marker"></i>
                        <p>系统
                            <b class="caret"></b>
                        </p>
                    </a>
                    <div class="collapse" id="Setting">
                        <ul class="nav">
                            <li><a href="/admin/setting">系统设置</a></li>
                            <li><a href="/admin/userSet">用户设置</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">{{ $title }}</a>
                </div>
                <div class="collapse navbar-collapse">

                    <form class="navbar-form navbar-left navbar-search-form" role="search">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" value="" class="form-control" placeholder="Search...">
                        </div>
                    </form>

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown dropdown-with-icons">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-list"></i>
                                <p class="hidden-md hidden-lg">
                                    More
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <ul class="dropdown-menu dropdown-with-icons">
                                <li>
                                    <a href="/loginLock">
                                        <i class="pe-7s-lock"></i> 锁定
                                    </a>
                                </li>
                                <li>
                                    <a href="/loginOut" class="text-danger">
                                        <i class="pe-7s-close-circle"></i>
                                        退出
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            @yield('content')
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; 2016 <a href="https://www.inot.vip">Tizips</a>
                </p>
            </div>
        </footer>

    </div>
</div>

</body>
<!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
<script src="https://cdn.css.net/files/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
<script src="/Static/admin/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://cdn.css.net/files/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>

<script src="/Static/admin/js/inot.js"></script>
<!--  Forms Validations Plugin -->
{{--<script src="/Static/admin/js/jquery.validate.min.js"></script>--}}

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="/Static/admin/js/moment.min.js"></script>

<!--  Date Time Picker Plugin is included in this js file -->
{{--<script src="/Static/admin/js/bootstrap-datetimepicker.js"></script>--}}

<!--  Select Picker Plugin -->
<script src="/Static/admin/js/bootstrap-selectpicker.js"></script>

<!--  Checkbox, Radio, Switch and Tags Input Plugins -->
<script src="/Static/admin/js/bootstrap-checkbox-radio-switch-tags.js"></script>

<!--  Charts Plugin -->
<script src="/Static/admin/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="https://cdn.css.net/libs/bootstrap-notify/0.2.0/js/bootstrap-notify.min.js"></script>

<!-- Sweet Alert 2 plugin -->
<script src="/Static/admin/js/sweetalert2.js"></script>

<!-- Vector Map plugin -->
{{--<script src="/Static/admin/js/jquery-jvectormap.js"></script>--}}

<!--  Google Maps Plugin    -->
{{--<script src="https://maps.googleapis.com/maps/api/js"></script>--}}

<!-- Wizard Plugin    -->
<script src="/Static/admin/js/jquery.bootstrap.wizard.min.js"></script>

<!--  Datatable Plugin    -->
<script src="/Static/admin/js/bootstrap-table.js"></script>

<!--  Full Calendar Plugin    -->
<script src="/Static/admin/js/fullcalendar.min.js"></script>

<!-- Light Bootstrap Dashboard Core javascript and methods -->
<script src="/Static/admin/js/light-bootstrap-dashboard.js"></script>

<script src="/Static/admin/js/jquery.bootstrap.wizard.min.js"></script>
<!--   Sharrre Library    -->
<script src="/Static/admin/js/jquery.sharrre.js"></script>
<script type="text/javascript" src="https://cdn.css.net/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="/Static/admin/js/demo.js"></script>

@yield('JavaScript')

</html>