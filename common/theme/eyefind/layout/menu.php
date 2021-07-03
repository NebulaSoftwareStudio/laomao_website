
<div class="head">
    <!-- 顶部的logo和邮件功能、天气、周、位置信息 -->
    <div class="brand_box">
        <!-- 左侧的logo和邮件功能 -->
        <div class="logo_box">
            <a href="./">
                <img class="logo" alt="LaoMao logo" src="assets/images/laomao_logo.png"/>
            </a>
            <div class="mail_function" >
                <div class="item" id="mail_function">
                    <img src="assets/images/mail.png" alt/>
                    <span>邮件</span>
                </div>
                <div class="item" id="setting_button">
                    <img src="assets/images/edit.png" alt/>
                    <span>设置</span>
                </div>
            </div>
        </div>

        <!-- 右侧的天气。移动版视图不显示该盒子 -->
        <div class="weather_box">
            <div class="info">
                <span id="address">定位中···</span>
                <span id="week">-</span>
            </div>
            <img id="weather_image" alt src="assets/images/heWeather/100.png"/>
        </div>
    </div>

    <!-- 顶部的搜索框 -->
    <div class="search_box">
        <div class="input">
            <img class="icon" alt src="assets/images/search.png"/>
            <input type="text" value="<?php echo isset($_GET["search"])?$_GET["search"]:''; ?>" id="keyword_input" placeholder="搜索或键入网址…" maxlength="38"/>
        </div>
        <div class="button_box">
            <div class="button" id="submit_button">发起检索</div>
            <div class="button" id="random_website">随机站点</div>
        </div>
    </div>
</div>


<!--<a href="./2020" class="announcement">-->
<!--    <div class="title">>> 欢迎查看 2020 年新闻时间线 <<</div>-->
<!--</a>-->


<div class="nav">
    <div class="list">
        <a href="?search=媒体与娱乐" title="媒体与娱乐" class="item">
            <img class="icon" src="assets/images/phone.png" alt/>
            <div class="name">媒体<br/>与娱乐</div>
        </a>

        <a href="?search=工作与生产" title="工作与生产" class="item">
            <img class="icon" src="assets/images/search.png" alt/>
            <div class="name">工作<br/>与生产</div>
        </a>

        <a href="?search=金融与服务" title="金融与服务" class="item">
            <img class="icon" src="assets/images/money.png" alt/>
            <div class="name">金融<br/>与服务</div>
        </a>

        <a href="?search=旅游与交通" title="旅游与交通" class="item left_border_black">
            <img class="icon" src="assets/images/fly.png" alt/>
            <div class="name">旅游<br/>与交通</div>
        </a>


        <a href="?search=时尚与健康" title="时尚与健康" class="item left_border_black">
            <img class="icon" src="assets/images/bags.png" alt/>
            <div class="name">时尚<br/>与健康</div>
        </a>
    </div>
</div>



<!-- 设置对话框 -->
<div class="setting_dialog hidden" id="setting_dialog">
    <div class="dialog_box">
        <div class="header">
            <div class="title">个性化设置</div>
            <div class="close close_setting_dialog" id="close_setting_button">×</div>
        </div>
        <div class="content">
            <p class="tips">通过个性化设置对话框，您可自定义您的 laomao 使用体验。
                个性化设置不会被保存到我们的服务器，所有的设置都将保存到您的浏览器缓存中。<br/>详情请参阅我们的用户隐私权保护方针。</p>
            <h3>您的地点</h3>
            <div class="description">因隐私保护考虑，新版天气接口不再通过您的IP地址自动对您定位，您可在此处更新您的位置信息。</div>
            <div class="description">LocationId可通过
                <a target="_blank" href="https://dev.qweather.com/docs/start/glossary#locationid">此处</a>
                获取，稍后会推送更新添加城市检索方便您的设置。</div>
            <input class="setting_input" id="location_input" placeholder="请输入地点ID" />
            <h3>搜索引擎设置</h3>
            <div class="description">选择您的默认搜索引擎</div>
            <div class="search_target_box">
                <label>
                    <input type="radio" value="https://www.baidu.com/s?wd=" name="search_target" >
                    <p>百度<span>https://www.baidu.com/s?wd=</span></p>
                </label>
                <label>
                    <input type="radio" value="https://www.google.com.hk/search?q=" name="search_target">
                    <p>谷歌<span>https://www.google.com.hk/search?q=</span></p>
                </label>
                <label>
                    <input type="radio" value="https://www.bing.com/search?q=" name="search_target">
                    <p>必应<span>https://www.bing.com/search?q=</span></p>
                </label>
                <label>
                    <input type="radio" value="https://www.laomao.website/?search=" name="search_target">
                    <p>laomao<span>https://www.laomao.website/?search=</span></p>
                </label>
            </div>
        </div>
        <div class="footer">
            <button class="button default close_setting_dialog" id="cancel_button">取消</button>
            <button class="button primary" id="confirm_button">保存</button>
        </div>
    </div>
    <div class="dialog_mask close_setting_dialog" id="dialog_mask"></div>
</div>
