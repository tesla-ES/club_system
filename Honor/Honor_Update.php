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
<FORM NAME="FORM2"  action="Honor_View.php?" method="post">
<?PHP


    $User_ID=$_REQUEST["Text1"];
    $Reg_Type=$_REQUEST["Text2"];
    $Year=$_REQUEST["Text44"];
    $Due_Date="";
    if(valid_date($_REQUEST["Text45"])) {
        $date1 = explode("/", $_REQUEST["Text45"]); // change date format
        $_REQUEST["Text45"] = $date1[2] . "-" . $date1[1] . "-" . $date1[0];// change date format
        $Due_Date = date("Y-m-d", strtotime($_REQUEST["Text45"]));// change date format
    }
    $Name=$_REQUEST["Text46"];
    $Job=$_REQUEST["Text48"];
    $No=$_REQUEST["Text49"];
    $Prints=$_REQUEST["Text50"];
	$Reg_Type_New=$_REQUEST["Text500"];


$fin=mysqli_query($con,"UPDATE Honor SET 
Year='$Year',
Due_Date='$Due_Date',
Name='$Name',
Job='$Job',
No='$No',
Prints='$Prints',
Reg_Type_New='$Reg_Type_New'
where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Year='$Year') ")or die(mysqli_error($con));

if($_FILES["file"]["size"] > 0) {
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


        if (($_FILES["file"]["type"] == "image/gif")) {
            $type = ".gif";
        }
        if (($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg")) {
            $type = ".jpg";
        }


        $second_column = $User_ID . "_" . $Reg_Type . "_1" . "_" . $Year . $type;////////////////3/2/2014

        if (file_exists("../upload/" . $_FILES["file"]["name"])) {
            //	unlink("../Upload/" .$second_column);
            rename("../Upload/" . $_FILES["file"]["name"], "../Upload/" . $second_column);
        }


        $second_column = "../Upload/" . $second_column;

        if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000)) {
            $query1 = mysqli_query($con, "UPDATE Honor SET image ='$second_column' where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Year='$Year')") or die(mysql_error());;
        }

        mysqli_close($con);
        redirect("Honor_View.php?id=$User_ID&name=$Name&year=$Year");

    } else {
        echo "Invalid file";
    }
}
?>
</FORM>
</BODY>
</HTML>
