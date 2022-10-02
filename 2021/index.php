<?php
$baseUrl = "../";
$page_title = "欢迎查看 2020 年新闻时间线";

require "../common/globalVar.php";
require "../common/database.php";
//$news_list = select_more_data("select * from `rss_news` where ``");

//生成1-3随机数
$theme_index = rand(0,2);

?>


<html>
<head>
    <meta charset="UTF-8">

    <!-- SEO -->
    <title>欢迎查看 2021 年新闻时间线 | Laomao - 把握时代脉搏，倾听世界声音</title>
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
    <link rel="stylesheet" href="../common/theme/eyefind/assets/css/year_2021.css?v=20211230001">
</head>
<body>

<div class="head">
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

    <!-- 顶部的搜索框 -->
    <div class="search_box">
        <a href="../" class="input">
            <img class="icon" alt src="../assets/images/search.png"/>
            <input type="text" id="keyword_input" placeholder="搜索或键入网址…" maxlength="38"/>
        </a>
        <div class="button_box">
            <a href="../" class="button" id="submit_button">发起检索</a>
            <a href="../" class="button" id="random_website">随机站点</a>
        </div>
    </div>
</div>

<div class="yellow_hr"></div>

<!-- head banner -->
<div class="head_banner" style="background-image: url('../assets/images/year_2021/banner<?php echo $theme_index;?>.jpg');">
    <div class="head_banner_content">
        <p class="info">图片来源：<a href="https://archillect.com/<?php echo $theme_index===0?"360998":($theme_index===1?"361060":"361061");?>" target="_blank">Archillect</a></p>
        <h1>欢迎查看 2021 年新闻时间线</h1>
        <p>我们在首页提供了第三方新闻源丰富您的使用体验，同时我们也进行存档供您回顾这一年推送的全部新闻消息。</p>
        <p>本时间线按月归档，由远及近排序。</p>
    </div>
</div>

<div class="head_banner_list">
    <a href="../2020" target="_blank" class="item year_2020">
        <div class="year_2020_title">查看 2020 年新闻时间线 </div>
    </a>
    <div class="item kotoba">
        <div class="title" id="newYearKotoba">新年寄语</div>
    </div>
    <div class="item year">
        <div class="area_item china">辛丑年（牛年）</div>
        <div class="area_item roc">民国一百一十年</div>
        <div class="area_item japan">日本令和三年</div>
        <div class="area_item korea">朝鲜主体一百一十年</div>
    </div>
    <a href="https://voice.baidu.com/act/newpneumonia/newpneumonia" target="_blank" class="item covid-19">
        <div class="covid-19-title">
            <h1>疫情实时播报</h1>
            <p>密切关注 COVID-19 疫情</p>
        </div>
    </a>
    <div class="item guide_index">
        <h1>快速导航</h1>
        <div class="guide_index_list">
            <a href="#January" class="guide_index_item">一月</a>
            <a href="#February" class="guide_index_item">二月</a>
            <a href="#March" class="guide_index_item">三月</a>
            <a href="#April" class="guide_index_item">四月</a>
            <a href="#May" class="guide_index_item">五月</a>
            <a href="#June" class="guide_index_item">六月</a>
            <a href="#July" class="guide_index_item">七月</a>
            <a href="#August" class="guide_index_item">八月</a>
            <a href="#September" class="guide_index_item">九月</a>
            <a href="#October" class="guide_index_item">十月</a>
            <a href="#November" class="guide_index_item">十一月</a>
            <a href="#December" class="guide_index_item">十二月</a>
        </div>
    </div>
</div>

<!-- head banner end -->

<!-- single month -->
<div class="month_item" id="January">
    <div class="month_title">2021 / 01 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>

</div>
<!-- single month end -->

<!-- single month -->
<div class="month_item" id="February">
    <div class="month_title">2021 / 02 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>

</div>
<!-- single month end -->

<!-- single month -->
<div class="month_item" id="March">
    <div class="month_title">2021 / 03 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>

</div>
<!-- single month end -->

<!-- single month -->
<div class="month_item" id="April">
    <div class="month_title">2021 / 04 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>

</div>
<!-- single month end -->

<!-- single month -->
<div class="month_item" id="May">
    <div class="month_title">2021 / 05 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>

</div>
<!-- single month end -->

<!-- single month -->
<div class="month_item" id="June">
    <div class="month_title">2021 / 06 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>

</div>
<!-- single month end -->

<!-- single month -->
<div class="month_item" id="July">
    <div class="month_title">2021 / 07 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>

</div>
<!-- single month end -->

<!-- single month -->
<div class="month_item" id="August">
    <div class="month_title">2021 / 08 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>

</div>
<!-- single month end -->

<!-- single month -->
<div class="month_item" id="September">
    <div class="month_title">2021 / 09 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>
</div>
<!-- single month end -->

<!-- single month -->
<div class="month_item" id="October">
    <div class="month_title">2021 / 10 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>

</div>
<!-- single month end -->

<!-- single month -->
<div class="month_item" id="November">
    <div class="month_title">2021 / 11 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>

</div>
<!-- single month end -->

<!-- single month -->
<div class="month_item" id="December">
    <div class="month_title">2021 / 12 <span></span></div>

    <div class="month_news_list">
        <div class="load_more">加载更多</div>
    </div>

</div>
<!-- single month end -->

<!-- news detail dialog -->
<div class="news_detail_dialog hidden" id="news_detail_dialog">
    <div class="dialog_box">
        <div class="news_content">
            <div class="topic_box" id="news_topic">
                <div id="news_title"></div>
                <div class="description">发布日期：<span id="news_time"></span>；分类：<span id="news_classify"></span></div>
                <div class="hr"></div>
            </div>
            <div id="news_text"></div>
        </div>
        <div class="news_source"></div>
        <div class="close_button close_news_detail_dialog">×</div>
    </div>
    <div class="dialog_mask close_news_detail_dialog" id="dialog_mask"></div>
</div>
<!-- news detail dialog end -->

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
    <p>&copy;2021 <a href="https://nebula-soft.com/" target="_blank">Nebula Software Studio</a>
        AllRight Reserved. <a
                href="https://beian.miit.gov.cn/" target="_blank">鲁ICP备10596363号</a><br>
    </p>
</div>
<!-- footer end -->


<!--外部JavaScript脚本-->
<script type="module" src="../assets/js/year_2021.js?v=20211231001"></script>


</body>
</html>
