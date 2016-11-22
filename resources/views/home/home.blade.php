
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>{{ config('site.web_name') }}</title>
    {{--<link rel='dns-prefetch' href='//s.w.org' />--}}
    {{--<link rel='https://api.w.org/' href='http://jianbi.me/wp-json/' />--}}
    {{--<link rel="icon" href="/favicon.ico" sizes="32x32" />--}}
    {{--<link rel="icon" href="/favicon.ico" sizes="192x192" />--}}
    {{--<link rel="apple-touch-icon-precomposed" href="/favicon.ico" />--}}
    {{--<meta name="msapplication-TileImage" content="/favicon.ico" />--}}
    <link type="image/vnd.microsoft.icon" href="/favicon.ico" rel="shortcut icon">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="/Static/home/css/style.css" type="text/css" rel="stylesheet"/>
    <!--[if lt IE 9]>
    <script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
    <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="//cdn.bootcss.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div id="main" class="animated fadeIn">
    @yield('Content')
</div>
<div class="clearer"></div>
<footer id="footer">
    <section class="links_adlink">
        <div class="menu-%e8%8f%9c%e5%8d%95-container">
            <ul id="menu-%e8%8f%9c%e5%8d%95" class="menu">
                <li><a href="{{ config('site.web_url') }}">首页</a></li>
                <li><a href="{{ config('site.web_url') }}/msg">留言</a></li>
                <li><a href="{{ config('site.web_url') }}/link">邻居</a></li>
                {{--<li><a target="_blank" href="http://music.163.com/#/playlist?id=428309852">歌单</a></li>--}}
            </ul>
        </div>
        <div class="copyright">
            <a target="_blank" href="http://jianbi.me">Theme by iceking</a>·<a target="_blank" href="http://www.miitbeian.gov.cn/">黑ICP备16006682号-1</a>·<a target="_blank" href="https://portal.qiniu.com/signup?code=3llad13oe80gi">七牛云储存</a></div>
    </section>
    <div class="heart">人生若只如初见·何事秋风悲画扇</div>
</footer>

<script type='text/javascript' src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.min.js"></script>
{{--<img style="display:none" src=" " onerror='var str1="jianbi." + "me";str2="docu"+"ment.loca"+"tion.host";str3=eval(str2);if( str1!=str3 ){ do_action = "loca" + "tion." + "href = loca" + "tion.href" + ".rep" + "lace(docu" +"ment"+".loca"+"tion.ho"+"st," + "\"jianbi." + "me\"" + ")";eval(do_action) }' />--}}
<script type='text/javascript'>
{{--/* <![CDATA[ */--}}
var ajaxcomment = {"ajax_url":"http:\/\/{{ config('site.web_url') }}\/toComment","order":"desc","formpostion":"top"};
{{--/* ]]> */--}}
</script>
<script type='text/javascript' src='/Static/home/js/ajax_comment.js'></script>

<script type="text/javascript" src="/Static/home/js/prettify.min.js"></script>
<script type="text/javascript" src="/Static/home/js/functions.js"></script>
</body>
</html>