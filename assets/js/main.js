/**
 * main.js 主定义脚本
 * Create by Hanawa Hinata at 2019/05/06
 * Using PhpStorm
 */

import requestAction from './request.js';

let weekArray = ["日", "一", "二", "三", "四", "五", "六"];

let cityList = [];


//脚本执行主入口
window.onload = function () {

    //为提交搜索按钮绑定点击监听
    if(document.getElementById("submit_button")){
        document.getElementById("submit_button").onclick = function () {
            searchNow();
        };
    }

    // 随机站点
    if(document.getElementById("random_website")){
        document.getElementById("random_website").onclick = function () {
            randomWebsite();
        };
    }

    // 打开邮件
    if(document.getElementById("mail_function")){
        document.getElementById("mail_function").onclick = function () {
            useMail();
        };
    }

    // 打开设置对话框
    if(document.getElementById("setting_button")){
        document.getElementById("setting_button").onclick = function () {
            openSettingDialog();
        };
    }

    // 保存设置对话框按钮
    if(document.getElementById("confirm_button")){
        document.getElementById("confirm_button").onclick = function () {
            saveSetting();
        };
    }

    // 关闭对话框按钮
    let closeSettingButtonList = document.getElementsByClassName("close_setting_dialog");
    for (let i = 0; i < closeSettingButtonList.length; i++) {
        // console.log(closeSettingButtonList[i]);
        closeSettingButtonList[i].onclick = function () {
            closeSettingDialog();
        };
    }

    // 回车发起搜索
    document.getElementById("keyword_input").onkeypress = function (event) {
        if (event.keyCode === 13) {
            // console.log(document.getElementById("keyword_input").value);
            searchNow();
        }
    };

    initialRequestFunction();
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
function searchNow() {
    let keyword = document.getElementById("keyword_input").value;
    if(!keyword){
        // 没有填写关键字，什么都不做。最多给个不能为空的提示。
    } else if (checkKeywordIsUrl(keyword) === 'url') {
        // 如果是链接，应当直接跳转对应链接
        window.location.assign(keyword);
    } else {
        // 将关键字带给指定的搜索引擎
        window.location.assign(getSearchTarget() + keyword);
    }
}


//随机站点
// TODO: 弹窗后的动画效果。具体跳转站点逻辑由后端实现返回给前端。
function randomWebsite() {
    alert("手气不错！");
}


//收件箱

//撰写新邮件
// TODO: 邮箱功能变更为公告。
function useMail() {
    if (confirm("目前 LaoMao 邮件系统托管在腾讯企业邮箱，点击确定进入企业邮箱登录页面。\n如果你想要一个账号，可以发送申请邮件到 admin@laomao.website ")) {
        window.location.assign('https://exmail.qq.com/cgi-bin/loginpage?t=loginpage_secondpwd');
    }
}

// 打开设置对话框
function openSettingDialog() {
    // 回显区域设置
    document.getElementById("location_input").value = getPosition();
    initialLocationSelectOptions(getPosition());
    // 回显搜索引擎设置
    setRadioValue('search_target', localStorage.getItem('search-target'));
    document.getElementById("customSearchTarget").value = localStorage.getItem('custom-search-target');
    // 展示设置对话框
    document.getElementById("setting_dialog").classList.remove("hidden");
}

// 点击保存按钮
function saveSetting() {
    let positionCode = document.getElementById("location_input").value;
    let latestPositionCode = localStorage.getItem('position-code');
    // 判断之前的设置与现在的设置是否相同
    // 只有不相同的时候才会更新界面上的位置、天气数据和本地缓存
    if (latestPositionCode !== positionCode) {
        // 更新所在地
        document.getElementById("address").innerText = '定位中···';
        document.getElementById("week").innerText = '-';
        // 更新天气
        document.getElementById("weather_image").title = "";
        document.getElementById("weather_image").src = 'assets/images/heWeather/100.png';
        // 更新设置
        localStorage.setItem('position-code', positionCode);
    }
    let searchTarget = getRadioValue('search_target');
    let latestSearchTarget = localStorage.getItem('search-target');
    let customSearchTarget = document.getElementById("customSearchTarget").value;
    let latestCustomSearchTarget = localStorage.getItem('custom-search-target');
    // 判断之前的设置与现在的设置是否相同
    // 只有在不相同的时候才会更新本地缓存的设置
    if (searchTarget !== latestSearchTarget) {
        localStorage.setItem('search-target', searchTarget);
        // 如果是自定义搜索引擎
        if(searchTarget === 'custom'){
            // 另外存储自定义搜索引擎配置
            localStorage.setItem("custom-search-target", customSearchTarget);
        }
    }else{
        // 相同的情况下，要进一步判断自定义搜索引擎中的文字是否有改变
        if(latestCustomSearchTarget !== customSearchTarget){
            localStorage.setItem("custom-search-target", customSearchTarget);
        }
    }

    closeSettingDialog();
    getPositionWeather();
}

// 关闭设置对话框
function closeSettingDialog() {
    document.getElementById("setting_dialog").classList.add("hidden");
}

// 获取位置设置
function getPosition() {
    // 先读缓存
    let positionCode = localStorage.getItem('position-code');
    return positionCode ? positionCode : '101010100';
}

// 获取默认搜索引擎设置
function getSearchTarget() {
    // 先读缓存
    let searchTarget = localStorage.getItem('search-target');
    if(searchTarget){
        if(searchTarget === 'custom'){
            searchTarget = localStorage.getItem('custom-search-target');
        }
    }else{
        searchTarget = 'https://www.baidu.com/s?wd='
    }
    return searchTarget;
}

// 封装的获取单选框值的方法
function getRadioValue(name) {
    let inputList = document.getElementsByName(name);
    let checkedValue = null;
    for (let i = 0; i < inputList.length; i++) {
        // console.log(inputList[i].checked);
        if (inputList[i].checked) {
            checkedValue = inputList[i].value;
            break;
        }
    }
    return checkedValue;
}

// 封装的设置单选框值的方法
function setRadioValue(name, value) {
    let inputList = document.getElementsByName(name);
    for (let i = 0; i < inputList.length; i++) {
        inputList[i].checked = inputList[i].value === value;
    }
}

// 初始化请求
function initialRequestFunction() {
    // 在站点列表或其他页面，不存在新闻div的情况下，不加载新闻
    if (document.getElementById("news_content")) {
        getNewsList();
    }

    // 在手机视图或者其他视图中不显示天气的情况，不会调用此方法加载天气信息
    let weatherDom = document.getElementsByClassName("weather_box")[0];
    if (weatherDom && window.getComputedStyle(weatherDom).display !== 'none') {
        getPositionWeather();
    }

    // 有设置对话框的页面，要预先加载城市列表
    getAllLocation();
}

//获取当前最新的新闻并解析为json数组
function getNewsList() {
    requestAction.getAction({
        url: "./api/v1/external/get_first_news.php",
        success: function (res) {
            // console.log("获取到的新闻信息：", res);
            document.getElementById("news_title").innerText = res.title;
            document.getElementById("news_time").innerText = '更新于：' + res.create_time;
            document.getElementById("news_content").innerHTML = res.content;
            document.getElementById("news_link").href = res.link;
            document.getElementById("news_cover").style = 'display:none';
        },
        fail: function (err) {
            console.error("获取失败。", err);
        }
    })
}


//获取当前位置的天气
function getPositionWeather() {
    requestAction.getAction({
        url: "./api/v1/weather/get_current_weather.php",
        param: {
            location: getPosition()
        },
        success: function (res) {
            // 更新星期
            let week = new Date().getDay();
            document.getElementById("week").innerText = '周' + weekArray[week];
            // 更新所在地
            document.getElementById("address").innerText = res.city_info.adm1 + ' ' + res.city_info.name;
            // 更新天气
            document.getElementById("weather_image").title = res.weather_info.windDir + res.weather_info.windScale +
                '级 ' + res.weather_info.text;
            document.getElementById("weather_image").src = 'assets/images/heWeather/svg/' + res.weather_info.icon + '.svg';
        },
        fail: function (err) {
            console.error("请求出错。", err);
        }
    })
}

/**
 * 省市县三级联动逻辑
 */
// 获取所有的县/区级列表
function getAllLocation () {
    let locationList = [];
    requestAction.getAction({
        url: "./api/v1/weather/getCityList.php",
        success: function (res){
            console.log(res);
            cityList = res;
        },
        fail: function (){
            console.error("请求出错。", err);
        }
    })
}

// 根据当前设置的区域位置回显下拉选项
function initialLocationSelectOptions (locationId) {
    // 从 cityList 中查找当前 locationId 对应的区域
    let cityItem = {}, cityFilterList = cityList.filter((item) => {
        return item.Location_ID === locationId
    })
    console.log(cityFilterList);
    if(cityFilterList.length > 0){
        cityItem = cityFilterList[0];
    }
    // TODO: 根据选出的区域信息回显上级省市
}


/**
 * 其他操作
 */
//设置 Cookie
//  addCookie('surface','cookieMaxAge',Infinity);
//  addCookie('hunred-day','cookieMaxAge',100);
//  addCookie('Session','cookieMaxAge');
function addCookie(objName, objValue, objDays) {
    let str = objName + "=" + escape(objValue);
    // console.log(Infinity);   //Infinity
    // console.log(typeof Infinity);   //number
    // console.log(Infinity.constructor); //function Number() { [native code] }
    if (objDays > 0) {
        let date = new Date();
        let ms = objDays * 24 * 3600 * 1000;
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
    let reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    let r = window.location.search.substr(1).match(reg);
    if (r != null) return unescape(r[2]);
    return null;
}
