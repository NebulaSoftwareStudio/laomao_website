<?php
/**
 * LaoMao 主页
 */

include "common/common.php";

if(isset($_GET["search"])){
    $page_title = htmlspecialchars($_GET["search"])." 的相关检索结果";
}

?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <?php require "common/theme/eyefind/layout/header.php" ?>
</head>
<body>
<?php require "common/theme/eyefind/layout/menu.php"; ?>

<?php
//判断页面类型
if (isset($_GET["search"])) {
    // 如果传入 search 参数，跳转到搜索结果页面
    require "common/theme/eyefind/content/searchResult.php";
} else if(isset($_GET["news"])) {
    // 如果传入 news 参数，跳转到新闻详情页面
    require "common/theme/eyefind/content/newsDetail.php";
} else {
    // 默认状况展示首页
    require "common/theme/eyefind/content/index.php";
}

?>

<?php require "common/theme/eyefind/layout/footer.php"; ?>
</body>
</html>


