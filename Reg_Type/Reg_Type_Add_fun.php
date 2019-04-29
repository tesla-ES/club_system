<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';

r_header($page_name,$con);
include_once '../menu.php';write_menu('Reg_type');

$fin=mysqli_query($con,"select * from Reg_Type");
$n_res=mysqli_num_rows($fin);
$Code=$_REQUEST["Text1"];
$Name=$_REQUEST["Text2"];

$query = "INSERT INTO Reg_Type ( Code,Name ) values ( '$Code','$Name')";
mysqli_query($con,$query) or  die (mysqli_error($con));

    mysqli_close( $con);
$Text1="";
$Text2="";
redirect(" Reg_Type_List.php");

?>
