<?php

/**
 * 
 *
 * This is the template for Vendor store setup And vendor store page which can override any theme template
 *
 * 
 *
 * 
 */

$wcmvp_user_meta = get_user_meta(get_current_user_id(), "wcmvp_vendor_store_setup", true);

    if (current_user_can("multivendor-platformr")) {
        if (filter_var($wcmvp_user_meta, FILTER_VALIDATE_BOOLEAN)) {
            ?>
            <!DOCTYPE html>
        <head>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
            <?php wp_head(); ?></head>
        <div class="wcmvp-home-wrap">
        <?php do_action("wcmvp_template_header"); ?>
        <div class="wcmvp-site-title">
                <a href="<?php echo esc_url(wc_get_page_permalink( 'shop' )) ?>"><?php esc_html_e('bAZAAR Vendor Dashboard','wc-multi-vendor-platform-lite'); ?></a>
            </div>

            <div class="wcmvp-back">
                <a href="<?php echo esc_url(get_permalink(get_option('woocommerce_myaccount_page_id'))); ?>" class="wcmvp-Url">
                <span class="material-icons">home</span>
                </a>
            </div>
        </div>
        <?php
        while (have_posts()) :
            the_post();
            the_content();
        endwhile;
        ?>
        <footer>
        <?php wp_footer();
        }else{
            ?>
           <!DOCTYPE html>
           <html lang="en">
               <head>
                <?php wp_head(); ?></head>
           <body class="wcmvp_store_setup_body wcmvp_welcome_page">
               <?php
           while (have_posts()) :
                the_post();
                the_content();
            endwhile;
           ?>
        </body>
           </html>
            <footer>
            <?php wp_footer();
        }
            } else {
                $wcmvp_link = get_permalink(get_option('woocommerce_myaccount_page_id'));
                header("Location:" . $wcmvp_link);
            } ?>
        </footer>
  