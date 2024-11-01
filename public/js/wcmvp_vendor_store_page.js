(function ($) {
    'use strict';
    $(document).ready( function () {

        if($.fn.timepicker){
            $('.wcmvp_timing_input').timepicker();
        }

        $(document).on("click", ".wcmvp_banner_remove_button", function () {
            $(".wcmvp_banner_remove").hide();
            $("#wcmvp_store_upload_button").text(wcmvp_ajax_object.wcmvp_translation.wcmvp_upload_banner);
            $('#wcmvp_store_img_preview').attr('src', "" ).css('width', '100%');
            $('#wcmvp_store_img_preview').css('height', '100%');
                $('#wcmvp_store_img_id').val("");
        })

        var wcmvp_files_fram;
        var wcmvp_attachment;
        var wp_media_post_id;
        var set_to_post_id = $("#wcmvp-upload_image_button").attr("data-id"); 
        jQuery(document).on('click', '#wcmvp_store_upload_button', function (event) {
            event.preventDefault();
            if (wcmvp_files_fram) {
                wcmvp_files_fram.uploader.uploader.param('post_id', set_to_post_id);
                wcmvp_files_fram.open();
                return;
            } else {
                wp.media.model.settings.post.id = set_to_post_id;
            }
           
            wcmvp_files_fram = wp.media.frames.wcmvp_files_fram = wp.media({
                title: wcmvp_ajax_object.wcmvp_translation.wcmvp_select_img,
                button: {
                    text: wcmvp_ajax_object.wcmvp_translation.wcmvp_use_this_img,
                },
                multiple: false	
            });
          
            wcmvp_files_fram.on('select', function () {
                $("#wcmvp_store_img_preview").show();
                $(".wcmvp_banner_remove").show();
                $("#wcmvp_store_upload_button").text(wcmvp_ajax_object.wcmvp_translation.wcmvp_change_banner);
                wcmvp_attachment = wcmvp_files_fram.state().get('selection').first().toJSON();
                $('#wcmvp_store_img_preview').attr('src', wcmvp_attachment.url ).css('width', 'auto');
                $('#wcmvp_store_img_id').val(wcmvp_attachment.id);
                wp.media.model.settings.post.id = wp_media_post_id;
            });
            wcmvp_files_fram.open();
        });
        jQuery('a.add_media').on('click', function () {
            wp.media.model.settings.post.id = wp_media_post_id;
        });

        $(document).on("click", "#wcmvp_show_time_widget", function () {
            if ($(document).find("#wcmvp_show_time_widget").prop('checked')) {
                $(document).find(".wcmvp_days_box").css("display", "block");
                $(document).find(".wcmvp_notice_row").show();
                $("#wcmvp_timming_modal").addClass("wcmvp-modal-open");
                $("body").css("overflow","hidden");
            } else {
                $(document).find(".wcmvp_days_box").css("display", "none");
                $(document).find(".wcmvp_notice_row").hide();
            }
        })

        if ($(document).find("#wcmvp_show_time_widget").prop("checked")) {
            $(document).find(".wcmvp_days_box").css("display", "block");
            $(document).find(".wcmvp_notice_row").show();
        }

        if ($(document).find("#wcmvp_sunday").val() == "close") {
            $(document).find("#wcmvp_sunday").next().hide();
        }
        if ($(document).find("#wcmvp_monday").val() == "close") {
            $(document).find("#wcmvp_monday").next().hide();
        }
        if ($(document).find("#wcmvp_tuesday").val() == "close") {
            $(document).find("#wcmvp_tuesday").next().hide();
        }
        if ($(document).find("#wcmvp_wednesday").val() == "close") {
            $(document).find("#wcmvp_wednesday").next().hide();
        }
        if ($(document).find("#wcmvp_thursday").val() == "close") {
            $(document).find("#wcmvp_thursday").next().hide();
        }
        if ($(document).find("#wcmvp_friday").val() == "close") {
            $(document).find("#wcmvp_friday").next().hide();
        }
        if ($(document).find("#wcmvp_saturday").val() == "close") {
            $(document).find("#wcmvp_saturday").next().hide();
        }

        $(document).on("change", "#wcmvp_sunday", function () {
            if ($(this).val() == 'open') {
                $(document).find(this).next().show();
            } else {
                $(document).find(this).next().hide();
            }
        })
        $(document).on("change", "#wcmvp_monday", function () {
            if ($(this).val() == 'open') {
                $(document).find(this).next().show();
            } else {
                $(document).find(this).next().hide();
            }
        })
        $(document).on("change", "#wcmvp_tuesday", function () {
            if ($(this).val() == 'open') {
                $(document).find(this).next().show();
            } else {
                $(document).find(this).next().hide();
            }
        })
        $(document).on("change", "#wcmvp_wednesday", function () {
            if ($(this).val() == 'open') {
                $(document).find(this).next().show();
            } else {
                $(document).find(this).next().hide();
            }
        })
        $(document).on("change", "#wcmvp_thursday", function () {
            if ($(this).val() == 'open') {
                $(document).find(this).next().show();
            } else {
                $(document).find(this).next().hide();
            }
        })
        $(document).on("change", "#wcmvp_friday", function () {
            if ($(this).val() == 'open') {
                $(document).find(this).next().show();
            } else {
                $(document).find(this).next().hide();
            }
        })
        $(document).on("change", "#wcmvp_saturday", function () {
            if ($(this).val() == 'open') {
                $(document).find(this).next().show();
            } else {
                $(document).find(this).next().hide();
            }
        })

        if ($.fn.googleMap) {
            if($('html').hasClass("wcmvp_vendor_map")){
                $(".wcmvp_vendor_map").googleMap({
                    zoom: 10, 
                    coords: [48.895651, 2.290569], 
                    type: "ROADMAP"
                });
            }
        }

        if($.fn.mapbox){
            if($('html').hasClass("wcmvp_vendor_map")){
                L.mapbox.accessToken = '<your access token here>';
                var map = L.mapbox.map('map')
                .setView([40, -74.50], 9)
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));
            }
     }


     $(document).on("click", ".wcmvp_profile_remove_button", function () {
        $(".wcmvp_profile_remove").hide();
        $("#wcmvp_profile_upload_button").text(wcmvp_ajax_object.wcmvp_translation.wcmvp_upload_profile);
                $('#wcmvp_profile_img_preview').attr('src', "");
                $('#wcmvp_profile_img_id').val("");
    })

     var wcmvp_profile_files_fram;
     var wcmvp_profile_attachment;
        var wp_media_profile_post_id; 
        var set_to_post_id = $("#wcmvp_profile_img_id").attr("data-id"); 
        jQuery(document).on('click', '#wcmvp_profile_upload_button', function (event) {
            event.preventDefault();
            if (wcmvp_profile_files_fram) {
                wcmvp_profile_files_fram.uploader.uploader.param('post_id', set_to_post_id);
                wcmvp_profile_files_fram.open();
                return;
            } else {
                wp.media.model.settings.post.id = set_to_post_id;
            }
        
            wcmvp_profile_files_fram = wp.media.frames.wcmvp_profile_files_fram = wp.media({
                title: wcmvp_ajax_object.wcmvp_translation.wcmvp_select_img,
                button: {
                    text: wcmvp_ajax_object.wcmvp_translation.wcmvp_use_this_img,
                },
                multiple: false
            });
         
            wcmvp_profile_files_fram.on('select', function () {

                $("#wcmvp_profile_img_preview").show();
                $("#wcmvp_profile_upload_button").text(wcmvp_ajax_object.wcmvp_translation.wcmvp_change_profile);
                $(".wcmvp_profile_remove").show();
                wcmvp_profile_attachment = wcmvp_profile_files_fram.state().get('selection').first().toJSON();
                $('#wcmvp_profile_img_preview').attr('src', wcmvp_profile_attachment.url).css('width', 'auto');
                $('#wcmvp_profile_img_id').val(wcmvp_profile_attachment.id);
                wp.media.model.settings.post.id = wp_media_profile_post_id;
            });
            wcmvp_profile_files_fram.open();
        });
        jQuery('a.add_media').on('click', function () {
            wp.media.model.settings.post.id = wp_media_profile_post_id;
        });

        $(document).on("click", "#wcmvp_store_submit", function () {
            var wcmvp_banner_id = $("#wcmvp_store_img_id").val();
            var wcmvp_profile_id = $("#wcmvp_profile_img_id").val();
            var wcmvp_ID = $("#wcmvp_store_submit").attr("data-id");
            var wcmvp_ppp = $("#wcmvp_store_ppp").val();
            var wcmvp_street = $("#wcmvp_address_one").val();
            var wcmvp_street2t = $("#wcmvp_address_two").val();
            var wcmvp_city = $("#wcmvp_address_city").val();
            var wcmvp_post_zip = $("#wcmvp_address_zip").val();
            var wcmvp_country = $("#wcmvp_country").val();
            var wcmvp_state = $("#wcmvp_calc_shipping_state").val();
            var wcmvp_phone = $("#wcmvp_vendor_phone").val();
            if ($("#wcmvp_show_email").prop('checked')) {
                var wcmvp_show_email = 1;
            }
            else {
                var wcmvp_show_email = 0;
            }
            if ($("#wcmvp_show_more_tab").prop('checked')) {
                var wcmvp_show_more_tab = 1;
            }
            else {
                var wcmvp_show_more_tab = 0;
            }
            var wcmvp_map_api_key = $("#wcmvp_map_api_key").val();
            if ($("#wcmvp_show_time_widget").prop('checked')) {
                var wcmvp_show_time_widget = 1;
            }
            else {
                var wcmvp_show_time_widget = 0;
            }
            var wcmvp_sunday = $("#wcmvp_sunday").val();
            var wcmvp_sunday_open_time = $("#wcmvp_sunday_open_time").val();
            var wcmvp_sunday_close_time = $("#wcmvp_sunday_close_time").val();
            var wcmvp_monday = $("#wcmvp_monday").val();
            var wcmvp_monday_open_time = $("#wcmvp_monday_open_time").val();
            var wcmvp_monday_close_time = $("#wcmvp_monday_close_time").val();
            var wcmvp_tuesday = $("#wcmvp_tuesday").val();
            var wcmvp_tuesday_open_time = $("#wcmvp_tuesday_open_time").val();
            var wcmvp_tuesday_close_time = $("#wcmvp_tuesday_close_time").val();
            var wcmvp_wednesday = $("#wcmvp_wednesday").val();
            var wcmvp_wednesday_open_time = $("#wcmvp_wednesday_open_time").val();
            var wcmvp_wednesday_close_time = $("#wcmvp_wednesday_close_time").val();
            var wcmvp_thursday = $("#wcmvp_thursday").val();
            var wcmvp_thursday_open_time = $("#wcmvp_thursday_open_time").val();
            var wcmvp_thursday_close_time = $("#wcmvp_thursday_close_time").val();
            var wcmvp_friday = $("#wcmvp_friday").val();
            var wcmvp_friday_open_time = $("#wcmvp_friday_open_time").val();
            var wcmvp_friday_close_time = $("#wcmvp_friday_close_time").val();
            var wcmvp_saturday = $("#wcmvp_saturday").val();
            var wcmvp_saturday_open_time = $("#wcmvp_saturday_open_time").val();
            var wcmvp_saturday_close_time = $("#wcmvp_saturday_close_time").val();
            var wcmvp_store_open_notice = $("#wcmvp_store_open_notice").val();
            var wcmvp_store_close_notice = $("#wcmvp_store_close_notice").val();
            var wcmvp_extra = $(".wcmvp_store_extra_field");
           if(wcmvp_extra.length>0){
             var wcmvp_obj={};
            $.each(wcmvp_extra, function(index,event) {
             wcmvp_obj[event.name]=event.value;
             });
             }
             var wcmvp_multiple_select = $(document).find(".wcmvp_store_multiple_data");
             if (wcmvp_multiple_select.length > 0) {
                var extra_multi_data = {};
                $.each(wcmvp_multiple_select, function (index, event) {
                    extra_multi_data[event.name] = getSelectValues(event);
                });
            }
            var wcmvp_image_src = $(".wcmvp_store_image_src");
            if (wcmvp_image_src.length > 0) {
                var wcmvp_image_src_path = {};
                $.each(wcmvp_image_src, function (index, event) {
                    wcmvp_image_src_path[event.name] = event.src;
                });
            }
             var wcmvp_extra_check = $(".wcmvp_store_checkbox");
             if(wcmvp_extra_check.length>0){
               var wcmvp_check_obj={};
              $.each(wcmvp_extra_check, function(index,event) {
                wcmvp_check_obj[event.name]= $("#"+event.id).is(":checked");
               });
               }
            var data = {
                'action': 'wcmvp_store_setting',
                'wcmvp_vendor_id': wcmvp_ID,
                'wcmvp_banner_id': wcmvp_banner_id,
                'wcmvp_profile_id':wcmvp_profile_id,
                'wcmvp_ppp': wcmvp_ppp,
                'wcmvp_street': wcmvp_street,
                'wcmvp_street2t': wcmvp_street2t,
                'wcmvp_city': wcmvp_city,
                'wcmvp_post_zip': wcmvp_post_zip,
                'wcmvp_country': wcmvp_country,
                'wcmvp_state': wcmvp_state,
                'wcmvp_phone': wcmvp_phone,
                'wcmvp_show_email': wcmvp_show_email,
                'wcmvp_show_more_tab': wcmvp_show_more_tab,
                'wcmvp_map_api_key': wcmvp_map_api_key,
                'wcmvp_show_time_widget': wcmvp_show_time_widget,
                'wcmvp_sunday': wcmvp_sunday,
                'wcmvp_sunday_open_time': wcmvp_sunday_open_time,
                'wcmvp_sunday_close_time': wcmvp_sunday_close_time,
                'wcmvp_monday': wcmvp_monday,
                'wcmvp_monday_open_time': wcmvp_monday_open_time,
                'wcmvp_monday_close_time': wcmvp_monday_close_time,
                'wcmvp_tuesday': wcmvp_tuesday,
                'wcmvp_tuesday_open_time': wcmvp_tuesday_open_time,
                'wcmvp_tuesday_close_time': wcmvp_tuesday_close_time,
                'wcmvp_wednesday': wcmvp_wednesday,
                'wcmvp_wednesday_open_time': wcmvp_wednesday_open_time,
                'wcmvp_wednesday_close_time': wcmvp_wednesday_close_time,
                'wcmvp_thursday': wcmvp_thursday,
                'wcmvp_thursday_open_time': wcmvp_thursday_open_time,
                'wcmvp_thursday_close_time': wcmvp_thursday_close_time,
                'wcmvp_friday': wcmvp_friday,
                'wcmvp_friday_open_time': wcmvp_friday_open_time,
                'wcmvp_friday_close_time': wcmvp_friday_close_time,
                'wcmvp_saturday': wcmvp_saturday,
                'wcmvp_saturday_open_time': wcmvp_saturday_open_time,
                'wcmvp_saturday_close_time': wcmvp_saturday_close_time,
                'wcmvp_store_open_notice': wcmvp_store_open_notice,
                'wcmvp_store_close_notice': wcmvp_store_close_notice,
                'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            };
            if(wcmvp_extra.length>0){
             var data={...wcmvp_obj,...data};
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
            jQuery.post(
                wcmvp_ajax_object.wcmvp_ajax_url,
                data,
                function (response) {
                    if (response == "successfull") {
                        $('.notifyjs-wrapper').remove();
                        $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_success, { className: 'wcmvp_success', position: "right bottom" });
                    }
                },"json")
        })
})


})(jQuery);