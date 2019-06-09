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
include_once '../menu.php';write_menu('Basic_Reg')

?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM2"  action="Basic_Reg_List.php" method="post">


<?PHP

$fin=mysqli_query($con,"select * from Basic_Reg");
$n_res=mysqli_num_rows($fin);

$Text1=$_REQUEST['Text1'];
$Text2=$_REQUEST['Text2'];
$Text3=$_REQUEST['Text3'];
$Text4=$_REQUEST['Text4'];
$Text5=$_REQUEST['Text5'];
$Text6=$_REQUEST['Text6'];

 $Text8=$_REQUEST['Text8'];
$Text9=$_REQUEST['Text9'];
$Text10=$_REQUEST['Text10'];
$Text11=$_REQUEST['Text11'];
$Text12=$_REQUEST['Text12'];
$Text13=$_REQUEST['Text13'];
$Text14=$_REQUEST['Text14'];
$Text15=$_REQUEST['Text15'];
$Text16=$_REQUEST['Text16'];
$Text17=$_REQUEST['Text17'];
$Text18=$_REQUEST['Text18'];
$Text19=$_REQUEST['Text19'];
$Text20=$_REQUEST['Text20'];
$Text21=$_REQUEST['Text21'];
$Text22=$_REQUEST['Text22'];
$Text23=$_REQUEST['Text23'];
$Text24=$_REQUEST['Text24'];
$Text25=$_REQUEST['Text25'];
$Text26=$_REQUEST['Text26'];
$Text27=$_REQUEST['Text27'];
$Text60=$_REQUEST['Text60'];

if (isset($_REQUEST['chk2'])) {$Beach=1;}else{$Beach=0;}
if (isset($_REQUEST['chk3'])) {$Yacht=1;}else{$Yacht=0;}
if (isset($_REQUEST['chk4'])) {$Golf=1;}else{$Golf=0;}
if (isset($_REQUEST['chk5'])) {$Tennis=1;}else{$Tennis=0;}
if (isset($_REQUEST['chk6'])) {$Rowing=1;}else{$Rowing=0;}
if (isset($_REQUEST['chk7'])) {$knighthood=1;}else{$knighthood=0;}


//////////////////////////////////////////////////////////////////////////////////////
if($Text2 ==36 or $Text2 ==2)
{
$count_id=mysqli_query($con,"select Max(User_ID) as Max_ID from Basic_Reg where Reg_Type in(2,36)");
}else{
$count_id=mysqli_query($con,"select Max(User_ID) as Max_ID from Basic_Reg where Reg_Type=$Text2");
}
while($res1=mysqli_fetch_array($count_id))
	{
	$new_id=$res1['Max_ID'];
	}
	if($Text1==""){
		$Text1=$new_id+1;
	}

   ////////////insert values
if(valid_date($Text8)){
    $date1=explode("/",$Text8); // change date format
    $Text8=$date1[2]."-".$date1[1]."-".$date1[0];// change date format
    $end_date=((int)$date1[2]+60)."-12-31";// change date format
    //$Text8=date("Y-m-d",strtotime($Text8));
}

if (valid_date($Text13)) {
    $date2 = explode("/", $Text13); // change date format
    $Text13 = $date2[2] . "-" . $date2[1] . "-" . $date2[0];// change date format
    //$Text13=date("Y-m-d",strtotime($Text13));
}
if (valid_date($Text20)) {
    $date3 = explode("/", $Text20); // change date format
    $Text20 = $date3[2] . "-" . $date3[1] . "-" . $date3[0];// change date format
    //$Text20=date("Y-m-d",strtotime($Text20));
}
if (valid_date($Text23)) {
    $date4 = explode("/", $Text23); // change date format
    $Text23 = $date4[2] . "-" . $date4[1] . "-" . $date4[0];// change date format
  //$Text23=date("Y-m-d",strtotime($Text23));
}
//////////////////////////////////////////////////
	/*$date1=explode("-",$Text8); // change date format
	$date2=(int)$date1[0]+60;
	$end_date=$date2."-12-31";// change date format*/
	////////////////////////////////////////////
	if($Beach == 0 && $Yacht== 0 && $Golf== 0 && $Tennis== 0  &&  ($Text2 ==2||$Text2 ==36||$Text2 ==41||$Text2 ==42))

  {
    echo("لم يتم تحديد نادى ");
    exit ;
  }

  else{
      $query = "INSERT INTO Basic_Reg ( User_ID,Reg_Type,Sec_Type,Ser,Employee,Name,b_date,gender,b_place,Nationality,Education,Grade_Date,Job,Employer,Job_Tel,Home_Tel,Address,Status,Hire_date,Social_Type,Social_No,Social_Date,Place,Last_Year,Valid,Notes,Beach,Yacht,Golf,Tennis,Guest_No,end_date,ins_date,ins_user,Rowing,knighthood )";
      $query .=" values ( '$Text1','$Text2','$Text3','$Text4','$Text5','$Text6','$Text8','$Text9','$Text10','$Text11','$Text12','$Text13','$Text14','$Text15','$Text16','$Text17','$Text18','$Text19','$Text20','$Text21','$Text22','$Text23','$Text24','$Text25','$Text26','$Text27','$Beach','$Yacht','$Golf','$Tennis','$Text60','$end_date',sysdate(),$session_user_id,'$Rowing','$knighthood')";


      mysqli_query($con,$query) or  die (mysqli_error($con));
  }



    mysqli_close($con);
    redirect("Basic_Reg_View.php?user_id=$Text1&employee=$Text5& reg_type=$Text2");

?>
<BR>
</FORM>
</BODY>
</HTML>
