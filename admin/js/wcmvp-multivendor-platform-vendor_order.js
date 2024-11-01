//This file is used to display Order section of vendors to admin jquery and javascript

(function( $ ) {

    'use strict';
    var wcmvp_url, wcmvp_split_url, wcmvp_vendors_order_href, wcmvp_order_or_order_all,wcmvp_list_to_hide;
    if(window.location.href != ""){

    wcmvp_url = window.location.href;
    wcmvp_split_url = wcmvp_url.split("#");

    }
    wcmvp_list_to_hide=["wcmvp_sort_order_pending","wcmvp_sort_order_draft","wcmvp_sort_order_processing","wcmvp_sort_order_on-hold","wcmvp_sort_order_refunded","wcmvp_sort_order_cancelled","wcmvp_sort_order_failed","wcmvp_sort_order_trash"];
        $(document).ready(function( $ ){  

            if(wcmvp_split_url[1] == 'orders' || wcmvp_split_url[1] == '/orders_all'){

                // id's of each menu to intially hide them
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-vendor').css('display','block');
                $(document).find('#wcmvp-multivendor-platform-features').css('display','none');               
                $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
                $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
                $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');

                $('#wcmvp-multivendor-platform-report').css('display','none');
                if(wcmvp_split_url[1] == '/orders_all')
                {
                    $(document).find('#wcmvp-admin-all-orders').addClass('nav-tab-active');
                    $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
                }
                else
                {
                    $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
                    $(document).find('#wcmvp-admin-vendor').addClass('nav-tab-active');
                }
            
                $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
                $(document).find('#wcmvp-loader-image').fadeOut();

                $(document).find('.wcmvp_multivendor_platform_vendor_orders').show();
                $(document).find('.wcmvp_vendors_details').hide();

                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                
                var wcmvp_order_vendor_id = $(document).find('#wcmvp_order_vendor_id').val();
                var wcmvp_sort_order_by = $(document).find('#wcmvp_sort_order_by').val();
                if( wcmvp_sort_order_by == 'trash' )
                {
                    var wcmvp_sort_active = 'trash';
                }
                if( wcmvp_sort_order_by == 'draft' )
                {
                    var wcmvp_sort_active = 'draft';
                }
                else if( wcmvp_sort_order_by != 'all' )
                {
                    var wcmvp_sort_active = wcmvp_sort_order_by.replace('wc-','');
                }
                else
                {
                    wcmvp_sort_active = 'all';
                }

                $(document).find('.wcmvp_sort_by_order_status').removeClass('wcmvp_sort_by_status_active');
                $(document).find('#wcmvp_sort_order_'+wcmvp_sort_active).addClass('wcmvp_sort_by_status_active');
                $(document).find('#wcmvp_order_table').dataTable().fnDestroy();
                if(wcmvp_split_url[1] == '/orders_all')
                {
                    var wcmvp_order_or_order_all = 'isexist';
                    wcmvp_order_datatable('',wcmvp_sort_order_by,wcmvp_order_or_order_all);
                    wcmvp_orders_count();
                }
                else
                {
                    var wcmvp_order_or_order_all = 'isnotexist';
                    wcmvp_order_datatable(wcmvp_order_vendor_id,wcmvp_sort_order_by,wcmvp_order_or_order_all);
                    wcmvp_orders_count(wcmvp_order_vendor_id);
                }
                
                

            }          //=================code goes when click on order btn to view order table=================================//


            $(document).on('click','.wcmvp_vendors_orders',function(){

                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                wcmvp_vendors_order_href = $('.wcmvp_vendors_chng_product').attr('href');
                $(document).find('.wcmvp_vendors_chng_product').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_vl);
                $(document).find('.wcmvp_vendors_chng_product').attr('href','#/vendor');
                $(document).find('.wcmvp_vendors_chng_product').addClass('wcmvp_vendors_chng_order_again');
                $(document).find('#wcmvp-loader-image').fadeOut();
                $(document).find('.wcmvp_multivendor_platform_vendor_orders').show();
                $(document).find('.wcmvp_vendors_details').hide();
                $(document).find('.wcmvp_sort_by_order_status').removeClass('wcmvp_sort_by_status_active');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
                $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp_sort_order_all').addClass('wcmvp_sort_by_status_active');
                var wcmvp_order_vendor_id = $(this).siblings('.wcmvp_vendor_products').data('id');
                $(document).find('#wcmvp_order_vendor_id').val(wcmvp_order_vendor_id);
                var wcmvp_sort_order_by = 'all';
                $(document).find('#wcmvp_order_or_order_all').val('isnotexist');
                var wcmvp_order_or_order_all = 'isnotexist';
                $(document).find('#wcmvp_order_table').dataTable().fnDestroy();
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                wcmvp_order_datatable(wcmvp_order_vendor_id,wcmvp_sort_order_by,wcmvp_order_or_order_all);
                wcmvp_orders_count(wcmvp_order_vendor_id);
            })

//===============code goes when click on to go back wordpress button clicks========================//

            $(document).on( 'click','.wcmvp_vendors_chng_order_again',function( e ) {
            
                e.preventDefault();
                window.location.href = wcmvp_split_url[0]+'#/vendor';
                $('#wcmvp-loader-image').fadeIn(100);
                $('#wcmvp-loader-image').fadeOut();
                $('.wcmvp_vendors_details').show();
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('.wcmvp_multivendor_platform_vendor_orders').hide();
                $('.wcmvp_vendors_chng_order_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
                $('.wcmvp_vendors_chng_order_again').attr('href',wcmvp_vendors_order_href);
                $('.wcmvp_vendors_chng_order_again').removeClass('wcmvp_vendors_chng_order_again');
                
            })

// Code to remove extra class and send back to wordpress heading //

    $('#wcmvp-admin-dashboard').on('click', function(){
        $('.wcmvp_vendors_chng_order_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $('.wcmvp_vendors_chng_order_again').attr('href',wcmvp_vendors_order_href);
        $('.wcmvp_vendors_chng_order_again').removeClass('wcmvp_vendors_chng_order_again');
    })

    $('#wcmvp-admin-withdraw').on('click', function(){
        $('.wcmvp_vendors_chng_order_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $('.wcmvp_vendors_chng_order_again').attr('href',wcmvp_vendors_order_href);
        $('.wcmvp_vendors_chng_order_again').removeClass('wcmvp_vendors_chng_order_again');
    })

    $('#wcmvp-admin-vendor').on('click', function(){
        $('.wcmvp_vendors_chng_order_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $('.wcmvp_vendors_chng_order_again').attr('href',wcmvp_vendors_order_href);
        $('.wcmvp_vendors_chng_order_again').removeClass('wcmvp_vendors_chng_order_again');
    })

    $('#wcmvp-admin-settings').on('click', function(){
        $('.wcmvp_vendors_chng_order_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $('.wcmvp_vendors_chng_order_again').attr('href',wcmvp_vendors_order_href);
        $('.wcmvp_vendors_chng_order_again').removeClass('wcmvp_vendors_chng_order_again');
    })

    $('#wcmvp-admin-all-orders').on('click', function(){
        $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
        $('.wcmvp_vendors_chng_order_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $('.wcmvp_vendors_chng_order_again').attr('href',wcmvp_vendors_order_href);
        $('.wcmvp_vendors_chng_order_again').removeClass('wcmvp_vendors_chng_order_again');
        $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
    })

    $('#wcmvp-admin-reports').on('click', function(){
        $('.wcmvp_vendors_chng_order_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $('.wcmvp_vendors_chng_order_again').attr('href',wcmvp_vendors_order_href);
        $('.wcmvp_vendors_chng_order_again').removeClass('wcmvp_vendors_chng_order_again');
    })

//=======================code goes when order sorted according status=================================//

            $(document).on( 'click','.wcmvp_sort_by_order_status',function(e) {

                e.preventDefault();
                $(document).find('#wcmvp-loader-image').fadeOut();
                var wcmvp_order_vendor_id = $(document).find('#wcmvp_order_vendor_id').val();
                var wcmvp_sort_order_by = $(this).data('value');
                $(document).find('#wcmvp_sort_order_by').val(wcmvp_sort_order_by);
                if( wcmvp_sort_order_by != 'all' && wcmvp_sort_order_by != 'trash' && wcmvp_sort_order_by != 'draft' )
                {
                    wcmvp_sort_order_by = 'wc-'+wcmvp_sort_order_by;
                    $(document).find('#wcmvp_order_table').dataTable().fnDestroy();
                }
                else if( wcmvp_sort_order_by == 'trash' )
                {
                    wcmvp_sort_order_by = 'trash';
                    $(document).find('#wcmvp_order_table').dataTable().fnDestroy();
                }
                else if( wcmvp_sort_order_by == 'draft' )
                {
                    wcmvp_sort_order_by = 'draft';
                    $(document).find('#wcmvp_order_table').dataTable().fnDestroy();
                }
                else
                {
                    wcmvp_sort_order_by = 'all';
                    $(document).find('#wcmvp_order_table').dataTable().fnDestroy();   
                }
                if( $(document).find('#wcmvp_order_or_order_all').val() == 'isexist' )
                {
                    wcmvp_order_datatable('',wcmvp_sort_order_by,'isexist');
                }
                else
                {
                    wcmvp_order_datatable(wcmvp_order_vendor_id,wcmvp_sort_order_by,'isnotexist');
                }
                $(document).find('.wcmvp_sort_by_order_status').removeClass('wcmvp_sort_by_status_active');
                $(document).find(this).addClass('wcmvp_sort_by_status_active');
            } )

//=======================code goes when click to view order by clicking on name=================================//

            $(document).on( 'click','.wcmvp_order_name',function(e) {

                e.preventDefault();
                $(document).find('#wcmvp_order_edit_modal').addClass('wcmvp-modal-open');
                $(document).find('body').css('overflow','hidden');
                $(document).find("#wcmvp_order_edit_modal").removeClass("wcmvp-animation-left");
                $(document).find('.loader').css('display','block');
                var wcmvp_edit_order_id = $(this).data('id');
                $(document).find('#wcmvp_order_edit_modal .wcmvp-modal-title').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_edit_order);
                $('.wcmvp_vendors_chng_order_again').attr('href',wcmvp_vendors_order_href);
                wcmvp_edit_order_iframe(wcmvp_edit_order_id);

                $(document).on( 'click','.wcmvp_edit_order_iframe_close',function(){

                    $(document).find('#wcmvp_order_table').dataTable().fnDestroy();

                    if( $(document).find('#wcmvp_order_or_order_all').val() == 'isexist' )
                    {
                        wcmvp_order_datatable('',$(document).find('#wcmvp_sort_order_by').val(),'isexist');
                        wcmvp_orders_count();
                    }
                    else
                    {
                        wcmvp_order_datatable($(document).find('#wcmvp_order_vendor_id').val(),$(document).find('#wcmvp_sort_order_by').val(),'isnotexist');
                        wcmvp_orders_count($(document).find('#wcmvp_order_vendor_id').val());
                    }
                } )

            } )

//=======================code goes when click to view order by clicking on eye=================================//

            $(document).on( 'click','.wcmvp_order_view_icon',function(e) {

                e.preventDefault();
                $(document).find('#wcmvp_order_detail_modal').addClass('wcmvp-modal-open');
                $(document).find('body').css('overflow','hidden');
                $(document).find("#wcmvp_order_detail_modal").removeClass("wcmvp-animation-left");
                var wcmvp_view_order_id = $(this).siblings('.wcmvp_order_name').data('id');
                $(document).find('#wcmvp_current_order_id').val(wcmvp_view_order_id);

                var wcmvp_view_order_data = {
                    'action' : 'wcmvp_view_order_action_1',
                    'wcmvp_view_order_id' : wcmvp_view_order_id,
                    'wcmvp_view_order_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
                }
                jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_view_order_data,function(response) {

                    if( response != "" )
                    {
                        $(document).find('.wcmvp_order_id').html('Order'+' #'+response['wcmvp_order_id']);
                        $(document).find('.wcmvp_order_status').html(response['wcmvp_order_status']);
                        $(document).find('.wcmvp_order_status').addClass('wcmvp_order_'+response['wcmvp_order_status']);
                        $(document).find('.wcmvp_billing_first_name').html(response['wcmvp_billing_first_name']);
                        $(document).find('.wcmvp_billing_last_name').html(response['wcmvp_billing_last_name']);
                        $(document).find('.wcmvp_billing_company').html(response['wcmvp_billing_company']);
                        $(document).find('.wcmvp_billing_address1').html(response['wcmvp_billing_address1']);
                        $(document).find('.wcmvp_billing_address2').html(response['wcmvp_billing_address2']);
                        $(document).find('.wcmvp_billing_city').html(response['wcmvp_billing_city']);
                        $(document).find('.wcmvp_billing_state').html(response['wcmvp_billing_state']);
                        $(document).find('.wcmvp_billing_postcode').html(response['wcmvp_billing_postcode']);
                        $(document).find('.wcmvp_billing_country').html(response['wcmvp_billing_country']);
                        $(document).find('.wcmvp_shipping_first_name').html(response['wcmvp_shipping_first_name']);
                        $(document).find('.wcmvp_shipping_last_name').html(response['wcmvp_shipping_last_name']);
                        $(document).find('.wcmvp_shipping_company').html(response['wcmvp_shipping_company']);
                        $(document).find('.wcmvp_shipping_address1').html(response['wcmvp_shipping_address1']);
                        $(document).find('.wcmvp_shipping_address2').html(response['wcmvp_shipping_address2']);
                        $(document).find('.wcmvp_shipping_city').html(response['wcmvp_shipping_city']);
                        $(document).find('.wcmvp_shipping_state').html(response['wcmvp_shipping_state']);
                        $(document).find('.wcmvp_shipping_postcode').html(response['wcmvp_shipping_postcode']);
                        $(document).find('.wcmvp_shipping_country').html(response['wcmvp_shipping_country']);
                        $(document).find('.wcmvp_billing_email').html(response['wcmvp_billing_email']);
                        $(document).find('.wcmvp_billing_email').attr('href','mailto:'+response['wcmvp_billing_email']);
                        $(document).find('.wcmvp_billing_phone').html(response['wcmvp_billing_phone']);
                        $(document).find('.wcmvp_shipping_method').html(response['wcmvp_shipping_method']);
                        $(document).find('.wcmvp_payment_method_title').html(response['wcmvp_payment_method_title']);
                        $(document).find('.wcmvp_customer_note').html(response['wcmvp_customer_note']);
                    }
                },'json')

                var wcmvp_view_order_data = {
                    'action' : 'wcmvp_view_order_action_2',
                    'wcmvp_view_order_id' : wcmvp_view_order_id,
                    'wcmvp_view_order_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
                }
                jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_view_order_data,function(response) {
                    
                    if( response == "" || response == null)
                    {
                        $(document).find('#wcmvp_order_prod_table').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_no_products_found);
                    }
                    else
                    {
                        var i, wcmvp_table = "<table class='table table-striped mdl-data-table wcmvp_order_showing_list_table'>";
                        wcmvp_table += "<thead><tr><th scope='col'>"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_products+"</th>";
                        wcmvp_table += "<th scope='col'>"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_quantity+"</th>";
                        wcmvp_table += "<th scope='col'>"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_total+"</th>";
                        wcmvp_table += "</tr></thead>";

                        for( i=0; i < response.length; i++ )
                        {
                            wcmvp_table += '<tr><td scope="col">' + response[i]['wcmvp_get_product_name'] + '</td>';
                            wcmvp_table += '<td scope="col">' + response[i]['wcmvp_get_product_quantity'] + '</td>'
                            wcmvp_table += '<td scope="col">' + response[i]['wcmvp_get_product_total'] + '</td>'
                        }
                        wcmvp_table += '</tr>';
                        wcmvp_table += "</table>";
                        $(document).find('#wcmvp_order_prod_table').html(wcmvp_table);
                    }

                },'json')

            } )

//=======================code goes when click to cancel btn while viewing an order=================================//

                $(document).on('click','.wcmvp_close_view_order_btn',function() {

                    $(document).find('.wcmvp_order_status').removeClass('wcmvp_order_cancelled');
                    $(document).find('.wcmvp_order_status').removeClass('wcmvp_order_completed');
                    $(document).find('.wcmvp_order_status').removeClass('wcmvp_order_on-hold');
                    $(document).find('.wcmvp_order_status').removeClass('wcmvp_order_processing');
                    $(document).find('.wcmvp_order_status').removeClass('wcmvp_order_failed');
                    $(document).find('.wcmvp_order_status').removeClass('wcmvp_order_refunded');
                    $(document).find('.wcmvp_order_status').removeClass('wcmvp_order_pending');
                    $(document).find('.wcmvp_order_status').removeClass('wcmvp_order_trash');
            })

            $(document).on('click','.wcmvp_edit_order_modal',function() {

                $(document).find('#wcmvp_order_edit_modal').addClass('wcmvp-modal-open');
                $(document).find('body').css('overflow','hidden');
                $(document).find("#wcmvp_order_edit_modal").removeClass("wcmvp-animation-left");
                $(document).find('#wcmvp_order_edit_modal .wcmvp-modal-title').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_edit_order);
                wcmvp_edit_order_iframe($(document).find('#wcmvp_current_order_id').val());
            })

            $(document).on('click','#wcmvp_add_new_order',function(e){

                e.preventDefault();
                $(document).find('#wcmvp_order_edit_modal').addClass('wcmvp-modal-open');
                $(document).find('body').css('overflow','hidden');
                $(document).find("#wcmvp_order_edit_modal").removeClass("wcmvp-animation-left");
                $(document).find('#wcmvp_order_edit_modal .wcmvp-modal-title').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_add_order);
                wcmvp_edit_order_iframe();
            })
            
//==============When Admin process amount request for vendor or for send to trash or delete orders============//

            $(document).on( 'click','.wcmvp_change_order_status',function() {

                var wcmvp_process_order_request_id = $(this).data('id');
                var wcmvp_process_order_request_value = $(this).data('value');
                
                if( wcmvp_process_order_request_value == 'delete' )
                {
                    var wcmvp_order_for_delete = wcmvp_process_order_request_value;
                    var wcmvp_confirm_delete = confirm(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_confirmation_order_del);

                    if( wcmvp_confirm_delete )
                    {
                        wcmvp_process_order_request_value = wcmvp_order_for_delete;
                    }
                    else
                    {
                        return;
                    }
                }
                $(document).find('#wcmvp-loader-image').show();
                
                var wcmvp_process_order_request_data = {
                    'action' : 'wcmvp_process_order_request_action',
                    'wcmvp_process_order_request_id' : wcmvp_process_order_request_id,
                    'wcmvp_process_order_request_value' : wcmvp_process_order_request_value,
                    'wcmvp_process_orders_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
                }
                jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_process_order_request_data,function(response) {

                    $(document).find('#wcmvp-loader-image').hide();
                    if( wcmvp_process_order_request_value == 'send_payment' )
                    {
                        if(response != "" && response != 1  && response != 2)
                        {
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                response, {
                                className : 'vendor_error',
                                position : 'right bottom',
                                }
                            )
                        }
                        else if(response == 1)
                        {
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_amnt_transfer_msg, {
                                    className : 'vendor_success',
                                    position : 'right bottom',
                                }
                            ) 
                        }
                        else if(response == 2)
                        {
                            $('.notifyjs-wrapper').remove();
                            $.notify(
                                wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_already_approved_msg, {
                                    className : 'vendor_success',
                                    position : 'right bottom',
                                }
                            ) 
                        }
                    }

                    else if( wcmvp_process_order_request_value != 'send_payment' )
                    {
                        $(document).find('#wcmvp_order_table').DataTable().ajax.reload();
                        if( $(document).find('#wcmvp_order_or_order_all').val() == 'isexist' )
                        {
                            wcmvp_orders_count();
                        }
                        else
                        {
                            wcmvp_orders_count(response);
                        }
                        $('.notifyjs-wrapper').remove();
                        if( wcmvp_process_order_request_value == 'restore' )
                        {
                            var wcmvp_order_display_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_order_restored;
                        }
                        if( wcmvp_process_order_request_value == 'delete' )
                        {
                            var wcmvp_order_display_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_order_deleted;
                        }
                        if( wcmvp_process_order_request_value == 'trash' )
                        {
                            var wcmvp_order_display_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_order_trashed;
                        }   
                        $.notify(
                            wcmvp_order_display_msg, {
                            className : 'vendor_success',
                            position : 'right bottom',
                            }
                        )
                    }
                    
                },'json')

            } )

//===============When click on outer checkbox to select all inner chckboxes=================//

    $(document).on( 'change','.wcmvp_orders_outer_checkbox',function() {

        $(document).find( '.wcmvp_orders_inner_checkbox' ).prop('checked',$(this).prop('checked'));
        $(document).find( '.wcmvp_orders_outer_checkbox' ).prop('checked',$(this).prop('checked'));

    } )

    $(document).on( 'change','.wcmvp_orders_inner_checkbox',function() {

        if( $(document).find('.wcmvp_orders_inner_checkbox:checked').length == $(document).find('.wcmvp_orders_inner_checkbox').length)
        {
            $(document).find(' .wcmvp_orders_outer_checkbox ').prop('checked',true);
        }
        else
        {
            $(document).find(' .wcmvp_orders_outer_checkbox ').prop('checked',false);
        }

    } )

//=============When click on apply button after selecting bulk action=======================//

    $(document).on( 'click','#wcmvp_order_apply_bulk',function() {

        
        var wcmvp_order_bulk_action = $(document).find('#wcmvp_order_bulk_action').children('option:selected').val();
       
        if( (wcmvp_order_bulk_action != 'wcmvp_not_selected') &&  ($(document).find( '.wcmvp_orders_inner_checkbox' ).is(':checked')))
        {
            if( wcmvp_order_bulk_action == 'wcmvp_bulk_delete_order' )
            {
                var wcmvp_confirmation_msg = confirm(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_confirmation_orders_del);
                if( ! wcmvp_confirmation_msg )
                {
                    return;
                }
            }
            var wcmvp_order_checkboxes_array = [];
            $(document).find( '.wcmvp_orders_inner_checkbox' ).each(function() {
                if( $(this).is(':checked') )
                {
                    var wcmvp_order_checkboxes =  $(this).attr('data-id');
                    wcmvp_order_checkboxes_array.push(wcmvp_order_checkboxes);
                }
            })
            $(document).find('#wcmvp-loader-image').show();
            var wcmvp_order_checkboxes_data = {
                'action' : 'wcmvp_order_checkboxes_action',
                'wcmvp_order_bulk_action_val' : wcmvp_order_bulk_action,
                'wcmvp_order_checkboxes' : wcmvp_order_checkboxes_array,
                'wcmvp_order_checkboxes_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
            }
    
            jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_order_checkboxes_data,function(response) {

                $(document).find('#wcmvp-loader-image').hide();
                $("option:selected").prop("selected", false);
                $(document).find('.wcmvp_orders_outer_checkbox').prop('checked',false);

                if( wcmvp_order_bulk_action == 'wcmvp_bulk_trash_order' )
                {
                    var wcmvp_response_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_orders_trashed;
                }
                if( wcmvp_order_bulk_action == 'processing' )
                {
                    var wcmvp_response_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_orders_sent_to_processing;
                }
                if( wcmvp_order_bulk_action == 'on-hold' )
                {
                    var wcmvp_response_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_orders_sent_to_on-hold;
                }
                if( wcmvp_order_bulk_action == 'completed' )
                {
                    var wcmvp_response_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_orders_sent_to_complete;
                }
                if( wcmvp_order_bulk_action == 'wcmvp_bulk_delete_order' )
                {
                    var wcmvp_response_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_orders_deleted;
                }
                if( wcmvp_order_bulk_action == 'wcmvp_bulk_restore_order' )
                {
                    var wcmvp_response_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_orders_restored;
                }

                $(document).find('#wcmvp_order_table').DataTable().ajax.reload();

                if( $(document).find('#wcmvp_order_or_order_all').val() == 'isexist' )
                {
                    wcmvp_orders_count();
                }
                else
                {
                    wcmvp_orders_count(response);
                }
                $('.notifyjs-wrapper').remove();
                $.notify(
                    wcmvp_response_msg, {
                    className : 'vendor_success',
                    position : 'right bottom',
                    }
                )

            },'json')
        }
    })
})//=================================When click on button to display orders==================//

$(document).ready(function( $ ){ 
    $(document).on('click','#wcmvp-admin-all-orders',function(){

        // id's of each menu to intially hide them

        $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-vendor').css('display','block');
        $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-features').css('display','none');               
        $(document).find('.wcmvp_sort_by_order_status').removeClass('wcmvp_sort_by_status_active');
        $(document).find('#wcmvp_sort_order_all').addClass('wcmvp_sort_by_status_active');
        $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
        $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
        $(document).find('#wcmvp-admin-all-orders').addClass('nav-tab-active');
        $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
        $(document).find('#wcmvp-loader-image').fadeOut();
        $(document).find('.wcmvp-submenu').css('display','none');
        $(document).find('#wcmvp_order_or_order_all').val('isexist');
        $(document).find('.wcmvp_multivendor_platform_vendor_orders').show();
        $(document).find('.wcmvp_vendors_details').hide();
        $(document).find('.wcmvp_multivendor_platform_vendor_product').hide();
        $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
        $(document).find('#wcmvp_order_table').dataTable().fnDestroy();
        $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-announcements').removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
        $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-announcements').hide();

        var wcmvp_sort_order_by = 'all';
        wcmvp_order_or_order_all = 'isexist';
        wcmvp_order_datatable('',wcmvp_sort_order_by,wcmvp_order_or_order_all);
        wcmvp_orders_count();
        
    })

    $(document).on('click','#wcmvp_order_all_box',function(){
        $("#wcmvp-admin-all-orders").trigger('click');
    })

})

//==============================Displaying Sub Order========================//

    $(document).on('click','.wcmvp_show_sub_order',function(){

        var wcmvp_show_sub_main_order_id = $(this).data('id');
        
        if( $(this).data('value') == 'hide' )
        {
            wcmvp_order_datatable('',$(document).find('#wcmvp_sort_order_by').val(),'isexist','');

            $('#wcmvp_order_table').on( 'init.dt', function () {
                $(document).find('.wcmvp_show_sub_order').text(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_show_sub_order);
                $(document).find('.wcmvp_show_sub_order').attr('data-value','show');
    
            } )

            $('#wcmvp_order_table').on( 'init.dt', function () {
            
                $(document).find('.wcmvp_show_hide_order'+wcmvp_show_sub_main_order_id).text(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_show_sub_order);
                $(document).find('.wcmvp_show_hide_order'+wcmvp_show_sub_main_order_id).attr('data-value','show');
    
            } )
        }
        else
        {   
            wcmvp_order_datatable('',$(document).find('#wcmvp_sort_order_by').val(),'isexist',wcmvp_show_sub_main_order_id);

            $('#wcmvp_order_table').on( 'init.dt', function () {

                $(document).find('.wcmvp_show_hide_order'+wcmvp_show_sub_main_order_id).text(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_hide_sub_order);
                $(document).find('.wcmvp_show_hide_order'+wcmvp_show_sub_main_order_id).attr('data-value','hide');
    
            } )
        }
        
    })

    $(document).find(".wcmvp_price_text").on('click',function(){
				
        $(document).find(".wcmvp_vendors_orders").trigger("click");
        
    });

//===========================Function to launch datatable on order section=========================//

    function wcmvp_order_datatable(wcmvp_order_vendor_id,wcmvp_sort_order_by,wcmvp_order_or_order_all,wcmvp_show_sub_main_order_id)
    {
        $(document).find('#wcmvp_order_table').dataTable().fnDestroy();
        if(wcmvp_sort_order_by == 'trash')
        {
            $(document).find('.wcmvp_order_bul_restore').show();
            $(document).find('.wcmvp_order_bul_delete').show();
            $(document).find('.wcmvp_order_bul_trash').hide();
        }
        else
        {
            $(document).find('.wcmvp_order_bul_trash').show();
            $(document).find('.wcmvp_order_bul_restore').hide();
            $(document).find('.wcmvp_order_bul_delete').hide();
        }
        if( wcmvp_order_or_order_all == 'isexist' )
        {
            $(document).find( '#wcmvp_order_table' ).DataTable({
                "processing"    : true,
                "serverSide"    : true,
                'orderable'     : true,
                "bsortable"     : true,
                "info"          : false,
                select          : true,
                ajax            : {
                    data   :  {
                        action : 'wcmvp_order_table_action',
                        'wcmvp_order_vendor_id' : wcmvp_order_vendor_id,
                        'wcmvp_sort_order_by'   : wcmvp_sort_order_by,
                        'wcmvp_order_or_order_all' : wcmvp_order_or_order_all,
                        'wcmvp_show_sub_main_order_id' : wcmvp_show_sub_main_order_id,
                        'wcmvp_orders_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
                    },
                    type        : 'POST',
                    dataType    : 'json',
                    url         : wcmvp_vendor_object.wcmvp_ajax_url, 
                },
                columnDefs : [
                    {
                        "targets": [0,3,7],
                        "orderable": false,
                        "searchable": false
                    },
                    {
                        "targets": [0], "width" :   "5%",
                        "targets": [1], "width" :   "25%",
                        "targets": [2], "width" :   "20%",
                        "targets": [3], "width" :   "10%",
                        "targets": [4], "width" :   "10%",
                        "targets": [5], "width" :   "10%",
                        "targets": [6], "width" :   "10%",
                        "targets": [7], "width" :   "10%"
                    },
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_search,
                    'processing':  "<div class='wcmvp-loader-box'><div class='wcmvp-reload-table-loader-img-div'><img class='wcmvp-loader-image-datatable' src='"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_loader_src+"' /></div></div>"
                },
                "pagingType": "full_numbers",
                "drawCallback": function () {
                    $(document).find('.mdl-cell--6-col').parent().addClass('wcmvp-grid');
                    $('.dataTables_filter input').addClass('wcmvp-input-search-field');
                    $('.dataTables_length select').addClass('wcmvp-select-box  mdc-ripple-upgraded');
                    $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
                    $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");
                },
                order : [[1, 'DESC']],
                stateSave: true
            })
        }
        if(wcmvp_order_or_order_all == 'isnotexist')
        {
            $(document).find( '#wcmvp_order_table' ).DataTable({
                "processing"    : true,
                "serverSide"    : true,
                'orderable'     : true,
                "bsortable"     : true,
                "info"          : false,
                select          : true,
                ajax            : {
                    data   :  {
                        action : 'wcmvp_order_table_action',
                        'wcmvp_order_vendor_id' : wcmvp_order_vendor_id,
                        'wcmvp_sort_order_by'   : wcmvp_sort_order_by,
                        'wcmvp_order_or_order_all' : wcmvp_order_or_order_all,
                        'wcmvp_orders_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
                    },
                    type        : 'POST',
                    dataType    : 'json',
                    url         : wcmvp_vendor_object.wcmvp_ajax_url,   
                },
                columnDefs : [
                    {
                        "targets": [0,3,7],
                        "orderable": false,
                        "searchable": false
                    },
                    {
                        "targets": [5,6],
                        "orderable": false,
                        "visible": false,
                        "searchable": false
                    },
                    {
                        "targets": [0], "width" :   "5%",
                        "targets": [1], "width" :   "25%",
                        "targets": [2], "width" :   "20%",
                        "targets": [3], "width" :   "10%",
                        "targets": [4], "width" :   "10%",
                        "targets": [5], "width" :   "10%",
                        "targets": [6], "width" :   "10%",
                        "targets": [7], "width" :   "10%"
                    },
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_search,
                    'processing':  "<img class='wcmvp-loader-image-datatable' src='"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_loader_src+"' />"
                },
                "pagingType": "full_numbers",
                "drawCallback": function () {
                    $(document).find('.mdl-cell--6-col').parent().addClass('wcmvp-grid');
                    $('.dataTables_filter input').addClass('wcmvp-input-search-field');
                    $('.dataTables_length select').addClass('wcmvp-select-box  mdc-ripple-upgraded');
                    $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
                    $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");
                },
                order : [[1, 'DESC']]
            })
        }
    }

//==================Function to get count of orders according their status==============================//

    function wcmvp_orders_count(wcmvp_order_vendor_id)
    {
        var wcmvp_order_count_data = {
            'action' : 'wcmvp_order_count_action',
            'wcmvp_order_vendor_id' : wcmvp_order_vendor_id,
            'wcmvp_orders_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
        }
        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_order_count_data,function(response) {

            $(document).find('#wcmvp_sort_order_all').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_all+'('+response['wcmvp_all_orders_count']+')');
            $(document).find('#wcmvp_sort_order_pending').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_pending_payment+'('+response['wcmvp_pending_orders_count']+')');
            $(document).find('#wcmvp_sort_order_processing').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_processing+'('+response['wcmvp_processing_orders_count']+')');
            $(document).find('#wcmvp_sort_order_on-hold').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_on_hold+'('+response['wcmvp_on_hold_orders_count']+')');
            $(document).find('#wcmvp_sort_order_completed').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_completed+'('+response['wcmvp_completed_orders_count']+')');
            $(document).find('#wcmvp_sort_order_refunded').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_refunded+'('+response['wcmvp_refunded_orders_count']+')');
            $(document).find('#wcmvp_sort_order_cancelled').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_cancelled+'('+response['wcmvp_cancelled_orders_count']+')');
            $(document).find('#wcmvp_sort_order_failed').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_failed+'('+response['wcmvp_failed_orders_count']+')');
            $(document).find('#wcmvp_sort_order_trash').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_trash+'('+response['wcmvp_trash_orders_count']+')');
            $(document).find('#wcmvp_sort_order_draft').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_draft+'('+response['wcmvp_draft_orders_count']+')');


            $.each(wcmvp_list_to_hide,function(i,e){
                var check_valu=$(document).find("#"+e).text();
                var match_valu=check_valu.split("(");
                if(match_valu[1] =="0)"){
                $("#"+e).hide();
                }
                else if(match_valu[1] !="0)"){
                    $("#"+e).show();
                }
            });

        },'json')
    }

//======================Function to open edit order section=========================//

    function wcmvp_edit_order_iframe(wcmvp_edit_order_id)
    {
        var wcmvp_edit_order_data = {
            'action' : 'wcmvp_edit_order_action',
            'wcmvp_edit_order_id' : wcmvp_edit_order_id,
            'wcmvp_edit_order_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
        }
        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_edit_order_data,function(response) {
            
            if( response != "" )
            {
                $(document).find('#wcmvp_edit_order_frame').attr('src',response);
                $(document).find('.loader').fadeIn(700);
                $(document).find('.loader').fadeOut();
            }
        },'json')
    }

})( jQuery );