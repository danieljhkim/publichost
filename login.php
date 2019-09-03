

<?php

require_once 'homeheader.php';

$user = $password = $error= "";

if (isset($_POST['user'])){
	$user = sanitizeString($_POST['user']);
	$password = sanitizeString($_POST['password']);

	if ($user == "" || $password == "")
		$error = "Please enter fields";
	else{
		$result=queryMysql("SELECT user, password FROM members WHERE user = '$user'");
		if ($result->num_rows==0)
			$error = 'Invalid attempt. Please try once again.';
		else {
			$row = $result->fetch_array(MYSQLI_NUM);
			$result->close();
		}
			if (password_verify($password, $row[1])){
				$_SESSION['user'] = $user;
				echo <<<_END
				<section style='background-color:rgba(44, 62, 80,.7); color:white;'>
					<div style='text-align:center; margin:auto; display:block; padding:3vw; color:white;'>
					Log-in successful. <a style='color:orange' href='profile.php'> Click here to access your page. </a>
					</div>
				</section>
_END;
			}
	}
}


echo <<<_END
<section class='sec-register' ><br>
	  <form method="post" action='login.php' >
		  <fieldset id='formfieldset'>
			  <legend>Log-In</legend>
					<span id='userid2'>ID (username): </span>
					<br>
					<input  maxlength='20' id='userid0' type="text" name="user" required='required'>
					<br><br>
					<span  id='password2'>Password:</span>
					<br>
					<input  id='password0' type="password" name="password" required='required'>
					<br><br>
					<input id='submitbutton' type="submit" name="submit" value="Log-in">
			</fieldset>
	  </form>
</section>
_END;

include_once 'footer.php';
?>
