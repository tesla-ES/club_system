<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
		<? 
session_start();
if(session_is_registered(myusername)){
	echo"<H4 align='left'> ";
	echo"مرحباً   ";
echo"<B>$myusername </B> ";

}
?>

<A href="../Login/logout.php" >| خروج </A>
</H4>
<center>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR  >

                 <TH  align=center ><font size ="5" color="#FFCC00"> البيانات الأساسية
                 <BR>
                 </TH>
                 </TR>
                 </Table>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR  >


           <TD VALIGN="top"  >
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="../img/sperator.gif"><A href="Main_Reg_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> إضافة </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Main_Reg_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> بحث </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Main_Reg_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> الصفحة الرئيسية </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../Login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> الصفحة الأساسية </A></TH>
        </TD>


        </TR>

    </TABLE>



</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">







<FORM NAME="FORM2"   method="post">
<BR>



<?PHP
$dbname="New_Club_DB";
session_start();
if(session_is_registered(myusername)){
$link =mysql_connect();
if(!$link)
{
print "can not connect to the server";
}
if(!mysql_select_db($dbname,$link))
{
print "sorry";



$dberror=mysql_error();
return false;
}
}
///////////////////////////////////////
mysql_query("SET CHARACTER_SET_SERVER 'CP1256'"); 
mysql_query("SET NAMES 'CP1256'");
$fin=mysql_query("select * from Main_Reg");
$n_res=mysql_num_rows($fin);



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


if(!($start))	$start=0;

///////////////////////////




$User_ID=$_POST["Text1"];
$Reg_Type=$_POST["Text2"];
$Sec_Type=$_POST["Text3"];
$Ser=$_POST["Text4"];
$Employee=$_POST["Text5"];
$Name=$_POST["Text6"];
$Name_Card=$_POST["Text7"];
$b_date=$_POST["Text8"];
$gender=$_POST["Text9"];
$b_place=$_POST["Text10"];
$Nationality=$_POST["Text11"];
$Education=$_POST["Text12"];
$Grade_Date=$_POST["Text13"];
$Job=$_POST["Text14"];
$Employer=$_POST["Text15"];
$Job_Tel=$_POST["Text16"];
$Home_Tel=$_POST["Text17"];
$Address=$_POST["Text18"];
$Status=$_POST["Text19"];
$Hire_date=$_POST["Text20"];
$Social_Type=$_POST["Text21"];
$Social_No=$_POST["Text22"];
$Social_Date=$_POST["Text23"];
$Place=$_POST["Text24"];
$Last_Year=$_POST["Text25"];
$Valid=$_POST["Text26"];
$Notes=$_POST["Text27"];

$User_ID=$Text1;
$Reg_Type=$Text2;
$Sec_Type=$Text3;
$Ser=$Text4;
$Employee=$Text5;
$Name=$Text6;
$Name_Card=$Text7;
$b_date=$Text8;
$gender=$Text9;
$b_place=$Text10;
$Nationality=$Text11;
$Education=$Text12;
$Grade_Date=$Text13;
$Job=$Text14;
$Employer=$Text15;
$Job_Tel=$Text16;
$Home_Tel=$Text17;
$Address=$Text18;
$Status=$Text19;
$Hire_date=$Text20;
$Social_Type=$Text21;
$Social_No=$Text22;
$Social_Date=$Text23;
$Place=$Text24;
$Last_Year=$Text25;
$Valid=$Text26;
$Notes=$Text27;
////////////////////////////////////

$max_pages=$record_count / $per_page;
$result = mysql_query("SELECT User_ID,Name,Name_Card
						FROM Main_Reg
						ORDER BY User_ID
						LIMIT $start , $per_page");
$query="select User_ID,Name,Name_Card from Main_Reg where";
if(!empty($User_ID)){	$query .=	" (User_ID = '$User_ID')  ";}else{	$query .=	"  true  ";}
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
if(!empty($b_place)){
	$query .=	" &&(b_place like '%$b_place%')  ";
}else{
	$query .=	" && true  ";
}
if(!empty($Nationality)){
	$query .=	" &&(Nationality like '%$Nationality%')  ";
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

$record_count=mysql_num_rows(mysql_query($query));
$query .="ORDER BY User_ID  LIMIT $start , $per_page";
$result =  mysql_query($query);





/////////////////////////
if (($result)||(mysql_errno == 0))
{
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysql_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers
          $i = 1;
          while ($i <= mysql_num_fields($result))
          {
				$headers[1]="رقم العضوية";
				$headers[2]="الإسم";
				$headers[3]="الإسم فى الكارنيه";	
         	echo "<th  ALIGN=CENTER><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";
       		$i++;
    	}


    echo "</tr>";

    //display the data
$num_rows=1;
    while ($rows = mysql_fetch_array($result,MYSQL_NUM))
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
	if($j<4){
		
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Main_Reg_View.php?id={$rows[0]}&name={$rows[1]}'> $rows[$j]</td>";

	  
	}
	$j++;

      }

    }

/////set up previous & next vars


$prev=$start - $per_page;
$next=$start + $per_page;
$last_rec= floor($record_count/$per_page);
$last_rec=$last_rec*$per_page;






unset($data);



  }else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }
  echo "</table>";

  
  //show Next button
       if($num_rows>$per_page){ 
		if(!($start>=$record_count-$per_page)){
	///////////getting the last page
		echo " <a href='Main_Reg_Search_fun.php?start=$last_rec&Text1=$User_ID&Text2=$Reg_Type&Text3=$Sec_Type&Text4=$Ser&Text5=$Employee&Text6=$Name&Text7=$Name_Card&Text8=$b_date&Text9=$gender&Text10=$b_place&Text11=$Nationality&Text12=$Education&Text13=$Grade_Date&Text14=$Job&Text15=$Employer&Text16=$Job_Tel&Text17=$Home_Tel&Text18=$Address&Text19=$Status&Text20=$Hire_date&Text21=$Social_Type&Text22=$Social_No&Text23=$Social_Date&Text24=$Place&Text25=$Last_Year&Text26=$Valid&Text27=$Notes'><img src='../img/lastpage.gif' alt='Last Page'></a>";
	/////////////getting the next page
		echo " <a href='Main_Reg_Search_fun.php?start=$next&Text1=$User_ID&Text2=$Reg_Type&Text3=$Sec_Type&Text4=$Ser&Text5=$Employee&Text6=$Name&Text7=$Name_Card&Text8=$b_date&Text9=$gender&Text10=$b_place&Text11=$Nationality&Text12=$Education&Text13=$Grade_Date&Text14=$Job&Text15=$Employer&Text16=$Job_Tel&Text17=$Home_Tel&Text18=$Address&Text19=$Status&Text20=$Hire_date&Text21=$Social_Type&Text22=$Social_No&Text23=$Social_Date&Text24=$Place&Text25=$Last_Year&Text26=$Valid&Text27=$Notes'><img src='../img/nextpage.gif' alt='Next Page'></a>";

	}
	   }
  //show prev button
if(!($start<=0)){
 //////////////////getting previous page
echo " <a href='Main_Reg_Search_fun.php?start=$prev&Text1=$User_ID&Text2=$Reg_Type&Text3=$Sec_Type&Text4=$Ser&Text5=$Employee&Text6=$Name&Text7=$Name_Card&Text8=$b_date&Text9=$gender&Text10=$b_place&Text11=$Nationality&Text12=$Education&Text13=$Grade_Date&Text14=$Job&Text15=$Employer&Text16=$Job_Tel&Text17=$Home_Tel&Text18=$Address&Text19=$Status&Text20=$Hire_date&Text21=$Social_Type&Text22=$Social_No&Text23=$Social_Date&Text24=$Place&Text25=$Last_Year&Text26=$Valid&Text27=$Notes'><img src='../img/backpage.gif' alt='Previous Page'></a>";
/////////////getting the first page
echo " <a href='Main_Reg_Search_fun.php?start=0&Text1=$User_ID&Text2=$Reg_Type&Text3=$Sec_Type&Text4=$Ser&Text5=$Employee&Text6=$Name&Text7=$Name_Card&Text8=$b_date&Text9=$gender&Text10=$b_place&Text11=$Nationality&Text12=$Education&Text13=$Grade_Date&Text14=$Job&Text15=$Employer&Text16=$Job_Tel&Text17=$Home_Tel&Text18=$Address&Text19=$Status&Text20=$Hire_date&Text21=$Social_Type&Text22=$Social_No&Text23=$Social_Date&Text24=$Place&Text25=$Last_Year&Text26=$Valid&Text27=$Notes'><img src='../img/first.gif' alt='First Page'></a>";
}


}else{
  echo "Error in running query :". mysql_error();
}



/*
$User_ID="";
$Reg_Type="";
$Sec_Type="";
$Ser="";
$Employee="";
$Name="";
$Name_Card="";
$b_date="";
$gender="";
$b_place="";
$Nationality="";
$Education="";
$Grade_Date="";
$Job="";
$Employer="";
$Job_Tel="";
$Home_Tel="";
$Address="";
$Status="";
$Hire_date="";
$Social_Type="";
$Social_No="";
$Social_Date="";
$Place="";
$Last_Year="";
$Valid="";
$Notes="";
*/
?>

</FORM>





</BODY>

</HTML>
