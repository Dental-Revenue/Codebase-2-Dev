jQuery(document).ready(function(){

	
	/*
	 *
	 * NHP_Options_upload function
	 * Adds media upload functionality to the page
	 *
	 */
	 
	 //custom
	var _custom_media = true,
	_orig_send_attachment = wp.media.editor.send.attachment;
	console.log(_orig_send_attachment);
	// end custom
	
	
	 
	 var header_clicked = false;
	 
	jQuery("img[src='']").attr("src", nhp_upload.url).attr("data-url", nhp_upload.url);
	
	
	
	jQuery('.nhp-opts-upload').click(function() {
		header_clicked = true;
		formfield = jQuery(this).attr('rel-id');
		preview = jQuery(this).prev('img');
		//tb_show('', 'media-upload.php?type=image&amp;post_id=0&amp;TB_iframe=true');
		//return false;
		imgurl = preview.attr('data-url');
		imgid = preview.attr('data-id');
		
		//custom
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = jQuery(this);
		var id = formfield;
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
  			//console.log(formfield);
				//jQuery("#"+formfield).val(attachment.url);
				//console.log('1'+attachment.url);
				console.log('id is: '+attachment.id);
				preview.attr('data-url',attachment.url);
				preview.attr('data-id',attachment.id);
				preview.attr('src',attachment.url);
				imgurl = attachment.url;
				imgid = attachment.id;
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
				console.log('2'+_orig_send_attachment);
			};
		}

		wp.media.editor.open(button);
		return false;
		//end custom
		
		
	});
	
	//custom
	jQuery('.add_media').on('click', function(){
		_custom_media = false;
  });
  //end custom
	
	
	// Store original function
	window.original_send_to_editor = window.send_to_editor;
	
	
	window.send_to_editor = function(html) {
		if (header_clicked) {
			console.log(imgurl+' '+formfield+' '+imgid);
			jQuery('#' + formfield).val(imgid);
			jQuery('#' + formfield).next().fadeIn('slow');
			jQuery('#' + formfield).next().next().fadeOut('slow');
			jQuery('#' + formfield).next().next().next().fadeIn('slow');
			jQuery(preview).attr('src' , imgurl);
			//tb_remove();
			header_clicked = false;
		} else {
			window.original_send_to_editor(html);
		}
	}
	
	jQuery('.nhp-opts-upload-remove').click(function(){
		$relid = jQuery(this).attr('rel-id');
		jQuery('#'+$relid).val('');
		jQuery(this).prev().fadeIn('slow');
		jQuery(this).prev().prev().fadeOut('slow', function(){jQuery(this).attr("src", nhp_upload.url).attr("data-url", nhp_upload.url);});
		jQuery(this).fadeOut('slow');
	});
});