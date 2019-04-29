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
  include_once '../menu.php';write_menu('Basic_Reg');

$User_ID=$_REQUEST['User_ID'];
$Employee=$_REQUEST['Employee'];
$Reg_Type=$_REQUEST['Reg_Type'];
?>


<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  action="Basic_Reg_list.php?start=0" method="post">
<?PHP

$fin=mysqli_query($con,"delete from Basic_Reg where (User_ID='$User_ID'&& Reg_Type='$Reg_Type' && Employee='$Employee') ")or die(mysqli_error($con));
$fin1=mysqli_query($con,"delete from Secondary_Reg where (User_ID='$User_ID'&& Reg_Type='$Reg_Type' && Employee='$Employee') ")or die(mysqli_error($con));
$fin2=mysqli_query($con,"delete from Wife_Reg where (User_ID='$User_ID'&& Reg_Type='$Reg_Type' && Employee='$Employee') ")or die(mysqli_error($con));

///if($Reg_Type==13){
	//شرفيه واداريه ودعوه خارجى ودعوه هيئه
if($Reg_Type==13||$Reg_Type==15||$Reg_Type==41||$Reg_Type==42){
$fin1=mysqli_query($con,"delete from honor where (User_ID='$User_ID'&& Reg_Type='$Reg_Type' && Year='$Curr_Year') ")or die(mysqli_error($con));
}
 //todo delete images files too

mysqli_close( $con);
redirect("Basic_Reg_list.php?start=0");
?>
</FORM>
</BODY>
</HTML>
