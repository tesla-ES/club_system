<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
<center>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR  >

                 <TH  align=center ><font size ="5" color="#FFCC00">  البيانات الأساسية
                 <BR>
                 </TH>
                 </TR>
                 </Table>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR  >

            <TD VALIGN="top"  >
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="../img/sperator.gif"><A href="Club_Name_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> إضافة </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Club_Name_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> بحث </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Club_Name_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> الصفحة الرئيسية </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../club_system/login/main.php"><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> الصفحة الأساسية </A></TH>
       
        </TD>

        </TR>

    </TABLE>


</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM2"  action="Http://localhost/Club_System/Main_Reg/Main_Reg_View.php?" method="post">
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
////////////assign vars//////////

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


if( !is_null($b_date)){
$b_date_arr=trim($b_date);
$b_date_arr=explode("-", $b_date_arr);
$b_date=$b_date_arr[2].'-'.$b_date_arr[1].'-'.$b_date_arr[0].' ';
}
///////////////////////////////////////////////////////////////
if( !is_null($Grade_Date)){
$Grade_Date_arr=trim($Grade_Date);
$Grade_Date_arr=explode("-", $Grade_Date_arr);
$Grade_Date=$Grade_Date_arr[2].'-'.$Grade_Date_arr[1].'-'.$Grade_Date_arr[0].' ';
}
///////////////////////////////////////////////////////////////
if( !is_null($Hire_date)){
$Hire_date_arr=trim($Hire_date);
$Hire_date_arr=explode("-", $Hire_date_arr);
$Hire_date=$Hire_date_arr[2].'-'.$Hire_date_arr[1].'-'.$Hire_date_arr[0].' ';
}
///////////////////////////////////////////////////////////////
if( !is_null($Social_Date)){
$Social_Date_arr=trim($Social_Date);
$Social_Date_arr=explode("-", $Social_Date_arr);
$Social_Date=$Social_Date_arr[2].'-'.$Social_Date_arr[1].'-'.$Social_Date_arr[0].' ';
}
///////////////////////////////////////////////////////////////

echo"date= $b_date";

///////////////////////////////////////update function
mysql_query("SET CHARACTER_SET_SERVER 'CP1256'"); 
mysql_query("SET NAMES 'CP1256'");
$fin=mysql_query("UPDATE Main_Reg SET 

Employee='$Employee',
Name='$Name',
Name_Card='$Name_Card',
b_date='$b_date',
gender='$gender',
b_place='$b_place',
Nationality='$Nationality',
Education='$Education',
Grade_Date='$Grade_Date',
Job='$Job',
Employer='$Employer',
Job_Tel='$Job_Tel',
Home_Tel='$Home_Tel',
Address='$Address',
Status='$Status',
Hire_date='$Hire_date',
Social_Type='$Social_Type',
Social_No='$Social_No',
Social_Date='$Social_Date',
Place='$Place',
Last_Year='$Last_Year',
Valid='$Valid',
Notes='$Notes'
where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Sec_Type='$Sec_Type'&& Ser='$Ser') ")or die(mysql_error());



////////////////////////////////////////////////////

 // uploading files

if ((($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")|| ($_FILES["file"]["type"] == "image/pjpeg"))&& ($_FILES["file"]["size"] < 2000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {

    if (file_exists("../upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../upload/" . $_FILES["file"]["name"]);

      //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];

      }
    }
  }
else
  {
  echo "Invalid file";
  }


if (($_FILES["file"]["type"] == "image/gif"))
{
	$type=".gif";
}
if(($_FILES["file"]["type"] == "image/jpeg")||($_FILES["file"]["type"] == "image/pjpeg"))
{
	$type=".jpg";
}

/////////////////////////////////////////////////////////////////////replace the file exist
if($Ser==0){
$second_column=  $User_ID."_".$Reg_Type."_".$Sec_Type.$type;
}else{
$second_column=  $User_ID."_".$Reg_Type."_".$Sec_Type."_".$Ser .$type;
}
if (file_exists("../upload/" . $_FILES["file"]["name"]))
      {
       		unlink("../Upload/" .$second_column);
    		rename ( "../Upload/" . $_FILES["file"]["name"],"../Upload/".$second_column);
      }
    
   

   
$second_column="../Upload/".$second_column;


 $query1 = mysql_query("UPDATE Main_Reg SET image ='$second_column'where (User_ID='$User_ID'&& Reg_Type='$Reg_Type'&& Sec_Type='$Sec_Type'&& Ser='$Ser')")or die(mysql_error());;



	///////////////////////////////////////////////////





////////////////////////////////////////////////////
mysql_close( $link);


	header("Location: http://localhost/Club_System/Main_Reg/Main_Reg_View.php?id=$User_ID&name=$Name");

?>
</FORM>
</BODY>
</HTML>
