jQuery(function(){

	var ajaxurl = admin_ajax.adminajaxUrl; 

	// create book self
	jQuery("#form-create-book-self").validate({

		submitHandler: function(){
			var postdata = jQuery("#form-create-book-self").serialize();

			postdata+= "&action=admin_ajax_request&param=create-book-self";
			jQuery.post(ajaxurl, postdata, function(response){

				var responseData = jQuery.parseJSON(response)

				if (responseData.status ==1) {
					alert(responseData.message);
					setTimeout(function(){ location.reload(); }, 2000);
				}

				if (responseData.status ==0) {
					alert(responseData.message);
					setTimeout(function(){ location.reload(); }, 2000);
				}

			});
		}
	});

	//Delete self book using ajax
	jQuery(document).on("click","#self-book-delete",function(){
		var selfBookId = jQuery(this).attr("book_self_id");

		var postdata ="action=admin_ajax_request&param=self_book_delete&self_book_id=" +selfBookId;

		jQuery.post(ajaxurl, postdata, function(response){
			var responseData = jQuery.parseJSON(response)

				if (responseData.status ==1) {
					alert(responseData.message);
					setTimeout(function(){ location.reload(); }, 2000);
				}

				if (responseData.status ==0) {
					alert(responseData.message);
					setTimeout(function(){ location.reload(); }, 2000);
				}
		});


	});

	// check the ajax request self
	jQuery(document).on("click","#ajax_request_first",function(){

		var postdata ="action=admin_ajax_request&param=first_simple_ajax";

		jQuery.post(ajaxurl, postdata, function(response){
			console.log(response);
		});

	});

	//Add book details
	//added first validation
	jQuery("#add_book_details").validate({

		submitHandler: function(){
			var postdata = jQuery("#add_book_details").serialize();

			postdata+= "&action=admin_ajax_request&param=add_book_details";

			jQuery.post(ajaxurl, postdata, function(response){

				var responseData = jQuery.parseJSON(response)

				if (responseData.status ==1) {
					alert(responseData.message);
					setTimeout(function(){ location.reload(); }, 2000);
				}

				if (responseData.status ==0) {
					alert(responseData.message);
					setTimeout(function(){ location.reload(); }, 2000);
				}

			});
		}
	});

	// image upload in media
	jQuery(document).on("click", "#imageSelect", function(){
	        var image = wp.media({ 
	        title: 'Book Upload',
	        multiple: false
		}).open().on('select', function(e){

			var uploaded_image = image.state().get('selection').first();
     		var image_url = uploaded_image.toJSON().url;
     		jQuery('#image_url').val(image_url);
     		jQuery("#previewImage").attr("src", image_url);

		});

	});

	// delete the book lis
	jQuery(document).on("click","#book_list_delete",function(){
		var booklistId = jQuery(this).attr("book_list_id");
		var postdata ="action=admin_ajax_request&param=book_list_delete&book_list_id="+booklistId;

		jQuery.post(ajaxurl, postdata, function(response){
			var responseData = jQuery.parseJSON(response)

				if (responseData.status ==1) {
					alert(responseData.message);
					setTimeout(function(){ location.reload(); }, 2000);
				}

				if (responseData.status ==0) {
					alert(responseData.message);
					setTimeout(function(){ location.reload(); }, 2000);
				}
		});
	});



});
