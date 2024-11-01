<?php

//===================This File is used to launch order table========================//

    if( isset($_POST['wcmvp_order_or_order_all']) && !empty($_POST['wcmvp_order_or_order_all']) )
    {
        update_option('wcmvp_order_or_order_all', sanitize_text_field($_POST['wcmvp_order_or_order_all']));
    }
     
    global $wpdb;

    $sql_details = array(
        'user' 	=> 	DB_USER,
        'pass' 	=> 	DB_PASSWORD,
        'db'	=>	DB_NAME,
        'host'	=>	DB_HOST,
    );

    $table = $wpdb->prefix.'posts';

    $primaryKey = 'ID';

    $columns = array(
        array( 'db' => 'ID', 'dt' => 0, 'field' => 'ID' ),
        array( 'db' => 'ID', 'dt' => 1, 'field' => 'ID' ),
        array( 'db' => 'post_date', 'dt' => 2, 'field' => 'post_date' ),
        array( 'db' => 'post_status', 'dt' => 3, 'field' => 'post_status' ),
        array( 'db' => 'wcmvp_order_total', 'dt' => 4, 'field' => 'wcmvp_order_total' ),
        array( 'db' => 'wcmvp_order_vendor', 'dt' => 5, 'field' => 'wcmvp_order_vendor' ),
        array( 'db' => 'wcmvp_sub_order', 'dt' => 6, 'field' => 'wcmvp_sub_order' ),
        array( 'db' => 'wcmvp_billing_first_name', 'dt' => 7, 'field' => 'wcmvp_billing_first_name' ),
        array( 'db' => 'wcmvp_billing_last_name', 'dt' => 8, 'field' => 'wcmvp_billing_last_name' )
    ); 
    
    $join = "FROM ".$wpdb->prefix."posts as m LEFT JOIN(SELECT post_id,
    MAX(CASE WHEN meta_key = 'wcmvp_order_vendor' THEN meta_value END) wcmvp_order_vendor,
    MAX(CASE WHEN meta_key = 'wcmvp_sub_order' THEN meta_value END) wcmvp_sub_order,
    MAX(CASE WHEN meta_key = '_billing_first_name' THEN meta_value END) wcmvp_billing_first_name,
    MAX(CASE WHEN meta_key = '_billing_last_name' THEN meta_value END) wcmvp_billing_last_name,
    MAX(CASE WHEN meta_key = '_order_total' THEN meta_value END) wcmvp_order_total
    FROM ".$wpdb->prefix."postmeta GROUP BY post_id) wcmvp_order_table on m.`ID`=wcmvp_order_table.`post_id`";

    $where = "`post_type`='shop_order'";

    $equals = "`post_status`!='auto-draft'";

    $equals2 = "`post_parent`='0'";

    $where .= 'AND' .$equals. 'AND' .$equals2;

    if( isset($_POST['wcmvp_order_vendor_id']) && !empty($_POST['wcmvp_order_vendor_id']) )
    {
        $wcmvp_order_vendor_id = sanitize_text_field($_POST['wcmvp_order_vendor_id']);
        if( isset($wcmvp_order_vendor_id) && !empty($wcmvp_order_vendor_id) )
        {
            update_option( 'wcmvp_order_vendor_id',$wcmvp_order_vendor_id );

            $where = "`post_type`='shop_order'";

            $equals = "`post_status`!='auto-draft'";

            $equals1 = "`wcmvp_order_vendor`='".$wcmvp_order_vendor_id."'";

            $where .= 'AND' .$equals. 'AND' .$equals1;

            if( isset($_POST['wcmvp_sort_order_by']) && !empty($_POST['wcmvp_sort_order_by']) )
            {
                update_option( 'wcmvp_sort_order_by',sanitize_text_field($_POST['wcmvp_sort_order_by']) );

                if( $_POST['wcmvp_sort_order_by'] == 'trash' )
                {
                    $where = "`post_type`='shop_order'";

                    $equals = "`wcmvp_order_vendor`='".$wcmvp_order_vendor_id."'";

                    $equals1 = "`post_status`='".sanitize_text_field($_POST['wcmvp_sort_order_by'])."'";

                    $where .= 'AND' .$equals. 'AND' .$equals1;
                }

                else if( $_POST['wcmvp_sort_order_by'] != 'all' && $_POST['wcmvp_sort_order_by'] != 'trash' )
                {
                    $where = "`post_type`='shop_order'";

                    $equals = "`wcmvp_order_vendor`='".$wcmvp_order_vendor_id."'";

                    $equals1 = "`post_status`='".sanitize_text_field($_POST['wcmvp_sort_order_by'])."'";

                    $where .= 'AND' .$equals. 'AND' .$equals1;
                }
            }
        }
    }
    else if( isset($_POST['wcmvp_show_sub_main_order_id']) && !empty($_POST['wcmvp_show_sub_main_order_id']) )
    {
        $wcmvp_order_vendor_id = sanitize_text_field($_POST['wcmvp_show_sub_main_order_id']);
        if(isset($wcmvp_order_vendor_id) && !empty($wcmvp_order_vendor_id))
        {
            $where = "`post_type`='shop_order'";

            $equals = "`post_status`!='auto-draft'";

            $equals1 = "`post_parent`='".$wcmvp_order_vendor_id."'";

            $equals2 = "`post_parent`='0'";

            $where .= ' AND (' .$equals1. ' OR ' .$equals2.")";

            $where .= ' AND ' .$equals;

            if( isset($_POST['wcmvp_sort_order_by']) && !empty($_POST['wcmvp_sort_order_by']) )
            {
                update_option( 'wcmvp_sort_order_by',sanitize_text_field($_POST['wcmvp_sort_order_by']) );

                if( $_POST['wcmvp_sort_order_by'] == 'trash' || $_POST['wcmvp_sort_order_by'] == 'draft' )
                {
                    $where = "`post_type`='shop_order'";

                    $equals = "`post_status`!='auto-draft'";

                    $equals3 = "`post_status`='".sanitize_text_field($_POST['wcmvp_sort_order_by'])."'";
        
                    $equals1 = "`post_parent`='".$wcmvp_order_vendor_id."'";
        
                    $equals2 = "`post_parent`='0'";
        
                    $where .= ' AND (' .$equals1. ' OR ' .$equals2.")";
        
                    $where .= ' AND ' .$equals. 'AND' .$equals3;
                }
                else if( $_POST['wcmvp_sort_order_by'] == 'all' )
                {
                    $where = "`post_type`='shop_order'";

                    $equals = "`post_status`!='auto-draft'";
        
                    $equals1 = "`post_parent`='".$wcmvp_order_vendor_id."'";
        
                    $equals2 = "`post_parent`='0'";
        
                    $where .= ' AND (' .$equals1. ' OR ' .$equals2.")";
        
                    $where .= ' AND ' .$equals;
                }
                else
                {
                    $wcmvp_sort_sub_orders = 'wc-';

                    $wcmvp_sort_sub_orders .= sanitize_text_field($_POST['wcmvp_sort_order_by']);

                    $where = "`post_type`='shop_order'";

                    $equals = "`post_status`!='auto-draft'";

                    $equals3 = "`post_status`='".$wcmvp_sort_sub_orders."'";
        
                    $equals1 = "`post_parent`='".$wcmvp_order_vendor_id."'";
        
                    $equals2 = "`post_parent`='0'";
        
                    $where .= ' AND (' .$equals1. ' OR ' .$equals2.")";
        
                    $where .= ' AND ' .$equals. 'AND' .$equals3;
                }
            }

        }
    }
    else
    {
        if( isset($_POST['wcmvp_sort_order_by']) && !empty($_POST['wcmvp_sort_order_by']) )
        {
            update_option( 'wcmvp_sort_order_by',sanitize_text_field($_POST['wcmvp_sort_order_by']) );

            if( $_POST['wcmvp_sort_order_by'] == 'trash' || $_POST['wcmvp_sort_order_by'] == 'draft' )
            {
                $where = "`post_type`='shop_order'";

                $equals1 = "`post_status`='".sanitize_text_field($_POST['wcmvp_sort_order_by'])."'";

                $equals2 = "`post_parent`='0'";

                $where .= 'AND '.$equals1. ' AND ' .$equals2;

            }

            else if( $_POST['wcmvp_sort_order_by'] == 'all' )
            {
                $where = "`post_type`='shop_order'";

                $equals2 = "`post_parent`='0'";

                $equals3 = "`post_status`!='auto-draft'";

                $where .= ' AND ' .$equals2. 'AND' .$equals3;
            }

            else
            {
                if( substr($_POST['wcmvp_sort_order_by'],0,3) == 'wc-' )
                {
                    $equals1 = "`post_status`='".sanitize_text_field($_POST['wcmvp_sort_order_by'])."'";
                }
                else
                {
                    $wcmvp_sort_by_status = 'wc-';

                    $wcmvp_sort_by_status .= sanitize_text_field($_POST['wcmvp_sort_order_by']);

                    $equals1 = "`post_status`='".$wcmvp_sort_by_status."'";
                }

                $where = "`post_type`='shop_order'";

                $equals2 = "`post_parent`='0'";

                $where .= 'AND '.$equals1. ' AND ' .$equals2;

            }
        }
    }

    include_once( WCMVP_ADMIN_PARTIAL.'/ssp/ssp.customized.class.php' );

    $wcmvp_order_table_ssp = SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $join, $where );
    
    if( isset($wcmvp_order_table_ssp) && !empty($wcmvp_order_table_ssp) )
    {
        if( isset($wcmvp_order_table_ssp['data']) && !empty($wcmvp_order_table_ssp['data']) )
        {
            $wcmvp_order_table_data = $wcmvp_order_table_ssp['data'];
            
            if( isset($wcmvp_order_table_data) && !empty($wcmvp_order_table_data) )
            {
                $i = 0;

                if( isset($wcmvp_order_table_ssp['data'][$i]) )
                {
                    foreach($wcmvp_order_table_data as $data)
                    {
                        if( isset($data))
                        {
                            if( isset($wcmvp_order_table_ssp['data'][$i][0]) && isset($data[1]) )
                            {
                                $wcmvp_order_table_ssp['data'][$i][0] = '<td class="mdc-data-table__cell mdc-data-table__cell--checkbox">
                                <div class="mdc-checkbox mdc-data-table__row-checkbox">
                                    <input type="checkbox" class="mdc-checkbox__native-control wcmvp_orders_inner_checkbox" data-id = "'.esc_attr($data[1]).'" name = "wcmvp_prod_inner_check" />
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
                            if( isset($wcmvp_order_table_ssp['data'][$i][1]) && isset($data[1]) && isset($data[7]) && isset($data[8]) )
                            {
                                $wcmvp_order_table_ssp['data'][$i][1] = "<div class='wcmvp_order_name_section'>
                                    <a href = '#orders' class='wcmvp_order_name' data-id=".esc_attr($data[1]).">
                                    #".esc_attr($data[1])." ".esc_attr($data[7])." ".esc_attr($data[8])."
                                    </a>
                                    <a href='#orders' class='wcmvp_order_view_icon' title=".esc_html__('Preview','wc-multi-vendor-platform-lite')."><i class='fa fa-eye' aria-hidden='true'></i></a>
                                </div>";
                            }
                            else
                            {
                                if( isset($wcmvp_order_table_ssp['data'][$i][1]) && isset($data[1]) )
                                {
                                    $wcmvp_order_table_ssp['data'][$i][1] = "<div class='wcmvp_order_name_section'>
                                        <a href = '#orders' class='wcmvp_order_name' data-id=".esc_attr($data[1]).">
                                        #".esc_attr($data[1])." ".esc_attr($data[7])." ".esc_attr($data[8])."
                                        </a>
                                        <a href='#orders' class='wcmvp_order_view_icon' title=".esc_html__('Preview','wc-multi-vendor-platform-lite')."><i class='fa fa-eye' aria-hidden='true'></i></a>
                                    </div>";
                                }
                            }
                            if( isset($wcmvp_order_table_ssp['data'][$i][2]) && isset($data[2]) )
                            {
                                $wcmvp_order_table_ssp['data'][$i][2] = date("M j, Y",strtotime($data[2]));
                            }
                            if( isset($wcmvp_order_table_ssp['data'][$i][3]) && isset($data[3]) )
                            {
                                if( $data[3] == 'wc-completed' )
                                {
                                    $wcmvp_order_table_ssp['data'][$i][3] = "<mark class='wcmvp_order_completed'>".esc_html__('Completed','wc-multi-vendor-platform-lite')."</mark>";
                                }
                                if( $data[3] == 'wc-on-hold' )
                                {
                                    $wcmvp_order_table_ssp['data'][$i][3] = "<mark class='wcmvp_order_on-hold'>".esc_html__('On hold','wc-multi-vendor-platform-lite')."</mark>";
                                }
                                if( $data[3] == 'wc-processing' )
                                {
                                    $wcmvp_order_table_ssp['data'][$i][3] = "<mark class='wcmvp_order_processing'>".esc_html__('Processing','wc-multi-vendor-platform-lite')."</mark>";
                                }
                                if( $data[3] == 'wc-failed' )
                                {
                                    $wcmvp_order_table_ssp['data'][$i][3] = "<mark class='wcmvp_order_failed'>".esc_html__('Failed','wc-multi-vendor-platform-lite')."</mark>";
                                }
                                if( $data[3] == 'wc-refunded' )
                                {
                                    $wcmvp_order_table_ssp['data'][$i][3] = "<mark class='wcmvp_order_refunded'>".esc_html__('Refunded','wc-multi-vendor-platform-lite')."</mark>";
                                }
                                if( $data[3] == 'wc-cancelled' )
                                {
                                    $wcmvp_order_table_ssp['data'][$i][3] = "<mark class='wcmvp_order_cancelled'>".esc_html__('Cancelled','wc-multi-vendor-platform-lite')."</mark>";
                                }
                                if( $data[3] == 'wc-pending' )
                                {
                                    $wcmvp_order_table_ssp['data'][$i][3] = "<mark class='wcmvp_order_pending'>".esc_html__('Pending Payment','wc-multi-vendor-platform-lite')."</mark>";
                                }
                                if( $data[3] == 'trash' )
                                {
                                    $wcmvp_order_table_ssp['data'][$i][3] = "<mark class='wcmvp_order_trash'>".esc_html__('Trash','wc-multi-vendor-platform-lite')."</mark>";
                                }
                                if( $data[3] == 'draft' )
                                {
                                    $wcmvp_order_table_ssp['data'][$i][3] = "<mark class='wcmvp_order_draft'>".esc_html__('Draft','wc-multi-vendor-platform-lite')."</mark>";
                                }
                            }
                            if( isset($wcmvp_order_table_ssp['data'][$i][4]) && isset($data[4]) )
                            {
                                $wcmvp_order_table_ssp['data'][$i][4] = wc_price($data[4]);
                            }
                            if( isset($data[1]) && $data[3] )
                            {
                                if( $data[3] == 'trash' )
                                {
                                    $wcmvp_order_table_ssp['data'][$i][7] = '
                                    <div class="wcmvp-button-group">
                                        <button title="'.esc_html__('Restore Order','wc-multi-vendor-platform-lite').'" class="mdc-button  wcmvp_change_order_status wcmvp-restore-btn" data-id="'.esc_attr($data[1]).'" data-value="restore">
                                        <span class="material-icons">restore<span>
                                        </button>
                                        <button title="'.esc_html__('Delete Permanently','wc-multi-vendor-platform-lite').'" class="mdc-button wcmvp_change_order_status wcmvp-delete-btn" data-id="'.esc_attr($data[1]).'" data-value="delete">
                                        <span class="material-icons">delete_forever</span>
                                        <div class="mdc-button__ripple"></div>
                                        </button>
                                    </div>';
                                }
                                else if( !empty(get_option('wcmvp_withdraw_option')) )
                                {
                                    if(isset(get_option('wcmvp_withdraw_option')['wcmvp_withdraw_to_vendor']))
                                    {
                                        if(get_option('wcmvp_withdraw_option')['wcmvp_withdraw_to_vendor'] == 'wcmvp_after_admin_approval')
                                        {
                                            $wcmvp_order_table_ssp['data'][$i][7] = '
                                            <div class="wcmvp-button-group">
                                                <button title="'.esc_html__('Send Payment','wc-multi-vendor-platform-lite').'" class="mdc-button  wcmvp_change_order_status wcmvp-done-btn" data-id="'.esc_attr($data[1]).'" data-value="send_payment"><span class=" material-icons">check_circle</span>
                                                <div class="mdc-button__ripple"></div>
                                                </button>
                                                <button title="'.esc_html__('Send to Trash','wc-multi-vendor-platform-lite').'" class="mdc-button wcmvp_change_order_status wcmvp-trash-btn" data-id="'.esc_attr($data[1]).'" data-value="trash">
                                                <span class="material-icons ">delete</span>
                                                <div class="mdc-button__ripple"></div>
                                                </button>
                                            </div>';
                                        }
                                        else
                                        {
                                            $wcmvp_order_table_ssp['data'][$i][7] = '
                                            <div class="wcmvp-button-group">
                                                <button title="Send to Trash" class="mdc-button  wcmvp_change_order_status wcmvp-trash-btn" data-id="'.esc_attr($data[1]).'" data-value="trash">
                                                
                                                <span class="material-icons">delete</span>
                                                <div class="mdc-button__ripple"></div>
                                                </button>
                                            </div>';
                                        }
                                    }
                                    else
                                    {
                                        $wcmvp_order_table_ssp['data'][$i][7] = '
                                        <div class="wcmvp-button-group">
                                        <button title="'.esc_html__('Send to Trash','wc-multi-vendor-platform-lite').'" class="mdc-button  wcmvp_change_order_status wcmvp-trash-btn" data-id="'.esc_attr($data[1]).'" data-value="trash">
                                        <span class=" material-icons">delete</span>
                                        <div class="mdc-button__ripple"></div>
                                        </button
                                        </div>';
                                    }
                                }
                            } 
                            if( isset($data[6]) && isset($data[1]) )
                            {
                                $wcmvp_order_parent_id = wp_get_post_parent_id($data[1]);
                                if( isset($wcmvp_order_parent_id) )
                                {	
                                    if( $wcmvp_order_parent_id == 0 && $data[6] == 1 )
                                    {
                                        $wcmvp_order_table_ssp['data'][$i][5] = '<p>('.esc_html__('no vendor','wc-multi-vendor-platform-lite').')</p>';
                                        $wcmvp_order_table_ssp['data'][$i][6] = '<p><a class="wcmvp_show_sub_order wcmvp_show_hide_order'.esc_attr($data[1]).'" data-value="show" href="#/orders_all" data-id='.esc_attr($data[1]).'>'.esc_html__('Show Sub Order','wc-multi-vendor-platform-lite').'</a></p>';
                                    }
                                }
                            }
                            if( !isset($data[6]) && isset($data[1]) )
                            {
                                $wcmvp_order_parent_id = wp_get_post_parent_id($data[1]);
                                if( isset($wcmvp_order_parent_id) )
                                {	
                                    if( $wcmvp_order_parent_id != 0 )
                                    {
                                        $wcmvp_order_table_ssp['data'][$i][6] = '<p>'.esc_html__('Sub Order of #','wc-multi-vendor-platform-lite').$wcmvp_order_parent_id.'</p>';
                                    }
                                }
                            }
                            if( isset($data[5]) && isset($data[1]) )
                            {
                                $wcmvp_order_table_ssp['data'][$i][5] = '<p>'.get_user_meta( $data[5],"wcmvp_store_name",true ).'</p>';
                            }
                        }
                        $i++;
                    }
                }
            }
        }
    }
    echo json_encode($wcmvp_order_table_ssp);
    do_action('wcmvp_multivendor_platform_orders_table_loaded');
    wp_die();
?>