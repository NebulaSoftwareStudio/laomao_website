<?php
/**
 * 月度时间线
 */

include "../common/common.php";

$baseUrl = "../";
$database = new database();
$month = $_GET["month"]??1;
$month_day = 0;

$month = (int)$month < 10?'0'.(int)$month:(int)$month;
$next_month = (int)$month+1 < 10?'0'.((int)$month+1):(int)$month+1;

// 获取当前月份中的所有新闻
$news_list = $database -> get_multi_data("select * from `news_2022_archive` where `create_time` >= '2022-".$month."-01' and `create_time` < '2022-".$next_month."-01' order by `create_time` ASC");


?>


<html>
<head>
    <?php require "../common/theme/eyefind/layout/header.php" ?>
    <link rel="stylesheet" href="../common/theme/eyefind/assets/css/year_2022_timeline.css?v=<?php echo SOLAR_PROJECT_VERSION; ?>">
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
            <?php echo $month; ?> 月时间线，共 <?php echo sizeof($news_list); ?> 条记录。
            <a href="./">返回全年</a>
        </div>
    </div>
</div>

<!-- 时间线列表（按天） -->
<div class="timeline_box">
    <div class="timeline_content">
        <?php
        $current_day = 1;
        for($i=0;$i<sizeof($news_list);$i++){
            $day_string = $current_day < 10?'0'.$current_day:$current_day;
            $date_string = "2022-".$month."-".$day_string;
            if($news_list[$i]["create_time"] < $date_string){

                echo "<a href=\"../index.php?news=".$news_list[$i]["ID"]."&year=2022\" target=\"_blank\" class=\"news_item\">";
                echo "<div class=\"topic\">";
                if(isset($news_list[$i]["topic_image"])&&$news_list[$i]["topic_image"]!=''){
                    ?>
        <div style="width: calc(100% + 40px);height: calc(100% + 40px);margin: -20px;
            background-size: cover; background-position: center center;
            background-repeat: no-repeat; background-image: url(<?php echo $baseUrl.
            "assets/images/year_2022/news_archive/".$news_list[$i]["topic_image"];?>)"></div>
        <?php
                }else{
                    echo $news_list[$i]["description"];
                }
                echo "</div>\r\n";
                echo "<div class=\"info\">\r\n";
                echo "<div class=\"time\">".$news_list[$i]["create_time"]." #".$news_list[$i]["ID"]."</div>\r\n";
                echo "<div class=\"title\">".$news_list[$i]["title"]."</div>\r\n";
                echo "</div>\r\n";
                echo "</a>\r\n";
            }else{
                if($i > 0){
                    echo "</div>\r\n";
                    echo "</div>\r\n";
                }
                echo "<div class=\"date_item\" id=\"date-".$date_string."\">\r\n";
                echo "<h1>".$date_string."</h1>\r\n";
                echo "<div class=\"news_list\">";
                echo "<a href=\"../index.php?news=".$news_list[$i]["ID"]."&year=2022\" target=\"_blank\" class=\"news_item\">";
                echo "<div class=\"topic\">";
                if(isset($news_list[$i]["topic_image"])&&$news_list[$i]["topic_image"]!=''){
                    ?>
                    <div style="width: calc(100% + 40px);height: calc(100% + 40px);margin: -20px;
                            background-size: cover; background-position: center center;
                            background-repeat: no-repeat; background-image: url(<?php echo $baseUrl.
                        "assets/images/year_2022/news_archive/".$news_list[$i]["topic_image"];?>)"></div>
                    <?php
                }else{
                    echo $news_list[$i]["description"];
                }
                echo "</div>\r\n";
                echo "<div class=\"info\">\r\n";
                echo "<div class=\"time\">".$news_list[$i]["create_time"]." #".$news_list[$i]["ID"]."</div>\r\n";
                echo "<div class=\"title\">".$news_list[$i]["title"]."</div>\r\n";
                echo "</div>\r\n";
                echo "</a>\r\n";
                $current_day += 1;
            }
        }
        ?>
    </div>
</div>

