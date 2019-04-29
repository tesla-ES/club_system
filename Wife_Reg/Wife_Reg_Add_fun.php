<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';?>

<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>

<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Wife_Reg');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM2"  action="Wife_Reg_List.php" method="post">

<?PHP

$fin=mysqli_query($con,"select * from Wife_Reg");
$n_res=mysqli_num_rows($fin);

   ////////////insert values
$User_ID=$_REQUEST["Text1"];
$Reg_Type=$_REQUEST["Text2"];
$Ser=$_REQUEST["Text4"];
$Name=$_REQUEST["Text6"];
$Name_Card=$_REQUEST["Text7"];
$b_date="";
$gender=$_REQUEST["Text9"];
$Employer=$_REQUEST["Text15"];
$Notes=$_REQUEST["Text28"];
$Card_OK=$_REQUEST["Text32"];
$Employee=$_REQUEST["Text5000"];

if(valid_date($_REQUEST["Text8"])) {
    $date1 = explode("/", $_REQUEST["Text8"]);
    $b_date = $date1[2] . "-" . $date1[1] . "-" . $date1[0];
}

$query = "INSERT INTO Wife_Reg ( User_ID,Reg_Type,Sec_Type,Ser,Name,Name_Card,b_date,gender,Employer,Notes,Card_OK,Employee,ins_user,ins_date )
						values ('$User_ID','$Reg_Type','2','$Ser','$Name','$Name_Card','$b_date','$gender','$Employer','$Notes','$Card_OK','$Employee',$session_user_id,sysdate())";
mysqli_query($con,$query) or  die (mysqli_error($con));

mysqli_close( $con);
redirect("Wife_Reg_View.php?user_id=$User_ID&reg_type=$Reg_Type&employee=$Employee&ser=$Ser");

?>
<BR>
</FORM>
</BODY>
</HTML>
