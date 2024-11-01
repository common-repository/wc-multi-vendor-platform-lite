
<!-- This file contains the html for the withdraw section on vendor dashboard -->

<div class="wcmvp-withdraw-wrap card">
    <?php

    $wcmvp_withdraw_count = get_user_meta(get_current_user_id(), "wcmvp_counting_array", true);
    ?>
    <div class="wcmvp_amount_detail">
        <p id="wcmvp_balance">
            <?php esc_html_e("Balance : ", "wc-multi-vendor-platform-lite");
            $wcmvp_currency =  "<span class='wcmvp_curency_symbol'>" . get_woocommerce_currency_symbol() . "</span>";
            echo $wcmvp_currency;  // This variable holds html
            ?>
            <span id="wcmvp_curent_bal">
                <?php if (get_user_meta(get_current_user_id(), 'wcmvp_total_amount', true)) {
                    esc_html(get_user_meta(get_current_user_id(), 'wcmvp_total_amount', true));
                } else {
                    esc_html_e(0, "wc-multi-vendor-platform-lite");
                }     ?>
            </span>
        </p>
        <p id="wcmvp_min_amount">
            <?php
            esc_html_e("Min. Amount can be withdrawn  ", "wc-multi-vendor-platform-lite");
            echo ": " . $wcmvp_currency;    // This variable holds html
            ?>
            <span id="wcmvp_min_bal">
                <?php $wcmvp_temp_var = (isset(get_option("wcmvp_withdraw_option")["wcmvp_minimum_withdraw"]) && is_array(get_option("wcmvp_withdraw_option"))) ? get_option("wcmvp_withdraw_option")["wcmvp_minimum_withdraw"] : 0; 
                echo esc_html($wcmvp_temp_var);
                ?></span>
        </p>
    </div>
    <div class="wcmvp-head">
        <div class="mdc-tab-bar wcmvp-tab-bar" role="tablist">
            <div class="mdc-tab-scroller">
                <div class="mdc-tab-scroller__scroll-area mdc-tab-scroller__scroll-area--scroll">
                    <div class="mdc-tab-scroller__scroll-content">
                        <a class="mdc-tab mdc-tab--stacked mdc-tab--active listing_button wcmvp_active_button" role="tab" aria-selected="true" tabindex="0" id="wcmvp_withdraw_request" href="#withdraw?request">
                            <span class="mdc-tab__content">
                                <span class="mdc-tab__icon material-icons" aria-hidden="true">
                                <?php echo esc_html('attach_money');?></span>
                                <span class="mdc-tab__text-label wcmvp_withdraw_req">
                                    <?php esc_html_e(" Withdraw Request", "wc-multi-vendor-platform-lite");
                                    echo "(" ;
                                     $wcmvp_temp_var = isset($wcmvp_withdraw_count["wcmvp_withdraw_count_array"]["wcmvp_withdraw_pending_count"]) ? $wcmvp_withdraw_count["wcmvp_withdraw_count_array"]["wcmvp_withdraw_pending_count"] : 0 ;
                                     esc_html_e($wcmvp_temp_var ,"wc-multi-vendor-platform-lite");
                                     echo ")"; ?>
                                </span>
                                <span class="mdc-tab-indicator mdc-tab-indicator--active">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                </span>
                            </span>
                            <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                        </a>
                        <a class="mdc-tab mdc-tab--stacked listing_button" role="tab" aria-selected="false" tabindex="-1" id="wcmvp_approved_request" href="#withdraw?approved">
                            <span class="mdc-tab__content">
                                <span class="mdc-tab__icon material-icons" aria-hidden="true"><?php echo esc_html('published_with_changes');?></span>
                                <span class="mdc-tab__text-label wcmvp_withdraw_approv">
                                    <?php esc_html_e("Approved Requests", "wc-multi-vendor-platform-lite");
                                    echo "(" ;
                                     $wcmvp_temp_var = isset($wcmvp_withdraw_count["wcmvp_withdraw_count_array"]["wcmvp_withdraw_approved_count"]) ? $wcmvp_withdraw_count["wcmvp_withdraw_count_array"]["wcmvp_withdraw_approved_count"] : 0 ;
                                     esc_html_e($wcmvp_temp_var,"wc-multi-vendor-platform-lite");
                                     echo ")"; ?>
                                </span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                </span>
                            </span>
                            <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                        </a>
                        <a class="mdc-tab mdc-tab--stacked listing_button" role="tab" aria-selected="false" tabindex="-1" id="  " href="#withdraw?cancelled">
                            <span class="mdc-tab__content">
                                <span class="fa fa-times mdc-tab__icon" aria-hidden="true"></span>
                                <span class="mdc-tab__text-label wcmvp_withdraw_cancel">
                                    <?php esc_html_e("Cancelled Requests", "wc-multi-vendor-platform-lite");
                                    echo "(" ;
                                    $wcmvp_temp_var = isset($wcmvp_withdraw_count["wcmvp_withdraw_count_array"]["wcmvp_withdraw_cancelled_count"]) ? $wcmvp_withdraw_count["wcmvp_withdraw_count_array"]["wcmvp_withdraw_cancelled_count"] : 0; 
                                    esc_html_e($wcmvp_temp_var,"wc-multi-vendor-platform-lite")  ;
                                    echo ")"; ?>
                                </span>
                                <span class="mdc-tab-indicator">
                                    <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                </span>
                            </span>
                            <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wcmvp-withdraw-table">
        <div class="wcmvp_req_table">
            <div class="wcmvp_add_new_req"><button class="wcmvp_add_req_button mdc-button mdc-button--raised wcmvp-footer-btn mdc-ripple-upgraded" id="wcmvp_add_new_withdraw_req"><?php esc_html_e("Add New Withdraw Request", "") ?></button></div>
            <div class="wcmvp_modal" id="wcmvp_withdraw_form">
                <div class="wcmvp-modal-dialog">
                    <div class="wcmvp-modal-content">
                        <div class="wcmvp-modal-header">
                            <h4 class="wcmvp-modal-title">
                                <?php esc_html_e("Withdraw Request Form", "wc-multi-vendor-platform-lite") ?>
                            </h4>
                            <a class="wcmvp-modal-close mdc-icon-button material-icons mdc-ripple-upgraded mdc-ripple-upgraded--unbounded mdc-icon-button--on" aria-pressed="true">highlight_off</a>
                        </div>
                        <div class="wcmvp-modal-body">
                            <div class="wcmvp_withdraw_request_form mdc-elevation--z9">
                                <div class="wcmvp_withdraw_amount">
                                    <label>
                                        <?php esc_html_e("Withdraw Amount", "wc-multi-vendor-platform-lite") ?>
                                    </label>
                                    <label class="mdc-text-field mdc-text-field--outlined">
                                        <input type="number" class="mdc-text-field__input wcmvp_vendor_withdraw_amount" id="wcmvp_ven_with_amount">
                                        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                                <span class="mdc-floating-label"><?php esc_html_e("Withdraw Amount", "wc-multi-vendor-platform-lite") ?></span>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </label></div>
                                <div class="wcmvp_payment_methods">
                                    <label>
                                        <?php esc_html_e(" Payment Methods", "wc-multi-vendor-platform-lite") ?>
                                    </label>
                                    <select id="wcmvp_paymet_method">
                                        <option></option>
                                        <?php
                                        $wcmvp_method = get_option("wcmvp_payment_gateway");
                                        if($wcmvp_method && !empty($wcmvp_method)){
                                            $wcmvprre_paypal = (isset($wcmvp_method['wcmvp_withdraw_paypal']) && $wcmvp_method['wcmvp_withdraw_paypal'] == 1) ? True : False;
                                            $wcmvprre_bank_transfer = (isset($wcmvp_method['wcmvp_withdraw_bank']) && $wcmvp_method['wcmvp_withdraw_bank'] == 1) ? True : False;
                                            $wcmvprre_stripe = (isset($wcmvp_method['wcmvp_withdraw_stripe']) && $wcmvp_method['wcmvp_withdraw_stripe'] == 1) ?  True : False;
                                        }else{
                                            $wcmvprre_paypal = False;
                                            $wcmvprre_bank_transfer = False;
                                            $wcmvprre_stripe = False;
                                        }
                                       
                                        $wcmvprre_payment_array = array();
                                        if($wcmvprre_paypal){
                                            $wcmvprre_payment_array["paypal"] = "Paypal";
                                        }
                                        if($wcmvprre_bank_transfer){
                                            $wcmvprre_payment_array["bank_transfer"] = "Bank Transfer";
                                        }
                                        if($wcmvprre_stripe){
                                            $wcmvprre_payment_array["stripe"] = "Stripe";
                                        }
                                        $wcmvprre_payment_array = apply_filters("wcmvp_withdraw_payment_methods",$wcmvprre_payment_array);
                                        if(isset($wcmvprre_payment_array) && !empty($wcmvprre_payment_array) && is_array($wcmvprre_payment_array)){
                                            foreach ($wcmvprre_payment_array as $wcmvp_key => $wcmvp_value) {
                                                echo "<option value='".esc_attr($wcmvp_key)."'>".esc_html__($wcmvp_value,"wc-multi-vendor-platform-lite")."</option>";
                                            }
                                        }
                                    ?>
                                    </select>
                                </div>
                                <p>
                                    <button type="button" id="wcmvp_submit_request_button" class="mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp_submit_request">
                                        <span class="mdc-button__label"><?php esc_html_e("Submit", "wc-multi-vendor-platform-lite") ?></span>
                                        <div class="mdc-button__ripple"></div>
                                    </button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <table id="wcmvp-withdraw-table-id" class="display mdl-data-table">
                <thead>
                    <tr>
                        <th><?php esc_html_e("Amount", "wc-multi-vendor-platform-lite") ?></th>
                        <th><?php esc_html_e("Method", "wc-multi-vendor-platform-lite") ?></th>
                        <th><?php esc_html_e("Date", "wc-multi-vendor-platform-lite") ?></th>
                        <th><?php esc_html_e("Remove", "wc-multi-vendor-platform-lite") ?></th>
                        <th><?php esc_html_e("Status", "wc-multi-vendor-platform-lite") ?></th>
                    </tr>
                </thead>
                <tbody id="wcmvp_withdraw_body">
                </tbody>
            </table>
        </div>
        <div class="wcmvp_status_table">
        <div class="wcmvp_modal" id="wcmvp_method_detail_modal">
                <div class="wcmvp-modal-dialog">
                    <div class="wcmvp-modal-content">
                        <div class="wcmvp-modal-header">
                            <h4 class="wcmvp-modal-title">
                                <?php esc_html_e("Withdraw Details", "wc-multi-vendor-platform-lite") ?>
                            </h4>
                            <a class="wcmvp-modal-close wcmvp_close_method_details mdc-icon-button material-icons mdc-ripple-upgraded mdc-ripple-upgraded--unbounded mdc-icon-button--on" aria-pressed="true">highlight_off</a>
                        </div>
                        <div class="wcmvp-modal-body">
                            <div class="wcmvp_method_details_append"></div>
                        </div>
                    </div>
                    <div class="wcmvp-modal-footer">
                    </div>
                </div>
            </div>
            <table id="wcmvp-withdraw-status" class="display mdl-data-table">
                <thead>
                    <tr>
                        <th><?php esc_html_e("Amount", "wc-multi-vendor-platform-lite") ?></th>
                        <th><?php esc_html_e("Method", "wc-multi-vendor-platform-lite") ?></th>
                        <th><?php esc_html_e("Date", "wc-multi-vendor-platform-lite") ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>