//This file is used for admin dashboard section jquery and javascript
(function( $ ) {

    'use strict';

    var wcmvp_url, wcmvp_split_url;

    if(window.location.href != ""){

    wcmvp_url = window.location.href;

    wcmvp_split_url = wcmvp_url.split("#");

    }

        $(document).ready(function( $ ){

		    if(wcmvp_split_url[1] == 'report'){

          // id's of each menu to intially hide them

          $(document).find('#wpbody-content').show();
          $(document).find('.wcmvp_dash_page_heading').show();
          $(document).find('.wcmvp_sidbar_wrapper').show();

          $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');

          $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');

          $(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');

          $(document).find('#wcmvp-multivendor-platform-features').css('display','none');   

          $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');
                      
          $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');

          $(document).find('#wcmvp-multivendor-platform-report').css('display','block');
          $(document).find('#wcmvp-multivendor-platform-announcements').hide();
          $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
          $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
          $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
          $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
          $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
          $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');

          $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');

          $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');

				  $(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');

          $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');

          $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');

          $(document).find('#wcmvp-admin-reports').addClass('nav-tab-active');

          $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');

          $(document).find('#wcmvp-loader-image').show();

          $(document).find('#wcmvp_report_or_dashboard').attr('data-value','report');

          $(document).find('.wcmvp_other_reports_product_stats').show();

          $(document).find('.wcmvp_dashboard_content_wrappper').hide();

          $(document).find(".row").show();

          $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
          $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
          $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
          $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
          $(document).find('.wcmvp_report_submenu').css('display','block');


          wcmvp_dashboard_report();

          wcmvp_dashboard_chart();

          wcmvp_bar_chert_for_product_stats();

      }

      $('#wcmvp-admin-reports').on('click', function(){

        $(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');

        $(document).find('.wcmvp_dash_page_heading').show();

        $(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');


        $(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');

        $(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');

        $(document).find('#wcmvp-multivendor-platform-features').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-announcements').hide();
        $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-seller-verification_1').hide();
        $(document).find("#wcmvp-admin-announcements").removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-seller-verification').removeClass('nav-tab-active');

        $(document).find('#wcmvp-multivendor-platform-settings').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-report').css('display','block');
        $(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-dashboard').removeClass('nav-tab-active');
				$(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');

        $(document).find('#wcmvp-admin-reports').addClass('nav-tab-active');

        $(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');

        $(document).find('.wcmvp-submenu').css('display','none');

        $(document).find('#wcmvp-loader-image').show();

        $(document).find('#wcmvp_report_or_dashboard').attr('data-value','report');

        $(document).find('.wcmvp_other_reports_product_stats').show();

        $(document).find('.wcmvp_dashboard_content_wrappper').hide();

        $(document).find(".row").show();

        $(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');
        $(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');
        $(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
        $(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
        $('.wcmvp_report_submenu').css('display','block');

        wcmvp_dashboard_report();

        wcmvp_dashboard_chart();

        wcmvp_bar_chert_for_product_stats();

      })
      $(document).on('click','.wcmvp_report_box',function(){
          if($(document).find('#wcmvp_report_or_dashboard').attr('data-value') == 'dashboard')

          {

              $('#wcmvp-admin-reports').trigger('click');

          }
      })    })
    function wcmvp_dashboard_report()

    {

        var wcmvp_dashboard_data = {

            'action' : 'wcmvp_dashboard_page_action',

            'wcmvp_dashboard_page_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce

        };

        jQuery.post(wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_dashboard_data,

            function( response )

            {

                $('#wcmvp-loader-image').hide();

                if(response != "")

                {

                    $(document).find('#wcmvp_total_sold_product_amount').html(response['wcmvp_dashboard_report_section_data']['wcmvp_total_sold_product_amount']);

                    $(document).find('#wcmvp_get_monthly_created_product').html(response['wcmvp_dashboard_report_section_data']['wcmvp_get_monthly_created_product']);

                    $(document).find('#wcmvp_get_monthly_created_vendor').html(response['wcmvp_dashboard_report_section_data']['wcmvp_get_monthly_created_vendor']);

                    $(document).find('#wcmvp_unapproved_vendors').html(response['wcmvp_dashboard_report_section_data']['wcmvp_unapproved_vendors']);

                    $(document).find('#wcmvp_unapproved_withdraw_requests').html(response['wcmvp_dashboard_report_section_data']['wcmvp_unapproved_withdraw_requests']);

                    $(document).find('#wcmvp_admin_commission_value').html(response['wcmvp_dashboard_report_section_data']['wcmvp_admin_commission_value']);

                    $(document).find('#wcmvp_total_sold_product').html(response['wcmvp_dashboard_report_section_data']['wcmvp_total_sold_product']);

                    $(document).find('#wcmvp_total_orders_count').html(response['wcmvp_dashboard_report_section_data']['wcmvp_total_orders_count']);
                    var i, wcmvp_table = "<table class='widefat mdl-data-table'>";

                    wcmvp_table += "<thead><tr><th scope='col'><strong>"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_product_name+"</strong></th>";

                    wcmvp_table += "<th scope='col'><strong>"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_vendor+"</strong></th>";

                    wcmvp_table += "<th scope='col'><strong>"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_product_sold+"</strong></th>";

                    wcmvp_table += "<th scope='col'><strong>"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_total_sale_amount+"</strong></th>";

                    wcmvp_table += "</tr></thead>";
                    for( i=0; i < response['wcmvp_top_selling_products_array'].length; i++ )

                    {

                        wcmvp_table += '<tr><td scope="col"><strong>' + response['wcmvp_top_selling_products_array'][i]['wcmvp_product_title'] + '</strong></td>';

                        wcmvp_table += '<td scope="col"><strong>' + response['wcmvp_top_selling_products_array'][i]['wcmvp_user_store_name'] + '</strong></td>'

                        wcmvp_table += '<td scope="col"><strong>' + response['wcmvp_top_selling_products_array'][i]['wcmvp_product_quantity'] + '</strong></td>'

                        wcmvp_table += '<td scope="col"><strong>' + response['wcmvp_top_selling_products_array'][i]['wcmvp_product_price'] + '</strong></td>'

                        wcmvp_table += '</tr>';

                    }

                    wcmvp_table += "</table>";

                    $(document).find('#wcmvp_dashboard_top_selling_products').html(wcmvp_table);
                    var j, wcmvp_table1 = "<table class='widefat mdl-data-table'>";

                    wcmvp_table1 += "<thead><tr><th scope='col'><strong>"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_vendor_store_name+"</strong></th>";

                    wcmvp_table1 += "<th scope='col'><strong>"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_orders_completed+"</strong></th>";

                    wcmvp_table1 += "<th scope='col'><strong>"+wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_product_sold+"</strong></th>";

                    wcmvp_table1 += "</tr></thead>";
                    for( j=0; j < response['wcmvp_top_sellers'].length; j++ )

                    {

                        wcmvp_table1 += '<tr><td scope="col"><strong>' + response['wcmvp_top_sellers'][j]['wcmvp_user_store_name'] + '</strong></td>';

                        wcmvp_table1 += '<td scope="col"><strong>' + response['wcmvp_top_sellers'][j]['wcmvp_number_of_orders_by_vendors_count'] + '</strong></td>'

                        wcmvp_table1 += '<td scope="col"><strong>' + response['wcmvp_top_sellers'][j]['wcmvp_item_count_by_top_sellers_data'] + '</strong></td>'

                        wcmvp_table1 += '</tr>';

                    }

                    wcmvp_table1 += "</table>";

                    $(document).find('#wcmvp_dashboard_top_sellers').html(wcmvp_table1);
                }
            },"json");

    }
    function wcmvp_dashboard_chart()
    {
        var date = new Date(); 
        var month = date.getMonth();
        date.setDate(1);
        var all_days = [];
        while (date.getMonth() == month) {
          var d = date.getFullYear() + '-' + (date.getMonth()+1) + '-' + date.getDate().toString().padStart(2, '0');
          all_days.push(d);
          date.setDate(date.getDate() + 1); 
        }
        /* line chart */
        var wcmvp_count_data = {
          'action' : 'wcmvp_chart_data_action',
          'wcmvp_chart_data_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce
      };
      jQuery.post(wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_count_data,
          function( response ){
            if( response != "" )
            {
              var wcmvp_dash_noty_count = "";
              if( response['wcmvp_orders_count'] != '' ) 
              {
                var wcmvp_dash_orders_count, i;
                wcmvp_dash_orders_count = '<div class="wcmvp_dashbord_orders">'+response['wcmvp_orders_count']['wcmvp_pending_orders_count']+' - Pending Orders</div><hr>';
                wcmvp_dash_orders_count += '<div class="wcmvp_dashbord_orders">'+response['wcmvp_orders_count']['wcmvp_processing_orders_count']+' - Processing Orders</div><hr>';
                wcmvp_dash_orders_count += '<div class="wcmvp_dashbord_orders">'+response['wcmvp_orders_count']['wcmvp_on_hold_orders_count']+' - On Hold Orders</div><hr>';
                wcmvp_dash_orders_count += '<div class="wcmvp_dashbord_orders">'+response['wcmvp_orders_count']['wcmvp_cancelled_orders_count']+' - Cancelled Orders</div><hr>';
                wcmvp_dash_orders_count += '<div class="wcmvp_dashbord_orders">'+response['wcmvp_orders_count']['wcmvp_failed_orders_count']+' - Failed Orders</div><hr>';
              }
              if( response['wcmvp_notifications'] != '' )
              {
                for( var i=0; i <= response['wcmvp_notifications'].length-1 ; i++ )
                {
                wcmvp_dash_noty_count += '<div class="wcmvp_dashbord_orders">'+response['wcmvp_notifications'][i]+'</div><hr>';
                
                if( i == 5 )
                {
                  break;
                }
                }
              }
              $(document).find('#wcmvp_dashboard_notification_area').html(wcmvp_dash_noty_count);
              $(document).find('#wcmvp_dashboard_store_stats').html(wcmvp_dash_orders_count);
              if (jQuery("#wcmvp_vendor_as_line_chart").length) {
                var ctx = document.getElementById("wcmvp_vendor_as_line_chart").getContext('2d');
                var bar = new Chart(ctx, {
                  type: 'line',
                  data: {
                    labels: all_days,
                    datasets: [{
                      label: [wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_number_of_orders],
                      data: response['wcmvp_order_count'],
                      backgroundColor:["#e6e6e6"],
                      borderColor: ['#9999ff'],
                      borderWidth: 2,
                    },
                    {
                      label: [wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_total_product],
                      data: response['wcmvp_product_count'],
                      backgroundColor:["#e6e6e6"],
                      borderColor: ['#ff99dd'],
                      borderWidth: 2,
                    },
                    {
                    label: [wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_commission],
                    data: response['wcmvp_commission_count'],
                    backgroundColor:["#e6e6e6"],
                    borderColor: ['#80ff80'],
                    borderWidth: 2,
                  }]
                  },
                  options: {
                    responsive: true,
                    scales: {
                      yAxes: [{
                        barPercentage: .1,
                        ticks: {
                          beginAtZero:true,
                        }
                      }]
                    }
                  }
          
                });
              }
            }
          },'json');
    }

  function wcmvp_bar_chert_for_product_stats()

  {

    var wcmvp_count_data = {

      'action' : 'wcmvp_chart_data_action_for_product_stats',

      'wcmvp_chart_data_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce

  };

  jQuery.post(wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_count_data,

      function( response ){

        if( response != "" )

        {

          if (jQuery("#wcmvp_product_as_bar_chart").length) {

            var ctx = document.getElementById("wcmvp_product_as_bar_chart");

            var bar = new Chart(ctx, {
              type: 'bar',

              width: 800,

              data: {

                labels: [wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_online, wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_draft,wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_pending,wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_total],

                datasets: [{

                  label: wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_product_stats,

                  data: response['wcmvp_product_stats'],

                  backgroundColor: ['#ff99ff', '#b3ffb3','#ffff80', '#ff8080'],

                  borderWidth: 0,

                }]

              },

              options: {

                responsive: true,

                scales: {

                  yAxes: [{

                    barPercentage: .1,

                    ticks: {

                      beginAtZero:true,

                    }

                  }]

                }

              }

            });

          }

          if (jQuery("#wcmvp_vendor_as_pie_chart").length) {

          var ctx = document.getElementById("wcmvp_vendor_as_pie_chart");

          var myChart = new Chart(ctx, {

            type: 'pie',

            data: {

              labels: [wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_approved_vendors, wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_waiting_for_awaiting_approval],

              datasets: [{

                data: response['wcmvp_total_vendoors'],

                backgroundColor:["#ff99cc", "#66b3ff", "#ccff66"],

                hoverBackgroundColor:["#06a8b5", "#f1556c", "#e3eaef"],

                borderColor: [

                '#ffffff'

                ],

                borderWidth: 0,

              }]

            },

            options: {

            }

          });

        }

      }

    },'json');

  }
})( jQuery );