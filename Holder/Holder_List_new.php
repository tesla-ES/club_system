<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
		
		<?php
session_start();
if(session_is_registered(myusername)){
	echo"<H4 align='left'> ";
	echo"مرحباً   ";
echo"<B>$myusername </B> ";

}
include_once '../menu.php';
?>

<A href="http://192.168.1.3/club_system/login/logout.php" >| خروج </A>
</H4>
<center>
 <table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR >
                 <TH  align=center ><font size ="5" color="#FFCC00"> الحافظة
                 <BR>
                 </TH>
                 </TR>
                 </Table>
<?php write_menu('Holder')?>
</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  method="post">
<BR>
<?PHP
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

mysql_query("SET CHARACTER_SET_SERVER 'CP1256'"); 
mysql_query("SET NAMES 'CP1256'");
$fin=mysql_query("select * from Holder");
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
$per_page=20;
if(!($start))	$start=0;
$record_count=mysql_num_rows($query);
$max_pages=$record_count / $per_page;
$result = mysql_query("SELECT Holder_No,Holder_Date,Total
						FROM Holder
						ORDER BY Holder_No
						LIMIT $start , $per_page");
if (($result)||(mysql_errno == 0))
{
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysql_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers
          $i = 1;
          while ($i <= mysql_num_fields($result))
          {

	$headers[1]="الكود";
	$headers[2]="تاريخ الحافظة";
	$headers[3]="الإجمالى";

		
         echo "<th  ALIGN=CENTER><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";

       $i++;
    }

/////////////////////////////////////////////////////////////////////////////////////////


    echo "</tr>";

    //display the data
$num_rows=1;
    while ($rows = mysql_fetch_array($result,MYSQL_NUM))
    {
    			if($num_rows & 1){
      echo "<tr BGCOLOR='#c4c4c4'>";
      			}else{
      echo "<tr BGCOLOR='#ffffff'>";			
      			}
      			$num_rows++;
 	$j=0;
	
      foreach ($rows as $data)
      {
	if($j<4){
		
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Holder_View.php?id={$rows[0]}&date={$rows[1]}'> $rows[$j]</td>";

	  
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
  echo "</table>";
  //show Next button
if(!($start>=$record_count-$per_page)){
	///////////getting the last page
	echo " <a href='Holder_List.php?start=$last_rec'><img src='../img/lastpage.gif' alt='Last Page'></a>";
	/////////////getting the next page
echo " <a href='Holder_List.php?start=$next'><img src='../img/nextpage.gif' alt='Next Page'></a>";

}
  //show prev button
if(!($start<=0)){
 //////////////////getting previous page
echo " <a href='Holder_List.php?start=$prev'><img src='../img/backpage.gif' alt='Previous Page'></a>";
/////////////getting the first page
echo " <a href='Holder_List.php?start=0'><img src='../img/first.gif' alt='First Page'></a>";
}


}else{
  echo "Error in running query :". mysql_error();
}



?>

</FORM>





</BODY>

</HTML>
