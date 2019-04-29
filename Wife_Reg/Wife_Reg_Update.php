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
include_once '../menu.php';write_menu('Wife_Reg');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  action="Wife_Reg_View.php?" method="post">
<?PHP

$User_ID=$_REQUEST["Text1"];
$Reg_Type=$_REQUEST["Text2"];
$Sec_Type=$_REQUEST["Text3"];
$Ser=$_REQUEST["Text4"];
$Name=$_REQUEST["Text6"];
$Name_Card=$_REQUEST["Text7"];
//$b_date=$_POST["Text8"];
$gender=$_REQUEST["Text9"];
$Notes=$_REQUEST["Text28"];
$Employer=$_REQUEST["Text15"];
$Card_OK=$_REQUEST["Text32"];
$Employee=$_REQUEST["Text5000"];
$b_date="";
if(valid_date($_REQUEST["Text8"])) {
    $date1 = explode("/", $_REQUEST["Text8"]); // change date format
    $b_date = $date1[2] . "-" . $date1[1] . "-" . $date1[0];// change date format
}

$fin=mysqli_query($con,"UPDATE Wife_Reg SET 
		Name='$Name',
		Name_Card='$Name_Card',
		b_date='$b_date',
		gender='$gender',
		Notes='$Notes',
		Employer='$Employer',
		Card_OK='$Card_OK',
		upd_user= '$session_user_id',
		upd_date= sysdate()

		where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Sec_Type='$Sec_Type'&& Ser='$Ser'&& Employee='$Employee') ")or die(mysqli_error($con));

if($_FILES["file"]["size"]>0) {
    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
        } else {

            if (file_exists("../upload/" . $_FILES["file"]["name"])) {
                echo $_FILES["file"]["name"] . " already exists. ";
            } else {
                move_uploaded_file($_FILES["file"]["tmp_name"],
                    "../upload/" . $_FILES["file"]["name"]);
            }
        }
        if (($_FILES["file"]["type"] == "image/gif")) {
            $type = ".gif";
        }
        if (($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg")) {
            $type = ".jpg";
        }
        if ($Ser == 0) {
            $second_column = $User_ID . "_" . $Reg_Type . "_" . $Sec_Type . "_" . $Employee . $type;
        } else {
            $second_column = $User_ID . "_" . $Reg_Type . "_" . $Sec_Type . "_" . $Ser . "_" . $Employee . $type;
        }
        if (file_exists("../upload/" . $_FILES["file"]["name"])) {
            unlink("../Upload/" . $second_column);
            rename("../Upload/" . $_FILES["file"]["name"], "../Upload/" . $second_column);
        }

        $second_column = "../Upload/" . $second_column;

        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000)) {
            $query1 = mysqli_query($con, "UPDATE Wife_Reg SET image ='$second_column'where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Sec_Type='$Sec_Type'&& Ser='$Ser'&& Employee='$Employee')") or die(mysql_error());;
        }


    } else {
        echo "Invalid file";
    }
}

mysqli_close( $con);
redirect("Wife_Reg_View.php?user_id=$User_ID&ser=$Ser&employee=$Employee& reg_type=$Reg_Type");


?>
</FORM>
</BODY>
</HTML>
