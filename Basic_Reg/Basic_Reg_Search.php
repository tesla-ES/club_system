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

<FORM NAME="FORM1"  action="Basic_Reg_Search_fun.php" method="post">
<BR>


<table>

<tbody>

<table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" > 
<thead>
بيانات العضوية
</thead>
<tbody>
<TR  align="right" >
<TD><FONT size="4"  >رقم العضو :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text1"style="font-size: 10pt;height:25px;width:100px" value=""  >
</TD>

<TD ><FONT size="4"  > نوع العضوية  :</TD><TD align="right">
	
			<select name="Text2" style="font-size: 10pt;height:25px;width:100px" value="" >";
			
<?php
$result = mysqli_query($con,"SELECT Code,Name FROM reg_type where stat = 0 ORDER BY Code");
	echo"<option ></option>";
	while($ress=mysqli_fetch_array($result))
			{
			$pops0=$ress["Code"];
			$pops1=$ress["Name"];
			echo"<option value='$pops0'>$pops1</option>";
			}

echo"</select></TD>";
	?>
<TD ><FONT size="4"  >  نوع الأعباء  :</TD><TD align="right">
	<select name="Text3" style="font-size: 10pt;height:25px;width:100px" value="">";
<?php
$result1 = mysqli_query($con ,"SELECT Code,Name FROM secondary_type ORDER BY Code");
	echo"<option ></option>";
	while($resss=mysqli_fetch_array($result1))
			{
			$popss0=$resss["Code"];
			$popss1=$resss["Name"];
				echo"<option value='$popss0'>$popss1</option>";
			}


echo"</select></TD>";


?>

</TR>
<TR  align="right">
<TD ><FONT size="4"  > رقم الوالد  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text4" style="font-size: 10pt;height:25px;width:100px" value="" ></TD>


<TD><FONT size="4"  >* عامل/موظف  :</TD><TD align="right">
	<select name="Text5" style="font-size: 10pt;height:25px;width:100px" value="">
		<option ></option>
		<option value="0">عامل</option>
		<option value="1">موظف</option>
		<option value="2">معاشات</option>
		<option value="3">مؤهلات</option>
		<option value="4">عقد</option>
		<option value="5">معار</option>

</select></TH></TD>


</TR>
</Tbody>
	</table>
	
	<table BORDER=1 RULES=NONE FRAME="hsides" width=100%>
		<thead><B>
		البيانات الشخصية
		</thead>
<TR  align="middle">
<TD><FONT size="4"  > الإسم  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text6" style="font-size: 10pt;height:25px;width:200px" value=""></TD>
<TD><FONT size="4"  > تاريخ الميلاد  :</TD><TD align="right"><input type="text" name="Text8" style="font-size: 10pt;height:25px;width:65px" value="">	</TD>
</TR><TR  align="middle">
<TD><FONT size="4"  > النوع   :</TD><TD align="right">
	<select name="Text9" style="font-size: 10pt;height:25px;width:100px" value="">
		<option ></option>	
		<option value="1">ذكر</option>
		<option value="2">أنثى</option>
			</select></TD>

<TD><FONT size="4"  > جهة الميلاد  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text10" style="font-size: 10pt;height:25px;width:200px" value=""></TD>

<TD><FONT size="4"  > الجنسية  :</TD><TD><select name="Text11" style="font-size: 10pt;height:25px;width:100px" value="">
		<option value="0">مصرى</option>
		<option value="1">أخرى</option>
	</select></TD>
	</TR>
	<TR  align="middle">
<TD><FONT size="4"  > المؤهل  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text12" style="font-size: 10pt;height:25px;width:200px" value=""></TD>

<TD><FONT size="4"  > تاريخ الحصول على المؤهل  :</TD><TD align="right">
			<input type="text" name="Text13" style="font-size: 10pt;height:25px;width:65px" value="">

		</TD>

<TD><FONT size="4"  > الوظيفة  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text14" style="font-size: 10pt;height:25px;width:200px" value=""></TD>
</TR>
	<TR  align="middle">
<TD><FONT size="4"  > جهة العمل  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text15" style="font-size: 10pt;height:25px;width:200px" value=""></TD>

<TD><FONT size="4"  > تليفون العمل  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text16" style="font-size: 10pt;height:25px;width:150px" value=""></TD>

<TD><FONT size="4"  > تليفون المنزل :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text17" style="font-size: 10pt;height:25px;width:150px" value=""></TD>
</TR>
	<TR  align="middle">
<TD><FONT size="4"  > العنوان  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text18" style="font-size: 10pt;height:25px;width:200px" value=""></TD>

<TD><FONT size="4"  > الحالة الإجتماعية  :</TD><TD align="right">
	<select name="Text19" style="font-size: 10pt;height:25px;width:100px" value="">

		<option value="0">أرمل / مطلق</option>
		<option value="1">متزوج</option>
		<option value="2">متزوج و يعول</option>
		<option value="3">أعزب</option></select></TD>

<TD><FONT size="4"  > تاريخ القرار  :</TD><TD align="right">
	<input type="text" name="Text20" style="font-size: 10pt;height:25px;width:65px" value="">

	</TD>
</TR>
	<TR  align="middle">
<TD ><FONT size="4"  > تحقيق الشخصية  :</TD><TD align="right">
	<select name="Text21" style="font-size: 10pt;height:25px;width:100px" value="">

				<option ></option>
				<option value="0">بطاقة شخصية</option>
				<option value="1">بطاقة عائلية</option>
</select></TD>

<TD ><FONT size="4"  > رقم تحقيق الشخصية  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text22" style="font-size: 10pt;height:25px;width:100px" value=""></TD>
<TD ><FONT size="4"  > تاريخ صدور تحقيق الشخصية  :</TD><TD align="right">
		<input type="text" name="Text23" style="font-size: 10pt;height:25px;width:65px" value="">
	</TD>

</TR>
		<TR   align="middle">
	<TD><FONT size="4"  > جهة إصدار تحقيق الشخصية  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text24" style="font-size: 10pt;height:25px;width:100px" value=""></TD>
</TR>
	
	</Table>
		<table BORDER=1 RULES=NONE FRAME="hsides">
	<TR  align="middle">
<TD><FONT size="4"  > أخر سنة سدد عنها  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text25" style="font-size: 10pt;height:25px;width:200px" value=""></TD>

<TD><FONT size="4"  > حالة العضوية  :</TD><TD align="right">
	<select name="Text26" style="font-size: 10pt;height:25px;width:100px" value="">

			<option ></option>
				<option value="1">نشطة</option>
				<option value="0">إيقاف مؤقت</option>
				<option value="2">إيقاف دائم</option>
			</select></TD>

</TR>
	<TR align="middle">
<TD><FONT size="4"  > ملاحظات  :</TD><TD align="right">
	<textarea rows="5" cols="20" style="font-size: 10pt;height:50px;width:200px" NAME="Text27" ></textarea>
</TD>
    </TR>
</tbody>

</table>

<br><br>

<INPUT type="image" name="b1"  src="../img/search.png">


</FORM>

</BODY>
</HTML>
