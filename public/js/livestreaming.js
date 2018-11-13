
setInterval(function() {
	jQuery.ajax({
          type: "POST",
          url: "/check-live-streaming",
          data: {
                  _token : token
              },
          success: function(array) {
            var array = JSON.parse(array);
	    var counts = array["counts"];
	    array = array["places"];
	    var count = 0;
	    Object.keys(array).forEach(function(id) {
		  var a = document.getElementById("livestreaminglink_"+id);
	    	  var icon = document.getElementById("livestreamingicon_"+id);
	    	  var span = document.getElementById("livestreamingbutton_"+id);
		  if (array[id]) {
		  	a.setAttribute("href", "#");
			a.setAttribute("onclick", "openModal2('"+id+"');");
			icon.setAttribute("class", "fas fa-wifi");
			icon.style.color = "green";
			span.innerHTML= counts[id] + " streams(s)";
			count = count + 1;
		  } else {
			a.setAttribute("href", "#");
			icon.setAttribute("class", "fas fa-circle");
			icon.style.color = "red" ;
			span.innerHTML="OFFLINE";
		  }
	    });
	    if (count > 0) {
		document.getElementById("livestreamcount").style.display = "inline";
		if (count == 1) {
			document.getElementById("livestreamcount").innerHTML = "1 live place";
			if (! notified || count != lastLiveCount) {
				toastr["success"]("There is 1 live place available", "Live streams are live now !");
				lastLiveCount = count ;
				notified = true;
			}
			
		} else {
			document.getElementById("livestreamcount").innerHTML = count +  " live places";
			if (! notified || count != lastLiveCount) {
				toastr["success"]("There are " + count + " live places available", "Live streams are live now !");
				lastLiveCount = count ;
				notified = true;
			}
		}
	    	
	    } else {
		document.getElementById("livestreamcount").style.display = "none";
		lastLiveCount = 0;
		notified = false;
	    }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
}, 5000);

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




