
<!-- footer start -->
<div class="footer">
    <!--    <p>金华市人民政府办公厅主办 金华市城市信息管理运维中心维护</p>-->
    <p>建议1920*1080分辨率及80%放大比率、<a
            href="https://www.google.cn/chrome/" target="_blank">Chrome（或包含其内核）浏览器访问本站</a></p>
    <p>
        <a href="<?php echo $baseUrl ?? '' ?>?page=about&classify=EULA">服务条款与隐私权政策</a>
        |
        <a href="<?php echo $baseUrl ?? '' ?>?page=about&classify=about">关于本站</a>
        |
        <a href="<?php echo $baseUrl ?? '' ?>?page=about&classify=license">开放源代码许可</a>
        |
        <a href="<?php echo $baseUrl ?? '' ?>update-note/">最新变化</a>

    </p>
    <p>&copy;<?php echo date('Y'); ?> <a href="https://www.nebula-soft.com/" target="_blank">Nebula Software Studio</a> AllRight Reserved. <a
            href="https://beian.miit.gov.cn/" target="_blank">鲁ICP备10596363号</a><br>
    </p>
</div>
<!-- footer end -->


<!--外部JavaScript脚本-->
<script type="module" src="<?php echo $baseUrl ?? '' ?>assets/js/main.js?v=<?php echo $GLOBALS['SITE_VERSION'] ?? '' ?>"></script>
