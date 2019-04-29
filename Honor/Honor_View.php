<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<head>
    <link rel="stylesheet" href="../css/table_css.css">
</head>
<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Honor');
?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM1"  action="http://192.168.1.3/Club_System/Honor/Honor_Update.php" method="post" enctype="multipart/form-data">

<BR>

<?php

$id=$_REQUEST["id"];
$year=$_REQUEST["year"];
$name=$_REQUEST["name"];

$fin=mysqli_query($con,"select User_ID,Reg_Type,Year,DATE_FORMAT(`Due_Date`,'%d/%m/%Y') as Due_Date1,Name,Image,Job,No,Prints,Reg_Type_New from Honor where User_ID ='$id'&& Name ='$name'&& Year ='$year'");
$n_res=mysqli_num_rows($fin);


while($res=mysqli_fetch_array($fin))
{
$pop0=$res["User_ID"];
$pop1=$res["Reg_Type"];
$pop43=$res["Year"];
$pop44=$res["Due_Date1"];
$pop45=$res["Name"];
$pop46=$res["Image"];
$pop47=$res["Job"];
$pop48=$res["No"];
$pop49=$res["Prints"];
$pop500=$res["Reg_Type_New"];
}

		$result = mysqli_query($con,"SELECT Code,Name FROM reg_type ORDER BY Code");
	while($ress=mysqli_fetch_array($result))
			{
			$pops0=$ress["Code"];
			$pops1=$ress["Name"];
				
				if ($pop1==$pops0)
 				$pops2=$pops1;
			}

		if($pop48==Null){
		$pop48=0;
		} 
		if($pop46==Null){
		$pops46='../img/Default.jpg';
		} 

?>

	<SCRIPT language="JavaScript" type="text/javascript">
<!-- ;

function card_print(id)
{
		var Notes = "<?php echo $pop500 ?>";
	switch (Notes)
		{
	case '0':
  		Notes="";
  		break;
	case '1':
  		Notes="شاطىء";
  		break;
	case '2':
  		Notes="شاطىء-جولف";
  		break;
	case '3':
  		Notes="شاطىء-شراع";
  		break;
 	case '4':
  		Notes="شاطىء-جولف-شراع";
  		break;
	case '5':
  		Notes="شراع - جولف";
  		break;
 	case '6':
  		Notes="شراع";
  		break;
 	case '7':
  		Notes="جولف";
  		break;
  	case '8':
  		Notes="جميع الأندية";
  		break;
		 		 		 		 		 		  		

}
/////////////////////////////////////////////////////
	var pop0 = "<?php echo $pop0 ?>";
	var pop1 = "<?php echo $pops2 ?>";
	var reg_type = "<?php echo $pop1 ?>";
	var year = "<?php echo $pop43 ?>";
	var pop44 = "<?php echo $pop44 ?>";
	var Name = "<?php echo $pop45 ?>";
	var pop48 = "<?php echo $pop48 ?>";
	var pop47 = "<?php echo $pop47 ?>";
	var image="<?php echo $pop46 ?>";
	var pop43="<?php echo $pop43 ?>";
	var generator=window.open('','name','height=300,width=400,top=50,left=150');
  
  	generator.document.write('<html><head>');
  	

  	generator.document.write("<?php $query1 = mysqli_query($con,'UPDATE Honor SET prints =0 where (User_ID="+pop0+" && Reg_Type="+reg_type+" && Year="+ year+")')or die(mysql_error()); ?>");
  	generator.document.write('</head><style type="text/css" media="print">@page port {size: portrait;}@page land {size: landscape;}.portrait {page: port;}.landscape {page: land;}</style><body class="landscape">');
  	generator.document.write('<table width="100%"  border="0" class="landscape" cols="2" align="right" CELLPADDING="3" cellspacing="0" background="../img/bkgr.jpg"> <tbody align="right">');
  	if(image==""){
  		generator.document.write('<TR   style="text-align:right;font-size:10pt;font-weight:bolder;" ><td  rowspan=4 style="text-align:right;font-size:10pt;font-weight:bolder;vertical-align:text-top;"></TD><TD width=80% style="text-align:right;font-size:10pt;font-weight:bolder;">');
  	}else{
  	generator.document.write('<TR  style="text-align:right;font-size:10pt;font-weight:bolder;" ><td  rowspan=5 style="text-align:right;font-size:10pt;font-weight:bolder;vertical-align:text-top;"><img SRC="'+image+'" BORDER="0" width=90 height=120></td><TD width=65% style="text-align:right;font-size:10pt;font-weight:bolder;">');
  	}
  	  	generator.document.write(pop1+" ");
  	  	generator.document.write(Notes);
  	  	
  	generator.document.write('</TD><TD Width=20% style="text-align:right;font-size:10pt;font-weight:bolder;" >');
  	generator.document.write(pop0);
  	generator.document.write('</TD><TD Width=35% style="text-align:right;font-size:10pt;font-weight:bolder;" >:&nbsp&nbspرقم العضوية</TD></TR><TR  height=10 style="text-align:right;font-size:10pt;font-weight:bolder;"><TD width=70% colspan=2 style="text-align:right;font-size:10pt;font-weight:bolder;">');
	 generator.document.write(Name);
  	generator.document.write('</TD><TD Width=35% style="text-align:right;font-size:10pt;" >&nbsp&nbsp:&nbspالإســــــــــــم</TD></TR><TR  style="text-align:right;font-size:10pt;font-weight:bolder;"><TD colspan=2 style="text-align:right;font-size:10pt;font-weight:bolder;" >');
    generator.document.write(pop47);
 	generator.document.write('</TD><TD width=35%  style="text-align:right;font-size:10pt;font-weight:bolder;" >&nbsp&nbsp:&nbsp الــوظيـــــفة</TD></TR><TR  style="text-align:right;font-size:10pt;font-weight:bolder;"><TD  colspan=2 style="text-align:right;font-size:10pt;font-weight:bolder;" >');
////////////////////////////////////////////////////////////
	if(pop48>=0&& reg_type >14){ ///////////3/2/2014
		if(pop48==0){
			if(reg_type==15){////////////////////////////sports family condition ///////19/7/2016
				generator.document.write("الأسرة الكريمة");
			}else{
				generator.document.write("بدون");
			}
			
		}
		else{
		generator.document.write(pop48);
		}
 	generator.document.write('</TD><TD width=35%  style="text-align:right;font-size:10pt;font-weight:bolder;">: عدد المرافقين</TD></TR>');
	generator.document.write('<TR  style="text-align:right;font-size:10pt;font-weight:bolder;">');
////////////////////////////////////////////////////////////////////////////////////image cond
	if(image==""){
	generator.document.write('<TD width=70% colspan=3 style="text-align:right;font-size:10pt;font-weight:bolder;">');		
	}else{

	generator.document.write('<TD width=70% colspan=2 style="text-align:right;font-size:10pt;font-weight:bolder;">');		
	
	}
	}

	generator.document.write(pop43+"-12-31");
 	generator.document.write('</TD><TD width=35%  style="text-align:right;font-size:10pt;font-weight:bolder;">&nbsp:&nbsp&nbspينتــهى فــى</TD></TR>');
	generator.document.write('<TR height=20><td colspan=4  > <P style="text-align:center;font-size:10pt;font-weight:bolder;vertical-align:text-top;">رئيس مجلس الإدارة<br />مهندس<br /><A HREF="javascript:window.print();window.close();"><img SRC="../img/Sign.JPG" BORDER="0" width=90 height=20></A><br />محمد عبد العظيم الموافى</P></td></TR>');
	generator.document.write('</Table></body></html>');
  	generator.document.close();
  
	
}
	</SCRIPT>
<?php

echo "
<Center>
<table BORDER=1 RULES=none frame='hsides' cellspacing=5 cellpadding=8 cols=2> 
<thead>
<FONT size='5' color='#2B60DE'  >	
 بيانات العضوية 
	</Font>
</thead>
<tbody>
<TR  align='right' >
<TD><FONT size='4'  >رقم العضو : <INPUT TYPE='TEXT' NAME='Text1'style='font-size: 10pt; padding-top:5px;height:25px;width:100px' value='$pop0'  >
</TD>";
	if($pop46!=Null){
echo"
<TD ALIGN=RIGHT  BGCOLOR='#c4c4c4' border=1 rowspan=2 > <FONT color='#FFFFFF'><img src='$pop46'  width='70' height='70'></Font></TH>";
}
echo"
</TR><TR>
<TD ><FONT size='4'  > نوع العضوية  : 
	
			<select name='Text2' style='font-size: 10pt; padding-top:5px;height:25px;width:100px' value=$pop1 >";
			

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

echo"</select></TD>";
echo"
</TR>
<TR>
<TD Colspan=2><FONT size='4'  > عن سنة  : <INPUT TYPE='TEXT' NAME='Text44' style='font-size: 10pt; padding-top:5px;height:25px;width:100px' value='$pop43' ></TD>
</TR><TR>
	<TD Colspan=2><FONT size='4'  > ينتهى فى  : 
	
	<input type='text' name='Text45' style='font-size: 10pt; padding-top:5px;height:25px;width:70 px' value='$pop44'>
		</TD>
</TR>
<TR>
<TD Colspan=2><FONT size='4'> الإسم  : <INPUT TYPE='TEXT' NAME='Text46' style='font-size: 10pt; padding-top:5px;height:25px;width:200px' value='$pop45' ></TD>
</TR>
<TR>
<TD Colspan=2><FONT size='4'> الوظيفة  : <INPUT TYPE='TEXT' NAME='Text48' style='font-size: 10pt; padding-top:5px;height:25px;width:200px' value='$pop47' ></TD>
</TR>
<TR>
<TD Colspan=2><FONT size='4'> عدد  : <INPUT TYPE='TEXT' NAME='Text49' style='font-size: 10pt; padding-top:5px;height:25px;width:100px' value='$pop48' ></TD>
</TR>

<TR>	
			
<TD colspan='2' ><FONT size='4'> طبع : 
	<select name='Text50' style='font-size: 10pt; padding-top:5px;height:25px;width:100px' value=$pop49>";
			echo"<option value=1";
				if ($pop49==1)
 					{echo" selected='yes'>";}
				else echo ">"; echo "تم الطبع</option>";
					echo"<option value=0";
				if ($pop49==0)
 					{echo" selected='yes'>";}
				else echo ">"; echo "لم يتم الطبع</option>";


echo"</select></TD>
</TR>
	<TR>

<TD colspan='2' align='center'><FONT size='4'  > الكارنيه  : 
	<select name='Text500' style='font-size: 10pt; padding-top:5px;height:25px;width:200px' value=$pop500>";
					echo"<option value=0";
				if ($pop500=="0")
 					{echo" selected='yes'>";}
				else echo ">"; echo " </option>";
					echo"<option value=1";
				if ($pop500=="1")
 					{echo" selected='yes'>";}
				else echo ">"; echo "شاطىء</option>";
					echo"<option value=2";
				if ($pop500=="2")
 					{echo" selected='yes'>";}
				else echo ">"; echo "شاطىء-جولف</option>";		
					echo"<option value=3";
				if ($pop500=="3")
 					{echo" selected='yes'>";}
				else echo ">"; echo "شاطىء-شراع</option>";
					echo"<option value=4";
				if ($pop500=="4")
 					{echo" selected='yes'>";}
				else echo ">"; echo "شاطىء - شراع - جولف</option>";
					echo"<option value=5";
				if ($pop500=="5")
 					{echo" selected='yes'>";}
				else echo ">"; echo "شراع - جولف</option>";
					echo"<option value=6";
				if ($pop500=="6")
 					{echo" selected='yes'>";}
				else echo ">"; echo "شراع</option>";
					echo"<option value=7";
				if ($pop500=="7")
 					{echo" selected='yes'>";}
				else echo ">"; echo "جولف</option>";
					echo"<option value=8";
				if ($pop500=="8")
 					{echo" selected='yes'>";}
				else echo ">"; echo "جميع الأندية</option>";
				
echo"</select></TD>
	
</TR>

<TR>
	<TH><FONT size='4'  > الصورة  : 	<input type='file' name='file' id='file' />

</TR>
		<TR>
	<TH>	</TH>
	</TR>
</Tbody>
	</table>
  <br>
<hr />
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background='../img/sperator.gif'  > 
        <TR>


            <TD VALIGN='top'  >

                <img src='../img/sperator.gif' border='0' width='2' height='40'></TH>


<TH align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>

<TH align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
<TH align=center background='../img/sperator.gif'><A href='Honor_More.php?User_ID=$pop0&Reg_Type=$pop1&Year=$pop43&Name=$pop45&Job=$pop47&No=$pop48&Prints=$pop49&Image=$pop46' ><img src='../img/copy.png' border='0' width='26' height='26'><br clear='all'> جديد </A></TH>

</TD>
</TR>
	</TR>

</Table>
";

?>
</FORM>
</BODY>

</HTML>
