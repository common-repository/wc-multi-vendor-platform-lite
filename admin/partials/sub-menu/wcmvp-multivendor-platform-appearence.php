<!-- File contain displaying appearence section of setting tab -->

<?php    

    // Default data for variables

    $wcmvp_enable_map = 1;
    $wcmvp_current_using_map = 'google_map';
    $wcmvp_google_map_value = 0;
    $wcmvp_mapbox_value = 0;
    $wcmvp_vendor_contact_form = 0;
    $wcmvp_store_timing_widget = 1;
    $wcmvp_show_store_sidebar = 0; 
    
    // Get data from options table   
    
    if( current_user_can('manage_options') )
    {
        if( !empty(get_option('wcmvp_appearence_page')) )
        {
            $wcmvp_appearence_page_data = get_option('wcmvp_appearence_page');
            if( is_array($wcmvp_appearence_page_data) && !empty($wcmvp_appearence_page_data) )
            {
                if( isset($wcmvp_appearence_page_data['wcmvp_enable_map']) )
                {
                    $wcmvp_enable_map = $wcmvp_appearence_page_data['wcmvp_enable_map'];
                }
                if( isset($wcmvp_appearence_page_data['wcmvp_current_using_map']) )
                {
                    $wcmvp_current_using_map = $wcmvp_appearence_page_data['wcmvp_current_using_map'];
                }
                if( isset($wcmvp_appearence_page_data['wcmvp_google_map_value']) )
                {
                    $wcmvp_google_map_value = $wcmvp_appearence_page_data['wcmvp_google_map_value'];   
                }
                if( isset($wcmvp_appearence_page_data['wcmvp_mapbox_value']) )
                {
                    $wcmvp_mapbox_value = $wcmvp_appearence_page_data['wcmvp_mapbox_value'];
                }
                if( isset($wcmvp_appearence_page_data['wcmvp_vendor_contact_form']) )
                {
                    $wcmvp_vendor_contact_form = $wcmvp_appearence_page_data['wcmvp_vendor_contact_form'];   
                }
                if( isset($wcmvp_appearence_page_data['wcmvp_store_timing_widget']) )
                {
                    $wcmvp_store_timing_widget = $wcmvp_appearence_page_data['wcmvp_store_timing_widget'];
                }
                if( isset($wcmvp_appearence_page_data['wcmvp_show_store_sidebar']) )
                {
                    $wcmvp_show_store_sidebar = $wcmvp_appearence_page_data['wcmvp_show_store_sidebar'];
                }
            }
        }
    }
     
    ?>
    <div class = "wcmvp-section-content card min-width-100" id = "wcmvp-appearence">
        <h3 class = "wcmvp-setting-heading"><?php esc_html_e( 'Appearance','wc-multi-vendor-platform-lite' ) ?></h3>
        <div class = "wcmvp-subsetting-content wcmvp_subsetting_apperance wcmvp-apperance">
            <ul>
            <?php 
                $wcmvp_appearence_page_data_array = array(
                    "<li><label> ".esc_html__( 'Show Map on Store Page','wc-multi-vendor-platform-lite' )." </label>
                        <span class='wcmvp-general-setting-span'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_enable_map' class='mdc-checkbox__native-control wcmvp_appearence_page_data wcmvp_enable_map' name='wcmvp_enable_map'".(isset( $wcmvp_enable_map ) ? ( ($wcmvp_enable_map == 1) ? "checked='checked'" : "" ) : "")."
                            name = ''> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( 'Enable Map of the Store Location in the store sidebar','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                    </li>",
                    "<li>
                        <label> ".esc_html__( 'Map API Source','wc-multi-vendor-platform-lite' )." </label>
                        <div class = 'wcmvp-right-side'>
 
                            <span><input type = 'radio' id = 'wcmvp-google-map' ".(isset( $wcmvp_current_using_map ) ? ( ($wcmvp_current_using_map == 'google_map') ? "checked='checked'" : "" ) : "")." name = 'wcmvp_map_api'> ".esc_html__( 'Google Maps','wc-multi-vendor-platform-lite' )." </span>
                            <span><input type = 'radio' id = 'wcmvp-mapbox' ".(isset( $wcmvp_current_using_map ) ? ( ($wcmvp_current_using_map == 'mapbox') ? "checked='checked'" : "" ) : "")." name = 'wcmvp_map_api'> ".esc_html__( 'Mapbox','wc-multi-vendor-platform-lite' )." </span>
                            <p class = 'wcmvper-notice'> ".esc_html__( 'Which Map API source you want to use in your site?','wc-multi-vendor-platform-lite' )." </p>
                        </div>
                    </li>",
                    "<li class='wcmvp-multivendor-platform-map-api'>
                    <label> ".esc_html__( 'Map API Source','wc-multi-vendor-platform-lite' )." </label>
                        <span class='wcmvp_map_api_span'>
                            <label class='mdc-text-field mdc-text-field--outlined wcmvp-w-50 wcmvp_map_api_label'>
                                <input type='text' class='mdc-text-field__input wcmvp_textbox_width wcmvp_appearence_page_data' id='wcmvp_google_map_value' name='wcmvp_google_map_value' value = ".(isset($wcmvp_google_map_value) ? ($wcmvp_google_map_value) : "" ).">
                                <div class='mdc-notched-outline mdc-notched-outline--upgraded'>
                                    <div class='mdc-notched-outline__leading'></div>
                                        <div class='mdc-notched-outline__notch' >
                                            <span class='mdc-floating-label'>".esc_html__('Map API Source','wc-multi-vendor-platform-lite')."</span>
                                        </div>
                                    <div class=' mdc-notched-outline__trailing'></div>
                                </div>
                            </label>
                            <p class = 'wcmvper-notice wcmvp_notice_margin'><a href = ".esc_url( 'https://developers.google.com/maps/documentation/javascript/tutorial/' )." target='_blank'> ".esc_html__('API Key','wc-multi-vendor-platform-lite')." </a> ".esc_html__( 'is needed to display map on store page' , 'wc-multi-vendor-platform-lite' )." </p>
                        </span>
                    </li>",
                    "<li class = 'wcmvp-multivendor-platform-mapbox'><label> ".esc_html__( 'Mapbox Access Token','wc-multi-vendor-platform-lite' )." </label>
                        <span class='wcmvp_map_api_span'>
                            <label class='mdc-text-field mdc-text-field--outlined wcmvp-w-50 wcmvp_map_api_label'>
                                <input type='text' class='mdc-text-field__input wcmvp_textbox_width wcmvp_appearence_page_data' id='wcmvp_mapbox_value' name='wcmvp_mapbox_value' value = ".(isset($wcmvp_mapbox_value) ? ($wcmvp_mapbox_value) : "" ).">
                                <div class='mdc-notched-outline mdc-notched-outline--upgraded'>
                                    <div class='mdc-notched-outline__leading'></div>
                                        <div class='mdc-notched-outline__notch' >
                                            <span class='mdc-floating-label' >".esc_html__('Mapbox Access Token','wc-multi-vendor-platform-lite')."</span>
                                        </div>
                                    <div class=' mdc-notched-outline__trailing'></div>
                                </div>
                            </label>
                            <p class = 'wcmvper-notice wcmvp_notice_margin'><a href = ".esc_url( 'https://docs.mapbox.com/help/how-mapbox-works/access-tokens/' ) ." target='_blank'> ".esc_html__( 'Access Token','wc-multi-vendor-platform-lite' ) ."</a> ".esc_html__( 'is needed to display map on store page','wc-multi-vendor-platform-lite' ) ."</p>
                        </span>
                    </li>",
                    "<li><label> ".esc_html__( 'Show Contact Form on Store Page','wc-multi-vendor-platform-lite' )." </label>
                        <div>
                            <span class='wcmvp-general-setting-span'>
                                <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                    <input type='checkbox' id='wcmvp_vendor_contact_form' class='mdc-checkbox__native-control wcmvp_appearence_page_data wcmvp_vendor_contact_form' name='wcmvp_vendor_contact_form'".(isset( $wcmvp_vendor_contact_form ) ? ( ($wcmvp_vendor_contact_form == 1) ? "checked='checked'" : "" ) : "")."
                                name = ''> 
                                    <div class='mdc-checkbox__background'>
                                        <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                            <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                        </svg>
                                        <div class='mdc-checkbox__mixedmark'></div>
                                    </div>
                                    <div class='mdc-checkbox__ripple'></div>
                                </div>
                                <p>".esc_html__( 'Display a vendor contact form in the store sidebar','wc-multi-vendor-platform-lite' )."</p>
                            </span>
                        </div>
                    </li>",
                    "<li><label> ".esc_html__( 'Store Opening Closing Time Widget','wc-multi-vendor-platform-lite' )." </label>
                        <span class='wcmvp-general-setting-span'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_store_timing_widget' class='mdc-checkbox__native-control wcmvp_appearence_page_data wcmvp_store_timing_widget' name='wcmvp_store_timing_widget'".(isset( $wcmvp_store_timing_widget ) ? ( ($wcmvp_store_timing_widget == 1) ? "checked='checked'" : "" ) : "")."
                            name = ''> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( 'Enable store opening & closing time widget in the store sidebar','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                    </li>",
                    "<li><label> ".esc_html__( 'Enable Store Sidebar From Theme','wc-multi-vendor-platform-lite' )." </label>
                        <span class='wcmvp-general-setting-span'>
                            <div class='mdc-checkbox  mdc-data-table__row-checkbox'>
                                <input type='checkbox' id='wcmvp_show_store_sidebar' class='mdc-checkbox__native-control wcmvp_appearence_page_data wcmvp_show_store_sidebar' name='wcmvp_show_store_sidebar'".(isset( $wcmvp_show_store_sidebar ) ? ( ($wcmvp_show_store_sidebar == 1) ? "checked='checked'" : "" ) : "")."
                            name = ''> 
                                <div class='mdc-checkbox__background'>
                                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                                    </svg>
                                    <div class='mdc-checkbox__mixedmark'></div>
                                </div>
                                <div class='mdc-checkbox__ripple'></div>
                            </div>
                            <p>".esc_html__( 'Enable showing Store Sidebar From Your Theme','wc-multi-vendor-platform-lite' )."</p>
                        </span>
                    </li>"
                );
                $wcmvp_appearence_page_data_array = apply_filters('wcmvp_appearence_page_add_meta_data',$wcmvp_appearence_page_data_array);
                if( isset($wcmvp_appearence_page_data_array) && is_array($wcmvp_appearence_page_data_array) )
                {
                    foreach($wcmvp_appearence_page_data_array as $key => $value)
                    {
                        if( isset($value) && !empty($value) )
                        {
                            // $value conntains html==//

                            echo $value;
                        }
                    }
                }
            ?>

                <p class = "submit"><input type = "submit" name = "submit" id = "wcmvp-appearence-submit" class = "mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp-button wcmvp_add_new_prod" value = "<?php esc_html_e('Save Changes','wc-multi-vendor-platform-lite') ?>"><span><a href="<?php echo isset($wcmvp_multivendor_platform_url) ? esc_url($wcmvp_multivendor_platform_url) : ""; ?>" class = "mdc-button mdc-button--outlined mdc-ripple-upgraded wcmvp_store_setup_skip_btn"><?php esc_html_e('Skip For Now','wc-multi-vendor-platform-lite'); ?></a></span></p>
            </ul>
        </div>
        <?php do_action('wcmvp_multivendor_platform_appearence_page'); ?>
    </div>