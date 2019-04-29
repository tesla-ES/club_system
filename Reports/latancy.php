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


<table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR  >

                 <TH  align=center ><font size ="5" color="#FFCC00"> التقارير 
                 <BR>
                 </TH>
                 </TR>
                 </Table>
   <?php include_once '../menu.php';write_menu('Reports');
   ?>


<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<div class="content_center">
<FORM NAME="FORM1" id="idOfForm" action="" method="post" target='_blank'>
<BR>

<table>
<thead>
</thead>
<tbody>

<TR  align="middle">
<TH><FONT size="4" > نوع العضوية  :</TH>
	<TD  align="right">

		<?php selectbox_write("Membership_type",false,"select_default",false,$con);?>

	</TD>
</TR>

<TR  align="middle">
<TH ><FONT size="4"  > آخر سنه سداد  :</TH><TD align="right">
	<INPUT TYPE="TEXT" NAME="payment_year" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="2017">
</TD> </TR>


<TR  align="middle">
<TH ><FONT size="4"  > لم يتم السداد منذ </TH><TD align="right">
	<INPUT TYPE="TEXT" NAME="year_count" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value="3">
سنوات 
	</TD> </TR>

<?php
order_list();
result_count();
?>

</tbody>

</table>
<br>

	<button onclick="doPreview(this.form.id,'latancy_report.php?start=0')">
		عرض التقرير
	</button>
	


</FORM>
</div>

</BODY>

</HTML>
