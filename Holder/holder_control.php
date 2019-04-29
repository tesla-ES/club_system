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
//r_header($page_name);
include_once '../menu.php';write_menu('control');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  method="post">

<BR>
<h5 align="center" >  إجمالى الايراد اليومى لحساباتكم الواجب توريدها !!!</h5>

<?PHP

$fin=mysqli_query($con,"select * from payment   where year(pay_date )= year (current_date) ");
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
$result = mysqli_query($con,"select count(*) as mslsl,pay_date,sum(total ) as total,count(receipt_no) as cunt,(SELECT username from members where id= upd_user) as u_name
from payment where status = 0 and pay_date <= current_date and holder_no is null and year(pay_date) = year(current_date)
group by pay_date ORDER BY pay_Date desc LIMIT $start , $per_page") ;


$i=0 ;
if (($result)||(mysql_errno == 0))
{
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i < mysqli_num_fields($result))
          {
            $headers[0]="مسلسل";
            $headers[1]="التاريخ";
            $headers[2]="الإجمالى";
            $headers[3]="المستخدم";
            $headers[4]=" عدد الايصالات";
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
 	$j=0;

	 echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href=''> ".$rows["mslsl"]."</td>";
	 echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href=''> ".$rows["pay_date"]."</td>";
     echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href=''>". $rows["total"]."</td>";
     echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href=''>" . $rows["u_name"]."</td>";
	 echo "<td ALIGN=center  > <FONT color='#FFFFFF'><a href=''> ". $rows["cunt"]."</td>";
    }
/////set up previous & next vars
$prev=$start - $per_page;
$next=$start + $per_page;
$last_rec= floor($record_count/$per_page);
$last_rec=$last_rec*$per_page;


     echo "</table>";
     //show Next button
     if(!($start>=$record_count-$per_page)){
         ///////////getting the last page
         echo " <a href='Holder_control.php?start=$last_rec'><img src='../img/lastpage.gif' alt='Last Page'></a>";
         /////////////getting the next page
         echo " <a href='Holder_control.php?start=$next'><img src='../img/nextpage.gif' alt='Next Page'></a>";

     }
     //show prev button
     if(!($start<=0)){
         //////////////////getting previous page
         echo " <a href='Holder_control.php?start=$prev'><img src='../img/backpage.gif' alt='Previous Page'></a>";
/////////////getting the first page
         echo " <a href='Holder_control.php?start=0'><img src='../img/first.gif' alt='First Page'></a>";
     }


  }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }



}else{
  echo "Error in running query :". mysqli_error($con);
}

?>

</FORM>

</BODY>

</HTML>
