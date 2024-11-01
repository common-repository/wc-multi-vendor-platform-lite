<?php

// This file contains the html for the add producdt section

$wcmvp_modal_permission = get_option('wcmvp_selling_page');

    $args = array(
        "id"        => "wcmvp_category",
        "name"      => "category",
        "class"     => "wcmvp_product_multiple_data",
        "option_none_value" => "",
        "show_option_none" => "Select category",
        "taxonomy"     => "product_cat",
        "orderby"      => "name",
        "show_count"   => 0,
        "pad_counts"   => 0,
        "hierarchical" => 1,
        "title_li"     => '',
        "hide_empty"   => 0,
        "echo"   => 0
    );
    $wcmvp_category_drop = wp_dropdown_categories($args);
    $wcmvp_content   = '';
    $wcmvp_editor_id = 'wcmvp_short_description_field';
    $wcmvp_argsss = array(
        'tinymce'       => array(
            'toolbar1'      => 'bold,italic,underline,separator,alignleft,aligncenter,alignright,separator,link,unlink,undo,redo'
        ),
    );
    ob_start();
    wp_editor($wcmvp_content, $wcmvp_editor_id, $wcmvp_argsss);
    $wcmvp_wp_editor = ob_get_clean();
    $wcmvp_prod_array[] =
        '<div class="wcmvp-row">
        <div class="wcmvp-image-add-wrapper">
            <div class="wcmvp-image-add">
                <img id="wcmvp-image-preview" src="">
                <div class="wcmvp_remove_prod_image">
                <span class="wcmvp_remove_prod_img material-icons">
            clear
            </span>
                </div>
                <div class="wcmvp_upload_box">
                    <input id="wcmvp-upload_image_button" name="wcmvp_image_upload" type="button" class="mdc-button mdc-button--raised mdc-button--upgraded" value=" ' . esc_html__("Upload image", "wc-multi-vendor-platform-lite") . '" />
                    <input type="hidden" name="wcmvp-image_attachment_id" id="wcmvp-image_attachment_id" value="">
                    <input type="hidden" name="wcmvp_product_id" id="wcmvp_product_id" value="">
                </div>
            </div>
        </div>
        <div class="wcmvp-upper-input-fields">
            <div class="wcmvp-prdct-price-main">
                <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
                    <input type="text" name="product_name" class="mdc-text-field__input" id="wcmvp_product_name">
                    <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                        <div class="mdc-notched-outline__leading"></div>
                        <div class="mdc-notched-outline__notch">
                        <span class="mdc-floating-label"> ' . esc_attr__("Product Name", "wc-multi-vendor-platform-lite") . '</span>
                        </div>
                        <div class="mdc-notched-outline__trailing"></div>
                    </div>
                </label>
           </div>
            <div class="wcmvp-upper-input-field1 input-fields">
                <div class="wcmvp-d-flex">
                    <span class="wcmvp-doller-box">
                        <label>' . get_woocommerce_currency_symbol() . '</label>
                    </span>
                    <label class="mdc-text-field mdc-text-field--outlined wcmvp-prdct-price-label">
                        <input type="number" class="mdc-text-field__input" id="wcmvp_product_price">
                        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                            <span class="mdc-floating-label">'.esc_html__("Regular Price",'wc-multi-vendor-platform-lite').'</span>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
					</label>
                </div>    
            </div>
            <div class="wcmvp-upper-input-field2 input-fields">
            <div class="wcmvp-d-flex">
            <span class="wcmvp-doller-box">
                <label>' . get_woocommerce_currency_symbol() . '</label>
            </span>
            <label class="mdc-text-field mdc-text-field--outlined wcmvp-prdct-price-label">
                <input type="number" class="mdc-text-field__input" id="wcmvp_discounted-price">
                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                    <div class="mdc-notched-outline__leading"></div>
                    <div class="mdc-notched-outline__notch">
                    <span class="mdc-floating-label">'.esc_html__("Sale Price",'wc-multi-vendor-platform-lite').'</span>
                    </div>
                    <div class="mdc-notched-outline__trailing"></div>
                </div>
            </label>
        </div> 
            <a href="#" id="wcmvp_schedule_button" class="wcmvp-product_buttons Schedule">
            ' . esc_html__("Schedule", "wc-multi-vendor-platform-lite") . '
        </a>
        <a href="#" id="wcmvp_schedule_cancel_button" class="wcmvp-product_buttons schedule_cancel">X</a>
                <div class="wcmvp_schedule_box">
                    <div class="wcmvp-schedule-from">
                        <span class="wcmvp-doller-box2">
                            <label>' . esc_html__("From", "wc-multi-vendor-platform-lite") . '</label>
                        </span>
                        <input type="text" id="wcmvp_schedule_from" name="from_date" placeholder="' . esc_attr__("DD/MM/YYYY", "wc-multi-vendor-platform-lite") . '">
                    </div>
                    <div class="wcmvp-schedule-to">
                        <span class="wcmvp-doller-box2">
                            <label>' . esc_html__("To", "wc-multi-vendor-platform-lite") . '</label>
                        </span>
                        <input type="text" id="wcmvp_schedule_to" name="to_date" placeholder="' . esc_attr__("DD/MM/YYYY", "wc-multi-vendor-platform-lite") . '">
                    </div>
                </div>
            </div>
        </div>
    </div>';
    $wcmvp_prod_array[] = '<div class="wcmvp-lower-input-fields">
                    <div class="wcmvp_cat_box">';
    $wcmvp_prod_array[] =  $wcmvp_category_drop . "</div>";

    $wcmvp_term = get_terms(array(
        'taxonomy' => 'product_tag',
        'hide_empty' => false,
    ));
    $term_array = array();
    if (!empty($wcmvp_term) && !is_wp_error($wcmvp_term)) {
        foreach ($wcmvp_term as $term) {

            $term_array[$term->term_id] = $term->name;
        }
    }
    $wcmvp_tags = '<select id="wcmvp_product_tags" multiple>';

    $wcmvp_tags .= '<option></option>';

    foreach ($term_array as $wcmvp_tag_id => $wcmvp_tag) {
        $wcmvp_tags .= '<option value=' . $wcmvp_tag_id . '>' . $wcmvp_tag . '</option>';
    }
    $wcmvp_tags .= "</select>";
    $wcmvp_prod_array[] = '<p>
                        ' . $wcmvp_tags . '
                    </p>
                    <label class="mdc-text-field mdc-text-field--textarea mdc-text-field--no-label wcmvp-w-100">
                        <textarea class="mdc-text-field__input" aria-label="Label placeholder="' . esc_attr__("Description", "wc-multi-vendor-platform-lite") . '" id="wcmvp_description"></textarea>
                        <span class="mdc-notched-outline mdc-notched-outline--no-label">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                    </label>';

    $wcmvp_prod_array[] = '<div class="wcmvp_endsec">
                        <span id="warning"></span>
                        <a class="wcmvp-Create_new" href="#product">
                            ' . esc_html__("Add More Details", "wc-multi-vendor-platform-lite") . '
                        </a>
                        <input_type="hidden" class="wcmvp_prod_new" id="wcmvp_prod_exist">
                        <a id="wcmvp-create-product" class="wcmvp-create_add_new" data-id="' . get_current_user_id() . '" href="#">
                              ' . esc_html__("Create & Add _New", "wc-multi-vendor-platform-lite") . '
                        </a>
                    </div>';
    $wcmvp_prod_array[] = '<div class="wcmvp-add-product-div2">     
                        <p class="wcmvp-heading">
                            ' . esc_html__("Extra Details", "wc-multi-vendor-platform-lite") . '
                        </p>
                        <div class="wcmvp-product-detail-container">';
    $wcmvp_prod_array[] = '<div class="wcmvp-product-body-extend">
                                <div class="wcmvp-short_description ">
                                <h3 class="wcmvp-sub-heading">
                                ' . esc_html__("Product type and Short description", "wc-multi-vendor-platform-lite") . '
                            </h3>
                                <div class="wcmvp-product-head">
                                <div class="wcmvp-product-type">
                                    <div class="wcmvp-download-type">
                                       
                                        <div class="mdc-checkbox mdc-data-table__row-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
                                            <input type="checkbox"  class="mdc-checkbox__native-control" id="wcmvp-downloadable" aria-labelledby="u0">
                                            <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                    <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                            </div>
                                            <div class="mdc-checkbox__ripple"></div>
                                        </div>
                                        <span>' . esc_html__("Download", "wc-multi-vendor-platform-lite") . '</span>
                                    </div>
                                    <div class="wcmvp-virtual-type">
                                        <div class="mdc-checkbox mdc-data-table__row-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
                                            <input type="checkbox"  class="mdc-checkbox__native-control" id="wcmvp-virtual" aria-labelledby="u0">
                                            <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                    <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                            </div>
                                            <div class="mdc-checkbox__ripple"></div>
                                        </div>
                                        <span>' . esc_html__("Virtual", "wc-multi-vendor-platform-lite") . '</span>  
                                    </div>
                                </div>
                            </div>
                                    <span>
                                       ' . esc_html__("Short_Description", "wc-multi-vendor-platform-lite") . '
                                    </span>
                                    ' .  $wcmvp_wp_editor . '
                                </div>';
    $wcmvp_prod_array[] = '<div class="wcmvp_inventory_box ">
                                <div class="wcmvp_inventory">
                                    <h3 class="wcmvp-sub-heading">
                                        ' . esc_html__("Invenory", "wc-multi-vendor-platform-lite") . '
                                    </h3>
                                    <label class="wcmvp_small_heading">
                                        <?php esc_html__("Manage inventory for this product.", "wc-multi-vendor-platform-lite") ?>
                                    </label>
                                </div>';
    $wcmvp_prod_array[] = '<div class="wcmvp_SKU">
                                        <label>
                                            ' . esc_html__("SKU", "wc-multi-vendor-platform-lite") . '
                                            <span>
                                                (' . esc_html__("Stock Keeping Unit", "wc-multi-vendor-platform-lite") . ')
                                            </span>
                                        </label>
                                        <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
                                        <input type="text" name="product_name" class="mdc-text-field__input" id="wcmvp_sku_field">
                                        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                            <div class="mdc-notched-outline__leading"></div>
                                            <div class="mdc-notched-outline__notch">
                                            <span class="mdc-floating-label"> ' . esc_attr__("sku", "wc-multi-vendor-platform-lite") . '</span>
                                            </div>
                                            <div class="mdc-notched-outline__trailing"></div>
                                        </div>
                                    </label>
                                    </div>';
    $wcmvp_prod_array[] = '<div class="wcmvp_stock_status">
                                        <label>
                                            ' . esc_html__("Stock status", "wc-multi-vendor-platform-lite") . '
                                        </label>
                                        <select id="wcmvp_stock_status">
                                            <option value="' . esc_attr__("instock", "wc-multi-vendor-platform-lite") . '" selected="selected">
                                                ' . esc_html__("In Stock", "wc-multi-vendor-platform-lite") . '
                                            </option>
                                            <option value="' . esc_attr__("outstock", "wc-multi-vendor-platform-lite") . '">
                                                ' . esc_html__("Out of Stock", "wc-multi-vendor-platform-lite") . '
                                            </option>
                                            <option value="' . esc_attr__("backorder", "wc-multi-vendor-platform-lite") . '">
                                                ' . esc_html__("Back order", "wc-multi-vendor-platform-lite") . '
                                            </option>
                                        </select>
                                    </div>';
    $wcmvp_prod_array[] = '<span class="wcmvp_stock">
                                <div class="wcmvp-virtual-type">
                                    <div class="mdc-checkbox mdc-data-table__row-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
                                        <input type="checkbox"  class="mdc-checkbox__native-control" id="wcmvp_stock_manage" aria-labelledby="u0">
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <span> ' . esc_html__("Enable product stock management", "wc-multi-vendor-platform-lite") . '</span>
                                </div>
                            </span>
                            <span class="wcmvp_stock">
                                <div class="wcmvp-virtual-type">
                                    <div class="mdc-checkbox mdc-data-table__row-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
                                        <input type="checkbox"  class="mdc-checkbox__native-control" id="wcmvp_single_product_permission" aria-labelledby="u0">
                                        <div class="mdc-checkbox__background">
                                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                            </svg>
                                            <div class="mdc-checkbox__mixedmark"></div>
                                        </div>
                                        <div class="mdc-checkbox__ripple"></div>
                                    </div>
                                    <span>' . esc_html__("Allow only one quantity of this product to be bought in a single order", "wc-multi-vendor-platform-lite") . '</span>
                                </div>
                            </span>      
                        </div>';
    $wcmvp_prod_array[] = '<div class="wcmvp_downloadable_box ">
                                    <h3 class="wcmvp-sub-heading">' . esc_html__("Downloadable Options", "wc-multi-vendor-platform-lite")  . '</h3>
                                    <div class="wcmvp-downlodable_prod">
                                        <div id="wcmvp_prod_download_file">
                                        </div>
                                        <div class="wcmvp_downloadable_prod">
                                         <input name="wcmvp_upload[]" type="button" class="wcmvp-prod_upload_file button mdc-button mdc-button--raised mdc-button--upgraded" value="' . esc_html__("Add file", "wc-multi-vendor-platform-lite") . '" />' . esc_html__("More than one file can be attached", "wc-multi-vendor-platform-lite") . '
                                    </div>
                                    <div class="wcmvp_download_limit_box">
                                        <label class="wcmvp_down_lim_label" for="wcmvp_download_limit">' . esc_html__("Download limit", "wc-multi-vendor-platform-lite") . '</label>
                                        <span>
                                            <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
                                                <input type="text" class="mdc-text-field__input wcmvp_prod_download_limit"  name="wcmvp_download_limit">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label">' . esc_attr__("download limit", "wc-multi-vendor-platform-lite") . '</span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
                                        </span>
                                    </div>
                                    <div class="wcmvp_download_expiry_box">
                                       <label class="wcmvp_down_exp_label" for="wcmvp_download_expiry">' . esc_html__("Download expiry", "wc-multi-vendor-platform-lite") . '</label>
                                       <span>
                                            <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
                                                <input type="text" class="mdc-text-field__input wcmvp_prod_download_expiry"  name="wcmvp_download_expiry">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label">' . esc_attr__("download expiry", "wc-multi-vendor-platform-lite") . '</span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
                                            <p> ' . esc_html__("Enter the number of days before a download link expires, or leave blank.", "wc-multi-vendor-platform-lite") . ' </p>
                                        </span>
                                       
                                    </div>
                               </div>
                           </div>';
    $wcmvp_prod_array[] = '
                        <div class="wcmvp_other_options_fields ">
                        <h3 class="wcmvp-sub-heading">
                        ' . esc_html__("Other Options", "wc-multi-vendor-platform-lite") . '
                    </h3>
                    <label class="wcmvp_small_headings">
                        ' . esc_html__("Set your extra product options", "wc-multi-vendor-platform-lite") . '
                    </label>
                            <div class="wcmvp_product_status">
                                <label>
                                    ' . esc_html__("Product Status", "wc-multi-vendor-platform-lite") . '
                                </label>';
    $wcmvp_prod_array[] =   '<p class="wcmvp_pending">
                                    ' . esc_html__("Pending Review", "wc-multi-vendor-platform-lite") . '
                                </p>';
    $wcmvp_prod_array[] =      '</div>
                            <div class="wcmvp_stock_status">
                                <label>
                                    ' . esc_html__("Visibility", "wc-multi-vendor-platform-lite") . '
                                </label>
                                <select id="wcmvp_visibility">
                                    <option value="' . esc_attr__("Visible", "wc-multi-vendor-platform-lite") . '" selected="selected">
                                        ' . esc_html__("Visible", "wc-multi-vendor-platform-lite") . '
                                    </option>
                                    <option value="' . esc_attr__("Catalog", "wc-multi-vendor-platform-lite") . '">
                                        ' . esc_html__("Catalog", "wc-multi-vendor-platform-lite") . '
                                    </option>
                                    <option value="' . esc_attr__("Search", "wc-multi-vendor-platform-lite") . '">
                                        ' . esc_html__("Search", "wc-multi-vendor-platform-lite") . '
                                    </option>
                                    <option value="' . esc_attr__("Hidden", "wc-multi-vendor-platform-lite") . '">
                                        ' . esc_html__("Hidden", "wc-multi-vendor-platform-lite") . '
                                    </option>
                                </select>
                            </div>';
    $wcmvp_prod_array[] = '<div class="wcmvp_purchase_note">
                                <label>
                                    ' . esc_html__("Purchase Note", "wc-multi-vendor-platform-lite") . '
                                </label>
                                <label class="mdc-text-field mdc-text-field--textarea mdc-text-field--no-label wcmvp-w-100">
									<textarea class="abcdef mdc-text-field__input" aria-label="Label" id="wcmvp_purchase_note_field"></textarea>
									<span class="mdc-notched-outline mdc-notched-outline--no-label">
										<span class="mdc-notched-outline__leading"></span>
										<span class="mdc-notched-outline__trailing"></span>
									</span>
								</label>
                            </div>
                            <div class="wcmvp_product_review">
                                <span class="wcmvp_product_review_field">
                                    <div class="wcmvp-virtual-type">
                                        <div class="mdc-checkbox mdc-data-table__row-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
                                            <input type="checkbox" name="product_reviews"  class="mdc-checkbox__native-control" id="wcmvp_product_reviews" aria-labelledby="u0">
                                            <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                    <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                            </div>
                                            <div class="mdc-checkbox__ripple"></div>
                                        </div>
                                        <span>' . esc_html__("Enable product reviews", "wc-multi-vendor-platform-lite") . '</span>
                                    </div>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="button" name="submit" id="wcmvp_product_add" class="mdc-button mdc-button--raised mdc-ripple-upgraded" value="Submit">
            </div>';

    $wcmvp_prod_array = apply_filters("wcmvp_product_html_array", $wcmvp_prod_array);
    if ($wcmvp_modal_permission['wcmvp_disable_product_popup'] != 1) {
?>
    <div class="wcmvp_modal" id="wcmvp_prdct_modal">
        <div class="wcmvp-modal-dialog">
            <div class="wcmvp-modal-content">
                <div class="wcmvp-modal-header">
                    <h4 class="wcmvp-modal-title">
                        <?php esc_html_e("Add New Product", "wc-multi-vendor-platform-lite") ?>
                    </h4>
                    <a class=" wcmvp_close_product_modal wcmvp-modal-close mdc-icon-button material-icons mdc-ripple-upgraded wcmvp-modal-close mdc-ripple-upgraded--unbounded mdc-icon-button--on" aria-pressed="true">highlight_off</a>
                </div>

                <div class="wcmvp-modal-body">
                    <?php
                    if (isset($wcmvp_prod_array) && !empty($wcmvp_prod_array)) {
                        foreach ($wcmvp_prod_array as $key => $value) {
                            echo $value;    // This variable holds html
                        }
                    }
                    ?>
                </div>
            </div>

        </div>
    </div>
    </div>
<?php
} else { ?>

    <!--====================================== body for no modal =========================================== -->


    <div class="wcmvp_no_modal_add_prod ">
        <div class="wcmvp_no_modal_head">
            <h4>
                <?php esc_html_e("Add New Product", "wc-multi-vendor-platform-lite") ?>
            </h4>
        </div>
        <div class="wcmvp_no_modal_body">
            <?php
            if (isset($wcmvp_prod_array) && !empty($wcmvp_prod_array)) {
                foreach ($wcmvp_prod_array as $key => $value) {
                    echo $value;    // This variable holds html
                }
            }
            ?>
        </div>
    </div>
    <div class="wcmvp_go_back"><button class="wcmvp_back_prod mdc-button mdc-button--raised mdc-button--upgraded"><?php esc_html_e("Back","wc-multi-vendor-platform-lite") ?></button></div>
    </div>
<?php
}
?>