<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
r_header($page_name,$con);
include_once '../menu.php';write_menu('Wife_Reg');

$User_ID=$_REQUEST["User_ID"];
$Reg_Type=$_REQUEST["Reg_Type"];
$Sec_Type=$_REQUEST["Sec_Type"];
$Ser=$_REQUEST["Ser"];
$Employee=$_REQUEST["Employee"];

$fin=mysqli_query($con,"delete from Wife_Reg where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Sec_Type='$Sec_Type'&& Ser='$Ser'&& Employee='$Employee') ")or die(mysqli_error($con));
mysqli_close( $con);
redirect("Wife_Reg_list.php?start=0");

?>
