  <?php include_once "../function.php" ;?>

<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="css/table_css.css">
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

    ?>
<body>

<?php
report_header();
?>

<div class="top_head">
بيان بالاقساط الغير مسدده
   <?=$payment_year?>
<BR>  نوع العضويه : <?=$Membership_type_name ?>
</div>
<hr>
 <?php

$Get_Count_sql="select count(*) as record_count from (
select user_id,reg_type,employee,total as qist_1 , pay_date as  qist_1_date ,0 as qist_2, DATE_ADD(pay_date, INTERVAL 6 MONTH)    as  qist_2_date
from payment
where operation=5 and pay_year = year (current_date)  and reg_type in(2,36,43) and  ( user_id,reg_type,employee ) not in (select  user_id,reg_type,employee from payment where operation=6 and pay_year=year (current_date) )
order by qist_1_date
) mm ";

  if($employee_type !=99 ){
   //   $Get_Count_sql.=" and employee=$employee_type " ;
  }

 //$Get_Count_sql.=" group by User_ID,Reg_Type,employee ) nn ";
 $result_count = mysqli_query($con,$Get_Count_sql);

 if (mysqli_num_rows($result_count)>0) {
     while ($rows = mysqli_fetch_array($result_count, MYSQLI_BOTH)) {
         $record_count = $rows['record_count'];

     }
 }
 if($per_page=='all')
 {$per_page=$record_count;}
 $start=isset($_REQUEST["start"])? $_REQUEST["start"]:0 ;

$sql="select user_id,reg_type,employee,total as qist_1 , pay_date as  qist_1_date ,0 as qist_2, DATE_ADD(pay_date, INTERVAL 6 MONTH)    as  qist_2_date
from payment
where operation=5 and pay_year = year (current_date)    and reg_type in(2,36,43) and ( user_id,reg_type,employee ) not in (select  user_id,reg_type,employee from payment where operation=6 and pay_year=year (current_date) )
order by qist_1_date ";

 if($employee_type !=99 ) {
   //  $sql .= "and payment.employee=$employee_type ";
 }
 if($operation_type !='all' ) {
    // $sql .= " and operation=$operation_type  ";
 }

 // $sql.=" group by User_ID ,Reg_Type,employee)nn where   basic_reg.user_id = nn.user_id and basic_reg.reg_type = nn.reg_type and basic_reg.employee= nn.employee  order by basic_reg.$order_arrange LIMIT $start , $per_page ";
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
  echo "<table  class='gridtable'  cols='9' width=90% ><tr>";
 if (mysqli_num_rows($result)>0)
  {
          //loop throw the field names to print the correct headers

          while ($i <= mysqli_num_fields($result))
          {
            $headers[0]="م";
            $headers[1]=" رقم العضويه ";
            $headers[2]="النوع ";
            $headers[3]="الاسم ";
            $headers[4]="قسط اول ";
            $headers[5]="تاريخ ق  اول";
            $headers[6]="قسط ثانى";
            $headers[7]="تاريخ الاستحقاق";
            echo "<th>". $headers[$i] . "</th>";
            $i++;
    }
     echo "</tr></thead><tbody>";
    //display the data
    $num_rows=$start;
    $sum_val=array(0,0,0,0,0,0,0,0);
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
	          if($j<7){
				   $sum_val[$j]+=$rows[$j];
		           echo "<td>  $rows[$j]</td>";
	            }
	          $j++;
      }
    }
      echo "<tr>";
      echo "<th colspan='3'> إجماليات </th>  <th></th>     <th>$Total_qist_1</th> <th></th>  <th>$Total_qist_2</th><th></th>";
      echo "</tr>";
      echo "</tbody></table>";
      writePage_pagination($start,$record_count,$per_page,"payment_latency.php","&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&employee_type=$employee_type");
      echo"<div class='pagination'>";
      include "sign.php" ;


  }else{
    echo "<tr><td colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }


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
 