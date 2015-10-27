jQuery.noConflict();
jQuery(document).ready(function() {

	$('.datepicker').datepicker();

	jQuery("#close").click(function() {
		jQuery(".modal").modal("hide");
	});

	jQuery("#done").click(function() {
		jQuery(".modal").modal("hide");
	});
 
 	function show_modal() {
		jQuery(" .modal-body").html("<center class='loading'>Loading Please Wait...</center>");
		jQuery(" .modal-body").addClass("loader");
		jQuery("#displayinfo").modal("show");
	}
	
 	function display_modal(msg) {
		jQuery(".modal-body").removeClass("loader");
		jQuery(" .modal-body").html(msg);
		jQuery("#displayinfo").modal("show");
	}
 
	jQuery.validator.setDefaults({
		submitHandler: function() { 
			show_modal();
			jQuery.ajax({
			  type: "POST",
			  url: "ajax/ajax_application_form.php",
			  data: jQuery(".application_form").serialize()
			}).done(function( msg ) {
			    display_modal(msg);
			});
		}
	}); 

 	jQuery('.application_form').validate({
	  	rules: {
	  		app_no: {
	      		required: true,
	      		minlength: 11
	    	},
	  		title_id: {
	      		required: true
	    	},
	    	full_name: {
	      		required: true,
	      		minlength: 6
	    	},
	    	matriculation_no: {
	      		required: true,
	      		minlength: 6
	    	},
	    	gender_id: {
	      		required: true
	    	},
	    	date_of_birth: {
	      		required: true
	    	},
	  		email: {
	      		required: true,
	      		email: true,
		  		remote: "email.php"
	    	},
	    	phone_number: {
	      		required: true,
		  		//number: 13,
		  		minlength: 11	
	    	},
	    	contact_address: {
		  		required: true
			},
			mode_of_entry_id: {
		  		required: true
			},
			year_of_graduation: {
		 		required: true,
		 		minlength: 4,
		 		number: 4
			},
			year_of_entry: {
				required: true,
				minlength: 4,
				number: 4
			},
			receiving_address: {
				required: true
			}
	  	},
	  	errorClass: "help-inline",
	  	highlight: function(label) {
	    	jQuery(label).closest('.control-group').removeClass('success').addClass('error');
	  	},
	  	success: function(label) {
	    	label
	      	.text('OK!').addClass('valid')
	      	.closest('.control-group').addClass('success');
	  	}
 	});
	
}); // end document.ready