/**
 * 2022 年新闻时间线 界面操作脚本
 * Create by Hanawa Hinata on 2021/12/19
 * Using PhpStorm
 */

let yarn2022Page = {
    data: {

    },
    methods: {
        initMonthSwiperBox: function (){
            const swiper = new Swiper('.news_list', {
                // Optional parameters
                direction: 'horizontal',
                loop: false,

                breakpoints: {
                    1: {  //当屏幕宽度大于等于320
                        slidesPerView: 1,
                        spaceBetween: 10
                    },
                    450: {  //当屏幕宽度大于等于320
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    768: {  //当屏幕宽度大于等于768
                        slidesPerView: 3,
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
    },
    created: function (){
        yarn2022Page.methods.initMonthSwiperBox();
    },
}


yarn2022Page.created();
