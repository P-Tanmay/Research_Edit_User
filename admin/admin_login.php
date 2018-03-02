<?php
	require_once('phpscripts/config.php');
	$ip = $_SERVER['REMOTE_ADDR'];
	//echo $ip;
	if(isset($_POST['submit'])){
		//echo "Works";
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== ""){
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill out the required fields.";
		}
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
<title>Welcome to your admin panel login</title>
</head>
<body>
	<h2>LOGIN</h2>
	<?php if(!empty($message)){ echo $message;} ?>
	<form action="admin_login.php" method="post">
		<label>Username:</label><br>
		<input type="text" name="username" value=""><br>
		<br>
		<label>Password</label><br>
		<input type="password" name="password" value=""><br><br>
		<input id="submit" type="submit" name="submit" value="Show me the money"><br>
	</form>

</body>
</html>
