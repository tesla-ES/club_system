
<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>
<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Honor');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM1"  action="Honor_Add_fun.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" >

<BR>


<table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" > 
<thead>
	<FONT size='5' color='#2B60DE'  >	
������ �������
</thead>
<tbody>
<TR  align="right" >
<TD><FONT size="4"  >��� ����� :<INPUT TYPE="TEXT" NAME="Text1"style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value=""  >
</TD>
</TR><TR>
<TD ><FONT size="4"  > ��� �������  :
	
			<select name="Text2" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="" >";
			
<?php
$result = mysqli_query($con,"SELECT Code,Name FROM reg_type ORDER BY Code");
	while($ress=mysqli_fetch_array($result))
			{
			$pops0=$ress["Code"];
			$pops1=$ress["Name"];
			echo"<option value='$pops0'>$pops1</option>";
			}

echo"</select></TD></TR>";
	?>

<TR  >
<TD Colspan=2><FONT size="4"  > �� ���  : <INPUT TYPE="TEXT" NAME="Text44" style="font-size: 10pt; padding-top:5px;height:25 px;width:100 px" value="" ></TD>
</TR>			
<TR>	
	<TD><FONT size="4"  >����� ��  :
	<input type="text" name="Text45" style="font-size: 10pt; padding-top:5px;height:25px;width:65px" value="">
		</TD>
	
</TR>
<TR  >
<TD Colspan=2><FONT size="4"  > �����  : <INPUT TYPE="TEXT" NAME="Text46" style="font-size: 10pt; padding-top:5px;height:25px;width:200px" value="" ></TD>
</TR>
<TR  >
<TD Colspan=2><FONT size="4"  > �������  : <INPUT TYPE="TEXT" NAME="Text48" style="font-size: 10pt; padding-top:5px;height:25px;width:200px" value="" ></TD>
</TR>
<TR  >
<TD Colspan=2><FONT size="4"  > ���  : <INPUT TYPE="TEXT" NAME="Text49" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="" ></TD>
</TR>
	<TR>
<TD><FONT size="4"  > ��� : 
	<select name="Text50" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="">
		<option value="1">�� �����</option>
		<option value="0">�� ��� �����</option>
    </select>
</TD></TR>
<TR>
	<TD><FONT size="4"  > ��������  :</TD><TD align="right">
	<select name="Text500" style="font-size: 10pt; padding-top:5px;height:25px;width:200px" value="">
	<option value="0"> </option>
	<option value="1">�����</option>
	<option value="2">�����-����</option>
	<option value="3">�����-����</option>
	<option value="4">�����-����-����</option>
	<option value="5">����-����</option>
	<option value="6">����</option>
	<option value="7">����</option>
	<option value="8">���� �������</option>

</select></TD></TR>


</tbody>

</table>
<br><br>

<INPUT type="image" name="b1"  src="../img/save.png">

</FORM>

</BODY>

</HTML>
