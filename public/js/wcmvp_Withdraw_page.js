(function ($) {
  'use strict';
  $(document).ready(function() {


    /* working of withdraw */
    $(document).on("click", "#wcmvp_submit_request_button", function () {
      var wcmvp_payment_meth = $("#wcmvp_paymet_method").val();
      var wcmvp_amount_req = parseFloat($("#wcmvp_ven_with_amount").val());
      var wcmvp_min_bal = parseFloat($("#wcmvp_min_bal").html());
      var wcmvp_max_bal = parseFloat($("#wcmvp_curent_bal").html());
      $(".wcmvp_req_table").show();
      $(".wcmvp_status_table").css("display", "none");
      var wcmvp_extra = $(".wcmvp_withdraw_extra_field");
      if(wcmvp_extra.length>0){
        var wcmvp_obj={};
        $.each(wcmvp_extra, function(index,event) {
            wcmvp_obj[event.name]=event.value;
        });
      }
      var wcmvp_multiple_select = $(document).find(".wcmvp_withdraw_multiple_data");
      if (wcmvp_multiple_select.length > 0) {
          var extra_multi_data = {};
          $.each(wcmvp_multiple_select, function (index, event) {
              extra_multi_data[event.name] = getSelectValues(event);
          });
      }
      var wcmvp_image_src = $(".wcmvp_withdraw_image_src");
      if (wcmvp_image_src.length > 0) {
        var wcmvp_image_src_path = {};
        $.each(wcmvp_image_src, function (index, event) {
            wcmvp_image_src_path[event.name] = event.src;
        });
      }
      var wcmvp_extra_check = $(".wcmvp_withdraw_checkbox");
      if(wcmvp_extra_check.length>0){
        var wcmvp_check_obj={};
        $.each(wcmvp_extra_check, function(index,event) {
          wcmvp_check_obj[event.name]= $("#"+event.id).is(":checked");
        });
      }
      if ( wcmvp_amount_req>wcmvp_max_bal){
        $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_error, { className: 'wcmvp_error', position: "right bottom" });
      }else if ((wcmvp_amount_req >= wcmvp_min_bal) && (wcmvp_amount_req <= wcmvp_max_bal)) {
        $(".wcmvp_loader").show();
        var data = {
          'action': 'withdraw_request_ajax',
          'wcmvp_payment_meth': wcmvp_payment_meth,
          'wcmvp_amount_req': wcmvp_amount_req,
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
            if(response){
              $(".wcmvp_loader").hide();
            }
            if (response == "successfull") {
              wcmvp_count_ajax();
              $('.notifyjs-wrapper').remove();
              $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_success, { className: 'wcmvp_success', position: "right bottom" });
              $('#wcmvp-withdraw-table-id').DataTable().ajax.reload(null, false);
              $("#wcmvp_ven_with_amount").val("");
            } else {
              $('.notifyjs-wrapper').remove();
              $.notify(response, { className: 'wcmvp_error', position: "right bottom" });
            }

          }, 'json')
      }else{
        $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_error, { className: 'wcmvp_error', position: "right bottom" });
      }
    })

    var wcmvp_bal = $("#wcmvp_curent_bal").html();
    if (wcmvp_bal == 0) {
      $(".wcmvp_withdraw_request_form").css("dispaly", "none");
    }


    $(document).on("click", ".wcmvp_withdraw_cancel_button", function (e) {
      e.preventDefault();
      var wcmvp_cancel_id = $(this).attr("data-id");
      $(".wcmvp_loader").show();
      var data = {
        'action': 'withdraw_request_cancel_ajax',
        'wcmvp_cancel_id': wcmvp_cancel_id,
        'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
      };
      jQuery.post(
        wcmvp_ajax_object.wcmvp_ajax_url,
        data,
        function(response) {
          $(document).find(".wcmvp_loader").hide();
          $('.notifyjs-wrapper').remove();
          $.notify(response, { className: 'wcmvp_success', position: "right bottom" });
          wcmvp_count_ajax();
          $('#wcmvp-withdraw-table-id').DataTable().ajax.reload(null, false);
        }, 'json')
        

    })

    $(document).on("click", "#wcmvp_withdraw_request", function () {
      $(".wcmvp_req_table").css("display", "block");
      $(".wcmvp_status_table").css("display", "none");
      $(".listing_button").removeClass("wcmvp_active_button");
      $("#wcmvp_withdraw_request").addClass("wcmvp_active_button");
      var wcmvp = $("#wcmvp-withdraw-status").DataTable()
      wcmvp.state.clear();
      $("#wcmvp-withdraw-status").dataTable().fnDestroy();
      var wcmvp_withdraw_data_table;
      if (!$.fn.DataTable.isDataTable('#wcmvp-withdraw-table-id')) {
        wcmvp_withdraw_data_table = $('#wcmvp-withdraw-table-id').DataTable({
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
              'action': 'wcmvp_withdraw_all_table',
              'cond': 'request',
              'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            },
            'type': 'POST',
            "dataType": 'json',
          },
        });
      }
    })

    $(document).on("click", "#wcmvp_approved_request", function () {
      $(".wcmvp_req_table").css("display", "none");
      $(".wcmvp_status_table").css("display", "block");
      $(".listing_button").removeClass("wcmvp_active_button");
      $("#wcmvp_approved_request").addClass("wcmvp_active_button");
      var wcmvp = $("#wcmvp-withdraw-status").DataTable()
      wcmvp.state.clear();
      $("#wcmvp-withdraw-status").dataTable().fnDestroy();
      var wcmvp_withdraw_data_table;
      if (!$.fn.DataTable.isDataTable('#wcmvp-withdraw-status')) {
        wcmvp_withdraw_data_table = $('#wcmvp-withdraw-status').DataTable({
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
              'action': 'wcmvp_withdraw_all_table',
              'cond': 'approved',
              'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            },
            'type': 'POST',
            "dataType": 'json',
          },
        });
      }
    })

    $(document).on("click", "#wcmvp_cancel_request", function () {
      $(".wcmvp_req_table").css("display", "none");
      $(".wcmvp_status_table").css("display", "block");
      $(".listing_button").removeClass("wcmvp_active_button");
      $("#wcmvp_cancel_request").addClass("wcmvp_active_button");
      var wcmvp = $("#wcmvp-withdraw-status").DataTable()
      wcmvp.state.clear();
      $("#wcmvp-withdraw-status").dataTable().fnDestroy();
      var wcmvp_withdraw_data_table;
      if (!$.fn.DataTable.isDataTable('#wcmvp-withdraw-status')) {
        wcmvp_withdraw_data_table = $('#wcmvp-withdraw-status').DataTable({
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
              'action': 'wcmvp_withdraw_all_table',
              'cond': 'cancelled',
              'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            },
            'type': 'POST',
            "dataType": 'json',
          },
        });
      }
    })

    $(document).on("click", ".wcmvp-method-details", function (e) {
      e.preventDefault();
      var data = {
        'action': 'wcmvprre_withdraw_method_detail_ajax',
        'wcmvp_withdraw_id': $(this).attr("data-id"),
        'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
      };
      jQuery.post(
        wcmvp_ajax_object.wcmvp_ajax_url,
        data,
        function (response) {
          wcmvp_count_ajax();
          $(".wcmvp_method_details_append").html(response);
        }, 'json')
      $("#wcmvp_method_detail_modal").addClass("wcmvp-modal-open");
      $("body").css("overflow", "hidden");
    })

    $(document).on("click", ".wcmvp_close_method_details", function () {
      $(".wcmvp_method_details_append").html("");
    })

    $(document).on("click", "#wcmvp_add_new_withdraw_req", function () {
      $("#wcmvp_withdraw_form").addClass("wcmvp-modal-open");
      $("body").css("overflow", "hidden");
    })

  })
})(jQuery);