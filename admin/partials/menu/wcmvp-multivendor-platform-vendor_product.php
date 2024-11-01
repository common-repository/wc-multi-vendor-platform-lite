<?php 

//=========== This file get included when need to show vendor's product as table on at admin end============//
//=========== This file get included when need to show vendor's product as table on at admin end============//

    if( !empty(get_option( 'wcmvp_sort_table_temp' )) )
    {
        $wcmvp_sort_table = get_option( 'wcmvp_sort_table_temp' );
        if(isset($wcmvp_sort_table) && !empty($wcmvp_sort_table))
        {
            ?>
                <input type = "hidden" id = "wcmvp_sort_table" value = "<?php 
                if(isset($wcmvp_sort_table))
                {
                    echo esc_attr($wcmvp_sort_table);
                }
                else 
                {
                    echo "all";
                } ?>" >
            <?php
        }
    }
    else
    {
        ?>
            <input type = "hidden" id = "wcmvp_sort_table" value = <?php esc_html_e('all','wc-multi-vendor-platform-lite') ?> >
        <?php
    }
    ?>
        
        
    <?php

    if( !empty(get_option('wcmvp_prod_count_vend_id')) )
        {
            $wcmvp_prod_count_vend_id = get_option('wcmvp_prod_count_vend_id');
            ?>
                <input type = "hidden" id = "wcmvp_pord_table" value = "<?php 
                if(isset($wcmvp_prod_count_vend_id))
                {
                    echo esc_attr($wcmvp_prod_count_vend_id);
                }
                else 
                {
                    echo 1;
                } ?>" >

                <?php

                global $wpdb;

                if( isset( $wcmvp_prod_count_vend_id ) && !empty( $wcmvp_prod_count_vend_id ) )
                {		
                    $wcmvp_prod_auth_id  = $wcmvp_prod_count_vend_id;
    
                    $where = get_posts_by_author_sql( 'product' );
    
                    $query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type = '%s' AND post_author = ".$wcmvp_prod_auth_id." AND (post_status = 'draft' OR post_status = 'private' OR post_status = 'publish' OR post_status = 'pending' ) " ;
                    $wcmvp_prod_all_count = $wpdb->get_var( $wpdb->prepare( $query, 'product' ) );
    
                    $query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = '%s' AND post_type = 'product' AND post_author = ".$wcmvp_prod_auth_id."";
                    $wcmvp_prod_publish_count = $wpdb->get_var( $wpdb->prepare( $query, 'publish' ) );
                    
                    $query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = '%s' AND post_type = 'product' AND post_author = ".$wcmvp_prod_auth_id."";
                    $wcmvp_prod_private_count = $wpdb->get_var( $wpdb->prepare( $query, 'private' ) );
                    
                    $query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = '%s' AND post_type = 'product' AND post_author = ".$wcmvp_prod_auth_id."";
                    $wcmvp_prod_draft_count = $wpdb->get_var( $wpdb->prepare( $query, 'draft' ) );
                    
                    $query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = '%s' AND post_type = 'product' AND post_author = ".$wcmvp_prod_auth_id."";
                    $wcmvp_prod_pending_count = $wpdb->get_var( $wpdb->prepare( $query, 'pending' ) );

                    $query = "SELECT COUNT(*) FROM $wpdb->posts WHERE post_status = '%s' AND post_type = 'product' AND post_author = ".$wcmvp_prod_auth_id."";
                    $wcmvp_prod_trash_count = $wpdb->get_var( $wpdb->prepare( $query, 'trash' ) );
    
                    $wcmvp_prod_count_array = array(
                        'wcmvp_prod_auth_id' => isset($wcmvp_prod_auth_id) ? $wcmvp_prod_auth_id : 0,
                        'wcmvp_prod_all_count' => isset($wcmvp_prod_all_count) ? $wcmvp_prod_all_count : 0,
                        'wcmvp_prod_publish_count' => isset($wcmvp_prod_publish_count) ? $wcmvp_prod_publish_count : 0,
                        'wcmvp_prod_draft_count' => isset($wcmvp_prod_draft_count) ? $wcmvp_prod_draft_count : 0,
                        'wcmvp_prod_pending_count' => isset($wcmvp_prod_pending_count) ? $wcmvp_prod_pending_count : 0,
                        'wcmvp_prod_private_count' => isset($wcmvp_prod_private_count) ? $wcmvp_prod_private_count : 0
                    );
    
                    update_option( 'wcmvp_prod_count_vend_id',$wcmvp_prod_count_array['wcmvp_prod_auth_id'] );
                }
        }
                $all = isset($wcmvp_prod_all_count) ? $wcmvp_prod_all_count : 0 ;
                $public = isset($wcmvp_prod_publish_count) ? $wcmvp_prod_publish_count : 0 ;
                $draft = isset($wcmvp_prod_draft_count) ? $wcmvp_prod_draft_count : 0 ;
                $pending = isset($wcmvp_prod_pending_count) ? $wcmvp_prod_pending_count : 0 ;
                $trash = isset($wcmvp_prod_trash_count) ? $wcmvp_prod_trash_count : 0 ;
                $private = isset($wcmvp_prod_private_count) ? $wcmvp_prod_private_count : 0 ; 
                $vendor = isset($wcmvp_prod_count_vend_id) ? $wcmvp_prod_count_vend_id : 1 ; 
        
    ?>
    <h3>Products      
    <a href="#/product" data-id = "<?php echo esc_attr($vendor); ?>" id="wcmvp_add_new_prod" class="mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_add_new_prod ">
        <i class='wcmvp-fa-fa-space fas fa-cube'> </i>
        <?php esc_html_e(' Add Product','wc-multi-vendor-platform-lite') ?>
    </a>
    </h3>
    <div class = "wcmvp_bulk_action">
   
        <div class = "wcmvp_prod_sorting" id="wcmvp-prod-sorting-tabs">
            <?php 
                $wcmvp_product_sorting_tabs = array(
                    "<a href = '#' id = 'wcmvp_sort_all' class = 'mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_status' data-value = 'all' > ".esc_html__('All('. $all .')','wc-multi-vendor-platform-lite')."</a>",
                    
                    "<a href = '#' id = 'wcmvp_sort_publish' class = 'mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_status' data-value = 'publish' > ".esc_html__('Published('. $public .')','wc-multi-vendor-platform-lite')."</a>",
                    
                    "<a href = '#' id = 'wcmvp_sort_draft' class = 'mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_status' data-value = 'draft' > ".esc_html__('Draft('. $draft .')','wc-multi-vendor-platform-lite')."</a>",
                    
                    "<a href = '#' id = 'wcmvp_sort_pending' class = 'mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_status' data-value = 'pending' > ".esc_html__('Pending('. $pending .')','wc-multi-vendor-platform-lite')."</a>",
                    
                    "<a href = '#' id = 'wcmvp_sort_trash' class = 'mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_status' data-value = 'trash' > ".esc_html__('Trash('. $trash .')','wc-multi-vendor-platform-lite')."</a>",
                    
                    "<a href = '#' id = 'wcmvp_sort_private' class = 'mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_sort_by_status' data-value = 'private' > ".esc_html__('Private('. $private .')','wc-multi-vendor-platform-lite')."</a>"
                );

                if( isset($wcmvp_product_sorting_tabs) && is_array($wcmvp_product_sorting_tabs) )
                {
                    $wcmvp_product_sorting_tabs = apply_filters('wcmvp_product_sorting_tabs',$wcmvp_product_sorting_tabs);
                    if( isset($wcmvp_product_sorting_tabs) && is_array($wcmvp_product_sorting_tabs) )
                    {
                        foreach($wcmvp_product_sorting_tabs as $tabs)
                        {
                            if( isset($tabs) )
                            {
                                //====$tabs contains html===========//
                                echo $tabs;
                            }
                        }
                    }
                }

            ?>
            
        </div>
        <select name="action" id="wcmvp_prod_bulk_action" class="wcmvp_select_bg">
            <option value = "wcmvp_not_selected"><?php esc_html_e( 'Bulk Actions','wc-multi-vendor-platform-lite' ); ?></option>
            <option class = "wcmvp_prod_bul_trash" value = "wcmvp_bulk_trash_prod"><?php esc_html_e( 'Move To Trash','wc-multi-vendor-platform-lite' ); ?></option>
            <option class = "wcmvp_prod_bul_untrash" value = "wcmvp_bulk_restore_prod"><?php esc_html_e( 'Restore','wc-multi-vendor-platform-lite' ); ?></option>
            <option class = "wcmvp_prod_bul_untrash" value = "wcmvp_bulk_delete_prod"><?php esc_html_e( 'Delete Permanently','wc-multi-vendor-platform-lite' ); ?></option>
        </select>
        <button class="mdc-button mdc-button--outlined mdc-ripple-upgraded wcmvp_vendor_apply_bulk wcmvp_add_new_prod" id="wcmvp_vendor_apply_bulk">
            <span class="mdc-button__label wcmvp_label_text"><?php esc_html_e('Apply', 'wc-multi-vendor-platform-lite'); ?></span>
            <div class="mdc-button__ripple"></div>
        </button> 
        <?php $wcmvp_prod_cat = array(
            'show_option_all'  => '',
            'show_option_none' => 'Select Category',
            'taxonomy'         => 'product_cat',
            'id'               => 'wcmvp_filter_by_cat', 
            'class'            => 'wcmvp_select_bg'
            
        );
        wp_dropdown_categories($wcmvp_prod_cat); 
        
        $wcmvp_prod_typ = array(
            'show_option_all'  => '',
            'show_option_none' => 'Filter By Product Type',
            'taxonomy'         => 'product_type',
            'id'               => 'wcmvp_filter_by_prod_type',
            'class'            => 'wcmvp_select_bg'
        );
        wp_dropdown_categories($wcmvp_prod_typ); 

        $wcmvp_prod_stock = array(
            'show_option_all'  => '',
            'show_option_none' => 'Filter By Product Stock',
            'taxonomy'         => 'product_visibility',
            'id'               => 'wcmvp_filter_by_prod_stock',
            'class'            => 'wcmvp_select_bg' 
        );
        wp_dropdown_categories($wcmvp_prod_stock); 
        ?>
        <input type = "submit" id = "wcmvp_prod_filter_button" class = "mdc-button mdc-button--outlined mdc-ripple-upgraded wcmvp_border_color_btn wcmvp_add_new_prod wcmvp_label_text" value = "Filter">
        <input type = "submit" id = "wcmvp_empty_trash" class = "mdc-button mdc-button--outlined mdc-ripple-upgraded wcmvp_border_color_btn" value = "Empty Trash">

    </div>

        <table id="wcmvp_vendors_product_table" class="wcmvp_vendors_product_table mdl-data-table">

            <thead>
                <tr>
                <th class="mdc-data-table__cell mdc-data-table__cell--checkbox">
                        <div class="mdc-checkbox mdc-data-table__row-checkbox">
                            <input type="checkbox" class="mdc-checkbox__native-control wcmvp_product_outer_checkbox">
                            <div class="mdc-checkbox__background">
                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                            </svg>
                            <div class="mdc-checkbox__mixedmark"></div>
                            </div>
                            <div class="mdc-checkbox__ripple"></div>
                        </div>
				    </th>
                    <th><?php esc_html_e( 'Image','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Name','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'SKU','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Stock','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Price','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Categories','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Tags','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Featured','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Date','wc-multi-vendor-platform-lite' ); ?></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                <th class="mdc-data-table__cell mdc-data-table__cell--checkbox">
                        <div class="mdc-checkbox mdc-data-table__row-checkbox">
                            <input type="checkbox" class="mdc-checkbox__native-control wcmvp_product_outer_checkbox">
                            <div class="mdc-checkbox__background">
                            <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                            </svg>
                            <div class="mdc-checkbox__mixedmark"></div>
                            </div>
                            <div class="mdc-checkbox__ripple"></div>
                        </div>
				    </th>
                    <th><?php esc_html_e( 'Image','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Name','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'SKU','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Stock','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Price','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Categories','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Tags','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Featured','wc-multi-vendor-platform-lite' ); ?></th>
                    <th><?php esc_html_e( 'Date','wc-multi-vendor-platform-lite' ); ?></th>
                </tr>
            </tfoot>
        </table> 

    <div class='wcmvp-modal' id='wcmvp_prod_edit_modal'>
        <div class='wcmvp-modal-dialog wcmvp_modal_dialog_for_prod'>

            <div class='wcmvp-modal-content wcmvp_fix_height_content_for_iframe'>
                <div class='wcmvp-modal-header'>
                    <h4 class='wcmvp-modal-title wcmvp_hide_edit_frame'><?php esc_html_e( 'Edit Product','wc-multi-vendor-platform-lite' ); ?></h4>
                    <h4 class='wcmvp-modal-title wcmvp_hide_add_frame'><?php esc_html_e( 'Add Product','wc-multi-vendor-platform-lite' ); ?></h4>
                    <h4 class='wcmvp-modal-title wcmvp_duplicate_add_frame'><?php esc_html_e( 'Duplicate Product','wc-multi-vendor-platform-lite' ); ?></h4>
                    <button  class="mdc-button wcmvp-modal-close">
					    <i class="material-icons" aria-hidden="true"><?php echo esc_html('highlight_off'); ?></i>
					</button>
  
                </div>
                 
                <div class = 'wcmvp-modal-body wcmvp_fix_height_body_for_iframe'>
                    <iframe class="wcmvp_prod_frame wcmvp_hide_edit_frame" id="wcmvp_vend_prod_frame">
                    <?php do_action('wcmvp_edit_product'); ?>                        
                    </iframe>
                    <iframe class="wcmvp_prod_frame wcmvp_hide_add_frame" id="wcmvp_add_prod_frame" src=>
                    <?php do_action('wcmvp_add_product'); ?>                        
                    </iframe>
                    <iframe class="wcmvp_prod_frame wcmvp_duplicate_add_frame" id="wcmvp_duplicate_frame" >               
                    <?php do_action('wcmvp_duplicate_product'); ?>                                 
                    </iframe>
                </div>
                <div class="loader"></div>
            </div>
        </div>
    </div>

    <div class='wcmvp-modal' id='wcmvp_prod_quick_edit_modal'>
        <div class='wcmvp-modal-dialog wcmvp_modal_dialog_for_quick_edit'>
            <div class='wcmvp-modal-content'>
            
                <div class='wcmvp-modal-header'>
                    <h4 class='wcmvp-modal-title'><?php esc_html_e( 'Edit Product','wc-multi-vendor-platform-lite' ); ?></h4>
                    <button  class="mdc-button wcmvp-modal-close">
					    <i class="material-icons" aria-hidden="true"><?php echo esc_html('highlight_off'); ?></i>
					</button>
                </div>
                
                <?php do_action('wcmvp_product_quick_edit_section'); ?>
               <div class = 'wcmvp-modal-body'>
                    <div class = "wcmvp-section-content ">
                        <div clas = "wcmvp-setting-heading">
                            <div class = "wcmvp-subsetting-content" id="">
                                <div class="wcmvp_prod_headings"><?php esc_html_e('Quick Edit','wc-multi-vendor-platform-lite'); ?></div>
                                <ul class = "">
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'Title','wc-multi-vendor-platform-lite' ); ?></label>
                                        <span>
                                            <label class="mdc-text-field mdc-text-field--outlined w-100">
                                                <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id = "wcmvp_prod_title">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label" ><?php esc_html_e('Product Title','wc-multi-vendor-platform-lite'); ?></span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
								        </span>
						            </li>
                                  
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'Slug','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span>
                                            <label class="mdc-text-field mdc-text-field--outlined w-100">
                                                <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id = "wcmvp_prod_slug">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label" ><?php esc_html_e('Product Slug','wc-multi-vendor-platform-lite'); ?></span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
								        </span>
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'Date','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span>
                                            <label class="mdc-text-field mdc-text-field--outlined">
                                                <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id = "wcmvp_prod_published_date">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label" ><?php esc_html_e('Date','wc-multi-vendor-platform-lite'); ?></span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
                                            <?php esc_html_e('at','wc-multi-vendor-platform-lite'); ?>
                                            <label class="mdc-text-field mdc-text-field--outlined">
                                                <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id = "wcmvp_prod_published_time">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label"><?php esc_html_e('Time','wc-multi-vendor-platform-lite'); ?></span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
								        </span>
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'password','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span>
                                            <label class="mdc-text-field mdc-text-field--outlined">
                                                <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id = "wcmvp_prod_password">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label" ><?php esc_html_e('Enter your password','wc-multi-vendor-platform-lite'); ?></span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
                                            <?php esc_html_e('-OR-','wc-multi-vendor-platform-lite'); ?>
                                            <div class="mdc-checkbox mdc-data-table__row-checkbox  mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded wcmvp-margin-top" >
                                                <input type="checkbox" class="mdc-checkbox__native-control" id='wcmvp_prod_private'>
                                                <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                    <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
									        </div><?php esc_html_e('Private','wc-multi-vendor-platform-lite'); ?>
								        </span>
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'Product Tags','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span>
                                            <label class="mdc-text-field mdc-text-field--textarea mdc-text-field--no-label">
                                                <textarea class="mdc-text-field__input"  aria-label="Label" id="wcmvp_prod_tag"></textarea>
                                                <span class="mdc-notched-outline">
                                                    <span class="mdc-notched-outline__leading"></span>
                                                    <span class="mdc-notched-outline__trailing"></span>
                                                </span>
                                            </label>
                                            <p><?php esc_html_e('Separate tags with commas','wc-multi-vendor-platform-lite'); ?></p>
                                        </span>
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'Enable Reviews','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span class="wcmvp-d-flex-enable-span">
                                            <div class="mdc-checkbox mdc-data-table__row-checkbox  mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id = "wcmvp_prod_enable_reviews">
                                                <div class="mdc-checkbox__background">
                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                    <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                </svg>
                                                <div class="mdc-checkbox__mixedmark"></div>
                                                </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                            </div> 
                                            <span><?php esc_html_e( 'Enable Reviews','wc-multi-vendor-platform-lite' ); ?></span>
								        </span>
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'Status?','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <div class="wcmvp_select_box">
                                            <select class="wcmvp-select-text"  id = "wcmvp_prod_status">
                                                <option value="publish"><?php esc_html_e( 'Published','wc-multi-vendor-platform-lite' ); ?></option>
                                                <option value="pending"><?php esc_html_e( 'Pending Review ','wc-multi-vendor-platform-lite' ); ?></option>
                                                <option value="draft"><?php esc_html_e( 'Draft ','wc-multi-vendor-platform-lite' ); ?></option>
                                            </select>
                                            <label class="wcmvp_select_label"><?php esc_html_e( 'Product Status','wc-multi-vendor-platform-lite' ); ?></label>
                                        </div>
                                    </li>
                                    <div class="wcmvp_prod_headings"><?php esc_html_e('Product Data','wc-multi-vendor-platform-lite'); ?></div>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'SKU','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span>
                                            <label class="mdc-text-field mdc-text-field--outlined w-100">
                                                <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id = "wcmvp_prod_sku">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label" ><?php esc_html_e( 'Product SKU','wc-multi-vendor-platform-lite' ); ?></span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
								        </span>
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'Price','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span>
                                            <label class="mdc-text-field mdc-text-field--outlined w-100">
                                                <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id = "wcmvp_prod_price">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label" ><?php esc_html_e( 'Regular Price','wc-multi-vendor-platform-lite' ); ?></span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
								        </span>
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'Sale','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span>
                                            <label class="mdc-text-field mdc-text-field--outlined w-100">
                                                <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id = "wcmvp_prod_sale_price">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label" ><?php esc_attr_e('Sale Price','wc-multi-vendor-platform-lite'); ?></span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
								        </span>
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'Weight','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span>
                                            <label class="mdc-text-field mdc-text-field--outlined w-100">
                                                <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id = "wcmvp_prod_weight">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label" ><?php esc_html_e( 'Weight','wc-multi-vendor-platform-lite' ); ?></span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
								        </span>
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'L/W/H','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span class="wcmvp_lwh_span">
                                           
                                            <label class="mdc-text-field mdc-text-field--outlined">
                                                <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id="wcmvp_prod_length">
                                                <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                    <div class="mdc-notched-outline__leading"></div>
                                                    <div class="mdc-notched-outline__notch">
                                                    <span class="mdc-floating-label" ><?php esc_attr_e('Length','wc-multi-vendor-platform-lite'); ?></span>
                                                    </div>
                                                    <div class="mdc-notched-outline__trailing"></div>
                                                </div>
                                            </label>
                                            
                                            <label class="mdc-text-field mdc-text-field--outlined">
                                                    <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id="wcmvp_prod_width">
                                                    <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                        <span class="mdc-floating-label" ><?php esc_attr_e('Width','wc-multi-vendor-platform-lite'); ?></span>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                            </label>
                                            
                                            <label class="mdc-text-field mdc-text-field--outlined">
                                                    <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id="wcmvp_prod_height">
                                                    <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                        <span class="mdc-floating-label" ><?php esc_attr_e('Height','wc-multi-vendor-platform-lite'); ?></span>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                            </label>
                                             
								        </span>
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'Shipping Class','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <div class="wcmvp_select_box">
                                            <?php 
                                                $wcmvp_shipping_classes = get_terms( array('taxonomy' => 'product_shipping_class', 'hide_empty' => false ) );
                                                if( is_array($wcmvp_shipping_classes) && isset($wcmvp_shipping_classes) )
                                                {
                                                    $wcmvp_ship_class_html = '<select class="wcmvp_prod_quick_size wcmvp-select-text" id="wcmvp_prod_shipping_class">';
                                                    $wcmvp_ship_class_html .= '<option value="'.esc_attr('_no_shipping_class').'">'.esc_attr__('No shipping class','wc-multi-vendor-platform-lite').'</option>';
                                                    foreach($wcmvp_shipping_classes as $key)
                                                    {
                                                        $wcmvp_ship_class_html .= '<option value="'.esc_attr($key->slug).'">'.esc_html__($key->description).'</option>';
                                                    } 
                                                    $wcmvp_ship_class_html .= '</select>';
                                                    $wcmvp_ship_class_html .= '<label class="wcmvp_select_label">'.esc_html__('Shipping Class','wc-multi-vendor-platform-lite').'</label>';

                                            ///========"$wcmvp_ship_class_html" Variable Holds html==//                                              
                                                    echo($wcmvp_ship_class_html);
                                                }
                                            ?>
                                        </div>
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e( 'Visibility','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <div class="wcmvp_select_box wcmvp-select-left-margin">
                                            <select class="wcmvp-select-text" required id = "wcmvp_prod_visibility">
                                                <option value="visible"><?php esc_html_e( 'Catalog & Search','wc-multi-vendor-platform-lite' ); ?></option>
                                                <option value="catalog"><?php esc_html_e( 'Catalog ','wc-multi-vendor-platform-lite' ); ?></option>
                                                <option value="search"><?php esc_html_e( 'Search','wc-multi-vendor-platform-lite' ); ?></option>
                                                <option value="hidden"><?php esc_html_e( 'Hidden','wc-multi-vendor-platform-lite' ); ?></option>
                                            </select>
                                            <label class="wcmvp_select_label"><?php esc_html_e( 'Select','wc-multi-vendor-platform-lite' ); ?></label>
                                        </div>
                                            <span class ="wcmvp-d-flex-enable-span">
                                                <div class="mdc-checkbox mdc-data-table__row-checkbox  mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
                                                    <input type="checkbox" class="mdc-checkbox__native-control" id = "wcmvp_prod_prod_featured_slug">
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                        </svg>
                                                    <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                    <div class="mdc-checkbox__ripple"></div>
                                                </div>
                                                <span><?php esc_html_e('Featured','wc-multi-vendor-platform-lite'); ?></span>
                                            </span>
                                            
                                       
                                    </li>
                                    <li class="wcmvp-d-flex">
                                        <label><?php esc_html_e('Manage Stock','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span class ="wcmvp-d-flex-enable-span">
                                            <div class="mdc-checkbox mdc-data-table__row-checkbox mdc-checkbox--upgraded mdc-ripple-upgraded mdc-ripple-upgraded--unbounded">
                                                <input type="checkbox" class="mdc-checkbox__native-control" id="wcmvp_prod_manage_stock">
                                                    <div class="mdc-checkbox__background">
                                                        <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                            <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                        </svg>
                                                        <div class="mdc-checkbox__mixedmark"></div>
                                                    </div>
                                                <div class="mdc-checkbox__ripple"></div>
                                               
                                            </div> 
                                            <span><?php esc_html_e( 'Manage Stock','wc-multi-vendor-platform-lite' ); ?></span>
								        </span>
                                    </li>
                                    <div id="wcmvp_prod_stock_manage">
                                        <li class="wcmvp-d-flex">
                                            <label><?php esc_html_e( 'Stock qty','wc-multi-vendor-platform-lite' ); ?> </label>
                                            <span>
                                                <label class="mdc-text-field mdc-text-field--outlined w-100">
                                                    <input type="text" class="wcmvp_quick_edit_modal_data mdc-text-field__input" id = "wcmvp_prod_stock_qty">
                                                    <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                                        <div class="mdc-notched-outline__leading"></div>
                                                        <div class="mdc-notched-outline__notch">
                                                        <span class="mdc-floating-label" ><?php esc_html_e( 'Quantity','wc-multi-vendor-platform-lite' ); ?></span>
                                                        </div>
                                                        <div class="mdc-notched-outline__trailing"></div>
                                                    </div>
                                                </label>
                                            </span>
                                        </li>
                                        <li class="wcmvp-d-flex">
                                            <label><?php esc_html_e( 'Backorders','wc-multi-vendor-platform-lite' ); ?> </label>
                                            <div class="wcmvp_select_box">
                                                <select class="wcmvp-select-text"  id = "wcmvp_prod_backorders">
                                                    <option value="no"><?php esc_html_e( 'Do not allow','wc-multi-vendor-platform-lite' ); ?></option>
                                                    <option value="notify"><?php esc_html_e( 'Allow, but notify customer ','wc-multi-vendor-platform-lite' ); ?></option>
                                                    <option value="yes"><?php esc_html_e( 'Allow','wc-multi-vendor-platform-lite' ); ?></option>
                                                </select>
                                                <label class="wcmvp_select_label"><?php esc_html_e( 'Backorders','wc-multi-vendor-platform-lite' ); ?></label>
                                             </div>
                                        </li>
                                    </div>
                                    <div id="wcmvp_prod_stock_status_div">
                                        <li class="wcmvp-d-flex">
                                            <label><?php esc_html_e( 'In stock?','wc-multi-vendor-platform-lite' ); ?> </label>
                                            <div class="wcmvp_select_box">
                                                <select class="wcmvp-select-text"  id = "wcmvp_prod_stock_status">
                                                    <option value="instock"><?php esc_html_e( 'In stock','wc-multi-vendor-platform-lite' ); ?></option>
                                                    <option value="outofstock"><?php esc_html_e( 'Out of stock ','wc-multi-vendor-platform-lite' ); ?></option>
                                                    <option value="onbackorder"><?php esc_html_e( 'On backorder ','wc-multi-vendor-platform-lite' ); ?></option>
                                                </select>
                                                <label class="wcmvp_select_label"><?php esc_html_e( 'In Stock?','wc-multi-vendor-platform-lite' ); ?></label>
                                             </div>
                                        </li>
                                    </div>
                                    
                                    <li>
                                        <label for = "wcmvp_prod_category" class='wcmvp_prod_cat_label'> <?php esc_html_e( 'Product Category','wc-multi-vendor-platform-lite' ); ?> </label>
                                        <span class="wcmvp-catagory-section">
                                            <?php 
                                            $taxonomy     = 'product_cat';
                                            $orderby      = 'name';
                                            $empty        = 0;
                                            
                                            $args = array(
                                                'taxonomy'     => $taxonomy,
                                                'orderby'      => $orderby,
                                                'hide_empty'   => $empty
                                            );
                                            
                                            $all_categories = get_categories( $args );
                                            if( is_array($all_categories) && isset($all_categories) && !empty($all_categories) )
                                            {
                                                foreach ($all_categories as $cat) {
                                                    
                                                    if( isset($cat) && is_object($cat) && !empty($cat) )
                                                    {
                                                        if( isset($cat->category_parent) && isset($cat->term_id) )
                                                        {
                                                            if($cat->category_parent == 0) {
                                                        
                                                                $category_id = $cat->term_id;

                                                                if( isset($category_id) && !empty($category_id) )
                                                                {
                                                                    ?>
                                                                        <p>
                                                                            <div class="mdc-checkbox mdc-data-table__row-checkbox ">
                                                                                <input type="checkbox" class="mdc-checkbox__native-control wcmvp_prod_post_cat" value="<?php echo esc_attr( $cat->name ); ?>" aria-labelledby="u0"><span class='wcmvp_prod_cat_display_input'><?php esc_html_e($cat->name,'wc-multi-vendor-platform-lite'); ?></span>
                                                                                <div class="mdc-checkbox__background">
                                                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                                                    <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                                                    </svg>
                                                                                <div class="mdc-checkbox__mixedmark"></div>
                                                                                </div>
                                                                                <div class="mdc-checkbox__ripple"></div>
                                                                            </div>
                                                                        </p>
                                                                    <?php
                                                            
                                                                    $args2 = array(
                                                                        'taxonomy'     => $taxonomy,
                                                                        'parent'       => $category_id,
                                                                        'orderby'      => $orderby,
                                                                        'hide_empty'   => $empty
                                                                    );
                                                            
                                                                    $sub_cats = get_categories( $args2 );
                                                                    if( isset($sub_cats) && !empty($sub_cats)) {
                                                            
                                                                        foreach($sub_cats as $sub_category) {

                                                                            if( isset($sub_category) && !empty($sub_category) )
                                                                            {
                                                                                ?>
                                                                                    <p class="wcmvp_prod_child_cat ">
                                                                                        <div class="mdc-checkbox mdc-data-table__row-checkbox wcmvp_prod_child_cat">
                                                                                            <input type="checkbox" class="mdc-checkbox__native-control wcmvp_prod_post_cat" value="<?php echo esc_attr( $sub_category->name ); ?>" aria-labelledby="u0"><span class='wcmvp_prod_cat_display_input'><?php esc_html_e($sub_category->name,'wc-multi-vendor-platform-lite'); ?></span>
                                                                                            <div class="mdc-checkbox__background">
                                                                                                <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                                                                <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                                                                </svg>
                                                                                            <div class="mdc-checkbox__mixedmark"></div>
                                                                                            </div>
                                                                                            <div class="mdc-checkbox__ripple"></div>
                                                                                        </div>
                                                                                    </p>
                                                                                <?php

                                                                                $args3 = array(
                                                                            'taxonomy'     => $taxonomy,
                                                                            'parent'       => $sub_category->term_id,
                                                                            'orderby'      => $orderby,
                                                                            'hide_empty'   => $empty
                                                                        );
                                                                
                                                                        $sub_cats3 = get_categories( $args3 );
                                                                        if( isset($sub_cats3) && !empty($sub_cats3) ) {
                                                                
                                                                            foreach($sub_cats3 as $sub_category3) {
                                                                                
                                                                                if( isset($sub_category3) && !empty($sub_category3) )
                                                                                {
                                                                                    ?>
                                                                                        <p class="wcmvp_prod_sub_child_cat ">
                                                                                            <div class="mdc-checkbox mdc-data-table__row-checkbox">
                                                                                                <input type="checkbox" class="mdc-checkbox__native-control wcmvp_prod_post_cat" value="<?php echo esc_attr( $sub_category3->name ); ?>" aria-labelledby="u0"><span class='wcmvp_prod_cat_display_input'><?php esc_html_e($sub_category3->name,'wc-multi-vendor-platform-lite'); ?></span>
                                                                                                <div class="mdc-checkbox__background">
                                                                                                    <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                                                                                                    <path class="mdc-checkbox__checkmark-path" fill="none" d="M1.73,12.91 8.1,19.28 22.79,4.59"></path>
                                                                                                    </svg>
                                                                                                <div class="mdc-checkbox__mixedmark"></div>
                                                                                                </div>
                                                                                            <div class="mdc-checkbox__ripple"></div>
                                                                                            </div>
                                                                                        </p>
                                                                                    <?php
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }       
                                                            }
                                                        }       
                                                    }
                                                }
                                            } ?>
                                        </span> 
                                    </li>
                                </ul>
                                <?php do_action('wcmvp_addmeta_for_quick_edit_of_product'); ?>
                            </div>
                        </div>
                    </div>
                </div>                <div class='wcmvp-modal-footer'>
                    <input type="hidden" id="wcmvp_quick_edit_update" data-id="">                                            
                    <input type="hidden" id="wcmvp_edit_update" data-id="">
                    <button type="button" id="wcmvp_prod_quick_edit_update" class="mdc-button mdc-button--raised mdc-ripple-upgraded">
                        <span class="mdc-button__label"><?php esc_html_e( 'Update','wc-multi-vendor-platform-lite' ); ?></span>
                        <div class="mdc-button__ripple"></div>
					</button>                       
                </div>
                
            </div>
        </div>
    </div>