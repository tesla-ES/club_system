<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
r_header($page_name,$con);
include_once '../menu.php';write_menu('Registration')
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  action="Registeration_View.php?" method="post">
<?PHP

	$Ser=$_REQUEST["Text1"];
	$Reg_Cost=$_REQUEST["Text2"];
	$Main_Cost=$_REQUEST["Text3"];
	$Reg_Main_Cost=$_REQUEST["Text4"];
	$Wife_Cost=$_REQUEST["Text5"];
	$More_Cost=$_REQUEST["Text6"];
	$Form_Cost=$_REQUEST["Text8"];
	$Daughter_Cost=$_REQUEST["Text9"];
	$Son_Cost=$_REQUEST["Text10"];
	$Card_Cost=$_REQUEST["Text11"];
	$Tax=$_REQUEST["Text12"];
	$car=$_REQUEST["Text13"];
	$invitation=$_REQUEST["Text14"];
	$car2=$_REQUEST["Text15"];
	$invitation2=$_REQUEST["Text16"];
	$Lost=$_REQUEST["Text17"];
	$Damaged=$_REQUEST["Text18"];


///////////////////////////////////////update function

$fin=mysqli_query($con,"UPDATE Registeration SET 
	Reg_Cost='$Reg_Cost',
	Main_Cost='$Main_Cost',
	Reg_Main_Cost='$Reg_Main_Cost',
	Wife_Cost='$Wife_Cost',
	More_Cost='$More_Cost',
	Form_Cost='$Form_Cost',
	Daughter_Cost='$Daughter_Cost',
	Son_Cost='$Son_Cost',
	Card_Cost='$Card_Cost',
	Tax='$Tax',
	car='$car',
	invitation='$invitation',
	car2='$car2',
	invitation2='$invitation2',
	Lost='$Lost',
	Damaged='$Damaged'
where Ser='$Ser'  ")or die(mysqli_error($con));


mysqli_close( $con);

redirect("Registeration_View.php?ser=$Ser");

?>
</FORM>
</BODY>
</HTML>
