
<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<meta http-equiv="Content-Language" content="it">

<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>

<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Holder');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  method="post">
<BR>
<?PHP
$fin=mysqli_query($con,"select * from Holder   where year(holder_date) = year(current_date) ");
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
$per_page=50;
if(empty($start)){$start=0;}
$record_count=mysqli_num_rows($query);
$max_pages=$record_count / $per_page;
$result = mysqli_query($con,"SELECT Holder_No,Holder_Date,(select sum(total) from payment where Holder.Holder_No=payment.Holder_No and payment.holder_date= Holder.holder_date  ) as Total  ,(SELECT username from members where id= ins_user) as u_name,'عرض','new', Cheque_No
						FROM Holder where year(holder_date) = year(current_date)
						ORDER BY Holder_No desc 
						LIMIT $start , $per_page") ;
if (($result)||(mysql_errno == 0))
{
  echo "<table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers
          $i = 1;
          while ($i <= mysqli_num_fields($result))
          {

	$headers[1]="الكود";
	$headers[2]="تاريخ الحافظة";
	$headers[3]="الإجمالى";
    $headers[4]="";
	$headers[5]="";
    $headers[6]="المستخدم";
	$headers[7]="ايصال البنك";



         echo "<th  ALIGN=CENTER><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";

       $i++;
    }

///////////////

    echo "</tr>";

    //display the data
$num_rows=1;
    while ($rows = mysqli_fetch_array($result,MYSQLI_BOTH))
    {
    			if($num_rows & 1){
      echo "<tr BGCOLOR='#c4c4c4'>";
      			}else{
      echo "<tr BGCOLOR='#ffffff'>";			
      			}
      			$num_rows++;

	 echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href='Holder_View.php?id={$rows[0]}&date={$rows[1]}'> $rows[0]</td>";
	 echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href='Holder_View.php?id={$rows[0]}&date={$rows[1]}'> $rows[1]</td>";
     echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href='Holder_View.php?id={$rows[0]}&date={$rows[1]}'> $rows[2]</td>";
    echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href='hafza.php?id={$rows[0]}&date={$rows[1]}'> $rows[4]</td>";
	echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href='hafza_n.php?id={$rows[0]}&date={$rows[1]}'> $rows[5]</td>";
	 echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href='hafza.php?id={$rows[0]}&date={$rows[1]}'> $rows[3]</td>";
	 echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href='Holder_View.php?id={$rows[0]}&date={$rows[1]}'> $rows[6]</td>";

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
  echo "Error in running query :". mysqli_error($con);
}

?>

</FORM>

</BODY>

</HTML>
