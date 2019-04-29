<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
	<link rel="stylesheet" href="../css/table_css.css">
</head>
<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Payment');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  action="Payment_View.php?" method="post">
<?php
////////////assign vars//////////
	$User_ID=isset($_REQUEST["Text1"])?$_REQUEST["Text1"]:"";
	$Reg_Type=isset($_REQUEST["Text2"])?$_REQUEST["Text2"]:"";
	$Pay_Year=isset($_REQUEST["Text33"])?$_REQUEST["Text33"]:"";
	$Total=isset($_REQUEST["Text34"])?$_REQUEST["Text34"]:"";
	$Pay=isset($_REQUEST["Text35"])?$_REQUEST["Text35"]:"";
	$date1=explode("/",$_REQUEST["Text36"]); // change date format
	$_REQUEST["Text36"]=$date1[2]."-".$date1[1]."-".$date1[0];// change date format
	$Pay_Date= date("Y-m-d",strtotime($_REQUEST["Text36"]));// change date format
	$Pay_Not=isset($_REQUEST["Text37"])?$_REQUEST["Text37"]:"";
	//$date2=explode("/",$_REQUEST[Text38]);
	//$_REQUEST[Text38]=$date2[2]."-".$date2[1]."-".$date2[0];
	//$Pay_Date=date("Y-m-d",strtotime($_REQUEST[Text38]));
	$Notes=isset($_REQUEST["Text39"])?$_REQUEST["Text39"]:"";
	$Wife_No=isset($_REQUEST["Text40"])?$_REQUEST["Text40"]:"";
	$Son_More_NO=isset($_REQUEST["Text41"])?$_REQUEST["Text41"]:"";
	$Son_Less_NO=isset($_REQUEST["Text42"])?$_REQUEST["Text42"]:"";
	$Club_NO=isset($_REQUEST["Text43"])?$_REQUEST["Text43"]:"";
	$Reg_Type_New=isset($_REQUEST["Text500"])?$_REQUEST["Text500"]:"";
	$Over_Num=isset($_REQUEST["Text420"])?$_REQUEST["Text420"]:"";
	$Operation=isset($_REQUEST["Text700"])?$_REQUEST["Text700"]:"";
	$Car=isset($_REQUEST["Text900"])?$_REQUEST["Text900"]:"";
	$Receipt_No=isset($_REQUEST["Text600"])?$_REQUEST["Text600"]:"";
	$Employee=isset($_REQUEST["Text6000"])?$_REQUEST["Text6000"]:"";
	$Status=isset($_REQUEST["Text60000"])?$_REQUEST["Text60000"]:"";
	$Temp_Receipt_No=$Receipt_No;
////////////////////////////////////////////////////////
if($Status==2){
//$Receipt_Max = mysql_query("SELECT Max(Receipt_No)as Max_Receipt FROM payment Where Pay_Year=$Pay_Year && Status=0 "); // 17-01-2018 Ahmed Othman 
$Receipt_Max = mysqli_query($con,"SELECT Max(Receipt_No)as Max_Receipt FROM payment Where Pay_Year=$date1[2]  ");
	while($Receipt_Maxs=mysqli_fetch_array($Receipt_Max))
			{
			$Temp_Receipt_No=$Receipt_Maxs["Max_Receipt"];
	}
if (is_Null($Temp_Receipt_No)){
$Temp_Receipt_No=0;
}
$Temp_Receipt_No++;


$fin=mysqli_query($con,"UPDATE Payment SET 
	User_ID='$User_ID',
	Reg_Type='$Reg_Type',
	Pay_Year='$Pay_Year',
	Total='$Total',
	Pay_Date='$Pay_Date',
	Notes='$Notes',
	Status=0,
	Receipt_No=$Temp_Receipt_No,
	upd_user = $session_user_id
where (User_ID='$User_ID' && Reg_Type='$Reg_Type'&& Pay_Year='$Pay_Year'&& Receipt_No='$Receipt_No') ")or die(mysqli_error($con));

}
mysqli_close( $con);
redirect("Payment_View.php?id=$User_ID&type=$Reg_Type&year=$Pay_Year&receipt_no=$Temp_Receipt_No&employee=$Employee");

?>
</FORM>
</BODY>
</HTML>
