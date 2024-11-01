<?php 
//===================This File contain report section of the plugin shown in report tab=================//

    if( isset($_GET['wcmvp_action']) && !empty($_GET['wcmvp_action']) )

    {

        if( $_GET['wcmvp_action'] == 'wcmvp_store_setup' )

        {

            include_once( WCMVP_ADMIN_PARTIAL.'/admin-includes/wcmvp-multivendor-platform-store-setup.php' );

        }

    }

    else

    {

?>

    <div class="wcmvp_dashboard_content_wrappper">
    
            <?php do_action('wcmvp_add_pre_meta_data_for_reports'); ?>
            <div class='wcmvp_main_card'>
                <div class='wcmvp_inner_card card'><span class="wcmvp_price_color"><?php echo get_woocommerce_currency_symbol() ?></span><span class="wcmvp_price_quan"><?php echo get_woocommerce_currency_symbol(); ?><span id="wcmvp_total_sold_product_amount"></span></span><br><a href='#report' class='wcmvp_commission_text'><?php esc_html_e('Total Sale within Month','wc-multi-vendor-platform-lite') ?></a></div>
                <div class='wcmvp_inner_card card'><span class="wcmvp_commission_price_color"><i class='material-icons'><?php echo esc_html('money') ?></i></span><span class="wcmvp_price_quan"><?php echo get_woocommerce_currency_symbol(); ?><span id="wcmvp_admin_commission_value"></span></span><br><a href='#report' class='wcmvp_commission_text'><?php esc_html_e('Commission Earned','wc-multi-vendor-platform-lite') ?></a></div>
                <div class='wcmvp_inner_card card'><span class="wcmvp_product_color"><i class='material-icons'><?php echo esc_html('shopping_cart') ?></i></span><span class="wcmvp_price_quan"><span id="wcmvp_total_sold_product"></span><?php esc_html_e(' items','wc-multi-vendor-platform-lite') ?></span><br><a href='#/orders_all' class='wcmvp_price_text'><?php esc_html_e('Sold within Month','wc-multi-vendor-platform-lite') ?></a></div>
                <div class='wcmvp_inner_card card'><span class="wcmvp_order_color"><i class='far fa-handshake'></i></span><span class="wcmvp_price_quan"><span id="wcmvp_total_orders_count"></span><?php esc_html_e(' orders','wc-multi-vendor-platform-lite') ?></span><br><a href='#/orders_all' class='wcmvp_price_text'><?php esc_html_e('completed in Month','wc-multi-vendor-platform-lite') ?></a></div>
            </div>
        <?php do_action('wcmvp_multivendor_platform_dashboard_card'); ?>

    </div>

    <div>
        <h5 class="wcmvp_dash_page_heading"><span><i class="material-icons"><?php echo esc_html('equalizer') ?></i> <?php esc_html_e('Monthly Analytics','wc-multi-vendor-platform-lite') ?></span></h5>
    </div>

    <?php
        $wcmvp_multivendor_platform_report_chart = array(
            '<div class="wcmvp_dashboard_two_section wcmvp_other_reports_product_stats">
                <div class="wcmvp_report_prod_stats card">
                <h4 class="wcmvp_dashboard_notification_heading"><i class="material-icons"> '.esc_html("view_week").' </i>'.esc_html__(" Product Status","wc-multi-vendor-platform-lite").'</h4>
                    <div><canvas width="980" height="550" id="wcmvp_product_as_bar_chart" class="flex-grow"></canvas></div>
                </div>
                <div class="wcmvp_report_vend_stats card">
                <h4 class="wcmvp_dashboard_notification_heading"><i class="material-icons"> '.esc_html("announcement").'</i>'. esc_html__(" Vendors Status","wc-multi-vendor-platform-lite").'</h4>
                    <div><canvas width="980" height="550" id="wcmvp_vendor_as_pie_chart" class="flex-grow"></canvas></div>
                </div>
            </div>',
            '<div class="row">
                <div class="col-12 d-flex">
                    <div class="wcmvp-card-chart">
                        <canvas width="980" height="300" id="wcmvp_vendor_as_line_chart" class="flex-grow"></canvas>
                    </div>
                </div>
            </div>'
        );

        $wcmvp_multivendor_platform_report_chart = apply_filters('wcmvp_multivendor_platform_report_chart',$wcmvp_multivendor_platform_report_chart);
        if( isset($wcmvp_multivendor_platform_report_chart) && is_array($wcmvp_multivendor_platform_report_chart) )
        {
            foreach($wcmvp_multivendor_platform_report_chart as $chart)
            {
                // variable contains html, due to not used escaping of html
                echo $chart;
            }
        }
    ?>

        <div class='wcmvp_dashboard_four_section'>
            <div class='wcmvp_dashboard_two_section'>
                <div class='wcmvp_dashboard_notification_section card'>
                    <h4 class='wcmvp_dashboard_notification_heading'><i class="material-icons"><?php echo esc_html('notification_important'); ?></i><?php esc_html_e(' Notifications','wc-multi-vendor-platform-lite'); ?></h4>
                    <div><p id='wcmvp_dashboard_notification_area' class='wcmvp_dashboard_notification_content'><?php esc_html_e('There is no notification yet!!','wc-multi-vendor-platform-lite'); ?></p></div>
                </div>
                <div class='wcmvp_dashboard_inquiries_section card'>
                <h4 class='wcmvp_dashboard_notification_heading'><i class="material-icons"><?php echo esc_html('live_help'); ?></i><?php esc_html_e(' Inquiries','wc-multi-vendor-platform-lite'); ?></h4>
                    <div><p class='wcmvp_dashboard_notification_content'><?php esc_html_e('There is no inquiry yet!!','wc-multi-vendor-platform-lite'); ?></p></div>
                </div>
            </div>
            <div class='wcmvp_dashboard_two_section'>
                <div class='wcmvp_dashboard_notification_section card'>
                    <h4 class='wcmvp_dashboard_notification_heading'><i class="material-icons"><?php echo esc_html('short_text'); ?></i><?php esc_html_e('  Store Stats','wc-multi-vendor-platform-lite'); ?></h4>
                    <div><p id='wcmvp_dashboard_store_stats' class='wcmvp_dashboard_notification_content'><?php esc_html_e('There is no notification yet!!','wc-multi-vendor-platform-lite'); ?></p></div>
                </div>
                <div class='wcmvp_dashboard_inquiries_section card'>
                <h4 class='wcmvp_dashboard_notification_heading'><i class="material-icons"><?php echo esc_html('announcement'); ?></i><?php esc_html_e(' Latest Topics','wc-multi-vendor-platform-lite'); ?></h4>
                    <div><p class='wcmvp_dashboard_notification_content'><?php esc_html_e('There is no topic yet!!','wc-multi-vendor-platform-lite'); ?></p></div>
                </div>
            </div>
        </div>

        <div class="wcmvp_hide_for_sort_by_vendor">
           <h4 class="wcmvp_dash_page_heading"><span><i class="material-icons"><?php echo esc_html('change_history'); ?></i> <?php esc_html_e('Top of The Month','wc-multi-vendor-platform-lite') ?></span></h4>
        </div>

        <div class='wcmvp_dashboard_two_section'>
            <div class='wcmvp_dashboard_top_sellers_section card'>
                <h4 class='wcmvp_dashboard_notification_heading'><i class="material-icons"><?php echo esc_html('align_vertical_bottom'); ?></i><?php esc_html_e(' Top Sellers of the Month','wc-multi-vendor-platform-lite'); ?></h4>
                <div id='wcmvp_dashboard_top_sellers'></div>
            </div>
            <div class='wcmvp_dashboard_top_selling_section card'>
            <h4 class='wcmvp_dashboard_notification_heading'><i class="material-icons"><?php echo esc_html('align_vertical_bottom'); ?></i><?php esc_html_e(' Top Selling Products of the Month','wc-multi-vendor-platform-lite'); ?></h4>
                <div id='wcmvp_dashboard_top_selling_products'></div>
            </div>
        </div>

    <div id="wcmvp_report_or_dashboard"></div>

<?php } ?>