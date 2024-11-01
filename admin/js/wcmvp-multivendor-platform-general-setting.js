//This file is used for admin general settings inside setting section jquery and javascript

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

        // id's of each menu to intially hide them and show the same page on page reload
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','block');
                $(document).find('#wcmvp-multivendor-platform-features').css('display','none');
                $(document).find('#wcmvp-admin-settings').addClass('nav-tab-active');
                $(document).find('.wcmvp-setting-section').children().hide();
                $(document).find('#wcmvp-general').css('display','block');
                $(document).find('.wcmvp-submenu').css('display','block');
                $(document).find('#wcmvp-privacy-policy').css('display','none');
                $(document).find('#wcmvp-appearence').css('display','none');
                $(document).find('#wcmvp-page-setting').css('display','none');
                $(document).find('#wcmvp-selling-options').css('display','none');
                $(document).find('#wcmvp-withdraw-options').css('display','none');
                $(document).find('#wcmvp-payment-gateway-options').css('display','none');
                $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('.wcmvp_store_setup_skip_btn').hide();
                $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
                $(document).find('#wcmvp-setting-general').addClass('submenu-tab-active');
                $(document).find('#wcmvp-loader-image').fadeIn(100);
                $(document).find('#wcmvp-loader-image').fadeOut();
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $.each(wcmvp_index_elem , function(i,e)
				{
					$(document).find('.wcmvp_list_float').eq(e).removeAttr("style");
				});
                $(document).find('.wcmvp_list_float').eq(0).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});

            }
			$('#wcmvp-setting-general').on('click',function(){
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('.wcmvp-setting-section').children().hide();
				$(document).find('#wcmvp-general').css('display','block');
				$(document).find('#wcmvp-privacy-policy').css('display','none');
                $(document).find('#wcmvp-appearence').css('display','none');
				$(document).find('#wcmvp-page-setting').css('display','none');
				$(document).find('#wcmvp-selling-options').css('display','none');
                $(document).find('#wcmvp-withdraw-options').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('#wcmvp-payment-gateway-options').css('display','none');
                $(document).find('.wcmvp_settings_submenus').removeClass('submenu-tab-active');
                $(this).addClass('submenu-tab-active');
                $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
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
                $(document).find('.wcmvp_list_float').eq(0).css({'background':'white','border':'5px solid white','box-shadow':'0px 3px 3px -2px rgba(0, 0, 0, 0.2),0px 3px 4px 0px rgba(0, 0, 0, 0.14),0px 1px 8px 0px rgba(0,0,0,.12)' ,'border-bottom-style':'solid'});

            })
            $('#wcmvp-general-page-submit').on('click',function(e){
                e.preventDefault();

                $(document).find('#wcmvp-loader-image').css('display','block');
                
                var wcmvp_general_setting_data_array = {}
               
                $(document).find('.wcmvp_general_setting_page_data').each(function(wcmvp_serial, wcmvp_type){
 
                    if($(this).is("input"))
                    {
                        if($(this).attr('type') == 'text' )
                        {
                            wcmvp_general_setting_data_array[$(this).attr('id')] = $(this).val();
                        }
                        if($(this).attr('type') == 'hidden' )
                        {
                            wcmvp_general_setting_data_array[$(this).attr('id')] = $(this).val();
                        }
                        else if($(this).attr('type') == 'checkbox' )
                        {
                            if($(this).is(':checked'))
                            {
                                wcmvp_general_setting_data_array[$(this).attr('id')] = 1;
                            }
                            else
                            {
                                wcmvp_general_setting_data_array[$(this).attr('id')] = 0;
                            }
                        }
                    }
                    else if($(this).is("select"))
                    {
                        wcmvp_general_setting_data_array[$(this).attr('id')] = $(this).children('option:selected').val();
                    }
                })

        // Sending ajax request to admin-ajax.php and handling on root file

                var wcmvp_general_data = {
                    'action' : 'wcmvp_general_page',
                    'wcmvp_general_settings' : wcmvp_general_setting_data_array,
                    'wcmvp_general_page_nonce_verify' : wcmvp_general_page_object.wcmvp_general_page_nonce
                };
                jQuery.post(wcmvp_general_page_object.wcmvp_ajax_url, wcmvp_general_data,function( response ){
                    if( $('.wcmvp_store_setup_skip_btn').css('display') == 'none' )
                    {
                        $('#wcmvp-loader-image').css('display','none');
                        if(response == 1){
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_setting_saved, {
                                className: 'general_success',
                                position : 'right bottom',
                            }
                            );
                        }
                        else{
                            $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_some_error_msg,{
                                    className: 'general_error',
                                    position : 'right bottom',
                                }
                            );
                        }
                    }
                },'json');
                    
            })
    })
    
})( jQuery );

// to send logo of vendor store.

jQuery( document ).ready( function( $ ) {
    var file_frame,wp_media_post_id;
    var set_to_post_id = wp.media.model.settings.post.id;
    jQuery('#wcmvp_upload_logo_button').on('click', function( event ){
        event.preventDefault();
        if ( file_frame ) {
            file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
            file_frame.open();
            return;
        } else {
            wp.media.model.settings.post.id = set_to_post_id;
        }
        file_frame = wp.media.frames.file_frame = wp.media({
            title: wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_media_select_img_val,
            button: {
                text: wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_media_select_btn_img_text,
            },
            multiple: false
        });
        file_frame.on('select', function() {
            attachment = file_frame.state().get('selection').first().toJSON();
            $( '#wcmvp_vendor_wizard_logo' ).attr( 'value', attachment.url );
            $( '#wcmvp_wizard_logo_id' ).val( attachment.id );
            wp.media.model.settings.post.id = wp_media_post_id;
            $(document).find('.wcmvp_edit_vendor_details_data').siblings().addClass('mdc-notched-outline--notched');
            $(document).find('.wcmvp_edit_vendor_details_data').siblings().children(".mdc-notched-outline__notch").children(".mdc-floating-label").addClass('mdc-floating-label--float-above');
        });
            file_frame.open();
    });
    jQuery( 'a.add_media' ).on( 'click', function() {
        wp.media.model.settings.post.id = wp_media_post_id;
    });
});