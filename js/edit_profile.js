// JavaScript Document
jQuery.noConflict();
jQuery(document).ready(function() {

	$('.datepicker').datepicker();

	jQuery("#close").click(function() {
		jQuery("#close").load('profile.php')
		jQuery(".modal").modal("hide");
		
	});

	jQuery("#done").click(function() {
		jQuery(".modal").modal("hide");
	});

	function show_modal() {
		jQuery(".modal-body").html("<center class='loading'>Loading Please Wait...</center>");
		jQuery(".modal-body").addClass("loader");
		jQuery("#displayinfo").modal("show");
	}

	function display_modal(msg) {
		jQuery(".modal-body").removeClass("loader");
		jQuery(".modal-body").html(msg);
		jQuery("#displayinfo").modal("show");
	}

	function validate_add_form(btn, form) {
		form_data = jQuery("."+form).serialize()+ "&btn=" + btn;
		
		jQuery.validator.setDefaults({
			submitHandler : function() {
				show_modal();
				jQuery.ajax({
					type : "POST",
					url : "ajax/ajax_edit_profile.php",
					data : form_data
				}).done(function(msg) {
					display_modal(msg);
				});
			}
		});  
		jQuery('.'+form).validate({
			rules : {
				full_name : {
					required : true
				},
				matriculation_no : {
					required : true
				}
			},
			errorClass : "help-inline",
			highlight : function(label) {
				jQuery(label).closest('.control-group').removeClass('success').addClass('error');
			},
			success : function(label) {
				label.text('OK!').addClass('valid').closest('.control-group').addClass('success');
			}
		});
	}

	jQuery('#edit_profile').click(function() {
		validate_add_form('edit_profile', 'edit_profile');
	});
});
// end document.ready