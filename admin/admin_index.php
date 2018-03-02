<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>

<style media="screen">
  body {
    margin-top: 10%;
    text-align: center;
    font-size: 20px;
  }
  h2 {
    color: #4d7ead;
  }
  a {
		text-decoration: none;
		padding: 20px;
		margin-top: 300px;
		padding-left: 50px;
		padding-right: 50px;
    background-color: #4d7ead;
    color: white;
  }
	a:hover {
	    opacity: 0.8;
	}
</style>


<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
</head>
<body>
	<h2>Welcome! <?php echo $_SESSION['user_name'];?></h2>
	<a href="admin_createuser.php">Create User</a>
	<a href="admin_edituser.php">Edit User</a>
	<a href="admin_deleteuser.php">Delete User</a>
	<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
</body>
</html>
