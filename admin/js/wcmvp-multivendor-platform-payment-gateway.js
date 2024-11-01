//This file is used for admin payment gateway inside setting section jquery and javascript

(function( $ ) {
    'use strict';

    var wcmvp_url, wcmvp_split_url, wcmvp_index_elem;
    if(window.location.href != ""){
    wcmvp_url = window.location.href;
    wcmvp_split_url = wcmvp_url.split("#");
    wcmvp_index_elem=[0,1,2,4,5,6,7];
    }

    $(document).ready(function( $ ){
            
            if(wcmvp_split_url[1] == 'payment-gateway'){
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-features').css('display','none');     
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();          
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','block');
                $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-settings').addClass('nav-tab-active');
                $(document).find('#wcmvp-general').css('display','none');
                $(document).find('#wcmvp-privacy-policy').css('display','none');
                $(document).find('#wcmvp-appearence').css('display','none');
                $(document).find('#wcmvp-page-setting').css('display','none');
                $(document).find('#wcmvp-selling-options').css('display','none');
                $(document).find('#wcmvp-withdraw-options').css('display','none');
                $(document).find('.wcmvp-setting-section').children().hide();
                $(document).find('#wcmvp-payment-gateway-options').css('display','block');
                $(document).find('#wcmvp-setting-withdraw').removeClass('submenu-tab-active');
                $(document).find('#wcmvp-setting-payment-gateway').addClass('submenu-tab-active');
                $(document).find('.wcmvp-submenu').css('display','block');
                $(document).find('#wcmvp-loader-image').fadeIn(100);
                $(document).find('#wcmvp-loader-image').fadeOut();
                $(document).find('.wcmvp_store_setup_skip_btn').hide();
                $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $.each(wcmvp_index_elem , function(i,e)
				{
					$(document).find('.wcmvp_list_float').eq(e).removeAttr("style");
				});
                $(document).find('.wcmvp_list_float').eq(3).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});

            }

			$(document).on('click','#wcmvp-setting-payment-gateway',function(){
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-withdraw-options').css('display','none');
                $(document).find('.wcmvp-setting-section').children().hide();
                $(document).find('#wcmvp-payment-gateway-options').css('display','block');
				$(document).find('#wcmvp-privacy-policy').css('display','none');
				$(document).find('#wcmvp-appearence').css('display','none');
                $(document).find('#wcmvp-page-setting').css('display','none');
                $(document).find('#wcmvp-selling-options').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
				$(document).find('#wcmvp-general').css('display','none');
                $(document).find('.wcmvp_settings_submenus').removeClass('submenu-tab-active');
                $(this).addClass('submenu-tab-active');
                $(document).find('#wcmvp-loader-image').fadeIn(100);
                $(document).find('#wcmvp-loader-image').fadeOut();
                $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('.wcmvp_store_setup_skip_btn').hide();
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $.each(wcmvp_index_elem , function(i,e)
				{
					$(document).find('.wcmvp_list_float').eq(e).removeAttr("style");
				});
                $(document).find('.wcmvp_list_float').eq(3).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});


            })

            $(document).on('click','#wcmvp-payment-gateway-submit',function(e)
            {
                e.preventDefault();

                $('#wcmvp-loader-image').css('display','block');

                var wcmvp_payment_method_data_array = {}
               
                $(document).find('.wcmvp_payment_gateway_page_data').each(function(wcmvp_serial, wcmvp_type){
 
                    if($(this).is("input"))
                    {
                        if($(this).attr('type') == 'text' )
                        {
                            wcmvp_payment_method_data_array[$(this).attr('id')] = $(this).val();
                        }
                        if($(this).attr('type') == 'hidden' )
                        {
                            wcmvp_payment_method_data_array[$(this).attr('id')] = $(this).val();
                        }
                        else if($(this).attr('type') == 'checkbox' )
                        {
                            if($(this).is(':checked'))
                            {
                                wcmvp_payment_method_data_array[$(this).attr('id')] = 1;
                            }
                            else
                            {
                                wcmvp_payment_method_data_array[$(this).attr('id')] = 0;
                            }
                        }
                    }
                    else if($(this).is("select"))
                    {
                        wcmvp_payment_method_data_array[$(this).attr('id')] = $(this).children('option:selected').val();
                    }
                })

                var wcmvp_payment_gateway_data = {
                        'action' : 'wcmvp_payment_gateway_page',
                        'wcmvp_payment_gateway' : wcmvp_payment_method_data_array,
                        'wcmvp_withdraw_page_nonce' : wcmvp_withdraw_option_object.wcmvp_withdraw_option_nonce
                }

                jQuery.post(wcmvp_withdraw_option_object.wcmvp_ajax_url, wcmvp_payment_gateway_data, 
                    function( response ){

                        $('#wcmvp-loader-image').css('display','none');
                        if(response == 1)
                        {
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_setting_saved, {
                                className : 'withdraw_success',
                                position : 'right bottom',
                                }
                            )
                        }
                        else
                        {
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_some_error_msg, {
                                    className : 'withdraw_error',
                                    position : 'right bottom',
                                }
                            )
                        }

                    },'json')
            })
    })
    
})( jQuery )