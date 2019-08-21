
<?

require_once 'homeheader.php';

if (isset($_SESSION['user'])){
	destroySession();
	echo "\n <div style='text-align:center'> Logged out. Good bye </div>";
}


include_once 'footer.php';
?>
