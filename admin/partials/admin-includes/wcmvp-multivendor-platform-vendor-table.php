<?php

//========================This File is used to Display vendors list===============//

	if( isset($_POST['wcmvp_sort_by_vend_status']) && !empty($_POST['wcmvp_sort_by_vend_status']) )
	{
		update_option('wcmvp_sort_by_vend_status',sanitize_text_field($_POST['wcmvp_sort_by_vend_status']));
	}
	
	global $wpdb;

	$table = $wpdb->prefix.'users';
	
	$primaryKey = 'ID';

	$columns = array(
		array( 'db' => 'ID', 'dt' => 0 , 'field' => 'ID' ),
		array( 'db' => 'wcmvp_store_name', 'dt' => 1 , 'field' => 'wcmvp_store_name' ),
		array( 'db' => 'user_email',  'dt' => 2 , 'field' => 'user_email' ),
		array( 'db' => 'wcmvp_phone',  'dt' => 3 , 'field' => 'wcmvp_phone' ),
		array( 'db' => 'user_registered',  'dt' => 4 , 'field' => 'user_registered' ),
		array( 'db' => 'wcmvp_vendor_status',  'dt' => 5 , 'field' => 'wcmvp_vendor_status' ),
		array( 'db' => 'ID',  'dt' => 6 , 'field' => 'ID' ),
	); 

	$sql_details = array(
		'user' => DB_USER,
		'pass' => DB_PASSWORD,
		'db'   => DB_NAME,
		'host' => DB_HOST
	);

	$where = "`wcmvp_role`='wcmvp_vendor'";

	if( isset($_POST['wcmvp_sort_by_vend_status']) )
	{
		$wcmvp_vend_sort = sanitize_text_field($_POST['wcmvp_sort_by_vend_status']);
		if( isset($wcmvp_vend_sort) )
		{
			if( $wcmvp_vend_sort == "disable" )
			{
				$where = "`wcmvp_role`='wcmvp_vendor'";

				$equals = "`wcmvp_vendor_status`='0'";

				$where = $equals. ' AND ' .$where;
			}
			if( $wcmvp_vend_sort == 'approve' )
			{
				$where = "`wcmvp_role`='wcmvp_vendor'";

				$equals = "`wcmvp_vendor_status`='1'";

				$where = $equals. ' AND ' .$where;
			}
		}
	}

	$join = "FROM ".$wpdb->prefix."users"." LEFT JOIN (SELECT user_id,
	MAX(CASE WHEN meta_key = 'wcmvp_store_name' THEN meta_value END) wcmvp_store_name,
	MAX(CASE WHEN meta_key = 'wcmvp_phone' THEN meta_value END) wcmvp_phone,
	MAX(CASE WHEN meta_key = 'wcmvp_vendor_status' THEN meta_value END) wcmvp_vendor_status,
	MAX(CASE WHEN meta_key = 'wcmvp_role' THEN meta_value END) wcmvp_role
	FROM ".$wpdb->prefix."usermeta"." GROUP BY user_id) wcmvp_selected_table ON ".$wpdb->prefix."users".".`ID`=wcmvp_selected_table.`user_id`";
	
	include_once( WCMVP_ADMIN_PARTIAL.'/ssp/ssp.customized.class.php' );

	$wcmvp_vendors_data_ssp =  SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $join, $where );

	$i=0;

	if( isset($wcmvp_vendors_data_ssp) )
	{
		if( is_array($wcmvp_vendors_data_ssp['data']) && !empty($wcmvp_vendors_data_ssp['data']) && isset($wcmvp_vendors_data_ssp['data'][$i]) )
		{	
			foreach( $wcmvp_vendors_data_ssp['data'] as $wcmvp_vendors_data )
			{	
				if( isset($wcmvp_vendors_data[4]) )
				{
					$wcmvp_vendor_reg_date = $wcmvp_vendors_data[4];

					if( isset($wcmvp_vendor_reg_date) )
					{
						$wcmvp_vendor_reg_date = date( "j/ m/ Y", strtotime( $wcmvp_vendor_reg_date ) );

						if( isset($wcmvp_vendors_data_ssp['data'][$i][4]) )
						{
							$wcmvp_vendors_data_ssp['data'][$i][4] = $wcmvp_vendor_reg_date;

							if( isset($wcmvp_vendors_data[5]) )
							{
								$wcmvp_vendor_status = $wcmvp_vendors_data[5];

								if( isset($wcmvp_vendors_data_ssp['data'][$i][5]) && isset($wcmvp_vendors_data[6]) )
								{	
									if( $wcmvp_vendors_data_ssp['data'][$i][5] == 1 )
									{
										$wcmvp_vendors_data_ssp['data'][$i][5] = "<label class='wcmvp_switch'>
										<input type='checkbox' class='wcmvp_vendors_status wcmvp_vendors_status".esc_attr($wcmvp_vendors_data[6])."' ".'checked'." data-id='".esc_attr($wcmvp_vendors_data[6])."'>
										<span class='wcmvp_slider wcmvp_round'></span>
										</label>";
									}
									else
									{
										$wcmvp_vendors_data_ssp['data'][$i][5] = "<label class='wcmvp_switch'>
										<input type='checkbox' class='wcmvp_vendors_status wcmvp_vendors_status".esc_attr($wcmvp_vendors_data[6])."' data-id='".esc_attr($wcmvp_vendors_data[6])."'>
										<span class='wcmvp_slider wcmvp_round'></span>
										</label>";
									}
								}
							}
						}
					}
				}

				if( isset($wcmvp_vendors_data[0]) && isset($wcmvp_vendors_data[1]) && isset($wcmvp_vendors_data[6]))
				{
					$wcmvp_vendor_store = $wcmvp_vendors_data[1];

					if( isset( $wcmvp_vendor_store ) )
					{
						$wcmvp_vendors_img = get_user_meta( $wcmvp_vendors_data[0] );

						if( isset( $wcmvp_vendors_img ) && isset($wcmvp_vendors_img['wcmvp_vendor_store_img'][0]) )
						{
							if( empty( $wcmvp_vendors_img['wcmvp_vendor_store_img'][0] ) )
							{
								$wcmvp_vendors_img_url = get_avatar_url($wcmvp_vendors_data[0]);
							}
							else
							{
								$wcmvp_vendors_img_url = wp_get_attachment_url($wcmvp_vendors_img['wcmvp_vendor_store_img'][0]);
							}
							if( isset( $wcmvp_vendors_data_ssp['data'][$i][1] ) && isset($wcmvp_vendors_img_url) )
							{
								$wcmvp_vendors_data_ssp['data'][$i][1] = "<div class = wcmvp_vendor_store>
									<span class = wcmvp_vendor_store_upper>
										<img src = ".esc_attr($wcmvp_vendors_img_url)." class = 'wcmvp_vendore_store_img' data-img = '". esc_attr($wcmvp_vendors_img['wcmvp_vendor_store_img'][0]) ."' id = 'wcmvp_vendor_img".esc_attr($wcmvp_vendors_data[0])."' >
										<div class = 'wcmvp_vendor_tabs'>
										<a href = # data-target = #wcmvp_vendor_display_modal id='wcmvp_vendor_profile_display' data-toggle = modal class = 'wcmvp_vendor_store_name' data-id = " .esc_attr($wcmvp_vendors_data[6]). "> ".esc_attr($wcmvp_vendor_store)." </a>
									</span>
										<div class = wcmvp_vendor_option>
											<a href = # data-target = #wcmvp_vendor_modal data-toggle = modal class = 'wcmvp_vendor_edit_modal wcmvp_vendor_options' data-id = " .esc_attr($wcmvp_vendors_data[6]). "> Edit </a>
											<a href = #/product class = 'wcmvp_vendor_options wcmvp_vendor_products' data-id = " .esc_attr($wcmvp_vendors_data[6]). "> Products </a>
											<a href = #orders class = 'wcmvp_vendor_options wcmvp_vendors_orders'>Order</a>
										</div>
									</div>
								</div>";
							}
						}
					}	
				}
				if( isset($wcmvp_vendors_data[2]) && isset($wcmvp_vendors_data[6]))
				{
					$wcmvp_vendors_mail = $wcmvp_vendors_data[2];
					
					if( isset( $wcmvp_vendors_mail ) && !empty($wcmvp_vendors_mail) )
					{
						if( isset( $wcmvp_vendors_data_ssp['data'][$i][2] ) )
						{
							$wcmvp_vendors_data_ssp['data'][$i][2] = '<a class = "wcmvp_vendor_mail" href = mailto:'.esc_url($wcmvp_vendors_mail).'>'.esc_attr($wcmvp_vendors_mail).'</a>';
						}
					}
				}
				if( isset($wcmvp_vendors_data[0]) && isset($wcmvp_vendors_data[6]) && isset($wcmvp_vendors_data_ssp['data'][$i][0]) )
				{
					$wcmvp_vendors_data_ssp['data'][$i][0] = '<td class="mdc-data-table__cell mdc-data-table__cell--checkbox">
						<div class="mdc-checkbox mdc-data-table__row-checkbox">
							<input type="checkbox" class="mdc-checkbox__native-control wcmvp_vendor_inner_checkbox" name="wcmvp_inner_check" data-id='.esc_attr($wcmvp_vendors_data[6]).'>
							<div class="mdc-checkbox__background">
								<svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
									<path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
								</svg>
								<div class="mdc-checkbox__mixedmark"></div>
							</div>
							<div class="mdc-checkbox__ripple"></div>
						</div>
					</td>';
				}

				$i++;
			}	
		}

		do_action('wcmvp_multivendor_platform_onload_vendor_table');

		echo json_encode( $wcmvp_vendors_data_ssp );
	}

	wp_die();