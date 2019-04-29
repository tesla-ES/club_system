<?php
    include_once '../function.php';

    $id = $_REQUEST['id'];
    $type = $_REQUEST['type'];
    $year = $_REQUEST['year'];
    $receipt_no = $_REQUEST['receipt_no'];
    $employee = $_REQUEST['employee'];
    $print_user_id= $_REQUEST['session_user'];
	$Operation= $_REQUEST['operation'];


$card_printed_res=mysqli_query($con,"select * from printer_log where id = $id and type=$type and year= $year and receipt_no=$receipt_no");
$card_printed=mysqli_num_rows($card_printed_res);

mysqli_query($con,"update payment set status=3 where User_ID = $id and Reg_Type=$type and Pay_Year = $year and Receipt_No =$receipt_no ");
if($Operation ==0 || $Operation==8){
		mysqli_query($con,"update secondary_reg set new_flag=0 where User_ID = $id and Reg_Type=$type and employee=$employee");
		mysqli_query($con,"update wife_reg set new_flag=0 where User_ID = $id and Reg_Type=$type and employee=$employee");
}
if($card_printed>0){
   $update_card_printed=mysqli_query($con,"update printer_log set print_date = '".date('Y/m/d')."' , print_time = '".date('h:i:sa')."' ,  print_user_id = $print_user_id ,print=1 , print_count = print_count+1 where id = $id and type=$type and year = $year and receipt_no =$receipt_no ");
    $Count=mysqli_num_rows($update_card_printed);
}else {
    $Count=mysqli_query($con,"insert into printer_log(id,type,year,receipt_no,employee,print_date,print_time,print_user_id,print) VALUES ($id,$type,$year,$receipt_no,$employee,'".date('Y/m/d')."','".date('h:i:sa')."',$print_user_id,1)");
    $Count=mysqli_num_rows($con,$Count);
}
?>