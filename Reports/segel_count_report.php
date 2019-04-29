<?php include_once "../function.php" ;?>
<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>

<?php
IF(!EMPTY($_REQUEST['Membership_type'])) {
    $Membership_type = $_REQUEST['Membership_type'];
    $order_arrange = $_REQUEST['order_arrange'];

    $result = mysqli_query($con, "SELECT Code,Name FROM reg_type where Code = $Membership_type ");
    while ($ress = mysqli_fetch_array($result)) {
        $Membership_type_name = $ress["Name"];
    }

    $per_page=isset($_REQUEST["per_page"])?$_REQUEST["per_page"]:30;


    $start=0;
    if(isset($_REQUEST["start"])) {
        $start = $_REQUEST["start"];
    }


    ?>
<body> 
<H4 align="right"  >هيئة قناة السويس &nbsp&nbsp&nbsp&nbsp<BR>النادى العام &nbsp&nbsp&nbsp&nbsp<BR>شئون العضويه &nbsp&nbsp&nbsp&nbsp<BR>
</H4>

<H4> سجل اعضاء النادى العام  <BR>  نوع العضويه : <?=$Membership_type_name ?></H4>
<hr>
 <?php

  $sql2="SELECT User_ID,Employee,Name from basic_reg where reg_type=$Membership_type order by $order_arrange";
  $record_count=mysqli_num_rows(mysqli_query($con,$sql2));

      if($per_page=='all')
    {
        $per_page=$record_count;
    }

 $sql="SELECT User_ID,Name ,job,(select count(user_id)     from wife_reg where basic_reg.reg_type=wife_reg.reg_type
and basic_reg.User_ID= wife_reg.User_ID and basic_reg.Employee = wife_reg.Employee),(select count(user_id)     from secondary_reg where basic_reg.reg_type=secondary_reg.reg_type
and basic_reg.User_ID= secondary_reg.User_ID and basic_reg.Employee = secondary_reg.Employee and secondary_reg.b_date > '2006-12-31') 
,(select count(user_id)     from secondary_reg where basic_reg.reg_type=secondary_reg.reg_type
and basic_reg.User_ID= secondary_reg.User_ID and basic_reg.Employee = secondary_reg.Employee and secondary_reg.b_date between '1993-12-31' and '2006-12-31') 
,(select count(user_id)     from secondary_reg where basic_reg.reg_type=secondary_reg.reg_type
and basic_reg.User_ID= secondary_reg.User_ID and basic_reg.Employee = secondary_reg.Employee and secondary_reg.b_date < '1993-12-31') 
 from basic_reg where reg_type=$Membership_type order by $order_arrange LIMIT $start , $per_page ";

 $result = mysqli_query($con,$sql);
 $max_pages=$record_count / $per_page;
 if($record_count==0)
 {$pop=1;}
 else{ $pop=$record_count+1;}
 $query = $result;

 if (($result)||(mysqli_errno($con) == 0))
{
    $i = 0;
  echo "<table   class='gridtable'  cols='9'> <thead align='center'><tr>";
 if (mysqli_num_rows($result)>0)
  {
          while ($i <= mysqli_num_fields($result))
          {
	$headers[0]="م";
	$headers[1]=" رقم العضويه ";
	$headers[2]="الاسم ";
	$headers[3]="الوظيفه";
	$headers[4]="زوجات";
	$headers[5]="ابن < 10";
	$headers[6]="ابن>10";
	$headers[7]="ابن > 23";
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

      echo "</tbody></table>";
      writePage_pagination($start,$record_count,$per_page,"segel_count_report.php","&Membership_type=$Membership_type&per_page=$per_page&order_arrange=$order_arrange");



  }else{
    echo "<tr><td colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }

    echo"<div class='pagination'>";
    include "sign.php" ;
  //show Next button

}else{
  echo "Error in running query :". mysqli_error($con);
}
 }else{
     report_uncompleate_parameter();
 }
?>
        </div>
 <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=80%>  
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$myusername  ?></TH></TR>
 </Table>
</body>
 
 
 