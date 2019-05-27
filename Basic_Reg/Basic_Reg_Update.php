
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
<FORM NAME="FORM2"  action="Basic_Reg_View.php?" method="post">
<?PHP

////////////assign vars//////////

$User_ID=$_REQUEST["Text1"];
$Reg_Type=$_REQUEST["Text2"];
$Sec_Type=$_REQUEST["Text3"];
$Ser=$_REQUEST["Text4"];
$Employee=$_REQUEST["Text5"];
$Name=$_REQUEST["Text6"];
/////////////////////////////
if (isset($_REQUEST['chk2'])) {$Beach=1;}else{$Beach=0;}
if (isset($_REQUEST['chk3'])) {$Yacht=1;}else{$Yacht=0;}
if (isset($_REQUEST['chk4'])) {$Golf=1;}else{$Golf=0;}
if (isset($_REQUEST['chk5'])) {$Tennis=1;}else{$Tennis=0;}
if (isset($_REQUEST['chk6'])) {$Rowing=1;}else{$Rowing=0;}
if (isset($_REQUEST['chk7'])) {$knighthood=1;}else{$knighthood=0;}
////////////////////////////////
//$b_date=$_POST["Text8"];
$gender=$_REQUEST["Text9"];
$b_place=$_REQUEST["Text10"];
$Nationality=$_REQUEST["Text11"];
$Education=$_REQUEST["Text12"];
//$Grade_Date=$_POST["Text13"];
$Job=$_REQUEST["Text14"];
$Employer=$_REQUEST["Text15"];
$Job_Tel=$_REQUEST["Text16"];
$Home_Tel=$_REQUEST["Text17"];
$Address=$_REQUEST["Text18"];
$Status=$_REQUEST["Text19"];
//$Hire_date=$_POST["Text20"];
$Social_Type=$_REQUEST["Text21"];
$Social_No=$_REQUEST["Text22"];
//$Social_Date=$_POST["Text23"];
$Place=$_REQUEST["Text24"];
$Last_Year=$_REQUEST["Text25"];
$Valid=$_REQUEST["Text26"];
$Notes=$_REQUEST["Text27"];
$Guest_No=$_REQUEST["Text60"];
$Grade_Date="";
$Hire_date="";
$Social_Date="";
$end_date="";
$b_date="";

if(valid_date($_REQUEST["Text8"])) {
    $date1 = explode("/", $_REQUEST["Text8"]); // change date format
    $b_date = $date1[2] . "-" . $date1[1] . "-" . $date1[0];// change date format
    //$b_date= date("Y-m-d",strtotime($_POST[Text8]));// change date format
    $end_date = ((int)$date1[2] + 60) . "-12-31";

	//$len1=strlen($date1[2]);
	//echo" $_POST[Text8]<BR>$b_date<BR>$end_date";
}
if(valid_date($_REQUEST["Text13"])) {
    $date2 = explode("/", $_REQUEST["Text13"]); // change date format
    $Grade_Date = $date2[2] . "-" . $date2[1] . "-" . $date2[0];// change date format
    //$Grade_Date= date("Y-m-d",strtotime($_POST[Text13]));// change date format
}
if(valid_date($_REQUEST["Text20"])) {
    $date3 = explode("/", $_REQUEST["Text20"]); // change date format
    $Hire_date = $date3[2] . "-" . $date3[1] . "-" . $date3[0];// change date format
    //$Hire_date= date("Y-m-d",strtotime($_POST[Text20]));// change date format
}
if(valid_date($_REQUEST["Text23"])) {
    $date4 = explode("/", $_REQUEST["Text23"]); // change date format
    $Social_Date = $date4[2] . "-" . $date4[1] . "-" . $date4[0];// change date format
    //$Social_Date= date("Y-m-d",strtotime($_POST[Text23]));// change date format
}
	

$fin=mysqli_query($con,"UPDATE Basic_Reg SET 
Name='$Name',
b_date='$b_date',
gender='$gender',
b_place='$b_place',
Nationality='$Nationality',
Education='$Education',
Grade_Date='$Grade_Date',
Job='$Job',
Employer='$Employer',
Job_Tel='$Job_Tel',
Home_Tel='$Home_Tel',
Address='$Address',
Status='$Status',
Hire_date='$Hire_date',
Social_Type='$Social_Type',
Social_No='$Social_No',
Social_Date='$Social_Date',
Place='$Place',
Last_Year='$Last_Year',
Valid='$Valid',
Notes='$Notes',
Beach='$Beach',
Yacht='$Yacht',
Golf='$Golf',
Tennis='$Tennis',
Guest_No='$Guest_No',
End_date='$end_date',
Rowing='$Rowing',
upd_date= sysdate(),
upd_user = $session_user_id,
knighthood='$knighthood'
where (User_ID=$User_ID && Reg_Type=$Reg_Type &&  Employee=$Employee) ")or die(mysqli_error($con));


 // uploading files
if($_FILES["file"]["size"]>0) {

    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/bmp") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000)) {
        if ($_FILES["file"]["error"] > 0) {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br/>";
        } else {
            // create directory upload if not exsist ;
            $directory = "../";
            if (!file_exists($directory . "/" . "upload")) {
                mkdir($directory . "/" . "upload", 0777);
            }
            // End of

            if ($Reg_Type == 13 || $Reg_Type == 14 || $Reg_Type == 15 || $Reg_Type == 33 || $Reg_Type == 41 || $Reg_Type == 42) {

                if (file_exists("../Upload/" . $Curr_Year . "/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                    exit;
                } else {
                    $directory = "../Upload";
                    if (!file_exists($directory . "/" . $Curr_Year)) {
                        mkdir($directory . "/" . $Curr_Year, 0777);
                    }
                    move_uploaded_file($_FILES["file"]["tmp_name"], "../Upload/" . $Curr_Year . "/" . $_FILES["file"]["name"]);
                }
            } else {
                if (file_exists("../Upload/" . $_FILES["file"]["name"])) {
                    echo $_FILES["file"]["name"] . " already exists. ";
                    exit;
                } else {
                    move_uploaded_file($_FILES["file"]["tmp_name"], "../Upload/" . $_FILES["file"]["name"]);
                }
            }
        }
    } else {
        echo "Invalid file";
        exit ;
    }

    if (($_FILES["file"]["type"] == "image/gif")) {
        $type = ".gif";
    }

    if (($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/bmp")) {
        $type = ".jpg";
    }

//echo $type ."<br>";
//echo $_FILES["file"]["type"];
/////////////////////////////////////////////////////////////////////replace the file exist
    if ($Ser == 0) {
        $second_column = $User_ID . "_" . $Reg_Type . "_" . $Sec_Type . "_" . $Employee . $type;
    } else {
        $second_column = $User_ID . "_" . $Reg_Type . "_" . $Sec_Type . "_" . $Ser . "_" . $Employee . $type;
    }

    if ($Reg_Type == 13 || $Reg_Type == 14 || $Reg_Type == 15 || $Reg_Type == 33 || $Reg_Type == 41 || $Reg_Type == 42) {
        if (file_exists("../Upload/" . $Curr_Year . "/" . $_FILES["file"]["name"])) {
            try
            { unlink("../Upload/" . $Curr_Year . "/" . $second_column);
            }  catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }

            rename("../Upload/" . $Curr_Year . "/" . $_FILES["file"]["name"], "../Upload/" . $Curr_Year . "/" . $second_column);
        }
        $second_column = "../Upload/" . $Curr_Year . "/" . $second_column;
    } else {
        if (file_exists("../Upload/" . $_FILES["file"]["name"])) {
            try
            {
                unlink("../Upload/" . $second_column);
            }

            catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }

            rename("../Upload/" . $_FILES["file"]["name"], "../Upload/" . $second_column);
        }

        $second_column = "../Upload/" . $second_column;

    }
    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/bmp") || ($_FILES["file"]["type"] == "image/pjpeg")) && ($_FILES["file"]["size"] < 2000000)) {
        $sql = "UPDATE Basic_Reg SET image ='$second_column' where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Sec_Type='$Sec_Type'&&  Employee='$Employee')";
        $query1 = mysqli_query($con, $sql) or die(mysqli_error($con));
    }
}

mysqli_close($con);
redirect("Basic_Reg_View.php?user_id=$User_ID&employee=$Employee&reg_type=$Reg_Type");
?>
</FORM>
</BODY>
</HTML>
