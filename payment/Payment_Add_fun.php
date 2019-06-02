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
include_once '../menu.php';write_menu('Payment')
?>


<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<FORM NAME="FORM2"  action="Payment_Reg_List.php" method="post">
	<?PHP
///////////////////////////////////////////////////////////check for user group
$Member_group = mysqli_query($con,"SELECT Group_ID  FROM members Where id=$session_user_id");
	while($Member_group_arr=mysqli_fetch_array($Member_group))
			{
				$Group_ID=$Member_group_arr["Group_ID"];
			}

////////////////////////////////////////////////////////////

    $Text33=isset($_REQUEST["Text33"])? $_REQUEST["Text33"]:"";
    $Text1=isset($_REQUEST["Text1"])? $_REQUEST["Text1"]:"";
    $Text2=isset($_REQUEST["Text2"])? $_REQUEST["Text2"]:"";
    $Employee=isset($_REQUEST["Employee"])? $_REQUEST["Employee"]:"";
    $Text900=isset($_REQUEST["Text900"])? $_REQUEST["Text900"]:"";
    $Text35=isset($_REQUEST["Text35"])? $_REQUEST["Text35"]:"";
    $Text37=isset($_REQUEST["Text37"])? $_REQUEST["Text37"]:"";
    $Text34=isset($_REQUEST["Text34"])? $_REQUEST["Text34"]:"";
    $Text36=isset($_REQUEST["Text36"])? $_REQUEST["Text36"]:"";
    $Text39=isset($_REQUEST["Text39"])? $_REQUEST["Text39"]:"";
    $car_no=isset($_REQUEST["car_no"])? $_REQUEST["car_no"]:"";
    $operation_type=isset($_REQUEST["operation_type"])? $_REQUEST["operation_type"]:"";
    $chk2=isset($_REQUEST["chk2"])? $_REQUEST["chk2"]:0;
    $chk3=isset($_REQUEST["chk3"])? $_REQUEST["chk3"]:0;
    $chk4=isset($_REQUEST["chk4"])? $_REQUEST["chk4"]:0;
    $chk5=isset($_REQUEST["chk5"])? $_REQUEST["chk5"]:0;
    $chk6=isset($_REQUEST["chk6"])? $_REQUEST["chk6"]:0;
    $chk7=isset($_REQUEST["chk7"])? $_REQUEST["chk7"]:0;
    $Err="";

$fin=mysqli_query($con,"select * from Payment where User_ID ='$Text1'&& Reg_Type ='$Text2'&&Employee='$Employee'&& Pay_Year ='$Text33'");
$n_res=mysqli_num_rows($fin);
////////////////////////////////////////////////////////////////check for same year 
$fin44=mysqli_query($con,"select * from Payment where User_ID ='$Text1'&& Reg_Type ='$Text2'&&Employee='$Employee'&& Pay_Year ='$Text33'&& (Operation ='0'||Operation ='5')&& status in(0,3)");
$N_Same_Res=mysqli_num_rows($fin44);


$Wife_Count = mysqli_query($con,"SELECT count(*)as counts  FROM Wife_Reg Where User_ID=$Text1 && Reg_Type=$Text2 &&Employee='$Employee'&& Card_OK=1");
	while($Wife_Counts=mysqli_fetch_array($Wife_Count))
			{
			$Wife=$Wife_Counts["counts"];
	}
	
$secondary_Count_More = mysqli_query($con,"SELECT count(*)as counts  FROM secondary_reg Where User_ID=$Text1 && Reg_Type=$Text2 &&Employee='$Employee' &&((DATEDIFF(SYSDATE(),B_DATE))/365)>4 && Card_OK=1");
	while($secondary_Counts_More=mysqli_fetch_array($secondary_Count_More))
			{
			$Secondary_More=$secondary_Counts_More["counts"];
	}
	$Secondary_count=(int)$Secondary_More;
	/////////////////////////////////////////////////////////////////////check for secondary more than 24 years old 
	   /*  $date1=explode("/",$Text8); // change date format
		$Text8=$date1[2]."-".$date1[1]."-".$date1[0];// change date format
		$Text8=date("Y-m-d",strtotime($Text8));*/
	//////////////////////////////////////////////////////////////////////////////////////////////////
$registeration = mysqli_query($con,"SELECT *  FROM registeration Where Ser=$Text2");
	while($registeration_arr=mysqli_fetch_array($registeration))
			{
			$Reg_Cost=$registeration_arr["Reg_Cost"];
			$Main_Cost=$registeration_arr["Main_Cost"];
			$Reg_Main_Cost=$registeration_arr["Reg_Main_Cost"];
			$Wife_Cost=$registeration_arr["Wife_Cost"];
			$More_Cost=$registeration_arr["More_Cost"];
			$Form_Cost=$registeration_arr["Form_Cost"];
			$Daughter_Cost=$registeration_arr["Daughter_Cost"];
			$Son_Cost=$registeration_arr["Son_Cost"];
			$Card_Cost=$registeration_arr["Card_Cost"];
			$tax=$registeration_arr["Tax"];
			$car=$registeration_arr["car"];
			$invitation=$registeration_arr["invitation"];
			$car2=$registeration_arr["car2"];
			$invitation2=$registeration_arr["invitation2"];
			$Club_no_1=$registeration_arr["Beach"];
			$Club_no_2=$registeration_arr["Yacht"];
			$Club_no_3=$registeration_arr["Golf"];
			$Club_no_4=$registeration_arr["Rowing"];
			$Club_no_5=$registeration_arr["knighthood"];
			$Club_no_6=$registeration_arr["Tennis"];
			$Damaged=$registeration_arr["Damaged"];
			$Lost=$registeration_arr["Lost"];
	}
	
	//////////////////////////////////////////////////////////////////
$car_no=0;
   ////////////CAR for second car
  $CAR_count = mysqli_query($con,"SELECT count(*)as counts  FROM payment Where User_ID=$Text1 && Reg_Type=$Text2 &&Employee='$Employee'&& pay_year=$Text33 && car<>0 && status<>1");
	while($CAR_counts=mysqli_fetch_array($CAR_count)){$cars=$CAR_counts["counts"];}
	switch($cars){
	case 0:
			$car=(int)$car;
			$car_no=1;
			break;
	case 1:
			$car=(int)$car2;
			$car_no=2;
			break;
	case 2:	
			$car=0;
			$Err="لقد تعدى الحد الأقصى من إستيكر السيارة";
			break;
	}
	if ($Text900 == Null){
	$Text900	=	0;$car=0;
	}
////////////////////////////////////////////////////////////////////////////////////////
    $Invitation_val=0;
  ////////////Invitation
  if((int)$operation_type==0){
		if (isset($_POST['chk1'])) {$Invitation_val=1;}else{$Invitation_val=0;}  
  }
	if ((int)$operation_type == 3){$Invitation_val=1;}
	
	$Invitation_count = mysqli_query($con,"SELECT count(*) as count_inv  FROM payment Where User_ID=$Text1 && Reg_Type=$Text2 &&Employee='$Employee'&& pay_year=$Text33 && invitation=$Invitation_val && status<>1"); ///
			while($Invitation_counts=mysqli_fetch_array($Invitation_count)){$Invitations=$Invitation_counts["count_inv"];}
			switch($Invitations){
		
			case 0:
					if((int)$Invitation_val == 1){
					$Invitation=(int)$invitation;}else{$Invitation=0;}
					break;
			case 1:
					if($Invitation_val==1){
					$Invitation=(int)$invitation2;}else{$Invitation=0;}
					break;
			case 2:
					$Invitation=0;
					$Err="لقد تعدى الحد الأقصى من الدعوات";
					break;
			default :
					$Invitation=0;
					$Err="سبق السداد من قبل برجاء التأكد";
					break;
					
			}
			

	/////////////////////////////////////operation type
	if ((int)$operation_type==1){ //////////////////بدل فاقد
	$Card_Cost=(int)$Lost;
	}
	if ((int)$operation_type==2){ //////////////////بدل تالف
	$Card_Cost=(int)$Damaged;
	}
	
	////////////////////////////////////////check if he pay ever
$regist=mysqli_query($con,"select * from Payment where User_ID ='$Text1'&& Reg_Type ='$Text2'&&Employee='$Employee' && status in (0,3)")or  die (mysqli_error($con));
$n_regist=mysqli_num_rows($regist);
  if($n_regist>=1){
  	  $registval=0;
  }else{
  $registval=1;
  }
 ///////////////////////////////////////////Installment first
	$flag5=0;
	$flag6=0;
	$i=0;
	
	$installment_test=mysqli_query($con,"select operation from payment where User_ID ='$Text1'&& Reg_Type ='$Text2'&&Employee='$Employee'&&Pay_year='$Text33'&& status in (0,3)")or  die (mysqli_error($con));
	while($installment_result=mysqli_fetch_array($installment_test))
	{
		$Operation = $installment_result["operation"];
		if($Operation ==5)
		{
		    $flag5=1;
		}else if($Operation ==6)
		{$flag6=1;}

		$i++;
	}
if((int)$operation_type == 5){
	if(($flag5==0)&&($n_regist==0)){
	$Reg_Cost=(int)$Reg_Cost/2;
	$Text39="يجب دفع القسط الثانى فى خلال 6 أشهر";
	//$Text33=0;
	}else{
	$Err="عملية مكررة برجاء  التأكد من نوع العملية";
	}
}

  ////////////////////////////////////check for last year pf payment and validity of this id
  
   $fin2=mysqli_query($con,"select  (select max(pay_year) from payment as p where p.user_id=b.user_id and p.reg_type = b.reg_type and p.employee = b.employee and status in (0,3)) as Last_Year,valid,Beach,Yacht,Golf,Tennis,Rowing,knighthood from Basic_Reg  as b where User_ID ='$Text1'&& Reg_Type ='$Text2' && Employee='$Employee'")or  die (mysqli_error($con));
	while($res2=mysqli_fetch_array($fin2))
	{
		$Last_Year=$res2["Last_Year"];
		$valid=$res2["valid"];
		$Beach=$res2["Beach"];
		$Yacht=$res2["Yacht"];
		$Golf=$res2["Golf"];
		$Tennis=$res2["Tennis"];
		$Rowing=$res2["Rowing"];
		$knighthood=$res2["knighthood"];
			
	}
	$Basic_res=mysqli_num_rows($fin2);
	if($Basic_res==0){$Err="العضوية غير موجودة برجاء التأكد من رقم أو نوع العضوية";}


    $New_Card_Cost="" ;
if($valid==0){////////////////////////إيقاف مؤقت
	$New_Card_Cost=(((int)$Card_Cost+(int)$tax)*((int)$Wife+(int)$Secondary_More));
	$Reg_Main_Cost=0;
}else if($valid==1){///////////////// عضوية نشطة
	$New_Card_Cost=(((int)$Card_Cost+(int)$tax)*((int)$Wife+(int)$Secondary_More+1));
}
///////////////////////////////

if (isset($_REQUEST['chk2'])) {$Beach=1;}else{$Beach=0;}
if (isset($_REQUEST['chk3'])) {$Yacht=1;}else{$Yacht=0;}
if (isset($_REQUEST['chk4'])) {$Golf=1;}else{$Golf=0;}
if (isset($_REQUEST['chk5'])) {$Tennis=1;}else{$Tennis=0;}
if (isset($_REQUEST['chk6'])) {$Rowing=1;}else{$Rowing=0;}
if (isset($_REQUEST['chk7'])) {$knighthood=1;}else{$knighthood=0;}
/////////////////////////////////////////////////////////////////عضوية الإنتساب مؤقت

$Club_No=0;
$Sub_Total=0;
$clubs_inv=1;
if(($Text2==2)||($Text2==25)||($Text2==27)||($Text2==29)||($Text2==41)||($Text2==42)||($Text2==36)  ){
		if($Beach==1){(int)$Club_No++;}
		if($Yacht==1){(int)$Club_No++;}
		if($Golf==1){(int)$Club_No++;}
		if($Tennis==1){(int)$Club_No++;}
		if($Rowing==1){(int)$Club_No++;}
		if($knighthood==1){(int)$Club_No++;}
		if($Club_No==0){(int)$Club_No++;}
		}
		///multiply every check on value and loop for all array not on club_no
//////////////////////////////////////////////////العضوية الرياضية		
		if(($Text2==3)||($Text2==5)||($Text2==7)||($Text2==15)||($Text2==23)||($Text2==24)||($Text2==37)||($Text2==16) ||($Text2==43) ){
			$Club_No=1;
		}
////////////////////////الدعوة هيئة و خارجى
$club_no_arr=array(((int)$Club_no_1*(int)$Beach),((int)$Club_no_2*(int)$Yacht),((int)$Club_no_3*(int)$Golf),((int)$Club_no_4*(int)$Tennis),((int)$Club_no_5*(int)$Rowing),((int)$Club_no_6*(int)$knighthood));

///////////////////////////////////////////////////////////////
$form_Val_New=(int)$Text33-(int)$Last_Year  ;
if($form_Val_New>=1){
$form_Val_New=0;
}
if($Last_Year==0){
$form_Val_New=1;
}
/////////////////////////////////////////////////////////////	
if ($Text35==Null){$Text35=0;}
		if ($Text37==0){  /// on Total value
						$Exe_Val=((int)$Reg_Cost*(int)$Text35/100);
						$Reg_Cost=(int)$Reg_Cost-$Exe_Val;
		}
//echo"beach $Beach<BR>yacht $Yacht<BR>$Club_No<BR>$Form_Cost<BR>";
$Sub_Total=(int)$Club_No*((int)$Main_Cost+(int)$Reg_Main_Cost+((int)$Wife*(int)$Wife_Cost)+((int)$More_Cost*(int)$Secondary_More));
//echo"$Sub_Total<BR>";
//////////////////////////////////////////////////////////////////
$Text420=(int)$Secondary_More+(int)$Wife;			///Over Number
///////////////////////////////////////////حساب الإجمالى المبدئى
$Total=(((int)$Reg_Cost)*(int)$registval)+$Sub_Total+$New_Card_Cost+((int)$Form_Cost*(int)$form_Val_New);
//echo"$Total";
		if(($Text2==41)||($Text2==42)){
		(int)$Total=0;
		for($i=0;$i<6;$i++){
			$Total+=(int)$club_no_arr[$i];
		}
			//$Total=$Club_No;
			
		}

///////////////////////////////////////////////////Suez Canal Authority employee exception 1/7/2018
	if((int)$operation_type == 0 && $reg_type=1){
		$Text34=(int)$Total+(int)$Invitation+(int)$car;
	}

////////////////////////////////////////////////////////////////////installment second القسط الثانى
$Fine_Delay=0;

if((int)$operation_type == 6){
	if(($flag5==1)&&($flag6==0)){
		$Total=((int)$Reg_Cost)/2;
		
	////////////////////////////////////////////

	$Installment_Fines = mysqli_query($con,"SELECT floor(datediff(curdate(),pay_date)) as Diff FROM payment Where User_ID=$Text1 && Reg_Type=$Text2 &&Employee='$Employee'&& Pay_year='$Curr_Year' && Operation ='5' && (status in ('0','3'))");
	while($Installment_Fine=mysqli_fetch_array($Installment_Fines))
			{
			$Fine_Diff=$Installment_Fine["Diff"];

	}
	////////////////////////////////////////////fine delay of second installment
	if($Fine_Diff > 200){
	$Fine_Delay=$Total*0.2;
	$Text34=$Total*1.2;
	}else{
	$Text34=$Total;
	}
		}
	else{$Err="يجب دفع القسط الأول";
	}
}

////////////////////////////////////////////////	

/*	if((int)$Text600 == 0){
			$Invitation_val=1;
				}*/
///////////////////////////////////////////////////////////////////////////////////////////الإيقاف الدائم
if($valid==2){
$Total=0;
$Err="العضوية موقفة بشكل دائم";
}
////////////////////////////////////////////////////////////////////////////////////////////حساب غرامة التأخير عن كل سنة
if ((int)$operation_type==7){ //////////////////تسوية مديونية
	$Liability=$Text34;
	(int)$Text33=(int)$Text33-1;
}

if((int)$Last_Year==0){$Num_Year=0; /////////new registeration
}else{$Num_Year=(int)$Text33-(int)$Last_Year-1;}
if ((int)$operation_type <> 7){
	if((int)$Num_Year>=0){
	$newTotal=(int)$Total-((int)$Card_Cost*((int)$Wife+(int)$Secondary_More+1));
	$Text34=(int)$Total+((int)$newTotal*(int)$Num_Year)+(0.2*((int)$newTotal*(int)$Num_Year));	
	$Fine_Delay=((int)$newTotal*(int)$Num_Year)+(0.2*((int)$newTotal*(int)$Num_Year));
	/*if($invitation_val==0)
	{
	 $invitation=0;
	}*/
	//$Text34=ceil($Text34)+(int)$tax*((int)$Wife+(int)$Secondary_Less+(int)$Secondary_More+1)+(int)$car+(int)$Invitation;
	$Text34=ceil($Text34)+(int)$car+(int)$Invitation;
	}
}

$continue=1;
	

			if ((int)$operation_type==1||(int)$operation_type==2){//////////بدل فاقد أو بدل تالف
			////all secondary and wife count 21/03/2018 Ahmed Othman
			$secondary_Count6032018 = mysqli_query($con,"SELECT count(*)as counts  FROM secondary_reg Where User_ID=$Text1 &&Employee='$Employee'&& Reg_Type=$Text2 ");
			while($secondary_Counts6032018=mysqli_fetch_array($secondary_Count6032018))
			{
			$secondary6032018=$secondary_Counts6032018["counts"];
			}
			$wife_Count6032018 = mysqli_query($con,"SELECT count(*)as counts  FROM wife_reg Where User_ID=$Text1 &&Employee='$Employee'&& Reg_Type=$Text2 ");
			while($wife_Counts6032018=mysqli_fetch_array($wife_Count6032018))
			{
			$wife6032018=$wife_Counts6032018["counts"];
			}
			///////////////////////////////////////////////////////
			if($N_Same_Res >= 1 || $Text2==1){
			
			$Invitation_val=0;
			//$Secondary_count=(int)$Secondary_Less+(int)$Secondary_More;
	//////////////////////////////////////////////////////////////////////////////////////////////check boxes
			if (isset($_POST['chkbasic'])) {
				$valid_Basic=1;
				mysqli_query($con,"UPDATE Basic_Reg SET rep=1 where (User_ID= $Text1 && Reg_Type= $Text2 &&  Employee=$Employee ) ")or die(mysqli_error($con));
			}else{
				$valid_Basic=0;
				mysqli_query($con,"UPDATE Basic_Reg SET rep=0 where (User_ID='$Text1'&& Reg_Type='$Text2'&&  Employee='$Employee') ")or die(mysqli_error($con));
			}
			///////////////////////////////////////////////////////////////
		for($ii=1;$ii<=(int)$secondary6032018;$ii++){
			if (isset($_POST['chksec'.$ii])) {
				mysqli_query($con,"UPDATE Secondary_Reg SET rep=1 where (User_ID='$Text1'&& Reg_Type='$Text2'&&  Employee='$Employee' && Ser='$ii' && Card_OK=1) ")or die(mysqli_error($con));
			}else{
				mysqli_query($con,"UPDATE Secondary_Reg SET rep=0 where (User_ID='$Text1'&& Reg_Type='$Text2'&&  Employee='$Employee' && Ser='$ii ') ")or die(mysqli_error($con));
			}
			}
			/////////////-----------////////////////
		
		for($ii=1;$ii<=$wife6032018;$ii++){
			if (isset($_POST['chkwife'.$ii])) {
				mysqli_query($con,"UPDATE Wife_Reg SET rep=1 where (User_ID='$Text1'&& Reg_Type='$Text2'&&  Employee='$Employee' && Ser='$ii && Card_OK=1') ")or die(mysqli_error($con));
			}else{
				mysqli_query($con,"UPDATE Wife_Reg SET rep=0 where (User_ID='$Text1'&& Reg_Type='$Text2'&&  Employee='$Employee' && Ser='$ii ') ")or die(mysqli_error($con));
			}
			}
			/////////////-----------////////////////	
		$valid_Wife_Count = mysqli_query($con,"SELECT count(*)as counts  FROM Wife_Reg Where User_ID=$Text1 && Reg_Type=$Text2 &&Employee='$Employee'&& Card_OK=1 && rep=1 && New_Flag=0");
			while($valid_Wife_Counts=mysqli_fetch_array($valid_Wife_Count))
			{$valid_Wife=$valid_Wife_Counts["counts"];}
	
		$valid_secondary_Count = mysqli_query($con,"SELECT count(*)as counts  FROM secondary_reg Where User_ID=$Text1 && Reg_Type=$Text2 &&Employee='$Employee'  && Card_OK=1 && rep=1 && New_Flag=0");
			while($valid_secondary_Counts=mysqli_fetch_array($valid_secondary_Count))
			{$valid_Secondary=$valid_secondary_Counts["counts"];}
		$Text34	=(((int)$Card_Cost)*((int)$valid_Basic+(int)$valid_Wife+(int)$valid_Secondary));
		echo"<BR>$Text34<BR>";
		//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
		}else{
			$continue=0;
			$Err="يجب تجديد العضوية أولاً";
			}

		}else if ((int)$operation_type == 3){///////////////دعوة مرافق
			if($N_Same_Res >= 1 || $Text2==1 || $Text2==39){
			$Invitation_val=1;
			$Text34=(int)$Invitation;
			}else{
			$continue=0;
			$Err="يجب تجديد العضوية أولاً";
			}
		}else if((int)$operation_type == 4)
			{//////////////استيكر سيارة
			if($N_Same_Res >= 1 || $Text2==1 || $Text2==39){
				if ($Text900 == 0){
				$Err="يجب إدخال رقم السيارة";
				}else{
				$Text34=(int)$car;
				$Invitation_val=0;}
				}else{
			$continue=0;
			$Err="يجب تجديد العضوية أولاً";
			}
			}
			
			//////////////////////////////////////////////////////////////////////////////////////////////
		else if((int)$operation_type == 8)/////////إضافة عبء
			{
				///////////// get wife & secondary count
			$All_Wife_Count = mysqli_query($con,"SELECT count(*) as count FROM Wife_Reg Where User_ID=$Text1 && Reg_Type=$Text2 &&Employee='$Employee'");
			while($All_Wife_Counts=mysqli_fetch_array($All_Wife_Count)){$All_Wife_Res=$All_Wife_Counts["count"];}
			$All_secondary_Count = mysqli_query($con,"SELECT count(*) as count  FROM secondary_Reg Where User_ID=$Text1 && Reg_Type=$Text2 &&Employee='$Employee'");
			while($All_secondary_Counts=mysqli_fetch_array($All_secondary_Count)){$All_secondary_Res=$All_secondary_Counts["count"];}
			//////////////////////////////////////////////////////get new wifes
			$New_Wife_Count = mysqli_query($con,"SELECT Ser  FROM Wife_Reg Where User_ID=$Text1 && Reg_Type=$Text2 &&Employee='$Employee'&& Card_OK=1 && New_Flag=1");
			$New_Wife_Res=(int)mysqli_num_rows($New_Wife_Count);
			$ii=0;
				while($New_Wife_Counts=mysqli_fetch_array($New_Wife_Count))
					{$New_Wife[$ii]=$New_Wife_Counts["Ser"];$ii++;}
			////////////////////////////////////////////////////////////////get new secondary	
			$New_secondary_Count_More = mysqli_query($con,"SELECT Ser  FROM secondary_reg Where User_ID=$Text1 && Reg_Type=$Text2 &&Employee='$Employee'  && Card_OK=1 && New_Flag=1 && (((DATEDIFF(SYSDATE(),B_DATE))/365)>=4)");
			$TT1=((int)mysqli_num_rows($New_secondary_Count_More));
			$TT= $TT1 ;
			$ii=0;
			while($New_secondary_Counts_More=mysqli_fetch_array($New_secondary_Count_More)){$New_Secondary_More[$ii]=$New_secondary_Counts_More["Ser"];$ii++;}
			$ii=0;

			////////////////////////////////////////////////////////////////////////////////////////reset all flags
			//echo"$New_Wife_Res<BR> $TT <BR>$TT1 <BR>$TT2 <BR>";
			//count($New_Wife)
			if(((int)$New_Wife_Res > 0) || ((int)$TT > 0)){
				if($Group_ID <=3 ){
					for($jj=1;$jj<=(int)$All_Wife_Res;$jj++){
					//mysql_query("UPDATE Wife_Reg SET New_Flag=0 where (User_ID=$Text1 && Reg_Type=$Text2&&  Employee=$Employee && Ser=$jj && Card_OK='1') ")or die(mysql_error());
					}
					for($jj=0;$jj<(int)count($New_Wife);$jj++){
					mysqli_query($con,"UPDATE Wife_Reg SET rep=1 where (User_ID=$Text1 && Reg_Type=$Text2&&  Employee=$Employee && Ser=$New_Wife[$jj] && Card_OK='1') ")or die(mysqli_error($con));
					//echo"<BR>$New_Wife[$jj] <BR>$New_Wife<BR> ";
					
					}
					for($ii=1;$ii<=(int)$All_secondary_Res;$ii++){
					//mysql_query("UPDATE Secondary_Reg SET New_Flag=0 where (User_ID=$Text1 && Reg_Type=$Text2 &&  Employee=$Employee && Ser=$ii && Card_OK='1') ")or die(mysql_error());
					}
					for($ii=0;$ii<(int)count($New_Secondary_More);$ii++){
					mysqli_query($con,"UPDATE Secondary_Reg SET rep=1 where (User_ID=$Text1 && Reg_Type=$Text2&&  Employee=$Employee && Ser=$New_Secondary_More[$ii] && Card_OK='1') ")or die(mysqli_error($con));
					//echo"<BR> $New_Secondary_More[$ii] <BR>$New_Secondary_More<BR>";
					}
					
					mysqli_query($con,"UPDATE Basic_Reg SET rep=1 where (User_ID='$Text1'&& Reg_Type='$Text2'&&  Employee='$Employee') ")or die(mysqli_error($con));
				}
				$Text34	=(int)$Form_Cost+(int)$Club_No*(((int)$Wife_Cost*(int)$New_Wife_Res)+((int)$More_Cost*(int)$TT1))+(((int)$Card_Cost+(int)$tax)*(1+(int)$New_Wife_Res+(int)$TT));
			}else{$Err="جميع الأعباء و الزوجات مسجلين على النظام مسبقاً";}
		}
	
/////////////////////////////////////////////////////////////////////////////////رقم إذن السداد
//$Receipt_Max = mysql_query("SELECT Max(Receipt_No)as Max_Receipt FROM payment Where Pay_Year=$Text33 && Status=0 ");
//Year($Pay_Date)
//// Ahmed Othman 29/1/2018
$Receipt_Max = mysqli_query($con,"SELECT Max(Receipt_No)as Max_Receipt,Min(Receipt_No)as Min_Receipt FROM payment Where Pay_Year=$Curr_Year ");
	while($Receipt_Maxs=mysqli_fetch_array($Receipt_Max))
			{
			$Receipt_No=$Receipt_Maxs["Max_Receipt"];
			$Temp_Receipt_No=$Receipt_Maxs["Min_Receipt"];
	}
if (is_Null($Receipt_No)){
$Receipt_No=0;
}if (is_Null($Temp_Receipt_No)){
$Temp_Receipt_No=0;
}
if($Group_ID==4){$Temp_Receipt_No--; $Receipt_No=$Temp_Receipt_No; $Status=2;}else{$Receipt_No++;$Status=0;}

////////////////////////////////////////////////////////////////الإعفاء

		if ($Text37==1){  /// on Total value
				$Exe_Val=((int)$Text34*(int)$Text35/100);
				$Text34=(int)$Text34-$Exe_Val;
				}

/////////////////////////////////////////////////////////////////////
	if ((int)$operation_type==7){ //////////////////تسوية مديونية
		$Text34=$Liability;
		//$Text33=$Text33-1;
	}

///////////////////////////////////////////////////////////////////////عملية الإضافة

if ((int)$operation_type==0){
	if(($flag5==1)&&($n_regist==1)){
	$continue=0;$Text34=0;
	$Err="يجب دفع القسط الثاني أولاً";
	}}

if($Text34==0){
//echo"<BR>$continue<BR>";
if($Text2<>17){
	$continue=0;}
//echo"<BR>$continue<BR>";
	}
//echo"$continue<BR>$Text35<BR>$Text34";
// "ط§ظ„ط³ظ…ط§ط­ ط¨ط§طµط¯ط§ط± ط¨ط¯ظ„ طھط§ظ„ظپ ط¨ط¯ظˆظ† ط±ط³ظˆظ… ظ„ظ„ط§ط®ط·ط§ط، ظپظ‰ ط§ظ„ط§ط³ظ… ط§ظˆ ط§ظ„ط·ط¨ط§ط¹ط©"
if(($Text2==13||$Text2==14||$Text2==41||$Text2==42||$Text2==15||$Text2==33||$Text2==44  ||$operation_type==2)&&($Text34==0)){
	$continue=1;
}
if(($N_Same_Res>=1)&&($operation_type ==0||$operation_type ==5)){
	$Err="عذراً هذه العملية مكررة";
	$continue=0;

	}
if(($continue<>0)&&($Basic_res>0)){ 

$query = "INSERT INTO Payment ( User_ID,Reg_Type,Pay_Year,Total,Pay_Date,Notes,Wife_NO,Son_More_NO,Over_Num,Receipt_No,Operation,Car,Invitation,Exe_Val,Beach,Yacht,Golf,Tennis,Employee,car_no,ins_date,ins_user,status,upd_user,Fine_Delay,Rowing,knighthood)
					   values ( '$Text1','$Text2','$Text33','$Text34',SYSDATE(),'$Text39','$Wife','$Secondary_More','$Text420','$Receipt_No','$operation_type','$Text900','$Invitation_val','$Exe_Val','$chk2','$chk3','$chk4','$chk5','$Employee','$car_no',sysdate(),$session_user_id,$Status,$session_user_id,$Fine_Delay,'$chk6','$chk7')";
					  mysqli_query($con,$query) or  die (mysqli_error($con));

///////////////////////////////////////////تعديل قيمة أخر سنة سداد

$query1 = "update Basic_Reg Set Last_Year='$Text33' where (User_ID='$Text1'&& Reg_Type='$Text2'&&Employee='$Employee') ";
mysqli_query($con,$query1) or  die (mysqli_error($con));
    mysqli_close( $con);
    redirect("Payment_View.php?id=$Text1&type=$Text2&year=$Text33&receipt_no=$Receipt_No&employee=$Employee");

	}else{
		echo" <img src='../img/error.png' border='0' width='16' height='16'>&nbsp&nbsp&nbsp&nbsp<FONT size='6' Color='red'  >$Err</Font>";
	}
?>
<BR>
</FORM>
</BODY>
</HTML>
