<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../Reports/css/table_css.css">
    <script language="JavaScript" src="calendar_us.js"></script>
    <link rel="stylesheet" href="calendar.css">
</head>

<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Reg_type')
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM1"  action="Reg_Type_Update.php" method="post" enctype="multipart/form-data">

<BR>

<?php

$id=$_REQUEST["id"];

$fin=mysqli_query($con,"select * from Reg_Type where Code ='$id'");
$n_res=mysqli_num_rows($fin);


while($res=mysqli_fetch_array($fin))
{
$pop1=$res["Code"];
$pop2=$res["Name"];
}
echo "

<table>
<tbody>
<TR  align='middle'>
<TH><FONT size='4'  >الكود :</TH><TH align='right'><INPUT TYPE='TEXT' NAME='Text1'style='font-size: 10pt; height:25px;width:200px' value='$pop1' READONLY>

</TH>
";
echo "
</TR>

<TR  align='middle'>
<TH><FONT size='4'  > نوع العضوية :</TH><TH align='right'><INPUT TYPE='TEXT' NAME='Text2' style='font-size: 10pt; height:25px;width:200px' value='$pop2'></TH>
</TR>
</tbody>
</table>
<br>
<hr />
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background='../img/sperator.gif'  >
        <TR><TD VALIGN='top'>
                <img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
<TH   align=center background='../img/sperator.gif'><A href='Reg_Type_Delete.php?id=$pop1' ><img src='../img/delete.png' border='0' width='26' height='26'><br clear='all'> حذف </A></TH>
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
