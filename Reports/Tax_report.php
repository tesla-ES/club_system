<?php
include_once '../function.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>

<?php

    $h_month = isset($_REQUEST["h_month"])? $_REQUEST["h_month"]: date("m");
    $h_year = isset($_REQUEST["h_year"])?$_REQUEST["h_year"] : $Curr_Year;
    $per_page = 30;
    $start=isset($_REQUEST["start"])?$_REQUEST["start"]: 0 ;

?>
<body>
<BR><H4 align="right"  >هيئة قناة السويس &nbsp&nbsp&nbsp&nbsp<BR>النادى العام &nbsp&nbsp&nbsp&nbsp<BR>شئون العضويه &nbsp&nbsp&nbsp&nbsp<BR>
<Center><H4>تقرير ضرائب ايرادات عضويه النادى العام  شهر     <?php echo  $h_month ?> سنه   <?=$h_year?> <BR>
<table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="2" width=90%>
 <tbody align="right">
 <TR> <TD><?php echo $h_year ?>:  سنه </TD><TD align="right"><?php echo $h_month ?>:  شهر </TD></TR>
 <TBody></Table>

 <?php
$sql="SELECT
Sum(payment.Total) AS Total,
Sum((payment.Over_Num+1)*3) AS Tax
FROM
payment ,
holder
WHERE
payment.Pay_Year =  year(current_date) AND
payment.Reg_Type IN  ('2,7,34,36,43') AND
payment.Holder_No IS NOT NULL  AND
payment.Operation =  '0' AND
payment.Holder_No =  holder.Holder_No ";
if($h_year<>""){$sql= $sql . "AND Year(holder.holder_date) =  '$h_year' ";}
if($h_month<>""){$sql=$sql . "AND Month(holder.holder_date) =  '$h_month'";}
$sql =$sql . "GROUP BY
month(holder.holder_date)
ORDER BY
payment.Holder_No ASC
LIMIT $start , $per_page";

 $result = mysqli_query($con,$sql);
 $record_count=mysqli_num_rows($result);
 $max_pages=$record_count / $per_page;
 if($record_count==0)
 {$pop=1;}
 else{ $pop=$record_count+1;}
 $query = $result;

 if (($result)||(mysqli_errno($con) == 0))
{ $i = 0;
  echo "<center><table BORDER=1 RULES=none frame='hsides' cellspacing='1' cellpadding='1' cols='9' width=90% dir =rtl> <tbody align='center'><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i <= mysqli_num_fields($result))
          {

	$headers[0]="شهر";
	$headers[1]=" المدفوعات ";
	$headers[2]="الضريبة";	
	
         echo "<th  ALIGN=CENTER ><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";
       $i++;
    }


    echo "</tr>";

    //display the data
$num_rows=0;
      $sum_val=array(0,0,0);
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
	          if($j<2){
				   $sum_val[$j]+=$rows[$j];
		           echo "<td ALIGN=center> <FONT color='#000000'> $rows[$j]</td>";
	            }
	          $j++;
      }
    }

	  echo "<tr ALIGN=center BGCOLOR='#FFCC00' FONT color='#000000' > ";
	   echo "<td colspan=2><FONT color='#000000' size='5'>الاجمالى </td> <td><FONT color='#000000' size='5'> $sum_val[1]</td>";
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
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$myusername  ?></TH></TR>
 </Table>
 
 
 
 