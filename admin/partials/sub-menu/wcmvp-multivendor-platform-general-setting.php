<!-- File contain displaying general section of setting tab -->

<?php

    //Code to get data from options table

    $wcmvp_access_admin_area = 1;
    $wcmvp_store_url = 'store';
    $wcmvp_wizard_logo_id = get_bloginfo( 'name' );
    $wcmvp_welcome_wizard = 0;
    $wcmvp_store_terms = 1;
    if( current_user_can('manage_options' ))
    {
        if( !empty(get_option('wcmvp_general_setting')) )
        {
            $wcmvp_general_page_options = get_option('wcmvp_general_setting');
                if( is_array($wcmvp_general_page_options) && ! empty($wcmvp_general_page_options) )
                {
                    if( isset($wcmvp_general_page_options['wcmvp_access_admin_area']) )
                    {
                        $wcmvp_access_admin_area = $wcmvp_general_page_options['wcmvp_access_admin_area'];
                    }
                    if( isset($wcmvp_general_page_options['wcmvp_store_url']) )
                    {
                        $wcmvp_store_url = $wcmvp_general_page_options['wcmvp_store_url'];
                    }
                    if( isset($wcmvp_general_page_options['wcmvp_wizard_logo_id']) )
                    {
                        $wcmvp_wizard_logo_id = $wcmvp_general_page_options['wcmvp_wizard_logo_id'];
                    }
                    if( isset($wcmvp_general_page_options['wcmvp_welcome_wizard']) )
                    {
                        $wcmvp_welcome_wizard = $wcmvp_general_page_options['wcmvp_welcome_wizard'];
                    }
                    if( isset($wcmvp_general_page_options['wcmvp_store_terms']) )
                    {
                        $wcmvp_store_terms = $wcmvp_general_page_options['wcmvp_store_terms'];
                    }
                }
        }
    }
?>

    <div class = "wcmvp-section-content card min-width-100" id = "wcmvp-general">
        <h5 class = "wcmvp-setting-heading wcmvp_general_setting_updated "><?php esc_html_e( 'Site Options','wc-multi-vendor-platform-lite' ); ?></h5>
        <form class = "wcmvp-subsetting-content" method = "post" action = "">
            <ul>
            <?php
                $wcmvp_general_page_fields_array  = array(
                    "<li><label> ".esc_html__( 'Admin area access','wc-multi-vendor-platform-lite' )." </label>
                        <span class='wcmvp-general-setting-span'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' class='mdc-checkbox__native-control wcmvp_general_setting_page_data' id = 'wcmvp_access_admin_area' ".(isset( $wcmvp_access_admin_area ) ? ( ($wcmvp_access_admin_area == 1) ? "checked='checked'" : "" ) : "")."
                                name = ''> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__('Disallow Vendors from accessing the wp-admin dashboard area','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                    </li>",
                    "<li><label> ".esc_html__('Vendor Store URL','wc-multi-vendor-platform-lite')."</label>
                        <span>
                            <label class='mdc-text-field mdc-text-field--outlined wcmvp-w-50'>
                                <input type='text' class='mdc-text-field__input wcmvp_textbox_width wcmvp_general_setting_page_data' id='wcmvp_store_url' value=".(isset($wcmvp_store_url) ? (esc_attr ($wcmvp_store_url)) : "" ).">
                                <div class='mdc-notched-outline mdc-notched-outline--upgraded'>
                                    <div class='mdc-notched-outline__leading'></div>
                                    <div class='mdc-notched-outline__notch' >
                                    <span class='mdc-floating-label' >".esc_html__('Vendor Store URL','wc-multi-vendor-platform-lite')."</span>
                                    </div>
                                    <div class='mdc-notched-outline__trailing'></div>
                                </div>
							</label>
                            <p class='wcmvper-notice py-1'> ".esc_html__('Define the Vendor store URL ('.site_url().'/[this-text]/[vendor-name])','wc-multi-vendor-platform-lite')." <p>
                        </span>
                    </li>",
                    "<input type = 'hidden' id='wcmvp_wizard_logo_id' class='wcmvp_general_setting_page_data' value = ".(isset($wcmvp_wizard_logo_id) ? (esc_attr($wcmvp_wizard_logo_id)) : "").">",
                    "<li><label> ".esc_html__( 'Vendor Setup Wizard Logo','wc-multi-vendor-platform-lite' )." </label>
                        <span>
                            <label class='mdc-text-field mdc-text-field--outlined wcmvp-w-50'>
                                <input type='text' class='mdc-text-field__input wcmvp_textbox_width wcmvp_edit_vendor_details_data' id='wcmvp_vendor_wizard_logo' value = ".(isset($wcmvp_wizard_logo_id) ? (esc_url( wp_get_attachment_url($wcmvp_wizard_logo_id) )) : "" ).">
                                <div class='mdc-notched-outline mdc-notched-outline--upgraded'>
                                    <div class='mdc-notched-outline__leading'></div>
                                    <div class='mdc-notched-outline__notch' >
                                    <span class='mdc-floating-label' >".esc_html__('Wizard Logo Url','wc-multi-vendor-platform-lite')."</span>
                                    </div>
                                    <div class=' mdc-notched-outline__trailing'></div>
                                </div>
                            </label>
                            <button class='mdc-button mdc-button--outlined mdc-ripple-upgraded wcmvp_upload_wizard_logo_button wcmvp_add_new_prod' id = 'wcmvp_upload_logo_button'>
                                <span class='mdc-button__label wcmvp_label_text'>".esc_html__('Upload','wc-multi-vendor-platform-lite')."</span>
                                <div class='mdc-button__ripple'></div>
                            </button>
                            <p class = 'wcmvper-notice'> ".esc_html__( 'Recommended Logo size ( 270px X 90px ). If no logo is uploaded, site title is shown by default.','wc-multi-vendor-platform-lite' )."<p>
                        </span>
                    </li>",
                    "<li><label> ".esc_html__( 'Disable Welcome Wizard','wc-multi-vendor-platform-lite' )." </label>
                        <span class='wcmvp-general-setting-span'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_welcome_wizard' class='mdc-checkbox__native-control wcmvp_general_setting_page_data' ".(isset( $wcmvp_welcome_wizard ) ? ( ($wcmvp_welcome_wizard == 1) ? "checked='checked'" : "" ) : "")."
                            name = ''> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( 'Disable welcome wizard for newly registered vendors','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                    </li>",
                    "<h5 class = 'wcmvp-setting-heading'> ".esc_html__( 'Vendor Store Options','wc-multi-vendor-platform-lite' )." </h5>",
                    "<li><label> ".esc_html__( 'Store Terms and Conditions','wc-multi-vendor-platform-lite' )." </label>
                        <span class='wcmvp-general-setting-span'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_store_terms' class='mdc-checkbox__native-control wcmvp_general_setting_page_data' ".(isset( $wcmvp_store_terms ) ? ( ($wcmvp_store_terms == 1) ? "checked='checked'" : "" ) : "")."> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( 'Enable Terms and Conditions for vendor stores','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                    </li>"
                );
                $wcmvp_general_page_fields_array = apply_filters('wcmvp_general_page_meta_data',$wcmvp_general_page_fields_array);

                if( isset($wcmvp_general_page_fields_array) && is_array($wcmvp_general_page_fields_array) )
                {
                    foreach($wcmvp_general_page_fields_array as $key => $value)
                    {
                        // $value conntains html==//
                        
                        echo $value;
                    }
                }
                ?>
            </ul>
                <?php
                    $wcmvp_multivendor_platform_url = add_query_arg( array(
                        'page' => 'wc-multi-vendor-platform-lite#dashboard'
                    ),admin_url('admin.php'));
                ?>
            <p class = "submit"><input type = "submit" name = "submit" id = "wcmvp-general-page-submit" class = "wcmvp-button mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp_add_new_prod" value = "<?php esc_html_e('Save Changes','wc-multi-vendor-platform-lite') ?>"><span><a href="<?php echo isset($wcmvp_multivendor_platform_url) ? esc_url($wcmvp_multivendor_platform_url) : ""; ?>" class = "mdc-button mdc-button--outlined mdc-ripple-upgraded wcmvp_store_setup_skip_btn"><?php esc_html_e('Skip For Now','wc-multi-vendor-platform-lite'); ?></a></span></p>
                   
        </form>
        <?php do_action('wcmvp_multivendor_platform_general_page'); ?>
    </div>