<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>
<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Honor');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">


<FORM NAME="FORM2"  action="Honor_List.php" method="post">
<?PHP
$Reg_Type=$_REQUEST["Reg_Type"];
$User_ID=$_REQUEST["User_ID"];
$Image=$_REQUEST["Image"];

$Name=$_REQUEST["Name"];
$Job=$_REQUEST["Job"];
$No=$_REQUEST["No"];
$Prints=$_REQUEST["Prints"];


$Year=intval($Curr_Year);


////////////////// select max from basic 11/02/2017 A.sadiek
///$fin=mysql_query("select MAX(User_ID)+1 as Max_ID from Honor where Year='$Year'&& reg_type='$Reg_Type'");
$fin=mysqli_query($con,"select MAX(User_ID)+1 as Max_ID from Basic_Reg where reg_type='$Reg_Type'");
$row = mysqli_fetch_array($fin);
$User_ID=$row["Max_ID"];
if($User_ID==0){
$User_ID=1;
}

$n_res=mysqli_num_rows($fin);

   ////////////insert values

  $employee=0;

///////////////////////////////////////Ahmed Othman Image 12/3/2018
	if (file_exists($Image)) {
		$Image1=explode("/",$Image); 
			if($Image1[3] == ""){
				$Image2=explode(".",$Image1[2]);
				}else{
				$Image2=explode(".",$Image1[3]);
				}
				$New_Image="../Upload/".$Curr_Year."/".$User_ID."_".$Reg_Type."_".$Curr_Year.".".$Image2[1];
			$directory="../Upload";
				if (!file_exists($directory."/".$Curr_Year)) {
					mkdir($directory."/".$Curr_Year,0777);
				}
				copy($Image, $New_Image);
	}else{
				$New_Image=$Image;
	}

////////////////////////////////////////
$query = "INSERT INTO Honor ( User_ID,Reg_Type,Year,Name,Job,No,Prints,Image )
values ( '$User_ID','$Reg_Type','$Year','$Name','$Job','$No','$Prints','$New_Image')";
mysqli_query($con,$query) or  die (mysqli_error($con));

$query1 = "INSERT INTO Basic_reg ( User_ID,Reg_Type,Name,Job,Image,employee,Guest_No,Sec_Type,Ser,beach,valid )
						values ( '$User_ID','$Reg_Type','$Name','$Job','$New_Image','$employee','$No','1','0','1','1')";
mysqli_query($con,$query1) or  die (mysqli_error($con));


    mysqli_close( $con);
redirect("Honor_View.php?id=$User_ID&name=$Name&year=$Year");

?>
<BR>
</FORM>
</BODY>
</HTML>
