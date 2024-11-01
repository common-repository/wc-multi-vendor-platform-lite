(function ($) {
	'use strict';
	$(document).ready(function () {    

		$(document).on("click","#wcmvp-radio-vendor",function(){
			$(".wcmvp-vendor-registration").removeClass("wcmvp-none");
		})
		$(document).on("click","#wcmvp-radio-customer",function(){
			$(".wcmvp-vendor-registration").addClass("wcmvp-none");
		})
		
	});
})(jQuery);
