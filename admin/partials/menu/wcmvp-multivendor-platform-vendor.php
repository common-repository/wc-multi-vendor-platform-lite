<?php
// This File used to display vendor's list at admin dashboard end
?>
<div class="wcmvp_multivendor_platform_vendor_product">

	<?php
	do_action('wcmvp_multivendor_platform_vendors_product');
		include_once(WCMVP_ADMIN_PARTIAL_MENU . 'wcmvp-multivendor-platform-vendor_product.php');
	?>

</div>
<div class="wcmvp_multivendor_platform_vendor_orders">

	<?php
	do_action('wcmvp_multivendor_platform_order_page');
		include_once(WCMVP_ADMIN_PARTIAL_MENU . 'wcmvp-multivendor-platform-vendor_orders.php');
	?>

</div>
<?php

if (!empty(get_option('wcmvp_sort_by_vend_status'))) {

	$wcmvp_sort_by_vend_status = get_option('wcmvp_sort_by_vend_status');

	if (isset($wcmvp_sort_by_vend_status) && !empty($wcmvp_sort_by_vend_status)) {
?>
		<input type="hidden" id="wcmvp_sort_by_vend_status_save" value="<?php echo esc_html($wcmvp_sort_by_vend_status); ?>">
<?php
	}
}

?>

<div class="wcmvp_vendors_details">
	<h3>Vendor
		<a href="#/vendor" id="wcmvp_add_new_vend" class="wcmvp_add_new_vend mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_add_new_prod" data-target="#wcmvp-add-new-vend-modal">
			<i class="fas fa-users mr-1 wcmvp-fa-fa-space"></i>
			<?php esc_html_e('Add Vendor', 'wc-multi-vendor-platform-lite'); ?>
		</a>
		<?php do_action('wcmvp_add_extra_features_btn'); ?>
	</h3>
	<div class="wcmvp_bulk_action">
		

		<div class="wcmvp_prod_sorting wcmvp_vendor_chang" id="wcmvp-prod-sorting-tabs">

			<?php
			
			$wcmvp_vendor_sorting_tab = array(
				"<a href='#' id='wcmvp_vendor_sort_all_vend' class='mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_vendor_status' data-value='all_vend'>".esc_html__('All', 'wc-multi-vendor-platform-lite')."</a>",
				
				"<a href='#' id='wcmvp_vendor_sort_approve' class='mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_vendor_status' data-value='approve'>".esc_html__('Approved', 'wc-multi-vendor-platform-lite')."</a>",
				
				"<a href='#' id='wcmvp_vendor_sort_disable' class='mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_vendor_status' data-value='disable'>".esc_html__('Disabled', 'wc-multi-vendor-platform-lite')."</a>"
				
			);
			if( isset($wcmvp_vendor_sorting_tab) && is_array($wcmvp_vendor_sorting_tab) )
			{
				$wcmvp_vendor_sorting_tab = apply_filters('wcmvp_vendor_sorting_tab',$wcmvp_vendor_sorting_tab);
				if( isset($wcmvp_vendor_sorting_tab) && is_array($wcmvp_vendor_sorting_tab) )
				{
					foreach($wcmvp_vendor_sorting_tab as  $tabs)
					{
						if( isset($tabs) )
						{
							//====$tabs contains html==//
							echo $tabs;						
						}
					}
				}
			}
			?>

		</div>

		<select name="action" id="wcmvp_vendor_bulk_action" class='wcmvp-select-text'>
			<option value="wcmvp_not_selected"><?php esc_html_e('Bulk Actions', 'wc-multi-vendor-platform-lite'); ?></option>
			<option value="wcmvp_approve_vendor"><?php esc_html_e('Approve Vendors', 'wc-multi-vendor-platform-lite'); ?></option>
			<option value="wcmvp_disable_selling"><?php esc_html_e('Disable Vendors', 'wc-multi-vendor-platform-lite'); ?></option>
		</select>
		<button class="mdc-button mdc-button--outlined mdc-ripple-upgraded wcmvp_vendor_apply_bulk wcmvp_add_new_prod" id="wcmvp_vendor_apply_bulk">
			<span class="mdc-button__label wcmvp_label_text"><?php esc_html_e('Apply', 'wc-multi-vendor-platform-lite'); ?></span>
			<div class="mdc-button__ripple"></div>
        </button>
		
		
	</div>

	<table id="wcmvp_vendors_table" class="wcmvp_vendors_table mdl-data-table">

		<thead>
			<tr>
				<th class="mdc-data-table__cell mdc-data-table__cell--checkbox">
					<div class="mdc-checkbox  mdc-data-table__row-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
						<input type="checkbox" class="mdc-checkbox__native-control wcmvp_outer_checkbox">
						<div class="mdc-checkbox__background">
						<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
							<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
						</svg>
						<div class="mdc-checkbox__mixedmark"></div>
						</div>
						<div class="mdc-checkbox__ripple"></div>
					</div>
				</th>
				<th><?php esc_html_e('Store', 'wc-multi-vendor-platform-lite'); ?></th>
				<th><?php esc_html_e('Email', 'wc-multi-vendor-platform-lite'); ?></th>
				<th><?php esc_html_e('Phone', 'wc-multi-vendor-platform-lite'); ?></th>
				<th><?php esc_html_e('Registered', 'wc-multi-vendor-platform-lite'); ?></th>
				<th><?php esc_html_e('Status', 'wc-multi-vendor-platform-lite'); ?></th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th class="mdc-data-table__cell mdc-data-table__cell--checkbox">
					<div class="mdc-checkbox  mdc-data-table__row-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
						<input type="checkbox" class="mdc-checkbox__native-control wcmvp_outer_checkbox">
						<div class="mdc-checkbox__background">
						<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
							<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
						</svg>
						<div class="mdc-checkbox__mixedmark"></div>
						</div>
						<div class="mdc-checkbox__ripple"></div>
					</div>
				</th>
				<th><?php esc_html_e('Store', 'wc-multi-vendor-platform-lite'); ?></th>
				<th><?php esc_html_e('Email', 'wc-multi-vendor-platform-lite'); ?></th>
				<th><?php esc_html_e('Phone', 'wc-multi-vendor-platform-lite'); ?></th>
				<th><?php esc_html_e('Registered', 'wc-multi-vendor-platform-lite'); ?></th>
				<th><?php esc_html_e('Status', 'wc-multi-vendor-platform-lite'); ?></th>
			</tr>
		</tfoot>
	</table>

	<div class="wcmvp-modal" id="wcmvp-add-new-vend-modal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="wcmvp-modal-dialog wcmvp-add-new-modal-dialog" role="document">
			<div class="wcmvp-modal-content">
				<div class="wcmvp-modal-header">
					<h5 class="wcmvp-modal-title"><?php esc_html_e('Add New Vendor', 'wc-multi-vendor-platform-lite'); ?></h5>
					<button  class="mdc-button wcmvp-modal-close">
					<i class="material-icons" aria-hidden="true"><?php echo esc_html('highlight_off'); ?></i>
					</button>
				</div>
				<div class="wcmvp-modal-body">
					<div id="wcmvp-btn-section">
						<button type='button' id="wcmvp-add-new-vend-store-details" class="mdc-button mdc-button--raised  mdc-ripple-upgraded wcmvp-add-new-vend-nav-items active">
							<span class="mdc-button__label"><?php esc_html_e('Store Details', 'wc-multi-vendor-platform-lite'); ?></span>
							<div class="mdc-button__ripple"></div>
						</button>
						<button type='button' id="wcmvp-add-new-vend-store-address" class="mdc-button mdc-button--raised  mdc-ripple-upgraded wcmvp-add-new-vend-nav-items">
							<span class="mdc-button__label"><?php esc_html_e('Store Address', 'wc-multi-vendor-platform-lite'); ?></span>
							<div class="mdc-button__ripple"></div>
						</button>
						<button type='button' id="wcmvp-add-new-vend-store-pymnt" class="mdc-button mdc-button--raised  mdc-ripple-upgraded wcmvp-add-new-vend-nav-items">
							<span class="mdc-button__label"><?php esc_html_e('Payments & Commission', 'wc-multi-vendor-platform-lite'); ?></span>
							<div class="mdc-button__ripple"></div>
						</button>
					</div>

					<div class="py-4 px-3" id="wcmvp-vend-add-new-img">
						<div class="wcmvp-row">
							<div class="wcmvp-col-8">
								<div class="wcmvp-out-border">
									<div class="wcmvp-vendor-inner-div">
										<div class="wcmvp-img-vrndor-store">
										<img class='wcmvp_vendor_img_pre' src='<?php echo esc_url(wp_get_attachment_url()); ?>'>
										</div>
										<a  href="#" class="mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_vendor_store_img wcmvp_store_img_chng"  role="button" aria-pressed="true">
											<div class="mdc-button__ripple"></div>
											<span class="mdc-button__label">  <?php esc_html_e('Upload Banner', 'wc-multi-vendor-platform-lite'); ?></span>
        								</a>
										<input type="hidden" class="wcmvp_vendor_img_id" value="">
										<p> <?php esc_html_e('Upload banner for your store. Banner size is (625x300)pixels.', 'wc-multi-vendor-platform-lite'); ?></p>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="py-4 px-3 wcmvp_vendoradd_store_detail_section">
						<div class="mdc-elevation--z3 wcmvp-vendor-store-section-page">
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp-add-new-vend-fname">
									<input type="text" class="mdc-text-field__input" id='wcmvp-add-new-vend-fname'>
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('First name', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp-add-new-vend-lname">
									<input type="text" class="mdc-text-field__input" id='wcmvp-add-new-vend-lname'>
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
											<span class="mdc-floating-label"><?php esc_html_e('Last name', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for='wcmvp-add-vend-store-name'>
									<input type="text" class="mdc-text-field__input" id='wcmvp-add-vend-store-name'>
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Store name', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp-add-new-vend-store-url">
									<input type="text" class="mdc-text-field__input" id="wcmvp-add-new-vend-store-url">
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Store URL', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp-add-new-vend-phone">
									<input type="text" class="mdc-text-field__input" id="wcmvp-add-new-vend-phone">
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Phone Number', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp-add-new-vend-email">
									<input type="text" class="mdc-text-field__input" id='wcmvp-add-new-vend-email'>
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Email', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_add_new_vend_uname">
									<input type="text" class="mdc-text-field__input" id='wcmvp_add_new_vend_uname'>
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Username', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<div class= "wcmvp_addnew_vend_label">
									<div class="wcmvp_add_new_vend_passwrd_show position-relative">
										<input type="text" class="p-2 effect-21 rounded shadow-none border" id="wcmvp_add_new_vend_passwrd">
										<label for="wcmvp_add_new_vend_passwrd"><?php esc_html_e('Password', 'wc-multi-vendor-platform-lite'); ?></label>
										<span class="focus-border">
										</span>
									</div>
									<div class="password-generator">
										<button class="mdc-button mdc-button--outlined inline-demo-button mdc-ripple-upgraded wcmvp_pass_generator">
											<span class="mdc-button__label"><?php esc_html_e('view password', 'wc-multi-vendor-platform-lite'); ?></span>
											<div class="mdc-button__ripple"></div>
										</button>
										<button class="mdc-button mdc-button--outlined inline-demo-button mdc-ripple-upgraded  wcmvp_pass_generator_cancel" id="wcmvp_pass_generator_cancel_click">
											<span class="mdc-button__label"><?php esc_html_e('Cancel', 'wc-multi-vendor-platform-lite'); ?></span>
											<div class="mdc-button__ripple"></div>
										</button>
									</div>
								</div>
							</div>
							<div class="col-md-12 my-3">
								<div class= "wcmvp_addnew_vend_label">
									<div class="position-relative">
										<span><?php esc_html_e('Send the vendor an email about their account.', 'wc-multi-vendor-platform-lite'); ?></span>
										<label class="wcmvp_switch">
											<input type="checkbox" class="" data-id="">
											<span class="wcmvp_slider wcmvp_round"></span>
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- address section -->

					<div class="py-4 px-3 wcmvp_vendoradd_store_addres_section">
						<div class="mdc-elevation--z3 wcmvp-vendor-store-section-page">
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_addnew_store_address1">
									<input type="text" class="mdc-text-field__input" id='wcmvp_vendor_addnew_store_address1'>
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Address line 1', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_addnew_store_address2">
									<input type="text" class="mdc-text-field__input" id='wcmvp_vendor_addnew_store_address2'>
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Address line 2', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for='wcmvp_vendor_addnew_town_city'>
									<input type="text" class="mdc-text-field__input" id='wcmvp_vendor_addnew_town_city'>
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Town/City', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>						
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_addnew_zip_code">
									<input type="text" class="mdc-text-field__input" id="wcmvp_vendor_addnew_zip_code">
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Zip Code', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<div class= "wcmvp_addnew_vend_label">
									<div class="position-relative">
										<label for="wcmvp_addnew_vend_country" class='wcmvp_addnew_vend_country_css'><?php esc_html_e('Country', 'wc-multi-vendor-platform-lite'); ?></label>
										<?php 
											$wcmvp_addnew_vend_country = new WC_Countries;
											$wcmvp_addnew_vend_all_country = $wcmvp_addnew_vend_country->get_allowed_countries();
											woocommerce_form_field( 'wcmvp_addnew_vend_country_field', array(
												'type' 		=> 'select',
												'id' 		=> 'wcmvp_addnew_vend_country',
												'class' 	=> array('wcmvp_addnew_vend_country_select mdc-select'),
												'options' 	=> array("" => esc_html__('Select A Country','wc-multi-vendor-platform-lite')) + $wcmvp_addnew_vend_all_country,
												'clear' 	=> true
											) );
										?>
										<span class="focus-border">
										</span>
									</div>
								</div>
							</div>
							<div class="wcmvp-vendor-input" id="wcmvp_addnew_vend_state_show">
								<div class= "wcmvp_addnew_vend_label">
									<div class="position-relative">
										<label for="wcmvp_addnew_vend_state"><?php esc_html_e('State / County', 'wc-multi-vendor-platform-lite'); ?></label>
										<span class="focus-border">
											<div id="wcmvp_addnew_vendors_state">
												<select>
													<option></option>
												</select>
											</div>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Payment section -->

					<div class="py-4 px-3 wcmvp_vendoradd_store_paymnt_section">					
						<div class="mdc-elevation--z3 wcmvp-vendor-store-section-page">
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp-addnew-vend-acc-no">
									<input type="text" class="mdc-text-field__input" id='wcmvp-addnew-vend-acc-no'>
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Account Number', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_addnew_bank_name">
									<input type="text" class="mdc-text-field__input" id='wcmvp_vendor_addnew_bank_name'>
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Bank name', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100">
									<input type="text" class="mdc-text-field__input" id="wcmvp_vendor_addnew_bank_address">
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Bank Address', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_addnew_routing_number">
									<input type="text" class="mdc-text-field__input" id="wcmvp_vendor_addnew_routing_number">
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Routing Number', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_addnew_bank_iban">
									<input type="text" class="mdc-text-field__input" id="wcmvp_vendor_addnew_bank_iban">
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Bank IBAN', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_addnew_bank_swift">
									<input type="text" class="mdc-text-field__input" id="wcmvp_vendor_addnew_bank_swift">
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Bank Swift', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>	
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_addnew_vend_paypal_email">
									<input type="text" class="mdc-text-field__input" id="wcmvp_addnew_vend_paypal_email">
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('PayPal Email', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-vendor-input">
								<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_addnew_vend_stripe_id">
									<input type="text" class="mdc-text-field__input" id="wcmvp_addnew_vend_stripe_id">
									<div class="mdc-notched-outline mdc-notched-outline--upgraded">
										<div class="mdc-notched-outline__leading"></div>
										<div class="mdc-notched-outline__notch">
										<span class="mdc-floating-label"><?php esc_html_e('Stripe Id', 'wc-multi-vendor-platform-lite'); ?></span>
										</div>
										<div class="mdc-notched-outline__trailing"></div>
									</div>
								</label>
							</div>
							<div class="wcmvp-enable-toggle">
								<div class="position-relative">
									<span><?php esc_html_e('Enable Selling', 'wc-multi-vendor-platform-lite'); ?></span>
									<label class="wcmvp_switch wcmvp_switch1">
										<input type="checkbox" class="wcmvp_addnew_vend_enable_selling" id="wcmvp_addnew_vendor_enable_selling">
										<span class="wcmvp_slider wcmvp_round"></span>
									</label>
								</div>
							</div>
							<div class="wcmvp-enable-toggle">
								<div class="position-relative">
									<span><?php esc_html_e('Publish Product Directly', 'wc-multi-vendor-platform-lite'); ?></span>
									<label class="wcmvp_switch wcmvp_switch2">
										<input type="checkbox" class="wcmvp_addnew_vendor_publishing_product" >
										<span class="wcmvp_slider wcmvp_round"></span>
									</label>
								</div>
							</div>
							<div class="wcmvp-enable-toggle">
								<div class="position-relative">
									<span><?php esc_html_e('Make Vendor Featured', 'wc-multi-vendor-platform-lite'); ?></span>
									<label class="wcmvp_switch wcmvp_switch3">
										<input type="checkbox" class="wcmvp_addnew_vendor_admin_featured_vendor" >
										<span class="wcmvp_slider wcmvp_round"></span>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="wcmvp-modal-footer">
					<button type="button" class="mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp_multivendor_platform_vendor_next" data-value="wcmvp_vendor_store_details" data-check = "wcmvp_addnew_vendor"><?php esc_html_e('Next', 'wc-multi-vendor-platform-lite'); ?></button>
				</div>
			</div>
		</div>
		<?php do_action('wcmvp_add_metadata_for_add_new_vendor'); ?>
	</div>	<div class='wcmvp-modal' id='wcmvp_vendor_modal' tabindex="-1">
		<div class='wcmvp-modal-dialog'>
			<div class='wcmvp-modal-content'>
				
				<div class='wcmvp-modal-header'>
					<h4 class='modal-title'><?php esc_html_e('Edit Vendor Detail', 'wc-multi-vendor-platform-lite'); ?></h4>
					<button class="mdc-button wcmvp-modal-close">
                        <i class="material-icons"><?php echo esc_html('highlight_off'); ?></i>
					</button>
				</div>

				<div class='wcmvp-modal-body'>
					<div id="wcmvp-btn-section">
						<button type='button' id="wcmvp_vendor_store_details" class="mdc-button mdc-button--raised  mdc-ripple-upgraded wcmvp-store-btn-active">
							<span class="mdc-button__label"><?php esc_html_e('Store Details', 'wc-multi-vendor-platform-lite'); ?></span>
							<div class="mdc-button__ripple"></div>
						</button>
						<button type='button' id="wcmvp_vendor_store_address" class="mdc-button mdc-button--raised  mdc-ripple-upgraded">
							<span class="mdc-button__label"><?php esc_html_e('Store Address', 'wc-multi-vendor-platform-lite'); ?></span>
							<div class="mdc-button__ripple"></div>
						</button>
						<button type='button' id="wcmvp_vendor_payment_options" class="mdc-button mdc-button--raised  mdc-ripple-upgraded">
							<span class="mdc-button__label"><?php esc_html_e('Payments & Commission', 'wc-multi-vendor-platform-lite'); ?></span>
							<div class="mdc-button__ripple"></div>
						</button>
					</div>
					<div class="wcmvp-section-content">
						<div class="">
							<div class="wcmvp-subsetting-content wcmvp_vendor_sections" id="wcmvp_vendor_store_details_section">
								<p><?php esc_html_e('Store Details', 'wc-multi-vendor-platform-lite') ?></p>
								<div class="wcmvp_vendor_store">
									<label for="wcmvp_vendor_store_banner" class="wcmvp_store_banner"> <?php esc_html_e('Banner', 'wc-multi-vendor-platform-lite'); ?> </label>
									<div class='wcmvp-image-preview-wrapper'>
										<img class='wcmvp_vendor_img_pre' src='<?php echo esc_url(wp_get_attachment_url()); ?>'>
									</div>
									<input type="button" class="button wcmvp_vendor_store_img mdc-button mdc-button--raised  mdc-ripple-upgraded" value="<?php esc_html_e('Upload image'); ?>" />
									<input type='hidden' class='wcmvp_vendor_img_id'>
								</div>
								<div class="mdc-elevation--z3 wcmvp-vendor-store-section-page">
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100">
											<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_store_name1">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Store Name', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100">
											<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_store_url">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Store URL', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100">
											<input type="text" class="mdc-text-field__input wcmvp_vendor_store_phone wcmvp_edit_vendor_details_data">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Phone Number', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100" for='wcmvp_vendor_facebook'>
											<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_facebook">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Facebook', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100">
											<input type="text" class="mdc-text-field__input wcmvp_vendor_google_plus wcmvp_edit_vendor_details_data">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Google Plus', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100">
											<input type="text" class="mdc-text-field__input wcmvp_vendor_twitter wcmvp_edit_vendor_details_data">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Twitter', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100">
											<input type="text" class="mdc-text-field__input wcmvp_vendor_pinterest wcmvp_edit_vendor_details_data">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Pinterest', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100">
											<input type="text" class="mdc-text-field__input wcmvp_vendor_linkedin wcmvp_edit_vendor_details_data">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('LinkedIn', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100">
											<input type="text" class="mdc-text-field__input wcmvp_vendor_youtube wcmvp_edit_vendor_details_data">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Youtube', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100">
											<input type="text" class="mdc-text-field__input wcmvp_vendor_instagram wcmvp_edit_vendor_details_data">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Instagram', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100">
											<input type="text" class="mdc-text-field__input wcmvp_vendor_flickr wcmvp_edit_vendor_details_data">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Flickr', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
								</div>
							</div>

							<div class="wcmvp-subsetting-content wcmvp_vendor_sections" id="wcmvp_vendor_store_address_section">
								<p><?php esc_html_e('Store Address', 'wc-multi-vendor-platform-lite') ?></p>
								<div class="wcmvp-stor-input">
									<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_store_address1">
										<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_store_address1">
										<div class="mdc-notched-outline mdc-notched-outline--upgraded">
											<div class="mdc-notched-outline__leading"></div>
											<div class="mdc-notched-outline__notch">
											<span class="mdc-floating-label"><?php esc_html_e('Address 1', 'wc-multi-vendor-platform-lite'); ?></span>
											</div>
											<div class="mdc-notched-outline__trailing"></div>
										</div>
									</label>
								</div>
								<div class="wcmvp-stor-input">
									<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_store_address2">
										<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_store_address2">
										<div class="mdc-notched-outline mdc-notched-outline--upgraded">
											<div class="mdc-notched-outline__leading"></div>
											<div class="mdc-notched-outline__notch">
											<span class="mdc-floating-label"><?php esc_html_e('Address 2', 'wc-multi-vendor-platform-lite'); ?></span>
											</div>
											<div class="mdc-notched-outline__trailing"></div>
										</div>
									</label>
								</div>
								<div class="wcmvp-stor-input">
									<label class="mdc-text-field mdc-text-field--outlined w-100  " for="wcmvp_vendor_town_city">
										<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_town_city">
										<div class="mdc-notched-outline mdc-notched-outline--upgraded">
											<div class="mdc-notched-outline__leading"></div>
											<div class="mdc-notched-outline__notch">
											<span class="mdc-floating-label"><?php esc_html_e('Town/City', 'wc-multi-vendor-platform-lite'); ?></span>
											</div>
											<div class="mdc-notched-outline__trailing"></div>
										</div>
									</label>
								</div>
								<div class="wcmvp-stor-input">
									<label class="mdc-text-field mdc-text-field--outlined w-100  " for="wcmvp_vendor_zip_code">
										<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_zip_code">
										<div class="mdc-notched-outline mdc-notched-outline--upgraded">
											<div class="mdc-notched-outline__leading"></div>
											<div class="mdc-notched-outline__notch">
											<span class="mdc-floating-label"><?php esc_html_e('Zip Code', 'wc-multi-vendor-platform-lite'); ?></span>
											</div>
											<div class="mdc-notched-outline__trailing"></div>
										</div>
									</label>
								</div>
								<div class="wcmvp-stor-input">
									<span>
										<?php
										$wcmvp_countries_value  = new WC_Countries();
										$wcmvp_countries      = $wcmvp_countries_value->get_allowed_countries();
										woocommerce_form_field('wcmvp_vendor_country', array(
											'type'      => 'select',
											'id'        => 'wcmvp_vendor_store_country',
											'class'     => array('wcmvp_vendor_store_country'),
											'options'   => array('' => esc_html__('Select a country', 'wc-multi-vendor-platform-lite')) + $wcmvp_countries,
											'clear'     => true
										));
										?>
									</span>
								</div>
								<div class="wcmvp-stor-input wcmvp_state_show">
									<label for="wcmvp_vendor_state_county"></label>
									<span>
										<div id="wcmvp_vendor_select_count_ajax">
											<select>
												<option></option>
											</select>
										</div>
									</span>
								</div>
							</div>

							<div class="wcmvp-subsetting-content wcmvp_vendor_sections" id="wcmvp_vendor_payment_option_section">
								<p><?php esc_html_e('Payments & Commission', 'wc-multi-vendor-platform-lite') ?></p>
								<div class="wcmvp-vendor-store-section-page">
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_bank_name">
											<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_bank_name">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Bank Name', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_bank_account_no">
											<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_bank_account_no">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Account Number', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_bank_address">
											<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_bank_address">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Bank Address', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_routing_number">
											<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_routing_number">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Routing Number', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_bank_iban">
											<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_bank_iban">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Bank IBAN', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_bank_swift">
											<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_bank_swift">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Bank Swift', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_paypal_email">
											<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_paypal_email">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('PayPal Email', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
									<div class="wcmvp-stor-input">
										<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_stripe_id">
											<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_stripe_id">
											<div class="mdc-notched-outline mdc-notched-outline--upgraded">
												<div class="mdc-notched-outline__leading"></div>
												<div class="mdc-notched-outline__notch">
												<span class="mdc-floating-label"><?php esc_html_e('Stripe Id', 'wc-multi-vendor-platform-lite'); ?></span>
												</div>
												<div class="mdc-notched-outline__trailing"></div>
											</div>
										</label>
									</div>
								</div>
								<ul class="wcmvp-store-details-all">
								<li>
									<label for="wcmvp_vendor_enable_selling"><?php esc_html_e('Selling', 'wc-multi-vendor-platform-lite'); ?></label>
									<span>
										<div class='mdc-checkbox mdc-data-table__row-checkbox'>
											<input type='checkbox' class='mdc-checkbox__native-control'  id='wcmvp_vendor_enable_selling'> 
											<div class='mdc-checkbox__background'>
												<svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
													<path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
												</svg>
												<div class='mdc-checkbox__mixedmark'></div>
											</div>
											<div class='mdc-checkbox__ripple'></div>
										</div>
										<span class="wcmvp_margin_back"><?php esc_html_e('Enable Adding Products', 'wc-multi-vendor-platform-lite') ?></span>
										<p class="wcmvper-notice"><?php esc_html_e('Enable or disable product adding capability', 'wc-multi-vendor-platform-lite') ?></p>
									</span>
									</li>
									<li>
										<label for="wcmvp_vendor_publishing_product"> <?php esc_html_e('Publishing', 'wc-multi-vendor-platform-lite'); ?> </label>
										<span>
											<div class='mdc-checkbox mdc-data-table__row-checkbox'>
												<input type='checkbox' class='mdc-checkbox__native-control wcmvp_vendor_publishing_product'> 
												<div class='mdc-checkbox__background'>
													<svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
														<path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
													</svg>
													<div class='mdc-checkbox__mixedmark'></div>
												</div>
												<div class='mdc-checkbox__ripple'></div>
											</div>
											<span class="wcmvp_margin_back"><?php esc_html_e('Publish product directly', 'wc-multi-vendor-platform-lite') ?></span>
											<p class="wcmvper-notice"><?php esc_html_e('Bypass pending, publish products directly', 'wc-multi-vendor-platform-lite') ?></p>
										</span>
									</li>
									<li>
										<label for="wcmvp_vendor_admin_commission_type"> <?php esc_html_e('Admin Commission Type', 'wc-multi-vendor-platform-lite'); ?> </label>
										<span>
											<div class="wcmvp_select_box">
												<select class="wcmvp_admin_vendor_commssion wcmvp-select-text">
													<option value="flat"> <?php esc_html_e('Flat', 'wc-multi-vendor-platform-lite') ?> </option>
													<option value="percentage"> <?php esc_html_e('Percentage', 'wc-multi-vendor-platform-lite') ?> </option>
													<p class="wcmvper-notice"><?php esc_html_e('Set the commmission type admin gets from this seller', 'wc-multi-vendor-platform-lite'); ?></p>
												</select>
											</div>
										</span>
									</li>
									<li>
										<label for="wcmvp_vendor_admin_commision_value"> <?php esc_html_e('Admin Commission', 'wc-multi-vendor-platform-lite'); ?> </label>
										<span>
											<label class="mdc-text-field mdc-text-field--outlined w-100" for="wcmvp_vendor_admin_commision_value">
												<input type="text" class="mdc-text-field__input wcmvp_edit_vendor_details_data wcmvp_vendor_admin_commision_value">
												<div class="mdc-notched-outline mdc-notched-outline--upgraded">
													<div class="mdc-notched-outline__leading"></div>
													<div class="mdc-notched-outline__notch">
													<span class="mdc-floating-label"><?php esc_html_e('Admin Commission', 'wc-multi-vendor-platform-lite'); ?></span>
													</div>
													<div class="mdc-notched-outline__trailing"></div>
												</div>
											</label>
											<p class="wcmvper-notice"><?php esc_html_e('It will override the default commission admin gets from each sales', 'wc-multi-vendor-platform-lite'); ?></p>
										</span>
									</li>
									<li>
										<label for="wcmvp_vendor_admin_featured_vendor"> <?php esc_html_e('Featured vendor', 'wc-multi-vendor-platform-lite'); ?> </label>
										<span class="wcmvp_multivendor_platform_vendor_last_span">
											<div class='mdc-checkbox mdc-data-table__row-checkbox'>
												<input type='checkbox' class='mdc-checkbox__native-control wcmvp_vendor_admin_featured_vendor'> 
												<div class='mdc-checkbox__background'>
													<svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
														<path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
													</svg>
													<div class='mdc-checkbox__mixedmark'></div>
												</div>
												<div class='mdc-checkbox__ripple'></div>
											</div>
											<span class="wcmvp_margin_back"><?php esc_html_e('Mark as featured vendor', 'wc-multi-vendor-platform-lite') ?></span>
											<p class="wcmvper-notice"><?php esc_html_e('This vendor will be marked as a featured vendor.', 'wc-multi-vendor-platform-lite') ?></p>
										</span>
									</li>
								</ul>
							</div>

						</div>
					</div>
				</div>

				<!-- Modal footer -->
				<div class='wcmvp-modal-footer'>
					<button type='button' class='mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp_multivendor_platform_vendor_next' data-id='' data-value="wcmvp_vendor_store_details" data-check = "wcmvp_edit_vendor"> <?php esc_html_e('Next', 'wc-multi-vendor-platform-lite'); ?> </button>
				</div>

			</div>
		</div>
	</div>
	
	<?php do_action('wcmvp_add_metadata_for_edit_vendor'); ?>

</div>