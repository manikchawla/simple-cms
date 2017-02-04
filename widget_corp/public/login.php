<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php require_once("../includes/validation_functions.php"); ?>

<?php 
	$username = "";
	if (isset($_POST['submit'])) {

		// validations
		$required_fields = array("username", "password");
		validate_presence($required_fields);

		if (empty($errors)) {

			$username = $_POST['username'];
			$password = $_POST['password'];

			$found_admin = attempt_login($username, $password);

			if ($found_admin) {
                $_SESSION['admin_id'] = $found_admin['id'];
                $_SESSION['username'] = $found_admin['username'];
				redirect_to("admin.php");
			}
			else {
				$_SESSION['message'] = "Username/password not found.";
			}
		}
	}
	else {

	} 
?>
<?php $layout_context = 'admin'; ?>
<?php include("../includes/layouts/header.php"); ?>
<div id="main">
	<div id="navigation">
		&nbsp;
	</div>
	<div class="page">  
		<?php echo message(); ?>
		<?php if($errors) { ?>
			<div class="error">
			<?php echo form_errors($errors); ?>
			</div>
		<?php } ?>
		
		<h2>Login</h2>
		<form action="login.php" method="POST">
				<p>Username:
						<input class="new-admin" type="text" name="username" value="<?php echo htmlentities($username); ?>" />
				</p>
				<p>Password:
						<input class="new-admin" type="password" name="password" value="" />
				</p>
				<input type="submit" name="submit" value="Submit" />
		</form>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>

