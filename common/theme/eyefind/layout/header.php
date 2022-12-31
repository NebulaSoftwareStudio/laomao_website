<?php
/**
 * 全局头部文件
 * 引入前必须引入 common/config.php
 * 并定义 $page_title 和 $baseUrl 变量
 */
?>


<head>
    <meta charset="UTF-8">
    <!-- SEO -->
    <title><?php echo (isset($page_title)?($page_title." - "):""); ?>LaoMao | 把握时代脉搏，倾听世界声音</title>
    <meta name="Description" content="LaoMao是一个门户网站，您可以使用它作为您的首页导航。本站点不跟踪您的上网与搜索行为，搜索服务由第三方提供。">
    <meta name="Keywords" content="LaoMao,老猫,老帽,搜索,门户">
    <meta name="author" content="Nebula Software Studio">
    <meta name="revised" content="Hanawa Hinata 2020/12/31">
    <meta name="generator" content="PhpStorm">
    <!--视口属性，用于自适应-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!--外部样式表-->
    <link rel="stylesheet" href="<?php echo $baseUrl ?? '' ?>common/theme/eyefind/assets/css/theme.css?v=<?php echo SOLAR_PROJECT_VERSION ?? '' ?>">
    <link rel="stylesheet" href="<?php echo $baseUrl ?? '' ?>common/theme/eyefind/assets/css/mobile_theme.css?v=<?php echo SOLAR_PROJECT_VERSION ?? '' ?>">



    <style>
        /*将页面更换为纪念样式（黑白色彩）*/
        /*html{*/
        /*    filter: grayscale(100%);*/
        /*}*/
    </style>



    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo $baseUrl ?? '' ?>favicon.ico">

</head>
