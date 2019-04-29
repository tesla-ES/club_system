<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
r_header($page_name,$con);
?>


<?PHP
$Text1=$_REQUEST["Text1"];
$Text2=$_REQUEST["Text2"];
$Text44=$_REQUEST["Text44"];
$Text45=$_REQUEST["Text45"];
$Text46=$_REQUEST["Text46"];
$Text48=$_REQUEST["Text48"];
$Text49=$_REQUEST["Text49"];
$Text50=$_REQUEST["Text50"];
$Text500=$_REQUEST["Text500"];
$User_ID=$_REQUEST["User_ID"];
$Name=$_REQUEST["Name"];
 $Year=$_REQUEST["Year"];

   if(valid_date($Text45)) {
       $date1 = explode("/", $Text45); // change date format
       $Text45 = $date1[2] . "-" . $date1[1] . "-" . $date1[0];// change date format
       $Text45 = date("Y-m-d", strtotime($Text45));
   }

$query = "INSERT INTO Honor ( User_ID,Reg_Type,Year,Due_Date,Name,Job,No,Prints,Reg_Type_New )
values ( '$Text1','$Text2','$Text44','$Text45','$Text46','$Text48','$Text49','$Text50','$Text500')";
////////////////////////////////////////////////////////////////////////////////////
$query = "INSERT INTO Basic_reg ( User_ID,Reg_Type,Due_Date,Name,Job,No,Reg_Type_New )
						values ( '$Text1','$Text2','$Text45','$Text46','$Text48','$Text49','$Text500')";
mysqli_query($con,$query) or  die (mysqli_error($con));

    mysqli_close( $con);
$User_ID=$Text1;
$Name=$Text46;
$Year=$Text44;
redirect("Honor_View.php?id=$User_ID&name=$Name&year=$Year");

?>
