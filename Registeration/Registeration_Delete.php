<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
r_header($page_name,$con);
include_once '../menu.php';write_menu('Registration');

$Ser=$_REQUEST["Ser"];

$fin=mysqli_query($con,"delete from Registeration where (Ser='$Ser') ")or die(mysqli_error($con));
$query1 = "delete from Reg_Type where (Code='$Ser') ";
mysqli_query($con,$query1) or  die (mysqli_error($con));

mysqli_close( $con);
redirect("Registeration_list.php?start=0");

?>
