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
include_once '../menu.php';write_menu('Secondary_Reg')
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM1"  action="Secondary_Reg_Search_fun.php" method="post">

<BR>


<table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" > 
<thead>
				<FONT size="5" color="#2B60DE"  >
بيانات العضوية
</thead>
<tbody>
<TR  align="right" >
<TD><FONT size="4"  >رقم العضو :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text1"style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value=""  >
</TD>

<TD ><FONT size="4"  > نوع العضوية  :</TD><TD align="right">
	
			<select name="Text2" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="" >";
			
<?php
$result = mysqli_query($con,"SELECT Code,Name FROM reg_type ORDER BY Code");
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

	<select name="Text3" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="">";
			
<?php
$result1 = mysqli_query($con,"SELECT Code,Name FROM secondary_type ORDER BY Code");
	echo"<option ></option>";
	while($resss=mysqli_fetch_array($result1))
			{
			$popss0=$resss["Code"];
			$popss1=$resss["Name"];
				echo"<option value='$popss0'>$popss1</option>";
			}


echo"</select></TD>";
/*
if($pop28!=Null){
echo"
<TH ALIGN=RIGHT  BGCOLOR='#c4c4c4' border=1 ColSpan=2> <FONT color='#FFFFFF'><img src='$pop28'  width='70' height='70'></Font></TH>";
}
*/
?>

</TR>
<TR  align="right">
<TD ><FONT size="4"  > مسلسل  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text4" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="" ></TD>

</TR>
</Tbody>
	</table>
	
	<table BORDER=1 RULES=NONE FRAME="hsides" width=100%>
		<thead>
					<FONT size="5" color="#2B60DE"  >
		البيانات الشخصية
		</thead>
	<TR  align="middle">
<TD><FONT size="4"  > الإسم  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text6" style="font-size: 10pt; padding-top:5px;height:25px;width:200px" value=""></TD>
<TD><FONT size="4"  > تاريخ الميلاد  :</TD><TD align="right">
	
	<input type="text" name="Text8" style="font-size: 10pt; padding-top:5px;height:25px;width:65px" value="">

		
		</TD>
</TR>
	<TR  align="middle">
<TD><FONT size="4"  > النوع   :</TD><TD align="right">
	<select name="Text9" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="">
		<option ></option>	
		<option value="1">ذكر</option>
		<option value="2">أنثى</option>
			</select></TD>

</TR>
<TR align="middle">
	<TD><FONT size="4"  > يعمل / لا يعمل :</TD><TD align="right">
	<select name="Text30" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="">
		<option value="1">يعمل</option>
		<option value="0">لايعمل</option>

</select></TH></TD>
		<TD><FONT size="4"  > متزوج / أعزب  :</TD><TD align="right">
	<select name="Text31" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="">
		<option value="1">متزوج</option>
		<option value="0">أعزب</option>

</select></TH></TD>
		<TD><FONT size="4"  > يصدر / لايصدر له كارنيه  :</TD><TD align="right">
	<select name="Text32" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="">
		<option value="1">يصدر</option>
		<option value="0">لايصدر</option>

</select></TH></TD>
			<TD><FONT size="4"  > ينتهى فى  :</TD><TD align="right">
	<input type="text" name="Text61" style="font-size: 10pt; padding-top:5px;height:25px;width:65px" value="">
		
		</TD>
		
	
</TR>	
	
	
	</Table>
		<table BORDER=1 RULES=NONE FRAME="hsides">

	<TR  align="middle">
<TD><FONT size="4"  > ملاحظات  :</TD><TD align="right">
	<textarea rows="5" cols="20" style="font-size: 10pt; padding-top:5px;height:50px;width:200px" NAME="Text27" ></textarea>
</TD>

</table>

<br>

<INPUT type="image" name="b1"  src="../img/search.png">



</FORM>


</BODY>

</HTML>
