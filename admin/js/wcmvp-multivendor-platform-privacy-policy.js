//This file is used for privacy policy inside setting section jquery and javascript

(function( $ ) {
    'use strict';
    var wcmvp_url, wcmvp_split_url ,wcmvp_setting_privacy_page, wcmvp_setting_privacy_content, wcmvp_index_elem;
    if(window.location.href != ""){
    wcmvp_url = window.location.href;
    wcmvp_split_url = wcmvp_url.split("#");
    wcmvp_index_elem = [0,1,2,3,4,5,7];
    }
        $(document).ready(function( $ ){
            if(wcmvp_split_url[1] == 'privacy-policy'){
                // id's of each menu to intially hide them
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $('#wcmvp-multivendor-platform-withdraw').css('display','none');
                $('#wcmvp-multivendor-platform-vendor').css('display','none');
                $('#wcmvp-multivendor-platform-features').css('display','none');               
                $('#wcmvp-multivendor-platform-dashboard').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $('#wcmvp-multivendor-platform-settings').css('display','block');
                $('#wcmvp-admin-settings').addClass('nav-tab-active');
                $('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
                $('#wcmvp-admin-vendor').removeClass('nav-tab-active');
		        $('#wcmvp-admin-features').removeClass('nav-tab-active');
                $('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
                $('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
                $('#wcmvp-general').css('display','none');
                $(document).find('.wcmvp-setting-section').children().hide();
                $('#wcmvp-privacy-policy').css('display','block');
                $('#wcmvp-appearence').css('display','none');
                $('#wcmvp-page-setting').css('display','none');
                $('#wcmvp-selling-options').css('display','none');
                $('#wcmvp-withdraw-options').css('display','none');
                $(document).find('#wcmvp-payment-gateway-options').css('display','none');
                $('#wcmvp-default').css('display','none');
                $('#wcmvp-setting-privacy-policy').addClass('submenu-tab-active');
                $('.wcmvp-submenu').css('display','block');
                $('#wcmvp-loader-image').fadeIn(100);
                $('#wcmvp-loader-image').fadeOut();
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $.each(wcmvp_index_elem , function(i,e)
				{
					$(document).find('.wcmvp_list_float').eq(e).removeAttr("style");
				});
                $(document).find('.wcmvp_list_float').eq(6).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});

            }
			$('#wcmvp-setting-privacy-policy').on('click',function(){
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('.wcmvp-setting-section').children().hide();
				$('#wcmvp-privacy-policy').css('display','block');
				$('#wcmvp-appearence').css('display','none');
				$('#wcmvp-page-setting').css('display','none');
                $('#wcmvp-withdraw-options').css('display','none');
                $(document).find('#wcmvp-payment-gateway-options').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
				$('#wcmvp-selling-options').css('display','none');
                $('#wcmvp-general').css('display','none');
                $('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('.wcmvp_settings_submenus').removeClass('submenu-tab-active');
                $(this).addClass('submenu-tab-active');
                $('#wcmvp-loader-image').fadeIn(100);
                $('#wcmvp-loader-image').fadeOut();
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $.each(wcmvp_index_elem , function(i,e)
				{
					$(document).find('.wcmvp_list_float').eq(e).removeAttr("style");
				});
                $(document).find('.wcmvp_list_float').eq(6).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});

            })
            
            $('#wcmvp-privacy-submit').on('click',function(){
                $('#wcmvp-loader-image').css('display','block');

                var wcmvp_privacy_policy_page_data_array = {}
               
                $(document).find('.wcmvp_privacy_policy_page_data').each(function(wcmvp_serial, wcmvp_type){
 
                    if($(this).is("input"))
                    {
                        if($(this).attr('type') == 'text' )
                        {
                            wcmvp_privacy_policy_page_data_array[$(this).attr('id')] = $(this).val();
                        }
                        if($(this).attr('type') == 'hidden' )
                        {
                            wcmvp_privacy_policy_page_data_array[$(this).attr('id')] = $(this).val();
                        }
                        else if($(this).attr('type') == 'checkbox' )
                        {
                            if($(this).is(':checked'))
                            {
                                wcmvp_privacy_policy_page_data_array[$(this).attr('id')] = 1;
                            }
                            else
                            {
                                wcmvp_privacy_policy_page_data_array[$(this).attr('id')] = 0;
                            }
                        }
                    }
                    else if($(this).is("select"))
                    {
                        wcmvp_privacy_policy_page_data_array[$(this).attr('id')] = $(this).children('option:selected').val();
                    }
                })

                wcmvp_setting_privacy_page = $('#wcmvp-setting-privacy-page').children(':selected').val();
                wcmvp_setting_privacy_content = $('#wcmvp-setting-privacy-content').val();

                var wcmvp_setting_privacy_policy = {
                        'action' : 'wcmvp_setting_privacy',
                        'wcmvp_privacy_page[wcmvp_setting_privacy_page]' : wcmvp_setting_privacy_page,
                        'wcmvp_privacy_page[wcmvp_setting_privacy_content]' : wcmvp_setting_privacy_content,
                        'wcmvp_privacy_page' : wcmvp_privacy_policy_page_data_array,
                        'wcmvp_privacy_policy_page_nonce_verify' : wcmvp_privacy_policy_object.wcmvp_privacy_nonce,
                }

                jQuery.post( wcmvp_privacy_policy_object.wcmvp_ajax_url, wcmvp_setting_privacy_policy, function(response){
                    
                    $('#wcmvp-loader-image').css('display','none');
                    if(response == 1)
                    {
                        $('.notifyjs-wrapper').remove();
                        $.notify(
                            wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_setting_saved, {
                                className : 'privacy_success',
                                position : 'right bottom'
                            }
                        );
                    }
                    else
                    {
                        $('.notifyjs-wrapper').remove();
                        $.notify(
                            wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_some_error_msg , {
                                className : 'privacy_error',
                                position : 'right bottom'
                            }
                        );
                    }
                },'json')

            })

    })
})( jQuery );