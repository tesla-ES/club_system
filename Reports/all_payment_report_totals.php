<?php include_once "../function.php" ;?>

<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
    <script src="../js/functions.js" type="text/javascript"> </script>
</head>

<?php
$operation_type="";
if(isset($_REQUEST["operation_type"])){
    $operation_type=$_REQUEST["operation_type"];
}


$Membership_type =isset($_REQUEST["Membership_type"])?$_REQUEST["Membership_type"]:"";
$payment_year =isset($_REQUEST["payment_year"])?$_REQUEST["payment_year"]:2019;
$start=isset($_REQUEST["start"])?$_REQUEST["start"]:0;
IF($operation_type){

$sql="select reg_type ,Name ,sum(basic_count) as basic_count ,sum(payment_count) as payment_count , sum(total) as total from (select cunt basic_count,0 payment_count   , 0 total,basic.reg_type,reg_type.Name from ( SELECT count(*) cunt ,Reg_Type FROM basic_reg group by reg_type )basic ,reg_type where basic.reg_type=reg_type.Code   union all  select 0 basic_count , cunt payment_count ,total ,basic.reg_type,reg_type.Name from ( SELECT count(*) cunt ,nn.Reg_Type ,sum(total) as total FROM( select distinct User_ID ,employee,Reg_Type ,sum(total) as total from payment where status in(0,3) and payment.total >=0 and Pay_Year =$payment_year ";

if ($operation_type == 'all') {
    $operation_type_name = 'الكل ';
} else {
    $operation_name_res = mysqli_query($con,"SELECT op_id,op_name FROM operation_type where op_id = $operation_type ");
    while ($res2 = mysqli_fetch_array($operation_name_res)) {
        $operation_type_name = $res2["op_name"];
    }
    $sql .= " and operation=$operation_type  ";
}
$sql .= " group by User_ID ,employee,Reg_Type) nn group by nn.Reg_Type )basic ,reg_type where basic.reg_type=reg_type.Code ) all_data";

if ($Membership_type == 'all') {
    $Membership_type_name = 'كل الانواع ';
    $sql .= " group by reg_type,Name ";;
} else {
    $result = mysqli_query($con,"SELECT Code,Name FROM reg_type where Code = $Membership_type ");
    while ($ress = mysqli_fetch_array($result)) {
        $Membership_type_name = $ress["Name"];
    }
    $sql .= " where reg_type= $Membership_type group by reg_type,Name ";
}

?>
<body>
<?php report_header();?>
<div class='top_head'>
    إحصائيه مقارنه بين عدد الاعضاء بالسجل وعدد المسددين
    <?= $payment_year ?><BR>
    نوع العضويه : <?= $Membership_type_name ?>

    <div class="nots">
        نوع المدفوعات :<?= $operation_type_name ?>
    </div>

</div>
<hr>
<?php

$result = mysqli_query($con,$sql);
$query = $result;

if (($result) || (mysqli_errno($con) == 0)) {
    $i = 0;
    echo "<table  class='gridtable'  cols='9'  ><tr>";
    if (mysqli_num_rows($result) > 0) {
        //loop throw the field names to print the correct headers

        while ($i <= mysqli_num_fields($result)) {
            $headers[0] = "م";
            $headers[1] = "نوع العضويه";
            $headers[2] = "مسمى نوع العضويه ";
            $headers[3] = "أعداد السجل";
            $headers[4] = "اعداد المسددين للاشتراك";
            $headers[5] = "إجمالى الاشتراكات";
            echo "<th>" . $headers[$i] . "</th>";
            $i++;
        }
        echo "</tr></thead><tbody>";
        //display the data
        $num_rows = $start;
        $sum_val=array(0,0,0,0,0,0,0);
        while ($rows = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                echo "<tr>";
            $num_rows++;
            $j = 0;

            echo "<td> $num_rows </td>";
            foreach ($rows as $data) {
                if ($j < 5) {
                    $sum_val[$j] += $rows[$j];
                    $detail_link = "";
                    $param = "";
                    $link_srt = "";
                    echo "<td>";

                    switch ($j) {
                        case 2 :
                            $detail_link = "segel_report.php?start=0";
                            $param = "{Membership_type: $rows[0] ,order_arrange :'User_ID' ,per_page : 'all'}";
                            break;
                        case 3 :
                            $detail_link = "payment_report_amount.php?start=0";
                            $param = "{Membership_type: $rows[0],employee_type :99 ,payment_year:$Curr_Year,operation_type :'all' ,order_arrange :'User_ID' ,per_page : 'all'}";
                            break;

                        default :
                            $detail_link = "";
                            break;
                    }

                    if (!empty($detail_link)) {

                        $link_srt = '<a href=# onclick="send_post(\'' . $detail_link . '\',' . $param . ')">' . $rows[$j] . '</a> <div class=edit_hover_class> <a href=# onclick="send_post(\'' . $detail_link . '\',' . $param . ')"><img class=v_icon  src="../img/view_client_icon.png"/></a></div>';
                    } else {
                        echo $rows[$j];
                    }

                    echo "$link_srt</td> ";

                }
                $j++;
            }
        }


        unset($data);
    } else {
        echo "<tr><td colspan='" . ($i + 1) . "'>لا يوجد نتائج !</td></tr>";
    }
    echo "</tbody></table>";
    //show Next button
    include "sign.php";
} else {
    echo "Error in running query :" . mysqli_error($con);
}
}else{
    report_uncompleate_parameter();
}
?>

 <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=100%>
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$myusername  ?></TH></TR>
 </Table>
 
 
 
 