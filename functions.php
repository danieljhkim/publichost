<?
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//query to database
function queryMysql($query){
	global $conn;
	$result = $conn->query($query);
	if (!$result) die("Fatal Error");
	return $result;
}

//destroys user session
function destroySession(){
	$_SESSION = array();
	if (session_id() != "" || isset($_COOKIE[session_name()]))
		setcookie(session_name(), '', time()-100000000, '/');
	session_destroy();
}

//anti-hack
function sanitizeString($var){
	global $conn;
	$var = strip_tags($var);
	$var = htmlentities($var);
	if (get_magic_quotes_gpc())
		$var = stripslashes($var);
	return $conn->real_escape_string($var);
}


//if (isset($_POST['query'])){
//	$queryfile_name=($_POST['queryfile_name']);
//	$query_type=($_POST['query_type']);
//	$queryfile_path="/home/thebor62/public_html/theboringclub/members/$user/posts/$inputfile_name.$query_type";
//	if (file_exists($queryfile_path)){
//		$file_contents = file_get_contents($queryfile_path);
//		echo <<<_END
//		<script>
//		$('#queriedcontent').html="<h4>Queried Content:</h4>";
//		$('#queriedcontent').html("<div id='listbox'>echo $file_contents</div>").focus();
//		</script>
//_END;
//} else echo "<script> $('#queriedcontent').html('The file does not exist.').focus();</script>";
//}


?>
