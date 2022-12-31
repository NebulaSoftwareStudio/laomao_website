<?php
/**
 * 即将开放
 */

?>
<html>
<head>
    <meta charset="UTF-8">

    <!-- SEO -->
    <title>2022年新闻时间线即将开放 | Laomao - 把握时代脉搏，倾听世界声音</title>
    <meta name="Description" content="2022年新闻时间线即将开放">
    <meta name="Keywords" content="2022年新闻,LaoMao,老猫,老帽,搜索,门户">
    <meta name="author" content="Nebula Software Studio">
    <meta name="revised" content="Hanawa Hinata 2022/09/26">
    <meta name="generator" content="PhpStorm">
    <!-- SEO end -->

    <!--视口属性，用于自适应-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">

    <!--外部样式表-->
    <link rel="stylesheet" href="../common/theme/eyefind/assets/css/comesoon.css?v=20211230001">
</head>
<body>
<div class="banner-container">
    <div class="container">
        <div class="heading text-center">
            <h2>把握时代脉搏，倾听世界声音<br/>2022年新闻时间线将于2023年初开放</h2>
            <p>我们正在收集本年所有新闻进行采编汇总，最后将以时间线和精选方式提供给您。这是一项采用舆情监测算法的自动化过程，结果将在2023年1月1日开放，敬请期待！</p></div>
        <div class="countdown styled">
            <div><b id="day">000</b> <span>天</span></div>
            <div><b id="hour">000</b> <span>时</span></div>
            <div><b id="mini">000</b> <span>分</span></div>
            <div><b id="sec">000</b> <span>秒</span></div>
        </div>
    </div>
</div>
<script>
    const comeSoonPage = {
        data: {
            currentTime: <?php echo time(); ?>,
            endTime: 1672502400,
            intervalTarget: null,
        },
        methods: {
            initCountDown: function (){
                let rangeTimeSec = comeSoonPage.data.endTime - comeSoonPage.data.currentTime;
                if(rangeTimeSec>=0){
                    let day = parseInt(rangeTimeSec/86400);
                    let hour = parseInt((rangeTimeSec%86400)/3600);
                    let mini = parseInt(((rangeTimeSec%86400)%3600)/60);
                    let sec = parseInt(((rangeTimeSec%86400)%3600)%60);
                    document.getElementById("day").innerText = day;
                    document.getElementById("hour").innerText = hour;
                    document.getElementById("mini").innerText = mini;
                    document.getElementById("sec").innerText = sec;
                    comeSoonPage.data.currentTime += 1;
                }else{
                    alert("欢迎来到2023年！");
                    window.location.reload();
                }
            },
        },
        created: function (){
            comeSoonPage.data.intervalTarget = setInterval(function (){
                comeSoonPage.methods.initCountDown()
            }, 1000);
        },
    }


    comeSoonPage.created();
</script>
</body>
</html>
