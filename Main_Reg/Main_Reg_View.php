<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
		<? 
session_start();
if(session_is_registered(myusername)){
	echo"<H4 align='left'> ";
	echo"������   ";
echo"<B>$myusername </B> ";

}
?>

<A href="http://192.168.1.3/club_system/login/logout.php" >| ���� </A>
</H4>



<center>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR  >

                 <TH  align=center ><font size ="5" color="#FFCC00"> �������� ��������
                 <BR>
                 </TH>
                 </TR>
                 </Table>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR  >


           <TD VALIGN="top"  >
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="../img/sperator.gif"><A href="Main_Reg_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ����� </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Main_Reg_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> ��� </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Main_Reg_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> ������ �������� </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="http://localhost/club_system/login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> ������ �������� </A></TH>
        </TD>


        </TR>

    </TABLE>

<script language="JavaScript" src="../js/ts_picker.js"></script>



</head>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">



<FORM NAME="FORM1"  action="http://192.168.1.3/Club_System/Main_Reg/Main_Reg_Update.php" method="post" enctype="multipart/form-data">



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
///////////////////////////


////////////////////////////////////

mysql_query("SET CHARACTER_SET_SERVER 'CP1256'"); 
mysql_query("SET NAMES 'CP1256'");
$fin=mysql_query("select * from Main_Reg where User_ID ='$User_ID'&& Name ='$name'");
$n_res=mysql_num_rows($fin);


while($res=mysql_fetch_array($fin))
{
$pop0=$res[User_ID];
$pop1=$res[Reg_Type];
$pop2=$res[Sec_Type];
$pop3=$res[Ser];
$pop4=$res[Employee];
$pop5=$res[Name];
$pop6=$res[Name_Card];
$pop7=$res[b_date];
$pop8=$res[gender];
$pop9=$res[b_place];
$pop10=$res[Nationality];
$pop11=$res[Education];
$pop12=$res[Grade_Date];
$pop13=$res[Job];
$pop14=$res[Employer];
$pop15=$res[Job_Tel];
$pop16=$res[Home_Tel];
$pop17=$res[Address];
$pop18=$res[Status];
$pop19=$res[Hire_date];
$pop20=$res[Social_Type];
$pop21=$res[Social_No];
$pop22=$res[Social_Date];
$pop23=$res[Place];
$pop24=$res[Last_Year];
$pop25=$res[Valid];
$pop26=$res[Last_Year_Card];
$pop27=$res[Notes];
$pop28=$res[image];

}
if( !is_null($pop7)){
$pop7_arr=explode("-", $pop7);
$pop7=$pop7_arr[2].'-'.$pop7_arr[1].'-'.$pop7_arr[0].' ';
}
///////////////////////////////////////////////////////////////
if( !is_null($pop12)){
$pop12_arr=explode("-", $pop12);
$pop12=$pop12_arr[2].'-'.$pop12_arr[1].'-'.$pop12_arr[0].' ';
}
///////////////////////////////////////////////////////////////
if( !is_null($pop19)){
$pop19_arr=explode("-", $pop19);
$pop19=$pop19_arr[2].'-'.$pop19_arr[1].'-'.$pop19_arr[0].' ';
}
///////////////////////////////////////////////////////////////
if( !is_null($pop22)){
$pop22_arr=explode("-", $pop22);
$pop22=$pop22_arr[2].'-'.$pop22_arr[1].'-'.$pop22_arr[0].' ';
}
///////////////////////////////////////////////////////////////
?>
<?

echo "


<Center>
<table BORDER=1 RULES=none frame='hsides' cellspacing=5 cellpadding=8 cols=4> 
<thead>
<FONT size='5' color='#2B60DE'  >	
 ������ ������� 
	</Font>
</thead>
<tbody>
<TR  align='right' >
<TD><FONT size='4'  >��� ����� : <INPUT TYPE='TEXT' NAME='Text1'style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value='$pop0'  READONLY>
</TD>

<TD ><FONT size='4'  > ��� �������  : 
	
			<select name='Text2' style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value=$pop1 >";
			

$result = mysql_query("SELECT Code,Name FROM reg_type ORDER BY Code");
	while($ress=mysql_fetch_array($result))
			{
			$pops0=$ress[Code];
			$pops1=$ress[Name];
			echo"<option value=$pops0";
				if ($pop1==$pops0)
 					{echo" selected='yes'>";}
				else echo ">"; echo "$pops1</option>";
			}


echo"</select></TD>
<TD ><FONT size='4'  >  ��� �������  : 

	<select name='Text3' style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value=$pop2>";
			

$result1 = mysql_query("SELECT Code,Name FROM secondary_type ORDER BY Code");
	while($resss=mysql_fetch_array($result1))
			{
			$popss0=$resss[Code];
			$popss1=$resss[Name];
			echo"<option value=$popss0";
				if ($pop2==$popss0)
 					{echo" selected='yes'>";}
				else echo ">"; echo "$popss1</option>";
			}


echo"</select></TD>";

if($pop28!=Null){
echo"
<TD ALIGN=RIGHT  BGCOLOR='#c4c4c4' border=1 rowspan=2 > <FONT color='#FFFFFF'><img src='$pop28'  width='70' height='70'></Font></TH>";
}
echo"
</TR>
<TR  >
<TD ><FONT size='4'  > �����  : <INPUT TYPE='TEXT' NAME='Text4' style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value='$pop3' READONLY></TD>


<TD colspan='2' align='center'><FONT size='4'  > ����/����  : 
	<select name='Text5' style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value=$pop4>";
			echo"<option value=����";
				if ($pop4=="����")
 					{echo" selected='yes'>";}
				else echo ">"; echo "����</option>";
					echo"<option value=����";
				if ($pop4=="����")
 					{echo" selected='yes'>";}
				else echo ">"; echo "����</option>";


echo"</select></TD>


</TR>
</Tbody>
	</table>
	
	<table BORDER=1 RULES=none frame='hsides' cellspacing=5 cellpadding=8 cols=4>
		<thead>
		<FONT size='5' color='#2B60DE'  >	
		�������� �������
		</Font>
		</thead>
	<TR  align='right'>
<TD><FONT size='4'  > �����  : <INPUT TYPE='TEXT' NAME='Text6' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value='$pop5'></TD>

<TD><FONT size='4'  > ����� �� ��������  : <INPUT TYPE='TEXT' NAME='Text7' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value='$pop6'></TD>

<TD><FONT size='4'  > ����� �������  : 
	
	<input type='text' name='Text8' style='font-size: 10pt; padding-top:5px;height:25 px;width:70 px' value='$pop7'>
	<a href=\"javascript:show_calendar('document.FORM1.Text8',document.FORM1.Text8.value);\">
	<img src='../img/cal.gif' width='16' height='16' border='0' alt='Click Here to Pick up the timestamp'></a>

		</TD>
</TR>
	<TR  align='right'>
<TD><FONT size='4'  > �����   : 
	<select name='Text9' style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value=$pop8>";
			echo"<option value=1";
				if ($pop8==1)
 					{echo" selected='yes'>";}
				else echo ">"; echo "���</option>";
					echo"<option value=2";
				if ($pop8==2)
 					{echo" selected='yes'>";}
				else echo ">"; echo "����</option>";
				echo"</select></TD>

<TD><FONT size='4'  > ��� �������  : <INPUT TYPE='TEXT' NAME='Text10' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value='$pop9'></TD>

<TD><FONT size='4'  > �������  : <INPUT TYPE='TEXT' NAME='Text11' style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value='$pop10'></TD>
</TR>
	<TR  align='right'>
<TD><FONT size='4'  > ������  : <INPUT TYPE='TEXT' NAME='Text12' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value='$pop11'></TD>

<TD><FONT size='4'  > ����� ������ ��� ������  : 
			<input type='text' name='Text13' style='font-size: 10pt; padding-top:5px;height:25 px;width:70 px' value='$pop12'>
	<a href=\"javascript:show_calendar('document.FORM1.Text13',document.FORM1.Text13.value);\">
	<img src='../img/cal.gif' width='16' height='16' border='0' alt='Click Here to Pick up the timestamp'></a>
		</TD>

<TD><FONT size='4'  > �������  : <INPUT TYPE='TEXT' NAME='Text14' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value='$pop13'></TD>
</TR>
	<TR  align='right'>
<TD><FONT size='4'  > ��� �����  : <INPUT TYPE='TEXT' NAME='Text15' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value='$pop14'></TD>

<TD><FONT size='4'  > ������ �����  : <INPUT TYPE='TEXT' NAME='Text16' style='font-size: 10pt; padding-top:5px;height:25 px;width:150 px' value='$pop15'></TD>

<TD><FONT size='4'  > ������ ������ : <INPUT TYPE='TEXT' NAME='Text17' style='font-size: 10pt; padding-top:5px;height:25 px;width:150 px' value='$pop16'></TD>
</TR>
	<TR  align='right'>
<TD><FONT size='4'  > �������  : <INPUT TYPE='TEXT' NAME='Text18' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value='$pop17'></TD>

<TD><FONT size='4'  > ������ ����������  : 
	<select name='Text19' style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value=$pop18>";
			echo"<option value=���� / ����";
				if ($pop18=="���� / ����")
 					{echo" selected='yes'>";}
				else echo ">"; echo "���� / ����</option>";
					echo"<option value=�����";
				if ($pop18=="�����")
 					{echo" selected='yes'>";}
				else echo ">"; echo "�����</option>";
					echo"<option value=����";
				if ($pop18=="����")
 					{echo" selected='yes'>";}
				else echo ">"; echo "����</option>";


echo"</select></TD>


<TD><FONT size='4'  > ����� ������  : 
	<input type='text' name='Text20' style='font-size: 10pt; padding-top:5px;height:25 px;width:70 px' value='$pop19'>
	<a href=\"javascript:show_calendar('document.FORM1.Text20',document.FORM1.Text20.value);\">
	<img src='../img/cal.gif' width='16' height='16' border='0' alt='Click Here to Pick up the timestamp'></a>
	</TD>
</TR>
	<TR  align='right'>
<TD ><FONT size='4'  > ����� �������  : 
	<select name='Text21' style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value=$pop20>";
			echo"<option value=����� �����";
				if ($pop20=="����� �����")
 					{echo" selected='yes'>";}
				else echo ">"; echo "����� �����</option>";
					echo"<option value=����� ������";
				if ($pop20=="����� ������")
 					{echo" selected='yes'>";}
				else echo ">"; echo "����� ������</option>";


echo"</select></TD>


<TD ><FONT size='4'  > ��� ����� �������  : <INPUT TYPE='TEXT' NAME='Text22' style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value='$pop21'></TD>

<TD ><FONT size='4'  > ����� ���� ����� �������  : 
		<input type='text' name='Text23' style='font-size: 10pt; padding-top:5px;height:25 px;width:70 px' value='$pop22'>
	<a href=\"javascript:show_calendar('document.FORM1.Text23',document.FORM1.Text23.value);\">
	<img src='../img/cal.gif' width='16' height='16' border='0' alt='Click Here to Pick up the timestamp'></a>
	</TD>

</TR>
		<TR>
	<TD Colspan=3 align='Center'><FONT size='4'  > ��� ����� ����� �������  : <INPUT TYPE='TEXT' NAME='Text24' style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value='$pop23'></TD>
</TR>
	
	</Table>
		<table BORDER=1 RULES=none frame='hsides' cellspacing=5 cellpadding=8 cols=3>
	<TR  align='right'>
<TD><FONT size='4'  > ��� ��� ��� ����  : <INPUT TYPE='TEXT' NAME='Text25' style='font-size: 10pt; padding-top:5px;height:25 px;width:200 px' value='$pop24'></TD>

<TD><FONT size='4'  > ����� �����  : 
	<select name='Text26' style='font-size: 10pt; padding-top:5px;height:25 px;width:100 px' value=$pop25>";
			echo"<option value=1";
				if ($pop25=="1")
 					{echo" selected='yes'>";}
				else echo ">"; echo "�����</option>";
					echo"<option value=2";
				if ($pop25=="0")
 					{echo" selected='yes'>";}
				else echo ">"; echo "�����</option>";
				echo"</select></TD>

</TR>
	<TR  align='center'>
<TD colspan='2'><FONT size='4'  > �������  : 
	<textarea rows='5' cols='20' style='font-size: 10pt; padding-top:5px;height:50 px;width:200 px' NAME='Text27' >$pop27</textarea>
</TD>
</TR>
	<TR  align='center'>
<TD colspan='2'><FONT size='4'  > ������  : 
	<input type='file' name='file' id='file' />
	</TD>
</TR>

";








echo "
</TR>
	<TR  align='center'>
<TD colspan='2'>

";
//////////////////////////////////////////////////////////////////////////////////////

	$result = mysql_query("SELECT User_ID,Name,Name_Card
						FROM Main_Reg
						where (User_ID=$pop0)&& (Reg_Type=$pop1)&&(Sec_Type!=1)&& (Ser!=0)&& (Ser!=$pop3)
						ORDER BY User_ID");
if (($result)||(mysql_errno == 0))
{
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysql_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers
          $i = 1;
          while ($i <= mysql_num_fields($result))
          {

	$headers[1]="��� �������";
	$headers[2]="�����";
	$headers[3]="����� �� ��������";

		
         echo "<th  ALIGN=CENTER><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";

       $i++;
    }


    echo "</tr>";

    //display the data
$num_rows=1;
    while ($rows = mysql_fetch_array($result,MYSQL_NUM))
    {
    			if($num_rows & 1){
      echo "<tr BGCOLOR='#c4c4c4'>";
      			}else{
      echo "<tr BGCOLOR='#ffffff'>";			
      			}
      			$num_rows++;
 	$j=0;
	
      foreach ($rows as $data)
      {
	if($j<4){
		
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='Main_Reg_View.php?id={$rows[0]}&name={$rows[1]}'> $rows[$j]</td>";

	  
	}
	$j++;

      }

    }
}else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'></td></tr>";
  }
  echo "</table>";
  }else{
  echo "Error in running query :". mysql_error();
}

///////////////////////////////////////////////////////////////////////////////////////	
echo"
		</TD>
</TR>
</tbody>

</table>  <br>
<hr />
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background='../img/sperator.gif'  > 
        <TR  >


            <TD VALIGN='top'  >

                <img src='../img/sperator.gif' border='0' width='2' height='40'></TH>

<TH   align=center background='../img/sperator.gif'><A href='Club_Name_Delete.php?User_ID=$pop0&Reg_Type=$pop1&Sec_Type=$pop2&Ser=$pop3' ><img src='../img/delete.png' border='0' width='26' height='26'><br clear='all'> ��� </A></TH>
<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
<TH   align=center background='../img/sperator.gif'><INPUT type='image' name='b3'src='../img/update.gif' width='26' height='26'><br clear='all'> �����  </A></TH>
<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
</TD>
</TR>
</Table>
";



?>
</strong>
</font>


</FORM>


</BODY>

</HTML>
