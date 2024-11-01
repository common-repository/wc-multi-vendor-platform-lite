<!-- File contain displaying withdraw options section of setting tab -->
<?php
    
    // initializing custom data, if no data found from db

    $wcmvp_withdraw_bank  = 1;
    $wcmvp_minimum_withdraw  = 0;
    $wcmvp_withdraw_to_vendor = 'wcmvp_after_admin_approval';

    // Getting data from database

    if(current_user_can('manage_options'))
    {
        if( !empty(get_option('wcmvp_withdraw_option')))
        {
            $wcmvp_withdraw_option_data = get_option('wcmvp_withdraw_option');
            
            if(is_array($wcmvp_withdraw_option_data) && !empty($wcmvp_withdraw_option_data) )
            {
                if(isset($wcmvp_withdraw_option_data['wcmvp_withdraw_paypal']))
                {
                    $wcmvp_withdraw_paypal  = $wcmvp_withdraw_option_data['wcmvp_withdraw_paypal'];
                }
                if( isset($wcmvp_withdraw_option_data['wcmvp_withdraw_bank']) )
                {
                    $wcmvp_withdraw_bank  = $wcmvp_withdraw_option_data['wcmvp_withdraw_bank'];
                }
                if( isset($wcmvp_withdraw_option_data['wcmvp_withdraw_stripe']) )
                {
                    $wcmvp_withdraw_stripe  = $wcmvp_withdraw_option_data['wcmvp_withdraw_stripe'];
                }
                if( isset($wcmvp_withdraw_option_data['wcmvp_minimum_withdraw']) )
                {
                    $wcmvp_minimum_withdraw  = $wcmvp_withdraw_option_data['wcmvp_minimum_withdraw'];
                }
                if( isset($wcmvp_withdraw_option_data['wcmvp_withdraw_to_vendor']) )
                {
                    $wcmvp_withdraw_to_vendor  = $wcmvp_withdraw_option_data['wcmvp_withdraw_to_vendor'];
                }
                if( isset($wcmvp_withdraw_option_data['wcmvp_withdraw_paypal_test_box']) )
                {
                    $wcmvp_withdraw_paypal_test_box  = $wcmvp_withdraw_option_data['wcmvp_withdraw_paypal_test_box'];
                }
                if( isset($wcmvp_withdraw_option_data['wcmvp_paypal_client_id']) )
                {
                    $wcmvp_paypal_client_id  = $wcmvp_withdraw_option_data['wcmvp_paypal_client_id'];
                }
                if( isset($wcmvp_withdraw_option_data['wcmvp_paypal_secret_key']) )
                {
                    $wcmvp_paypal_secret_key  = $wcmvp_withdraw_option_data['wcmvp_paypal_secret_key'];
                }
                if( isset($wcmvp_withdraw_option_data['wcmvp_withdraw_stripe_test_box']) )
                {
                    $wcmvp_withdraw_stripe_test_box  = $wcmvp_withdraw_option_data['wcmvp_withdraw_stripe_test_box'];
                }
                if( isset($wcmvp_withdraw_option_data['wcmvp_stripe_client_id']) )
                {
                    $wcmvp_stripe_client_id  = $wcmvp_withdraw_option_data['wcmvp_stripe_client_id'];
                }
                if( isset($wcmvp_withdraw_option_data['wcmvp_stripe_secret_key']) )
                {
                    $wcmvp_stripe_secret_key  = $wcmvp_withdraw_option_data['wcmvp_stripe_secret_key'];
                }
                if( isset($wcmvp_withdraw_option_data['wcmvp_stripe_publishable_key']) )
                {
                    $wcmvp_stripe_publishable_key  = $wcmvp_withdraw_option_data['wcmvp_stripe_publishable_key'];
                }
            }
        }
    }
?> 
    <div class = "wcmvp-section-content card min-width-100" id = "wcmvp-withdraw-options">
        <h3 class = "wcmvp-setting-heading wcmvp_withdraw_option_setting_updated"><?php esc_html_e('Withdraw Options','wc-multi-vendor-platform-lite'); ?></h3>

        <form class = "wcmvp-subsetting-content" method = "post" action = "">
            <ul>
                <?php 
                    $wcmvp_withdraw_option_array = array(
                    "<li><label> ".esc_html__('Minimum Withdraw Limit','wc-multi-vendor-platform-lite')." </label>
                        <span>
                            <label class='mdc-text-field mdc-text-field--outlined wcmvp-w-50'>
                                <input type='text' class='mdc-text-field__input wcmvp_textbox_width wcmvp_withdraw_option_page_data' id='wcmvp_minimum_withdraw' name='wcmvp_minimum_withdraw' value = ".(isset($wcmvp_minimum_withdraw) ? ($wcmvp_minimum_withdraw) : "" ).">
                                <div class='mdc-notched-outline mdc-notched-outline--upgraded'>
                                    <div class='mdc-notched-outline__leading'></div>
                                        <div class='mdc-notched-outline__notch' >
                                            <span class='mdc-floating-label' >".esc_html__('Minimum Withdraw Limit','wc-multi-vendor-platform-lite')."</span>
                                        </div>
                                    <div class=' mdc-notched-outline__trailing'></div>
                                </div>
                            </label>
                            <p class = 'wcmvper-notice'> ".esc_html__('Minimum balance required to make a withdraw request. Leave blank to set no minimum limits.','wc-multi-vendor-platform-lite')." </p>
                        </span>
                    </li>",
                    "<li><label> ".esc_html__( "Amount add to vendor's Account",'wc-multi-vendor-platform-lite' )." </label>
                        <span>
                            <div class='wcmvp_select_box'>
                                <select id = 'wcmvp_withdraw_to_vendor' class = 'wcmvp-select-text wcmvp_withdraw_option_page_data wcmvp_select_textbox_width'>
                                    <option value = ' '> ".esc_html__('Select Option','wc-multi-vendor-platform-lite')." </option>
                                    <option value = 'wcmvp_after_admin_approval' ".(isset( $wcmvp_withdraw_to_vendor ) ? ( ($wcmvp_withdraw_to_vendor == 'wcmvp_after_admin_approval') ? "selected" : "" ) : "")." > ".esc_html__('After Admin Approval','wc-multi-vendor-platform-lite')." </option>
                                    <option value='wcmvp_order_completed' ".(isset( $wcmvp_withdraw_to_vendor ) ? ( ($wcmvp_withdraw_to_vendor == 'wcmvp_order_completed') ? "selected" : "" ) : "")."> ".esc_html__('On Order Completed','wc-multi-vendor-platform-lite')." </option>
                                    <option value='wcmvp_order_processing' ".(isset( $wcmvp_withdraw_to_vendor ) ? ( ($wcmvp_withdraw_to_vendor == 'wcmvp_order_processing') ? "selected" : "" ) : "")."> ".esc_html__('On Order Processing','wc-multi-vendor-platform-lite')."</option>
                                </select>
                                <label class='wcmvp_select_label'>".esc_html__( 'Add Amount','wc-multi-vendor-platform-lite' )."</label>
                            </div>
                            <p class = 'wcmvper-notice'> ".esc_html__('When vendor receive Balance? , Default set to after admin Approval','wc-multi-vendor-platform-lite')." </p>
                        </span>
                    </li>"
                    );
                    
                    $wcmvp_withdraw_option_array = apply_filters('wcmvp_withdraw_option_meta_data',$wcmvp_withdraw_option_array);

                    if( isset($wcmvp_withdraw_option_array) && is_array($wcmvp_withdraw_option_array) )
                    {
                        foreach($wcmvp_withdraw_option_array as $key => $value)
                        {
                            // $value conntains html==//

                            echo $value;
                        }
                    }
                ?>

            <p class = "submit"><input type = "submit" name = "submit" id = "wcmvp-withdraw-option-submit" class = "mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp-button wcmvp_add_new_prod" value = "<?php esc_html_e('Save Changes','wc-multi-vendor-platform-lite') ?>"><span><a href="<?php echo isset($wcmvp_multivendor_platform_url) ? esc_url($wcmvp_multivendor_platform_url) : ""; ?>" class = "mdc-button mdc-button--outlined mdc-ripple-upgraded wcmvp_store_setup_skip_btn"><?php esc_html_e('Skip For Now','wc-multi-vendor-platform-lite'); ?></a></span></p>
            
            </ul>
        </form> 
        <?php do_action('wcmvp_multivendor_platform_withdraw_option_page'); ?>
    </div>