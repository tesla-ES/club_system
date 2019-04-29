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
include_once '../menu.php';write_menu('Registration');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM1"  action="Registeration_Update.php" method="post" enctype="multipart/form-data">

<BR>

<?php
$ser=$_REQUEST["ser"];
$fin=mysqli_query($con,"select * from Registeration where Ser ='$ser'");
$n_res=mysqli_num_rows($fin);


while($res=mysqli_fetch_array($fin))
{
$pop1=$res["Ser"];
$pop2=$res["Reg_Cost"];
$pop3=$res["Main_Cost"];
$pop4=$res["Reg_Main_Cost"];
$pop5=$res["Wife_Cost"];
$pop6=$res["More_Cost"];
$pop8=$res["Form_Cost"];
$pop9=$res["Daughter_Cost"];
$pop10=$res["Son_Cost"];
$pop11=$res["Card_Cost"];
$pop12=$res["Tax"];
$pop13=$res["car"];
$pop14=$res["invitation"];
$pop15=$res["car2"];
$pop16=$res["invitation2"];
$pop17=$res["Lost"];
$pop18=$res["Damaged"];
}

echo "

<table > 
<thead>
</thead>
<tbody>
<TR  align='right' >

<TD ><FONT size='4'  > كود العضوية  : 
	
			<select name='Text1' style='font-size: 10pt; height:25px;width:200px' value=$pop1 >";
$result = mysqli_query($con,"SELECT Code,Name FROM reg_type ORDER BY Code");
	while($ress=mysqli_fetch_array($result))
			{
			$pops0=$ress["Code"];
			$pops1=$ress["Name"];
			echo"<option value=$pops0";
				if ($pop1==$pops0)
 					{echo" selected='yes'>";}
				else echo ">"; echo "$pops1</option>";
			}


echo"</select></TD>

</TR>
<TR  >
<TD ><FONT size='4'  > رسم القيد  : <INPUT TYPE='TEXT' NAME='Text2' style='font-size: 10pt; height:25px;width:100px' value='$pop2' ></TD>
</TR>
	
<TR  >
<TD ><FONT size='4'  > رسم الصيانة  : <INPUT TYPE='TEXT' NAME='Text3' style='font-size: 10pt; height:25px;width:100px' value='$pop3' ></TD>
</TR>
	
	<TR  >
<TD ><FONT size='4'  > إشتراك العضو   : <INPUT TYPE='TEXT' NAME='Text4' style='font-size: 10pt; height:25px;width:100px' value='$pop4' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > إشتراك الزوجة  : <INPUT TYPE='TEXT' NAME='Text5' style='font-size: 10pt; height:25px;width:100px' value='$pop5' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  >إشتراك إبن أكثر من 4 سنوات   : <INPUT TYPE='TEXT' NAME='Text6' style='font-size: 10pt; height:25px;width:100px' value='$pop6' ></TD>
</TR>
		
		<TR  >
<TD ><FONT size='4'  > رسم إستمارة  : <INPUT TYPE='TEXT' NAME='Text8' style='font-size: 10pt; height:25px;width:100px' value='$pop8' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > إشتراك البنت و أسرتها  : <INPUT TYPE='TEXT' NAME='Text9' style='font-size: 10pt; height:25px;width:100px' value='$pop9' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > إشتراك الولد و أسرته  : <INPUT TYPE='TEXT' NAME='Text10' style='font-size: 10pt; height:25px;width:100px' value='$pop10' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > رسم الكارنيه  : <INPUT TYPE='TEXT' NAME='Text11' style='font-size: 10pt; height:25px;width:100px' value='$pop11' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > الضريبة  : <INPUT TYPE='TEXT' NAME='Text12' style='font-size: 10pt; height:25px;width:100px' value='$pop12' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > السيارة  : <INPUT TYPE='TEXT' NAME='Text13' style='font-size: 10pt; height:25px;width:100px' value='$pop13' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > دعوة المرافق  : <INPUT TYPE='TEXT' NAME='Text14' style='font-size: 10pt; height:25px;width:100px' value='$pop14' ></TD>
</TR>	
<TR  >
<TD ><FONT size='4'  > السيارة  : <INPUT TYPE='TEXT' NAME='Text15' style='font-size: 10pt; height:25px;width:100px' value='$pop15' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  > دعوة المرافق  : <INPUT TYPE='TEXT' NAME='Text16' style='font-size: 10pt; height:25px;width:100px' value='$pop16' ></TD>
</TR>	
		<TR  >
<TD ><FONT size='4'  >بدل فاقد  :<INPUT TYPE='TEXT' NAME='Text17' style='font-size: 10pt; height:25px;width:100px' value='$pop17' ></TD>
</TR>
		<TR  >
<TD ><FONT size='4'  >بدل تالف  :<INPUT TYPE='TEXT' NAME='Text18' style='font-size: 10pt; height:25px;width:100px' value='$pop18' ></TD>
</TR>			
</Tbody>
	</table>

<br>
<hr />


<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background='../img/sperator.gif'  > 
        <TR  >


            <TD VALIGN='top'  >

                <img src='../img/sperator.gif' border='0' width='2' height='40'></TH>

<TH   align=center background='../img/sperator.gif'><A href='Registeration_Delete.php?Ser=$pop1' ><img src='../img/delete.png' border='0' width='26' height='26'><br clear='all'> حذف </A></TH>
<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
<TH   align=center background='../img/sperator.gif'><INPUT type='image' name='b3'src='../img/update.gif' width='26' height='26'><br clear='all'> تعديل  </A></TH>
<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
</TD>
</TR>
</Table>
";

?>


</FORM>


</BODY>

</HTML>
