//This file is used for admin withdraw section jquery and javascript

(function( $ ) {

    'use strict';
    var wcmvp_url, wcmvp_split_url;
    if(window.location.href != ""){

    wcmvp_url = window.location.href;
    wcmvp_split_url = wcmvp_url.split("#");

    }
    var wcmvp_withdraw_status = 'pending';

        $(document).ready(function( $ ){
            
            $(document).on('click','.wcmvpvsm-list-item',function(e){
               
               $(document).find("#wcmvp_withdraw_add_note").addClass("wcmvp-animation-left")
            })

            if(wcmvp_split_url[1] == 'withdraw'){

                // id's of each menu to intially hide them
                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','block');
                $(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-features').css('display','none');               
                $(document).find('#wcmvp-admin-withdraw').addClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
                $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
                $(document).find('#wcmvp-loader-image').fadeOut();
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');

                wcmvp_withdraw_status = $('#wcmvp_withdraw_active').val();
                
                wcmvp_withdraw_function(wcmvp_withdraw_status);
                wcmvp_withdraw_requests_count();
                wcmvp_withdraw_status_with_bulk_action(wcmvp_withdraw_status);
            }  
			$('#wcmvp-admin-withdraw').on('click', function(){

                $(document).find('#wpbody-content').show();
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','block');
                $(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-features').css('display','none');               
                $(document).find('#wcmvp-admin-withdraw').addClass('nav-tab-active');
                $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-announcements').hide();
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
                $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
                $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
                $(document).find('.wcmvp-submenu').css('display','none');
                $(document).find('#wcmvp-loader-image').fadeOut(); 
                $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
                $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
                $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');

                wcmvp_withdraw_status = "pending";

                wcmvp_withdraw_function(wcmvp_withdraw_status);
                wcmvp_withdraw_requests_count();
                wcmvp_withdraw_status_with_bulk_action(wcmvp_withdraw_status);

    })

    $(document).on('click','#wcmvp_withdraw_requests_box',function(){
        $(document).find('#wcmvp-admin-withdraw').trigger('click');
    })

    $(document).on('click','.wcmvp_withdraw',function(){

        $(document).find('.wcmvp_withdraw').removeClass('wcmvp_sort_by_status_active');
        $(this).addClass('wcmvp_sort_by_status_active');
        wcmvp_withdraw_status = $(this).attr('data-value');

        wcmvp_withdraw_function(wcmvp_withdraw_status);
        wcmvp_withdraw_status_with_bulk_action(wcmvp_withdraw_status);

    })//=======================Code goes when Withdraw Status get changes from admin panel==========================//
//=======================Code goes when Withdraw Status get changes from admin panel==========================//

    $(document).on( 'click','.wcmvp_withdraw_status_chng',function() {

        var wcmvp_withdraw_status = $(this).attr('data-value');
        
        var wcmvp_withdraw_status_id = $(this).attr('data-id');
        
        var wcmvp_withdraw_status_data = {

            'action'  : 'wcmvp_withdraw_status_action',
            'wcmvp_withdraw_status' : wcmvp_withdraw_status,
            'wcmvp_withdraw_status_id' : wcmvp_withdraw_status_id,
            'wcmvp_withdraw_status_nonce_verify' : ajax_withdraw_object.wcmvp_withdraw_nonce,

        }

        jQuery.post( ajax_withdraw_object.wcmvp_ajax_url,wcmvp_withdraw_status_data,function(response){
            
            if(response == 1)
            {
                $(document).find('#wcmvp_withdraw_table').DataTable().ajax.reload();
                wcmvp_withdraw_requests_count();
                $('.notifyjs-wrapper').remove();
                if( wcmvp_withdraw_status == 'pending' )
                {
                    var wcmvp_withdraw_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_request_back_to_pending;
                }
                if( wcmvp_withdraw_status == 'delete' )
                {
                    var wcmvp_withdraw_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_request_deleted;
                }
                if( wcmvp_withdraw_status == 'cancelled' )
                {
                    var wcmvp_withdraw_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_request_cancelled;
                }
                if( wcmvp_withdraw_status == 'approved' )
                {
                    var wcmvp_withdraw_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_request_approved;
                }
                $.notify(
                    wcmvp_withdraw_msg, {
                    className : 'vendor_success',
                    position : 'right bottom'
                    }
                )
            }
            else if( response != 1 && response != "" )
            {
                $(document).find('#wcmvp_withdraw_table').DataTable().ajax.reload();
                wcmvp_withdraw_requests_count();
                $('.notifyjs-wrapper').remove();
                $('.notifyjs-wrapper').remove();
                    $.notify(
                        response, {
                            className : 'vendor_error',
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

        },'json' )

    } )

//=======================Code goes when Withdraw Status get changes using bulk action==========================//
//=======================Code goes when Withdraw Status get changes using bulk action==========================//

    $(document).on('change','.wcmvp_withdraw_outer_checkbox',function() {

        $(document).find('.wcmvp_withdraw_inner_checkbox').prop( 'checked',$(this).prop('checked') );
        $(document).find('.wcmvp_withdraw_outer_checkbox').prop( 'checked',$(this).prop('checked') );
    })

    $(document).on('change','.wcmvp_withdraw_inner_checkbox',function() {

        if( $(document).find('.wcmvp_withdraw_inner_checkbox:checked').length == $(document).find('.wcmvp_withdraw_inner_checkbox').length )
        {
            $(document).find('.wcmvp_withdraw_outer_checkbox').prop( 'checked',true );
        }
        else
        {
            $(document).find('.wcmvp_withdraw_outer_checkbox').prop( 'checked',false );
        }
    })

    $(document).on('click','#wcmvp_withdraw_apply_bulk',function(){

        var wcmvp_withdraw_action = $(document).find('#wcmvp_withdraw_action').val();
        
        if( wcmvp_withdraw_action != 'wcmvp_not_selected' && $(document).find('.wcmvp_withdraw_inner_checkbox').is(':checked') )
        {
            var wcmvp_withdraw_action_array = [];
            
            $(document).find('.wcmvp_withdraw_inner_checkbox').each(function(a,b){
                if( $(this).is(':checked') )
                {
                    wcmvp_withdraw_action_array.push($(this).attr('data-id'));
                }
            })
            var wcmvp_withdraw_status_data = {

                'action'  : 'wcmvp_withdraw_status_action',
                'wcmvp_withdraw_status' : wcmvp_withdraw_action,
                'wcmvp_withdraw_status_id_array' : wcmvp_withdraw_action_array,
                'wcmvp_withdraw_status_nonce_verify' : ajax_withdraw_object.wcmvp_withdraw_nonce,
    
            }
    
            jQuery.post( ajax_withdraw_object.wcmvp_ajax_url,wcmvp_withdraw_status_data,function(response){
                
                if(response == 1)
                {   
                    $(document).find('#wcmvp_withdraw_table').DataTable().ajax.reload();
                    wcmvp_withdraw_requests_count();
                    $(document).find('.wcmvp_withdraw_inner_checkbox').prop( 'checked',false );
                    $(document).find('.wcmvp_withdraw_outer_checkbox').prop( 'checked',false );
                    $("option:selected").prop("selected", false);
                    $('.notifyjs-wrapper').remove();

                    if( wcmvp_withdraw_status == 'pending' )
                {
                    var wcmvp_withdraw_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_requests_back_to_pending;
                }
                if( wcmvp_withdraw_status == 'delete' )
                {
                    var wcmvp_withdraw_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_requests_deleted;
                }
                if( wcmvp_withdraw_status == 'cancelled' )
                {
                    var wcmvp_withdraw_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_requests_cancelled;
                }
                if( wcmvp_withdraw_status == 'approved' )
                {
                    var wcmvp_withdraw_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_requests_approved;
                }

                    $.notify(
                        wcmvp_withdraw_msg, {
                        className : 'vendor_success',
                        position : 'right bottom'
                        }
                    )
                }
                else if( response != 1 && response != "" )
                {
                    $(document).find('#wcmvp_withdraw_table').DataTable().ajax.reload();
                    wcmvp_withdraw_requests_count();
                    $(document).find('.wcmvp_withdraw_inner_checkbox').prop( 'checked',false );
                    $(document).find('.wcmvp_withdraw_outer_checkbox').prop( 'checked',false );
                    $("option:selected").prop("selected", false);
                    $('.notifyjs-wrapper').remove();
                        $.notify(
                            response, {
                                className : 'vendor_error',
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
    
            },'json' )
        }
    })
    
    $(document).on( 'click','.wcmvp_withdraw_add_note',function(){

        $(document).find('#wcmvp_withdraw_add_note').addClass('wcmvp-modal-open');
        $(document).find('body').css('overflow','hidden');
        $(document).find("#wcmvp_withdraw_add_note").removeClass("wcmvp-animation-left");
        var wcmvp_withdraw_add_note_id = $(this).attr('data-id');
        $(document).find('.wcmvp_withdraw_add_note_btn').attr('data-id',$(this).attr('data-id'));

        var wcmvp_withdraw_status_data = {

            'action'  : 'wcmvp_withdraw_status_note_action',
            'wcmvp_withdraw_add_note_id' : wcmvp_withdraw_add_note_id,
            'wcmvp_withdraw_status_nonce_verify' : ajax_withdraw_object.wcmvp_withdraw_nonce,

        }

        jQuery.post( ajax_withdraw_object.wcmvp_ajax_url,wcmvp_withdraw_status_data,function(response){
            
            if(response != "")
            {   
                $(document).find('#wcmvp_withdraw_add_note_text').val(response);
            }

        },'json' )
    } )

    $(document).on( 'click','.wcmvp_withdraw_add_note_btn',function(){

        var wcmvp_withdraw_action_id = $(this).attr('data-id');
        var wcmvp_withdraw_add_note_msg = $(document).find('#wcmvp_withdraw_add_note_text').val();
        var wcmvp_withdraw_status_data = {

            'action'  : 'wcmvp_withdraw_status_action',
            'wcmvp_withdraw_status' : 'add_note',
            'wcmvp_withdraw_status_id' : wcmvp_withdraw_action_id,
            'wcmvp_withdraw_add_note_msg' : wcmvp_withdraw_add_note_msg,
            'wcmvp_withdraw_status_nonce_verify' : ajax_withdraw_object.wcmvp_withdraw_nonce,

        }

        jQuery.post( ajax_withdraw_object.wcmvp_ajax_url,wcmvp_withdraw_status_data,function(response){
            
            if(response == 1)
            {   
                $(document).find('#wcmvp_withdraw_table').DataTable().ajax.reload();
                wcmvp_withdraw_requests_count();
                $('.notifyjs-wrapper').remove();
                $.notify(
                    wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_note_updtaed, {
                    className : 'vendor_success',
                    position : 'right bottom'
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

        },'json' )
    } )

//========================== Function is used to display bulk action select option======================//
})

    function wcmvp_withdraw_status_with_bulk_action(wcmvp_withdraw_status)
    {
        if( wcmvp_withdraw_status == 'approved' )
        {
            $(document).find('#wcmvp_withdraw_action option').hide();
        }
        if( wcmvp_withdraw_status == 'pending' )
        {
            $(document).find('#wcmvp_withdraw_action option').show();
            $(document).find('.wcmvp_withdraw_pending_page').show();
            $(document).find('.wcmvp_withdraw_cancel_page').hide();
        }
        if( wcmvp_withdraw_status == 'cancelled' )
        {
            $(document).find('#wcmvp_withdraw_action option').show();
            $(document).find('.wcmvp_withdraw_pending_page').hide();
            $(document).find('.wcmvp_withdraw_cancel_page').show();
        }
    }

//========================== Function is used to admin withdraw requests COUNT of vendors======================//

    function wcmvp_withdraw_requests_count(){
        
        var wcmvp_withdraw_req_count = {

            'action' : 'wcmvp_admin_withdraw_count',
            'wcmvp_withdraw_nonce_verify' : ajax_withdraw_object.wcmvp_withdraw_nonce,

        }

        jQuery.post( ajax_withdraw_object.wcmvp_ajax_url,wcmvp_withdraw_req_count,function(response){
            
            if(response != '')
            {
                $('#wcmvp_withdraw_pending').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_pending+'('+response['wcmvp_withdraw_pending_count']+')');
                $('#wcmvp_withdraw_approved').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_approved+'('+response['wcmvp_withdraw_approved_count']+')');
                $('#wcmvp_withdraw_cancelled').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_cancelled+'('+response['wcmvp_withdraw_cancelled_count']+')');
            }

        },'json' )

    }

//========================== Function is used to admin withdraw requests of vendors======================//

function wcmvp_withdraw_function(wcmvp_withdraw_status)
{
    $("#wcmvp_withdraw_table").dataTable().fnDestroy();
    $(document).find('.wcmvp_withdraw').removeClass('wcmvp_sort_by_status_active');
    $(document).find('#wcmvp_withdraw_'+wcmvp_withdraw_status).addClass('wcmvp_sort_by_status_active');
    
    var wcmvp_datatable = $(document).find('#wcmvp_withdraw_table').DataTable( {
        "processing" : true,
        "serverSide" : true,
        "bsortable"  : true,
        "info"       : false,
        select       : true,
        "ajax"       : {
            data: {
                action: 'wcmvp_admin_withdraw',
                'wcmvp_withdraw_status' : wcmvp_withdraw_status,
                'wcmvp_withdraw_nonce_verify' : ajax_withdraw_object.wcmvp_withdraw_nonce,
                },
            type      : 'POST',
            dataType  : 'json',
            url       : ajax_withdraw_object.wcmvp_ajax_url,
            
        },
        language: {
            search: "_INPUT_",
            searchPlaceholder: wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_search,
            'processing':  "<div class='wcmvp-loader-box'><div class='wcmvp-reload-table-loader-img-div'><img class='wcmvp-loader-image-datatable' src='"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_loader_src+"' /></div></div>"
        },
        columnDefs : [
            {
                "targets": [0,1,5,6,8],
                "orderable": false,
                "searchable": false,
            },
            {    
                "width" : "5%","targets":0,
                "width" : "20%","targets":1,
                "width" : "10%","targets":2,
                "width" : "10%","targets":3,
                "width" : "10%","targets":4,
                "width" : "10%","targets":5,
                "width" : "12%","targets":6,
                "width" : "12%","targets":7,
                "width" : "11%","targets":8
            }
        ],
        order : [[2, 'asc']],
        "pagingType": "full_numbers",
        "drawCallback": function () {
        $('.dataTables_filter input').addClass('wcmvp-input-search-field');
        $('.mdl-cell--6-col').parent().addClass('wcmvp-grid');
        $('.dataTables_length select').addClass('wcmvp-select-box mdc-select mdc-select__anchor custom-enhanced-select-width mdc-ripple-upgraded');
        $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
        $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");

        }
    });
}
})( jQuery );