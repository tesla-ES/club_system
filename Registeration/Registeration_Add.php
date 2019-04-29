<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl xmlns="http://www.w3.org/1999/html">
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

<FORM NAME="FORM1"  action="Registeration_Add_fun.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" >
<BR>
<?php
$fin=mysqli_query($con,"select * from Registeration");
$n_res=mysqli_num_rows($fin);
$reg_type="";

if(isset($_REQUEST['type'])){
    $reg_type=$_REQUEST['type'];
}elseif(isset($_REQUEST['reg_type'])){
    $reg_type=$_REQUEST['reg_type'];
}
echo "
<table > 

<tbody>
<TR  align='right'>

<TD ><FONT size='4'> نوع العضوية  : 
	</FONT></TD><td>
			<select name='Text1' style='font-size: 10pt; height:25px;width:100px' value='' >";
			$result = mysqli_query($con,"SELECT Code,Name FROM reg_type ORDER BY Code");
		while($ress=mysqli_fetch_array($result))
			{
			$pops0=$ress["Code"];
			$pops1=$ress["Name"];
			echo"<option value=$pops0";
				if ($reg_type==$pops0)
 					{echo" selected='yes'>";}
				else echo ">"; echo "$pops1</option>";
			}

echo"</select></TD>";
	?>

</TR><TR  align="right">
<TD ><FONT size="4"  >رسم القيد  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text2" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >رسم الصيانة  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text3" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >إشتراك العضو   :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text4" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >إشتراك الزوجة  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text5" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >إشتراك إبن أكثر من 4 سنوات  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text6" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >رسم إستمارة  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text8" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >إشتراك البنت و أسرتها  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text9" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >إشتراك الولد و أسرته  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text10" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >رسم الكارنيه  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text11" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >الضريبة  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text12" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>

<TR  align="right">
<TD ><FONT size="4"  >السيارة  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text13" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >دعوة المرافق  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text14" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >السيارة  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text15" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >دعوة المرافق  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text16" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >بدل فاقد  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text17" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<TR  align="right">
<TD ><FONT size="4"  >بدل تالف  :</TD><TD align="right"><INPUT TYPE="TEXT" NAME="Text18" style="font-size: 10pt; height:25px;width:100px" value="" ></TD>
</TR>
<tr>
   <td colspan="2"><INPUT type="image" name="b1"  src="../img/save.png"></td>
</tr>
</FORM>

</table>



</BODY>

</HTML>
