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
include_once '../menu.php';write_menu('Payment');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM2"   method="post">
<BR>

<?php
$fin=mysqli_query($con,"select * from Payment where status = 0");
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


///////////////////////////
$start=isset($_REQUEST["start"])?$_REQUEST["start"]:0 ;
	$User_ID=$_REQUEST["Text1"];
	$Reg_Type=$_REQUEST["Text2"];
	$Pay_Year=$_REQUEST["Text33"];
	$Total=$_REQUEST["Text34"];
	$Notes=$_REQUEST["Text39"];
	$Receipt_No=$_REQUEST["Text600"];
	$Operation=$_REQUEST["operation_type"];
	$car=$_REQUEST["Text900"];
	$Exe_Val=$_REQUEST["Text35"];
$Beach=isset($_REQUEST["chk2"])? $_REQUEST["chk2"]:0;
$Yacht=isset($_REQUEST["chk3"])? $_REQUEST["chk3"]:0;
$Golf=isset($_REQUEST["chk4"])? $_REQUEST["chk4"]:0;
$Tennis=isset($_REQUEST["chk5"])? $_REQUEST["chk5"]:0;

	$Others=$_REQUEST["Text37"];
     $Pay_Date_=$_REQUEST["Text36"];
     $payment_status=$_REQUEST["payment_status"];
	////////////////////////////

if(!empty($_REQUEST["Text36"])){
	$date1=explode("/",$_REQUEST["Text36"]); // change date format
	$Pay_Date=$date1[2]."-".$date1[1]."-".$date1[0];// change date format
}




				/*if($myusername == 'admin'){
				$result = mysql_query("SELECT User_ID,Reg_Type,Pay_Year,Receipt_No
						FROM Payment 
						ORDER BY User_ID
						LIMIT $start , $per_page");
				}else{
				$result = mysql_query("SELECT User_ID,Reg_Type,Pay_Year,Receipt_No
						FROM Payment where status = 0
						ORDER BY User_ID
						LIMIT $start , $per_page");
*/
				//}
$query="select
 P.User_ID,
(select R.Name from reg_type as R where R.code=P.reg_type),
P.Pay_Year,
P.Receipt_No,
(select B.Name from basic_reg as B where (P.User_ID =B.User_ID ) &&(P.Reg_Type =B.Reg_Type )&&(P.Employee =B.Employee )  )  ,
(select op_name from operation_type where op_id = Operation)as Operation ,
(SELECT name from payment_status where code = status) as payment_name ,
Pay_Date ,
P.employee,
P.reg_type
from Payment   as P where ";
if(!empty($User_ID)){
	$query .=	" (P.User_ID = '$User_ID' ) "; //and status = 0
}else{
	$query .=	"  true  ";
}
if(!empty($Reg_Type)){
	$query .=	" && (P.Reg_Type = '$Reg_Type' ) ";
}else{
	$query .=	" && true  ";
}
if(!empty($Pay_Year)){
	$query .=	" &&(P.Pay_Year = '$Pay_Year' )  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Total)){
	$query .=	" &&(P.Total = '$Total')  ";
}else{
	$query .=	" && true  ";
}

if(!empty($Pay_Date)){
	$query .=	" &&(P.Pay_Date like '%$Pay_Date%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Receipt_No)){
	$query .=	" &&(P.Receipt_No like '%$Receipt_No%' )  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Operation)){
	$query .=	" &&(P.Operation like '%$Operation%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($car)){
	$query .=	" &&(P.car like '%$car%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Exe_Val)){
	$query .=	" &&(P.Exe_Val like '%$Exe_Val%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Beach)){
	$query .=	" &&(P.Beach like '%$Beach%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Yacht)){
	$query .=	" &&(P.Yacht like '%$Yacht%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Golf)){
	$query .=	" &&(P.Golf like '%$Golf%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Tennis)){
	$query .=	" &&(P.Tennis like '%$Tennis%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Others)){
	$query .=	" &&(P.Others like '%$Others%')  ";
}else{
	$query .=	" && true  ";
}

if(!empty($Notes)){
	$query .=	" &&(P.Notes like '%$Notes%')  ";
}else{
	$query .=	" && true  ";
}
if($payment_status=="all") {
	$query .=	" && true  ";}
	else{
	$query .= " &&(P.status= $payment_status)  ";
}
$record_count=mysqli_num_rows(mysqli_query($con,$query));
$max_pages=$record_count / $per_page;
$query .="ORDER BY User_ID  LIMIT $start , $per_page";

$result =  mysqli_query($con,$query);

/////////////////////////
if (($result)||(mysqli_errno($con) == 0))
{
    $i = 0;
  echo "<center><table width='100%' class='gridtable'><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i < mysqli_num_fields($result)-2)
          {
				$headers[0]="رقم العضوية";
				$headers[1]="نوع العضوية";
				$headers[2]="سنة المحاسبة";
				$headers[3]="رقم الإيصال";
				$headers[4]="الإسم";
			    $headers[5]="نوع العمليه";
			    $headers[6]="نوع الايصال ";
			    $headers[7]="تاريخ الايصال ";

				Echo "<th  ALIGN=CENTER>". $headers[$i] . "</th>";
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
	if($j<8){
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Payment_View.php?id={$rows[0]}&type={$rows[9]}&year={$rows[2]}&receipt_no={$rows[3]}&employee={$rows[8]}'> $rows[$j]</td>";
	}
	$j++;
      }
    }
      echo "</table>";

/////set up previous & next vars
     writePage_pagination($start,$record_count,$per_page,"Payment_Search_fun.php","&Text1=$User_ID&Text2=$Reg_Type&Text33=$Pay_Year&Text34=$Total&Text35=$Exe_Val&Text36=$Pay_Date_&Text37=$Others&Text39=$Notes");

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
