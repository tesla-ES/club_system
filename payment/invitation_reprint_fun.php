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

$User_ID = $_REQUEST["User_ID"];
$Pay_Year =$_REQUEST["Pay_Year"];
$employee = $_REQUEST["employee"];
$reg_type_code =$_REQUEST["reg_type_code"];
$Receipt_No =$_REQUEST["Receipt_No"];
$session_user =$_REQUEST["session_user"];
$notes =$_REQUEST["notes"];
if(!empty($User_ID)){
    $sql="update invit_print_log set reprint_user = $session_user , print= 0 , notes= '".$notes."' where id = $User_ID and type=$reg_type_code and year = $Pay_Year and receipt_no = $Receipt_No ";
    $update_card_printed = mysqli_query($con,$sql);

    if($update_card_printed){
        echo "تم تنشيط إعاده الطباعه";
    }

}