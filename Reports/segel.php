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
<!--<FORM NAME="FORM1"  action="http://192.168.1.3/Club_System/Reports/segel_report.php?start=0" method="post" target='_blank'>-->
<FORM NAME="FORM1"  id="idOfForm" method="post" target='_blank'>
<BR>



<table>
<tbody>
<TR>
<TH ><FONT size="4"  > نوع العضوية  :</TH><TD align="right">
   <?php
      selectbox_write("Membership_type",0,"select_default",0,$con);
	?>
</TD>
</TR>

<?php
order_list();
result_count();
?>


</tbody>

</table>
<br><br>
	<button onclick="doPreview(this.form.id,'segel_report.php?start=0')"> عرض سجل الاعضاء </button>
	<button onclick="doPreview(this.form.id,'segel_count_report.php?start=0')"> عدد الاعباء  </button>


</FORM>

</div>
</BODY>

</HTML>
