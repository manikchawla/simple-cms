<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/db_connect.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php $admin_set = find_all_admins(); ?>

<?php $layout_context = 'admin'; ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
	<div id="navigation">
		<br>
		<a href="admin.php">&laquo; Main Menu </a>
		<br>
	</div>
	<div class="page">
		<?php echo message(); ?>
		<h2>Manage Admins</h2>
		<table>
			<tr>
				<th class="username">Username</th>
				<th class="actions" colspan="2">Actions</th>
			</tr>
			<?php while ($admin = mysqli_fetch_assoc($admin_set)) { ?>
			<tr>
				<td><?php echo htmlentities($admin['username']); ?></td>
				<td><a href="edit_admin.php?id=<?php echo urlencode($admin['id']); ?>">Edit</a></td>
				<td><a href="delete_admin.php?id=<?php echo urlencode($admin['id']); ?>" onclick="return confirm('Are you sure?');">Delete</a></td>
				<td></td>
			</tr>
			<?php } ?>
		</table>
		<br>
		<a href="new_admin.php">Add new admin</a>
	</div>
</div>

<?php include("../includes/layouts/footer.php"); ?>