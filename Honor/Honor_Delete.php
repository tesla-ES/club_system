<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
r_header($page_name,$con);

$User_ID=$_REQUEST["User_ID"];
$Reg_Type=$_REQUEST["Reg_Type"];
$Year=$_REQUEST["Year"];

$delted_item=$User_ID;
//Todo Check if deleted or not -- and record Count deleted and send message to user to confirm delete
$fin=mysqli_query($con,"delete from Honor where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Year='$Year') ")or die(mysqli_error($con));
mysqli_close( $con);
redirect("Honor_list.php?start=0");
?>

