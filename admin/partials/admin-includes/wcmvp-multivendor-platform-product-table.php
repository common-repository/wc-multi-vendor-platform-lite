<?php 

//=====================file used to launch product table according to products at admin panel================//

    if( isset($_POST['wcmvp_sort_table']) && !empty($_POST['wcmvp_sort_table']) )
    {
        $wcmvp_sort_table = sanitize_text_field($_POST['wcmvp_sort_table']);
        update_option('wcmvp_sort_table_temp',$wcmvp_sort_table);
    }
    if( isset( $_POST['wcmvp_sort_by_status'] ) && !empty( $_POST['wcmvp_sort_by_status'] ) )
    {
        $wcmvp_sort_by_status  = sanitize_text_field($_POST['wcmvp_sort_by_status']);

        if(isset( $_POST['wcmvp_product_author_id'] ) && !empty( $_POST['wcmvp_product_author_id'] ))
        {
            $wcmvp_prod_auth_id  = sanitize_text_field($_POST['wcmvp_product_author_id']);
        }
        
        if( isset( $wcmvp_sort_by_status ) )
        {
            
        global $wpdb;

        $table = $wpdb->prefix.'posts';

        $primaryKey = 'ID';

        $columns = array(
            array( 'db' => 'ID', 'dt' => 0 , 'field' => 'ID' ),
            array( 'db' => 'wcmvp_prod_img_id', 'dt' => 1 , 'field' => 'wcmvp_prod_img_id' ),
            array( 'db' => 'post_title', 'dt' => 2 , 'field' => 'post_title' ),
            array( 'db' => 'wcmvp_prod_sku',  'dt' => 3 , 'field' => 'wcmvp_prod_sku' ),
            array( 'db' => 'wcmvp_prod_status',  'dt' => 4 , 'field' => 'wcmvp_prod_status' ),
            array( 'db' => 'wcmvp_prod_reg_price',  'dt' => 5 , 'field' => 'wcmvp_prod_reg_price' ),
            array( 'db' => 'post_status',  'dt' => 6 , 'field' => 'post_status' ),
            array( 'db' => 'post_password',  'dt' => 7 , 'field' => 'post_password' ),
            array( 'db' => 'wcmvp_prod_sale_price',  'dt' => 8 , 'field' => 'wcmvp_prod_sale_price' ),
            array( 'db' => 'post_date',  'dt' => 9 , 'field' => 'post_date' ),
            array( 'db' => 'ID',  'dt' => 10 , 'field' => 'ID' ),
        ); 

        $sql_details = array(
            'user' => DB_USER,
            'pass' => DB_PASSWORD,
            'db'   => DB_NAME,
            'host' => DB_HOST
        );
        
        if( $wcmvp_sort_by_status == 'all' )
        {
            $where = "`post_type`='product'";

            $condition = "`post_status`= 'publish'";

            $condition2 = "`post_status`= 'draft'";

            $condition3 = "`post_status`= 'pending'";

            $condition4 = "`post_status`= 'private'";

            $where .= ' AND (' .$condition. ' OR ' .$condition2. ' OR ' .$condition4. ' OR ' .$condition3.")";

            if( isset($wcmvp_prod_auth_id) )
            {
                $equals = "`post_author`= ".$wcmvp_prod_auth_id;

                $where .= ' AND ' .$equals;
            }
        }

        else
        {	
            $where = "`post_type`='product'";

            if( isset($wcmvp_prod_auth_id) )
            {
                $equals = "`post_author`= ".$wcmvp_prod_auth_id."";

                $condition = "`post_status`= '".$wcmvp_sort_by_status."'";
    
                $where .= ' AND '. ($equals. ' AND ' .$condition);
            }
            else
            {
                $condition = "`post_status`= '".$wcmvp_sort_by_status."'";
    
                $where .= ' AND '. $condition;
            }
        }
        
        $join = "FROM ".$wpdb->prefix."posts"." LEFT JOIN (SELECT post_id,
        MAX(CASE WHEN meta_key = '_thumbnail_id' THEN meta_value END) wcmvp_prod_img_id,
        MAX(CASE WHEN meta_key = '_sku' THEN meta_value END) wcmvp_prod_sku,
        MAX(CASE WHEN meta_key = '_stock_status' THEN meta_value END) wcmvp_prod_status,
        MAX(CASE WHEN meta_key = '_regular_price' THEN meta_value END) wcmvp_prod_reg_price,
        MAX(CASE WHEN meta_key = '_sale_price' THEN meta_value END) wcmvp_prod_sale_price
        FROM ".$wpdb->prefix."postmeta"." GROUP BY post_id) wcmvp_selected_table ON ".$wpdb->prefix."posts".".`ID`= wcmvp_selected_table.`post_id` ";

        if( (isset($_POST['wcmvp_prod_cat_filter_val']) && !empty($_POST['wcmvp_prod_cat_filter_val'])) && (isset($_POST['wcmvp_filter_by_prod_type']) && !empty($_POST['wcmvp_filter_by_prod_type'])) && (isset($_POST['wcmvp_filter_by_prod_stock']) && !empty($_POST['wcmvp_filter_by_prod_stock'])))
        {
            $wcmvp_prod_cat_filter_val = sanitize_text_field($_POST['wcmvp_prod_cat_filter_val']);

            $wcmvp_filter_by_prod_type = sanitize_text_field($_POST['wcmvp_filter_by_prod_type']);

            $wcmvp_filter_by_prod_stock = sanitize_text_field($_POST['wcmvp_filter_by_prod_stock']);

            if( (isset($wcmvp_prod_cat_filter_val) && !empty($wcmvp_prod_cat_filter_val)) && (isset($wcmvp_filter_by_prod_type) && !empty($wcmvp_filter_by_prod_type)) && (isset($wcmvp_filter_by_prod_stock) && !empty($wcmvp_filter_by_prod_stock)) )

            {
                if( (($wcmvp_filter_by_prod_type != -1) && ($wcmvp_prod_cat_filter_val == -1) && ($wcmvp_filter_by_prod_stock == -1) ) || (($wcmvp_filter_by_prod_type == -1) && ($wcmvp_prod_cat_filter_val != -1) && ($wcmvp_filter_by_prod_stock == -1) ) || (($wcmvp_filter_by_prod_type == -1) && ($wcmvp_prod_cat_filter_val == -1) && ($wcmvp_filter_by_prod_stock != -1) )  )	
                {
                    if($wcmvp_filter_by_prod_type != -1)
                    {
                        $wcmvpmmer_main_cat_filter = $wcmvp_filter_by_prod_type;
                    }
                    if($wcmvp_prod_cat_filter_val != -1)
                    {
                        $wcmvpmmer_main_cat_filter = $wcmvp_prod_cat_filter_val;
                    }
                    if($wcmvp_filter_by_prod_stock != -1)
                    {
                        $wcmvpmmer_main_cat_filter = $wcmvp_filter_by_prod_stock;
                    }
                    if( $wcmvp_sort_by_status == 'all' )
                    {
                        $where = "`post_type`='product'";

                        if( isset($wcmvp_prod_auth_id) )
                        {
                            $equals = "`post_author`= ".$wcmvp_prod_auth_id."";
    
                            $where .= ' AND '. $equals;
                        }

                        $condition = "`post_status`= 'publish'";

                        $condition2 = "`post_status`= 'draft'";

                        $condition3 = "`post_status`= 'pending'";

                        $condition4 = "`post_status`= 'private'";
    
                        $where .= ' AND (' . $condition . ' OR ' . $condition2 . ' OR ' . $condition3 .  ' OR ' . $condition4 . ')';

                        if( isset($wcmvpmmer_main_cat_filter) )
                        {
                            $cat_condition = "wp_terms.`term_id` = '".$wcmvpmmer_main_cat_filter."'";
                        }

                        if( isset($cat_condition) )
                        {
                            $where .= ' AND ('. $cat_condition . ')';
                        }
                    }
                    else
                    {
                        $where = "`post_type`='product'";

                        if( isset($wcmvp_prod_auth_id) )
                        {
                            $equals = "`post_author`= ".$wcmvp_prod_auth_id."";

                            $condition = "`post_status`= '".$wcmvp_sort_by_status."'";
    
                            $taxonomy = "`taxonomy`= 'product_cat'";
    
                            if( isset($wcmvpmmer_main_cat_filter) )
                            {
                                $cat_condition = "wp_terms.`term_id` = '".$wcmvpmmer_main_cat_filter."'";
                            }
        
                            $where .= ' AND '. $equals. ' AND ' .$cat_condition. ' AND ' .$condition;
                        }
                        else
                        {
                            $condition = "`post_status`= '".$wcmvp_sort_by_status."'";
    
                            $taxonomy = "`taxonomy`= 'product_cat'";
    
                            if( isset($wcmvpmmer_main_cat_filter) )
                            {
                                $cat_condition = "wp_terms.`term_id` = '".$wcmvpmmer_main_cat_filter."'";
                            }
        
                            $where .= ' AND ' .$cat_condition. ' AND ' .$condition;
                        }
                    }

                    $join = "FROM ".$wpdb->prefix."posts"." LEFT JOIN (SELECT post_id,
                    MAX(CASE WHEN meta_key = '_thumbnail_id' THEN meta_value END) wcmvp_prod_img_id,
                    MAX(CASE WHEN meta_key = '_sku' THEN meta_value END) wcmvp_prod_sku,
                    MAX(CASE WHEN meta_key = '_stock_status' THEN meta_value END) wcmvp_prod_status,
                    MAX(CASE WHEN meta_key = '_regular_price' THEN meta_value END) wcmvp_prod_reg_price,
                    MAX(CASE WHEN meta_key = '_sale_price' THEN meta_value END) wcmvp_prod_sale_price
                    FROM ".$wpdb->prefix."postmeta"." GROUP BY post_id) wcmvp_selected_table ON ".$wpdb->prefix."posts".".`ID`= wcmvp_selected_table.`post_id` JOIN ".$wpdb->prefix."term_relationships"." ON ".$wpdb->prefix."posts".".`ID` = ".$wpdb->prefix."term_relationships".".`object_id` JOIN (SELECT term_id,
                    MAX(CASE WHEN taxonomy = 'product_cat' THEN term_id END) wcmvp_prod_cat,
                    MAX(CASE WHEN taxonomy = 'product_type' THEN term_id END) wcmvp_prod_type
                    FROM ".$wpdb->prefix."term_taxonomy"." GROUP BY term_id) wcmvp_prod_taxonomy ON ".$wpdb->prefix."term_relationships".".`term_taxonomy_id` = wcmvp_prod_taxonomy.`term_id` JOIN ".$wpdb->prefix."terms"." ON wcmvp_prod_taxonomy.`term_id` = ".$wpdb->prefix."terms".".`term_id` ";
                }

            }
        }
        
        include_once( WCMVP_ADMIN_PARTIAL.'/ssp/ssp.customized.class.php' );

        $wcmvp_products_data_ssp =  SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns, $join, $where);
        
        if( isset( $wcmvp_products_data_ssp ) && !empty( $wcmvp_products_data_ssp ) )
        {
            if( is_array( $wcmvp_products_data_ssp['data'] ) && !empty( $wcmvp_products_data_ssp['data'] ) )
            {
                $wcmvp_products_data = $wcmvp_products_data_ssp['data'];

                if( isset( $wcmvp_products_data ) && !empty( $wcmvp_products_data ) && is_array( $wcmvp_products_data ) )
                {   
                    $j = 0;
                    
                    foreach( $wcmvp_products_data as $wcmvp_prod )
                    {
                        if( isset( $wcmvp_products_data_ssp['data'][$j] ) )
                        {
                            if( isset($wcmvp_products_data_ssp['data'][$j][4]) )
                            {
                                if( $wcmvp_prod[4] == 'instock' )
                                {
                                    $wcmvp_products_data_ssp['data'][$j][4] = '<p class="wcmvp_mark_instock">'.esc_html__('In stock','wc-multi-vendor-platform-lite').'</p>';
                                }
                                if( empty($wcmvp_prod[4] ))
                                {
                                    $wcmvp_products_data_ssp['data'][$j][4] = '<p class="wcmvp_mark_instock">'.esc_html__('In stock','wc-multi-vendor-platform-lite').'</p>';
                                }
                                if( $wcmvp_prod[4] == 'outofstock' )
                                {
                                    $wcmvp_products_data_ssp['data'][$j][4] = '<p class="wcmvp_mark_outofstock">'.esc_html__('Out Of Stock','wc-multi-vendor-platform-lite').'</p>';
                                }
                                if( $wcmvp_prod[4] == 'onbackorder' )
                                {
                                    $wcmvp_products_data_ssp['data'][$j][4] = '<p class="wcmvp_mark_onbackorder">'.esc_html__('On backorder','wc-multi-vendor-platform-lite').'</p>';
                                }
                            }
                            else
                            {
                                $wcmvp_products_data_ssp['data'][$j][4] = '<p class="wcmvp_mark_instock">'.esc_html__('In stock','wc-multi-vendor-platform-lite').'</p>';
                            }

                            if( isset($wcmvp_products_data_ssp['data'][$j][5]) && isset($wcmvp_products_data_ssp['data'][$j][8]) )
                            {
                                if( !empty($wcmvp_prod[8]) )
                                {
                                    $wcmvp_products_data_ssp['data'][$j][5] = '<p><del>'.wc_price($wcmvp_products_data_ssp['data'][$j][5]).'</del></p>
                                    <p>'.wc_price($wcmvp_products_data_ssp['data'][$j][8]).'</p>';
                                }
                                if( empty($wcmvp_prod[8]) )
                                {
                                    $wcmvp_products_data_ssp['data'][$j][5] = '<p>'.wc_price($wcmvp_products_data_ssp['data'][$j][5]).'</p>';
                                }

                                if( ($wcmvp_prod[8] > $wcmvp_prod[5]) )
                                {
                                    $wcmvp_products_data_ssp['data'][$j][5] = '<p>'.wc_price($wcmvp_products_data_ssp['data'][$j][8]).'</p>';
                                }
                            }

                            // This variable is holding product's ids.

                            $wcmvp_vendor_prod_id = $wcmvp_products_data_ssp['data'][$j][0];

                            $wcmvp_products_data_ssp['data'][$j][0] = '<td class="mdc-data-table__cell mdc-data-table__cell--checkbox">
                                <div class="mdc-checkbox mdc-data-table__row-checkbox">
                                    <input type="checkbox" class="mdc-checkbox__native-control wcmvp_prod_inner_checkbox" data-class = "'.$wcmvp_vendor_prod_id.'" name = "wcmvp_prod_inner_check" />
                                    <div class="mdc-checkbox__background">
                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                        <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                    </svg>
                                    <div class="mdc-checkbox__mixedmark"></div>
                                    </div>
                                    <div class="mdc-checkbox__ripple"></div>
                                </div>
                            </td>';
                            $wcmvp_products_data_ssp['data'][$j][1] = "<img src = ".esc_url(wp_get_attachment_url($wcmvp_prod[1]))." class = 'wcmvp_prod_store_img' >";

                            $wcmvp_prod_cat = wp_get_post_terms( $wcmvp_vendor_prod_id, 'product_cat', array( 'fields' => 'names' )  );

                            //This variable is holding product post status

                            $wcmvp_prod_post_status = $wcmvp_products_data_ssp['data'][$j][6];

                            $wcmvp_products_data_ssp['data'][$j][6] = "";
                            
                            if( is_array($wcmvp_prod_cat) && !empty($wcmvp_prod_cat) )
                            {
                                foreach( $wcmvp_prod_cat as $name ) 
                                {
                                    if( isset($name) && !empty($name) )
                                    {
                                        if( !empty($wcmvp_products_data_ssp['data'][$j][6]) && ( !empty($name) ) ) 
                                        {
                                            $wcmvp_products_data_ssp['data'][$j][6] .= ", ". esc_html__($name,'wc-multi-vendor-platform-lite');
                                        }
                                        else
                                        {
                                            $wcmvp_products_data_ssp['data'][$j][6] = esc_html__($name,'wc-multi-vendor-platform-lite');
                                        }
                                    }
                                }   
                            }
                            $wcmvp_prod_tag = wp_get_post_terms( $wcmvp_vendor_prod_id, 'product_tag', array( 'fields' => 'names' )  );

                            $wcmvp_post_password = $wcmvp_products_data_ssp['data'][$j][7];
                            $wcmvp_products_data_ssp['data'][$j][7] = "";

                            if( is_array($wcmvp_prod_tag) && !empty($wcmvp_prod_tag) )
                            {	
                                
                                foreach( $wcmvp_prod_tag as $name ) 
                                {
                                    if( isset($name) && !empty($name) )
                                    {
                                        if( !empty($wcmvp_products_data_ssp['data'][$j][7]) && ( !empty($name) ) ) 
                                        {
                                            $wcmvp_products_data_ssp['data'][$j][7] .= ", ". esc_html__($name,'wc-multi-vendor-platform-lite');
                                        }
                                        else
                                        {
                                            $wcmvp_products_data_ssp['data'][$j][7] = esc_html__($name,'wc-multi-vendor-platform-lite');
                                        }
                                    }
                                    
                                }
                            }

                            $wcmvp_prod_visibility = wp_get_post_terms( $wcmvp_vendor_prod_id,'product_visibility',array('fields' => 'slugs' ) );

                            if( isset($wcmvp_prod_visibility) && is_array($wcmvp_prod_visibility) && !empty($wcmvp_prod_visibility) )
                            {
                                if( in_array('featured',$wcmvp_prod_visibility ))
                                {
                                    $wcmvp_products_data_ssp['data'][$j][8] = '<input type = "checkbox" checked class = "wcmvp_fav_prod wcmvp_star_checked" data-id="'.$wcmvp_vendor_prod_id.'" >';
                                }
                                else
                                {
                                    $wcmvp_products_data_ssp['data'][$j][8] = '<input type = "checkbox" class = "wcmvp_fav_prod wcmvp_star" data-id="'.$wcmvp_vendor_prod_id.'" >';
                                }
                            }
                            else
                            {
                                $wcmvp_products_data_ssp['data'][$j][8] = '<input type = "checkbox" class = "wcmvp_fav_prod wcmvp_star" data-id="'.$wcmvp_vendor_prod_id.'" >';
                            }

                            if( isset($wcmvp_prod[9]) && !empty($wcmvp_prod[9]) )
                            {
                                $wcmvp_products_data_ssp['data'][$j][9] = date( "j/m/Y", strtotime( $wcmvp_prod[9]) );
                            }

                            if( !empty($wcmvp_prod[2]))
                            {
                                $wcmvp_prod_name = $wcmvp_products_data_ssp['data'][$j][2];
                                if( (!empty($wcmvp_prod_name)) && ( isset($wcmvp_prod_post_status) && !empty($wcmvp_prod_post_status) ) )
                                {
                                    if( isset($wcmvp_post_password) && isset($wcmvp_sort_table) )
                                    {
                                        if( !empty($wcmvp_post_password) && (($wcmvp_sort_table == "draft") || ($wcmvp_sort_table == "pending") || ($wcmvp_sort_table == "private") || ($wcmvp_sort_table == "trash") || ($wcmvp_sort_table == "publish") ) )
                                        {
                                            $wcmvp_prod_name = $wcmvp_prod_name.'<span> - '.esc_html__(' Password protected','wc-multi-vendor-platform-lite').'</span>';
                                        }

                                        if( isset($wcmvp_sort_table) && !empty($wcmvp_sort_table) )
                                        {
                                            if( ($wcmvp_prod_post_status == "draft") && ($wcmvp_sort_table == "all") && empty($wcmvp_post_password) )
                                            {
                                                $wcmvp_prod_name = $wcmvp_prod_name.'<span> - '.esc_html__('Draft','wc-multi-vendor-platform-lite').'</span>';
                                            }
                                            if( ($wcmvp_prod_post_status == "draft") && ($wcmvp_sort_table == "all") && !empty($wcmvp_post_password) )
                                            {
                                                $wcmvp_prod_name = $wcmvp_prod_name.'<span> - '.esc_html__('Password Protected, Draft','wc-multi-vendor-platform-lite').'</span>';
                                            }
                                            if( ($wcmvp_prod_post_status == "private") && ($wcmvp_sort_table == "all") )
                                            {
                                                $wcmvp_prod_name = $wcmvp_prod_name.'<span> - '.esc_html__('Private','wc-multi-vendor-platform-lite').'</span>';
                                            }
                                            if( ($wcmvp_prod_post_status == "publish") && ($wcmvp_sort_table == "all") && !empty($wcmvp_post_password) )
                                            {
                                                $wcmvp_prod_name = $wcmvp_prod_name.'<span> - '.esc_html__('Password Protected','wc-multi-vendor-platform-lite').'</span>';
                                            }
                                            if( ($wcmvp_prod_post_status == "pending") && ($wcmvp_sort_table == "all") && empty($wcmvp_post_password) )
                                            {
                                                $wcmvp_prod_name = $wcmvp_prod_name.'<span> - '.esc_html__('Pending','wc-multi-vendor-platform-lite').'</span>';
                                            }
                                            if( ($wcmvp_prod_post_status == "pending") && ($wcmvp_sort_table == "all") && !empty($wcmvp_post_password) )
                                            {
                                                $wcmvp_prod_name = $wcmvp_prod_name.'<span> - '.esc_html__('Password Protected, Pending','wc-multi-vendor-platform-lite').'</span>';
                                            }
                                        }
                                    }

                                    if($wcmvp_prod_post_status == 'trash')
                                    {
                                        $wcmvp_products_data_ssp['data'][$j][2] = '<div class = "wcmvp_prod_name_box">
                                        <div>
                                            <a href = "#/product" class = "wcmvp_prod_name">'.$wcmvp_prod_name.'</a>
                                        </div>
                                        <div class = "wcmvp_prod_status_action">
                                            <a class = "wcmvp_prod_name_color">'.esc_html__('ID : '.$wcmvp_vendor_prod_id,'wc-multi-vendor-platform-lite').'</a>
                                            <a href = "#/product" class="wcmvp_prod_restore wcmvp_prod_edit" data-id='.esc_attr($wcmvp_vendor_prod_id).'>'.esc_html__('Restore','wc-multi-vendor-platform-lite').'</a>
                                            <a href = "#/product" class = "wcmvp_prod_trash_color wcmvp_prod_del_permanent" data-id='.esc_attr($wcmvp_vendor_prod_id).' >'.esc_html__('Delete Permanentaly','wc-multi-vendor-platform-lite').'</a>
                                            <a class = "wcmvp_prod_duplicate" href = "#/product">'.esc_html__('Duplicate','wc-multi-vendor-platform-lite').'</a>
                                        </div>	
                                    </div>';
                                }
                                    
                                    // $wcmvp_prod_no_name, This variable holds html.

                                else{
                                    $wcmvp_products_data_ssp['data'][$j][2] = '<div class = "wcmvp_prod_name_box">
                                        <div>
                                            <a href = "#/product" class = "wcmvp_prod_name">'.$wcmvp_prod_name.'</a>
                                        </div>
                                        <div class = "wcmvp_prod_status_action">
                                            <a class = "wcmvp_prod_name_color">'.esc_html__('ID : '.$wcmvp_vendor_prod_id,'wc-multi-vendor-platform-lite').'</a>
                                            <a href = "#/product" class="wcmvp_prod_edit" data-id='.esc_attr($wcmvp_vendor_prod_id).'>'.esc_html__('Edit','wc-multi-vendor-platform-lite').'</a>
                                            <a href = "#/product" class="wcmvp_prod_quick_edit" data-id='.esc_attr($wcmvp_vendor_prod_id).' data-target = #wcmvp_prod_quick_edit_modal data-toggle = modal>'.esc_html__('Quick Edit','wc-multi-vendor-platform-lite').'</a>
                                            <a class = "wcmvp_prod_trash_color wcmvp_prod_trash" href = "#/product">'.esc_html__('Trash','wc-multi-vendor-platform-lite').'</a>';
                                            if( $wcmvp_prod_post_status == 'publish' || $wcmvp_prod_post_status == 'private' )
                                            {$wcmvp_products_data_ssp['data'][$j][2].='<a class = "wcmvp_prod_preview" href = "#/product">'.esc_html__('View','wc-multi-vendor-platform-lite').'</a>';}
                                            else{
                                            $wcmvp_products_data_ssp['data'][$j][2].='<a class = "wcmvp_prod_preview" href = "#/product">'.esc_html__('Preview','wc-multi-vendor-platform-lite').'</a>';}
                                            $wcmvp_products_data_ssp['data'][$j][2].='<a href = "#/product" class="wcmvp_prod_duplicate">'.esc_html__('Duplicate','wc-multi-vendor-platform-lite').'</a>
                                        </div>
                                    </div>';
                                    }
                                }
                            }
                            else
                                {
                                    if( (empty($wcmvp_prod[2]))  )
                                    {
                                        $wcmvp_prod_no_name = '(no title)';

                                        if( isset($wcmvp_post_password) )
                                        {
                                            if( !empty($wcmvp_post_password) && (($wcmvp_sort_table == "draft") || ($wcmvp_sort_table == "pending") || ($wcmvp_sort_table == "private") || ($wcmvp_sort_table == "trash") || ($wcmvp_sort_table == "publish") ) )
                                            {
                                                $wcmvp_prod_no_name = $wcmvp_prod_no_name.'<span> - '.esc_html__(' Password protected','wc-multi-vendor-platform-lite').'</span>';
                                            }

                                            if( isset($wcmvp_sort_table) && !empty($wcmvp_sort_table) )
                                            {
                                                if( ($wcmvp_prod_post_status == "draft") && ($wcmvp_sort_table == "all") && empty($wcmvp_post_password) )
                                                {
                                                    $wcmvp_prod_no_name = $wcmvp_prod_no_name.'<span> - '.esc_html__('Draft','wc-multi-vendor-platform-lite').'</span>';
                                                }
                                                if( ($wcmvp_prod_post_status == "publish") && ($wcmvp_sort_table == "all") && !empty($wcmvp_post_password) )
                                                {
                                                    $wcmvp_prod_name = $wcmvp_prod_name.'<span> - '.esc_html__('Password Protected','wc-multi-vendor-platform-lite').'</span>';
                                                }
                                                if( ($wcmvp_prod_post_status == "draft") && ($wcmvp_sort_table == "all") && !empty($wcmvp_post_password) )
                                                {
                                                    $wcmvp_prod_no_name = $wcmvp_prod_no_name.'<span> - '.esc_html__('Password Protected, Draft','wc-multi-vendor-platform-lite').'</span>';
                                                }
                                                if( ($wcmvp_prod_post_status == "private") && ($wcmvp_sort_table == "all") )
                                                {
                                                    $wcmvp_prod_no_name = $wcmvp_prod_no_name.'<span> - '.esc_html__('Private','wc-multi-vendor-platform-lite').'</span>';
                                                }
                                                if( ($wcmvp_prod_post_status == "pending") && ($wcmvp_sort_table == "all") && empty($wcmvp_post_password) )
                                                {
                                                    $wcmvp_prod_no_name = $wcmvp_prod_no_name.'<span> - '.esc_html__('Pending','wc-multi-vendor-platform-lite').'</span>';
                                                }
                                                if( ($wcmvp_prod_post_status == "pending") && ($wcmvp_sort_table == "all") && !empty($wcmvp_post_password) )
                                                {
                                                    $wcmvp_prod_no_name = $wcmvp_prod_no_name.'<span> - '.esc_html__('Password Protected, Pending','wc-multi-vendor-platform-lite').'</span>';
                                                }
                                            }
                                        }

                                        if($wcmvp_prod_post_status == 'trash')
                                        {
                                            $wcmvp_products_data_ssp['data'][$j][2] = '<div class = "wcmvp_prod_name_box">
                                            <div>
                                                <a href = "#/product" class = "wcmvp_prod_name">'.$wcmvp_prod_no_name.'</a>
                                            </div>
                                            <div class = "wcmvp_prod_status_action">
                                                <a class = "wcmvp_prod_name_color">'.esc_html__('ID : '.$wcmvp_vendor_prod_id,'wc-multi-vendor-platform-lite').'</a>
                                                <a href = "#/product" class="wcmvp_prod_restore wcmvp_prod_edit" data-id='.esc_attr($wcmvp_vendor_prod_id).'>'.esc_html__('Restore','wc-multi-vendor-platform-lite').'</a>
                                                <a href = "#/product" class = "wcmvp_prod_trash_color wcmvp_prod_del_permanent" data-id='.esc_attr($wcmvp_vendor_prod_id).' >'.esc_html__('Delete Permanentaly','wc-multi-vendor-platform-lite').'</a>
                                                <a class = "wcmvp_prod_duplicate" href = "#/product">'.esc_html__('Duplicate','wc-multi-vendor-platform-lite').'</a>
                                            </div>	
                                        </div>';
                                        }

                                    // $wcmvp_prod_no_name, This variable holds html.
                                        else
                                        {
                                            $wcmvp_products_data_ssp['data'][$j][2] = '<div class = "wcmvp_prod_name_box">
                                                <div>
                                                    <a href = "#/product" class = "wcmvp_prod_name">'.($wcmvp_prod_no_name).'</a>
                                                </div>
                                                <div class = "wcmvp_prod_status_action">
                                                    <a class = "wcmvp_prod_name_color">'.esc_html__('ID : '.$wcmvp_vendor_prod_id,'wc-multi-vendor-platform-lite').'</a>
                                                    <a href = "#/product" class="wcmvp_prod_edit" data-id='.$wcmvp_vendor_prod_id.'>'.esc_html__('Edit','wc-multi-vendor-platform-lite').'</a>
                                                    <a href = "#/product" class="wcmvp_prod_quick_edit" data-id='.$wcmvp_vendor_prod_id.' data-target = #wcmvp_prod_quick_edit_modal data-toggle = modal>'.esc_html__('Quick Edit','wc-multi-vendor-platform-lite').'</a>
                                                    <a class = "wcmvp_prod_trash_color wcmvp_prod_trash" href = "#/product">'.esc_html__('Trash','wc-multi-vendor-platform-lite').'</a>
                                                    <a href = "#/product">'.esc_html__('View','wc-multi-vendor-platform-lite').'</a>
                                                    <a href = "#/product" class="wcmvp_prod_duplicate">'.esc_html__('Duplicate','wc-multi-vendor-platform-lite').'</a>
                                                </div>
                                            </div>';
                                        }
                                    }
                                }

                            $j++;
                        }
                    }
                }

            } 
        }
        echo json_encode( $wcmvp_products_data_ssp );
        do_action('wcmvp_multivendor_platform_vendors_product_table_loaded');
        wp_die();

        }

    }