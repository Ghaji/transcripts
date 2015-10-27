/*
** This is the validation, modal and ajax javascript
** to do validation, show modal and do ajax post.
** You can modify any part but please make sure you 
** leave this notice intact
** * Mohammed Ahmed Ghaji * web developer University
** of Jos Nigeria. ................
*/

jQuery.noConflict();
jQuery(document).ready(function(){

// This is to close the modal window	
jQuery("#close").click(function(){
	jQuery(".modal").modal("hide");
});

// This is to close or hide the modal window
jQuery("#done").click(function(){
	jQuery(".modal").modal("hide");
});
 
// This function is to show a modal when a process is on
function show_modal(){
	jQuery(" .modal-body").html("<center class='loading'>Loading Please Wait...</center>");
	jQuery(" .modal-body").addClass("loader");
	jQuery("#displayinfo").modal("show");
}
// This function is to display a modal when an activity is on 	
function display_modal(msg){
	jQuery(".modal-body").removeClass("loader");
	jQuery(" .modal-body").html(msg);
	jQuery("#displayinfo").modal("show");
}
 
// this jquery is to validates the fields on the form and also pass
// the data to php to process.

jQuery.validator.setDefaults({
	submitHandler: function(){ 
		show_modal();
		jQuery.ajax({
		  type: "POST",
		  url: "ajax/ajax_verify.php",
		  data: jQuery(".verify").serialize()
		}).done(function( msg ){
			display_modal(msg);
		});
	}
 });

// Set validation rules to make sure all fields
// are validated and the correct value is passed.
 jQuery('.verify').validate({
  rules: {
	email: {
      required: true,
	  email: true,
	  remote: "email.php"
    },
	epassword: {
      required: true,
	  minlength: 6
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
 
}); 

// end document.ready