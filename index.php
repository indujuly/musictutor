<!DOCTYPE html>
<html>
<head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Kevells Audio Waves</title>

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
		background: #000000;
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
	#record { height: 15vh; }
	#record.recording { 
		background: red;
		background: -webkit-radial-gradient(center, ellipse cover, #ff0000 0%,#000 75%,#000 100%,#7db9e8 100%); 
		background: -moz-radial-gradient(center, ellipse cover, #ff0000 0%,lightgrey 75%,#000 100%,#7db9e8 100%); 
		background: radial-gradient(center, ellipse cover, #ff0000 0%,lightgrey 75%,#000 100%,#7db9e8 100%); 
	}
	#save, #save img { height: 10vh; }
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
    margin-left: -60px;
    margin-top: -135px;
    width: 88%;
    z-index: 999;
}

		<!-- For Recording music wave -->
	</style>
	
    </head>
<?php  $con= mysql_connect("localhost","root","");
					mysql_select_db('kcmusic');
					$sql=mysql_query("SELECT * from fileupload"); $fetch1=mysql_fetch_array($sql); ?>
    <body ng-app="ngWavesurfer" ng-controller="PlaylistController">
        <div class="container">
            <div class="header">
                
				<img src="img/Letter.png">
                <h1 itemprop="name">Kevells Audio Waves</h1>
            </div>
			<div>  <img width="200" src="img/Head set.png"> </div>
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
			<!-- Recording save.svg -->
				
                <div class="list-group" id="playlist">
					<?php $sql1=mysql_query("SELECT * from fileupload");
					while($fetch=mysql_fetch_array($sql1)) {
					?>
                    <a href=""
                       ng-class="{ 'list-group-item': true, active: isPlaying('media/<?php echo $fetch['audiofile']; ?>') }"
                       ng-click="play('media/<?php echo $fetch['audiofile']; ?>')">
                        <i class="glyphicon glyphicon-play"></i>
                        <?php echo $fetch['audioname']; ?>
                        <!--span class="badge">0:21</span-->
                    </a>
					<?php } ?>
                   <!-- <a href=""
                       ng-class="{ 'list-group-item': true, active: isPlaying('media/Sweden Village.mp3') }"
                       ng-click="play('media/Sweden Village.mp3')">
                        <i class="glyphicon glyphicon-play"></i>
                         Music 2
                    </a>

                    <a href=""
                       ng-class="{ 'list-group-item': true, active: isPlaying('media/001z.mp3') }"
                       ng-click="play('media/001z.mp3')">
                        <i class="glyphicon glyphicon-play"></i>
                         Music 3
                    </a> -->

                </div>
				
				
            </div>

            
        </div>

      
    </body>
</html>
