<!-- File contain displaying payment gateway section of setting tab -->
<?php
    
    // initializing custom data, if no data found from db

    $wcmvp_withdraw_paypal = 0;
    $wcmvp_withdraw_bank = 1;
    $wcmvp_withdraw_stripe = 0;
    $wcmvp_withdraw_paypal = 0;
    $wcmvp_withdraw_paypal_test_box = 1;
    $wcmvp_paypal_client_id = '';
    $wcmvp_paypal_secret_key = '';
    $wcmvp_withdraw_stripe_test_box = 1;
    $wcmvp_stripe_client_id = '';
    $wcmvp_stripe_secret_key = '';
    $wcmvp_stripe_publishable_key = '';

    // Getting data from database

    if(current_user_can('manage_options'))
    {
        if( !empty(get_option('wcmvp_payment_gateway')))
        {
            $wcmvp_withdraw_option_data = get_option('wcmvp_payment_gateway');
            
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

<div class = "wcmvp-section-content card min-width-100" id = "wcmvp-payment-gateway-options">
        <h3 class = "wcmvp-setting-heading wcmvp_withdraw_option_setting_updated"><?php esc_html_e('Payment Gateway','wc-multi-vendor-platform-lite'); ?></h3>

        <form class = "wcmvp-subsetting-content" method = "post" action = "">
            <ul>
                <?php 
                    $wcmvp_withdraw_option_array = array(
                    "<li><label> ".esc_html__( 'Payment Methods','wc-multi-vendor-platform-lite')." </label>
                        <span class='wcmvp-general-setting-span wcmvp_withdraw_payment_close'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_withdraw_paypal' class='mdc-checkbox__native-control wcmvp_payment_gateway_page_data wcmvp_withdraw_paypal' name='wcmvp_withdraw_paypal'".(isset( $wcmvp_withdraw_paypal ) ? ( ($wcmvp_withdraw_paypal == 1) ? "checked='checked'" : "" ) : "")."
                            name = ''> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( 'PayPal','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                        <span class='wcmvp-general-setting-span wcmvp_withdraw_payment_close'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_withdraw_stripe' class='mdc-checkbox__native-control wcmvp_payment_gateway_page_data wcmvp_withdraw_stripe' name='wcmvp_withdraw_stripe'".(isset( $wcmvp_withdraw_stripe ) ? ( ($wcmvp_withdraw_stripe == 1) ? "checked='checked'" : "" ) : "")."
                            name = '' checked> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( 'Stripe','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                        <span class='wcmvp-general-setting-span wcmvp_withdraw_payment_close'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_withdraw_bank' class='mdc-checkbox__native-control wcmvp_payment_gateway_page_data wcmvp_withdraw_bank' name='wcmvp_withdraw_bank'".(isset( $wcmvp_withdraw_bank ) ? ( ($wcmvp_withdraw_bank == 1) ? "checked='checked'" : "" ) : "")."
                            name = ''> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( 'Bank Transfer','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                        <span class='wcmvp-general-setting-span wcmvp_withdraw_payment_close'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_withdraw_cash' class='mdc-checkbox__native-control wcmvp_payment_gateway_page_data wcmvp_withdraw_cash' name='wcmvp_withdraw_cash'".(isset( $wcmvp_withdraw_cash ) ? ( ($wcmvp_withdraw_cash == 1) ? "checked='checked'" : "" ) : "")."
                            name = ''> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( 'Cash','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                        ".do_action('wcmvp_add_payment_gateway')."
                    </li>",
                    "<li class='wcmvp_payment_setting_paypal wcmvp_payment_setting_initial'><label> ".esc_html__( 'Enable Sandbox Mode','wc-multi-vendor-platform-lite' )." </label>
                        <span class='wcmvp-general-setting-span'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_withdraw_paypal_test_box' class='mdc-checkbox__native-control wcmvp_payment_gateway_page_data wcmvp_withdraw_paypal_test_box' name='wcmvp_withdraw_paypal_test_box'".(isset( $wcmvp_withdraw_paypal_test_box ) ? ( ($wcmvp_withdraw_paypal_test_box == 1) ? "checked='checked'" : "" ) : "")."
                            name = ''> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( '( PayPal )','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                    </li>",
                    "<li class='wcmvp_payment_setting_paypal wcmvp_payment_setting_initial'><label> ".esc_html__( 'PayPal Client ID','wc-multi-vendor-platform-lite' )." </label>
                        <span>
                            <label class='mdc-text-field mdc-text-field--outlined wcmvp-w-50'>
                                <input type='text' class='mdc-text-field__input wcmvp_textbox_width wcmvp_payment_gateway_page_data' id='wcmvp_paypal_client_id' name='wcmvp_paypal_client_id' value = ".(isset($wcmvp_paypal_client_id) ? ($wcmvp_paypal_client_id) : "" ).">
                                <div class='mdc-notched-outline mdc-notched-outline--upgraded'>
                                    <div class='mdc-notched-outline__leading'></div>
                                        <div class='mdc-notched-outline__notch' >
                                            <span class='mdc-floating-label' >".esc_html__('PayPal Client ID','wc-multi-vendor-platform-lite')."</span>
                                        </div>
                                    <div class=' mdc-notched-outline__trailing'></div>
                                </div>
                            </label>
                        </span>
                    </li>",
                    "<li class='wcmvp_payment_setting_paypal wcmvp_payment_setting_initial'><label> ".esc_html__( 'PayPal Secret Key','wc-multi-vendor-platform-lite' )." </label>
                        <span>
                            <label class='mdc-text-field mdc-text-field--outlined wcmvp-w-50'>
                                <input type='text' class='mdc-text-field__input wcmvp_textbox_width wcmvp_payment_gateway_page_data' id='wcmvp_paypal_secret_key' name='wcmvp_paypal_secret_key' value = ".(isset($wcmvp_paypal_secret_key) ? ($wcmvp_paypal_secret_key) : "" ).">
                                <div class='mdc-notched-outline mdc-notched-outline--upgraded'>
                                    <div class='mdc-notched-outline__leading'></div>
                                        <div class='mdc-notched-outline__notch' >
                                            <span class='mdc-floating-label' >".esc_html__('PayPal Secret Key','wc-multi-vendor-platform-lite')."</span>
                                        </div>
                                    <div class=' mdc-notched-outline__trailing'></div>
                                </div>
                            </label>
                        </span>
                    </li>",
                    "<li class='wcmvp_payment_setting_stripe wcmvp_payment_setting_initial'><label> ".esc_html__( 'Enable Sandbox Mode','wc-multi-vendor-platform-lite' )." </label>
                        <span class='wcmvp-general-setting-span'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_withdraw_stripe_test_box' class='mdc-checkbox__native-control wcmvp_payment_gateway_page_data wcmvp_withdraw_stripe_test_box' name='wcmvp_withdraw_stripe_test_box'".(isset( $wcmvp_withdraw_stripe_test_box ) ? ( ($wcmvp_withdraw_stripe_test_box == 1) ? "checked='checked'" : "" ) : "")."
                            name = ''> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( '( Stripe )','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                    </li>",
                    "<li class='wcmvp_payment_setting_stripe wcmvp_payment_setting_initial'><label> ".esc_html__( 'Stripe Client ID','wc-multi-vendor-platform-lite' )." </label>
                        <span>
                            <label class='mdc-text-field mdc-text-field--outlined wcmvp-w-50'>
                                <input type='text' class='mdc-text-field__input wcmvp_textbox_width wcmvp_payment_gateway_page_data' id='wcmvp_stripe_client_id' name='wcmvp_stripe_client_id' value = ".(isset($wcmvp_stripe_client_id) ? ($wcmvp_stripe_client_id) : "" ).">
                                <div class='mdc-notched-outline mdc-notched-outline--upgraded'>
                                    <div class='mdc-notched-outline__leading'></div>
                                        <div class='mdc-notched-outline__notch' >
                                            <span class='mdc-floating-label' >".esc_html__('Stripe Client ID','wc-multi-vendor-platform-lite')."</span>
                                        </div>
                                    <div class=' mdc-notched-outline__trailing'></div>
                                </div>
                            </label>
                        </span>
                    </li>",
                    "<li class='wcmvp_payment_setting_stripe wcmvp_payment_setting_initial'><label> ".esc_html__( 'Stripe Secret Key','wc-multi-vendor-platform-lite' )." </label>
                        <span>
                            <label class='mdc-text-field mdc-text-field--outlined wcmvp-w-50'>
                                <input type='text' class='mdc-text-field__input wcmvp_textbox_width wcmvp_payment_gateway_page_data' id='wcmvp_stripe_secret_key' name='wcmvp_stripe_secret_key' value = ".(isset($wcmvp_stripe_secret_key) ? ($wcmvp_stripe_secret_key) : "" ).">
                                <div class='mdc-notched-outline mdc-notched-outline--upgraded'>
                                    <div class='mdc-notched-outline__leading'></div>
                                        <div class='mdc-notched-outline__notch' >
                                            <span class='mdc-floating-label' >".esc_html__('Stripe Secret Key','wc-multi-vendor-platform-lite')."</span>
                                        </div>
                                    <div class=' mdc-notched-outline__trailing'></div>
                                </div>
                            </label>
                        </span>
                    </li>",
                    "<li class='wcmvp_payment_setting_stripe wcmvp_payment_setting_initial'><label> ".esc_html__( 'Stripe Publishable key','wc-multi-vendor-platform-lite' )." </label>
                        <span>
                            <label class='mdc-text-field mdc-text-field--outlined wcmvp-w-50'>
                                <input type='text' class='mdc-text-field__input wcmvp_textbox_width wcmvp_payment_gateway_page_data' id='wcmvp_stripe_publishable_key' name='wcmvp_stripe_publishable_key' value = ".(isset($wcmvp_stripe_publishable_key) ? ($wcmvp_stripe_publishable_key) : "" ).">
                                <div class='mdc-notched-outline mdc-notched-outline--upgraded'>
                                    <div class='mdc-notched-outline__leading'></div>
                                        <div class='mdc-notched-outline__notch' >
                                            <span class='mdc-floating-label' >".esc_html__('Stripe Publishable Key','wc-multi-vendor-platform-lite')."</span>
                                        </div>
                                    <div class=' mdc-notched-outline__trailing'></div>
                                </div>
                            </label>
                        </span>
                    </li>",
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

            <p class = "submit"><input type = "submit" name = "submit" id = "wcmvp-payment-gateway-submit" class = "mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp-button wcmvp_add_new_prod" value = "<?php esc_html_e('Save Changes','wc-multi-vendor-platform-lite') ?>"></p>
            
            </ul>
        </form> 
        <?php do_action('wcmvp_payment_gateway_page'); ?>
    </div>