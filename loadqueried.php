
<?

if (isset($_GET['path'])){
  $path=$_GET['path'];
  echo "<br><textarea id='listbox'>";
  echo file_get_contents($path);
  echo "</textarea>";
}


?>
