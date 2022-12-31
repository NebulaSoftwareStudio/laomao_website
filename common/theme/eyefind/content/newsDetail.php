<?php
/**
 * 新闻详情页面
 */

$database = new database();

$newsId = $_GET["news"]??"";
$year = $_GET["year"]??date("Y");

// 获取新闻详情
$newsInfo = $database->get_single_data("select * from `news_".$year."_archive` where `ID` = '".$newsId."';");

// 随机获取一条赞助商广告
$ads = $database->get_multi_data("select * from `ads`");
$ads_index = rand(0, (sizeof($ads) - 1));

?>


<div class="content">
    <div class="index_left_box">
        <div class="model news_detail">
            <?php
            if(isset($newsInfo["topic_image"])&&$newsInfo["topic_image"]!=''){
                echo "<img src=\"./assets/images/year_".$year."/news_archive/". $newsInfo["topic_image"] ."\" class=\"news_detail_image\" alt=\"". $newsInfo["title"] ."\" />";
            }
            ?>

            <div class="news_title">
                <div class="title"><?php echo $newsInfo["title"]; ?></div>
            </div>
            <div class="news_time">更新于 <?php echo $newsInfo["create_time"]; ?></div>

            <div class="news_content"><?php echo $newsInfo["content"]; ?></div>

            <div class="read_more">
                <a class="item" id="news_link" href="<?php echo $newsInfo["link"]; ?>" target="_blank" title="查看原文">查看原文</a>
                <a class="item" href="//solidot.org" target="_blank" title="查看历史文章列表">新闻列表</a>
            </div>
        </div>

    </div>

    <div class="index_right_box">

        <div class="model announcement">
            <div class="model_title white">
                <div class="title">赞助商广告</div>
            </div>
            <a href="<?php echo $ads[$ads_index]["url"]; ?>" target="_blank"
               title="<?php echo $ads[$ads_index]["name"]; ?>">
                <img src="<?php echo $ads[$ads_index]["image"]; ?>" alt/>
            </a>
        </div>

    </div>
</div>
