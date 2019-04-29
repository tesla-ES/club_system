<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';?>

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
<FORM NAME="FORM2"  action="Reg_Type_list.php?start=0" method="post">
<?PHP
$id=$_REQUEST["id"];

$fin=mysqli_query($con,"delete from Reg_Type where Code='$id' ")or die(mysqli_error($con));
mysqli_close($con);
redirect("Reg_Type_list.php?start=0");

?>
</FORM>
</BODY>
</HTML>
