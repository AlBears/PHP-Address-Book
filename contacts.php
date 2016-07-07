<?php include('core/init.php'); ?>

<?php 
$db = new Database;

$db->query("SELECT * FROM contacts");

$contacts = $db->resultset();
?>
<div class="row">
		<div class="large-12 columns">
			<table>
				<thead>
					<tr>
						<th width="200">Name</th>
						<th width="130">Phone</th>
						<th width="200">Email</th>
						<th width="250">Address</th>
						<th width="100">Group</th>
						<th width="150">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($contacts as $contact): ?>
					<tr>
						<td><a href="contact.html"><?php echo $contact->first_name.' '.$contact->last_name; ?></a></td>
						<td><?php echo $contact->phone; ?></td>
						<td><?php echo $contact->email; ?></td>
						<td>
						<ul>
							<li><?php echo $contact->address1.', '.$contact->address2; ?></li>
							<li><?php echo $contact->city.', '.$contact->state.' '.$contact->zipcode; ?></li>
						</ul>
						</td>
						<td><?php echo $contact->contact_group; ?></td>
						<td>
							<ul class="button-group">
								<li><a href="#" class="button tiny">Edit</a></li>
								<li><a href="#" class="button tiny alert">Delete</a></li>
							</ul>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>