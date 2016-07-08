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
								<li>
									<a href="#" class="button tiny" data-reveal-id="editModal<?php echo $contact->id; ?>" data-contact-id="<?php echo $contact->id; ?>">Edit</a>
									<div id = "editModal<?php echo $contact->id; ?>" data-cid="<?php echo $contact->id; ?>" class="reveal-modal editModal" data-reveal>
										<h2>Edit Contact</h2>
									<form id="editContact" action="#" method="post">
											  <div class="row">
												<div class="large-6 columns">
												  <label>First Name
													<input value ="<?php echo $contact->first_name;?>"name="first_name" type="text" placeholder="Enter First Name" />
												  </label>
												</div>
												 <div class="large-6 columns">
												  <label>Last Name
													<input value ="<?php echo $contact->last_name;?>" name="last_name" type="text" placeholder="Enter Last Name" />
												  </label>
												</div>
											  </div>
											  <div class="row">
												<div class="large-4 columns">
												  <label>Email
													<input value ="<?php echo $contact->email;?>" name="email" type="email" placeholder="Enter Email Address" />
												  </label>
												</div>
												<div class="large-4 columns">
												  <label>Phone Number
													<input value ="<?php echo $contact->phone;?>" name="phone" type="text" placeholder="Enter Phone Number" />
												  </label>
												</div>
												<div class="large-4 columns">
													<label>Contact Group
														<select name="contact_group">
															<option value="Family" <?php if($contact->contact_group == 'Family'){echo 'selected';}?>>Family</option>
															<option value="Friends"<?php if($contact->contact_group == 'Friends'){echo 'selected';}?>>Friends</option>
															<option value="Business"<?php if($contact->contact_group == 'Business'){echo 'selected';}?>>Business</option>
														</select>
													</label>
												</div>
											  </div>
											  <div class="row">
												<div class="large-6 columns">
												  <label>Address 1
													<input value ="<?php echo $contact->address1;?>" name="address1" type="text" placeholder="Enter Address 1" />
												  </label>
												</div>
												 <div class="large-6 columns">
												  <label>Address 2
													<input value ="<?php echo $contact->address2;?>" name="address2" type="text" placeholder="Enter Address 2" />
												  </label>
												</div>
											  </div>
											  <div class="row">
												<div class="large-4 columns">
												  <label>City
													<input value ="<?php echo $contact->city;?>" name="city" type="text" placeholder="City" />
												  </label>
												</div>
												<div class="large-4 columns">
													<label>State
													<select name="state">
														<?php foreach($states as $key => $value) : ?>
														<?php 
														if($key == $contact->state){
															$selected = 'selected';
														} else {
															$selected = '';
														}
														?>
														<option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $value; ?></option>
													    <?php endforeach; ?>
													</select>
												  </label>
												</div>
												<div class="large-4 columns">
													<label>Zipcode
													<input value ="<?php echo $contact->zipcode;?>" name="zipcode" type="text" placeholder="Enter Phone Number" />
												  </label>
												</div>
											  </div>
											  <div class="row">
												<div class="large-12 columns">
												  <label>Notes
													<textarea  name="notes" placeholder="Enter Optional Notes"><?php echo $contact->notes;?></textarea>
												  </label>
												</div>
											  </div>
											  <input type="hidden" name="id" value="<?php echo $contact->id; ?>" />
											  <input name="submit" type="submit" class="add-btn button right small" value="Submit">
												<a class="close-reveal-modal">&#215;</a>
											</form>
									</div>
								</li>
								<form id="deleteContact" action="#" method="post">
										<input type="hidden" name="id" value="<?php echo $contact->id; ?>" />
										<input type="submit" class="delete-btn button tiny secondary alert" value="Delete" />
								</form>
							</ul>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>