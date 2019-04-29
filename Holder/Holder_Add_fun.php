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
include_once '../menu.php';write_menu('Holder');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM2"  action="Holder_List.php" method="post">

<?PHP
//////////////////////////////////////////////////////////
$fin=mysqli_query($con,"select   Max(Holder_No)as Max_Holder from Holder where Year(Holder_Date)=Year(sysdate())");
$n_res=mysqli_num_rows($fin);
if(empty($n_res)){
	$Holder_No=1;
}else{
while($res=mysqli_fetch_array($fin))
{
$Holder_No=$res["Max_Holder"];
$Holder_No++;
}}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
//$fin1=mysql_query("select sum(Total)as Final from Payment where status= 0  &&  holder_No is null && pay_year=year(sysdate())"); 17/01/2018 Ahmed Othman
$fin1=mysqli_query($con,"select sum(Total)as Final from Payment where status in(0,3) &&  holder_No is null && year(Pay_date)=year(sysdate())&&upd_user = $session_user_id");
$n_res1=mysqli_num_rows($fin1);
$Final="";
while($res1=mysqli_fetch_array($fin1))
{
$Final=$res1["Final"];
}
   ////////////insert values
$query = "INSERT INTO Holder (Holder_No,Holder_Date,total,ins_user)values ('$Holder_No',sysdate(),'$Final',$session_user_id)";
mysqli_query($con,$query) or  die (mysqli_error($con));
///////////////////////////////////////////////
//$query = "update  payment SET Holder_No='$Holder_No' ,  Holder_Date=sysdate() where status in(0,3) && holder_No is null && pay_year=year(sysdate())"; 17/01/2018 Ahmed Othman
$query = "update  payment SET Holder_No='$Holder_No' ,  Holder_Date=sysdate() where status in(0,3) && holder_No is null&&upd_user = $session_user_id &&  year(Pay_date)=year(sysdate())";  
  mysqli_query($con,$query) or  die (mysqli_error($con));
    mysqli_close( $con);
    redirect("Holder_List.php");

?>
<BR>
</FORM>
</BODY>
</HTML>
