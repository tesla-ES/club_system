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

<FORM NAME="FORM2"   method="post">
<BR>

<?PHP

$fin=mysqli_query($con,"select * from Holder");
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

//$start=$_POST["start"];
$start=0;
if(isset($_REQUEST["start"])) {
    $start = $_REQUEST["start"];
}


$Holder_No=$_REQUEST["Text1"];

$Cheque_No=$_REQUEST["Text3"];

$Total=$_REQUEST["Text5"];

if(valid_date($_REQUEST["Text2"])) {
	$date1=explode("/",$_REQUEST["Text2"]); // change date format
    $_REQUEST["Text2"]=$date1[2]."-".$date1[1]."-".$date1[0];// change date format
    $Holder_date= $_REQUEST["Text2"];
}
	
if(valid_date($_REQUEST["Text4"])){
	$date2=explode("/",$_REQUEST["Text4"]); // change date format
    $_REQUEST["Text4"]=$date2[2]."-".$date2[1]."-".$date2[0];// change date format
    $Cheque_date= $_REQUEST["Text4"];
}


$record_count=mysqli_num_rows($query);
$max_pages=$record_count / $per_page;
$result = mysqli_query($con,"SELECT Holder_No,Holder_Date,Total
						FROM Holder
						ORDER BY Holder_No
						LIMIT $start , $per_page");

$query="select Holder_No,Holder_Date,Total from Holder where";
if(!empty($Holder_No)){
	$query .=	" (Holder_No = '$Holder_No')  ";
}else{
	$query .=	"  true  ";
}
if(!empty($Holder_Date)){
	$query .=	" && (Holder_Date like '%$Holder_Date%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Cheque_No)){
	$query .=	" && (Cheque_No = '$Cheque_No')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Cheque_date)){
	$query .=	" && (Cheque_date like '%$Cheque_date%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Total)){
	$query .=	" && (Total = '$Total')  ";
}else{
	$query .=	" && true  ";
}

$query .="ORDER BY Holder_No  LIMIT $start , $per_page";


$result =  mysqli_query($con,$query);


$i = 0;
if (($result))
{
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i < mysqli_num_fields($result))
          {

	$headers[0]="الكود";
	$headers[1]="تاريخ الحافظة";
	$headers[2]="الإجمالى";

		
         echo "<th  ALIGN=CENTER><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";

       $i++;
    }


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
		
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Holder_View.php?id=$rows[0]&date=$rows[1]'> $rows[$j]</td>";

	  
	}
	$j++;

      }

    }

/////set up previous & next vars
$prev=$start - $per_page;
$next=$start + $per_page;
$last_rec= floor($record_count/$per_page);
$last_rec=$last_rec*$per_page;


  }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }
  echo "</table>";

  
    //show Next button
    if($num_rows>$per_page){ 	
		if(!($start>=$record_count-$per_page)){
		///////////getting the last page
			echo " <a href='Holder_Search_fun.php?start=$last_rec'><img src='../img/lastpage.gif' alt='Last Page'></a>";
		/////////////getting the next page
			echo " <a href='Holder_Search_fun.php?start=$next'><img src='../img/nextpage.gif' alt='Next Page'></a>";

	}
		}
  //show prev button
	if(!($start<=0)){
 //////////////////getting previous page
		echo " <a href='Holder_Search_fun.php?start=$prev'><img src='../img/backpage.gif' alt='Previous Page'></a>";
/////////////getting the first page
		echo " <a href='Holder_Search_fun.php?start=0'><img src='../img/first.gif' alt='First Page'></a>";
	}

	}else{
  		echo "Error in running query :". mysqli_error($con);
	}

?>

</FORM>

</BODY>

</HTML>
