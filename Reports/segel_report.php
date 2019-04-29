 <?php include_once "../function.php" ;?>
<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>    
 <link rel="stylesheet" href="../css/table_css.css">
</head>
      

<?php


  IF(!EMPTY($_REQUEST['Membership_type']))
  {
   $Membership_type=$_REQUEST['Membership_type'];
   $order_arrange=$_REQUEST['order_arrange'];
$result = mysqli_query($con,"SELECT Code,Name FROM reg_type where Code = $Membership_type ");
while($res=mysqli_fetch_array($result))
			{
			$Membership_type_name=$res["Name"];
			}
    ?>
<body>
<?php report_header();?>
<div class="top_head">

<H4> سجل اعضاء النادى العام  <BR>  نوع العضويه : <?=$Membership_type_name ?>
</div>
<hr>
 <?php

  $sql2="SELECT User_ID,Employee,Name from basic_reg where reg_type=$Membership_type order by $order_arrange";
  
  $record_count=mysqli_num_rows(mysqli_query($con,$sql2));

 $per_page=$_REQUEST["per_page"];
 if(!(isset($_REQUEST["per_page"])))
 {
     $per_page=30;
 }
 else if($_REQUEST["per_page"]=='all')
 {
     $per_page=$record_count;
 }

 $start=0;
 if(isset($_REQUEST["start"])) {
     $start = $_REQUEST["start"];
 }


 $sql="SELECT User_ID,Employee,Name , case when Reg_Type in(13,15,33,41,42) then job  else '' end AS job, case when Reg_Type in(13,15,33,41,42)  then notes  else '' end AS notes from basic_reg where reg_type=$Membership_type order by $order_arrange LIMIT $start , $per_page ";
 $result = mysqli_query($con,$sql);

 $max_pages=$record_count / $per_page;
 if($record_count==0)
 {$pop=1;}
 else{ $pop=$record_count+1;}
 $query = $result;

 if (($result)||(mysqli_errno($con) == 0))
{
    $i = 0;
  echo "<table class='gridtable' cols='9' > <thead><tr>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i <= mysqli_num_fields($result))
          {
	       $headers[0]="م";
            $width[0]="5%";
	       $headers[1]=" رقم العضويه ";
            $width[1]="10%";
	       $headers[2]="النوع ";
            $width[2]="10%";
           $headers[3]="الاسم ";
            $width[3]="30%";
	       $headers[4]="الوظيفه";
              $width[4]="30%";
              $headers[5]="ملاحظات";
              $width[5]="15%";
           echo "<th style='width:$width[$i] '>". $headers[$i] . "</th>";
           $i++;
    }
    echo "</tr></thead><tbody>";

    //display the data
$num_rows=$start;
      $sum_val=array(0,0,0,0,0,0);
    while ($rows = mysqli_fetch_array($result,MYSQLI_BOTH))
    {
    			if($num_rows & 1){
                      echo "<tr>";
      			}else{
                      echo "<tr>";			
      			}
      			$num_rows++;
 	    $j=0;
		
		echo "<td>  $num_rows </td>";
        foreach ($rows as $data)
          {
	          if($j<5){
				   $sum_val[$j]+=$rows[$j];
		           echo "<td>  $rows[$j]</td>";  
	            }
	          $j++;
      }
    }

      echo "</tbody></table>";

      writePage_pagination($start,$record_count,$per_page,"segel_report.php","&Membership_type=$Membership_type&per_page=$per_page&order_arrange=$order_arrange");

  }else{
    echo "<tr><td colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }


    echo"<div class='pagination'>";
    include "sign.php" ;

}else{
  echo "Error in running query :". mysqli_error($con);
}
 echo "</div>" ;
 }else{
     report_uncompleate_parameter();
 }

 report_footer($myusername);
?>


</body>
 
 
 