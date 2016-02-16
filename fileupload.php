<?php error_reporting(0); ?>


<?php 
$target_file = basename($_FILES["fileToUpload"]["name"]);

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["sub"])) {
$audioname=$_POST['audioname'];
$check = $_FILES["fileToUpload"]["tmp_name"];
if($check !== false) {
$con= mysql_connect("localhost","root","kevell@db0123");
mysql_select_db('kcmusic');
$sql=mysql_query("INSERT into fileupload (audioname,audiofile) values ('$audioname','$target_file')");
							//exit;
							$uploadOk = 1;
							
							echo "<meta http-equiv='refresh' content='0;url=index.php'>";
						} else {
							
							$uploadOk = 0;
						}
					} 
					
					?>