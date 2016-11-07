<! Copyright (C) 2016  Lehrstuhl f�r Technische Elektronik, Friedrich-Alexander-Universit�t Erlangen-N�rnberg >
<! https://github.com/lte-fau/MLS-Map/blob/master/LICENSE >

<?php
	include "secure.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title>MapView Adm</title>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="../jquery-ui/jquery-ui.min.css" />
	<link rel="stylesheet" href="adminDesign.css" />
	
	<script src="../js/jquery.min.js"></script>
	<script src="../jquery-ui/jquery-ui.min.js"></script>
	<script src="adminscript.js"></script>
	
</head>
<body>

	<div id="adminDiv">
		<div id="tabs">
		<ul>
			<li><a href="#dbTab">Databases</a></li>
			<li><a href="#ssTab">Serverside Settings</a></li>
		</ul>
		<div id="dbTab">
			<p id="mlsDbVersion" class="infoText">MLS-Database Date: </p>
			<p id="ocidDbVersion" class="infoText">OpenCellID-Database Date: </p>
		</div>
		<div id="ssTab">
			<p></p>
		</div>
		</div>
	</div>
	
</body>
</html>