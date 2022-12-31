<?php

$database = new database();

// 随机获取10条特色网站
$recommend_site = $database->get_multi_data("select * from `site_list`");
shuffle($recommend_site);

// 随机获取一条赞助商广告
$ads = $database->get_multi_data("select * from `ads`");
$ads_index = rand(0, (sizeof($ads) - 1));

// 随机获取一条动态
$kotoba = $database->get_multi_data("select * from `kotoba`");
$kotoba_index = rand(0, (sizeof($kotoba) - 1));

?>


<div class="content">
    <div class="index_left_box">
        <div class="model news">
            <a href="http://solidot.org" target="_blank" title="solidot 奇客中国">
                <img class="source_site_logo" src="assets/images/sites/solidot.jpg" alt="solidot.org"/>
            </a>

            <div class="model_title">
                <div class="title">今日新闻</div>
            </div>

            <div id="news_title">加载中...</div>
            <div id="news_time">加载中...</div>
            <div id="news_content">加载中...</div>

            <div class="read_more">
                <a class="item" id="news_link" href="javascript:" target="_blank" title="查看完整文章">阅读全文</a>
                <a class="item" href="http://solidot.org" target="_blank" title="查看历史文章列表">新闻列表</a>
            </div>

            <div class="disable_cover" id="news_cover">
                <i>新闻正在加载···</i>
            </div>
        </div>

        <div class="model hot_site">

            <div class="model_title">
                <div class="title">当下最热网站</div>
            </div>

            <div class="hot_site_list">
                <a class="item" href="https://mazebank.laomao.website" title="MazeBank" target="_blank">
                    <img class="logo" src="assets/images/sites/mazebank.jpg" alt="MazeBank"/>
                    <div class="info">
                        <div class="title">洛圣都花园银行</div>
                        <p class="description">投资极受欢迎的银行，才是您的利益所在</p>
                    </div>
                </a>
            </div>


        </div>
    </div>

    <div class="index_right_box">

        <div class="model announcement">
            <div class="model_title white">
                <div class="title">赞助商广告</div>
            </div>
            <a href="<?php echo $ads[$ads_index]["url"]; ?>" target="_blank"
               title="<?php echo $ads[$ads_index]["name"]; ?>">
                <img src="<?php echo $ads[$ads_index]["image"]; ?>" alt/>
            </a>
        </div>

        <div class="model social_media">
            <div class="model_title">
                <img class="icon" src="assets/images/twitter.jpg" alt="twitter">
                <div class="title">最新动态</div>
            </div>

            <div class="social_media_list">
                <div class="item">
                    <p class="user_name">@<?php echo $kotoba[$kotoba_index]["author"]; ?></p>
                    <p class="info"><?php echo $kotoba[$kotoba_index]["content"]; ?></p>
                </div>

            </div>

            <!--            <div class="disable_cover">-->
            <!--                您所在的地区暂不支持动态功能-->
            <!--            </div>-->
        </div>

    </div>
</div>

<div class="classical_sites">
    <div class="model">
        <div class="model_title">
            <div class="title">LAOMAO 特色网站</div>
        </div>
        <div class="site_list">
            <?php for ($i = 0; $i < (sizeof($recommend_site) < 10 ? sizeof($recommend_site) : 10); $i++) { ?>

                <a class="item"
                   title="<?php echo $recommend_site[$i]["name"]; ?>&#10;<?php echo $recommend_site[$i]["description"]; ?>"
                   href="<?php echo $recommend_site[$i]["methods"]; ?>://<?php echo $recommend_site[$i]["url"]; ?>"
                   style="background-image: url('<?php echo $recommend_site[$i]["image"]; ?>')"
                   target="_blank">
                </a>

            <?php } ?>
        </div>
    </div>
</div>

