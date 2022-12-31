<?php
/**
 * laomao 2022 新闻时间线专题
 * Update on 2022/09/18
 */

include "../common/common.php";

$baseUrl = "../";
$page_title = "欢迎查看2022年新闻时间线";
$database = new database();

$topicNewsList = array();
for ($i = 1; $i <= 12; $i++) {
    $currentMonth = $i < 10 ? '0' . $i : $i;
    $nextMonth = ($i + 1) < 10 ? '0' . ($i + 1) : ($i + 1);
    $topicNewsList[$i] = $database->get_multi_data("select * from `news_2022_archive` where `create_time` >= '2022-" . $currentMonth . "-01' and `create_time` < '2022-" . $nextMonth . "-01' and `is_primary` != 0 order by `is_primary` desc, `create_time` asc");
}

?>

<html>
<head>
    <?php require "../common/theme/eyefind/layout/header.php" ?>
    <link rel="stylesheet"
          href="../common/theme/eyefind/assets/css/year_2022.css?v=<?php echo SOLAR_PROJECT_VERSION; ?>">
    <link rel="stylesheet" href="../common/theme/eyefind/assets/js/dist/swiperjs/swiper-bundle.min.css">
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
        <div class="source_info">图片来源：<a href="" target="_blank">Archillect</a>；视频素材来自网络。</div>
        <h1 class="title">欢迎查看 2022 年新闻时间线</h1>
        <div class="sub_title">向我们熟知的时代告别</div>
        <a href="https://twitter.com/bbcchinese/status/1608453579630645248" target="_blank" class="play_button">
            <div class="play_icon"></div>
        </a>
    </div>
</div>

<div class="main_description_box">
    <div class="content">
        <h2 class="title">引言：向我们熟知的时代告别。</h2>
        <div class="time">2022年12月31日 | 日向花和</div>
        <p>我们刚刚度过了充满挑战的一年。这一年里，不论是我们直面时代洪流的恐惧，还是因进步而来的欣喜，这些情感都在充实着我们经历的同时，飞速地离我们远去，成为了独属于我们个体的历史。</p>
        <p>“……长久以来的乱象，终于在最近集中起来，形成一股合力，好似要冲破些什么……”在2021年末的新年寄语中我曾这样写下的预感，在今年终于得到了些许验证：世界正在面临着空前危机，而近代以来塑造世界的群像，也在近期各自流逝，加剧着时代的裂痕与痛楚。我们也能清晰地感知到，那个属于我们的熟知的时代正在离我们远去。</p>
        <p>这是我们每个个体正在面临的真实挑战。历史具有其特有的惯性，我们的现今是由着数十甚至数百年前人类的意志所构建；同样地，我们今天所解决的问题，将会决定数十甚至数百年后的时代走向。</p>
        <p>毫无疑问，我们每个人在2022年都经受了重大考验。与此同时，我们相互协助彼此支持，取得了非凡的成就。2022年即将结束，我们借此机会感谢我们的客户、合作伙伴和公司同事在这一充满挑战的年度能紧密合作。</p>
        <p>尽管我们已经遇到了种种困难，但我们仍有信心创造更加美好的愿景。愿我们仍能专注于可使生活更加美好和更富有意义的事物，以乐观和自信的方式开启新的一年。</p>
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
            <?php
            for ($i = 1; $i <= 12; $i++) {
                $currentMonth = $i < 10 ? '0' . $i : $i;
                $newsList = $topicNewsList[$i];
                ?>
                <li class="item">
                    <h3 class="name"><?php echo $currentMonth; ?>月</h3>
                    <ul class="month-news-list">
                        <?php
                        for ($j = 0; $j < (min(sizeof($newsList), 5)); $j++) {
                            echo "<li>" . $newsList[$j]["title"] . "</li>";
                        }
                        echo "<li>...</li>\n";
                        ?>
                    </ul>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="topic_news_image_cover"></div>
    <?php
    for ($i = 1; $i <= sizeof($topicNewsList); $i++) {
        if($i!=1){
            echo "    ";
        }
        echo("<div class=\"topic_news_image_item hidden\" id=\"month_" . $i . "\" style=\"background-image: url('" .
            $baseUrl . "assets/images/year_2022/news_archive/" . $topicNewsList[$i][0]["topic_image"] . "')\"></div>\n");
    }
    ?>

</div>

<div class="month_news_box">
    <div class="content">
        <h2>每月热点新闻</h2>
        <div class="month_list">
            <?php for ($i = 1; $i <= 12; $i++) {
                $currentMonth = $i < 10 ? '0' . $i : $i;
                $newsList = $topicNewsList[$i];
                ?>
                <div class="month_item">
                    <div class="month_title">
                        <h3 class="title">2022年 <?php echo $currentMonth; ?>月</h3>
                        <a href="./timeline.php?month=<?php echo $currentMonth; ?>" target="_blank">查看本月时间线</a>
                    </div>
                    <div class="news_list">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <?php
                            for ($j = 0; $j < sizeof($newsList); $j++) {
//                            echo "<li>".$newsList[$j]["title"]."</li>";
                                ?>
                                <!-- Slides -->
                                <div class="swiper-slide">
                                    <a href="../index.php?news=<?php echo $newsList[$j]["ID"]; ?>&year=2022" target="_blank"
                                       class="news_item">
                                        <div class="news_image"
                                             style="background-image: url('<?php echo $baseUrl; ?>assets/images/year_2022/news_archive/<?php echo $newsList[$j]["topic_image"]; ?>')"></div>
                                        <div class="news_info">
                                            <div class="title"><?php echo $newsList[$j]["title"]; ?></div>
                                            <div class="time"><?php echo $newsList[$j]["create_time"]; ?>
                                                #<?php echo $newsList[$j]["ID"]; ?></div>
                                            <div class="description"><?php echo $newsList[$j]["description"]; ?></div>
                                        </div>
                                    </a>

                                </div>
                                <?php
                            }
                            ?>
                            <div class="swiper-slide">
                                <a href="./timeline.php?month=<?php echo $currentMonth; ?>" target="_blank"
                                   class="show_timeline_button">
                                    <div class="logo"></div>
                                    <div class="text">继续查看<br/>完整的<?php echo $currentMonth; ?>月新闻时间线</div>
                                </a>
                            </div>
                        </div>
                        <!-- If we need pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            <?php } ?>
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

<!-- 外部 JavaScript 脚本 -->
<script src="../common/theme/eyefind/assets/js/dist/swiperjs/swiper-bundle.min.js"></script>
<script type="module" src="../common/theme/eyefind/assets/js/year_2022.js?v=20211231001"></script>
<!-- 外部 JavaScript 脚本 结束 -->

</body>
</html>
