<!-- This file contains the html for the payment section -->

<div class="mdc-layout-grid">
<div class="wcmvp-payment-section-wrapper mdc-elevation--z9">
<?php
    $wcmvp_payment_html[] = '<h4>'. esc_html__("Payment Settings", "wc-multi-vendor-platform-lite") .'</h4>';
    $wcmvp_payment_html[] = '<p class="wcmvp-text-margin">
            '. esc_html__("These are the pull out strategies accessible for you. If you don't mind update your installment data underneath to submit pull out solicitations and get your store installments consistently.", "wc-multi-vendor-platform-lite")  .'
    </p><div class="mdc-elevation--z4 wcmvp-payment-input-box">';

    $wcmvp_method = get_option("wcmvp_payment_gateway");
    if($wcmvp_method && !empty($wcmvp_method)){
        $wcmvprre_paypal = (isset($wcmvp_method['wcmvp_withdraw_paypal']) && $wcmvp_method['wcmvp_withdraw_paypal'] == 1) ? True : False;
        $wcmvprre_bank_transfer = (isset($wcmvp_method['wcmvp_withdraw_bank']) && $wcmvp_method['wcmvp_withdraw_bank'] == 1) ? True : False;
        $wcmvprre_stripe = (isset($wcmvp_method['wcmvp_withdraw_stripe']) && $wcmvp_method['wcmvp_withdraw_stripe'] == 1) ?  True : False;
    }else{
        $wcmvprre_paypal = False;
        $wcmvprre_bank_transfer = False;
        $wcmvprre_stripe = False;
    }
      if( $wcmvprre_paypal ){
        $wcmvp_payment_html[] = '<div class="wcmvp-input-padding">
        <div class="mdc-text-field wcmvp-payment-text-field mdc-ripple-upgraded">
            <input class="mdc-text-field__input" id="wcmvp_payment_paypal_email" name="paypal" 
            value="'. esc_attr(get_user_meta(get_current_user_id(),"wcmvp_vendor_paypal_email",true)) .'">
            <div class="mdc-line-ripple"></div>
            <label class="mdc-floating-label">'. esc_html__("Paypal Email", "wc-multi-vendor-platform-lite")  .'</label>
        </div>
    </div>';
      }
      if( $wcmvprre_stripe ){
             $wcmvp_payment_html[] = '<div class="wcmvp-input-padding">
        <div class="mdc-text-field wcmvp-payment-text-field mdc-ripple-upgraded">
            <input class="mdc-text-field__input" id="wcmvp_payment_stripe_id" name="paypal" 
            value="'. esc_attr(get_user_meta(get_current_user_id(),"wcmvp_vendor_stripe_id",true)) .'">
            <div class="mdc-line-ripple"></div>
            <label class="mdc-floating-label">'. esc_html__("Stripe ID", "wc-multi-vendor-platform-lite")  .'</label>
        </div>
     </div>';
      }
        if( $wcmvprre_bank_transfer ){
            $wcmvp_payment_html[] = '<div class="wcmvp-input-padding">
            <div class="mdc-text-field wcmvp-payment-text-field mdc-ripple-upgraded">
                <input class="mdc-text-field__input  " id="wcmvp_payment_account_name" name="account_name" value="'. esc_attr(get_user_meta(get_current_user_id(),"wcmvp_vendor_bank_account_name",true)) .'">
                <div class="mdc-line-ripple"></div>
                <label class="mdc-floating-label">'. esc_attr__("Account name","wc-multi-vendor-platform-lite").'</label>
            </div>
        </div>';
        $wcmvp_payment_html[] =  '<div class="wcmvp-input-padding">
            <div class="mdc-text-field wcmvp-payment-text-field mdc-ripple-upgraded">
                <input class="mdc-text-field__input" id="wcmvp_payment_account_no" class=" " name="account_no"
                value="'. esc_attr(get_user_meta(get_current_user_id(),"wcmvp_vendor_bank_account_no",true)) .'">
                <div class="mdc-line-ripple"></div>
                <label class="mdc-floating-label">'. esc_attr__("Account no","wc-multi-vendor-platform-lite").'</label>
            </div>
        </div>';
        $wcmvp_payment_html[] = '<div class="wcmvp-input-padding">
            <div class="mdc-text-field wcmvp-payment-text-field mdc-ripple-upgraded">
                <input class="mdc-text-field__input  " id="wcmvp_payment_bank_name"  name="bank_name"  
                value="'. esc_attr(get_user_meta(get_current_user_id(),"wcmvp_vendor_bank_name",true)) .'">
                <div class="mdc-line-ripple"></div>
                <label class="mdc-floating-label">'. esc_attr__("Bank name","wc-multi-vendor-platform-lite").'</label>
            </div>
        </div>';
        $wcmvp_payment_html[] = '<div class="wcmvp-input-padding">
            <div class="mdc-text-field wcmvp-payment-text-field mdc-ripple-upgraded">
                <input class="mdc-text-field__input  " id="wcmvp_payment_bank_place"  name="bank_place" 
            value="'. esc_attr(get_user_meta(get_current_user_id(),"wcmvp_vendor_bank_address",true)) .'">
                <div class="mdc-line-ripple"></div>
                <label class="mdc-floating-label">'. esc_attr__("Bank place","wc-multi-vendor-platform-lite").'</label>
            </div>
        </div>';
        $wcmvp_payment_html[] = '<div class="wcmvp-input-padding">
            <div class="mdc-text-field wcmvp-payment-text-field mdc-ripple-upgraded">
                <input class="mdc-text-field__input  " id="wcmvp_payment_routing_no" name="routing_no."  value="'. esc_attr(get_user_meta(get_current_user_id(),"wcmvp_vendor_routing_number",true)) .'">
                <div class="mdc-line-ripple"></div>
                <label class="mdc-floating-label">'. esc_attr__("Routing No.","wc-multi-vendor-platform-lite").'</label>
            </div>
        </div>';
        $wcmvp_payment_html[] = '<div class="wcmvp-input-padding">
            <div class="mdc-text-field wcmvp-payment-text-field mdc-ripple-upgraded">
                <input class="mdc-text-field__input  " id="wcmvp_payment_iban" name="IBAN" value="'. esc_attr(get_user_meta(get_current_user_id(),"wcmvp_vendor_bank_iban",true)) .'">
                <div class="mdc-line-ripple"></div>
                <label class="mdc-floating-label">'. esc_attr__("IBAN","wc-multi-vendor-platform-lite").'</label>
            </div>
        </div>';
        $wcmvp_payment_html[] = '	<div class="wcmvp-input-padding">
            <div class="mdc-text-field wcmvp-payment-text-field mdc-ripple-upgraded">
                <input class="mdc-text-field__input  " id="wcmvp_payment_swift_code"  name="swift_code"  
                value="'. esc_attr(get_user_meta(get_current_user_id(),"wcmvp_vendor_bank_swift",true)) .'">
                <div class="mdc-line-ripple"></div>
                <label class="mdc-floating-label">'. esc_attr__("Swift_code","wc-multi-vendor-platform-lite").'</label>
            </div>
        </div>';
        }
        $wcmvp_payment_html[] = '  <a class="mdc-button mdc-button--raised mdc-theme--primary mdc-ripple-upgraded wcmvp_payment_submit_button" id="wcmvp_payment_submit" >
            <div class="mdc-button__ripple"></div>
            <span class="mdc-button__label">'. esc_html__("Submit", "wc-multi-vendor-platform-lite") .'</span>
        </a>
    </div>';
    $wcmvp_payment_html = apply_filters( "wcmvp_payment_html" , $wcmvp_payment_html);
    foreach ($wcmvp_payment_html as $key => $value) {
        echo $value;    // This variable holds html
    }
    ?>
</div>
</div>














		
	
				
				
				
				
				
			
				
			
              
		
		