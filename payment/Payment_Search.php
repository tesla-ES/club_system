<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>

<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
	<link rel="stylesheet" href="../css/table_css.css">
</head>

<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Payment');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<div class="content_center">
<FORM NAME="FORM1"  action="Payment_Search_fun.php" method="post">

<BR>
<?php
$fin=mysqli_query($con,"select * from Payment");
$n_res=mysqli_num_rows($fin);
?>
<table BORDER=1 RULES=none frame='hsides' cellspacing=5 cellpadding=8 cols=5> 
<thead>
</thead>
<tbody>
<TR align="center">
		<TD><FONT size="4"  > العملية  :</TD><TD align="right">
        <?php
        selectbox_write("operation_type",false,"select_default",false,$con);
        ?>
	</TD></TR>

<TR  align="right" >
<TD><FONT size="4"  >رقم إذن السداد : <INPUT TYPE='TEXT' NAME='Text600'style='font-size: 10pt; height:25px;width:100px' value=''  ></TD>
<TD><FONT size="4"  >رقم العضو : <INPUT TYPE="TEXT" NAME="Text1"style="font-size: 10pt; height:25px;width:100px" value=""  ></TD>
<TD ><FONT size="4"  > نوع العضوية  :</TD><TD align="right">
			<select name="Text2" style="font-size: 10pt; height:25px;width:100px" value="" >";		
<?php
$result = mysqli_query($con,"SELECT Code,Name FROM reg_type where stat=0 ORDER BY Code");
	echo"<option ></option>";
	while($ress=mysqli_fetch_array($result))
			{
			$pops0=$ress["Code"];
			$pops1=$ress["Name"];
			echo"<option value='$pops0'>$pops1</option>";
			}


echo"</select></TD>";
	?>
				<TH ><FONT size="4"  >الحاله :</TH>
				<TD align="right"> <?php  selectbox_write("payment_status",true,"select_default",false,$con);?></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  > سنة المحاسبة  :</TD><TD align="right">
<?php
echo"
<INPUT TYPE='TEXT' NAME='Text33' style='font-size: 10pt; height:25px;width:100px' value=$Curr_Year ></TD>";
?>

<TD><FONT size="4"  > تاريخ إذن السداد  :</TD><TD align="right"><input type="text" name="Text36" style="font-size: 10pt; height:25px;width:65 px" value="">		</TD>
<TD ><FONT size="4"  >رقم السيارة  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text900" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
<TR  align='right' >	<B>		
<TD ><FONT size='5'  > شاطىء  : <INPUT TYPE='checkbox' NAME='chk2' style='font-size: 14pt; height:25px;width:100px'></TD>'
<TD ><FONT size='5'  > شراع  : <INPUT TYPE='checkbox' NAME='chk3' style='font-size: 14pt; height:25px;width:100px' ></TD>
<TD ><FONT size='5'  > جولف  : <INPUT TYPE='checkbox' NAME='chk4' style='font-size: 14pt; height:25px;width:100px'></TD>
<TD ><FONT size='5'  > تنس  : <INPUT TYPE='checkbox' NAME='chk5' style='font-size: 14pt; height:25px;width:100px'></TD>
</TR></B>
		</TR>	
			<TR  align="right">
<TD ><FONT size="4"  > المبلغ المستحق  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text34" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
<TD ><FONT size="4"  > أخرى  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text37" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
<TD ><FONT size="4"  >نسبة الإعفاء  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text35" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>

</TR>
	<TR  align="middle">
<TD colspan="2" align="left"><FONT size="4"  > ملاحظات  :</TD><TD colspan="2" align="right">
	<textarea rows="5" cols="20" style="font-size: 10pt; height:50px;width:200px" NAME="Text39" ></textarea>
</TD>

</TR>


</tbody>

</table>


<INPUT type="image" name="b1"  src="../img/search.png">

</FORM>
</div>

</BODY>

</HTML>
