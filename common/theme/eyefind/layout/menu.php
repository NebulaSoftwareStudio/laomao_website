
<div class="head">
    <!-- 顶部的logo和邮件功能、天气、周、位置信息 -->
    <div class="brand_box">
        <!-- 左侧的logo和邮件功能 -->
        <div class="logo_box">
            <a href="./">
                <img class="logo" alt="LaoMao logo" src="<?php echo $baseUrl ?? '' ?>assets/images/laomao_logo.png"/>
            </a>
            <div class="mail_function" >
                <div class="item" id="mail_function">
                    <img src="<?php echo $baseUrl ?? '' ?>assets/images/mail.png" alt/>
                    <span>邮件</span>
                </div>
                <div class="item" id="setting_button">
                    <img src="<?php echo $baseUrl ?? '' ?>assets/images/edit.png" alt/>
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
            <a href="//www.qweather.com/" target="_blank">
                <img id="weather_image" alt src="<?php echo $baseUrl ?? '' ?>assets/images/heWeather/svg/999.svg"/>
            </a>
        </div>
    </div>

    <!-- 顶部的搜索框 -->
    <div class="search_box">
        <div class="input">
            <img class="icon" alt src="<?php echo $baseUrl ?? '' ?>assets/images/search.png"/>
            <input type="text" value="<?php echo isset($_GET["search"])?$_GET["search"]:''; ?>" id="keyword_input" placeholder="搜索或键入网址…" maxlength="38"/>
        </div>
        <div class="button_box">
            <div class="button" id="submit_button">发起检索</div>
            <div class="button" id="random_website">随机站点</div>
        </div>
    </div>
</div>


<!--<a href="/2020" class="announcement">-->
<!--    <div class="title">欢迎查看 2020 年新闻时间线</div>-->
<!--</a>-->
<!--<a href="./about-shipwrecks-collection/" class="announcement">-->
<!--    <div class="title">关于 GTA 在线模式中沉船碎片的位置确认技巧</div>-->
<!--</a>-->
<!--<a href="https://tieba.baidu.com/p/7576816281" class="announcement">-->
    <!--<div class="title">万圣节预热活动：UFO 观光事件现已启用</div>-->
<!--</a>-->
<!--<a href="/2021" class="announcement">-->
<!--    <div class="title">欢迎查看 2021 年新闻时间线</div>-->
<!--</a>-->
<!--<a href="./against-the-invasion-of-Ukraine" class="announcement">-->
<!--    <div class="title">俄罗斯对乌克兰的入侵与我们的态度</div>-->
<!--</a>-->
<!--<a href="https://www.ceair.com/global/static/Announcement/AnnouncementMessage/notices/202203/t20220321_21223.html" class="announcement">-->
<!--    <div class="title">中国东方航空5735号班机空难</div>-->
<!--</a>-->
<div class="announcement"></div>


<div class="nav">
    <div class="list">
        <a href="<?php echo $baseUrl ?? '' ?>?search=媒体与娱乐" title="媒体与娱乐" class="item">
            <img class="icon" src="<?php echo $baseUrl ?? '' ?>assets/images/phone.png" alt/>
            <div class="name">媒体<br/>与娱乐</div>
        </a>

        <a href="<?php echo $baseUrl ?? '' ?>?search=工作与生产" title="工作与生产" class="item">
            <img class="icon" src="<?php echo $baseUrl ?? '' ?>assets/images/search.png" alt/>
            <div class="name">工作<br/>与生产</div>
        </a>

        <a href="<?php echo $baseUrl ?? '' ?>?search=金融与服务" title="金融与服务" class="item">
            <img class="icon" src="<?php echo $baseUrl ?? '' ?>assets/images/money.png" alt/>
            <div class="name">金融<br/>与服务</div>
        </a>

        <a href="<?php echo $baseUrl ?? '' ?>?search=旅游与交通" title="旅游与交通" class="item left_border_black">
            <img class="icon" src="<?php echo $baseUrl ?? '' ?>assets/images/fly.png" alt/>
            <div class="name">旅游<br/>与交通</div>
        </a>

        <a href="<?php echo $baseUrl ?? '' ?>?search=时尚与健康" title="时尚与健康" class="item left_border_black">
            <img class="icon" src="<?php echo $baseUrl ?? '' ?>assets/images/bags.png" alt/>
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
<!--            <div class="description">LocationId可通过-->
<!--                <a target="_blank" href="https://dev.qweather.com/docs/start/glossary#locationid">此处</a>-->
<!--                获取，稍后会推送更新添加城市检索方便您的设置。</div>-->
            <input class="setting_input" id="location_input" style="display: none;" placeholder="请输入地点ID" />
            <div class="location_select_box">
                <input class="setting_input" id="locationSearchInput" placeholder="请输入地点名称检索…" />
                <div class="location_select_list hidden" id="positionSelectList">
                    <div class='tips'>请输入关键字…</div>
                </div>
            </div>
            <h3>搜索引擎设置</h3>
            <div class="description">选择您的默认搜索引擎</div>
            <div class="search_target_box">
                <label>
                    <input type="radio" value="https://www.google.com.hk/search?q=" name="search_target">
                    <p>谷歌<span>https://www.google.com.hk/search?q=</span></p>
                </label>
                <label>
                    <input type="radio" value="https://www.baidu.com/s?wd=" name="search_target" >
                    <p>百度<span>https://www.baidu.com/s?wd=</span></p>
                </label>
                <label>
                    <input type="radio" value="https://www.bing.com/search?q=" name="search_target">
                    <p>必应<span>https://www.bing.com/search?q=</span></p>
                </label>
                <label>
                    <input type="radio" value="https://fsoufsou.com/search?q=" name="search_target">
                    <p>fSou<span>https://fsoufsou.com/search?q=</span></p>
                </label>
                <label>
                    <input type="radio" value="https://www.laomao.website/?search=" name="search_target">
                    <p>laomao<span>https://www.laomao.website/?search=</span></p>
                </label>
                <label>
                    <input type="radio" value="https://magi.com/search?q=" name="search_target">
                    <p style="text-decoration:line-through;">Magi<span>【已暂停服务】https://magi.com/search?q=</span></p>
                </label>
                <label>
                    <input type="radio" value="custom" name="search_target">
                    <p>自定义<input id="customSearchTarget" /></p>
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
