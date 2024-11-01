<!-- This file contains the code for store page -->
<?Php
global $wpdb;
global $wp;

$wcmvp_options_page_array  =  get_option('wcmvp_page_setting');

$wcmvp_options_array  =  get_option('wcmvp_general_setting');

if(is_array($wcmvp_options_array)){
    $wcmvp_endpoint_page = $wcmvp_options_array['wcmvp_store_url'];
}
else{
    $wcmvp_endpoint_page = "";
}
$wcmvp_var  =  get_query_var('wcmvp_nicename');
$wcmvp_vendor_detail_obj  =  get_user_by('slug', $wcmvp_var);
if (is_object($wcmvp_vendor_detail_obj)) {
    $wcmvp_vendor_id = $wcmvp_vendor_detail_obj->data->ID;
}
if (isset($wcmvp_vendor_id)) {
    $wcmvp_cap = user_can($wcmvp_vendor_id, "multivendor-platformr");

    $wcmvp_args = array(
        'author'        =>  $wcmvp_vendor_id,
        'post_type'     => 'product',
        'posts_per_page' => -1
    );

    $wcmvp_current_user_posts = get_posts($wcmvp_args);

    if (is_user_logged_in()) {
        $wcmvp_user = wp_get_current_user();
        $wcmvp_user_name = $wcmvp_user->data->user_nicename;
        $wcmvp_user_email = $wcmvp_user->data->user_email;
    } else {
        $wcmvp_user_name = "";
        $wcmvp_user_email = "";
    }

$wcmvp_endpoint  =  get_query_var('wcmvp_pagename');

    get_header();
    if ($wcmvp_cap) {
        $args = array(
                    'taxonomy'   => "product_cat",
                    'title_li'            => "",
                    'orderby'    => "",
                    'order'      => "ASC",
                    'hide_empty' => "",
                    'echo'   => 0
                );
  $wcmvp_map_per = get_option('wcmvp_appearence_page');

  if (is_array($wcmvp_map_per)) {
                    $wcmvp_map_show = $wcmvp_map_per['wcmvp_enable_map'];
                } else {
                    $wcmvp_map_show = 0;
                }


        $wcmvp_endpoint_html[] = '<div class="wcmvp-d-flex">';
           $wcmvp_endpoint_html[] = '<div class="wcmvp_store_sidebar">
           <div class="wcmvp_category_box mdc-elevation--z3">
                <h5 class="text-black-50">
                    <input type="hidden" id="wcmvp_url_path" data-value="'. esc_url(home_url() . "/" . $wcmvp_endpoint_page . "/" . $wcmvp_var).'">';
                     if (!empty($wcmvp_current_user_posts)) {
                     $wcmvp_endpoint_html[]= esc_html__("Store Product Category", "wc-multi-vendor-platform-lite");
                    } else {
                      $wcmvp_endpoint_html[] .=  esc_html__(" No category Found ", "wc-multi-vendor-platform-lite");
                    } 
                $wcmvp_endpoint_html[] =  '</h5>
                <div class="wcmvp-border-bottom"></div>'. 
                wp_list_categories($args).'</div>';
                if ($wcmvp_map_show == 1) {
                   $wcmvp_current_map = $wcmvp_map_per['wcmvp_current_using_map'];
                   if($wcmvp_current_map=="googlemap"){
                    
                    $wcmvp_endpoint_html[] = '<div class="wcmvp_map_box mdc-elevation--z3">
                        <h5>'. esc_html__("Store Location", "wc-multi-vendor-platform-lite")  .'</h5>
                        <div class="wcmvp-border-bottom"></div>
                        <div class="wcmvp_map"></div>
                    </div>';
                }else{
                    $wcmvp_mapbox = get_user_meta(get_current_user_id(),"wcmvp_map_api_key",true);
                    $wcmvp_endpoint_html[] = '<div class="wcmvp_map_box mdc-elevation--z3" data-value="'. esc_attr__( $wcmvp_mapbox ,"wc-multi-vendor-platform-lite").'">
                        <h5>'. esc_html__("Store Location", "wc-multi-vendor-platform-lite")  .'</h5>
                        <div class="wcmvp-border-bottom"></div>
                        <div class="wcmvp_map">
                        </div>
                    </div>';  
                } 
            }
            $wcmvp_widget = get_user_meta($wcmvp_vendor_id, "wcmvp_show_time_widget", true);
            if ($wcmvp_widget == '1') {
                $wcmvp_widget_array = get_user_meta($wcmvp_vendor_id, "wcmvp_store_time_widget", true);
                if (is_array($wcmvp_widget_array)) {
                    if ($wcmvp_widget_array['Sunday']['status'] == 'close') {
                        $wcmvp_sun_status = "Close";
                    } else {
                        $wcmvp_sun_status = $wcmvp_widget_array['Sunday']['store_open-time'] . "-" . $wcmvp_widget_array['Sunday']['store_close_time'];
                    }
                    if ($wcmvp_widget_array['Monday']['status'] == 'close') {
                        $wcmvp_mon_status = "Close";
                    } else {
                        $wcmvp_mon_status = $wcmvp_widget_array['Monday']['store_open-time'] . "-" . $wcmvp_widget_array['Monday']['store_close_time'];
                    }
                    if ($wcmvp_widget_array['Tuesday']['status'] == 'close') {
                        $wcmvp_tues_status = "Close";
                    } else {
                        $wcmvp_tues_status = $wcmvp_widget_array['Tuesday']['store_open-time'] . "-" . $wcmvp_widget_array['Tuesday']['store_close_time'];
                    }
                    if ($wcmvp_widget_array['Wednesday']['status'] == 'close') {
                        $wcmvp_weds_status = "Close";
                    } else {
                        $wcmvp_weds_status = $wcmvp_widget_array['Wednesday']['store_open-time'] . "-" . $wcmvp_widget_array['Wednesday']['store_close_time'];
                    }
                    if ($wcmvp_widget_array['Thursday']['status'] == 'close') {
                        $wcmvp_thurs_status = "Close";
                    } else {
                        $wcmvp_thurs_status = $wcmvp_widget_array['Thursday']['store_open-time'] . "-" . $wcmvp_widget_array['Thursday']['store_close_time'];
                    }
                    if ($wcmvp_widget_array['Friday']['status'] == 'close') {
                        $wcmvp_fri_status = "Close";
                    } else {
                        $wcmvp_fri_status = $wcmvp_widget_array['Friday']['store_open-time'] . "-" . $wcmvp_widget_array['Friday']['store_close_time'];
                    }
                    if ($wcmvp_widget_array['Saturday']['status'] == 'close') {
                        $wcmvp_sat_status = "Close";
                    } else {
                        $wcmvp_sat_status = $wcmvp_widget_array['Saturday']['store_open-time'] . "-" . $wcmvp_widget_array['Saturday']['store_close_time'];
                    }
                }
                $wcmvp_endpoint_html[] = '<div class="wcmvp_widget_box text-black-50 mt-4 mdc-elevation--z3">
                    <h5>'. esc_html__("Store Time", "wc-multi-vendor-platform-lite") .'</h5>
                    <div class="wcmvp-border-bottom"></div>
                    <div class="wcmvp-date-time"><p>'. esc_html__("Sunday" , "wc-multi-vendor-platform-lite") .':</p>
                    <p>'. $wcmvp_sun_status.'</p></div>
                    <div class="wcmvp-date-time"><p>'. esc_html__("Monday" , "wc-multi-vendor-platform-lite") .':</p>
                    <p>'. $wcmvp_mon_status.'</p></div>
                    <div class="wcmvp-date-time"><p>'. esc_html__("Tuesday" , "wc-multi-vendor-platform-lite") .':</p>
                    <p>'. $wcmvp_tues_status.'</p></div>
                    <div class="wcmvp-date-time"><p>'. esc_html__("Wednesday" , "wc-multi-vendor-platform-lite") .':</p>
                    <p>'. $wcmvp_weds_status.'</p></div>
                    <div class="wcmvp-date-time"><p>'. esc_html__("Thursday" , "wc-multi-vendor-platform-lite") .':</p>
                    <p>'. $wcmvp_thurs_status.'</p></div>
                    <div class="wcmvp-date-time"><p>'. esc_html__("Friday" , "wc-multi-vendor-platform-lite") .':</p>
                    <p>'. $wcmvp_fri_status.'</p></div>
                    <div class="wcmvp-date-time"><p>'. esc_html__("Saturday" , "wc-multi-vendor-platform-lite") .':</p>
                    <p>'. $wcmvp_sat_status.'</p></div>
                </div>';
            } 
            $wcmvp_temp_var = '<div class="wcmvp_contact_vendor mdc-elevation--z3">
            <h5>
                 '.esc_html__("Contact Vendor", "wc-multi-vendor-platform-lite") .'
            </h5>
            <div class="wcmvp-border-bottom"></div>
            <p class="wcmvp_notify"></p>
            <form method="POST" class="wcmvp-form">
                <div class="wcmvp-user-detail-box">
                    <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
                            <input type="text" class="mdc-text-field__input wcmvp_user_name_class" id="wcmvp_user_name">
                            <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                <span class="mdc-floating-label">Your Name</span>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </label>
                </div>
                <div class="wcmvp-user-detail-box">
                    <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
                        <input type="email" class="mdc-text-field__input wcmvp_user_email" id="wcmvp_user_email_id">
                        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                            <span class="mdc-floating-label">Your Email</span>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </label>
                </div>
                <p>
                    <label class="mdc-text-field wcmvp-w-100 mdc-text-field--textarea mdc-text-field--no-label ">
                        <textarea class=" mdc-text-field__input wcmvp_user_message_class"   id="wcmvp_user_message">'.esc_attr__("Type your message here","wc-multi-vendor-platform-lite").'</textarea>
                        <span class="mdc-notched-outline mdc-notched-outline--no-label">
                            <span class="mdc-notched-outline__leading"></span>
                            <span class="mdc-notched-outline__trailing"></span>
                        </span>
                    </label>
                </p>
                <p>';
                $wcmvp_temp_var .= esc_html__("Your personal data will be used to process your order, support your experience throughout this website.", "wc-multi-vendor-platform-lite");

                     $wcmvp_privacy = get_option('wcmvp_privacy_page');
                    if ($wcmvp_privacy['wcmvp_enable_privacy_policy'] == "1") {
                       $wcmvp_temp_var .= esc_html__("For other purposes described in our ", "wc-multi-vendor-platform-lite");
                       $wcmvp_policy_page =  get_page_link((int) $wcmvp_privacy["wcmvp_setting_privacy_page"]) ;
                       $wcmvp_temp_var  .= "<a href='".esc_url($wcmvp_policy_page)."'>Multi Vendor Platform For WooCommerce  Privacy & Policy</a>";
                    }
                    $wcmvp_temp_var .= '</p>
                    <p class="submit">
                    <input type="button" name="submit" id="wcmvp-privacy-submit" class="mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp_submit_store_message" value="submit">
                    </p></form>
            </div>';
            $wcmvp_endpoint_html[] = $wcmvp_temp_var;
            $wcmvp_endpoint_html[] = '</div>
        <div class="wcmvp_store_banner_wrapper">
            <div class="wcmvp-card-banner">';
            $wcmvp_temp_val = '<div class="wcmvp_store_banner">';
            $wcmvp_image = get_user_meta($wcmvp_vendor_id, "wcmvp_vendor_store_img", true);
                    if (!empty((int) $wcmvp_image)) {
                        $wcmvp_temp_val .= wp_get_attachment_image($wcmvp_image, "", "",  array("class" => "card-img wcmvp-img"));
                    } else {
                       $wcmvp_temp_val .= "<img src='" . WCMVP_PUBLIC_IMAGES_URL . "\store.png'>";
                    }
                $wcmvp_temp_val .= '</div>
                <div class="wcmvp-card-img">';
                    $wcmvp_image = get_user_meta($wcmvp_vendor_id, "wcmvp_vendor_profile_img", true);
                    if (!empty($wcmvp_image)) {
                    $wcmvp_temp_val .= wp_get_attachment_image($wcmvp_image, "", "",  array("class" => "img-fluid wcmvp-avator rounded-circle"));
                    } else {
                    $wcmvp_temp_val .= "<img src='". esc_attr__(get_avatar_url($wcmvp_vendor_id),'wc-multi-vendor-platform-lite') ."' class='img-fluid wcmvp-avator rounded-circle'>";
                    }
                    
                $wcmvp_temp_val .= '</div>
                <div class="wcmvp_vendor_details"><p><label id="wcmvp_store_name">
                            '. esc_html(get_user_meta($wcmvp_vendor_id, "wcmvp_store_name", true))  .'
                        </label>
                    </p>';
                    if (get_user_meta($wcmvp_vendor_id, "wcmvp_vendor_show_email", true) == '1') {
                        $wcmvp_temp_val .= '<p>'.
                            esc_html__(get_userdata($wcmvp_vendor_id)->user_email, "wc-multi-vendor-platform-lite") .'
                        </p>';
                     } 
                    $wcmvp_temp_val .= '<p>
                        <label id="wcmvp_phone">
                            '. esc_html__(get_user_meta($wcmvp_vendor_id, "wcmvp_phone", true), "wc-multi-vendor-platform-lite")  .'
                        </label>
                    </p>
                    <p>
                        <span id="wcmvp_reviews">';
                        $wcmvp_temp_val .= get_user_meta($wcmvp_vendor_id,"wcmvp_vendor_rating",true);

                        $wcmvp_widget = get_user_meta($wcmvp_vendor_id, "wcmvp_show_time_widget", true);
                            if ($wcmvp_widget == '1') {
                                $wcmvp_widget_array = get_user_meta($wcmvp_vendor_id, "wcmvp_store_time_widget", true);
                                if (is_array($wcmvp_widget_array)) {
                                    if (get_user_meta($wcmvp_vendor_id, "wcmvp_vendor_status", true)) {
                                        $wcmvp_store_state = $wcmvp_widget_array['Store_open_notice'];
                                    } else {
                                        $wcmvp_store_state = $wcmvp_widget_array['Store_close_notice'];
                                    }
                                }
                            } else {
                                $wcmvp_store_state = "";
                            }  
                        $wcmvp_temp_val .=  '</span>
                    </p>';
                     $wcmvp_address1 = get_user_meta($wcmvp_vendor_id, "wcmvp_vendor_address1", true);
                    $wcmvp_address2 = get_user_meta($wcmvp_vendor_id, "wcmvp_vendor_address2", true);
                    $wcmvp_city = get_user_meta($wcmvp_vendor_id, "wcmvp_vendor_city", true);
                    if ($wcmvp_address1 || $wcmvp_address2) {
                        $wcmvp_temp_val .= '<p>';
                             if ($wcmvp_address1) {
                                $wcmvp_temp_val .= esc_html__($wcmvp_address1, "wc-multi-vendor-platform-lite");
                            }
                            if ($wcmvp_address1 && $wcmvp_address2) {
                                $wcmvp_temp_val .=  ",";
                            }
                            if ($wcmvp_address2) {
                                $wcmvp_temp_val .=  esc_html__($wcmvp_address2, "wc-multi-vendor-platform-lite");
                            } 
                        $wcmvp_temp_val .= '</p>';
                     }
                    if ($wcmvp_city) { 
                       $wcmvp_temp_val .=  '<p>'.esc_html__($wcmvp_city, "wc-multi-vendor-platform-lite").'</p>';
                     } 
                    $wcmvp_temp_val .= '<p>
                        <span id="wcmvp_status">'.
                            esc_html__($wcmvp_store_state, "wc-multi-vendor-platform-lite")  .'
                        </span>
                    </p>
                </div>
            </div>';
             $wcmvp_endpoint_html[] = $wcmvp_temp_val;
             $wcmvp_endpoint_html[] = '<div class="wcmvp_prod">
             <button type="button"  class="mdc-button mdc-button--raised mdc-ripple-upgraded wcmvp-prdct-btn">
                <span class="mdc-button__label">' .esc_html__("Products", "wc-multi-vendor-platform-lite") .'</span>
                <div class="mdc-button__ripple"></div>
			 </button>
                
            </div>
            <div class="wcmvp-prdct-row wcmvp-d-flex">';
                if(get_user_meta($wcmvp_vendor_id,"wcmvp_vendor_prod_per_page",true)){
                   $wcmvp_ppp = get_user_meta($wcmvp_vendor_id,"wcmvp_vendor_prod_per_page",true);
               }
               else{
                $wcmvp_ppp = 6;
            }
            $paged = (get_query_var('wcmvp_page')) ? get_query_var('wcmvp_page') : 1;
            $wcmvp_prod_cat_ids = (get_query_var('wcmvp_cat_ids')) ? get_term_by('term_id', get_query_var('wcmvp_cat_ids'), 'product_cat')->slug : "";
            $args = array(
                'post_type' => 'product',
                'product_cat' => $wcmvp_prod_cat_ids,
                'posts_per_page' =>  $wcmvp_ppp,
                'paged'     => $paged,
                'orderby' => 'asc',
                'author'  => $wcmvp_vendor_id,
            );
            $wcmvp_loop = new WP_Query($args);
            global $wp_query;
            $tmp_query = $wp_query;
            $wp_query = null;
            $wp_query = $wcmvp_loop;
            if ($wcmvp_loop->have_posts()) :
                while ($wcmvp_loop->have_posts()) : $wcmvp_loop->the_post();
                    global $product;
                    $wcmvp_rating_count = $product->get_rating_count();
                    $wcmvp_average = $product->get_average_rating();
                    
                    $wcmvp_temp_prod = '<div class="wcmvp-main wcmvp-prdct-box">
                        <div class="wcmvp_inner_border ">
                            <a class="nav-link p-0" href="'.get_permalink($wcmvp_loop->post->ID) .'" title="'. esc_attr($wcmvp_loop->post->post_title ? $wcmvp_loop->post->post_title : $wcmvp_loop->post->ID) .'">';
                                 if (has_post_thumbnail($wcmvp_loop->post->ID))  $wcmvp_temp_prod .= get_the_post_thumbnail($wcmvp_loop->post->ID, 'shop_catalog', array("class" => "img-fluid"));
                                else  $wcmvp_temp_prod .= '<img src="' . wc_placeholder_img_src() . '" alt="Placeholder" width="300px" height="300px" />'; 
                                 $wcmvp_temp_prod .= '<div class="wcmvp-product-details text-center">
                                    <p class="mt-3">'. Get_the_title() .'</p>
                                    <p>'. wc_get_rating_html($wcmvp_average, $wcmvp_rating_count) .'</p>
                                    <p>'.$product->get_price_html().'</p>
                                </a>';
                                ob_start();
                     woocommerce_template_loop_add_to_cart($wcmvp_loop->post, $product);
                            $wcmvp_temp_prod .= ob_get_clean();          
                           $wcmvp_temp_prod .= '</div>
                        </div>
                    </div>';
                    $wcmvp_endpoint_html[] = $wcmvp_temp_prod;
                endwhile; 
                $wcmvp_endpoint_html[] = '<div class="wcmvp_pagination">
                    '. get_the_posts_pagination().'
                </div>';
            else :
                $wcmvp_endpoint_html[] = esc_html__("Vendor Have posted no product yet.", "wc-multi-vendor-platform-lite");
            endif;
            $wp_query = null;
            $wp_query = $tmp_query; 
        $wcmvp_endpoint_html[] = '</ul>
    </div>';
    $wcmvp_endpoint_html = apply_filters("wcmvp_vendor_store_html",$wcmvp_endpoint_html,$wcmvp_vendor_id);
    foreach ($wcmvp_endpoint_html as $key => $value) {
        echo $value;    // This variable holds html
    }
} else {
    ?>
    <div class="wcmvp_nothing_found">
        <label><?php esc_html_e("No Vendor exist of that name.", "wc-multi-vendor-platform-lite")  ?></label>
    </div>
    <?php
}
?>
</div>
</div>
<?php
$wcmvp_sidebar_opt = get_option('wcmvp_appearence_page');
$wcmvp_show_sidebar = (isset($wcmvp_sidebar_opt['wcmvp_show_store_sidebar']))?$wcmvp_sidebar_opt['wcmvp_show_store_sidebar'] : 0;
if ($wcmvp_show_sidebar == '1') {
    get_sidebar();
} ?>
<?php
get_footer();
} else {
    wp_redirect(get_permalink($wcmvp_options_page_array['wcmvp_page_store_listing']));
}
?>