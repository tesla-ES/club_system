<?php
$Total42 = isset($_REQUEST["Total42"])?$_REQUEST["Total42"]:"" ;
$User_ID	 = isset($_REQUEST["User_ID"])?$_REQUEST["User_ID"]:"";
$Reg_Type = isset($_REQUEST["Reg_Type"])?$_REQUEST["Reg_Type"]:"";
$Reg_Name = isset($_REQUEST["Reg_Name"])?$_REQUEST["Reg_Name"]:"";
$Pay_Year = isset($_REQUEST["Pay_Year"])?$_REQUEST["Pay_Year"]:"";
$Total = isset($_REQUEST["Total"])?$_REQUEST["Total"]:"";
$Pay_Date1 = isset($_REQUEST["Pay_Date1"])?$_REQUEST["Pay_Date1"]:"";
$Notes = isset($_REQUEST["Notes"])?$_REQUEST["Notes"]:"";
$Wife_No = isset($_REQUEST["Wife_No"])?$_REQUEST["Wife_No"]:"";
$Basic_s = isset($_REQUEST["Basic_s"])?$_REQUEST["Basic_s"]:"";
$Secondary_s = isset($_REQUEST["Secondary_s"])?$_REQUEST["Secondary_s"]:"";
$Wife_s = isset($_REQUEST["Wife_s"])?$_REQUEST["Wife_s"]:"";
$Son_More_NO = isset($_REQUEST["Son_More_NO"])?$_REQUEST["Son_More_NO"]:"";
$More_Count =  isset($_REQUEST["More_Count"])?$_REQUEST["More_Count"]:"";
$car_No=isset($_REQUEST["car_No"])?$_REQUEST["car_No"]:"";
$car_count=isset($_REQUEST["car_count"])?$_REQUEST["car_count"]:"";  //5/7/2018 Ahmed Othman
$invitation_No=isset($_REQUEST["invitation_No"])?$_REQUEST["invitation_No"]:"";
$Operation=isset($_REQUEST["Operation"])?$_REQUEST["Operation"]:"";
$Receipt_No= isset($_REQUEST["Receipt_No"])?$_REQUEST["Receipt_No"]:"";
$Clubs_No= isset($_REQUEST["Clubs_No"])?$_REQUEST["Clubs_No"]:"";
$Exe_Val=isset($_REQUEST["Exe_Val"])?$_REQUEST["Exe_Val"]:"";
$Status=isset($_REQUEST["Status"])?$_REQUEST["Status"]:"";
$Fine_Delay=isset($_REQUEST["Fine_Delay"])?$_REQUEST["Fine_Delay"]:"";
/////////////////////Regiseration
$Ser = isset($_REQUEST["Ser"])?$_REQUEST["Ser"]:"";
$Reg_Cost = isset($_REQUEST["Reg_Cost"])?$_REQUEST["Reg_Cost"]:"";
$Main_Cost = isset($_REQUEST["Main_Cost"])?$_REQUEST["Main_Cost"]:"";
$Reg_Main_Cost = isset($_REQUEST["Reg_Main_Cost"])?$_REQUEST["Reg_Main_Cost"]:"";
$Wife_Cost = isset($_REQUEST["Wife_Cost"])?$_REQUEST["Wife_Cost"]:"";
$More_Cost = isset($_REQUEST["More_Cost"])?$_REQUEST["More_Cost"]:"";
$Form_Cost = isset($_REQUEST["Form_Cost"])?$_REQUEST["Form_Cost"]:"";
$Card_Cost = isset($_REQUEST["Card_Cost"])?$_REQUEST["Card_Cost"]:"";
$Damaged = isset($_REQUEST["Damaged"])?$_REQUEST["Damaged"]:"";
$Lost = isset($_REQUEST["Lost"])?$_REQUEST["Lost"]:"";
$Tax = isset($_REQUEST["Tax"])?$_REQUEST["Tax"]:"";
$car=isset($_REQUEST["car"])?$_REQUEST["car"]:"";
$Invitation=isset($_REQUEST["Invitation"])?$_REQUEST["Invitation"]:"";
$car2=isset($_REQUEST["car2"])?$_REQUEST["car2"]:"";
$Invitation2=isset($_REQUEST["Invitation2"])?$_REQUEST["Invitation2"]:"";
////////////////////////////////Basic Reg
$Name = isset($_REQUEST["Name"])?$_REQUEST["Name"]:"";
$valid=isset($_REQUEST["valid"])?$_REQUEST["valid"]:"";
$myusername=	isset($_REQUEST["myusername"])?$_REQUEST["myusername"]:"";
$registered = isset($_REQUEST["registered"])?$_REQUEST["registered"]:"";
$Group_ID = isset($_REQUEST["Group_ID"])?$_REQUEST["Group_ID"]:"";
////////////reg_type
$reg_type_code= isset($_REQUEST["Reg_Type"])?$_REQUEST["Reg_Type"]:"";
$Car_Chk_N= isset($_REQUEST["Car_Chk_N"])?$_REQUEST["Car_Chk_N"]:"";
$Inv_Chk_N= isset($_REQUEST["Inv_Chk_N"])?$_REQUEST["Inv_Chk_N"]:"";

$Main_Total=0;
$Reg_Main_No=1;
$Operation_Text="";

if ($Operation==0){
    $Operation_Text='����� �����';
    if($Inv_Chk_N>1){$Invitation=$Invitation2;}
    if($Inv_Chk_N<=1){$Invitation=$Invitation;}
    if(($Car_Chk_N==1)&& ($Total > $car)){$car=$car2;}
    if($car_count==2){$car=$car2;}


}else if($Operation==1){
    $Card_Cost=$Lost;
    $Operation_Text=	'��� ����';
    $Reg_Main_No=0;
    $Clubs_No = 0;
    $registered=2;
    $Invitation_count=0;
    $car_No=0;
    $Tax=0;
}else if($Operation==2){
    $Card_Cost=$Damaged;
    $Operation_Text=	'��� ����';
    $Reg_Main_No=0;
    $Clubs_No = 0;
    $registered=2;
    $Invitation_count=0;
    $car_No=0;
    $Tax=0;
}else if($Operation==3){
    if($Inv_Chk_N>1){$Invitation=$Invitation2;}
    $Operation_Text=	'���� �����';
    $Reg_Main_No=0;
    $Wife_No = 0;
    $Son_More_NO = 0;
    $Clubs_No = 0;
    $registered=2;
    $No_Cards=0;
    $valid=0;
    $car_No=0;
}else if($Operation==4){
    if(($Car_Chk_N==1)&& ($Total > $car)){$car=$car2;}
    if($car_count==2){$car=$car2;} //5/7/2018 Ahmed Othman
    $Operation_Text= "$car_count.������ �����"; //A.sadiek
    //Operation_Text='������ �����';
    $Reg_Main_No=0;
    $Wife_No = 0;
    $Son_More_NO = 0;
    $Clubs_No = 0;
    $registered=2;
    $No_Cards=0;
    $valid=0;
    $Invitation_count=0;
}else if($Operation==5){
    $registered=0;
    $Reg_Cost=$Reg_Cost/2;
    $Operation_Text=	'��� ���';
}else if($Operation==6){
    $registered=1;
    $Reg_Main_No=0;
    $Wife_No = 0;
    $Son_More_NO = 0;
    $Clubs_No = 0;
    $Reg_Cost=$Reg_Cost/2;
    $Operation_Text=	'��� ����';
}
else if($Operation==7){
    $Operation_Text=	'����� �������';
    $Reg_Main_No=0;
    $Wife_No = 0;
    $Son_More_NO = 0;
    $Clubs_No=0;
}
else if($Operation==8){
    $Operation_Text=	'����� ���';
    $Wife_No = $Wife_s;
    //Card_Cost = 15;
    $Reg_Main_No = 0;
    $registered = 2;
    $Invitation_count = 0;
    $car_No = 0;
    $Son_More_NO = $More_Count;
    $Main_Cost=0;
}
/////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////������ ���� � �����
if($Reg_Type==41||$Reg_Type==42){
    //Clubs_No=Clubs_No-1;
    null;
}
///////////////////////////////////////////////////////////

$Wife_Total=$Wife_Cost*$Wife_No*$Clubs_No;

$More_Total=$More_Cost*$Son_More_NO*$Clubs_No;
$Main_Total=$Main_Cost*$Clubs_No;
if($registered > 1){
    $registered=0;
    $Reg_Cost_Total=$Reg_Cost*$registered;
}else{
    $registered=1;
    $Reg_Cost_Total=$Reg_Cost*$registered;
}


$Form_Cost_Total=$Form_Cost*$registered;
if($Operation==6){
    $Form_Cost_Total=0;
}   if($Operation==8){
    $registered=1;
    $Form_Cost_Total=$Form_Cost;
}

if($valid==1){
    $No_Cards=$Wife_No+$Son_More_NO+1;
}else{
    $No_Cards=$Wife_No+$Son_More_NO;
}
//if(Operation>=0&&Operation<=2){ //////�������� ���� ����� ��� ��������
if($Operation==0||$Operation==1||$Operation==2||$Operation==5||$Operation==8){
    $No_Cards=$Basic_s+$Secondary_s+$Wife_s;
    //}
    $Card_Cost_Total=$Card_Cost*$No_Cards;
}else{
    $Card_Cost_Total=0;
    $No_Cards=0;
}
if(($Operation==3)||(($Operation==0)&&($invitation_No>0))){
    $Invitation_count=1;
}
else{
    $Invitation_count=0;
}
if($car_No == 0){
    $car_No= 0;
}else{
    $car_No=1;
}

$Car_cost_Total=$car_No*$car;
$Tax_Total= $Tax * $No_Cards;
$currentTime = date("Y/m/d");
$month =date("m"); + 1;
$day = date("d");
$year = date("Y");
$x_No=0;
?>

<html><head>
</head><body>
<?php
if($Status==2){?>
<H4 align="right"  >���� ���� ������ &nbsp&nbsp&nbsp&nbsp</H4><BR>������ ����� &nbsp&nbsp&nbsp&nbsp<BR><h4></h4>����� ����<BR>
            <?php
}else{ ?>
   <H4 align="right"  >���� ���� ������ &nbsp&nbsp&nbsp&nbsp<BR>������ ����� &nbsp&nbsp&nbsp&nbsp<BR><Center><H4></H4>��� ���� �����<BR>

 <?php
 $x_No=1;
}

for($i=0;$i<=$x_No;$i++){
    echo $Receipt_No ;
  ?>
    <table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="2" width=80%>
    <tbody align="right"><TR><TD>
    <?php echo  $User_ID ?>
    </TD><TD> : ��� �����</TD><TD>
    <?php echo  $Name ?>
    </TD><TD> : �����</TD></TR><TR><TD>
    <?php echo  $Reg_Name?>
    </TD><TD> : ��� ������� </TD><TD>
    <?php echo  $Pay_Year?>
    </TD><TD> : ��� ��������</TD></TR><TR><TD>
    <?php echo  $Clubs_No?>
    </TD><TD> : ��� �������</TD><TD>
    <?php echo  $Operation_Text?>
    </TD><TD> : ��� �������</TD></TR> <TBody></Table>
    <table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="4" width=80%>
    <tbody align="center"><TR><TD width=30%>������</TD><TD width=15%>������</TD><TD width=15%>���</TD><TD width=40%>����</TD></TR></Table>
    <table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="4" width=80%>
    <tbody align="center"><TR BGCOLOR="#c4c4c4"><TD width=30%>
    <?php
    if($Reg_Type==41||$Reg_Type==42){
        echo  $Total*$Reg_Main_No ;
        ?>
        </TD><TD width=15%>
        <?php echo  $Total ;
    }else{
        echo  $Reg_Main_Cost*$Reg_Main_No*$Clubs_No ;
        ?>
        </TD><TD width=15%>
        <?php echo  $Reg_Main_Cost ;
    }?>
    <TD width=15%>
    <?php echo  $Reg_Main_No ;?>
    </TD><TD width=40%>  ������ �����</TD></TR>
    <TR><TD>
    <?php echo  $Wife_Total ;?>
    </TD><TD>
    <?php echo  $Wife_Cost ;?>
     </TD><TD>
    <?php echo  $Wife_No ;?>
    </TD><TD>  ������ ������</TD></TR>
    <TR BGCOLOR="#c4c4c4"><TD>
    <?php echo  $More_Total ;?>
     </TD><TD>
    <?php echo  $More_Cost ;?>
     </TD><TD>
    <?php echo  $Son_More_NO ;?>
    </TD><TD>����� ��� 4 ����� </TD></TR>
    <TR><TD>
    <?php echo  $Main_Total ;?>
     </TD><TD>
    <?php echo  $Main_Cost ;?>
     </TD><TD>
    <?php echo  $Clubs_No ;?>
    </TD><TD>  ��� ����� �����</TD></TR>
    <TR BGCOLOR="#c4c4c4"><TD>
    <?php echo  $Reg_Cost_Total ;?>
     </TD><TD>
    <?php echo  $Reg_Cost ;?>
    </TD><TD>
    <?php echo  $registered ;?>
    </TD><TD>  ��� ��� </TD></TR>
    <TR><TD>
    <?php echo  $Form_Cost_Total ;?>
     </TD><TD>
    <?php echo  $Form_Cost ;?>
    </TD><TD>
    <?php
    if($Operation=6){echo  0 ;}else{ echo  $registered ;} ?>
    </TD><TD>  ��� ������� </TD></TR>
    <TR BGCOLOR="#c4c4c4"><TD>
    <?php echo  $Card_Cost_Total ;?>
     </TD><TD>
    <?php echo  $Card_Cost ;?>
     </TD><TD>
    <?php echo  $No_Cards ;?>
    </TD><TD>  ��� ��������</TD></TR>
    <TR><TD>
    <?php echo  $Invitation*$Invitation_count ; ?>
     </TD><TD>
    <?php echo  $Invitation ;?>
     </TD><TD>
    <?php echo  $Invitation_count ;?>
    </TD><TD>��� ���� ����� </TD></TR>
    <TR BGCOLOR="#c4c4c4"><TD>
    <?php echo  $Car_cost_Total ;?>
     </TD><TD>
    <?php echo  $car ;?>
     </TD><TD>
    <?php echo  $car_No ;?>
    </TD><TD>��� ������ ����� </TD></TR>
    <TR ><TD>
    <?php echo  $Tax_Total ;?>
     </TD><TD>
    <?php echo  $Tax ;?>
     </TD><TD>
    <?php echo  $No_Cards ;?>
    </TD><TD>  �������</TD></TR>
    <TR BGCOLOR="#c4c4c4"><TD>
    <?php echo  $Exe_Val ;?>
     </TD><TD>
    <?php echo  $Exe_Val ;?>
     </TD><TD>
    1
    </TD><TD>���� �����   </TD></TR>
    <TR ><TD>
    <?php echo  $Fine_Delay ;?>
     </TD><TD>
    <?php echo  $Fine_Delay ;?>
     </TD><TD>
    1
    </TD><TD>����� �������</TD></TR>
   <?php if($Operation==7){?>
        <TR BGCOLOR="#c4c4c4"><TD>
        <?php echo  $Total ;?>
         </TD><TD>
        <?php echo  $Total ;?>
         </TD><TD>
        1
        </TD><TD>  ��������</TD></TR>
   <?php }?>
    </Table>
    <table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="5" width=80%>
    <TR><TD> ���� ����  </TD><TD align="left">
       <?php echo  $Total ;?>
    </TD><TD colspan="2" align="center">�������� ������� ���� ������� </TD></TR>
    </tbody></Table>

    <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=80%>
    <TR><TH width=35%>
            <?php
		if($Status!=2){?> <A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A>
		<?php } ?>
		</TH ><TH width=30%><font size=2pt align=right> �� ����� ���� ����� ��������</TH>
		<TH width=30%><font size=2pt align=right> <?php echo $myusername ."/".$Pay_Date1 .'</TH></TR></Table>';

		if($i==0&&$x_No==1){?> <BR>���� �����<H4 align="right"  >���� ���� ������ &nbsp&nbsp&nbsp&nbsp<BR>������ ����� &nbsp&nbsp&nbsp&nbsp<Center><H4>��� ���� �����<BR>
        <?php
		}
	}
if(($Group_ID!=3)&&($Status==2)){?>
    <SCRIPT src=js/1.js type=text/javascript></SCRIPT>
 <?php
}else if($Status!=2)
{?>
    <SCRIPT src=js/1.js type=text/javascript ></SCRIPT>
                            <?php
}
?>
   </body></html>
