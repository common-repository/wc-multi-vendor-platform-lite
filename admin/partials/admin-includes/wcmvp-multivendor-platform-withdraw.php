<?php 

//==================This File is about to manage withdraw requests of vendors at admin panel=====================//

    if( isset($_POST['wcmvp_withdraw_status']) && !empty($_POST['wcmvp_withdraw_status']) )
    {
        $wcmvp_withdraw_status = sanitize_text_field($_POST['wcmvp_withdraw_status']);
        
        if( isset($wcmvp_withdraw_status) && !empty($wcmvp_withdraw_status) )
        {
            update_option('wcmvp_withdraw_status',$wcmvp_withdraw_status);

            global $wpdb;

            $table = $wpdb->prefix.'wcmvp_withdraw';

            $primaryKey = 'id';

            $columns = array(
                array( 'db' => 'id',  'dt' => 0 , 'field' => 'id' ),
                array( 'db' => 'wcmvp_vendor_store', 'dt' => 1 , 'field' => 'wcmvp_vendor_store' ),
                array( 'db' => 'amount', 'dt' => 2 , 'field' => 'amount' ),
                array( 'db' => 'status',  'dt' => 3 , 'field' => 'status' ),
                array( 'db' => 'method',  'dt' => 4 , 'field' => 'method' ),
                array( 'db' => 'wcmvp_vendor_email',  'dt' => 5 , 'field' => 'wcmvp_vendor_email' ),
                array( 'db' => 'note',  'dt' => 6 , 'field' => 'note' ),
                array( 'db' => 'date',  'dt' => 7 , 'field' => 'date' ),
                array( 'db' => 'user_id',  'dt' => 8 , 'field' => 'user_id' ),
            ); 

            $sql_details = array(
                'user' => DB_USER,
                'pass' => DB_PASSWORD,
                'db'   => DB_NAME,
                'host' => DB_HOST
            );
            
            $where = "`status`= '".$wcmvp_withdraw_status."'";
            
            include_once( WCMVP_ADMIN_PARTIAL.'/ssp/ssp.customized.class.php' );

            $wcmvp_withdraw_data_ssp =  SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns,'', $where );

            if( isset($wcmvp_withdraw_data_ssp) && !empty($wcmvp_withdraw_data_ssp) )
            {
                if( isset($wcmvp_withdraw_data_ssp['data']) && is_array($wcmvp_withdraw_data_ssp['data']) && !empty($wcmvp_withdraw_data_ssp['data']) )
                {
                    $i = 0;
                    {
                        if( isset($wcmvp_withdraw_data_ssp['data'][$i]) )
                        {
                            foreach( $wcmvp_withdraw_data_ssp['data'] as $wcmvp_withdraw )
                            {
                                if( isset($wcmvp_withdraw) && !empty($wcmvp_withdraw) )
                                {
                                    if( isset($wcmvp_withdraw[8]) && !empty($wcmvp_withdraw[8]) )
                                    {
                                        $wcmvp_withdraw_user_id = $wcmvp_withdraw[8];
                                    }
                                    if( isset($wcmvp_withdraw[0]) && !empty($wcmvp_withdraw[0]) )
                                    {
                                        $wcmvp_withdraw_id = $wcmvp_withdraw[0];
                                        if( isset($wcmvp_withdraw_id) )
                                        {
                                            $wcmvp_withdraw_data_ssp['data'][$i][0] = '<td class="mdc-data-table__cell mdc-data-table__cell--checkbox">
                                            <div class="mdc-checkbox mdc-data-table__row-checkbox">
                                                <input type="checkbox" class="mdc-checkbox__native-control wcmvp_withdraw_inner_checkbox" aria-labelledby="u0" data-id="'.$wcmvp_withdraw_id.'">
                                                <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                    <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                            </div>
                                        </td>';
                                        }
                                    }
                                    if( isset($wcmvp_withdraw[1]) && !empty($wcmvp_withdraw[1]) )
                                    {
                                        $wcmvp_vendor_withdraw_img = get_user_meta($wcmvp_withdraw_user_id);
                                        if( isset($wcmvp_vendor_withdraw_img) && !empty($wcmvp_vendor_withdraw_img) && isset($wcmvp_vendor_withdraw_img['wcmvp_vendor_store_img']) )
                                        {
                                            $wcmvp_vendor_withdraw_img_id = $wcmvp_vendor_withdraw_img['wcmvp_vendor_store_img'][0];
                                        }
                                        if( isset($wcmvp_vendor_withdraw_img_id) && !empty($wcmvp_vendor_withdraw_img_id) )
                                        {
                                            $wcmvp_withdraw_vendor_img = wp_get_attachment_url($wcmvp_vendor_withdraw_img_id);
                                        }
                                        else{
                                            if(isset($wcmvp_withdraw_id))
                                            {
                                                $wcmvp_withdraw_vendor_img = get_avatar_url($wcmvp_withdraw_id);
                                            }
                                        }
                                        if( isset($wcmvp_withdraw[3]) && !empty($wcmvp_withdraw[3]) )
                                        {
                                            if( isset($wcmvp_withdraw_id) && $wcmvp_withdraw[3] == 'pending' )
                                            {
                                                $wcmvp_withdraw_data_ssp['data'][$i][1] = '<div class="wcmvp_withdraw_all">
                                                        <img class="wcmvp_withdraw_vend_img" src='.esc_attr($wcmvp_withdraw_vendor_img).'>
                                                        <div class="wcmvp-withdraw_content">
                                                            <div class="wcmvp_withdraw_vend_name">
                                                                <a href="#withdraw">'.esc_html__($wcmvp_withdraw[1],'wc-multi-vendor-platform-lite').'</a>	
                                                            </div>
                                                            <div class="wcmvp-withdraw_content2">
                                                                <a href="#withdraw" data-id="'.$wcmvp_withdraw_id.'" class="wcmvp_withdraw_delete wcmvp_withdraw_status_chng" data-value="delete">'.esc_html__('Delete','wc-multi-vendor-platform-lite').'</a>
                                                                <a href="#withdraw" data-id="'.$wcmvp_withdraw_id.'" class="wcmvp_withdraw_status_chng" data-value="cancelled">'.esc_html__('Cancel','wc-multi-vendor-platform-lite').'</a>
                                                            </div>
                                                        </div>
                                                </div>';
                                            }
                                            if( isset($wcmvp_withdraw_id) && $wcmvp_withdraw[3] == 'approved' )
                                            {
                                                $wcmvp_withdraw_data_ssp['data'][$i][1] = '<div class="wcmvp_withdraw_all">
                                                        <img class="wcmvp_withdraw_vend_img" src='.esc_attr($wcmvp_withdraw_vendor_img).'>
                                                        <div class="wcmvp-withdraw_content">
                                                            <div class="wcmvp_withdraw_vend_name">
                                                                <a href="#withdraw">'.esc_html__($wcmvp_withdraw[1],'wc-multi-vendor-platform-lite').'</a>	
                                                            </div>
                                                        </div>
                                                </div>';
                                            }
                                            if( isset($wcmvp_withdraw_id) && $wcmvp_withdraw[3] == 'cancelled' )
                                            {
                                                $wcmvp_withdraw_data_ssp['data'][$i][1] = '<div class="wcmvp_withdraw_all">
                                                        <img class="wcmvp_withdraw_vend_img" src='.esc_attr($wcmvp_withdraw_vendor_img).'>
                                                        <div class="wcmvp-withdraw_content">
                                                            <div class="wcmvp_withdraw_vend_name">
                                                                <a href="#withdraw">'.esc_html__($wcmvp_withdraw[1],'wc-multi-vendor-platform-lite').'</a>	
                                                            </div>
                                                            <div class="wcmvp-withdraw_content2">
                                                                <a href="#withdraw" data-id="'.$wcmvp_withdraw_id.'" class="wcmvp_withdraw_delete wcmvp_withdraw_status_chng" data-value="delete">'.esc_html__('Delete','wc-multi-vendor-platform-lite').'</a>
                                                                <a href="#withdraw" data-id="'.$wcmvp_withdraw_id.'" class="wcmvp_withdraw_status_chng" data-value="pending">'.esc_html__('Pending','wc-multi-vendor-platform-lite').'</a>
                                                            </div>
                                                        </div>
                                                </div>';
                                            }
                                        }
                                    }
                                    if( isset($wcmvp_withdraw[2]) && !empty($wcmvp_withdraw[1]) )
                                    {
                                        $wcmvp_withdraw_data_ssp['data'][$i][2] = wc_price($wcmvp_withdraw[2]);
                                    }
                                    if( isset($wcmvp_withdraw[3]) && !empty($wcmvp_withdraw[3]) )
                                    {
                                        $wcmvp_withdraw_data_ssp['data'][$i][3] = esc_html__(ucwords($wcmvp_withdraw[3]),'wc-multi-vendor-platform-lite');
                                    }
                                    if( isset($wcmvp_withdraw[4]) && !empty($wcmvp_withdraw[4]) )
                                    {
                                        $wcmvp_withdraw_data_ssp['data'][$i][4] = esc_html__(ucwords(str_replace('_',' ',$wcmvp_withdraw[4])),'wc-multi-vendor-platform-lite');
                                    }
                                    if( isset($wcmvp_withdraw[5]) && !empty($wcmvp_withdraw[5]) )
                                    {
                                        $wcmvp_withdraw_data_ssp['data'][$i][5] = esc_html__(ucwords($wcmvp_withdraw[5]),'wc-multi-vendor-platform-lite');
                                    }
                                    if( isset($wcmvp_withdraw[6]) && !empty($wcmvp_withdraw[6]) )
                                    {
                                        $wcmvp_withdraw_data_ssp['data'][$i][6] = esc_html__(ucwords($wcmvp_withdraw[6]),'wc-multi-vendor-platform-lite');
                                    }
                                    if( isset($wcmvp_withdraw[7]) && !empty($wcmvp_withdraw[7]) )
                                    {
                                        $wcmvp_withdraw_data_ssp['data'][$i][7] = date( "j/m/Y", strtotime($wcmvp_withdraw[7]));
                                    }
                                    if( isset($wcmvp_withdraw[8]) && !empty($wcmvp_withdraw[8]) )
                                    {
                                        if( isset($wcmvp_withdraw[3]) && !empty($wcmvp_withdraw[3]) )
                                        {
                                            if( $wcmvp_withdraw[3] == 'pending' )
                                            {
                                                $wcmvp_withdraw_data_ssp['data'][$i][8] = '<div class="wcmvp-button-group">
                                                    <button title="'.esc_attr__('Approve Request','wc-multi-vendor-platform-lite').'" class="mdc-button wcmvp_withdraw_status_chng" data-id="'.$wcmvp_withdraw_id.'" data-value="approved">
                                                        <span class="material-icons">check_circle</span>
                                                        <div class="mdc-button__ripple"></div>
                                                    </button>
                                                    <button title="'.esc_attr__('Add Note','wc-multi-vendor-platform-lite').'" class="mdc-button  wcmvp_withdraw_add_note" data-target = #wcmvp_withdraw_add_note data-toggle = modal data-id="'.$wcmvp_withdraw_id.'">
                                                        <span class="material-icons">add_circle</span>
                                                        <div class="mdc-button__ripple"></div>
                                                    </button>
                                                </div>';
                                            }
                                            if( $wcmvp_withdraw[3] == 'approved' )
                                            {
                                                $wcmvp_withdraw_data_ssp['data'][$i][8] = '<div class="wcmvp-button-group"><button title="'.esc_attr__('Add Note','wc-multi-vendor-platform-lite').'" class="mdc-button  wcmvp_withdraw_add_note" data-target = #wcmvp_withdraw_add_note data-toggle = modal data-id="'.$wcmvp_withdraw_id.'">
                                                <span class="material-icons">add_circle</span>
                                                <div class="mdc-button__ripple"></div>
                                                </button>
                                                </div>';
                                            }
                                            if( $wcmvp_withdraw[3] == 'cancelled' )
                                            {
                                                $wcmvp_withdraw_data_ssp['data'][$i][8] = '<div class="wcmvp-button-group">
                                                <button title="'.esc_attr__('Mark as Pending','wc-multi-vendor-platform-lite').'" class="mdc-button wcmvp_withdraw_status_chng" data-id="'.$wcmvp_withdraw_id.'" data-value="pending">
                                                <span class="material-icons">restore</span>
                                                <div class="mdc-button__ripple"></div>
                                                </button> 
                                                <button title="'.esc_attr__('Add Note','wc-multi-vendor-platform-lite').'" class="mdc-button 
                                                 wcmvp_withdraw_add_note" data-target = #wcmvp_withdraw_add_note data-toggle = modal data-id="'.$wcmvp_withdraw_id.'">
                                                 <span class="material-icons">note_add</span>
                                                 <div class="mdc-button__ripple"></div>
                                                 </button>
                                                 </div>';
                                            }
                                        }
                                    }
                                }
                                $i++;
                            }
                        }
                    }
                }
            }
            echo json_encode($wcmvp_withdraw_data_ssp);

            do_action('wcmvp_multivendor_platform_launching_withdraw_table');

            wp_die();
        }
    }
?>