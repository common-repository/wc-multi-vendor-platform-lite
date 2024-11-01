//This file is used for admin vendor section jquery and javascript

(function( $ ) {
    'use strict';
    var wcmvp_url, wcmvp_split_url, wcmvp_vendor_status, wcmvp_vendor_data_id, wcmvp_checkboxes_all;
    
    if(window.location.href != ""){
    wcmvp_url = window.location.href;
    wcmvp_split_url = wcmvp_url.split("#");
    
    }
        $(document).ready(function( $ ){

            if(wcmvp_split_url[1] == '/vendor'){
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-vendor').css('display','block');
                $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-features').css('display','none');
                $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
                $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-vendor').addClass('nav-tab-active');
                $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
                $(document).find('#wcmvp-loader-image').fadeOut();
                var wcmvp_sort_by_vend_status = $(document).find('#wcmvp_sort_by_vend_status_save').val();
                $(document).find( '#wcmvp_vendor_sort_'+wcmvp_sort_by_vend_status ).addClass('wcmvp_sort_by_status_active');
                $("#wcmvp_vendors_table").dataTable().fnDestroy();
                wcmvp_vendor_datatable(wcmvp_sort_by_vend_status);
                wcmvp_vendors_count_as_status();
                $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
            } 
			$('#wcmvp-admin-vendor').on('click', function(){
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-features').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-vendor').css('display','block');
                $(document).find('.wcmvp_multivendor_platform_vendor_product').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
                $(document).find('.wcmvp_multivendor_platform_vendor_orders').hide();
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
                $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
                $(document).find('.wcmvp_vendors_details').show();
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
                $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-vendor').addClass('nav-tab-active');
                $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
                $(document).find('.wcmvp-submenu').css('display','none');
                $(document).find('#wcmvp-loader-image').fadeOut();
                $("#wcmvp_vendors_table").dataTable().fnDestroy();
                var wcmvp_sort_by_vend_status = 'all_vend';
                $(document).find('.wcmvp_vendor_status').removeClass('wcmvp_sort_by_status_active');
                $(document).find('#wcmvp_vendor_sort_all_vend').addClass('wcmvp_sort_by_status_active');
                wcmvp_vendor_datatable(wcmvp_sort_by_vend_status);
                wcmvp_vendors_count_as_status();
                $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                
        })

        $(document).on('click','#wcmvp_vendor_signup_box',function(){
            $(document).find('#wcmvp-admin-vendor').trigger('click');
        })
    

//====================== Function gets activated when clicked on apply button after choosiung an action=========///
//====================== Function gets activated when clicked on apply button after choosiung an action=========///

            $(document).on( 'change','.wcmvp_outer_checkbox',function(){

                $(document).find('.wcmvp_vendor_inner_checkbox').prop('checked', $(this).prop("checked"));
                $(document).find('.wcmvp_outer_checkbox').prop('checked', $(this).prop("checked"));

            } )

            $(document).on('change','.wcmvp_vendor_inner_checkbox', function() { 

                if($(document).find('.wcmvp_vendor_inner_checkbox:checked').length == $(document).find('.wcmvp_vendor_inner_checkbox').length){
                    $(document).find('.wcmvp_outer_checkbox').prop('checked',true);

                }else{
                    $(document).find('.wcmvp_outer_checkbox').prop('checked',false);
                }
            })

            $(document).on('click','#wcmvp_vendor_apply_bulk',function() {
                
                var wcmvp_vendor_bulk_action = $('#wcmvp_vendor_bulk_action').children('option:selected').val();

                if( wcmvp_vendor_bulk_action != 'wcmvp_not_selected' )
                {   
                    var wcmvp_vendor_array = [];

                    $.each($("input[name='wcmvp_inner_check']:checked"), function(){

                        wcmvp_vendor_array.push($(this).attr('data-id'));

                    });
                    
                    if( wcmvp_vendor_bulk_action == 'wcmvp_approve_vendor' )
                    {
                        wcmvp_vendor_bulk_action = 1;
                    }
                    if( wcmvp_vendor_bulk_action == 'wcmvp_disable_selling' )
                    {
                        wcmvp_vendor_bulk_action = 0;
                    }

                    if( wcmvp_vendor_array.length > 0 )
                    {   
                        $('#wcmvp-loader-image').css('display','block');

                        var wcmvp_vendor_bulk_data = {
                            'action' : 'wcmvp_vendor_bulk',
                            'wcmvp_vendor_array' : wcmvp_vendor_array,
                            'wcmvp_vendor_bulk_action' : wcmvp_vendor_bulk_action,
                            'wcmvp_vendor_bulk_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
                        }

                        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_vendor_bulk_data,function(response) {

                            $('#wcmvp-loader-image').css('display','none');
                            $('.wcmvp_vendor_inner_checkbox').prop('checked', false );
                            $('.wcmvp_outer_checkbox').prop('checked',false );

                            if( response == 1 )
                            {   
                                if( wcmvp_vendor_bulk_action == 1 )
                                {
                                    $( wcmvp_vendor_array ).each( function( item, rowId ) {
                                        $('.wcmvp_vendors_status' + rowId).prop('checked',true);
                                        $('.wcmvp_vendor_enable_selling' + rowId).prop('checked',true);
                                    })
                                }
                                if( wcmvp_vendor_bulk_action == 0 )
                                {
                                    $( wcmvp_vendor_array ).each( function( item, rowId ) {
                                        $('.wcmvp_vendors_status' + rowId).prop('checked',false);
                                        $('.wcmvp_vendor_enable_selling' + rowId).prop('checked',false);
                                    })
                                }
                                $('.notifyjs-wrapper').remove();
                                $.notify(
                                    wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_some_error_msg, {
                                    className : 'vendor_success',
                                    position : 'right bottom',
                                    }
                                )
                            }
                            else
                            {
                                $('.notifyjs-wrapper').remove();
                                $.notify(
                                    wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_setting_saved, {
                                        className : 'vendor_error',
                                        position : 'right bottom',
                                    }
                                )
                            }
                        },'json')
                    }
                }
            })

//================Code Goes when click on capsule to activate or deactivate a vendor==========================//
//================Code Goes when click on capsule to activate or deactivate a vendor==========================//

            $(document).on('click','.wcmvp_vendors_status',function() {

                $('#wcmvp-loader-image').css('display','block');
                if($(this).is(':checked'))
                {
                    wcmvp_vendor_status  = 1;
                    wcmvp_vendor_data_id = $(this).attr('data-id');
                }
                else
                {
                    wcmvp_vendor_status  = 0;
                    wcmvp_vendor_data_id = $(this).attr('data-id');
                }
                
                var wcmvp_vendor_status_data = {
                    'action' : 'wcmvp_vendor_status',
                    'wcmvp_vendor_status' : wcmvp_vendor_status,
                    'wcmvp_vendor_data_id' : wcmvp_vendor_data_id,
                    'wcmvp_vendor_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
                } 

                jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_vendor_status_data, function(response){
                    $('#wcmvp-loader-image').css('display','none');
                    if(response==1)
                        {
                            $('#wcmvp_vendors_table').DataTable().ajax.reload();
                            wcmvp_vendors_count_as_status();
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_setting_saved, {
                                className : 'vendor_success',
                                position : 'right bottom',
                                }
                            )
                        }
                        else
                        {
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_some_error_msg, {
                                    className : 'vendor_error',
                                    position : 'right bottom',
                                }
                            )
                        }
                },'json')

            })

//================== Code execute when click on pop up buttons of vendor section===========================//
//================== Code execute when click on pop up buttons of vendor section===========================//

            $(document).on( 'click','.wcmvp_vendor_options',function() {
                $('.wcmvp_multivendor_platform_vendor_next').attr('data-value','wcmvp_vendor_store_details');
                $('.wcmvp_multivendor_platform_vendor_next').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_next);
                $('#wcmvp_vendor_store_address').removeClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_payment_options').addClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_store_details_section').show();
                $('#wcmvp_vendor_store_address_section').hide();
                $('#wcmvp_vendor_payment_option_section').hide();
            } )

            $(document).on( 'click','#wcmvp_vendor_store_details',function() {
                $('.wcmvp_multivendor_platform_vendor_next').attr('data-value','wcmvp_vendor_store_details');
                $('.wcmvp_multivendor_platform_vendor_next').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_next);
                $('#wcmvp_vendor_store_details').addClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_store_address').removeClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_payment_options').removeClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_store_details_section').show();
                $('#wcmvp_vendor_store_address_section').hide();
                $('#wcmvp_vendor_payment_option_section').hide();
            } )

            $(document).on( 'click','#wcmvp_vendor_store_address',function() {
                $('.wcmvp_multivendor_platform_vendor_next').attr('data-value','wcmvp_vendor_store_address');
                $('.wcmvp_multivendor_platform_vendor_next').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_next);
                $('#wcmvp_vendor_store_address').addClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_payment_options').removeClass('wcmvp-store-btn-active');
                $("#wcmvp_vendor_store_details").removeClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_store_details_section').hide();
                $('#wcmvp_vendor_store_address_section').show();
                $('#wcmvp_vendor_payment_option_section').hide();
            } )

            $(document).on( 'click','#wcmvp_vendor_payment_options',function() {
                $('.wcmvp_multivendor_platform_vendor_next').attr('data-value','wcmvp_vendor_payment_options');
                $('.wcmvp_multivendor_platform_vendor_next').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_update);
                $('#wcmvp_vendor_payment_options').addClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_store_details').removeClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_store_address').removeClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_store_details_section').hide();
                $('#wcmvp_vendor_store_address_section').hide();
                $('#wcmvp_vendor_payment_option_section').show();
            } )

//===================Code Come into action when click on Next/Update Button on popup modal====================//
//===================Code Come into action when click on Next/Update Button on popup modal====================//

            $(document).on( 'click','.wcmvp_multivendor_platform_vendor_next',function() {

                var wcmvp_vendor_check_before_update  = $(this).attr('data-check');

                if( wcmvp_vendor_check_before_update == "wcmvp_addnew_vendor" )
                {
                    var wcmvp_add_new_vend_email = $(document).find('#wcmvp-add-new-vend-email').val();
                    var wcmvp_add_new_vend_uname = $(document).find('#wcmvp_add_new_vend_uname').val();
                    var wcmvp_add_new_vend_passwrd = $(document).find('#wcmvp_add_new_vend_passwrd').val();
                    var wcmvp_vendor_store_name1 = $(document).find('#wcmvp-add-vend-store-name').val();

                    if( wcmvp_add_new_vend_uname == "" || wcmvp_add_new_vend_email == "" || wcmvp_add_new_vend_passwrd == "" || wcmvp_vendor_store_name1 == "")
                    {
                        if( wcmvp_add_new_vend_uname == "" )
                        {
                            $('.notifyjs-wrapper').remove();
                                $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_prod_username_required, {
                                className : 'vendor_error',
                                position : 'right bottom',
                                }
                            );
                            return false;
                        }
                        else if( wcmvp_add_new_vend_email == "" )
                        {
                            $('.notifyjs-wrapper').remove();
                                $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_prod_email_required, {
                                className : 'vendor_error',
                                position : 'right bottom',
                                }
                            );
                            return false;
                        }
                        else if( wcmvp_add_new_vend_passwrd == "" )
                        {
                            $('.notifyjs-wrapper').remove();
                                $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_prod_password_required, {
                                className : 'vendor_error',
                                position : 'right bottom',
                                }
                                );
                            return false;
                        }
                        else if( wcmvp_vendor_store_name1 == "" )
                        {
                            $('.notifyjs-wrapper').remove();
                                $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_prod_store_name_required, {
                                className : 'vendor_error',
                                position : 'right bottom',
                                }
                                );
                            return false;
                        }
                    }
                }
                

                var wcmvp_vendor_next;
                wcmvp_vendor_next = $(this).attr('data-value');

                if(wcmvp_vendor_next == 'wcmvp_vendor_store_details')
                {
                    $(this).attr('data-value','wcmvp_vendor_store_address');
                    $(document).find('#wcmvp_vendor_store_details').removeClass('wcmvp-store-btn-active');
                    $(document).find('#wcmvp_vendor_store_address').addClass('wcmvp-store-btn-active');
                    $(document).find('#wcmvp_vendor_payment_options').removeClass('wcmvp-store-btn-active');
                    $(document).find('#wcmvp_vendor_store_details_section').hide();
                    $(document).find('#wcmvp_vendor_store_address_section').show();
                    $(document).find('#wcmvp_vendor_payment_option_section').hide();
                    $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('colors');
                    $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('active');
                    $(document).find('.wcmvp_vendoradd_store_detail_section').hide();
                    $(document).find('.wcmvp_vendoradd_store_addres_section').show();
                    $(document).find('.wcmvp_vendoradd_store_paymnt_section').hide();
                    $(document).find('#wcmvp-vend-add-new-img').hide();
                    $(document).find('#wcmvp-add-new-vend-store-address').addClass('active');
                    $(document).find('#wcmvp-add-new-vend-store-address').prev().addClass('colors');

                }

                if(wcmvp_vendor_next == 'wcmvp_vendor_store_address')
                {
                    $(this).attr('data-value','wcmvp_vendor_payment_options');
                    $(this).html('Update');
                    $(document).find('#wcmvp_vendor_store_details').removeClass('wcmvp-store-btn-active');
                    $(document).find('#wcmvp_vendor_store_address').removeClass('wcmvp-store-btn-active');
                    $(document).find('#wcmvp_vendor_payment_options').addClass('wcmvp-store-btn-active');
                    $(document).find('#wcmvp_vendor_store_details_section').hide();
                    $(document).find('#wcmvp_vendor_store_address_section').hide();
                    $(document).find('#wcmvp_vendor_payment_option_section').show();

                    $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('colors');
                    $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('active');
                    $(document).find('.wcmvp_vendoradd_store_detail_section').hide();
                    $(document).find('.wcmvp_vendoradd_store_addres_section').hide();
                    $(document).find('.wcmvp_vendoradd_store_paymnt_section').show();
                    $(document).find('#wcmvp-vend-add-new-img').hide();
                    $(document).find('#wcmvp-add-new-vend-store-pymnt').addClass('active');
                    $(document).find('#wcmvp-add-new-vend-store-pymnt').prevAll().addClass('colors');
                }

                if(wcmvp_vendor_next == 'wcmvp_vendor_payment_options')
                {   

                    var wcmvp_vendor_enable_selling,wcmvp_vendor_publishing_product,wcmvp_vendor_admin_featured_vendor

                    var wcmvp_vendor_check_before_update  = $(this).attr('data-check');
                    var wcmvp_vendor_data_id  = $(document).find('.wcmvp_multivendor_platform_vendor_next').attr('data-id');
                    
                    var wcmvp_vendor_img_id = $(document).find('.wcmvp_vendor_img_id').val();

                    if( wcmvp_vendor_check_before_update == 'wcmvp_addnew_vendor' )
                    {
                        var wcmvp_add_new_vend_fname = $(document).find('#wcmvp-add-new-vend-fname').val();
                        var wcmvp_add_new_vend_lname = $(document).find('#wcmvp-add-new-vend-lname').val();
                        var wcmvp_add_new_vend_email = $(document).find('#wcmvp-add-new-vend-email').val();
                        var wcmvp_add_new_vend_uname = $(document).find('#wcmvp_add_new_vend_uname').val();
                        var wcmvp_add_new_vend_passwrd = $(document).find('#wcmvp_add_new_vend_passwrd').val();
                        var wcmvp_vendor_store_name1 = $(document).find('#wcmvp-add-vend-store-name').val(); 
                        var wcmvp_addnew_vend_paypal_email = $(document).find('#wcmvp_addnew_vend_paypal_email').val();
                        var wcmvp_addnew_vend_stripe_id = $(document).find('#wcmvp_addnew_vend_stripe_id').val();
                        var wcmvp_vendor_selected_country = $('#wcmvp_addnew_vend_country').children('option:selected').val(); 
                        var wcmvp_vendor_selected_state = $('.wcmvp_addnew_vendor_state').children('option:selected').val();  
                        var wcmvp_vendor_store_url = $(document).find('#wcmvp-add-new-vend-store-url').val();  
                        var wcmvp_vendor_store_phone = $(document).find('#wcmvp-add-new-vend-phone').val();
                        var wcmvp_vendor_store_address1 = $(document).find('#wcmvp_vendor_addnew_store_address1').val(); 
                        var wcmvp_vendor_store_address2 = $(document).find('#wcmvp_vendor_addnew_store_address2').val(); 
                        var wcmvp_vendor_town_city = $(document).find('#wcmvp_vendor_addnew_town_city').val(); 
                        var wcmvp_vendor_zip_code = $(document).find('#wcmvp_vendor_addnew_zip_code').val();
                        var wcmvp_vendor_bank_name = $(document).find('#wcmvp_vendor_addnew_bank_name').val();
                        var wcmvp_vendor_bank_account_no = $(document).find('#wcmvp-addnew-vend-acc-no').val();
                        var wcmvp_vendor_bank_address = $(document).find('#wcmvp_vendor_addnew_bank_address').val();
                        var wcmvp_vendor_routing_number = $(document).find('#wcmvp_vendor_addnew_routing_number').val();
                        var wcmvp_vendor_bank_iban = $(document).find('#wcmvp_vendor_addnew_bank_iban').val();
                        var wcmvp_vendor_bank_swift = $(document).find('#wcmvp_vendor_addnew_bank_swift').val();
                        
                        if( $(document).find('#wcmvp_addnew_vendor_enable_selling').is(':checked') )
                        {
                            wcmvp_vendor_enable_selling = 1;
                        }
                        else
                        {
                            wcmvp_vendor_enable_selling = 0;
                        }
                        if( $(document).find('.wcmvp_addnew_vendor_publishing_product').is(':checked') )
                        {
                            wcmvp_vendor_publishing_product = 1;
                        }
                        else
                        {
                            wcmvp_vendor_publishing_product = 0;
                        }
                        if( $(document).find('.wcmvp_addnew_vendor_admin_featured_vendor').is(':checked') )
                        {
                            wcmvp_vendor_admin_featured_vendor = 1;
                        }
                        else
                        {
                            wcmvp_vendor_admin_featured_vendor = 0;
                        }
                    }

                    if( wcmvp_vendor_check_before_update == 'wcmvp_edit_vendor' )
                    {
                        var wcmvp_vendor_selected_country = $('#wcmvp_vendor_store_country').children('option:selected').val(); 
                        var wcmvp_vendor_selected_state = $('.wcmvp_vendor_state').children('option:selected').val(); 
                        var wcmvp_vendor_store_name1 = $(document).find('.wcmvp_vendor_store_name1').val();  
                        var wcmvp_vendor_store_url = $(document).find('.wcmvp_vendor_store_url').val();  
                        var wcmvp_vendor_store_phone = $(document).find('.wcmvp_vendor_store_phone').val(); 
                        var wcmvp_vendor_facebook = $(document).find('.wcmvp_vendor_facebook').val(); 
                        var wcmvp_vendor_google_plus = $(document).find('.wcmvp_vendor_google_plus').val(); 
                        var wcmvp_vendor_twitter = $(document).find('.wcmvp_vendor_twitter').val(); 
                        var wcmvp_vendor_pinterest = $(document).find('.wcmvp_vendor_pinterest').val(); 
                        var wcmvp_vendor_linkedin = $(document).find('.wcmvp_vendor_linkedin').val(); 
                        var wcmvp_vendor_youtube = $(document).find('.wcmvp_vendor_youtube').val(); 
                        var wcmvp_vendor_instagram = $(document).find('.wcmvp_vendor_instagram').val(); 
                        var wcmvp_vendor_flickr = $(document).find('.wcmvp_vendor_flickr').val(); 
                        var wcmvp_vendor_store_address1 = $(document).find('.wcmvp_vendor_store_address1').val(); 
                        var wcmvp_vendor_store_address2 = $(document).find('.wcmvp_vendor_store_address2').val(); 
                        var wcmvp_vendor_town_city = $(document).find('.wcmvp_vendor_town_city').val(); 
                        var wcmvp_vendor_zip_code = $(document).find('.wcmvp_vendor_zip_code').val();
                        var wcmvp_vendor_bank_name = $(document).find('.wcmvp_vendor_bank_name').val();
                        var wcmvp_vendor_bank_account_no = $(document).find('.wcmvp_vendor_bank_account_no').val();
                        var wcmvp_vendor_bank_address = $(document).find('.wcmvp_vendor_bank_address').val();
                        var wcmvp_vendor_routing_number = $(document).find('.wcmvp_vendor_routing_number').val();
                        var wcmvp_vendor_bank_iban = $(document).find('.wcmvp_vendor_bank_iban').val();
                        var wcmvp_addnew_vend_paypal_email = $(document).find('.wcmvp_vendor_paypal_email').val();
                        var wcmvp_addnew_vend_stripe_id = $(document).find('.wcmvp_vendor_stripe_id').val();
                        var wcmvp_vendor_bank_swift = $(document).find('.wcmvp_vendor_bank_swift').val();
    
                        if( $(document).find('#wcmvp_vendor_enable_selling').is(':checked') )
                        {
                            wcmvp_vendor_enable_selling = 1;
                        }
                        else
                        {
                            wcmvp_vendor_enable_selling = 0;
                        }
                        if( $(document).find('.wcmvp_vendor_publishing_product').is(':checked') )
                        {
                            wcmvp_vendor_publishing_product = 1;
                        }
                        else
                        {
                            wcmvp_vendor_publishing_product = 0;
                        }
                        var wcmvp_admin_vendor_commssion = $(document).find('.wcmvp_admin_vendor_commssion').children( 'option:selected' ).val();
                        var wcmvp_vendor_admin_commision_value = $(document).find('.wcmvp_vendor_admin_commision_value').val();
                        if( $(document).find('.wcmvp_vendor_admin_featured_vendor').is(':checked') )
                        {
                            wcmvp_vendor_admin_featured_vendor = 1;
                        }
                        else
                        {
                            wcmvp_vendor_admin_featured_vendor = 0;
                        }
                    }
                    var wcmvp_vendors_data = {
                        'action' : 'wcmvp_edit_vendors_data',

                        'wcmvp_edit_vendors_data[wcmvp_vendor_check_before_update]' : wcmvp_vendor_check_before_update,
                        'wcmvp_edit_vendors_data[wcmvp_add_new_vend_fname]' : wcmvp_add_new_vend_fname,
                        'wcmvp_edit_vendors_data[wcmvp_add_new_vend_lname]' : wcmvp_add_new_vend_lname,
                        'wcmvp_edit_vendors_data[wcmvp_add_new_vend_email]' : wcmvp_add_new_vend_email,
                        'wcmvp_edit_vendors_data[wcmvp_add_new_vend_uname]' : wcmvp_add_new_vend_uname,
                        'wcmvp_edit_vendors_data[wcmvp_add_new_vend_passwrd]' : wcmvp_add_new_vend_passwrd,
                        'wcmvp_edit_vendors_data[wcmvp_addnew_vend_paypal_email]' : wcmvp_addnew_vend_paypal_email,
                        'wcmvp_edit_vendors_data[wcmvp_addnew_vend_stripe_id]' : wcmvp_addnew_vend_stripe_id,            'wcmvp_edit_vendors_data[wcmvp_vendor_data_id]' : wcmvp_vendor_data_id,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_img_id]' : wcmvp_vendor_img_id,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_store_name1]' : wcmvp_vendor_store_name1,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_store_url]' : wcmvp_vendor_store_url,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_store_phone]' : wcmvp_vendor_store_phone,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_facebook]' : wcmvp_vendor_facebook,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_google_plus]' : wcmvp_vendor_google_plus,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_twitter]' : wcmvp_vendor_twitter,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_pinterest]' : wcmvp_vendor_pinterest,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_linkedin]' : wcmvp_vendor_linkedin,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_youtube]' : wcmvp_vendor_youtube,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_instagram]' : wcmvp_vendor_instagram,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_flickr]' : wcmvp_vendor_flickr,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_store_address1]' : wcmvp_vendor_store_address1,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_store_address2]' : wcmvp_vendor_store_address2,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_town_city]' : wcmvp_vendor_town_city,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_zip_code]' : wcmvp_vendor_zip_code,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_selected_country]' : wcmvp_vendor_selected_country,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_selected_state]' : wcmvp_vendor_selected_state,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_bank_name]' : wcmvp_vendor_bank_name,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_bank_account_no]' : wcmvp_vendor_bank_account_no,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_bank_address]' : wcmvp_vendor_bank_address,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_routing_number]' : wcmvp_vendor_routing_number,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_bank_iban]' : wcmvp_vendor_bank_iban,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_bank_swift]' : wcmvp_vendor_bank_swift,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_enable_selling]' : wcmvp_vendor_enable_selling,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_publishing_product]' : wcmvp_vendor_publishing_product,
                        'wcmvp_edit_vendors_data[wcmvp_admin_vendor_commssion]' : wcmvp_admin_vendor_commssion,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_admin_commision_value]' : wcmvp_vendor_admin_commision_value,
                        'wcmvp_edit_vendors_data[wcmvp_vendor_admin_featured_vendor]' : wcmvp_vendor_admin_featured_vendor,

                        'wcmvp_vendors_data_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
                    }

//==================Response comes from ajax when admin update any vendors data======================//                  
//==================Response comes from ajax when admin update any vendors data======================//                    
                    
                    jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_vendors_data, function(response){

                        $(document).find('#wcmvp_vendors_table').DataTable().ajax.reload();
                        wcmvp_vendors_count_as_status();

                        if( response == 1 )
                        {   
                            if( wcmvp_vendor_check_before_update == 'wcmvp_edit_vendor' )
                            {
                                var wcmvp_vendor_notify = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_vendor_updtaed;
                            }
                            if( wcmvp_vendor_check_before_update == 'wcmvp_addnew_vendor' )
                            {
                                var wcmvp_vendor_notify = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_vendor_created;
                            }
                            
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                wcmvp_vendor_notify, {
                                className : 'vendor_success',
                                position : 'right bottom',
                                }
                            )
                        } 
                        else
                        {
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_some_error_msg, {
                                    className : 'vendor_error',
                                    position : 'right bottom',
                                }
                            )
                        }
                    },'json')
                }

            } )

//===============Function Come in action when admin click on vendor store name or edit button=====================//
//===============Function Come in action when admin click on vendor store name or edit button=====================//

            $(document).on( 'click','.wcmvp_vendor_edit_modal',function(e) {
                
                e.preventDefault();
                $("#wcmvp_vendor_modal").addClass("wcmvp-modal-open");
                $("body").css("overflow","hidden");
                $('.wcmvp_multivendor_platform_vendor_next').attr('data-value','wcmvp_vendor_store_details');
                $('.wcmvp_multivendor_platform_vendor_next').html('Next');
                $('#wcmvp_vendor_store_details').addClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_store_address').removeClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_payment_options').removeClass('wcmvp-store-btn-active');
                $('#wcmvp_vendor_store_details_section').show();
                $('#wcmvp_vendor_store_address_section').hide();
                $('#wcmvp_vendor_payment_option_section').hide();

                var wcmvp_vendor_data_id  = $(this).attr('data-id');

                var wcmvp_vendor_img_id = $( '#wcmvp_vendor_img' + wcmvp_vendor_data_id ).attr( 'data-img' );
                $('#wcmvp_vendor_enable_selling').addClass('wcmvp_vendor_enable_selling' + wcmvp_vendor_data_id);
                $(document).find('.wcmvp_multivendor_platform_vendor_next').attr('data-id',wcmvp_vendor_data_id);
                $( '.wcmvp_vendor_img_id' ).val(wcmvp_vendor_img_id);
                var wcmvp_vendors_data = {
                    'action' : 'wcmvp_vendors_data',
                    'wcmvp_vendor_data_id' : wcmvp_vendor_data_id,
                    'wcmvp_vendors_data_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
                }
                
// =====================Ajax Response of that and also validate that key exist in db or not==========================///                
// =====================Ajax Response of that and also validate that key exist in db or not==========================///                

                jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_vendors_data, function(response){

                    if( response != "" && response != null )
                    {
                        if( response.hasOwnProperty('wcmvp_vendor_store_img'))
                        {
                            $('.wcmvp_vendor_img_pre').attr( 'src',response['wcmvp_vendor_store_img' ]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_img_pre').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_store_name'))
                        {
                            $('.wcmvp_vendor_store_name1').val(response['wcmvp_store_name'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_store_name1').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_store_url'))
                        {
                            $('.wcmvp_vendor_store_url').val(response['wcmvp_store_url'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_store_url').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_phone'))
                        {
                            $('.wcmvp_vendor_store_phone').val(response['wcmvp_phone'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_store_phone').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_facebook'))
                        {
                            $('.wcmvp_vendor_facebook').val(response['wcmvp_vendor_facebook'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_facebook').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_google_plus'))
                        {
                            $('.wcmvp_vendor_google_plus').val(response['wcmvp_vendor_google_plus'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_google_plus').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_twitter'))
                        {
                            $('.wcmvp_vendor_twitter').val(response['wcmvp_vendor_twitter'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_twitter').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_pinterest'))
                        {
                            $('.wcmvp_vendor_pinterest').val(response['wcmvp_vendor_pinterest'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_pinterest').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_linkedin'))
                        {
                            $('.wcmvp_vendor_linkedin').val(response['wcmvp_vendor_linkedin'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_linkedin').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_youtube'))
                        {
                            $('.wcmvp_vendor_youtube').val(response['wcmvp_vendor_youtube'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_youtube').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_instagram'))
                        {
                            $('.wcmvp_vendor_instagram').val(response['wcmvp_vendor_instagram'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_instagram').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_flickr'))
                        {
                            $('.wcmvp_vendor_flickr').val(response['wcmvp_vendor_flickr'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_flickr').val("");
                        }    
                        if( response.hasOwnProperty('wcmvp_vendor_address1'))
                        {
                            $('.wcmvp_vendor_store_address1').val(response['wcmvp_vendor_address1'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_store_address1').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_address2'))
                        {
                            $('.wcmvp_vendor_store_address2').val(response['wcmvp_vendor_address2'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_store_address2').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_city'))
                        {
                            $('.wcmvp_vendor_town_city').val(response['wcmvp_vendor_city'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_town_city').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_zip'))
                        {
                            $('.wcmvp_vendor_zip_code').val(response['wcmvp_vendor_zip'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_zip_code').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_country'))
                        {   
                            if( response['wcmvp_vendor_country'][0] != "" )
                            {  
                                $(document).find('#wcmvp_vendor_store_country').val(response['wcmvp_vendor_country'][0]);
                                $(document).find('#wcmvp_vendor_store_country').select2();

                                if( response.hasOwnProperty('wcmvp_vendor_state'))
                                {   
                                    if( response['wcmvp_vendor_state'][0] != "" && response['wcmvp_vendor_state'][0] != null )
                                    {   
                                        $(document).find('.wcmvp_state_show').css('display','block');
                                        $(document).find('#wcmvp_vendor_select_count_ajax').html(response['wcmvp_vendor_all_state']);
                                        $(document).find('.wcmvp_vendor_state').val(response['wcmvp_vendor_state'][0]);
                                        $(document).find('.wcmvp_vendor_state').select2();
                                    }
                                    else
                                    {
                                        $(document).find('.wcmvp_state_show').css('display','none');                                        
                                    }
                                    if( response['wcmvp_vendor_state'][0] == "" || response['wcmvp_vendor_state'][0] == null )
                                    { 
                                        $(document).find('.wcmvp_state_show').css('display','none');
                                    }
                                }
                                else
                                {   
                                    $(document).find('.wcmvp_vendor_state_county').val("");
                                    $(document).find('.wcmvp_state_show').css('display','none');
                                }

                            }
                            if( response['wcmvp_vendor_country'][0] == "" || response['wcmvp_vendor_country'][0] == null )
                            { 
                                $(document).find('#wcmvp_vendor_store_country').val(response['wcmvp_vendor_country'][0]);
                                $(document).find('.wcmvp_state_show').css('display','none');
                            }
                        }
                        else
                        {   
                            $(document).find('#wcmvp_vendor_store_country').val("");
                            $(document).find('.wcmvp_state_show').css('display','none');
                            
                        }

                        if( response.hasOwnProperty('wcmvp_vendor_bank_name'))
                        {
                            $('.wcmvp_vendor_bank_name').val(response['wcmvp_vendor_bank_name'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_bank_name').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_bank_account_no'))
                        {
                            $('.wcmvp_vendor_bank_account_no').val(response['wcmvp_vendor_bank_account_no'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_bank_account_no').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_bank_address'))
                        {
                            $('.wcmvp_vendor_bank_address').val(response['wcmvp_vendor_bank_address'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_bank_address').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_routing_number'))
                        {
                            $('.wcmvp_vendor_routing_number').val(response['wcmvp_vendor_routing_number'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_routing_number').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_bank_iban'))
                        {
                            $('.wcmvp_vendor_bank_iban').val(response['wcmvp_vendor_bank_iban'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_bank_iban').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_stripe_id'))
                        {
                            $('.wcmvp_vendor_stripe_id').val(response['wcmvp_vendor_stripe_id'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_stripe_id').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_bank_swift'))
                        {
                            $('.wcmvp_vendor_bank_swift').val(response['wcmvp_vendor_bank_swift'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_bank_swift').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_status'))
                        {
                            if(response['wcmvp_vendor_status'][0] == 1)
                            {
                                $(document).find('.wcmvp_vendor_enable_selling'+wcmvp_vendor_data_id).prop('checked',true);
                            }
                            if(response['wcmvp_vendor_status'][0] == 0)
                            {
                                $('.wcmvp_vendor_enable_selling'+wcmvp_vendor_data_id).prop('checked',false);
                            }
                        }
                        else
                        {
                            ('.wcmvp_vendor_enable_selling'+wcmvp_vendor_data_id).prop('checked',false);
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_publishing_product'))
                        {
                            if(response['wcmvp_vendor_publishing_product'][0] == 1)
                            {
                                $('.wcmvp_vendor_publishing_product').prop('checked',true);
                            }
                        }
                        else
                        {
                            $('.wcmvp_vendor_publishing_product').prop('checked',false);
                        }
                        if( response.hasOwnProperty('wcmvp_admin_vendor_commssion'))
                        {
                            $('.wcmvp_admin_vendor_commssion').val(response['wcmvp_admin_vendor_commssion'][0]);
                        }
                        else
                        {
                            $('.wcmvp_admin_vendor_commssion').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_admin_commision_value'))
                        {
                            $('.wcmvp_vendor_admin_commision_value').val(response['wcmvp_vendor_admin_commision_value'][0]);
                        }
                        else
                        {
                            $('.wcmvp_vendor_admin_commision_value').val("");
                        }
                        if( response.hasOwnProperty('wcmvp_vendor_admin_featured_vendor'))
                        {
                            if(response['wcmvp_vendor_admin_featured_vendor'][0] == 1)
                            {
                                $('.wcmvp_vendor_admin_featured_vendor').prop('checked',true);
                            }
                        }
                        else
                        {
                            $('.wcmvp_vendor_admin_featured_vendor').prop('checked',false);
                        }
                        $(document).find('.wcmvp_edit_vendor_details_data').each(function(a,b){
                            if( $(this).val() != '' )
                            {
                                $(this).siblings().addClass('mdc-notched-outline--notched');
                                $(this).siblings().children(".mdc-notched-outline__notch").children(".mdc-floating-label").addClass('mdc-floating-label--float-above');
                            }
                            else
                            {
                                $(this).siblings().removeClass('mdc-notched-outline--notched');
                                $(this).siblings().children(".mdc-notched-outline__notch").children(".mdc-floating-label").removeClass('mdc-floating-label--float-above');
                            }   
                        })
                    }

                },'json')

            } )

//==================Ajax request goes when admin select an country, state displayed accordingly==============//

            $(document).on( 'change','#wcmvp_vendor_store_country',function() {
                var wcmvp_vendor_selected_country = $(this).children('option:selected').val();

                var wcmvp_vendor_selected_country_val = {
                    'action' : 'wcmvp_vendor_selected_country',
                    'wcmvp_vendor_selected_country' : wcmvp_vendor_selected_country,
                    'wcmvp_vendor_sel_count_nonce'  : wcmvp_vendor_object.wcmvp_vendor_nonce
                }

                jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_vendor_selected_country_val, function(response){  
                    if( response != "" )
                    {
                        $('.wcmvp_state_show').css('display','block');
                        $('#wcmvp_vendor_select_count_ajax').html(response);
                        $(document).find('.wcmvp_vendor_state').select2();
                    }
                    if( response == "" )
                    {
                        $('.wcmvp_state_show').css('display','none');
                    }
                },'json')

            } )//===========Codes came into action when tables sorted acoording to vendor status==================//

        $(document).on( 'click','.wcmvp_vendor_status',function(e) {
                    
            e.preventDefault();
            $('#wcmvp-loader-image').fadeIn(100);
            $('#wcmvp-loader-image').fadeOut();
            var wcmvp_sort_by_vend_status = $(this).attr('data-value');
            $(document).find('#wcmvp_sort_by_vend_status_save').val(wcmvp_sort_by_vend_status);
            $(document).find('.wcmvp_vendor_status').removeClass('wcmvp_sort_by_status_active');
            $(this).addClass('wcmvp_sort_by_status_active');
            $(document).find("#wcmvp_vendors_table").dataTable().fnDestroy();
            wcmvp_vendor_datatable(wcmvp_sort_by_vend_status);
            wcmvp_vendors_count_as_status();

        } )

        $(document).find(".wcmvp-modal-close").click(function(){
            $(this).closest(".wcmvp-modal").removeClass("wcmvp-modal-open");
            $("body").css("overflow-y","scroll");
        });

    })

//===================Code goes when came back from product page to vendors page=-========================///

    $(document).on( 'click','.wcmvp_vendors_chng_product_again',function( e ) {

        $(document).find('.wcmvp_vendor_status').removeClass('wcmvp_sort_by_status_active');
        $(document).find('#wcmvp_vendor_sort_all_vend').addClass('wcmvp_sort_by_status_active');
        var wcmvp_sort_by_vend_status = 'all_vend';
        $(document).find("#wcmvp_vendors_table").dataTable().fnDestroy();
        wcmvp_vendor_datatable(wcmvp_sort_by_vend_status);
        wcmvp_vendors_count_as_status();
    })//================= Code Goes when add New vendor modal goes active============================//

    $(document).on( 'blur','.wcmvp_addnew_vend_label input',function() {

        $(this).each(function(){
            if($(this).val() != "")
            {
                $(this).next().css({'left' : '0', 'font-size': '12px', 'color': '#3399FF', 'transition': '0.3s'});
            }
            else
            {
                $(this).next().css({'position': 'absolute', 'left': '14px', 'width': '100%', 'top': '10px', 'color': '#aaa', 'transition': '0.3s', 'cursor': 'text', 'letter-spacing': '0.5px','font-size': '14px'});
            }
        })
    } )

    $(document).on( 'focus','.wcmvp_addnew_vend_label input',function() {

        $(this).each(function(){
            $(this).next().css({'left' : '0', 'font-size': '12px', 'color': '#3399FF', 'transition': '0.3s'});
        })
    } )

    $(document).on('click','#wcmvp_add_new_vend',function() {
        $(document).find("#wcmvp-add-new-vend-modal").addClass("wcmvp-modal-open");
        $(document).find("body").css("overflow","hidden");
        $(document).find('.wcmvp-vendor-input input').each(function(){
            $(this).val("");
        })
        $(document).find('#wcmvp_addnew_vend_country').val("");
        $(document).find('#wcmvp_addnew_vend_state_show').hide();
        $(document).find('.wcmvp_vendor_img_pre').attr('src',"");

        $(document).find('.wcmvp_vendoradd_store_detail_section').show();
        $(document).find('.wcmvp_vendoradd_store_addres_section').hide();
        $(document).find('.wcmvp_vendoradd_store_paymnt_section').hide();
        $(document).find('#wcmvp-vend-add-new-img').show();
        $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('colors');
        $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('active');
        $(document).find('#wcmvp-add-new-vend-store-details').addClass('active');
        $(document).find('.wcmvp_multivendor_platform_vendor_next').attr('data-value','wcmvp_vendor_store_details');
        $(document).find('.wcmvp_multivendor_platform_vendor_next').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_next);
        $(document).find('#wcmvp_addnew_vend_country').select2();

        var wcmvp_add_new_vend_generate_pass_data = {
            'action' : 'wcmvp_add_new_vend_generate_pass_action',
            'wcmvp_add_new_vend_generate_pass_nonce' : wcmvp_vendor_object.wcmvp_vendor_nonce
        }

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_add_new_vend_generate_pass_data,function(response) {

            if(response != "")
            {
                $(document).find('#wcmvp_add_new_vend_passwrd').val(response);
            }

        },'json')
    })

    $(document).on('click','.wcmvp_pass_generator',function(){

        $(document).find('.wcmvp_add_new_vend_passwrd_show').show();
        $(this).text(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_regenerate);
        $(document).find('.wcmvp_pass_generator_cancel').removeClass('wcmvp_pass_generator_cancel');
        
        if($(document).find( '#wcmvp_add_new_vend_passwrd' ).val() != "")
        {
            $(document).find('#wcmvp_add_new_vend_passwrd').next().css({'top':'-18px','left' : '0', 'font-size': '12px', 'color': '#3399FF', 'transition': '0.3s'});
        }
        else
        {
            $(document).find('#wcmvp_add_new_vend_passwrd').next().css({'position': 'absolute', 'left': '14px', 'width': '100%', 'top': '10px', 'color': '#aaa', 'transition': '0.3s', 'cursor': 'text', 'letter-spacing': '0.5px','font-size': '14px'});
        }

        var wcmvp_add_new_vend_generate_pass_data = {
            'action' : 'wcmvp_add_new_vend_generate_pass_action',
            'wcmvp_add_new_vend_generate_pass_nonce' : wcmvp_vendor_object.wcmvp_vendor_nonce
        }

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_add_new_vend_generate_pass_data,function(response) {

            if(response != "")
            {
                $(document).find('#wcmvp_add_new_vend_passwrd').val(response);
            }

        },'json')
    })

    $(document).on('change','#wcmvp_addnew_vend_country',function(){

        var wcmvp_addnew_vend_selected_country = $(this).children('option:selected').val();
        var wcmvp_addnew_vend_country_data = {
            'action' : 'wcmvp_addnew_vend_country_action',
            'wcmvp_addnew_vend_selected_country' : wcmvp_addnew_vend_selected_country,
            'wcmvp_addnew_vend_selected_country_nonce' : wcmvp_vendor_object.wcmvp_vendor_nonce
        }

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_addnew_vend_country_data,function(response) {
            
            if(response != "")
            {
                $(document).find('#wcmvp_addnew_vend_state_show').show();
                $(document).find('#wcmvp_addnew_vendors_state').html(response);
                $(document).find('.wcmvp_vendor_state').select2();
            }
            else
            {
                $(document).find('#wcmvp_addnew_vend_state_show').hide();
            }

        },'json')
    })

    $(document).on('click','#wcmvp_pass_generator_cancel_click',function(){

        $(document).find('.wcmvp_add_new_vend_passwrd_show').hide();
        $(document).find('.wcmvp_pass_generator').text(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_generate_password);
        $(this).addClass('wcmvp_pass_generator_cancel');
    })

    
    $(document).on('click','#wcmvp-add-new-vend-store-address',function() {
        
        $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('colors');
        $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('active');
        $(document).find('.wcmvp_vendoradd_store_detail_section').hide();
        $(document).find('.wcmvp_vendoradd_store_addres_section').show();
        $(document).find('.wcmvp_vendoradd_store_paymnt_section').hide();
        $(document).find('#wcmvp-vend-add-new-img').hide();
        $(this).addClass('active');
        $(this).prev().addClass('colors');
        $(document).find('.wcmvp_multivendor_platform_vendor_next').attr('data-value','wcmvp_vendor_store_address');
        $(document).find('.wcmvp_multivendor_platform_vendor_next').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_next);

    })
    
    $(document).on('click','#wcmvp-add-new-vend-store-pymnt',function() {

        $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('colors');
        $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('active');
        $(document).find('.wcmvp_vendoradd_store_detail_section').hide();
        $(document).find('.wcmvp_vendoradd_store_addres_section').hide();
        $(document).find('.wcmvp_vendoradd_store_paymnt_section').show();
        $(document).find('#wcmvp-vend-add-new-img').hide();
        $(this).addClass('active');
        $(this).prevAll().addClass('colors');
        $(document).find('.wcmvp_multivendor_platform_vendor_next').attr('data-value','wcmvp_vendor_payment_options');
        $(document).find('.wcmvp_multivendor_platform_vendor_next').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_update);

    })

    $(document).on( 'click','#wcmvp-add-new-vend-store-details',function() {

        $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('colors');
        $(document).find('.wcmvp-add-new-vend-nav-items').removeClass('active');
        $(document).find('.wcmvp_vendoradd_store_detail_section').show();
        $(document).find('.wcmvp_vendoradd_store_addres_section').hide();
        $(document).find('.wcmvp_vendoradd_store_paymnt_section').hide();
        $(document).find('#wcmvp-vend-add-new-img').show();
        $(this).addClass('active');
        $(document).find('.wcmvp_multivendor_platform_vendor_next').attr('data-value','wcmvp_vendor_store_details');
        $(document).find('.wcmvp_multivendor_platform_vendor_next').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_next);

    } )//============== Code Goes when Vendors Product shown at admin panel accordingly selected vendor================//.    
    function wcmvp_vendor_datatable(wcmvp_sort_by_vend_status)
    {
        var wcmvp_datatable = $('#wcmvp_vendors_table').DataTable( {
        "processing" : true,
        "serverSide" : true,
        "bsortable"  : true,
        "info"       : false,
        select       : true,
        "ajax"       : {
            data: {
                action: 'wcmvp_vendors_table_action',
                'wcmvp_sort_by_vend_status' : wcmvp_sort_by_vend_status,
                'wcmvp_vendor_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
                },
            type      : 'POST',
            dataType  : 'json',
            url       : wcmvp_vendor_object.wcmvp_ajax_url,
            
            },
            columnDefs : [
                {
                    "targets": [0],
                    "orderable": false,
                    "searchable": false
                }
            ],
            order : [[1, 'asc']],
            language: {
                search: "_INPUT_",
                searchPlaceholder: wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_search,
                'processing':  "<div class='wcmvp-loader-box'><div class='wcmvp-reload-table-loader-img-div'><img class='wcmvp-loader-image-datatable' src='"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_loader_src+"' /></div></div>"
            },
            "pagingType": "full_numbers",
            "drawCallback": function () {
                $('.mdl-cell--6-col').parent().addClass('wcmvp-grid');
                $('.dataTables_filter input').addClass('wcmvp-input-search-field');
                $('.dataTables_length select').addClass('wcmvp-select-box  mdc-ripple-upgraded');
                $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
                $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");
            },
        });
    }

//================this function is about to get count from vendors table and displays at vendors product page======/// 

    function wcmvp_vendors_count_as_status()
    {   
        var wcmvp_vendors_count_data = {
            'action' : 'wcmvp_vendors_count_action',
            'wcmvp_vendors_count_nonce' : wcmvp_vendor_object.wcmvp_vendor_nonce
        }

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_vendors_count_data,function(response) {
            
            if( response != "" )
            {
                $(document).find('#wcmvp_vendor_sort_all_vend').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_all+'('+response['wcmvp_all_vendors']+')');
                $(document).find('#wcmvp_vendor_sort_approve').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_approved+'('+response['wcmvp_approved_vendors']+')');
                $(document).find('#wcmvp_vendor_sort_disable').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_disabled+'('+response['wcmvp_disabled_vendors']+')');
            }
        },'json')

    }
})( jQuery );;

///===================Code for image uploading================//
///===================Code for image uploading================//

jQuery( document ).ready( function( $ ) {

    var file_frame,wp_media_post_id;
    var set_to_post_id = wp.media.model.settings.post.id; 

    jQuery('.wcmvp_vendor_store_img').on('click', function( event ){

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

        file_frame.on( 'select', function() {

            attachment = file_frame.state().get('selection').first().toJSON();
            $('.wcmvp_vendor_img_pre' ).attr( 'src', attachment.url );
            $('.wcmvp_vendor_img_id' ).val( attachment.id );
            wp.media.model.settings.post.id = wp_media_post_id;

        });
        
        file_frame.open();
    });

    jQuery( 'a.add_media' ).on( 'click', function() {

        wp.media.model.settings.post.id = wp_media_post_id;

    });
});