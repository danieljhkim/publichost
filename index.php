


<?

require_once 'homeheader.php';

echo <<<_END
	<script>
		function checkUser(user){
			$.post(
				'checkuser.php',
				{user : user.value},
				function(data){ $('#used').html(data)
        }
      )
		}
	</script>
_END;


echo <<<_END
<br>
	<div class='row'><br>
          <form method="post" action="signup.php" onmouseover='formover()' onmouseout='formout()'>
              <fieldset id='formfieldset'>
                  <legend><span id='firstname1'>R</span> <span id='lastname1'>e</span> <span id='userid1'>gi</span> <span id='password1'>st</span> <span id='email1'>e</span> <span id='accept1'>r</span></legend>
                       <span id='firstname2'>First Name:</span>
                        <br>
                        <input id='firstname0' type="text" name="firstname">
                        <br><br>
                        <span id='lastname2'>Last Name:</span>
                        <br>
                        <input id='lastname0' type="text" name="lastname">
                        <br><br>
                        <span id='userid2'>ID (username): </span>
                        <br>
                        <input id='userid0' type="text" value='$user' name="user" onBlur='checkUser(this)'>
                        <div id='used'></div>
                        <br><br>
                        <span id='password2'>Password:</span>
                        <br>
                        <input id='password0' type="password" name="password">
                        <br><br>
                        <span id='email2'>Email:</span>
                        <br>
                        <input id='email0' type="text" name="email">
                        <br><br>
                        <a href='termsconditions.html'><b><u>Terms & Conditions</u><b></a>: <input type='radio' id='accept0' name='terms' value='Accept'> <span id='accept2'>Accept </span><input id='deny0' name='terms' checked='checked' type='radio' value='Deny'> <span id='deny1'>Deny </span><br><br>
                        <input id='submitbutton' type="submit" name="submit" value="Submit :)">
                </fieldset>
          </form>
	</div>
<br>
  <div id='logocontainer'>
      <h1 class='logo'><span class='logo'>PublicHost.<span style='color:orange'>xyz</span></span></h1><br><br>
      <p class='fontstyle1'>Free Public Server to host websites/blogs/web applications in html/css/Javascript formats- in the simpliest way possible.</p>
  </div>

<div id='featureboxcontainer'>
    <h1><span id='featureboxtitle'>Features</span></h1><br>
    <div  id='featurebox'>
        <div id='featureboxwords'>
            <li>Host your website/blog/web applications onto the public server, with their own url's <b>(in html format only)</b>.</li>
            <li>Upload and save additional text or html files onto the server, with their own url's.</li>
            <li>Upload images onto the server, with their own url's.</li>
            <li>Yes, all for <span style='color:orange'>free</span>. (but we're accepting <a href='donations.html' style='color:orange'>donations</a>, to bring better services & improvements)</li>
         </div>
    </div>
</div>

<div id='howstepscontainer'>
  <h1><span id='howsteptitle'><span style='color:orange'>5</span>-Easy-<span style='color:orange'>Steps</span>:</span></h1><br>
  <div id='howstepbox'>
        <div id='howsteps'>
          <p><span id='howsteps'>Step 1:</span> Register & log in (<b>the url of your website will be:</b> <span style='color:orange'>www.publichost.xyz/www/your username</span>)</p>
          <p><span id='howsteps'>Step 2:</span> Paste in your HTML/CSS/Javascript codes and press submit. </p>
          <p><span id='howsteps'>Step 3:</span> If you wish to post images or additional pages, upload them and link them with their url's. </p>
          <p><span id='howsteps'>Step 4:</span> Go check out your new website/blog/application. </p>
          <p><span id='howsteps'>Step 5:</span> If it looks good, share. </p>
       </div>
    </div>
</div>
_END;



include_once 'footer.php';




?>
