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
include_once '../menu.php';write_menu('Basic_Reg_list')
?>
<body bgcolor="#F2F2F2"> <div class="content_center">
<BR>
<?php
if(!isset($_REQUEST['start']) || strlen($_REQUEST['start'])<1){
    $start=0;
}else{
      $start=$_REQUEST['start'];
}


$fin=mysqli_query($con,"select * from Basic_Reg");

$n_res=0;
if (!$fin || mysqli_num_rows($fin) == 0) {
    $n_res = mysqli_num_rows($fin);
}
if($n_res==0){$pop=1;}else{$pop=$n_res+1;}

$query = $fin;
$per_page=20;

//todo  must read per page from setting table for user

$record_count=mysqli_num_rows($query);
if($record_count>0){
    echo "<div class='fa-info' width='100%' > إجمالى عدد الاعضاء  [ $record_count ]</div>";
}
$max_pages=$record_count / $per_page;
$sql="SELECT User_ID,Name,Employee,reg_type,(select Name from reg_type as R where R.code=b.reg_type) FROM Basic_Reg as b ORDER BY User_ID LIMIT $start , $per_page" ;
$result = mysqli_query($con,$sql);
if (($result)||(mysql_errno == 0))
{
  echo "<table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers
          $i = 1;
          while ($i <= mysqli_num_fields($result))
          {
	$headers[1]="رقم العضوية";
	$headers[2]="الإسم";
	$headers[3]="كود فرعى";
	$headers[4]="نوع العضـــوية";
	$headers[5]="نوع العضـــوية";
	
         echo "<th  ALIGN=CENTER><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";
       $i++;
    }
    echo "</tr>";

    //display the data
$num_rows=1;
    while ($rows = mysqli_fetch_array($result,MYSQL_NUM))
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
	if($j<5){
		
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Basic_Reg_View.php?user_id={$rows[0]}&employee={$rows[2]}& reg_type={$rows[3]}'> $rows[$j]</td>";

	  
	}
	$j++;

      }

    }



  }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='4'>لا يوجد نتائج !</td></tr>";
  }
  echo "</table>";
  //show Next button


    writePage_pagination($start,$record_count,$per_page,"Basic_Reg_List.php","");



}else{
  echo "Error in running query :". mysqli_error($con);
}

?></div>
</BODY>
</HTML>
