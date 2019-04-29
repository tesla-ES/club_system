<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<!DOCTYPE html>
<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="../css/table_css.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css"/>
    <link rel="stylesheet" type="text/css" href="css/style2.css"/>
    <link rel="stylesheet" type="text/css" href="css/animate-custom.css"/>
    <script>
        function doPreview(form_id,action,value)
        {
            form=document.getElementById(form_id);
          //  form.target='_blank';
            form.action=action;
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", "status");
            hiddenField.setAttribute("value",value);
            form.appendChild(hiddenField);
            form.submit();
        }

    </script>
</head>

<?php
r_header($page_name,$con);
include_once '../menu.php';write_menu('pre_Payment');
?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<br>
<div class="container">

<?php

$status_0_pri_sql="select * from user_pri where user_id=$session_user_id and pri_code =(select pri_code from privlege where pri_name ='status=0')" ;
$status_1_pri_sql="select * from user_pri where user_id=$session_user_id and pri_code =(select pri_code from privlege where pri_name ='status=1')" ;
$status_2_pri_sql="select * from user_pri where user_id=$session_user_id and pri_code =(select pri_code from privlege where pri_name ='status=2')" ;
$status_3_pri_sql="select * from user_pri where user_id=$session_user_id and pri_code =(select pri_code from privlege where pri_name ='status=3')" ;


?>


            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->

                    <a class="hiddenanchor" id="tomain"></a>
                    <a class="hiddenanchor" id="topayment0"></a>
                    <a class="hiddenanchor" id="topayment1"></a>
                    <a class="hiddenanchor" id="topayment2"></a>
                    <a class="hiddenanchor" id="topayment3"></a>

                    <div id="wrapper" dir="rtl">
                        <div id="main" class="animate form">
                            <form id="myform">

                                <?php

                                if(mysqli_num_rows(mysqli_query($con,$status_2_pri_sql))==1)
                                {
                                    ?>
                                <p class=" change_link button button1"> <a href="#topayment0" class="payment0"> إخطارات السداد</a></p>
                                <?php
                                /*onclick="doPreview('myform','payment_list.php',2)*/
                                /*onclick="doPreview('myform','payment_list.php',0)"*/
                                /* onclick="doPreview('myform','payment_list.php',1)"*/
                                /* onclick="doPreview('myform','payment_list.php',3)"*/

                                };
                                if(mysqli_num_rows(mysqli_query($con,$status_0_pri_sql))==1)
                                {
                                    ?>
                                <p class=" change_link button button2" ><a href="#topayment1" class="payment1">
                                        إذون السداد

                                    </a></p> <?php
                                };
                                if(mysqli_num_rows(mysqli_query($con,$status_1_pri_sql))==1)
                                {
                                    ?>
                                <p class=" change_link button button3"><a href="#topayment2" class="payment2">
                                        مدفوعات مسترده

                                    </a></p> <?php
                                };
                                if(mysqli_num_rows(mysqli_query($con,$status_3_pri_sql))==1)
                                {
                                    ?>
                                <p class=" change_link button button4"><a href="#topayment3" class="payment3">
                                        تمت طباعته

                                    </a></p><?php
                                };

                                ?>

                            </form>
                        </div>

<?php
$S1="نوع المدفوعات";
$S2="إخطارات السداد";
$S3="تاريخ السداد من : ";
$S4="الى :";
$S5="أذون السداد";
$S6="مدفوعات مسترده";
$S7="";
$S8="";
$S9="";
$S10="";
$S11="";
$S12="";
$S13="";
$S14="";

?>

                        <div id="payment0" class="animate form">
                            <form id="payment_2">
                                <button class="button button1" onclick="doPreview('payment_2','payment_list.php',2)"><?php echo $S2 ?> </button>
                                <p class="change_link"><a href="#tomain"> عوده </a></p>
                            </form>
                        </div>
                        <div id="payment1" class="animate form"> <!-- أذون السداد -->
                            <form id="payment_0">
                                <table dir="rtl">
                                    <tr>
                                        <td><?php echo $S1?></td>
                                        <td align="right"><?php selectbox_write("operation_type",true,"special_select",true,$con);?></td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $S3?></td>
                                        <td> <input type="date"  value="2018-01-01" name="from_date" min="2018-01-01" class="input_date"></td>
                                    </tr>
                                    <tr>
                                        <td> <?php echo $S4?></td>
                                        <td> <input type="date" value="<?php echo date("Y-m-d")?>" name="to_date" min="2018-01-01" class="input_date"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button class="button button2" onclick="doPreview('payment_0','payment_list.php',0)"><?php echo $S5?> </button>
                                        </td>
                                    </tr>

                                </table>

                                <p class="change_link" STYLE="color: #ff0000"><a href="#tomain"> عوده </a></p>

                                <P> ملحوظه لن يتم عرض الايصال الا فى حاله تم توريد الحافظه الخاصه به فى البنك  </P>
                            </form>
                        </div>
                        <div id="payment2" class="animate form">
                            <form id="payment_1">
							  <table dir="rtl">
							<tr>
                                        <td><?php echo $S3?></td>
                                        <td> <input type="date"  value="<?php echo date("Y-m-d")?>" name="from_date" min="2018-01-01" class="input_date"></td>
                                    </tr>
                                    <tr>
                                        <td> <?php echo $S4?></td>
                                        <td> <input type="date" value="<?php echo date("Y-m-d")?>" name="to_date" min="2018-01-01" class="input_date"></td>
                                    </tr>
									</table>
                                <button class="button button3" onclick="doPreview('payment_1','payment_list.php',1)">
                                    مدفوعات مسترده
                                </button>
								
								 <button class="button button3" onclick="doPreview('payment_1','payment_list_print.php',1)">
                                    طباعه المدفوعات المسترده
                                </button>
                                <p class="change_link"><a href="#tomain"> عوده </a></p>
                            </form>
                        </div>
                        <div id="payment3" class="animate form">
                            <form id="payment_3">
تاريخ الطباعه من
                                <input type="date"  value="2018-01-01" name="from_date" min="2018-01-01" class="input_date">
                                الى
                                <input type="date" value="<?php echo date("Y-m-d")?>" name="to_date" min="2018-01-01" class="input_date">
                                <br>
                                <button class="button button4" onclick="doPreview('payment_3','payment_list.php',3)">
                                    عرض ما تم طباعته
                                </button>
                                <p class="change_link"><a href="#tomain"> عوده </a></p>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>



