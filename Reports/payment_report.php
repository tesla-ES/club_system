<?php include_once "../function.php" ;?>
<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>

<?php
$employee_type =asignValue($_REQUEST['employee_type'],false);
$operation_type =asignValue($_REQUEST['operation_type'],false);
$Membership_type =asignValue($_REQUEST['Membership_type'],false);
$payment_year =asignValue($_REQUEST['payment_year'],false);
$order_arrange =asignValue($_REQUEST['order_arrange'],false);
$payment_status=asignValue($_REQUEST['payment_status'],0);
$per_page=asignValue($_REQUEST['per_page'],30);

IF($operation_type){
           $result = mysqli_query($con,"SELECT Code,Name FROM reg_type where Code = $Membership_type ");
	       while($res=mysqli_fetch_array($result))
			{
			$Membership_type_name=$res["Name"];
			}
			
			if($employee_type ==99){
			$employee_type_name ='كل الانواع ' ;
			} else{
			$employee_name_res = mysqli_query($con,"SELECT Code,Name FROM employee_type where Code = $employee_type ");
	         while($ress2=mysqli_fetch_array($employee_name_res))
			   {$employee_type_name=$ress2["Name"];}
            }

            if($operation_type=='all'){
                $operation_type_name ='الكل ';
            } else{
                $operation_name_res = mysqli_query($con,"SELECT op_id,op_name FROM operation_type where op_id = $operation_type ");
                while($res2=mysqli_fetch_array($operation_name_res,MYSQLI_BOTH))
                {$operation_type_name=$res2["op_name"];}
            }
             $sql="SELECT code,name FROM payment_status where code = $payment_status";
            $payment_status_res = mysqli_query($con, $sql);
            while($res3=mysqli_fetch_array($payment_status_res,MYSQLI_BOTH))
            {$payment_status_name=$res3["name"];}

    ?>
<body>
<?php report_header();?>

<div class="top_head">
الايصالات المسدده عن عام
    <?=$payment_year?>
    <table   style="direction: rtl;width: 98%;border:solid 1px darkred"> <thead><tr>
   <td style="width: 14%">    نوع العضويه : </td><td  style="text-align: right;color:#ff0000 ;border-left: solid 1px darkred;background-color: #dedede" ><?=$Membership_type_name ?></td>
   <td style="width: 14%"> النوع :   </td><td  style="text-align: right;color:#ff0000 ;border-left: solid 1px darkred;background-color: #dedede"><?=$employee_type_name?></td>
   <td style="width: 14%">حاله المدفوعات :</td><td  style="text-align: right;color:#ff0000 ;border-left: solid 1px darkred;background-color: #dedede"><?=$payment_status_name ?></td>
   <td style="width: 14%">  نوع المدفوعات :  </td><td  style="text-align: right;color:#ff0000;background-color: #dedede"><?=$operation_type_name?></td>

</tr></thead>
</table>
</div>

<hr>
<!--<div class="nots"> ملحوظه -- الاعداد خاصه بايصالات اشتراكات العضويه -- قد يتم الدفع على اكثر من ايصال </div>-->

 <?php
  $Get_Count_sql="SELECT count(*) as record_count ,sum(payment.total) as total from basic_reg,payment where payment.status=$payment_status and payment.total >=0 ";
  if($employee_type !=99 ) {
      $Get_Count_sql .= "and  basic_reg.employee=$employee_type ";
  }
 if($operation_type !='all' ) {
     $Get_Count_sql .= " and operation=$operation_type  ";
 }

      $Get_Count_sql.="and basic_reg.reg_type=$Membership_type  and  basic_reg.user_id = payment.user_id and basic_reg.reg_type = payment.reg_type and basic_reg.employee= payment.employee and pay_year= $payment_year order by ";
if($order_arrange=="pay_Date"){
    $Get_Count_sql.="payment.";
}else{
    $Get_Count_sql.="basic_reg.";
}

$Get_Count_sql.= $order_arrange;

      $result_count = mysqli_query($con,$Get_Count_sql);
 if (mysqli_num_rows($result_count)>0) {
     while ($rows = mysqli_fetch_array($result_count, MYSQLI_BOTH)) {
         $record_count = $rows['record_count'];
         $Total_Sum = $rows['total'];
     }
 }  //$record_count=mysql_num_rows(mysql_query($Get_Count_sql));


 if($per_page=='all')
 {$per_page=$record_count;}
 $start=isset($_REQUEST["start"])?$_REQUEST["start"]:0;

$sql="SELECT basic_reg.User_ID,basic_reg.Employee,Name ,Receipt_No , payment.total as total ,case when basic_reg.Reg_Type in(13,15,33,41,42)  then basic_reg.notes  else '' end AS notesو,case when basic_reg.Reg_Type in(13,15,33,41,42)  then payment.exe_val  else '' end AS exe_val ,pay_Date from basic_reg,payment where payment.status=$payment_status and payment.total >=0 ";

 if($employee_type != 99 ){
 $sql.=" and basic_reg.employee=$employee_type";
   }

 if($operation_type !='all' ) {
     $sql .= " and operation=$operation_type  ";
 }

 $sql.=" and basic_reg.reg_type=$Membership_type  and  basic_reg.user_id = payment.user_id and basic_reg.reg_type = payment.reg_type and basic_reg.employee = payment.employee and pay_year= $payment_year order by " ;
if($order_arrange=="pay_Date"){
    $sql.="payment.";
}else{
    $sql.="basic_reg.";
}

 $sql.= $order_arrange. " LIMIT $start , $per_page ";


 $result = mysqli_query($con,$sql);
// to pass Division by zero error
 $per_page = @($per_page/1);
if(!$per_page) {
    $per_page = 1;
}
 // End to pass Division by zero error
 $max_pages=$record_count / $per_page;

 if($record_count==0)
 {$pop=1;}
 else{ $pop=$record_count+1;}
 $query = $result;

 if (($result)||(mysqli_errno($con) == 0))
{
    $i = 0;
  echo "<table  class='gridtable'  cols='9' width=90% ><thead><tr>";
 if (mysqli_num_rows($result)>0)
  {
          //loop throw the field names to print the correct headers

          while ($i <= mysqli_num_fields($result))
          {
            $headers[0]="م";
            $headers[1]=" رقم العضويه ";
            $headers[2]="النوع ";
            $headers[3]="الاسم ";
            $headers[4]="الايصال ";
            $headers[5]="المبلغ";
            $headers[6]="ملاحظات";
            $headers[7]="نسبه الخصم";
            $headers[8]="تاريخ الدفع";
            echo "<th>". $headers[$i] . "</th>";
            $i++;
    }
     echo "</tr></thead><tbody>";
    //display the data
$num_rows=$start;
      $sum_val=array(0,0,0,0,0,0,0,0,0);
    while ($rows = mysqli_fetch_array($result,MYSQLI_BOTH))
    {
    			if($num_rows & 1){
                      echo "<tr>";
      			}else{
                      echo "<tr>";
      			}
      			$num_rows++;
 	    $j=0;
		
		echo "<td> $num_rows </td>";
        foreach ($rows as $data)
          {
	          if($j<8){
				   $sum_val[$j]+=$rows[$j];
		           echo "<td>  $rows[$j]</td>";
	            }
	          $j++;
      }
    }
      echo "<tr>";
      echo "<th colspan='2'> إجماليات </th>  <th></th>  <th></th>  <th> إجمالى صفحه </th>  <th>$sum_val[4]</th> <th> كلى  </th> <th>$Total_Sum</th><th></th>";
      echo "</tr>";
      echo "</tbody></table>";
      writePage_pagination($start,$record_count,$per_page,"payment_report.php","&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&employee_type=$employee_type&operation_type=$operation_type&payment_status=$payment_status");

  }else{
    echo "<tr><td colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }
    echo"<div class='pagination'>";
    include "sign.php" ;
}else{
  echo "Error in running query :". mysqli_error($con);
}
 echo "</div>" ;
 }else{
    report_uncompleate_parameter();
 }
?>

 <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=90%>
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$myusername  ?></TH></TR>
 </Table>
 </body>
 
 
 