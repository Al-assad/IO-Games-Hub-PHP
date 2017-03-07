/**
 * Created by yulin on 2017/2/2.
 */

//go_top组件
jQuery(document).ready(function(){

    $('#go_top').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);});  //返回顶部平滑动画

    $('#go_bottom').click(function(){$('html,body').animate({scrollTop: $(document).height()-$(window).height()}, 800);});  //返回底部平滑动画

    $(window).scroll(function(){               //按钮在非 scroll top 位置才出现
        curTop = $(document).scrollTop();
        if(curTop>0){
            $('.go_top').fadeIn(function () {
                $(this).removeClass('controller');
            });
        }else{
            $('.go_top').fadeOut(function(){
                $(this).addClass('controller');
            });
        }

    });

    //启动工具提示控件
    $(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
//启动轮播控件
    $('.carousel').carousel({interval:2500});



});






