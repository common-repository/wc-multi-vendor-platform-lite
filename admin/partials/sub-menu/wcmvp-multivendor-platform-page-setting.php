<!-- File contain displaying page settings section of setting tab -->

<?php 

    // Default Data if variables are not set.

    $wcmvp_page_setting_dashboard = 'not_selected';
    $wcmvp_page_setting_my_orders = 'not_selected';
    $wcmvp_page_terms_conditions = 'not_selected';
    $wcmvp_page_store_listing = 'not_selected';
   
    //Getting data from options table

    if( current_user_can('manage_options') )
    {
        if( !empty( get_option('wcmvp_page_setting' )) )
        {
            $wcmvp_page_setting_option = get_option('wcmvp_page_setting');
            
            if(is_array($wcmvp_page_setting_option) && !empty($wcmvp_page_setting_option) )
            {   
                if( isset($wcmvp_page_setting_option['wcmvp_page_setting_dashboard']) )
                {
                    $wcmvp_page_setting_dashboard = $wcmvp_page_setting_option['wcmvp_page_setting_dashboard'];
                }
                if( isset($wcmvp_page_setting_option['wcmvp_page_my_orders']) )
                {
                    $wcmvp_page_my_orders = $wcmvp_page_setting_option['wcmvp_page_my_orders'];
                }
                if( isset($wcmvp_page_setting_option['wcmvp_page_terms_conditions']) )
                {
                    $wcmvp_page_terms_conditions = $wcmvp_page_setting_option['wcmvp_page_terms_conditions'];   
                }
                if( isset($wcmvp_page_setting_option['wcmvp_page_store_listing']) )
                {
                    $wcmvp_page_store_listing = $wcmvp_page_setting_option['wcmvp_page_store_listing'];
                }
            }
        }
    }?>

    <div class = "wcmvp-section-content card min-width-100" id = "wcmvp-page-setting">
        <h3 class = "wcmvp-setting-heading"><?php esc_html_e('Page Settings','wc-multi-vendor-platform-lite'); ?></h3>
        <div class = "wcmvp-subsetting-content">
        <ul>
            <li><label><?php esc_html_e('Dashboard','wc-multi-vendor-platform-lite'); ?></label><span>
                <?php
                if( isset( $wcmvp_page_setting_dashboard ) && !empty( $wcmvp_page_setting_dashboard ) )
                {
                    ?>
                        <div class='wcmvp_select_box'>
                            <?php
                                wp_dropdown_pages( array(
                                'show_option_none' => 'select page',
                                'name' => 'wcmvp_page_setting_dashboard',
                                'id' => 'wcmvp_page_setting_dashboard',
                                'class' => 'wcmvp-select-text',
                                'option_none_value' => 'not_selected',
                                'selected' => $wcmvp_page_setting_dashboard,
                                ));
                            ?>
                            <label class='wcmvp_select_label'><?php esc_html_e( 'Dashboard Page','wc-multi-vendor-platform-lite' ); ?></label>
                        </div>
                    <?php
                }
                else
                {
                    ?>
                        <div class='wcmvp_select_box'>
                            <?php
                                wp_dropdown_pages( array(
                                'show_option_none' => 'select page',
                                'name' => 'wcmvp_page_setting_dashboard',
                                'id' => 'wcmvp_page_setting_dashboard',
                                'class' => 'wcmvp-select-text',
                                'option_none_value' => 'not_selected',
                                ) );
                            ?>
                            <label class='wcmvp_select_label'><?php esc_html_e( 'Dashboard Page','wc-multi-vendor-platform-lite' ); ?></label>
                        </div>
                    <?php
                }    
                ?> 
                <p class="wcmvper-notice"><?php esc_html_e('Select a page to show Vendor Dashboard','wc-multi-vendor-platform-lite'); ?><p></span>
            </li>

            <li><label><?php esc_html_e('My Orders','wc-multi-vendor-platform-lite'); ?></label><span>
                <?php 
                if(isset($wcmvp_page_my_orders) && !empty($wcmvp_page_my_orders))
                {
                    ?>
                        <div class='wcmvp_select_box'>
                            <?php
                                wp_dropdown_pages( array(
                                'show_option_none' => 'select page',
                                'option_none_value' => 'not_selected',
                                'name' => 'wcmvp_page_my_orders',
                                'class' => 'wcmvp-select-text',
                                'id' => 'wcmvp_page_my_orders',
                                'selected' => $wcmvp_page_my_orders,
                                ));
                            ?>
                            <label class='wcmvp_select_label'><?php esc_html_e( 'My Orders Page','wc-multi-vendor-platform-lite' ); ?></label>
                        </div>
                    <?php
                }
                else
                {
                    ?>
                        <div class='wcmvp_select_box'>
                            <?php
                                wp_dropdown_pages( array(
                                'show_option_none' => 'select page',
                                'option_none_value' => 'not_selected',
                                'name' => 'wcmvp_page_my_orders',
                                'class' => 'wcmvp-select-text',
                                'id' => 'wcmvp_page_my_orders',
                                ) );
                            ?>
                            <label class='wcmvp_select_label'><?php esc_html_e( 'My Orders Page','wc-multi-vendor-platform-lite' ); ?></label>
                        </div>
                    <?php
                }
                ?> 
                <p class="wcmvper-notice"><?php esc_html_e('Select a page to show My Orders','wc-multi-vendor-platform-lite'); ?><p></span>
            </li>

            <li><label><?php esc_html_e('Store Listing','wc-multi-vendor-platform-lite'); ?></label><span>
                <?php 
                if(isset($wcmvp_page_store_listing) && !empty($wcmvp_page_store_listing))
                {
                    ?>
                        <div class='wcmvp_select_box'>
                            <?php
                                wp_dropdown_pages( array(
                                'show_option_none' => 'select page',
                                'option_none_value' => 'not_selected',
                                'name' => 'wcmvp_page_store_listing',
                                'class' => 'wcmvp-select-text',
                                'id' => 'wcmvp_page_store_listing',
                                'selected' => $wcmvp_page_store_listing,
                                ));
                            ?>
                            <label class='wcmvp_select_label'><?php esc_html_e( 'Store Listing Page','wc-multi-vendor-platform-lite' ); ?></label>
                        </div>
                    <?php
                }
                else
                {
                    ?>
                        <div class='wcmvp_select_box'>
                            <?php
                                wp_dropdown_pages( array(
                                'show_option_none' => 'select page',
                                'option_none_value' => 'not_selected',
                                'name' => 'wcmvp_page_store_listing',
                                'class' => 'wcmvp-select-text',
                                'id' => 'wcmvp_page_store_listing',
                                ) );
                            ?>
                            <label class='wcmvp_select_label'><?php esc_html_e( 'Store Listing Page','wc-multi-vendor-platform-lite' ); ?></label>
                        </div>
                    <?php
                }
                ?> 
                <p class="wcmvper-notice"><?php esc_html_e('Select a page to show all Stores','wc-multi-vendor-platform-lite'); ?><p></span>
            </li>

            <li><label><?php esc_html_e('Terms and Conditions Page','wc-multi-vendor-platform-lite'); ?></label><span>
                <?php
                if(isset($wcmvp_page_my_orders) && !empty($wcmvp_page_my_orders))
                {
                    ?>
                        <div class='wcmvp_select_box'>
                            <?php
                                wp_dropdown_pages( array(
                                'show_option_none' => 'select page',
                                'option_none_value' => 'not_selected',
                                'name' => 'wcmvp_page_terms_conditions',
                                'class' => 'wcmvp-select-text',
                                'id' => 'wcmvp_page_terms_conditions',
                                'selected' => $wcmvp_page_terms_conditions,
                                ) );
                            ?>
                            <label class='wcmvp_select_label'><?php esc_html_e( 'Terms & Conditions Page','wc-multi-vendor-platform-lite' ); ?></label>
                        </div>
                    <?php
                }
                else
                {
                    ?>
                        <div class='wcmvp_select_box'>
                            <?php
                                wp_dropdown_pages( array(
                                'show_option_none' => 'select page',
                                'option_none_value' => 'not_selected',
                                'name' => 'wcmvp_page_terms_conditions',
                                'class' => 'wcmvp-select-text',
                                'id' => 'wcmvp_page_terms_conditions',
                                ) );
                                ?>
                            <label class='wcmvp_select_label'><?php esc_html_e( 'Terms & Conditions Page','wc-multi-vendor-platform-lite' ); ?></label>
                        </div>
                    <?php
                }
                ?>
                <p class = "wcmvper-notice"><?php esc_html_e( 'Select where you want to add Multi Vendor Platform For WooCommerce  pages','wc-multi-vendor-platform-lite' ); ?> <a href="<?php echo esc_attr( 'https://codexinfra.com/' ); ?>"> <?php esc_html_e( 'Learn More','wc-multi-vendor-platform-lite' ); ?></a><p></span>
            </li>
            <?php
                $wcmvp_page_setting_array = array(
                    
                );
                $wcmvp_page_setting_array = apply_filters('wcmvp_page_setting_meta_data',$wcmvp_page_setting_array);
                if( isset($wcmvp_page_setting_array) && !empty($wcmvp_page_setting_array) && is_array($wcmvp_page_setting_array) )
                {
                    foreach($wcmvp_page_setting_array as $key => $value)
                    {
                        if( isset($value) && !empty($value) )
                        {
                            //$value holds html
                            echo $value;
                        }
                    }
                }
            ?>
            <p class = "submit"><input type = "submit" name = "submit" id = "wcmvp-page-setting-submit" class = "mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp-button wcmvp_add_new_prod" value = "<?php esc_html_e('Save Changes','wc-multi-vendor-platform-lite') ?>"></p>
        </ul>
        </div>
        <?php do_action('wcmvp_multivendor_platform_page_setting_page'); ?>
    </div>