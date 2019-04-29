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
        include_once '../menu.php';write_menu('Payment');

        ?>
 

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<br>
<div class='content_center'>
<?PHP


 $Status=isset($_REQUEST["status"])?$_REQUEST["status"]:2;

$from_date=isset($_REQUEST["from_date"])?$_REQUEST["from_date"]:"";
$to_date=isset($_REQUEST["to_date"])?$_REQUEST["to_date"]:"";
$operation_type=isset($_REQUEST["operation_type"])?$_REQUEST["operation_type"]:"all" ;
$start=isset($_REQUEST["start"])?$_REQUEST["start"]:0;

$Status_name="";
switch ($Status) {
    case 0:
        $Status_name="أذون السداد المدفوعه ";
        break;
    case 1:
        $Status_name="أذون السداد المسترده ";
        break;
    case 2:
        $Status_name="إخطارات  السداد  ";
        break;
    case 3:
        $Status_name="كارنيهات تم طباعتها ";
        break;
}

$status_pri_sql="select * from user_pri where user_id=$session_user_id and pri_code =(select pri_code from privlege where pri_name ='status=".$Status."')" ;

if(mysqli_num_rows(mysqli_query($con,$status_pri_sql))==1) {
    $fin = mysqli_query($con,"select * from Payment where pay_year= $Curr_Year and status =$Status");
    $n_res = mysqli_num_rows($fin);
    if ($n_res == 0) {
        $pop = 1;
    } else {
        $pop = $n_res + 1;
    }
    $query = $fin;
    $per_page = 50;

    $record_count = mysqli_num_rows($query);
    $max_pages = $record_count / $per_page;

    $show_all_user_doing_sql = "select * from user_pri where user_id=$session_user_id and pri_code =(select pri_code from privlege where pri_name ='show_all_user_doing')";
    $show_all_user_doing_count = mysqli_num_rows(mysqli_query($con,$show_all_user_doing_sql));


    $sql = "SELECT User_ID,reg_type,employee,Pay_Year,Receipt_No,(select op_name from operation_type where op_id = Operation)as Operation ,(SELECT name from payment_status where code = status) as payment_name ,Pay_Date FROM Payment  as p where pay_year= $Curr_Year and status =$Status";
    if ($show_all_user_doing_count == 0) {
        $sql .= " and ins_user = $session_user_id";
    }

if($Status==3){
    if((!isset($_REQUEST["from_date"])) &&(!isset($_REQUEST["to_date"])))
    {$sql.=" and (user_id,reg_type,Pay_Year,Receipt_No) in (select id,type,year,receipt_no from printer_log where print_date between '$from_date' and '$to_date' ) ";  }
}else{
    if((isset($_REQUEST["from_date"])) &&(isset($_REQUEST["to_date"]))){
        $sql.=" and pay_date between '$from_date' and '$to_date' ";
    }
}

if(($operation_type !='all')&&($operation_type!="for_print")) {
    $sql .= " and operation=$operation_type  ";
}elseif($operation_type=="for_print"){
    $sql .= " and operation in(0,1,2,3,5) ";
}

if($Status==0)
{
    $sql .=" ";
    //$sql .= " and Holder_No IS NOT NULL AND Holder_No in(SELECT Holder_No FROM holder WHERE Cheque_No IS NOT NULL ) ";
}

    $sql .= " ORDER BY Pay_Year desc, Receipt_No desc LIMIT $start , $per_page";

    $result = mysqli_query($con,$sql);

    if (($result) || (mysqli_errno($con) == 0)) {
       ?>
     <table width='100%' class='gridtable' ><thead>
     <tr><th colspan='8' style='text-align: center;color: #004488'>
 تقرير
             <?php
             echo $Status_name;
             if(!empty($from_date)) {
                 ?>
                 خلال الفتره من  <?php echo $from_date ?>  الى
                 <?php
                 echo $to_date;
             }
             ?>
         </th>
        <tr>
    <?php
    $i = 0;
        if (mysqli_num_rows($result) > 0) {
            //loop thru the field names to print the correct headers

            while ($i < mysqli_num_fields($result)) {

                $headers[0] = "رقم العضوية";
                $headers[1] = "نوع العضوية";
                $headers[2] = "النوع";
                $headers[3] = "سنة المحاسبة";
                $headers[4] = "رقم الإيصال";
                $headers[5] = "نوع العمليه";
                $headers[6] = "نوع الايصال ";
                $headers[7] = "تاريخ الايصال ";

                echo "<th ALIGN=CENTER>" . $headers[$i] . "</th>";

                $i++;
            }

            echo "</tr></thead>";

            //display the data
            $num_rows = 1;
            while ($rows = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                if ($num_rows & 1) {
                    echo "<tr>";
                } else {
                    echo "<tr>";
                }
                $num_rows++;
                $j = 0;

                foreach ($rows as $data) {
                    if ($j < 8) {

                        echo "<td ALIGN=RIGHT><a href='Payment_View.php?id={$rows[0]}&type={$rows[1]}&year={$rows[3]}&receipt_no={$rows[4]}&employee={$rows[2]}' target='_blank'> $rows[$j]</td>";
                    }
                    $j++;
                }
            }

            echo "</table> ";
            writePage_pagination($start,$record_count,$per_page,"Payment_List.php","&status=$Status&from_date=".$from_date."&to_date=".$to_date);

        } else {
            echo "<tr><td ALIGN=CENTER colspan='" . ($i + 1) . "'>لا يوجد نتائج !</td></tr>";
        }


    } else {
        echo "Error in running query :" . mysqli_error($con);
    }
}else {
    redirect("../login/validation_error.php ",false);
}
?>
</div>
</BODY>

</HTML>