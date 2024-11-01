//This file is used for appearence inside setting section jquery and javascript

(function( $ ) {
    'use strict';
    var wcmvp_url, wcmvp_split_url, wcmvp_current_using_map, wcmvp_index_elem;
    if(window.location.href != ""){
    wcmvp_url = window.location.href;
    wcmvp_split_url = wcmvp_url.split("#");
    wcmvp_index_elem =[0,1,2,3,4,6,7];
    }
        $(document).ready(function( $ ){
            
            if(wcmvp_split_url[1] == 'appearence'){
                // id's of each menu to intially hide them
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-features').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','block');
                $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-settings').addClass('nav-tab-active');
                $(document).find('#wcmvp-general').css('display','none');
                $(document).find('#wcmvp-privacy-policy').css('display','none');
                $(document).find('.wcmvp-setting-section').children().hide();
                $(document).find('#wcmvp-appearence').css('display','block');
                $(document).find('#wcmvp-page-setting').css('display','none');
                $(document).find('#wcmvp-selling-options').css('display','none');
                $(document).find('#wcmvp-withdraw-options').css('display','none');
                $(document).find('#wcmvp-payment-gateway-options').css('display','none');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('#wcmvp-setting-appearence').addClass('submenu-tab-active');
                $(document).find('.wcmvp-submenu').css('display','block');
                $(document).find('.wcmvp_store_setup_skip_btn').hide();
                $(document).find('#wcmvp-loader-image').fadeIn(100);
                $(document).find('#wcmvp-loader-image').fadeOut();
                $.each(wcmvp_index_elem , function(i,e)
				{
					$(document).find('.wcmvp_list_float').eq(e).removeAttr("style");
				});
                $(document).find('.wcmvp_list_float').eq(5).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});

            }
			$('#wcmvp-setting-appearence').on('click',function(){
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('.wcmvp-setting-section').children().hide();
				$(document).find('#wcmvp-appearence').css('display','block');
				$(document).find('#wcmvp-privacy-policy').css('display','none');
				$(document).find('#wcmvp-page-setting').css('display','none');
                $(document).find('#wcmvp-withdraw-options').css('display','none');
                $(document).find('#wcmvp-payment-gateway-options').css('display','none');
				$(document).find('#wcmvp-selling-options').css('display','none');
                $(document).find('#wcmvp-general').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('.wcmvp_settings_submenus').removeClass('submenu-tab-active');
                $(this).addClass('submenu-tab-active');
                $(document).find('.wcmvp_store_setup_skip_btn').hide();
                $(document).find('#wcmvp-loader-image').fadeIn(100);
                $(document).find('#wcmvp-loader-image').fadeOut();
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');

                $.each(wcmvp_index_elem , function(i,e)
				{
					$(document).find('.wcmvp_list_float').eq(e).removeAttr("style");
				});
                $(document).find('.wcmvp_list_float').eq(5).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});

            })

            if( $('#wcmvp-google-map').is(':checked') )
            {
                $('.wcmvp-multivendor-platform-mapbox').css('display','none');
                $('.wcmvp-multivendor-platform-map-api').css('display','block')
            }
            if( $('#wcmvp-mapbox').is(':checked') )
            {
                $('.wcmvp-multivendor-platform-mapbox').css('display','none');
                $('.wcmvp-multivendor-platform-map-api').css('display','block')
            }

            $('#wcmvp-google-map').on('click',function(){
                $('.wcmvp-multivendor-platform-mapbox').css('display','none');
                $('.wcmvp-multivendor-platform-map-api').css('display','block');
            })

            $('#wcmvp-mapbox').on('click',function(){
                $('.wcmvp-multivendor-platform-mapbox').css('display','block');
                $('.wcmvp-multivendor-platform-map-api').css('display','none');
            })

//==================== when clicks on submit button of appearence ======================================//

            $('#wcmvp-appearence-submit').on('click',function(e){
                e.preventDefault();
                
                $('#wcmvp-loader-image').css('display','block');

                var wcmvp_appearence_page_data_array = {}
               
                $(document).find('.wcmvp_appearence_page_data').each(function(wcmvp_serial, wcmvp_type){
 
                    if($(this).is("input"))
                    {
                        if($(this).attr('type') == 'text' )
                        {
                            wcmvp_appearence_page_data_array[$(this).attr('id')] = $(this).val();
                        }
                        if($(this).attr('type') == 'hidden' )
                        {
                            wcmvp_appearence_page_data_array[$(this).attr('id')] = $(this).val();
                        }
                        else if($(this).attr('type') == 'checkbox' )
                        {
                            if($(this).is(':checked'))
                            {
                                wcmvp_appearence_page_data_array[$(this).attr('id')] = 1;
                            }
                            else
                            {
                                wcmvp_appearence_page_data_array[$(this).attr('id')] = 0;
                            }
                        }
                    }
                    else if($(this).is("select"))
                    {
                        wcmvp_appearence_page_data_array[$(this).attr('id')] = $(this).children('option:selected').val();
                    }
                })

                if($('#wcmvp-google-map').is(':checked'))
                {
                    wcmvp_current_using_map = 'google_map';
                }
                if($('#wcmvp-mapbox').is(':checked'))
                {   
                    wcmvp_current_using_map = 'mapbox';
                }

                var wcmvp_appearence_data = {
                    'action' : 'wcmvp_appearence_page_action',
                    'wcmvp_appearence_page[wcmvp_current_using_map]' : wcmvp_current_using_map,
                    'wcmvp_appearence_page' :   wcmvp_appearence_page_data_array,
                    'wcmvp_appearence_nonce_verify' : wcmvp_appearence_page_object.wcmvp_appearence_nonce,
                }
                jQuery.post( wcmvp_appearence_page_object.wcmvp_ajax_url, wcmvp_appearence_data, function(response){
                    
                    if( $('.wcmvp_store_setup_skip_btn').css('display') == 'none' )
                    {
                        $('#wcmvp-loader-image').css('display','none');
                        if( response==1 )
                        {
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_setting_saved,{
                                    className : 'appearence_success',
                                    position : 'right bottom',
                                }
                            )
                        }
                        else
                        {
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_some_error_msg,{
                                    className : 'appearence_error',
                                    position : 'right bottom',
                                }
                            )
                        }
                    }
                },'json' )
            })
    })
})( jQuery );