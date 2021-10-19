
function _(element){
	return document.getElementById(element); 
}
//The code bellow is from the all link//
var HomePage = _('HomePage');
var B_OfficialPage = _('BarangayOfficialPage');
var HouseHoldPage = _('House_HoldPage');
var File_link = _('Filepage');
var Pukor_link = _('PorokPage');
var BlotterPage = _('BlotterPage');
var VotersPage = _('VotersPage');

HomePage.addEventListener('click', getHomePage);
B_OfficialPage.addEventListener('click', getBO_Page);
HouseHoldPage.addEventListener('click', getHous_Hpage);
File_link.addEventListener('click', get_File_link);
Pukor_link.addEventListener('click', get_Purok_link);
BlotterPage.addEventListener('click', get_Blotter_link);
VotersPage.addEventListener('click', get_Voters_link);

function getBO_Page(){
	window.location = 'BarangayOfficial.php';
}
function getHomePage(){
	window.location = 'index.php';
}
function getHous_Hpage(){
	window.location = 'HouseHold_page.php';
}
function get_File_link(){
	window.location = 'FileLInk.php';
}

function get_Purok_link(){
	window.location = 'PurokPage.php';
}
function get_Blotter_link(){
	window.location = 'BlotterPage.php';
}
function get_Voters_link(){
	window.location = 'Voters.php';
}

function getData_image(Data_image){
	var image = Data_image;

	var Image_id = "Image_id=" + image;

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
var myform = _('Save_Official_record');

myform.addEventListener('click', get_form_data);

function get_form_data(a){

	a.preventDefault();


	function data_collection(element){
			return document.getElementsByName(element);
	}

	var data_form = data_collection('Official_data');

	var all_data = {};


 				all_data.ProfileImage = data_form[0].value;
 				all_data.FirstName = data_form[1].value;
 				all_data.MiddleName = data_form[2].value;
 				all_data.LastName = data_form[3].value;
				all_data.Age = data_form[4].value;
				all_data.DateofBirth = data_form[5].value;
 				all_data.Official_term = data_form[6].value;
 				all_data.Position = data_form[7].value;
 				all_data.SivilStatus = data_form[8].value;
 			
 				if(all_data.ProfileImage == ""){
		
					_("Data_remark").style.color = "#F47E6D";
					_("Data_remark").innerHTML = "Yuo have an Error! please fill out all data require";
						
				}
 				else if(all_data.FirstName == ""){
		
					_("Data_remark").style.color = "#F47E6D";
					_("Data_remark").innerHTML = "Yuo have an Error! please fill out all data require";
						
				}
				else if(all_data.MiddleName == ""){
		
					_("Data_remark").style.color = "#F47E6D";
					_("Data_remark").innerHTML = "Yuo have an Error! please fill out all data require";
						
				}
				else if(all_data.LastName == ""){
		
					_("Data_remark").style.color = "#F47E6D";
					_("Data_remark").innerHTML = "Yuo have an Error! please fill out all data require";
						
				}
				else if(all_data.Age == ""){
		
					_("Data_remark").style.color = "#F47E6D";
					_("Data_remark").innerHTML = "Yuo have an Error! please fill out all data require";
						
				}
				else if(all_data.DateofBirth == ""){
		
					_("Data_remark").style.color = "#F47E6D";
					_("Data_remark").innerHTML = "Yuo have an Error! please fill out all data require";
						
				}
				else if(all_data.Official_term == ""){
		
					_("Data_remark").style.color = "#F47E6D";
					_("Data_remark").innerHTML = "Yuo have an Error! please fill out all data require";
						
				}
				else if(all_data.Position == ""){
		
					_("Data_remark").style.color = "#F47E6D";
					_("Data_remark").innerHTML = "Yuo have an Error! please fill out all data require";
						
				}
				else if(all_data.SivilStatus == ""){
		
					_("Data_remark").style.color = "#F47E6D";
					_("Data_remark").innerHTML = "Yuo have an Error! please fill out all data require";
						
				}
				else{
					send_data(all_data, 'Save_Official_record');
				}
					
}

function send_data(data, type){

	var xml = new XMLHttpRequest();

	/*0: request not initialized
	1: server connection established
	2: request received
	3: processing request
	4: request finished and response is ready*/

	xml.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
        	_('Data_remark').style.color = "#7490E7";
        	_('Data_remark').innerHTML = xml.responseText;
        	
       }
       
    } 

       data.data_type = type;
       var data_string = JSON.stringify(data);

       	xml.open('POST', '../PHP_FOLDER/SaveOfficialRecord.php', true);
		xml.send(data_string);

}

var search_image = _('search_image1');

search_image.addEventListener('click', get_image);

function get_image(a){

	a.preventDefault();
	var imate_text = _('btn_text').value;

	var Image_name = "Image_name=" + imate_text;

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('Image_Box_search').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/search_image_official.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(Image_name);
}

function get_dataOffi(Official_ID){
	
	var Official_ID = Official_ID;

	var DataOfficial_ID = "DataOfficial_ID=" + Official_ID;

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('responseRecord_text').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/ProfileViewOfficial.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(DataOfficial_ID);
}
function update_Official(){

	var Official_data_Update = document.getElementsByName('Data_official');

	var Update_data = {};
	
	
	Update_data.ID = Official_data_Update[0].value;
	Update_data.Fname = Official_data_Update[1].value;
	Update_data.Mname = Official_data_Update[2].value;
	Update_data.Lname = Official_data_Update[3].value;
	Update_data.Age = Official_data_Update[4].value;
	Update_data.DateofBirth = Official_data_Update[5].value;
	Update_data.Official_term = Official_data_Update[6].value;
	Update_data.Position = Official_data_Update[7].value;
	Update_data.CivilStatus = Official_data_Update[8].value;

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			alert(xhr.responseText);
		}
	}
	xhr.open('POST', '../PHP_FOLDER/OfficialDataUpdate.php', true);
	var updatingDataH = JSON.stringify(Update_data);
	xhr.send(updatingDataH);

}
function select_Official(){

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('responseRecord_text').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/B_OfficialSearch.php', true);

	xhr.send();
}

function Search_Official(){

	
	var Official_name =_('search_official').value;

	var B_Official_name = "B_Official_name=" + Official_name;

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('responseRecord_text').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/B_OfficialSearch.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(B_Official_name);
	
}
