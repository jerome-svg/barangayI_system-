
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

function get_OFFICIAL_Data(){

	var data = _('Name_OFFICIAL');
	var ThisData = data.options[data.selectedIndex].text;

	_('Name_OFFICIAL_PICK').value = ThisData;
}


var R_NEW_bOTTER = _('Register_New_Blotter');

R_NEW_bOTTER.addEventListener('click', get_form_data);


function get_form_data(a){

	a.preventDefault();
	

		function data_collection(element){
				return document.getElementsByName(element);
		}

		var data_form = data_collection('DataBlotter');

		
		var all_data = {};

		all_data.Complanant = data_form[0].value;
 		all_data.complained = data_form[1].value;
 		all_data.Date_of_Filing = data_form[2].value;
 		all_data.PersonIncharge = data_form[3].value;
 		all_data.Status = data_form[4].value;
		all_data.Description = data_form[5].value;


		if(all_data.Complanant == ""){
		
				_("Data_remark").style.color = "#F47E6D";
				_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
						
		}
		else if(all_data.complained  == ""){
				_("Data_remark").style.color = "#F47E6D";
				_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
		}
		else if(all_data.Date_of_Filing == ""){
				_("Data_remark").style.color = "#F47E6D";
				_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
		}
		else if(all_data.PersonIncharge == ""){
						_("Data_remark").style.color = "#F47E6D";
						_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
		}
		else if(all_data.Status == ""){
				_("Data_remark").style.color = "#F47E6D";
				_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
		}
		else if(all_data.Description == ""){
				_("Data_remark").style.color = "#F47E6D";
				_("Data_remark").innerHTML = "YOU HAVE AN ERROR! PLEASE FILL OUT ALL DATA REQUIRE";
		}
		else{
				send_data(all_data, 'Register_New_Blotter');
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

        	alert(xml.responseText);
        	// _('Data_remark').style.color = "#7490E7";
        	// _('Data_remark').innerHTML = xml.responseText;
       }
       
    } 

       data.data_type = type;
       var data_string = JSON.stringify(data);

       	xml.open('POST', '../PHP_FOLDER/recordBlotter.php', true);
		xml.send(data_string);
	
}



function get_BlotterUpdate(data){
	



	var blotter_data = "blotter_data=" + data;


	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			alert(xhr.responseText);
		}
	}
	xhr.open('POST', '../PHP_FOLDER/BlotterUpdate.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(blotter_data);
}
function get_Blotter_search(){
	var data_B = _('Data_search_B').value;

	var blotter_data_Search = "blotter_data_Search=" + data_B;


	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('responseRecord_text').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/search_Blotter.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(blotter_data_Search);


}