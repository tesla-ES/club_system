<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
    <script language="JavaScript" src="calendar_us.js"></script>
    <link rel="stylesheet" href="calendar.css">
</head>

<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Holder')
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM1"  action="Holder_Add_fun.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" >
<BR>

<?php

$fin=mysqli_query($con,"select * from Holder");
$n_res=mysqli_num_rows($fin);

$cunt_q=mysqli_query($con,"select count(user_id)as cunt from Payment where status in(0,3)  &&  holder_No is null && year(Pay_date)=year(sysdate())&&upd_user = $session_user_id");
$not_payed_Res=mysqli_query($con,"select count(*)as not_payed_h from holder where total >0 and Cheque_No is null and year(holder_date)=year(sysdate())");
while($res1=mysqli_fetch_array($not_payed_Res))
{
    $not_payed_h=$res1["not_payed_h"];
}


while($res1=mysqli_fetch_array($cunt_q))
{
    $cunt=$res1["cunt"];
}


$cunt_q1=mysqli_query($con,"select count(user_id) as cunt1 from Payment  where holder_No is null &&pay_year = year(sysdate())&& status =0 && date(Pay_date+1) < sysdate()&&upd_user <> $session_user_id");
while($res1=mysqli_fetch_array($cunt_q1))
	
	{
	$cunt1=$res1["cunt1"];
    }

if(($cunt>0)&&($cunt1 == 0)){
    redirect("Holder_Add_Fun.php");
}

else if ($cunt1>0){
	$Session_ErroMessage = 10006;
    $_SESSION["Session_ErroMessage"]=$Session_ErroMessage;
    redirect("../login/Show_error.php");
	}
else{



if($not_payed_h <=10 ){
if($cunt>0){
    redirect("Holder_Add_Fun.php");
}else{

    $Session_ErroMessage = 10002;
    $_SESSION["Session_ErroMessage"]=$Session_ErroMessage;
    redirect("../login/Show_error.php");
}

}else {
 $Session_ErroMessage = 10005;
    $_SESSION["Session_ErroMessage"]=$Session_ErroMessage;
    redirect("../login/Show_error.php");
}
}
?>

</FORM>


</BODY>

</HTML>
