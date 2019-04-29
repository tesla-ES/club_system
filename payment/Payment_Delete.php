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
<FORM NAME="FORM2"  action="Payment_list.php?start=0" method="post">
<?PHP

$User_ID=isset($_REQUEST["User_ID"])? $_REQUEST["User_ID"]:"";
$Reg_Type=isset($_REQUEST["Reg_Type"])? $_REQUEST["Reg_Type"]:"";
$Pay_Year=isset($_REQUEST["Pay_Year"])? $_REQUEST["Pay_Year"]:"";
$Receipt_No=isset($_REQUEST["Receipt_No"])? $_REQUEST["Receipt_No"]:"";

///////////////////////////////////////////////////////////check for user group
$Member_group = mysqli_query($con,"SELECT Group_ID  FROM members Where id=$session_user_id");
	while($Member_group_arr=mysqli_fetch_array($Member_group))
			{
				$Group_ID=$Member_group_arr["Group_ID"];
			}


$sql="select count(user_id)as cunt from Payment where User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Pay_Year='$Pay_Year' && Receipt_No='$Receipt_No'&& Status in(0,2) && Holder_No is NULL ";
$cunt_q=mysqli_query($con,$sql);

while($res1=mysqli_fetch_array($cunt_q))
{
	$cunt=$res1["cunt"];
}
if($cunt>0){

	////////////////////////////////////////////////////////////
	if($Group_ID==4){
		$fin=mysqli_query($con,"delete from Payment where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Pay_Year='$Pay_Year'&& Receipt_No='$Receipt_No'&& Status='2') ")or die(mysqli_error($con));
	}else{
		///// الاسترداد بديلا عن الحذف
		$fin=mysqli_query($con,"update Payment  set status = 1  ,upd_date = sysdate() , upd_user =$session_user_id where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Pay_Year='$Pay_Year'&& Receipt_No='$Receipt_No') ")or die(mysqli_error($con));
	}
	$Count=mysqli_query($con,"select * from Payment where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Pay_Year='$Pay_Year' && status=0) ")or die(mysqli_error($con));
///$Count=mysql_query("select * from Payment where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Pay_Year='$Pay_Year') ")or die(mysql_error());
	$Count=mysqli_num_rows($Count);
	if($Count==0){
		$Pay_Year=(int)$Pay_Year-1;
		//$Pay_Year=(int)$Pay_Year-1;
		$query1 = "update Basic_Reg Set Last_Year='$Pay_Year' where (User_ID='$User_ID'&& Reg_Type='$Reg_Type') ";
		mysqli_query($con,$query1) or  die (mysqli_error($con));
	}
	mysqli_close( $con);
redirect(" Payment_list.php?start=0");


}else{
//TODO add more reson to un delete essal
    //  ربما يكون تم حذفه من قبل
	$Session_ErroMessage = 10003;
    $_SESSION["Session_ErroMessage"]= $Session_ErroMessage;
	redirect("../login/Show_error.php");
}



?>
</FORM>
</BODY>
</HTML>
