(function ($) {
	'use strict';
	$(document).ready(function(){
			$("#wcmvp-image-preview").hide();
			var file_frame;
			var attachment;
			var wp_media_post_id ; 
			var set_to_post_id = $("#wcmvp-upload_image_button").attr("data-id"); 
			jQuery(document).on('click','#wcmvp-upload_image_button', function( event ){
				event.preventDefault();
				if ( file_frame ) {
				
					file_frame.uploader.uploader.param( 'post_id', set_to_post_id );
				
					file_frame.open();
					return;
				} else {
					wp.media.model.settings.post.id = set_to_post_id;
				}
				file_frame = wp.media.frames.file_frame = wp.media({
					title: wcmvp_ajax_object.wcmvp_translation.wcmvp_select_img,
					button: {
						text: wcmvp_ajax_object.wcmvp_translation.wcmvp_use_this_img,
					},
					multiple: false	
				});

				file_frame.on( 'select', function() {
					$("#wcmvp-image-preview").show();
					$(".wcmvp_remove_prod_image").show();
					$(".wcmvp_upload_box").hide();
					attachment = file_frame.state().get('selection').first().toJSON();
					$( '#wcmvp-image-preview' ).attr( 'src', attachment.url ).css( 'width', 'auto' );
					$( '#wcmvp-image_attachment_id' ).val( attachment.id );
					wp.media.model.settings.post.id = wp_media_post_id;
				});
				
					file_frame.open();
				});
			jQuery( 'a.add_media' ).on( 'click', function() {
				wp.media.model.settings.post.id = wp_media_post_id;
			});
		});

})(jQuery);