<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../Reports/css/table_css.css">
</head>

<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Reg_type');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  action="Reg_Type_view.php?id=0" method="post">
<?PHP

$Code=$_REQUEST["Text1"];
$Name=$_REQUEST["Text2"];

$fin=mysqli_query($con,"UPDATE Reg_Type SET Name = '$Name' where Code='$Code' ")or die(mysqli_error($con));

mysqli_close( $con);
redirect("Reg_Type_View.php?id=$Code");

?>
</FORM>
</BODY>
</HTML>
