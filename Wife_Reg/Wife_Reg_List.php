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
include_once '../menu.php';write_menu('Wife_Reg');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  method="post">
<BR>
<?PHP

$fin=mysqli_query($con,"select * from Wife_Reg");
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


$start=0;
if(isset($_REQUEST["start"])) {
    $start = $_REQUEST["start"];
}
$per_page=20;

if(!($start))	$start=0;
$record_count=mysqli_num_rows($query);
$max_pages=$record_count / $per_page;
$result = mysqli_query($con,"SELECT User_ID,Name,Ser,reg_type,employee
						FROM Wife_Reg
						ORDER BY User_ID
						LIMIT $start , $per_page");

$i = 0;
if (($result))
{
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i < mysqli_num_fields($result)-2)
          {

	$headers[0]="رقم العضوية";
	$headers[1]="الإسم";
	$headers[2]="الترتيب";

		
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
	if($j<=2){
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Wife_Reg_View.php?user_id=$rows[0]&type=$rows[3]&ser=$rows[2]&employee=$rows[4]'> $rows[$j]</td>";
	}
	$j++;
      }
    }
      echo "</table>";

     writePage_pagination($start,$record_count,$per_page,"Wife_Reg_List.php","");

  }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }

}else{
  echo "Error in running query :". mysqli_error($con);
}
?>
</FORM></BODY></HTML>
