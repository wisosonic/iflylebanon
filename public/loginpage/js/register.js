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

$('#email_confirmation').bind("paste",function(e) {
    e.preventDefault();
});
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

var valid = false ;


function validatePasswordConfirmation() {
	var pass = $("#password").val();
	var confirm_pass = $("#password_confirmation").val();
	
	if (pass==confirm_pass){
		return true;
	} else {
	    	toastr["error"]("Passwords did not match !", "Oops !");
	    	$("#password").css("border","1px solid red");
	    	$("#password_confirmation").css("border","1px solid red");
		return  false ;
	}
}

function validateForm() {
	var errors = 0;
	var email = document.getElementById("email");
	var password = document.getElementById("password");
	var password_confirmation = document.getElementById("password_confirmation");
	var fname =  document.getElementById("fname");
	var lname =  document.getElementById("lname");

	var pro = $('#pro');
	if (pro.is(':checked')) {
		var agencyname = document.getElementById("agency");
		var agencyaddress = document.getElementById("address");
		var agencyphone = document.getElementById("agencyphone");

		if (agencyname.value == "") {
			agencyname.style.border = "1px solid red";
			errors = errors + 1 ;
		} else {
			agencyname.style.border = "none";
		}

		if (agencyaddress.value == "") {
			agencyaddress.style.border = "1px solid red";
			errors = errors + 1 ;
		} else {
			agencyaddress.style.border = "none";
		}

		if (agencyphone.value == "") {
			agencyphone.style.border = "1px solid red";
			errors = errors + 1 ;
		} else {
			agencyphone.style.border = "none";
		}
	}

	

	if (email.value == "") {
		email.style.border = "1px solid red";
		errors = errors + 1 ;
	} else {
		email.style.border = "none";
	}
	if (password.value == "") {
		password.style.border = "1px solid red";
		errors = errors + 1 ;
	} else {
		password.style.border = "none";
	}
	if (password_confirmation.value == "") {
		password_confirmation.style.border = "1px solid red";
		errors = errors + 1 ;
	} else {
		password_confirmation.style.border = "none";
	}
	if (fname.value == "") {
		fname.style.border = "1px solid red";
		errors = errors + 1 ;
	} else {
		fname.style.border = "none";
	}
	if (lname.value == "") {
		lname.style.border = "1px solid red";
		errors = errors + 1 ;
	} else {
		lname.style.border = "none";
	}
	
	return errors;
}

function sendForm() {
	errors = validateForm() ;
	if (errors == 0) {
		if (validatePasswordConfirmation() && valid) {
			form=document.getElementById("register_form");
			form.action = "/register";
			form.submit();
		}
	} else {
		toastr["error"]("Please fill in all the required fields !", "Attention !");	
	}
}

function checkAgency() {
	if ($('[name=pro]').is(':checked')) {
		document.getElementById("agencydiv").style.display = "block" ;
		document.getElementById("agency").setAttribute("name","agency") ;
		document.getElementById("addressdiv").style.display = "block" ;
		document.getElementById("address").setAttribute("name","address") ;
		document.getElementById("agencyphonediv").style.display = "block" ;
		document.getElementById("agencyphone").setAttribute("name","agencyphone") ;
	} else {
		document.getElementById("agencydiv").style.display = "none" ;
		document.getElementById("agency").removeAttribute("name") ;
		document.getElementById("addressdiv").style.display = "none" ;
		document.getElementById("address").removeAttribute("name") ;
		document.getElementById("agencyphonediv").style.display = "none" ;
		document.getElementById("agencyphone").removeAttribute("name") ;
	}
}


$("#email").change(function(){
    var re = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var email = $("#email").val();
    if (email == "") {
        $("#availability").html("");
        $("#availability").css('color', 'black');
        valid = false ;
    } else if (re.test(email)) {
        $.ajax({
            type: "POST",
            url: "/checkemailavailability",
            data: {
                    email : email
                  },
            success: function(availability){
                if (availability=='true') {
                    $("#availability").html("Email address is available !");
                    $("#availability").css('color', '#3F917E');
                    valid = true ;
                } else {
                    $("#availability").html("This email address has already been registered !");
                    $("#availability").css('color', 'red');
                    valid = false ;
                }
            },
            error: function(xhr, status, error) {
              console.log(xhr.responseText);
            }
        });
    } else {
        $("#availability").html("Please choose a valid email address !");
        $("#availability").css('color', 'red');
	valid = false ;
    }
});
