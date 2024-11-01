
<!-- This file contains the html for order section -->

<div class="wcmvp-order-wrap card">
    <?php $wcmvp_meta = get_user_meta(get_current_user_id(), 'wcmvp_counting_array', true);
    if (is_array($wcmvp_meta)) {
        $wcmvp_order_meta = $wcmvp_meta['wcmvp_order_count_array'];
        $wcmvp_order_all  =  $wcmvp_order_meta['wcmvp_order_all_count'];
        $wcmvp_order_complete = $wcmvp_order_meta['wcmvp_order_complete_count'];
        $wcmvp_order_processing = $wcmvp_order_meta['wcmvp_order_processing_count'];
        $wcmvp_order_on_hold = $wcmvp_order_meta['wcmvp_order_on_hold_count'];
        $wcmvp_order_pending = $wcmvp_order_meta['wcmvp_order_pending_count'];
        $wcmvp_order_cancelled = $wcmvp_order_meta['wcmvp_order_cancelled_count'];
        $wcmvp_order_refunded = $wcmvp_order_meta['wcmvp_order_refunded_count'];
        $wcmvp_order_failed = $wcmvp_order_meta['wcmvp_order_failed_count'];
    } else {
        $wcmvp_order_meta = '';
        $wcmvp_order_all = 0;
        $wcmvp_order_complete = 0;
        $wcmvp_order_processing = 0;
        $wcmvp_order_on_hold = 0;
        $wcmvp_order_pending = 0;
        $wcmvp_order_cancelled = 0;
        $wcmvp_order_refunded = 0;
        $wcmvp_order_failed = 0;
    }
    ?>
    <div class="wcmvp-head">
        <div class="mdc-tab-bar" role="tablist">
            <div class="mdc-tab-scroller wcmvp-tab-scroller">
                <div class="mdc-tab-scroller__scroll-area mdc-tab-scroller__scroll-area--scroll">
                    <div class="mdc-tab-scroller__scroll-content" id="wcmvp_tabs_wrapper">
                        <a class="mdc-tab mdc-tab--stacked mdc-tab--active listing_button wcmvp_active_button" role="tab" aria-selected="true" tabindex="0" id="wcmvp_order_all_button" href="#orders">
                            <span class="mdc-tab__content">
                                <span class="mdc-tab__icon material-icons" aria-hidden="true"><?php echo esc_html('list');?></span>
                                <span class="mdc-tab__text-label wcmvp_status_all"><?php esc_html_e("All", "wc-multi-vendor-platform-lite");
                                echo "(" ;
                                 esc_html_e($wcmvp_order_all,"wc-multi-vendor-platform-lite");
                                 echo ")"; ?></span>
                                <span class="mdc-tab-indicator mdc-tab-indicator--active">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                </span>
                            </span>
                            <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                        </a>


                        <a class="mdc-tab mdc-tab--stacked listing_button" role="tab" aria-selected="false" tabindex="-1" id="wcmvp_order_complete_button" href="#orders?completed">
                            <span class="mdc-tab__content">
                                <span class="mdc-tab__icon material-icons" aria-hidden="true"><?php echo esc_html('offline_pin');?></span>
                                <span class="mdc-tab__text-label wcmvp_status_completed"><?php esc_html_e("Completed", "wc-multi-vendor-platform-lite");
                                echo "(" ;
                                  esc_html_e($wcmvp_order_complete,"wc-multi-vendor-platform-lite");
                                   echo ")"; ?></span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                </span>
                            </span>
                            <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                        </a>

                        <?php
                        if($wcmvp_order_processing!=0){?>
                         <a class="mdc-tab mdc-tab--stacked listing_button" role="tab" aria-selected="false" tabindex="-1" id="wcmvp_order_processing_button" href="#orders?processing">
                            <span class="mdc-tab__content">
                                <span class="fas fa-sync mdc-tab__icon" aria-hidden="true"></span>
                                <span class="mdc-tab__text-label wcmvp_status_processing"><?php esc_html_e("Processing", "wc-multi-vendor-platform-lite");
                                echo "(" ;
                                esc_html_e($wcmvp_order_processing,"wc-multi-vendor-platform-lite");
                                echo ")"; ?></span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                </span>
                            </span>
                            <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                        </a>
                        <?php } ?>

                        <?php
                        if($wcmvp_order_on_hold!=0){ ?>
                         <a class="mdc-tab mdc-tab--stacked listing_button" role="tab" aria-selected="false" tabindex="-1" id="wcmvp_order_On_hold_button" href="#orders?onhold">
                            <span class="mdc-tab__content">
                                <span class="mdc-tab__icon material-icons" aria-hidden="true"><?php echo esc_html('pause_circle_filled');?></span>
                                <span class="mdc-tab__text-label wcmvp_status_onhold"><?php esc_html_e("On-hold", "wc-multi-vendor-platform-lite");
                                echo "(" ;
                                esc_html_e( $wcmvp_order_on_hold ,"wc-multi-vendor-platform-lite");
                                echo ")"; ?></span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                </span>
                            </span>
                            <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                        </a>
                        <?php } ?>
                       
                        <?php
                        if($wcmvp_order_pending!=0){ ?>
                        <a class="mdc-tab mdc-tab--stacked listing_button" role="tab" aria-selected="false" tabindex="-1" id="wcmvp_order_Pending_button" href="#orders?pending">
                            <span class="mdc-tab__content">
                                <span class="mdc-tab__icon material-icons" aria-hidden="true"><?php echo esc_html('watch_later');?></span>
                                <span class="mdc-tab__text-label wcmvp_status_pending"><?php esc_html_e("Pending", "wc-multi-vendor-platform-lite");
                                echo "(" ;
                                esc_html_e($wcmvp_order_pending,"wc-multi-vendor-platform-lite");
                                echo ")"; ?></span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                </span>
                            </span>
                            <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                        </a>
                        <?php } ?>

                        <?php
                        if($wcmvp_order_cancelled!=0){ ?>
                        <a class="mdc-tab mdc-tab--stacked listing_button" role="tab" aria-selected="false" tabindex="-1" id="wcmvp_order_Cancelled_button" href="#orders?cancelled">
                            <span class="mdc-tab__content">
                                <span class="mdc-tab__icon material-icons" aria-hidden="true"><?php echo esc_html('clear');?></span>
                                <span class="mdc-tab__text-label wcmvp_status_cancelled"><?php esc_html_e("Cancelled", "wc-multi-vendor-platform-lite");
                                echo "(" ;
                                 esc_html_e($wcmvp_order_cancelled,"wc-multi-vendor-platform-lite");
                                 echo ")"; ?></span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                </span>
                            </span>
                            <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                        </a>
                        <?php } ?>

                        <?php
                        if($wcmvp_order_refunded!=0){ ?>
                        <a class="mdc-tab mdc-tab--stacked listing_button" role="tab" aria-selected="false" tabindex="-1" id="wcmvp_order_Refunded_button" href="#orders?refunded">
                            <span class="mdc-tab__content">
                                <span class="fas fa-donate mdc-tab__icon" aria-hidden="true"></span>
                                <span class="mdc-tab__text-label wcmvp_status_refunded"><?php esc_html_e("Refunded", "wc-multi-vendor-platform-lite");
                                echo "(" ;
                                esc_html_e($wcmvp_order_refunded,"wc-multi-vendor-platform-lite");  
                                echo ")"; ?></span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                </span>
                            </span>
                            <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                        </a>
                        <?php } ?>

                        <?php
                        if($wcmvp_order_failed!=0){ ?>
                        <a class="mdc-tab mdc-tab--stacked listing_button" role="tab" aria-selected="false" tabindex="-1" id="wcmvp_order_Failed_button" href="#orders?failed">
                            <span class="mdc-tab__content">
                                <span class="mdc-tab__icon material-icons" aria-hidden="true"><?php echo esc_html('warning');?></span>
                                <span class="mdc-tab__text-label wcmvp_status_failed"><?php esc_html_e("Failed", "wc-multi-vendor-platform-lite");
                                echo "(" ;
                                 esc_html_e($wcmvp_order_failed,"wc-multi-vendor-platform-lite") ;
                                 echo ")"; ?></span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                </span>
                            </span>
                            <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                        </a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wcmvp-order-all-table">
        <div class="wcmvp_order_actions_box">
            <div class="wcmvp_order_filter">
                <div class="wcmvp-date-input-box">
                    <input type="text" class="wcmvp_order_filter_date" name="wcmvp_order_filter_date" placeholder="<?php esc_attr_e("Select Date", "wcmvp_multivendor_platform_pro") ?>">
                    <i class="fas fa-calendar-check wcmvp_calender_icon" aria-hidden="true"></i>
                </div>
                <div class="wcmvp_select_customer"><select class="wcmvp_order_filter_cust" name="wcmvp_order_filter_customer"></select></div>
                <button type="button" id="wcmvp_filter_order" class="mdc-button mdc-button--raised mdc-ripple-upgraded">
                    <span class="mdc-button__label"><?php esc_html_e("Filter Order", "wc-multi-vendor-platform-lite") ?></span>
                    <div class="mdc-button__ripple"></div>
                </button>
            </div>
            <div class="wcmvp_export_sec">
                <button type="button" id="wcmvp_export_all" class="mdc-button mdc-button--raised mdc-ripple-upgraded">
                    <span class="mdc-button__label"><?php esc_html_e("Export All", "wc-multi-vendor-platform-lite") ?></span>
                    <div class="mdc-button__ripple"></div>
                </button>
                <button type="button" id="wcmvp_export_select" class="mdc-button mdc-button--raised mdc-ripple-upgraded">
                    <span class="mdc-button__label"><?php esc_html_e("Export Selected", "wc-multi-vendor-platform-lite") ?></span>
                    <div class="mdc-button__ripple"></div>
                </button>
            </div>
        </div>
        <?php
        $wcmvp_status_permission = get_option('wcmvp_selling_page');
        if (is_array($wcmvp_status_permission)) {
            $wcmvp_permission = $wcmvp_status_permission['wcmvp_order_status_change'];
        } else {
            $wcmvp_permission = 0;
        }

        if ($wcmvp_permission == "1") {
        ?>
            <div class="wcmvp_bulk_action_area">
                <div class="wcmvp_select_action">
                    <select id="wcmvp_bulk_action_order_check">
                        <option value=""><?php esc_html_e("Select action", "wc-multi-vendor-platform-lite") ?></option>
                        <option value="wc-on-hold"><?php esc_html_e("Change to on_hold", "wc-multi-vendor-platform-lite") ?></option>
                        <option value="wc-processing"><?php esc_html_e("Change to processing", "wc-multi-vendor-platform-lite") ?></option>
                        <option value="wc-completed"><?php esc_html_e("Change to Complete", "wc-multi-vendor-platform-lite") ?></option>
                    </select>
                </div>

                <input type="button" name="submit" id="wcmvp_bulk_button" class="wcmvp_bulk_butt mdc-button mdc-button--raised mdc-ripple-upgraded" value="Ok">
            </div>
        <?php
        }
        do_action("wcmvp_before_order_extra_fields"); ?>
        <table id="wcmvp-order-all-table-id" class="display mdl-data-table">
            <thead>
                <tr>
                    <th class="mdc-data-table__cell mdc-data-table__cell--checkbox sorting_disabled wcmvp_datatable_checkbox" tabindex="0" rowspan="1" colspan="1">
                        <div class="mdc-checkbox mdc-data-table__row-checkbox">
                            <input type="checkbox" class="mdc-checkbox__native-control wcmvp_order_all_bulk_check_class" id="wcmvp_order_all_table_bulk_action" aria-labelledby="u0">
                            <div class="mdc-checkbox__background">
                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                    <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                </svg>
                                <div class="mdc-checkbox__mixedmark"></div>
                            </div>
                            <div class="mdc-checkbox__ripple"></div>
                        </div>
                    </th>
                    <th><?php esc_html_e("Order no.", "wc-multi-vendor-platform-lite") ?></th>
                    <th><?php esc_html_e("Order Total", "wc-multi-vendor-platform-lite") ?></th>
                    <th><?php esc_html_e("Status", "wc-multi-vendor-platform-lite") ?></th>
                    <th><?php esc_html_e("Customer", "wc-multi-vendor-platform-lite") ?></th>
                    <th><?php esc_html_e("Date", "wc-multi-vendor-platform-lite") ?></th>
                    <th><?php esc_html_e("Action", "wc-multi-vendor-platform-lite") ?></th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div class="wcmvp_order_details_section">
        <div class="wcmvp_modal  wcmvp_order_modal">
            <div class="wcmvp-modal-dialog wcmvp_order_dialog mdc-elevation--z3">
                <div class="wcmvp-modal-content">
                    <div class="wcmvp-modal-header">
                        <h5 class="wcmvp-modal-title"><?php esc_html_e("Order", "wc-multi-vendor-platform-lite") ?></h5>
                        <a class="wcmvp-close-btn mdc-icon-button material-icons mdc-ripple-upgraded wcmvp-modal-close mdc-ripple-upgraded--unbounded mdc-icon-button--on" aria-pressed="true">highlight_off</a>
                    </div>
                    <div class="wcmvp-modal-body">
                        <?php
                        $wcmvp_vendor_order[] = '<div class="wcmvp-row">
                            <div class="wcmvp-prdct-detail">
                                <div class="wcmvp_left">
                                    <div class="wcmvp_order_items_details">
                                        <ul class="order-head">
                                            <li>' . esc_html__("Order items", "wc-multi-vendor-platform-lite") . '</li>
                                        </ul>';
                        $wcmvp_vendor_order[] = '<table id="wcmvp_modal_order_table_content">
                                            <thead>
                                                <tr>
                                                    <th colspan="2">
                                                        ' . esc_html__("Items", "wc-multi-vendor-platform-lite") . '
                                                    </th>';
                        $wcmvp_vendor_order[] = '<th>
                                                        ' . esc_html__("Qty", "wc-multi-vendor-platform-lite") . '
                                                    </th>';
                        $wcmvp_vendor_order[] =   '<th>
                                                        ' . esc_html__("Totals", "wc-multi-vendor-platform-lite") . '
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="wcmvp_order_item_detail">

                                            </tbody>
                                            <tfoot>';
                        $wcmvp_vendor_order[] = '<tr>
                                                    <th> ' . esc_html__("Subtotal:", "wc-multi-vendor-platform-lite") . '</th>
                                                    <td id="wcmvp_subtotal"></td>
                                                </tr>';
                        $wcmvp_vendor_order[] =  '<tr>
                                                    <th> ' . esc_html__("Shipping:", "wc-multi-vendor-platform-lite") . '</th>
                                                    <td id="wcmvp_shippings"></td>
                                                </tr>';
                        $wcmvp_vendor_order[] = '<tr>
                                                    <th> ' . esc_html__("Payment method:", "wc-multi-vendor-platform-lite") . '</th>
                                                    <td id="wcmvp_payment_methods"></td>
                                                </tr>';
                        $wcmvp_vendor_order[] = '<tr>
                                                    <th>' . esc_html__("Total:", "wc-multi-vendor-platform-lite") . '</th>
                                                    <td id="wcmvp_total"></td>
                                                </tr>';
                        $wcmvp_vendor_order[] = '</tfoot>
                                        </table>
                                    </div>';
                        $wcmvp_vendor_order[] = '<div class="wcmvp_billing_address_details">
                                        <div class="wcmvp-row">
                                            <div class="wcmvp-billing-section">
                                                <div class="wcmvp_billing_address">
                                                    <ul class="order-head">
                                                        <li>
                                                            ' . esc_html__("Billing Address", "wc-multi-vendor-platform-lite") . '
                                                        </li>
                                                    </ul>';
                        $wcmvp_vendor_order[] = '<div class="wcmvp-shipping-body">
                                                        <span id="wcmvp_billing_details"></span></div>
                                                </div>
                                            </div>
                                            <div class="wcmvp-shipping-section">
                                                <div class="wcmvp_shipping_address">
                                                    <ul class="order-head">
                                                        <li>
                                                            ' . esc_html__("Shipping Address", "wc-multi-vendor-platform-lite") . '
                                                        </li>
                                                    </ul>
                                                    <div class="wcmvp-shipping-body">
                                                        <span id="wcmvp_shipping_details"></span>
                                                    </div>
                                                </div>';
                        $wcmvp_vendor_order[] = '</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wcmvp-general-detail">
                                <div class="wcmvp_right">';
                        $wcmvp_vendor_order[] = '<div class="wcmvp_general_detail_box border rounded mb-3">
                                        <ul class="order-head">
                                            <li>
                                                ' . esc_html__("General details", "wc-multi-vendor-platform-lite") . '
                                            </li>
                                        </ul>
                                        <ul class="order-head">';
                        $wcmvp_vendor_order[] =  '<li>
                                                <span>
                                                    ' . esc_html__("Order Status:", "wc-multi-vendor-platform-lite") . '
                                                </span>
                                                <label id="wcmvp_order_status"></label>
                                            </li>';
                        $wcmvp_vendor_order[] = '<li>
                                                <span>
                                                    ' . esc_html__("Order Date: ", "wc-multi-vendor-platform-lite") . '
                                                </span>
                                                <label id="wcmvp_order_date"></label>
                                            </li>';
                        $wcmvp_vendor_order[] = '<li>
                                                <span>
                                                    ' . esc_html__("Earning From Order:", "wc-multi-vendor-platform-lite") . '
                                                </span>
                                                <label id="wcmvp_order_earning"></label>
                                            </li>';
                        $wcmvp_vendor_order[] = '<div class="wcmvp_customer_details">
                                                <li>
                                                <span>
                                                    ' . esc_html__("Customer:", "wc-multi-vendor-platform-lite") . '
                                                </span>
                                                <label id="wcmvp_customer_name"></label>
                                            </li>';
                        $wcmvp_vendor_order[] = '<li>
                                                <span>
                                                    ' . esc_html__("Email:", "wc-multi-vendor-platform-lite") . '
                                                </span>
                                                <label id="wcmvp_customer_email"></label>
                                            </li>';
                        $wcmvp_vendor_order[] = '<li>
                                                <span>
                                                    ' . esc_html__("Phone:", "wc-multi-vendor-platform-lite") . '
                                                </span>
                                                <label id="wcmvp_phone"></label>
                                            </li>';
                        $wcmvp_vendor_order[] = '<li>
                                                <span>
                                                    ' . esc_html__("Customer IP:", "wc-multi-vendor-platform-lite") . '
                                                </span><label id="wcmvp_customer_ip"></label>
                                            </li></div>';
                        $wcmvp_vendor_order[] = '</ul>
                                    </div>
                                </div>
                            </div>
                        </div>';
                        $wcmvp_vendor_order = apply_filters("wcmvp_order_view_html", $wcmvp_vendor_order);

                        foreach ($wcmvp_vendor_order as $key => $value) {
                            echo $value;    // This variable holds html
                        }
                        ?>
                    </div>
                    <div class="wcmvp-modal-footer">
                        <button type="button" class="wcmvp-modal-close wcmvp-footer-btn mdc-button mdc-button--raised mdc-ripple-upgraded">
                            <span class="mdc-button__label">Close</span>
                            <div class="mdc-button__ripple"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>