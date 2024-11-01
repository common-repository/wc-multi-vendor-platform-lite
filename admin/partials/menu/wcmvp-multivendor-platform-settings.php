<!-- This page is to to show setting section at admin end-->
<div>
    <div class='wcmvp_main_setting'> 
        <ul class='wcmvp-submenu mdc-list'>
        <?php
            $wcmvp_setting_sub_menu = array(
                array(
                    "<li class='wcmvp_list_float'><a class='wcmvp_settings_submenus' id='wcmvp-setting-general' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#general-setting') ."'>".esc_html__( 'General Settings','wc-multi-vendor-platform-lite') ."</a>
                </li>",10),
                array(
                    "<li class='wcmvp_list_float'><a class='wcmvp_settings_submenus' id='wcmvp-setting-selling' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#selling-option') ."'>".esc_html__( 'Selllings ','wc-multi-vendor-platform-lite') ."</a>
                </li>",20),
                array(
                    "<li class='wcmvp_list_float'><a class='wcmvp_settings_submenus' id='wcmvp-setting-withdraw' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#withdraw-option') ."'>".esc_html__( 'Withdrawals ','wc-multi-vendor-platform-lite') ."</a>
                </li>",30),
                array(
                    "<li class='wcmvp_list_float'><a class='wcmvp_settings_submenus' id='wcmvp-setting-payment-gateway' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#payment-gateway') ."'>".esc_html__( 'Payment Methods','wc-multi-vendor-platform-lite') ."</a>
                </li>",40),
                array(
                    "<li class='wcmvp_list_float'><a class='wcmvp_settings_submenus' id='wcmvp-setting-page-setting' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#page-setting') ."'>".esc_html__( 'Page Settings','wc-multi-vendor-platform-lite') ."</a>
                </li>",50),
                array(
                    "<li class='wcmvp_list_float'><a class='wcmvp_settings_submenus' id='wcmvp-setting-appearence' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#appearence') ."'>".esc_html__( 'Appearence','wc-multi-vendor-platform-lite') ."</a>
                </li>",60),
                array(
                    "<li class='wcmvp_list_float'><a class='wcmvp_settings_submenus' id='wcmvp-setting-privacy-policy' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#privacy-policy') ."'>".esc_html__( 'Privacy Policy','wc-multi-vendor-platform-lite') ."</a>
                </li>",70),
                array(
                    "<li class='wcmvp_list_float'><a class='wcmvp_settings_submenus' id='wcmvp-setting-social-api' href='".esc_url(admin_url().'admin.php?page=wc-multi-vendor-platform-lite#social_api') ."'>".esc_html__( 'Social Api','wcmvp-multivendor-platform-pro') ."</a>
                </li>",80)
            );
            $wcmvp_setting_sub_menu = apply_filters('wcmvp_setting_sub_menu',$wcmvp_setting_sub_menu);
            if( isset($wcmvp_setting_sub_menu) && is_array($wcmvp_setting_sub_menu) )

				{

					foreach($wcmvp_setting_sub_menu as $wcmvp_sub_menus_array)

					{

						//==$wcmvp_menus, Variable contains html==//
						if( isset($wcmvp_sub_menus_array) && is_array($wcmvp_sub_menus_array) && isset($wcmvp_sub_menus_array[0]) )

						{

							if( isset($wcmvp_sub_menus_array[1]) )

							{

								if( $wcmvp_sub_menus_array[1] == '' || $wcmvp_sub_menus_array[1] == 0 || $wcmvp_sub_menus_array[1] == null )

								{

									$wcmvp_sub_menus_display_array[] = $wcmvp_sub_menus_array[0];

								}

								else

								{

									$wcmvp_sub_menus_display_array[$wcmvp_sub_menus_array[1]] = $wcmvp_sub_menus_array[0];

								}

							}

							else

							{

								$wcmvp_sub_menus_display_array[] = $wcmvp_sub_menus_array[0];

							}

						}

					}

					if( isset($wcmvp_sub_menus_display_array) && is_array($wcmvp_sub_menus_display_array) )

					{

						foreach($wcmvp_sub_menus_display_array as $sub_menus)

						{

							if( isset($sub_menus) )

							{

								//===$sub_menus, contains html=//
								echo $sub_menus;

							}

						}

					}

				}
        ?>
    </div>

    <div class='wcmvp-setting-section'>
    <?php
        include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-general-setting.php' );
        include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-selling-option.php' );
        include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-withdraw-option.php' );
        include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-payment-gateway.php' );
        include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-page-setting.php' );
        include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-appearence.php' );
        include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-privacy-policy.php' );
        if( !empty( get_option('active_plugins'))){
            $wcmvp_installed_plugins = get_option('active_plugins');
            if( isset($wcmvp_installed_plugins) && !empty($wcmvp_installed_plugins) )
			{
				if(in_array('wc-multi-vendor-platform-pro/wcmvp-multivendor-platform-pro.php',$wcmvp_installed_plugins))
				{
                    update_option('wcmvp_done',1);
                }
                else
                {
                    include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-social-api.php');
                }
            }
        }
        do_action('wcmvp_setting_submenu_add_file_or_content');
    ?>
    </div>
</div>

    

 