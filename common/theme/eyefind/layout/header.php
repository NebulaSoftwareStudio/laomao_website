<?php 

$page_title = "";
if(isset($_GET["page"])&&$_GET["page"]==='about'){
    switch($_GET["classify"]){
        case 'privacy': $page_title='隐私权政策';break;
        case 'EULA': $page_title='服务条款';break;
        case 'about': $page_title='关于本站';break;
        case 'license': $page_title='开放源代码许可';break;
        default: $page_title='';
    }
}
else {
    if(isset($_GET["search"])){
        $page_title = $_GET["search"]." 的相关检索结果";
    }
}



?>


<head>
    <meta charset="UTF-8">
    <!-- SEO -->
    <title><?php echo ($page_title===""?"":$page_title." - "); ?>LaoMao | 把握时代脉搏，倾听世界声音</title>
    <meta name="Description" content="LaoMao是一个门户网站，您可以使用它作为您的首页导航。本站点不跟踪您的上网与搜索行为，搜索服务由第三方提供。">
    <meta name="Keywords" content="LaoMao,老猫,老帽,搜索,门户">
    <meta name="author" content="Nebula Software Studio">
    <meta name="revised" content="Hanawa Hinata 2020/12/31">
    <meta name="generator" content="PhpStorm">
    <!--视口属性，用于自适应-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!--外部样式表-->
    <!--    <link rel="stylesheet" href="assets/css/theme.css?v=2020101202">-->
    <link rel="stylesheet" href="common/theme/eyefind/assets/css/theme.css?v=20201231001">
    <link rel="stylesheet" href="common/theme/eyefind/assets/css/mobile_theme.css?v=20201231001">


    <!-- Favicon -->
    <link rel="icon" type="image/png" href="./favicon.ico">

</head>
