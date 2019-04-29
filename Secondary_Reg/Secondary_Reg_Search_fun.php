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
include_once '../menu.php';write_menu('Secondary_Reg');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<table NAME="FORM2"   method="post">
<BR>

<?PHP
$start=0;
if(isset($_REQUEST["start"])) {
    $start = $_REQUEST["start"];
}

$fin=mysqli_query($con,"select * from Secondary_Reg");
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

$User_ID=$_REQUEST["Text1"];
$Reg_Type=$_REQUEST["Text2"];
$Sec_Type=$_REQUEST["Text3"];
$Ser=$_REQUEST["Text4"];
$Name=$_REQUEST["Text6"];
//$b_date=$_POST["Text8"];
$gender=$_REQUEST["Text9"];
$Notes=$_REQUEST["Text27"];
$Work=$_REQUEST["Text30"];
$Married=$_REQUEST["Text31"];
$Card_OK=$_REQUEST["Text32"];
$End_Date="";
$b_date="";

if(valid_date($_REQUEST["Text8"])){
	$date1=explode("/",$_REQUEST["Text8"]); // change date format
    $_REQUEST["Text8"]=$date1[2]."-".$date1[1]."-".$date1[0];// change date format
    $b_date= $_REQUEST["Text8"];
}

	
if(valid_date($_REQUEST["Text61"])){
	$date2=explode("/",$_REQUEST["Text61"]); // change date format
    $_REQUEST["Text61"]=$date2[2]."-".$date2[1]."-".$date2[0];// change date format
    $End_Date= $_REQUEST["Text61"];
}



//$result = mysqli_query($con,"SELECT User_ID,Name,Reg_Type,employee FROM Secondary_Reg ORDER BY User_ID LIMIT $start , $per_page");


$query="select User_ID,Name,Reg_Type,Employee,ser from Secondary_Reg where";
if(!empty($User_ID)){
	$query .=	" (User_ID = '$User_ID')  ";
}else{
	$query .=	"  true  ";
}
if(!empty($Reg_Type)){
	$query .=	" && (Reg_Type = '$Reg_Type')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Sec_Type)){
	$query .=	" &&(Sec_Type = '$Sec_Type')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Ser)){
	$query .=	" &&(Ser = '$Ser')  ";
}else{
	$query .=	" && true  ";
}

if(!empty($Name)){
	$query .=	" &&(Name like '%$Name%')  ";
}else{
	$query .=	" && true  ";
}

if(!empty($b_date)){
	$query .=	" &&(b_date like '%$b_date%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($gender)){
	$query .=	" &&(gender = '$gender')  ";
}else{
	$query .=	" && true  ";
}

if(!empty($Notes)){
	$query .=	" &&(Notes like '%$Notes%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Work)){
	$query .=	" &&(Work = '$Work')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Married)){
	$query .=	" &&(Married = '$Married')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Card_OK)){
	$query .=	" &&(Card_OK = '$Card_OK')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($End_Date)){
	$query .=	" &&(End_Date like '%$End_Date%')  ";
}else{
	$query .=	" && true  ";
}
$record_count=mysqli_num_rows(mysqli_query($con,$query));
$query .=" ORDER BY User_ID  LIMIT $start , $per_page";
$result =  mysqli_query($con,$query);

$max_pages=$record_count / $per_page;

$i = 0;
$num_rows =1;
if (($result))
{
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if ($record_count>0)
  {
          //loop thru the field names to print the correct headers

          while ($i < mysqli_num_fields($result))
          {
				$headers[0]="رقم العضوية";
				$headers[1]="الإسم";
				$headers[2]="نوع العضوية";
                $headers[3]="نوع العضوية";
              $headers[4]="مسلسل";
         	echo "<th  ALIGN=CENTER><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";
       		$i++;
    	}


    echo "</tr>";

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
	if($j<5){
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Secondary_Reg_View.php?user_id=".$rows[0]."&employee=".$rows["Employee"]."&type=".$rows["Reg_Type"]."&ser=".$rows["ser"]."'> $rows[$j]</td>";
	}
	$j++;
      }
    }
    ?>
       </table>
    <?php
      writePage_pagination($start,$record_count,$per_page,"Secondary_Reg_Search_fun.php","&Text1=$User_ID&Text2=$Reg_Type&Text3=$Sec_Type&Text4=$Ser&Text6=$Name&Text8=$b_date&Text9=$gender&Text27=$Notes&Text30=$Work&Text31=$Married&Text32=$Card_OK&Text61=$End_Date");
     }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='4'>لا يوجد نتائج !</td></tr>";

    }

}else{
  echo "Error in running query :". mysqli_error($con);
}

?>

</FORM>

</BODY>

</HTML>
