<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();

	$id = $_SESSION['user_id'];
	$tbl = "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);
	//echo $info;

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
	}
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

	label {
		color: red;
		text-align: left;
	}
  input {
		text-align: center;
    width: 20%;
    height: 40px;
    background-color: #ddd;
    outline: none;
    display: inline-block;
    border: none;
  }

  #submit {
    background-color: #4d7ead;
    color: white;
  }
	#submit:hover {
	    opacity: 0.8;
	}


</style>



<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit User</title>
</head>
<body>
	<h2>Edit User</h2>
	<?php if(!empty($message)){echo $message;} ?>
	<form action="admin_edituser.php" method="post">
		<label>First Name:</label><br>
		<input type="text" name="fname" value="<?php echo $info['user_fname'];  ?>"><br><br>
		<label>Username:</label><br>
		<input type="text" name="username" value="<?php echo $info['user_name'];  ?>"><br><br>
		<label>Password:</label><br>
		<input type="text" name="password" value="<?php echo $info['user_pass'];  ?>"><br><br>
		<label>Email:</label><br>
		<input type="text" name="email" value="<?php echo $info['user_email'];  ?>"><br><br>
		<input id="submit" type="submit" name="submit" value="Edit Account">
	</form>
</body>
</html>
