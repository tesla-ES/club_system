<?php include_once "../function.php" ;?>
<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>


<?php

$employee_type =isset($_REQUEST['employee_type'])?$_REQUEST['employee_type']:"";
$operation_type =isset($_REQUEST['operation_type'])?$_REQUEST['operation_type']:"";
$Membership_type =isset($_REQUEST['Membership_type'])?$_REQUEST['Membership_type']:"";
$payment_year =isset($_REQUEST['payment_year'])?$_REQUEST['payment_year']:"2019";
$order_arrange =isset($_REQUEST['order_arrange'])?$_REQUEST['order_arrange']:"";
$payment_status=isset($_REQUEST['payment_status'])?$_REQUEST['payment_status']:"";

$per_page=isset($_REQUEST['per_page'])?$_REQUEST['per_page']:30;

IF($operation_type){

      $result = mysqli_query($con,"SELECT Code,Name FROM reg_type where Code = $Membership_type ");
	  while($ress=mysqli_fetch_array($result))
			{
			$Membership_type_name=$ress["Name"];
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
              while($res2=mysqli_fetch_array($operation_name_res))
              {$operation_type_name=$res2["op_name"];}
          }

      $sql_11="SELECT code,name FROM payment_status where code in (0,3)" ;
      $payment_status_res = mysqli_query($con,$sql_11);

      while($res2=mysqli_fetch_array($payment_status_res))
      {$payment_status_name=$res2['name'];}
    ?>
<body>

<?php
report_header();
?>


<div class="top_head">
الاعضاء الذين سددوا الاشتراكات عن عام
    <?=$payment_year?>
    <table   style="direction: rtl;width: 90%;border:solid 1px darkred"> <thead><tr>
            <td style="width: 14%">    نوع العضويه : </td><td  style="text-align: right;color:#ff0000 ;border-left: solid 1px darkred;background-color: #dedede" ><?=$Membership_type_name ?></td>
            <td style="width: 14%"> النوع :   </td><td  style="text-align: right;color:#ff0000 ;border-left: solid 1px darkred;background-color: #dedede"><?=$employee_type_name?></td>
            <td style="width: 14%">حاله المدفوعات :</td><td  style="text-align: right;color:#ff0000 ;border-left: solid 1px darkred;background-color: #dedede"><?=$payment_status_name ?></td>
            <td style="width: 14%">  نوع المدفوعات :  </td><td  style="text-align: right;color:#ff0000;background-color: #dedede"><?=$operation_type_name?></td>

        </tr></thead>
    </table>
</div>
<hr>
 <?php

$Get_Count_sql="SELECT count(*) as record_count ,sum(total) as total from (select distinct User_ID ,employee,Reg_Type,sum(payment.total) as total   from payment where   payment.status in(0,3) and  Pay_Year =$payment_year  and payment.reg_type =$Membership_type  and total >=0";
  if($employee_type !=99 ){
      $Get_Count_sql.=" and employee=$employee_type " ;
  }

 if($operation_type !='all' ) {
     $Get_Count_sql .= " and operation=$operation_type  ";
 }

 $Get_Count_sql.=" group by User_ID,Reg_Type,employee ) nn ";
 $result_count = mysqli_query($con,$Get_Count_sql);

 if (mysqli_num_rows($result_count)>0) {
     while ($rows = mysqli_fetch_array($result_count, MYSQLI_BOTH)) {
         $record_count = $rows['record_count'];
         $Total_Sum = $rows['total'];
     }
 }

 if($per_page=='all')
 {$per_page=$record_count;}
 $start=asignValue($_REQUEST["start"],0);

$sql="SELECT basic_reg.User_ID,basic_reg.Employee,Name  , nn.total as total ,case when basic_reg.Reg_Type in(13,15,33,41,42)  then basic_reg.notes  else '' end AS notes,case when basic_reg.Reg_Type in(13,15,33,41,42)  then nn.exe_val  else '' end AS exe_val from basic_reg,( select distinct User_ID ,employee,Reg_Type,sum(exe_val) as exe_val ,sum(payment.total) as total ,pay_year from payment where  payment.status in (0,3) and Pay_Year =$payment_year  and payment.reg_type =$Membership_type and total >=0 ";

 if($employee_type !=99 ) {
     $sql .= "and payment.employee=$employee_type ";
 }
 if($operation_type !='all' ) {
     $sql .= " and operation=$operation_type  ";
 }

 $sql.=" group by User_ID ,Reg_Type,employee)nn where   basic_reg.user_id = nn.user_id and basic_reg.reg_type = nn.reg_type and basic_reg.employee= nn.employee  order by ";

 if($order_arrange=="pay_Date"){
     $order_arrange="User_id" ;
}else{
    $sql.="basic_reg.";
}
 $sql.= $order_arrange." LIMIT $start , $per_page ";

 $result = mysqli_query($con,$sql);
 // to pass Division by zero error
 $per_page = @($per_page/1);
 if(!$per_page) {
     $per_page = 1;
 }

 $max_pages=$record_count / $per_page;
 if($record_count==0)
 {$pop=1;}
 else{ $pop=$record_count+1;}
 $query = $result;

 if (($result)||(mysqli_errno($con) == 0))
{
    $i = 0;
  echo "<table  class='gridtable'  cols='9' width=90% ><tr>";
 if (mysqli_num_rows($result)>0)
  {
          while ($i <= mysqli_num_fields($result))
          {
            $headers[0]="م";
            $headers[1]=" رقم العضويه ";
            $headers[2]="النوع ";
            $headers[3]="الاسم ";
            $headers[4]="المبلغ";
            $headers[5]="ملاحظات";
            $headers[6]="نسبه الخصم";
            echo "<th>". $headers[$i] . "</th>";
            $i++;
    }
     echo "</tr></thead><tbody>";
    //display the data
$num_rows=$start;
      $sum_val=array(0,0,0,0,0,0,0);
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
	          if($j<6){
				   $sum_val[$j]+=$rows[$j];
		           echo "<td>  $rows[$j]</td>";
	            }
	          $j++;
      }
    }
      echo "<tr>";
      echo "<th colspan='2'> إجماليات </th>  <th></th>    <th> إجمالى صفحه </th>  <th>$sum_val[3]</th> <th> كلى  </th> <th>$Total_Sum</th>";
      echo "</tr>";
      echo "</tbody></table>";
      writePage_pagination($start,$record_count,$per_page,"payment_report_amount.php","&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&employee_type=$employee_type&operation_type=$operation_type");

  }else{
    echo "<tr><td colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }

    echo"<div class='pagination'>";
    include "sign.php" ;

}else{
     echo $sql;
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
 