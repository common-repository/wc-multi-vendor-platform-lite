//This file is used for admin setting section jquery and javascript

(function( $ ) {
    'use strict';
    var wcmvp_url, wcmvp_split_url, wcmvp_index_elem;
    if(window.location.href != ""){
    wcmvp_url = window.location.href;
	wcmvp_split_url = wcmvp_url.split("#"); 
	wcmvp_index_elem = [1,2,3,4,5,6,7];
    }
        $(document).ready(function( $ ){  
            if(wcmvp_split_url[1] == 'general-setting'){
				// id's of each menu to intially hide them
				$(document).find('#wpbody-content').show();
				$(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
				$(document).find('.wcmvp_sidbar_wrapper').show();
				$(document).find('#wcmvp-payment-gateway-options').hide();
                $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
				$(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');
				$(document).find('#wcmvp-multivendor-platform-features').css('display','none');               
                $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
				$(document).find('#wcmvp-multivendor-platform-settings').css('display','block');
				$(document).find('#wcmvp-multivendor-platform-announcements').hide();
				$(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
				$(document).find('#wcmvp-multivendor-platform-settings').css('display','none');				
                $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-settings').addClass('nav-tab-active');
                $(document).find('#wcmvp-setting-general').addClass('submenu-tab-active');
                $(document).find('#wcmvp-setting-selling').removeClass('submenu-tab-active');
                $(document).find('#wcmvp-setting-withdraw').removeClass('submenu-tab-active');
                $(document).find('#wcmvp-setting-page-setting').removeClass('submenu-tab-active');
                $(document).find('#wcmvp-setting-appearence').removeClass('submenu-tab-active');
				$(document).find('#wcmvp-setting-privacy-policy').removeClass('submenu-tab-active');
				$(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
				$(document).find('#wcmvp-general').css('display','block');
				$(document).find('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('#wcmvp-privacy-policy').css('display','none');
                $(document).find('#wcmvp-appearence').css('display','none');
                $(document).find('#wcmvp-page-setting').css('display','none');
                $(document).find('#wcmvp-selling-options').css('display','none');
				$(document).find('#wcmvp-withdraw-options').css('display','none');
				$(document).find('.wcmvp-submenu').css('display','block');
				$(document).find('.wcmvp_report_submenu').css('display','none');
				$(document).find('#wcmvp-loader-image').fadeIn(100);
				$(document).find('#wcmvp-loader-image').fadeOut();
				$(document).find('.wcmvp_store_setup_skip_btn').hide();
				$(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
				$(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
				$(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
				$(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
				$(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
				$(document).find('#wcmvp-multivendor-platform-announcements').hide();
				$(document).find('#wcmvp-social-api').hide();
				$.each(wcmvp_index_elem , function(i,e)
				{
					$(document).find('.wcmvp_list_float').eq(e).removeAttr("style");
				});
                $(document).find('.wcmvp_list_float').eq(0).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});

            }
			$('#wcmvp-admin-settings').on('click', function(){
				$(document).find('#wpbody-content').show();
				$(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
				$(document).find('.wcmvp_sidbar_wrapper').show();
				$(document).find('#wcmvp-payment-gateway-options').hide();
				$(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
				$(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');
				$(document).find('#wcmvp-multivendor-platform-features').css('display','none');
				$(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
				$(document).find('#wcmvp-multivendor-platform-settings').css('display','block');
				$(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-settings').addClass('nav-tab-active');
				$(document).find('.wcmvp_settings_submenus').removeClass('submenu-tab-active');
				$(document).find('#wcmvp-setting-general').addClass('submenu-tab-active');
				$(document).find('#wcmvp-setting-selling').removeClass('submenu-tab-active');
				$(document).find('#wcmvp-setting-withdraw').removeClass('submenu-tab-active');
				$(document).find('#wcmvp-setting-page-setting').removeClass('submenu-tab-active');
				$(document).find('#wcmvp-setting-appearence').removeClass('submenu-tab-active');
				$(document).find('#wcmvp-multivendor-platform-report').css('display','none');
				$(document).find('#wcmvp-setting-privacy-policy').removeClass('submenu-tab-active');
				$(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
				$(document).find('#wcmvp-general').css('display','block');
				$(document).find('#wcmvp-privacy-policy').css('display','none');
				$(document).find('#wcmvp-appearence').css('display','none');
				$(document).find('#wcmvp-page-setting').css('display','none');
				$(document).find('#wcmvp-selling-options').css('display','none');
				$(document).find('#wcmvp-withdraw-options').css('display','none');
				$(document).find('.wcmvp-submenu').css('display','block');
				$(document).find('.wcmvp_report_submenu').css('display','none');
				$(document).find('#wcmvp-loader-image').fadeIn(100);
				$(document).find('#wcmvp-loader-image').fadeOut();
				$(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
				$(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
				$(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
				$(document).find('.wcmvp_store_setup_skip_btn').hide();
				$(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
				$(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
				$(document).find('#wcmvp-multivendor-platform-announcements').hide();
				$(document).find('#wcmvp-social-api').hide();
				$.each(wcmvp_index_elem , function(i,e)
				{
					$(document).find('.wcmvp_list_float').eq(e).removeAttr("style");
				});
                $(document).find('.wcmvp_list_float').eq(0).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});


			})

    })
})( jQuery );