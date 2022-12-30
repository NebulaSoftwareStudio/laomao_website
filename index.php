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
//if (isset($_GET["page"]) && $_GET["page"] === 'about') {
//    require "common/theme/eyefind/content/about/" . $_GET["classify"] . ".php";
//} else {
    //判断是否传入 search 参数
    if (isset($_GET["search"])) {
        require "common/theme/eyefind/content/searchResult.php";
    } else {
        require "common/theme/eyefind/content/index.php";
    }
//}

?>

<?php require "common/theme/eyefind/layout/footer.php"; ?>
</body>
</html>


