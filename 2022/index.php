<?php
/**
 * laomao 2022 新闻时间线专题
 * Update on 2022/09/18
 */

// 获取当前时间戳
if (time() < 1672502400 && !isset($_GET["mode"])) {
    require "comesoon.php";
} else{
    require "2022.php";
}

