<?php include_once "../function.php" ;?>

<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
    <script src="../js/functions.js" type="text/javascript"> </script>
</head>
<?php
$Membership_type=isset($_REQUEST["Membership_type"])?$_REQUEST["Membership_type"]:"";
$order_arrange=isset($_REQUEST["order_arrange"])?$_REQUEST["order_arrange"]:"";
$payment_year=isset($_REQUEST["payment_year"])?$_REQUEST["payment_year"]:"";
$year_count=isset($_REQUEST["year_count"])?$_REQUEST["year_count"]:"";
$per_page=isset($_REQUEST["per_page"])?$_REQUEST["per_page"]:30;
$start=isset($_REQUEST["start"])?$_REQUEST["start"]:0;

$result = mysqli_query($con,"SELECT Code,Name FROM reg_type where Code = $Membership_type ");
	while($ress=mysqli_fetch_array($result))
			{
			$Membership_type_name=$ress["Name"];
			}
    ?>
<body> 
<BR><H4 align="right"  >هيئة قناة السويس &nbsp&nbsp&nbsp&nbsp<BR>النادى العام &nbsp&nbsp&nbsp&nbsp<BR>شئون العضويه &nbsp&nbsp&nbsp&nbsp<BR>


<Center><H4> الاعضاء الذين لم يسددوا الاشتراكات منذ <?=$year_count?> سنوات   حتى عام  <?=$payment_year?><BR>  نوع العضويه : <?=$Membership_type_name ?>
<hr>
 <?php

  $sql2="select user_id,name,max(Pay_Year) as pay_year,op_name from (  select basic_reg.user_id ,basic_reg.reg_type,basic_reg.name ,payment.Pay_Year,payment.Operation from basic_reg,payment where basic_reg.reg_type=$Membership_type  and basic_reg.user_id=payment.user_id and basic_reg.reg_type=payment.reg_type and basic_reg.Employee=payment.Employee and   payment.Operation in(0,5,6,7) and (basic_reg.user_id,basic_reg.reg_type,basic_reg.employee) not in (select user_id,reg_type,employee from payment where payment.Pay_Year between $payment_year-$year_count and $payment_year and  payment.Operation in(0,5,6,7)) ) as ff, operation_type where operation_type.op_id = Operation group by user_id,reg_type,name order by pay_year desc ,$order_arrange "; 
        
  $record_count=mysqli_num_rows(mysqli_query($con,$sql2));
  
   if($per_page=='all')
 {
     $per_page=$record_count;
 }

 $sql="select user_id,name,max(Pay_Year) as pay_year,op_name from (
select basic_reg.user_id ,basic_reg.reg_type,basic_reg.name ,payment.Pay_Year,payment.Operation   from basic_reg,payment where basic_reg.reg_type=$Membership_type
and basic_reg.user_id=payment.user_id and basic_reg.reg_type=payment.reg_type and basic_reg.Employee=payment.Employee and   payment.Operation in(0,5,6,7) and
 (basic_reg.user_id,basic_reg.reg_type,basic_reg.employee) not in (select user_id,reg_type,employee from payment where payment.Pay_Year between $payment_year-$year_count and $payment_year and  payment.Operation in(0,5,6,7)  )
) as ff,operation_type
where operation_type.op_id=Operation
group by user_id,reg_type,name 
order by pay_year desc ,$order_arrange LIMIT $start , $per_page ";

 $result = mysqli_query($con,$sql);

 $max_pages=$record_count / $per_page;
 if($record_count==0)
 {$pop=1;}
 else{ $pop=$record_count+1;}
 $query = $result;

 if (($result)||(mysqli_errno($con) == 0))
{
  echo "<center><table  cellspacing='1' cellpadding='1' cols='9' width=90% dir =rtl> <thead align='center'><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers
          $i = 0;
          while ($i <= mysqli_num_fields($result))
          {

	$headers[0]="م";
	$headers[1]=" رقم العضويه ";
	$headers[2]="الاسم ";
	
	$headers[3]="أخر سنه سداد ";
	$headers[4]="نوع آخر عمليه";

         echo "<th  ALIGN=CENTER ><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";
       $i++;
    }


    echo "</tr></thead><tbody>";

    //display the data
$num_rows=$start;
      $sum_val=array(0,0,0,0,0);
    while ($rows = mysqli_fetch_array($result,MYSQLI_BOTH))
    {
    			if($num_rows & 1){
                      echo "<tr BGCOLOR='#c4c4c4'>";
      			}else{
                      echo "<tr BGCOLOR='#ffffff'>";			
      			}
      			$num_rows++;
 	    $j=0;
		
		echo "<td ALIGN=center > <FONT color='#000000'> $num_rows </td>";
        foreach ($rows as $data)
          {
	          if($j<4){
				   $sum_val[$j]+=$rows[$j];
		           echo "<td ALIGN=center  > <FONT color='#000000'> $rows[$j]</td>";  
	            }
	          $j++;
      }
    }

      echo "</tbody></table>";
      writePage_pagination($start,$record_count,$per_page,"latancy_report.php","&Membership_type=$Membership_type&per_page=$per_page&payment_year=$payment_year&order_arrange=$order_arrange&year_count=$year_count");


  }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }


}else{
  echo "Error in running query :". mysqli_error($con);
}

?>
 <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=80%>  
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$myusername  ?></TH></TR>
 </Table>
 
 
 
 