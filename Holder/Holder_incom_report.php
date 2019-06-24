<?php
$page_name=basename(__FILE__);
include_once '../function.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>
<?php


$h_month=asignValue($_REQUEST["h_month"],date("m"));
$h_year=asignValue($_REQUEST["h_year"],$Curr_Year);
?>
<body>
<BR><H4 align="right"  >هيئة قناة السويس &nbsp&nbsp&nbsp&nbsp<BR>النادى العام &nbsp&nbsp&nbsp&nbsp<BR>شئون العضويه &nbsp&nbsp&nbsp&nbsp<BR>
<Center><H4>تقرير ايرادات عضويه النادى العام  شهر     <?=$h_month ?> سنه   <?=$h_year?> <BR>
<table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="2" width=90%>
 <tbody align="right">
 <TR> <TD><?echo $h_year ?>:  سنه </TD><TD align="right"><?echo $h_month ?>:  شهر </TD></TR>
 <TBody></Table>
 <?php
/*
$fin=mysql_query("select Receipt_No,Pay_Date ,Total  from Payment where Holder_No='$pop0' && Holder_Date='$pop5'");
$n_res=mysql_num_rows($fin);
if($n_res==0)
{
$pop=1;
}
else
{
$pop=$n_res+1;
}
$query = $fin;
*/
//case when payment.Invitation  IS NOT NULL  then registeration.invitation else 0 end invitation,
//case when payment.Car IS NOT NULL then registeration.car else 0 end car,
$per_page=30;
if(empty($start)){$start=0;}
//$record_count=mysql_num_rows($query);
//$max_pages=$record_count / $per_page;

 $sql="select  Holder_No,holder_date,sum(t1) t1 ,sum(t2) t2 ,sum(t3) t3 ,sum(t4) t4, sum(t5) t5, sum(car) car,sum(invitation) invitation,sum(Total) Total,Cheque_No,Cheque_Date
FROM ( SELECT
case when  payment.Reg_Type in (1,20,23) then Sum(payment.Total)  else 0 end t1,
case when  payment.Reg_Type in(5) then Sum(payment.Total)  else 0 end AS t2,
case when  payment.Reg_Type in(3,7) then Sum(payment.Total)  else 0 end AS t3,
case when  payment.Reg_Type in(2,37,24,40,15,13,41,42,43,22,33,36,39)  then Sum(payment.Total)  else 0 end AS t4,
case when  payment.Reg_Type in(16)  then Sum(payment.Total)  else 0 end AS t5,


case when payment.Car_no =1 then registeration.car when payment.Car_no =2 then registeration.car2 else 0 end car,
case when payment.Invitation  =1  then registeration.invitation when payment.Invitation =2  then registeration.invitation2 else 0 end invitation,

sum(payment.Total) as Total,holder.Holder_No,holder.holder_date,holder.Cheque_Date,holder.Cheque_No
FROM holder
Inner Join payment ON holder.Holder_No = payment.Holder_No AND holder.holder_date = payment.Holder_Date
Inner Join reg_type ON payment.Reg_Type = reg_type.Code
Inner Join registeration ON payment.Reg_Type = registeration.Ser
where MONTH(payment.Holder_Date) in($h_month)  and  year(payment.Holder_Date) =$h_year
group by holder.Holder_No,payment.Reg_Type, reg_type.name,holder.Cheque_Date,holder.Cheque_No
) sum_query

group by Holder_No ,holder_date,Cheque_Date,Cheque_No LIMIT $start , $per_page";

 $result = mysqli_query($con,$sql);
 $record_count=mysqli_num_rows($result);
 $max_pages=$record_count / $per_page;
 if($record_count==0)
 {$pop=1;}
 else{ $pop=$record_count+1;}
 $query = $result;

 if (($result))
{
  echo "<center><table BORDER=1 RULES=none frame='hsides' cellspacing='1' cellpadding='1' cols='9' width=90% dir =rtl> <tbody align='center'><tr BGCOLOR='#7b7b7b'>";
    $i = 0;
    if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i <= mysqli_num_fields($result))
          {

	$headers[0]="م";
	$headers[1]=" الحافظه ";
	$headers[2]="بتاريخ";	
	$headers[3]="عضوية عاملة";
	$headers[4]="خ أعباء";
	$headers[5]="معاشات";
	$headers[6]="منتسبه + أخرى";
	$headers[7]="مؤقته";
	$headers[8]="إستيكر";
	$headers[9]="دعوات";
	$headers[10]="مبلغ";
	$headers[11]="ايصال بنك";
    $headers[12]="تاريخ الايداع";
         echo "<th  ALIGN=CENTER ><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";
       $i++;
    }
    echo "</tr>";

    //display the data
$num_rows=0;
      $sum_val=array(0,0,0,0,0,0,0,0,0,0,0,0,0);
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
	          if($j<12){
				   $sum_val[$j]+=$rows[$j];
		           echo "<td ALIGN=center  > <FONT color='#000000'> $rows[$j]</td>";  
	            }
	          $j++;
      }
    }
	  echo "<tr ALIGN=center BGCOLOR='#c4c4c4' FONT color='#000000'>";
	   echo "<td colspan=3>الاجمالى </td> <td> $sum_val[2]</td> <td> $sum_val[3]</td> <td> $sum_val[4]</td> <td> $sum_val[5]</td><td> $sum_val[6]</td> <td> $sum_val[7]</td> <td> $sum_val[8]</td> <td> $sum_val[9]</td><td></td> <td> </td>";
	 echo "</tr>";

      echo "</table>";
      writePage_pagination($start,$record_count,$per_page,"Holder_incom_report.php","&h_month=$h_month&h_year=$h_year");


  }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }


}else{
  echo "Error in running query :". mysqli_error($con);
}

?>
 <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=80%>  
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$session_user_id  ?></TH></TR>
 </Table>
 
 
 
 