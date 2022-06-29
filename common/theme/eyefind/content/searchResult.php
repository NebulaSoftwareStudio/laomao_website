<?php

$site_list = [];

//if (isset($_GET["classify"])) {
//    $site_list = @select_more_data("select * from `site_list` where `classify` = '" . $_GET["classify"] . "' order by `ID`");
//}
//if($site_list == NULL){
//    $site_list = [];
//}

//接收搜索关键字
$keyword = @clean_input_string($_GET["search"]);

//判断是否在搜索类别
if($keyword==='媒体与娱乐' || $keyword==='工作与生产' || $keyword==='金融与服务' || $keyword==='旅游与交通' || $keyword==='时尚与健康' ){
    $site_list = @select_more_data("select * from `site_list` where `classify` = '" . $keyword . "' order by `ID`");

    if(empty($site_list)){
        $site_list = [];
    }
}
else{
    $site_list = @select_more_data("select * from `site_list` where 
                                `classify` like '%" . $keyword . "%' or
                                `name` like '%" . $keyword . "%' or
                                `description` like '%" . $keyword . "%' or
                                `url` like '%" . $keyword . "%'
                                order by `ID`");

    if(empty($site_list)){
        $site_list = [];
    }
}



if (sizeof($site_list) !== 0) {
    ?>
    <div class="classify_site_box">

        <div class="site_list">
            <?php for ($i = 0; $i < sizeof($site_list); $i++) { ?>
                <a class="item" href="<?php echo $site_list[$i]["methods"]; ?>://<?php echo $site_list[$i]["url"]; ?>" title="<?php echo $site_list[$i]["name"]; ?>" target="_blank">
                    <img class="logo" src="<?php echo $site_list[$i]["image"]; ?>" alt="<?php echo $site_list[$i]["name"]; ?>" />
                    <div class="info">
                        <div class="title"><?php echo $site_list[$i]["name"]; ?></div>
                        <p class="description"><?php echo $site_list[$i]["description"]; ?></p>
                    </div>
                </a>
            <?php } ?>
        </div>

    </div>
<?php } else { ?>
    <img src="assets/images/404.jpg" class="not_found" alt="404"/>
    <?php
}
