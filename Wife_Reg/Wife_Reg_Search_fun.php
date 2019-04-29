
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

</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM2"   method="post">
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

$per_page=20;


$start=0;
if(isset($_REQUEST["start"])) {
    $start = $_REQUEST["start"];
}

$User_ID=$_REQUEST["Text1"];
$Reg_Type=$_REQUEST["Text2"];
$Sec_Type=$_REQUEST["Text3"];
$Ser=$_REQUEST["Text4"];
$Name=$_REQUEST["Text6"];
$Name_Card="";
if(isset($_REQUEST["Text7"])) {
    $Name_Card = $_REQUEST["Text7"];
}
$gender=$_REQUEST["Text9"];

$Employer="";
if(isset($_REQUEST["Text7"])) {
    $Employer=$_REQUEST["Text15"];
}


$Notes=$_REQUEST["Text28"];
$Card_OK=$_REQUEST["Text32"];

$b_date="";

if(valid_date($_REQUEST["Text8"])){
	$date1=explode("/",$_REQUEST["Text8"]); // change date format
    $_REQUEST["Text8"]=$date1[2]."-".$date1[1]."-".$date1[0];// change date format
    $b_date= $_REQUEST["Text8"];
}




$query="select User_ID,Name,Ser,Employee,Reg_type from Wife_Reg where";
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
if(!empty($Name_Card)){
	$query .=	" &&(Name_Card like '%$Name_Card%')  ";
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
if(!empty($Employer)){
	$query .=	" &&(Employer = '$Employer')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Card_OK)){
	$query .=	" &&(Card_OK = '$Card_OK')  ";
}else{
	$query .=	" && true  ";
}

$record_count=mysqli_num_rows(mysqli_query($con,$query));
$max_pages=$record_count / $per_page;
$query .="ORDER BY User_ID  LIMIT $start , $per_page";
$result =  mysqli_query($con,$query);


if ($result)
{
    $i = 0;
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          while ($i < mysqli_num_fields($result)-2)
          {
				$headers[0]="رقم العضوية";
				$headers[1]="الإسم";
				$headers[2]="مسلسل";
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
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Wife_Reg_View.php?user_id=".$rows["User_ID"]."&type=".$rows["Reg_type"]."&employee=".$rows["Employee"]."&ser=".$rows["Ser"]."'> $rows[$j]</td>";
	}
	$j++;
      }
    }
      echo "</table>";
      writePage_pagination($start,$record_count,$per_page,"Wife_Reg_Search_fun.php","&Text1=$User_ID&Text2=$Reg_Type&Text3=$Sec_Type&Text4=$Ser&Text6=$Name&Text8=$b_date&Text9=$gender&Text28=$Notes&Text32=$Card_OK");

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
