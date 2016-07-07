$(document).ready(function(){
	$('#loaderImage').show();

	showContacts();

	$(document).on('submit', '#addContact', function(){
		$('#loaderImage').show();
		$.post("add_contact.php", $(this).serialize()).
			done(function(data){
				console.log(data);
				$('#addModal').foundation('reveal', 'close');
				showContacts();
			});
			return false;
	});
});

function showContacts(){
	setTimeout(function(){$('#pageContent').load('contacts.php',function(){$('#loaderImage').hide();})},1000);
}

$(document).on('click','.close-reveal-modal', function(){
	$('.reveal-modal').foundation('reveal', 'close');
});