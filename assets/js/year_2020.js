/**
 * 欢迎查看 2020 年新闻时间线 界面操作脚本
 * Create by Hanawa Hinata at 2020/12/27
 * Using PhpStorm
 */

import requestAction from './request.js';

let week_array = ["日", "一", "二", "三", "四", "五", "六"];

let month_object = {
    "Foundation":{month: '2019-12', currentPage: 0, total: 0, loading: false},
    "January":{month: '2020-01', currentPage: 0, total: 0, loading: false},
    "February":{month: '2020-02', currentPage: 0, total: 0, loading: false},
    "March":{month: '2020-03', currentPage: 0, total: 0, loading: false},
    "April":{month: '2020-04', currentPage: 0, total: 0, loading: false},
    "May":{month: '2020-05', currentPage: 0, total: 0, loading: false},
    "June":{month: '2020-06', currentPage: 0, total: 0, loading: false},
    "July":{month: '2020-07', currentPage: 0, total: 0, loading: false},
    "August":{month: '2020-08', currentPage: 0, total: 0, loading: false},
    "September":{month: '2020-09', currentPage: 0, total: 0, loading: false},
    "October":{month: '2020-10', currentPage: 0, total: 0, loading: false},
    "November":{month: '2020-11', currentPage: 0, total: 0, loading: false},
    "December":{month: '2020-12', currentPage: 0, total: 0, loading: false},
}


//脚本执行主入口
window.onload = function () {

    for(let index in month_object){
        getNewsList(index);
        addLoadMoreClickListener(index);
    }

    document.getElementById("return_top").onclick = function (){
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        })
    }
};




//获取新闻列表
function getNewsList(monthIndex){
    if(!month_object[monthIndex].loading){
        let queryParam = {
            year: 2020,
            month: month_object[monthIndex].month,
            page: month_object[monthIndex].currentPage
        }
        month_object[monthIndex].loading = true;

        requestAction.getAction({
            url: "../api/v1/external/get_news_by_month.php",
            param: queryParam,
            success: function (res){
                //赋值
                month_object[monthIndex].total = res.total_count;
                //判断有没有返回数据
                if(res.news_list.length > 0){
                    renderAppendNewsList(monthIndex, res.news_list);
                    month_object[monthIndex].currentPage += 1;
                }
                else{
                    //判断是不是第一页。如果第一页都没查出来，那这一月就是空的
                    if(month_object[monthIndex].currentPage === 0){
                        renderAppendBlankList(monthIndex)
                    }
                    //把加载更多的按钮去掉。
                    removeLoadMoreButton(monthIndex)
                }
                month_object[monthIndex].loading = false;
            },
            fail: function (err){
                month_object[monthIndex].loading = false;
                console.log("错误",err,monthIndex);
            }
        })

    }
    else{

    }

}



function renderAppendNewsList(index, newsList){
    let dom = document.getElementById(index);
    let list = dom.getElementsByClassName("month_news_list")[0];
    for(let i=0; i<newsList.length;i++){
        let html = "<div class=\"news_item\">\n" +
            "            <div class=\"topic\">\n" +
            ((newsList[i].image!==undefined&&newsList[i].image!==null&&newsList[i].image!=='')?("<img src='"+newsList[i].image+"' />"):("<p>"+newsList[i].description+"</p>"))+
            "            </div>\n" +
            "            <div class=\"info\">\n" +
            "                <div class=\"time\">"+newsList[i].create_time+" - 暂无分类</div>\n" +
            "                <div class=\"title\">"+newsList[i].title+"</div>\n" +
            "            </div>\n" +
            "        </div>";
        list.appendChild(parseElement(html));
    }

}

function renderAppendBlankList(index){
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

function removeLoadMoreButton(index){
    // 拿到待删除节点:
    let dom = document.getElementById(index);
    let button = dom.getElementsByClassName("load_more")[0];
    // 删除:
    let removed = dom.removeChild(button);
}

function addLoadMoreClickListener(index){
    let dom = document.getElementById(index);
    let button = dom.getElementsByClassName("load_more")[0];
    // let button = dom[5];
    // button.addEventListener('click',getNewsList(index));
    button.onclick = function(){
        getNewsList(index);
    }
}

function parseElement(htmlString){
    return new DOMParser().parseFromString(htmlString,'text/html').body.childNodes[0]
}
