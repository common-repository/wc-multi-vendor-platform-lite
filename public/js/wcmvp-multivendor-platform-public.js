(function ($) {
  'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

  $(document).ready(function () {
        $(document).find("#entire_sales").click(function(){          

          $(document).find(".wcmvp-orders").trigger("click");

        });

        $(document).find("#entire_savings").click(function(){          

          $(document).find(".wcmvp-withdraw").trigger("click");

        });

        $(document).find("#entire_orders").click(function(){          

          $(document).find(".wcmvp-orders").trigger("click");

        });

        $(document).find("#entire_views_of_all_product").click(function(){          

          $(document).find(".wcmvp-product").trigger("click");

        });

        $(document).find("#all_completed_order_of_vendor").click(function(){          

          $(document).find(".wcmvp-orders").trigger("click");

        });

        $(document).find("#all_processing_order_of_vendor").click(function(){          

          $(document).find(".wcmvp-orders").trigger("click");
        
        });

        $(document).find("#all_on-hold_order_of_vendor").click(function(){          
        
          $(document).find(".wcmvp-orders").trigger("click");
        
        });
        
        $(document).find("#all_pending_order_of_vendor").click(function(){          
        
          $(document).find(".wcmvp-orders").trigger("click");
        
        });
        
        $(document).find("#all_published_products_of_vendor").click(function(){          
        
          $(document).find(".wcmvp-product").trigger("click");
        
        });
        
        $(document).find("#all_pending_products_of_vendor").click(function(){          
        
          $(document).find(".wcmvp-product").trigger("click");
        
        });
        
        $(document).find("#all_pending_withdraw_of_vendor").click(function(){          
        
          $(document).find(".wcmvp-withdraw").trigger("click");
        
        });
        
        $(document).find("#all_approved_withdraw_of_vendor").click(function(){          
        
          $(document).find(".wcmvp-withdraw").trigger("click");
        
        });
        $(document).find(".wcmvp-toggle-sidebar").click(function () {

          $(".wcmvp_vendor_drawer").addClass("wcmvp-show-sidebar");
        
        });
        
        $(document).find(".wcmvp-sidebar-close").click(function () {
        
          $(".wcmvp_vendor_drawer").removeClass("wcmvp-show-sidebar");
        
        });
        
        $(document).find(".wcmvp_sidebar_list_item").click(function () {
        
          $(".wcmvp_vendor_drawer").removeClass("wcmvp-show-sidebar");
        
        });


      
      // $(document).find("#wcmvp_schedule_from").datepicker({
      
      //   dateFormat: 'dd-mm-yy'
      
      // });
  
      // $(document).find("#wcmvp_schedule_to").datepicker({
        
      //   dateFormat: 'dd-mm-yy'
      
      // });
    

   
    $("#wcmvp_drawer_content").niceScroll();

    $(".wcmvp-home-wrap").css("top", $("#wpadminbar").css("height"));
    
    $(".wcmvp_vendor_drawer").css("top", $("#wpadminbar").css("height"));
    
    $(".wcmvp-modal-dialog").css("top", $("#wpadminbar").css("height"));

    if ($(document).find(".wcmvp_store_setup_wizzard_body").length > 0) {

      $("#wcmvp_store_banner_preview").hide();

      var file_frame;
      var attachment;
      var wp_media_post_id;
      var set_to_post_id = $("#wcmvp_store_banner_upload_button").attr("data-id"); 
      
      jQuery(document).on('click', '#wcmvp_store_banner_upload_button', function (event) {
        event.preventDefault();
        if (file_frame) {

          file_frame.uploader.uploader.param('post_id', set_to_post_id);
          file_frame.open();
          return;

        } else {

          wp.media.model.settings.post.id = set_to_post_id;
        
        }
        
        file_frame = wp.media.frames.file_frame = wp.media({
          title: wcmvp_ajax_object.wcmvp_translation.wcmvp_select_img,
          button: {
            text: wcmvp_ajax_object.wcmvp_translation.wcmvp_use_this_img,
          },
          multiple: false
        });

        file_frame.on('select', function () {
        
          $("#wcmvp_store_banner_preview").show();
          attachment = file_frame.state().get('selection').first().toJSON();
          $('#wcmvp_store_banner_preview').attr('src', attachment.url).css('width', 'auto');
          $('#wcmvp_store_setup_img_id').val(attachment.id);
          wp.media.model.settings.post.id = wp_media_post_id;
        
        });
        
        file_frame.open();
      
      });

      jQuery('a.add_media').on('click', function () {

        wp.media.model.settings.post.id = wp_media_post_id;

      });

      $("#wcmvp_store_setup_profile").hide();
      
      var wcmvp_pro_file_frame;
      var wcmvp_pro_attachment;
      var wp_media_pro_post_id;
      var set_to_pro_post_id = $("#wcmvp_store_profile_upload_button").attr("data-id");
      
      jQuery(document).on('click', '#wcmvp_store_profile_upload_button', function (event) {
        
        event.preventDefault();

        if (wcmvp_pro_file_frame) {

          wcmvp_pro_file_frame.uploader.uploader.param('post_id', set_to_pro_post_id);

          wcmvp_pro_file_frame.open();
          return;
        } else {

          wp.media.model.settings.post.id = set_to_pro_post_id;
        }

        wcmvp_pro_file_frame = wp.media.frames.wcmvp_pro_file_frame = wp.media({
          title: wcmvp_ajax_object.wcmvp_translation.wcmvp_select_img,
          button: {
            text: wcmvp_ajax_object.wcmvp_translation.wcmvp_use_this_img,
          },
          multiple: false
        });

        wcmvp_pro_file_frame.on('select', function () {
          $("#wcmvp_store_setup_profile").show();
          wcmvp_pro_attachment = wcmvp_pro_file_frame.state().get('selection').first().toJSON();
          $('#wcmvp_store_setup_profile').attr('src', wcmvp_pro_attachment.url).css('width', 'auto');
          $('#wcmvp_store_profile_id').val(wcmvp_pro_attachment.id);
          wp.media.model.settings.post.id = wp_media_pro_post_id;
        });
      
        wcmvp_pro_file_frame.open();
      
      });
      
      jQuery('a.add_media').on('click', function () {
      
        wp.media.model.settings.post.id = wp_media_pro_post_id;
      
      });

      $(document).find('.wcmvp_setup_timing_input').timepicker();

      $(document).find(".wcmvp_setup_days").select2({
      
        theme: "material",
        width: '15%',
      
      });

      if ($("#wcmvp_setup_show_time_widget").prop("checked")) {
      
        $(document).find(".wcmvp_time_widget").show();
      
      } else {
      
        $(document).find(".wcmvp_time_widget").hide();
      
      }

      $(document).on("click", "#wcmvp_setup_show_time_widget", function () {
      
        if ($("#wcmvp_setup_show_time_widget").prop("checked")) {
      
          $(document).find(".wcmvp_time_widget").show();
      
        } else {
      
          $(document).find(".wcmvp_time_widget").hide();
      
        }
      
        $(".wcmvp_modal").addClass("wcmvp-modal-open");
        $("body").css("overflow", "hidden");
      
      })

      if ($(document).find("#wcmvp_setup_sunday").val() == "close") {

        $(document).find("#wcmvp_setup_sunday").siblings(".wcmvp_setup_timing").hide();

      }

      $(document).on("change", "#wcmvp_setup_sunday", function () {
        if ($(this).val() == 'open') {

          $(document).find(this).siblings(".wcmvp_setup_timing").show();

        } else {

          $(document).find(this).siblings(".wcmvp_setup_timing").hide();

        }

      })
      $(document).on("change", "#wcmvp_setup_monday", function () {
        if ($(this).val() == 'open') {
          $(document).find(this).siblings(".wcmvp_setup_timing").show();
        } else {
          $(document).find(this).siblings(".wcmvp_setup_timing").hide();
        }
      })
      $(document).on("change", "#wcmvp_setup_tuesday", function () {
        if ($(this).val() == 'open') {
          $(document).find(this).siblings(".wcmvp_setup_timing").show();
        } else {
          $(document).find(this).siblings(".wcmvp_setup_timing").hide();
        }
      })
      $(document).on("change", "#wcmvp_setup_wednesday", function () {
        if ($(this).val() == 'open') {
          $(document).find(this).siblings(".wcmvp_setup_timing").show();
        } else {
          $(document).find(this).siblings(".wcmvp_setup_timing").hide();
        }
      })
      $(document).on("change", "#wcmvp_setup_thursday", function () {
        if ($(this).val() == 'open') {
          $(document).find(this).siblings(".wcmvp_setup_timing").show();
        } else {
          $(document).find(this).siblings(".wcmvp_setup_timing").hide();
        }
      })
      $(document).on("change", "#wcmvp_setup_friday", function () {
        if ($(this).val() == 'open') {
          $(document).find(this).siblings(".wcmvp_setup_timing").show();
        } else {
          $(document).find(this).siblings(".wcmvp_setup_timing").hide();
        }
      })

      $(document).on("change", "#wcmvp_setup_saturday", function () {
        if ($(this).val() == 'open') {
          $(document).find(this).siblings(".wcmvp_setup_timing").show();
        } else {
          $(document).find(this).siblings(".wcmvp_setup_timing").hide();
        }
      })

      $(document).on("click", ".wcmvp_start_setup", function () {
        $(document).find(".wcmvp_store_setup_settings_sec").show();
        $(document).find(".wcmvp_start_up").hide();
      })
      $(document).on("click", ".wcmvp_next", function () {
        $(document).find(".wcmvp_store_setup_payment_sec").show();
        $(document).find(".wcmvp_store_setup_settings_sec").hide();
      })

      $(document).on("click", ".wcmvp_back", function () {
        $(document).find(".wcmvp_store_setup_payment_sec").hide();
        $(document).find(".wcmvp_store_setup_settings_sec").show();
      })
      
      $(document).on("click", ".wcmvp_skip", function () {
        $(document).find(".wcmvp-dashboard").trigger("click");
      })

      $(document).find("#wcmvp_setup_payment_submit").on("click", function () {
        var wcmvp_banner_img = $("#wcmvp_store_setup_img_id").val();
        var wcmvp_profile_img = $("#wcmvp_store_profile_id").val();
        var wcmvp_prod_per_page = $("#wcmvp_store_setup_ppp").val();
        var wcmvp_address1 = $("#wcmvp_setup_address_one").val();
        var wcmvp_address2 = $("#wcmvp_setup_address_two").val();
        var wcmvp_city = $("#wcmvp_setup_address_city").val();
        var wcmvp_zip_code = $("#wcmvp_setup_address_zip").val();
        var wcmvp_country = $("#wcmvp_setup_country").val();
        var wcmvp_state = $("#wcmvp_setup_calc_shipping_state").val();
        var wcmvp_phone = $("#wcmvp_setup_vendor_phone").val();
        if ($("#wcmvp_setup_show_email").prop("checked")) {
          var wcmvp_show_email = true;
        } else {
          var wcmvp_show_email = false;
        }
        if ($("#wcmvp_setup_show_more_tab").prop("checked")) {
          var wcmvp_show_more = true;
        } else {
          var wcmvp_show_more = false;
        }
        var wcmvp_map_key = $("#wcmvp_setup_map_api_key").val();
        if ($("#wcmvp_setup_show_time_widget").prop("checked")) {
          var wcmvp_show_time_widget = true;
        } else {
          var wcmvp_show_time_widget = false;
        }
        var wcmvp_sunday = $("#wcmvp_setup_sunday").val();
        var wcmvp_sunday_open = $("#wcmvp_setup_sunday_open_time").val();
        var wcmvp_sunday_close = $("#wcmvp_setup_sunday_close_time").val();
        var wcmvp_monday = $("#wcmvp_setup_monday").val();
        var wcmvp_monday_open = $("#wcmvp_setup_monday_open_time").val();
        var wcmvp_monday_close = $("#wcmvp_setup_monday_close_time").val();
        var wcmvp_tuesday = $("#wcmvp_setup_tuesday").val();
        var wcmvp_tuesday_open = $("#wcmvp_setup_tuesday_open_time").val();
        var wcmvp_tuesday_close = $("#wcmvp_setup_tuesday_close_time").val();
        var wcmvp_wednesday = $("#wcmvp_setup_wednesday").val();
        var wcmvp_wednesday_open = $("#wcmvp_setup_wednesday_open_time").val();
        var wcmvp_wednesday_close = $("#wcmvp_setup_wednesday_close_time").val();
        var wcmvp_thursday = $("#wcmvp_setup_thursday").val();
        var wcmvp_thursday_open = $("#wcmvp_setup_thursday_open_time").val();
        var wcmvp_thursday_close = $("#wcmvp_setup_thursday_close_time").val();
        var wcmvp_friday = $("#wcmvp_setup_friday").val();
        var wcmvp_friday_open = $("#wcmvp_setup_friday_open_time").val();
        var wcmvp_friday_close = $("#wcmvp_setup_friday_close_time").val();
        var wcmvp_saturday = $("#wcmvp_setup_saturday").val();
        var wcmvp_saturday_open = $("#wcmvp_setup_saturday_open_time").val();
        var wcmvp_saturday_close = $("#wcmvp_setup_saturday_close_time").val();
        var wcmvp_store_op_notice = $("#wcmvp_setup_store_open_notice").val();
        var wcmvp_store_close_notice = $("#wcmvp_setup_store_close_notice").val();
        var wcmvp_paypal_email = $("#wcmvp_setup_payment_paypal_email").val();
        var wcmvp_account_name = $("#wcmvp_setup_payment_account_name").val();
        var wcmvp_account_no = $("#wcmvp_setup_payment_account_no").val();
        var wcmvp_bank_name = $("#wcmvp_setup_payment_bank_name").val();
        var wcmvp_bank_place = $("#wcmvp_setup_payment_bank_place").val();
        var wcmvp_routing_no = $("#wcmvp_setup_payment_routing_no").val();
        var wcmvp_iban = $("#wcmvp_setup_payment_iban").val();
        var wcmvp_swift_code = $("#wcmvp_setup_payment_swift_code").val();

        var wcmvp_extra = $(".wcmvp_store_setup_extra_field").children("input");
        if (wcmvp_extra.length > 0) {
          var wcmvp_obj = {};
          $.each(wcmvp_extra, function (index, event) {
            wcmvp_obj[event.name] = event.value;
          });
        }

        var wcmvp_extra_payment = $(".wcmvp_store_setup_payment_extra_field").children("input");
        if (wcmvp_extra_payment.length > 0) {
          var wcmvp_payment_obj = {};
          $.each(wcmvp_extra_payment, function (index, event) {
            wcmvp_payment_obj[event.name] = event.value;
          });
        }
        var data = {
          'action': 'wcmvp_store_setting',
          'wcmvp_banner_id': wcmvp_banner_img,
          'wcmvp_profile_id': wcmvp_profile_img,
          'wcmvp_ppp': wcmvp_prod_per_page,
          'wcmvp_street': wcmvp_address1,
          'wcmvp_street2t': wcmvp_address2,
          'wcmvp_city': wcmvp_city,
          'wcmvp_post_zip': wcmvp_zip_code,
          'wcmvp_country': wcmvp_country,
          'wcmvp_state': wcmvp_state,
          'wcmvp_phone': wcmvp_phone,
          'wcmvp_show_email': wcmvp_show_email,
          'wcmvp_show_more_tab': wcmvp_show_more,
          'wcmvp_map_api_key': wcmvp_map_key,
          'wcmvp_show_time_widget': wcmvp_show_time_widget,
          'wcmvp_sunday': wcmvp_sunday,
          'wcmvp_sunday_open_time': wcmvp_sunday_open,
          'wcmvp_sunday_close_time': wcmvp_sunday_close,
          'wcmvp_monday': wcmvp_monday,
          'wcmvp_monday_open_time': wcmvp_monday_open,
          'wcmvp_monday_close_time': wcmvp_monday_close,
          'wcmvp_tuesday': wcmvp_tuesday,
          'wcmvp_tuesday_open_time': wcmvp_tuesday_open,
          'wcmvp_tuesday_close_time': wcmvp_tuesday_close,
          'wcmvp_wednesday': wcmvp_wednesday,
          'wcmvp_wednesday_open_time': wcmvp_wednesday_open,
          'wcmvp_wednesday_close_time': wcmvp_wednesday_close,
          'wcmvp_thursday': wcmvp_thursday,
          'wcmvp_thursday_open_time': wcmvp_thursday_open,
          'wcmvp_thursday_close_time': wcmvp_thursday_close,
          'wcmvp_friday': wcmvp_friday,
          'wcmvp_friday_open_time': wcmvp_friday_open,
          'wcmvp_friday_close_time': wcmvp_friday_close,
          'wcmvp_saturday': wcmvp_saturday,
          'wcmvp_saturday_open_time': wcmvp_saturday_open,
          'wcmvp_saturday_close_time': wcmvp_saturday_close,
          'wcmvp_store_open_notice': wcmvp_store_op_notice,
          'wcmvp_store_close_notice': wcmvp_store_close_notice,
          'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
        };
        if (wcmvp_extra.length > 0) {
          var data = { ...wcmvp_obj, ...data };
        }
        jQuery.post(
          wcmvp_ajax_object.wcmvp_ajax_url,
          data,
          function (response) {
          }, "json")
        var wcmvp_data = {
          'action': 'wcmvp_payment_ajax',
          'wcmvp_paypal_email': wcmvp_paypal_email,
          'wcmvp_account_name': wcmvp_account_name,
          'wcmvp_account_no': wcmvp_account_no,
          'wcmvp_bank_name': wcmvp_bank_name,
          'wcmvp_bank_place': wcmvp_bank_place,
          'wcmvp_routing_no': wcmvp_routing_no,
          'wcmvp_iban': wcmvp_iban,
          'wcmvp_swift_code': wcmvp_swift_code,
          'wcmvp_cond': 'store_setup_request',
          'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
        };
        if (wcmvp_extra_payment.length > 0) {
          var data = { ...wcmvp_payment_obj, ...data };
        }
        jQuery.post(
          wcmvp_ajax_object.wcmvp_ajax_url,
          wcmvp_data,
          function (response) {
            if (response != null) {
              window.location.reload();
            }
          }, "json")
      })
    }

    var rip = window.location.href;
    var wcmvp_link = rip.split("?");
    var wcmvp_withdraw_link = rip.split("#");
    var wcmvp_home = wcmvp_link[0].split("#");
    var wcmvp_sub_link = wcmvp_link[0];
    var i;
    for (i = 0; i < wcmvp_sub_link.length; i++) {
      if (wcmvp_sub_link[i] != "#") {
        continue;
      } else {
        var text = wcmvp_sub_link.substr(i + 1, wcmvp_sub_link.length - 1);
      }
    }
    function wcmvp_dashboard_data(){
      var data = {
        'action': 'wcmvp_get_data',
        'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
      };

      jQuery.post(wcmvp_ajax_object.wcmvp_ajax_url, data, function (wcmvp_response) {
        if (wcmvp_response) {
          var product_all = wcmvp_response.pie_chart.wcmvp_prod_count_array.wcmvp_prod_all_count;
          var product_published = wcmvp_response.pie_chart.wcmvp_prod_count_array.wcmvp_prod_publish_count;
          var product_pending = wcmvp_response.pie_chart.wcmvp_prod_count_array.wcmvp_prod_pending_count;
          var withdraw_approved = wcmvp_response.pie_chart.wcmvp_withdraw_count_array.wcmvp_withdraw_approved_count;
          var withdraw_pending = wcmvp_response.pie_chart.wcmvp_withdraw_count_array.wcmvp_withdraw_pending_count;
          var withdraw_failed = wcmvp_response.pie_chart.wcmvp_withdraw_count_array.wcmvp_withdraw_cancelled_count;
          var total_withdraw = withdraw_approved + withdraw_pending + withdraw_failed;
          var order_total = wcmvp_response.pie_chart.wcmvp_order_count_array.wcmvp_order_all_count;
          var order_complete = wcmvp_response.pie_chart.wcmvp_order_count_array.wcmvp_order_complete_count;
          var order_processing = wcmvp_response.pie_chart.wcmvp_order_count_array.wcmvp_order_processing_count;
          var order_pending = wcmvp_response.pie_chart.wcmvp_order_count_array.wcmvp_order_pending_count;
          var order_on_hold = wcmvp_response.pie_chart.wcmvp_order_count_array.wcmvp_order_on_hold_count;
          var order_refunded = wcmvp_response.pie_chart.wcmvp_order_count_array.wcmvp_order_refunded_count;
          var order_cancelled = wcmvp_response.pie_chart.wcmvp_order_count_array.wcmvp_order_cancelled_count;
          var order_failed = wcmvp_response.pie_chart.wcmvp_order_count_array.wcmvp_order_failed_count;


          var wcmvp_complete_percentage = (order_complete / order_total) * 100;
          $(document).find("#wcmvp_completed_orders_progress").css("width", wcmvp_complete_percentage + "%");

          var wcmvp_processing_percentage = (order_processing / order_total) * 100;
          $(document).find("#wcmvp_process_orders_progress").css("width", wcmvp_processing_percentage + "%");

          var wcmvp_on_hold_percentage = (order_on_hold / order_total) * 100;
          $(document).find("#wcmvp_on_hold_orders_progress").css("width", wcmvp_on_hold_percentage + "%");

          var wcmvp_pending_percentage = (order_pending / order_total) * 100;
          $(document).find("#wcmvp_pending_orders_progress").css("width", wcmvp_pending_percentage + "%");

          var wcmvp_prod_publish_prod = (product_published / product_all) * 100;
          $(document).find("#wcmvp_published_product_progress").css("width", wcmvp_prod_publish_prod + "%");

          var wcmvp_prod_pending_prod = (product_pending / product_all) * 100;
          $(document).find("#wcmvp_pending_prod_progress").css("width", wcmvp_prod_pending_prod + "%");

          var wcmvp_approved_withdraw = (withdraw_approved / total_withdraw) * 100;
          $(document).find("#wcmvp_approved_withdraw_progress").css("width", wcmvp_approved_withdraw + "%");

          var wcmvp_pending_withdraw_percent = (withdraw_pending / total_withdraw) * 100;
          $(document).find("#wcmvp_pend_withdraw_progress").css("width", wcmvp_pending_withdraw_percent + "%");

          if ($("#wcmvp_order_chart").length) {
            var doughnat_chart = new Chart("wcmvp_order_chart", {
              type: 'doughnut',
              data: {
                labels: [wcmvp_ajax_object.wcmvp_translation.wcmvp_complete, wcmvp_ajax_object.wcmvp_translation.wcmvp_processing, wcmvp_ajax_object.wcmvp_translation.wcmvp_pending, wcmvp_ajax_object.wcmvp_translation.wcmvp_on_hold, wcmvp_ajax_object.wcmvp_translation.wcmvp_refunded, wcmvp_ajax_object.wcmvp_translation.wcmvp_cancelled, wcmvp_ajax_object.wcmvp_translation.wcmvp_failed],
                datasets: [{
                  data: [order_complete, order_processing, order_pending, order_on_hold, order_refunded, order_cancelled, order_failed],
                  backgroundColor: ["#206117", "#abe95f", "#f75200", "#76767a", "#2e0f0f", "#e82c6e", "#f20707"],
                  hoverBackgroundColor: ["#206117", "#abe95f", "#f75200", "#76767a", "#2e0f0f", "#e82c6e", "#f20707"],
                  borderColor: [
                    '#ffffff'
                  ],
                  borderWidth: 0,
                }]
              },
              options: {
                animateRotate: true,
                legend: {
                  display: false,
                  position: 'bottom',
                },
                title: {
                  display: true,
                  text: wcmvp_ajax_object.wcmvp_translation.wcmvp_order,
                  fontSize: 20,
                },
                tooltips: {
                  bodyFontSize: 20,
                  titleFontColor: '#000000',
                  bodyFontColor: '#000',
                  backgroundColor: '#FFF',
                },

              }

            });

            doughnat_chart.render();
          }

          var day1 = wcmvp_response.bar_graph[0];
          var day2 = wcmvp_response.bar_graph[1];
          var day3 = wcmvp_response.bar_graph[2];
          var day4 = wcmvp_response.bar_graph[3];
          var day5 = wcmvp_response.bar_graph[4];
          var day6 = wcmvp_response.bar_graph[5];
          var day7 = wcmvp_response.bar_graph[6];
          var day8 = wcmvp_response.bar_graph[7];
          var day9 = wcmvp_response.bar_graph[8];
          var day10 = wcmvp_response.bar_graph[9];

          if ($("#wcmvp_sales_chart").length) {
            var chart = new Chart("wcmvp_sales_chart", {
              type: 'line',
              data: {
                labels: [day1[3], day2[3], day3[3], day4[3], day5[3], day6[3], day7[3], day8[3], day9[3], day10[3]],
                datasets: [{
                  label: [wcmvp_ajax_object.wcmvp_translation.wcmvp_total_sales],
                  data: [day1[0], day2[0], day3[0], day4[0], day5[0], day6[0], day7[0], day8[0], day9[0], day10[0]],
                  backgroundColor: ["rgba(255,255,255,0)"],
                  borderColor: [
                    '#f86c6b'
                  ],
                  borderWidth: 2,
                },
                {
                  label: [wcmvp_ajax_object.wcmvp_translation.wcmvp_total_order],
                  data: [day1[2], day2[2], day3[2], day4[2], day5[2], day6[2], day7[2], day8[2], day9[2], day10[2]],
                  backgroundColor: ["rgba(255,255,255,0)"],
                  borderColor: [
                    '#21759b'
                  ],
                  borderWidth: 2,
                }]
              },

              options: {
                responsive: true,
                title: {
                  display: true,
                  text: wcmvp_ajax_object.wcmvp_translation.wcmvp_total_sales_this_month
                },
                tooltips: {
                  mode: 'index',
                  intersect: false,
                },
                hover: {
                  mode: 'nearest',
                  intersect: true
                },
                scales: {
                  xAxes: [{
                    gridLines: {
                      display: false
                    }
                  }],
                  yAxes: [{
                    gridLines: {
                      display: false
                    },
                  }]
                }
              }
            });
            chart.render();
          }
        }
      }, 'json');
    }
    wcmvp_dashboard_data();

    if (text == "dashboard") {
      $(".wcmvp_div").removeClass("wcmvp-active");
      $(".wcmvp-dashboard").addClass("wcmvp-active");
      $(document).find(".wcmvp_panel").hide();
      $(".wcmvp-dashboard-panel").show();
      $(".wcmvp_loader").hide();
      $(".wcmvp-product-panel").hide();
      $(".wcmvp-orders-panel").hide();
      $(".wcmvp-withdraw-panel").hide();
      $(".wcmvp-Setting-panel").hide();
      $(".wcmvp-payment-panel").hide();
      
    }
    else if (text == "product") {
      var wcmvp_conditions;
      if (wcmvp_link[1] == "published_product") {
        wcmvp_conditions = "published_prod";
        $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
        $(".wcmvp_listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_published_product_table").addClass("wcmvp_active_button");
        $("#wcmvp_published_product_table").addClass("mdc-tab--active");
        $(".wcmvp_listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_published_product_table").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");

      } else if (wcmvp_link[1] == "trashed_product") {
        wcmvp_conditions = "trash_prod";
        $(".wcmvp_restore_op").css("display", "block");
        $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_trash_product_table").addClass("wcmvp_active_button");
        $(".wcmvp_listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_trash_product_table").addClass("mdc-tab--active");
        $(".wcmvp_listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_trash_product_table").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
      } else if (wcmvp_link[1] == "pending_product") {
        wcmvp_conditions = "pending_prod";
        $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_pending_product_table").addClass("wcmvp_active_button");
        $(".wcmvp_listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_pending_product_table").addClass("mdc-tab--active");
        $(".wcmvp_listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_pending_product_table").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
      }
      else {
        wcmvp_conditions = "all_prod";
        $(".wcmvp_listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_all_product_table").addClass("wcmvp_active_button");
        $(".wcmvp_listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_all_product_table").addClass("mdc-tab--active");
        $(".wcmvp_listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_all_product_table").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
      }
      var wcmvp_prod_data_table;
      wcmvp_count_ajax();
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
            $(document).find(".dataTables_length label:first").addClass('wcmvp_label_show_entries');
            $('.dataTables_paginate > .pagination .mdl-button--raised').addClass('wcmvp-pagination-btn-radius');
            $("<span class='wcmvp-focus-border'></span>").insertAfter(".dataTables_filter input");
          },
          'ajax': {
            'url': wcmvp_ajax_object.wcmvp_ajax_url,
            'data': {
              'action': 'wcmvp_product_table',
              'cond': wcmvp_conditions,
              'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
            },
            'type': 'POST',
            "dataType": 'json',
          },
          "order": [[2, "asc"]],
          columnDefs: [{
            orderable: false,
            targets: [0, 1, 5, 8],
          }]
        });
      }
      $(".wcmvp_div").removeClass("wcmvp-active");
      $(".wcmvp-product").addClass("wcmvp-active");
      $(".wcmvp-dashboard-panel").hide();
      $(".wcmvp-product-panel").show();
      $(".wcmvp_loader").hide();
      $(".wcmvp-orders-panel").hide();
      $(".wcmvp-withdraw-panel").hide();
      $(".wcmvp-Setting-panel").hide();
      $(".wcmvp-payment-panel").hide();
    }
    else if (text == "orders") {
      if (wcmvp_link[1] == "completed") {
        var wcmvp_load_cond = "complete_table";
        $(".listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_order_complete_button").addClass("wcmvp_active_button");
        $(".listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_order_complete_button").addClass("mdc-tab--active");
        $(".listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_order_complete_button").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
      }
      else if (wcmvp_link[1] == "processing") {
        var wcmvp_load_cond = "processing_table";
        $(".listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_order_processing_button").addClass("wcmvp_active_button");
        $(".listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_order_processing_button").addClass("mdc-tab--active");
        $(".listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_order_processing_button").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
      }
      else if (wcmvp_link[1] == "onhold") {
        var wcmvp_load_cond = "On_hold_table";
        $(".listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_order_On_hold_button").addClass("wcmvp_active_button");
        $(".listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_order_On_hold_button").addClass("mdc-tab--active");
        $(".listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_order_On_hold_button").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
      }
      else if (wcmvp_link[1] == "pending") {
        var wcmvp_load_cond = "pending_table";
        $(".listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_order_Pending_button").addClass("wcmvp_active_button");
        $(".listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_order_Pending_button").addClass("mdc-tab--active");
        $(".listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_order_Pending_button").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
      }
      else if (wcmvp_link[1] == "cancelled") {
        var wcmvp_load_cond = "cancel_table";
        $(".listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_order_Cancelled_button").addClass("wcmvp_active_button");
        $(".listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_order_Cancelled_button").addClass("mdc-tab--active");
        $(".listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_order_Cancelled_button").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
      }
      else if (wcmvp_link[1] == "refunded") {
        var wcmvp_load_cond = "refunded_table";
        $(".listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_order_Refunded_button").addClass("wcmvp_active_button");
        $(".listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_order_Refunded_button").addClass("mdc-tab--active");
        $(".listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_order_Refunded_button").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
      }
      else if (wcmvp_link[1] == "failed") {
        var wcmvp_load_cond = "failed_table";
        $(".listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_order_Failed_button").addClass("wcmvp_active_button");
        $(".listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_order_Failed_button").addClass("mdc-tab--active");
        $(".listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_order_Failed_button").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
      } else {
        var wcmvp_load_cond = "All_table";
      }
      var wcmvp_order_data_table;
      wcmvp_count_ajax();
      var wcmvp_ID = $('#wcmvp-order-all-table-id').attr("data-id");
      if (!$.fn.DataTable.isDataTable('#wcmvp-order-all-table-id')) {
        wcmvp_order_data_table = $('#wcmvp-order-all-table-id').dataTable({
          'processing': true,
          'stateSave': true,
          'info': false,
          'sortable': true,
          'serverSide': true,
          "select": true,
          'responsive': true,
          language: {
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
              'cond': wcmvp_load_cond,
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
      $(".wcmvp_div").removeClass("wcmvp-active");
      $(".wcmvp-orders").addClass("wcmvp-active");
      $(".wcmvp-dashboard-panel").hide();
      $(".wcmvp-product-panel").hide();
      $(".wcmvp-orders-panel").show();
      $(".wcmvp_loader").hide();
      $(".wcmvp-withdraw-panel").hide();
      $(".wcmvp-Setting-panel").hide();
      $(".wcmvp-payment-panel").hide();
    }
    else if (text == "withdraw") {

      if (wcmvp_link[1] == "approved") {
        $(".wcmvp_req_table").css("display", "none");
        $(".wcmvp_status_table").css("display", "block");
        $(".listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_approved_request").addClass("wcmvp_active_button");
        $(".listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_approved_request").addClass("mdc-tab--active");
        $(".listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_approved_request").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
        var wcmvp_withdraw_data_table;
        wcmvp_count_ajax();
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
      }
      else if (wcmvp_link[1] == "cancelled") {
        $(".wcmvp_req_table").css("display", "none");
        $(".wcmvp_status_table").css("display", "block");
        $(".listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_cancel_request").addClass("wcmvp_active_button");
        $(".listing_button").removeClass("mdc-tab--active");
        $("#wcmvp_cancel_request").addClass("mdc-tab--active");
        $(".listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_cancel_request").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
        var wcmvp_withdraw_data_table;
        wcmvp_count_ajax();
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

      } else {
        $(".listing_button").removeClass("wcmvp_active_button");
        $("#wcmvp_withdraw_request").addClass("wcmvp_active_button");
        $(".listing_button").removeClass("mdc-tab--active");
        $(".listing_button").find(".mdc-tab-indicator").removeClass("mdc-tab-indicator--active");
        $("#wcmvp_withdraw_request").find(".mdc-tab-indicator").addClass("mdc-tab-indicator--active");
        $("#wcmvp_withdraw_request").addClass("mdc-tab--active");
        var wcmvp_withdraw_data_table;
        wcmvp_count_ajax();
        if (!$.fn.DataTable.isDataTable('#wcmvp-withdraw-table-id')) {
          wcmvp_withdraw_data_table = $('#wcmvp-withdraw-table-id').DataTable({
            'processing': true,
            'stateSave': true,
            'info': false,
            'sortable': true,
            'serverSide': true,
            "select": true,
            'responsive': true,
            "pagingType": "full_numbers",
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
      }
      $(".wcmvp_div").removeClass("wcmvp-active");
      $(".wcmvp-withdraw").addClass("wcmvp-active");
      $(".wcmvp-dashboard-panel").hide();
      $(".wcmvp-product-panel").hide();
      $(".wcmvp-orders-panel").hide();
      $(".wcmvp-withdraw-panel").show();
      $(".wcmvp_loader").hide();
      $(".wcmvp-Setting-panel").hide();
      $(".wcmvp-payment-panel").hide();

    }
    else if (text == "Setting") {
      $(".wcmvp_div").removeClass("wcmvp-active");
      $(".wcmvp-setting").addClass("wcmvp-active");
      $(".wcmvp-dashboard-panel").hide();
      $(".wcmvp-product-panel").hide();
      $(".wcmvp-orders-panel").hide();
      $(".wcmvp-withdraw-panel").hide();
      $(".wcmvp-Setting-panel").show();
      $(".wcmvp_loader").hide();
      $(".wcmvp-payment-panel").hide();
    }
    else if (text == "payment") {
      $(".wcmvp_div").removeClass("wcmvp-active");
      $(".wcmvp-payments").addClass("wcmvp-active");
      $(".wcmvp-dashboard-panel").hide();
      $(".wcmvp-product-panel").hide();
      $(".wcmvp-orders-panel").hide();
      $(".wcmvp-withdraw-panel").hide();
      $(".wcmvp-Setting-panel").hide();
      $(".wcmvp-payment-panel").show();
      $(".wcmvp_loader").hide();
    } else {
      $(".wcmvp-dashboard-panel").show();
      $(".wcmvp_loader").hide();
    }

    $(document).on("click", ".wcmvp-modal-close", function () {
      $(this).closest(".wcmvp_modal").removeClass("wcmvp-modal-open");
      $("body").css("overflow-y", "scroll");
    });

    $(document).find("#wcmvp_bulk_action_order_check").select2({
      theme: "material",
      width: '100%',
    });

    $(document).find('#wcmvp_product_tags').select2({
      placeholder: wcmvp_ajax_object.wcmvp_translation.wcmvp_select_tag,
      allowClear: true,
      width: '100%',
    });

    $(document).find("#wcmvp_setup_country").select2({
      theme: "material",
      width: '100%',
    });

    $(document).find("#wcmvp_paymet_method").select2({
      theme: "material",
      width: '40%',
      placeholder: wcmvp_ajax_object.wcmvp_translation.wcmvp_select_payment,
    });

    $(document).find('#wcmvp_category').select2({
      theme: "material",
      placeholder: wcmvp_ajax_object.wcmvp_translation.wcmvp_select_cat,
      allowClear: true,
      width: '100%'
    });

    $(document).find("#wcmvp_country").select2({
      theme: "material",
      width: '100%',
    });

    $(document).find("#wcmvp_select_box").select2({
      theme: "material",
      width: '50%',
    });

    $(document).find("#wcmvp_filter_cat").select2({
      theme: "material",
      width: '40%',
    });

    $(document).find("#wcmvp_stock_status").select2({
      theme: "material",
      width: '31%',
    });

    $(document).find("#wcmvp_visibility").select2({
      theme: "material",
      width: '31%',
    });

    $(document).find("#wcmvp_archieve_filter").select2({
      theme: "material",
      width: '40%',
    });

    $(document).find(".wcmvp_order_filter_cust").select2({
      theme: "material",
      width: '100%',
      minimumInputLength: 3,
      placeholder: wcmvp_ajax_object.wcmvp_translation.wcmvp_for_reg_customer,
      ajax: {
        url: wcmvp_ajax_object.wcmvp_ajax_url,
        dataType: 'json',
        type: "POST",
        quietMillis: 50,
        data: function (term) {
          return {
            wcmvp_user_name: term,
            action: 'wcmvp_search_reg_users',
            wcmvp_nonce: wcmvp_ajax_object.wcmvp_ajax_nonce
          };
        },
        processResults: function (data, params) {
          var terms = [];
          if (data) {
            $.each(data, function (id, text) {
              terms.push({
                id: id,
                text: text
              });
            });
          }
          return {
            results: terms,
          };
        },
        cache: true,
      }
    });

    if ($.fn.datepicker) {
      $(document).find(".wcmvp_order_filter_date").datepicker({
        dateFormat: 'yy-mm-dd'
      });
    }

    $(document).on("click", ".wcmvp-dashboard", function () {
      window.history.replaceState(null, null, wcmvp_home[0]);
      $(".wcmvp_div").removeClass("wcmvp-active");
      $(".wcmvp-dashboard").addClass("wcmvp-active");
      $(".wcmvp-product-panel").hide();
      $(document).find(".wcmvp_panel").css('display','none');
      $(".wcmvp-dashboard-panel").show();
      $(".wcmvp-orders-panel").hide();
      $(".wcmvp-withdraw-panel").hide();
      $(".wcmvp-Setting-panel").hide();
      $(".wcmvp-payment-panel").hide();
      wcmvp_dashboard_data();
      wcmvp_count_ajax();
    });

    $(document).on("click", ".wcmvp-withdraw", function () {
      window.history.replaceState(null, null, wcmvp_home[0] + "#withdraw");
      var wcmvp_withdraw_data_table;
      wcmvp_count_ajax();
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
      $(".wcmvp_div").removeClass("wcmvp-active");
      $(".wcmvp-withdraw").addClass("wcmvp-active");
      $(".wcmvp-product-panel").hide();
      $(".wcmvp-dashboard-panel").hide();
      $(".wcmvp-orders-panel").hide();
      $(document).find(".wcmvp_panel").css('display','none');
      $(".wcmvp-withdraw-panel").show();
      $(".wcmvp-Setting-panel").hide();
      $(".wcmvp-payment-panel").hide();
    });
    $(document).on("click", ".wcmvp-setting", function () {
      window.history.replaceState(null, null, wcmvp_home[0] + "#Setting");
      $(".wcmvp_div").removeClass("wcmvp-active");
      $(".wcmvp-setting").addClass("wcmvp-active");
      $(".wcmvp-product-panel").hide();
      $(".wcmvp-dashboard-panel").hide();
      $(".wcmvp-orders-panel").hide();
      $(document).find(".wcmvp_panel").css('display','none');
      $(".wcmvp-withdraw-panel").hide();
      $(".wcmvp-Setting-panel").show();
      $(".wcmvp-payment-panel").hide();
    });
    $(document).on("click", ".wcmvp-payments", function () {
      window.history.replaceState(null, null, wcmvp_home[0] + "#payment");
      $(".wcmvp_div").removeClass("wcmvp-active");
      $(".wcmvp-payments").addClass("wcmvp-active");
      $(".wcmvp-product-panel").hide();
      $(".wcmvp-dashboard-panel").hide();
      $(".wcmvp-orders-panel").hide();
      $(document).find(".wcmvp_panel").css('display','none');
      $(".wcmvp-withdraw-panel").hide();
      $(".wcmvp-Setting-panel").hide();
      $(".wcmvp-payment-panel").show();
    });



    $(document).on("click", "#wcmvp-add-product", function () {
      if (!$(document).find('#wcmvp-button').hasClass('wcmvp_popup')) {
        $("#wcmvp_prdct_modal").addClass("wcmvp-modal-open");
        $("body").css("overflow", "hidden");
      }
      $(".wcmvp_endsec").show();
      $(".wcmvp-add-product-div").show();
      $(".wcmvp-add-product-div2").hide();
    })
    $(document).on("click", ".wcmvp-Create_new", function () {
      $(".wcmvp_endsec").hide();
      $(".wcmvp-add-product-div").show();
      $(".wcmvp-add-product-div2").show();
    })

  })


})(jQuery);


function wcmvp_count_ajax() {

  var data = {
    'action': 'wcmvp_update_count',
    'wcmvp_cond': 'wcmvp_order_page',
    'wcmvp_nonce': wcmvp_ajax_object.wcmvp_ajax_nonce
  };

  jQuery.post(wcmvp_ajax_object.wcmvp_ajax_url, data, function (wcmvp_response_count) {

    var wcmvp_all_prod_counts = wcmvp_response_count['wcmvp_prod_count_array'];
    var wcmvp_all_order_counts = wcmvp_response_count['wcmvp_order_count_array'];
    var wcmvp_all_withdraw_counts = wcmvp_response_count['wcmvp_withdraw_count_array'];
    var wcmvp_vendor_balance = wcmvp_response_count['wcmvp_vendor_bal'];

    jQuery(document).find(".wcmvp_all_prod").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_all + "(" + wcmvp_all_prod_counts['wcmvp_prod_all_count'] + ")");
    jQuery(document).find(".wcmvp_publish_prod").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_online + "(" + wcmvp_all_prod_counts['wcmvp_prod_publish_count'] + ")");
    jQuery(document).find(".wcmvp_pendin_prod").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_pending + "(" + wcmvp_all_prod_counts['wcmvp_prod_pending_count'] + ")");
    jQuery(document).find(".wcmvp_trash_prod").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_trash + "(" + wcmvp_all_prod_counts['wcmvp_prod_trash_count'] + ")");
    jQuery(document).find(".wcmvp_status_all").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_all + "(" + wcmvp_all_order_counts['wcmvp_order_all_count'] + ")");
    jQuery(document).find(".wcmvp_status_completed").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_complete + "(" + wcmvp_all_order_counts['wcmvp_order_complete_count'] + ")");
    jQuery(document).find(".wcmvp_status_processing").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_processing + "(" + wcmvp_all_order_counts['wcmvp_order_processing_count'] + ")");
    jQuery(document).find(".wcmvp_status_onhold").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_on_hold + "(" + wcmvp_all_order_counts['wcmvp_order_on_hold_count'] + ")");
    jQuery(document).find(".wcmvp_status_pending").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_pending + "(" + wcmvp_all_order_counts['wcmvp_order_pending_count'] + ")");
    jQuery(document).find(".wcmvp_status_cancelled").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_cancelled + "(" + wcmvp_all_order_counts['wcmvp_order_cancelled_count'] + ")");
    jQuery(document).find(".wcmvp_status_refunded").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_refunded + "(" + wcmvp_all_order_counts['wcmvp_order_refunded_count'] + ")");
    jQuery(document).find(".wcmvp_status_failed").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_failed + "(" + wcmvp_all_order_counts['wcmvp_order_failed_count'] + ")");
    jQuery(document).find(".wcmvp_withdraw_req").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_withdraw_req + "(" + wcmvp_all_withdraw_counts['wcmvp_withdraw_pending_count'] + ")");
    jQuery(document).find(".wcmvp_withdraw_approv").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_approved_req + "(" + wcmvp_all_withdraw_counts['wcmvp_withdraw_approved_count'] + ")");
    jQuery(document).find(".wcmvp_withdraw_cancel").html(wcmvp_ajax_object.wcmvp_translation.wcmvp_cancelled_req + "(" + wcmvp_all_withdraw_counts['wcmvp_withdraw_cancelled_count'] + ")");
    jQuery(document).find("#wcmvp_curent_bal").html(wcmvp_vendor_balance);

  }, 'json');

}