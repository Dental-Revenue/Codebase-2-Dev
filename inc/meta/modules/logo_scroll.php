<?php 
	
				/*$box->add_field( array(
					'name'	=> '# of Slides to Show',
					'id'		=> $prefix .'num_slides',
			    'type' 	=> 'select',
					'options' => array(
						'3' => 'Three Logos',
						'4' => 'Four Logos',
						'5' => 'Five Logos',
					),
				));*/
				$box->add_field( array(
					'name' => 'Common Logos',
					'id'   => $prefix .'common_images',
					'type' => 'multicheck_inline',
					'options' => array(
						'/wp-content/themes/codebase-2/assets/images/layout/logo-ada.png' => 'ADA',
						'/wp-content/themes/codebase-2/assets/images/layout/logo-aacd.png' => 'AACD',
						'/wp-content/themes/codebase-2/assets/images/layout/logo-academy.png' => 'Academy of General Dentistry',
						'/wp-content/themes/codebase-2/assets/images/layout/logo-cerec.png' => 'CEREC',
						'/wp-content/themes/codebase-2/assets/images/layout/logo-invisalign.png' => 'Invisalign',
					),
				));
				$box->add_field( array(
					'name' => 'Custom Logos',
					'description' => 'Logo should have no white space',
					'id'   => $prefix .'images',
					'type' => 'file_list',
					'options' => array('url' => false),
					'query_args' => array(
						'type' => array('image/gif','image/jpeg','image/png')
					)
				));	
				$box->add_field( array(
					'name' => 'Padding Top',
					'id' => $prefix.'paddingtop',
					'type' => 'text',
					'default' => '30px',
					'description' => 'Example: 30px'
				));
				$box->add_field( array(
					'name' => 'Padding Bottom',
					'id' => $prefix.'paddingbottom',
					'type' => 'text',
					'default' => '30px',
					'description' => 'Example: 30px'
				));


?>
