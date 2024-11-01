(function( $ ) {
    'use strict';

        if(window.location.href != ""){
           var wcmvp_url = window.location.href;
            var wcmvp_split_url = wcmvp_url.split("#"); 
        }

    $(document).ready(function( $ ){ 
        
        var wcmvp_sort_by_status = "all";
        var wcmvp_product_author_id;

//===============Function activates when click on product butoon from admin panel========================//
//===============Function activates when click on product butoon from admin panel========================//

    $(document).on( 'click','.wcmvp_vendor_products',function() {

        $(document).find('#wpbody-content').show();
        $(document).find('.wcmvp_sidbar_wrapper').show();
        wcmvp_sort_by_status = "all";
        $(document).find('#wcmvp-loader-image').fadeOut();
        $(document).find('.wcmvp_multivendor_platform_vendor_product').show();
        $(document).find('.wcmvp_vendors_details').hide();
        wcmvp_vendors_prod_href = $(document).find('.wcmvp_vendors_chng_product').attr('href');
        $(document).find('#wcmvp-multivendor-platform-announcements').hide();
        $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
        $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
        $(document).find('.wcmvp_vendors_chng_product').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_vl);
        $(document).find('.wcmvp_vendors_chng_product').attr('href','#/vendor');
        $(document).find('.wcmvp_vendors_chng_product').addClass('wcmvp_vendors_chng_product_again');
        wcmvp_product_author_id = $(this).attr('data-id');
        $(document).find('#wcmvp_add_new_prod').attr('data-id',wcmvp_product_author_id);
        $(document).find('.wcmvp_sort_by_status').removeClass('wcmvp_sort_by_status_active');
        $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
        $(document).find('#wcmvp_sort_all').addClass('wcmvp_sort_by_status_active');
        $(document).find('#wcmvp_sort_table').val(wcmvp_sort_by_status);
        var wcmvp_sort_table = $(document).find('#wcmvp_sort_table').val();
        $(document).find('#wcmvp_pord_table').val(wcmvp_product_author_id);
        $("#wcmvp_vendors_product_table").dataTable().fnDestroy();

        $(document).find('#wcmvp_empty_trash').hide();
        wcmvp_vendors_prod_count(wcmvp_product_author_id);
        
        wcmvp_product_datatable( wcmvp_product_author_id,wcmvp_sort_table,wcmvp_sort_by_status );
        
    } )
    //===================Function activates when click on go back to vendors list===========================//
       
$(document).on( 'click','.wcmvp_vendors_chng_product_again',function( e ) {
            
    e.preventDefault();
    $(document).find('#wpbody-content').show();
    $(document).find('.wcmvp_sidbar_wrapper').show();
    window.location.href = wcmvp_split_url[0]+'#/vendor';
    $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
    $(document).find('#wcmvp-loader-image').fadeOut();
    $(document).find('.wcmvp_multivendor_platform_vendor_product').hide();
    $(document).find('.wcmvp_vendors_details').show();
    $(document).find('.wcmvp_vendors_chng_product_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
    $(document).find('.wcmvp_vendors_chng_product_again').attr('href',wcmvp_vendors_prod_href);

    
    $(document).find('.wcmvp_vendors_chng_product_again').removeClass('wcmvp_vendors_chng_product_again');
    
})

// Code to remove extra class and send back to wordpress heading

    $('#wcmvp-admin-dashboard').on('click', function(){
        $(document).find('.wcmvp_vendors_chng_product_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $(document).find('.wcmvp_vendors_chng_product_again').attr('href',wcmvp_vendors_prod_href);
        $(document).find('.wcmvp_vendors_chng_product_again').removeClass('wcmvp_vendors_chng_product_again');
    })

    $('#wcmvp-admin-withdraw').on('click', function(){
        $(document).find('.wcmvp_vendors_chng_product_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $(document).find('.wcmvp_vendors_chng_product_again').attr('href',wcmvp_vendors_prod_href);
        $(document).find('.wcmvp_vendors_chng_product_again').removeClass('wcmvp_vendors_chng_product_again');
    })

    $('#wcmvp-admin-vendor').on('click', function(){
        $(document).find('.wcmvp_vendors_chng_product_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $(document).find('.wcmvp_vendors_chng_product_again').attr('href',wcmvp_vendors_prod_href);
        $(document).find('.wcmvp_vendors_chng_product_again').removeClass('wcmvp_vendors_chng_product_again');
    })

    $('#wcmvp-admin-settings').on('click', function(){
        $(document).find('.wcmvp_vendors_chng_product_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $(document).find('.wcmvp_vendors_chng_product_again').attr('href',wcmvp_vendors_prod_href);
        $(document).find('.wcmvp_vendors_chng_product_again').removeClass('wcmvp_vendors_chng_product_again');
    })

    $('#wcmvp-admin-all-orders').on('click', function(){
        $(document).find('.wcmvp_vendors_chng_product_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $(document).find('.wcmvp_vendors_chng_product_again').attr('href',wcmvp_vendors_prod_href);
        $(document).find('.wcmvp_vendors_chng_product_again').removeClass('wcmvp_vendors_chng_product_again');
    })

    $('#wcmvp-admin-reports').on('click', function(){
        $(document).find('.wcmvp_vendors_chng_product_again').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_wp);
        $(document).find('.wcmvp_vendors_chng_product_again').attr('href',wcmvp_vendors_prod_href);
        $(document).find('.wcmvp_vendors_chng_product_again').removeClass('wcmvp_vendors_chng_product_again');
    })

//===============Function invokes when click on sorting buttons at admin panel=======================//

        $(document).on('click',".wcmvp-hide-modal",function(){

            $(document).find("#wcmvp_vendor_modal").addClass("wcmvp-animation-left");

        });
    
        $(document).on( 'click','.wcmvp_sort_by_status',function(e) {
            
            e.preventDefault();
            $(document).find('#wcmvp-loader-image').fadeOut();
            wcmvp_sort_by_status = $(this).attr('data-value');
            $(document).find('.wcmvp_sort_by_status').removeClass('wcmvp_sort_by_status_active');
            $(this).addClass('wcmvp_sort_by_status_active');
            $(document).find('#wcmvp_sort_table').val(wcmvp_sort_by_status);
            $("option:selected").prop("selected", false);
            var wcmvp_sort_table = $(document).find('#wcmvp_sort_table').val();

            if(wcmvp_sort_by_status == 'trash')
            {
                $(document).find('#wcmvp_empty_trash').show();
            }
            else{
                $(document).find('#wcmvp_empty_trash').hide();
            }

            wcmvp_product_datatable( wcmvp_product_author_id,wcmvp_sort_table,wcmvp_sort_by_status );

        } )

        var wcmvp_vendors_prod_href;
                
        if((wcmvp_split_url[1] == '/product') || (wcmvp_split_url[1] == 'all_products')){
        
            $(document).find('#wpbody-content').show();
            $(document).find('.wcmvp_sidbar_wrapper').show();
            $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-vendor').css('display','block');
            $(document).find('#wcmvp-multivendor-platform-announcements').hide();
            $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
            $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
            $(document).find('.wcmvp_multivendor_platform_vendor_product').show();
            $(document).find('.wcmvp_vendors_details').hide();
            wcmvp_vendors_prod_href = $(document).find('.wcmvp_vendors_chng_product').attr('href');
            $(document).find('.wcmvp_vendors_chng_product').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_vl);
            $(document).find('.wcmvp_vendors_chng_product').attr('href','#/vendor');
            $(document).find('.wcmvp_vendors_chng_product').addClass('wcmvp_vendors_chng_product_again');
            $(document).find('.wcmvp_sort_by_status').removeClass('wcmvp_sort_by_status_active');
            var wcmvp_sort_table = $(document).find('#wcmvp_sort_table').val();
            wcmvp_sort_by_status = wcmvp_sort_table;
            $(document).find('#wcmvp_sort_'+wcmvp_sort_table).addClass('wcmvp_sort_by_status_active');
            var wcmvp_product_author_id = $(document).find('#wcmvp_pord_table').val();
            $(document).find('#wcmvp-multivendor-platform-features').css('display','none');               


            if(wcmvp_sort_by_status == 'trash')
            {
                $(document).find('#wcmvp_empty_trash').show();
            }
            else{
                $(document).find('#wcmvp_empty_trash').hide();
            }
            
            $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
            $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
            if(wcmvp_split_url[1] == 'all_products')
            {
                $(document).find('#wcmvp-admin-all-products').addClass('nav-tab-active');
                $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
                wcmvp_product_datatable( '',wcmvp_sort_table,wcmvp_sort_by_status );
                wcmvp_vendors_prod_count('');
            }
            else
            {
                wcmvp_product_datatable( wcmvp_product_author_id,wcmvp_sort_table,wcmvp_sort_by_status );
                wcmvp_vendors_prod_count(wcmvp_product_author_id);
                $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
                $(document).find('#wcmvp-admin-vendor').addClass('nav-tab-active');
            }
            $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
            $(document).find('#wcmvp-loader-image').fadeOut();
            $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
            $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
            $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
            $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
        }

        $('#wcmvp-admin-vendor').on('click', function(){
            $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-vendor').css('display','block');
            $(document).find('.wcmvp_multivendor_platform_vendor_product').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
            $(document).find('.wcmvp_vendors_details').show();
            $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-announcements').hide();
            $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
            $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-vendor').addClass('nav-tab-active');
            $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
            $(document).find('.wcmvp-submenu').css('display','none');
            $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
            $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
            $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
            $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
            
    })

    $('#wcmvp-admin-all-products').on('click',function(){

        $(document).find('#wpbody-content').show();
            $(document).find('.wcmvp_sidbar_wrapper').show();
            $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-vendor').css('display','block');
            $(document).find('.wcmvp_multivendor_platform_vendor_product').show();
            $(document).find('.wcmvp_vendors_details').hide();
            wcmvp_vendors_prod_href = $(document).find('.wcmvp_vendors_chng_product').attr('href');
            $(document).find('#wcmvp-multivendor-platform-announcements').hide();
            $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
            $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');
            $(document).find('.wcmvp_vendors_chng_product').html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_go_back_to_vl);
            $(document).find('.wcmvp_vendors_chng_product').attr('href','#/vendor');
            $(document).find('.wcmvp_vendors_chng_product').addClass('wcmvp_vendors_chng_product_again');
            $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
            $(document).find('.wcmvp_sort_by_status').removeClass('wcmvp_sort_by_status_active');
            var wcmvp_sort_table = $(document).find('#wcmvp_sort_table').val();
            wcmvp_sort_by_status = wcmvp_sort_table;
            $(document).find('#wcmvp_sort_'+wcmvp_sort_table).addClass('wcmvp_sort_by_status_active');
            var wcmvp_product_author_id = $(document).find('#wcmvp_pord_table').val();
            $(document).find('#wcmvp-multivendor-platform-features').css('display','none');               
            

            if(wcmvp_sort_by_status == 'trash')
            {
                $(document).find('#wcmvp_empty_trash').show();
            }
            else{
                $(document).find('#wcmvp_empty_trash').hide();
            }
            wcmvp_product_datatable( '',wcmvp_sort_table,wcmvp_sort_by_status );
            
            wcmvp_vendors_prod_count('');
            
            $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
            $(document).find('.wcmvp_multivendor_platform_vendor_orders').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
            $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-all-products').addClass('nav-tab-active');
            $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
            $(document).find('#wcmvp-loader-image').fadeOut();
            $(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');
            $(document).find('#wcmvp-multivendor-platform-report').css('display','none');
            $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');
            $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');
            $(document).find('.wcmvp-submenu').css('display','none');
            $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
    })
    
    //=====================Function activates when click on filter button from product displaying sectin at admin end=====//        

        var wcmvp_prod_cat_filter_val,wcmvp_filter_by_prod_type,wcmvp_filter_by_prod_stock;

        $(document).on( 'click','#wcmvp_prod_filter_button',function() {

            wcmvp_prod_cat_filter_val = $(document).find('#wcmvp_filter_by_cat').children('option:selected').val();
            wcmvp_filter_by_prod_type = $(document).find('#wcmvp_filter_by_prod_type').children('option:selected').val();
            wcmvp_filter_by_prod_stock = $(document).find('#wcmvp_filter_by_prod_stock').children('option:selected').val();
            
            if( wcmvp_prod_cat_filter_val >= 0 || wcmvp_filter_by_prod_type >= 0 || wcmvp_filter_by_prod_stock >=0 )
            {
                $("#wcmvp_vendors_product_table").dataTable().fnDestroy();

                var wcmvp_datatable = $(document).find('#wcmvp_vendors_product_table').DataTable( {
                    "processing" : true,
                    "serverSide" : true,
                    "bsortable"  : true,
                    "info"       : false,
                    select       : true,
                    "ajax"       : {
                        data: {
                            action: 'wcmvp_vendors_product',
                            'wcmvp_product_author_id'   : wcmvp_product_author_id,
                            'wcmvp_sort_by_status'      : wcmvp_sort_by_status,
                            'wcmvp_filter_by_prod_stock'  : wcmvp_filter_by_prod_stock,
                            'wcmvp_filter_by_prod_type'  : wcmvp_filter_by_prod_type,
                            'wcmvp_prod_cat_filter_val' : wcmvp_prod_cat_filter_val,
                            'wcmvp_vendor_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
                            },
                            
                        type      : 'POST',
                        dataType  : 'json',
                        url       : wcmvp_vendor_object.wcmvp_ajax_url,
                        
                    },
                    
                    columnDefs : [
                        {
                            "targets": [0,1,6,7,8],
                            "orderable": false,
                            "searchable": false
                        }
                    ],
                    order : [[2, 'asc']]  
                });
            }

        } )

        //======When click on edit prod button

        $(document).on( 'click','.wcmvp_prod_edit',function() {

            $(document).find('#wcmvp_prod_edit_modal').addClass('wcmvp-modal-open');
            $(document).find('body').css('overflow','hidden');
            $(document).find("#wcmvp_prod_edit_modal").removeClass("wcmvp-animation-left");
            var wcmvp_edit_prod_id = $(this).attr('data-id');
            wcmvp_edit_product_frame(wcmvp_edit_prod_id);
            
        } )

        //when click on add new prod button

        $(document).on( 'click','#wcmvp_add_new_prod',function() {
            
            $(document).find('#wcmvp_prod_edit_modal').addClass('wcmvp-modal-open');
            $(document).find('body').css('overflow','hidden');
            $(document).find("#wcmvp_prod_edit_modal").removeClass("wcmvp-animation-left");
            wcmvp_change_product_iframe_url();

        })

//==========  All data's send to next ajax request

        $(document).find('#sample-permalink').children().attr('target','_blank');

        $(document).on( 'click','#wcmvp_prod_private',function() {
            
            if( $(this).is(':checked') )
            {
                $(document).find( '#wcmvp_prod_password' ).val('');
                $(document).find( '#wcmvp_prod_password' ).prop('disabled','true');
            }
            else
            {   
                $(document).find( '#wcmvp_prod_password' ).removeAttr('disabled','false');
            }
        })

        $(document).on( 'click','#wcmvp_prod_manage_stock',function() {
            if( $(this).is(':checked') )
            {
                $(document).find( '#wcmvp_prod_stock_manage' ).show();
                $(document).find( '#wcmvp_prod_stock_status_div' ).hide();
            }
            else
            {
                $(document).find( '#wcmvp_prod_stock_manage' ).hide();
                $(document).find( '#wcmvp_prod_stock_status_div' ).show();
            }
        } )

//==================== When click on product quick edit button to display data============================//

        $(document).on( 'click','.wcmvp_prod_quick_edit',function() {

            $(document).find('#wcmvp_prod_quick_edit_modal').addClass('wcmvp-modal-open');
            $(document).find('body').css('overflow','hidden');
            $(document).find("#wcmvp_prod_quick_edit_modal").removeClass("wcmvp-animation-left");

            var wcmvp_prod_quick_edit_id = $(this).attr('data-id');
            $(document).find('#wcmvp_quick_edit_update').attr('data-id',wcmvp_prod_quick_edit_id);

            var wcmvp_prod_quick_edit_data = {
                'action' : 'wcmvp_prod_quick_edit', 
                'wcmvp_prod_quick_edit_id' : wcmvp_prod_quick_edit_id,
                'wcmvp_vendor_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
            }
            jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_prod_quick_edit_data,function( response ) {

                if( response != "" )
                {
                    $(document).find('#wcmvp_prod_title').val(response['wcmvp_prod_post_title']);
                    $(document).find('#wcmvp_prod_slug').val(response['wcmvp_prod_post_slug']);
                    $(document).find('#wcmvp_prod_published_date').val(response['wcmvp_prod_post_date']);
                    $(document).find('#wcmvp_prod_published_time').val(response['wcmvp_prod_post_time']);
                    if( response['wcmvp_prod_post_status'] == 'private' )
                    {
                        $(document).find('#wcmvp_prod_password').prop('disabled','true');
                        $(document).find('#wcmvp_prod_private').prop('checked','true');
                    }
                    else
                    {
                        $(document).find('#wcmvp_prod_private').removeAttr('checked'); 
                        $(document).find('#wcmvp_prod_password').removeAttr('disabled');
                        $(document).find('#wcmvp_prod_password').val(response['wcmvp_prod_post_password']) ;
                    }
                    $(document).find('#wcmvp_prod_status').val(response['wcmvp_prod_post_status']);
                    $(document).find('#wcmvp_prod_sku').val(response['wcmvp_prod_post_sku']);
                    $(document).find('#wcmvp_prod_price').val(response['wcmvp_prod_post_reg_price']);
                    $(document).find('#wcmvp_prod_sale_price').val(response['wcmvp_prod_post_sale_price']);
                    $(document).find('#wcmvp_prod_tag').val(response['wcmvp_prod_tag_val']);
                    if( response['wcmvp_prod_comment_status'] == "open" )
                    {
                        $(document).find('#wcmvp_prod_enable_reviews').prop('checked','false');
                    }
                    if( response['wcmvp_prod_comment_status'] == "closed" )
                    {
                        $(document).find('#wcmvp_prod_enable_reviews').removeAttr('checked'); 
                    }
                    $(document).find('#wcmvp_prod_weight').val(response['wcmvp_prod_post_weight']);
                    $(document).find('#wcmvp_prod_length').val(response['wcmvp_prod_post_length']);
                    $(document).find('#wcmvp_prod_width').val(response['wcmvp_prod_post_width']);
                    $(document).find('#wcmvp_prod_height').val(response['wcmvp_prod_post_height']);
                    if(response['wcmvp_prod_shpping_class_val'] != "")
                    {
                        $(document).find('#wcmvp_prod_shipping_class').val(response['wcmvp_prod_shpping_class_val']);
                    }
                    else
                    {
                        $(document).find('#wcmvp_prod_shipping_class').val('_no_shipping_class');
                    }
                    if( response['wcmvp_prod_prod_visibile_slug'] == "" )
                    {
                        $(document).find('#wcmvp_prod_visibility').val("visible");
                    }
                    else
                    {
                        $(document).find('#wcmvp_prod_visibility').val(response['wcmvp_prod_prod_visibile_slug']);
                    }
                    $(document).find('#wcmvp_prod_stock_status').val(response['wcmvp_prod_post_stock_status']);
                    $(document).find('#wcmvp_prod_stock_qty').val(response['wcmvp_prod_post_stock_qty']);
                    $(document).find('#wcmvp_prod_backorders').val(response['wcmvp_prod_post_backorders']);
                    if( response['wcmvp_prod_prod_featured_slug'] == "featured" )
                    {
                        $(document).find('#wcmvp_prod_prod_featured_slug').prop('checked','false');
                    }
                    else
                    {
                        $(document).find('#wcmvp_prod_prod_featured_slug').removeAttr('checked'); 
                    }
                    if( response['wcmvp_prod_post_manage_stock'] == 'yes' )
                    {
                        $(document).find('#wcmvp_prod_manage_stock').prop('checked','true');
                        $(document).find( '#wcmvp_prod_stock_manage' ).show();
                        $(document).find( '#wcmvp_prod_stock_status_div' ).hide();
                    }
                    if( response['wcmvp_prod_post_manage_stock'] == 'no' )
                    {
                        $(document).find('#wcmvp_prod_manage_stock').removeAttr('checked');
                        $(document).find( '#wcmvp_prod_stock_manage' ).hide();
                        $(document).find( '#wcmvp_prod_stock_status_div' ).show();
                    }
                    if( $(document).find( '#wcmvp_prod_private' ).is(':checked') )
                    {
                        $(document).find('#wcmvp_prod_status').val('publish');
                    }
                    $(document).find('.wcmvp_prod_post_cat').each(function(a,b) {

                        $(this).val(response['wcmvp_prod_post_cat']);

                    })
                    $(document).find('.wcmvp_quick_edit_modal_data').each(function(a,b){
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

// ================== When clcik on quick edit product button to open iframe and send data to ddb======//

        $(document).on( 'click','#wcmvp_prod_quick_edit_update',function() {

            var wcmvp_quick_edit_update = $(document).find('#wcmvp_quick_edit_update').attr('data-id');
            var wcmvp_prod_title = $(document).find('#wcmvp_prod_title').val();
            var wcmvp_prod_slug = $(document).find('#wcmvp_prod_slug').val();
            var wcmvp_prod_published_date = $(document).find('#wcmvp_prod_published_date').val();
            var wcmvp_prod_published_time = $(document).find('#wcmvp_prod_published_time').val();
            var wcmvp_prod_publish_date = wcmvp_prod_published_date + " " + wcmvp_prod_published_time;
            var wcmvp_prod_tag = $(document).find('#wcmvp_prod_tag').val();
            var wcmvp_prod_tag_split =  wcmvp_prod_tag.split(',');

            if( $(document).find( '#wcmvp_prod_private' ).is(':checked') )
            {
               var wcmvp_prod_private = "private";
               var wcmvp_prod_password = "";
            }
            else
            {
                var wcmvp_prod_password = $(document).find('#wcmvp_prod_password').val();
                var wcmvp_prod_status = $(document).find('#wcmvp_prod_status').children('option:selected').val();
            }
            if( $(document).find('#wcmvp_prod_enable_reviews').is(':checked') )
            {
                var wcmvp_prod_enable_reviews = 'open';
            }
            else
            {
                var wcmvp_prod_enable_reviews = 'closed';
            }
            var wcmvp_prod_sku = $(document).find('#wcmvp_prod_sku').val();
            var wcmvp_prod_reg_price = $(document).find('#wcmvp_prod_price').val();
            var wcmvp_prod_sale_price = $(document).find('#wcmvp_prod_sale_price').val();
            var wcmvp_prod_weight = $(document).find('#wcmvp_prod_weight').val();
            var wcmvp_prod_length = $(document).find('#wcmvp_prod_length').val();
            var wcmvp_prod_width = $(document).find('#wcmvp_prod_width').val();
            var wcmvp_prod_height = $(document).find('#wcmvp_prod_height').val();
            var wcmvp_prod_visibility = $(document).find('#wcmvp_prod_visibility').children('option:selected').val();

            if( wcmvp_prod_visibility == 'visible' )
            {
                var wcmvp_prod_visibility_array = [];
            }
            if( wcmvp_prod_visibility == 'catalog' )
            {
                var wcmvp_prod_visibility_array = ['exclude-from-search'];
            }
            if( wcmvp_prod_visibility == 'search' )
            {
                var wcmvp_prod_visibility_array = ['exclude-from-catalog'];
            }
            if( wcmvp_prod_visibility == 'hidden' )
            {
                var wcmvp_prod_visibility_array = ['exclude-from-search','exclude-from-catalog'];
            }
            if( $(document).find('#wcmvp_prod_prod_featured_slug').is(':checked') )
            {
                wcmvp_prod_visibility_array.push('featured');
            }
            var wcmvp_prod_shipping_class = $(document).find('#wcmvp_prod_shipping_class').children('option:selected').val();

            if( $(document).find('#wcmvp_prod_manage_stock').is(':checked') )
            {
                var wcmvp_prod_stock_status = 'instock';
                var wcmvp_prod_stock_qty = $(document).find('#wcmvp_prod_stock_qty').val();
                var wcmvp_prod_backorders = $(document).find('#wcmvp_prod_backorders').children('option:selected').val();
            }
            else
            {
                var wcmvp_prod_stock_status = $(document).find('#wcmvp_prod_stock_status').children('option:selected').val();
                var wcmvp_prod_stock_qty = "";
                var wcmvp_prod_backorders = "no";
            }
            var wcmvp_prod_quick_edit;
            var wcmvp_prod_post_cat_array = [];
            $(document).find('.wcmvp_prod_post_cat').each(function( ){
                if($(this).is(':checked'))
                {
                    var wcmvp_prod_post_cat = $(this).val();
                    wcmvp_prod_post_cat_array.push(wcmvp_prod_post_cat);
                }   
                
            })
            var wcmvp_prod_quick_edit_data = {
                'action' : 'wcmvp_prod_quick_edit_action',
                'wcmvp_prod_quick_edit[wcmvp_quick_edit_update]' : wcmvp_quick_edit_update,
                'wcmvp_prod_quick_edit[wcmvp_prod_title]' : wcmvp_prod_title,
                'wcmvp_prod_quick_edit[wcmvp_prod_slug]' : wcmvp_prod_slug,
                'wcmvp_prod_quick_edit[wcmvp_prod_publish_date]' : wcmvp_prod_publish_date,
                'wcmvp_prod_quick_edit[wcmvp_prod_private]' : wcmvp_prod_private,
                'wcmvp_prod_quick_edit[wcmvp_prod_password]' : wcmvp_prod_password,
                'wcmvp_prod_quick_edit[wcmvp_prod_tag]' : wcmvp_prod_tag_split,
                'wcmvp_prod_quick_edit[wcmvp_prod_status]' : wcmvp_prod_status,
                'wcmvp_prod_quick_edit[wcmvp_prod_enable_reviews]' : wcmvp_prod_enable_reviews,
                'wcmvp_prod_quick_edit[wcmvp_prod_sku]' : wcmvp_prod_sku,
                'wcmvp_prod_quick_edit[wcmvp_prod_reg_price]' : wcmvp_prod_reg_price,
                'wcmvp_prod_quick_edit[wcmvp_prod_sale_price]' : wcmvp_prod_sale_price,
                'wcmvp_prod_quick_edit[wcmvp_prod_weight]' : wcmvp_prod_weight,
                'wcmvp_prod_quick_edit[wcmvp_prod_length]' : wcmvp_prod_length,
                'wcmvp_prod_quick_edit[wcmvp_prod_width]' : wcmvp_prod_width,
                'wcmvp_prod_quick_edit[wcmvp_prod_height]' : wcmvp_prod_height,
                'wcmvp_prod_quick_edit[wcmvp_prod_visibility_array]' : wcmvp_prod_visibility_array,
                'wcmvp_prod_quick_edit[wcmvp_prod_shipping_class]' : wcmvp_prod_shipping_class,
                'wcmvp_prod_quick_edit[wcmvp_prod_stock_status]' : wcmvp_prod_stock_status,
                'wcmvp_prod_quick_edit[wcmvp_prod_stock_qty]' : wcmvp_prod_stock_qty,
                'wcmvp_prod_quick_edit[wcmvp_prod_backorders]' : wcmvp_prod_backorders,
                'wcmvp_prod_quick_edit[wcmvp_prod_post_cat_array]' : wcmvp_prod_post_cat_array,
                'wcmvp_prod_quick_edit_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
            }
            jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_prod_quick_edit_data,function(response) {
                if(response != "")
                {
                    if( $(document).find( '#wcmvp_prod_private' ).is(':checked') )
                    {
                        $(document).find('#wcmvp_prod_status').val('publish');
                    }

                    $('#wcmvp_vendors_product_table').DataTable().ajax.reload();
                    wcmvp_vendors_prod_count(response);
                    $('.notifyjs-wrapper').remove();
                    $.notify(
                        wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_product_updated, {
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

            },'json' )

        } )

    })

//========================When click on trash product button==========================//

    $(document).on( 'click','.wcmvp_prod_trash',function() {

        $(document).find('#wcmvp-loader-image').show();
        var wcmvp_prod_trash_id = $(this).siblings('.wcmvp_prod_quick_edit').attr('data-id');
        var wcmvp_prod_trash_data = {
                'action' : 'wcmvp_prod_trash_action',
                'wcmvp_prod_trash_id' : wcmvp_prod_trash_id,
                'wcmvp_prod_trash_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
        }

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_prod_trash_data,function(response) {

            $(document).find('#wcmvp-loader-image').hide();
            if(response != "")
            {
                $('#wcmvp_vendors_product_table').DataTable().ajax.reload();
                wcmvp_vendors_prod_count(response);
                $('.notifyjs-wrapper').remove();
                $.notify(
                    wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_product_trashed, {
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
        },'json' )
        
    } )

//============= When click on preview button from product tables=================//

    $(document).on( 'click','.wcmvp_prod_preview',function() {

        var wcmvp_prod_preview_id = $(this).siblings('.wcmvp_prod_quick_edit').attr('data-id');
        var wcmvp_prod_preview_data = {
            'action' : 'wcmvp_prod_preview_action',
            'wcmvp_prod_preview_id' : wcmvp_prod_preview_id,
            'wcmvp_prod_preview_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
        }

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_prod_preview_data,function(response) {
            if(response != "")
            {
                window.open(response,'_blank');
            }
        },'json' )
    })

//============= When click on Restore button from product Trash tables=================//

    $(document).on( 'click','.wcmvp_prod_restore',function() {

        $(document).find('#wcmvp-loader-image').show();
        var wcmvp_prod_restore_id = $(this).attr('data-id');
        var wcmvp_prod_restore_data = {
            'action' : 'wcmvp_prod_restore_action',
            'wcmvp_prod_restore_id' : wcmvp_prod_restore_id,
            'wcmvp_prod_restore_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
        }

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_prod_restore_data,function(response) {

            $(document).find('#wcmvp-loader-image').hide();
            if(response != "")
            {
                $('#wcmvp_vendors_product_table').DataTable().ajax.reload();
                wcmvp_vendors_prod_count(response);
                $('.notifyjs-wrapper').remove();
                $.notify(
                    wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_product_restored, {
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

//============= When click on Delete Permanently button from product Trash tables=================//

    $(document).on( 'click','.wcmvp_prod_del_permanent',function() {

        var wcmvp_confirm__delete_prod = confirm('Are you sure want to delete this product');
        if( wcmvp_confirm__delete_prod )
        {
            $(document).find('#wcmvp-loader-image').show();
            var wcmvp_prod_delete_id = $(this).attr('data-id');
        }
        else
        {
            return;
        }
        var wcmvp_prod_delete_data = {
            'action' : 'wcmvp_prod_delete_action',
            'wcmvp_prod_delete_id' : wcmvp_prod_delete_id,
            'wcmvp_prod_delete_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
        }

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_prod_delete_data,function(response) {

            $(document).find('#wcmvp-loader-image').hide();
            if(response != "")
            {
                $('#wcmvp_vendors_product_table').DataTable().ajax.reload();
                wcmvp_vendors_prod_count(response);
                $('.notifyjs-wrapper').remove();
                $.notify(
                    wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_product_deleted, {
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

//===============When click on outer checkbox to select all inner chckboxes=================//

    $(document).on( 'change','.wcmvp_product_outer_checkbox',function() {

        $(document).find( '.wcmvp_prod_inner_checkbox' ).prop('checked',$(this).prop('checked'));
        $(document).find( '.wcmvp_product_outer_checkbox' ).prop('checked',$(this).prop('checked'));

    } )

    $(document).on( 'change','.wcmvp_prod_inner_checkbox',function() {

        if( $(document).find('.wcmvp_prod_inner_checkbox:checked').length == $(document).find('.wcmvp_prod_inner_checkbox').length)
        {
            $(document).find(' .wcmvp_product_outer_checkbox ').prop('checked',true);
        }
        else
        {
            $(document).find(' .wcmvp_product_outer_checkbox ').prop('checked',false);
        }

    } )

//=============When click on apply button after selecting bulk action=======================//

    $(document).on( 'click','#wcmvp_vendor_apply_bulk',function() {

        
        var wcmvp_prod_bulk_action = $(document).find('#wcmvp_prod_bulk_action').children('option:selected').val();
        if( (wcmvp_prod_bulk_action != 'wcmvp_not_selected') &&  ($(document).find( '.wcmvp_prod_inner_checkbox' ).is(':checked')))
        {
            var wcmvp_prod_checkboxes_array = [];
            $(document).find( '.wcmvp_prod_inner_checkbox' ).each(function() {
                if( $(this).is(':checked') )
                {
                    var wcmvp_prod_checkboxes =  $(this).attr('data-class');
                    wcmvp_prod_checkboxes_array.push(wcmvp_prod_checkboxes);
                }
            })
            $(document).find('#wcmvp-loader-image').show();
            var wcmvp_prod_checkboxes_data = {
                'action' : 'wcmvp_prod_checkboxes_action',
                'wcmvp_prod_bulk_action_val' : wcmvp_prod_bulk_action,
                'wcmvp_prod_checkboxes' : wcmvp_prod_checkboxes_array,
                'wcmvp_prod_checkboxes_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
            }
    
            jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_prod_checkboxes_data,function(response) {

                $(document).find('#wcmvp-loader-image').hide();
                if(response != "")
                {
                    $('#wcmvp_vendors_product_table').DataTable().ajax.reload();
                    wcmvp_vendors_prod_count(response);

                    if( wcmvp_prod_bulk_action == 'wcmvp_bulk_trash_prod' )
                    {
                        var wcmvp_prod_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_products_trashed;
                    }
                    if( wcmvp_prod_bulk_action == 'wcmvp_bulk_restore_prod' )
                    {
                        var wcmvp_prod_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_products_restored;
                    }
                    if( wcmvp_prod_bulk_action == 'wcmvp_bulk_delete_prod' )
                    {
                        var wcmvp_prod_msg = wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_products_deleted;
                    }
                    

                    $(document).find('.wcmvp_product_outer_checkbox').prop('checked',false);
                    $("option:selected").prop("selected", false);
                    $('.notifyjs-wrapper').remove();
                    $.notify(
                        wcmvp_prod_msg, {
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
            },'json')
        }
    })

//=========================code goes when iframe gets closes by admin=======================//

    var wcmvp_edit_update;

    $(document).on('click','#wcmvp_iframe_close',function() {

        $(document).find('#wcmvp_vendors_product_table').DataTable().ajax.reload();
        wcmvp_edit_update = $(document).find('#wcmvp_edit_update').attr('data-id');

        wcmvp_vendors_prod_count(wcmvp_edit_update);

    } )

//==============Code goes when cick to create duplicate product from product table=========================//

    $(document).on('click','.wcmvp_prod_duplicate',function(){

        $(document).find('#wcmvp_prod_edit_modal').addClass('wcmvp-modal-open');
        $(document).find('body').css('overflow','hidden');
        $(document).find("#wcmvp_prod_edit_modal").removeClass("wcmvp-animation-left");
        
        var wcmvp_duplicate_prod_id = $(this).siblings('.wcmvp_prod_edit').attr('data-id');
        $('.loader').css('display','block');

        var wcmvp_dup_prod_table_data = {
            'action' : 'wcmvp_duplicate_prod',
            'wcmvp_prod_dupplicate_id' : wcmvp_duplicate_prod_id,
            'wcmvp_duplicate_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
        }  

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_dup_prod_table_data, function(response){
            
        if( response != "" )            
            {
                $(document).find('.wcmvp_hide_edit_frame').hide();
                $(document).find('.wcmvp_hide_add_frame').hide();
                $(document).find('.wcmvp_duplicate_add_frame').show();

                $(document).find('#wcmvp_duplicate_frame').attr('src',response);
                $('.loader').fadeIn(700);
                $('.loader').fadeOut();
            }

        },'json')
        

    })

//====================Code Goes when Show Empty trash button and working on that========================//
    
    $(document).on( 'click','#wcmvp_empty_trash',function(){

        var wcmvp_confirm_for_empty_trash = confirm(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_confirm_empty_trash);

        if( wcmvp_confirm_for_empty_trash )
        {
            var wcmvp_empty_trash_data = {
                'action' : 'wcmvp_empty_trash_action',
                'wcmvp_empty_trash_nonce' : wcmvp_vendor_object.wcmvp_vendor_nonce
            }
    
            jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_empty_trash_data,function(response) {
                if( response != "" )
                {
                    $('#wcmvp_vendors_product_table').DataTable().ajax.reload();
                    wcmvp_vendors_prod_count(response);
                    $('.notifyjs-wrapper').remove();
                        $.notify(
                            wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_some_error_msg, {
                            className : 'vendor_success',
                            position : 'right bottom'
                            }
                        )
                }
                else
                {
                    $('.notifyjs-wrapper').remove();
                        $.notify(
                            wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_products_deleted, {
                                className : 'vendor_error',
                                position : 'right bottom',
                            }
                        )
                }
            } ,'json')
        }
        else
        {
            return;
        }

    })

//=================Code Executes When product goes featured from product listing page================//

    $(document).on( 'change','.wcmvp_fav_prod',function() {

        $(document).find('#wcmvp-loader-image').show();
        var wcmvp_fav_prod_id = $(this).attr('data-id');
        if( $(this).is(':checked') )
        {
            var wcmvp_fav_prod = "featured";
        }
        else
        {
            var wcmvp_fav_prod = "";
        }

        var wcmvp_fav_prod_data = {

            'action' : 'wcmvp_fav_prod_action',
            'wcmvp_fav_prod' : wcmvp_fav_prod,
            'wcmvp_fav_prod_id' : wcmvp_fav_prod_id,
            'wcmvp_fav_prod_data_nonce' : wcmvp_vendor_object.wcmvp_vendor_nonce
        }

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url,wcmvp_fav_prod_data,function(response){

            $(document).find('#wcmvp-loader-image').hide();
            if( response == 1 )
            {
                $('#wcmvp_vendors_product_table').DataTable().ajax.reload();
                $('.notifyjs-wrapper').remove();
                    $.notify(
                        wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_prod_visibility, {
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

        } )

    } )

//===============Function is used to launch datatatable at product table section=======================//

    function wcmvp_product_datatable(wcmvp_product_author_id,wcmvp_sort_table,wcmvp_sort_by_status)
    {
        if( wcmvp_sort_by_status == 'trash' )
        {
            $(document).find('.wcmvp_prod_bul_untrash').show();
            $(document).find('.wcmvp_prod_bul_trash').hide();
        }
        else
        {
            $(document).find('.wcmvp_prod_bul_untrash').hide();
            $(document).find('.wcmvp_prod_bul_trash').show();
        }

        $("#wcmvp_vendors_product_table").dataTable().fnDestroy();    
        $(document).find('#wcmvp_vendors_product_table').DataTable( {
            "processing" : true,
            "serverSide" : true,
            "bsortable"  : true,
            "info"       : false,
            select       : true,
            "ajax"       : {
                data: {
                    action: 'wcmvp_vendors_product',
                    'wcmvp_product_author_id'   : wcmvp_product_author_id,
                    'wcmvp_sort_table'          : wcmvp_sort_table,
                    'wcmvp_sort_by_status'      : wcmvp_sort_by_status,
                    'wcmvp_vendor_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
                    },
                type      : 'POST',
                dataType  : 'json',
                url       : wcmvp_vendor_object.wcmvp_ajax_url,
                
            },
            columnDefs : [
                {
                    "targets": [0,1,6,7,8],
                    "orderable": false,
                    "searchable": false,
                    
                },
                {
                    "width": "20%", "targets": 2
                }
            ],
            language: {
                search: "_INPUT_",
                searchPlaceholder: wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_search,
                'processing':  "<div class='wcmvp-loader-box'><div class='wcmvp-reload-table-loader-img-div'><img class='wcmvp-loader-image-datatable' src='"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_loader_src+"' /></div></div>"
            },
            "pagingType": "full_numbers",
            "drawCallback": function () {
                $('.dataTables_filter input').addClass('wcmvp-input-search-field');
                $('.mdl-cell--6-col').parent().addClass('wcmvp-grid');
                $('.dataTables_length select').addClass('wcmvp-select-box  mdc-ripple-upgraded');
                $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
                $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");
            },
            order : [[9, 'desc']]  
        });
    }

//================This function is used when admin view/edit any product from admin panel===============//
//================This function is used when admin view/edit any product from admin panel===============//

    function wcmvp_change_product_iframe_url()
    {
        $('.loader').css('display','block');
        var wcmvp_assigning_vendor = $(document).find('#wcmvp_add_new_prod').attr('data-id');
        var wcmvp_add_prod_table_data = {
            'action' : 'wcmvp_prod_add_new',
            'wcmvp_assigning_vendor' : wcmvp_assigning_vendor,
            'wcmvp_vendor_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
        }  

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_add_prod_table_data, function(response){
            
        if( response != "" )            
            {
                $(document).find('#wpbody-content').show();
                $(document).find('.wcmvp_hide_edit_frame').hide();
                $(document).find('.wcmvp_hide_add_frame').show();
                $(document).find('.wcmvp_duplicate_add_frame').hide();
                $(document).find('#wcmvp_add_prod_frame').attr('src',response);
                $(document).find('#wcmvp_edit_update').attr('data-id',wcmvp_assigning_vendor);
                $('.loader').fadeIn(700);
                $('.loader').fadeOut();
            }

        },'json')
    }

    $(document).on('change','#wcmvp_metaboxes_vend_id',function() {

        

    })

//================Function activates when clicks on edit/update button==========================//
//================Function activates when clicks on edit/update button==========================//

    function wcmvp_edit_product_frame(wcmvp_edit_prod_id) {
        $('.loader').css('display','block');
        var wcmvp_prod_table_data = {
            'action' : 'wcmvp_prod_edit',
            'wcmvp_edit_prod_id' : wcmvp_edit_prod_id,
            'wcmvp_vendor_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
        }  

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_prod_table_data, function(response){

        if( response != "" )            
            {
                $(document).find('#wpbody-content').show();
                $(document).find('.wcmvp_hide_add_frame').hide();
                $(document).find('.wcmvp_hide_edit_frame').show();
                $(document).find('.wcmvp_duplicate_add_frame').hide();
                $(document).find('#wcmvp_vend_prod_frame').attr('src',response['wcmvp_prod_edit_url']);
                $(document).find('#wcmvp_edit_update').attr('data-id',response['wcmvp_edit_prod_author_id'])
                $('.loader').fadeIn(700);
                $('.loader').fadeOut();
            }

        },'json')
    }
    
    //Function used to count the values in no. of product available in table

    function wcmvp_vendors_prod_count(wcmvp_product_author_id)
    {
        var wcmvp_prod_table_data = {
            'action' : 'wcmvp_prod_tab_count',
            'wcmvp_product_author_id' : wcmvp_product_author_id,
            'wcmvp_vendor_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce,
        }  

        jQuery.post( wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_prod_table_data, function(response){
            if( response != "" )            
            {
                $( '#wcmvp_sort_all' ).html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_all+'('+response['wcmvp_prod_all_count']+')');
                $( '#wcmvp_sort_publish' ).html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_published+'('+response['wcmvp_prod_publish_count']+')');
                $( '#wcmvp_sort_draft' ).html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_draft+'('+response['wcmvp_prod_draft_count']+')');
                $( '#wcmvp_sort_pending' ).html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_pending+'('+response['wcmvp_prod_pending_count']+')');
                $( '#wcmvp_sort_trash' ).html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_trash+'('+response['wcmvp_prod_trash_count']+')');
                $( '#wcmvp_sort_private' ).html(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_private+'('+response['wcmvp_prod_private_count']+')');
            }

        },'json')
    }

})( jQuery );

