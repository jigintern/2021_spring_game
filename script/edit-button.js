function toggleTextArea() {
    var edit_area = document.getElementById('edit_area');
	if(edit_area.style.display=="block"){
		// noneで非表示
		edit_area.style.display ="none";
	}else{
		// blockで表示
		edit_area.style.display ="block";
	}
}