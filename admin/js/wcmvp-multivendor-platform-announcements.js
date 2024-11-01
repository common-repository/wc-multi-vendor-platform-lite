//This file is used for admin vendor section jquery and javascript

(function( $ ) {
    'use strict';

    var wcmvp_url, wcmvp_split_url;

    if(window.location.href != ""){
        wcmvp_url = window.location.href;
        wcmvp_split_url = wcmvp_url.split("#");
        
        }

    $(document).ready(function($){
        if(wcmvp_split_url[1] == '/announcements' || wcmvp_split_url[1] == 'announcements'){
            $(document).find('#wpbody-content').show();
            $(document).find(".wcmvp_settings_content_wrapper").children().hide();
            $(document).find('#wcmvp-multivendor-platform-announcements').show();
            $(document).find('#wcmvp-loader-image').hide();
            $(document).find("#wcmvp-nav").children().children().removeClass('nav-tab-active');
            $(document).find("#wcmvp-admin-announcements").addClass('nav-tab-active');
            $(document).find('#wcmvp_admin_report_sub_report').removeClass('submenu-tab-active');
            $(document).find('#wcmvp_admin_report_sub_all_logs').removeClass('submenu-tab-active');
            $(document).find('.wcmvp-submenu').css('display','none');

        } 

        $('#wcmvp-admin-announcements').on('click', function(){
            $(document).find('#wpbody-content').show();
            $(document).find(".wcmvp_settings_content_wrapper").children().hide();
            $(document).find('#wcmvp-multivendor-platform-announcements').show();
            $(document).find("#wcmvp-nav").children().children().removeClass('nav-tab-active');
            $(document).find("#wcmvp-admin-announcements").addClass('nav-tab-active');
            $(document).find('#wcmvp_admin_report_sub_report').removeClass('submenu-tab-active');
            $(document).find('#wcmvp_admin_report_sub_all_logs').removeClass('submenu-tab-active');
            $(document).find('.wcmvp-submenu').css('display','none');
            
        });
        $('#wcmvp_clear_button').on('click', function(){
            $(document).find('.wcmvp_features_notice_section').fadeOut(1300);
        });

    });
    

})( jQuery );;