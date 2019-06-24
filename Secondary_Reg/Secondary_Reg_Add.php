<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
	<link rel="stylesheet" href="../css/table_css.css">
	<script src="../JS/functions.js" type="text/javascript"></script>
</head>

<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Secondary_Reg');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM1"  action="Secondary_Reg_Add_fun.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" >

<BR>


	</table>
	
	<table BORDER=1 RULES=none frame='hsides' cellspacing=5 cellpadding=8 cols=4>
		<thead>
	<FONT size="5" color="#2B60DE"  >
بيانات العضوية
</thead>
<tbody>
<TR  align="right" >
<?php
$User_ID=$_REQUEST["User_ID"];
$Reg_Type=$_REQUEST["Reg_Type"];
$Employee= $_REQUEST["Employee"];

echo"
<TD><FONT size='4'  >رقم العضو :</TD><TD align='right'><INPUT TYPE='TEXT' NAME='Text1'style='font-size: 10pt; padding-top:5px;height:25px;width:100px' value='$User_ID'  >
</TD>

<TD ><FONT size='4'  > نوع العضوية  : 
			<select name='Text2' style='font-size: 10pt; padding-top:5px;height:25px;width:100px' value='' >";
	$result = mysqli_query($con,"SELECT Code,Name FROM reg_type ORDER BY Code");
	while($ress=mysqli_fetch_array($result))
			{
			$pops0=$ress["Code"];
			$pops1=$ress["Name"];
				echo"<option value=$pops0";
				if ($Reg_Type==$pops0)
 					{echo" selected='yes'>";}
				else echo ">"; echo "$pops1</option>";
			}


echo"</select></TD>";
/*
if(isset($pop28) || $pop28!=Null){
echo"
<TH ALIGN=RIGHT  BGCOLOR='#c4c4c4' border=1 ColSpan=2> <FONT color='#FFFFFF'><img src='$pop28'  width='70' height='70'></Font></TH>";
}
*/
echo"</TR><TR  align='right'>";

$Serial = mysqli_query($con,"SELECT Max(Ser) as Max FROM Secondary_Reg Where User_Id='$User_ID' && Reg_Type='$Reg_Type'&& employee='$Employee'");
	while($Serial_Query=mysqli_fetch_array($Serial))
			{$Last_Serial=$Serial_Query["Max"];
			(int)$Last_Serial++;}
echo"<TD ><FONT size='4'  > مسلسل  :</TD><TD align='right'><INPUT TYPE='TEXT' NAME='Text4' style='font-size: 10pt; padding-top:5px;height:25px;width:100px' value='$Last_Serial' ><INPUT TYPE='Hidden' NAME='Text5000' style='font-size: 10pt; padding-top:5px;height:25px;width:100px' value='$Employee' ></TD>";

?>


</TR>
</Tbody>
	</table>
	
	<table BORDER=1 RULES=NONE FRAME="hsides" width=100%>
		<thead>
			<FONT size="5" color="#2B60DE"  >
		البيانات الشخصية
		</thead>
	<TR  align="middle">
	<?php
echo"<TD><FONT  size='4'  > الإسم  :</TD><TD align='right'><INPUT TYPE='TEXT' NAME='Text6' style='font-size: 10pt;height:25px;width:200px' value='' maxlength='$max_length' size='$max_length' required onkeyup=textCounter(this,'counter',$max_length)><input type='text' readonly size='2' maxlength='2' id='counter' class='counter' value='$max_length'><B></TD>
";?>
<TD><FONT color size="4"  > *تاريخ الميلاد  :</TD><TD align="right">
	
	<input type="text" name="Text8" required style="font-size: 10pt; padding-top:5px;height:25px;width:65px" value="">

		
		</TD>
</TR>
	<TR  align="middle">
<TD><FONT size="4"  > النوع   :</TD><TD align="right">
	<select name="Text9" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="">
		<option value="1">ذكر</option>
		<option value="2">أنثى</option>
			</select></TD>
<TD><FONT size="4"  > يعمل / لايعمل   :</TD><TD align="right">
	<select name="Text30" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="">
		<option value="1">يعمل</option>
		<option value="2">لا يعمل</option>
			</select></TD>
<TD><FONT size="4"  > متزوج / أعزب   :</TD><TD align="right">
	<select name="Text31" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="">
		<option value="1">متزوج</option>
		<option value="2">أعزب</option>
			</select></TD>
<TD><FONT size="4"  > يصدر / لايصدر له كارنيه   :</TD><TD align="right">
	<select name="Text32" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="">
		<option value="1">يصدر </option>
		<option value="0">لا يصدر</option>
			</select></TD>			
<TD><FONT size="4"  > ينتهى فى   :</TD><TD align="right">	<input type="text" name="Text61" style="font-size: 10pt; padding-top:5px;height:25px;width:70px" value="">
</TD>
		</TR>

	<TR  align="middle">
<TD><FONT size="4"  > ملاحظات  :</TD><TD align="right">
	<textarea rows="5" cols="20" style="font-size: 10pt; padding-top:5px;height:50px;width:200px" NAME="Text28" ></textarea>
</TD>


</table>
<br>
<INPUT type="image" name="b1"  src="../img/save.png">
</FORM>

</BODY>

</HTML>
