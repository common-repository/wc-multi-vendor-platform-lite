//This file is used for admin vendor section jquery and javascript

(function( $ ) {
    'use strict';

    var wcmvp_url, wcmvp_split_url;

    if(window.location.href != ""){
        wcmvp_url = window.location.href;
        wcmvp_split_url = wcmvp_url.split("#");
        
        }

    $(document).ready(function($){
        if(wcmvp_split_url[1] == '/features'){
            $(document).find('#wpbody-content').show();
            $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
            $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
            $(document).find(".wcmvp_settings_content_wrapper").children().hide();
            $(document).find('#wcmvp-multivendor-platform-features').css('display','block');
            $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-features').addClass('nav-tab-active');
            $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
            $(document).find('#wcmvp-loader-image').fadeOut();
            $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
            $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
            $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
            $(document).find('.wcmvp_features_convinced').css({'background-image':"url("+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_feature_convinced_img+")","height": "260px"});
            $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
			$(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
			$(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
			$(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
        } 

        $('#wcmvp-admin-features').on('click', function(){
            $(document).find('#wpbody-content').show();
            $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
            $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');
            $(document).find(".wcmvp_settings_content_wrapper").children().hide();
            $(document).find('#wcmvp-multivendor-platform-features').css('display','block');
            $(document).find('.wcmvp_multivendor_platform_vendor_product').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
            $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-features').addClass('nav-tab-active');
            $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
            $(document).find('.wcmvp-submenu').css('display','none');
            $(document).find('#wcmvp-loader-image').fadeOut();
            $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
            $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
            $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
            $(document).find('.wcmvp_features_convinced').css('background-image',"url("+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_feature_convinced_img+")");
            $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
			$(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
			$(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
			$(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
            
        });
        $('#wcmvp_clear_button').on('click', function(){
            $(document).find('.wcmvp_features_notice_section').fadeOut(1300);
        });

        $(document).on("click", ".fa-crown", function () {
            $(document).find("#wcmvp-admin-features").trigger("click");
          })

    });
    

})( jQuery );;