setInterval(function() {
	swal({   
		title: "",   
		text: "Your session has expired !",   
		type: "warning",   
		showCancelButton: false,   
		confirmButtonColor: "#ff803c",   
		confirmButtonText: "OK",
		allowOutsideClick: false,
		allowEscapeKey: false 
	}).then(function(){
		location.href='/' ;
	}).catch(swal.noop);
}, 1320000);

toastr.options = {
      "closeButton": true,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": true,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    };

function validateBookTourForm() {
	var errors = 0;

	var name = document.getElementsByName("name")[0];
	var phone = document.getElementsByName("phone")[0];
	var places = document.getElementsByName("places")[0];

	if (name.value == "") {
		name.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		name.style.border = "none";
	}

	if (phone.value == "") {
		phone.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		phone.style.border = "none";
	}
	
	if (places.selectedIndex == 0) {
		places.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		places.style.border = "none";
	}

	return errors;
}


function sendBookingForm() {
	errors = validateBookTourForm() ;
	if (errors == 0) {
		form=document.getElementById("booktour_form");
		form.action = "/book-tour";
		form.submit();
	} else {
		toastr["error"]("Please fill in all the required fields", "Attention !");	
	}
}


