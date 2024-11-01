<!-- This file contains the html for store setting section -->

<div class="card wcmvp_store_setting_wrap">
    <div class="wcmvp_store_settings_box">
        <div class="wcmvp-vendor-store-setting-wrapper">
            <div class="wcmvp_store_setting_heading"><?php esc_html_e("Store Setting", "wc-multi-vendor-platform-lite") ?></div>
            <?php
            $wcmvp_banner_sec = ' <div class="wcmvp-store-banner-section mdc-layout-grid">
            <img class="mdc-image-list__image"';
            if (get_user_meta(get_current_user_id(), "wcmvp_vendor_store_img", true)) {
                $wcmvp_banner_sec .= "src='" . esc_url(wp_get_attachment_image_src(intval(get_user_meta(get_current_user_id(), "wcmvp_vendor_store_img", true)))[0]) . "'";
                $wcmvp_bannewr_button_text = "Change Banner";
                $wcmvp_banner_img_id = get_user_meta(get_current_user_id(), "wcmvp_vendor_store_img", true);
            } else {
                $wcmvp_banner_sec .= 'src=""';
                $wcmvp_banner_img_id = "";
                $wcmvp_bannewr_button_text = "Upload Banner";
            }
            $wcmvp_banner_sec .= 'id="wcmvp_store_img_preview">
            <div class="wcmvp_banner_remove">
            <span class="wcmvp_banner_remove_button material-icons">
            clear
            </span>
            </div>
<div class="wcmvp-banner-btn">
    
    <input type="hidden" name="wcmvp_store_banner_id" id="wcmvp_store_img_id" value="' . $wcmvp_banner_img_id . '">
</div>
<button type="button" id="wcmvp_store_upload_button" class="mdc-button mdc-button--raised mdc-ripple-upgraded">
        <span class="mdc-button__label">' . esc_html__($wcmvp_bannewr_button_text, "wc-multi-vendor-platform-lite") . '</span>
        <div class="mdc-button__ripple"></div>
    </button>
</div>';
            $wcmvp_store_html[] = $wcmvp_banner_sec;
            $wcmvp_profile_sec = '<div class="wcmvp-profile-section">       
<div class="wcmvp-profile-div">
    <img id="wcmvp_profile_img_preview" ';
            if (get_user_meta(get_current_user_id(), "wcmvp_vendor_profile_img", true)) {
                $wcmvp_profile_sec .= "src='" . esc_url(wp_get_attachment_image_src(intval(get_user_meta(get_current_user_id(), "wcmvp_vendor_profile_img", true)))[0]) . "'";
                $wcmvp_profile_button_text = "Change Icon";
                $wcmvp_profile_img_id = get_user_meta(get_current_user_id(), "wcmvp_vendor_profile_img", true);
            } else {
                $wcmvp_profile_sec .= 'src=""';
                $wcmvp_profile_img_id = "";
                $wcmvp_profile_button_text = "Upload Banner";
            }
            $wcmvp_profile_sec .= '>
            </div>
            <div class="wcmvp_profile_remove">
            <span class="wcmvp_profile_remove_button material-icons">
            clear
            </span>
            </div>
            <input type="hidden" name="wcmvp_profile_id" id="wcmvp_profile_img_id" value="' . $wcmvp_profile_img_id . '">
<button type="button" id="wcmvp_profile_upload_button" class="mdc-button mdc-button--raised mdc-ripple-upgraded">
    <span class="mdc-button__label">' . esc_html__($wcmvp_profile_button_text, "wc-multi-vendor-platform-lite") . '</span>
    <div class="mdc-button__ripple"></div>
</button>
</div>';
            $wcmvp_store_html[] = $wcmvp_profile_sec;
            $wcmvp_store_html[] = '<div class="wcmvp-store-form mdc-elevation--z4 mdc-layout-grid">           
<ul class="mdc-list">';
            $wcmvp_store_html[] = '<li class="wcmvp-d-flex">
<label>' . esc_html__("Store Product Per Page", "wc-multi-vendor-platform-lite") . '</label>
<span>
    <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
        <input type="number" class="mdc-text-field__input" id="wcmvp_store_ppp" name="store_ppp" value="' . esc_attr__(get_user_meta(get_current_user_id(), "wcmvp_vendor_prod_per_page", true)) . '">
        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
            <span class="mdc-floating-label">' . esc_html__("Store Product Per Page", "wc-multi-vendor-platform-lite") . '</span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
        </div>
    </label>
</span>
</li>';
            $wcmvp_store_html[] = ' <li class="wcmvp-d-flex">
<label>' . esc_html__("Street", "wc-multi-vendor-platform-lite") . '</label>
<span>
    <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
        <input type="text" class="mdc-text-field__input"  id="wcmvp_address_one" name="address[street_1]" value="' . esc_attr__(get_user_meta(get_current_user_id(), "wcmvp_vendor_address1", true)) . '">
        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
            <span class="mdc-floating-label">' . esc_html__("Street", "wc-multi-vendor-platform-lite") . '</span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
        </div>
    </label>
</span>
</li>';

            $wcmvp_store_html[] = ' <li class="wcmvp-d-flex">
<label>' . esc_html__("Street 2t", "wc-multi-vendor-platform-lite") . '</label>
<span>
    <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
        <input type="text" class="mdc-text-field__input"  id="wcmvp_address_two" name="address[street_2]" value="' . esc_attr__(get_user_meta(get_current_user_id(), "wcmvp_vendor_address2", true)) . '">
        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
            <span class="mdc-floating-label">' . esc_html__("Street 2t", "wc-multi-vendor-platform-lite") . '</span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
        </div>
    </label>
</span>
</li>';

            $wcmvp_store_html[] =  '<li class="wcmvp-d-flex">
<label>' . esc_html__("City", "wc-multi-vendor-platform-lite") . '</label>
<span>
    <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
        <input type="text" class="mdc-text-field__input" id="wcmvp_address_city" name="address[city]" value="' . esc_attr(get_user_meta(get_current_user_id(), "wcmvp_vendor_city", true)) . '">
        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
            <span class="mdc-floating-label">' . esc_html__("City", "wc-multi-vendor-platform-lite") . '</span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
        </div>
    </label>
</span>
</li>';

            $wcmvp_store_html[] = ' <li class=" wcmvp-d-flex">
<label>' . esc_html__("Post/Zip Code", "wc-multi-vendor-platform-lite") . '</label>
<span>
    <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
        <input type="text" class="mdc-text-field__input" id="wcmvp_address_zip" name="address[zip]" value="' . esc_attr(get_user_meta(get_current_user_id(), "wcmvp_vendor_zip", true)) . '">
        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
            <span class="mdc-floating-label">' . esc_html__("Post/Zip Code", "wc-multi-vendor-platform-lite") . '</span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
        </div>
    </label>
</span>
</li>';

            $wcmvp_country_html =  '<li class="wcmvp-d-flex">
<label>' . esc_html__('Countries', 'wc-multi-vendor-platform-lite') . '</label>
<span>';

            global $woocommerce;
            $countries_obj   = new WC_Countries();
            $countries   = $countries_obj->__get('countries');
            $default_country = $countries_obj->get_base_country();
            $default_county_states = $countries_obj->get_states($default_country);
            ob_start();
            woocommerce_form_field(
                'wcmvp_country',
                array(
                    'type'       => 'select',
                    'class'      => array('wcmvp_country'),
                    'placeholder'    => esc_attr__('Enter something',"wc-multi-vendor-platform-lite"),
                    'return'  => false,
                    'options'    => $countries
                ),
                get_user_meta(get_current_user_id(), "wcmvp_vendor_country", true)
            );
            $wcmvp_country_html .= ob_get_clean();
            $wcmvp_country_html .= '</span>
</li>';
            $wcmvp_store_html[] = $wcmvp_country_html;
            $wcmvp_store_html[] = '<li class="wcmvp-d-flex">
<label>' . esc_html__("State", "wc-multi-vendor-platform-lite") . '</label>
<span>
    <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
        <input type="text" class="mdc-text-field__input" id="wcmvp_calc_shipping_state" name="address[state]" value="' . esc_attr(get_user_meta(get_current_user_id(), "wcmvp_vendor_state", true)) . '">
        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
            <span class="mdc-floating-label">' . esc_html__("State", "wc-multi-vendor-platform-lite") . '</span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
        </div>
    </label>
</span>
</li>';
            $wcmvp_store_html[] = '<li class="wcmvp-d-flex">
<label>' . esc_html__("Phone", "wc-multi-vendor-platform-lite") . '</label>
<span>
    <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
        <input type="text" class="mdc-text-field__input" id="wcmvp_vendor_phone" name="wcmvp_vendor_phone" value="' . esc_attr((int) get_user_meta(get_current_user_id(), "wcmvp_phone", true)) . '">
        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
            <span class="mdc-floating-label">' . esc_html__("Phone", "wc-multi-vendor-platform-lite") . '</span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
        </div>
    </label>
</span>
</li>';
            $wcmvp_show_email_checkbox = '<li class=" wcmvp-d-flex">
<label>' . esc_html__("Email", "wc-multi-vendor-platform-lite") . '</label>
<span class="wcmvp-d-flex">
    <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
        <input type="checkbox" class="mdc-checkbox__native-control switch-input" name="show_email" id="wcmvp_show_email" ';
            if (get_user_meta(get_current_user_id(), "wcmvp_vendor_show_email", true)) {
                $wcmvp_show_email_checkbox .= "checked";
            }
            $wcmvp_show_email_checkbox .= '><div class="mdc-checkbox__background">
        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
        </svg>
        <div class="mdc-checkbox__mixedmark"></div>
        </div>
        <div class="mdc-checkbox__ripple"></div>
    </div>
    <p>' . esc_html__("Show email address in store", "wc-multi-vendor-platform-lite") . '</p>
</span>
</li>';
            $wcmvp_store_html[] = $wcmvp_show_email_checkbox;
            $wcmvp_show_more_tabs = '<li class="wcmvp-d-flex">
<label>' . esc_html__("Show more tab", "wc-multi-vendor-platform-lite") . '</label>
<span class="wcmvp-d-flex">
    <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
        <input type="checkbox" name="show_email" id="wcmvp_show_more_tab" class="mdc-checkbox__native-control" ';
            if (get_user_meta(get_current_user_id(), "wcmvp_show_more_tab", true)) {
                $wcmvp_show_more_tabs .= "checked";
            }
            $wcmvp_show_more_tabs .= '><div class="mdc-checkbox__background">
        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
        </svg>
        <div class="mdc-checkbox__mixedmark"></div>
        </div>
        <div class="mdc-checkbox__ripple"></div>
    </div>
    <p>' . esc_html__("Enable tab on product single page view", "wc-multi-vendor-platform-lite") . '</p>
</span>
</li>';
            $wcmvp_store_html[] = $wcmvp_show_more_tabs;
            $wcmvp_store_html[] =  '<li class="wcmvp-d-flex">
<label>' . esc_html__("Map", "wc-multi-vendor-platform-lite") . '</label>
<span>
    <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
        <input type="text" class="mdc-text-field__input wcmvp_map_key" id="wcmvp_map_api_key" name="wcmvp_map_key" value="' . esc_attr(get_user_meta(get_current_user_id(), "wcmvp_map_api_key", true)) . '">
        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
            <span class="mdc-floating-label">' . esc_html__("Map", "wc-multi-vendor-platform-lite") . '</span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
        </div>
    </label>
    <div class="wcmvp_vendor_map"></div>
</span>
</li>';
            $wcmvp_show_widget =  '<li class="wcmvp-d-flex">
         <label>' . esc_html__("Store Opening Closing Time", "wc-multi-vendor-platform-lite") . '</label>
         <span class="wcmvp-d-flex">
             <div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
                 <input type="checkbox" class="mdc-checkbox__native-control wcmvp_switch-input" name="show_time_widget" id="wcmvp_show_time_widget"';
            if (get_user_meta(get_current_user_id(), "wcmvp_show_time_widget", true)) {
                $wcmvp_show_widget .= "checked";
            }
            $wcmvp_show_widget .= '><div class="mdc-checkbox__background">
                 <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                     <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                 </svg>
                 <div class="mdc-checkbox__mixedmark"></div>
                 </div>
                 <div class="mdc-checkbox__ripple"></div>
             </div>
             <p>' . esc_html__("Show store opening closing time widget in store page", "wc-multi-vendor-platform-lite") . '</p>
         </span>
     </li>';
            $wcmvp_store_html[] = $wcmvp_show_widget;
            $wcmvp_modal_time = '<div class="wcmvp_modal" id="wcmvp_timming_modal">
<div class="wcmvp_setup_days_box mdc-elevation--z9 wcmvp-modal-dialog">
<div class="wcmvp-store-close-btn wcmvp-modal-header">
      <a class="mdc-icon-button material-icons mdc-ripple-upgraded wcmvp-modal-close mdc-ripple-upgraded--unbounded" aria-pressed="false">highlight_off</a>
    </div>
  <div class="wcmvp-date-modal-content">
      <div class="wcmvp_setup_day_row">
      <span class="wcmvp_days_span">
       ' . esc_html__("Sunday", "wc-multi-vendor-platform-lite") . '
      </span>';
            $wcmvp_modal_time .= '<select class="wcmvp_days" id="wcmvp_sunday">
    <option value="close">' . esc_html__("close", "wc-multi-vendor-platform-lite") . '</option>
    <option value="open"';
            if (isset($wcmvp_sun_state)  && $wcmvp_sun_state['status'] == 'open') {
                $wcmvp_modal_time .= "selected";
            }
            $wcmvp_modal_time .= '> ' . esc_html__("Open", "wc-multi-vendor-platform-lite") . '</option>
</select>';
            $wcmvp_modal_time .=  '<div class="wcmvp_setup_timing"><input type="text" class="wcmvp_timing_input" id="wcmvp_sunday_open_time" name="wcmvp_sunday_open_time" placeholder="Select time From" value="';
            if (isset($wcmvp_sun_state['store_open-time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_sun_state['store_open-time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '"><input type="text" class="wcmvp_timing_input" id="wcmvp_sunday_close_time" name="wcmvp_sunday_close_time" placeholder="Select time To" value="';
            if (isset($wcmvp_sun_state['store_close_time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_sun_state['store_close_time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '">';
            $wcmvp_modal_time .= '</div>
    </div>
    <div class="wcmvp_setup_day_row">
      <span class="wcmvp_days_span">
        ' . esc_html__("Monday", "wc-multi-vendor-platform-lite") . '
      </span>';
            if (get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)) {
                $wcmvp_mon_state = get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)['Monday'];
            }
            $wcmvp_modal_time .= '<select class="wcmvp_days" id="wcmvp_monday">
    <option value="open">' . esc_html__("Open", "wc-multi-vendor-platform-lite") . '</option>
    <option value="close"';
            if (isset($wcmvp_mon_state) && $wcmvp_mon_state['status'] == 'close') {
                $wcmvp_modal_time .= "selected";
            }
            $wcmvp_modal_time .= '>' . esc_html__("close", "wc-multi-vendor-platform-lite") . '</option>
</select>';
            $wcmvp_modal_time .= '<div class="wcmvp_setup_timing"><input type="text" class="wcmvp_timing_input" id="wcmvp_monday_open_time" name="wcmvp_monday_open_time" placeholder="Select time From" value="';
            if (isset($wcmvp_mon_state['store_open-time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_mon_state['store_open-time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '">
                          <input type="text" class="wcmvp_timing_input" id="wcmvp_monday_close_time" name="wcmvp_monday_close_time" placeholder="Select time To" value="';
            if (isset($wcmvp_mon_state['store_close_time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_mon_state['store_close_time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '">';
            $wcmvp_modal_time .= '</div>
    </div>
    <div class="wcmvp_setup_day_row">
      <span class="wcmvp_days_span">
        ' . esc_html__("Tuesday", "wc-multi-vendor-platform-lite") . '
      </span>';
            if (get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)) {
                $wcmvp_tues_state = get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)['Tuesday'];
            }
            $wcmvp_modal_time .= '<select class="wcmvp_days" id="wcmvp_tuesday">
                        <option value="open">' . esc_html__("Open", "wc-multi-vendor-platform-lite") . '</option>
                        <option value="close"';
            if (isset($wcmvp_tues_state) && $wcmvp_tues_state['status'] == 'close') {
                $wcmvp_modal_time .= "selected";
            }
            $wcmvp_modal_time .= '>' . esc_html__("close", "wc-multi-vendor-platform-lite") . '</option>
                    </select>';
            $wcmvp_modal_time .= '<div class="wcmvp_setup_timing">';
            $wcmvp_modal_time .= '<input type="text" class="wcmvp_timing_input" id="wcmvp_tuesday_open_time" name="wcmvp_tuesday_open_time" placeholder="Select time From" value="';
            if (isset($wcmvp_tues_state['store_open-time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_tues_state['store_open-time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '">
                         <input type="text" class="wcmvp_timing_input" id="wcmvp_tuesday_close_time" name="wcmvp_tuesday_close_time" placeholder="Select time To" value="';
            if (isset($wcmvp_tues_state['store_close_time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_tues_state['store_close_time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '">';
            $wcmvp_modal_time .= '</div>
    </div>
    <div class="wcmvp_setup_day_row">
      <span class="wcmvp_days_span">
        ' . esc_html__("Wednesday", "wc-multi-vendor-platform-lite") . '
      </span>';
            if (get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)) {
                $wcmvp_wed_state = get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)['Wednesday'];
            }
            $wcmvp_modal_time .= '<select class="wcmvp_days" id="wcmvp_wednesday">
                        <option value="open">' . esc_html__("Open", "wc-multi-vendor-platform-lite") . '</option>
                        <option value="close"';
            if (isset($wcmvp_wed_state) && $wcmvp_wed_state['status'] == 'close') {
                $wcmvp_modal_time .= "selected";
            }
            $wcmvp_modal_time .= '>' . esc_html__("close", "wc-multi-vendor-platform-lite") . '</option>
                    </select>';
            $wcmvp_modal_time .= '<div class="wcmvp_setup_timing">';
            $wcmvp_modal_time .= '<input type="text" class="wcmvp_timing_input" id="wcmvp_wednesday_open_time" name="wcmvp_wednesday_open_time" placeholder="Select time From" value="';
            if (isset($wcmvp_wed_state['store_open-time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_wed_state['store_open-time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '">
                     <input type="text" class="wcmvp_timing_input" id="wcmvp_wednesday_close_time" name="wcmvp_wednesday_close_time" placeholder="Select time To" value="';
            if (isset($wcmvp_wed_state['store_close_time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_wed_state['store_close_time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '">';
            $wcmvp_modal_time .=  '</div>
    </div>
    <div class="wcmvp_setup_day_row">
      <span class="wcmvp_days_span">
        ' . esc_html__("Thursday", "wc-multi-vendor-platform-lite") . '
      </span>';
            if (get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)) {
                $wcmvp_thurs_state = get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)['Thursday'];
            }
            $wcmvp_modal_time .= '<select class="wcmvp_days" id="wcmvp_thursday">
                        <option value="open">' . esc_html__("Open", "wc-multi-vendor-platform-lite") . '</option>
                        <option value="close"';
            if (isset($wcmvp_thurs_state) && $wcmvp_thurs_state['status'] == 'close') {
                $wcmvp_modal_time .= "selected";
            }
            $wcmvp_modal_time .= '>' . esc_html__("close", "wc-multi-vendor-platform-lite") . '</option>
                    </select>';
            $wcmvp_modal_time .= '<div class="wcmvp_setup_timing">';
            $wcmvp_modal_time .= '<input type="text" class="wcmvp_timing_input" id="wcmvp_thursday_open_time" name="wcmvp_thursday_open_time" placeholder="Select time From" value="';
            if (isset($wcmvp_thurs_state['store_open-time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_thurs_state['store_open-time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '"><input type="text" class="wcmvp_timing_input" id="wcmvp_thursday_close_time" name="wcmvp_thursday_close_time" placeholder="Select time To" value="';
            if (isset($wcmvp_thurs_state['store_close_time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_thurs_state['store_close_time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '">';
            $wcmvp_modal_time .= '</div></div>
    <div class="wcmvp_setup_day_row">
      <span class="wcmvp_days_span">
        ' . esc_html__("Friday", "wc-multi-vendor-platform-lite") . '
      </span>';
            if (get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)) {
                $wcmvp_fri_state = get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)['Friday'];
            }
            $wcmvp_modal_time .= '<select class="wcmvp_days" id="wcmvp_friday">
                                        <option value="open">' . esc_html__("Open", "wc-multi-vendor-platform-lite") . '</option>
                                        <option value="close"';
            if (isset($wcmvp_fri_state) && $wcmvp_fri_state['status'] == 'close') {
                $wcmvp_modal_time .= "selected";
            }
            $wcmvp_modal_time .= '>' . esc_html__("close", "wc-multi-vendor-platform-lite") . '</option>
                                    </select>';
            $wcmvp_modal_time .= '<div class="wcmvp_setup_timing">';

            $wcmvp_modal_time .= '<input type="text" class="wcmvp_timing_input" id="wcmvp_friday_open_time" name="wcmvp_friday_open_time" placeholder="Select time From" value="';
            if (isset($wcmvp_fri_state['store_open-time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_fri_state['store_open-time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '"><input type="text" class="wcmvp_timing_input" id="wcmvp_friday_close_time" name="wcmvp_friday_close_time" placeholder="Select time To" value="';
            if (isset($wcmvp_fri_state['store_close_time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_fri_state['store_close_time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '">';
            $wcmvp_modal_time .= '</div>
    </div>
    <div class="wcmvp_setup_day_row">
      <span class="wcmvp_days_span">
        ' . esc_html__("Saturday", "wc-multi-vendor-platform-lite") . '
      </span>';
            if (get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)) {
                $wcmvp_sat_state = get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)['Saturday'];
            }
            $wcmvp_modal_time .= '<select class="wcmvp_days" id="wcmvp_saturday">
                                        <option value="open">' . esc_html__("Open", "wc-multi-vendor-platform-lite") . '</option>
                                        <option value="close"';
            if (isset($wcmvp_sat_state) && $wcmvp_sat_state['status'] == 'close') {
                $wcmvp_modal_time .= "selected";
            }
            $wcmvp_modal_time .= '>' . esc_html__("close", "wc-multi-vendor-platform-lite") . '</option>
                                    </select>';
            $wcmvp_modal_time .= '<div class="wcmvp_setup_timing">
      <input type="text" class="wcmvp_timing_input" id="wcmvp_saturday_open_time" name="wcmvp_saturday_open_time" placeholder="Select time From" value="';
            if (isset($wcmvp_sat_state['store_open-time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_sat_state['store_open-time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '"><input type="text" class="wcmvp_timing_input" id="wcmvp_saturday_close_time" placeholder="Select time To" name="wcmvp_saturday_close_time" value="';
            if (isset($wcmvp_sat_state['store_close_time'])) {
                $wcmvp_modal_time .= esc_attr__($wcmvp_sat_state['store_close_time'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '">';
            $wcmvp_modal_time .= '</div>
    </div>
    <div class="wcmvp-d-flex">
      <label class="wcmvp_time_widgets">
      ' . esc_html__("Store Open Notice", "wc-multi-vendor-platform-lite") . '
      </label>
        <span><label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
            <input type="text" class="mdc-text-field__input" id="wcmvp_store_open_notice" name="wcmvp_store_open_notice" value="';
            if (get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)) {
                $wcmvp_modal_time .= esc_attr__(get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)['Store_open_notice'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '"><div class="mdc-notched-outline mdc-notched-outline--upgraded">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                <span class="mdc-floating-label">' . esc_html__("Store Open Notice", "wc-multi-vendor-platform-lite") . '</span>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
            </div>
        </label>';
            $wcmvp_modal_time .= '</span>
    </div>
    <div class="wcmvp-d-flex">
      <label class="wcmvp_time_widgets">
      ' . esc_html__("Store close notice", "wc-multi-vendor-platform-lite") . '</label>
        <span><label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
       <input type="text" class="mdc-text-field__input" id="wcmvp_store_close_notice" name="wcmvp_store_close_notice" value="';
            if (get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)) {
                $wcmvp_modal_time .= esc_attr__(get_user_meta(get_current_user_id(), "wcmvp_store_time_widget", true)['Store_close_notice'], "wc-multi-vendor-platform-lite");
            }
            $wcmvp_modal_time .= '"><div class="mdc-notched-outline mdc-notched-outline--upgraded">
           <div class="mdc-notched-outline__leading"></div>
           <div class="mdc-notched-outline__notch">
           <span class="mdc-floating-label">' . esc_html__("Store close notice", "wc-multi-vendor-platform-lite") . '</span>
           </div>
           <div class="mdc-notched-outline__trailing"></div>
       </div>
   </label>';
            $wcmvp_modal_time .= '</span>
    </div>
   </div>
   <div class="wcmvp-store-submit-btn wcmvp-modal-footer"> <button class="wcmvp-modal-close mdc-button mdc-button--raised mdc-button--upgraded">' . esc_html__("Save", "wc-multi-vendor-platform-lite") . '</button></div>
</div>
</div>';
            $wcmvp_store_html[] =  $wcmvp_modal_time;
            $wcmvp_store_html[] =  '</ul>
    </div>
    </div>
    </div>
        <div class="wcmvp_store_submit_box">
        <button type="button" data-id="' . esc_attr(get_current_user_id()) . '" id="wcmvp_store_submit" class="mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp_submit_button_store">
            <span class="mdc-button__label">' . esc_html__("Submit", "wc-multi-vendor-platform-lite") . '</span>
            <div class="mdc-button__ripple"></div>
        </button>
      </div>';
            $wcmvp_store_html = apply_filters("wcmvp_store_html", $wcmvp_store_html);
            if (isset($wcmvp_store_html) && !empty($wcmvp_store_html)) {
                foreach ($wcmvp_store_html as $key => $wcmvp_value) {
                    echo $wcmvp_value; // This variable holds html
                }
            }
            ?>
        </div>