<!-- This file contains the html for store setup page -->

<input type="hidden" name="none" class="wcmvp_setup" id="wcmvp_setup_page">
<div class="wcmvp_store_setup_wizzard_body">
  <div class="wcmvp_start_up ">
    <h2 class="wcmvp_heading_store"><?php esc_html_e("Welcome to " . get_bloginfo('name'), "wc-multi-vendor-platform-lite")  ?></h2>
    <h3 class="wcmvp-sub-heading-1"><?php esc_html_e(get_bloginfo('description'), "wc-multi-vendor-platform-lite") ?></h3>
	<p class="wcmvp-instruction"><?php esc_html_e("Prior To Begin! You need to follow some of simple instructions by which you will be safe and won't face any problem related to your store.", "wc-multi-vendor-platform-lite") ?></p>
    <p class="wcmvp_instruct"><?php esc_html_e("Instructions!", "wc-multi-vendor-platform-lite") ?></p>
    <ol>
      <li><?php esc_html_e("Foremost you need to fill the important information related to your store after that click on next.", "wc-multi-vendor-platform-lite") ?></li>
      <li><?php esc_html_e("After that fill the payment methods to get withdrawals easily and hit the submit button.", "wc-multi-vendor-platform-lite") ?></li>
    </ol>
    <p><?php esc_html_e("Now you are ready to run your own store. Best Wishes!!", "") ?></p>
    <button class="wcmvp_start_setup mdc-button mdc-button--raised mdc-button--upgraded wcmvp_button_color" style="background-color : #018786; color : black !important"><?php esc_html_e("Let's Go!", "wc-multi-vendor-platform-lite"); ?></button>
  </div>
  
  <div class="wcmvp_store_setup_settings_sec wcmvp-store-form mdc-elevation--z4 mdc-layout-grid white_color">
	  
    <div id="wcmvp_store_setting_setup" >
	<div class="wcmvp_store_banner_sec1">
		<li class="wcmvp-d-flex">
			<label class="wcmvp_store_banner_heading"><?php esc_html_e("Banner", "wc-multi-vendor-platform-lite") ?></label>
			<span>
			
			<div class="wcmvp_store_banner_sec">
				<div class="wcmvp_store_setup_banner">
				<img id='wcmvp_store_banner_preview' src=''>
				</div>
				<div class="wcmvp_store_banner_box">
				<i class="fa fa-cloud-upload"></i>
				<input style="background:#018786; margin-right:100px" id="wcmvp_store_banner_upload_button" name="wcmvp_banner_image_upload" type="button" class="mdc-button mdc-button--raised mdc-button--upgraded button button_color_custom" value="<?php esc_html_e('Upload image', "wcmvp_multivendor_platform"); ?>" />
				<input type='hidden' name='wcmvp_store_setup_banner_id' id='wcmvp_store_setup_img_id' value=''>
				</div>
			</div>
			
			</span>
		</li>
		
		
		<li class="wcmvp-d-flex">
			<label class="wcmvp_store_banner_heading"><?php esc_html_e("Profile", "wc-multi-vendor-platform-lite") ?></label>
			<span>
			<div class="wcmvp_store_setup_image_sec">
				<div class="wcmvp_store_setup_profile">
				<img id='wcmvp_store_setup_profile' src=''>
				</div>
				<div class="wcmvp_store_profile_box">
				<i class="fa fa-cloud-upload"></i>
				<input style="background:#018786" id="wcmvp_store_profile_upload_button" name="wcmvp_image_profile_upload" type="button" class="mdc-button mdc-button--raised mdc-button--upgraded button" value="<?php esc_html_e('Upload image', "wc-multi-vendor-platform-lite"); ?>" />
				<input type='hidden' name='wcmvp_store_profile_id' id='wcmvp_store_profile_id' value=''>
				</div>
			</div>
			</span>
		</li>
		</div>
     
	  <!-- store setup form -->
	  
      <div class="wcmvp-store-form mdc-elevation--z4 mdc-layout-grid">           
	  	<ul class="mdc-list">
			  
			<li class="wcmvp-d-flex">
				<label><?php esc_html_e("Show Products Per Page","wc-multi-vendor-platform-lite") ?></label>
				<span>
					<label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
						<input type="number" class="mdc-text-field__input" id="wcmvp_store_setup_ppp" name="store_ppp" value="">
						<div class="mdc-notched-outline mdc-notched-outline--upgraded">
							<div class="mdc-notched-outline__leading"></div>
							<div class="mdc-notched-outline__notch">
							<span class="mdc-floating-label" style=""><?php esc_html_e("Store Product Per Page","wc-multi-vendor-platform-lite") ?></span>
							</div>
							<div class="mdc-notched-outline__trailing"></div>
						</div>
					</label>
				</span>
			</li> 
			<li class="wcmvp-d-flex">
			<label><?php esc_html_e("Address Line 1","wc-multi-vendor-platform-lite") ?></label>
			<span>
				<label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
					<input type="text" class="mdc-text-field__input" id="wcmvp_setup_address_one" name="address[street_1]" value="">
					<div class="mdc-notched-outline mdc-notched-outline--upgraded">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						<span class="mdc-floating-label" style=""><?php esc_html_e("Address Line 1","wc-multi-vendor-platform-lite") ?></span>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					</div>
				</label>
			</span>
			</li> 
			<li class="wcmvp-d-flex">
			<label><?php esc_html_e("Address Line 2","wc-multi-vendor-platform-lite") ?></label>
			<span>
				<label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
					<input type="text" class="mdc-text-field__input" id="wcmvp_setup_address_two" name="address[street_2]" value="">
					<div class="mdc-notched-outline mdc-notched-outline--upgraded">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						<span class="mdc-floating-label" style=""><?php esc_html_e("Address Line 2","wc-multi-vendor-platform-lite") ?></span>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					</div>
				</label>
			</span>
		</li>

		<li class="wcmvp-d-flex">
		<label><?php esc_html_e("Country","wc-multi-vendor-platform-lite") ?></label>
		<span><p class="form-row wcmvp_country" id="wcmvp_setup_country_field" data-priority="">
			<span class="woocommerce-input-wrapper">
        <?php

            
          global $woocommerce;
				$countries_obj   = new WC_Countries();
				$countries   = $countries_obj->__get('countries');

				woocommerce_form_field('wcmvp_setup_country', array(
				'type'       => 'select',
				'class'      => array( 'wcmvp_country' ),
				'options'    => $countries
				)
				);
		?>
			
		</li>

		<li class="wcmvp-d-flex">
			<label><?php esc_html_e("State","wc-multi-vendor-platform-lite") ?></label>
			<span>
				<label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
					<input type="text" class="mdc-text-field__input" id="wcmvp_setup_calc_shipping_state" name="address[state]" value="">
					<div class="mdc-notched-outline mdc-notched-outline--upgraded">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						<span class="mdc-floating-label" style=""><?php esc_html_e("State","wc-multi-vendor-platform-lite") ?></span>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					</div>
				</label>
			</span>
		</li>

		<li class="wcmvp-d-flex">
			<label><?php esc_html_e("City","wc-multi-vendor-platform-lite") ?></label>
			<span>
				<label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
					<input type="text" class="mdc-text-field__input" id="wcmvp_setup_address_city" name="address[city]" value="">
					<div class="mdc-notched-outline mdc-notched-outline--upgraded">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						<span class="mdc-floating-label" style=""><?php esc_html_e("City","wc-multi-vendor-platform-lite") ?></span>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					</div>
				</label>
			</span>
		</li> 
		<li class=" wcmvp-d-flex">
			<label><?php esc_html_e("Zip/Postal Code","wc-multi-vendor-platform-lite") ?></label>
			<span>
				<label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
					<input type="text" class="mdc-text-field__input" id="wcmvp_setup_address_zip" name="address[zip]" value="">
					<div class="mdc-notched-outline mdc-notched-outline--upgraded">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						<span class="mdc-floating-label" style=""><?php esc_html_e("Post/Zip Code","wc-multi-vendor-platform-lite") ?></span>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					</div>
				</label>
			</span>
		</li>

		<li class="wcmvp-d-flex">
			<label><?php esc_html_e("Contact No.","wc-multi-vendor-platform-lite") ?></label>
			<span>
				<label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
					<input type="text" class="mdc-text-field__input" id="wcmvp_setup_vendor_phone" name="wcmvp_vendor_phone" value="0">
					<div class="mdc-notched-outline mdc-notched-outline--upgraded mdc-notched-outline--notched">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch" style="width: 38.75px;">
						<span class="mdc-floating-label mdc-floating-label--float-above" style=""><?php esc_html_e("Phone","wc-multi-vendor-platform-lite") ?></span>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					</div>
				</label>
			</span>
		</li>

		<li class="wcmvp-d-flex">
			<label><?php esc_html_e("Store notice","wc-multi-vendor-platform-lite") ?></label>
			<span>
				<label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
					<input type="text" class="mdc-text-field__input wcmvp_notice wcmvp_store_extra_field" id="wcmvp_notice_setting" name="wcmvp_notice" value="">
					<div class="mdc-notched-outline mdc-notched-outline--upgraded">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
							<span class="mdc-floating-label" style=""><?php esc_html_e("Store notice","wc-multi-vendor-platform-lite") ?></span>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					</div>
				</label>
			</span>
		</li>
		<li class="wcmvp-d-flex">
			<label><?php esc_html_e("Map","wc-multi-vendor-platform-lite") ?></label>
			<span>
				<label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
					<input type="text" class="mdc-text-field__input wcmvp_map_key" id="wcmvp_setup_map_api_key" name="wcmvp_map_key" value="">
					<div class="mdc-notched-outline mdc-notched-outline--upgraded">
						<div class="mdc-notched-outline__leading"></div>
						<div class="mdc-notched-outline__notch">
						<span class="mdc-floating-label" style=""><?php esc_html_e("Map","wc-multi-vendor-platform-lite") ?></span>
						</div>
						<div class="mdc-notched-outline__trailing"></div>
					</div>
				</label>
				<div class="wcmvp_vendor_map"></div>
			</span>
		</li>
		<li class=" wcmvp-d-flex">
			<label><?php esc_html_e("Email","wc-multi-vendor-platform-lite") ?></label>
			
				<div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
					<input type="checkbox" class="mdc-checkbox__native-control switch-input" name="show_email" id="wcmvp_setup_show_email" checked=""><div class="mdc-checkbox__background">
					<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
						<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
					</svg>
					<div class="mdc-checkbox__mixedmark"></div>
					</div>
					<div class="mdc-checkbox__ripple"></div>
				</div>
				<?php esc_html_e("Show email address in store","wc-multi-vendor-platform-lite") ?>
			
		</li>

		<li class="wcmvp-d-flex">
			<label><?php esc_html_e("Show more tab","wc-multi-vendor-platform-lite") ?></label>
			
				<div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
					<input type="checkbox" name="show_email" id="wcmvp_setup_show_more_tab" class="mdc-checkbox__native-control" checked=""><div class="mdc-checkbox__background">
					<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
						<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
					</svg>
					<div class="mdc-checkbox__mixedmark"></div>
					</div>
					<div class="mdc-checkbox__ripple"></div>
				</div>
				<p><?php esc_html_e("Enable tab on product single page view","wc-multi-vendor-platform-lite") ?></p>
			
		</li>

		<li class="wcmvp-d-flex">
			<label><?php esc_html_e("Store Timing","wc-multi-vendor-platform-lite") ?></label>
			
				<div class="mdc-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
					<input type="checkbox" class="mdc-checkbox__native-control wcmvp_switch-input" name="show_time_widget" id="wcmvp_setup_show_time_widget" checked=""><div class="mdc-checkbox__background">
					<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
						<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
					</svg>
					<div class="mdc-checkbox__mixedmark"></div>
					</div>
					<div class="mdc-checkbox__ripple"></div>
				</div>
				<?php esc_html_e("Show store opening closing time widget","wc-multi-vendor-platform-lite") ?>
			
		</li>
    	<div class="wcmvp_modal">
			<div class="wcmvp_setup_days_box mdc-elevation--z9 wcmvp-modal-dialog">
				<div class="wcmvp-store-close-btn wcmvp-modal-header">
					<a class="mdc-icon-button material-icons mdc-ripple-upgraded wcmvp-modal-close mdc-ripple-upgraded--unbounded" aria-pressed="false">highlight_off</a>
				</div>
				<div class="wcmvp-date-modal-content">
					<div class="wcmvp_setup_day_row">
						<span class="wcmvp_days_span"><?php esc_html_e("Sunday","wc-multi-vendor-platform-lite") ?></span>
						<select class="wcmvp_setup_days" id="wcmvp_setup_sunday">
							<option value="close"><?php esc_html_e("close","wc-multi-vendor-platform-lite") ?></option>
							<option value="open"><?php esc_html_e("Open","wc-multi-vendor-platform-lite") ?></option>
						</select>
						<div class="wcmvp_setup_timing" style="display: none;">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_sunday_open_time" name="wcmvp_sunday_open_time" placeholder="Select time From" value="">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_sunday_close_time" name="wcmvp_sunday_close_time" placeholder="Select time To" value="">
						</div>
					</div>
					<div class="wcmvp_setup_day_row">
						<span class="wcmvp_days_span"><?php esc_html_e("Monday","wc-multi-vendor-platform-lite") ?></span>
						<select class="wcmvp_setup_days" id="wcmvp_setup_monday">
							<option value="open"><?php esc_html_e("Open","wc-multi-vendor-platform-lite") ?></option>
							<option value="close"><?php esc_html_e("close","wc-multi-vendor-platform-lite") ?></option>
						</select>
						<div class="wcmvp_setup_timing"><input type="text" class="wcmvp_timing_input" id="wcmvp_monday_open_time" name="wcmvp_monday_open_time" placeholder="Select time From" value="">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_monday_close_time" name="wcmvp_monday_close_time" placeholder="Select time To" value="">
						</div>
					</div>
					<div class="wcmvp_setup_day_row">
						<span class="wcmvp_days_span">
							<?php esc_html_e("Tuesday","wc-multi-vendor-platform-lite") ?>
						</span>
						<select class="wcmvp_days" id="wcmvp_setup_tuesday">
							<option value="open"><?php esc_html_e("open","wc-multi-vendor-platform-lite") ?></option>
							<option value="close"><?php esc_html_e("close","wc-multi-vendor-platform-lite") ?></option>
						</select>
						<div class="wcmvp_setup_timing">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_tuesday_open_time" name="wcmvp_tuesday_open_time" placeholder="Select time From" value="">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_tuesday_close_time" name="wcmvp_tuesday_close_time" placeholder="Select time To" value="">
						</div>
					</div>
					<div class="wcmvp_setup_day_row">
						<span class="wcmvp_days_span">
							<?php esc_html_e("Wednesday","wc-multi-vendor-platform-lite") ?>
						</span>
						<select class="wcmvp_days" id="wcmvp_setup_wednesday">
							<option value="open"><?php esc_html_e("Open","wc-multi-vendor-platform-lite") ?></option>
							<option value="close"><?php esc_html_e("close","wc-multi-vendor-platform-lite") ?></option>
						</select>
						<div class="wcmvp_setup_timing">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_wednesday_open_time" name="wcmvp_wednesday_open_time" placeholder="Select time From" value="">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_wednesday_close_time" name="wcmvp_wednesday_close_time" placeholder="Select time To" value="">
						</div>
					</div>
					<div class="wcmvp_setup_day_row">
						<span class="wcmvp_days_span">
							<?php esc_html_e("Thursday","wc-multi-vendor-platform-lite") ?>
						</span>
						<select class="wcmvp_days" id="wcmvp_setup_thursday">
							<option value="open"><?php esc_html_e("Open","wc-multi-vendor-platform-lite") ?></option>
							<option value="close"><?php esc_html_e("close","wc-multi-vendor-platform-lite") ?></option>
						</select>
						<div class="wcmvp_setup_timing">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_thursday_open_time" name="wcmvp_thursday_open_time" placeholder="Select time From" value="">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_thursday_close_time" name="wcmvp_thursday_close_time" placeholder="Select time To" value="">
						</div>
					</div>
					<div class="wcmvp_setup_day_row">
						<span class="wcmvp_days_span">
							<?php esc_html_e("Friday","wc-multi-vendor-platform-lite") ?>
						</span>
						<select class="wcmvp_days" id="wcmvp_setup_friday">
							<option value="open"><?php esc_html_e("open","wc-multi-vendor-platform-lite") ?></option>
							<option value="close"><?php esc_html_e("close","wc-multi-vendor-platform-lite") ?></option>
						</select>
						<div class="wcmvp_setup_timing">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_friday_open_time" name="wcmvp_friday_open_time" placeholder="Select time From" value="">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_friday_close_time" name="wcmvp_friday_close_time" placeholder="Select time To" value="">
						</div>
					</div>

					<div class="wcmvp_setup_day_row">
						<span class="wcmvp_days_span">
							<?php esc_html_e("Saturday","wc-multi-vendor-platform-lite") ?>
						</span>
						<select class="wcmvp_days" id="wcmvp_setup_saturday">
							<option value="open"><?php esc_html_e("open","wc-multi-vendor-platform-lite") ?></option>
							<option value="close"><?php esc_html_e("close","wc-multi-vendor-platform-lite") ?></option>
						</select>
						<div class="wcmvp_setup_timing">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_saturday_open_time" name="wcmvp_saturday_open_time" placeholder="Select time From" value="">
							<input type="text" class="wcmvp_timing_input" id="wcmvp_saturday_close_time" placeholder="Select time To" name="wcmvp_saturday_close_time" value="">
						</div>
					</div>

					<div class="wcmvp-d-flex">
						<label class="wcmvp_time_widgets">
						<?php esc_html_e("Store Open Notice","wc-multi-vendor-platform-lite") ?>
						</label>
						<span>
							<label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
								<input type="text" class="mdc-text-field__input" id="wcmvp_store_open_notice" name="wcmvp_store_open_notice" value="Store is open"><div class="mdc-notched-outline mdc-notched-outline--upgraded mdc-notched-outline--notched">
									<div class="mdc-notched-outline__leading"></div>
									<div class="mdc-notched-outline__notch" style="width: 95.75px;">
									<span class="mdc-floating-label mdc-floating-label--float-above" style=""><?php esc_html_e("Store Open Notice","wc-multi-vendor-platform-lite") ?></span>
									</div>
									<div class="mdc-notched-outline__trailing"></div>
								</div>
							</label>
						</span>
					</div>
					<div class="wcmvp-d-flex">
						<label class="wcmvp_time_widgets">
						<?php esc_html_e("Store close notice","wc-multi-vendor-platform-lite") ?></label>
						<span>
							<label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
								<input type="text" class="mdc-text-field__input" id="wcmvp_store_close_notice" name="wcmvp_store_close_notice" value="Store is close"><div class="mdc-notched-outline mdc-notched-outline--upgraded mdc-notched-outline--notched">
									<div class="mdc-notched-outline__leading"></div>
									<div class="mdc-notched-outline__notch" style="width: 93.5px;">
									<span class="mdc-floating-label mdc-floating-label--float-above" style=""><?php esc_html_e("Store close notice","wc-multi-vendor-platform-lite") ?></span>
									</div>
									<div class="mdc-notched-outline__trailing"></div>
								</div>
							</label>
						</span>
					</div>
				</div>
				<div class="wcmvp-store-submit-btn wcmvp-modal-footer">
					<button class="wcmvp-modal-close mdc-button mdc-button--raised mdc-button--upgraded mdc-ripple-upgraded">Save<?php esc_html_e("Street","wc-multi-vendor-platform-lite") ?></button>
				</div>
			</div>
		</div>
	</ul>
</div>

      <div class="wcmvp-store-setup-next-btn">
	  <button style="background:#018786; margin-right:10px;" class="wcmvp_skip mdc-button mdc-button--raised mdc-button--upgraded"><?php esc_html_e("Skip", "wc-multi-vendor-platform-lite"); ?></button>
      <button style="background:#018786" class="wcmvp_next mdc-button mdc-button--raised mdc-button--upgraded"><?php esc_html_e("Next", "wc-multi-vendor-platform-lite"); ?></button>
        </div>
    </div>
  </div>
  <div class="wcmvp_store_setup_payment_sec wcmvp-payment-section-wrapper mdc-elevation--z9 white_color">
  <div class="wcmvp_back_box">
      <button style="background:#17a2b8" class="wcmvp_back mdc-button mdc-button--raised mdc-button--upgraded"><?php esc_html_e("back", "wc-multi-vendor-platform-lite"); ?></button>
    </div>	  
  <h4 style="color:#17a2b8"><?php esc_html_e("Payment Details", "wc-multi-vendor-platform-lite"); ?></h4>
    
    <p class="wcmvp-text-margin">
      <?php esc_html_e("Wanna get your store payment seamlessly? Please fill all your required details.", "wc-multi-vendor-platform-lite")  ?>
    </p>
    <div class="mdc-elevation--z4 wcmvp-payment-input-box">
      <div class="wcmvp-input-padding">
        <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100 wcmvp_payment_field">
          <input type="text" class="mdc-text-field__input wcmvp-setup-payment-paypal" id="wcmvp_setup_payment_paypal_email" name="paypal">
          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
              <span class="mdc-floating-label"><?php esc_html_e("Email", "wc-multi-vendor-platform-lite") ?></span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
          </div>
        </label>
      </div>
      <div class="wcmvp-input-padding">
        <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100 wcmvp_payment_field">
          <input type="text" class="mdc-text-field__input wcmvp-setup-payment-body" id="wcmvp_setup_payment_account_name" name="account_name">
          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
              <span class="mdc-floating-label"><?php esc_html_e("Account name", "wc-multi-vendor-platform-lite") ?></span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
          </div>
        </label>
      </div>
      <div class="wcmvp-input-padding">
        <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100 wcmvp_payment_field">
          <input type="text" class="mdc-text-field__input wcmvp-setup-payment-body" id="wcmvp_setup_payment_account_no" name="account_no">
          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
              <span class="mdc-floating-label"><?php esc_html_e("Account no", "wc-multi-vendor-platform-lite") ?></span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
          </div>
        </label>
      </div>
      <div class="wcmvp-input-padding">
        <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100 wcmvp_payment_field">
          <input type="text" class="mdc-text-field__input wcmvp-setup-payment-body" id="wcmvp_setup_payment_bank_name" name="bank_name">
          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
              <span class="mdc-floating-label"><?php esc_html_e("Bank name", "wc-multi-vendor-platform-lite") ?></span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
          </div>
        </label>
      </div>
      <div class="wcmvp-input-padding">
        <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100 wcmvp_payment_field">
          <input type="text" class="mdc-text-field__input wcmvp-setup-payment-body" id="wcmvp_setup_payment_bank_place" name="bank_place">
          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
              <span class="mdc-floating-label"><?php esc_html_e("Bank place", "wc-multi-vendor-platform-lite") ?></span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
          </div>
        </label>
      </div>
      <div class="wcmvp-input-padding">
        <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100 wcmvp_payment_field">
          <input type="text" class="mdc-text-field__input wcmvp-setup-payment-body" id="wcmvp_setup_payment_routing_no" name="routing_no">
          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
              <span class="mdc-floating-label"><?php esc_html_e("Routing no.", "wc-multi-vendor-platform-lite") ?></span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
          </div>
        </label>
      </div>
      <div class="wcmvp-input-padding">
        <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100 wcmvp_payment_field">
          <input type="text" class="mdc-text-field__input wcmvp-setup-payment-body" id="wcmvp_setup_payment_iban" name="IBAN">
          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
              <span class="mdc-floating-label"><?php esc_html_e("IBAN", "wc-multi-vendor-platform-lite") ?></span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
          </div>
        </label>
      </div>
      <div class="wcmvp-input-padding">
        <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100 wcmvp_payment_field">
          <input type="text" class="mdc-text-field__input wcmvp-setup-payment-body" id="wcmvp_setup_payment_swift_code" name="swift_code">
          <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
              <span class="mdc-floating-label"><?php esc_html_e("swift_code", "wc-multi-vendor-platform-lite") ?></span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
          </div>
        </label>
      </div>
      <div class="wcmvp_setup_submit">
	  <button style="background:#018786; margin-right:10px;" class="wcmvp_skip mdc-button mdc-button--raised mdc-button--upgraded"><?php esc_html_e("Skip", "wc-multi-vendor-platform-lite"); ?></button>
        <button style="background:#17a2b8" href="#payment" id="wcmvp_setup_payment_submit" class="wcmvp_setup_payment_submit_button mdc-button mdc-button--raised mdc-button--upgraded">
		  <?php esc_html_e("Submit", "wc-multi-vendor-platform-lite") ?>
        </button>
      </div>
    </div>
  </div>
</div>
</div>