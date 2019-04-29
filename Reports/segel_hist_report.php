<?php include_once "../function.php" ;?>
<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>

<?php


$Membership_type =asignValue($_REQUEST['Membership_type'],false) ;
$order_arrange = asignValue($_REQUEST['order_arrange'],0);
if($Membership_type){


$result = mysqli_query($con,"SELECT Code,Name FROM reg_type where Code = $Membership_type ");
	while($ress=mysqli_fetch_array($result))
			{
			$Membership_type_name=$ress["Name"];
			}


$segel_year=asignValue($_REQUEST["segel_year"],$Curr_Year);
$start=asignValue($_REQUEST["start"],0);
    ?>
<body> 
<BR><H4 align="right"  >هيئة قناة السويس &nbsp&nbsp&nbsp&nbsp<BR>النادى العام &nbsp&nbsp&nbsp&nbsp<BR>شئون العضويه &nbsp&nbsp&nbsp&nbsp<BR>


<Center><H4> سجل اعضاء النادى العام  <BR>  نوع العضويه : <?=$Membership_type_name ?>
<BR>  السنه  : <?=$segel_year ?>
<hr>
 <?php

  $sql2="SELECT User_ID,Emp,Name from honor where reg_type=$Membership_type and year=$segel_year order by $order_arrange";
  
  $record_count=mysqli_num_rows(mysqli_query($con,$sql2));

 $per_page=asignValue($_REQUEST["per_page"],30);
 if($per_page=='all')
 {
     $per_page=$record_count;
 }

 $sql="SELECT User_ID,Emp,Name , job  from honor where reg_type=$Membership_type and year=$segel_year order by $order_arrange LIMIT $start , $per_page ";

 $result = mysqli_query($con,$sql);

 $max_pages=$record_count / $per_page;
 if($record_count==0)
 {$pop=1;}
 else{ $pop=$record_count+1;}
 $query = $result;

 if (($result)||(mysqli_errno($con) == 0))
{
    $i = 0;
  echo "<center><table  cellspacing='1' cellpadding='1' cols='9' width=90% dir =rtl> <thead align='center'><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i <= mysqli_num_fields($result))
          {

	$headers[0]="م";
	$headers[1]=" رقم العضويه ";
	$headers[2]="النوع ";	
	$headers[3]="الاسم ";
	//$headers[4]="تاريخ الميلاد";
	$headers[4]="الوظيفه";
	//$headers[5]="ملاحظات";
         echo "<th  ALIGN=CENTER ><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";
       $i++;
    }

    echo "</tr></thead><tbody>";

    //display the data
$num_rows=$start;
      $sum_val=array(0,0,0,0,0,0);
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

      writePage_pagination($start,$record_count,$per_page,"segel_hist_report.php","&Membership_type=$Membership_type&per_page=$per_page&order_arrange=$order_arrange&segel_year=$segel_year");

  }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }

}else{
  echo "Error in running query :". mysqli_error($con);
}
 }else{
     report_uncompleate_parameter();
 }
?>
 
 
 