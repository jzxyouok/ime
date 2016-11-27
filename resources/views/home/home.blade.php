
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ config('site.web_name') }}</title>

    <meta name="description"  content="" />

    <meta name="keywords"  content="" />

    <link rel="canonical" href="#" />
    <!-- /all in one seo pack -->
    <link rel='dns-prefetch' href='//s.w.org' />
    <script type='text/javascript' src='https://cdn.staticfile.org/jquery/1.12.3/jquery.min.js' defer='defer'></script>
    <script type='text/javascript' src='https://cdn.staticfile.org/jquery-migrate/1.4.0/jquery-migrate.min.js' defer='defer'></script>
    {{--<meta name='robots' content='index,follow' />--}}
    {{--<link rel='canonical' href='http://www.siryin.com' />--}}
    {{--<link rel="icon" href="http://su.siryin.com/wp-content/uploads/2016/02/cropped-favicon-1-32x32.png" sizes="32x32" />--}}
    {{--<link rel="icon" href="http://su.siryin.com/wp-content/uploads/2016/02/cropped-favicon-1-192x192.png" sizes="192x192" />--}}
    {{--<link rel="apple-touch-icon-precomposed" href="http://su.siryin.com/wp-content/uploads/2016/02/cropped-favicon-1-180x180.png" />--}}
    {{--<meta name="msapplication-TileImage" content="http://su.siryin.com/wp-content/uploads/2016/02/cropped-favicon-1-270x270.png" />--}}
    <link type="image/vnd.microsoft.icon" href="/favicon.ico" rel="shortcut icon">
    <link href="/Static/home/css/style.css" type="text/css" rel="stylesheet" />
    <link href="https://cdn.staticfile.org/nprogress/0.2.0/nprogress.min.css" rel="stylesheet">
    {{--<link href="/Static/home/css/unslider.css" type="text/css" rel="stylesheet" />--}}
    {{--<link rel="stylesheet" href="//at.alicdn.com/t/font_leg0agmx1gduz0k9.css" type="text/css" />--}}
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        @font-face {
            font-family: 'iconfont';  /* project id："118726" */
            src: url('//at.alicdn.com/t/font_gy7r75a4di7tx1or.eot');
            src: url('//at.alicdn.com/t/font_gy7r75a4di7tx1or.eot?#iefix') format('embedded-opentype'),
            url('//at.alicdn.com/t/font_gy7r75a4di7tx1or.woff') format('woff'),
            url('//at.alicdn.com/t/font_gy7r75a4di7tx1or.ttf') format('truetype'),
            url('//at.alicdn.com/t/font_gy7r75a4di7tx1or.svg#iconfont') format('svg');
        }
        .iconfont{
            font-family:"iconfont" !important;
            font-size:16px;font-style:normal;
            -webkit-font-smoothing: antialiased;
            -webkit-text-stroke-width: 0.2px;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
</head>
<div id="bg" style="background-image: url('/Static/home/images/f0eb08062673c9416c03680733e8b832.jpg')"></div>
<body id="null">
<section id="index">
    <header id="header">
        <div class="logo">
            <a href="{{ config('site.web_url') }}">{{ config('site.web_name') }}</a>
        </div>
        <div class="search_click"></div>
        <nav id="topMenu" class="menu_click">
            <div class="menu-menu-container">
                <ul id="menu-menu" class="menu">
                    <li><a href="#">读者墙</a></li>
                    <li><a href="#">分类</a>
                        <ul class="sub-menu">
                            <li><a href="#">瞎写</a></li>
                            <li><a href="#">GameMaker</a></li>
                            <li><a href="#">Typecho</a></li>
                        </ul>
                    </li>
                    <li><a href="#">各种外链</a>
                        <ul class="sub-menu">
                            <li><a href="#">Github</a></li>
                            <li><a href="#">下载站</a></li>
                            <li><a href="#">bilibili空间</a></li>
                            <li><a href="#">bilibili直播间</a></li>
                        </ul>
                    </li>
                    <li><a href="#">正在装的逼</a></li>
                </ul>
            </div>
            <i class="i_1"></i>
            <i class="i_2"></i>
        </nav>
        <div class="lower">
            <nav>
                <div class="menu-menu-1-container">
                    <ul id="menu-menu-2" class="menu">
                        <li class="current-menu-item"><a href="{{ config('site.web_url') }}">首页</a></li>
                        @foreach($menu as $val)
                        <li><a @if(!isset($val['child'])) href="/Cat/{{ $val['id'] }}" @endif>{{ $val['cat_name'] }}</a>
                            @if(isset($val['child']))
                            <ul class="sub-menu">
                                @foreach($val['child'] as $child)
                                <li><a href="/Cat/{{ $child['id'] }}">{{ $child['cat_name'] }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                        <li><a href="/link">链接</a></li>
                        <li><a href="/msg">留言</a></li>
                    </ul>
                </div>
                <i class="iconfont show-nav">&#xe613;</i>
            </nav><!-- #site-navigation -->
        </div>
    </header>
    @yield('Content')
    <footer id="footer">
        <section class="links_adlink">
            <ul class="container">
                <li><a target="_blank" href="http://biji.io/">设计笔记</a></li>
                <li><a target="_blank" href="http://ji8.me/">基吧</a></li>
                <li><a href="/link">链接</a></li>
                <li><a target="_blank" href="http://www.siryin.com/sitemap.xml">地图</a></li>
                <br />
                <li>面朝大海，春暖花开 从明天起，做一个幸福的人 喂马，劈柴，周游世界</li>
            </ul>
        </section>
        Theme by <a target="_blank" href="https://www.inot.vip">tizips</a>
        &copy; 2016 <a href="{{ config('site.web_url') }}">{{ config('site.web_name') }}</a>
        <a class="back2top"></a>
    </footer>
</section>
<div class="clearer" style="height:1px;"></div>
<div class="search_form">
    <form method="get" action="{{ config('site.web_url') }}">
        <p class="micro mb-">你想搜索什么...</p>
        <input class="search_key" name="s" placeholder="Enter search keywords..." type="text" value="">
        <button alt="Search" type="submit">Search</button>
    </form>
    <div class="search_close"></div>
</div>
{{--<link rel='stylesheet' id='wp-markdown-prettify-css'  href='/Static/home/css/prettify.css' type='text/css' media='all' />--}}
<script type='text/javascript'>
    /* <![CDATA[ */
    var ajaxcomment = {"ajax_url":"http:\/\/{{ config('site.web_url') }}\/admin-ajax.php","order":"desc","formpostion":"top"};
    /* ]]> */
</script>
<script type='text/javascript' src='/Static/home/js/ajax_comment.js' defer='defer'></script>
{{--<script type='text/javascript' src='/Static/home/js/markdown.min.js' defer='defer'></script>--}}
<script style="display:none">
    function index_overloaded(){

    }
</script>
<!--script type='text/javascript' src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.min.js"></script-->
<script type='text/javascript' src='//cdn.bootcss.com/jquery/1.8.3/jquery.min.js'></script>
{{--<script src="/Static/home/js/unslider-min.js"></script>--}}
<script src="https://cdn.staticfile.org/jquery.pjax/1.9.6/jquery.pjax.min.js"></script>
<script src="https://cdn.staticfile.org/nprogress/0.2.0/nprogress.min.js"></script>
<script src="/Static/home/js/functions.js"></script>
<script>

</script>
</body>

</html>