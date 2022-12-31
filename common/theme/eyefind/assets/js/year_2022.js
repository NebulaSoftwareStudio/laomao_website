/**
 * 2022 年新闻时间线 界面操作脚本
 * Create by Hanawa Hinata on 2021/12/19
 * Using PhpStorm
 */

let yarn2022Page = {
    data: {
        currentActiveTopicMonth: -1,
    },
    methods: {
        // 每月新闻顶部索引 鼠标悬浮初始化
        initMonthNewsListIndex: function (){
            let target = document.getElementsByClassName("month_list")[0];
            console.log(target.children);
            for(let i=0;i<target.children.length; i++){
                target.children[i].addEventListener("click", function (){
                    yarn2022Page.methods.activeTopicMonthChange(i);
                })
            }

            // 初始化时默认展示第一个月
            yarn2022Page.methods.activeTopicMonthChange(0);
        },

        // 触发切换topic
        activeTopicMonthChange: function (index){
            console.log(index);
            if(yarn2022Page.data.currentActiveTopicMonth === index){
                // 跳转到月份
            }else{
                let target = document.getElementsByClassName("month_list")[0];
                let prevDiv = target.children[yarn2022Page.data.currentActiveTopicMonth];
                let prevImage = document.getElementById("month_"+(yarn2022Page.data.currentActiveTopicMonth+1));
                let nextDiv = target.children[index];
                let nextImage = document.getElementById("month_"+(index+1));
                if(yarn2022Page.data.currentActiveTopicMonth > -1){
                    prevDiv.classList = "item";
                    prevImage.classList = "topic_news_image_item hidden";
                }
                nextDiv.classList = "item active";
                nextImage.classList = "topic_news_image_item";
                // 更新为此月份
                yarn2022Page.data.currentActiveTopicMonth = index;

            }
        },

        // 初始化每月新闻的左右滚动 swiper
        initMonthSwiperBox: function (){
            const swiper = new Swiper('.news_list', {
                // Optional parameters
                direction: 'horizontal',
                loop: false,
                centeredSlides: true,
                breakpoints: {
                    1: {  //当屏幕宽度大于等于320
                        initialSlide: 0,
                        slidesPerView: 1,
                        spaceBetween: 10
                    },
                    750: {  //当屏幕宽度大于等于320
                        initialSlide: 1,
                        slidesPerView: 4,
                        spaceBetween: 10
                    },
                    1200: {  //当屏幕宽度大于等于768
                        initialSlide: 2,
                        slidesPerView: 6,
                        spaceBetween: 20
                    }
                },
                // If we need pagination
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });
            console.log(swiper);
        },

        //

        // 顶部标题滚动动画
        initMainBannerTarget: function (){
            // 时代/世界/人物

        },


        // 关闭新闻详情对话框
        closeNewsDetailDialog: function(){
            document.getElementById("news_detail_dialog").classList.add("hidden");
        }
    },
    created: function (){
        yarn2022Page.methods.initMonthNewsListIndex();
        yarn2022Page.methods.initMonthSwiperBox();

        yarn2022Page.methods.initMainBannerTarget();

        document.getElementById("return_top").onclick = function (){
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            })
        }
    },
}


yarn2022Page.created();
