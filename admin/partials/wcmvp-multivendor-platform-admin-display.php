<?php
/**

 * Provide a admin area view for the plugin

 *

 * This file is used to markup the admin-facing aspects of the plugin.

 *

 * @link       my author uri my

 * @since      1.0.0

 *

 * @package    Wcmvp_Multivendor_Platform

 * @subpackage Wcmvp_Multivendor_Platform/admin/partials

 */

?> 
<header class="wcmvp_settings_tab_wrapper">

	<nav class="wcmvp-top-header">
		<div class="wcmvp_header_admin_catalog">
		<p class='wcmvp_administartion_settings'><?php esc_html_e('Administration Catalog','wc-multi-vendor-platform-lite'); ?></p>
		</div>
		<div class="wcmvp_header_admin_content">
		<a  href="<?php echo esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite') ?>"><?php esc_html_e('MultiVendor Platform For WooCommerce','wc-multi-vendor-platform-lite'); ?></a>
		</div>
		<div class="wcmvp_nav_menu_links">
		<a href='https://codexinfra.com/docs/'><i class='material-icons wcmvp_docs_icon wcmvp_multi_menu_icon wcmvp_tooltip' aria-hidden='true' data-tip='Documentation'><?php echo esc_html('school'); ?><span class="wcmvp_tooltiptext"><code><?php esc_html_e('Document Support','wc-multi-vendor-platform-lite'); ?></code></span></i></a>
		<a href='https://codexinfra.com/bazaar/try-demo/'><i class='material-icons wcmvp_docs_icon wcmvp_multi_menu_icon wcmvp_tooltip' aria-hidden='true' data-tip='Demo'><?php echo esc_html('live_tv'); ?><span class="wcmvp_tooltiptext"><code><?php esc_html_e('Pro demo','wc-multi-vendor-platform-lite'); ?></code></span></i></a>
		<a href='https://codexinfra.com/bazaar/support/'><i class='material-icons wcmvp_docs_icon wcmvp_multi_menu_icon wcmvp_tooltip' aria-hidden='true' data-tip='Documentation'><?php echo esc_html('support'); ?><span class="wcmvp_tooltiptext"><code><?php esc_html_e('Support','wc-multi-vendor-platform-lite'); ?></code></span></i></a>
		<a class="upgrade_button_top1" href="<?php echo esc_url( admin_url() ) . "admin.php?page=wc-multi-vendor-platform-lite#/features"; ?>"><span class='wcmvp_setup_menu_image wcmvp_dashboard_image wcmvp_crown_size'><i class='fas fa-crown wcmvp_tooltip'><span class="wcmvp_tooltiptext"><code><?php esc_html_e('Upgrade To Pro','wc-multi-vendor-platform-lite'); ?></code></span></i></a>
		<?php
		if(!empty(get_option("active_plugins"))){
			$wcmvp_chech=get_option("active_plugins");
			if(in_array("wc-multi-vendor-platform-pro/wcmvp-multivendor-platform-pro.php",$wcmvp_chech)){
				echo "<a href='#announcement'><i class='wcmvp_docs_icon wcmvp_trigger_anaunce wcmvp_multi_menu_icon fa fa-bullhorn wcmvp_tooltip' aria-hidden='true' data-tip='Documentation'><span class='wcmvp_tooltiptext'><code>Anouncement</code></span></i></a>";
				
			}
		}
		?>
		
		<a class="upgrade_button_top2" href="<?php echo esc_url( admin_url() ); ?>"><span class='wcmvp_setup_menu_image wcmvp_dashboard_image wcmvp_wordpress_size'><i class='dashicons dashicons-wordpress-alt wcmvp_tooltip'><span class="wcmvp_tooltiptext"><code style="font-size:10px;"><?php esc_html_e('Back to Wordpress','wc-multi-vendor-platform-lite'); ?></code></span></i></a>
		
		<a href="<?php echo wp_logout_url( home_url().'/wp-admin'); ?>"><i class='material-icons wcmvp_docs_icon wcmvp_multi_menu_icon wcmvp_tooltip' aria-hidden='true' data-tip='Documentation'><?php echo esc_html('exit_to_app'); ?><span class="wcmvp_tooltiptext"><code><?php esc_html_e('Logout','wc-multi-vendor-platform-lite'); ?></code></span></i></a>

		
		</div>

	</nav>

</header>

<aside class="mdc-drawer wcmvp_sidbar_wrapper ">
	<div class="wcmvp-sidebar-close">
			<i class="fas fa-times"></i>
	</div>

	<div class="mdc-drawer__content wcmvp-drawer-content" id="wcmvp-sidebar">

		<nav class="mdc-list wcmvp-navbar" id="wcmvp-nav">

			<?php

				$wcmvp_admin_main_menus = array(

					array("<li>

						<a class='mdc-list-item' id='wcmvp-admin-dashboard' href=".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#dashboard')."><span class='wcmvp_setup_menu_image wcmvp_dashboard_image'><i class='material-icons  wcmvpvsm-list-item' aria-hidden='true'>

						home</i></span> ".esc_html__('Home','wc-multi-vendor-platform-lite')." </a>

					</li>",10),

					array("<li>

						<a class='mdc-list-item' id='wcmvp-admin-all-products' href= '".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#all_products')."'><span class='wcmvp_setup_menu_image wcmvp_dashboard_image'><i class='wcmvp-fa-fa-font fas fa-cube'></i> </span> ".esc_html__( 'Products','wc-multi-vendor-platform-lite')." </a>

					</li>",20),

					array("<li>

						<a class='mdc-list-item' id='wcmvp-admin-all-orders' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#/orders_all')."'><span class='wcmvp_setup_menu_image wcmvp_dashboard_image'><i class='wcmvp-fa-fa-font fa fa-shopping-cart'></i> </span>".esc_html__( 'Orders','wc-multi-vendor-platform-lite')." </a>

					</li>",30),

					array("<li>

						<a class='mdc-list-item' id='wcmvp-admin-withdraw' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#withdraw')."'><span class='wcmvp_setup_menu_image wcmvp_dashboard_image'><i class='material-icons'>credit_card</i> </span> ".esc_html__( 'Withdrawal','wc-multi-vendor-platform-lite')." </a>

					</li>",40),

					array("<li>

						<a class='mdc-list-item' id='wcmvp-admin-vendor' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#/vendor')."'><span class='wcmvp_setup_menu_image wcmvp_dashboard_image'><i class='fas fa-users mr-1 wcmvp-fa-fa-font'></i> </span> ".esc_html__( 'Store Vendors','wc-multi-vendor-platform-lite')." </a>

					</li>",50),

					array("<li>

						<a class='mdc-list-item' id='wcmvp-admin-customer' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#/customer')."'><span class='wcmvp_setup_menu_image wcmvp_dashboard_image'><i class='fa fa-user-alt wcmvp-fa-fa-font'></i> </span> ".esc_html__( 'Customer','wc-multi-vendor-platform-lite')." </a>

					</li>",60),

					array("<li>

						<a class='mdc-list-item aab' id='wcmvp-admin-features' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#/features')."'>
						<span class='wcmvp_setup_menu_image wcmvp_dashboard_image wcmvp_crown_size'>
						<i class='fas fa-crown'></i></span>".esc_html__( 'Pro Features','wc-multi-vendor-platform-lite')."</a>
					</li>",70),

					array("<li>
						<a class='mdc-list-item' id='wcmvp-admin-reports' href= '".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#report')."'><span class='wcmvp_setup_menu_image wcmvp_dashboard_image'><i class='material-icons'>leaderboard</i></span>  ".esc_html__( 'Analytic Report','wcmvp-multivendor-platform-pro')." </a>
					</li>",80),

					array("<li>
						<a class='mdc-list-item' id='wcmvp-admin-announcements' href= '".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#announcements')."'><span class='wcmvp_setup_menu_image 		wcmvp_dashboard_image'><i class='fa fa-bullhorn wcmvp-fa-fa-font'></i> </span> ".esc_html__( 		'Announcements','wcmvp-multivendor-platform-pro')." </a>
					</li>",90),

					array("<li>
						<a class='mdc-list-item' id='wcmvp-admin-seller-verification' href= '".esc_url(admin_url().'admin.	php?page=wc-multi-vendor-platform-lite#seller-verification')."'><span class='wcmvp_setup_menu_image 	wcmvp_dashboard_image'><i class='fa fa-check-circle wcmvp-fa-fa-font'></i> </span> ".	esc_html__( 'Seller Verification','wcmvp-multivendor-platform-pro')."</a>
					</li>",100),

					array("<li>
						<a class='mdc-list-item' id='wcmvp-admin-settings' href='".esc_url(admin_url().'admin.php?	page=wc-multi-vendor-platform-lite#general-setting') ."'><span class='wcmvp_setup_menu_image 	wcmvp_dashboard_image'><i class='wcmvp-fa-fa-font fas fa-cogs'></i> </span>".esc_html__('Marketplace Settings','wc-multi-vendor-platform-lite') ."</a>
					</li>",110)

				);
				
				$wcmvp_admin_main_menus = apply_filters('wcmvp_admin_main_menus',$wcmvp_admin_main_menus);
				if( isset($wcmvp_admin_main_menus) && is_array($wcmvp_admin_main_menus) )

				{

					foreach($wcmvp_admin_main_menus as $wcmvp_menus_array)

					{

						//==$wcmvp_menus, Variable contains html==//
						if( isset($wcmvp_menus_array) && is_array($wcmvp_menus_array) && isset($wcmvp_menus_array[0]) )

						{

							if( isset($wcmvp_menus_array[1]) )

							{

								if( $wcmvp_menus_array[1] == '' || $wcmvp_menus_array[1] == 0 || $wcmvp_menus_array[1] == null )

								{

									$wcmvp_menus_display_array[] = $wcmvp_menus_array[0];

								}

								else

								{

									$wcmvp_menus_display_array[$wcmvp_menus_array[1]] = $wcmvp_menus_array[0];

								}

							}

							else

							{

								$wcmvp_menus_display_array[] = $wcmvp_menus_array[0];

							}

						}

					}

					if( isset($wcmvp_menus_display_array) && is_array($wcmvp_menus_display_array) )

					{

						foreach($wcmvp_menus_display_array as $menus)

						{

							if( isset($menus) )

							{

								//===$menus, contains html=//
								echo $menus;

							}

						}

					}

				}

			?>

		</nav>

	</div>

</aside>
<div class="wcmvp_settings_content_wrapper">
	<div id="wcmvp-multivendor-platform-withdraw"><?php

		do_action('wcmvp_multivendor_platform_including_withdraw_page');

		include_once( WCMVP_ADMIN_PARTIAL_MENU.'wcmvp-multivendor-platform-withdraw.php' );

	?></div>
	<div id="wcmvp-multivendor-platform-report" class='wcmvp_report_top'><?php

		do_action('wcmvp_multivendor_platform_including_dashboard_and_report_page');

		include_once( WCMVP_ADMIN_PARTIAL_MENU.'wcmvp-multivendor-platform-report.php' );

	?></div>
	<div id="wcmvp-multivendor-platform-vendor"><?php

		do_action('wcmvp_multivendor_platform_including_vendor_page');

		include_once( WCMVP_ADMIN_PARTIAL_MENU.'wcmvp-multivendor-platform-vendor.php' );

	?></div>
	<div id="wcmvp-multivendor-platform-dashboard"><?php

		include_once( WCMVP_ADMIN_PARTIAL_MENU.'wcmvp-multivendor-platform-dashboard.php' );

	?></div>
	<div id="wcmvp-multivendor-platform-settings"><?php

		do_action('wcmvp_multivendor_platform_including_setting_page');

		include_once( WCMVP_ADMIN_PARTIAL_MENU.'wcmvp-multivendor-platform-settings.php' );

	?></div>

	<div id="wcmvp-multivendor-platform-features"><?php

		do_action('wcmvp_multivendor_platform_including_features_page');

		include_once( WCMVP_ADMIN_PARTIAL_MENU.'wcmvp-multivendor-platform-features.php' );

	?></div>		
	<div id="wcmvp-multivendor-platform-customer_1"><?php

	do_action('wcmvp_multivendor_platform_including_customer_page');

	include_once( WCMVP_ADMIN_PARTIAL_MENU.'wcmvp-multivendor-platform-customer_1.php' );

	?></div>	
	<div id="wcmvp-multivendor-platform-announcements"><?php

	do_action('wcmvp_multivendor_platform_including_announcements_page');

	include_once( WCMVP_ADMIN_PARTIAL_MENU.'wcmvp-multivendor-platform-announcements.php' );

	?></div>	
	<div id="wcmvp-multivendor-platform-seller-verification_1"><?php

	do_action('wcmvp_multivendor_platform_including_seller_verification_page');

	include_once( WCMVP_ADMIN_PARTIAL_MENU.'wcmvp-multivendor-platform-seller-verification_1.php' );

	?></div>
		<?php do_action('wcmvp_add_file_for_main_menus'); ?>
	</div>
