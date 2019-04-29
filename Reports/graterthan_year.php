<?php include_once "../function.php" ; ?>

<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="css/table_css.css">
</head>
<?php
$g_year=asignValue($_REQUEST["g_year"],$Curr_Year);
$gender=asignValue($_REQUEST["gender"],1);
$c_year=asignValue($_REQUEST["c_year"],$Curr_Year);

$gender_name="";
if($gender==1){
    $gender_name="الذكور";
}else{
    $gender_name=" الاناث ";
}

?>
<body>
<H4 align="right"  >هيئة قناة السويس &nbsp&nbsp&nbsp&nbsp<BR>النادى العام &nbsp&nbsp&nbsp&nbsp<BR>شئون العضويه &nbsp&nbsp&nbsp&nbsp<BR>
    <Center><H4>تقرير عدد الاعباء من <?=$gender_name ?>  الذين تزيد اعمارهم عن  <?php echo $g_year?>  فى 31 - 12 - <?php echo $c_year?>

           <!-- <table BORDER=1 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="2" width=90%>
                <tbody align="right">
                <TR> <TD><?echo $h_year ?>:  سنه </TD><TD align="right"><?echo $h_month ?>:  شهر </TD></TR>
                <TBody></Table>-->
            <?php


            $start=asignValue($_REQUEST["start"],0);
            //$record_count=mysql_num_rows($query);
            //$max_pages=$record_count / $per_page;

            $sql="SELECT secondary_reg.User_ID,secondary_reg.Name,secondary_reg.Ser,secondary_reg.b_date
                    FROM  secondary_reg WHERE
                    secondary_reg.b_date <= CONCAT($c_year-$g_year,'-12-31') AND
                    secondary_reg.Card_OK =  '1' AND
                    secondary_reg.Reg_Type =  '1' and
                    secondary_reg.gender=$gender
                    ORDER BY
                    secondary_reg.b_date ASC,
                    secondary_reg.gender ASC ";

            $result = mysqli_query($con,$sql);
            $record_count=mysqli_num_rows($result);

            if($record_count==0)
            {$pop=1;}
            else{ $pop=$record_count+1;}
            $query = $result;

            if (($result)||(mysqli_errno($con) == 0))
            {
                $i = 0;
                echo "<table  class='gridtable'  cols='9'> <tbody align='center'><tr >";
                if (mysqli_num_rows($result)>0)
                {
                    //loop thru the field names to print the correct headers

                    while ($i <= mysqli_num_fields($result))
                    {

                        $headers[0]="مسلسل";
                        $headers[1]="رقم العضويه";
                        $headers[2]="الاسم";
                        $headers[3]="الترتيب";
                        $headers[4]="تاريخ الميلاد";

                        echo "<th  ALIGN=CENTER >". $headers[$i] . "</th>";
                        $i++;
                    }


                    echo "</tr>";

                    //display the data
                    $num_rows=0;
                    $sum_val=array(0,0,0,0,0);
                    while ($rows = mysqli_fetch_array($result,MYSQLI_BOTH))
                    {
                        if($num_rows & 1){
                            echo "<tr>";
                        }else{
                            echo "<tr>";
                        }
                        $num_rows++;
                        $j=0;

                        echo "<td ALIGN=center> $num_rows </td>";
                        foreach ($rows as $data)
                        {
                            if($j<4){
                                $sum_val[$j]+=$rows[$j];
                                echo "<td ALIGN=center>  $rows[$j]</td>";
                            }
                            $j++;
                        }
                    }
                    // echo "<tr ALIGN=center BGCOLOR='#c4c4c4' FONT color='#000000'>";
                    //echo "<td colspan=3>الاجمالى </td> <td> $sum_val[2]</td> <td> $sum_val[3]</td> <td> $sum_val[4]</td> <td> $sum_val[5]</td> <td> $sum_val[6]</td> <td> $sum_val[7]</td> <td> $sum_val[8]</td><td></td> <td> </td>";
                   // echo "</tr>";

                }else{
                    echo "<tr><td ALIGN=CENTER colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
                }
                echo "</table>";


                if(!($start<=0)){
                    //////////////////getting previous page
                    echo " <a href='graterthan_year.php?start=$prev'&g_year=$g_year&c_year=$c_year&gender=$gender'><img src='../img/backpage.gif' alt='Previous Page'></a>";
/////////////getting the first page
                    echo " <a href='graterthan_year.php?start=0&g_year=$g_year&c_year=$c_year&gender=$gender'><img src='../img/first.gif' alt='First Page'></a>";
                }

            }else{
                echo "Error in running query :". mysqli_error($con);
            }

            ?>
            <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=80%>
                <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$myusername  ?></TH></TR>
            </Table>
 
 
 
 