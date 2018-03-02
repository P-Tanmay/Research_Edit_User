<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');

		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$password}'";
		$user_set = mysqli_query($link, $loginstring);


		$searchuser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $searchuser['user_id'];
			// }else{
				$_SESSION['user_id'] = $id;
				$_SESSION['user_name']= $searchuser['user_fname'];
		//echo mysqli_num_rows($user_set);
			if(mysqli_query($link, $loginstring)){
				$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
				$updatequery = mysqli_query($link, $update);
				$login_query = "UPDATE `tbl_user` SET `user_data` = 1 WHERE `user_id`={$id}";
				$nowrun = mysqli_query($link, $login_query);

				// User validation if someone will new time will 0 according to database and will be connect with the edit page.
				if($searchuser['user_data'] > 0){
						$loginNum = $searchuser['user_data'] + 1;
						$login_query = "UPDATE `tbl_user` SET `user_data` = {$loginNum} WHERE `user_id`={$id}";
						redirect_to("admin_index.php");

					}else{
						//now you can change your details and you will not redirect here again
						$loginNum = $searchuser['user_data'] + 1;
						// now go to your edit page
						$login_query = "UPDATE `tbl_user` SET `user_data` = {$loginNum} WHERE `user_id`={$id}";
						// update the database
						redirect_to("admin_edituser.php");


			}
			// redirect_to("admin_index.php");
		}else{
			$message = "Learn how to type you dumba&*.";
			return $message;
		}


		mysqli_close($link);
	}
?>
