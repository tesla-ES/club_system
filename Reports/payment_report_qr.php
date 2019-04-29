<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="css/table_css.css">
</head>

<?php include_once "../function.php" ;
IF(!EMPTY($_REQUEST['operation_type'])){

$employee_type =$_REQUEST['employee_type'];
$operation_type =$_REQUEST['operation_type'];
$Membership_type =$_REQUEST['Membership_type'];
$payment_year =$_REQUEST['payment_year'];
$order_arrange =$_REQUEST['order_arrange'];

           $result = mysql_query("SELECT Code,Name FROM reg_type where Code = $Membership_type ");
	       while($res=mysql_fetch_array($result))
			{
			$Membership_type_name=$res[Name];
			}
			
			if($employee_type ==99){
			$employee_type_name ='كل الانواع ' ;
			} else{
			$employee_name_res = mysql_query("SELECT Code,Name FROM employee_type where Code = $employee_type ");
	         while($ress2=mysql_fetch_array($employee_name_res))
			   {$employee_type_name=$ress2[Name];}
            }

            if($operation_type=='all'){
                $operation_type_name ='الكل ';
            } else{
                $operation_name_res = mysql_query("SELECT op_id,op_name FROM operation_type where op_id = $operation_type ");
                while($res2=mysql_fetch_array($operation_name_res))
                {$operation_type_name=$res2[op_name];}
            }
    ?>
<body>
<?php report_header();?>

<div class="top_head">
الايصالات المسدده عن عام
    <?=$payment_year?>
<BR>  نوع العضويه : <?=$Membership_type_name ?>
<BR> النوع :   <?=$employee_type_name?>
<div class="nots">
    نوع المدفوعات :<?=$operation_type_name?>
    </div>
</div>

<!--<div class="nots"> ملحوظه -- الاعداد خاصه بايصالات اشتراكات العضويه -- قد يتم الدفع على اكثر من ايصال </div>-->
<hr>
 <?php
  $Get_Count_sql="SELECT count(*) as record_count ,sum(payment.total) as total from basic_reg,payment where  payment.total >=0 ";
  if($employee_type !=99 ) {
      $Get_Count_sql .= "and  basic_reg.employee=$employee_type ";
  }
 if($operation_type !='all' ) {
     $Get_Count_sql .= " and operation=$operation_type  ";
 }

      $Get_Count_sql.="and basic_reg.reg_type=$Membership_type  and  basic_reg.user_id = payment.user_id and basic_reg.reg_type = payment.reg_type and basic_reg.employee= payment.employee and pay_year= $payment_year order by basic_reg.$order_arrange";
      $result_count = mysql_query($Get_Count_sql);
 if (mysql_num_rows($result_count)>0) {
     while ($rows = mysql_fetch_array($result_count, MYSQL_ASSOC)) {
         $record_count = $rows['record_count'];
         $Total_Sum = $rows['total'];
     }
 }  //$record_count=mysql_num_rows(mysql_query($Get_Count_sql));

 if(!($per_page))
 {$per_page=30;}
 else if($per_page=='all')
 {$per_page=$record_count;}
if(!($start)) $start=0;

$sql="SELECT basic_reg.User_ID,basic_reg.Employee,Name ,Receipt_No , payment.total as total ,case when basic_reg.Reg_Type in(13,15,33,41,42)  then basic_reg.notes  else '' end AS notesو,case when basic_reg.Reg_Type in(13,15,33,41,42)  then payment.exe_val  else '' end AS exe_val ,0 from basic_reg,payment where payment.total >=0 ";

 if($employee_type != 99 ){
 $sql.=" and basic_reg.employee=$employee_type";
   }

 if($operation_type !='all' ) {
     $sql .= " and operation=$operation_type  ";
 }


 $sql.=" and basic_reg.reg_type=$Membership_type  and  basic_reg.user_id = payment.user_id and basic_reg.reg_type = payment.reg_type and basic_reg.employee = payment.employee and pay_year= $payment_year order by basic_reg.$order_arrange LIMIT $start , $per_page ";

 $result = mysql_query($sql);
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

 if (($result)||(mysql_errno == 0))
{
  echo "<table  class='gridtable'  cols='9' width=90% ><tr>";
 if (mysql_num_rows($result)>0)
  {
          //loop throw the field names to print the correct headers
          $i = 0;
          while ($i <= mysql_num_fields($result))
          {
            $headers[0]="م";
            $headers[1]=" رقم العضويه ";
            $headers[2]="النوع ";
            $headers[3]="الاسم ";
            $headers[4]="الايصال ";
            $headers[5]="المبلغ";
            $headers[6]="ملاحظات";
            $headers[7]="نسبه الخصم";
            $headers[8]="QR Code";
            echo "<th>". $headers[$i] . "</th>";
            $i++;
    }
     echo "</tr></thead><tbody>";
    //display the data
$num_rows=$start;
 
    while ($rows = mysql_fetch_array($result,MYSQL_NUM))
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
	            }elseif($j==7)
                  {
                    //  echo "<td> <img src='../QR/php/qr.php?d=$Membership_type-$rows[1] -$rows[0] &e=M&s=3&v=1' width='50px'></td>";
                      echo "<td> <img src='../QR/php/qr.php?e=L&s=4&v=4&size=200&d=http://Club_System/Reports/payment_report.php?id=$Membership_type-$rows[1]-$rows[0]' width='50px'></td>";
                  }
	          $j++;
      }
    }
      echo "<tr>";
      echo "<th colspan='2'> إجماليات </th>  <th></th>  <th></th>  <th> إجمالى صفحه </th>  <th>$sum_val[4]</th> <th> كلى  </th> <th>$Total_Sum</th>";
      echo "</tr>";

/////set up  previous& next vars
$prev=$start - $per_page;
$next=$start + $per_page;
$last_rec= floor($record_count/$per_page);
$last_rec=$last_rec*$per_page;
unset($data);
  }else{
    echo "<tr><td colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }
  echo "</tbody></table>";
    echo"<div class='pagination'>";
    include "sign.php" ;

    //show Next button
if(!($start>=$record_count-$per_page)){
	///////////getting the last page
    echo " <a href='payment_report.php?start=$last_rec&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&employee_type=$employee_type&operation_type=$operation_type'><img src='../img/lastpage.gif' alt='Last Page'></a>";
	//////getting the next page
    echo " <a href='payment_report.php?start=$next&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&employee_type=$employee_type&operation_type=$operation_type'><img src='../img/nextpage.gif' alt='Next Page'></a>";
}
  //show prev button
if(!($start<=0)){
/////////getting previous page
echo " <a href='payment_report.php?start=$prev&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&employee_type=$employee_type&operation_type=$operation_type'><img src='../img/backpage.gif' alt='Previous Page'></a>";
/////////////getting the first page
echo " <a href='payment_report.php?start=0&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&employee_type=$employee_type&operation_type=$operation_type'><img src='../img/first.gif' alt='First Page'></a>";
}

}else{
  echo "Error in running query :". mysql_error();
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
 
 
 