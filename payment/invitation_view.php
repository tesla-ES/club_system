<?php
 $User_ID = $_REQUEST["User_ID"];
 $Reg_Name = $_REQUEST["Reg_Name"];
$Name = $_REQUEST["Name"];
$reg_type_code =$_REQUEST["reg_type_code"];
$Pay_Year = $_REQUEST["Pay_Year"];
$Receipt_No = $_REQUEST["Receipt_No"];
$employee = $_REQUEST["employee"];
$session_user = $_REQUEST["session_user" ];
$invitation_count_ =$_REQUEST["Inv_Chk_N"];
?>
<html>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<meta http-equiv="Content-Language" content="it">
<head>
    <SCRIPT src=js/ajax.js type=text/javascript></SCRIPT>

<style type="text/css" media="print">@page port {size: portrait;}@page land {size: landscape;}.portrait {page: port;}.landscape {page: land;};

</style>
</head>
<body class="landscape"  background="../img/bkgr3.jpg">
<BR><BR><table width="55%"  border="0" class="landscape"  align="center" CELLPADDING="2" cellspacing="1">
<tbody align="center"><TR  style="text-align:right;font-size:10pt;" >
<TD  style="text-align:right;font-size:9pt;font-weight:bolder;" colspan=2>
<div style=" position:relative;top: -11px;	left: 8px;border:1px solid #ffffff;width=100px">
   <?php echo $Name;?>
</div>
</TD></TR><TR><TD style="text-align:right;font-size:9pt;font-weight:bolder;" >
<div style=" position:relative;top: -30px;	left: 8px;border:1px solid #ffffff;width=100px">
<?php echo $Reg_Name?>
</div>
</TD><TD style="text-align:center;font-size:9pt;font-weight:bolder;" class="raplace"  >
<div style=" position:relative;top: -15px;	left: 8px;border:1px solid #ffffff;width=100px">
    <?php echo $User_ID ?>
</div>
<div style="position:relative;bottom: -84px;left: -128px;color: white;border: 1px solid #001135;width=20px;height: 24px;width: 24px;border-radius: 12%;background-color: #002040;text-align: center;font-size: 14px;display: table-cell;vertical-align: middle">
    <?php echo $invitation_count_ ?>
</div>
</TD></TR>
</Tbody></Table>

<table width="100%"  border="0" class="landscape" cols="5" align="right" CELLPADDING="0" cellspacing="0">
<tbody align="center">
<TR><TD > </TD><TD > </TD><TD > </TD><TD > </TD><TD > </TD></TR>
<TR><TD > </TD><TD > </TD><TD > </TD><TD> </TD><TD> </TD></TR>
<TR><TD > </TD><TD > </TD><TD > </TD><TD > </TD><TD > </TD></TR>
<TR><TD > </TD><TD > </TD><TD > </TD><TD > </TD><TD > </TD></TR>
</Tbody></Table>
</body>

    <script>
    window.onafterprint= function(){ivite_printed(<?php echo $User_ID?>,<?php echo $reg_type_code?>,<?php echo $Pay_Year?>,<?php echo $Receipt_No?>,<?php echo $employee?>,<?php echo $session_user?>)};
    replaceDigits();
    </script>
    </html>