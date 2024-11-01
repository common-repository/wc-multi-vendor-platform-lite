(function ($) {
    'use strict';
    $(document).on('ready', function () {
      
     $(document).on("click","#wcmvp_payment_submit",function(e){
        e.preventDefault;
        var wcmvp_paypal_email    =   $("#wcmvp_payment_paypal_email").val();
        var wcmvprre_stripe_id       =   $("#wcmvp_payment_stripe_id").val();
        var wcmvp_account_name    =   $("#wcmvp_payment_account_name").val();
        var wcmvp_account_no      =   $("#wcmvp_payment_account_no").val();
        var wcmvp_bank_name       =   $("#wcmvp_payment_bank_name").val();
        var wcmvp_bank_place      =   $("#wcmvp_payment_bank_place").val();
        var wcmvp_routing_no      =   $("#wcmvp_payment_routing_no").val();
        var wcmvp_iban            =   $("#wcmvp_payment_iban").val();
        var wcmvp_swift_code      =   $("#wcmvp_payment_swift_code").val();  
        var wcmvp_extra = $(".wcmvp_payment_extra_field");
        if(wcmvp_extra.length>0){
             var wcmvp_obj={};
        $.each(wcmvp_extra, function(index,event) {
          wcmvp_obj[event.name]=event.value;
          });
        }
        var wcmvp_multiple_select = $(document).find(".wcmvp_payment_multiple_data");
        if (wcmvp_multiple_select.length > 0) {
           var extra_multi_data = {};
           $.each(wcmvp_multiple_select, function (index, event) {
               extra_multi_data[event.name] = getSelectValues(event);
           });
       }
       var wcmvp_image_src = $(".wcmvp_payment_image_src");
       if (wcmvp_image_src.length > 0) {
           var wcmvp_image_src_path = {};
           $.each(wcmvp_image_src, function (index, event) {
               wcmvp_image_src_path[event.name] = event.src;
           });
       }
        var wcmvp_extra_check = $(".wcmvp_payment_checkbox");
        if(wcmvp_extra_check.length>0){
          var wcmvp_check_obj={};
         $.each(wcmvp_extra_check, function(index,event) {
           wcmvp_check_obj[event.name]= $("#"+event.id).is(":checked");
          });
          }
        $(".wcmvp_loader").show();
        var data = {
            'action': 'wcmvp_payment_ajax',
            'wcmvp_paypal_email':wcmvp_paypal_email,
            'wcmvp_stripe_id' : wcmvprre_stripe_id,
            'wcmvp_account_name': wcmvp_account_name,
            'wcmvp_account_no':wcmvp_account_no,
            'wcmvp_bank_name':wcmvp_bank_name,
            'wcmvp_bank_place':wcmvp_bank_place,
            'wcmvp_routing_no':wcmvp_routing_no,
            'wcmvp_iban':wcmvp_iban,
            'wcmvp_swift_code':wcmvp_swift_code,
            'wcmvp_nonce':wcmvp_ajax_object.wcmvp_ajax_nonce
        };
           if(wcmvp_extra.length>0){
             var data={...wcmvp_obj,...data};
           }
           if (wcmvp_multiple_select.length > 0) {
            var data = { ...extra_multi_data, ...data };
           }
          if (wcmvp_image_src.length > 0) {
            var data = { ...wcmvp_image_src_path, ...data };
           }
           if(wcmvp_extra_check.length>0){
            var data={...wcmvp_check_obj,...data};
          }
        jQuery.post(
            wcmvp_ajax_object.wcmvp_ajax_url, 
            data,
            function (response) {
              if(response){
                $(".wcmvp_loader").hide();
              }
                if(response=="successfull"){
                    $('.notifyjs-wrapper').remove();
                    $.notify(wcmvp_ajax_object.wcmvp_translation.wcmvp_success, { className: 'wcmvp_success', position: "right bottom" });
                }
          },"json")
     })

 })   
})(jQuery);