$(document).ready(function(){
	$('#loaderImage').show();

	showContacts();
});

function showContacts(){
	setTimeout("$('#pageContent').load('contacts.php',function(){$('#loaderImage').hide();})",1000);
}