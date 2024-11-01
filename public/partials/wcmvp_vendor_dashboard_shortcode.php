<?php

// This file contains the html for vendor dashboard page

$wcmvp_options = get_option("wcmvp_page_setting");
if (!empty($wcmvp_options) && is_array($wcmvp_options)) {
	$wcmvp_title = $wcmvp_options['wcmvp_page_setting_dashboard'];
} else {
	$wcmvp_title = '';
}
$wcmvp_options_array  =  get_option('wcmvp_general_setting');

if (!empty($wcmvp_options_array) && is_array($wcmvp_options_array)) {
	$wcmvp_endpoint_page = $wcmvp_options_array['wcmvp_store_url'];
} else {
	$wcmvp_endpoint_page = '';
}
$wcmvp_current_usr_nicename = wp_get_current_user()->user_nicename;
global $wp_query;
global $pagenow;
if (($pagenow != 'post.php') && (is_object($wp_query->post)) && ($wp_query->post->ID == $wcmvp_title) && current_user_can("multivendor-platformr")) {
	$wcmvp_user_meta = get_user_meta(get_current_user_id(), "wcmvp_vendor_store_setup", true);
	if (filter_var($wcmvp_user_meta, FILTER_VALIDATE_BOOLEAN)) {
?>
<div class="wcmvp_loader">
	<div class="wcmvp_loader_box">
		<div class="wcmvp-loader-img-div">
			<img id="wcmvp_loader_gif" class="wcmvp_datatble_loader" src='<?php echo esc_url(WCMVP_PUBLIC_IMAGES_URL."wcmvp_loader.gif") ?>'>
		</div>
	</div>
</div>
		<div class="wcmvp_wrap">
			<aside class="mdc-drawer wcmvp_vendor_drawer wcmvp_sidebar_list">
				<div class="wcmvp-user-name-display">
					<h4 class="wcmvp-user-name">
					<?php if( !empty( get_option('active_plugins'))){
            $wcmvp_installed_plugins = get_option('active_plugins');
            if( isset($wcmvp_installed_plugins) && !empty($wcmvp_installed_plugins) )
			{
				if(in_array('wc-multi-vendor-platform-lite/wcmvp-multivendor-platform.php',$wcmvp_installed_plugins))
				{
					?>
					<a href="<?php site_url() ?>" class="wcmvp_features_logo"><img class="image_11" src="<?php echo esc_url( WCMVP_PUBLIC_IMAGES_URL.'wcmvp_logo_pro.png')?>" alt="Logo"></a>
					<?php
				}else{
					?>
					<a href="<?php site_url() ?>" class="wcmvp_features_logo"><img class="image_11" src="<?php echo esc_url( WCMVP_PUBLIC_IMAGES_URL.'wcmvp_logo_lite.png')?>" alt="Logo"></a>
					<?php
					
				}
			}
		}
					?>
					</h4>
				</div>
				<div class="mdc-drawer__content" id="wcmvp_drawer_content">
					<div class="wcmvp-sidebar-close"><i class="fas fa-times"></i></div>
					<?php
					$wcmvp_menu_array[] = '<nav class="mdc-list">';
					$wcmvp_menu_array[] = 	'<li class="wcmvp-active wcmvp_div wcmvp-dashboard  wcmvp_sidebar_list_item">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="#dashboard" aria-current="page">
													<i class="material-icons mdc-list-item__graphic" aria-hidden="true">'. esc_html('airplay') .'</i>
													<span class="mdc-list-item__text ">' . esc_html__("Dashboard", "wc-multi-vendor-platform-lite") . '</span>
												</a>
											 </li>';
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-coupons">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="#coupon">
													<i class="fa fa-tag mdc-list-item__graphic wcmvp-font-icon" aria-hidden="true"></i>
													<span class="mdc-list-item__text">' . esc_html__("Coupons", "wcmvp-multivendor-platform-pro") . '</span>
												</a>
											</li>';
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-reviews">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="#review">
													<i class="material-icons mdc-list-item__graphic" aria-hidden="true">rate_review</i>
													<span class="mdc-list-item__text">' . esc_html__("Reviews", "wcmvp-multivendor-platform-pro") . '</span>
												</a>
											</li>';
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-verification">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="#verification">
													<i class="material-icons mdc-list-item__graphic" aria-hidden="true">verified_user</i>
													<span class="mdc-list-item__text">' . esc_html__("Identity Verification", "wcmvp-multivendor-platform-pro") . '</span>
												</a>
											</li>';
					
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-product">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="#product">
													<i class="material-icons mdc-list-item__graphic" aria-hidden="true">'. esc_html('local_mall') .'</i>
													<span class="mdc-list-item__text">' . esc_html__("Product", "wc-multi-vendor-platform-lite") . '</span>
												</a>
											</li>';
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-orders">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="#orders">
													<i class="material-icons mdc-list-item__graphic" aria-hidden="true">'. esc_html('local_grocery_store') .'</i>
													<span class="mdc-list-item__text">' . esc_html__("Orders", "wc-multi-vendor-platform-lite") . '</span>
												</a>
											</li>';
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-reports">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="#report">
													<i class="material-icons mdc-list-item__graphic">poll</i>
													<span class="mdc-list-item__text">' . esc_html__("Reports", "wcmvp-multivendor-platform-pro") . '</span>
												</a>
											</li>';
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-setting">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="#Setting">
													<i class="material-icons mdc-list-item__graphic" aria-hidden="true">'. esc_html('settings') .'</i>
													<span class="mdc-list-item__text">' . esc_html__("Store-Settings", "wc-multi-vendor-platform-lite") . '</span>
												</a>
											</li>';
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-payments">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="#payment">
													<i class="material-icons mdc-list-item__graphic" aria-hidden="true">'. esc_html('account_balance_wallet') .'</i>
													<span class="mdc-list-item__text">' . esc_html__("Payments", "wc-multi-vendor-platform-lite") . '</span>
												</a>
											</li>';
					$wcmvp_menu_array[]='<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-shipping">
											<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="#shipping">
												<i class="material-icons mdc-list-item__graphic" aria-hidden="true">local_shipping</i>
												<span class="mdc-list-item__text">' . esc_html__("Shipping", "wcmvp-multivendor-platform-pro") . '</span>
											</a>
										</li>';
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-withdraw">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="#withdraw">
													<i class="mdc-list-item__graphic material-icons">'. esc_html('attach_money') .'</i>
													<span class="mdc-list-item__text">' . esc_html__("Withdrawals", "wc-multi-vendor-platform-lite") . '</span>
												</a>
											</li>';
					$wcmvp_url = $this->wcmvp_vendor_store_url();
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-store">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="' . esc_url($wcmvp_url) . '">
													<i class="material-icons mdc-list-item__graphic" aria-hidden="true">'. esc_html('storefront') .'</i>
													<span class="mdc-list-item__text">' . esc_html__("Go to Store", "wc-multi-vendor-platform-lite") . '</span>
												</a>
											</li>';
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-edit-profile">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="' . wc_customer_edit_account_url() . '">
													<i class="material-icons mdc-list-item__graphic" aria-hidden="true">account_circle</i>
													<span class="mdc-list-item__text">' . esc_html__("Edit Profile", "wc-multi-vendor-platform-lite") . '</span>
												</a>
											</li>';
					$wcmvp_menu_array[] = '<li class="wcmvp_div  wcmvp_sidebar_list_item wcmvp-logout">
												<a class="mdc-list-item wcmvp-dash-button wcmvp-href" href="' . wp_logout_url(get_home_url())  . '">
													<i class="fas fa-sign-out-alt mdc-list-item__graphic"></i>
													<span class="mdc-list-item__text">' . esc_html__("Log Out", "wc-multi-vendor-platform-lite") . '</span>
												</a>
											</li>';
					$wcmvp_menu_array[] = '</nav>';
					$wcmvp_menu_array = apply_filters("wcmvp_vendor_dashboard_menu", $wcmvp_menu_array);
					foreach ($wcmvp_menu_array as $key => $value) {
						echo $value;	// This variable holds html
					}
					?>
				</div>
			</aside>
			<div class="wcmvp_multivendor_platform_main_body wcmvp-panels" id="wcmvp_pannels">
				<div class="wcmvp-dashboard-panel wcmvp_panel">
					<?php include_once WCMVP_PUBLIC_PARTIAL . "wcmvp_dashboard.php";  ?>
				</div>
				<div class="wcmvp-product-panel wcmvp_panel wcmvp_cards">
					<?php include_once WCMVP_PUBLIC_PARTIAL . "wcmvp_multivendor_platform-shortcode-product.php"; ?></div>
				<div class="wcmvp-orders-panel wcmvp_panel wcmvp_cards">
					<?php include_once WCMVP_PUBLIC_PARTIAL . "wcmvp-Vendor-Orders.php";	?>
				</div>
				<div class="wcmvp-withdraw-panel wcmvp_panel wcmvp_cards">
					<?php include_once WCMVP_PUBLIC_PARTIAL . "wcmvp-Vendor-withdraw.php";	?>
				</div>
				<div class="wcmvp-Setting-panel wcmvp_panel wcmvp_cards">
					<?php include_once WCMVP_PUBLIC_PARTIAL . "wcmvp-Vendor-store-settings.php";	?>
				</div>
				<div class="wcmvp-payment-panel wcmvp_panel wcmvp_cards">
					<?php include_once WCMVP_PUBLIC_PARTIAL . "wcmvp-Vendor-Payments.php";	?>
				</div>
				<div class="wcmvp-coupon wcmvp_panel">
					<a href="https://codexinfra.com/bazaar/pricing/" target="_blank"><img src="<?php echo WCMVP_PUBLIC_IMAGES_URL . "Vendor-Dashboard-bazaar_coupon.png"; ?>" alt="coupons"></a>
				</div>
				<div class="wcmvp-review wcmvp_panel">
					<a href="https://codexinfra.com/bazaar/pricing/" target="_blank"><img src="<?php echo WCMVP_PUBLIC_IMAGES_URL . "Vendor-Dashboard-bazaar_reveiw.png"; ?>" alt="review"></a>
				</div>
				<div class="wcmvp-verify wcmvp_panel">
					<a href="https://codexinfra.com/bazaar/pricing/" target="_blank"><img src="<?php echo WCMVP_PUBLIC_IMAGES_URL . "Vendor-Dashboard-bazaar_verification.png";?>" alt="verify"></a>
				</div>
				<div class="wcmvp-report wcmvp_panel">
					<a href="https://codexinfra.com/bazaar/pricing/" target="_blank"><img src="<?php echo WCMVP_PUBLIC_IMAGES_URL . "Vendor-Dashboard-bazaar_report.png"; ?>" alt="report"></a>
				</div>
				<div class="wcmvp-shiping wcmvp_panel">
					<a href="https://codexinfra.com/bazaar/pricing/" target="_blank"><img src="<?php echo WCMVP_PUBLIC_IMAGES_URL . "Vendor-Dashboard-bazaar_shipping.png"; ?>" alt="shiping"></a>
				</div>

				<?php do_action("wcmvp_vendor_dashboard_pannel"); ?>
				
			</div>
		</div>
<?php
	} else {
		include_once WCMVP_PUBLIC_PARTIAL . "wcmvp_store_setup.php";
	}
}
