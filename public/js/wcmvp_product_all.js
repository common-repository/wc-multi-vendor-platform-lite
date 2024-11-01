(function ($) {
    'use strict';
    $(document).on('ready', function () {

        function getSelectValues(select) {
            var result = [];
            var options = select && select.options;
            var opt;
if(Array.isArray(options)){
    for (var i = 0, iLen = options.length; i < iLen; i++) {
        opt = options[i];

        if (opt.selected) {
            result.push(opt.value || opt.text);
        }
    }
}
            
            return result;
        } 

        $(document).find("#wcmvp-downloadable").on("click", function () {
            if ($(document).find("#wcmvp-downloadable").prop("checked")) {
                $(document).find(".wcmvp_downloadable_box").show();
            } else {
                $(document).find(".wcmvp_downloadable_box").hide();
            }
        })

        $(document).find(".wcmvp_remove_prod_img").on("click", function () {
            $("#wcmvp-image-preview").hide();
            $(".wcmvp_remove_prod_image").hide();
            $(".wcmvp_upload_box").show();
            $('#wcmvp-image-preview').attr('src', "").css('width', 'auto');
            $('#wcmvp-image_attachment_id').val("");
        })

        ////////////////////////////////////////////////////////////////////////////////////////////////////
        var wcmvp_pro_file_frame;
        var wcmvp_pro_attachment;
        var wp_media_pro_post_id;
        var set_to_pro_post_id = "";
        jQuery(document).on('click', '.wcmvp-prod_upload_file', function (event) {
            event.preventDefault();
            if (wcmvp_pro_file_frame) {
                wcmvp_pro_file_frame.uploader.uploader.param('post_id', set_to_pro_post_id);
                wcmvp_pro_file_frame.open();
                return;
            } else {
                wp.media.model.settings.post.id = set_to_pro_post_id;
            }
            wcmvp_pro_file_frame = wp.media.frames.wcmvp_pro_file_frame = wp.media({
                title: wcmvp_ajax_object.wcmvp_translation.wcmvp_select_file,
                button: {
                    text: wcmvp_ajax_object.wcmvp_translation.wcmvp_use_file,
                },
                multiple: true
            });

            wcmvp_pro_file_frame.on('select', function () {
                var selection = wcmvp_pro_file_frame.state().get('selection');
                selection.map(function (attachment) {
                    attachment.toJSON();
                    var wcmvp_table_html = $("#wcmvp_prod_download_file").html();

                    var wcmvp_push_html = ' <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">';
                    wcmvp_push_html += '<input type="text" name="wcmvp_file_name[]" class="wcmvp_prod_file_name mdc-text-field__input">';
                    wcmvp_push_html += '<div class="mdc-notched-outline mdc-notched-outline--upgraded">';
                    wcmvp_push_html += '<div class="mdc-notched-outline__leading">'
                    wcmvp_push_html += '</div>';
                    wcmvp_push_html += '<div class="mdc-notched-outline__notch">';
                    wcmvp_push_html += '<span class="mdc-floating-label">' + wcmvp_ajax_object.wcmvp_translation.wcmvp_file_name + '</span>';
                    wcmvp_push_html += '</div>';
                    wcmvp_push_html += '<div class="mdc-notched-outline__trailing">';
                    wcmvp_push_html += '</div>';
                    wcmvp_push_html += '</div>';
                    wcmvp_push_html += '</label>';

                    var wcmvp_src_html = '<label class="mdc-text-field mdc-text-field--outlined wcmvp-prdct-price-label">';
                    wcmvp_src_html += '<input type="text" name="wcmvp_file_path[]" class="wcmvp_file_src mdc-text-field__input" placeholder="" value="' + attachment.attributes.url + '"><input type="hidden" name="wcmvp-file_id" class="wcmvp-file_id" value="' + attachment.id + '">';
                    wcmvp_src_html += '<div class="mdc-notched-outline mdc-notched-outline--upgraded">';
                    wcmvp_src_html += '<div class="mdc-notched-outline__leading"></div>';
                    wcmvp_src_html += '<div class="mdc-notched-outline__notch">';
                    wcmvp_src_html += '<span class="mdc-floating-label">' + wcmvp_ajax_object.wcmvp_translation.wcmvp_file_url + '</span>';
                    wcmvp_src_html += '</div><div class="mdc-notched-outline__trailing"></div>';
                    wcmvp_src_html += '</div></label>';

                    var wcmvp_del_html = '<button class="wcmvp_delete mdc-button mdc-button--raised wcmvp-footer-btn">' + wcmvp_ajax_object.wcmvp_translation.wcmvp_remove + '</button>';
                    var wcmvp_final_html = "<div><span>" + wcmvp_push_html + "</span><span>" + wcmvp_src_html + "</span><span>" + wcmvp_del_html + "</span></div>";
                    $("#wcmvp_prod_download_file").html(wcmvp_table_html + wcmvp_final_html);
                });
            });
            wcmvp_pro_file_frame.open();
        });
        jQuery('a.add_media').on('click', function () {
            wp.media.model.settings.post.id = wp_media_pro_post_id;
        });

        $(document).on("click", ".wcmvp_delete", function (e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        })

        /*   create product section   */

        if ($(document).find('#wcmvp-button').hasClass('wcmvp_popup')) {

            $(document).find("#wcmvp-add-product").on("click", function () {
                $(document).find('.wcmvp-table').css('display', 'none');
                $(document).find('.wcmvp_no_modal_add_prod').slideDown(1000);
                $(document).find('.wcmvp_no_modal_add_prod').css({ "width": "70%", "margin": "0 auto" });
                $(document).find('.wcmvp_go_back').css('display', 'block');
            })
            $(document).find(".wcmvp_listing_button").on("click", function () {
                $(document).find('.wcmvp-table').css('display', 'block');
                $(document).find('.wcmvp_no_modal_add_prod').css('display', 'none');
                $(document).find('.wcmvp_go_back').css('display', 'none');
            })
            $(document).find(".wcmvp_div").on("click", function () {
                $(document).find('.wcmvp-table').css('display', 'block');
                $(document).find('.wcmvp_no_modal_add_prod').css('display', 'none');
                $(document).find('.wcmvp_go_back').css('display', 'none');
            })
            $(document).find(".wcmvp_back_prod").on("click", function () {
                $(document).find('.wcmvp-table').css('display', 'block');
                $(document).find('.wcmvp_no_modal_add_prod').css('display', 'none');
                $(document).find('.wcmvp_go_back').css('display', 'none');
            })
        }

        $(document).on("click", "#wcmvp_schedule_button", function (e) {
            e.preventDefault();
            $(document).find(".wcmvp_schedule_box").slideDown();
            $(document).find("#wcmvp_schedule_cancel_button").css("display", "block");
            $(document).find("#wcmvp_schedule_button").css("display", "none");
        })

        $(document).on("click", "#wcmvp_schedule_cancel_button", function (e) {
            e.preventDefault();
            $(document).find(".wcmvp_schedule_box").slideUp();
            $(document).find("#wcmvp_schedule_cancel_button").css("display", "none");
            $(document).find("#wcmvp_schedule_button").css("display", "block");
        })

        $(document).on("click", ".wcmvp_close_product_modal", function () {
            $(".wcmvp-add-product-div2").hide();
            $("#wcmvp-image-preview").attr("src", "").hide();
            $("#wcmvp_product_id").val("");
            $(".wcmvp_endsec").show();
            $("#wcmvp-image_attachment_id").val("");
            $("#wcmvp_product_name").val("");
            $("#wcmvp_product_price").val("");
            $("#wcmvp_discounted-price").val("");
            $("#wcmvp_visibility").val("Visible");
            $("#wcmvp_category").val("Uncategorized");
            $("#wcmvp_product_tags").val("").change();
            $("#wcmvp_description").val("");
            $("#wcmvp-downloadable").removeAttr('checked');
            $("#wcmvp-virtual").removeAttr('checked');
            $("#wcmvp_stock_manage").removeAttr('checked');
            $("#wcmvp_sku_field").val("");
            $("#wcmvp_schedule_from").val("");
            $("#wcmvp_schedule_to").val("");
            $("#wcmvp_stock_status").val("instock");
            $("#wcmvp_purchase_note_field").val("");
            $("#wcmvp_product_reviews").removeAttr('checked');
            $("#wcmvp_prod_exist").addClass("wcmvp_prod_new");
            $("#wcmvp_prod_exist").removeClass("wcmvp_prod_already_exist");
        })

        $(document).on("keyup", "#wcmvp_sku_field", function (e) {
            if ($(this).val() != "") {
                var data = {
                    'action': 'check_if_sku_exists',
                    'wcmvp_sku_string': $(this).val(),
                    'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                };
                jQuery.post(wcmvp_ajax_object.wcmvp_ajax_url, data, function (response) {
                    if (response) {
                        $("#wcmvp_product_add").attr('disabled', 'disabled');
                        $('.notifyjs-wrapper').remove();
                        $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_sku_exist, { className: 'wcmvp_error', position: "right bottom" });
                    } else {
                        $('#wcmvp_product_add').removeAttr('disabled');
                    }
                }, "json");
            }
        })

        $(document).on("click", "#wcmvp-create-product", function (e) {
            e.preventDefault();
            var wcmvp_id = $("#wcmvp_product_id").val();
            var wcmvp_image = $("#wcmvp-image_attachment_id").val();
            var wcmvp_product_name = $("#wcmvp_product_name").val();
            var wcmvp_schedule_to = $("#wcmvp_schedule_to").val();
            var wcmvp_schedule_from = $("#wcmvp_schedule_from").val();
            if (wcmvp_product_name == "") {
                $('.notifyjs-wrapper').remove();
                $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_enter_prod_name, { className: 'wcmvp_error', position: "right bottom" });
                return;
            }
            var wcmvp_product_price = parseFloat($("#wcmvp_product_price").val());
            var wcmvp_discount_price = parseFloat($("#wcmvp_discounted-price").val());
            if (wcmvp_discount_price > wcmvp_product_price) {
                $('.notifyjs-wrapper').remove();
                $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_reg_should_great, { className: 'wcmvp_error', position: "right bottom" });
                return;
            }
            var wcmvp_category = new Array();
            wcmvp_category.push($("#wcmvp_category").val());
            var wcmvp_product_tags = [];
            wcmvp_product_tags.push($("#wcmvp_product_tags").val());
            var wcmvp_description = $("#wcmvp_description").val();
            var wcmvp_user_id = $("#wcmvp-create-product").data("id");

            var wcmvp_field = $(".wcmvp_product_data");
            if (wcmvp_field.length > 0) {
                var extra_data = {};
                $.each(wcmvp_field, function (index, event) {
                    extra_data[event.name] = event.value;
                });
            }

            var wcmvp_multiple_select = $(".wcmvp_product_multiple_data");
            if (wcmvp_multiple_select.length > 0) {
                var extra_multi_data = {};
                $.each(wcmvp_multiple_select, function (index, event) {
                    extra_multi_data[event.name] = getSelectValues(this);
                });
            }


            var wcmvp_image_src = $(".wcmvp_image_src");
            if (wcmvp_image_src.length > 0) {
                var wcmvp_image_src_path = {};
                $.each(wcmvp_image_src, function (index, event) {
                    wcmvp_image_src_path[event.name] = event.src;
                });
            }

             var wcmvp_extra_check = $(".wcmvp_prod_checkbox");
             if(wcmvp_extra_check.length>0){
               var wcmvp_check_obj={};
              $.each(wcmvp_extra_check, function(index,event) {
                wcmvp_check_obj[event.name]= $("#"+event.id).is(":checked");
               });
               }

            if ($("#wcmvp_prod_exist").hasClass("wcmvp_prod_new")) {
                var wcmvp_prod_exists = "new";
            } else if ($("#wcmvp_prod_exist").hasClass("wcmvp_prod_already_exist")) {
                var wcmvp_prod_exists = "old";
            }
            else {
                var wcmvp_prod_exists = "unknown";
            }
            $(".wcmvp_loader").show();
            var data = {
                'action': 'add_product_ajax',
                'image': wcmvp_image,
                'wcmvp_id': wcmvp_id,
                'wcmvp_schedule_from': wcmvp_schedule_from,
                'wcmvp_schedule_to': wcmvp_schedule_to,
                'pname': wcmvp_product_name,
                'pprice': wcmvp_product_price,
                'dprice': wcmvp_discount_price,
                'category': wcmvp_category,
                'tags': wcmvp_product_tags,
                'desc': wcmvp_description,
                'userID': wcmvp_user_id,
                'cond': 'wcmvp_add_prod',
                'wcmvp_prod_exists': wcmvp_prod_exists,
                'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            };
            if (wcmvp_field.length > 0) {
                var data = { ...extra_data, ...data };
            }

            if (wcmvp_multiple_select.length > 0) {
                var data = { ...extra_multi_data, ...data };
            }

            if (wcmvp_image_src.length > 0) {
                var data = { ...wcmvp_image_src_path, ...data };
            }
            if(wcmvp_extra_check.length>0){
                var data={...wcmvp_check_obj,...data};
              }

            jQuery.post(wcmvp_ajax_object.wcmvp_ajax_url, data, function (response) {
                if(response){
                    $(".wcmvp_loader").hide();
                }
                if (response == "success") {
                    $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_success, { className: 'wcmvp_success', position: "right bottom" });
                    $("#wcmvp-image-preview").hide();
                    $("#wcmvp_product_id").val("");
                    $("#wcmvp-image_attachment_id").val("");
                    $("#wcmvp_product_name").val("");
                    $("#wcmvp_product_price").val("");
                    $("#wcmvp_discounted-price").val("");
                    $("#wcmvp_category").val("Uncategorized");
                    $("#wcmvp_product_tags").val("").change();
                    $("#wcmvp_description").val("");
                    $("#wcmvp_schedule_from").val("");
                    $("#wcmvp_schedule_to").val("");
                    $('#table_id').DataTable().ajax.reload(null, false);
                    wcmvp_count_ajax();
                    $("#wcmvp_prod_exist").addClass("wcmvp_prod_new");
                    $("#wcmvp_prod_exist").removeClass("wcmvp_prod_already_exist");
                }
                else {
                    $('.notifyjs-wrapper').remove();
                    $.notify(response, { className: 'wcmvp_error', position: "right bottom" });
                }
            }, 'json');
        })


        $(document).on("click", "#wcmvp_product_add", function () {
            var wcmvp_image = $("#wcmvp-image_attachment_id").val();
            var wcmvp_id = $("#wcmvp_product_id").val();
            var wcmvp_product_name = $("#wcmvp_product_name").val();
            var wcmvp_product_price = parseFloat($("#wcmvp_product_price").val());
            var wcmvp_discount_price = parseFloat($("#wcmvp_discounted-price").val());
            var wcmvp_schedule_to = $("#wcmvp_schedule_to").val();
            var wcmvp_schedule_from = $("#wcmvp_schedule_from").val();
            var wcmvp_category = new Array();
            wcmvp_category.push($("#wcmvp_category").val());
            if (wcmvp_product_name == "") {
                $('.notifyjs-wrapper').remove();
                $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_enter_prod_name, { className: 'wcmvp_error', position: "right bottom" });
                return;
            }
            if (wcmvp_discount_price > wcmvp_product_price) {
                $('.notifyjs-wrapper').remove();
                $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_reg_should_great, { className: 'wcmvp_error', position: "right bottom" });
                return;
            }
            var wcmvp_product_tags = [];
            wcmvp_product_tags.push($("#wcmvp_product_tags").val());
            var wcmvp_description = $("#wcmvp_description").val();
            var wcmvp_user_id = $("#wcmvp-create-product").data("id");
            if ($("#wcmvp-downloadable").attr("checked")) {
                var wcmvp_download_product = 'yes';
            } else {
                var wcmvp_download_product = 'no';
            }
            if ($("#wcmvp-virtual").attr("checked")) {
                var wcmvp_virtual_product = 'yes';
            } else {
                var wcmvp_virtual_product = 'no';
            }
            if ($("#wcmvp_stock_manage").attr("checked")) {
                var wcmvp_stock_manage = 'yes';
            } else {
                var wcmvp_stock_manage = 'no';
            }
            if ($("#wcmvp_single_product_permission").attr("checked")) {
                var wcmvp_single_product_permission = 'yes';
            } else {
                var wcmvp_single_product_permission = 'no';
            }
            var wcmvp_short_description = tinyMCE.activeEditor.getContent({ format: 'text' });
            if (wcmvp_download_product == "yes") {
                var wcmvp_downloadable_prod = $(".wcmvp_file_src");
                var wcmvp_downloadable_prod_id = $(".wcmvp-file_id");
                var wcmvp_downloadable_prod_name = $(".wcmvp_prod_file_name");
                var i = 0;
                var wcmvp_download_prod_array = [];
                for (i = 0; i < wcmvp_downloadable_prod.length; i++) {
                    var wcmvp_download_prod_name = $(wcmvp_downloadable_prod_name[i]).val()
                    var wcmvp_download_prod_src = $(wcmvp_downloadable_prod[i]).val();
                    var wcmvp_download_prod_id = $(wcmvp_downloadable_prod_id[i]).val();
                    wcmvp_download_prod_array[i] = [wcmvp_download_prod_id, wcmvp_download_prod_name, wcmvp_download_prod_src];
                }
                var wcmvp_prod_download_limit = $(".wcmvp_prod_download_limit").val();
                var wcmvp_prod_download_expiry = $(".wcmvp_prod_download_expiry").val();
            } else {
                var wcmvp_download_prod_array = [];
                var wcmvp_prod_download_limit = "";
                var wcmvp_prod_download_expiry = "";
            }

            var wcmvp_sku = $("#wcmvp_sku_field").val();
            var wcmvp_stock_status = $("#wcmvp_stock_status").val();
            var wcmvp_visible = $("#wcmvp_visibility").val();
            var wcmvp_purchase_note_field = $("#wcmvp_purchase_note_field").val();
            if ($("#wcmvp_product_reviews").attr("checked")) {
                var wcmvp_product_reviews = 'open';
            } else {
                var wcmvp_product_reviews = 'closed';
            }

            var wcmvp_field = $(document).find(".wcmvp_product_data");
            if (wcmvp_field.length > 0) {
                var extra_data = {};
                $.each(wcmvp_field, function (index, event) {
                    extra_data[event.name] = event.value;
                });
            }

            var wcmvp_multiple_select = $(document).find(".wcmvp_product_multiple_data");

            if ($("#wcmvp_prod_exist").hasClass("wcmvp_prod_new")) {
                var wcmvp_prod_exists = "new";
            } else if ($("#wcmvp_prod_exist").hasClass("wcmvp_prod_already_exist")) {
                var wcmvp_prod_exists = "old";
            }
            else {
                var wcmvp_prod_exists = "unknown";
            }

            if (wcmvp_multiple_select.length > 0) {
                var extra_multi_data = {};
                $.each(wcmvp_multiple_select, function (index, event) {
                    extra_multi_data[event.name] = getSelectValues(event);
                });
            }

            var wcmvp_image_src = $(".wcmvp_image_src");
            if (wcmvp_image_src.length > 0) {
                var wcmvp_image_src_path = {};
                $.each(wcmvp_image_src, function (index, event) {
                    wcmvp_image_src_path[event.name] = event.src;
                });
            }

            var wcmvp_extra_check = $(".wcmvp_prod_checkbox");
            if(wcmvp_extra_check.length>0){
              var wcmvp_check_obj={};
             $.each(wcmvp_extra_check, function(index,event) {
               wcmvp_check_obj[event.name]= $("#"+event.id).is(":checked");
              });
              }
            $(".wcmvp_loader").show();
            var data = {
                'action': 'add_product_ajax',
                'image': wcmvp_image,
                'wcmvp_id': wcmvp_id,
                'pname': wcmvp_product_name,
                'pprice': wcmvp_product_price,
                'dprice': wcmvp_discount_price,
                'category': wcmvp_category,
                'wcmvp_schedule_from': wcmvp_schedule_from,
                'wcmvp_schedule_to': wcmvp_schedule_to,
                'tags': wcmvp_product_tags,
                'desc': wcmvp_description,
                'wcmvp_prod_exists': wcmvp_prod_exists,
                'userID': wcmvp_user_id,
                'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce,
                'download_product': wcmvp_download_product,
                'virtual_product': wcmvp_virtual_product,
                'stock_manage': wcmvp_stock_manage,
                'wcmvp_single_product_permission': wcmvp_single_product_permission,
                'short_description': wcmvp_short_description,
                'sku': wcmvp_sku,
                'stock_status': wcmvp_stock_status,
                'visibility': wcmvp_visible,
                'purchase_note_field': wcmvp_purchase_note_field,
                'product_reviews': wcmvp_product_reviews,
                'wcmvp_download_prod_array': wcmvp_download_prod_array,
                "wcmvp_prod_download_limit": wcmvp_prod_download_limit,
                "wcmvp_prod_download_expiry": wcmvp_prod_download_expiry,
                'cond': 'add_detailed',
            };
            if (wcmvp_field.length > 0) {
                var data = { ...extra_data, ...data };
            }
            if (wcmvp_multiple_select.length > 0) {
                var data = { ...extra_multi_data, ...data };
            }
            if (wcmvp_image_src.length > 0) {
                var data = { ...wcmvp_image_src_path, ...data };
            }
            if(wcmvp_extra_check.length>0){
                var data={...wcmvp_check_obj,...data};
              }
            jQuery.post(wcmvp_ajax_object.wcmvp_ajax_url, data, function (response) {
                if(response){
                    $(".wcmvp_loader").hide();
                }
                if (response == "success") {
                    $('.notifyjs-wrapper').remove();
                    $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_success, { className: 'wcmvp_success', position: "right bottom" });
                    tinyMCE.activeEditor.dom.remove(tinyMCE.activeEditor.dom.select('p'));
                    $('#table_id').DataTable().ajax.reload(null, false);
                    wcmvp_count_ajax();
                    $(".wcmvp-add-product-div2").hide();
                    $("#wcmvp-image-preview").attr("src", "");
                    $("#wcmvp_product_id").val("");
                    $(".wcmvp_endsec").show();
                    $("#wcmvp-image_attachment_id").val("");
                    $("#wcmvp_product_name").val("");
                    $("#wcmvp_product_price").val("");
                    $("#wcmvp_discounted-price").val("");
                    $("#wcmvp_visibility").val("Visible");
                    $("#wcmvp_category").val("Uncategorized");
                    $("#wcmvp_product_tags").val("").change();
                    $("#wcmvp_description").val("");
                    $("#wcmvp-downloadable").removeAttr('checked');
                    $("#wcmvp-virtual").removeAttr('checked');
                    $("#wcmvp_stock_manage").removeAttr('checked');
                    $("#wcmvp_sku_field").val("");
                    $("#wcmvp_schedule_from").val("");
                    $("#wcmvp_schedule_to").val("");
                    $("#wcmvp_stock_status").val("instock");
                    $("#wcmvp_purchase_note_field").val("");
                    $("#wcmvp_product_reviews").removeAttr('checked');
                    $("#wcmvp_prod_download_file").html("");
                    $(".wcmvp_prod_download_limit").val("");
                    $(".wcmvp_prod_download_expiry").val("");
                    var wcmvp_extra = $(".wcmvp_product_data");
                    if (wcmvp_extra.length > 0) {
                        var wcmvp_obj = {};
                        $.each(wcmvp_extra, function (index, event) {
                            event.value = "";
                        });
                    }
                    $("#wcmvp_prod_exist").addClass("wcmvp_prod_new");
                    $("#wcmvp_prod_exist").removeClass("wcmvp_prod_already_exist");
                    if ($(document).find('#wcmvp-button').hasClass('wcmvp_popup')) {
                        $(document).find('.wcmvp-table').css('display', 'block');
                        $(document).find('.wcmvp_no_modal_add_prod').css('display', 'none');
                        $(document).find('.wcmvp_go_back').css('display', 'none');
                    }
                } else {
                    $('.notifyjs-wrapper').remove();
                    $.notify(response, { className: 'wcmvp_error', position: "right bottom" });
                }
            }, 'json');
        })

        /*   all product working   */

        /*    On clicking checkbox it selects all checkbox     */
        $(document).on('click', '#wcmvp_parent_table_bulk_check', function (e) {
            if ($("#wcmvp_parent_table_bulk_check").prop("checked")) {
                $(".wcmvp_table_bulk_check").prop("checked", true);
            } else {
                $(".wcmvp_table_bulk_check").prop("checked", false);
            }
        })

        /*    delete button on single product       */
        $(document).on('click', '.wcmvp_delete_button', function (e) {
            e.preventDefault();
            if (confirm(wcmvp_ajax_object.wcmvp_translation.wcmvp_trash_warning)) {
                var wcmvp_ID = $(this).attr("data-id");
                $(".wcmvp_loader").show();
                var data = {
                    'action': 'delete_product_ajax',
                    'wcmvp_prod_ID': wcmvp_ID,
                    'wcmvp_condition': "delete_permanent",
                    'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                };
                jQuery.post(
                    wcmvp_ajax_object.wcmvp_ajax_url,
                    data,
                    function (response) {
                        if(response){
                            $(".wcmvp_loader").hide();
                        }
                        if (response == "trashed successfully") {
                            wcmvp_count_ajax();
                            $('.notifyjs-wrapper').remove();
                            $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_trash_success, { className: 'wcmvp_success', position: "right bottom" });
                            setTimeout(function () { $('#table_id').DataTable().ajax.reload(null, false); }, 500);
                        } else if (response == "Deleted successfully") {
                            wcmvp_count_ajax();
                            $('.notifyjs-wrapper').remove();
                            $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_trash_success, { className: 'wcmvp_success', position: "right bottom" });
                            setTimeout(function () { $('#table_id').DataTable().ajax.reload(null, false); }, 500);
                        }
                    }, 'json')
            } else {
                return;
            }
        })

        /*        edit button on single product in Table                 */
        $(document).on('click', '.wcmvp_edit_button', function (e) {
            e.preventDefault();
            $(document).find("#wcmvp-add-product").trigger("click");
            $("#wcmvp_prod_exist").addClass("wcmvp_prod_already_exist");
            $("#wcmvp_prod_exist").removeClass("wcmvp_prod_new");
            $("#wcmvp_product_id").val($(this).attr("data-id"));
            var wcmvp_ID = $(this).attr("data-id");
            $(".wcmvp_loader").show();
            var data = {
                'action': 'edit_product_ajax',
                'wcmvp_data_ID': wcmvp_ID,
                'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            };
            jQuery.post(
                wcmvp_ajax_object.wcmvp_ajax_url,
                data,
                function (response) {
                    if(response){
                        $(".wcmvp_loader").hide();
                    }
                    $(document).trigger('wcmvp_edit_prod_req', response);
                    $("#wcmvp-image-preview").attr("src", response.temp_attach_src);
                    $("#wcmvp-image-preview").css("display", "block");
                    $("#wcmvp-image_attachment_id").val(response.temp_attach_id);
                    $("#wcmvp_product_name").val(response.temp_name).addClass('wcmvp_focus');
                    $("#wcmvp_product_price").val(response.temp_reg_price).addClass('wcmvp_focus');
                    $("#wcmvp_discounted-price").val(response.temp_sale_price).addClass('wcmvp_focus');
                    $("#wcmvp_category").val(response.temp_cat[0]).change();
                    $("#wcmvp_product_tags").val(response.wcmvp_temp_tag).change();
                    $("#wcmvp_description").val(response.temp_desc).addClass('wcmvp_focus');
                    tinyMCE.activeEditor.setContent(response.temp_short_desc);
                    if (response.wcmvp_is_downloadable) {
                        $("#wcmvp-downloadable").attr("checked", "true");
                    }
                    if ($(document).find("#wcmvp-downloadable").prop("checked")) {
                        $(document).find(".wcmvp_downloadable_box").show();
                    } else {
                        $(document).find(".wcmvp_downloadable_box").hide();
                    }
                    $.each(response.wcmvp_temp_downloadable, function (index, value) {
                        var wcmvp_push_html = ' <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">';
                        wcmvp_push_html += '<input type="text" name="wcmvp_file_name[]" class="wcmvp_prod_file_name mdc-text-field__input" value=' + value[0] + '>';
                        wcmvp_push_html += '<div class="mdc-notched-outline mdc-notched-outline--upgraded">';
                        wcmvp_push_html += '<div class="mdc-notched-outline__leading">'
                        wcmvp_push_html += '</div>';
                        wcmvp_push_html += '<div class="mdc-notched-outline__notch">';
                        wcmvp_push_html += '<span class="mdc-floating-label">' + wcmvp_ajax_object.wcmvp_translation.wcmvp_file_name + '</span>';
                        wcmvp_push_html += '</div>';
                        wcmvp_push_html += '<div class="mdc-notched-outline__trailing">';
                        wcmvp_push_html += '</div>';
                        wcmvp_push_html += '</div>';
                        wcmvp_push_html += '</label>';
                        var wcmvp_src_html = '<label class="mdc-text-field mdc-text-field--outlined wcmvp-prdct-price-label">';
                        wcmvp_src_html += '<input type="text" name="wcmvp_file_path[]" class="wcmvp_file_src mdc-text-field__input" placeholder="" value="' + value[1] + '"><input type="hidden" name="wcmvp-file_id" class="wcmvp-file_id" value="' + value[2] + '">';
                        wcmvp_src_html += '<div class="mdc-notched-outline mdc-notched-outline--upgraded">';
                        wcmvp_src_html += '<div class="mdc-notched-outline__leading"></div>';
                        wcmvp_src_html += '<div class="mdc-notched-outline__notch">';
                        wcmvp_src_html += '<span class="mdc-floating-label">' + wcmvp_ajax_object.wcmvp_translation.wcmvp_file_url + '</span>';
                        wcmvp_src_html += '</div><div class="mdc-notched-outline__trailing"></div>';
                        wcmvp_src_html += '</div></label>';
                        var wcmvp_del_html = '<button class="wcmvp_delete mdc-button mdc-button--raised wcmvp-footer-btn">' + wcmvp_ajax_object.wcmvp_translation.wcmvp_delete + '</button>';
                        var wcmvp_final_html = "<div><span>" + wcmvp_push_html + "</span><span>" + wcmvp_src_html + "</span><span>" + wcmvp_del_html + "</span></div>";
                        $(wcmvp_final_html).appendTo("#wcmvp_prod_download_file");
                    });
                    $("#wcmvp_sku_field").val(response.temp_sku).addClass('wcmvp_focus');
                    $("#wcmvp_stock_status").val(response.temp_stock_status).addClass('wcmvp_focus');
                    $(".wcmvp-dashboard-panel").hide();
                    $(".wcmvp-product-panel").show();
                    $(".wcmvp-orders-panel").hide();
                    $(".wcmvp-withdraw-panel").hide();
                    $(".wcmvp-Setting-panel").hide();
                    $(".wcmvp-payment-panel").hide();
                    $(".wcmvp-add-product-div").show();
                    $(document).find('.wcmvp_focus').each(function (a, b) {
                        $(this).siblings().addClass('mdc-notched-outline--notched');
                        $(this).siblings().children(".mdc-notched-outline__notch").children(".mdc-floating-label").addClass('mdc-floating-label--float-above');
                    })
                }, 'json')
        })

        $('#all').on('click', function () {
            table.page.len(-1).draw();
        });

        var rip = window.location.href;
        var wcmvp_link = rip.split("?");
        var wcmvp_withdraw_link = rip.split("#");
        var wcmvp_home = wcmvp_link[0].split("#");

        $(document).on("click", ".wcmvp-product", function () {
            var wcmvp_link_current = window.location.href;
            var wcmvp_withdraw_link = wcmvp_link_current.split("#");
            window.history.replaceState(null, null, wcmvp_home[0] + "#product");
            var wcmvp_prod_data_table;
            if (!$.fn.DataTable.isDataTable('#table_id')) {
                wcmvp_prod_data_table = $('#table_id').DataTable({
                    'processing': true,
                    'stateSave': true,
                    'info': false,
                    'sortable': true,
                    'serverSide': true,
                    "select": true,
                    'responsive': true,
                    'language': {
                        search: "_INPUT_",
                        searchPlaceholder: wcmvp_ajax_object.wcmvp_translation.wcmvp_search,
                        'processing':  "<div class=wcmvp_loader_box><img class='wcmvp_datatble_loader' src='"+wcmvp_ajax_object.wcmvp_translation.wcmvp_loader_gif+"' /></div>"
                    },
                    "drawCallback": function () {
                        $('.dataTables_filter input').addClass('wcmvp-input-search-field');
                        $('.dataTables_length select').addClass('wcmvp-select-box');
                        $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
                        $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");
                    },
                    'ajax': {
                        'url': wcmvp_ajax_object.wcmvp_ajax_url,
                        'data': {
                            'action': 'wcmvp_product_table',
                            'cond': 'all_prod',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "order": [[2, "asc"]],
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 1, 5, 8]
                    }]
                });
            }
            wcmvp_count_ajax();
            $(".wcmvp_div").removeClass("wcmvp-active");
            $(".wcmvp-product").addClass("wcmvp-active");
            $(document).find(".wcmvp_panel").css('display','none');
            $(".wcmvp_endsec").show();
            $(".wcmvp-product-panel").show();
            $(".wcmvp-dashboard-panel").hide();
            $(".wcmvp-orders-panel").hide();
            $(".wcmvp-withdraw-panel").hide();
            $(".wcmvp-Setting-panel").hide();
            $(".wcmvp-payment-panel").hide();
            $(".wcmvp-table").show();
            $(".wcmvp-add-product-div2").hide();
            $(".wcmvp-add-product-div").hide();
        });

        /*       All product button working         */
        $(document).on("click", "#wcmvp_all_product_table", function () {

            var rip = window.location.href;
            var wcmvp_link = rip.split("?");
            var wcmvp_page_detect = wcmvp_link[1];
            if (wcmvp_page_detect != undefined) {
                var wcmvp = $("#table_id").DataTable()
                wcmvp.state.clear();
                $("#table_id").dataTable().fnDestroy();
            }
            var wcmvp_prod_data_table;
            if (!$.fn.DataTable.isDataTable('#table_id')) {
                wcmvp_prod_data_table = $('#table_id').DataTable({
                    'processing': true,
                    'stateSave': true,
                    'info': false,
                    'sortable': true,
                    'serverSide': true,
                    "select": true,
                    'responsive': true,
                    'language': {
                        search: "_INPUT_",
                        searchPlaceholder: wcmvp_ajax_object.wcmvp_translation.wcmvp_search,
                        'processing':  "<div class=wcmvp_loader_box><img class='wcmvp_datatble_loader' src='"+wcmvp_ajax_object.wcmvp_translation.wcmvp_loader_gif+"' /></div>"
                    },
                    "drawCallback": function () {
                        $('.dataTables_filter input').addClass('wcmvp-input-search-field');
                        $('.dataTables_length select').addClass('wcmvp-select-box');
                        $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
                        $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");
                    },
                    'ajax': {
                        'url': wcmvp_ajax_object.wcmvp_ajax_url,
                        'data': {
                            'action': 'wcmvp_product_table',
                            'cond': 'all_prod',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "order": [[2, "asc"]],
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 1, 5, 8]
                    }]
                });
            }
            wcmvp_count_ajax();
            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_all_product_table").addClass("wcmvp_active_button");
            $(".wcmvp_div").removeClass("wcmvp-active");
            $(".wcmvp-product").addClass("wcmvp-active");
            $(".wcmvp-dashboard-panel").hide();
            $(".wcmvp-product-panel").show();
            $(".wcmvp-orders-panel").hide();
            $(".wcmvp-withdraw-panel").hide();
            $(".wcmvp-Setting-panel").hide();
            $(".wcmvp-payment-panel").hide();
            $(".wcmvp-add-product-div").hide();
            $(".wcmvp-add-product-div2").hide();
        })

        /*          end of functions of single table                     */

        /*          pending product table                                    */
        $("#wcmvp_pending_product_table").on('click', function () {
            var rip = window.location.href;
            var wcmvp_link = rip.split("?");
            var wcmvp_page_detect = wcmvp_link[1];
            if (wcmvp_page_detect != 'pending_product') {
                var wcmvp = $("#table_id").DataTable()
                wcmvp.state.clear();
                $("#table_id").dataTable().fnDestroy();
            }
            var wcmvp_prod_data_table;
            if (!$.fn.DataTable.isDataTable('#table_id')) {
                wcmvp_prod_data_table = $('#table_id').DataTable({
                    'processing': true,
                    'stateSave': true,
                    'info': false,
                    'sortable': true,
                    'serverSide': true,
                    "select": true,
                    'responsive': true,
                    'language': {
                        search: "_INPUT_",
                        searchPlaceholder: wcmvp_ajax_object.wcmvp_translation.wcmvp_search,
                        'processing':  "<div class=wcmvp_loader_box><img class='wcmvp_datatble_loader' src='"+wcmvp_ajax_object.wcmvp_translation.wcmvp_loader_gif+"' /></div>"
                    },
                    "drawCallback": function () {
                        $('.dataTables_filter input').addClass('wcmvp-input-search-field');
                        $('.dataTables_length select').addClass('wcmvp-select-box');
                        $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
                        $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");
                    },
                    'ajax': {
                        'url': wcmvp_ajax_object.wcmvp_ajax_url,
                        'data': {
                            'action': 'wcmvp_product_table',
                            'cond': 'pending_prod',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "order": [[2, "asc"]],
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 1, 5, 8]
                    }]
                });

            }
            $(".wcmvp-add-product-div2").hide();
            $(".wcmvp-add-product-div").hide();
            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_pending_product_table").addClass("wcmvp_active_button");
        })

        /*        published product tables               */

        $(document).on('click', "#wcmvp_published_product_table", function () {
            var rip = window.location.href;
            var wcmvp_link = rip.split("?");
            var wcmvp_page_detect = wcmvp_link[1];
            if (wcmvp_page_detect != 'published_product') {
                var wcmvp = $("#table_id").DataTable()
                wcmvp.state.clear();
                $("#table_id").dataTable().fnDestroy();
            }
            var wcmvp_prod_data_table;
            if (!$.fn.DataTable.isDataTable('#table_id')) {
                wcmvp_prod_data_table = $('#table_id').DataTable({
                    'processing': true,
                    'stateSave': true,
                    'info': false,
                    'sortable': true,
                    'serverSide': true,
                    "select": true,
                    'responsive': true,
                    'language': {
                        search: "_INPUT_",
                        searchPlaceholder: wcmvp_ajax_object.wcmvp_translation.wcmvp_search,
                        'processing':  "<div class=wcmvp_loader_box><img class='wcmvp_datatble_loader' src='"+wcmvp_ajax_object.wcmvp_translation.wcmvp_loader_gif+"' /></div>"
                    },
                    "drawCallback": function () {
                        $('.dataTables_filter input').addClass('wcmvp-input-search-field');
                        $('.dataTables_length select').addClass('wcmvp-select-box');
                        $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
                        $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");
                    },
                    'ajax': {
                        'url': wcmvp_ajax_object.wcmvp_ajax_url,
                        'data': {
                            'action': 'wcmvp_product_table',
                            'cond': 'published_prod',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "order": [[2, "asc"]],
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 1, 5, 8]
                    }]
                });

            }

            $(".wcmvp-add-product-div2").hide();
            $(".wcmvp-add-product-div").hide();
            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_published_product_table").addClass("wcmvp_active_button");
        })

        /*   trash product Section*/
        $(document).on('click', '.wcmvp_listing_button', function (e) {
            $(".wcmvp_restore_op").css("display", "none");
        })

        $(document).on('click', '.wcmvp-product', function (e) {
            $(".wcmvp_restore_op").css("display", "none");
        })

        $(document).on('click', '#wcmvp_trash_product_table', function (e) {
            $(".wcmvp_restore_op").css("display", "block");
        })

        $(document).on('click', '#wcmvp_parent_table_bulk_check', function (e) {
            if ($("#wcmvp_parent_table_bulk_check").prop("checked")) {
                $(".wcmvp_table_trash_bulk_check").prop("checked", true);
            } else {
                $(".wcmvp_table_trash_bulk_check").prop("checked", false);
            }
        })

        $(document).on("click", '#wcmvp_bulk_action', function () {
            var bulk = $(".wcmvp_table_bulk_check");
            var id_array = [];
            for (var i = 0; i < bulk.length; i++) {
                if ($(bulk[i]).prop("checked")) {
                    id_array.push(($(bulk[i]).attr("data-id")));
                }
            }

            if (($("#wcmvp_select_box").val() == "Delete_multiple") && $("#wcmvp_trash_product_table").hasClass("wcmvp_active_button")) {

                if (id_array.length != 0) {
                    $(".wcmvp_loader").show();
                    var data = {
                        'action': 'delete_product_bulk_ajax',
                        'wcmvp_prod_ID_array': id_array,
                        'wcmvp_cond': 'Delete_multiple',
                        'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                    };
                    jQuery.post(
                        wcmvp_ajax_object.wcmvp_ajax_url,
                        data,
                        function (response) {
                            if(response){
                                $(".wcmvp_loader").hide();
                            }
                            if (response == 1) {
                                $('.notifyjs-wrapper').remove();
                                $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_delete_success, { className: 'wcmvp_success', position: "right bottom" });
                                setTimeout(function () { wcmvp_count_ajax(); $('#table_id').DataTable().ajax.reload(null, false); }, 100);
                                return;
                            }
                        }, 'json')
                }
            } else if ($("#wcmvp_select_box").val() == "Delete_multiple") {
                if (id_array.length != 0) {
                    $(".wcmvp_loader").show();
                    var data = {
                        'action': 'delete_product_bulk_ajax',
                        'wcmvp_prod_ID_array': id_array,
                        'wcmvp_cond': 'Trash_multiple',
                        'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                    };
                    jQuery.post(
                        wcmvp_ajax_object.wcmvp_ajax_url,
                        data,
                        function (response) {
                            if(response){
                                $(".wcmvp_loader").hide();
                            }
                            if (response == 1) {
                                $('.notifyjs-wrapper').remove();
                                $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_trash_success, { className: 'wcmvp_success', position: "right bottom" });
                                setTimeout(function () { wcmvp_count_ajax(); $('#table_id').DataTable().ajax.reload(null, false); }, 500);
                                return;
                            }
                        })
                }
            } else if ($("#wcmvp_select_box").val() == "Restore_multiple") {
                if (id_array.length != 0) {
                    $(".wcmvp_loader").show();
                    var data = {
                        'action': 'delete_product_bulk_ajax',
                        'wcmvp_prod_ID_array': id_array,
                        'wcmvp_cond': 'Restore_multiple',
                        'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                    };
                    jQuery.post(
                        wcmvp_ajax_object.wcmvp_ajax_url,
                        data,
                        function (response) {
                            if(response){
                                $(".wcmvp_loader").hide();
                            }
                            if (response == 1) {
                                $('.notifyjs-wrapper').remove();
                                $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_restore_success, { className: 'wcmvp_success', position: "right bottom" });
                                setTimeout(function () { wcmvp_count_ajax(); $('#table_id').DataTable().ajax.reload(null, false); }, 500);
                                return;
                            }
                        })
                }
            }
        })

        /*     bulk action select box        */

        $(document).on('click', '.wcmvp_restore_button', function (e) {
            e.preventDefault();
            var wcmvp_ID = $(this).attr("data-id");
            $(".wcmvp_loader").show();
            var data = {
                'action': 'restore_prod_ajax',
                'wcmvp_data_ID': wcmvp_ID,
                'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            };
            jQuery.post(
                wcmvp_ajax_object.wcmvp_ajax_url,
                data,
                function (response) {
                    if(response){
                        $(".wcmvp_loader").hide();
                    }
                    if (response == "restore successfully") {
                        $('.notifyjs-wrapper').remove();
                        $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_restore_success, { className: 'wcmvp_success', position: "right bottom" });
                        setTimeout(function () { wcmvp_count_ajax(); $('#table_id').DataTable().ajax.reload(null, false); }, 1000);
                    }
                }, 'json')
        })

        $(document).on('click', '.wcmvp_trash_delete_button', function (e) {
            e.preventDefault();
            if (confirm("Are you sure you want to delete it permanently?")) {
                var wcmvp_ID = $(this).attr("data-id");
                $(".wcmvp_loader").show();
                var data = {
                    'action': 'delete_permanently_product_ajax',
                    'wcmvp_prod_ID': wcmvp_ID,
                    'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                };
                jQuery.post(
                    wcmvp_ajax_object.wcmvp_ajax_url,
                    data,
                    function (response) {
                        if(response){
                            $(".wcmvp_loader").hide();
                        }
                        if (response == "deleted successfully") {
                            $('.notifyjs-wrapper').remove();
                            $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_delete_success, { className: 'wcmvp_success', position: "right bottom" });
                            setTimeout(function () { wcmvp_count_ajax(); $('#table_id').DataTable().ajax.reload(null, false); }, 1000);

                        }
                    })
            } else {
                return;
            }
        })

        $(document).on('click', "#wcmvp_trash_product_table", function () {
            var rip = window.location.href;
            var wcmvp_link = rip.split("?");
            var wcmvp_page_detect = wcmvp_link[1];
            if (wcmvp_page_detect != 'trashed_product') {
                var wcmvp = $("#table_id").DataTable()
                wcmvp.state.clear();
                $("#table_id").dataTable().fnDestroy();
            }
            var wcmvp_prod_data_table;
            if (!$.fn.DataTable.isDataTable('#table_id')) {
                wcmvp_prod_data_table = $('#table_id').DataTable({
                    'processing': true,
                    'stateSave': true,
                    'info': false,
                    'sortable': true,
                    'serverSide': true,
                    "select": true,
                    'responsive': true,
                    'language': {
                        search: "_INPUT_",
                        searchPlaceholder: wcmvp_ajax_object.wcmvp_translation.wcmvp_search,
                        'processing':  "<div class=wcmvp_loader_box><img class='wcmvp_datatble_loader' src='"+wcmvp_ajax_object.wcmvp_translation.wcmvp_loader_gif+"' /></div>"
                    },
                    "drawCallback": function () {
                        $('.dataTables_filter input').addClass('wcmvp-input-search-field');
                        $('.dataTables_length select').addClass('wcmvp-select-box');
                        $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
                        $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");
                    },
                    'ajax': {
                        'url': wcmvp_ajax_object.wcmvp_ajax_url,
                        'data': {
                            'action': 'wcmvp_product_table',
                            'cond': 'trash_prod',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "order": [[2, "asc"]],
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 1, 5, 8]
                    }]
                });

            }
            $(".wcmvp-add-product-div2").hide();
            $(".wcmvp-add-product-div").hide();
            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_trash_product_table").addClass("wcmvp_active_button");
        })



        $(document).on('click', "#wcmvp_product_filter", function () {
            var wcmvp_date = $("#wcmvp_archieve_filter option:selected").text();
            if ($("#wcmvp_published_product_table").hasClass("wcmvp_active_button")) {
                var wcmvp_cond = "published_prod";
            } else if ($("#wcmvp_pending_product_table").hasClass("wcmvp_active_button")) {
                var wcmvp_cond = "pending_prod";
            } else if ($("#wcmvp_trash_product_table").hasClass("wcmvp_active_button")) {
                var wcmvp_cond = "trash_prod";
            } else {
                var wcmvp_cond = "all_prod";
            }
            var wcmvp_filter_cat = $("#wcmvp_filter_cat").val();
            var wcmvp = $("#table_id").DataTable()
            wcmvp.state.clear();
            $("#table_id").dataTable().fnDestroy();

            var wcmvp_prod_data_table;
            if (!$.fn.DataTable.isDataTable('#table_id')) {
                wcmvp_prod_data_table = $('#table_id').DataTable({
                    'processing': true,
                    'stateSave': true,
                    'info': false,
                    'sortable': true,
                    'serverSide': true,
                    "select": true,
                    'responsive': true,
                    'language': {
                        search: "_INPUT_",
                        searchPlaceholder: wcmvp_ajax_object.wcmvp_translation.wcmvp_search,
                        'processing':  "<div class=wcmvp_loader_box><img class='wcmvp_datatble_loader' src='"+wcmvp_ajax_object.wcmvp_translation.wcmvp_loader_gif+"' /></div>"
                    },
                    "drawCallback": function () {
                        $('.dataTables_filter input').addClass('wcmvp-input-search-field');
                        $('.dataTables_length select').addClass('wcmvp-select-box');
                        $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
                        $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");
                    },
                    'ajax': {
                        'url': wcmvp_ajax_object.wcmvp_ajax_url,
                        'data': {
                            'action': 'wcmvp_product_table',
                            'wcmvp_date': wcmvp_date,
                            'cond': wcmvp_cond,
                            'wcmvp_cat_filter': wcmvp_filter_cat,
                            'wcmvp_filter': true,
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "order": [[2, "asc"]],
                    columnDefs: [{
                        orderable: false,
                        targets: [0, 1, 5, 8]
                    }]
                });
            }
        })
    })
})(jQuery);