<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="css/table_css.css">
</head>

      <? include_once "../function.php" ;

    $result = mysql_query("SELECT Code,Name FROM reg_type where Code = $Membership_type ");
	while($ress=mysql_fetch_array($result))
			{
			$Membership_type_name=$ress[Name];
			}
			
			if($employee_type ==99){
			$employee_type_name ='كل الانواع ' ;
			} else{
			$employee_name_res = mysql_query("SELECT Code,Name FROM employee_type where Code = $employee_type ");
	while($ress2=mysql_fetch_array($employee_name_res))
			{
		
			$employee_type_name=$ress2[Name];
			}}
    ?>
<body>
<?php report_header();?>

<div class="top_head"> الاعضاء الذين سددوا الاشتراكات عن عام <?=$payment_year?>
<BR>  نوع العضويه : <?=$Membership_type_name ?>
<BR> النوع :   <?=$employee_type_name?>
</div>
<div class="nots"> ملحوظه -- التقرير خاص بكل الايصالات الصادره -- العدد فى التقرير هو عدد الايصالات 
</div>
<hr>
 <?php

  if($employee_type ==99 ){
   $Get_Count_sql="SELECT count(*) as record_count ,sum(payment.total) as total from basic_reg,payment where payment.total >0 and  basic_reg.reg_type=$Membership_type  and  basic_reg.user_id = payment.user_id and basic_reg.reg_type = payment.reg_type and basic_reg.employee= payment.employee and pay_year= $payment_year order by basic_reg.$order_arrange";
  } 
  else{
   $Get_Count_sql="SELECT count(*) as record_count ,sum(payment.total) as total from basic_reg,payment where payment.total >0 and  basic_reg.employee=$employee_type  and basic_reg.reg_type=$Membership_type  and  basic_reg.user_id = payment.user_id and basic_reg.reg_type = payment.reg_type and basic_reg.employee= payment.employee and pay_year= $payment_year order by basic_reg.$order_arrange";
  }

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
 {$per_page=$record_count;
 }
 
if(!($start)) $start=0;


 if($employee_type ==99 ){
 $sql="SELECT basic_reg.User_ID,basic_reg.Employee,Name ,Receipt_No , payment.total as total ,case when basic_reg.Reg_Type in(13,15,33,41,42)  then basic_reg.notes  else '' end AS notesو,case when basic_reg.Reg_Type in(13,15,33,41,42)  then payment.exe_val  else '' end AS exe_val from basic_reg,payment where payment.total >0 and  basic_reg.reg_type=$Membership_type  and  basic_reg.user_id = payment.user_id and basic_reg.reg_type = payment.reg_type and basic_reg.employee= payment.employee and pay_year= $payment_year order by basic_reg.$order_arrange LIMIT $start , $per_page ";
 
  } 
  else{
 $sql="SELECT basic_reg.User_ID,basic_reg.Employee,Name ,Receipt_No , payment.total as total,case when basic_reg.Reg_Type in(13,15,33,41,42)  then basic_reg.notes  else '' end AS notesو,case when basic_reg.Reg_Type in(13,15,33,41,42)  then payment.exe_val  else '' end AS exe_val from basic_reg,payment where  payment.total >0 and  basic_reg.employee=$employee_type  and basic_reg.reg_type=$Membership_type  and  basic_reg.user_id = payment.user_id and basic_reg.reg_type = payment.reg_type and basic_reg.employee= payment.employee and pay_year= $payment_year order by basic_reg.$order_arrange LIMIT $start , $per_page ";

 } 

 $result = mysql_query($sql);

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
	          if($j<8){
				   $sum_val[$j]+=$rows[$j];
		           echo "<td>  $rows[$j]</td>";
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
    echo " <a href='payment_report.php?start=$last_rec&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&employee_type=$employee_type'><img src='../img/lastpage.gif' alt='Last Page'></a>";
	//////getting the next page
    echo " <a href='payment_report.php?start=$next&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&employee_type=$employee_type'><img src='../img/nextpage.gif' alt='Next Page'></a>";

}
  //show prev button
if(!($start<=0)){
/////////getting previous page
echo " <a href='payment_report.php?start=$prev&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&employee_type=$employee_type'><img src='../img/backpage.gif' alt='Previous Page'></a>";
/////////////getting the first page
echo " <a href='payment_report.php?start=0&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&employee_type=$employee_type'><img src='../img/first.gif' alt='First Page'></a>";
}

}else{
  echo "Error in running query :". mysql_error();
}

?>
    </div>
 <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=90%>
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$myusername  ?></TH></TR>
 </Table>
</body>
 
 
 