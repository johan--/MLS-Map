/* Copyright (C) 2016  Lehrstuhl f�r Technische Elektronik, Friedrich-Alexander-Universit�t Erlangen-N�rnberg */
/* https://github.com/lte-fau/MLS-Map/blob/master/LICENSE */

<?php
session_start();
session_destroy();

header('Location: index.php');
exit;
?>