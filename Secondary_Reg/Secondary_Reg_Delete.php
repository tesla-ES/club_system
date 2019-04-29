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
include_once '../menu.php';write_menu('Secondary_Reg');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  action="Secondary_Reg_list.php?start=0" method="post">
<?PHP
$User_ID=$_REQUEST["User_ID"];
$Reg_Type= $_REQUEST["Reg_Type"];
$Sec_Type=$_REQUEST["Sec_Type"];
$Ser=$_REQUEST["Ser"];
$Employee=$_REQUEST["Employee"];

$fin=mysqli_query($con,"delete from Secondary_Reg where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Sec_Type='$Sec_Type'&& Ser='$Ser'&& Employee='$Employee') ")or die(mysqli_error($con));

mysqli_close( $con);
redirect(" Secondary_Reg_list.php?start=0");
?>
</FORM>
</BODY>
</HTML>
