<?php
    include_once '../function.php';

    $id = $_POST['User_ID'];
    $type = $_POST['reg_type_code'];
    $year = $_POST['Pay_Year'];
    $receipt_no = $_POST['Receipt_No'];
    $employee = $_POST['employee'];
    $print_user_id= $_POST['session_user'];

$card_printed_log_res=mysqli_query($con,"select * from card_printer_log where id = $id and type=$type and year= $year and receipt_no=$receipt_no");
$card_printed_log=mysqli_num_rows($card_printed_log_res);
echo"hello $card_printed_log";
mysqli_query($con,"update payment set status=3 where User_ID = $id and Reg_Type=$type and Pay_Year = $year and Receipt_No =$receipt_no ");
if($card_printed_log>0){
   $update_card_printed=mysqli_query($con,"update card_printer_log set print_date = '".date('Y/m/d')."' , print_time = '".date('h:i:sa')."' ,  print_user_id = $print_user_id ,print=1 , print_count = print_count+1 where id = $id and type=$type and year = $year and receipt_no =$receipt_no ");
    $Count=mysqli_num_rows($update_card_printed);
}else {
    $Count=mysqli_query($con,"insert into card_printer_log(id,type,year,receipt_no,employee,print_date,print_time,print_user_id,print) VALUES ($id,$type,$year,$receipt_no,$employee,'".date('Y/m/d')."','".date('h:i:sa')."',$print_user_id,1)");
    $Count=mysqli_num_rows($Count);
}
?>
<script type="text/javascript">window.close();</script>

