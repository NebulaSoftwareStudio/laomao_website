<?php
/**
 * 关于页面
 */

include "common/common.php";
$baseUrl = "./";
$classify = $_GET["classify"]??"about";

switch($classify){
    case 'EULA': $page_title='服务条款';break;
    case 'about': $page_title='关于本站';break;
    case 'license': $page_title='开放源代码许可';break;
    default: $page_title='';$classify="about";// 对意料之外的输入，使用默认值
}

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <?php require "common/theme/eyefind/layout/header.php" ?>
</head>
<body>
<?php require "common/theme/eyefind/layout/menu.php"; ?>

<?php require "common/theme/eyefind/content/about/" . $classify . ".php"; ?>

<?php require "common/theme/eyefind/layout/footer.php"; ?>
</body>
</html>
