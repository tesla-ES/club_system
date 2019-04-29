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
			<TR>
					 <TH  align=center ><font size ="5" color="#FFCC00"> التقارير
					 <BR>
					 </TH>
			</TR>
	</Table>

   <?php include_once '../menu.php';write_menu('Reports');


   ?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<div class="content_center">

 <FORM NAME="FORM1" id="idOfForm"  method="post" target='_blank'>
<BR>

<table>

<TR  align="middle">
    <TH ><FONT size="4"  > نوع العضوية  :</TH>
	<TD align="right"><?php selectbox_write("Membership_type",false,"select_default",false,$con);?></TD>
</TR>

<TR  align="middle">
    <TH ><FONT size="4"  > النوع :</TH>
	<TD align="right"> <?php  selectbox_write("employee_type",true,"select_default",false,$con);?></TD>
</TR>
	<TR><TH>	نوع العملية :</TH>	<TD align="right"><?php selectbox_write("operation_type",true,"select_default",false,$con);?></TD></TR>


	<TR  align="middle">
		<TH ><FONT size="4"  >الحاله :</TH>
		<TD align="right"> <?php  selectbox_write("payment_status",false,"select_default",false,$con);?></TD>
	</TR>
	<TR  align="middle">
		<TH ><FONT size="4"  >الفتره من :</TH>
		<TD align="right"> <input id="date_from" name="date_from"  type="date" value="2018-01-01"></TD>
	</TR>
	<TR  align="middle">
		<TH ><FONT size="4"  >الفتره الى :</TH>
		<TD align="right"> <input id="date_to" name="date_to" type="date" value="2018-12-31"></TD>
	</TR>

<TR  align="middle"><TH ><FONT size="4"  > سنه السداد  :</TH><TD align="right">

<?php echo"<INPUT TYPE='TEXT' NAME='payment_year' style='font-size: 10pt; padding-top:5px;height:25px;width:100px' value=$Curr_Year>";?></TD> </TR>

<?php
order_list();
result_count();
?>

</table>
<br><br>
	<!--<button onclick="doPreview('payment_report_all.php?start=0')"> كل الايصالات </butto-->
	    <button onclick="doPreview(this.form.id,'payment_report.php?start=0')">
		الايصالات
		</button>
	<!--<button onclick="doPreview('http://192.168.1.3/Club_System/Reports/payment_report_amount.php?start=0')">  الاعضاء الذين سددوا رسوم العضويه  </button>-->
	<button onclick="doPreview(this.form.id,'payment_report_amount.php?start=0')">
الأعضاء
	</button>
	<!-- <button onclick="doPreview(this.form.id,'segel_payment_report_amount.php?start=0')">
		 السجل شامل المدفوعات
	 </button>
	 -->
	 <button onclick="doPreview(this.form.id,'payment_Latency.php?start=0')">
		تقرير متاخرات المنتسبين
	</button>
</FORM>

</div>
</BODY>

</HTML>
