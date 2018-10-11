function setIframeSource() {

}

function openModal(index) {
	document.getElementById("youtubeplaceid").value = index;
	var btn = document.getElementById("golive_"+index);
	modal.style.display = "block";
}

var modal = document.getElementById('myModal');
var span = document.getElementsByClassName("close")[0];

span.onclick = function() {
	document.getElementById("youtubeplaceid").value = "";	
	document.getElementById("youtubeiframe").setAttribute("src", "https://www.youtube.com/embed/{{$broadcast->id}}?controls=1&fs=1");
    	modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
	modal.style.display = "none";
    }
}
