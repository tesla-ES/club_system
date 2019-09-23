<?php include_once "../function.php" ;?>

<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
    <script src="../js/functions.js" type="text/javascript"> </script>
</head>

<?php
$to_year=2030 ;
$from_year=2018;
$operation_type="";
if(isset($_REQUEST["operation_type"])){
    $operation_type=$_REQUEST["operation_type"];
}


$Membership_type =isset($_REQUEST["Membership_type"])?$_REQUEST["Membership_type"]:"";
$payment_year =isset($_REQUEST["payment_year"])?$_REQUEST["payment_year"]:2019;
$start=isset($_REQUEST["start"])?$_REQUEST["start"]:0;


?>
<body>
<?php report_header();?>
<div class='top_head'>
  اجمالى ايرادات شئون العضويه بالسنوات
  <BR>

</div>
<hr>
<?php
$sql="select payment.Pay_Year ,month(payment.Pay_Date) as month_num, count(payment.Receipt_No ) as cunt , sum(total) as total from payment 
 where Pay_Year between $from_year and $to_year  and Pay_Date is not null and month(payment.Pay_Date) between 1 and 12
 group by month_num,Pay_Year
 order by Pay_Year,month_num
 ";

$result = mysqli_query($con,$sql);
$query = $result;

if (($result) || (mysqli_errno($con) == 0)) {
    $i = 0;
    echo "<table  class='gridtable'  cols='4'  ><tr>";
    if (mysqli_num_rows($result) > 0) {
        //loop throw the field names to print the correct headers

        while ($i < mysqli_num_fields($result)) {
            $headers[0] = "السنه";
            $headers[1] = "الشهر";
            $headers[2] = "عدد الايصالات";
            $headers[3] = "إجمالى الايراد";
            echo "<th>" . $headers[$i] . "</th>";
            $i++;
        }
        echo "</tr></thead><tbody>";
        //display the data
        $num_rows = $start;
        $old_yaer=$from_year ;
        $sum_val=array(0,0,0,0);
        while ($rows = mysqli_fetch_array($result,MYSQLI_BOTH))
        {
                echo "<tr>";
            $num_rows++;
            $j=0;

            if($old_yaer!=$rows[0])
            {
                if($old_yaer !=0 ){

                }
                $old_yaer=$rows[0];
                echo "<tr>";
                echo "<th colspan='2'> إجماليات </th>  <th> $sum_val[2]</th>  <th> $sum_val[3]</th>";
                echo "</tr>";
                $sum_val[2]=0 ;
                $sum_val[3]=0 ;
            }
            foreach ($rows as $data)
            {
                if($j<4){
                    $sum_val[$j]+=$rows[$j];
                    echo "<td>  $rows[$j]</td>";
                }
                $j++;
            }



        }

        echo "<tr>";
        echo "<th colspan='2'> إجماليات </th>  <th> $sum_val[2]</th>  <th> $sum_val[3]</th>";
        echo "</tr>";


        }else {
        echo "<tr><td colspan='" . ($i + 1) . "'>لا يوجد نتائج !</td></tr>";
    }
        unset($data);

    echo "</tbody></table>";
    //show Next button
    include "sign.php";
 }else {
    echo "Error in running query :" . mysqli_error($con);
}

?>

 <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=100%>
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$myusername  ?></TH></TR>
 </Table>
 
 
 
 