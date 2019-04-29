<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
		<? 
session_start();
if(session_is_registered(myusername)){
	echo"<H4 align='left'> ";
	echo"مرحباً   ";
echo"<B>$myusername </B> ";

}
?>

<A href="http://192.168.1.3/club_system/login/logout.php" >| خروج </A>
</H4>
<center>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR  >

                 <TH  align=center ><font size ="5" color="#FFCC00"> التقارير 
                 <BR>
                 </TH>
                 </TR>
                 </Table>
   <?php include_once '../menu.php';write_menu('Reports')?>

</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM1"  action="http://192.168.1.3/Club_System/Holder/Holder_incom_report.php?start=0" method="post" target='_blank'>
<BR>

<?
$dbname="New_Club_DB";
session_start();
if(session_is_registered(myusername)){
$link =mysql_connect();
if(!$link)
{
print "can not connect to the server";
}

if(!mysql_select_db($dbname,$link))
{
print "sorry";
$dberror=mysql_error();
return false;
}
}

?>
<center>
<table>
<thead>
</thead>
<tbody>

<TR  align="middle">
<TH><FONT size='4'  >شهر : </TH><TH align="right"> <INPUT TYPE="TEXT" NAME="h_month" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value="">
</TH>
</TR>



<TR  align="middle">
<TH><FONT size='4'  >السنه :</TH><TH align="right"><INPUT TYPE="TEXT" NAME="h_year" style="font-size: 10pt; padding-top:5px;height:25 px;width:200 px" value=""></TH>
</TR>

</tbody>

</table>
<br><br>

<INPUT type="image" name="b1"  src="../img/search.png">

<br><br><br><br>

</strong>
</font>


</FORM>


</BODY>

</HTML>
