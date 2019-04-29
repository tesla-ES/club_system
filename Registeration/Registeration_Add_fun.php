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
include_once '../menu.php';write_menu('Registration');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  action="Registeration_List.php" method="post">


<?PHP
$Text1=$_REQUEST["Text1"];
$Text2=$_REQUEST["Text2"];
$Text3=$_REQUEST["Text3"];
$Text4=$_REQUEST["Text4"];
$Text5=$_REQUEST["Text5"];
$Text6=$_REQUEST["Text6"];
$Text8=$_REQUEST["Text8"];
$Text9=$_REQUEST["Text9"];
$Text10=$_REQUEST["Text10"];
$Text11=$_REQUEST["Text11"];
$Text12=$_REQUEST["Text12"];
$Text13=$_REQUEST["Text13"];
$Text14=$_REQUEST["Text14"];
$Text15=$_REQUEST["Text15"];
$Text16= $_REQUEST["Text16"];
$Text17=$_REQUEST["Text17"];
$Text18=$_REQUEST["Text18"];

$query = "INSERT INTO Registeration ( Ser,Reg_Cost,Main_Cost,Reg_Main_Cost,Wife_Cost,More_Cost,Form_Cost,Daughter_Cost,Son_Cost,Card_Cost,Tax,car,invitation,car2,invitation2,Lost,Damaged )
					   values ( '$Text1','$Text2','$Text3','$Text4','$Text5','$Text6','$Text8','$Text9','$Text10','$Text11','$Text12','$Text13','$Text14','$Text15','$Text16','$Text17','$Text18')";
mysqli_query($con,$query) or  die (mysqli_error($con));
    mysqli_close($con);
    redirect("Registeration_View.php?ser=$Text1");
?>
<BR>
</FORM>
</BODY>
</HTML>
