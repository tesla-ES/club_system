<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
    <script src="../js/functions.js" type="text/javascript"> </script>
</head>
<?php
r_header($page_name,$con);
 include_once '../menu.php';write_menu('Reports');
 ?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">


<div class="content_center">
<FORM NAME="FORM1"  action="graterthan_year.php?start=0" method="post" target='_blank'>

<BR>

<table>

<tbody>
<TR  align="middle">
    <TD><FONT size="4"  > �����   :</TD><TD align="right">
        <select name="gender" style="font-size: 10pt; height:25px;width:100px" value="">
            <option value="1">���</option>
            <option value="2" selected >����</option>
        </select></TD>

</TR>
<TR  align="middle">
    <TH><FONT size='4'  >���� �� </TH><TH align="right"> <INPUT TYPE="TEXT" NAME="g_year" style="font-size: 10pt; height:25px;width:100px" value="24">
   ���
    </TH>
</TR>



<TR  align="middle">
    <TH><FONT size='4'  >�� 31  - 12 -  </TH><TH align="right"><INPUT TYPE="TEXT" NAME="c_year" style="font-size: 10pt;height:25px;width:100px" value="2016"></TH>
</TR>

</tbody>

</table>
<br><br>

    <button onclick="doPreview(this.form.id,'graterthan_year.php?start=0')">
        ��� �������
    </button>
</FORM>

</div>
</BODY>

</HTML>
