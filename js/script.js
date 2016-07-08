$(document).ready(function() {
			$('#loaderImage').show();

			showContacts();
			//Add
			$(document).on('submit', '#addContact', function() {
				$('#loaderImage').show();
				$.post("add_contact.php", $(this).serialize()).
				done(function(data) {
					console.log(data);
					$('#addModal').foundation('reveal', 'close');
					showContacts();
				});
				return false;
			});

			//edit contact
			$(document).on('submit', '#editContact', function() {
				$('#loaderImage').show();
				$.post("edit_contact.php", $(this).serialize()).
				done(function(data) {
					console.log(data);
					$('.editModal').foundation('reveal', 'close');
					showContacts();
				});
				return false;
			});

			//delete
			$(document).on('submit', '#deleteContact', function() {
				$('#loaderImage').show();
				$.post("delete_contact.php", $(this).serialize()).
				done(function(data) {
					console.log(data);
					showContacts();
				});
				return false;
			});

			function showContacts() {
				setTimeout(function() {
					$('#pageContent').load('contacts.php', function() {
						$('#loaderImage').hide();
					})
				}, 1000);
			}

			$(document).on('click', '.close-reveal-modal', function() {
				$('.reveal-modal').foundation('reveal', 'close');
			});
		});