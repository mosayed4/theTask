<?php

include 'confing.php'; 

  $id = $_GET['ID'];

mysqli_query( $con, "DELETE FROM `tbtodo` WHERE id = $id") or die('Query Failed');

header("Location: index.php");


?>