function Search(e) {
    if (e.keyCode == 13) {
        var search = document.getElementById("search");
       	if (search.value != "") {
       		document.getElementsByName("search")[0].value = search.value ;
       		var form = document.getElementById("search_form");
       		form.action = "/search" ;
       		form.submit();
       	}
    }
}