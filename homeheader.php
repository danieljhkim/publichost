<?
session_start();
require_once 'functions.php';

echo <<<_INIT
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="javascript.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Brawler|Rubik&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href='mainstyles.css'>


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
    <a style='font-size:1.3em' class='logo' href='index.php'>PublicHost.<span>xyz</span></a>
        <a href='logout.php' onmouseover='loginover()' onmouseout='loginout()' id='loginnav' class='navbutton'>Log-out</a>
        <span id='hamburger' class="fas fa-bars">
            <div class='navdropdown'>
                <li><a href='index.php'>Home</a></li>
                <li><a href='logout.php'> Log-out </a></li>
            </div>
        </span>
</div>
_LOGGEDIN;
}

else{
echo <<<_GUEST
</head>
<body>
<div class='topnav'>
    <a style='font-size:1.3em' class='logo' href='index.php'>PublicHost.<span>xyz</span></a>
        <a href='#features' class='navbutton'>Features</a>
        <a href='#how' class='navbutton'> How </a>
        <a href='login.php' onmouseover='loginover()' onmouseout='loginout()' id='loginnav' class='navbutton'>Login</a>
        <span id='hamburger' class="fas fa-bars">
            <div class='navdropdown'>
                <li><a href='index.php'>Home</a></li>
                <li><a href='#features'>Features</a></li>
                <li><a href='#how'> How </a></li>
                <li><a href='login.php'> Log-in </a></li>
            </div>
        </span>
</div>
_GUEST;
}


?>
