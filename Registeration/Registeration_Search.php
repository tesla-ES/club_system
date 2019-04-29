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
include_once '../menu.php';write_menu('Registration');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM1"  action="Registeration_Search_fun.php" method="post">
<BR>

<?php
$fin=mysqli_query($con,"select * from Registeration");
$n_res=mysqli_num_rows($fin);
?>

<table BORDER=1 RULES=none frame='hsides' cellspacing=5 cellpadding=8 cols=4> 
<thead>
</thead>
<tbody>
<TR  align="right" >
<TD ><FONT size="4"  > نوع العضوية  : 
	
			<select name="Text1" style="font-size: 10pt; height:25px;width:100px" value="" >
<?php
			$result = mysqli_query($con,"SELECT Code,Name FROM reg_type ORDER BY Code");
		while($ress=mysqli_fetch_array($result))
			{
			$pops0=$ress["Code"];
			$pops1=$ress["Name"];
		echo"<option value='$pops0'>$pops1</option>";
			}

echo"</select></TD>";
	?>

<TR  >
<TD ><FONT size='4'  > رسم القيد  : <INPUT TYPE='TEXT' NAME='Text2' style='font-size: 10pt; height:25px;width:100px' value='' ></TD>
</TR>
	
<TR  >
<TD ><FONT size='4'  > رسم الصيانة  : <INPUT TYPE='TEXT' NAME='Text3' style='font-size: 10pt; height:25px;width:100px' value='' ></TD>
</TR>
	
	<TR  >
<TD ><FONT size='4'  > إشتراك العضو   : <INPUT TYPE='TEXT' NAME='Text4' style='font-size: 10pt; height:25px;width:100px' value='' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > إشتراك الزوجة  : <INPUT TYPE='TEXT' NAME='Text5' style='font-size: 10pt; height:25px;width:100px' value='' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > إشتراك إبن أكثر من 4 سنوات  : <INPUT TYPE='TEXT' NAME='Text6' style='font-size: 10pt; height:25px;width:100px' value='' ></TD>
</TR>
		
		<TR  >
<TD ><FONT size='4'  > رسم إستمارة  : <INPUT TYPE='TEXT' NAME='Text8' style='font-size: 10pt; height:25px;width:100px' value='' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > إشتراك البنت و أسرتها  : <INPUT TYPE='TEXT' NAME='Text9' style='font-size: 10pt; height:25px;width:100px' value='' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > إشتراك الولد و أسرته  : <INPUT TYPE='TEXT' NAME='Text10' style='font-size: 10pt; height:25px;width:100px' value='' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > رسم الكارنيه  : <INPUT TYPE='TEXT' NAME='Text11' style='font-size: 10pt; height:25px;width:100px' value='' ></TD>
</TR>

		<TR  >
<TD ><FONT size='4'  > الضريبة  : <INPUT TYPE='TEXT' NAME='Text12' style='font-size: 10pt; height:25px;width:100px' value='' ></TD>
</TR>







</tbody>

</table>
<br><br>

<INPUT type="image" name="b1"  src="../img/search.png">

</FORM>

</BODY>

</HTML>
