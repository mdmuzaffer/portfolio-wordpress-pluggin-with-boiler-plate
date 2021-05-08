jQuery(function(){

	var ajaxurl = request_ajax_public.publicajaxUrl; //in the file class-portfolio-public.php see the wp_localize_script option

	jQuery(document).on('click','.first-ajax-request', function(){

	  	var postdata ="action=public_ajax_request&param=first_ajax_request";
		jQuery.post(ajaxurl, postdata, function(response){
			console.log(response);
		});
	});

});

