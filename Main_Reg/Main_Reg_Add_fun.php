<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
<center>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR  >

                 <TH  align=center ><font size ="5" color="#FFCC00"> أسماء الأندية
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
                <TH   align=center background="../img/sperator.gif"><A href="../club_system/login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> الصفحة الأساسية </A></TH>
       
        </TD>

        </TR>

    </TABLE>



</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM2"  action="Http://localhost/Club_System/Main_Reg/Main_Reg_List.php" method="post">


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
mysql_query("SET CHARACTER_SET_SERVER 'CP1256'"); 
mysql_query("SET NAMES 'CP1256'");
$fin=mysql_query("select * from Main_Reg");

$n_res=mysql_num_rows($fin);


   ////////////insert values
  

$query = "INSERT INTO Main_reg ( User_ID,Reg_Type,Sec_Type,Ser,Employee,Name,Name_Card,b_date,gender,b_place,Nationality,Education,Grade_Date,Job,Employer,Job_Tel,Home_Tel,Address,Status,Hire_date,Social_Type,Social_No,Social_Date,Place,Last_Year,Valid,Notes )
values ( '$Text1','$Text2','$Text3','$Text4','$Text5','$Text6','$Text7','$Text8','$Text9','$Text10','$Text11','$Text12','$Text13','$Text14','$Text15','$Text16','$Text17','$Text18','$Text19','$Text20','$Text21','$Text22','$Text23','$Text24','$Text25','$Text26','$Text27')";
mysql_query($query) or  die (mysql_error());

    mysql_close( $link);
$User_ID=$Text1;
$Name=$Text6;
		header("Location: Http://localhost/Club_System/Main_Reg/Main_Reg_View.php?id=$User_ID&name=$Name");
?>
<BR>
</FORM>
</BODY>
</HTML>
