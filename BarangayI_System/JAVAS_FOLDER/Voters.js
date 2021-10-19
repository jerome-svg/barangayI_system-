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

var Voters_From_data_new = _('submit_form_Voters');

Voters_From_data_new.addEventListener('click', getVoters_Daata_R);

function getVoters_Daata_R(a){

	a.preventDefault();


		function data_collection(element){
				return document.getElementsByName(element);
			}

			var data_form = data_collection('Data_voters_R');

		
			var all_data = {};


 				all_data.FirstName = data_form[0].value;
 				all_data.MiddleName = data_form[1].value;
 				all_data.LastName = data_form[2].value;

 				if(data_form[3].checked){
 					all_data.Voters_type = data_form[3].value;
				}
 				else if(data_form[4].checked){
 					all_data.Voters_type = data_form[4].value;
 				}


					if(all_data.FirstName == ""){
						alert('Fill out all Data Required');
						
					}	
					else if(all_data.MiddleName == ""){
						alert('Fill out all Data Required');
					}
					else if(all_data.LastName == ""){
						alert('Fill out all Data Required');
					}
					else{
						send_data(all_data, 'submit_form_Voters');
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
       }
       
    } 

       data.data_type = type;
       var data_string = JSON.stringify(data);

       	xml.open('POST', '../PHP_FOLDER/RegisterVoters.php', true);
		xml.send(data_string);
	
}
function get_dataVoters(data){
 
 	 var data_voters = data;

	var DataVoters_ID = "DataVoters_ID=" + data_voters;

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('responseRecord_text').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/VotersUpdate.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(DataVoters_ID);


}


function getVoters_UPDATE_DATA(){

	function data_collection(element){
		return document.getElementsByName(element);
	}

	var data_form = data_collection('DATA_UPDATE_V');

		
	all_data = {};

	all_data.ID = data_form[0].value;
 	all_data.FirstName = data_form[1].value;
 	all_data.MiddleName = data_form[2].value;
 	all_data.LastName = data_form[3].value;
 	all_data.V_Type = data_form[4].value;


	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			alert(xhr.responseText);
		}
	}
	xhr.open('POST', '../PHP_FOLDER/UPDATEACTION_V.php', true);
	var updatingDataV = JSON.stringify(all_data);
	xhr.send(updatingDataV);

}
function getVoters_UPDATE_BACK(){
	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('responseRecord_text').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/SELECTVoters_Table.php', true);

	xhr.send();
}
function Search_Voters_SELECT(){


	var VotersData = _('Search_Voters').value;

	var DataVoters_DATA = "DataVoters_DATA=" + VotersData;


	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('responseRecord_text').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/Search_Voters.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(DataVoters_DATA);
}