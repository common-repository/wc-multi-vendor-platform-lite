(function ($) {
    'use strict';
    $(document).ready(function(){

        var wcmvp_url, wcmvp_split_url;

        if(window.location.href != "")
        {
            wcmvp_url = window.location.href;
            wcmvp_split_url = wcmvp_url.split("#");
        }
        if (wcmvp_split_url[1]=="coupon") {
            $(document).find(".wcmvp-coupons").siblings().removeClass('wcmvp-active');
            $(document).find(".wcmvp-coupons").addClass('wcmvp-active');
            $(document).find(".wcmvp_panel").css('display','none');
            $(document).find(".wcmvp-coupon").css('display','block');
        }else if(wcmvp_split_url[1]=="review"){
            $(document).find(".wcmvp-reviews").siblings().removeClass('wcmvp-active');
            $(document).find(".wcmvp-reviews").addClass('wcmvp-active');
            $(document).find(".wcmvp_panel").css('display','none');
            $(document).find(".wcmvp-review").css('display','block');

        }else if(wcmvp_split_url[1]=="verification"){
            $(document).find(".wcmvp-verification").siblings().removeClass('wcmvp-active');
            $(document).find(".wcmvp-verification").addClass('wcmvp-active');
            $(document).find(".wcmvp_panel").css('display','none');
            $(document).find(".wcmvp-verify").css('display','block');

        }else if(wcmvp_split_url[1]=="report"){
            $(document).find(".wcmvp-reports").siblings().removeClass('wcmvp-active');
            $(document).find(".wcmvp-reports").addClass('wcmvp-active');
            $(document).find(".wcmvp_panel").css('display','none');
            $(document).find(".wcmvp-report").css('display','block');

        }else if(wcmvp_split_url[1]=="shipping"){
            $(document).find(".wcmvp-shipping").siblings().removeClass('wcmvp-active');
            $(document).find(".wcmvp-shipping").addClass('wcmvp-active');
            $(document).find(".wcmvp_panel").css('display','none');
            $(document).find(".wcmvp-shiping").css('display','block');
        }

        $(document).find(".wcmvp-coupons").on('click',function () {
            $(this).siblings().removeClass('wcmvp-active');
            $(this).addClass('wcmvp-active');
            $(document).find(".wcmvp_panel").css('display','none');
            $(document).find(".wcmvp-coupon").css('display','block');
        })
        $(document).find(".wcmvp-reviews").on('click',function () {
            $(this).siblings().removeClass('wcmvp-active');
            $(this).addClass('wcmvp-active');
            $(document).find(".wcmvp_panel").css('display','none');
            $(document).find(".wcmvp-review").css('display','block');
        })
        $(document).find(".wcmvp-verification").on('click',function () {
            $(this).siblings().removeClass('wcmvp-active');
            $(this).addClass('wcmvp-active');
            $(document).find(".wcmvp_panel").css('display','none');
            $(document).find(".wcmvp-verify").css('display','block');
        })
        $(document).find(".wcmvp-reports").on('click',function () {
            $(this).siblings().removeClass('wcmvp-active');
            $(this).addClass('wcmvp-active');
            $(document).find(".wcmvp_panel").css('display','none');
            $(document).find(".wcmvp-report").css('display','block');
        })
        $(document).find(".wcmvp-shipping").on('click',function () {
            $(this).siblings().removeClass('wcmvp-active');
            $(this).addClass('wcmvp-active');
            $(document).find(".wcmvp_panel").css('display','none');
            $(document).find(".wcmvp-shiping").css('display','block');
        })
    })
    
})(jQuery)