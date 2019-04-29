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

if(valid_date($_REQUEST["Text2"])) {
    $Holder_Date=$_REQUEST["Text2"];
}else{
    if (strpos($Holder_Date, '/') !== false) {
        list($day, $month, $year) = explode('/', $Holder_Date);
        $Holder_Date=$year."-".$month."-".$day ;
    }
}

if(valid_date($_REQUEST["Text4"])) {
	$date2=explode("/",$_REQUEST["Text4"]); // change date format
	$Cheque_Date= date("Y-m-d",strtotime($_REQUEST["Text4"]));// change date format
	}

mysqli_query($con,"UPDATE Holder SET Cheque_No = $Cheque_No,Cheque_Date='$Cheque_Date' 	Where Holder_No='$Holder_No'&& Holder_Date='$Holder_Date' ")or die(mysqli_error($con));

redirect("Holder_View.php?id=$Holder_No&date=$Holder_Date");

?>
