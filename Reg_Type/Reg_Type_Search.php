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
include_once '../menu.php';write_menu('Reg_type');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM1"  action="Reg_Type_Search_fun.php?start=0" method="post">

<BR>
<table>
<tbody>

<TR align="middle">
<TH><FONT size='4'  >الكود : </TH><TH align="right"> <INPUT TYPE="TEXT" NAME="Text1" style="font-size: 10pt; height:25px;width:200px" value="">
</TH>
</TR>

<TR  align="middle">
<TH><FONT size='4'  > نوع العضوية :</TH><TH align="right"><INPUT TYPE="TEXT" NAME="Text2" style="font-size: 10pt; height:25px;width:200px" value=""></TH>
</TR>
</tbody>
</table>
<br><br>
<INPUT type="image" name="b1"  src="../img/search.png">
</FORM>

</BODY>

</HTML>
