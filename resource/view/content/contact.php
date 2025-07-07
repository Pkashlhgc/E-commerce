<?php
## ===*=== [C]ALLING CONTROLLER ===*=== ##
include("app/Http/Controllers/Controller.php");


## ===*=== [O]BJECT DEFINED ===*=== ##
$control = new Controller;
$eloquent = new Eloquent;


## ===*=== [I]NSERT DATA TO CONTACTS ===*=== ##
if(isset($_POST['user_contact']))
{
	$tableName = "contacts";
	$columnValue["contacts_name"] = $_POST['contact_name'];
	$columnValue["contacts_email"] = $_POST['contact_email'];
	$columnValue["contacts_phone"] = $_POST['contact_phone'];
	$columnValue["contacts_overview"] = $_POST['contact_message'];
	$columnValue["created_at"] = date("Y-m-d H:i:s");
	$contactsData = $eloquent->insertData($tableName, $columnValue);
}
## ===*=== [I]NSERT DATA TO CONTACTS ===*=== ##
?>

<!--=*= CONTACT SECTION START =*=-->
<main class="main">
	<nav aria-label="breadcrumb" class="breadcrumb-nav">
		<div class="container">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.php">Home</a></li>
				<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
			</ol>
		</div>
	</nav>
	<div class="page-header">
		<div class="container">
			
			<?php 
				#== SUBMIT CONFIRMATION MESSAGE
				if(isset($_POST['user_contact']))
				{
					if($contactsData > 0)
						echo '<div class="alert alert-success">
									Dear Customer, we appeciate your valueable comments. Our team will be contact you soon, thanks for stay with us.
								</div>';
				}
			?>
			
			<h1>Contact Us</h1>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h2 class="light-title">Write <strong>Us</strong></h2>
				<form action="" method="post">
					<div class="form-group required-field">
						<label for="contact-name">Name</label>
						<input type="text" class="form-control" name="contact_name" required>
					</div>
					<div class="form-group required-field">
						<label for="contact-email">Email</label>
						<input type="email" class="form-control" name="contact_email" required>
					</div>
					<div class="form-group">
						<label for="contact-phone">Phone Number</label>
						<input type="tel" class="form-control" name="contact_phone">
					</div>
					<div class="form-group required-field">
						<label for="contact-message">What’s on your mind?</label>
						<textarea cols="30" rows="1" class="form-control" name="contact_message" required></textarea>
					</div>
					<div class="form-footer">
						<button type="submit" name="user_contact" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div>
			<div class="col-md-4">
				<h2 class="light-title">Contact <strong>Details</strong></h2>
				<div class="contact-info">
					<div>
						<i class="icon-phone"></i>
						<p><a href="tel:">91 6392912409</a></p>
						<p>Cell Number</p>
					</div>
					<div>
						<i class="icon-mobile"></i>
						<p><a href="tel:">91 6392912409</a></p>
						<p>Home Number</p>
					</div>
					<div>
						<i class="icon-mail-alt"></i>
						<p><a href="mailto:#">tprashant112@gmail.com</a></p>
						<p><a href="mailto:#">E-mail</a></p>
					</div>
					<div>
						<i class="icon-skype"></i>
						<p><a href=" ">prashant</a></p>
						<p></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mb-8">
		<!-- CREATE A EMPTY SPACE BETWEEN CONTENT -->
	</div>
</main>
<!--=*= CONTACT SECTION START =*=-->