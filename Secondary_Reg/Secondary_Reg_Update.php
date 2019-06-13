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
<FORM NAME="FORM2"  action="Secondary_Reg_View.php?" method="post">
<?PHP
///to
$User_ID=$_REQUEST["Text1"];
$Reg_Type=$_REQUEST["Text2"];
$Sec_Type=$_REQUEST["Text3"];
$Ser=$_REQUEST["Text4"];
$Name=$_REQUEST["Text6"];
$gender=$_REQUEST["Text9"];
$Notes=$_REQUEST["Text28"];
$Work=$_REQUEST["Text30"];
$Married=$_REQUEST["Text31"];
$Card_OK=$_REQUEST["Text32"];
$Employee=$_REQUEST["Text5000"];

if(valid_date($_REQUEST["Text8"])) {

    if (strpos($_REQUEST["Text8"], '-') !== false) {
        $date1 = explode("-", $_REQUEST["Text8"]); // change date format
    }
    else
        {
            $date1 = explode("/", $_REQUEST["Text8"]); // change date format
        }

    $b_date = $date1[2] . "-" . $date1[1] . "-" . $date1[0];// change date format


}
else{
    echo "   لابد من ادخال قيمه صحيحه فى تاريخ الميلاد <br>" ;
    exit ;
}
//echo "b-date= " .$b_date. "<br>" ;
$sqlx ="select b_date from Basic_Reg where User_ID ='$User_ID' && Reg_Type ='$Reg_Type' && Employee='$Employee' ";
$finx=mysqli_query($con,$sqlx)or  die (mysqli_error($con));
while($resx=mysqli_fetch_array($finx))
{
    $B_Date=$resx["b_date"];
}
$B_Date=substr($B_Date,0,4);

/*
$valid_to_exception = false;
if(valid_date($_REQUEST["Text61"])) {
    $date2 = explode("/", $_REQUEST["Text61"]); // change date format
    $End_Date = $date2[0] . "-" . $date2[1] . "-" . $date2[2];// change date format

}else {
*/


    if ((((int)$B_Date + 60) < ((int)$date1[2] + 23)) && ($Reg_Type == 1)) {
        $End_Date = ((int)$B_Date + 60) . "-12-31";

    } else {
        $End_Date = ((int)$date1[2] + 23) . "-12-31";
        $valid_to_exception = true;
    }


    $date2 = explode("-", $End_Date); // change date format

//}

if(isset($_REQUEST["Text62"])&& $_REQUEST["Text62"] >0 && $valid_to_exception==true ) {

    if ((isset($date2)) && (($date2[0] - $date1[2]) < 25) && ($Card_OK == 1)) {

        $End_Date = ((int)$date2[0] + $_REQUEST["Text62"]) . "-12-31";// change date format

    } else {
        $End_Date = ((int)$date2[0]) . "-12-31";// change date format
    }
    $End_Date_old=((int)$date1[2]+23)."-12-31";// change date format
}

///////////////////////////////////////update function

$fin=mysqli_query($con,"UPDATE Secondary_Reg SET 
Name='$Name',
b_date='$b_date',
gender='$gender',
Notes='$Notes',
Work='$Work',
Married='$Married',
Card_OK='$Card_OK',
End_Date='$End_Date',
upd_date= sysdate(),
End_Date_old='$End_Date_old',
upd_user= '$session_user_id'
where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Sec_Type='$Sec_Type'&& Ser='$Ser'&&Employee='$Employee') ")or die(mysqli_error($con));

//todo must redirect to page view message or view alert message
//todo manage uploading files and relating with database insert
echo 'تم التعديل بنجاح';

////////////////////////////////////////////////////

 // uploading files
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

                //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];

            }
        }
    } else {
        echo "Invalid file";
    }


    if (($_FILES["file"]["type"] == "image/gif")) {
        $type = ".gif";
    }
    if (($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg")) {
        $type = ".jpg";
    }

/////////////////////////////////////////////////////////////////////replace the file exist
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
        $query1 = mysqli_query($con, "UPDATE Secondary_Reg SET image ='$second_column'where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Sec_Type='$Sec_Type'&& Ser='$Ser'&& Employee='$Employee')") or die(mysql_error());;
    }
}
mysqli_close( $con);
redirect("Secondary_Reg_View.php?user_id=$User_ID&ser=$Ser& reg_type=$Reg_Type&employee=$Employee");

?>
</FORM>
</BODY>
</HTML>
