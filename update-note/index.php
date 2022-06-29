<?php
$baseUrl = "../";
?>
<!DOCTYPE html>
<html lang="zh">
<?php require "../common/theme/eyefind/layout/header.php" ?>
<body>
<?php require "../common/theme/eyefind/layout/topicMenu.php" ?>

<div class="about">
    <div class="model">
        <h1>laomao.website 的最新变化</h1>
        <span>本内容最终更新于 2022 年 06 月 21 日</span>
        <h3 id="feature">将在新版本中推出</h3>
        <h4>基础</h4>
        <ol>
            <li>【开发中】天气设置功能调整，添加省市县区三级联动选择功能，不必繁琐配置区域代码；</li>
            <li>【开发中】我们将开放网站链接提交功能，并对网站索引进行优化；</li>
            <li>【开发中】对“搜索或键入网址”功能进行改进，对一般网址的判断进行算法优化；更新更多第三方搜索引擎，添加自定义搜索引擎选项；</li>
            <li>【评估中】Laomao 自建检索系统优化；</li>
            <li>【待评估】NESG 账户系统对接，首页基础排版与内容自定义功能；设置同步功能</li>
        </ol>
        <h3 id="20201231">2020年12月31日更新</h3>
        <h4>基础</h4>
        <ol>
            <li>天气功能调整，不再获取访问者 IP 信息进行主动定位，添加设置界面，由用户主动配置位置信息；</li>
            <li>添加多个搜索引擎对接；</li>
            <li>添加公告板功能，分类菜单上方的黄色分割线可作为公告入口使用；</li>
            <li>新添加多项新网站链接；</li>
        </ol>
        <h4>架构</h4>
        <ol>
            <li>对后端架构进行升级，采用全新的 nebula solar web platform 架构；PHP版本升级为 7.1 ；</li>
            <li>MySQL 版本升级为 5.7 ；处理索引；</li>
        </ol>
        <h3 id="20191210">2019年12月10日更新</h3>
        <h4>外观</h4>
        <ol>
            <li>我们调整了 laomao.website 的产品方向，对标 GTA5 游戏中的 eyefind.info 进行产品化实现。我们抛弃了上版本的基础设计方案，转用 eyefind 设计方案；</li>
            <li>网站根据 eyefind.info 设计分为“媒体与娱乐”、“工作与生产”、“金融与服务”、“旅游与交通”、“时尚与健康” 5 大分类；在各分类下添加一些常用网站链接；</li>
            <li>首页添加新闻动态，新闻源对接 solidot.org 的 RSS 源订阅；</li>
            <li>首页添加一言；</li>
            <li>首页添加广告位；</li>
            <li>首页添加随机链接导航；</li>
            <li>引入天气功能，根据访问者IP自动定位返回天气信息。天气信息由和风天气(https://hweather.com)提供。</li>
        </ol>
        <h4>架构</h4>
        <ol>
            <li>我们引入了 PHP 5.6 作为后端语言，并将网站界面模块化调整；</li>
            <li>引入数据库对接，将前端网站与设置数据存储在 MySQL 中；优化查询效率；</li>
        </ol>
        
        <h3 id="20171015">2017年10月15日更新</h3>
        <h4>基础</h4>
        <ol>
            <li>重新设计的新外观，初步搭建前端静态页面；</li>
            <li>对接百度搜索。</li>
        </ol>
    </div>
</div>


<?php require "../common/theme/eyefind/layout/footer.php"; ?>

</body>
</html>
