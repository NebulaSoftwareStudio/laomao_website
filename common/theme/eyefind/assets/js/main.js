/**
 * main.js 主定义脚本
 * Create by Hanawa Hinata at 2019/05/06
 * Using PhpStorm
 */
import requestAction from './request.js';

const main = {
    data: {
        weekArray: ["日", "一", "二", "三", "四", "五", "六"],
        cityList: [],
        TLDsList: [],
    },
    methods: {
        // 初始化请求
        initialRequestFunction: function () {
            // 在站点列表或其他页面，不存在新闻div的情况下，不加载新闻
            if (document.getElementById("news_content")) {
                main.methods.getNewsList();
            }

            // 在手机视图或者其他视图中不显示天气的情况，不会调用此方法加载天气信息
            let weatherDom = document.getElementsByClassName("weather_box")[0];
            if (weatherDom && window.getComputedStyle(weatherDom).display !== 'none') {
                main.methods.getPositionWeather();
            }

            // 有设置对话框的页面，要预先回显地区设置
            let settingDom = document.getElementById("setting_dialog");
            if(settingDom){
                main.methods.initialLocationSelectOptions(main.methods.getPosition());
            }

            // 有搜索框的页面，预先加载所有顶级域名列表
            main.methods.getAllTLDsList();
        },

        //获取当前最新的新闻并解析为json数组
        getNewsList: function () {
            requestAction.getAction({
                url: "./api/v1/external/getFirstNews.php",
                success: function (res) {
                    // console.log("获取到的新闻信息：", res);
                    document.getElementById("news_title").innerText = res.title;
                    document.getElementById("news_time").innerText = '更新于：' + res.create_time;
                    document.getElementById("news_content").innerHTML = res.content;
                    // document.getElementById("news_link").href = "index.php?news="+res.ID+"&year="+res.create_time.substr(0, 4);
                    document.getElementById("news_link").href = res.link;
                    document.getElementById("news_cover").style = 'display:none';
                },
                fail: function (err) {
                    console.error("获取失败。", err);
                }
            })
        },

        //获取当前位置的天气
        getPositionWeather: function () {
            requestAction.getAction({
                url: "./api/v1/weather/getCurrentWeather.php",
                param: {
                    location: main.methods.getPosition()
                },
                success: function (res) {// 更新星期
                    let week = new Date().getDay();
                    document.getElementById("week").innerText = '周' + main.data.weekArray[week];
                    if (res.success) {
                        // 更新所在地
                        document.getElementById("address").innerText = res.city_info.adm1 + ' ' + res.city_info.name;
                        // 更新天气
                        document.getElementById("weather_image").title = res.weather_info.windDir + res.weather_info.windScale +
                            '级 ' + res.weather_info.text;
                        document.getElementById("weather_image").src = 'assets/images/heWeather/svg/' + res.weather_info.icon + '.svg';
                    } else {
                        document.getElementById("address").innerText = "获取位置信息失败";
                        document.getElementById("weather_image").title = "获取天气信息失败";
                        document.getElementById("weather_image").src = 'assets/images/heWeather/svg/999.svg';
                    }
                },
                fail: function (err) {
                    console.error("请求出错。", err);
                }
            })
        },


        //撰写新邮件
        // TODO: 邮箱功能变更为公告。
        useMail: function () {
            if (confirm("目前 LaoMao 邮件系统托管在腾讯企业邮箱，点击确定进入企业邮箱登录页面。\n如果你想要一个账号，可以发送申请邮件到 admin@laomao.website ")) {
                window.location.assign('https://exmail.qq.com/cgi-bin/loginpage?t=loginpage_secondpwd');
            }
        },

        //发起搜索
        // TODO: 自定义搜索引擎
        searchNow: function () {
            let keyword = document.getElementById("keyword_input").value;
            if (!keyword) {
                // 没有填写关键字，什么都不做。最多给个不能为空的提示。
            } else if (main.methods.checkKeywordIsUrl(keyword) === 'url') {
                // 如果是链接，应当直接跳转对应链接
                // window.location.assign(keyword);
                if (!(keyword.substr(0, 7) === 'http://' ||
                    keyword.substr(0, 8) === 'https://' ||
                    keyword.substr(0, 9) === 'chrome://' ||
                    keyword.substr(0, 6) === 'about:')) {
                    keyword = '//'+keyword;
                }
                window.open(keyword, '_blank');
            } else {
                // 将关键字带给指定的搜索引擎
                let searchTarget = main.methods.getSearchTarget();
                if (!(searchTarget.substr(0, 7) === 'http://' ||
                    searchTarget.substr(0, 8) === 'https://' ||
                    searchTarget.substr(0, 9) === 'chrome://' ||
                    searchTarget.substr(0, 6) === 'about:')) {
                    searchTarget = '//'+searchTarget;
                }
                window.location.assign(searchTarget + keyword);
            }
        },


        //随机站点
        // TODO: 弹窗后的动画效果。具体跳转站点逻辑由后端实现返回给前端。
        randomWebsite: function () {
            alert("手气不错！");
        },

        // 打开设置对话框
        openSettingDialog: function () {
            // 回显区域设置
            document.getElementById("location_input").value = main.methods.getPosition();
            // main.methods.initialLocationSelectOptions(main.methods.getPosition());
            // 回显搜索引擎设置
            main.methods.setRadioValue('search_target', localStorage.getItem('search-target'));
            document.getElementById("customSearchTarget").value = localStorage.getItem('custom-search-target');
            // 展示设置对话框
            document.getElementById("setting_dialog").classList.remove("hidden");
        },

        // 点击保存按钮
        saveSetting: function () {
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
            let searchTarget = main.methods.getRadioValue('search_target');
            let latestSearchTarget = localStorage.getItem('search-target');
            let customSearchTarget = document.getElementById("customSearchTarget").value;
            let latestCustomSearchTarget = localStorage.getItem('custom-search-target');
            // 判断之前的设置与现在的设置是否相同
            // 只有在不相同的时候才会更新本地缓存的设置
            if (searchTarget !== latestSearchTarget) {
                localStorage.setItem('search-target', searchTarget);
                // 如果是自定义搜索引擎
                if (searchTarget === 'custom') {
                    // 另外存储自定义搜索引擎配置
                    localStorage.setItem("custom-search-target", customSearchTarget);
                }
            } else {
                // 相同的情况下，要进一步判断自定义搜索引擎中的文字是否有改变
                if (latestCustomSearchTarget !== customSearchTarget) {
                    localStorage.setItem("custom-search-target", customSearchTarget);
                }
            }

            main.methods.closeSettingDialog();
            main.methods.getPositionWeather();
        },

        // 关闭设置对话框
        closeSettingDialog: function () {
            document.getElementById("setting_dialog").classList.add("hidden");
            document.getElementById("positionSelectList").classList.add("hidden");
        },

        // 获取位置设置
        getPosition: function () {
            // 先读缓存
            let positionCode = localStorage.getItem('position-code');
            return positionCode ? positionCode : '101010100';
        },

        // 获取默认搜索引擎设置
        getSearchTarget: function () {
            // 先读缓存
            let searchTarget = localStorage.getItem('search-target');
            if (searchTarget) {
                if (searchTarget === 'custom') {
                    searchTarget = localStorage.getItem('custom-search-target');
                }
            } else {
                searchTarget = 'https://www.baidu.com/s?wd='
            }
            return searchTarget;
        },


        // 根据关键字检索地区
        searchAreaByKeyword: function (keyword) {
            if (keyword != null && keyword !== '') {
                requestAction.getAction({
                    url: "./api/v1/weather/getCityListByKeyword.php",
                    param: {
                        keyword: keyword
                    },
                    success: function (res) {
                        console.log(res);
                        if (res.success) {
                            main.data.cityList = res.result;
                        } else {
                            main.data.cityList = [];
                        }
                        main.methods.renderSearchAreaResultList()
                    },
                    fail: function (err) {
                        main.data.cityList = [];
                        main.methods.renderSearchAreaResultList()
                        console.error("请求出错。", err)
                    }
                })
            } else {
                main.data.cityList = [];
                main.methods.renderSearchAreaResultList()
            }
        },

        // 渲染检索结果
        renderSearchAreaResultList: function () {
            let list = main.data.cityList;
            let html = "";
            if (list.length > 0) {
                for (let i = 0; i < list.length; i++) {
                    html += " <div class=\"item\" data-id='" + list[i].Location_ID + "' " +
                        "data-name='" + list[i].Location_Name_ZH + "'>\n" +
                        "<div class=\"text\">" + list[i].Adm1_Name_ZH + "</div>\n" +
                        "<div class=\"link\">-</div>\n" +
                        "<div class=\"text\">" + list[i].Adm2_Name_ZH + "</div>\n" +
                        "<div class=\"link\">-</div>\n" +
                        "<div class=\"text\">" + list[i].Location_Name_ZH + "</div>\n" +
                        "</div>";
                }
            } else {
                html += "<div class='tips'>当前条件没有搜索结果</div>";
            }
            document.getElementById("positionSelectList").innerHTML = html;
        },

        // 根据当前设置的区域位置回显下拉选项
        initialLocationSelectOptions: function (locationId) {
            // 根据ID获取城市信息
            requestAction.getAction({
                url: "./api/v1/weather/getCityInfoByLocationId.php",
                param: {
                    locationId: locationId
                },
                success: function (res) {
                    if(res.success){
                        document.getElementById("locationSearchInput").value = res.result.Location_Name_ZH;
                    }else{
                        document.getElementById("locationSearchInput").value = "";
                    }
                },
                fail: function (err) {
                    document.getElementById("locationSearchInput").value = '';
                    console.error("请求出错。", err)
                }
            })
        },


        /**
         * 一些封装的常用操作
         */
        // 封装的获取单选框值的方法
        getRadioValue: function (name) {
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
        },

        // 封装的设置单选框值的方法
        setRadioValue: function (name, value) {
            let inputList = document.getElementsByName(name);
            for (let i = 0; i < inputList.length; i++) {
                inputList[i].checked = inputList[i].value === value;
            }
        },

        //获取GET值
        getQueryString: function (name) {
            let reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
            let r = window.location.search.substr(1).match(reg);
            if (r != null) return unescape(r[2]);
            return null;
        },

        // 检查关键字是否为链接
        // TODO: 中文顶级域名在数据库中存储的是转码后的结果，但是输入的时候肯定是中文汉字，这里需要处理转码
        checkKeywordIsUrl: function (keyword) {
            let type = "keyword";
            let IPPattern = /([1-9]?\d|1\d{2}|2[0-4]\d|25[0-5])(\.([1-9]?\d|1\d{2}|2[0-4]\d|25[0-5])){3}$/;
            let pathPattern = /\/$/
            let TLDsPattern = /\.([^.]*)$/
            if(IPPattern.test(keyword)){
                type = "url";
            }else if(pathPattern.test(keyword)){
                type = "url"
            } else if (keyword.substr(0, 7) === 'http://' ||
                keyword.substr(0, 8) === 'https://' ||
                keyword.substr(0, 9) === 'chrome://' ||
                keyword.substr(0, 6) === 'about:') {
                type = "url";
            }else if(TLDsPattern.test(keyword)){
                let tldString = keyword.match(TLDsPattern);
                if(tldString.length > 0){
                    tldString = tldString[0];
                }
                if(main.methods.patternTLDsList(tldString)){
                    type = "url";
                }
            }

            return type;
        },

        // 获取互联网上所有的顶级域名后缀
        getAllTLDsList: function (){
            requestAction.getAction({
                url: "./api/v1/external/getTLDsList.php",
                success: function (res) {
                    console.log(res);
                    if (res.success) {
                        main.data.TLDsList = res.result;
                    } else {
                        main.data.TLDsList = [];
                    }
                },
                fail: function (err) {
                    main.data.TLDsList = [];
                    console.error("请求出错。", err)
                }
            })
        },

        // 匹配顶级域名后缀
        patternTLDsList: function (tldString){
            console.log(tldString);
            let index = main.data.TLDsList.findIndex((item) => {
                return "."+item.tld === tldString
            })
            return index > -1;
        }

    },
    created: function () {
        //为提交搜索按钮绑定点击监听
        if (document.getElementById("submit_button")) {
            document.getElementById("submit_button").onclick = function () {
                main.methods.searchNow();
            };
        }

        // 随机站点
        if (document.getElementById("random_website")) {
            document.getElementById("random_website").onclick = function () {
                main.methods.randomWebsite();
            };
        }

        // 打开邮件
        if (document.getElementById("mail_function")) {
            document.getElementById("mail_function").onclick = function () {
                main.methods.useMail();
            };
        }

        // 打开设置对话框
        if (document.getElementById("setting_button")) {
            document.getElementById("setting_button").onclick = function () {
                main.methods.openSettingDialog();
            };
        }

        // 区域输入检索
        if (document.getElementById("locationSearchInput")) {
            document.getElementById("locationSearchInput").onfocus = function (e) {
                document.getElementById("positionSelectList").classList.remove("hidden");
            };
            document.getElementById("locationSearchInput").oninput = function (e) {
                main.methods.searchAreaByKeyword(e.target.value)
            };
        }

        // 选择一个下拉地区
        if (document.getElementById("positionSelectList")) {
            document.getElementById("positionSelectList").onclick = function (e) {
                let id = e.target.dataset.id ? e.target.dataset.id :
                    (e.target.parentNode.dataset.id ? e.target.parentNode.dataset.id : '');
                let name = e.target.dataset.name ? e.target.dataset.name :
                    (e.target.parentNode.dataset.name ? e.target.parentNode.dataset.name : '');
                document.getElementById("location_input").value = id;
                document.getElementById("locationSearchInput").value = name;
                document.getElementById("positionSelectList").classList.add("hidden");
            };
        }

        // 保存设置对话框按钮
        if (document.getElementById("confirm_button")) {
            document.getElementById("confirm_button").onclick = function () {
                main.methods.saveSetting();
            };
        }

        // 关闭对话框按钮
        let closeSettingButtonList = document.getElementsByClassName("close_setting_dialog");
        for (let i = 0; i < closeSettingButtonList.length; i++) {
            // console.log(closeSettingButtonList[i]);
            closeSettingButtonList[i].onclick = function () {
                main.methods.closeSettingDialog();
            };
        }

        // 回车发起搜索
        document.getElementById("keyword_input").onkeypress = function (event) {
            if (event.keyCode === 13) {
                main.methods.searchNow();
            }
        };

        // 初始化天气及相关接口请求
        main.methods.initialRequestFunction();
    }
};


//脚本执行主入口
(function () {
    main.created();
})();
