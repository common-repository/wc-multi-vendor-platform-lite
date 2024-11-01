(function ($) {
    'use strict';
    $(document).on('ready', function () {

        var rip = window.location.href;
        var wcmvp_link = rip.split("?");
        var wcmvp_withdraw_link = rip.split("#");
        var wcmvp_home = wcmvp_link[0].split("#");

        $(document).on("click", "#wcmvp_filter_order", function () {
            if ($("#wcmvp_order_complete_button").hasClass("wcmvp_active_button")) {
                var wcmvp_cond = "complete_table";
            } else if ($("#wcmvp_order_processing_button").hasClass("wcmvp_active_button")) {
                var wcmvp_cond = "processing_table";
            } else if ($("#wcmvp_order_On_hold_button").hasClass("wcmvp_active_button")) {
                var wcmvp_cond = "On_hold_table";
            } else if ($("#wcmvp_order_Pending_button").hasClass("wcmvp_active_button")) {
                var wcmvp_cond = "pending_table";
            } else if ($("#wcmvp_order_Cancelled_button").hasClass("wcmvp_active_button")) {
                var wcmvp_cond = "cancel_table";
            } else if ($("#wcmvp_order_Refunded_button").hasClass("wcmvp_active_button")) {
                var wcmvp_cond = "refunded_table";
            } else if ($("#wcmvp_order_Failed_button").hasClass("wcmvp_active_button")) {
                var wcmvp_cond = "failed_table";
            } else {
                var wcmvp_cond = "All_table";
            }
            var wcmvp_date = $(".wcmvp_order_filter_date").val();

            var wcmvp_customer = $('.wcmvp_order_filter_cust').val();

            var wcmvp = $("#wcmvp-order-all-table-id").DataTable()
            wcmvp.state.clear();
            $("#wcmvp-order-all-table-id").dataTable().fnDestroy();
            var wcmvp_order_data_table;
            if (!$.fn.DataTable.isDataTable('#wcmvp-order-all-table-id')) {
                wcmvp_order_data_table = $('#wcmvp-order-all-table-id').DataTable({
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
                            'action': 'wcmvp_order_all_table',
                            'cond': wcmvp_cond,
                            'wcmvp_date': wcmvp_date,
                            'wcmvp_customer': wcmvp_customer,
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "columnDefs": [{
                        "targets": [0, 6],
                        "orderable": false,
                    }
                    ],
                    "order": [1, 'asc']
                });
            }
        })

        /*        working of all orders page                               */
        $(document).on("click", "#wcmvp_bulk_button", function () {
            var wcmvp_action = $("#wcmvp_bulk_action_order_check").val();
            var bulk = $(".wcmvp_order_bulk_check");
            var id_array = [];
            for (var i = 0; i < bulk.length; i++) {
                if ($(bulk[i]).prop("checked")) {
                    id_array.push(($(bulk[i]).attr("data-id")));
                }
            }
            $(".wcmvp_loader").show();
            var data = {
                'action': 'status_change_ajax',
                'status': wcmvp_action,
                'wcmvp_order_id': id_array,
                'wcmvp_order_cond': 'bulk',
                'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            };
            jQuery.post(
                wcmvp_ajax_object.wcmvp_ajax_url,
                data,
                function (response) {
                    if(response){
                        $(".wcmvp_loader").hide();
                    }
                    if (response == "success") {
                        $('.notifyjs-wrapper').remove();
                        $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_success, { className: 'wcmvp_success', position: "right bottom" });

                        setTimeout(function () {
                            wcmvp_count_ajax();
                            $('#wcmvp-order-all-table-id').DataTable().ajax.reload(null, false);
                            $("#wcmvp_order_all_table_bulk_action").prop("checked", false);
                        }, 100);

                    } else {
                        $('.notifyjs-wrapper').remove();
                        $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_unsuccessfull, { className: 'wcmvp_error', position: "right bottom" });
                    }
                }, 'json')
        })


        $(document).on('click', '#wcmvp_order_all_table_bulk_action', function (e) {
            if ($("#wcmvp_order_all_table_bulk_action").prop("checked")) {
                $(".wcmvp_order_bulk_check").prop("checked", true);
            } else {
                $(".wcmvp_order_bulk_check").prop("checked", false);
            }
        })


        $(document).on('click', '.wcmvp_order_view', function (e) {
            e.preventDefault();
            $(".wcmvp_order_modal").addClass("wcmvp-modal-open");
            $("body").css("overflow","hidden");
            var wcmvp_ids = $(this).attr("data-id");
            $(".wcmvp_loader").show();
            var data = {
                'action': 'view_order_full_details',
                'wcmvp_order_id': wcmvp_ids,
                'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            };
            jQuery.post(
                wcmvp_ajax_object.wcmvp_ajax_url,
                data,
                function (response) {
                    if(response){
                        $(".wcmvp_loader").hide();
                    }
                    if (!response) {
                        alert(wcmvp_ajax_object.wcmvp_translation.wcmvp_prod_deleted);
                    }
                    var i;
                    var wcmvp_display = "";
                    for (i = 0; i < response[0].length; i++) {
                        wcmvp_display += "<tr><td><img src='" + response[2][i] + "' class='wcmvp_order_prod_image'>";
                        wcmvp_display += "<span class='wcmvp-td-span'>" + response[0][i] + "</span>" + response[4] + "</td><td></td>";
                        wcmvp_display += "<td>" + response[1][i] + "</td>";
                        wcmvp_display += "<td>" + response[3][i] + "</td></tr>";
                    }
                    $("#wcmvp_order_item_detail").html(wcmvp_display);
                    $("#wcmvp_subtotal").html(response[5]);
                    $("#wcmvp_shippings").html(response[6]);
                    $("#wcmvp_payment_methods").html(response[7]);
                    $("#wcmvp_total").html(response[8]);
                    $("#wcmvp_billing_details").html(response[9]);
                    $("#wcmvp_shipping_details").html(response[10]);
                    $("#wcmvp_order_status").html(response[11]);
                    $("#wcmvp_order_date").html(response[12]);
                    $("#wcmvp_order_earning").html(response[13]);
                    $("#wcmvp_customer_name").html(response[14]);
                    $("#wcmvp_customer_email").html(response[15]);
                    $("#wcmvp_phone").html(response[16]);
                    $("#wcmvp_customer_ip").html(response[17]);
                }, 'json')
        })

        $(document).on('click', '.wcmvp_order_complete', function (e) {
            e.preventDefault();
            var wcmvp_ids = $(this).attr("data-id");
            $(".wcmvp_loader").show();
            var data = {
                'action': 'status_change_ajax',
                'wcmvp_order_id': wcmvp_ids,
                'wcmvp_order_cond': 'complete',
                'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            };
            jQuery.post(
                wcmvp_ajax_object.wcmvp_ajax_url,
                data,
                function (response) {
                    if(response){
                        $(".wcmvp_loader").hide();
                    }
                    if (response == "success") {
                        $('.notifyjs-wrapper').remove();
                        $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_success, { className: 'wcmvp_success', position: "right bottom" });
                        setTimeout(function () {
                            wcmvp_count_ajax();
                            $('#wcmvp-order-all-table-id').DataTable().ajax.reload(null, false)
                        }, 1000);
                    } else {
                        $('.notifyjs-wrapper').remove();
                        $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_unsuccessfull, { className: 'wcmvp_error', position: "right bottom" });
                    }
                }, 'json')
        })

        $(document).on('click', '.wcmvp_order_processing', function (e) {
            e.preventDefault();
            var wcmvp_ids = $(this).attr("data-id");
            $(".wcmvp_loader").show();
            var data = {
                'action': 'status_change_ajax',
                'wcmvp_order_id': wcmvp_ids,
                'wcmvp_order_cond': 'processing',
                'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            };
            jQuery.post(
                wcmvp_ajax_object.wcmvp_ajax_url,
                data,
                function (response) {
                    if(response){
                        $(".wcmvp_loader").hide();
                    }
                    if (response == "success") {
                        $('.notifyjs-wrapper').remove();
                        $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_success, { className: 'wcmvp_success', position: "right bottom" });
                        wcmvp_count_ajax();
                        $('#wcmvp-order-all-table-id').DataTable().ajax.reload(null, false);
                    }
                    else {
                        $('.notifyjs-wrapper').remove();
                        $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_unsuccessfull, { className: 'wcmvp_error', position: "right bottom" });
                    }
                }, 'json')
        })


        $(document).on("click", "#wcmvp_order_all_button", function () {
            var rip = window.location.href;
            var wcmvp_link = rip.split("?");
            var wcmvp_page_detect = wcmvp_link[0];
            window.history.replaceState(null, null, wcmvp_page_detect);
            if (wcmvp_page_detect != undefined) {
                var wcmvp = $("#wcmvp-order-all-table-id").DataTable()
                wcmvp.state.clear();
                $("#wcmvp-order-all-table-id").dataTable().fnDestroy();
            }
            var wcmvp_order_data_table;
            if (!$.fn.DataTable.isDataTable('#wcmvp-order-all-table-id')) {
                wcmvp_order_data_table = $('#wcmvp-order-all-table-id').DataTable({
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
                            'action': 'wcmvp_order_all_table',
                            'cond': 'All_table',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "columnDefs": [{
                        "targets": [0, 6],
                        "orderable": false,
                    }
                    ],
                    "order": [1, 'asc']
                });
            }

            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_order_all_button").addClass("wcmvp_active_button");
        })
        $(document).on("click", ".wcmvp-orders", function () {
            var wcmvp_link_current = window.location.href;
            var wcmvp_withdraw_link = wcmvp_link_current.split("?");
            var wcmvp_state = wcmvp_withdraw_link[0].split("#");
            window.history.replaceState(null, null, wcmvp_home[0] + "#orders");
            var wcmvp_order_data_table;
            var wcmvp_ID = $('#wcmvp-order-all-table-id').attr("data-id");
            if (!$.fn.DataTable.isDataTable('#wcmvp-order-all-table-id')) {
                wcmvp_order_data_table = $('#wcmvp-order-all-table-id').DataTable({
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
                            'action': 'wcmvp_order_all_table',
                            'cond': 'All_table',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce,
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "columnDefs": [{
                        "targets": [0, 6],
                        "orderable": false,
                    }],
                    "order": [1, 'asc']
                });
            }
            $(".wcmvp_div").removeClass("wcmvp-active");
            $(".wcmvp-orders").addClass("wcmvp-active");
            $(".wcmvp-order-complete-table,.wcmvp-order-processing-table,.wcmvp-order-on-hold-table,.wcmvp-order-pending-table,.wcmvp-order-cancelled-table,.wcmvp-order-refunded-table,.wcmvp-order-failed-table").hide();
            $(".wcmvp-product-panel").hide();
            $(".wcmvp-dashboard-panel").hide();
            $(document).find(".wcmvp_panel").css('display','none');
            $(".wcmvp-orders-panel").show();
            $(".wcmvp-withdraw-panel").hide();
            $(".wcmvp-Setting-panel").hide();
            $(".wcmvp-payment-panel").hide();
        });


        /*     functions for cancel table            */
        $(document).on("click", "#wcmvp_order_Cancelled_button", function () {
            var rip = window.location.href;
            var wcmvp_link = rip.split("?");
            window.history.replaceState(null, null, wcmvp_link[0] + "#orders?cancelled");
            var wcmvp_page_detect = wcmvp_link[1];
            if (wcmvp_page_detect != 'cancelled') {
                var wcmvp = $("#wcmvp-order-all-table-id").DataTable()
                wcmvp.state.clear();
                $("#wcmvp-order-all-table-id").dataTable().fnDestroy();
            }
            var wcmvp_order_data_table;
            if (!$.fn.DataTable.isDataTable('#wcmvp-order-all-table-id')) {
                wcmvp_order_data_table = $('#wcmvp-order-all-table-id').DataTable({
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
                            'action': 'wcmvp_order_all_table',
                            'cond': 'cancel_table',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "columnDefs": [{
                        "targets": [0, 6],
                        "orderable": false,
                    }],
                    "order": [1, 'asc']

                });
            }
            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_order_Cancelled_button").addClass("wcmvp_active_button");

        })

        /*order complete table*/

        $(document).on("click", "#wcmvp_order_complete_button", function () {
            var rip = window.location.href;
            var wcmvp_link = rip.split("?");
            var wcmvp_page_detect = wcmvp_link[1];
            window.history.replaceState(null, null, wcmvp_link[0] + "#orders?completed");
            if (wcmvp_page_detect != 'completed') {
                var wcmvp = $("#wcmvp-order-all-table-id").DataTable()
                wcmvp.state.clear();
                $("#wcmvp-order-all-table-id").dataTable().fnDestroy();
            }
            var wcmvp_order_data_table;
            if (!$.fn.DataTable.isDataTable('#wcmvp-order-all-table-id')) {
                wcmvp_order_data_table = $('#wcmvp-order-all-table-id').DataTable({
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
                            'action': 'wcmvp_order_all_table',
                            'cond': 'complete_table',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "columnDefs": [{
                        "targets": [0, 6],
                        "orderable": false,
                    }],
                    "order": [1, 'asc']

                });

            }
            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_order_complete_button").addClass("wcmvp_active_button");
        })

        /*    function for order failure table  */
        $(document).on("click", "#wcmvp_order_Failed_button", function () {
            var rip = window.location.href;
            var wcmvp_link = rip.split("?");
            var wcmvp_page_detect = wcmvp_link[1];
            window.history.replaceState(null, null, wcmvp_link[0] + "#orders?failed");
            if (wcmvp_page_detect != 'failed') {
                var wcmvp = $("#wcmvp-order-all-table-id").DataTable()
                wcmvp.state.clear();
                $("#wcmvp-order-all-table-id").dataTable().fnDestroy();
            }
            var wcmvp_order_data_table;
            if (!$.fn.DataTable.isDataTable('#wcmvp-order-all-table-id')) {
                wcmvp_order_data_table = $('#wcmvp-order-all-table-id').DataTable({
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
                            'action': 'wcmvp_order_all_table',
                            'cond': 'failed_table',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "columnDefs": [{
                        "targets": [0, 6],
                        "orderable": false,
                    }],
                    "order": [1, 'asc']

                });

            }
            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_order_Failed_button").addClass("wcmvp_active_button");
        })



        /*        functions for order on hold table         */
        $(document).on("click", "#wcmvp_order_On_hold_button", function () {
            var rip = window.location.href;
            var wcmvp_link = rip.split("?");
            var wcmvp_page_detect = wcmvp_link[1];
            window.history.replaceState(null, null, wcmvp_link[0] + "#orders?onhold");
            if (wcmvp_page_detect != 'onhold') {
                var wcmvp = $("#wcmvp-order-all-table-id").DataTable()
                wcmvp.state.clear();
                $("#wcmvp-order-all-table-id").dataTable().fnDestroy();
            }
            var wcmvp_order_data_table;
            if (!$.fn.DataTable.isDataTable('#wcmvp-order-all-table-id')) {
                wcmvp_order_data_table = $('#wcmvp-order-all-table-id').DataTable({
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
                            'action': 'wcmvp_order_all_table',
                            'cond': 'On_hold_table',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "columnDefs": [{
                        "targets": [0, 6],
                        "orderable": false,
                    }],
                    "order": [1, 'asc']

                });

            }
            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_order_On_hold_button").addClass("wcmvp_active_button");
        })

        /*                  functions for order pending table                              */
        $(document).on("click", "#wcmvp_order_Pending_button", function () {
            var rip = window.location.href;
            var wcmvp_link = rip.split("?");
            window.history.replaceState(null, null, wcmvp_link[0] + "#orders?pending");
            var wcmvp_page_detect = wcmvp_link[1];
            if (wcmvp_page_detect != 'pending') {
                var wcmvp = $("#wcmvp-order-all-table-id").DataTable()
                wcmvp.state.clear();
                $("#wcmvp-order-all-table-id").dataTable().fnDestroy();
            }
            var wcmvp_order_data_table;

            if (!$.fn.DataTable.isDataTable('#wcmvp-order-all-table-id')) {
                wcmvp_order_data_table = $('#wcmvp-order-all-table-id').DataTable({
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
                            'action': 'wcmvp_order_all_table',
                            'cond': 'pending_table',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "columnDefs": [{
                        "targets": [0, 6],
                        "orderable": false,
                    }],
                    "order": [1, 'asc']
                });

            }
            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_order_Pending_button").addClass("wcmvp_active_button");
        })

        /*          functions for order processing table            */
        $(document).on("click", "#wcmvp_order_processing_button", function () {
            var rip = window.location.href;
            var wcmvp_link = rip.split("?");
            var wcmvp_page_detect = wcmvp_link[1];
            window.history.replaceState(null, null, wcmvp_link[0] + "#orders?processing");
            if (wcmvp_page_detect != 'processing') {
                var wcmvp = $("#wcmvp-order-all-table-id").DataTable()
                wcmvp.state.clear();
                $("#wcmvp-order-all-table-id").dataTable().fnDestroy();
            }
            var wcmvp_order_data_table;
            if (!$.fn.DataTable.isDataTable('#wcmvp-order-all-table-id')) {
                wcmvp_order_data_table = $('#wcmvp-order-all-table-id').DataTable({
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
                            'action': 'wcmvp_order_all_table',
                            'cond': 'processing_table',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "columnDefs": [{
                        "targets": [0, 6],
                        "orderable": false,
                    }],
                    "order": [1, 'asc']
                });
            }
            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_order_processing_button").addClass("wcmvp_active_button");
        })

        /*    functions for order refunded table    */
        var rip = window.location.href;
        var wcmvp_link = rip.split("?");
        var wcmvp_page_detect = wcmvp_link[1];

        $(document).on("click", "#wcmvp_order_Refunded_button", function () {
            if (wcmvp_page_detect != 'refunded') {
                var wcmvp = $("#wcmvp-order-all-table-id").DataTable()
                wcmvp.state.clear();
                $("#wcmvp-order-all-table-id").dataTable().fnDestroy();
            }
            var wcmvp_order_data_table;
            if (!$.fn.DataTable.isDataTable('#wcmvp-order-all-table-id')) {
                wcmvp_order_data_table = $('#wcmvp-order-all-table-id').DataTable({
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
                            'action': 'wcmvp_order_all_table',
                            'cond': 'refunded_table',
                            'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
                        },
                        'type': 'POST',
                        "dataType": 'json',
                    },
                    "columnDefs": [{
                        "targets": [0, 6],
                        "orderable": false,
                    }],
                    "order": [1, 'asc']
                });
            }
            $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
            $("#wcmvp_order_Refunded_button").addClass("wcmvp_active_button");
        })

        var rip = window.location.href;
        var wcmvp_link = rip.split("?");
        var wcmvp_withdraw_link = rip.split("#");

        $(document).on("click", "#wcmvp_export_all", function () {
            $(".wcmvp_loader").show();
            var data = {
                'action': 'wcmvp_export_orders',
                'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            };
            jQuery.post(
                wcmvp_ajax_object.wcmvp_ajax_url,
                data,
                function (response) {
                    if(response){
                        $(".wcmvp_loader").hide();
                    }
                    window.history.replaceState(null, null, wcmvp_withdraw_link[0] + "?wcmvp_order_id_csv=" + response.toString());
                    location.reload();
                }, 'json')
        })

        $(document).on("click", "#wcmvp_export_select", function () {
            var bulk = $(".wcmvp_order_bulk_check");
            var id_array = [];
            for (var i = 0; i < bulk.length; i++) {
                if ($(bulk[i]).prop("checked")) {
                    id_array.push(($(bulk[i]).attr("data-id")));
                }
            }
            window.history.replaceState(null, null, wcmvp_withdraw_link[0] + "?wcmvp_order_id_csv=" + id_array.toString(id_array));
            location.reload();
        })

    })
})(jQuery);