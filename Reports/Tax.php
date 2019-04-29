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
<FORM NAME="FORM1"  action="../Reports/Tax_report.php?start=0" method="post"target='_blank'>
<BR>

<table>

<tbody>
<TR  align="middle">
<TH><FONT size='4'  >شهر : </TH><TH align="right"> <INPUT TYPE="TEXT" NAME="h_month" style="font-size: 10pt; height:25px;width:200px" value="">
</TH>
</TR>

<TR  align="middle">
<TH><FONT size='4'  >السنه :</TH><TH align="right"><INPUT TYPE="TEXT" NAME="h_year" style="font-size: 10pt; height:25px;width:200px" value=""></TH>
</TR>

</tbody>

</table>
<br><br>
    <button onclick="doPreview(this.form.id,'../Reports/Tax_report.php?start=0')">
        عرض التقرير
    </button>

</FORM>

</div>
</BODY>

</HTML>
