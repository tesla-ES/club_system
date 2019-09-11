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

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM2"   method="post">
<BR>

<?PHP

$per_page=20;
$start =isset($_REQUEST["start"])? $_REQUEST["start"]:0 ;

$User_ID=isset($_REQUEST["Text1"])? $_REQUEST["Text1"]:0 ;
$Reg_Type=isset($_REQUEST["Text2"])? $_REQUEST["Text2"]:"" ;
$Sec_Type=isset($_REQUEST["Text3"])? $_REQUEST["Text3"]:"" ;
$Ser=isset($_REQUEST["Text4"])? $_REQUEST["Text4"]:"" ;
$Employee=isset($_REQUEST["Text5"])? $_REQUEST["Text5"]:"" ;
$Name=isset($_REQUEST["Text6"])? $_REQUEST["Text6"]:"" ;
//$b_date=$_REQUEST["Text8"])? $_REQUEST["start"]:"" ;
$gender=isset($_REQUEST["Text9"])? $_REQUEST["Text9"]:"" ;
$b_place=isset($_REQUEST["Text10"])? $_REQUEST["Text10"]:"" ;
$Nationality=isset($_REQUEST["Text11"])? $_REQUEST["Text11"]:"" ;
$Education=isset($_REQUEST["Text12"])? $_REQUEST["Text12"]:"" ;
//$Grade_Date=$_REQUEST["Text13"])? $_REQUEST["start"]:"" ;
$Job=isset($_REQUEST["Text14"])? $_REQUEST["Text14"]:"" ;
$Employer=isset($_REQUEST["Text15"])? $_REQUEST["Text15"]:"" ;
$Job_Tel=isset($_REQUEST["Text16"])? $_REQUEST["Text16"]:"" ;
$Home_Tel=isset($_REQUEST["Text17"])? $_REQUEST["Text17"]:"" ;
$Address=isset($_REQUEST["Text18"])? $_REQUEST["Text18"]:"" ;
$Status=isset($_REQUEST["Text19"])? $_REQUEST["Text19"]:"" ;
//$Hire_date=$_REQUEST["Text20"])? $_REQUEST["start"]:"" ;
$Social_Type=isset($_REQUEST["Text21"])? $_REQUEST["Text21"]:"" ;
$Social_No=isset($_REQUEST["Text22"])? $_REQUEST["Text22"]:"" ;
//$Social_Date=$_REQUEST["Text23"])? $_REQUEST["start"]:"" ;
$Place=isset($_REQUEST["Text24"])? $_REQUEST["Text24"]:"" ;
$Last_Year=isset($_REQUEST["Text25"])? $_REQUEST["Text25"]:"" ;
$Valid=isset($_REQUEST["Text26"])? $_REQUEST["Text26"]:"" ;
$Notes=isset($_REQUEST["Text27"])? $_REQUEST["Text27"]:"" ;

$b_date="";
$Grade_Date="";
$Hire_date="";
$Social_Date="";
if(isset($_REQUEST["Text8"])) {
    if (valid_date($_REQUEST["Text8"])) {
        $date1 = explode("/", $_REQUEST["Text8"]); // change date format
        $_REQUEST["Text8"] = $date1[2] . "-" . $date1[1] . "-" . $date1[0];// change date format
        $b_date = $_REQUEST["Text8"];
    }
}

if(isset($_REQUEST["Text13"])) {
if(valid_date($_REQUEST["Text13"])){
	$date2=explode("/",$_REQUEST["Text13"]); // change date format
	$_REQUEST["Text13"]=$date2[2]."-".$date2[1]."-".$date2[0];// change date format
    $Grade_Date= $_REQUEST["Text13"];
}}

if(isset($_REQUEST["Text20"])) {
    if (valid_date($_REQUEST["Text20"])) {
        $date3 = explode("/", $_REQUEST["Text20"]); // change date format
        $_REQUEST["Text20"] = $date3[2] . "-" . $date3[1] . "-" . $date3[0];// change date format
        $Hire_date = $_REQUEST["Text20"];
    }
}

if(isset($_REQUEST["Text23"])) {
    if (valid_date($_REQUEST["Text23"])) {
        $date4 = explode("/", $_REQUEST["Text23"]); // change date format
        $_REQUEST["Text23"] = $date4[2] . "-" . $date4[1] . "-" . $date4[0];// change date format

    }
    $Social_Date = $_REQUEST["Text23"];
}
////////////////////////////////////


$result = mysqli_query($con,"SELECT User_ID,Name,employee,(select Name from reg_type as R where R.code=b.reg_type)
						FROM Basic_Reg as b
						ORDER BY User_ID
						LIMIT $start , $per_page");
$query="select User_ID,Name,Employee,reg_type,(select Name from reg_type as R where R.code=b.reg_type) from Basic_Reg as b where";
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
if(!empty($Employee)){
	$query .=	" &&(Employee = '$Employee')  ";
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
if(!empty($b_place)){
	$query .=	" &&(b_place like '%$b_place%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Nationality)){
	$query .=	" &&(Nationality = '%$Nationality%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Education)){
	$query .=	" &&(Education like '%$Education%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Grade_Date)){
	$query .=	" &&(Grade_Date like '%$Grade_Date%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Job)){
	$query .=	" &&(Job like '%$Job%')  ";
}else{
	$query .=	"  && true  ";
}
if(!empty($Employer)){
	$query .=	" &&(Employer like '%$Employer%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Job_Tel)){
	$query .=	" &&(Job_Tel like '%$Job_Tel%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Home_Tel)){
	$query .=	" &&(Home_Tel like '%$Home_Tel%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Address)){
	$query .=	" &&(Address like '%$Address%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Status)){
	$query .=	" &&(Status = '$Status')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Hire_date)){
	$query .=	" &&(Hire_date like '%$Hire_date%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Social_Type)){
	$query .=	" &&(Social_Type = '$Social_Type')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Social_No)){
	$query .=	" &&(Social_No like '%$Social_No%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Social_Date)){
	$query .=	" &&(Social_Date like '%$Social_Date%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Place)){
	$query .=	" &&(Place like '%$Place%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Last_Year)){
	$query .=	" &&(Last_Year like '%$Last_Year%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Valid)){
	$query .=	" &&(Valid = '$Valid')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Notes)){
	$query .=	" &&(Notes like '%$Notes%')  ";
}else{
	$query .=	" && true  ";
}

$record_count=mysqli_num_rows(mysqli_query($con,$query));
$query .="ORDER BY User_ID  LIMIT $start , $per_page";
$result =  mysqli_query($con,$query);
$max_pages=$record_count / $per_page;


$i = 0;
if($record_count>0){
    echo "<div style='text-align: center' width='100%' > إجمالى عدد الاعضاء  [ $record_count ]</div>";
}
if (($result))
{
  echo "<table width='100%' ><tr BGCOLOR='#7b7b7b'>";

 if ($record_count>0)
  {
          //loop thru the field names to print the correct headers

          while ($i < mysqli_num_fields($result))
          {
				$headers[0]="رقم العضوية";
				$headers[1]="الإسم";
				$headers[2]="كود فرعى";
				$headers[3]="كود";
				$headers[4]="نوع العضوية";
				
         	echo "<th  ALIGN=CENTER><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";
       		$i++;
    	}
    echo "</tr>";
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
	if($j<5){
	  echo "<td ALIGN=Center  > <FONT color='#FFFFFF'><a href='Basic_Reg_View.php?user_id={$rows[0]}&employee={$rows[2]}& reg_type={$rows[3]}'> $rows[$j]</td>";
	       }
	      $j++;
      }
    }

     echo "</table>";
     writePage_pagination($start,$record_count,$per_page,"Basic_Reg_Search_fun.php","&Text1=$User_ID&Text2=$Reg_Type&Text3=$Sec_Type&Text4=$Ser&Text5=$Employee&Text6=$Name&Text8=$b_date&Text9=$gender&Text10=$b_place&Text11=$Nationality&Text12=$Education&Text13=$Grade_Date&Text14=$Job&Text15=$Employer&Text16=$Job_Tel&Text17=$Home_Tel&Text18=$Address&Text19=$Status&Text20=$Hire_date&Text21=$Social_Type&Text22=$Social_No&Text23=$Social_Date&Text24=$Place&Text25=$Last_Year&Text26=$Valid&Text27=$Notes");
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
