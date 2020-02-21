<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<?php
$text=array();
$songs=array();

if (isset($_REQUEST["playlist"])){
	$txtfile=$_REQUEST["playlist"];
	$tracks=file($txtfile, FILE_IGNORE_NEW_LINES);
 foreach ($tracks  as $track) {
 	 	if (strpos($track,"#")!==0){


 	$songs[]="songs/" . $track;

 	# code...
 }
 	 	}
 
} 

else {
 $text = glob("songs/*.m3u");
	   $songs = glob("songs/*.mp3");

	   }

	   if (isset($_REQUEST["shuffle"])){
	shuffle($songs);
}
	   ?>



	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>
	<body>

		<div id="header">

			<h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2>
			<a href="music.php"> Backlink </a>

		</div>


		<div id="listarea">
			<ul id="musiclist">
				
			
<?php

foreach ($songs as $song) {
	$size1=filesize($song);
	if ($size1<1024){
		$size=$size1 . "B";
	}
	else if ($size1<1048576){
		$size=round($size1/1024,2) . "KB";
	}
	else {
		$size=round($size1/1048576,2) . "MB";
	}


?>

<li class ="mp3item"> 
	<a href ="<?= $song?>"><?= basename($song) ?> </a>  <?= $size ?> </li>
<?php
}?>

<?php

foreach ($text as $playlist) {
?>
<li class ="playlistitem"> 
	<a href ="music.php?playlist=<?= $playlist ?>"><?= basename($playlist) ?> </a> </li>
<?php
}?>

			</ul>
		</div>
		<a href="music.php?shuffle=on" > Shuffle</a>
	</body>
</html>