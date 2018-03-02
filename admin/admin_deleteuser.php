<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();
	$tbl = "tbl_user";
	$users = getAll($tbl);
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
		margin-top: 300px;
		padding-left: 50px;
		padding-right: 50px;
    background-color: red;
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
<title>Delete User</title>
</head>
<body>
	<h2>Time to destroy some lives...</h2>
	<?php
		while($row = mysqli_fetch_array($users)){
			echo "{$row['user_fname']} <a href=\"phpscripts/caller.php?caller_id=delete&id={$row['user_id']}\">Fired</a><br>";
		}
	?>
</body>
</html>
