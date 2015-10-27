jQuery.noConflict();
jQuery(document).ready(function(){

	

 jQuery("#close").click(function(){
	jQuery(".modal").modal("hide");
 });
 
 jQuery("#done").click(function(){
	jQuery(".modal").modal("hide");
 });
 
 	function show_modal(){
		jQuery(" .modal-body").html("<center class='loading'>Loading Please Wait...</center>");
		jQuery(" .modal-body").addClass("loader");
		jQuery("#displayinfo").modal("show");
	}
	
	function display_modal(msg){
		jQuery(".modal-body").removeClass("loader");
		jQuery(" .modal-body").html(msg);
		jQuery("#displayinfo").modal("show");
	}
 
	 jQuery.validator.setDefaults({
		submitHandler: function(event) { 
				show_modal();
			jQuery.ajax({
			  type: "POST",
			  url: "ajax/ajax_adminlog.php",
			  data: jQuery(".login").serialize()
			}).done(function( msg ) {
				display_modal(msg);
				
			});
		}
	 }); 

	 jQuery('.login').validate(
	 {
	  rules: {
		staff_number: {
	      required: true,
	      number: 4,	  
	      minlength: 4
	    },
		password: {
	      required: true,
		  minlength: 6
	    }
	  },
	  	highlight: function(element) {
	        $(element).closest('.form-group').addClass('has-error');
	    },
	    unhighlight: function(element) {
	        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
	    },
	    errorElement: 'div',
	    errorClass: 'help-block',
	    errorPlacement: function(error, element) {
	        if(element.parent('.input-group').length) {
	            error.insertAfter(element.parent());
	        } else {
	            error.insertAfter(element);
	        }
	    }
	 });
 
}); // end document.ready