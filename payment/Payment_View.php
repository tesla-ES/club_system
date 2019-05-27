<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>

	<link rel="stylesheet" href="../css/table_css.css">
    <script src="../JS/functions.js"></script>
</head>
<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('Payment');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM1"  action="Payment_Update.php" method="post" enctype="multipart/form-data">
<input type="hidden" id="card_printed" value="0"/>
<input type="hidden" id="invitation_printed" value="0"/>
<BR>

<?php


$id=isset($_REQUEST["id"])?$_REQUEST["id"]:"";
$User_ID=isset($_REQUEST["id"])?$_REQUEST["id"]:"";
$type=isset($_REQUEST["type"])?$_REQUEST["type"]:"";
$year=isset($_REQUEST["year"])?$_REQUEST["year"]:$Curr_Year;
$Receipt_No=isset($_REQUEST["receipt_no"])?$_REQUEST["receipt_no"]:"";
$employee=isset($_REQUEST["employee"])?$_REQUEST["employee"]:"";

$Reg_Type=isset($_REQUEST["type"])?$_REQUEST["type"]:"";
$Pay_Year=isset($_REQUEST["year"])?$_REQUEST["year"]:$Curr_Year;
$Employee=isset($_REQUEST["employee"])?$_REQUEST["employee"]:"";

$Total="";
$Pay_Date1="";
$Notes="";
$Wife_No="";
$Son_More_NO="";

$Over_Num="";

$Operation="";
$car_No="";
$car_count="";
$invitation_No="";
$Exe_Val="";
$Beach="";
$Yacht="";
$Golf="";
$Tennis="";

$Status="";
$Fine_Delay="";
$Rowing="";
$knighthood="";


///////////////////////////////////////////////////////////check for user group
$Member_group = mysqli_query($con,"SELECT Group_ID  FROM members Where username='$myusername'");
	while($Member_group_arr=mysqli_fetch_array($Member_group))
			{
				$Group_ID=$Member_group_arr["Group_ID"];
			}

$finSql="select User_ID,Reg_Type,Pay_Year,Total,DATE_FORMAT(`Pay_Date`,'%d/%m/%Y') as Pay_Date1 ,Notes ,Wife_No,Son_More_NO,Over_Num,Receipt_No,Operation,car,invitation,Exe_Val,Beach,Yacht,Golf,Tennis,Employee,status,car_no,Fine_Delay,Rowing,knighthood  from Payment where User_ID ='$id'&& Reg_Type ='$type'&& Pay_Year ='$year'&& Receipt_No ='$Receipt_No'&& employee ='$employee'";

	$fin=mysqli_query($con,$finSql)or  die (mysqli_error($con));   //5/7/2018 Ahmed Othman
$n_res=mysqli_num_rows($fin);
while($res=mysqli_fetch_array($fin))
{
	$User_ID=$res["User_ID"];
	$Reg_Type=$res["Reg_Type"];
	$Pay_Year=$res["Pay_Year"];
	$Total=$res["Total"];
	$Pay_Date1=$res["Pay_Date1"];
	$Notes=$res["Notes"];
	$Wife_No=$res["Wife_No"];
	$Son_More_NO=$res["Son_More_NO"];
	//$Club_NO=$res["Club_NO"];
	$Over_Num=$res["Over_Num"];
	$Receipt_No=$res["Receipt_No"];
	$Operation=$res["Operation"];
	$car_No=$res["car"];
	$car_count=$res["car_no"]; //5/7/2018 Ahmed Othman
	$invitation_No=$res["invitation"];
	$Exe_Val=$res["Exe_Val"];
	$Beach=$res["Beach"];
	$Yacht=$res["Yacht"];
	$Golf=$res["Golf"];
	$Tennis=$res["Tennis"];
	$Employee=$res["Employee"];
	$Status=$res["status"];
	$Fine_Delay=$res["Fine_Delay"];
	$Rowing=$res["Rowing"];
	$knighthood=$res["knighthood"];

}
////////////////////////////
$Clubs_No=(int)$Beach+(int)$Yacht+(int)$Golf+(int)$Tennis+(int)$Rowing+(int)$knighthood;
if($Clubs_No==0){$Clubs_No=1;}
/////////////////////////////////////////////////تحديد توع المنتسب

$B_Y_G_T= " ";
if($Beach==1){
	$B_Y_G_T=$B_Y_G_T."شاطىء";
}if($Yacht==1){
	$B_Y_G_T=$B_Y_G_T." شراع ";
}if($Golf==1){
	$B_Y_G_T=$B_Y_G_T." جولف ";
}if($Tennis==1){
	$B_Y_G_T=$B_Y_G_T." تنس ";
}if($Rowing==1){
	$B_Y_G_T=$B_Y_G_T."تجديف";
}if($knighthood==1){
	$B_Y_G_T=$B_Y_G_T." فروسية ";
}
if($Beach==1&&$Yacht==1&&$Golf==1&&($Reg_Type==41||$Reg_Type==42 ||$Reg_Type==43 ||$Reg_Type==7)){
		$B_Y_G_T=" جميع الأندية ";
}
/////////////////////////////////////////////////Registeration Select
$fin1=mysqli_query($con,"select * from registeration where Ser ='$Reg_Type'")or  die (mysqli_error($con));
while($res1=mysqli_fetch_array($fin1))
{
	$Ser=$res1["Ser"];
	$Reg_Cost=$res1["Reg_Cost"];
	$Main_Cost=$res1["Main_Cost"];
	$Reg_Main_Cost=$res1["Reg_Main_Cost"];
	$Wife_Cost=$res1["Wife_Cost"];
	$More_Cost=$res1["More_Cost"];
	$Form_Cost=$res1["Form_Cost"];
	$Daughter_Cost=$res1["Daughter_Cost"];
	$Son_Cost=$res1["Son_Cost"];
	$Card_Cost=$res1["Card_Cost"];
	$Tax=$res1["Tax"];
	$car=$res1["car"];
	$invitation=$res1["invitation"];
	$car2=$res1["car2"];
	$invitation2=$res1["invitation2"];
	$Club_no_1=$res1["Beach"];
	$Club_no_2=$res1["Yacht"];
	$Club_no_3=$res1["Golf"];
	$Club_no_4=$res1["Rowing"];
	$Club_no_5=$res1["knighthood"];
	$Club_no_6=$res1["Tennis"];
	$Damaged=$res1["Damaged"];
	$Lost=$res1["Lost"];
}
$club_no_arr=array((int)$Club_no_1,(int)$Club_no_2,(int)$Club_no_3,(int)$Club_no_4,(int)$Club_no_5,(int)$Club_no_6);

(int)$Total42=0;
	if(($Reg_Type==41)||($Reg_Type==42)){
		for($i=0;$i<$Clubs_No;$i++){
			(int)$Total42 +=(int)$club_no_arr[$i];
		}
	}
////////////////////////////////////////////Basic Reg Select
 $sqlx ="select Name from Basic_Reg where User_ID ='$User_ID' && Reg_Type ='$Reg_Type' && Employee='$Employee'";
$finx=mysqli_query($con,$sqlx)or  die (mysqli_error($con));
 while($resx=mysqli_fetch_array($finx))
{
$Name=$resx["Name"];
}


if($Operation==1||$Operation==2){

    $sql ="select Name,image,b_date,Job,valid,Guest_no,end_date from Basic_Reg where User_ID =$User_ID && Reg_Type =$Reg_Type && Employee=$Employee  && rep =1 ";
    $Total_Wife_Card=mysqli_query($con,"SELECT card_ok  FROM Wife_Reg Where User_ID = $User_ID && Reg_Type =$Reg_Type && Card_OK=1 && Employee=$Employee ")or  die (mysqli_error($con));
    $Total_Secondary_Card=mysqli_query($con,"SELECT  card_ok FROM secondary_reg Where User_ID =$User_ID && Reg_Type =$Reg_Type && Card_OK=1 && Employee=$Employee ")or  die (mysqli_error($con));
    $Total_Wife_Cards =mysqli_num_rows($Total_Wife_Card);
    $Total_Secondary_Cards =mysqli_num_rows($Total_Secondary_Card);
    $Total_Secondary_Wife_Cards=(int)$Total_Wife_Cards+(int)$Total_Secondary_Cards;
    $Wife_Reg_sql="SELECT name,image  FROM Wife_Reg Where User_ID ='$User_ID' && Reg_Type ='$Reg_Type'&& Card_OK='1'&& Employee='$Employee' && rep=1";
	$Wife_Count = mysqli_query($con,$Wife_Reg_sql)or  die (mysqli_error($con));
	//echo $Wife_Reg_sql ;
	$secondary_Count = mysqli_query($con,"SELECT Name,image,DATE_FORMAT(`End_Date`,'%Y/%m/%d') as End_Date,Ser FROM secondary_reg Where User_ID ='$User_ID'&& Reg_Type ='$Reg_Type' && card_ok='1' && Employee='$Employee' && rep=1 ")or  die (mysqli_error($con));
    $secondary_reg_sql="SELECT Name,image,DATE_FORMAT(`End_Date`,'%Y/%m/%d')  as End_Date ,Ser FROM secondary_reg Where User_ID ='$User_ID'&& Reg_Type ='$Reg_Type' && card_ok='1' && Employee='$Employee' && rep=1 &&(((DATEDIFF(SYSDATE(),B_DATE))/365)>=10)";

    $More_Counts = mysqli_query($con,$sql)or  die (mysqli_error($con));
    $More_Count =mysqli_num_rows($More_Counts);
}else{
     $sql="select Name,image,b_date,Job,valid,Guest_no,end_date from Basic_Reg where User_ID ='$User_ID'&& Reg_Type ='$Reg_Type' && Employee='$Employee' ";
     $Wife_Reg_sql="SELECT name,image  FROM Wife_Reg Where User_ID ='$User_ID' && Reg_Type ='$Reg_Type'&& Card_OK='1'&& Employee='$Employee'" ;
     $Wife_Count = mysqli_query($con,$Wife_Reg_sql)or  die (mysqli_error($con));
     $secondary_reg_sql="SELECT Name,image,DATE_FORMAT(`End_Date`,'%Y/%m/%d') as End_Date, Ser FROM secondary_reg Where User_ID ='$User_ID'&& Reg_Type ='$Reg_Type' && card_ok='1' && Employee='$Employee' " ;
     $secondary_Count = mysqli_query($con,$secondary_reg_sql)or  die (mysqli_error($con));
     $More_Count=0;
     $Total_Secondary_Wife_Cards=0;
}

	if($Operation==8){

		$sql ="select Name,image,b_date,Job,valid,Guest_no,end_date from Basic_Reg where User_ID ='$User_ID' && Reg_Type ='$Reg_Type' && Employee='$Employee'    ";
		$Total_Wife_Card=mysqli_query($con,"SELECT card_ok  FROM Wife_Reg Where User_ID ='$User_ID' && Reg_Type ='$Reg_Type'&& Card_OK='1'&& Employee='$Employee'  ")or  die (mysqli_error($con));
		$Total_Secondary_Card=mysqli_query($con,"SELECT  card_ok FROM secondary_reg Where User_ID ='$User_ID' && Reg_Type ='$Reg_Type'&& Card_OK='1'&& Employee='$Employee' ")or  die (mysqli_error($con));
		$Total_Wife_Cards =mysqli_num_rows($Total_Wife_Card);
		$Total_Secondary_Cards =mysqli_num_rows($Total_Secondary_Card);
		$Total_Secondary_Wife_Cards=(int)$Total_Wife_Cards+(int)$Total_Secondary_Cards;
		$Wife_Reg_sql="SELECT name,image  FROM Wife_Reg Where User_ID ='$User_ID' && Reg_Type ='$Reg_Type'&& Card_OK='1'&& Employee='$Employee'  && New_flag =1" ;
		$Wife_Count = mysqli_query($con,$Wife_Reg_sql)or  die (mysqli_error($con));

		$secondary_reg_sql="SELECT Name,image,DATE_FORMAT(`End_Date`,'%Y/%m/%d') as End_Date, Ser FROM secondary_reg Where User_ID ='$User_ID'&& Reg_Type ='$Reg_Type' && card_ok='1' && Employee='$Employee'  && New_flag =1" ;
		$secondary_Count = mysqli_query($con,$secondary_reg_sql)or  die (mysqli_error($con));

		$ssql="SELECT Name,image,DATE_FORMAT(`End_Date`,'%Y/%m/%d') as End_Date ,Ser FROM secondary_reg Where User_ID ='$User_ID'&& Reg_Type ='$Reg_Type' && card_ok='1' && Employee='$Employee' && (((DATEDIFF(SYSDATE(),B_DATE))/365)>=10) && New_flag =1";
		$More_Counts = mysqli_query($con,$ssql)or  die (mysqli_error($con));
		$More_Count =mysqli_num_rows($More_Counts);
	}


    $fin2=mysqli_query($con,$sql)or  die (mysqli_error($con));
    $Basic_s=mysqli_num_rows($fin2);
    while($res2=mysqli_fetch_array($fin2))
    {
            $Name=$res2["Name"];
            $image=$res2["image"];
            $b_date=$res2["b_date"];
            $Job=$res2["Job"];
            $valid = $res2["valid"];
            $Guest_no=$res2["Guest_no"];
            $end_date=$res2["end_date"];
    }
////////////////////////////////////////////////////////////////////////Wife_Reg Select

if (!isset($end_date)) {
	$GetEndDate = mysqli_query($con,"select end_date from Basic_Reg where User_ID ='$User_ID'&& Reg_Type ='$Reg_Type' && Employee='$Employee'") or die (mysqli_error($con));
	while ($GetEndDateRes = mysqli_fetch_array($GetEndDate)) {
		$end_date = $GetEndDateRes["end_date"];
	}
}

$Wife_s=mysqli_num_rows($Wife_Count);

        $i1=0;
		$Wife=array();
		$Wife_Name=array();
	while($Wife_arr=mysqli_fetch_array($Wife_Count))
			{
			$Wife[$i1]=$Wife_arr["image"];
			$Wife_Name[$i1]=$Wife_arr["name"];
			$i1++;		
	       }

////////////////////////////////////////////////////////////////////////////////////////Secondary Select
	 $i=0;
	 $Secondary=Array();
	 $Secondary_Name=Array();
	 $Secondary_Date=Array();
	 $serials=array();
	while($secondary_arr=mysqli_fetch_array($secondary_Count))
			{
			$Secondary[$i]=$secondary_arr["image"];
			$Secondary_Name[$i]=$secondary_arr["Name"];
			$Secondary_Date[$i]=$secondary_arr["End_Date"];
            $serials[$i]=$secondary_arr["Ser"];
			$i++;		
	}
		$Secondary_s=mysqli_num_rows($secondary_Count);
		
		///////////////////////////////////////////////////reg_type Select
		$result = mysqli_query($con,"SELECT Code,Name FROM reg_type ORDER BY Code")or  die (mysqli_error($con));
			while($ress=mysqli_fetch_array($result))
			{
			$Reg_Type_Code=$ress["Code"];
			$Reg_Type_Name=$ress["Name"];
			if ($Reg_Type==$Reg_Type_Code)
 			$Reg_Name=$Reg_Type_Name;
			}

///////////////////////////////////////////////////////////////////////
$regist=mysqli_query($con,"select * from Payment where User_ID ='$User_ID'&& Reg_Type ='$Reg_Type'&& Employee='$Employee'")or  die (mysqli_error($con));
$registered=mysqli_num_rows($regist);
//////////////////////////////////////////////////////////////
$Car_Chk=mysqli_query($con,"select * from Payment where User_ID ='$User_ID'&& Reg_Type ='$Reg_Type' && Pay_Year='$Pay_Year' && car <>0  && Receipt_No <>'$Receipt_No'&& Employee='$Employee'")or  die (mysqli_error($con));
$Car_Chk_N=mysqli_num_rows($Car_Chk);
//////////////////////////////////////////////////////////////
$Inv_Chk=mysqli_query($con,"select * from Payment where User_ID ='$User_ID'&& Reg_Type ='$Reg_Type' && Pay_Year='$Pay_Year' && invitation='1' && Employee='$Employee'")or  die (mysqli_error($con));
$Inv_Chk_N=mysqli_num_rows($Inv_Chk);
//////////////////////////////////////////////////////////////
?>

	<SCRIPT language="JavaScript" type="text/javascript">

function Receipt_Print()
{
    $detail_link = "Receipt_Print.php";
    $param = {
	 'Total42':"<?php echo $Total42 ?>",
	 'User_ID' :"<?php echo $User_ID ?>",
	 'Reg_Type' :"<?php echo $Reg_Type ?>",
	 'Reg_Name' :"<?php echo $Reg_Name ?>",
	 'Pay_Year' :"<?php echo $Pay_Year ?>",
	 'Total' :"<?php echo $Total ?>",
	 'Pay_Date1' :"<?php echo $Pay_Date1 ?>",
	 'Notes' :"<?php echo $Notes ?>",
	 'Wife_No' :"<?php echo $Wife_No ?>",
	 'Basic_s' :"<?php echo $Basic_s ?>",
	 'Secondary_s' :"<?php echo $Secondary_s ?>",
	 'Wife_s' :"<?php echo $Wife_s ?>",
	 'Son_More_NO' :"<?php echo $Son_More_NO ?>",
	 'More_Count' : "<?php echo $More_Count ?>",
	 'car_No':"<?php echo $car_No ?>",
	 'car_count':"<?php echo $car_count ?>",
	 'invitation_No':"<?php echo $invitation_No ?>",
	 'Operation':"<?php echo $Operation ?>",
	 'Receipt_No': "<?php echo $Receipt_No ?>",
	 'Clubs_No': "<?php echo $Clubs_No ?>",
	 'Exe_Val':"<?php echo $Exe_Val ?>",
	 'Status':"<?php echo $Status ?>",
	 'Fine_Delay':"<?php echo $Fine_Delay ?>",
	 'Ser' :"<?php echo $Ser ?>",
	 'Reg_Cost' :"<?php echo $Reg_Cost ?>",
	 'Main_Cost' :"<?php echo $Main_Cost ?>",
	 'Reg_Main_Cost' :"<?php echo $Reg_Main_Cost ?>",
	 'Wife_Cost' :"<?php echo $Wife_Cost ?>",
	 'More_Cost' :"<?php echo $More_Cost ?>",
	 'Form_Cost' :"<?php echo $Form_Cost ?>",
	 'Card_Cost' :"<?php echo $Card_Cost ?>",
	 'Damaged' :"<?php echo $Damaged ?>",
	 'Lost' :"<?php echo $Lost ?>",
	 'Tax' :"<?php echo $Tax ?>",
	 'car':"<?php echo $car ?>",
	 'Invitation':"<?php echo $invitation ?>",
	 'car2':"<?php echo $car2 ?>",
	 'Invitation2':"<?php echo $invitation2 ?>",
	 'Name' :"<?php echo $Name ?>",
	 'valid':<?php if (isset($valid)){echo $valid;}else{echo 0 ;}  ?> ,
	 'myusername':	"<?php echo $myusername ?>",
	 'registered' :"<?php echo $registered ?>",
	 'Group_ID' :"<?php echo $Group_ID ?>",
	 'reg_type_code': "<?php echo $Reg_Type ?>",
	 'Car_Chk_N': "<?php echo $Car_Chk_N ?>",
	 'Inv_Chk_N': "<?php echo $Inv_Chk_N ?>"
    }

     send_post($detail_link,$param,"POST",600,600);
}


function card_reprint() {
    $detail_link = "card_reprint.php";
    $param = {'User_ID': <?php echo $User_ID ?>,'Pay_Year':<?php echo $Pay_Year ?>,'employee':<?php echo $Employee ?>,'reg_type_code':<?php echo $Reg_Type ?>,'Receipt_No':<?php echo $Receipt_No ?>,'session_user':<?php echo $session_user_id ?>};
    send_post($detail_link,$param,"POST",500,500);
}


function invitation_reprint() {
    $detail_link = "invitation_reprint.php";
    $param = {'User_ID': <?php echo $User_ID ?>,'Pay_Year':<?php echo $Pay_Year ?>,'employee':<?php echo $Employee ?>,'reg_type_code':<?php echo $Reg_Type ?>,'Receipt_No':<?php echo $Receipt_No ?>,'session_user':<?php echo $session_user_id ?>};
    send_post($detail_link,$param,"POST",320,200);
}
//////////////////////////////////////////////////////////////////////12-12-2018 Othman



////////////////////////////////////////////////////////////////////////////////////////////Start Of Invitation Print
function invitation_print(){
if(window.parent.document.getElementById("invitation_printed").value >0)
{
alert("لقد تم طباعه الدعوات منذ قليل -- يتطلب فتحه مجددا للطباعه صلاحيه اعلى ");
}else {
    $detail_link = "invitation_view.php";
    $param = {'User_ID': <?php echo $User_ID ?>,'Reg_Name' :'<?php echo $Reg_Name ?>' ,'Name':'<?php echo $Name ?>','reg_type_code' :<?php echo $Reg_Type ?> ,'Pay_Year' :<?php echo $Pay_Year ?> ,'Receipt_No' :<?php echo $Receipt_No ?>,'employee'  :<?php echo $Employee ?>, 'session_user'  :<?php echo $session_user_id ?>, 'Inv_Chk_N' :<?php echo $Inv_Chk_N?>};
    send_post($detail_link,$param,"post",320,200);
}
}

function card_print() {
	alert (123);
if(window.parent.document.getElementById("card_printed").value >0)
{
alert("لقد تم طباعه الكارنيه منذ قليل -- يتطلب فتحه مجددا للطباعه صلاحيه اعلى ");
}else {

    $detail_link = "card_print.php";
    $param={
	 'valid' : <?php if (isset($valid)){echo $valid;}else{echo 0 ;}  ?>,
	 'User_ID' : <?php echo $User_ID ?>,
	 'Reg_Name' : "<?php echo $Reg_Name ?>",
	 'Pay_Year' : <?php if (isset($Pay_Year)){echo $Pay_Year;}else{echo 0 ;}  ?>,
	 'Over_Num' : <?php  if (isset($Over_Num)&& is_numeric($Over_Num)){echo $Over_Num;}else{echo 0 ;}  ?>,
	 'Employee' : <?php if (isset($Employee)){echo $Employee;}else{echo 0 ;}  ?>,
	 'Reg_Type' : <?php if (isset($Reg_Type)){echo $Reg_Type;}else{echo 0 ;}  ?>,
	 'Name' : "<?php echo $Name ?>",
	 'b_date' : "<?php if (isset($b_date)){echo $b_date;}else{echo '' ;}?>",
	 'end_date' : "<?php if (isset($end_date)){echo $end_date;}else{echo '' ;}?>",
	 'Wife_s' : <?php if (isset($Wife_s)){echo $Wife_s;}else{echo 0 ;}  ?>,
	 'Secondary_s' : <?php if (isset($Secondary_s)){echo $Secondary_s;}else{echo 0 ;}   ?>,
	 'Operation':<?php if (isset($Operation)&& is_numeric($Operation)){echo $Operation;}else{echo 0 ;}  ?>,
	 'Total_Secondary_Wife_Cards' : <?php if (isset($Total_Secondary_Wife_Cards)){echo $Total_Secondary_Wife_Cards;}else{echo 0 ;}   ?>,
	 'image' : "<?php if (isset($image)){echo $image;}else{echo '' ;}?>",
	 'B_Y_G_T' : "<?php echo $B_Y_G_T ?>",
	 'Job' : "<?php if (isset($Job)){echo $Job;}else{echo '' ;}?> ",
	 'Guest_no' : <?php  if (isset($Guest_no)){echo $Guest_no;}else{echo 0 ;} ?>,
	 'Receipt_No' : <?php if (isset($Receipt_No)){echo $Receipt_No;}else{echo 0 ;}  ?>,
	 'session_user_id' : <?php echo $session_user_id ?>,
     'Wife_Name' :["<?php echo join("\", \"", $Wife_Name); ?>"],
     'Wife_Image' : ["<?php echo join("\", \"", $Wife); ?>"],
     'Secondary_Name' : ["<?php echo join("\", \"", $Secondary_Name); ?>"],
     'Secondary_Image' : ["<?php echo join("\", \"", $Secondary); ?>"],
     'Secondary_Date' : ["<?php echo join("\", \"", $Secondary_Date); ?>"],
      'serials' :["<?php echo join("\", \"", $serials); ?>"]
}

   send_post($detail_link,$param,"post",400,620);

}
//card_print_log();
}

</SCRIPT>


<?php

echo "
<Center>
<table BORDER=1 RULES=none frame='hsides' cellspacing=5 cellpadding=8 cols=5> 
<thead>
</thead>
<tbody>

<TR  align='right' >
<TD><FONT size='4'  >رقم العضو : <INPUT TYPE='TEXT' NAME='Text1'style='font-size: 10pt; height:25px;width:100px' value='$User_ID'  READONLY>
</TD>
<INPUT TYPE='hidden' NAME='Text600'style='font-size: 10pt; height:25px;width:100px' value='$Receipt_No'  >
<INPUT TYPE='hidden' NAME='Text6000'style='font-size: 10pt; height:25px;width:100px' value='$Employee'  >
<INPUT TYPE='hidden' NAME='Text60000'style='font-size: 10pt; height:25px;width:100px' value='$Status'  >
<H2><B>$Name</B></H2>
<TD ><FONT size='4'  > نوع العضوية  : 
	
			<select name='Text2' style='font-size: 10pt; height:25px;width:100px' value=$Reg_Type >";
			$result = mysqli_query($con,"SELECT Code,Name FROM reg_type ORDER BY Code");
	while($ress=mysqli_fetch_array($result))
			{			$Reg_Type_Code=$ress["Code"];
						$Reg_Type_Name=$ress["Name"];
				echo"<option value=$Reg_Type";
				if ($Reg_Type_Code==$Reg_Type)
 					{echo" selected='yes'>";}
				else echo ">"; echo "$Reg_Type_Name</option>";
				}
			
echo"</select></TD>$ress</TR>			
<TR><FONT size='4'  > العملية  : 
	<select name='Text700' style='height:25px;width:300px' value=$Operation>";
					echo"<option value=0";
				if ($Operation=="0")
 					{echo" selected='yes'>";}
				else echo ">"; echo " تجديد عضوية</option>";
					echo"<option value=1";
				if ($Operation=="1")
 					{echo" selected='yes'>";}
				else echo ">"; echo "بدل فاقد</option>";
					echo"<option value=2";
				if ($Operation=="2")
 					{echo" selected='yes'>";}
				else echo ">"; echo "بدل تالف</option>";		
					echo"<option value=3";
				if ($Operation=="3")
 					{echo" selected='yes'>";}
				else echo ">"; echo "دعوة مرافق</option>";
					echo"<option value=4";
				if ($Operation=="4")
 					{echo" selected='yes'>";}
				else echo ">"; echo "إستيكر سيارة</option>";
				echo"<option value=5";
				if ($Operation=="5")
 					{echo" selected='yes'>";}
				else echo ">"; echo "قسط أول</option>";
				echo"<option value=6";
				if ($Operation=="6")
 					{echo" selected='yes'>";}
				else echo ">"; echo "قسط ثانى</option>";
				echo"<option value=7";
				if ($Operation=="7")
 					{echo" selected='yes'>";}
				else echo ">"; echo "تسوية مديونية</option>";
				echo"<option value=8";
				if ($Operation=="8")
 					{echo" selected='yes'>";}
				else echo ">"; echo "إضافة عبء</option>";
echo"</select></TR>";
echo"
<TD ><FONT size='4'  > سنة المحاسبة  : <INPUT TYPE='TEXT' NAME='Text33' style='font-size: 10pt; height:25px;width:100px' value='$Pay_Year' READONLY></TD>
<TD ><FONT size='4'  > تاريخ إذن السداد  : 	<input type='text' name='Text36' style='font-size: 10pt; height:25px;width:70px' value='$Pay_Date1'>		</TD>
<TD ><FONT size='5'  > دعوة مرافق  : <INPUT TYPE='checkbox' NAME='chk1' style='height:25px;width:100px' ";if ($invitation_No==1){echo"checked></TD>";}else{echo"></TD>";}echo"
<TD  colspan='2' align='left' ><FONT size='4'  > رقم السيارة  : <INPUT TYPE='TEXT' NAME='Text900' style='font-size: 10pt; height:25px;width:100px' value='$car_No' ></TD>
</TR>
<TR  align='right' >	<B>		
<TD ><FONT size='5'  > شاطىء  : <INPUT TYPE='checkbox' NAME='chk2' style='height:25px;width:100px' ";if ($Beach==1){echo"checked></TD>";}else{echo"></TD>";}echo"
<TD ><FONT size='5'  > شراع  : <INPUT TYPE='checkbox' NAME='chk3' style='height:25px;width:100px'  ";if ($Yacht==1){echo"checked></TD>";}else{echo"></TD>";}echo"
<TD ><FONT size='5'  > جولف  : <INPUT TYPE='checkbox' NAME='chk4' style='height:25px;width:100px'  ";if ($Golf==1){echo"checked></TD>";}else{echo"></TD>";}echo"
<TD ><FONT size='5'  > تنس  : <INPUT TYPE='checkbox' NAME='chk5' style='height:25px;width:100px'   ";if ($Tennis==1){echo"checked></TD>";}else{echo"></TD>";}echo"
<TD ><FONT size='5'  >تجديف : <INPUT TYPE='checkbox' NAME='chk6' style='height:25px;width:100px'   ";if ($Rowing==1){echo"checked></TD>";}else{echo"></TD>";}echo"
<TD ><FONT size='5'  >فروسية : <INPUT TYPE='checkbox' NAME='chk7' style='height:25px;width:100px'   ";if ($knighthood==1){echo"checked></TD>";}else{echo"></TD>";}echo"
</TR></B>
	<TR  align='right' >
<TD ><FONT size='4'  > المبلغ المستحق  : <INPUT TYPE='TEXT' NAME='Text34' style='font-size: 10pt; height:25px;width:100px' value='$Total' readonly ></TD>";
/*<TD ><FONT size='4'  > نسبة الإعفاء  : </TD><TD>
<select name='Text35' style='height:25px;width:100px' value=$Exe_Val>";
			echo"<option value=0";
				if ($Exe_Val=="0")
 					{echo" selected='yes'>";}
				else echo ">"; echo " 0 %</option>";
			echo"<option value=25";
				if ($Exe_Val=="25")
 					{echo" selected='yes'>";}
				else echo ">"; echo " 25 %</option>";
			echo"<option value=50";
				if ($Exe_Val=="50")
 					{echo" selected='yes'>";}
				else echo ">"; echo " 50 %</option>";
			echo"<option value=75";
				if ($Exe_Val=="75")
 					{echo" selected='yes'>";}
				else echo ">"; echo " 75 %</option>";
			echo"<option value=100";
				if ($Exe_Val=="100")
 					{echo" selected='yes'>";}
				else echo ">"; echo " 100 %</option>";
				echo"</TD>";
				*/
echo"
</TR><TR  align='right' >
<TR  align='center' >					
					<TD colspan='3'><FONT size='4'  > ملاحظات  : 
	<textarea rows='5' cols='20' style='font-size: 10pt; height:50px;width:200px' NAME='Text39' >$Notes</textarea>
</TD>
</TR><TR>
";
			if($Group_ID ==4){
				echo"
				<TH></TH>
				<TH><a href='javascript:Receipt_Print();'>طباعة إخطار السداد</a> </TH>
				 <TH></TH>";

			}
				$valid_card_print=0;
				$valid_payment_print=0;
				$valid_visit_print=0;

			 $card_print_sql="select * from user_pri where user_id=$session_user_id and pri_code =(select pri_code from privlege where pri_name ='card_print')" ;
              if(mysqli_num_rows(mysqli_query($con,$card_print_sql))==1)
			  {
				  $valid_card_print=1;
			  };

				$payment_print_sql="select * from user_pri where user_id=$session_user_id and pri_code =(select pri_code from privlege where pri_name ='payment_print')" ;
				if(mysqli_num_rows(mysqli_query($con,$payment_print_sql))==1)
				{
					$valid_payment_print=1;
				};

				$visit_print_sql="select * from user_pri where user_id=$session_user_id and pri_code =(select pri_code from privlege where pri_name ='visit_print')" ;
				if(mysqli_num_rows(mysqli_query($con,$visit_print_sql))==1)
				{
					$valid_visit_print=1;
				};
				
                 $card_reprint_link=mysqli_num_rows(mysqli_query($con,"select * from user_pri where user_id=$session_user_id and pri_code =(select pri_code from privlege where pri_name ='card_reprint')")) ;

                 $card_printed_sql = "select * from printer_log where id = $User_ID and type= $Reg_Type and year= $Pay_Year and receipt_no=$Receipt_No and print=1 and employee=$employee";
                 $card_printed_res = mysqli_query($con,$card_printed_sql);
                 $card_printed = mysqli_num_rows($card_printed_res);
			if($Group_ID == 3){

				if(($Operation==0)&& (($Reg_Type==13)||($Reg_Type==14))){
					if($valid_card_print) {
					if($card_printed==0){
						echo "<TH><a href='javascript:card_print();'>طباعة الكارنيه</a></TH>";
						}
					}
					if($card_reprint_link&&$card_printed>0){
						echo "<TH><a href='javascript:card_reprint();'> تنشيط إعاده طباعه الكارنيه </a></TH>";
						}
				}

				else {
                     if($valid_payment_print && ($Status==0 or $Status==3)) {
						 echo "<TH><a href='javascript:Receipt_Print();'>طباعة إذن السداد</a> </TH>";
					 }
					 if($valid_payment_print && ($Status==2) ) {
						 echo "<TH><a href='javascript:Receipt_Print();'>طباعة إخطار السداد</a> </TH>";
					 }

					if($Operation==0||$Operation==1||$Operation==2||$Operation==5||$Operation==6||$Operation==8){
						if($valid_card_print && ($Status==0 or $Status==3)) {
						 if($card_printed==0){
						echo"<TH><a href='javascript:card_print();'>طباعة الكارنيهات</a></TH>";}
						}
						 if($card_reprint_link&&$card_printed>0){
						echo "<TH><a href='javascript:card_reprint();'> تنشيط إعاده طباعه الكارنيه </a></TH>";
						}
						
					     }
					if($Operation==0||$Operation==3){

					
					
					$inv_printed_sql = "select * from invit_print_log where id = $User_ID and type= $Reg_Type and year= $Pay_Year and receipt_no=$Receipt_No and print=1 and employee=$employee";
                 $invite_printed_res = mysqli_query($con,$inv_printed_sql);
                 $invite_printed = mysqli_num_rows($invite_printed_res);
					
						if($valid_visit_print && ($Status==0 or $Status==3)) {
						if($invitation_No<>0){
						if($invite_printed==0){
						echo"<TH><a href='javascript:invitation_print();'>طباعة الدعوات</a></TH>";}
						if($invite_printed>0){
						echo"<TH><a href='javascript:invitation_reprint();'>إعاده تنشيط طباعه الدعوات </a></TH>";}
						}
						}
					}
				}
			}
echo"
	</TR></tbody></table> <br><hr/>
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background='../img/sperator.gif'  > 
        <TR>
            <TD VALIGN='top'  >
                <img src='../img/sperator.gif' border='0' width='2' height='40'></TH>

<TH   align=center background='../img/sperator.gif'><A href='Payment_Delete.php?User_ID=$User_ID&Reg_Type=$Reg_Type&Pay_Year=$Pay_Year&Receipt_No=$Receipt_No ' ><img src='../img/delete.png' border='0' width='26' height='26'><br clear='all'> حذف </A></TH>
<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
";
if($Group_ID==3 && $Status==2){
echo"
<TH   align=center background='../img/sperator.gif'><INPUT type='image' name='b3'src='../img/update.gif' width='26' height='26'><br clear='all'> تأكيد الإحتساب  </A></TH>
";}
echo"
<TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
</TD>
</TR>
</Table>
";

mysqli_close( $con);

?>


</FORM>


</BODY>

</HTML>
