<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';

r_header($page_name,$con);
include_once '../menu.php';write_menu('Holder');


$Holder_No=$_REQUEST["Text1"];
$Cheque_No=$_REQUEST["Text3"];
$Holder_Date=$_REQUEST["Text2"];
$Cheque_Date=$_REQUEST["Text4"];
$Total=$_REQUEST["Text5"];

if(valid_date($Holder_Date)) {
    if (strpos($Holder_Date, '/') !== false) {
        list($day, $month, $year) = explode('/', $Holder_Date);
        $Holder_Date=$year ."/".$month."/". $day ;
    }

}else{
   echo "ÇÏÎá ÊÇÑíÎ ÍÇÝÙå ÕÍíÍ ãä ÝÖáß ";
}

if(valid_date($_REQUEST["Text4"])) {
	$date2=explode("/",$_REQUEST["Text4"]); // change date format
	$Cheque_Date= date("Y/m/d",strtotime($_REQUEST["Text4"]));// change date format
echo  $Cheque_Date ;
	}
	$sql="UPDATE Holder SET Cheque_No = $Cheque_No,Cheque_Date='$Cheque_Date' 	Where Holder_No='$Holder_No'&& Holder_Date='$Holder_Date' ";

mysqli_query($con,$sql)or die(mysqli_error($con));

redirect("Holder_View.php?id=$Holder_No&date=$Holder_Date");


?>
