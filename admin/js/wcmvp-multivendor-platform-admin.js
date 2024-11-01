(function( $ ) {

	'use strict';

	/**

	 * All of the code for your admin-facing JavaScript source

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

		var wcmvp_url, wcmvp_split_url;

		if(window.location.href != "")
		{

			wcmvp_url = window.location.href;

			wcmvp_split_url = wcmvp_url.split("#");

			var wcmvp_store_setup_page_url  =  wcmvp_url.split("&");
			
		}

		$(document).ready(function( $ ){
			console.log(wcmvp_split_url);
		if(wcmvp_split_url[1] == "" || wcmvp_split_url[1] == null){
		

			$(document).find('#wpbody-content').show();

			$(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');

			$(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');

			$(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');

			$(document).find('#wcmvp-multivendor-platform-settings').css('display','none');

			$(document).find('#wcmvp-multivendor-platform-features').css('display','none');

			$(document).find('#wcmvp-admin-dashboard').addClass('nav-tab-active');

			$(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');

			$(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');

			$(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');

			$(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');

			$(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');

			$(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');

			$(document).find('#wcmvp-admin-customer').removeClass('nav-tab-active');

			$(document).find('#wcmvp-admin-verification').removeClass('nav-tab-active');

			$(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');

			$(document).find('#wcmvp-multivendor-platform-customer_1').hide();

			$(document).find('#wcmvp-social-api').css('display','none');
			$(document).find('.wcmvp_admin_customer_img').css('display','none');
			$(document).find('.wcmvp_other_reports_product_stats').hide();

			wcmvp_dashboard_report();

			wcmvp_dashboard_chart();


		}

		else if(wcmvp_store_setup_page_url[1] == "wcmvp_action=wcmvp_store_setup"){

			$(document).find('#wpbody-content').show();

			$(document).find('.wcmvp_settings_tab_wrapper').css('display','none');

			$(document).find('.wcmvp_sidbar_wrapper').css('display','none');

			$(document).find('#wcmvp-loader-image').hide();

			$(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');
			

			$(document).find('.wcmvp_store_page_section').addClass('wcmvp_store_page_section_margin');

			$(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');

			$(document).find('#wcmvp-multivendor-platform-vendor').css('display','none'); 

			$(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');

			$(document).find('#wcmvp-multivendor-platform-settings').css('display','none');

			$(document).find('#wcmvp-multivendor-platform-features').css('display','none');

			$(document).find('#wcmvp-general').css('display','none');

			$(document).find('#wcmvp-appearence').css('display','none');

			$(document).find('#wcmvp-selling-options').css('display','none');

			$(document).find('#wcmvp-withdraw-options').css('display','none');

			$(document).find('#wcmvp-payment-gateway-options').css('display','none');

			$(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');
			
			$(document).find('.wcmvp_report_top').css({"margin-left": "-28%", "width": "126%"});

			$(document).find('#wcmvp-multivendor-platform-seller-verification_1').css('display','none');
			$(document).find('#wcmvp-multivendor-platform-customer_1').css('display','none');
			$(document).find('#wcmvp-multivendor-platform-announcements').hide();
			$(document).find('#wcmvp-social-api').css('display','none');


		}

		else
		{
			if(wcmvp_url.indexOf('#') != -1)

			{

			}

			else

			{

				$(document).find('#wpbody-content').show();

				$(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');

				$(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');

				$(document).find('#wcmvp-multivendor-platform-features').css('display','none');

				$(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');

				$(document).find('#wcmvp-multivendor-platform-settings').css('display','none');

				$(document).find('#wcmvp-multivendor-platform-report').css('display','block');

				$(document).find('#wcmvp-admin-withdraw').removeClass('nav-tab-active');

				$(document).find('#wcmvp-admin-vendor').removeClass('nav-tab-active');

				$(document).find('#wcmvp-admin-features').removeClass('nav-tab-active');

				$(document).find('#wcmvp-admin-dashboard').addClass('nav-tab-active');

				$(document).find('#wcmvp-admin-settings').removeClass('nav-tab-active');

				$(document).find('#wcmvp-admin-reports').removeClass('nav-tab-active');

				$(document).find('#wcmvp-admin-all-orders').removeClass('nav-tab-active');

				$(document).find('#wcmvp-loader-image').show();

				$(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');

				$(document).find('#wcmvp_report_or_dashboard').attr('data-value','dashboard');

				wcmvp_dashboard_report();

				wcmvp_dashboard_chart();

			}

			$(document).find('.wcmvp_other_reports_product_stats').hide();

			$(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');

		}

			$(document).on('click','.wcmvp_launch_setup_btn',function(e){

				e.preventDefault();

				$(document).find('#wcmvp-loader-image').hide();

				$(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');

				$(document).find('#wcmvp-multivendor-platform-withdraw').css('display','none');

				$(document).find('.wcmvp_setup_welcome_page').hide();

				$(document).find('.wcmvp_store_page_section').removeClass('wcmvp_store_page_section_margin');

				$(document).find('#wcmvp-multivendor-platform-vendor').css('display','none');

				$(document).find('#wcmvp-multivendor-platform-features').css('display','none'); 

				$(document).find('#wcmvp-multivendor-platform-dashboard').css('display','none');

				$(document).find('#wcmvp-multivendor-platform-settings').css('display','block');

				$(document).find('#wcmvp-general').css('display','block');

				$(document).find('#wcmvp-appearence').css('display','none');

				$(document).find('#wcmvp-selling-options').css('display','none');

				$(document).find('#wcmvp-withdraw-options').css('display','none');

				$(document).find('#wcmvp-payment-gateway-options').css('display','none');

				$(document).find('.wcmvp_store_setup_menus').show();

				$(document).find('.wcmvp_store_setup_skip_btn').show();

				$(document).find('#wcmvp-general-page-submit').val(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_next);

				$(document).find('#wcmvp-general-page-submit').addClass('wcmvp_store_setup_page_btn_general');

				$(document).find('.wcmvp_store_setup_general_tab').addClass('wcmvp_setup_chng_background');	

				$(document).find('.wcmvp_settings_tab_wrapper').css('display','none');

				$(document).find('.wcmvp_sidbar_wrapper').css('display','none');

			})

			$(document).on('click','.wcmvp_store_setup_page_btn_general',function(){

				$(document).find('.wcmvp_store_setup_general_tab').removeClass('wcmvp_setup_chng_background');

				$(document).find('#wcmvp-loader-image').hide();

				$(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');

				$(document).find('.wcmvp_setup_welcome_page').hide();

				$(document).find('.wcmvp_store_page_section').removeClass('wcmvp_store_page_section_margin');

				$(document).find('.wcmvp_store_setup_seeling_options_tab').addClass('wcmvp_setup_chng_background');

				$(document).find('#wcmvp-multivendor-platform-settings').css('display','block');

				$(document).find('.wcmvp_store_setup_menus').show();

				$(document).find('#wcmvp-general').css('display','none');

				$(document).find('#wcmvp-appearence').css('display','none');

				$(document).find('#wcmvp-selling-options').css('display','block');

				$(document).find('#wcmvp-withdraw-options').css('display','none');

				$(document).find('#wcmvp-payment-gateway-options').css('display','none');

				$(document).find('#wcmvp-selling-page-submit').addClass('wcmvp_store_setup_page_btn_selling');

				$(document).find('.wcmvp_store_setup_skip_btn').show();

				$(document).find('#wcmvp-selling-page-submit').val(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_next);

			})

			$(document).on('click','.wcmvp_store_setup_page_btn_selling',function(){

				$(document).find('.wcmvp_store_setup_general_tab').removeClass('wcmvp_setup_chng_background');

				$(document).find('#wcmvp-loader-image').hide();

				$(document).find('.wcmvp_setup_welcome_page').hide();

				$(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');

				$(document).find('.wcmvp_store_page_section').removeClass('wcmvp_store_page_section_margin');

				$(document).find('.wcmvp_store_setup_seeling_options_tab').removeClass('wcmvp_setup_chng_background');

				$(document).find('.wcmvp_store_setup_withdraw_options_tab').addClass('wcmvp_setup_chng_background');

				$(document).find('.wcmvp_store_setup_menus').show();

				$(document).find('#wcmvp-multivendor-platform-settings').css('display','block');

				$(document).find('#wcmvp-general').css('display','none');

				$(document).find('#wcmvp-appearence').css('display','none');

				$(document).find('#wcmvp-selling-options').css('display','none');

				$(document).find('#wcmvp-withdraw-options').css('display','block');

				$(document).find('#wcmvp-withdraw-option-submit').addClass('wcmvp_store_setup_page_btn_withdraw');

				$(document).find('.wcmvp_store_setup_skip_btn').show();

				$(document).find('#wcmvp-withdraw-option-submit').val(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_next);

			})

			$(document).on('click','.wcmvp_store_setup_page_btn_withdraw',function(){

				$(document).find('.wcmvp_store_setup_general_tab').removeClass('wcmvp_setup_chng_background');

				$(document).find('#wcmvp-loader-image').hide();

				$(document).find('#wcmvp-admin-all-products').removeClass('nav-tab-active');

				$(document).find('.wcmvp_setup_welcome_page').hide();

				$(document).find('.wcmvp_store_page_section').removeClass('wcmvp_store_page_section_margin');

				$(document).find('.wcmvp_store_setup_seeling_options_tab').removeClass('wcmvp_setup_chng_background');

				$(document).find('.wcmvp_store_setup_withdraw_options_tab').removeClass('wcmvp_setup_chng_background');

				$(document).find('.wcmvp_store_setup_menus').show();

				$(document).find('.wcmvp_store_appreance_tab').addClass('wcmvp_setup_chng_background');

				$(document).find('#wcmvp-multivendor-platform-settings').css('display','block');

				$(document).find('#wcmvp-general').css('display','none');

				$(document).find('#wcmvp-appearence').css('display','block');

				$(document).find('#wcmvp-selling-options').css('display','none');

				$(document).find('#wcmvp-withdraw-options').css('display','none');

				$(document).find('#wcmvp-payment-gateway-options').css('display','none');

				$(document).find('#wcmvp-appearence-submit').addClass('wcmvp_store_setup_page_btn_appreance');

				$(document).find('.wcmvp_store_setup_skip_btn').show();

				$(document).find('#wcmvp-appearence-submit').val(wcmvp_general_page_object.wcmvp_translatable_js_strings.wcmvp_text_launch_multivendor-platform);

			})

			$(document).on('click','#wcmvp-appearence-submit',function(){

				if( $(document).find('.wcmvp_store_setup_skip_btn').css('display') == 'inline-block' || $(document).find('.wcmvp_store_setup_skip_btn').css('display') == 'inline' || $(document).find('.wcmvp_store_setup_skip_btn').css('display') == 'block' )
                {
					var wcmvp_setup_page_data = {

						'action' : 'wcmvp_setup_page_action',

						'wcmvp_setup_page_nonce_verify' : wcmvp_vendor_object.wcmvp_vendor_nonce

					};

					jQuery.post(wcmvp_vendor_object.wcmvp_ajax_url, wcmvp_setup_page_data,

						function( response )

						{

							window.location.href = response;

						},"json")
				}

			})
			$(document).find(".wcmvp_price_text").on('click',function(){
				
				$(document).find("#wcmvp-admin-all-orders").trigger("click");
				
				
			});
			$(document).find(".wcmvp_commission_text").on('click',function(){
				
				$(document).find("#wcmvp-admin-reports").trigger("click");
			
			});

		})


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

						var i, wcmvp_table = "<table class=' mdl-data-table'>";

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

						var j, wcmvp_table1 = "<table class='widefat'>";

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

})( jQuery );

