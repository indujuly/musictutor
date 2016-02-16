<!DOCTYPE html>
<html>
<head>

        <link href="data:image/gif;" rel="icon" type="image/x-icon" />

        <!-- Bootstrap -->
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/ribbon.css" />

        <!-- AngularJS -->
        <script src="js/angular.min.js"></script>

        <!-- wavesurfer.js -->
        <script src="dist/wavesurfer.min.js"></script>

        <!-- App -->
        <script src="app.js"></script>
		
		<!-- For Recording music wave -->
		<script src="js/audiodisplay.js"></script>
	<script src="js/recorderjs/recorder.js"></script>
	<script src="js/main.js"></script>
	        <!-- Demo -->
        <script src="example/main.js"></script>
        <script src="example/trivia.js"></script>
	<style>
	html { overflow: hidden; }
	body { 
		font: 14pt Arial, sans-serif; 
		background:black;
		display: flex;
		flex-direction: column;
		height: 100vh;
		width: 100%;
		margin: 0 0;
	}
	canvas { 
		display: inline-block; 
		width: 95%;
		height: 85%;
	}
	#controls {
		display: flex;
		flex-direction: row;
		align-items: center;
		justify-content: space-around;
		height: 20%;
		width: 100%;


	}
	#record { height: 15vh;margin-right: -100px;  }
	#record.recording { 
		background: red;
		background: -webkit-radial-gradient(center, ellipse cover, #ff0000 0%,#000 75%,#000 100%,#7db9e8 100%); 
		background: -moz-radial-gradient(center, ellipse cover, #ff0000 0%,lightgrey 75%,#000 100%,#7db9e8 100%); 
		background: radial-gradient(center, ellipse cover, #ff0000 0%,lightgrey 75%,#000 100%,#7db9e8 100%); 
	}
	#save, #save img { height: 10vh; margin-right: -50px;  }
	#save { opacity: 0.25;}
	#save[download] { opacity: 1;}
	#viz {
		height: 80%;
		width: 100%;
		display: flex;
		flex-direction: column;
		justify-content: space-around;
		align-items: center;
	}
	@media (orientation: landscape) {
		body { flex-direction: row;}
		#controls { flex-direction: column; height: 100%; width: 10%;}
		#viz { height: 100%; width: 90%;}
	}
	#viz > canvas {
    margin-left: -1px;
    margin-top: -200px;
    width: 88%;
    z-index: 999;

}

		<!-- For Recording music wave -->
	</style>
<style>
#header {
    background-color:#A56F91;
    color:white;
    text-align:center;
    padding:-2px;
    height:1000px;
    margin-top:-20px;
width:250px;

}
input#button{
cursor:pointer; /*forces the cursor to change to a hand when the button is hovered*/
padding:5px 25px; /*add some padding to the inside of the button*/
background:#35b128; /*the colour of the button*/
border:1px solid #33842a; /*required or the default border for the browser will appear*/
/*give the button curved corners, alter the size as required*/
-moz-border-radius: 10px;
-webkit-border-radius: 10px;
border-radius: 10px;
/*give the button a drop shadow*/
-webkit-box-shadow: 0 0 4px rgba(0,0,0, .75);
-moz-box-shadow: 0 0 4px rgba(0,0,0, .75);
box-shadow: 0 0 4px rgba(0,0,0, .75);
/*style the text*/
color:#f3f3f3;
font-size:1.1em;
}

/* #nav {
    line-height:30px;
    background-color:#eeeeee;
    height:300px;
    width:100px;
    float:right;
    padding:5px;          
} */
img#section{
    width:350px;
    float:left;
    padding:10px; 
    color:white;      
}

</style>
</head>
<body>

<div id="header">
    <div>  <img  width="200"  src="img/smilogo.png"> </div>
<?php error_reporting(0); ?>


                <form name="form1" method="post" enctype="multipart/form-data" action="fileupload.php"><br>
          <input type="text" name="audioname" style="color:black" placeholder="Audio Name" size="10" required><br><br>
                <input type="file" name="fileToUpload" required><br>
                <input id="button" type="submit" value="File upload"  name="sub">
                </form>
                  
                <?php 
                     $target_file =  basename($_FILES["fileToUpload"]["name"]);
                    
                    $uploadOk = 1;
                    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                    // Check if image file is a actual image or fake image
                    if(isset($_POST["sub"])) {
                         $audioname=$_POST['audioname'];
                        $check = $_FILES["fileToUpload"]["tmp_name"];
                        if($check !== false) {
$con= mysql_connect("localhost","root","");
//$con= mysql_connect("localhost","root","kevell@db0123");
                    mysql_select_db('kcmusic');
                    $sql=mysql_query("INSERT into fileupload (audioname,audiofile) values ('$audioname','$target_file')");
                    //exit;
                            
                            $uploadOk = 1;
                        } else {
                            
                            $uploadOk = 0;
                        }
                    } 
                    
                    ?><br>

<?php
$query = "SELECT * FROM fileupload";
$result = mysql_query($query);
?>
<select style="background-color:#a0a0a0;" name="select1">
<?php
while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
?>
<option value="<?php echo $line['audioname'];?>"> <?php echo $line['audioname'];?> </option>
<?php
}
?>
</select>
</div>





<!--<div id="nav">
London<br>
Paris<br>
Tokyo
</div>-->

<div id="section">
<h1><b><center><img id="image" src="img/image2.gif"></center></b></h1>
<p>

<?php  $con= mysql_connect("localhost","root","");
                    mysql_select_db('kcmusic');
                    $sql=mysql_query("SELECT * from fileupload"); $fetch1=mysql_fetch_array($sql); ?>
    <body ng-app="ngWavesurfer" ng-controller="PlaylistController">
        <div class="container">
            <div class="header">
                
                <!--<img src="img/Letter.png"> -->
              <!-- <h1 itemprop="name">Kevells Audio Waves</h1>-->
            </div>
           
            
            <div id="demo">
                <div class="row" style="margin: 30px 0">
                    <div class="col-sm-10">
                        <ng-wavesurfer url="media/<?php echo $fetch1['audiofile']; ?>" wave-color="#337ab7" progress-color="#23527c" height="64">
                        </ng-wavesurfer>
                    </div>
    
                    <div class="col-sm-2">
                    
                    
                    
                    
                    
                        <button class="btn btn-success btn-block" ng-click="wavesurfer.playPause()">
                            <span id="play" ng-show="paused">
                                <i class="glyphicon glyphicon-play"></i>
                                Play
                            </span>

                            <span id="pause" ng-show="!paused">
                                <i class="glyphicon glyphicon-pause"></i>
                                Pause
                            </span>
                        </button>
                    </div>
                </div>
                
                <!-- Recording -->
                <div id="viz">
                <!--canvas id="analyser" width="1024" height="500"></canvas-->
                <canvas id="wavedisplay" width="1024" height="200"></canvas>
            </div>
            <div id="controls">
                <img id="record" src="img/unnamed.png" onclick="toggleRecording(this);">
                <a id="save" href="#"><img src="img/download.png"></a>
            </div>
            </p>
</div>

</div>



</body>
</html>
