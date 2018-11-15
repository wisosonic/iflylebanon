function openModal(index) {
	document.getElementById("place_id").value = index;
	document.getElementById("youtubeurl").value = "";
        document.getElementById("youtubeiframe").setAttribute("src", "");
	document.getElementById("publishspan").innerHTML = "" ;
	document.getElementById("youtubeiframe").style.display = "none";
	document.getElementById("publishspanstatus").innerHTML = "";
	document.getElementById("publishspanstatus").style.display = "none";
	document.getElementById("publishbutton").style.display = "none";
	var btn = document.getElementById("golive_"+index);
	modal.style.display = "block";
}
function openModal2(index) {
	videos = [];
	jQuery.ajax({
          type: "POST",
          url: "/get-live-streaming",
          data: {
                  _token : token,
		  place_id : index
              },
          success: function(array) {
            var array = JSON.parse(array);
	    var place = array["place"];
	    array = array["videos"];
	    if	(array.length>0) {
		modal2.style.display = "block";
		document.getElementById("youtubeiframe2").style.display = "inline-block";
		document.getElementById("youtubeiframe2").setAttribute("src", "https://www.youtube.com/embed/"+array[0]["video_id"]+"?controls=1&fs=1&autoplay=1");
		document.getElementById("youtubeiframe2").setAttribute("width", 0.9*document.getElementById("youtubeiframe2div").offsetWidth);
		document.getElementById("youtubeiframe2").setAttribute("height", 0.754*document.getElementById("youtubeiframe2div").offsetWidth);
		document.getElementById("iframe_report").setAttribute("href", "/report-live-streaming/"+array[0]["video_id"]);
		document.getElementById("livestream_title").innerHTML = place["title"];
		sidebar = document.getElementById("livestream_sidebar");
		sidebar.innerHTML = "";
		for (var i=0; i<array.length;i++) {
			var iframeURL = "https://www.youtube.com/embed/"+array[i]["video_id"]+"?controls=1&fs=1&autoplay=1" ;
			var image_source = array[i]["snippet"]["thumbnails"]["default"]["url"] ;
			var video_title = array[i]["snippet"]["title"];
			var author = array[i]["user"]["name"] ;
			var time = array[i]["snippet"]["publishedAt"] ;
			time = time.replace("T", " at ") ;
			time = time.split(".")[0];

			var iDiv = document.createElement('div');
			var innerDiv1 = document.createElement('div');
			var innerDiv2 = document.createElement('div');
			var iA = document.createElement('a');
			var iImg = document.createElement('img');
			var iSpan1 = document.createElement('span');
			var br = document.createElement('br');
			var iSpan2 = document.createElement('span');
			var hr = document.createElement('hr');

			iDiv.className = 'row';
			innerDiv1.className = 'trois';
			innerDiv2.className = 'neuf';

			hr.className = 'hr';

			iA.href = "#";
			iA.setAttribute("onclick", 'setIframeURL("'+iframeURL+'", "'+ array[i]["video_id"] +'");');
			iImg.src = image_source ;
			iA.appendChild(iImg);
			
			iSpan1.innerHTML =  video_title ;
			iSpan2.innerHTML =  author + " - " + time ;

			
			innerDiv1.appendChild(iA);

			innerDiv2.appendChild(iSpan1);
			innerDiv2.appendChild(document.createElement('br'));
			innerDiv2.appendChild(iSpan2);

			iDiv.appendChild(innerDiv1);
			iDiv.appendChild(innerDiv2);
			iDiv.appendChild(hr);

			sidebar.appendChild(iDiv)
		}
	    }
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
}

function setIframeURL(url, video_id) {
	document.getElementById("youtubeiframe2").setAttribute("src", url);
	document.getElementById("iframe_report").setAttribute("href", "/report-live-streaming/"+video_id);
}

var modal = document.getElementById('myModal');
var modal2 = document.getElementById('myModal2');
var span = document.getElementsByClassName("close")[0];
var span2 = document.getElementsByClassName("close")[1];

span.onclick = function() {
	document.getElementById("place_id").value = "";	
	document.getElementById("youtubeiframe").setAttribute("src", "");
    	modal.style.display = "none";
}
span2.onclick = function() {
	document.getElementById("livestream_sidebar").innerHTML = "";
	document.getElementById("youtubeiframe2").setAttribute("src", "");
    	modal2.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
	span.click();
    }
    if (event.target == modal2) {
	span2.click();
    }
}
