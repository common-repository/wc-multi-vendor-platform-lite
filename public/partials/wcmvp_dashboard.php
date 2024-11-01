<?php
   // This file contains the html for Vendor dashboard
   
   $wcmvp_count = $this->wcmvp_count_function();
   global $wpdb;
   $query = "SELECT ID FROM " . $wpdb->prefix . "posts LEFT JOIN (SELECT post_id,
   MAX(CASE WHEN meta_key = 'wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor_name
   FROM " . $wpdb->prefix . "postmeta GROUP BY post_id) wcmvp_selected_table ON " . $wpdb->prefix . "posts.`ID`= wcmvp_selected_table.`post_id`WHERE wcmvp_order_vendor_name IS NOT NULL AND wcmvp_order_vendor_name='%s' AND ( post_status='%s' OR post_status='%s')";
   $wcmvp_order_pending_count = $wpdb->get_results($wpdb->prepare($query, get_current_user_id(), 'wc-completed', 'wc-refunded'));
   foreach ($wcmvp_order_pending_count as $key => $value) {
   	$query = "SELECT * FROM " . $wpdb->prefix . "wc_order_stats WHERE order_id=%d";
   	$wcmvp_order_stats_Array[] = $wpdb->get_results($wpdb->prepare($query, $value->ID));
   }
   if (!empty($wcmvp_order_stats_Array)) {
   	$wcmvp_total_sales = 0;
   	$wcmvp_order_count = 0;
   	$wcmvp_total_saves = 0;
   	foreach ($wcmvp_order_stats_Array as $key => $value) {
   		if (isset($value) && !empty($value)) {
   			$wcmvp_total_sales = (int) $value[0]->net_total + (int) $wcmvp_total_sales;
   			$wcmvp_price = (int) $value[0]->net_total;
   			$wcmvp_author_id = get_current_user_id();
   			$wcmvp_commision_val = $this->wcmvp_commission($wcmvp_author_id, (int) $value[0]->net_total);
   			$wcmvp_total_saves = $wcmvp_commision_val[0] + $wcmvp_total_saves;
   			$wcmvp_order_count++;
   		} else {
   			$wcmvp_total_sales = 0;
   			$wcmvp_total_saves = 0;
   			$wcmvp_order_count = 0;
   		}
   	}
   	$wcmvp_total_saves = $wcmvp_total_sales - $wcmvp_total_saves;
   }
   $args = array(
   	'author'        => get_current_user_id(),
   	'orderby'       =>  'post_date',
   	'order'         =>  'ASC',
   	'posts_per_page' => -1,
   	'post_type'        => 'product',
   	'post_status'      => 'publish',
   );
   $wcmvp_posts = get_posts($args);
   if (!empty($wcmvp_posts) && is_array($wcmvp_posts)) {
   	$wcmvp_total_view = '0';
   	foreach ($wcmvp_posts as $key => $value) {
   		$wcmvp_views_count = get_post_meta($value->ID, 'wcmvp_product_view_count', true);
   		if ($wcmvp_views_count) {
   			$wcmvp_total_view =  (int) $wcmvp_views_count + (int) $wcmvp_total_view;
   			$wcmvp_all_view[$value->ID] = (int) $wcmvp_views_count;
   		}
   	}
   }
   ?>
<div class=" mdc-layout-grid mdc-elevation--z3 wcmvp-card-section">
   <h2 class="wcmvp-card-header"><?php esc_html_e("Overview","wc-multi-vendor-platform-lite") ?></h2>
   <div class="wcmvp_dashboard_content_wrappper">
      <div class='wcmvp_main_card'>
         <div class='wcmvp_inner_card card1'><span class="wcmvp_price_color"><?php echo get_woocommerce_currency_symbol() ?></span>
            <span class="wcmvp_price_quan">
            <?php echo (isset($wcmvp_total_sales) && !empty($wcmvp_total_sales)) ? wc_price($wcmvp_total_sales) : wc_price(0); ?>
            <span id="wcmvp_total_sold_product_amount"></span></span><br>
            <a id="entire_sales" href='#' class='wcmvp_price_text'><?php esc_html_e('Entire Sales ','wc-multi-vendor-platform-lite') ?>

            </a>
         </div>
         <div class='wcmvp_inner_card card1'><span class="wcmvp_commission_price_color"><i class="fas fa-piggy-bank"></i></span><span class="wcmvp_price_quan">
            <?php echo (isset($wcmvp_total_saves) && !empty($wcmvp_total_saves)) ? wc_price($wcmvp_total_saves) : wc_price(0);?>
            </span><br><a id="entire_savings" href='#' class='wcmvp_commission_text'>
            <?php esc_html_e("Entire Savings", "wc-multi-vendor-platform-lite") ?>
            </a>
         </div>
         <div class='wcmvp_inner_card card1'>
            <span class="wcmvp_product_color"><i class='material-icons'>
            <?php echo esc_html('shopping_cart') ?></i></span>
            <span class="wcmvp_price_quan">
            <?php $wcmvp_temp_var = (isset($wcmvp_order_count) && !empty($wcmvp_order_count)) ? $wcmvp_order_count : 0;
               esc_html_e($wcmvp_temp_var,"wc-multi-vendor-platform-lite");
               ?></span>
            <?php esc_html_e(' items','wc-multi-vendor-platform-lite') ?>
            <br><a id="entire_orders" href='#' class='wcmvp_commission_text'>
            <?php esc_html_e("Entire Orders", "wc-multi-vendor-platform-lite") ?>
            </a>
         </div>
         <div class='wcmvp_inner_card card1'>
            <span class="wcmvp_product_views_color"><i class='material-icons'>
            <?php echo esc_html('visibility') ?></i></span>
            <span class="wcmvp_price_quan">
            <?php $wcmvp_temp_var = (isset($wcmvp_total_view) && !empty($wcmvp_total_view)) ? $wcmvp_total_view : 0;
               esc_html_e($wcmvp_temp_var,"wc-multi-vendor-platform-lite"); ?></span>
            <br><a id="entire_views_of_all_product" href='#' class='wcmvp_commission_text'>
            <?php esc_html_e("Entire views of all products", "wc-multi-vendor-platform-lite") ?>
            </a>
         </div>
      </div>
   </div>
   <div></div>
</div>
<div class="wcmvp-chart-wrapper">
   <div class="mdc-elevation--z9 wcmvp-sales-chart-container chrt">
      <canvas id="wcmvp_sales_chart"></canvas>
   </div>
   <div class="mdc-elevation--z9 wcmvp-order-chart-container crcl">
      <div id="wcmvp-chart-circle">
         <canvas id="wcmvp_order_chart"></canvas>
      </div>
   </div>
</div>
<div class=" mdc-layout-grid mdc-elevation--z3 wcmvp-card-section">
   <h2 class="wcmvp-card-header"><?php esc_html_e("Order  Overview","wc-multi-vendor-platform-lite") ?>  </h2>
   <div class="wcmvp_dashboard_content_wrappper">
      <div class='wcmvp_main_card'>
         <div class='wcmvp_inner_card1 card1'><span class="wcmvp_order_completed_color"><i class='far fa-handshake'></i></span>
            <span class="wcmvp_price_quan"><?php $wcmvp_temp_var = isset($wcmvp_count['wcmvp_order_count_array']['wcmvp_order_complete_count']) ? $wcmvp_count['wcmvp_order_count_array']['wcmvp_order_complete_count'] : 0;
               esc_html_e($wcmvp_temp_var,"wc-multi-vendor-platform-lite");?>
            </span><br><a id="all_completed_order_of_vendor" href='#' class='wcmvp_order_completed_text'>
            <?php esc_html_e("All completed order of vendor", "wc-multi-vendor-platform-lite") ?></a>
         </div>
         <div class='wcmvp_inner_card1 card1'><span class="wcmvp_order_processing_color"><i class="fas fa-spinner"></i></span><span class="wcmvp_price_quan"><?php $wcmvp_temp_var = isset($wcmvp_count['wcmvp_order_count_array']['wcmvp_order_processing_count']) ? $wcmvp_count['wcmvp_order_count_array']['wcmvp_order_processing_count'] : 0;esc_html_e($wcmvp_temp_var,"wc-multi-vendor-platform-lite");?>
            </span><br><a id="all_processing_order_of_vendor" href='#' class='wcmvp_order_completed_text'>
            <?php esc_html_e("All processing order of vendor", "wc-multi-vendor-platform-lite") ?></a>
         </div>
         <div class='wcmvp_inner_card1 card1'><span class="wcmvp_order_on_hold_color"><i class='material-icons'><?php echo esc_html('pan_tool') ?></i></span><span class="wcmvp_price_quan">
            <?php $wcmvp_temp_var = isset($wcmvp_count['wcmvp_order_count_array']['wcmvp_order_on_hold_count']) ? $wcmvp_count['wcmvp_order_count_array']['wcmvp_order_on_hold_count'] : 0 ; 
               esc_html_e($wcmvp_temp_var,"wc-multi-vendor-platform-lite");?>
            </span><br><a id="all_on-hold_order_of_vendor" href='#' class='wcmvp_order_completed_text'>
            <?php esc_html_e("All on-hold order  of vendor", "wc-multi-vendor-platform-lite") ?></a>
         </div>
         <div class='wcmvp_inner_card1 card1'><span class="wcmvp_order_pending_color">
            <i class='material-icons'><?php echo esc_html('autorenew') ?></i>	  
            </span><span class="wcmvp_price_quan"><span>
            <?php $wcmvp_temp_var = isset($wcmvp_count['wcmvp_order_count_array']['wcmvp_order_pending_count']) ? $wcmvp_count['wcmvp_order_count_array']['wcmvp_order_pending_count'] : 0; 
               esc_html_e($wcmvp_temp_var,"wc-multi-vendor-platform-lite") ?></span>
            </span><br><a id="all_pending_order_of_vendor" href='#' class='wcmvp_order_completed_text'>
            <?php esc_html_e("All pending order  of vendor", "wc-multi-vendor-platform-lite") ?></a>
         </div>
      </div>
   </div>
</div>
<div class=" mdc-layout-grid mdc-elevation--z3 wcmvp-card-section">
   <h2 class="wcmvp-card-header"><?php esc_html_e("Product & Withdraw Overview","wc-multi-vendor-platform-lite") ?>  </h2>
   <div class="wcmvp_dashboard_content_wrappper">
      <div class='wcmvp_main_card'>
         <div class='wcmvp_inner_card1 card1'><span class="wcmvp_product_publish_color">
            <i class='material-icons'><?php echo esc_html('shopping_basket') ?></i>
            </span>
            <span class="wcmvp_price_quan"><?php $wcmvp_temp_var =  isset($wcmvp_count['wcmvp_prod_count_array']['wcmvp_prod_publish_count']) ? $wcmvp_count['wcmvp_prod_count_array']['wcmvp_prod_publish_count'] : 0; 
               esc_html_e($wcmvp_temp_var,"wc-multi-vendor-platform-lite");
               ?>
            </span>
            <a id="all_published_products_of_vendor" href='#' class='wcmvp_order_completed_text'>
            <?php esc_html_e("All published products of vendor", "wc-multi-vendor-platform-lite") ?></a>
         </div>
         <div class='wcmvp_inner_card1 card1'><span class="wcmvp_product_pending_color"><i class="fas fa-spinner"></i></span><span class="wcmvp_price_quan"><?php $wcmvp_temp_var_var = isset($wcmvp_count['wcmvp_prod_count_array']['wcmvp_prod_pending_count']) ? $wcmvp_count['wcmvp_prod_count_array']['wcmvp_prod_pending_count'] : 0; 
            esc_html_e($wcmvp_temp_var_var);
            ?></span><br>
            <a id="all_pending_products_of_vendor" href='#' class='wcmvp_order_completed_text'>
            <?php esc_html_e("All pending products of vendor", "wc-multi-vendor-platform-lite") ?>
            </a>
         </div>
         <div class='wcmvp_inner_card1 card1'><span class="wcmvp_withdraw_pending_color"><i class="fas fa-funnel-dollar"></i></span><span class="wcmvp_price_quan">
            <?php $wcmvp_temp_var = isset($wcmvp_count['wcmvp_withdraw_count_array']['wcmvp_withdraw_pending_count']) ? $wcmvp_count['wcmvp_withdraw_count_array']['wcmvp_withdraw_pending_count']: 0; 
               esc_html_e($wcmvp_temp_var ,"wc-multi-vendor-platform-lite");?>
            </span><br><a id="all_pending_withdraw_of_vendor" href='#' class='wcmvp_order_completed_text'>
            <?php esc_html_e("All pending withdraw request of vendor","wc-multi-vendor-platform-lite"); ?></a>
         </div>
         <div class='wcmvp_inner_card1 card1'><span class="wcmvp_withdraw_approved_color"><i class='material-icons'><?php echo esc_html('autorenew') ?></i>	  </span><span class="wcmvp_price_quan">
            <?php $wcmvp_temp_var = isset($wcmvp_count['wcmvp_withdraw_count_array']['wcmvp_withdraw_approved_count']) ? $wcmvp_count['wcmvp_withdraw_count_array']['wcmvp_withdraw_approved_count'] : 0; 
               esc_html_e($wcmvp_temp_var,"wc-multi-vendor-platform-lite");
               ?></span>
            <br><a id="all_approved_withdraw_of_vendor" href='#' class='wcmvp_order_completed_text'>
            <?php esc_html_e("All approved withdraw request of vendor","wc-multi-vendor-platform-lite"); ?></a>
         </div>
      </div>
   </div>
</div>
<?php
   do_action("wcmvp_dashboard_extra_fields");
   ?>