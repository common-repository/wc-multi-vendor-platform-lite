(function( $ ) {
    'use strict';
    var wcmvp_url, wcmvp_split_url, wcmvp_current_using_map, wcmvp_index_elem;
    if(window.location.href != ""){
        wcmvp_url = window.location.href;
        wcmvp_split_url = wcmvp_url.split("#");
        wcmvp_index_elem =[0,1,2,3,4,5,6];
    }
        $(document).ready(function($){
            if(wcmvp_split_url[1] == 'social_api'){
                $(document).find('#wpbody-content').show();
                $(document).find(".wcmvp_settings_content_wrapper").children().hide();
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','block');
                $(document).find("#wcmvp-nav").children().children().removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-settings').addClass('nav-tab-active');
                $(document).find('#wcmvp_admin_report_sub_report').removeClass('submenu-tab-active');
                $(document).find('#wcmvp_admin_report_sub_all_logs').removeClass('submenu-tab-active');
                $(document).find('.wcmvp_settings_submenus').removeClass('submenu-tab-active');
                $(this).addClass('submenu-tab-active');
                $(document).find('.wcmvp-submenu').css('display','block');
                $(document).find('.wcmvp_report_submenu').css('display','none');
                $(document).find('.wcmvp-setting-section').children().hide();
                $(document).find('#wcmvp-social-api').show();
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('#wcmvp-loader-image').fadeIn(100);
                $(document).find('#wcmvp-loader-image').fadeOut();
                $.each(wcmvp_index_elem , function(i,e)
				{
					$(document).find('.wcmvp_list_float').eq(e).removeAttr("style");
				});
                $(document).find('.wcmvp_list_float').eq(7).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});
            }
            $('#wcmvp-setting-social-api').on('click',function(){
                $(document).find('#wpbody-content').show();
                $(document).find(".wcmvp_settings_content_wrapper").children().hide();
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','block');
                $(document).find("#wcmvp-nav").children().children().removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-settings').addClass('nav-tab-active');
                $(document).find('#wcmvp_admin_report_sub_report').removeClass('submenu-tab-active');
                $(document).find('#wcmvp_admin_report_sub_all_logs').removeClass('submenu-tab-active');
                $(document).find('.wcmvp_settings_submenus').removeClass('submenu-tab-active');
                $(this).addClass('submenu-tab-active');
                $(document).find('.wcmvp-submenu').css('display','block');
                $(document).find('.wcmvp_report_submenu').css('display','none');
                $(document).find('.wcmvp-setting-section').children().hide();
                $(document).find('#wcmvp-social-api').show();
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('#wcmvp-loader-image').fadeIn(100);
                $(document).find('#wcmvp-loader-image').fadeOut();
                $.each(wcmvp_index_elem , function(i,e)
				{
					$(document).find('.wcmvp_list_float').eq(e).removeAttr("style");
				});
                $(document).find('.wcmvp_list_float').eq(7).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});

            })
        })
})( jQuery );