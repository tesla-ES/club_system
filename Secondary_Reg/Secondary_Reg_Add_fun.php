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
<FORM NAME="FORM2"  action="http://192.168.1.3/Club_System/Secondary_Reg/Secondary_Reg_List.php" method="post">


<?PHP
$Text1=$_REQUEST["Text1"];
$Text2=$_REQUEST["Text2"];
$Text5000=$_REQUEST["Text5000"];
$Text4=$_REQUEST["Text4"];
$Text6=$_REQUEST["Text6"];
$Text8=$_REQUEST["Text8"];
$Text9=$_REQUEST["Text9"];
$Text28=$_REQUEST["Text28"];
$Text30=$_REQUEST["Text30"];
$Text31=$_REQUEST["Text31"];
$Text32=$_REQUEST["Text32"];
$End_Date=$_REQUEST["End_Date"];


$sqlx ="select b_date from Basic_Reg where User_ID ='$Text1' && Reg_Type ='$Text2' && Employee='$Text5000' ";
$finx=mysqli_query($con,$sqlx)or  die (mysqli_error($con));
 while($resx=mysqli_fetch_array($finx))
{
$B_Date=$resx["b_date"];
}
$B_Date=substr($B_Date,0,4);

    if(valid_date($Text8)) {
        $date1 = explode("/", $Text8); // change date format
        $Text8 = $date1[2] . "-" . $date1[1] . "-" . $date1[0];// change date format
    }

    if((((int)$B_Date+60)<((int)$date1[2]+23))&&($Text2==1)){
    $End_Date=((int)$B_Date+60)."-12-31";
    }else{
    $End_Date=((int)$date1[2]+23)."-12-31";
    }

$query = "INSERT INTO Secondary_Reg ( User_ID,Reg_Type,Sec_Type,Ser,Name,b_date,gender,Notes,Work,Married,Card_OK,End_Date,Employee,ins_user,ins_date ,End_Date_old)
							values ( '$Text1','$Text2','3','$Text4','$Text6','$Text8','$Text9','$Text28','$Text30','$Text31','$Text32','$End_Date','$Text5000',$session_user_id,sysdate(),'$End_Date')";
mysqli_query($con,$query) or  die (mysqli_error($con));

    mysqli_close( $con);
    redirect("Secondary_Reg_View.php?user_id=$Text1&reg_type=$Text2&employee=$Text5000&ser=$Text4");

?>
<BR>
</FORM>
</BODY>
</HTML>
