<?
session_start();
require_once 'functions.php';

echo <<<_INIT
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<script src='jquery-2.2.4.min.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel='stylesheet' href='mainstyles.css'>
  <link href="https://fonts.googleapis.com/css?family=Brawler&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Brawler|Rubik&display=swap" rel="stylesheet">


_INIT;


if (isset($_SESSION['user'])){
	$user= $_SESSION['user'];
	$loggedin = TRUE;
}
else $loggedin = FALSE;


if ($loggedin){
echo <<<_LOGGEDIN
</head>
<body>
<div class='topnav'>
    <a href='index.php' onmouseover='logoover()' onmouseout='logoout()' class='navbutton'><span class='logo' id='logonav'>PublicHost.<span style='color:orange'>xyz</span></span></a> <a href='logout.php' class='navbutton'>Logout</a>
</div>
<br>
_LOGGEDIN;
}

else{
echo <<<_GUEST
</head>
<body>
<div class='topnav'>
    <a href='index.php' onmouseover='logoover()' onmouseout='logoout()' class='navbutton'><span class='logo' id='logonav'>PublicHost.<span style='color:orange'>xyz</span></span></a> <a href='#featureboxcontainer' class='navbutton'>Features</a> <a href='#howstepscontainer' class='navbutton'>How</a> <a href='login.php' onmouseover='loginover()' onmouseout='loginout()' id='loginnav' class='navbutton'>Login</a>
</div>
<br>
_GUEST;
}

echo <<<_END
<script>
  jq = $.noConflict();

  function formover(){ jq('#formfieldset').css('border', 'solid orange')};
  function formout(){ jq('#formfieldset').css('border', 'solid black')};

  function loginover(){ jq('#loginnav').css('border', 'solid 1.2px orange')};
  function loginout(){ jq('#loginnav').css('border', 'solid 1.2px white')};

  function logoover(){ jq('#logonav').css('border', 'solid orange 1.2px')};
  function logoout(){ jq('#logonav').css('border', 'solid white 1.2px')};

  jq('#firstname0').focus (function() { jq('#firstname2').css('color', 'orange')});
  jq('#firstname0').blur (function() {
    jq('#firstname2').css('color', 'DarkSlateGray');
    jq('#firstname0').css('color', 'orange');
    if (jq('#firstname0').val().length > 0) {jq('#firstname1').css('color', 'orange')};
  });

  jq('#lastname0').focus (function() { jq('#lastname2').css('color', 'orange');});
  jq('#lastname0').blur (function() {
    jq('#lastname2').css('color', 'DarkSlateGray');
    jq('#lastname0').css('color', 'orange');
    if (jq('#lastname0').val().length > 0) {jq('#lastname1').css('color', 'orange')};
  });

  jq('#userid0').focus (function() { jq('#userid2').css('color', 'orange');});
  jq('#userid0').blur (function() {
    jq('#userid2').css('color', 'DarkSlateGray');
    jq('#userid0').css('color', 'orange');
    if (jq('#userid0').val().length > 0) {jq('#userid1').css('color', 'orange')};
  });

  jq('#password0').focus (function() { jq('#password2').css('color', 'orange');});
  jq('#password0').blur (function() {
    jq('#password2').css('color', 'DarkSlateGray');
    jq('#password0').css('color', 'orange');
    if (jq('#password0').val().length > 0) {jq('#password1').css('color', 'orange')};
  });

  jq('#email0').focus (function() { jq('#email2').css('color', 'orange');});
  jq('#email0').blur (function() {
    jq('#email2').css('color', 'DarkSlateGray');
    jq('#email0').css('color', 'orange');
    if (jq('#email0').val().length > 0) {jq('#email1').css('color', 'orange')};
  });

  jq('#accept0').focus (function() {
    jq('#accept2').css('color', 'orange');
    jq('#accept1').css('color', 'orange');
  });
  jq('#accept0').blur (function() {
    jq('#accept2').css('color', 'DarkSlateGray');
    jq('#accept1').css('color', 'white');
  });

  jq('#submitbutton').mouseenter (function() { jq(this).css('color', 'orange') });
  jq('#submitbutton').mouseleave (function() { jq(this).css('color', 'white') });
</script>
_END;

?>
