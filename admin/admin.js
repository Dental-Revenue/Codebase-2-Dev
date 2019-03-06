jQuery(document).ready(function($){
	
	console.log('admin scripts loading');
	
/*
	$('.hpmb-header a').on('click',function(e){
		e.preventDefault();
		if($(this).hasClass('active')){
			$(this).parent().next().slideUp('slow');
			$(this).removeClass('active');
		}else{
			$(this).parent().next().slideDown('slow');
			$(this).addClass('active');
		}
	});
*/

	$( "#sortable" ).sortable({
		update: function( event, ui ) {
			//console.log(event);
			//console.log(ui);
			
			
			
			//loop through and put number on each
			$('.hp-module-block').each( function( index, element ){

				var instance = $(this).attr('data-instance');
				var order = index;
				
				$.ajax({
					type: 'post',
					dataType: 'json',
					url: '/wp-admin/admin-ajax.php',
					data: {action:"update_module_order",instance:instance , order:order},
					success: function(response){
						console.log(response);
					},
					error: function(xhr, ajaxOptions, thrownError){
						console.log(xhr.status);
						console.log(thrownError);
					}
				});
				
			});
			
		}
	});
  $( "#sortable" ).disableSelection();
  
  $( ".meta-box-sortables" ).sortable({
	  update: function( event, ui ) {
			//console.log(event);
			//console.log(ui);
			
			

			//loop through and put number on each
			$('.cmb2-postbox').each( function( index, element ){

				var instance = $(this).attr('id');
				var order = index;
				
				$.ajax({
					type: 'post',
					dataType: 'json',
					url: '/wp-admin/admin-ajax.php',
					data: {action:"update_module_order",instance:instance , order:order},
					success: function(response){
						console.log(response);
					},
					error: function(xhr, ajaxOptions, thrownError){
						console.log(xhr.status);
						console.log(thrownError);
					}
				});
				
			});

			
		}
	 });
  
  //When a "background type" gets changed for a module, show specific fields
/*
  var setBackground = function(trigger){
	  
	  $this_module = trigger.closest('.postbox');
	  $this_module.find('.hide').hide().removeClass('double-rule');
	  
	  var module_id = $this_module.attr('id');
	  
	  if(trigger.val()=='image'){
		  $this_module.find('.cmb2-id-'+module_id+'-bg-image').show().addClass('double-rule');
	  }else if(trigger.val()=='custom'){
		  $this_module.find('.cmb2-id-'+module_id+'-bg-hex').show().addClass('double-rule');
	  }else if(trigger.val()=='white'){
	  	//nothing, keep all hidden
	  }else{
		  $this_module.find('.cmb2-id-'+module_id+'-bg-percentage').show().addClass('double-rule');
	  }
  };
  $('.bg-trigger select').on('change',function(){
	  setBackground($(this));
  });
  $('.bg-trigger select').each( function( index, element ){
    setBackground($(this));
	});
*/


	//Smile Gallery 1 - Conditional Display of Fields
	if($('#g1_info').length>0){
		var gallery1Fields = function($trigger){
			
			//get important objects
			var $trigger = $trigger;
			var $fieldRow = $trigger.parent().parent();
			var $groupRow = $fieldRow.parent().parent();
			
			//is this for the primary image or secondary image?
			var triggerType = ($fieldRow.hasClass('primary-trigger')) ? 'primary-image-' : 'lightbox-image-' ;
			
			//get the value of the select field
			var fieldVal = $trigger.val();
			
			//hide all fields	  
			$groupRow.find('div[class*="'+triggerType+'"],div[class^="'+triggerType+'"]').addClass('dr-hidden');
			    
  	  if(fieldVal=='' || fieldVal=='default'){
		  	//hide all options
  	  }else if(fieldVal=='hero'){
		  	$groupRow.find('.'+triggerType+'hero').removeClass('dr-hidden');
  	  }else if(fieldVal=='ba'){
		  	$groupRow.find('.'+triggerType+'before').removeClass('dr-hidden');
		  	$groupRow.find('.'+triggerType+'after').removeClass('dr-hidden');
  	  }	
		  
  	};
  	$('body').on('change','.g1-trigger select',function(){
		  gallery1Fields($(this));
  	});
  	$('.g1-trigger select').each(function(i,e){
  	  gallery1Fields($(this));
		});
		
		//hide fields on new row
		jQuery(document).on('cmb2_add_row',function(e,f){
			f.find('div[class*="primary-image-"],div[class*="lightbox-image-"]').addClass('dr-hidden');
		});
	}
	
	
	/// Add Module form processor
	 $('.mm-form form').on('submit', function(e) {
	      var $this = $(this);
	      var err = 0;
				$('input,textarea').removeClass('invalid');
	      var name = $this.find('input[name="module_display_name"]');
	      if (name.length && name.val() == '') {
	        	e.preventDefault();
	          name.addClass('invalid');
	          $this.append('<p class="err">Please fill out all required form fields.</p>');
	      } else {
	      	$this.submit();  
	      } 
	 }); 

	
});