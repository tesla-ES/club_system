<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>

<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>
    <?php
    r_header($page_name,$con);
    include_once '../menu.php';write_menu('Honor')
    ?>


<FORM NAME="FORM2"  method="post">
<BR>
<?PHP

$fin=mysqli_query($con,"select * from Honor");
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
$per_page=20;

$start=0;
if(isset($_REQUEST["start"])) {
    $start = $_REQUEST["start"];
}

$record_count=mysqli_num_rows($query);
$max_pages=$record_count / $per_page;
$result = mysqli_query($con,"SELECT User_ID,Name,Year FROM Honor ORDER BY User_ID LIMIT $start , $per_page");

if ($result)
{
    $i = 0;
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i < mysqli_num_fields($result))
          {

	$headers[0]="رقم العضوية";
	$headers[1]="الإسم";
	$headers[2]="عن سنة";

		
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
		
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Honor_View.php?id={$rows[0]}&name={$rows[1]}&year={$rows[2]}'> $rows[$j]</td>";
	}
	$j++;
      }
    }

      echo "</table>";

      writePage_pagination($start,$record_count,$per_page,"Honor_List.php","");


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
