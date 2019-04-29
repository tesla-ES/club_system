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

<A href="../club_system/login/logout.php" >| خروج </A>
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
                <TH   align=center background="../img/sperator.gif"><A href="../club_system/login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> الصفحة الأساسية </A></TH>
       
        </TD>


        </TR>

    </TABLE>







</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">



<FORM NAME="FORM1"  action="../Club_System/Main_Reg/Main_Reg_Add_fun.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" >



<BR>

<?


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
$fin=mysql_query("select * from Main_reg");
$n_res=mysql_num_rows($fin);




?>
<center>
	<script language="JavaScript" src="../js/ts_picker.js"></script>
<table>
<thead>
</thead>
<tbody>



<Center>
<table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" > 
<thead>
بيانات العضوية
</thead>
<tbody>
<TR  align="right" >
<TD><FONT size="4"  >رقم العضو :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text1"style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value=""  >
</TD>

<TD ><FONT size="4"  > نوع العضوية  :</TD><TD align="right">
	
			<select name="Text2" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value="" >";
			
<?
$result = mysql_query("SELECT Code,Name FROM reg_type ORDER BY Code");
	while($ress=mysql_fetch_array($result))
			{
			$pops0=$ress[Code];
			$pops1=$ress[Name];
			echo"<option value='$pops0'>$pops1</option>";
			}


echo"</select></TD>";
	?>
<TD ><FONT size="4"  >  نوع الأعباء  :</TD><TD align="right">

	<select name="Text3" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value="">";
			
<?
$result1 = mysql_query("SELECT Code,Name FROM secondary_type ORDER BY Code");
	while($resss=mysql_fetch_array($result1))
			{
			$popss0=$resss[Code];
			$popss1=$resss[Name];
				echo"<option value='$popss0'>$popss1</option>";
			}


echo"</select></TD>";

if($pop28!=Null){
echo"
<TH ALIGN=RIGHT  BGCOLOR='#c4c4c4' border=1 ColSpan=2> <FONT color='#FFFFFF'><img src='$pop28'  width='70' height='70'></Font></TH>";
}
?>

</TR>
<TR  align="right">
<TD ><FONT size="4"  > مسلسل  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text4" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value="" ></TD>


<TD><FONT size="4"  > عامل/موظف  :</TD><TD align="right">
	<select name="Text5" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value="">
		<option value="عامل">عامل</option>
		<option value="موظف">موظف</option>

</select></TH></TD>


</TR>
</Tbody>
	</table>
	
	<table BORDER=1 RULES=NONE FRAME="hsides" width=100%>
		<thead>
		البيانات الشخصية
		</thead>
	<TR  align="middle">
<TD><FONT size="4"  > الإسم  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text6" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value=""></TD>

<TD><FONT size="4"  > الإسم فى الكارنيه  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text7" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value=""></TD>

<TD><FONT size="4"  > تاريخ الميلاد  :</TD><TD align="right">
	
	<input type="text" name="Text8" style="font-size: 10pt; padding-top:5px;height:25 px;width:65 px" value="">
	<a href="javascript:show_calendar('document.FORM1.Text8',document.FORM1.Text8.value);">
	<img src="../img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a>
		
		</TD>
</TR>
	<TR  align="middle">
<TD><FONT size="4"  > النوع   :</TD><TD align="right">
	<select name="Text9" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value="">
		<option value="1">ذكر</option>
		<option value="2">أنثى</option>
			</select></TD>

<TD><FONT size="4"  > جهة الميلاد  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text10" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value=""></TD>

<TD><FONT size="4"  > الجنسية  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text11" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value=""></TD>
</TR>
	<TR  align="middle">
<TD><FONT size="4"  > المؤهل  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text12" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value=""></TD>

<TD><FONT size="4"  > تاريخ الحصول على المؤهل  :</TD><TD align="right">
			<input type="text" name="Text13" style="font-size: 10pt; padding-top:5px;height:25 px;width:65 px" value="">
	<a href="javascript:show_calendar('document.FORM1.Text13',document.FORM1.Text13.value);">
	<img src="../img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a>
		</TD>

<TD><FONT size="4"  > الوظيفة  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text14" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value=""></TD>
</TR>
	<TR  align="middle">
<TD><FONT size="4"  > جهة العمل  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text15" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value=""></TD>

<TD><FONT size="4"  > تليفون العمل  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text16" style="font-size: 10pt; padding-top:5px;height:25 px;width:150 px" value=""></TD>

<TD><FONT size="4"  > تليفون المنزل :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text17" style="font-size: 10pt; padding-top:5px;height:25 px;width:150 px" value=""></TD>
</TR>
	<TR  align="middle">
<TD><FONT size="4"  > العنوان  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text18" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value=""></TD>

<TD><FONT size="4"  > الحالة الإجتماعية  :</TD><TD align="right">
	<select name="Text19" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value="">



		<option value="أرمل / مطلق">أرمل / مطلق</option>
		<option value="متزوج">متزوج</option>
			<option value="أعزب">أعزب</option></select></TD>
			</select></TD>
			


<TD><FONT size="4"  > تاريخ القرار  :</TD><TD align="right">
	<input type="text" name="Text20" style="font-size: 10pt; padding-top:5px;height:25 px;width:65 px" value="">
	<a href="javascript:show_calendar('document.FORM1.Text20',document.FORM1.Text20.value);">
	<img src="../img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a>
	</TD>
</TR>
	<TR  align="middle">
<TD ><FONT size="4"  > تحقيق الشخصية  :</TD><TD align="right">
	<select name="Text21" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value="">

				
				<option value="بطاقة شخصية">بطاقة شخصية</option>
						<option value="بطاقة عائلية">بطاقة عائلية</option>	


</select></TD>


<TD ><FONT size="4"  > رقم تحقيق الشخصية  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text22" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value=""></TD>

<TD ><FONT size="4"  > تاريخ صدور تحقيق الشخصية  :</TD><TD align="right">
		<input type="text" name="Text23" style="font-size: 10pt; padding-top:5px;height:25 px;width:65 px" value="">
	<a href="javascript:show_calendar('document.FORM1.Text23',document.FORM1.Text23.value);">
	<img src="../img/cal.gif" width="16" height="16" border="0" alt="Click Here to Pick up the timestamp"></a>
	</TD>

</TR>
		<TR   align="middle">
	<TD><FONT size="4"  > جهة إصدار تحقيق الشخصية  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text24" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value=""></TD>
</TR>
	
	</Table>
		<table BORDER=1 RULES=NONE FRAME="hsides">
	<TR  align="middle">
<TD><FONT size="4"  > أخر سنة سدد عنها  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text25" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value=""></TD>

<TD><FONT size="4"  > عضوية شغالة  :</TD><TD align="right">
	<select name="Text26" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value="">

			
				<option value="1">شغالة</option>
						<option value="0">موقفة</option>
			</select></TD>

</TR>
	<TR  align="middle">
<TD><FONT size="4"  > ملاحظات  :</TD><TD align="right">
	<textarea rows="5" cols="20" style="font-size: 10pt; padding-top:5px;height:50 px;width:200 px" NAME="Text27" ></textarea>
</TD>







</tbody>

</table>
<br><br>

<INPUT type="image" name="b1"  src="../img/save.png">


<br><br><br><br>

</strong>
</font>


</FORM>



</BODY>

</HTML>
