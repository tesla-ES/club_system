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
include_once '../menu.php';write_menu('Holder')
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  action="Holder_list.php?start=0" method="post">
<?PHP

$delted_item=$_REQUEST["No"];
$delted_date=$_REQUEST["DT"];

$check_del_sql="select count(*)as cunt from Holder where Holder_No='$delted_item' && Holder_Date='$delted_date' && Cheque_No is NULL ";
$cunt_q=mysqli_query($con,$check_del_sql);

while($res1=mysqli_fetch_array($cunt_q))
{ $cunt=$res1["cunt"];}
if($cunt>0){

echo"$delted_item";
$fin=mysqli_query($con,"delete from Holder where Holder_No='$delted_item' && Holder_Date='$delted_date' ")or die(mysqli_error($con));
$query = "update  payment SET Holder_No= Null ,  Holder_Date=Null where Holder_No='$delted_item' && Holder_Date='$delted_date'";
mysqli_query($con,$query) or  die (mysqli_error($con));
mysqli_close( $con);
redirect(" Holder_list.php?start=0");

}else{
    $Session_ErroMessage = 10004;
    $_SESSION["Session_ErroMessage"]= $Session_ErroMessage;
    redirect("../login/Show_error.php");
   }

?>
</FORM>
</BODY>
</HTML>
