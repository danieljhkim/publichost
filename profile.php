<?php

require_once 'homeheader.php';
echo "<link rel='stylesheet' href='styles.css'>";
echo '</head>';
if (!$loggedin) die('</body></html>');



$filepath_writingslist="www/$user/files.txt";
$filepath_imagelist = "www/$user/imagelist.txt";
$filepath_html="www/$user/codes/html.txt";
$filepath_html_codes="www/$user/index.html";
$filepath_css_codes="www/$user/codes/styles.css";
$url_writingslist = "http://www.publichost.xyz/www/$user/files.txt";
$url_htmltxt = "http://www.publichost.xyz/$user/codes/html.txt";
$filepath_js_codes="www/$user/codes/javascript.js";

echo <<<_END
<body>
<div class='jumbotron' style='magin:0;padding:6vw;padding-top:2vw; padding-bottom:2vw; background-color:#f0f0f0'>
	<h1>$user's GUI</h1><hr>
	<div class='row'>
		<div class='col-sm-8' >
			<div class='jumbotron' style='text-align:center' id='txtfile'>
				<h4> Current HTML: </h4>
				<textarea id='html'>
_END;
$htmltext = sanitizeString(file_get_contents("www/$user/codes/html.txt"));
echo $htmltext;
echo <<<_END
				</textarea>
				<button type='button' onclick='loadhtml()'>Refresh</button>

				<script>
				function loadhtml() {
				  var xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					 document.getElementById("html").innerHTML = this.responseText;}};
					 xhttp.open('GET', 'www/$user/codes/html.txt?t=' + Math.random(), true);
				  xhttp.send();}
				</script>
			</div>
		</div>
		<div class='col-sm-4'>
			<div class='jumbotron' id='txtfile'>
				<ul class="nav nav-tabs">
				<li class="nav-item">
				<a class="nav-link active" data-toggle="tab" href="#cssold">CSS</a>
				</li>
				<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#jsold">JS</a>
				</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active container" style='padding:0;text-align:center' id="cssold">
						<textarea id='css'>
_END;
$csstext = sanitizeString(file_get_contents("www/$user/codes/styles.css"));
echo $csstext;
echo <<<_END
						</textarea>
						<button type='button' onclick='loadcss()'>Refresh</button>
						<script>
						function loadcss() {
						  var xhttp = new XMLHttpRequest();
						  xhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
							 document.getElementById("css").innerHTML = this.responseText;}};
							 xhttp.open('GET', 'www/$user/codes/styles.css?t=' + Math.random(), true);
							 xhttp.send();}
						</script>
					</div>
					<div class="tab-pane container" style='padding:0;text-align:center' id="jsold">
						<textarea id='jsoldstyle'>
_END;
$jstext = sanitizeString(file_get_contents("www/$user/codes/javascript.js"));
echo $jstext;
echo <<<_END
						</textarea>
						<button type='button' onclick='loadjs()'>Refresh</button>
						<script>
						function loadjs() {
						  var xhttp = new XMLHttpRequest();
						  xhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
							 document.getElementById("jsoldstyle").innerHTML = this.responseText;}};
						     xhttp.open('GET', 'www/$user/codes/javascript.js?t='' + Math.random(), true);
						  xhttp.send();}
						</script>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class='jumbotron' id='txtfile' style='margin-bottom:2vw;padding:1vw'>
		<div class='jumbotron' style='padding:1vw;text-align:center;width:100%;margin-bottom:0'>
			<h3>Program Output:</h3>
			<div id='webrefresh'>
				<script>
				var srcweb=('http://publichost.xyz/www/$user/index.html?t=' + Math.random())
				document.write("<iframe src=" + srcweb  + " class='webupload'></iframe>")
				</script>
			</div>
			<button type='button' onclick='loadweb()'>Refresh</button>

			<script>
			function loadweb() {
			$.post('loadweb.php', {url='http://publichost.xyz/www/$user/index.html'}, function(data)
				{
					$('#webrefresh').html(data)
				})}
			</script>
		</div>

		<div class='row' style='padding:1vw;padding-bottom:0'>
			<div class='col-sm-8' style='padding:1vw;padding-bottom:0'>
				<h4>HTML Code:</h4>
				<form method='post' action='profile.php'>
					<textarea id="programtextbox" name='html'>
<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='styles.css'>
</head>
<body>
					</textarea>
					<br>
					<input  type='submit' value='Submit'>
				</form>
			</div>

			<div class='col-sm-4' style='padding:1vw;padding-bottom:0'>
				<ul class="nav nav-tabs">
					<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#cssnew">CSS</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#jsnew">JS</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active container" style='padding:0' id="cssnew">
						<form method='post' action='profile.php'>
						<textarea id="programtextbox" style='height:176px' name='cssnew'>Type new CSS script here.</textarea><br>
						<input type='submit' value='Submit'>
						</form>
					</div>
					<div class="tab-pane container" style='padding:0' id="jsnew">
						<form method='post' action='profile.php'>
						<textarea id="programtextbox" style='height:176px' name='jsnew'>Type new JS script here.</textarea><br>
						<input type='submit' value='Submit'>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class='row'>
		<div class='col-sm-8'>
			<div class='jumbotron' id='txtfile'>
				<ul class="nav nav-tabs">
					<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#tabfilenew">New File</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tabfiledelete">Delete File</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tabfilequery">Query File</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tabfilelist">File List</a>
					</li>
				</ul>
				<div class='jumbotron' id='fsubmission'>
					<div class="tab-content">
						<div class="tab-pane active container" style='padding:0' id="tabfilenew">
							<form method='post' action='profile.php'>
								<h4>New File Submission:</h4>
								<hr>
								<textarea id='writingtextbox' name='writing'>Type content here.</textarea><br><br>
								<label><b>Name of the file: </b></label>
								<input type="text" class='inputtxt' id='newfilefocus' name='title' value="no spaces, only alphabet">
								<label id='labeltype'><b>Type: </b></label>
								<input type="radio" name="newfile_type" value="txt"> Text file
								<input type="radio" name="newfile_type" value="html"> HTML file <br>
								<input type='submit' value='Submit'><br>
							</form>
							<div id='newfilesubmission1'>
							</div>
						</div>
						<div class="tab-pane container" style='padding:0' id="tabfiledelete">
							<form method='post' action='profile.php'>
								<h4>Delete Files:</h4>
								<hr>
								<label><b>Name: </b></label>
								<input type='text' class='inputtxt' name="delete" value='e.g. home.txt'>
								<br>
								<input type='submit' value='Delete'>
							</form>
						</div>
						<div class="tab-pane container" style='padding:0' id="tabfilequery">
							<h4>Query File Content:</h4>
							<hr>
							<label><b>Name: </b></label>
							<input type='text' class='inputtxt' id="queryfile_name" value='e.g. home.txt'>
							<br>
							<input type='submit' onclick='loadqueried()' value='Query'>
							<div id='queriedcontent'>
							</div>
						</div>

						<script>
						function loadqueried() {
						  var xhttp = new XMLHttpRequest();
							var filename= document.getElementById('queryfile_name').value;
						  xhttp.onreadystatechange = function() {
							if (this.readyState == 4 && this.status == 200) {
							 $("#queriedcontent").html(this.responseText);}};
							  xhttp.open('GET', 'loadqueried.php?path=www/$user/posts/'+ filename, true);";
							  xhttp.send();
							}
						</script>

						<div class="tab-pane container" style='padding:0' id="tabfilelist">
							<h4> List of All Files: </h4><hr>
							<div id ='listbox' style='height:120px'>
								<pre id='list'>
_END;
echo file_get_contents("www/$user/files.txt");
echo <<<_END
								</pre>
							</div>
							<button type='button' onclick='loadlist()'>Refresh</button>

							<script>
							function loadlist() {
							  var xhttp = new XMLHttpRequest();
							  xhttp.onreadystatechange = function() {
								if (this.readyState == 4 && this.status == 200) {
								 document.getElementById("list").innerHTML = this.responseText;}};
								 xhttp.open('GET', 'www/$user/files.txt?t=' + Math.random(), true)
								 xhttp.send();}
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class='col-sm-4'>
			<div class='jumbotron' id='txtfile'>
				<ul class="nav nav-tabs">
					<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#tabuploadimg">Upload Image</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tabdeleteimg">Delete Image</a>
					</li>
					<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#tabimglist">Image List</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active container" style='padding:0' id="tabuploadimg">
						<div class='jumbotron' id='fsubmission'>
							<form method='post' action='profile.php' enctype="multipart/form-data">
							<h5>Upload Image:</h5>
							<hr>
							<input type='file' id='inputtxt' name="fileToUpload">
							<input type='submit' name='imgupload' value='Submit'>
							</form>
_END;
if(isset($_POST["imgupload"])) {
  $target_dir = "www/$user/images/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			$path_image = "www.publichost.org/www/$user/images/".basename( $_FILES["fileToUpload"]["name"]);
			$image_name= basename( $_FILES["fileToUpload"]["name"]);
			$append_writingslist = "\nName: $image_name [img] \nUrl: $path_image \n --------------------------------------------";
			echo "<h5>Image URL: </h5>";
			echo "<span style='background:white;border-style:inset;width:100%'>";
			echo "<pre>";
			echo $path_image;
			echo "</pre></span><br>";
			$fopen_imagelist = fopen($filepath_imagelist, "a");
			fwrite($fopen_imagelist,$append_writingslist) or die('appending into list failed');
			fclose($fopen_imagelist);
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
echo <<<_END
						</div>
					</div>
					<div class="tab-pane container" style='padding:0' id="tabdeleteimg">
						<div class='jumbotron' id='fsubmission'>
							<form method='post' action='profile.php'>
							<h5>Delete Image:</h5><hr>
							<label><b>Name: </b></label>
							<input type='text' id='inputtxt' name="img_to_delete">
							<input type='submit' name='imgdelete' value='Submit'>
							</form>
							<div id='deletedimg'>
							</div>
						</div>
					</div>
					<div class="tab-pane container" style='padding:0' id="tabimglist">
						<div class='jumbotron' id='fsubmission'>
							<h5> List of Images: </h5><hr>
							<div id ='listbox' style='height:70px'>
								<pre id='list_img'>
_END;
echo file_get_contents("www/$user/imagelist.txt");
echo <<<_END
								</pre>
								</div> <br>
								<button type='button' onclick='loadimglist()'>Refresh</button>

								<script>
								function loadimglist() {
								var xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function() {
									if (this.readyState == 4 && this.status == 200) {
									 document.getElementById("list_img").innerHTML = this.responseText;}};
									 xhttp.open('GET', 'www/$user/imagelist.txt?t=' + Math.random(), true);";
									xhttp.send();}
								</script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



_END;

if (isset($_POST['imgdelte'])){
	$input_filename=($_POST['img_to_delete']);
	$filelocation="www/$user/images/$input_filename";
	$str_to_delete = "[Name]: " + $input_filename;
	if (file_exists($filelocation)){
		unlink($filelocation);
		$file_contents = file_get_contents("www/$user/imagelist.txt");
		$file_contents = str_replace($str_to_delete, "DELETED", $file_contents);
		file_put_contents("www/$user/imagelist.txt", $file_contents);
	  echo "<script>alert('Deletion successful.')</script>";
	} else echo "<script>alert('The file does not exist.')</script>";
}

if (isset($_POST['delete'])){
	$input_filename=($_POST['delete']);
	$filelocation="www/$user/posts/$input_filename";
	$str_to_delete = "[Name]: " + $input_filename;
	if (file_exists($filelocation)){
		unlink($filelocation);
		$file_contents = file_get_contents("www/$user/files.txt");
		$file_contents = str_replace($str_to_delete, "DELETED", $file_contents);
		file_put_contents("www/$user/files.txt", $file_contents);
	  echo "<script>alert ('Deletion successful.')</script>";
	} else echo "<script>alert('The file does not exist.')</script>";
}

if (isset($_POST['html'])){
	$input_newhtml=$_POST['html'];
	$fopen_htmltxt = fopen("www/$user/codes/html.txt" , "w") or die('cannot open text');
	$fopen_html_code = fopen("www/$user/index.html", 'w') or die('cannot open html');
	fwrite($fopen_htmltxt, $input_newhtml);
	fwrite($fopen_html_code,$input_newhtml);
	fclose($fopen_htmltxt);
	fclose($fopen_html_code);
	echo "<script>$('.webupload').css('height','200px');</script>";
}
if (isset($_POST['cssnew'])){
	$input_newcss=$_POST['cssnew'];
	$fopen_css = fopen($filepath_css_codes , "w");
	fwrite($fopen_css, $input_newcss);
	fclose($fopen_css);
}
if (isset($_POST['jsnew'])){
	$input_newjs=$_POST['jsnew'];
	$fopen_js = fopen($filepath_js_codes , "w");
	fwrite($fopen_js, $input_newjs);
	fclose($fopen_js);
}
if (isset($_POST['title'])){
	$input_writing=($_POST['writing']);
	$input_title=($_POST['title']);
	$input_filetype=($_POST['newfile_type']);
	$input_name=($input_title . '.' . $input_filetype);
	$append_writingslist = "\n[Name]: $input_name\n[Url]: www.publichost.xyz/www/$user/posts/$input_name \n --------------------------------------------------------";
	$filepath_newfile= "www/$user/posts/$input_name";
	$fopen_newfile = fopen($filepath_newfile, "w");
	$fopen_writingslist = fopen($filepath_writingslist, "a");
	fwrite($fopen_writingslist,$append_writingslist) or die('appending into list failed');
	fclose($fopen_writingslist);
	fwrite($fopen_newfile, $input_writing) or die('Attempt failed somewhere. Please try a different way');
	fclose($fopen_newfile);
	echo "<script>$('#newfilesubmission1').html('<b>File URL:</b> www.publichost.org/www/$user/posts/$input_name');$('#newfilefocus').focus();</script>";
}

include_once 'footer.php';
?>
