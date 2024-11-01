<!-- File contain displaying privacy policy section of setting tab -->

<?php

    // Default data, if not set.

    $wcmvp_enable_privacy_policy = 1;
    $wcmvp_setting_privacy_page = 'not_selected';
    $wcmvp_setting_privacy_content = 'Your Privacy Policy Content';

    // Getting data from options table

    if( !empty( get_option('wcmvp_privacy_page') ) )
    {
        $wcmvp_privacy_page_data = get_option('wcmvp_privacy_page');
        if( is_array( $wcmvp_privacy_page_data ) && !empty( $wcmvp_privacy_page_data ) )
        {
            $wcmvp_enable_privacy_policy = $wcmvp_privacy_page_data['wcmvp_enable_privacy_policy'];
            $wcmvp_setting_privacy_page = $wcmvp_privacy_page_data['wcmvp_setting_privacy_page'];
            $wcmvp_setting_privacy_content = $wcmvp_privacy_page_data['wcmvp_setting_privacy_content'];
        }
    }

?>

    <div class = "wcmvp-section-content card min-width-100" id = "wcmvp-privacy-policy">
        <h3 class = "wcmvp-setting-heading"><?php esc_html_e( 'Privacy Policy','wc-multi-vendor-platform-lite' ) ?></h3>
        <div class = "wcmvp-subsetting-content">
            <ul>
            <?php 
                $wcmvp_privacy_policy_page_array = array(
                    "<li><label> ".esc_html__( 'Enable Privacy Policy','wc-multi-vendor-platform-lite' )." </label>
                        <span class='wcmvp-general-setting-span'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_enable_privacy_policy' class='mdc-checkbox__native-control wcmvp_privacy_policy_page_data wcmvp_enable_privacy_policy' name='wcmvp_enable_privacy_policy'".(isset( $wcmvp_enable_privacy_policy ) ? ( ($wcmvp_enable_privacy_policy == 1) ? "checked='checked'" : "" ) : "")."
                            name = ''> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( 'Enable privacy policy for Vendor store contact form','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                    </li>"
                );
                $wcmvp_privacy_policy_page_array = apply_filters('wcmvp_privacy_policy_add_meta_data',$wcmvp_privacy_policy_page_array);
                if( isset($wcmvp_privacy_policy_page_array) && is_array($wcmvp_privacy_policy_page_array) && !empty($wcmvp_privacy_policy_page_array) )
                {
                    foreach($wcmvp_privacy_policy_page_array as $key => $value)
                    {
                        if( isset($value) && !empty($value) )
                        {
                            // $value holds html
                            echo $value;
                        }
                    }
                }
            ?>
                <li><label><?php esc_html_e( 'Privacy Policy Page','wc-multi-vendor-platform-lite' ) ?></label><span>
                    <?php 
                        if( isset( $wcmvp_setting_privacy_page ) && !empty( $wcmvp_setting_privacy_page ) )
                        {
                            ?>
                                <div class='wcmvp_select_box'>
                                    <?php
                                        wp_dropdown_pages(array(
                                        'show_option_none' => 'Select Page',
                                        'option_none_value' => 'not_selected',
                                        'name' => 'wcmvp-setting-privacy-page',
                                        'id' => 'wcmvp-setting-privacy-page',
                                        'class' => 'wcmvp-select-text',
                                        'selected' => $wcmvp_setting_privacy_page
                                        ));
                                    ?>
                                    <label class='wcmvp_select_label'><?php esc_html_e( 'Privacy & Policy Page','wc-multi-vendor-platform-lite' ); ?></label>
                                </div>
                            <?php
                        }
                        else
                        {
                            ?>
                                <div class='wcmvp_select_box'>
                                    <?php
                                        wp_dropdown_pages(array(
                                        'show_option_none' => 'Select Page',
                                        'option_none_value' => 'not_selected',
                                        'name' => 'wcmvp-setting-privacy-page',
                                        'id' => 'wcmvp-setting-privacy-page',
                                        'class' => 'wcmvp-select-text'
                                        ));
                                    ?>
                                    <label class='wcmvp_select_label'><?php esc_html_e( 'Privacy & Policy Page','wc-multi-vendor-platform-lite' ); ?></label>
                                </div>
                            <?php
                        }
                    ?>
                    <p class = "wcmvper-notice"><?php esc_html_e( 'Select a page to show your privacy policy','wc-multi-vendor-platform-lite' ) ?><p></span>
                </li>

                <li><label class = "wcmvp_privacy_policy"><?php esc_html_e( 'Privacy Policy','wc-multi-vendor-platform-lite' ) ?></label>
                <span>
                    <label class="mdc-text-field  wcmvp-w-50 mdc-text-field--textarea mdc-text-field--no-label">
                        <textarea  class=" mdc-text-field__input wcmvp_privacy_policy_content" name='wcmvp_privacy_policy' aria-label="Label" id="wcmvp-setting-privacy-content"><?php esc_html( isset($wcmvp_setting_privacy_content) ? $wcmvp_setting_privacy_content : "") ?></textarea>
                        <span class="mdc-notched-outline">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                    </label>
                </span>
                </li>
                <p class = "submit"><input type = "submit" name = "submit" id = "wcmvp-privacy-submit" class = "mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp-button wcmvp_add_new_prod" value = "<?php esc_html_e('Save Changes','wc-multi-vendor-platform-lite') ?>"></p>
            </ul>    
        </div>
        <?php do_action('wcmvp_multivendor_platform_privacy_policy_page'); ?>
    </div>