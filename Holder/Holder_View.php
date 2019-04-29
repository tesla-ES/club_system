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

<FORM NAME="FORM1"  action="Holder_Update.php" method="post" enctype="multipart/form-data">

<BR>
<?php
$id=$_REQUEST["id"];
$date=$_REQUEST["date"];

if(valid_date($date))
{
if (strpos($date, '/') !== false) {
    list($day, $month, $year) = explode('/', $date);
    $date=$year."-".$month."-".$day ;
}else{
    $date=$_REQUEST["date"];
}

}else{
    if (strpos($date, '/') !== false) {
        list($day, $month, $year) = explode('/', $date);
        $date=$year."-".$month."-".$day ;
    }

}

$fin=mysqli_query($con,"select Holder_No,Holder_Date,DATE_FORMAT(`Holder_Date`,'%d/%m/%Y') as H_Date ,Cheque_No,DATE_FORMAT(`Cheque_Date`,'%d/%m/%Y') as CH_Date,Total from Holder where Holder_No ='$id'&& Holder_Date='$date'");
$n_res=mysqli_num_rows($fin);

$Holder_no="";
$H_Date="";
$Cheque_No="";
$CH_Date="";
$Total="";
$Holder_Date="";

while($res=mysqli_fetch_array($fin))
{
$Holder_no=$res["Holder_No"];
$H_Date=$res["H_Date"];
$Cheque_No=$res["Cheque_No"];
$CH_Date=$res["CH_Date"];
$Total=$res["Total"];
$Holder_Date=$res["Holder_Date"];
}


//////////////////////////////////////////////////////////////////////////////// Update Total Value
$fin1=mysqli_query($con,"select sum(Total)as Final from Payment where status=0 && holder_No is null && pay_year=year(sysdate())");
$n_res1=mysqli_num_rows($fin1);
while($res1=mysqli_fetch_array($fin1))
{
$Final=$res1["Final"];
}
$query = "update  Holder SET Total='$Final' where  status = 0 && holder_No = '$Holder_no'&&holder_date = '$H_Date'";

echo "


<center>
<table  >
<thead>
</thead>
<tbody>


<TR  align='middle'>
<TH><FONT size='4'  >رقم الحافظة:</TH><TH align='right'><INPUT TYPE='TEXT' NAME='Text1'style='font-size: 10pt;height:25px;width:200px' value='$Holder_no'>
<INPUT TYPE='hidden' NAME='Text0'  value=$Holder_no>
</TH>
";
echo "
</TR>
<TR  align='middle'>
<TH><FONT size='4'  > تاريخ الحافظة :</TH><TH align='right'><INPUT TYPE='TEXT' NAME='Text2' style='font-size: 10pt;height:25px;width:200px' value='$H_Date'></TH>
</TR>
<TR  align='middle'>
<TH><FONT size='4'  >رقم إذن سداد البنك :</TH><TH align='right'><INPUT TYPE='TEXT' NAME='Text3' style='font-size: 10pt;height:25px;width:200px' value='$Cheque_No'></TH>
</TR>
<TR  align='middle'>
<TH><FONT size='4'  > تاريخ إذن سداد البنك :</TH><TH align='right'><INPUT TYPE='TEXT' NAME='Text4' style='font-size: 10pt;height:25px;width:200px' value='$CH_Date'></TH>
</TR>
<TR  align='middle'>
<TH><FONT size='4'  > إجمالى الحافظة :</TH><TH align='right'><INPUT TYPE='TEXT' NAME='Text5' style='font-size: 10pt;height:25px;width:200px' value='$Total'></TH>
</TR>	
</tbody>
</table>
<br>
<hr />
";
///////////////////////////////////////////////////////////////////////////////////////////
$fin=mysqli_query($con,"select Receipt_No,Pay_Date ,Total  from Payment where status= 0 && Holder_No='$Holder_no' && Holder_Date='$Holder_Date'");
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
$per_page=10;
if(empty($start)){$start=0;}
$record_count=mysqli_num_rows($query);
$max_pages=$record_count / $per_page;
$result = mysqli_query($con,"select Receipt_No,Pay_Date ,Total 
						From Payment 
						Where  status =0 && Holder_No='$Holder_no' && Holder_Date='$Holder_Date'
						ORDER BY Holder_No
						LIMIT $start , $per_page");
if (($result)||(mysql_errno == 0))
{
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
  $i=0;
 if (mysqli_num_rows($result)>0)
  {
          while ($i < mysqli_num_fields($result))
          {

	$headers[0]="رقم الإيصال";
	$headers[1]="تاريخ الإيصال";
	$headers[2]="الإجمالى";
    echo "<th  ALIGN=CENTER><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";
    $i++;
    }

/////////////////////////////////////////////////////////////////////////////////////////
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
	
      foreach ($rows as $data)
      {
	if($j<3){
		
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
//////////////////////////////////////////////////////////////////////////////////////////////
Echo"
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background='../img/sperator.gif'  >
        <TR>
            <TD VALIGN='top'>
                <img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
<TH align=center background='../img/sperator.gif'><A href='Holder_Delete.php?No=$Holder_no&DT=$Holder_Date' ><img src='../img/delete.png' border='0' width='26' height='26'><br clear='all'> حذف </A></TH>
<TH align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
<TH align=center background='../img/sperator.gif'><INPUT type='image' name='b3'src='../img/update.gif' width='26' height='26'><br clear='all'> تعديل  </A></TH>
<TH align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
</TD>
</TR>
</Table>";
?>
</FORM>
</BODY>
</HTML>
