
setInterval(function() {
	jQuery.ajax({
          type: "POST",
          url: "/check-live-streaming",
          data: {
                  _token : token
              },
          success: function(array) {
            var array = JSON.parse(array);
	    var count = 0;
	    Object.keys(array).forEach(function(id) {
		  var a = document.getElementById("livestreaminglink_"+id);
	    	  var icon = document.getElementById("livestreamingicon_"+id);
	    	  var span = document.getElementById("livestreamingbutton_"+id);
		  if (array[id]) {
		  	a.setAttribute("href", array[id]);
			icon.setAttribute("class", "fas fa-wifi");
			icon.style.color = "green";
			span.innerHTML="Live now";
			count = count + 1;
		  } else {
			a.setAttribute("href", "#");
			icon.setAttribute("class", "fas fa-circle");
			icon.style.color = "red" ;
			span.innerHTML="CHANNEL OFFLINE";
		  }
	    });
	    if (count > 0) {
		if (count == 1) {
			toastr["success"]("There is 1 live streaming video available", "Live streams are live now !");	
		} else {
			toastr["success"]("There are " + count + " live streaming videos available", "Live streams are live now !");	
		}
	    	
	    }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
}, 10000);

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
