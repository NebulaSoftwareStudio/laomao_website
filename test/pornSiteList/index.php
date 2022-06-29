<?php
/**
 * pornSite 数据展示页面
 */

$baseUrl = "../../";
require "../../common/globalVar.php";
require "../../common/database.php";

?>

<!DOCTYPE html>
<html lang="zh">
<?php require "../../common/theme/eyefind/layout/header.php" ?>
<body>
<?php require "../../common/theme/eyefind/layout/topicMenu.php" ?>

<style>
    .model{
        overflow: auto;
    }
    .description {
        margin-bottom: 30px;
        font-size: 12px;
        color: #888888;
    }

    .pron_site_list {
        width: 100%;
    }

    .pron_site_list .item {
        display: flex;
        justify-content: flex-start;
        margin: 5px;
    }

    .pron_site_list .item .id {
        width: 50px;
        height: 30px;
        background-color: #888888;
        color: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
    }

    .pron_site_list .item .time {
        line-height: 30px;
        margin: 0 10px;
        color: #888888;
    }

    .pron_site_list .item .name {
        width: 50%;
        flex: auto;
    }
</style>
<?php

if (isset($_GET["at"])) {
    // 判断at
    if ($_GET["at"] == "lspimg") {
        $siteList = select_more_data("select * from `porn_site` order by `id` asc");
        ?>
        <div class="about">
            <div class="model">
                <h1 class="title">PornSite 数据展示页面</h1>
                <div class="description">本页定期更新，数据仅供参考。数据源来自<a target="_blank" href="https://lspimg.com/pornsites.html">https://lspimg.com/pornsites.html</a>
                </div>
                <div class="pron_site_list">
                    <?php
                    for ($i = 0; $i < sizeof($siteList); $i++) {
                        ?>
                        <div class="item">
                            <div class="id"><?php echo $siteList[$i]["id"]; ?></div>
                            <div class="time"><?php echo $siteList[$i]["sourceUpdateTime"]; ?></div>
                            <a class="name" target="_blank"
                               href="<?php echo $siteList[$i]["url"]; ?>"><?php echo htmlspecialchars($siteList[$i]["title"]); ?></a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="about">
            <div class="model">
                <h1 class="title">您的 Access Token 不正确</h1>
                <div class="description">本页面仅供内部测试，请勿外传。</div>
            </div>
        </div>
        <?php
    }
}else{
    ?>
    <div class="about">
        <div class="model">
            <h1 class="title">请填写 Access Token</h1>
            <div class="description">本页面仅供内部测试，请勿外传。</div>
        </div>
    </div>
    <?php
}
?>


<?php require "../../common/theme/eyefind/layout/footer.php"; ?>

</body>
</html>

