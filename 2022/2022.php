<?php
/**
 * laomao 2022 新闻时间线专题
 * Update on 2022/09/18
 */

require "../common/globalVar.php";
require "../common/database.php";

?>

<html>
<head>
    <meta charset="UTF-8">

    <!-- SEO -->
    <title>欢迎查看 2022 年新闻时间线 | Laomao - 把握时代脉搏，倾听世界声音</title>
    <meta name="Description" content="我们在首页提供了第三方新闻源丰富您的使用体验，同时我们也进行存档供您回顾这一年推送的全部新闻消息。">
    <meta name="Keywords" content="LaoMao,老猫,老帽,搜索,门户">
    <meta name="author" content="Nebula Software Studio">
    <meta name="revised" content="Hanawa Hinata 2021/12/19">
    <meta name="generator" content="PhpStorm">
    <!-- SEO end -->

    <!--视口属性，用于自适应-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <!--外部样式表-->
    <!--    <link rel="stylesheet" href="assets/css/theme.css?v=2020101202">-->
    <link rel="stylesheet" href="../common/theme/eyefind/assets/css/theme.css?v=20211219001">
    <link rel="stylesheet" href="../common/theme/eyefind/assets/css/mobile_theme.css?v=20211219001">
    <link rel="stylesheet" href="../common/theme/eyefind/assets/css/year_2022.css?v=20211230001">
    <link rel="stylesheet" href="../assets/js/dist/swiperjs/swiper-bundle.min.css">
</head>
<body>

<div class="head" style="background-color: unset;">
    <!-- 顶部的logo和邮件功能、天气、周、位置信息 -->
    <div class="brand_box">
        <!-- 左侧的logo和邮件功能 -->
        <div class="logo_box">
            <a href="../">
                <img class="logo" alt="LaoMao logo" src="../assets/images/laomao_logo.png"/>
            </a>
        </div>

        <!-- 右侧的天气。移动版视图不显示该盒子 -->
        <div class="weather_box">
            Laomao 专题版面
        </div>
    </div>
</div>

<div class="main_banner">
    <div class="background-cover"></div>
    <div class="content">
        <h1 class="title">
            欢迎查看 2022 年新闻时间线
        </h1>
        <p class="sub_title">向我们熟知的时代/世界/人物告别。</p>
        <div class="play_button">
            <div class="play_icon"></div>
        </div>
    </div>
</div>

<div class="main_description_box">
    <div class="content">
        <h2 class="title">引言：向我们熟知的时代/世界/人物告别。</h2>
        <div class="time">2022年12月31日 | 日向花和</div>
        <p>我们正站在历史的关隘前。去年历经过绝望的我们，终于在今年见到了依稀的奇迹。</p>
        <p>抛开传统的说法，我们终归到岁末了。中国人尊重传统也尊重现代，有两个年过，搞得我不知如何是好。“但既说是新年，炖只鸡吃吃，是个好主意罢”。我也本这样想着。</p>
        <p>但一直以来发生的事，一直冲击着我对未来的信心。不可否认，世界正面临越来越多的挑战，而身边长久以来的乱象，终于在最近集中起来，形成一股合力，好似要冲破些什么。所以这炖鸡的事，看来也无法许诺了，总之还是心有余而力不足，下定决心竟然也要有些勇气起来。</p>
        <p>不知我们会在这阴暗中停留多久，但我们总要走出去，见一见曾经熟知的阳光。</p>
        <p>处理了许多杂事以后，我也会尽快走出这一步。目前工作室制定了一份开发路线图，也希望之前设想的几个项目都会被覆盖到。 另外我们还将继续倡导可访问的、公平开放的基础设施，持续响应全球范围内的客户与社区需求。</p>
        <p>是时候迎接更光明的未来了，至少现在不晚。</p>
    </div>
</div>

<div class="century_name_box">
    <div class="item lunar">壬寅年（虎年）</div>
    <div class="item roc">民国一百一十一年</div>
    <div class="item jp">日本令和四年</div>
    <div class="item kp">朝鲜主体一百一十一年</div>
</div>

<div class="month_box">
    <div class="content">
        <h2>选择你关注的月份</h2>
        <ul class="month_list">
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长新闻事件1的主要标题可能会很长很长很长新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
            <li class="item">
                <h3 class="name">一月</h3>
                <ul class="month-news-list">
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                    <li>新闻事件1的主要标题可能会很长很长很长</li>
                </ul>
            </li>
        </ul>
    </div>
</div>

<div class="month_news_box">
    <div class="content">
        <h2>每月热点新闻</h2>
        <div class="month_list">
            <div class="month_item">
                <h3 class="month_title">2022年 1月</h3>
                <div class="news_list">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <div class="news_item">
                                <div class="news_image"></div>
                                <div class="news_info">
                                    <div class="title">这是一则月度新闻标题 有可能会有断句而且有点长但不会太长</div>
                                    <div class="description">据BBC报道，有一篇新闻标题可能会很长但不会太长，而且还会出现空格断句。这下面是新闻的简要说明，会很长很长很长，因此需要用样式给截断它？也许不需要。</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news_item">
                                <div class="news_image"></div>
                                <div class="news_info">
                                    <div class="title">这是一则月度新闻标题 有可能会有断句而且有点长但不会太长</div>
                                    <div class="description">据BBC报道，有一篇新闻标题可能会很长但不会太长，而且还会出现空格断句。这下面是新闻的简要说明，会很长很长很长，因此需要用样式给截断它？也许不需要。</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news_item">
                                <div class="news_image"></div>
                                <div class="news_info">
                                    <div class="title">这是一则月度新闻标题 有可能会有断句而且有点长但不会太长</div>
                                    <div class="description">据BBC报道，有一篇新闻标题可能会很长但不会太长，而且还会出现空格断句。这下面是新闻的简要说明，会很长很长很长，因此需要用样式给截断它？也许不需要。</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news_item">
                                <div class="news_image"></div>
                                <div class="news_info">
                                    <div class="title">这是一则月度新闻标题 有可能会有断句而且有点长但不会太长</div>
                                    <div class="description">据BBC报道，有一篇新闻标题可能会很长但不会太长，而且还会出现空格断句。这下面是新闻的简要说明，会很长很长很长，因此需要用样式给截断它？也许不需要。</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news_item">
                                <div class="news_image"></div>
                                <div class="news_info">
                                    <div class="title">这是一则月度新闻标题 有可能会有断句而且有点长但不会太长</div>
                                    <div class="description">据BBC报道，有一篇新闻标题可能会很长但不会太长，而且还会出现空格断句。这下面是新闻的简要说明，会很长很长很长，因此需要用样式给截断它？也许不需要。</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news_item">
                                <div class="news_image"></div>
                                <div class="news_info">
                                    <div class="title">这是一则月度新闻标题 有可能会有断句而且有点长但不会太长</div>
                                    <div class="description">据BBC报道，有一篇新闻标题可能会很长但不会太长，而且还会出现空格断句。这下面是新闻的简要说明，会很长很长很长，因此需要用样式给截断它？也许不需要。</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news_item">
                                <div class="news_image"></div>
                                <div class="news_info">
                                    <div class="title">这是一则月度新闻标题 有可能会有断句而且有点长但不会太长</div>
                                    <div class="description">据BBC报道，有一篇新闻标题可能会很长但不会太长，而且还会出现空格断句。这下面是新闻的简要说明，会很长很长很长，因此需要用样式给截断它？也许不需要。</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news_item">
                                <div class="news_image"></div>
                                <div class="news_info">
                                    <div class="title">这是一则月度新闻标题 有可能会有断句而且有点长但不会太长</div>
                                    <div class="description">据BBC报道，有一篇新闻标题可能会很长但不会太长，而且还会出现空格断句。这下面是新闻的简要说明，会很长很长很长，因此需要用样式给截断它？也许不需要。</div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="news_item">
                                <div class="description">查看本月时间线</div>
                            </div>
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>










<!-- return to top -->
<div id="return_top">
    <svg t="1609163955670" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
         p-id="1835" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" height="200">
        <defs>
            <style type="text/css"></style>
        </defs>
        <path d="M938.666667 512c0 235.648-191.018667 426.666667-426.666667 426.666667S85.333333 747.648 85.333333 512 276.352 85.333333 512 85.333333s426.666667 191.018667 426.666667 426.666667z m-85.333334 0a341.333333 341.333333 0 1 0-682.666666 0 341.333333 341.333333 0 0 0 682.666666 0z m-311.168-158.165333l128 128a42.666667 42.666667 0 0 1-60.330666 60.330666L554.666667 486.997333V640a42.666667 42.666667 0 1 1-85.333334 0v-153.002667l-55.168 55.168a42.666667 42.666667 0 0 1-60.330666-60.330666l128-128a42.666667 42.666667 0 0 1 60.330666 0z"
              fill="#488bc2" p-id="1836"></path>
    </svg>
</div>
<!-- return to top end -->


<!-- footer start -->
<div class="footer">
    <p>建议1920*1080分辨率及80%放大比率、<a
            href="https://www.google.cn/chrome/" target="_blank">Chrome（或包含其内核）浏览器访问本站</a></p>
    <p>
        <a href="../?page=about&classify=EULA">服务条款与隐私权政策</a>
        |
        <a href="../?page=about&classify=about">关于本站</a>
        |
        <a href="../?page=about&classify=license">开放源代码许可</a>
    </p>
    <p>&copy;2022 <a href="https://nebula-soft.com/" target="_blank">Nebula Software Studio</a>
        AllRight Reserved. <a
            href="https://beian.miit.gov.cn/" target="_blank">鲁ICP备10596363号</a><br>
    </p>
</div>
<!-- footer end -->


<!--外部JavaScript脚本-->
<script src="../assets/js/dist/swiperjs/swiper-bundle.min.js"></script>
<script type="module" src="../assets/js/year_2022.js?v=20211231001"></script>


</body>
</html>
