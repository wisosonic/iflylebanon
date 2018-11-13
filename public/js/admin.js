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

function validateAddAdminForm() {
	var errors = 0;
	var user_id = document.getElementsByName("user_id")[0];

	if (user_id.selectedIndex == 0) {
		user_id.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		user_id.style.border = "none";
	}

	return errors;
}
function validateNewTourForm() {
	var errors = 0;
	var agency_id = document.getElementsByName("agency_id")[0];

	if (agency_id.selectedIndex == 0) {
		agency_id.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		agency_id.style.border = "none";
	}

	return errors;
}
function validateAddBlacklistForm() {
	var errors = 0;
	var user_id = document.getElementsByName("user_id")[0];

	if (user_id.selectedIndex == 0) {
		user_id.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		user_id.style.border = "none";
	}

	return errors;
}
function validateAddWhitelistForm() {
	var errors = 0;
	var user_id = document.getElementsByName("user_id")[0];

	if (user_id.selectedIndex == 0) {
		user_id.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		user_id.style.border = "none";
	}

	return errors;
}
function validateAddkeywordForm() {
	var errors = 0;
	var word = document.getElementsByName("word")[0];

	if (word.value == "") {
		word.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		word.style.border = "none";
	}

	return errors;
}

function sendActivateAgencyForm() {
	errors = validateActivateAgencyForm() ;
	if (errors == 0) {
		form=document.getElementById("activateagancy_form");
		form.action = "/admin/activate-agency";
		form.submit();
	} else {
		toastr["error"]("Please fill in all the required fields", "Attention !");	
	}
}

function sendAddAdminForm() {
	errors = validateAddAdminForm() ;
	if (errors == 0) {
		form=document.getElementById("addadmin_form");
		form.action = "/admin/add-admin";
		form.submit();
	} else {
		toastr["error"]("Please fill in all the required fields", "Attention !");	
	}
}

function sendAddBlacklistForm() {
	errors = validateAddBlacklistForm() ;
	if (errors == 0) {
		form=document.getElementById("addblacklist_form");
		form.action = "/admin/add-to-blacklist";
		form.submit();
	} else {
		toastr["error"]("Please fill in all the required fields", "Attention !");	
	}
}

function sendAddWhitelistForm() {
	errors = validateAddWhitelistForm() ;
	if (errors == 0) {
		form=document.getElementById("addwhitelist_form");
		form.action = "/admin/add-to-whitelist";
		form.submit();
	} else {
		toastr["error"]("Please fill in all the required fields", "Attention !");	
	}
}

function sendEditBlacklistForm() {
	form=document.getElementById("editblacklist_form");
	form.action = "/admin/edit-blacklist";
	form.submit();
}

function sendAddKkeywordForm() {
	errors = validateAddkeywordForm() ;
	if (errors == 0) {
		form=document.getElementById("addkeyword_form");
		form.action = "/admin/add-keyword";
		form.submit();
	} else {
		toastr["error"]("Please fill in all the required fields", "Attention !");	
	}
	
}



