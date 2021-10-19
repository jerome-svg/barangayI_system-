function getData(data_id){
	
	var dataID = data_id;

	var Image_id = "Image_id=" + dataID;

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			var data = document.getElementById("Image_transfer").value = xhr.responseText;
			document.getElementById('image_pic').innerHTML = "<img src='../HTML_FOLDER/Image_profile/"+data+"' style='width: 100%; height: 100%; border: solid 2px #555; border-radius: 5px;'>";

			document.getElementById('Message').style.color = "#7490E7";
			document.getElementById('Message').innerHTML = "The Image is successfully set";
		}
	}
	xhr.open('POST', '../PHP_FOLDER/HouseHold.API.php?', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(Image_id);
}
