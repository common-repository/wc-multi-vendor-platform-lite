(function ($) {
    'use strict';
    $(document).on('ready', function () {
        if($(document).find("#secondary").hasClass("widget-area")){
            $(document).find(".wcmvp-d-flex").css("width","75%");
            $(document).find(".wcmvp-prdct-row").css("width","100%"); 
            $(document).find(".wcmvp-prdct-box").css("width","50%");
        }else{
            $(document).find(".wcmvp-d-flex").css("width","100%");
            $(document).find(".wcmvp-prdct-row").css("width","100%"); 
        }
        var wcmvp_element_obj = $(document).find(".cat-item");
        var wcmvp_url = window.location.href;

        var wcmvp_html = $(".cat-item-" + wcmvp_url.split("/")[6]).text();
        if (wcmvp_url.split("/")[6] != NaN) {
            $(".cat-item-" + wcmvp_url.split("/")[6]).addClass("wcmvp_active_category");
        }

        if ($.fn.googleMap) {
            $(".wcmvp_map").googleMap({
                zoom: 10, 
                coords: [48.895651, 2.290569], 
                type: "ROADMAP"
            });
            $(".wcmvp_map_box").show(); 
        }
        if ($.fn.mapbox) {
            L.mapbox.accessToken = $(document).find(".wcmvp_map_box").attr("data-value");
            var map = L.mapbox.map('map')
                .setView([40, -74.50], 9)
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));
                $(".wcmvp_map_box").show();
            }

        $(document).find("#wcmvp_endpoint_submit").on("click", function () {
            var wcmvp_user_name = $(document).find("#wcmvp_user_name").val();
            var wcmvp_user_email = $(document).find("#wcmvp_user_email_id").val();
            var wcmvp_user_message = $(document).find("#wcmvp_user_message").val();
            var wcmvp_current_vendor_id = $(this).attr("data-id");
            $(".wcmvp_loader").show();
            var data = {
                'action': 'wcmvp_endpoint_email',
                'wcmvp_user_name': wcmvp_user_name,
                'wcmvp_user_email': wcmvp_user_email,
                'wcmvp_user_message': wcmvp_user_message,
                'wcmvp_current_vendor_id': wcmvp_current_vendor_id,
                'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            };
            jQuery.post(wcmvp_ajax_object.wcmvp_ajax_url, data, function (response) {
                if(response){
                    $(".wcmvp_loader").hide();
                }
                if (response == "Sent successfully") {
                    $(document).find(".wcmvp_notify").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_sent_successfull);
                    $(document).find(".wcmvp_notify").fadeIn();
                    setTimeout(function () { $(document).find(".wcmvp_notify").fadeOut(); }, 1000);
                    $(document).find("#wcmvp_user_message").val("");
                } else {
                    $(document).find(".wcmvp_notify").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_try_again);
                    $(document).find(".wcmvp_notify").fadeIn();
                    setTimeout(function () { $(document).find(".wcmvp_notify").fadeOut(); }, 1000);
                }
            }, 'json');
        })
        $(document).on("click", ".cat-item", function (e) {
            e.preventDefault();
            var wcmvp_cat = $(this).attr("class");
            var page = wcmvp_cat.split("-")[3];
            var url = $("#wcmvp_url_path").attr("data-value");
            window.location.replace(url + "/" + page);
            e.stopPropagation();
        })
    })
})(jQuery);