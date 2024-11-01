<?php

// This file contains the code for product table

if (check_ajax_referer("wcmvp_multivendor_platform_check_nonce", 'wcmvp_nonce')) {
    if (isset($_POST) && !empty($_POST)) {
        global $wpdb;
        $wcmvp_table = $wpdb->prefix . 'posts';
        $wcmvp_primaryKey = 'ID';
        $wcmvp_author_ID = get_current_user_id();
        if (isset($_POST['cond']) && !empty($_POST['cond'])) {
            $wcmvp_cond = sanitize_text_field($_POST['cond']);
        }
        if (isset($_POST["wcmvp_date"]) && $_POST["wcmvp_date"] != "-None-") {
            $wcmvp_time    = strtotime(sanitize_text_field($_POST["wcmvp_date"]));
            $wcmvp_first_date = date('Y-m-d', $wcmvp_time);
            $wcmvp_last_date  = date('Y-m-t', $wcmvp_time);
        }
        if (isset($_POST["wcmvp_cat_filter"]) && $_POST["wcmvp_cat_filter"] != "Uncategorized") {
            $wcmvp_cat  =   sanitize_text_field($_POST["wcmvp_cat_filter"]);
        }
        $columns = array(
            array('db' => 'ID', 'dt' => 0, 'field' => 'ID'),
            array('db' => '_thumbnail_id', 'dt' => 1, 'field' => '_thumbnail_id'),
            array('db' => 'post_title',  'dt' => 2, 'field' => 'post_title'),
            array('db' => 'post_status',   'dt' => 3, 'field' => 'post_status'),
            array('db' => '_sku',     'dt' => 4, 'field' => '_sku'),
            array('db' => '_stock_status',     'dt' => 5, 'field' => '_stock_status'),
            array('db' => '_sale_price',     'dt' => 6, 'field' => '_sale_price'),
            array('db' => '_regular_price',     'dt' => 7, 'field' => '_regular_price'),
            array('db' => 'post_excerpt',     'dt' => 8, 'field' => 'post_excerpt'),
            array('db' => 'wcmvp_product_view_count',     'dt' => 9, 'field' => 'wcmvp_product_view_count'),
            array('db' => 'post_date',     'dt' => 10, 'field' => 'post_date'),
        );
        $sql_details = array(
            'user' => DB_USER,
            'pass' => DB_PASSWORD,
            'db'   => DB_NAME,
            'host' => DB_HOST
        );
        $where = "`post_author`=" . $wcmvp_author_ID;
        $equals = "`post_type`='product'";
        $where .= ' AND ' . $equals;
        if (isset($wcmvp_cond)) {
            if ($wcmvp_cond == "all_prod") {
                $equal1 = "`post_status`='publish'";
                $equal2 = "`post_status`='pending'";
                $equal3 = "`post_status`='draft'";
                $equal4 = "`post_status`='private'";
                $where .= ' AND (' . $equal1 . ' OR ' . $equal2 . ' OR ' . $equal3 . ' OR ' . $equal4 . ')';
            } elseif ($wcmvp_cond == "pending_prod") {
                $pending = "`post_status`='pending'";
                $where .= ' AND ' . $pending;
            } elseif ($wcmvp_cond == "published_prod") {
                $publish = "`post_status`='publish'";
                $where .= ' AND ' . $publish;
            } elseif ($wcmvp_cond == "trash_prod") {
                $pending = "`post_status`='trash'";
                $where .= ' AND ' . $pending;
            }
        }
        if (isset($wcmvp_cat) && !empty($wcmvp_cat)) {
            $cat_condition = "wp_terms.`term_id` = '" . $wcmvp_cat . "'";
            $where .= ' AND (' . $cat_condition . ')';
        }
        if ((isset($wcmvp_first_date) && !empty($wcmvp_first_date)) && (isset($wcmvp_last_date) && !empty($wcmvp_last_date))) {
            $wcmvp_date = "`post_date`>'" . $wcmvp_first_date . "' AND `post_date`<'" . $wcmvp_last_date . "'";
            $where .= ' AND (' . $wcmvp_date . ')';
        }
        $wcmvp_posts = $wpdb->prefix . "posts";
        $wcmvp_postmeta = $wpdb->prefix . "postmeta";
        if (isset($_POST["wcmvp_filter"]) && $_POST["wcmvp_filter"]) {
            $join = "FROM " . $wpdb->prefix . "posts" . " LEFT JOIN (SELECT post_id,
        MAX(CASE WHEN meta_key = '_thumbnail_id' THEN meta_value END) _thumbnail_id,
        MAX(CASE WHEN meta_key = '_sku' THEN meta_value END) _sku,
        MAX(CASE WHEN meta_key = '_stock_status' THEN meta_value END) _stock_status,
        MAX(CASE WHEN meta_key = '_regular_price' THEN meta_value END) _regular_price,
        MAX(CASE WHEN meta_key = 'wcmvp_product_view_count' THEN meta_value END) wcmvp_product_view_count,
        MAX(CASE WHEN meta_key = '_sale_price' THEN meta_value END) _sale_price
        FROM " . $wpdb->prefix . "postmeta" . " GROUP BY post_id) wcmvp_selected_table ON " . $wpdb->prefix . "posts" . ".`ID`= wcmvp_selected_table.`post_id` JOIN " . $wpdb->prefix . "term_relationships" . " ON " . $wpdb->prefix . "posts" . ".`ID` = " . $wpdb->prefix . "term_relationships" . ".`object_id` JOIN (SELECT term_id,
        MAX(CASE WHEN taxonomy = 'product_cat' THEN term_id END) wcmvp_prod_cat,
        MAX(CASE WHEN taxonomy = 'product_type' THEN term_id END) wcmvp_prod_type
        FROM " . $wpdb->prefix . "term_taxonomy" . " GROUP BY term_id) wcmvp_prod_taxonomy ON " . $wpdb->prefix . "term_relationships" . ".`term_taxonomy_id` = wcmvp_prod_taxonomy.`term_id` JOIN " . $wpdb->prefix . "terms" . " ON wcmvp_prod_taxonomy.`term_id` = " . $wpdb->prefix . "terms" . ".`term_id` ";
        } else {
            $join = "FROM `$wcmvp_posts` LEFT JOIN (SELECT post_id, 
            MAX(CASE WHEN meta_key = '_sku' THEN meta_value END) _sku,
            MAX(CASE WHEN meta_key = '_stock_status' THEN meta_value END) _stock_status,
            MAX(CASE WHEN meta_key = '_regular_price' THEN meta_value END) _regular_price,
            MAX(CASE WHEN meta_key = '_sale_price' THEN meta_value END) _sale_price,
            MAX(CASE WHEN meta_key = 'wcmvp_product_view_count' THEN meta_value END) wcmvp_product_view_count,
            MAX(CASE WHEN meta_key = '_thumbnail_id' THEN meta_value END) _thumbnail_id
            FROM `$wcmvp_postmeta`
            GROUP BY `post_id`) wcmvpprod ON " . $wcmvp_posts . ".ID = wcmvpprod.post_id";
        }
        include_once(WCMVP_ADMIN_PARTIAL . '/ssp/ssp.customized.class.php');
        if (!empty($wcmvp_cond)) {
            $wcmvp_all_ssp  =  SSP::simple($_POST, $sql_details, $wcmvp_table, $wcmvp_primaryKey, $columns, $join, $where);
            $i = 0;
            if (!empty($wcmvp_all_ssp['data'])) {
                foreach ($wcmvp_all_ssp['data'] as $wcmvp_data) {
                    $attach_id    =        $wcmvp_data[1];
                    $wcmvp_checkbox = "<div class='mdc-checkbox mdc-data-table__row-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded'>
                    <input type='checkbox' name='wcmvp_bulk_check' class='mdc-checkbox__native-control wcmvp_table_bulk_check' data-id='" . $wcmvp_data[0] . "' aria-labelledby='u0'>
                    <div class='mdc-checkbox__background'>
                    <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                        <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                    </svg><div class='mdc-checkbox__mixedmark'></div></div><div class='mdc-checkbox__ripple'></div></div>";

                    $wcmvp_product_title    =  $wcmvp_data[2] . "<div class='wcmvp_action'><div class='wcmvp_delete'><div class='wcmvp_tooltip wcmvp_delete_button' data-id='" . $wcmvp_data[0] . "'><span class='material-icons'>delete</span>
                  <span class='wcmvp_tooltiptext wcmvp_prod_tool'>" . esc_html__('Delete', 'wc-multi-vendor-platform-lite') . "</span>
                </div></div><div class='wcmvp_edit'><div class='wcmvp_tooltip wcmvp_edit_button' data-id='" . $wcmvp_data[0] . "'><span class='material-icons'>edit</span><span class='wcmvp_tooltiptext wcmvp_prod_tool'>" . esc_html__('Edit', 'wc-multi-vendor-platform-lite') . "</span>
              </div></div>";
                    $wcmvp_product_title = apply_filters("wcmvp_product_title", $wcmvp_product_title, $wcmvp_data[0], $wcmvp_data[2]);
                    $wcmvp_product  =   wc_get_product($wcmvp_data[0]);
                    $wcmvp_price = $wcmvp_product->get_price();
                    $sale_price    =    $wcmvp_product->get_sale_price();
                    $reg_price    =    $wcmvp_product->get_regular_price();
                    if ((float) $wcmvp_price == (float) $sale_price) {
                        $sale_price =  $wcmvp_price;
                    } else if ((float) $wcmvp_price == (float) $reg_price) {
                        $sale_price = 0;
                    }
                    $reg_date    =    $wcmvp_data[10];
                    $wcmvp_views_count    =    $wcmvp_data[9];
                    if (empty($wcmvp_views_count)) {
                        $wcmvp_views_count = 0;
                    } else {
                        $wcmvp_views_count  =  intval($wcmvp_views_count);
                    }
                    $wcmvp_date    =    date('d-m-Y', strtotime($reg_date));
                    if (!empty($sale_price)) {
                        $main_price    =        wc_price($sale_price);

                        if (!empty($reg_price)) {
                            $main_price    =    "<del>" . wc_price($reg_price) . "</del>" . wc_price($sale_price);
                        }
                    } elseif (!empty($reg_price)) {
                        $main_price    =    wc_price($reg_price);
                    } else {
                        $main_price    =    "-";
                    }
                    $wcmvp_saving_commission = $this->wcmvp_commission(get_current_user_id(), $wcmvp_price);
                    $wcmvp_saving    =    (float) $wcmvp_price - (float) $wcmvp_saving_commission[0];
                    $wcmvp_downloadable    =        get_post_meta($wcmvp_data[0], '_downloadable', TRUE);
                    $wcmvp_virtual    =    get_post_meta($wcmvp_data[0], '_virtual', TRUE);
                    if ($wcmvp_downloadable    ==    "yes") {
                        $wcmvp_type        =        "downloadable";
                    } elseif ($wcmvp_virtual    ==    "yes") {
                        $wcmvp_type    =    "virtual";
                    } else {
                        $wcmvp_product =     wc_get_product($wcmvp_data[0]);
                        $wcmvp_type     =    $wcmvp_product->get_type();
                    }
                    if ($wcmvp_data[3] == "publish") {
                        $wcmvp_status = "<span class='wcmvp_published'>" . $wcmvp_data[3] . "</span>";
                    } elseif ($wcmvp_data[3] == "pending") {
                        $wcmvp_status = "<span class='wcmvp_pending'>" . $wcmvp_data[3] . "</span>";
                    } elseif ($wcmvp_data[3] == "trash") {
                        $wcmvp_status = "<span class='wcmvp_product_trash'>" . $wcmvp_data[3] . "</span>";
                    } elseif ($wcmvp_data[3] == "draft") {
                        $wcmvp_status = "<span class='wcmvp_draft'>" . $wcmvp_data[3] . "</span>";
                    }
                    $image    =    wp_get_attachment_image(intval($attach_id), array('100', '100'), "", array("class" => "wcmvp_product_img"));
                    $wcmvp_all_ssp['data'][$i][0]    =    $wcmvp_checkbox;
                    $wcmvp_all_ssp['data'][$i][1]    =    $image;
                    $wcmvp_all_ssp['data'][$i][2]    =    $wcmvp_product_title;
                    $wcmvp_all_ssp['data'][$i][3]    =    $wcmvp_status;
                    $wcmvp_all_ssp['data'][$i][6]    =    $main_price;
                    $wcmvp_all_ssp['data'][$i][7]    =    wc_price(round($wcmvp_saving, 2));
                    $wcmvp_all_ssp['data'][$i][8]    =    $wcmvp_type;
                    $wcmvp_all_ssp['data'][$i][9]    =    $wcmvp_views_count;
                    $wcmvp_all_ssp['data'][$i][10]    =    $wcmvp_date;
                    $i++;
                }
            }
            echo json_encode($wcmvp_all_ssp);
        }
    }
}
wp_die();
