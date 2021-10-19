
function _(element){
	return document.getElementById(element); 
}


function search_image_HH(){

	var ID_householdNew = _('HnewID').value;
	var searcText = _('Search_ImageH').value;


	var NewIDHousehold_search = "NewIDHousehold_search=" + ID_householdNew;
	var TexSearch = "TexSearch=" + searcText;

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			document.getElementById('newDataImageAll').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/imageSearchGallary.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(NewIDHousehold_search + "&" +TexSearch);	

}