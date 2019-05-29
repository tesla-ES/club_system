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
		function go_page(pop0,pop1,pop4)
		{
			if (confirm("سيتم إجراء الحذف هل انت متاكد")){
				window.location.href="Basic_Reg_Delete.php?User_ID="+pop0+"&Reg_Type="+pop1+"&Employee="+pop4 ;
				return true;
			}else{
				return false;
			}
		}

	</script>
</head>

<?php

if(isset($_REQUEST['user_id'])){
    $user_id=$_REQUEST['user_id'];
}
if(isset($_REQUEST['reg_type'])){
    $reg_type=$_REQUEST['reg_type'];
}

if(isset($_REQUEST['employee'])){
    $employee=$_REQUEST['employee'];
}


r_header($page_name,$con);
$fin=mysqli_query($con,"select User_ID,Reg_Type,Sec_Type,Ser,Employee,Name,DATE_FORMAT(`b_date`,'%d/%m/%Y') as b_date1 ,gender,b_place,Nationality,Education,DATE_FORMAT(`Grade_Date`,'%d/%m/%Y') as Grade_Date1 ,Job,Employer,Job_Tel,Home_Tel,Address,Status,DATE_FORMAT(`Hire_date`,'%d/%m/%Y') as Hire_date1 ,Social_Type,Social_No,DATE_FORMAT(`Social_Date`,'%d/%m/%Y') as Social_Date1 ,Place,(select max(pay_year) from payment as p where p.user_id=b.user_id and p.reg_type = b.reg_type and p.employee = b.employee and status in(0,3) and operation in(0,5,6,7) ) as Last_Year,Valid,Last_Year_Card,Notes,image,Beach,Yacht,Golf,Tennis,Guest_No,Rowing,knighthood ,upd_date,(select username from members where upd_user = id ) as upd_user from Basic_Reg  as b where User_ID ='$user_id'&& reg_type ='$reg_type'&&employee='$employee'");
$n_res=mysqli_num_rows($fin);

while($res=mysqli_fetch_array($fin))
{
	$pop0=$res["User_ID"];
	$pop1=$res["Reg_Type"];
	$pop2=$res["Sec_Type"];
	$pop3=$res["Ser"];
	$pop4=$res["Employee"];
	$pop5=$res["Name"];
	$pop7=$res["b_date1"];
	$pop8=$res["gender"];
	$pop9=$res["b_place"];
	$pop10=$res["Nationality"];
	$pop11=$res["Education"];
	$pop12=$res["Grade_Date1"];
	$pop13=$res["Job"];
	$pop14=$res["Employer"];
	$pop15=$res["Job_Tel"];
	$pop16=$res["Home_Tel"];
	$pop17=$res["Address"];
	$pop18=$res["Status"];
	$pop19=$res["Hire_date1"];
	$pop20=$res["Social_Type"];
	$pop21=$res["Social_No"];
	$pop22=$res["Social_Date1"];
	$pop23=$res["Place"];
	$pop24=$res["Last_Year"];
	$pop25=$res["Valid"];
	$pop26=$res["Last_Year_Card"];
	$pop27=$res["Notes"];
	$pop28=$res["image"];
	$Beach=$res["Beach"];
	$Yacht=$res["Yacht"];
	$Golf=$res["Golf"];
	$Tennis=$res["Tennis"];
	$Guest_no=$res["Guest_No"];
	$Rowing=$res["Rowing"];
	$knighthood=$res["knighthood"];
	$upd_date=$res["upd_date"];
	$upd_user=$res["upd_user"];
}
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2" onload="textCounter('Text6','counter',<?php echo $max_length?>)">


<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background='../img/sperator.gif'  >
	<TR>
		<TD VALIGN='top'>
			<img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
		<TH  align=center background='../img/sperator.gif'><A href='Basic_Reg_Add.php' ><img src='../img/nfolbtn.gif' border='0' width='26' height='26'><br clear='all'> عضو جديد </A></TH>
		<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
		<TH  align=center background='../img/sperator.gif'><A href='../Secondary_Reg/Secondary_Reg_Add.php?User_ID=<?php echo $pop0 ?>&Reg_Type=<?php echo $pop1?>&Employee=<?php echo $pop4?>' ><img src='../img/nfolbtn.gif' border='0' width='26' height='26'><br clear='all'> إضافة أعباء </A></TH>
		<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
		<TH  align=center background='../img/sperator.gif'><A href='../Wife_Reg/Wife_Reg_Add.php?User_ID=<?php echo $pop0?>&Reg_Type=<?php echo $pop1?>&Employee=<?php echo $pop4?>' ><img src='../img/nfolbtn.gif' border='0' width='26' height='26'><br clear='all'> إضافة زوجات </A></TH>

		<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
		<TH   align=center background='../img/sperator.gif'><A href='Basic_Reg_Search.php' ><img src='../img/search.gif' border='0' width='26' height='26'><br clear='all'> بحث </A></TH>
		<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
		<TH   align=center background='../img/sperator.gif'><A href='Basic_Reg_List.php?start=0' ><img src='../img/main.gif' border='0' width='26' height='26'><br clear='all'> الصفحة الرئيسية </A></TH>
		<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
		<TH   align=center background='../img/sperator.gif'><A href='../login/main.php' ><img src='../img/home.gif' border='0' width='26' height='26'><br clear='all'> الصفحة الأساسية </A></TH>

		</TD></TR></TABLE>


<FORM NAME="FORM1"  action="Basic_Reg_Update.php" method="post" enctype="multipart/form-data">
<BR>
<table width="90%">
<thead style="padding-right: 50px;font-size: 5pt;color: #2B60DE">
 بيانات العضوية
</thead>

<TR  align='right' >
<TD><FONT size='4'  >رقم العضو : <INPUT TYPE='TEXT' NAME='Text1'style='font-size: 10pt; height:25px;width:100px' value='<?php echo $pop0 ;?>' READONLY>
</TD>
<TD ><FONT size='4'  > نوع العضوية  : 
	
			<select name='Text2' style='font-size: 10pt; height:25px;width:100px' value=$pop1 >";
	<?php
$result = mysqli_query($con,"SELECT Code,Name FROM reg_type where stat = 0 ORDER BY Code");
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
<TD ><FONT size='4'  >  نوع الأعباء  : 

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
if($pop28!=Null){
echo"
<TD ALIGN=RIGHT  BGCOLOR='#c4c4c4' border=1 rowspan=2 > <FONT color='#FFFFFF'><img src='$pop28'  width='100' height='110'></Font></TH>";
}
echo"
</TR>
<TR  >
<TD ><FONT size='4'  > رقم الوالد  : <INPUT TYPE='TEXT' NAME='Text4' style='font-size: 10pt; height:25px;width:100px' value='$pop3' ></TD>
<TD align='center'><FONT size='4'  >* عامل/موظف  : 
	<select name='Text5' style='font-size: 10pt; height:25px;width:100px' value=$pop4>";
			echo"<option value=0";
				if ($pop4=="0")
 					{echo" selected='yes'>";}
				else echo ">"; echo "عامل</option>";
					echo"<option value=1";
				if ($pop4=="1")
 					{echo" selected='yes'>";}
				else echo ">"; echo "موظف</option>";
				echo"<option value=2";
				if ($pop4=="2")
 					{echo" selected='yes'>";}
				else echo ">"; echo "معاشات</option>";
				echo"<option value=3";
				if ($pop4=="3")
 					{echo" selected='yes'>";}
				else echo ">"; echo "مؤهلات</option>";
								echo"<option value=4";
				if ($pop4=="4")
 					{echo" selected='yes'>";}
				else echo ">"; echo "عقد</option>";
								echo"<option value=5";
				if ($pop4=="5")
 					{echo" selected='yes'>";}
				else echo ">"; echo "معار</option>";
echo"</select></TD>
<TD><FONT size='4'  > عدد الضيوف  : <INPUT TYPE='TEXT' NAME='Text60' style='font-size: 10pt; height:25px;width:50px' value='$Guest_no'></TD>
</TR>
<TR  align='right' >	<B>		
<TD ><FONT size='5'  > شاطىء  : <INPUT TYPE='checkbox' NAME='chk2' style='font-size: 14pt; height:25px;width:100px' ";if ($Beach==1){echo"checked></TD>";}else{echo"></TD>";}echo"
<TD ><FONT size='5'  > شراع  : <INPUT TYPE='checkbox' NAME='chk3' style='font-size: 14pt; height:25px;width:100px'  ";if ($Yacht==1){echo"checked></TD>";}else{echo"></TD>";}echo"
<TD ><FONT size='5'  > جولف  : <INPUT TYPE='checkbox' NAME='chk4' style='font-size: 14pt; height:25px;width:100px'  ";if ($Golf==1){echo"checked></TD>";}else{echo"></TD>";}echo"
</TR><TR  align='right' >
<TD ><FONT size='5'  > تنس  : <INPUT TYPE='checkbox' NAME='chk5' style='font-size: 14pt; height:25px;width:100px'   ";if ($Tennis==1){echo"checked></TD>";}else{echo"></TD>";}echo"
<TD ><FONT size='5'  >تجديف : <INPUT TYPE='checkbox' NAME='chk6' style='font-size: 14pt; height:25px;width:100px'   ";if ($Rowing==1){echo"checked></TD>";}else{echo"></TD>";}echo"
<TD ><FONT size='5'  >فروسية : <INPUT TYPE='checkbox' NAME='chk7' style='font-size: 14pt; height:25px;width:100px'   ";if ($knighthood==1){echo"checked></TD>";}else{echo"></TD>";}echo"
</B></TR>
</Tbody>
	</table>
	
	<table width='90%'>
		<thead>
		البيانات الشخصية
		</thead>
	    <TR  align='right'>
        <TD><FONT size='4'  > الإسم  : <INPUT TYPE='TEXT' NAME='Text6' id='Text6'  required style='font-size: 10pt; height:25px;width:200px' value='$pop5' maxlength='$max_length' size='$max_length' onkeyup=textCounter(this,'counter',$max_length)><input type='text' class='counter'  readonly size='2' maxlength='2' id='counter' value='$max_length'></TD>
        <TD><FONT size='4'  > تاريخ الميلاد  : <input type='text' name='Text8' required style='font-size: 10pt; height:25px;width:80px' value='$pop7'></TD
      </TR>
      
	  <TR  align='right'>
        <TD><FONT size='4'  > النوع   : 
	      <select name='Text9' style='font-size: 10pt; height:25px;width:100px' value=$pop8>";
			echo"<option value=1";
				if ($pop8==1)
 					{echo" selected='yes'>";}
				else echo ">"; echo "ذكر</option>";
					echo"<option value=2";
				if ($pop8==2)
 					{echo" selected='yes'>";}
				else echo ">"; echo "أنثى</option>";
				echo"</select></TD>

       <TD><FONT size='4'  > جهة الميلاد  : <INPUT TYPE='TEXT' NAME='Text10' style='font-size: 10pt; height:25px;width:200px' value='$pop9'></TD>

       <TD><FONT size='4'  > الجنسية  : 
         <select name='Text11' style='font-size: 10pt; height:25px;width:100px' value=$pop10>";
			echo"<option value=0";
				if ($pop10==0)
 					{echo" selected='yes'>";}
				else echo ">"; echo "مصرى</option>";
					echo"<option value=1";
				if ($pop10==1)
 					{echo" selected='yes'>";}
				else echo ">"; echo "أخرى</option>";
				echo"</select></TD>
     </TR>
	 <TR  align='right'>
        <TD><FONT size='4'  > المؤهل  : <INPUT TYPE='TEXT' NAME='Text12' style='font-size: 10pt; height:25px;width:200px' value='$pop11'></TD>

         <TD><FONT size='4'  > تاريخ الحصول على المؤهل  : 
			<input type='text' name='Text13' style='font-size: 10pt; height:25px;width:80px' value='$pop12'></TD>

        <TD><FONT size='4'  > الوظيفة  : <INPUT TYPE='TEXT' NAME='Text14' style='font-size: 10pt; height:25px;width:200px' value='$pop13'></TD></TR>
            <TR  align='right'>
        <TD><FONT size='4'  > جهة العمل  : <INPUT TYPE='TEXT' NAME='Text15' style='font-size: 10pt; height:25px;width:200px' value='$pop14'></TD>
        <TD><FONT size='4'  > تليفون العمل  : <INPUT TYPE='TEXT' NAME='Text16' style='font-size: 10pt; height:25px;width:150px' value='$pop15'></TD>
        <TD><FONT size='4'  > تليفون المنزل : <INPUT TYPE='TEXT' NAME='Text17' style='font-size: 10pt; height:25px;width:150px' value='$pop16'></TD></TR><TR  align='right'>
        <TD><FONT size='4'  > العنوان  : <INPUT TYPE='TEXT' NAME='Text18' style='font-size: 10pt; height:25px;width:200px' value='$pop17'></TD>

    <TD><FONT size='4'  > الحالة الإجتماعية  : 
	<select name='Text19' style='font-size: 10pt; height:25px;width:100px' value=$pop18>";
			echo"<option value=0";
				if ($pop18=="0")
 					{echo" selected='yes'>";}
				else echo ">"; echo "أرمل / مطلق</option>";
					echo"<option value=1";
				if ($pop18=="1")
 					{echo" selected='yes'>";}
				else echo ">"; echo "متزوج</option>";
					echo"<option value=2";
				if ($pop18=="2")
 					{echo" selected='yes'>";}
				else echo ">"; echo "متزوج و يعول</option>";
				echo"<option value=3";
				if ($pop18=="3")
 					{echo" selected='yes'>";}
				else echo ">"; echo "أعزب</option>";

echo"</select></TD>
<TD><FONT size='4'  > تاريخ القرار  : 
	<input type='text' name='Text20' style='font-size: 10pt; height:25px;width:80px' value='$pop19'>
	</TD>
</TR>
	<TR  align='right'>
<TD ><FONT size='4'  > تحقيق الشخصية  : 
	<select name='Text21' style='font-size: 10pt; height:25px;width:100px' value=$pop20>";
			echo"<option value=0";
				if ($pop20=="0")
 					{echo" selected='yes'>";}
				else echo ">"; echo "بطاقة شخصية</option>";
					echo"<option value=1";
				if ($pop20=="1")
 					{echo" selected='yes'>";}
				else echo ">"; echo "بطاقة عائلية</option>";
            echo"</select></TD>
            <TD ><FONT size='4'  > رقم تحقيق الشخصية  : <INPUT TYPE='TEXT' NAME='Text22' style='font-size: 10pt; height:25px;width:100px' value='$pop21'></TD>
            <TD ><FONT size='4'  > تاريخ صدور تحقيق الشخصية  : 
                    <input type='text' name='Text23' style='font-size: 10pt; height:25px;width:80px' value='$pop22'></TD></TR>
                    <TR>
                <TD Colspan=3 align='Center'><FONT size='4'  > جهة إصدار تحقيق الشخصية  : <INPUT TYPE='TEXT' NAME='Text24' style='font-size: 10pt; height:25px;width:100px' value='$pop23'></TD>
</TR>

</Table>
	
		<table width='90%'>
	<TR  align='right'>
        <TD><FONT size='4'  > أخر سنة سدد عنها  : <INPUT TYPE='TEXT' NAME='Text25' style='font-size: 10pt; height:25px;width:200px' value='$pop24'></TD>
        <TD><FONT size='4'  > حالة العضوية  : 
	
	   <select name='Text26' style='font-size: 10pt; height:25px;width:100px' value=<?php echo $pop25?>";
				echo"<option value=1";
				if ($pop25=="1")
 					{echo" selected='yes'>";}
				else echo ">"; echo "نشطة</option>";
				echo"<option value=0";
				if ($pop25=="0")
 					{echo" selected='yes'>";}
				else echo ">"; echo "إيقاف مؤقت</option>";
				echo"<option value=2";
				if ($pop25=="2")
 					{echo" selected='yes'>";}
				else echo ">"; echo "إيقاف دائم</option>";
				echo"</select></TD>";
				
	$card_release_sql="select * from user_pri where user_id=$session_user_id and pri_code =(select pri_code from privlege where pri_name ='card_release')" ;
              $card_release_ok =mysqli_num_rows(mysqli_query($con,$card_release_sql));
              if($card_release_ok==1){?>

	<TD><FONT size='4'  > تاريخ أخر تعديل  : <INPUT TYPE='TEXT' NAME='Text24' disabled style='font-size: 10pt;color:blue;  text-align: center; background-color : yellow; height:25px;width:100px' value='<?php echo $upd_date?>'></TD>
	<TD><FONT size='4'  > بواسطة المستخدم  : <INPUT TYPE='TEXT' NAME='Text24'  disabled style='font-size: 10pt ;color:blue;text-align: center; background-color : yellow; height:25px;width:100px' value='<?php echo $upd_user?>'></TD>

			 <?php }?>
</TR>
    


	<TR align='center'>
        <TD colspan='2'><FONT size='4'  > ملاحظات  :
            <textarea rows='5' cols='20' style='font-size: 10pt; height:50px;width:200px' NAME='Text27' ><?php echo $pop27?></textarea>
        </TD>



        <TD colspan='2'><FONT size='4'  > الصورة  :
            <input type='file' name='file' id='file' />
            </TD>
    </TR>


	<TR align='center'>
    <table width="90%"><tr> <TD width=50%><hr /><FONT size='5' color='#2B60DE'  >الأعباء
            </TD><TD width=50%>	<hr/><FONT size='5' color='#2B60DE'>الزوجات
        </tr>

        <tr><td valign="top">

<?php
//////////////////////////////////////////////////////////////////////////////////////
	$result = mysqli_query($con,"SELECT User_ID,Name,Ser
						FROM Secondary_Reg
						where (User_ID=$pop0)&& (Reg_Type=$pop1)&& (employee=$pop4)
						ORDER BY User_ID");
if (($result)||(mysql_errno == 0))
{
  echo "<table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers
          $i = 1;
          while ($i <= mysqli_num_fields($result))
          {

	$headers[1]="رقم العضوية";
	$headers[2]="الإسم";
	$headers[3]="مسلسل";
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
		
	  echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='../Secondary_Reg/Secondary_Reg_View.php?user_id={$rows[0]}&employee=$pop4& reg_type=$pop1&ser={$rows[2]}'> $rows[$j]</td>";
	}
	$j++;
      }
    }
}else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan=1></td></tr>";
  }
  echo "</table> </td>";
  }else{
  echo "Error in running query :". mysqli_error($con);
}


//////////////////////////////////////////////////////////////////////////////////////
$sql="SELECT User_ID,Name,Ser FROM Wife_Reg where (User_ID=$pop0)&& (Reg_Type=$pop1) && (employee=$pop4) ORDER BY User_ID";
	$result = mysqli_query($con,$sql);
if (($result)||(mysql_errno == 0))
{
  echo "<td valign='top'><table width='100%' ><tr BGCOLOR='#7b7b7b'>";
 if (mysqli_num_rows($result)>0)
  {
          //loop thru the field names to print the correct headers
          $i = 1;
          while ($i <= mysqli_num_fields($result))
          {
            $headers[1]="رقم العضوية";
            $headers[2]="الإسم";
            $headers[3]="مسلسل";
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
	     echo "<td ALIGN=RIGHT  > <FONT color='#FFFFFF'><a href='../Wife_Reg/Wife_Reg_View.php?user_id={$rows[0]}&employee=$pop4& reg_type=$pop1&ser={$rows[2]}'> $rows[$j]</td>";
	   }
	   $j++;
      }
    }
}else{
    echo "<tr><FONT color='#AADFFB'><td ALIGN=CENTER colspan=1></td></tr>";
  }
  echo "</table> </td>";
  }else{
  echo "Error in running query :". mysqli_error($con);
}

///////////////////////////////////////////////////////////////////////////////////////	
?>
 </tr></table></tr></td>
</table>  <br>
<hr />
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background='../img/sperator.gif'  > 
        <TR><Th VALIGN='top'>
                <img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
	<TH   align=center background='../img/sperator.gif'><A href='#' onclick='go_page(<?php echo $pop0?>,<?php echo $pop1?>,<?php echo $pop4?>)' ><img src='../img/delete.png' border='0' width='26' height='26'><br clear='all'> حذف </A></TH>
	<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
	<TH   align=center background='../img/sperator.gif'><INPUT type='image' name='b3'src='../img/update.gif' width='26' height='26'><br clear='all'> تعديل  </A></TH>
	<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
	<?php
	$Q1=mysqli_query($con,"select Status,Receipt_No  from Payment where User_ID ='$pop0'&& Reg_Type ='$pop1'&& Pay_Year ='$Curr_Year'&& employee ='$employee'")or  die (mysqli_error($con));
			$Q1_No=mysqli_num_rows($Q1);
     $Status =0;
			while($QResult=mysqli_fetch_array($Q1))

				{
				$Status=$QResult["Status"];
				$Receipt_No=$QResult["Receipt_No"];
				}
				
	if($Status==2&&$Q1_No==1){
	echo"<TH   align=center background='../img/sperator.gif'><A href='../Payment/Payment_View.php?id=$pop0&type=$pop1&year=$Curr_Year&receipt_no=$Receipt_No&employee=$pop4' ><img src='../img/7.png' border='0' width='26' height='26'><br clear='all'>المدفوعات </A></TH>";
	}else{
	echo"<TH   align=center background='../img/sperator.gif'><A href='../Payment/Payment_Add.php?User_ID=$pop0&Reg_Type=$pop1&Beach=$Beach&Yacht=$Yacht&Golf=$Golf&Tennis=$Tennis&Employee=$pop4&Rowing=$Rowing&knighthood=$knighthood' ><img src='../img/7.png' border='0' width='26' height='26'><br clear='all'>المدفوعات </A></TH>";
	}
echo"</TD>
</TR>
</Table>
";
?>
</FORM>
</BODY>

</HTML>
