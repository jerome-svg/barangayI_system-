function _(element){

	return document.getElementById(element); 
}

var Hous_hold_link = _('Hous_hold_link');
Hous_hold_link.addEventListener('click', get_Hous_Hold_link);
function get_Hous_Hold_link(){
	window.location = 'HouseHold_page.php';
}

var Brg_Official_link = _('Brg_official_link');
Brg_Official_link.addEventListener('click', get_Official_link);
function  get_Official_link(){
	window.location = 'BarangayOfficial.php';
}

var Pukor_link = _('PorokPage');
Pukor_link.addEventListener('click', get_Purok_link);
function get_Purok_link(){
	window.location = 'PurokPage.php';
}
var File_link = _('Filepage');
File_link.addEventListener('click', get_File_link);
function get_File_link(){
	window.location = 'FileLInk.php';
}

var BlotterPage = _('BlotterPage');
BlotterPage.addEventListener('click', get_Blotter_link);
function get_Blotter_link(){
	window.location = 'BlotterPage.php';
}

var VotersPage = _('VotersPage');
VotersPage.addEventListener('click', get_Voters_link);
function get_Voters_link(){
	window.location = 'Voters.php';
}