

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
				die("<div style='text-align:center;'>Log-in successful. <a href='profile.php'> Click here to access your page. </a></div></body></html>");
			}
	}
}


echo <<<_END
<div class='row' style='padding:8vw'>
				<form method="post" action="login.php" onmouseover='formover()' onmouseout='formout()'>
						<fieldset id='formfieldset'>
								<legend><span id='userid11'>Log</span> <span id='password1'>in</span></legend>
											<span id='userid2'>ID (username): </span>
											<br>
											<input id='userid0' type="text" name="user">
											<br><br>
											<span id='password2'>Password:</span>
											<br>
											<input id='password0' type="password" name="password">
											<br><br>
											<input id='submitbutton' type="submit" name="submit" value="Login :)">
							</fieldset>
				</form>
</div>
<br>


_END;
include_once 'footer.php';
?>
