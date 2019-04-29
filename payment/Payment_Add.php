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
include_once '../menu.php';write_menu('Payment') ;
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<div class="content_center">

	<?php
     IF(!EMPTY($_REQUEST['User_ID'])){
      $User_ID =$_REQUEST['User_ID'];
         $Reg_Type=$_REQUEST['Reg_Type'];
         $Employee=$_REQUEST['Employee'];
         $Beach=$_REQUEST['Beach'];
         $Yacht=$_REQUEST['Yacht'];
         $Golf=$_REQUEST['Golf'];
         $Tennis=$_REQUEST['Tennis'];
         $Rowing=$_REQUEST['Rowing'];
         $knighthood=$_REQUEST['knighthood'];
	?>

<FORM NAME="FORM1"  action="Payment_Add_fun.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()" >

<BR>

<?php
///////////////////////////////////////////////////////////check for user group
$Member_group = mysqli_query($con,"SELECT Group_ID  FROM members Where id=$session_user_id");
	while($Member_group_arr=mysqli_fetch_array($Member_group))
			{
				$Group_ID=$Member_group_arr["Group_ID"];
			}
			?>


<?php

$fin=mysqli_query($con,"select * from Payment");
$n_res=mysqli_num_rows($fin);

$Curr_Day=date("d/m/Y");

////////////////////////////////////////////Basic Reg Select
$fin2=mysqli_query($con,"select Name from Basic_Reg where User_ID ='$User_ID'&& Reg_Type ='$Reg_Type' && Employee='$Employee' ")or  die (mysqli_error($con));
while($res2=mysqli_fetch_array($fin2))
{
		$Name=$res2["Name"];
		}
		?>
<Table>
<TR>

<TD><INPUT TYPE='checkbox' NAME='chkbasic' style='font-size: 14pt; height:25px;width:100px' value='' ></TD>
<TD><H2><B><FONT color='#2B60DE'><?php echo $Name ;?></B></H2></TD></TR></Table>


	<script language="JavaScript" src="../js/ts_picker.js"></script>

<TR >
<TD align="right"><FONT size="4"  > العملية  :</TD><TD >
        <?php
        selectbox_write("operation_type",false,"select-default",false,$con);
        ?>
	</TH></TD>
</TR>


<table BORDER=1  RULES=none   frame='hsides' cellspacing=5 cellpadding=8 cols=4> 
<thead>
</thead>


<TR  align='right' >
<TD><FONT size='4'  >رقم العضو : <INPUT TYPE='TEXT' NAME='Text1'style='font-size: 10pt;height:25px;width:100px' value='<?php echo $User_ID ;?>'  ></TD>

<TD ><FONT size='4'  > نوع العضوية  : 
			<select name='Text2' style='font-size: 10pt;height:25px;width:100px' value='' >";
                <?php
	$result = mysqli_query($con,"SELECT Code,Name FROM reg_type ORDER BY Code");
	while($ress=mysqli_fetch_array($result))
			{
			$pops0=$ress["Code"];
			$pops1=$ress["Name"];
				echo"<option value=$pops0";
				if ($Reg_Type==$pops0)
 					{echo" selected='yes'>";}
				else echo ">"; echo "$pops1</option>";
			}


echo"</select></TD>";?>

<TD></TD><TD></TD></TR>

<TR  align="right">
<TD > سنة المحاسبة  :
<?php
echo"
<INPUT TYPE='TEXT' NAME='Text33' style='font-size: 10pt;height:25px;width:100px' value=$Curr_Year READONLY>
</TD>
<TD ><FONT size='4'  > المبلغ المستحق  : <INPUT TYPE='TEXT' NAME='Text34' style='font-size: 10pt; height:25px;width:100px' value='' ></TD>
<TD><FONT size='4'  > تاريخ إذن السداد  :
<input type='text' name='Text36' style='font-size: 10pt;height:25px;width:75px' value=$Curr_Day Readonly></TD>
<input type='hidden' name='Employee' style='font-size: 10pt; height:25px;width:75px' value=$Employee >
";
?>
<TD ><FONT size="4"  >دعوة مرافق:<INPUT TYPE="checkbox" NAME="chk1" style="font-size: 14pt; height:25px;width:100px" value=""></TD>
	<TD ><FONT size="4"  > رقم السيارة  :<INPUT TYPE="TEXT" NAME="Text900" style="font-size: 10pt;height:25px;width:100px" value="" ></TD>
<TD></TD>
	<TR  align='right' >	<B>		
	<?php
	echo"
<TD ><FONT size='4'  >شاطىء:<INPUT TYPE='checkbox' NAME='chk2' style='font-size: 14pt;height:25px;width:100px' value='1'";if ($Beach==1){echo"Checked";}else {echo"Disabled";}echo" ></TD>
<TD ><FONT size='4'  > شراع:<INPUT TYPE='checkbox' NAME='chk3' style='font-size: 14pt;height:25px;width:100px' value='1'";if ($Yacht==1){echo"Checked";}else {echo"Disabled";}echo" ></TD>
<TD ><FONT size='4' > جولف:<INPUT TYPE='checkbox' NAME='chk4' style='font-size: 14pt;height:25px;width:100px' value='1' ";if ($Golf==1){echo"Checked";}else {echo"Disabled";}echo"></TD>
<TD ><FONT size='4'  > تنس:<INPUT TYPE='checkbox' NAME='chk5' style='font-size: 14pt;height:25px;width:100px' value='1' ";if ($Tennis==1){echo"Checked";}else {echo"Disabled";}echo"></TD>
<TD ><FONT size='4'  >تجديف :<INPUT TYPE='checkbox' NAME='chk6' style='font-size: 14pt;height:25px;width:100px' value='1' ";if ($Rowing==1){echo"Checked";}else {echo"Disabled";}echo"></TD>
<TD ><FONT size='4'  >فروسية :<INPUT TYPE='checkbox' NAME='chk7' style='font-size: 14pt;height:25px;width:100px' value='1' ";if ($knighthood==1){echo"Checked";}else {echo"Disabled";}echo"></TD>";
?>
</TR></B>

	<TR  align='right' >


<TD ><FONT size="4"  >نسبة الإعفاء : 
<select name="Text35"  style="height:25px;width:100px"  value="" <?php if ($Group_ID == 4){ ?> disabled <?php   } ?>>
	<option value="0">0 %</option>
	<option value="25">25 %</option>
	<option value="50">50 %</option>
	<option value="75">75 %</option>
	<option value="100">100 %</option>
	</TD>
	<TD ><FONT size="4"  >من  : 
	<select name="Text37" style="height:25px;width:100px" value="0">
	<option value="0">رسم القيد</option>
	<option value="1">الإجمالى</option>
	</TD>
</TR>
<TR  align="middle">
<TD colspan="1" align="left"><FONT size="4"  > ملاحظات  :</TD><TD colspan="3" align="right">
	<textarea rows="5" cols="20" style="font-size: 10pt;;height:50px;width:200px" NAME="Text39" ></textarea>
</TD>
	</TD>
	
</TR>

	
<?php
///////////////////////////////////////////////////////////////////////////////////////2/4/2017

echo "
<center><table width='100%' >
	<TR  align='center'>
	<TD width=50% valign='top'>
	<hr />
	<FONT size='5' color='#2B60DE'  >	
	الأعباء
";
//////////////////////////////////////////////////////////////////////////////////////معالجة استخراج بدل فاقد او تالف وحال العبء لا يصدر كارنية

	$result = mysqli_query($con,"SELECT Ser,Name
						FROM Secondary_Reg
						where (User_ID=$User_ID)&& (Reg_Type=$Reg_Type)&& (employee=$Employee)&& (card_ok=1)
						ORDER BY User_ID");
if (($result)||(mysqli_errno($con) == 0))
{
    $i = 0;
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i <= 2)
          {

            $headers[0]="";
            $headers[1]="مسلسل";
            $headers[2]="الإسم";
	       //$headers[3]="مسلسل";

		
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
      			
 	$j=0;
	$chknum=(int)$num_rows+1;
		echo"<TD><INPUT TYPE='checkbox' NAME='chksec$rows[0]' style='font-size: 14pt;height:25px;width:100px' value=''></TD>";
		//echo"chksec$rows[0]";
		$num_rows++;
     	 foreach ($rows as $data)
      {
	  	      	
	if($j<2){
	
	  echo "<td ALIGN=RIGHT  > <FONT color='#2B60DE'> $rows[$j]</td>";

	  
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

///////////////////////////////////////////////////////////////////////////////////////	

echo"
		</TD>


<TD width=50% valign='top'>
			<hr />

			<FONT size='5' color='#2B60DE'  >	
	الزوجات
";
//////////////////////////////////////////////////////////////////////////////////////

	$result = mysqli_query($con,"SELECT Ser,Name
						FROM Wife_Reg
						where (User_ID=$User_ID)&& (Reg_Type=$Reg_Type) && (employee=$Employee)
						ORDER BY User_ID");
if (($result)||(mysqli_errno($con) == 0))
{
    $i = 0;
  echo "<center><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers

          while ($i <= 2)
          {

              $headers[0]="";
              $headers[1]="مسلسل";
              $headers[2]="الإسم";

		
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
      			
 	$j=0;
	$chknum=(int)$num_rows+1;
	echo"<TD><INPUT TYPE='checkbox' NAME='chkwife$rows[0]' style='font-size: 14pt; height:25px;width:100px' value='' ></TD>";
	//echo"chkwife$rows[0]";
	$num_rows++;
      foreach ($rows as $data)
      {
	  
	if($j<2){
		            	
	  echo "<td ALIGN=RIGHT  > <FONT color='#2B60DE'> $rows[$j]</td>";

	  
	}
	$j++;

      }
	  //////////////////
	//echo"<TD><A href='invoice_Delete.php?Ser={$rows[0]}&Invoice_no={$invoice_no}&Totals={$rows[4]}'><img src='../img/delete.png' border='0' width='26' height='26'><br clear='all'></A></TD>";
            //	echo"<TD><INPUT TYPE='checkbox' NAME='chkwife$j' style='font-size: 14pt; padding-top:5px;height:25 px;width:100 px' value=''></TD>"; 
    }
}else{
    echo "<tr><td ALIGN=CENTER colspan='" . ($i+1) . "'></td></tr>";
  }
  echo "</table>";
  }else{
  echo "Error in running query :". mysqli_error($con);
}

///////////////////////////////////////////////////////////////////////////////////////	
echo"</tbody>";

//////////////////////////////////////////////////////////////////////////////////////2/4/2017
?>
</table>

<INPUT type="image" name="b1"  src="../img/save.png">

</FORM>
<?php

}else {

	echo "من فضلك لابد من اختيار عضو حتى يتم إضافه مدفوعات خاصه به ";
}

?>
</div>
</BODY>

</HTML>
