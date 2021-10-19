
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
var Register_purok = _('Register_purok');

Register_purok.addEventListener('click', get_purok);

function get_purok(a){

	a.preventDefault();
	
	var Purok_Data = document.getElementsByName('pukorData');

	var all_data = {};

	all_data.Purok_number = Purok_Data[0].value;
 	all_data.Purok_Name = Purok_Data[1].value;

 	if(all_data.Purok_number == ""){
		
		alert('Yuo have an Error! please fill out all data require')
						
	}
 	else if(all_data.Purok_Name == ""){

		alert('Yuo have an Error! please fill out all data require')
	}
	else{
		send_data(all_data, 'Register_purok');
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

       	xml.open('POST', '../PHP_FOLDER/SavePurok.php', true);
		xml.send(data_string);

}

function get_dataPurok(a){
	var P_number = a;

	var Pukor_Number = "Pukor_Number=" + P_number;

	xhr = new XMLHttpRequest();

	xhr.onload = function(){
		if(xhr.status == 200){
			_('responseRecord_text').innerHTML = xhr.responseText;
		}
	}
	xhr.open('POST', '../PHP_FOLDER/PukorViewer.php', true);
	xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	xhr.send(Pukor_Number);

}
function Update_Purok(){

	$dataPurok = document.getElementsByName('Data_P');

	var all_data = {};

 	all_data.Purok_number = $dataPurok[0].value;
 	all_data.Purok_name = $dataPurok[1].value;

 	
 	
 	if(all_data.Purok_name == ""){
		
			alert('No Data input');
	}
	else{
		
		xhr = new XMLHttpRequest();

		xhr.onload = function(){
		if(xhr.status == 200){
			alert(xhr.responseText);
		}
		}
			xhr.open('POST', '../PHP_FOLDER/PurokupdateData.php', true);
			var updatingDataP = JSON.stringify(all_data);
			xhr.send(updatingDataP);

	}
 	
}
function Back_Purok_Data(){


		xhr = new XMLHttpRequest();

		xhr.onload = function(){

		if(xhr.status == 200){
			
			_('responseRecord_text').innerHTML = xhr.responseText;
		}

		}
		xhr.open('POST', '../PHP_FOLDER/selectPurok.php', true);
		xhr.send();

}

