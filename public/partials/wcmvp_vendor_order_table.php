<?php
// This file contains the code for order table working

global $wpdb;
$wcmvp_table = $wpdb->prefix . 'posts';
$wcmvp_primaryKey = 'ID';
if (isset($_POST['cond'])) {
    $wcmvp_order_table_cond = sanitize_text_field($_POST['cond']);
}
if (isset($_POST['wcmvp_date'])) {
    $wcmvp_dates = sanitize_text_field($_POST['wcmvp_date']);
}
if (isset($_POST['wcmvp_customer'])) {
    $wcmvp_customer =  sanitize_text_field($_POST['wcmvp_customer']);
}
$wcmvp_author_ID =  get_current_user_id();
$columns = array(
    array('db' => 'ID', 'dt' => 0, 'field' => 'ID'),
    array('db' => 'ID', 'dt' => 1, 'field' => 'ID'),
    array('db' => '_order_total',   'dt' => 2, 'field' => '_order_total'),
    array('db' => 'post_status',   'dt' => 3, 'field' => 'post_status'),
    array('db' => '_customer_user',     'dt' => 4, 'field' => '_customer_user'),
    array('db' => 'post_date',     'dt' => 5, 'field' => 'post_date'),
    array('db' => 'ID',     'dt' => 6, 'field' => 'ID'),
);
$sql_details = array(
    'user' => DB_USER,
    'pass' => DB_PASSWORD,
    'db'   => DB_NAME,
    'host' => DB_HOST
);
$where = "`post_type`='shop_order'";
$equals = "`wcmvp_order_vendor`=" . $wcmvp_author_ID;
$where .= ' AND ' . $equals;
if (isset($wcmvp_order_table_cond)) {
    if ($wcmvp_order_table_cond == "complete_table") {
        $equals2 = "`post_status`='wc-completed'";
        $where .= ' AND ' . $equals2;
    } elseif ($wcmvp_order_table_cond == "processing_table") {
        $equals2 = "`post_status`='wc-processing'";
        $where .= ' AND ' . $equals2;
    } elseif ($wcmvp_order_table_cond == "On_hold_table") {
        $equals2 = "`post_status`='wc-on-hold'";
        $where .= ' AND ' . $equals2;
    } elseif ($wcmvp_order_table_cond == "pending_table") {
        $equals2 = "`post_status`='wc-pending'";
        $where .= ' AND ' . $equals2;
    } elseif ($wcmvp_order_table_cond == "cancel_table") {
        $equals2 = "`post_status`='wc-cancelled'";
        $where .= ' AND ' . $equals2;
    } elseif ($wcmvp_order_table_cond == "refunded_table") {
        $equals2 = "`post_status`='wc-refunded'";
        $where .= ' AND ' . $equals2;
    } elseif ($wcmvp_order_table_cond == "failed_table") {
        $equals2 = "`post_status`='wc-failed'";
        $where .= ' AND ' . $equals2;
    }
}

if (isset($wcmvp_dates) && !empty($wcmvp_dates)) {
    $equals2 = "DATE(post_date) = '" . $wcmvp_dates . "'";
    $where .= ' AND ' . $equals2;
}

if (isset($wcmvp_customer) && !empty($wcmvp_customer)) {
    $equals2 = "`_customer_user`=" . $wcmvp_customer;
    $where .= ' AND ' . $equals2;
}

$wcmvp_posts = $wpdb->prefix . "posts";
$wcmvp_postmeta = $wpdb->prefix . "postmeta";
$join = "FROM `$wcmvp_posts` LEFT JOIN (SELECT post_id, 
MAX(CASE WHEN meta_key = '_customer_user' THEN meta_value END) _customer_user,
MAX(CASE WHEN meta_key = '_order_total' THEN meta_value END) _order_total,
MAX(CASE WHEN meta_key = 'wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor
FROM `$wcmvp_postmeta`
GROUP BY `post_id`) wcmvpprod ON " . $wcmvp_posts . ".ID = wcmvpprod.post_id";

include_once(WCMVP_ADMIN_PARTIAL . '/ssp/ssp.customized.class.php');

if (!empty($wcmvp_order_table_cond)) {
    $wcmvp_order_all_ssp   =    SSP::simple($_POST, $sql_details, $wcmvp_table, $wcmvp_primaryKey, $columns, $join, $where);
    $i = 0;

    $wcmvp_status_permission = get_option('wcmvp_selling_page');
    if (!empty($wcmvp_status_permission) && is_array($wcmvp_status_permission)) {
        $wcmvp_permission = $wcmvp_status_permission['wcmvp_order_status_change'];
    } else {
        $wcmvp_permission = '';
    }

    if (!empty($wcmvp_order_all_ssp['data'])) {
        foreach ($wcmvp_order_all_ssp['data'] as $wcmvp_data) {
            $wcmvp_check  =  "<div class='mdc-checkbox mdc-data-table__row-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded'>
                <input type='checkbox' class='mdc-checkbox__native-control wcmvp_order_bulk_check' data-id='" . $wcmvp_data[0] . "' aria-labelledby='u0'>
                <div class='mdc-checkbox__background'>
                <svg class='mdc-checkbox__checkmark' viewBox='0 0 24 24'>
                    <path class='mdc-checkbox__checkmark-path' fill='none' d='M1.73,12.91 8.1,19.28 22.79,4.59'></path>
                </svg>
                <div class='mdc-checkbox__mixedmark'></div>
                </div>
                <div class='mdc-checkbox__ripple'></div>
             </div>";
            $wcmvp_order  = $wcmvp_data[1];
            $wcmvp_order_total  =  wc_price($wcmvp_data[2]);

            if ($wcmvp_data[3] == "trash") {
                $wcmvp_substr = $wcmvp_data[3];
            } else {
                $wcmvp_substr = substr($wcmvp_data[3], 3);
            }
            if ($wcmvp_substr == "completed") {
                $wcmvp_order_status  =  "<span class='wcmvp_order_completed'>" . $wcmvp_substr . "</span>";
            } elseif ($wcmvp_substr == "processing") {
                $wcmvp_order_status  =  "<span class='wcmvp_order_process'>" . $wcmvp_substr . "</span>";
            } elseif ($wcmvp_substr == "on-hold") {
                $wcmvp_order_status  =  "<span class='wcmvp_order_on-hold'>" . $wcmvp_substr . "</span>";
            } elseif ($wcmvp_substr == "pending") {
                $wcmvp_order_status  =  "<span class='wcmvp_order_pending'>" . $wcmvp_substr . "</span>";
            } elseif ($wcmvp_substr == "cancelled") {
                $wcmvp_order_status  =  "<span class='wcmvp_order_cancelled'>" . $wcmvp_substr . "</span>";
            } elseif ($wcmvp_substr == "refunded") {
                $wcmvp_order_status  =  "<span class='wcmvp_order_refunded'>" . $wcmvp_substr . "</span>";
            } elseif ($wcmvp_substr == "failed") {
                $wcmvp_order_status  =  "<span class='wcmvp_order_failed'>" . $wcmvp_substr . "</span>";
            } elseif ($wcmvp_substr == "trash") {
                $wcmvp_order_status  =  "<span class='wcmvp_order_trash'>" . $wcmvp_substr . "</span>";
            } else {
                $wcmvp_order_status  =  "<span class='wcmvp_order_status_notif'>" . $wcmvp_substr . "</span>";
            }
            if ($wcmvp_data[4] == "0") {

                $wcmvp_order_customer = esc_html__("guest", "wc-multi-vendor-platform-lite");
            } else {

                $wcmvp_user_obj  =  wc_get_order($wcmvp_data[0]);
                if (is_object($wcmvp_user_obj)) {
                    $wcmvp_order_customer = $wcmvp_user_obj->get_billing_first_name() . " " . $wcmvp_user_obj->get_billing_last_name();
                }
            }

            $wcmvp_order_date    =    date('d-m-Y', strtotime($wcmvp_data[5]));
            if ($wcmvp_permission == '1') {
                $wcmvp_order_complete = "<a href='#' data-id='" . $wcmvp_data[0] . "' class='wcmvp_order_complete'><i class='fa fa-check wcmvp_tooltip' aria-hidden='true'><span class='wcmvp_tooltiptext'>" . esc_html__("Complete", "wc-multi-vendor-platform-lite") . "</span></i></a>";
                $wcmvp_order_processing = "<a href='#' data-id='" . $wcmvp_data[0] . "' class='wcmvp_order_processing'><i class='fas fa-clock wcmvp_tooltip'><span class='wcmvp_tooltiptext'>" . esc_html__("processing", "wc-multi-vendor-platform-lite") . "<span></i></a>";
            } else {
                $wcmvp_order_complete = '';
                $wcmvp_order_processing = '';
            }
            $wcmvp_order_view = "<a href='#' data-id='" . $wcmvp_data[0] . "' data-toggle='modal' data-target='#exampleModal' class='wcmvp_order_view'><i class='fas fa-eye wcmvp_tooltip'><span class='wcmvp_tooltiptext'>" . esc_html__("View", "wc-multi-vendor-platform-lite") . "</span></i></a>";
            if ($wcmvp_data[3] == "wc-on-hold") {
                $wcmvp_order_action = "<div class='wcmvp_order_action_buttons'>" . $wcmvp_order_complete . $wcmvp_order_processing . $wcmvp_order_view ;
            } elseif ($wcmvp_data[3] == "wc-processing") {
                $wcmvp_order_action = "<div class='wcmvp_order_action_buttons'>" . $wcmvp_order_complete . $wcmvp_order_view ;
            } else {
                $wcmvp_order_action = "<div class='wcmvp_order_action_buttons'>" . $wcmvp_order_view ;
            }

            $wcmvp_order_all_ssp['data'][$i][6] = apply_filters("wcmvp_order_table_action_buttons", $wcmvp_order_action, $wcmvp_data[0]);
            $wcmvp_order_all_ssp['data'][$i][0] = $wcmvp_check;
            $wcmvp_order_all_ssp['data'][$i][1] = $wcmvp_order;
            $wcmvp_order_all_ssp['data'][$i][2] = $wcmvp_order_total;
            $wcmvp_order_all_ssp['data'][$i][3] = $wcmvp_order_status;
            $wcmvp_order_all_ssp['data'][$i][4] = $wcmvp_order_customer;
            $wcmvp_order_all_ssp['data'][$i][5] = $wcmvp_order_date;
            $i++;
        }
    }

    echo json_encode($wcmvp_order_all_ssp);
}
