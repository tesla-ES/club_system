<?php
    include_once '../function.php';

    $id = $_POST['id'];
    $type = $_POST['type'];
    $year = $_POST['year'];
    $receipt_no = $_POST['receipt_no'];
    $employee = $_POST['employee'];
    $print_user_id= $_POST['session_user'];


$invitation_printed_res=mysqli_query($con,"select * from invit_print_log where id = $id and type=$type and year= $year and receipt_no=$receipt_no");
$invitation_printed=mysqli_num_rows($invitation_printed_res);

mysqli_query($con,"update payment set status=3 where User_ID = $id and Reg_Type=$type and Pay_Year = $year and Receipt_No =$receipt_no ");

if($invitation_printed>0){
   $update_invitation_printed=mysqli_query($con,"update invit_print_log set print_date = '".date('Y/m/d')."' , print_time = '".date('h:i:sa')."' ,  print_user_id = $print_user_id ,print=1 , print_count = print_count+1 where id = $id and type=$type and year = $year and receipt_no =$receipt_no ");
    $Count=mysqli_num_rows($update_invitation_printed);
}else {
    $Count=mysqli_query($con,"insert into invit_print_log(id,type,year,receipt_no,employee,print_date,print_time,print_user_id,print) VALUES ($id,$type,$year,$receipt_no,$employee,'".date('Y/m/d')."','".date('h:i:sa')."',$print_user_id,1)");
    $Count=mysqli_num_rows($Count);
}



?>