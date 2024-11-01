
<!-- This file contains the code for store listing page -->

<?php

global $wp_query;

    $wcmvp_number = 9;


if (isset($_COOKIE["wcmvp_store_listing_view"])) {
    $wcmvp_view_option = sanitize_text_field($_COOKIE["wcmvp_store_listing_view"]);
}


if (isset($_GET)  &&  !empty($_GET) && $_GET['wcmvp_most_pop']) {

    $wcmvp_filter_cond = sanitize_text_field($_GET['wcmvp_most_pop']);

    $wcmvp_sort = "DESC";
} else {

    $wcmvp_filter_cond = 0;

    $wcmvp_sort = "ASC";
}

if (isset($_POST['wcmvp_name']) && !empty($_POST['wcmvp_name'])) {
    $wcmvp_vendor_name = sanitize_text_field($_POST['wcmvp_name']);
} else {
    $wcmvp_vendor_name = "";
}

$wcmvp_paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 

$wcmvp_offset = ($wcmvp_paged - 1) * $wcmvp_number; 


$wcmvp_users = get_users(array('role__in'    => array('wcmvp_vendor', 'administrator')));

$wcmvp_argss = array(
    'role__in'    => array('wcmvp_vendor', 'administrator'),
    'search' =>  $wcmvp_vendor_name,
    'search_columns' => array('user_login', 'user_email', 'user_nicename'),
    'orderby' => 'user_nicename',
    'offset' => $wcmvp_offset,
    'number' => $wcmvp_number,
    'order'   => $wcmvp_sort,
    'fields' => array('ID', 'user_login', 'user_nicename', 'user_email')
);

$wcmvp_vendors_list = get_users($wcmvp_argss);

$wcmvp_total_users = count($wcmvp_users);

$wcmvp_total_query = count($wcmvp_vendors_list); 

$wcmvp_total_pages = ($wcmvp_total_users / $wcmvp_number); 

$wcmvp_total_pages = is_float($wcmvp_total_pages) ? intval($wcmvp_total_users / $wcmvp_number) + 1 : intval($wcmvp_total_users / $wcmvp_number);

$wcmvp_options_array  =  get_option('wcmvp_general_setting');

$wcmvp_endpoint_page = $wcmvp_options_array['wcmvp_store_url'];

if (empty($wcmvp_total_users)) {

    esc_html_e("Sorry No Vendor Available.", "wc-multi-vendor-platform-lite");
}
$wcmvp_stores[] = '<div class="wcmvp_store_list_map"></div>';
$wcmvp_stores[] = '<nav>
    <div class="wcmvp-wrapper-row">';
    $wcmvp_stores[] = '<div class="wcmvp-total-showing">
            <ul class="wcmvp-store-list">';
    $wcmvp_stores[] = '<li>'.esc_html__("Total store showing: " . $wcmvp_total_query, "wc-multi-vendor-platform-lite").'</li>';
    $wcmvp_stores[] = '</ul>
        </div>
        <div class="wcmvp-filter-wrapper">';
        $wcmvp_stores[] = '<ul class="wcmvp-store-list wcmvp-listing">';
        $wcmvp_stores[] = '<li>
                    <a class="nav-link btn btn-success" id="wcmvp_show_filter">'. esc_html__("Filter", "wc-multi-vendor-platform-lite") .'</a>
                </li>';
        $wcmvp_stores[] = '<li class="wcmvp_sort_box">
                    '. esc_html__("Sort by:", "wc-multi-vendor-platform-lite") .'
                    <select class="wcmvp_select_box" id="wcmvp_select_filter">
                        <option value="wcmvp_most_recent">'. esc_html__("Most Recent", "wc-multi-vendor-platform-lite").'</option>';
                        $wcmvp_temp_var = '<option value="wcmvp_most_pop"';
                         if ($wcmvp_filter_cond) {
                            $wcmvp_temp_var .= "selected";
                        } 
                        $wcmvp_temp_var .= '>'. esc_html__("Most popular", "wc-multi-vendor-platform-lite").'</option>';
                        $wcmvp_stores[] =  $wcmvp_temp_var;
                        $wcmvp_stores[] = '</select>
                </li>';
                $wcmvp_temp_var = '<li class="">';
                 if (!isset($wcmvp_view_option)) {
                    $wcmvp_temp_var .= "<a class='wcmvp_grid_button wcmvp_looks_buttons wcmvp_current_active'>";
                    } elseif (isset($wcmvp_view_option) && $wcmvp_view_option == "grid_view") {
                        $wcmvp_temp_var .= "<a class='wcmvp_grid_button wcmvp_looks_buttons wcmvp_current_active'>";
                    } else {
                        $wcmvp_temp_var .=  "<a class='wcmvp_grid_button wcmvp_looks_buttons'>";
                    } 
                    $wcmvp_temp_var .= '<i class="fa fa-th-large"></i>
                </a>
            </li>';
            $wcmvp_stores[] =  $wcmvp_temp_var;
            $wcmvp_temp_var = '<li class="nav-item px-3">
                <a class="wcmvp_row_button wcmvp_looks_buttons';
                 if (isset($wcmvp_view_option) && $wcmvp_view_option == "row_view") {
                    $wcmvp_temp_var .= " wcmvp_current_active";
                } 
                $wcmvp_temp_var .= '">
                <i class="fas fa-bars"></i>
            </a>
        </li>';
        $wcmvp_stores[] =  $wcmvp_temp_var;
    
    $wcmvp_stores[] = '</ul>
    </div>
</div>
</nav>';
$wcmvp_stores[] = '<div class="wcmvp_filter_fields">
    <form method="post">
    <label class="mdc-text-field mdc-text-field--outlined wcmvp-w-100">
        <input type="text" name="product_name" class="mdc-text-field__input wcmvp_vendor_name_field">
        <div class="mdc-notched-outline mdc-notched-outline--upgraded">
            <div class="mdc-notched-outline__leading"></div>
            <div class="mdc-notched-outline__notch">
            <span class="mdc-floating-label"> Search by vendor name</span>
            </div>
            <div class="mdc-notched-outline__trailing"></div>
        </div>
    </label>
    <p><input type="submit" name="wcmvp_submit_form" class="wcmvp_form_submit mdc-button mdc-button--upgraded mdc-button-raised" value="Search For vendors"></p>
    </form>
</div>';


if(isset($wcmvp_vendors_list) && !empty($wcmvp_vendors_list) && is_array($wcmvp_vendors_list)){
    $wcmvp_temp_var = '<div>
    <div class=" wcmvp_grid_look '; 
     if (isset($wcmvp_view_option) && $wcmvp_view_option == "row_view") {
        $wcmvp_temp_var .= "wcmvp_display";
    } 
    $wcmvp_temp_var .=  '">';
    $wcmvp_stores[] =  $wcmvp_temp_var;
    foreach ($wcmvp_vendors_list as $wcmvp_vendor_objec) {
        $wcmvp_single_store = [];
        $wcmvp_ven_id  =   $wcmvp_vendor_objec->ID;

        if ($wcmvp_ven_name = get_user_meta($wcmvp_ven_id, 'wcmvp_store_name', true)) {
        } else {
            $wcmvp_ven_name = "No name";
        }
        $wcmvp_ven_phone = get_user_meta($wcmvp_ven_id, 'wcmvp_phone', true);

        $wcmvp_van_nicename = $wcmvp_vendor_objec->user_nicename;

        $wcmvp_single_store[] = '<div class="wcmvp-store-prdct-box">
            <div class="wcmvp-inner-div mdc-elevation--z9"><div class="wcmvp_store_content">';
 
         $wcmvp_image = get_user_meta($wcmvp_ven_id, "wcmvp_vendor_store_img", true);

         if (!empty($wcmvp_image)) {
                         $wcmvp_single_store[] = "<div class='wcmvp-store-image'>".wp_get_attachment_image($wcmvp_image, "", "",  array("class" => "card-img wcmvp-img"))."</div>";
                    } else {
                        $wcmvp_single_store[] = "<div class='wcmvp-store-image'><img src='" . WCMVP_PUBLIC_IMAGES_URL . "store.png'></div>";
                    }
                    $wcmvp_single_store[] = '<span class="wcmvp-animated-check">
                    </span><div class="card-img-overlay wcmvp_overlay">';
                    $wcmvp_single_store[] = '<a href="'. esc_url(home_url() . "/" . $wcmvp_endpoint_page . "/" . $wcmvp_van_nicename).'" class="nav-link pl-0 wcmvp_vendor_name">'.
                     esc_html__($wcmvp_ven_name, "wc-multi-vendor-platform-lite").'
                        </a>';
                    $wcmvp_single_store[] = '<p class="store-phone wcmvp_vendor_phone">
                            <i class="fas fa-phone"></i>'. esc_html__($wcmvp_ven_phone, "wc-multi-vendor-platform-lite") .'
                        </p></div>';

                        $wcmvp_vendor_rating = get_user_meta($wcmvp_ven_id,"wcmvp_vendor_rating",true);
                        $wcmvp_single_store[] = $wcmvp_vendor_rating;

                       $wcmvp_store_url = $this->wcmvp_vendor_store_url();

                    $wcmvp_single_store[] = '</div>
                    <div class="wcmvp-store-footer">
                        <a href="'. esc_url($wcmvp_store_url)   .'" class="nav-link rounded-circle btn btn-danger wcmvp-visit-btn">
                            <i class="fas fa-chevron-right"></i>
                        </a>';

                        $wcmvp_single_store[] = '<div class="wcmvp-store-img"><img src="'. get_avatar_url($wcmvp_ven_id).'" class="img-fluid wcmvp-avator rounded-circle"></div>';
                        $wcmvp_single_store[] = '</div>
                </div>  
        </div>';

        $wcmvp_single_store_html[] = apply_filters("wcmvp_single_store_grid_html",$wcmvp_single_store,$wcmvp_ven_id);
    }
}
else{
    $wcmvp_stores[] = "<div class='wcmvp_no_vendor'><i class='wcmvp_alert fa fa-exclamation-triangle' aria-hidden='true'></i>".esc_html__("No Match Found","wc-multi-vendor-platform-lite")."</div>";
}
    if(isset($wcmvp_single_store_html) && !empty($wcmvp_single_store_html) && is_array($wcmvp_single_store_html)){
        foreach($wcmvp_single_store_html as $wcmvp_value){
            $wcmvp_stores[] = implode("",$wcmvp_value);
        }
    }  
    
 $wcmvp_stores[] = '</div>';
$wcmvp_temp_var = '<div class="wcmvp_row_look ';
 if (!isset($_COOKIE["wcmvp_store_listing_view"])) {
    $wcmvp_temp_var .= "wcmvp_display";
    } elseif ($wcmvp_view_option == "grid_view") {
        $wcmvp_temp_var .= "wcmvp_display";
    }   
    $wcmvp_temp_var .= '">';
    $wcmvp_stores[] =  $wcmvp_temp_var;
    if(isset($wcmvp_vendors_list) && !empty($wcmvp_vendors_list) && is_array($wcmvp_vendors_list)){
        foreach ($wcmvp_vendors_list as $wcmvp_vendor_objec) {
            $wcmvp_single_store_grid = [];
            
            $wcmvp_ven_id  =   $wcmvp_vendor_objec->ID;
    
            if ($wcmvp_ven_name = get_user_meta($wcmvp_ven_id, 'wcmvp_store_name', true)) {
            } else {
                $wcmvp_ven_name = "No name";
            }
            $wcmvp_ven_phone = get_user_meta($wcmvp_ven_id, 'wcmvp_phone', true);
    
            $wcmvp_van_nicename = $wcmvp_vendor_objec->user_nicename;
    
            $wcmvp_single_store_grid[] = '<div class="wcmvp-row-look-wrapper mdc-elevation--z9">';
               
                $wcmvp_single_store_grid[] = '<div class="wcmvp-banner-image">';
    
                        $wcmvp_store_url = $this->wcmvp_vendor_store_url();
    
                        $wcmvp_single_store_grid[] = '<a href="'. esc_url($wcmvp_store_url).'">';
                        $wcmvp_image = get_user_meta($wcmvp_ven_id, "wcmvp_vendor_store_img", true);
                            if (!empty($wcmvp_image)) {
                                $wcmvp_single_store_grid[] = wp_get_attachment_image($wcmvp_image, "", "",  array("class" => "card-img wcmvp-img"));
                            } else {
                                $wcmvp_single_store_grid[] = "<img src='" . WCMVP_PUBLIC_IMAGES_URL . "store.png'>";
                            }
                            $wcmvp_single_store_grid[] = '</a>';
                            $wcmvp_single_store_grid[] = '
                    </div>';
                    $wcmvp_single_store_grid[] = '<div class="wcmvp-store-data-wrapper">
                        <div class="wcmvp-store-data">';
                        $wcmvp_single_store_grid[] = '<h2><a href="'. esc_url(home_url() . "/" . $wcmvp_endpoint_page . "/" . $wcmvp_van_nicename).'">'. esc_html__($wcmvp_ven_name, "wc-multi-vendor-platform-lite").'</a></h2>';
                             $args_top_rating1 = array(
                                'post_type' => 'product',
                                'meta_key' => '_wc_average_rating',
                                'orderby' => 'meta_value',
                                'author'  =>  $wcmvp_ven_id,
                                'posts_per_page' => -1,
                                'status' => 'publish',
                                'catalog_visibility' => 'visible',
                                'stock_status' => 'instock'
                            );
    
                            $top_rating = new WP_Query($args_top_rating1);
    
                            $wcmvp_count = 0;
                            $wcmvp_total_reviews = 0;
                            $wcmvp_total_no_of_review = 0;
                            while ($top_rating->have_posts()) : $top_rating->the_post();
                                global $product;
    
                                $urltop_rating = get_permalink($top_rating->post->ID);
    
                                $rating_count = $product->get_rating_count();
    
                                $average_rating = $product->get_average_rating();
    
                                $wcmvp_total_reviews  =  $average_rating + $wcmvp_total_reviews;
    
                                $wcmvp_total_no_of_review = $rating_count + $wcmvp_total_no_of_review;
                                if (!empty($rating_count)) {
                                    $wcmvp_count++;
                                }
    
                            endwhile;
                            if (!empty($wcmvp_count)) {
    
                                $wcmvp_reviews = $wcmvp_total_reviews / $wcmvp_count;
    
                                $wcmvp_single_store_grid[] =  wc_get_rating_html($wcmvp_reviews, $wcmvp_total_no_of_review);
                            } else {
                                $wcmvp_single_store_grid[] = esc_html__("The vendor is not rated yet", "wc-multi-vendor-platform-lite");
                            }  
                            $wcmvp_single_store_grid[] = '</div>
                </div>';
    
                $wcmvp_single_store_grid[] = '<div class="wcmvp-button">
                <div class="wcmvp-btn">';
                $wcmvp_single_store_grid[] = '<a href="'. esc_url(home_url() . "/" . $wcmvp_endpoint_page . "/" . $wcmvp_van_nicename).'" class="wcmvp-visit-btn">
                        <i class="fas fa-chevron-right"></i>
                    </a>';
                    $wcmvp_single_store_grid[] = '</div>
           </div>
           </div>';
           $wcmvp_single_store_grid_html[] = apply_filters("wcmvp_single_store_list_html",$wcmvp_single_store_grid,$wcmvp_ven_id);
             } 
    }
   
         if(isset($wcmvp_single_store_grid_html) && !empty($wcmvp_single_store_grid_html) && is_array($wcmvp_single_store_grid_html)){
            foreach($wcmvp_single_store_grid_html as $wcmvp_value){
                $wcmvp_stores[] = implode("",$wcmvp_value);
            }
         }
      
         $wcmvp_stores[] = '</div>';
  
    if (empty($_POST['wcmvp_name'])) {
        if ($wcmvp_total_users > $wcmvp_total_query) {
            $wcmvp_temp_var = '<div id="wcmvp_ven_pagination" class="clearfix">';
            $current_page = max(1, get_query_var('paged'));
            $wcmvp_temp_var .= paginate_links(array(
                'base' => get_pagenum_link(1) . '%_%',
                'format' => '/page/%#%/',
                'current' => $current_page,
                'total' => $wcmvp_total_pages,
                'prev_next' => true,
                'type' => 'list',
            ));
        }
        $wcmvp_temp_var .= '</div>';
        $wcmvp_stores[] = $wcmvp_temp_var;
    }

$wcmvp_stores[] = '</div>';
foreach($wcmvp_stores as $wcmvp_values){
echo $wcmvp_values;    // This variable holds html
}