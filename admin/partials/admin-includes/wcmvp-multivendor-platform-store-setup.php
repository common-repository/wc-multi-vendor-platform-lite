<?php 

    //============This File includeds details for setup the store page when plugin activated first time=============//

    if( isset($_GET['wcmvp_action']) && !empty($_GET['wcmvp_action']) )
    {
        if( $_GET['wcmvp_action'] == 'wcmvp_store_setup' )
        {
                $wcmvp_multivendor_platform_home_url = add_query_arg( array(

                    'page' => 'wc-multi-vendor-platform-lite#dashboard'

                ),admin_url('admin.php'));

            ?>

            <div class="wcmvp_store_page_section"> 

                <div class="wcmvp-welcome-page">

                    <div class="wcmvp_wrapper_front">

                    <div class="wcmvp_setup_welcome_page">

                            <div>

                                <h4><?php esc_html_e('Welcome to Multi Vendor Platform For WooCommerce  !','wc-multi-vendor-platform-lite'); ?></h4>  

                                <p><?php esc_html_e('We pleasure you for choosing Multi Vendor Platform For WooCommerce  to start your marketplace with! Here you will get the shortest section to build your marketplace Multi Vendor Platform For WooCommerce .','wc-multi-vendor-platform-lite'); ?><span><?php esc_html_e('Its purely voluntary and will not take more than 3 minutes of your.'); ?></span></p>

                                <p><?php esc_html_e("Not Yet, Don't be panic, if you don't wanna begin now, come to us later, we will always love to help you with your multivendor Marketplace.",'wc-multi-vendor-platform-lite'); ?></p>

                                <h5><a class='wcmvp_store_not_right_btn' href="<?php echo isset($wcmvp_multivendor_platform_home_url) ? esc_url($wcmvp_multivendor_platform_home_url) : ""; ?>"><?php esc_html_e('Not Right Now','wc-multi-vendor-platform-lite'); ?></a><span><a href="#" class='mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp_launch_setup_btn'><?php esc_html_e("Let's Go",'wc-multi-vendor-platform-lite'); ?></a></span></h5>

                            </div>

                            </div>

                    </div>

                    <div class="wcmvp_store_setup_menus">

                        <p><span class="wcmvp_store_setup_general_tab"><?php esc_html_e('General','wc-multi-vendor-platform-lite'); ?></span><span class="wcmvp_store_setup_seeling_options_tab"><?php esc_html_e('Selling Options','wc-multi-vendor-platform-lite'); ?></span><span class="wcmvp_store_setup_withdraw_options_tab"><?php esc_html_e('Withdraw Options','wc-multi-vendor-platform-lite'); ?></span><span class="wcmvp_store_appreance_tab"><?php esc_html_e('Appearence','wc-multi-vendor-platform-lite'); ?></span></p>

                    </div>

                    <?php

                        include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-general-setting.php' );

                        include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-selling-option.php' );

                        include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-withdraw-option.php' );

                        include_once( WCMVP_ADMIN_PARTIAL_SUBMENU.'wcmvp-multivendor-platform-appearence.php' );

                    ?>

                </div>

            </div>

            <?php

            do_action('wcmvp_store_setup_page_intro');

        }

    }

?>