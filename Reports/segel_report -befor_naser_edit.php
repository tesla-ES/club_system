<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>  </head>
	
      
      <?
$dbname="New_Club_DB";
session_start();
if(session_is_registered(myusername)){
$link =mysql_connect();
if(!$link)
{
print "can not connect to the server";
}

    if(!mysql_select_db($dbname,$link))
{
print "sorry";
$dberror=mysql_error();
return false;
}
}
///////////////////////////
////////////////////////////////////

mysql_query("SET CHARACTER_SET_SERVER 'CP1256'"); 
mysql_query("SET NAMES 'CP1256'");

$result = mysql_query("SELECT Code,Name FROM reg_type where Code = $Membership_type ");
	while($ress=mysql_fetch_array($result))
			{
			$Membership_type_name=$ress[Name];
			}
    ?>
<body> 
<BR><H4 align="right"  >هيئة قناة السويس &nbsp&nbsp&nbsp&nbsp<BR>النادى العام &nbsp&nbsp&nbsp&nbsp<BR>شئون العضويه &nbsp&nbsp&nbsp&nbsp<BR>


<Center><H4> سجل اعضاء النادى العام  <BR>  نوع العضويه : <?=$Membership_type_name ?>
<hr>
 <?php

  $sql2="SELECT User_ID,Employee,Name,b_date from basic_reg where reg_type=$Membership_type order by User_ID";
  
  $record_count=mysql_num_rows(mysql_query($sql2));
  
  
 if(!($per_page))
 {$per_page=30;}
 else if($per_page=='all')
 {$per_page=$record_count;
 }
 
if(!($start)) $start=0;


 $sql="SELECT User_ID,Employee,Name,b_date , case when Reg_Type in(13,15,33,41,42) then job  else '' end AS job, case when Reg_Type in(13,15,33,41,42)  then notes  else '' end AS notes from basic_reg where reg_type=$Membership_type order by User_ID LIMIT $start , $per_page ";
 



 $result = mysql_query($sql);

 $max_pages=$record_count / $per_page;
 if($record_count==0)
 {$pop=1;}
 else{ $pop=$record_count+1;}
 $query = $result;

 if (($result)||(mysql_errno == 0))
{
  echo "<center><table  cellspacing='1' cellpadding='1' cols='9' width=90% dir =rtl> <thead align='center'><tr BGCOLOR='#7b7b7b'>";
 if (mysql_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers
          $i = 0;
          while ($i <= mysql_num_fields($result))
          {

	$headers[0]="م";
	$headers[1]=" رقم العضويه ";
	$headers[2]="النوع ";	
	$headers[3]="الاسم ";
	$headers[4]="تاريخ الميلاد";
	$headers[5]="الوظيفه";
	$headers[6]="ملاحظات";
         echo "<th  ALIGN=CENTER ><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";
       $i++;
    }


    echo "</tr></thead><tbody>";

    //display the data
$num_rows=$start;
 
    while ($rows = mysql_fetch_array($result,MYSQL_NUM))
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
	          if($j<8){
				   $sum_val[$j]+=$rows[$j];
		           echo "<td ALIGN=center  > <FONT color='#000000'> $rows[$j]</td>";  
	            }
	          $j++;
      }
    }
	 
	 
	 
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
	echo " <a href='segel_report.php?start=$last_rec&Membership_type=$Membership_type&per_page=$per_page'><img src='../img/lastpage.gif' alt='Last Page'></a>";
	/////////////getting the next page
echo " <a href='segel_report.php?start=$next&Membership_type=$Membership_type&per_page=$per_page'><img src='../img/nextpage.gif' alt='Next Page'></a>";

}
  //show prev button
if(!($start<=0)){
 //////////////////getting previous page
echo " <a href='segel_report.php?start=$prev'&Membership_type=$Membership_type&per_page=$per_page'><img src='../img/backpage.gif' alt='Previous Page'></a>";
/////////////getting the first page
echo " <a href='segel_report.php?start=0&Membership_type=$Membership_type&per_page=$per_page'><img src='../img/first.gif' alt='First Page'></a>";
}

}else{
  echo "Error in running query :". mysql_error();
}

?>
 <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=80%>  
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$myusername  ?></TH></TR>
 </Table>
 
 
 
 