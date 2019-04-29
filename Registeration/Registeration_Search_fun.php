<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
	<link rel="stylesheet" href="../Reports/css/table_css.css">
</head>

<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Registration');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM2"   method="post">
<BR>

<?PHP
$fin=mysqli_query($con,"select * from Registeration");
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

	$Ser=$_REQUEST["Text1"];
	$Reg_Cost=$_REQUEST["Text2"];
	$Main_Cost=$_REQUEST["Text3"];
	$Reg_Main_Cost=$_REQUEST["Text4"];
	$Wife_Cost=$_REQUEST["Text5"];
	$More_Cost=$_REQUEST["Text6"];
	$Form_Cost=$_REQUEST["Text8"];
	$Daughter_Cost=$_REQUEST["Text9"];
	$Son_Cost=$_REQUEST["Text10"];
	$Card_Cost=$_REQUEST["Text11"];
	$Tax=$_REQUEST["Text12"];



$query="select registeration.Ser,reg_type.name,registeration.reg_cost from registeration,reg_type where";
if(!empty($Ser)){
	$query .=	" (registeration.Ser = '$Ser')  ";
}else{
	$query .=	"  true  ";
}
if(!empty($Main_Cost)){
	$query .=	" && (registeration.Main_Cost = '$Main_Cost')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Reg_Main_Cost)){
	$query .=	" &&(registeration.Reg_Main_Cost = '$Reg_Main_Cost')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Wife_Cost)){
	$query .=	" &&(registeration.Wife_Cost = '$Wife_Cost')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($More_Cost)){
	$query .=	" &&(registeration.More_Cost = '$More_Cost')  ";
}else{
	$query .=	" && true  ";
}



if(!empty($Form_Cost)){
	$query .=	" &&(registeration.Form_Cost = '$Form_Cost')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Daughter_Cost)){
	$query .=	" &&(registeration.Daughter_Cost = '$Daughter_Cost')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Son_Cost)){
	$query .=	" &&(registeration.Son_Cost = '$Son_Cost')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Card_Cost)){
	$query .=	" &&(registeration.Card_Cost = '$Card_Cost')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Tax)){
	$query .=	" &&(registeration.Tax = '$Tax')  ";
}else{
	$query .=	" && true  ";
}
	$query .="&& reg_type.code=registeration.ser ";

$record_count=mysqli_num_rows(mysqli_query($con,$query));
$max_pages=$record_count / $per_page;
$query .="ORDER BY registeration.Ser  LIMIT $start , $per_page";

$result =  mysqli_query($con,$query);

/////////////////////////
if ($result)
{
    $i = 0;
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i <mysqli_num_fields($result))
          {
				$headers[0]="مسلسل";
				$headers[1]="نوع العضوية";
				$headers[2]="رسم القيد";
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
		
 		echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Registeration_View.php?ser={$rows[0]}'> $rows[$j]</td>";
	  
	}
	$j++;

      }

    }

     echo "</table>";

      writePage_pagination($start,$record_count,$per_page,"Registeration_List.php","");
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
