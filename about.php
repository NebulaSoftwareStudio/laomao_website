<?php

switch($_GET["classify"]){
    case 'privacy': $page_title='隐私权政策';break;
    case 'EULA': $page_title='服务条款';break;
    case 'about': $page_title='关于本站';break;
    case 'license': $page_title='开放源代码许可';break;
    default: $page_title='';
}

?>
<!DOCTYPE html>
<html lang="zh">
<head>
    <?php require "common/theme/eyefind/layout/header.php" ?>
</head>
<body>
<?php require "common/theme/eyefind/layout/menu.php"; ?>

<?php require "common/theme/eyefind/content/about/" . $_GET["classify"] . ".php"; ?>

<?php require "common/theme/eyefind/layout/footer.php"; ?>
</body>
</html>
