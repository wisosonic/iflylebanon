
setInterval(function() {
	swal({   
		title: "Votre session a expiré",   
		text: "",    
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

function validateNewPlaceForm() {
	var errors = 0;
	var title = document.getElementById("title");
	var department = document.getElementById("department");
	var description = document.getElementById("description");
	var text = document.getElementById("text");
	var long =  document.getElementById("long");
	var lat =  document.getElementById("lat");
	var map =  document.getElementById("map");
	var coverphoto =  document.getElementById("coverphoto");

	if (title.value == "") {
		title.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		title.style.border = "none";
	}

	if (department.value == "") {
		department.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		department.style.border = "none";
	}
	
	if (description.value == "") {
		description.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		description.style.border = "none";
	}

	if (text.value == "") {
		text.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		text.style.border = "none";
	}

	if (long.value == "") {
		map.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		map.style.border = "none";
	}

	if (lat.value == "") {
		map.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		map.style.border = "none";
	}

	if (coverphoto.value == "") {
		coverphoto.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		coverphoto.style.border = "none";
	}

	return errors;
}


function sendNewPlaceForm() {
	errors = validateNewPlaceForm() ;
	if (errors == 0) {
		form=document.getElementById("addnewplace_form");
		form.action = "/add-new-place";
		form.submit();
	} else {
		toastr["error"]("Please fill in all the required fields", "Attention !");	
	}
}


