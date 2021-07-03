/**
 * main.js 主定义脚本
 * Create by Hanawa Hinata at 2019/05/06
 * Using PhpStorm
 */

import requestAction from './request.js';

let week_array = ["日", "一", "二", "三", "四", "五", "六"];


//脚本执行主入口
window.onload = function () {

    //为提交按钮绑定点击监听
    document.getElementById("submit_button").onclick = function () {
        search_now();
    };

    document.getElementById("random_website").onclick = function () {
        random_website();
    };

    document.getElementById("mail_function").onclick = function () {
        use_mail();
    };

    document.getElementById("setting_button").onclick = function () {
        open_setting_dialog();
    };

    document.getElementById("confirm_button").onclick = function () {
        save_setting();
    };

    let closeSettingButtonList = document.getElementsByClassName("close_setting_dialog");
    for(let i=0; i<closeSettingButtonList.length; i++){
        console.log(closeSettingButtonList[i]);
        closeSettingButtonList[i].onclick = function () {
            close_setting_dialog();
        };
    }

    document.getElementById("keyword_input").onkeypress = function (event) {
        if (event.keyCode === 13) {
            console.log(document.getElementById("keyword_input").value);
            search_now();
        }
    };

    get_news_list();
    get_position_weather();
};


//检查关键字是否为链接
// TODO: 应该用.分割字符串，判断最后一项是否与常用域名后缀 .com .net .cn 等匹配。
// TODO: 还应该校验是否为IP地址。
function checkKeywordIsUrl(keyword) {
    if (keyword.substr(0, 7) === 'http://' || keyword.substr(0, 8) === 'https://' || keyword.substr(0, 9) === 'chrome://') {
        return 'url';
    } else {
        return 'keyword';
    }
}


//发起搜索
// TODO: 自定义搜索引擎
function search_now() {
    let keyword = document.getElementById("keyword_input").value;
    if (checkKeywordIsUrl(keyword) === 'url') {
        window.location.assign(keyword);
    } else {
        //如果是链接，
        window.location.assign(get_search_target() + keyword);
    }
}


//随机站点
// TODO: 弹窗后的动画效果。具体跳转站点逻辑由后端实现返回给前端。
function random_website() {
    alert("手气不错！");
}


//收件箱

//撰写新邮件
// TODO: 邮箱功能变更为公告。
function use_mail() {
    if (confirm("目前 LaoMao 邮件系统托管在腾讯企业邮箱，点击确定进入企业邮箱登录页面。\n如果你想要一个账号，可以发送申请邮件到 admin@laomao.website ")) {
        window.location.assign('https://exmail.qq.com/cgi-bin/loginpage?t=loginpage_secondpwd');
    }
}

// 打开设置对话框
function open_setting_dialog(){
    document.getElementById("location_input").value = get_position();
    setRadioValue('search_target', get_search_target());
    document.getElementById("setting_dialog").classList.remove("hidden");
}

// 点击保存按钮
function save_setting(){
    let positionCode = document.getElementById("location_input").value;
    localStorage.setItem('position-code', positionCode);
    let searchTarget = getRadioValue('search_target');
    localStorage.setItem('search-target', searchTarget);
    close_setting_dialog();
    get_position_weather();
}

// 关闭设置对话框
function close_setting_dialog(){
    document.getElementById("setting_dialog").classList.add("hidden");
}

// 获取位置设置
function get_position(){
    // 先读缓存
    let positionCode = localStorage.getItem('position-code');
    return positionCode?positionCode:'101010100';
}

// 获取默认搜索引擎设置
function get_search_target(){
    // 先读缓存
    let searchTarget = localStorage.getItem('search-target');
    return searchTarget?searchTarget:'https://www.baidu.com/s?wd=';
}

// 封装的获取单选框值的方法
function getRadioValue(name){
    let inputList = document.getElementsByName(name);
    let checkedValue = null;
    for(let i=0;i<inputList.length; i++){
        console.log(inputList[i].checked);
        if(inputList[i].checked){
            checkedValue = inputList[i].value;
            break;
        }
    }
    return checkedValue;
}
function setRadioValue(name, value){
    let inputList = document.getElementsByName(name);
    for(let i=0;i<inputList.length; i++){
        inputList[i].checked = inputList[i].value === value;
    }
}

//获取当前最新的新闻并解析为json数组
function get_news_list() {
    requestAction.getAction("./api/v1/external/get_first_news.php").then((res) => {
        console.log("获取到的新闻信息：", res);
        document.getElementById("news_title").innerText = res.title;
        document.getElementById("news_time").innerText = '更新于：' + res.create_time;
        document.getElementById("news_content").innerHTML = res.content;
        document.getElementById("news_link").href = res.link;
        document.getElementById("news_cover").style = 'display:none';
    }).catch((err) => {
        console.error("获取失败。", err);
    })

}


//获取当前位置的天气
function get_position_weather() {
    let queryParam = {location: get_position()};
    requestAction.getAction('./api/v1/weather/get_current_weather.php', queryParam).then((res) => {
        console.log("请求结束。", res);

        // 更新所在地
        document.getElementById("address").innerText = res.city_info.adm1 + ' ' + res.city_info.name;
        // 更新星期
        let week = new Date().getDay();
        document.getElementById("week").innerText = '周' + week_array[week];

        // 更新天气
        document.getElementById("weather_image").title = res.weather_info.windDir + res.weather_info.windScale +
            '级 ' + res.weather_info.text;
        document.getElementById("weather_image").src = 'assets/images/heWeather/' + res.weather_info.icon + '.png';


    }).catch((err) => {
        console.error("请求出错。", err);
    })
}



//设置 Cookie
//  addCookie('surface','cookieMaxAge',Infinity);
//  addCookie('hunred-day','cookieMaxAge',100);
//  addCookie('Session','cookieMaxAge');
function addCookie(objName, objValue, objDays) {
    var str = objName + "=" + escape(objValue);
    console.log(Infinity);   //Infinity
    console.log(typeof Infinity);   //number
    console.log(Infinity.constructor); //function Number() { [native code] }
    if (objDays > 0) {
        var date = new Date();
        var ms = objDays * 24 * 3600 * 1000;
        date.setTime(date.getTime() + ms);
        str += "; expires=" + date.toGMTString();
    }
    if (objDays === Infinity) {
        str += "; expires=Fri, 31 Dec 9999 23:59:59 GMT";
    }

    str += "; path=/";
    document.cookie = str;
}

//获取GET值
function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
}
