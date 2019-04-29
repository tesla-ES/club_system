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
include_once '../menu.php';write_menu('Wife_Reg');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM1"  action="Wife_Reg_Add_fun.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" >
<BR>

<table>

<tbody>
<Center>
<table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" > 
<thead>
		<FONT size="5" color="#2B60DE"  >
بيانات العضوية
</thead>
<tbody>
<TR  align="right" >
<?php
$Employee=$_REQUEST["Employee"];
$User_ID=$_REQUEST["User_ID"];
$Reg_Type=$_REQUEST["Reg_Type"];
echo"
<INPUT TYPE='Hidden' NAME='Text5000' style='font-size: 10pt; height:25px;width:100px' value='$Employee' >
<TD><FONT size='4'  >رقم العضو :</TD><TD align='right'><INPUT TYPE='TEXT' NAME='Text1'style='font-size: 10pt; height:25px;width:100px' value='$User_ID'  >
</TD>

<TD ><FONT size='4'  > نوع العضوية  : 
			<select name='Text2' style='font-size: 10pt; height:25px;width:100px' value='' >";
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
echo"</select>
	</TD>
";
	/*
if($pop28!=Null){
echo"
<TH ALIGN=RIGHT  BGCOLOR='#c4c4c4' border=1 ColSpan=2> <FONT color='#FFFFFF'><img src='$pop28'  width='70' height='70'></Font></TH>";
}*/
echo"
</TR>
<TR  align='right'>";
$Serial = mysqli_query($con,"SELECT Max(Ser) as Max FROM Wife_Reg Where User_Id='$User_ID' && Reg_Type='$Reg_Type'");
	while($Serial_Query=mysqli_fetch_array($Serial))
			{$Last_Serial=$Serial_Query["Max"];
			(int)$Last_Serial++;}
echo"<TD ><FONT size='4'  > مسلسل  :</TD><TD align='right'><INPUT TYPE='TEXT' NAME='Text4' style='font-size: 10pt; height:25px;width:100px' value='$Last_Serial' ></TD>";

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
<TD><FONT color = "red" size="4"  > *الإسم  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text6" required style="font-size: 10pt; height:25px;width:200px" value="" maxlength='<?php echo $max_length?>' size='<?php echo $max_length?>' onkeyup=textCounter(this,'counter',<?php echo $max_length?>)><input type='text' class="counter" readonly size='2' maxlength='2' id='counter' value='<?php echo $max_length?>'></TD>
<TD><FONT size="4"  > الإسم فى الكارنيه  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text7" style="font-size: 10pt; height:25px;width:200px" value=""></TD>

<TD><FONT size="4"  > تاريخ الميلاد  :</TD><TD align="right">
	
	<input type="text" name="Text8" style="font-size: 10pt; height:25px;width:65px" value="">

		
		</TD>
</TR>
	<TR  align="middle">
<TD><FONT size="4"  > النوع   :</TD><TD align="right">
	<select name="Text9" style="font-size: 10pt; height:25px;width:100px" value="">
		<option value="1">ذكر</option>
		<option value="2">أنثى</option>
			</select></TD>


<TD><FONT size="4"  > جهة العمل  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text15" style="font-size: 10pt; height:25px;width:200px" value=""></TD>
<TD><FONT size="4"  > يصدر / لايصدر له كارنيه   :</TD><TD align="right">
	<select name="Text32" style="font-size: 10pt; height:25px;width:100px" value="">

			
				<option value="1">يصدر</option>
				<option value="0">لا يصدر</option>
			</select></TD>

</TR>
	</Table>
		<table BORDER=1 RULES=NONE FRAME="hsides">

	<TR  align="middle">
<TD><FONT size="4"  > ملاحظات  :</TD><TD align="right">
	<textarea rows="5" cols="20" style="font-size: 10pt; height:50px;width:200px" NAME="Text28" ></textarea>
</TD>
    </TR>

</tbody>

</table>
<br><br>

<INPUT type="image" name="b1"  src="../img/save.png">

</FORM>

</BODY>

</HTML>
