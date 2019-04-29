<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';?>

<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
	<link rel="stylesheet" href="../css/table_css.css">
</head>
<?php
r_header($page_name,$con);
 include_once '../menu.php';write_menu('Reports');
?>

</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<div class="content_center">
<FORM NAME="FORM1"  action="segel_hist_report.php?start=0" method="post" target='_blank'>
<BR>

<table>
<TR>
<TH ><FONT size="4"  > نوع العضوية  :</TH><TD align="right">
	
			<select name="Membership_type" class="select_default">";
			
<?php
$result = mysqli_query($con,"SELECT Code,Name FROM reg_type where code in(13,15,33,41,42) ORDER BY Code");
	while($res=mysqli_fetch_array($result))
			{
			$pops0=$res["Code"];
			$pops1=$res["Name"];
			echo"<option value='$pops0'>$pops1</option>";
			}
echo"</select></TD>";
	?>

</TR>
<TR  align="middle">

<TH ><FONT size="4"  > السنه :</TH><TD align="right">
	<INPUT TYPE="TEXT" NAME="segel_year" style="font-size: 10pt; padding-top:5px;height:25px;width:100px" value=<?php echo $Curr_Year-1;?>>
</TD> </TR>


<?php
order_list();
result_count();
?>

</table>
<br><br>
<INPUT type="image" name="b1"  src="../img/search.png">

</FORM>
</div>
</BODY>

</HTML>
