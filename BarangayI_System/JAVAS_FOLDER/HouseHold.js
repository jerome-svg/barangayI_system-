
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


function get_dataSelect(){

	var data = _('Civil_Status');
	var ThisData = data.options[data.selectedIndex].text;

	_('result').value = ThisData;
}
function get_PurokData(){

	var data = _('Purok_Data');
	var ThisData = data.options[data.selectedIndex].text;

	_('Purok_number').value = ThisData;
}

/*-------------------------------------------------------*/
/*Tha Code bellow is from the form data*/

var myform = _('SaveData_btn');

myform.addEventListener('click', get_form_data);


function get_form_data(a){

		a.preventDefault();


		function data_collection(element){
				return document.getElementsByName(element);
			}

			var data_form = data_collection('Data_form');

		
			var all_data = {};


 				all_data.FirstName = data_form[0].value;
 				all_data.MiddleName = data_form[1].value;
 				all_data.LastName = data_form[2].value;
 				all_data.Age = data_form[3].value;
 				all_data.Religion = data_form[4].value;
				all_data.DateBirth = data_form[5].value;
 				all_data.PlaceBirth = data_form[6].value;

 				if(data_form[7].checked){
 					all_data.Gender = data_form[7].value;
				}
 				else if(data_form[8].checked){
 					all_data.Gender = data_form[8].value;
 				}
 				all_data.Civil_Status = data_form[9].value;
 				all_data.Cityzenship = data_form[10].value;
 				all_data.Occupation = data_form[11].value;

 				all_data.House_number = data_form[12].value;
 				all_data.StreetName = data_form[13].value;
 				all_data.Purok_number = data_form[14].value;
 				all_data.Image = data_form[15].value;


					if(all_data.FirstName == ""){
		
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
						
					}
					else if(all_data.MiddleName == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.LastName == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.Age == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.Religion == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.Religion == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.DateBirth == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.PlaceBirth == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(data_form[7].checked == "" && data_form[8].checked == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.Civil_Status == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.Cityzenship == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.Occupation == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.House_number == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRED";
					}
					else if(all_data.StreetName == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.Purok_number == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else if(all_data.Image == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
					}
					else{
							send_data(all_data, 'SaveData_btn');
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

       	xml.open('POST', '../PHP_FOLDER/HouseHold.API.php', true);
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
	xhr.open('POST', '../PHP_FOLDER/search_image.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(Image_name);
}

var Search_houseHold = _('Search_houseHold_btn');

Search_houseHold.addEventListener('click', get_HouseHold_info);


function get_HouseHold_info(a){

	a.preventDefault();

	var HouseHold_text =_('Search_houseHold_text').value;

	var HouseHold = "HouseHold=" + HouseHold_text;

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('responseRecord_text').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/HouseHold_search.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(HouseHold);
	

}
function get_dataHouseHold(HouseHold_id){

	var House_Hold_id = HouseHold_id;

	var HouseHold_data_id = "HouseHold_data_id=" + House_Hold_id;

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('responseRecord_text').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/HouseHoldProfile.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(HouseHold_data_id);

}

function update_HouseHold(){
	
	var HouseHold_data_Update = document.getElementsByName('dataH');

	var Update_data = {};


	Update_data.Fname = HouseHold_data_Update[0].value;
	Update_data.Mname = HouseHold_data_Update[1].value;
	Update_data.Lname = HouseHold_data_Update[2].value;
	Update_data.Age = HouseHold_data_Update[3].value;
	Update_data.Religion = HouseHold_data_Update[4].value;
	Update_data.DateBirth = HouseHold_data_Update[5].value;
	Update_data.PlaceBirth = HouseHold_data_Update[6].value;
	Update_data.Gender = HouseHold_data_Update[7].value;
	Update_data.SivilStatus = HouseHold_data_Update[8].value;
	Update_data.STzenship = HouseHold_data_Update[9].value;
	Update_data.P_Occupation = HouseHold_data_Update[10].value;
	Update_data.House_number = HouseHold_data_Update[11].value;
	Update_data.STname = HouseHold_data_Update[12].value;
	Update_data.Purok = HouseHold_data_Update[13].value;
	Update_data.ID = HouseHold_data_Update[14].value;

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			alert(xhr.responseText);
		}
	}
	xhr.open('POST', '../PHP_FOLDER/UpdateHousehold.php', true);
	var updatingDataH = JSON.stringify(Update_data);
	xhr.send(updatingDataH);


}

function select_HouseHold(){

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('responseRecord_text').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/HouseHold_search.php', true);

	xhr.send();
}


function ProfileGallary(){
	var ID_image = _('Image_IDH').value;

	window.location = '../PHP_FOLDER/ImageGallaryPicker.php?HouseHold_ID=' + ID_image;

}
