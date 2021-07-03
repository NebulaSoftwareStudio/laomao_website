<?php
/**
 * LaoMao 主页
 */

require "common/globalVar.php";
require "common/database.php";
require "common/function.php";

?>

<!DOCTYPE html>
<html lang="zh">
<?php require "common/theme/eyefind/layout/header.php" ?>
<body>
<?php require "common/theme/eyefind/layout/menu.php"; ?>

<?php
//判断页面类型
if(isset($_GET["page"])&&$_GET["page"]==='about'){
    require "common/theme/eyefind/content/about/".$_GET["classify"].".php";
}
else{
    //判断是否传入 search 参数
    if(isset($_GET["search"])){
        require "common/theme/eyefind/content/searchResult.php";
    }
    else{
        require "common/theme/eyefind/content/index.php";
    }
}

?>

<?php require "common/theme/eyefind/layout/footer.php"; ?>
</body>
</html>


