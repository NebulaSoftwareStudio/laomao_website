<?php
/**
 * 公告页面
 */

include "common/common.php";

$baseUrl = "./";
$echo = new resultEcho();
$database = new database();

if (isset($_GET["name"])) {
    // 获取所有公告信息
    $announcementInfo = $database->get_single_data("select * from `announcement`
         where `title_key` = '" . $database->clean_input_string($_GET["name"]) . "' order by `create_time` desc");
    $page_title = $announcementInfo["title"] ?? "找不到公告信息";
} else {
    // 获取所有公告列表
    $announcementList = $database->get_multi_data("select * from `announcement`
order by `create_time` desc");
    $page_title = "公告列表";
}

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <?php require "common/theme/eyefind/layout/header.php" ?>
    <link rel="stylesheet" href="<?php echo $baseUrl ?? '' ?>common/theme/eyefind/assets/css/announcement.css?v=<?php echo $GLOBALS['SITE_VERSION'] ?? '' ?>">
</head>
<body>
<?php require "common/theme/eyefind/layout/topicMenu.php"; ?>

<?php

if (isset($_GET["name"])) {
    if (isset($announcementInfo)) {
        ?>
        <div class="about">
            <div class="model">
                <h1><?php echo $announcementInfo["title"]; ?></h1>
                <span>本内容最终更新于 <?php echo $announcementInfo["update_time"]; ?></span>
                <?php echo $announcementInfo["content"]; ?>
            </div>
        </div>
        <?php
    } else {
        ?>
        <style>
            .model{
                overflow: auto;
            }
            .description {
                margin-bottom: 30px;
                font-size: 12px;
                color: #888888;
            }
        </style>
        <div class="about">
            <div class="model">
                <h1 class="title">没有这则公告</h1>
                <div class="description">没有这则公告，请检查链接是否正确。</div>
            </div>
        </div>
<?php
    }
} else {
    ?>
    <style>
        .model{
            overflow: auto;
        }
        .description {
            margin-bottom: 30px;
            font-size: 12px;
            color: #888888;
        }
    </style>
    <div class="about">
        <div class="model">
            <h1 class="title">公告列表</h1>
            <div class="description">本站所有公告均在这里公示</div>
            <?php
            for($i=0;$i<sizeof($announcementList);$i++){
                $announcementItem = $announcementList[$i];
                $html = "<p><a href=\"".($announcementItem["type"]==='link'?$announcementItem["content"]:
                        "./announcement.php?name=".$announcementItem["title_key"])."\" target='_blank'>".$announcementItem["title"]."</a></p>\n";
                echo $html;
            }
            ?>

        </div>
    </div>
<?php
}

?>

<?php require "common/theme/eyefind/layout/footer.php"; ?>
</body>
</html>

