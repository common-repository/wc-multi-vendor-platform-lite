<!-- This file contains the html for the product section -->

<div class="wrap wcmvp_product_container card">
    <?php $wcmvp_meta = get_user_meta(get_current_user_id(), 'wcmvp_counting_array', true);
    if (is_array($wcmvp_meta)) {
        $wcmvp_order_meta = $wcmvp_meta['wcmvp_prod_count_array'];
        $wcmvp_all = $wcmvp_order_meta['wcmvp_prod_all_count'];
        $wcmvp_published = $wcmvp_order_meta['wcmvp_prod_publish_count'];
        $wcmvp_pending = $wcmvp_order_meta['wcmvp_prod_pending_count'];
        $wcmvp_trash = $wcmvp_order_meta['wcmvp_prod_trash_count'];
    } else {
        $wcmvp_order_meta = '';
        $wcmvp_all = 0;
        $wcmvp_published = 0;
        $wcmvp_pending = 0;
        $wcmvp_trash = 0;
    }
    ?>
    <div class="wcmvp-top">
        <div class="wcmvp-head">
            <div class="mdc-tab-bar wcmvp-tab-bar" role="tablist">
                <div class="mdc-tab-scroller">
                    <div class="mdc-tab-scroller__scroll-area mdc-tab-scroller__scroll-area--scroll">
                        <div class="mdc-tab-scroller__scroll-content">
                            <a class="mdc-tab mdc-tab--stacked mdc-tab--active wcmvp_listing_button wcmvp_active_button" role="tab" aria-selected="true" tabindex="0" id="wcmvp_all_product_table" href="#product">
                                <span class="mdc-tab__content">
                                    <span class="mdc-tab__icon material-icons" aria-hidden="true"><?php echo esc_html('reorder'); ?></span>
                                    <span class="mdc-tab__text-label wcmvp_all_prod"><?php esc_html_e("All", "wc-multi-vendor-platform-lite");
                                    echo "(" ;
                                    esc_html_e($wcmvp_all,"wc-multi-vendor-platform-lite");  
                                    echo ")"; 
                                    ?></span>
                                    <span class="mdc-tab-indicator mdc-tab-indicator--active">
                                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                    </span>
                                </span>
                                <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                            </a>
                            <a class="mdc-tab mdc-tab--stacked wcmvp_listing_button" role="tab" aria-selected="false" tabindex="-1" id="wcmvp_published_product_table" href="#product?published_product">
                                <span class="mdc-tab__content">
                                    <span class="mdc-tab__icon material-icons" aria-hidden="true"><?php echo esc_html('published_with_changes'); ?></span>
                                    <span class="mdc-tab__text-label wcmvp_publish_prod"><?php esc_html_e("Online", "wc-multi-vendor-platform-lite");
                                    echo "(" ;
                                    esc_html_e($wcmvp_published,"wc-multi-vendor-platform-lite");  
                                    echo ")"; ?></span>
                                    <span class="mdc-tab-indicator">
                                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                    </span>
                                </span>
                                <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                            </a>
                            <?php
                        if($wcmvp_pending!=0) { ?>
                            <a class="mdc-tab mdc-tab--stacked wcmvp_listing_button" role="tab" aria-selected="false" tabindex="-1" id="wcmvp_pending_product_table" href="#product?pending_product">
                                <span class="mdc-tab__content">
                                    <span class="mdc-tab__icon material-icons" aria-hidden="true"><?php echo esc_html('pending_actions'); ?></span>
                                    <span class="mdc-tab__text-label wcmvp_pendin_prod"><?php esc_html_e("Pending", "wc-multi-vendor-platform-lite");
                                    echo "(" ;
                                    esc_html_e($wcmvp_pending,"wc-multi-vendor-platform-lite");  
                                    echo ")"; ?></span>
                                    <span class="mdc-tab-indicator">
                                        <span class="mdc-tab-indicator__content mdc-tab-indicator__content--underline"></span>
                                    </span>
                                </span>
                                <span class="mdc-tab__ripple mdc-ripple-upgraded"></span>
                            </a>
                        <?php } ?>

                        <?php
                        if($wcmvp_trash!=0){ ?>
                            <a class="mdc-tab mdc-tab--stacked wcmvp_listing_button" role="tab" aria-selected="false" tabindex="-1" id="wcmvp_trash_product_table" href="#product?trashed_product">
                                <span class="mdc-tab__content">
                                    <span class="mdc-tab__icon material-icons" aria-hidden="true">delete</span>
                                    <span class="mdc-tab__text-label wcmvp_trash_prod"><?php esc_html_e("Trash", "wc-multi-vendor-platform-lite");
                                    echo "(" ;
                                    esc_html_e($wcmvp_trash,"wc-multi-vendor-platform-lite") ;
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

        <?php
        $wcmvp_modal_permission = get_option('wcmvp_selling_page');
        if (is_array($wcmvp_modal_permission)) {
            if ($wcmvp_modal_permission['wcmvp_disable_product_popup'] != 1) {
                $wcmvp_class = "";
            } else {
                $wcmvp_class =  "wcmvp_popup";
            }
        } else {
            $wcmvp_class = "";
        }
        ?>
        <div id="wcmvp-button" class="wcmvp-icon32 <?php esc_attr_e($wcmvp_class, 'wc-multi-vendor-platform-lite')  ?>">
            <a class="mdc-button mdc-button--raised mdc-button--upgraded"   id="wcmvp-add-product" href="#product"><?php esc_html_e("Add New Product", "wc-multi-vendor-platform-lite") ?></a>
        </div>
        <?php do_action("wcmvp_after_add_prod_button"); ?>
    </div>
    <div class="wcmvp-body">
        <?php include_once  WCMVP_PUBLIC_PARTIAL . "wcmvp-Vendor-product-add.php"; ?>
        <div class="wcmvp-table">
            <div class="wcmvp_bulk_action_and_filter">
                <div class="wcmvp_bulk_action_box"><select id="wcmvp_select_box">
                        <option value=""><?php esc_html_e("Bulk Action", "wc-multi-vendor-platform-lite")  ?></option>
                        <option value="Delete_multiple"><?php esc_html_e("Delete", "wc-multi-vendor-platform-lite")  ?></option>
                        <option value="Restore_multiple" class="wcmvp_restore_op"><?php esc_html_e("Restore", "wc-multi-vendor-platform-lite")  ?></option>
                    </select>
                    <button class="wcmvp_action_button mdc-button mdc-button--raised wcmvp-footer-btn" id="wcmvp_bulk_action" name="Bulk_action"><?php esc_html_e("Select", "wc-multi-vendor-platform-lite")  ?></button>
                </div>
                <div class="wcmvp_filter_box">
                    <select id='wcmvp_archieve_filter'>
                        <option value=""><?php esc_html_e("-None-", "wc-multi-vendor-platform-lite") ?></option>
                        <?php echo wp_get_archives(array(
                            'type'            => 'monthly',
                            'format'          => 'html',
                            'before'          => '<option>',
                            'after'           => '</option>',
                            'post_type'       => 'product',
                        )); ?>
                    </select>
                    <?php
                    $wcmvp_cat_args = array(
                        "id"        => "wcmvp_filter_cat",
                        "name"      => "category",
                        "class"     => "wcmvp_productrs_filter",
                        "option_none_value" => "Uncategorized",
                        "show_option_none" => "Select category",
                        "taxonomy"     => "product_cat",
                        "orderby"      => "name",
                        "show_count"   => 0,
                        "pad_counts"   => 0,
                        "hierarchical" => 1,
                        "title_li"     => '',
                        "hide_empty"   => 1,
                        "echo"   => 1
                    );
                    wp_dropdown_categories($wcmvp_cat_args);
                    ?>
                    <button type="button" class="mdc-button mdc-button--raised wcmvp-footer-btn" id="wcmvp_product_filter">
                        <?php esc_html_e("Filter", "wc-multi-vendor-platform-lite") ?>
                    </button>

                </div>
            </div>
            <?php do_action("wcmvp_before_product_table"); ?>
            <table id="table_id" class="display mdl-data-table">
                <thead>
                    <tr>
                        <th class="mdc-data-table__cell mdc-data-table__cell--checkbox sorting_disabled wcmvp_datatable_checkbox" tabindex="0" rowspan="1" colspan="1">
                            <div class="mdc-checkbox mdc-data-table__row-checkbox">
                                <input type="checkbox" name='wcmvp_bulk_check' class="mdc-checkbox__native-control wcmvp_table_bulk_check_class" id="wcmvp_parent_table_bulk_check" aria-labelledby="u0">
                                <div class="mdc-checkbox__background">
                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                    </svg>
                                    <div class="mdc-checkbox__mixedmark"></div>
                                </div>
                                <div class="mdc-checkbox__ripple"></div>
                            </div>
                        </th>
                        <th><?php esc_html_e("Image", "wc-multi-vendor-platform-lite")  ?></th>
                        <th><?php esc_html_e("Name", "wc-multi-vendor-platform-lite")  ?></th>
                        <th><?php esc_html_e("Status", "wc-multi-vendor-platform-lite")  ?></th>
                        <th><?php esc_html_e("SKU", "wc-multi-vendor-platform-lite")  ?></th>
                        <th><?php esc_html_e("Stock", "wc-multi-vendor-platform-lite")  ?></th>
                        <th><?php esc_html_e("Price", "wc-multi-vendor-platform-lite")  ?></th>
                        <th><?php esc_html_e("Earning", "wc-multi-vendor-platform-lite")  ?></th>
                        <th><?php esc_html_e("Type", "wc-multi-vendor-platform-lite")  ?></th>
                        <th><?php esc_html_e("Views", "wc-multi-vendor-platform-lite")  ?></th>
                        <th><?php esc_html_e("Date", "wc-multi-vendor-platform-lite")  ?></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>