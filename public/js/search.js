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

function tagSearch(tag) {
	var search = document.getElementById("tagsearch");
	search.value = tag;
	var form = document.getElementById("tagsearch_form");
	form.action = "/search-tag" ;
	form.submit();
	
}


