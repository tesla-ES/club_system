<?php
$page_name=basename(__FILE__);
include_once '../function.php';
?>

<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<link rel="stylesheet" href="../css/table_css.css">
<head></head>


      <?php
      $date=$_REQUEST["date"];
      $id=$_REQUEST["id"];
$fin=mysqli_query($con,"select Holder_No,Holder_Date,DATE_FORMAT(`Holder_Date`,'%d/%m/%Y') as H_Date ,Cheque_No,DATE_FORMAT(`Cheque_Date`,'%d/%m/%Y') as CH_Date,Total from Holder where Holder_No ='$id'&& Holder_Date='$date'");
$n_res=mysqli_num_rows($fin);

      $Holder_No = $id;
      $H_Date =  "";
      $Cheque_No =  "";
      $CH_Date =  "";
      $Total =  "";
      $Holder_Date =  "";

while($res=mysqli_fetch_array($fin)) {
    $Holder_No = $res["Holder_No"];
    $H_Date = $res["H_Date"];
    $Cheque_No = $res["Cheque_No"];
    $CH_Date = $res["CH_Date"];
    $Total = $res["Total"];
    $Holder_Date = $res["Holder_Date"];
}
?>
<body>
<H4 align="right"  >هيئة قناة السويس &nbsp&nbsp&nbsp&nbsp<BR>النادى العام &nbsp&nbsp&nbsp&nbsp<BR>شئون العضويه &nbsp&nbsp&nbsp&nbsp<BR>
<Center><H4>  طباعة حافظة بالاسم<BR>
<table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="2" width=90%>
 <tbody align="right">
 <TR> <TD><?= $H_Date ?>  : بتاريخ </TD><TD align="right"><?= $Holder_No ?> : حافظة رقم </TD></TR>
 <TBody></Table>
 <?php
$fin=mysqli_query($con,"select Receipt_No,Pay_Date ,(select op_name from operation_type where operation_type.op_id = payment.operation) as operation,Total  from Payment where Holder_No='$Holder_No' && Holder_Date='$Holder_Date'  && status in(0,3)" );
$n_res=mysqli_num_rows($fin);
if($n_res==0)
{
$pop=1;
}
else
{
$pop=$n_res+1;
}
$query = $fin;
$per_page=10000;
if(empty($start)){$start=0;}
$record_count=mysqli_num_rows($query);
$max_pages=$record_count / $per_page;
$result = mysqli_query($con,"SELECT  (select name from reg_type where reg_type.code = payment.reg_type) as reg_type,payment.user_id,(select name from basic_reg where basic_reg.user_id = payment.user_id and basic_reg.reg_type = payment.reg_type and basic_reg.employee = payment.employee) as name,payment.Receipt_No,payment.Pay_Date,(select op_name from operation_type where operation_type.op_id = payment.operation) as operation,
payment.Total
FROM holder
Inner Join payment ON holder.Holder_No = payment.Holder_No AND holder.holder_date = payment.Holder_Date
Inner Join registeration ON payment.Reg_Type = registeration.Ser
Where holder.Holder_No='$Holder_No' && holder.Holder_Date='$Holder_Date'&& status in(0,3)
ORDER BY holder.Holder_No,Receipt_No  LIMIT $start , $per_page");
					
if (($result)||(mysql_errno == 0))
{
  echo "<center><table BORDER=1  class='grid_even_odd' cellspacing='1' cellpadding='1'  width=95% dir =rtl> <thead align='center'><tr>";
    $i = 0;
  if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i <= mysqli_num_fields($result))
          {

	$headers[0]="مسلسل";
	$headers[1]="نوع عضوية";
	$headers[2]="رقم عضوية";
	$headers[3]="الاســــم";
	$headers[4]="إيصال رقم";
	$headers[5]="بتاريخ";	
	$headers[6]="نوع عملية";
	$headers[7]="مبلغ";
	
	
         echo "<th  ALIGN=CENTER  width=10%>". $headers[$i] . "</th>";
       $i++;
    }

////////////////////////
    echo "</tr><thead><tbody>";

    //display the data
$num_rows=0;
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
		

		echo "<td ALIGN=center >  $num_rows </td>";
        foreach ($rows as $data)
          {
	          if($j<7){
				   $sum_val[$j]+=$rows[$j];
		           echo "<td ALIGN=center  >  $rows[$j]</td>";
	            }
	          $j++;
      }
    }
	  echo "<tr ALIGN=center>";
	   echo "<td colspan=3>الاجمالى </td> <td></td> <td> </td> <td> </td> <td> </td> <td> $sum_val[6]</td> "; 
	 echo "</tr>";
	 
	 
/////set up previous & next vars
$prev=$start - $per_page;
$next=$start + $per_page;
$last_rec= floor($record_count/$per_page);
$last_rec=$last_rec*$per_page;
unset($data);
  }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }
  echo "</tbody></table>";
  //show Next button
if(!($start>=$record_count-$per_page)){
	///////////getting the last page
	echo " <a href='hafza.php?start=$last_rec&id=$id&date=$date'><img src='../img/lastpage.gif' alt='Last Page'></a>";
	/////////////getting the next page
echo " <a href='hafza.php?start=$next&id=$id&date=$date'><img src='../img/nextpage.gif' alt='Next Page'></a>";

}
  //show prev button
if(!($start<=0)){
 //////////////////getting previous page
echo " <a href='hafza.php?start=$prev'&id=$id&date=$date'><img src='../img/backpage.gif' alt='Previous Page'></a>";
/////////////getting the first page
echo " <a href='hafza.php?start=0&id=$id&date=$date'><img src='../img/first.gif' alt='First Page'></a>";
}

}else{
  echo "Error in running query :". mysqli_error($con);
}

?>
 <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=80%>  
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$_SESSION["myusername"]  ?></TH></TR>
 </Table>
 
 
 
 