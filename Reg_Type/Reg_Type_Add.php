<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
    <script language="JavaScript" src="calendar_us.js"></script>
    <link rel="stylesheet" href="calendar.css">
</head>

<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Reg_type')
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM1"  action="Reg_Type_Add_fun.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" >
<BR>

<table>
<tbody>

 <TR  align="middle">
<TH><FONT size='4'  >رقم العضوية :</TH><TH align="right"><INPUT TYPE="TEXT" NAME="Text1" style="font-size: 10pt; height:25px;width:200px" value="" maxlength="2"></TH>
</TR>

 <TR  align="middle">
<TH><FONT size='4'  >نوع العضوية :</TH><TH align="right"><INPUT TYPE="TEXT" NAME="Text2" style="font-size: 10pt; height:25px;width:200px" value=""></TH>
</TR>


</tbody>

</table>
<br><br>

<INPUT type="image" name="b1"  src="../img/save.png">

</FORM>



</BODY>

</HTML>
