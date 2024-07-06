<?php
  $LIST = $_POST['list'];
include 'confing.php';
mysqli_query($con,"INSERT INTO `tbtodo`( `list`) VALUES ('$LIST')") or die('Query Failed');

header("Location: index.php");

?>