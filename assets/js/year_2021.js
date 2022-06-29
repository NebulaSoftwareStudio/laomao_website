/**
 * 欢迎查看 2021 年新闻时间线 界面操作脚本
 * Create by Hanawa Hinata at 2021/12/19
 * Using PhpStorm
 */

import requestAction from './request.js';

let week_array = ["日", "一", "二", "三", "四", "五", "六"];

let month_object = {
    "January": {month: '2021-01', currentPage: 0, total: 0, loading: false},
    "February": {month: '2021-02', currentPage: 0, total: 0, loading: false},
    "March": {month: '2021-03', currentPage: 0, total: 0, loading: false},
    "April": {month: '2021-04', currentPage: 0, total: 0, loading: false},
    "May": {month: '2021-05', currentPage: 0, total: 0, loading: false},
    "June": {month: '2021-06', currentPage: 0, total: 0, loading: false},
    "July": {month: '2021-07', currentPage: 0, total: 0, loading: false},
    "August": {month: '2021-08', currentPage: 0, total: 0, loading: false},
    "September": {month: '2021-09', currentPage: 0, total: 0, loading: false},
    "October": {month: '2021-10', currentPage: 0, total: 0, loading: false},
    "November": {month: '2021-11', currentPage: 0, total: 0, loading: false},
    "December": {month: '2021-12', currentPage: 0, total: 0, loading: false},
}


//脚本执行主入口
window.onload = function () {

    for (let index in month_object) {
        getNewsList(index);
        addLoadMoreClickListener(index);
    }

    document.getElementById("newYearKotoba").onclick = newYearKotoba;

    let closeNewsDetailButtonList = document.getElementsByClassName("close_news_detail_dialog");
    for(let i=0; i<closeNewsDetailButtonList.length; i++){
        closeNewsDetailButtonList[i].onclick = function () {
            closeNewsDetailDialog();
        };
    }

    document.getElementById("return_top").onclick = function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    }
};


//获取新闻列表
function getNewsList(monthIndex) {
    if (!month_object[monthIndex].loading) {
        let queryParam = {
            year: 2021,
            month: month_object[monthIndex].month,
            page: month_object[monthIndex].currentPage,
            pageSize: month_object[monthIndex].currentPage===0?11:12,
        }
        month_object[monthIndex].loading = true;

        requestAction.getAction({
            url: "../api/v1/external/get_news_by_month.php",
            param: queryParam,
            success: function (res) {
                //赋值
                month_object[monthIndex].total = res.total_count;
                //判断有没有返回数据
                if (res.news_list.length > 0) {
                    renderAppendNewsList(monthIndex, res.news_list);
                    month_object[monthIndex].currentPage += 1;
                } else {
                    //判断是不是第一页。如果第一页都没查出来，那这一月就是空的
                    if (month_object[monthIndex].currentPage === 0) {
                        renderAppendBlankList(monthIndex)
                    }
                    let dom = document.getElementById(monthIndex);
                    let list = dom.getElementsByClassName("month_news_list")[0];
                    list.removeChild(list.children[list.children.length-1]);
                }
                month_object[monthIndex].loading = false;
            },
            fail: function (err) {
                month_object[monthIndex].loading = false;
                console.log("错误", err, monthIndex);
            }
        })

    } else {

    }

}


function renderAppendNewsList(index, newsList) {
    let dom = document.getElementById(index);
    let list = dom.getElementsByClassName("month_news_list")[0];
    list.removeChild(list.children[list.children.length-1]);
    for (let i = 0; i < newsList.length; i++) {
        let html = "<div class=\"news_item "+(newsList[i].is_primary==='1'?'primary':'')+"\" id=\"news_item_"+newsList[i].ID+"\">\n" +
            "            <div class=\"topic\">\n" +
            ((newsList[i].topic_image != null && newsList[i].topic_image !== '') ? ("<div style='width: calc(100% + 40px);\n" +
                "    margin: -20px;\n" +
                "    height: calc(100% + 40px);\n" +
                "    background-size: cover; background-position: center center;\n" +
                "    background-repeat: no-repeat; background-image: url(.." + newsList[i].topic_image + ")'  ></div>") : ("<p>" + newsList[i].description + "</p>")) +
            "            </div>\n" +
            "            <div class=\"info\">\n" +
            "                <div class=\"time\">" + newsList[i].create_time + " - 暂无分类</div>\n" +
            "                <div class=\"title\">" + newsList[i].title + "</div>\n" +
            "            </div>\n" +
            "        </div>";
        list.appendChild(parseElement(html));
        // 为新闻item添加监听
        let newsItemDomTarget = document.getElementById("news_item_"+newsList[i].ID);
        newsItemDomTarget.onclick = function () {
            openNewsDetailDialog(newsList[i].ID);
        };
    }
    if(newsList.length > 0){
        list.appendChild(parseElement("<div class=\"load_more\">加载更多</div>"))
        addLoadMoreClickListener(index);
    }
}

function renderAppendBlankList(index) {
    let dom = document.getElementById(index);
    let list = dom.getElementsByClassName("month_news_list")[0];
    let html = "<div class=\"no_content\">\n" +
        "            <svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"\n" +
        "                 style=\"margin-top:-20px;display:block;\" width=\"100px\" height=\"100px\" viewBox=\"0 0 100 100\" preserveAspectRatio=\"xMidYMid\">\n" +
        "                <g>\n" +
        "                    <circle cx=\"60\" cy=\"50\" r=\"4\" fill=\"#e15b64\">\n" +
        "                        <animate attributeName=\"cx\" repeatCount=\"indefinite\" dur=\"1s\" values=\"95;35\" keyTimes=\"0;1\" begin=\"-0.67s\"></animate>\n" +
        "                        <animate attributeName=\"fill-opacity\" repeatCount=\"indefinite\" dur=\"1s\" values=\"0;1;1\" keyTimes=\"0;0.2;1\" begin=\"-0.67s\"></animate>\n" +
        "                    </circle>\n" +
        "                    <circle cx=\"60\" cy=\"50\" r=\"4\" fill=\"#e15b64\">\n" +
        "                        <animate attributeName=\"cx\" repeatCount=\"indefinite\" dur=\"1s\" values=\"95;35\" keyTimes=\"0;1\" begin=\"-0.33s\"></animate>\n" +
        "                        <animate attributeName=\"fill-opacity\" repeatCount=\"indefinite\" dur=\"1s\" values=\"0;1;1\" keyTimes=\"0;0.2;1\" begin=\"-0.33s\"></animate>\n" +
        "                    </circle>\n" +
        "                    <circle cx=\"60\" cy=\"50\" r=\"4\" fill=\"#e15b64\">\n" +
        "                        <animate attributeName=\"cx\" repeatCount=\"indefinite\" dur=\"1s\" values=\"95;35\" keyTimes=\"0;1\" begin=\"0s\"></animate>\n" +
        "                        <animate attributeName=\"fill-opacity\" repeatCount=\"indefinite\" dur=\"1s\" values=\"0;1;1\" keyTimes=\"0;0.2;1\" begin=\"0s\"></animate>\n" +
        "                    </circle>\n" +
        "                </g><g transform=\"translate(-15 0)\">\n" +
        "                    <path d=\"M50 50L20 50A30 30 0 0 0 80 50Z\" fill=\"#f8b26a\" transform=\"rotate(90 50 50)\"></path>\n" +
        "                    <path d=\"M50 50L20 50A30 30 0 0 0 80 50Z\" fill=\"#f8b26a\">\n" +
        "                        <animateTransform attributeName=\"transform\" type=\"rotate\" repeatCount=\"indefinite\" dur=\"1s\" values=\"0 50 50;45 50 50;0 50 50\" keyTimes=\"0;0.5;1\"></animateTransform>\n" +
        "                    </path>\n" +
        "                    <path d=\"M50 50L20 50A30 30 0 0 1 80 50Z\" fill=\"#f8b26a\">\n" +
        "                        <animateTransform attributeName=\"transform\" type=\"rotate\" repeatCount=\"indefinite\" dur=\"1s\" values=\"0 50 50;-45 50 50;0 50 50\" keyTimes=\"0;0.5;1\"></animateTransform>\n" +
        "                    </path>\n" +
        "                </g>\n" +
        "            </svg>\n" +
        "            <p>这个月没有发生任何事</p>\n" +
        "        </div>";
    list.appendChild(parseElement(html));
}

function addLoadMoreClickListener(index) {
    let dom = document.getElementById(index);
    let button = dom.getElementsByClassName("load_more")[0];
    // let button = dom[5];
    // button.addEventListener('click',getNewsList(index));
    button.onclick = function () {
        getNewsList(index);
    }
}

function parseElement(htmlString) {
    return new DOMParser().parseFromString(htmlString, 'text/html').body.childNodes[0]
}

// 打开新闻详情对话框
function openNewsDetailDialog(id){
    console.log(id);
    requestAction.getAction({
        url: "../api/v1/external/getSingleNews.php",
        param: {
            year: 2021,
            id: id
        },
        success: function (res) {
            console.log("查看新闻详情：", res);
            document.getElementById("news_title").innerText = res.title;
            document.getElementById("news_time").innerText = res.create_time;
            document.getElementById("news_classify").innerText = res.classify?res.classify:"暂无分类";
            document.getElementById("news_text").innerHTML = res.content.replaceAll("<p><img src=\"https://img.solidot.org//0/446/liiLIZF8Uh6yM.jpg\" height=\"120\" style=\"display:block\"/></p>", "");
            if(res.topic_image){
                document.getElementById("news_topic").style.backgroundImage = "url(../"+res.topic_image+")"
            }
            else{
                document.getElementById("news_topic").style.backgroundImage = "url('../assets/images/year_2021/banner2.jpg')"
            }
            document.getElementById("news_detail_dialog").classList.remove("hidden");
        }
    });
}

function newYearKotoba(){
    document.getElementById("news_title").innerText = "阳光照不到所有阴暗的角落，但爱让我们有勇气走到阳光下。";
    document.getElementById("news_time").innerText = "2021年12月31日";
    document.getElementById("news_classify").innerText = "story.nesg.club";
    document.getElementById("news_text").innerHTML = "<p>我们正站在历史的关隘前。去年历经过绝望的我们，终于在今年见到了依稀的奇迹。</p>\n" +
        "            <p>抛开传统的说法，我们终归到岁末了。中国人尊重传统也尊重现代，有两个年过，搞得我不知如何是好。“但既说是新年，炖只鸡吃吃，是个好主意罢”。我也本这样想着。</p>\n" +
        "            <p>但一直以来发生的事，一直冲击着我对未来的信心。不可否认，世界正面临越来越多的挑战，而身边长久以来的乱象，终于在最近集中起来，形成一股合力，好似要冲破些什么。所以这炖鸡的事，看来也无法许诺了，总之还是心有余而力不足，下定决心竟然也要有些勇气起来。</p>\n" +
        "            <p>不知我们会在这阴暗中停留多久，但我们总要走出去，见一见曾经熟知的阳光。</p>\n" +
        "            <p>处理了许多杂事以后，我也会尽快走出这一步。目前工作室制定了一份开发路线图，也希望之前设想的几个项目都会被覆盖到。\n" +
        "                另外我们还将继续倡导可访问的、公平开放的基础设施，持续响应全球范围内的客户与社区需求。</p>\n" +
        "            <p>是时候迎接更光明的未来了，至少现在不晚。</p>\n" +
        "            <p style=\"text-align:right;font-weight:bold;margin-top:20px;\">日向花和</p>\n" +
        "            <p style=\"text-align:right;font-weight:bold;\">2022 年元旦</p>";
    document.getElementById("news_topic").style.backgroundImage = "url(../assets/images/year_2021/kotoba.jpg)"
    document.getElementById("news_detail_dialog").classList.remove("hidden");
}

// 关闭新闻详情对话框
function closeNewsDetailDialog(){
    document.getElementById("news_detail_dialog").classList.add("hidden");
}
