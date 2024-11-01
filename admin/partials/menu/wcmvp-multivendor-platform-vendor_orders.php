<?php 

//================File is used to show product orders to the admin====================//

    if( !empty(get_option( 'wcmvp_order_vendor_id' )) )
    {
        ?>
            <input type="hidden" id="wcmvp_order_vendor_id" value="<?php echo esc_attr(get_option( 'wcmvp_order_vendor_id' )); ?>">
        <?php  
    }
    if( !empty(get_option( 'wcmvp_sort_order_by' )) )
    {
        ?>
            <input type="hidden" id="wcmvp_sort_order_by" value="<?php echo esc_attr(get_option( 'wcmvp_sort_order_by' )); ?>">
        <?php  
    }
    if( !empty(get_option( 'wcmvp_order_or_order_all' )) )
    {
        ?>
            <input type="hidden" id="wcmvp_order_or_order_all" value="<?php echo esc_attr(get_option( 'wcmvp_order_or_order_all' )); ?>">
        <?php  
    }
?>
    <h3>Order
        <a href="#/orders" data-id = "<?php echo esc_attr($vendor); ?>" id="wcmvp_add_new_order" class="mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_add_new_order wcmvp_add_new_prod">
            <i class="wcmvp-fa-fa-space fa fa-shopping-cart"></i>
            <?php esc_html_e('Add Order','wc-multi-vendor-platform-lite') ?>
        </a>
    </h3>
    <div class = "wcmvp_bulk_action">
       
        <div class = "wcmvp_prod_sorting" id = "wcmvp-order-sorting-tabs">
            
            <?php
                $wcmvp_order_sorting_tab = array(
                    '<a href = "#" id = "wcmvp_sort_order_all" class = "mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_order_status" data-value = "all" >'.esc_html__("All","wc-multi-vendor-platform-lite").'</a>',
                    
                    '<a href = "#" id = "wcmvp_sort_order_pending" class = "mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_order_status" data-value = "pending" >'.esc_html__("Pending Payment","wc-multi-vendor-platform-lite").'</a>',
                    
                    '<a href = "#" id = "wcmvp_sort_order_draft" class = "mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_order_status" data-value = "draft" >'.esc_html__("Draft","wc-multi-vendor-platform-lite").'</a>',
                    
                    '<a href = "#" id = "wcmvp_sort_order_processing" class = "mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_order_status" data-value = "processing" >'.esc_html__("Processing","wc-multi-vendor-platform-lite").'</a>',
                    
                    '<a href = "#" id = "wcmvp_sort_order_on-hold" class = "mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_order_status" data-value = "on-hold" >'.esc_html__("On hold","wc-multi-vendor-platform-lite").'</a>',
                    
                    '<a href = "#" id = "wcmvp_sort_order_completed" class = "mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_order_status" data-value = "completed" >'.esc_html__("Completed","wc-multi-vendor-platform-lite").'</a>',
                    
                    '<a href = "#" id = "wcmvp_sort_order_refunded" class = "mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_order_status" data-value = "refunded" >'.esc_html__("Refunded","wc-multi-vendor-platform-lite").'</a>',
                    
                    '<a href = "#" id = "wcmvp_sort_order_cancelled" class = "mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_order_status" data-value = "cancelled" >'.esc_html__("Cancelled","wc-multi-vendor-platform-lite").'</a>',
                    
                    '<a href = "#" id = "wcmvp_sort_order_failed" class = "mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_order_status" data-value = "failed" >'.esc_html__("Failed","wc-multi-vendor-platform-lite").'</a>',
                    
                    '<a href = "#" id = "wcmvp_sort_order_trash" class = "mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_order_status" data-value = "trash" >'.esc_html__("Trash","wc-multi-vendor-platform-lite").'</a>',
                );
                if( isset($wcmvp_order_sorting_tab) && is_array($wcmvp_order_sorting_tab) )
                {
                    $wcmvp_order_sorting_tab = apply_filters('wcmvp_order_sorting_tab',$wcmvp_order_sorting_tab);

                    if( isset($wcmvp_order_sorting_tab) && is_array($wcmvp_order_sorting_tab) )
                    {
                        foreach($wcmvp_order_sorting_tab as  $tabs)
                        {
                            if( isset($tabs) )
                            {
                                //======$tabs conntains html========
                                
                                echo $tabs;
                            }
                        }
                    }
                }
            ?>
            
        </div>
        <select name="action" id="wcmvp_order_bulk_action" class='wcmvp-select-text'>
            <option value = "wcmvp_not_selected"><?php esc_html_e( 'Bulk Actions','wc-multi-vendor-platform-lite' ); ?></option>
            <option class = "wcmvp_order_bul_trash" value = "wcmvp_bulk_trash_order"><?php esc_html_e( 'Move To Trash','wc-multi-vendor-platform-lite' ); ?></option>
            <option class = "wcmvp_order_bul_restore" value = "wcmvp_bulk_restore_order"><?php esc_html_e( 'Restore','wc-multi-vendor-platform-lite' ); ?></option>
            <option class = "wcmvp_order_bul_delete" value = "wcmvp_bulk_delete_order"><?php esc_html_e( 'Delete Permanently','wc-multi-vendor-platform-lite' ); ?></option>
            <option class = "wcmvp_order_bul_chng_processing" value = "processing"><?php esc_html_e( 'Change Status to Processing','wc-multi-vendor-platform-lite' ); ?></option>
            <option class = "wcmvp_order_bul_chng_onhold" value = "on-hold"><?php esc_html_e( 'Change Status to On-hold','wc-multi-vendor-platform-lite' ); ?></option>
            <option class = "wcmvp_order_bul_chng_completed" value = "completed"><?php esc_html_e( 'Change Status to Completed','wc-multi-vendor-platform-lite' ); ?></option>
        </select>

        <button class="mdc-button mdc-button--outlined mdc-ripple-upgraded wcmvp_order_apply_bulk wcmvp_add_new_prod" id="wcmvp_order_apply_bulk">
			<span class="mdc-button__label wcmvp_label_text"><?php esc_html_e('Apply', 'wc-multi-vendor-platform-lite'); ?></span>
			<div class="mdc-button__ripple "></div>
        </button>
        
    </div>

        <table id="wcmvp_order_table" class="wcmvp_orders_table mdl-data-table">
            <thead>
                <tr>
                    <th class="mdc-data-table__cell mdc-data-table__cell--checkbox">
                        <div class="mdc-checkbox mdc-data-table__row-checkbox">
                            <input type="checkbox" class="mdc-checkbox__native-control wcmvp_orders_outer_checkbox">
                            <div class="mdc-checkbox__background">
                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                            </svg>
                            <div class="mdc-checkbox__mixedmark"></div>
                            </div>
                            <div class="mdc-checkbox__ripple"></div>
                        </div>
				    </th>
                    <th><?php esc_html_e( 'Order','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Date','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Status','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Total','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Vendor','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Sub Order','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Actions','wc-multi-vendor-platform-lite' ); ?></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th class="mdc-data-table__cell mdc-data-table__cell--checkbox">
                        <div class="mdc-checkbox mdc-data-table__row-checkbox">
                            <input type="checkbox" class="mdc-checkbox__native-control wcmvp_orders_outer_checkbox">
                            <div class="mdc-checkbox__background">
                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                            </svg>
                            <div class="mdc-checkbox__mixedmark"></div>
                            </div>
                            <div class="mdc-checkbox__ripple"></div>
                        </div>
				    </th>
                    <th><?php esc_html_e( 'Order','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Date','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Status','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Total','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Vendor','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Sub Order','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Actions','wc-multi-vendor-platform-lite' ); ?></th>
                </tr>
            </tfoot>
        </table>

        <div class='wcmvp-modal' id='wcmvp_order_edit_modal'>
            <div class='wcmvp-modal-dialog wcmvp_modal_dialog_for_prod'>
                <div class='wcmvp-modal-content wcmvp_fix_height_content_for_iframe'>
                
                    <div class='wcmvp-modal-header'>
                        <h4 class='wcmvp-modal-title'><?php esc_html_e('Edit Order','wc-multi-vendor-platform-lite'); ?></h4>
                        <button class="close wcmvp_edit_order_iframe_close wcmvp-modal-close mdc-button">
                            <i class="material-icons wcmvpvsm-list-item" aria-hidden="true"><?php echo esc_html('highlight_off') ?></i>
                        </button>
                    </div>
                    
                    <div class = 'wcmvp-modal-body wcmvp_fix_height_body_for_iframe'>
                        <iframe class="wcmvp_prod_frame" id="wcmvp_edit_order_frame">     
                        </iframe>
                    </div>
                    <div class="loader"></div>
                </div>
            </div>
        </div>

        <div class="wcmvp-modal" id="wcmvp_order_detail_modal">
        <div class="wcmvp-modal-dialog wcmvp-dialog" role="document">
          <div class="wcmvp-modal-content">
            <div class="wcmvp-modal-header">
              <h3 class="wcmvp-modal-title wcmvp_order_id"></h3>
              <span class="rounded py-1 px-3 ml-5 wcmvp_order_status"></span>
              <button  class="mdc-button wcmvp-modal-close wcmvp_close_view_order_btn">
              <i class="material-icons wcmvpvsm-list-item"><?php echo esc_html('highlight_off'); ?></i>
              </button>
            </div>
            <div class="wcmvp-modal-body wcmvp_edit_order_view_text">
                <div class="wcmvp_orders_row">
                    <div class="wcmvp-col-6">
                        <h5 class="wcmvp-order-modal-title"><?php esc_html_e('Billing Details','wc-multi-vendor-platform-lite'); ?></h5>
                        <p class="wcmvp_billing_first_name"></p>
                        <p class="wcmvp_billing_last_name"></p>
                        <p class="wcmvp_billing_company"></p>
                        <p class="wcmvp_billing_address1"></p>
                        <p class="wcmvp_billing_address2"></p>
                        <p class="wcmvp_billing_city"></p>
                        <p class="wcmvp_billing_state"></p>
                        <p class="wcmvp_billing_postcode"></p>
                        <p class="wcmvp_billing_country"></p>
                        <div>
                            <h6 class="wcmvp-order-email-title">
                            <?php esc_html_e('Email','wc-multi-vendor-platform-lite')?></h6>
                            <a class="nav-link  wcmvp_billing_email" href="#orders"></a>
                        </div>
                        <div>
                            <h6 class="wcmvp-order-phone-title"><?php esc_html_e('Phone','wc-multi-vendor-platform-lite') ?></h6>
                            <a class="nav-link  wcmvp_billing_phone"></a>
                        </div>
                        <div>
                            <h6 class="wcmvp-order-payment-title"><?php esc_html_e('Payment Via','wc-multi-vendor-platform-lite') ?></h6>
                            <p class="nav-link  wcmvp_payment_method_title"></p>
                        </div>
                    </div>
                     <div class="wcmvp-col-6">
                        <h5 class="wcmvp-order-modal-title"><?php esc_html_e('Shipping Details','wc-multi-vendor-platform-lite') ?></h5>
                            <p class="m-0 wcmvp_shipping_first_name"></p>
                            <p class="m-0 wcmvp_shipping_last_name"></p>
                            <p class="m-0 wcmvp_shipping_company"></p>
                            <p class="m-0 wcmvp_shipping_address1"></p>
                            <p class="m-0 wcmvp_shipping_address2"></p>
                            <p class="m-0 wcmvp_shipping_city"></p>
                            <p class="m-0 wcmvp_shipping_state"></p>
                            <p class="m-0 wcmvp_shipping_postcode"></p>
                            <p class="m-0 wcmvp_shipping_country"></p>
                        
                        <div class="col-md-6">
                            <h6 class="wcmvp-order-titles"><?php esc_html_e('Shipping Methods','wc-multi-vendor-platform-lite') ?></h6>
                            <p class="wcmvp_shipping_method"></p>
                            <h6 class="wcmvp-order-titles"><?php esc_html_e('Note','wc-multi-vendor-platform-lite') ?></h6>
                            <p class="wcmvp_customer_note"></p>
                        </div>
                       
                    </div>
                </div>
                
                <div id="wcmvp_order_prod_table">
                </div>

            </div>
            <div class="wcmvp-modal-footer d-block">
                <div class="row">
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-6 text-right">
                        <input type="hidden" id="wcmvp_current_order_id">
                        <button type="button" class=" wcmvp_edit_order_modal wcmvp-modal-close mdc-button mdc-button--raised mdc-ripple-upgraded close">
							<span class="mdc-button__label"><?php esc_html_e('Edit','wc-multi-vendor-platform-lite'); ?></span>
							<div class="mdc-button__ripple"></div>
						</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>