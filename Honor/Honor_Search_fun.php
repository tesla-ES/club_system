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
include_once '../menu.php';write_menu('Honor');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM2"   method="post">
<BR>

<?PHP

$fin=mysqli_query($con,"select * from Honor where reg_type in(13,15,33)");
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
$Year=$_REQUEST["Text44"];
//$Due_Date=$_POST["Text45"];
$Name=$_REQUEST["Text46"];
$Job=$_REQUEST["Text48"];
$No=$_REQUEST["Text49"];
$Prints=$_REQUEST["Text50"];
$Due_Date="";

if(valid_date($_REQUEST["Text45"])){
	$date1=explode("/",$_REQUEST["Text45"]); // change date format
    $_REQUEST["Text45"]=$date1[2]."-".$date1[1]."-".$date1[0];// change date format
    $Due_Date= $_REQUEST["Text45"];
}


$result = mysqli_query($con,"SELECT User_ID,Name,Year
						FROM Honor
						ORDER BY User_ID
						LIMIT $start , $per_page");

$query="select User_ID,Name,Year from Honor where";
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
if(!empty($Year)){
	$query .=	" && (Year = '$Year')  ";
}else{
	$query .=	" && true  ";
}

if(!empty($Due_Date)){
	$query .=	" &&(Due_Date like '%$Due_Date%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Name)){
	$query .=	" &&(Name like '%$Name%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Job)){
	$query .=	" &&(Job like '%$Job%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($No)){
	$query .=	" && (No = '$No')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Prints)){
	$query .=	" && (Prints = '$Prints')  ";
}else{
	$query .=	" && true  ";
}

$record_count=mysqli_num_rows(mysqli_query($con,$query));
$max_pages=$record_count / $per_page;

$query .="ORDER BY User_ID  LIMIT $start , $per_page";
$result =  mysqli_query($con,$query);


/////////////////////////
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

      writePage_pagination($start,$record_count,$per_page,"Honor_Search_fun.php","&Text1=$User_ID&Text2=$Reg_Type&Text44=$Year&Text45=$Due_Date&Text46=$Name&Text48=$Job&Text49=$No&Text50=$Prints");


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
