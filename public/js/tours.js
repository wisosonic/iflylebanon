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

function showdate (step){
    $("#"+step).datepicker('show');
}

function cleardate (step) {
    $("#"+step).datepicker('reset');
    $("#"+step).val("");
    
}
function AddZero(num) {
    return (num >= 0 && num < 10) ? "0" + num : num + "";
}
function getFullTime() {
    var now = new Date();
    var time = " " + [AddZero(now.getHours()),  AddZero(now.getMinutes()), AddZero(now.getSeconds()) ].join(":")
    return time
};
function today (step){
    $("#"+step).datepicker('pick');
}

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

function validateNewTourForm() {
	var errors = 0;
	var title = document.getElementsByName("title")[0];
	var description = document.getElementsByName("description")[0];
	var date = document.getElementsByName("date")[0];
	var time = document.getElementsByName("time")[0];
	var duration = document.getElementsByName("duration")[0];
	var places = document.getElementsByName("places")[0];
	var maxplaces =  document.getElementsByName("maxplaces")[0];
	var price =  document.getElementsByName("price")[0];
	var meeting =  document.getElementsByName("meeting")[0];

	if (title.value == "") {
		title.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		title.style.border = "none";
	}

	if (description.value == "") {
		description.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		description.style.border = "none";
	}
	
	if (date.value == "") {
		date.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		date.style.border = "none";
	}

	if (time.selectedIndex == 0) {
		time.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		time.style.border = "none";
	}

	if (duration.value == "") {
		duration.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		duration.style.border = "none";
	}

	if (places.value == "") {
		places.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		places.style.border = "none";
	}

	if (maxplaces.value == "") {
		maxplaces.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		maxplaces.style.border = "none";
	}

	if (price.value == "") {
		price.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		price.style.border = "none";
	}

	if (meeting.value == "") {
		meeting.style.border = "2px dashed #ff803c";
		errors = errors + 1 ;
	} else {
		meeting.style.border = "none";
	}

	return errors;
}

function sendNewTourForm() {
	errors = validateNewTourForm() ;
	if (errors == 0) {
		form=document.getElementById("addnewtour_form");
		form.action = "/agency/add-new-tour";
		form.submit();
	} else {
		toastr["error"]("Please fill in all the required fields", "Attention !");	
	}
}


