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
include_once '../menu.php';write_menu('Basic_Reg')
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM1"  action="Basic_Reg_Add_fun.php" method="post" enctype="multipart/form-data"  >
<BR>

<table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" >
<thead>
������ �������
</thead>
<tbody>
<TR  align="right" >
<TD><FONT size="4"  >��� ����� :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text1"style="font-size: 10pt; height:25px;width:100px" value=""  >
</TD>

<TD ><FONT size="4"  > ��� �������  :</TD><TD align="right">

	<select name="Text2" style="font-size: 10pt; height:25px;width:100px" value="" >

<?php

    $result = mysqli_query($con,"SELECT Code,Name FROM reg_type where stat = 0 ORDER BY Code");
	while($ress=mysqli_fetch_array($result))
			{
			$pops0=$ress['Code'];
			$pops1=$ress['Name'];
			echo"<option value='$pops0'>$pops1</option>";
			}

?>
</select></TD>

<TD ><FONT size="4"  >  ��� �������  :</TD><TD align="right">

	<select name="Text3" style="font-size: 10pt; height:25px;width:100px" value="">

<?php
$result1 = mysqli_query($con,"SELECT Code,Name FROM secondary_type ORDER BY Code");
	while($resss=mysqli_fetch_array($result1))
			{
			$popss0=$resss['Code'];
			$popss1=$resss['Name'];
				echo"<option value='$popss0'>$popss1</option>";
			}

?>
</select></TD>

<TH ALIGN=RIGHT  BGCOLOR='#c4c4c4' border=1 ColSpan=2> <FONT color='#FFFFFF'><img src=''  width='70' height='70'></Font></TH>

</TR>

<TD><FONT size="4"  > ��� ������  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text4" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>

<TD><FONT size="4"  >* ����/����  :</TD><TD align="right">
	<select name="Text5" style="font-size: 10pt; height:25px;width:100px" value="">
		<option value="0">����</option>
		<option value="1">����</option>
		<option value="2">������</option>
		<option value="3">������</option>
		<option value="4">���</option>
		<option value="5">����</option>

</select></TD>


<TD><FONT size='4'  > ��� ������  : <INPUT TYPE='TEXT' NAME='Text60' style='font-size: 10pt; height:25px;width:50px' value=''></TD>
<td  align='right' >	<B>
<FONT size='5'> �����  : <INPUT TYPE='checkbox' NAME='chk2' style='font-size: 14pt; height:25px;width:100px'></TD>
<TD ><FONT size='5'> ����  : <INPUT TYPE='checkbox' NAME='chk3' style='font-size: 14pt; height:25px;width:100px' ></TD>
<TD ><FONT size='5'> ����  : <INPUT TYPE='checkbox' NAME='chk4' style='font-size: 14pt; height:25px;width:100px'  ></TD>
</td><TR  align='right' >
<TD ><FONT size='5'> ���  : <INPUT TYPE='checkbox' NAME='chk5' style='font-size: 14pt; height:25px;width:100px'   ></TD>
<TD ><FONT size='5'>����� : <INPUT TYPE='checkbox' NAME='chk6' style='font-size: 14pt; height:25px;width:100px'   ></TD>
<TD ><FONT size='5'>������ : <INPUT TYPE='checkbox' NAME='chk7' style='font-size: 14pt; height:25px;width:100px'   ></TD>
</B></TR>


</Tbody>
	</table>

	<table BORDER=1 RULES=NONE FRAME="hsides" width=100%>
		<thead>
		�������� �������
		</thead>
	<TR  align="middle">
<TD><font color="red" size="4"  > *�����  : </TD><TD align="right"><INPUT TYPE="TEXT" required  NAME="Text6" style="font-size: 10pt; height:25px;width:200px " value="" maxlength="<?php echo $max_length?>" size="<?php echo $max_length?>" onkeyup="textCounter(this,'counter',<?php echo $max_length?>)"><input type="text" readonly size="2" maxlength="2" class ="counter" id="counter" value="<?php echo $max_length?>"></TD>
<TD><font color="red" size="4"  > *����� �������  :</TD><TD align="right">
	<input type="text" name="Text8"  required style="font-size: 10pt; height:25px;width:80px" value="">
		</TD>
</TR>
	<TR align="middle">
<TD><FONT size="4"  > �����   :</TD><TD align="right">
	<select name="Text9" style="font-size: 10pt; height:25px;width:100px" value="">
		<option value="1">���</option>
		<option value="2">����</option>
			</select></TD>

<TD><FONT size="4"  > ��� �������  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text10" style="font-size: 10pt; height:25px;width:200px" value=""></TD>
<TD><FONT size="4"  > �������  :</TD><TD align="right">
	<select name="Text11" style="font-size: 10pt; height:25px;width:100px" value="">
		<option value="0">����</option>
		<option value="1">����</option>
	</select></TD>

</TR>
	<TR  align="middle">
<TD><FONT size="4"  > ������  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text12" style="font-size: 10pt; height:25px;width:200px" value=""></TD>

<TD><FONT size="4"  > ����� ������ ��� ������  :</TD><TD align="right">
			<input type="text" name="Text13" style="font-size: 10pt; height:25px;width:80px" value="">

		</TD>

<TD><font color="red" size="4"  > *�������  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text14" required style="font-size: 10pt; height:25px;width:200px" value="" maxlength="<?php echo $max_length?>" size="<?php echo $max_length?>" onkeyup="textCounter(this,'job_counter',<?php echo $max_length?>)"><input type="text" readonly size="2" maxlength="2" class ="counter" id="job_counter" value="<?php echo $max_length?>"></TD>
</TR>
	<TR  align="middle">
<TD><FONT size="4"  > ��� �����  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text15" style="font-size: 10pt; height:25px;width:200px" value=""></TD>

<TD><FONT size="4"  > ������ �����  :</TD><TD align="right"><INPUT TYPE="TEXT"  NAME="Text16" style="font-size: 10pt; height:25px;width:150px" value=""></TD>

<TD><FONT size="4" color ="red"  > *������ ������ :</TD><TD align="right"><INPUT TYPE="TEXT" required NAME="Text17" style="font-size: 10pt; height:25px;width:150px" value=""></TD>
</TR>
	<TR  align="middle">
<TD><FONT size="4"  > �������  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text18" style="font-size: 10pt; height:25px;width:200px" value=""></TD>

<TD><FONT size="4"  > ������ ����������  :</TD><TD align="right">
	<select name="Text19" style="font-size: 10pt; height:25px;width:100px" value="">



		<option value="0">���� / ����</option>
		<option value="1">�����</option>
		<option value="2">����� � ����</option>
		<option value="3">����</option></select></TD>
			</select></TD>



<TD><FONT size="4"  > ����� ������  :</TD><TD align="right">
	<input type="text" name="Text20" style="font-size: 10pt; height:25px;width:80px" value="">

	</TD>
</TR>
	<TR  align="middle">
<TD ><FONT size="4"  > ����� �������  :</TD><TD align="right">
	<select name="Text21" style="font-size: 10pt; height:25px;width:100px" value="">


				<option value="0">����� �����</option>
				<option value="1">����� ������</option>


</select></TD>


<TD ><FONT size="4"  > ��� ����� �������  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text22" style="font-size: 10pt; height:25px;width:100px" value=""></TD>

<TD ><FONT size="4"  > ����� ���� ����� �������  :</TD><TD align="right">
		<input type="text" name="Text23" style="font-size: 10pt; height:25px;width:65px" value="">

	</TD>

</TR>
		<TR   align="middle">
	<TD><FONT size="4"  > ��� ����� ����� �������  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text24" style="font-size: 10pt; height:25px;width:100px" value=""></TD>
</TR>

	</Table>
		<table BORDER=1 RULES=NONE FRAME="hsides">
	<TR  align="middle">
<TD><FONT size="4"  > ��� ��� ��� ����  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text25" style="font-size: 10pt; height:25px;width:200px" value=""></TD>

<TD><FONT size="4"  > ���� �������  :</TD><TD align="right">
	<select name="Text26" style="font-size: 10pt; height:25px;width:100px" value="">


				<option value="1">����</option>
				<option value="0">����� ����</option>
				<option value="2">����� ����</option>
			</select></TD>

</TR>
	<TR align="middle">
<TD><FONT size="4"  > �������  :</TD><TD align="right">
	<textarea rows="5" cols="20" style="font-size: 10pt; height:50px;width:200px" NAME="Text27" ></textarea>
</TD>
</table>
<br><br>

<INPUT type="image" name="b1"  src="../img/save.png">

</FORM>

</BODY>

</HTML>
