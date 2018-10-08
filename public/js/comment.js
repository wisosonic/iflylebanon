function Comment(e) {
    if (e.keyCode == 13) {
        var comment = document.getElementById("comment");
       	if (comment.value != "") {
       		document.getElementsByName("comment")[0].value = comment.value ;
       		var form = document.getElementById("comment_form");
       		form.action = "/comment" ;
       		form.submit();
       	}
    }
}

