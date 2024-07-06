<?php
include 'confing.php';
$id = $_POST['id'];
$list= $_POST['list'];
mysqli_query($con,"UPDATE `tbtodo` SET `list`='$list' WHERE `id`='$id' ");
header("location: index.php")

?>