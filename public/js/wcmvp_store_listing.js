(function ($) {
    'use strict';
    $(document).on('ready', function () {

        if ($.fn.googleMap) {
            if($('html').hasClass("wcmvp_store_list_map")){
                $(".wcmvp_store_list_map").googleMap({
                    zoom: 10,
                    coords: [48.895651, 2.290569], 
                    type: "ROADMAP"
                });
            }
        }
        if($.fn.mapbox){
            if($('html').hasClass("wcmvp_store_list_map")){
                L.mapbox.accessToken = $(document).find(".wcmvp_store_list_map").attr("data-value");
                var map = L.mapbox.map('map')
                .setView([40, -74.50], 9)
                .addLayer(L.mapbox.styleLayer('mapbox://styles/mapbox/streets-v11'));
            }
       }

       $(document).find("#wcmvp_show_filter").on("click", function () {
        $(".wcmvp_filter_fields").show();
    })

       if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    $(document).find("#wcmvp_select_filter").on("change", function () {

        var wcmvp_select_val = $(this).val();
        var wcmvp_current_link = window.location.href;
        var wcmvp_query = wcmvp_current_link.split("?");

        if (wcmvp_select_val == "wcmvp_most_pop") {

            if (wcmvp_query[1] != "wcmvp_most_pop") {

                window.location.assign(window.location.href + "?wcmvp_most_pop=1");

            }

        } else if (wcmvp_select_val == "wcmvp_most_recent") {

            window.location.assign(wcmvp_query[0]);
        }

    })

    $(document).find(".wcmvp_grid_button").on("click", function () {


        $(document).find(".wcmvp_looks_buttons").removeClass('wcmvp_current_active');
        $(this).addClass('wcmvp_current_active');
        $(document).find(".wcmvp_grid_look").removeClass('wcmvp_display');
        $(".wcmvp_row_look").addClass('wcmvp_display');

        var data = {
            'action': 'store_listing_preview',
            'wcmvp_looks': 'grid_view',
            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
        };
        jQuery.post(wcmvp_ajax_object.wcmvp_ajax_url, data, function (response) { }, 'json');
    })

    $(document).find(".wcmvp_row_button").on("click", function () {
        $(document).find(".wcmvp_looks_buttons").removeClass('wcmvp_current_active');
        $(this).addClass('wcmvp_current_active');
        $(document).find(".wcmvp_row_look").removeClass('wcmvp_display');
        $(".wcmvp_grid_look").addClass('wcmvp_display');

        var data = {
            'action': 'store_listing_preview',
            'wcmvp_looks': 'row_view',
            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
        };
        jQuery.post(wcmvp_ajax_object.wcmvp_ajax_url, data, function (response) { }, 'json');

    })
    
})
})(jQuery);