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
 include_once '../menu.php';write_menu('Reports')?>

</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<BR>
<div class="content_center">
<table>

<tbody>

<TR  align="middle">
<TH ><FONT size="6"  > <img src="../img/home.gif" border="0" > لائـــحـه النــادى العام    : </TH>

<TD align="right"> <a href="reg.pdf" target='_blank'> إعرض اللائحه </a></TD>
</TR>	

<TH ><FONT size="4"  > <img src="../img/home.gif" border="0" > استماره عضويه الهيئه :</TH>
<TD align="right"><a href="estmara.pdf" target='_blank'>إعرض الاستماره</a></TD>
</TR>	
			
<TH ><FONT size="4"  > <img src="../img/home.gif" border="0" > استمارة عضوية الزائر:</TH>
<TD align="right"><a href="entsab.pdf" target='_blank'>إعرض الاستماره</a></TD>
</TR>		
<TH ><FONT size="4"  > <img src="../img/home.gif" border="0" >استماره عضويه مؤقته  :</TH>
<TD align="right"><a href="variable.pdf" target='_blank'>إعرض الاستماره</a></TD>
</TR>
</TR>
<TH ><FONT size="4"  color ="brown" >========</TH>
</TR>
<TH ><FONT size="4"  color ="brown" >الارشيف :</TH>

</TR>
<TH ><FONT size="4"  color ="brown" >========</TH>
</TR>
<TH ><FONT size="4"  color = "red" >  1- لائحة النادى العام 2017:</TH>
<TD align="right" ><a href="reg2018.pdf" target='_blank' > إعرض اللائحه </a></TD>
</TR>
	
</tbody>
</table>
 </div>

</BODY>

</HTML>
