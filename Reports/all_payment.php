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
        <TR>   <TH  align=center ><font size ="5" color="#FFCC00"> ��������
			<BR>  </TH>
		</TR>
</Table>


   <?php include_once '../menu.php';write_menu('Reports');?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<div class="content_center">
<FORM NAME="FORM1" id="idOfForm"  method="post" target='_blank'>
<BR>


<table>

<TR  align="middle">
<TH ><FONT size="4"  > ��� �������  :</TH><TD align="right">

		<?php
		selectbox_write("Membership_type",true,'select_default',false,$con);
		?>
	</TD>
</TR>

<TR  align="middle">
<TH ><FONT size="4"  > ��� ������  :</TH><TD align="right">
		<?php
		echo"<INPUT TYPE='TEXT' NAME='payment_year' style='font-size: 10pt;height:25px;width:200px' value=$Curr_Year>";
		?>

</TD> </TR>
	<TR>
		<TH>
			��� ������� :
		</TH>

		<TD align="right">
			<?php
			selectbox_write("operation_type",true,'select_default',false,$con);
			?>
		</TD>
	</TR>
</table>
<br><br>
	<!--<button onclick="doPreview('http://192.168.1.3/Club_System/Reports/all_payment_report.php?start=0')">��� ������� �������� ����������</button>-->
	<button onclick="doPreview(this.form.id,'all_payment_report_totals.php?start=0')">
		������ ��������� ������ ������
	</button>

<button onclick="doPreview(this.form.id,'all_payment_report_totals_esalat.php?start=0')">
		���������
	</button>

    <!--<button onclick="doPreview('http://192.168.1.3/Club_System/Reports/all_payment_report_all.php?start=0')">��� ������� �������� ���������� ������ </button> -->
	<!--<button onclick="doPreview(this.form.id,'all_payment_report_totals_all.php?start=0')">������ ���������</button>
-->

</FORM>
</div>
</BODY>
</HTML>
