<!-- File contain displaying selling options section of setting tab -->
<?php 

$wcmvp_commission_type = 'percentage';
$wcmvp_comission_value = 0;
$wcmvp_shipping_recipient = 'admin';
$wcmvp_tax_recipient = 'admin';
$wcmvp_allow_add_product = 1;
$wcmvp_disable_product_popup = 0;
$wcmvp_order_status_change = 0;

//==========Getting data from options table===================//

    if( current_user_can('manage_options'))
    {
        if( !empty(get_option('wcmvp_selling_page')) )
        {
            $wcmvp_selling_page_options = get_option('wcmvp_selling_page');
            if( is_array($wcmvp_selling_page_options) && !empty($wcmvp_selling_page_options) )
            {
                if( isset($wcmvp_selling_page_options['wcmvp_commission_type']) )
                {
                    $wcmvp_commission_type = $wcmvp_selling_page_options['wcmvp_commission_type'];
                }
                if( isset($wcmvp_selling_page_options['wcmvp_comission_value']) )
                {
                    $wcmvp_comission_value = $wcmvp_selling_page_options['wcmvp_comission_value'];
                }
                if( isset($wcmvp_selling_page_options['wcmvp_shipping_recipient']) )
                {
                    $wcmvp_shipping_recipient = $wcmvp_selling_page_options['wcmvp_shipping_recipient'];
                }
                if( isset($wcmvp_selling_page_options['wcmvp_tax_recipient']) )
                {
                    $wcmvp_tax_recipient = $wcmvp_selling_page_options['wcmvp_tax_recipient'];
                }
                if( isset($wcmvp_selling_page_options['wcmvp_allow_add_product']) )
                {
                    $wcmvp_allow_add_product = $wcmvp_selling_page_options['wcmvp_allow_add_product'];
                }
                if( isset($wcmvp_selling_page_options['wcmvp_disable_product_popup']) )
                {
                    $wcmvp_disable_product_popup = $wcmvp_selling_page_options['wcmvp_disable_product_popup'];
                }
                if( isset($wcmvp_selling_page_options['wcmvp_order_status_change']) )
                {
                    $wcmvp_order_status_change = $wcmvp_selling_page_options['wcmvp_order_status_change'];
                }
            }
        }
    } 
?>     <div class = "wcmvp-section-content card min-width-100" id = "wcmvp-selling-options">
        <h3 class = "wcmvp-setting-heading wcmvp_selling_option_setting_updated"><?php esc_html_e( 'Commission','wc-multi-vendor-platform-lite' ); ?></h3>
        <form class = "wcmvp-subsetting-content" method = "post" action = "">
        <ul>
            <?php 
                $wcmvp_selling_page_fields_array = array(
                "<li><label> ".esc_html__( 'Commission Type','wc-multi-vendor-platform-lite' )." </label><span>
                    <div class='wcmvp_select_box'>
                        <select class = 'wcmvp-select-text wcmvp_selling_option_page_data wcmvp_commission_type' id='wcmvp_commission_type' name = 'wcmvp_commission_type'>
                            <option value = flat ".(isset($wcmvp_commission_type) ? (( $wcmvp_commission_type == 'flat') ? "selected" : "" ) : "" )." > ".esc_attr__( "Flat","wc-multi-vendor-platform-lite" )." </option>
                            <option value = percentage ".(isset($wcmvp_commission_type) ? (( $wcmvp_commission_type == 'percentage') ? "selected" : "" ) : "" )." > ".esc_attr__( 'Percentage','wc-multi-vendor-platform-lite' )." </option>
                        </select>
                        <label class='wcmvp_select_label'>".esc_html__( 'Commission Type','wc-multi-vendor-platform-lite' )."</label>
                    </div>
                    <p class = wcmvper-notice> ".esc_html__( 'Select a commission type for Vendor','wc-multi-vendor-platform-lite' )."<p></span>
                </li>",
                "<li><label> ".esc_html__( 'Admin Commission','wc-multi-vendor-platform-lite' )." </label>
                    <span>
                        <label class='mdc-text-field mdc-text-field--outlined wcmvp-w-50'>
                            <input type='text' class='mdc-text-field__input wcmvp_textbox_width wcmvp_selling_option_page_data' id='wcmvp_comission_value' name='wcmvp_comission_value' value = ".(isset($wcmvp_comission_value) ? ($wcmvp_comission_value) : "" ).">
                            <div class='mdc-notched-outline mdc-notched-outline--upgraded'>
                                <div class='mdc-notched-outline__leading'></div>
                                    <div class='mdc-notched-outline__notch' >
                                        <span class='mdc-floating-label' >".esc_html__('Admission Commision','wc-multi-vendor-platform-lite')."</span>
                                    </div>
                                <div class=' mdc-notched-outline__trailing'></div>
                            </div>
                        </label>
                    </span>
                </li>",
                "<li><label> ".esc_html__( 'Shipping Fee Recipient','wc-multi-vendor-platform-lite' )." </label><span>
                    <div class='wcmvp_select_box'>
                        <select id = 'wcmvp_shipping_recipient' name = 'wcmvp_shipping_fees' class='wcmvp-select-text wcmvp_selling_option_page_data'>
                            <option value = vendor ".(isset($wcmvp_shipping_recipient) ? (( $wcmvp_shipping_recipient == 'vendor') ? "selected" : "" ) : "" )." > ".esc_html__( 'Vendor','wc-multi-vendor-platform-lite' )." </option>
                            <option value = admin ".(isset($wcmvp_shipping_recipient) ? (( $wcmvp_shipping_recipient == 'admin') ? "selected" : "" ) : "" )." > ".esc_html__( 'Admin','wc-multi-vendor-platform-lite' )." </option>
                        </select>
                        <label class='wcmvp_select_label'>".esc_html__( 'Shipping Fee Recipient','wc-multi-vendor-platform-lite' )."</label>
                    </div>
                    <p class = 'wcmvper-notice'> ".esc_html__( 'Who will be receiving the Shipping fees','wc-multi-vendor-platform-lite' )." <p></span>
                </li>",
                "<li><label> ".esc_html__( 'Tax Fee Recipient','wc-multi-vendor-platform-lite' )." </label><span>
                    <div class='wcmvp_select_box'>
                        <select id = 'wcmvp_tax_recipient' name = 'wcmvp_tax_fees' class = 'wcmvp-select-text wcmvp_selling_option_page_data'>
                            <option value = vendor ".(isset($wcmvp_tax_recipient) ? (( $wcmvp_tax_recipient == 'vendor') ? "selected" : "" ) : "" )." >".esc_html__( 'Vendor','wc-multi-vendor-platform-lite' )." </option> 
                            <option value = admin ".(isset($wcmvp_tax_recipient) ? (( $wcmvp_tax_recipient == 'admin') ? "selected" : "" ) : "" )." > ".esc_html__( 'Admin','wc-multi-vendor-platform-lite' )." </option>
                        </select>
                        <label class='wcmvp_select_label'>".esc_html__( 'Tax Fee Recipient','wc-multi-vendor-platform-lite' )."</label>
                    </div>
                    <p class = 'wcmvper-notice'> ".esc_html__( 'Who will be receiving the tax fees','wc-multi-vendor-platform-lite' )." <p></span>
                </li>",
                "<h5 class = 'wcmvp-setting-heading'> ".esc_html__( 'Vendor Capability','wc-multi-vendor-platform-lite' )." </h5>",
                "<li><label> ".esc_html__( 'New Vendor Product Upload','wc-multi-vendor-platform-lite' )." </label>
                    <span class='wcmvp-general-setting-span'>
                        <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                            <input type='checkbox' id='wcmvp_allow_add_product' class='mdc-checkbox__native-control wcmvp_selling_option_page_data wcmvp_allow_add_product' name='wcmvp_allow_add_product'".(isset( $wcmvp_allow_add_product ) ? ( ($wcmvp_allow_add_product == 1) ? "checked='checked'" : "" ) : "")."
                        name = ''> 
                            <div class='mdc-checkbox__background'>
                                <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                    <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                </svg>
                                <div class='mdc-checkbox__mixedmark'></div>
                            </div>
                            <div class='mdc-checkbox__ripple'></div>
                        </div>
                        <p>".esc_html__( 'Allow newly registered vendors to add products','wc-multi-vendor-platform-lite' )."</p>
                    </span>
                </li>",
                "<li><label> ".esc_html__( 'Disable Product Popup','wc-multi-vendor-platform-lite' )." </label>
                    <span class='wcmvp-general-setting-span'>
                        <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                            <input type='checkbox' id='wcmvp_disable_product_popup' class='mdc-checkbox__native-control wcmvp_selling_option_page_data wcmvp_disable_product_popup' name='wcmvp_disable_product_popup'".(isset( $wcmvp_disable_product_popup ) ? ( ($wcmvp_disable_product_popup == 1) ? "checked='checked'" : "" ) : "")."
                        name = ''> 
                            <div class='mdc-checkbox__background'>
                                <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                    <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                </svg>
                                <div class='mdc-checkbox__mixedmark'></div>
                            </div>
                            <div class='mdc-checkbox__ripple'></div>
                        </div>
                        <p>".esc_html__( 'Disable add new product in popup view','wc-multi-vendor-platform-lite' )."</p>
                    </span>
                </li>",
                "<li><label> ".esc_html__( 'Order Status Change','wc-multi-vendor-platform-lite' )." </label>
                    <span class='wcmvp-general-setting-span'>
                        <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                            <input type='checkbox' id='wcmvp_order_status_change' class='mdc-checkbox__native-control wcmvp_selling_option_page_data wcmvp_order_status_change' name='wcmvp_order_status_change'".(isset( $wcmvp_order_status_change ) ? ( ($wcmvp_order_status_change == 1) ? "checked='checked'" : "" ) : "")."
                        name = ''> 
                            <div class='mdc-checkbox__background'>
                                <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                    <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                </svg>
                                <div class='mdc-checkbox__mixedmark'></div>
                            </div>
                            <div class='mdc-checkbox__ripple'></div>
                        </div>
                        <p>".esc_html__( 'Allow/Disallow vendor to update order status','wc-multi-vendor-platform-lite' )."</p>
                    </span>
                </li>"
                );
                $wcmvp_selling_page_fields_array = apply_filters("wcmvp_selling_option_meta_data",$wcmvp_selling_page_fields_array);

                if( isset($wcmvp_selling_page_fields_array) )
                {
                    foreach($wcmvp_selling_page_fields_array as $key => $value)
                    {
                        if( isset($value) )
                        {
                            // $value conntains html==//
                            
                            echo $value;
                        }
                    }   
                }

            ?>
            <p class = "submit"><input type = "submit" name = "submit" id = "wcmvp-selling-page-submit" class = "wcmvp-button mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp_add_new_prod" value = "<?php esc_html_e('Save Changes','wc-multi-vendor-platform-lite') ?>"><span><a href="<?php echo isset($wcmvp_multivendor_platform_url) ? esc_url($wcmvp_multivendor_platform_url) : ""; ?>" class = "mdc-button mdc-button--outlined mdc-ripple-upgraded wcmvp_store_setup_skip_btn"><?php esc_html_e('Skip For Now','wc-multi-vendor-platform-lite'); ?></a></span></p>           
        </ul>
        </form>
        <?php do_action('wcmvp_multivendor_platform_selling_option_page'); ?>
    </div> 