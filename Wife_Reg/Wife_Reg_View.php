<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>

<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
	<link rel="stylesheet" href="../css/table_css.css">
	<script src="../JS/functions.js" type="text/javascript"></script>
	<script>
		function go_page(pop0,pop1,pop2,pop3,employee)
		{
			if (confirm("���� ����� ����� �� ��� �����")){
				//window.location.href="Basic_Reg_Delete.php?User_ID="+pop0+"&Reg_Type="+pop1+"&Employee="+pop4 ;
				//alert("Wife_Reg_Delete.php?User_ID="+pop0+"&Reg_Type="+pop1+"&Sec_Type="+pop2+"&Ser="+pop3+"&Employee="+employee);
				window.location.href="Wife_Reg_Delete.php?User_ID="+pop0+"&Reg_Type="+pop1+"&Sec_Type="+pop2+"&Ser="+pop3+"&Employee="+employee;
				return true;
			}else{
				return false;
			}
		}

	</script>
</head>

<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Wife_Reg');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2" onload="textCounter('Text6','counter',<?php echo $max_length?>)">
<FORM NAME="FORM1"  action="Wife_Reg_Update.php" method="post" enctype="multipart/form-data">

<BR>

<?php
$user_id =$_REQUEST['user_id'];
$ser=$_REQUEST['ser'];
$employee=$_REQUEST['employee'];
$reg_type="";

if(isset($_REQUEST['type'])){
    $reg_type=$_REQUEST['type'];
}else{
    $reg_type=$_REQUEST['reg_type'];
}



$fin=mysqli_query($con,"select User_ID,Reg_Type,Sec_Type,Ser,Name,Name_Card,DATE_FORMAT(`b_date`,'%d/%m/%Y') as b_date1,gender,Employer,Notes,image,Card_OK from Wife_Reg where User_ID ='$user_id'&& Employee ='$employee'&& Reg_type ='$reg_type'&& Ser ='$ser'");
$n_res=mysqli_num_rows($fin);


while($res=mysqli_fetch_array($fin))
{
$pop0=$res["User_ID"];
$pop1=$res["Reg_Type"];
$pop2=$res["Sec_Type"];
$pop3=$res["Ser"];
$pop5=$res["Name"];
$pop6=$res["Name_Card"];
$pop7=$res["b_date1"];
$pop8=$res["gender"];
$pop14=$res["Employer"];
$pop27=$res["Notes"];
$pop28=$res["image"];
$pop31=$res["Card_OK"];
}
echo "
<table BORDER=1 RULES=none frame='hsides' cellspacing=5 cellpadding=8 cols=4> 
<thead>
<FONT size='5' color='#2B60DE'  >	
 ������ ������� 
	</Font>
</thead>
<tbody>
<TR  align='right' >
<TD><FONT size='4'  >��� ����� : <INPUT TYPE='TEXT' NAME='Text1'style='font-size: 10pt; height:25px;width:100px' value='$pop0'  READONLY>
</TD>
<INPUT TYPE='hidden' NAME='Text5000' value='$employee'  >
<TD ><FONT size='4'  > ��� �������  : 
	
			<select name='Text2' style='font-size: 10pt; height:25px;width:100px' value=$pop1 >";
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
<TD ><FONT size='4'  >  ��� �������  : 

	<select name='Text3' style='font-size: 10pt; height:25px;width:100px' value=$pop2>";

$result1 = mysqli_query($con,"SELECT Code,Name FROM secondary_type ORDER BY Code");
	while($resss=mysqli_fetch_array($result1))
			{
			$popss0=$resss["Code"];
			$popss1=$resss["Name"];
			echo"<option value=$popss0";
				if ($pop2==$popss0)
 					{echo" selected='yes'>";}
				else echo ">"; echo "$popss1</option>";
			}

echo"</select></TD>";

echo"
</TR>
<TR  >
<TD ><FONT size='4'  > �����  : <INPUT TYPE='TEXT' NAME='Text4' style='font-size: 10pt; height:25px;width:100px' value='$pop3' READONLY></TD>
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
<TD><FONT size='4'  > �����  : <INPUT TYPE='TEXT' NAME='Text6' id='Text6' style='font-size: 10pt; height:25px;width:200px' value='$pop5' maxlength='$max_length' size='$max_length' onkeyup=textCounter(this,'counter',$max_length)><input type='text' class='counter' readonly size='2' maxlength='2' id='counter' value='$max_length'></TD>
<TD><FONT size='4'  > ����� �� ��������  : <INPUT TYPE='TEXT' NAME='Text7' style='font-size: 10pt; height:25px;width:200px' value='$pop6'></TD>
<TD><FONT size='4'  > ����� �������  :
	<input type='text' name='Text8' style='font-size: 10pt; height:25px;width:70px' value='$pop7'>
		</TD>
</TR>
	<TR  align='right'>
<TD><FONT size='4'  > �����   : 
	<select name='Text9' style='font-size: 10pt; height:25px;width:100px' value=$pop8>";
			echo"<option value=1";
				if ($pop8==1)
 					{echo" selected='yes'>";}
				else echo ">"; echo "���</option>";
					echo"<option value=2";
				if ($pop8==2)
 					{echo" selected='yes'>";}
				else echo ">"; echo "����</option>";
				echo"</select></TD>
<TD><FONT size='4'  > ��� �����  : <INPUT TYPE='TEXT' NAME='Text15' style='font-size: 10pt; height:25px;width:200px' value='$pop14'></TD>
					<TD><FONT size='4'  > ���� / ������ �� ������   : 
	<select name='Text32' style='font-size: 10pt; height:25px;width:100px' value=$pop31>";
			echo"<option value=1";
				if ($pop31==1)
 					{echo" selected='yes'>";}
				else echo ">"; echo "����</option>";
					echo"<option value=0";
				if ($pop31==0)
 					{echo" selected='yes'>";}
				else echo ">"; echo "�� ����</option>";
				echo"</select></TD>
</TR>
	<TR  align='center'>
<TD colspan='2'><FONT size='4'  > �������  : 
	<textarea rows='5' cols='20' style='font-size: 10pt; height:50px;width:200px' NAME='Text28' >$pop27</textarea>
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


	$result = mysqli_query($con,"SELECT User_ID,Name,Employee,Reg_type
						FROM Basic_Reg
						where (User_ID=$pop0)&& (Reg_Type=$pop1) && (Employee=$employee)
						ORDER BY User_ID");
if ($result)
{
    $i = 0;
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i < mysqli_num_fields($result)-1)
          {
	$headers[0]="��� �������";
	$headers[1]="�����";
	$headers[2]="�����";
         echo "<th  ALIGN=CENTER><FONT color='#FFCC00' size='4'>". $headers[$i] . "</th>";
       $i++;
    }
    echo "</tr>";

    //display the data
$num_rows=1;
    while ($rows = mysqli_fetch_array($result,MYSQLI_BOTH))
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
	if($j<3){
		
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='../Basic_Reg/Basic_Reg_View.php?user_id={$rows[0]}&employee={$rows[2]}& reg_type={$rows[3]}'> $rows[$j]</td>";

	}
	$j++;
      }
    }
}else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan='" . ($i+1) . "'></td></tr>";
  }
  echo "</table>";
  }else{
  echo "Error in running query :". mysqli_error($con);
}

echo"
		</TD>
</TR>
</tbody>

</table>  <br>
<hr/>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background='../img/sperator.gif'  > 
        <TR>
            <TD VALIGN='top'  >
                <img src='../img/sperator.gif' border='0' width='2' height='40'></TH>

<TH   align=center background='../img/sperator.gif'><A href='#' onclick='(go_page($pop0,$pop1,$pop2,$pop3,$employee))' ><img src='../img/delete.png' border='0' width='26' height='26'><br clear='all'> ��� </A></TH>
<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
<TH   align=center background='../img/sperator.gif'><INPUT type='image' name='b3'src='../img/update.gif' width='26' height='26'><br clear='all'> �����  </A></TH>
<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
</TD>
</TR>
</Table>
";
?>

</FORM>

</BODY>

</HTML>
