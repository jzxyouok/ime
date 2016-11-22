@extends('home.home')

@section('Content')
    <div class="pjax">
        <div id="bg" style="background-image: url(http://oby8evr99.bkt.clouddn.com/wp-content/uploads/2016/10/bg.jpg?imageView2/0/w/1560/interlace/1);">
        </div>
        <div id="main" class="animated fadeIn">

            <header id="header">
                <div class="logo">
                    <a href="{{ config('site.web_url') }}"><img src="http://jianbi.me/wp-content/themes/Reading%20notes/logo.png"/><!--札记--></a>
                    <p class="description"></p>
                </div>
                <div class="social-links">
                    <ul>
                        <li><a href="https://github.com/wenlong002" target="_blank"><i class="fa fa-github"></i></a></li>
                        <li><a href="http://weibo.com/239320789" target="_blank"><i class="fa fa-weibo"></i></a></li>
                        <li><a href="https://twitter.com/icek1ng_" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>
            </header>
            <section id="slide">
                <img src="https://ws4.sinaimg.cn/large/e8f236c4jw1f9tdfdwz7zj21jk0dwdl4.jpg"/></li>
            </section>
            <section class="blockGroup container">
                <article class="post post-list" itemscope="" itemtype="http://schema.org/BlogPosting">
                    <h2 itemprop="name headline" class="title"><a href="http://jianbi.me/1696">主题：Reading-notes</a></h2>
                    <p>分享一下这几天折腾的主题，与即将改版的博客‘札记’同名，适合个人写作型博客。
                        灵感来源

                        iDevs Siinger

                        功能

                        清新简洁的界面 全程PJAX
                        轻量化体积（不足40k）
                        AJAX提交评论
                        Banner随机图片 高度自适应
                        都是扒...</p>
                    <div class="p_time"><i class="fa fa-sun-o"></i>&nbsp;&nbsp;2016-11-08<i class="fa fa-empire"></i>&nbsp;&nbsp;<ul class="post-categories">
                            <li><a href="http://jianbi.me/category/theme" rel="category tag">主题</a></li></ul></div>
                </article>
                <div class="clearer"></div>
                <article class="post post-list" itemscope="" itemtype="http://schema.org/BlogPosting">
                    <h2 itemprop="name headline" class="title"><a href="http://jianbi.me/1726">简单点</a></h2>
                    <p>少混一点人际关系
                        多跟开心的人在一起
                        晚一点再对社会绝望
                        即使失败也仍有尊严
                        原则健全
                    </p>
                    <div class="p_time"><i class="fa fa-sun-o"></i>&nbsp;&nbsp;2016-11-08<i class="fa fa-empire"></i>&nbsp;&nbsp;<ul class="post-categories">
                            <li><a href="http://jianbi.me/category/note" rel="category tag">札记</a></li></ul></div>
                </article>
                <div class="clearer"></div>
                <article class="post post-list" itemscope="" itemtype="http://schema.org/BlogPosting">
                    <h2 itemprop="name headline" class="title"><a href="http://jianbi.me/1678">谈恋爱和谈价值观</a></h2>
                    <p>别等到买车买房结婚生子那一天你才发现，
                        合拍的两个人到底有多重要。
                        昨天有个小迷妹跑来问我，一个男孩追她很久，各方面条件也不错算是白手起家有车有房，她对他也挺有好感，
                        就是有一次两个人约会逛街的时候...</p>
                    <div class="p_time"><i class="fa fa-sun-o"></i>&nbsp;&nbsp;2016-11-08<i class="fa fa-empire"></i>&nbsp;&nbsp;<ul class="post-categories">
                            <li><a href="http://jianbi.me/category/note" rel="category tag">札记</a></li></ul></div>
                </article>
                <div class="clearer"></div>
                <article class="post post-list" itemscope="" itemtype="http://schema.org/BlogPosting">
                    <h2 itemprop="name headline" class="title"><a href="http://jianbi.me/1665">如何治好你的颈椎病 程序猿</a></h2>
                    <p>程序员天天对着电脑，眼睛，颈椎等等，都会落下不少的职业病。来说说怎么治疗自己的颈椎病。
                        一、颈椎病是怎么产生的
                        形成颈椎病的核心原因是：不良生活习惯
                        我们身体的绝大部分疾病都是来自不良的生活习惯，生活...</p>
                    <div class="p_time"><i class="fa fa-sun-o"></i>&nbsp;&nbsp;2016-11-06<i class="fa fa-empire"></i>&nbsp;&nbsp;<ul class="post-categories">
                            <li><a href="http://jianbi.me/category/note" rel="category tag">札记</a></li></ul></div>
                </article>
                <div class="clearer"></div>
                <article class="post post-list" itemscope="" itemtype="http://schema.org/BlogPosting">
                    <h2 itemprop="name headline" class="title"><a href="http://jianbi.me/1659">摆渡人</a></h2>
                    <p>最好不相见 免得我牵念
                        最好不相知 面的我相思
                        但曾相见便相知 相见何如不见时
                        安得与君相诀绝 免叫生死作相思
                    </p>
                    <div class="p_time"><i class="fa fa-sun-o"></i>&nbsp;&nbsp;2016-11-06<i class="fa fa-empire"></i>&nbsp;&nbsp;<ul class="post-categories">
                            <li><a href="http://jianbi.me/category/note" rel="category tag">札记</a></li></ul></div>
                </article>
                <div class="clearer"></div>
                <article class="post post-list" itemscope="" itemtype="http://schema.org/BlogPosting">
                    <h2 itemprop="name headline" class="title"><a href="http://jianbi.me/1586">庆幸我自己是个没有安全感的人</a></h2>
                    <p>

                        我是个没有安全感的人。
                        所以我没心没肺、极度自负。
                        所以我不相信他人，时时刻刻保持着防备。
                        虽然没人能走进我的内心，但也不会被人伤害。
                        因为得不到所以不强求；因为不期待所以不失望，不受伤。

                    </p>
                    <div class="p_time"><i class="fa fa-sun-o"></i>&nbsp;&nbsp;2016-11-01<i class="fa fa-empire"></i>&nbsp;&nbsp;<ul class="post-categories">
                            <li><a href="http://jianbi.me/category/note" rel="category tag">札记</a></li></ul></div>
                </article>
                <div class="clearer"></div>
            </section>
            <div class="clearer"></div>
            <nav class="navigator">
                <a href="http://jianbi.me/page/2" ><i class="fa fa-angle-right	"></i></a>
            </nav>
        </div>
    </div>
@endsection