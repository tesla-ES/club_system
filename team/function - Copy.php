<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$Curr_Year=date("Y");
$Curr_date=date("Y/m/d");
$session_user_id=$_SESSION["session_user_id"];
$myusername= $_SESSION["myusername"];
include_once 'db.php';
$con = connect();

function check_zero($ss){
    if($ss){
        return true ;
        exit();
    }
    return false ;
}
function check_null($string){
    if(is_null($string)||$string==""){
        return false;
        exit();
    }else{
        if(isset($string)){
            return true;
            exit();
    }

    }
    return false;
}

function get_image($gender){
    if($gender==1){
       return "../img/img_avatar.png" ;
    }else{
        return "../img/colored_no_f.png" ;
    }
}

function redirect($url, $permanent = false)
{
    if (headers_sent() === false)
        if (headers_sent() === false)
        {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
    exit();
}
//******************************************************/

function check_session(){
    if (!isset($_SESSION["myusername"])) {
        redirect("../login/main_login.php ",false);
        exit ;
    }
}



function r_header($page_name, $con){

    $sql="select arabic_name from pages where name ='$page_name'";
    $result = mysqli_query($con,$sql);
    while($res=mysqli_fetch_array($result))
    {
        $page_arabic_name=$res["arabic_name"];
    }
    ?>

    <table width=100% cellpadding=0 cellspacing=0 align=center class="report_header">
        <TR><TH style="color: #FFCC00 ;text-align: center" ><?php echo $page_arabic_name ;?> </TH></TR> </Table>
    <?php
}


function selectbox_write($sname,$show_all=false,$class="select_default",$for_print=false,$con){

    switch ($sname){
        //--------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/
        case "Membership_type":
          echo "<select name='$sname' class='select_default'>";
            if($show_all){
               echo"<option value='all'> كل الانواع  </option>";
            }
            $result = mysqli_query($con,"SELECT Code,Name FROM reg_type ORDER BY Code");
            while($res=mysqli_fetch_array($result))
            {
                $s_id=$res["Code"];
                $s_name=$res["Name"];
                echo"<option value='$s_id'>$s_name</option>";
            }
            echo"</select>";
            break;
        //------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/

        case "operation_type":

            echo "<select name='$sname'  class='$class'>";

            if($show_all){
                echo"<option value='all'> كل الانواع  </option>";
            }
            if($for_print)
            {
                echo"<option value='for_print' selected> المطلوب طباعته </option>";
            }
            $result = mysqli_query($con,"SELECT op_id,op_name FROM operation_type ORDER BY op_id");
            while($res=mysqli_fetch_array($result))
            {
                $s_id=$res["op_id"];
                $s_name=$res["op_name"];
                echo"<option value='$s_id'>$s_name</option>";
            }
            echo"</select>";
            break;
        //------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/

        case "employee_type":
            echo "<select name='$sname'  class='select_default'>";
            if($show_all){
                echo"<option value='99'> كل الانواع  </option>";
            }
            $result2 = mysqli_query($con,"SELECT Code,Name FROM employee_type ORDER BY Code");
            while($res=mysqli_fetch_array($result2))
            {
                $pops0=$res["Code"];
                $pops1=$res["Name"];
                echo"<option value='$pops0'>$pops1</option>";
            }
            echo"</select>";
            break;
        //------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/
        //--------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/
        case "payment_status":
            echo "<select name='$sname' class='select_default'>";
            if($show_all){
                echo"<option value='all'> كل الانواع  </option>";
            }
            $result = mysqli_query($con,"SELECT Code,Name FROM payment_status ORDER BY Code");
            while($res=mysqli_fetch_array($result))
            {
                $s_id=$res["Code"];
                $s_name=$res["Name"];
                echo"<option value='$s_id'>$s_name</option>";
            }
            echo"</select>";
            break;
        //------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/

    }


}

function order_list(){?>
    <TR  align="middle">
        <TH ><FONT size="4"  > الترتيب</TH><TD align="right">

            <select name="order_arrange" class="select_default">";
                <option value='User_ID'>رقم العضويه</option>
                <option value='Name'>اسم العضو</option>
                <option value='pay_Date'>تاريخ الدفع</option></select>

        </TD> </TR>
<?php
}
function result_count(){?>
    <TR  align="middle">
        <TH ><FONT size="4"  > عدد النتائج فى الصفحه  :</TH><TD align="right">

            <select name="per_page" class="select_default">";
                <option value='all'>كل النتائج</option>
                <option value=30>30</option>
                <option value=50>50</option>
                <option value=100>100</option>
                <option value=500>500</option>
                <option value=1000>1000</option>

            </select></TD> </TR>

<?php
}

function report_header(){

    ?>
    <table style="width: 98%" cellspacing="1" cellpadding="1">
    <TR><TH style="text-align: left"><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 class='no-print'></A></TH >
    <TH style="text-align: right">
        هيئه قناه السويس
    </TH> </tr>
     <tr><th></th><th style="text-align: right">
             النادى العام
         </th></tr>
        <tr><th></th><th style="text-align: right">
شئون العضويه
           </th></tr>
</table>
<?php
}
function report_uncompleate_parameter(){
    echo "<div class='nots'>";
    echo "لا يمكن عرض التقرير --- بعض البيانات غير مكتمله --- من فضلك قم بعرض التقرير من الزر المخصص  ";
    echo "</div>";
}

function report_footer($username_param){
?>
<table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=90%>
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 class="no-print"></A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$username_param  ?></TH></TR>
</Table>

<?php
}

function WritePage_pagination($start,$record_count,$per_page,$page_link,$other_param){

    $prev = $start - $per_page;
    $next = $start + $per_page;
    $last_rec = floor($record_count/$per_page);
    $last_rec =$last_rec*$per_page;

?>


        <script>
            var btns = document.querySelectorAll('.btn');
            var paginationWrapper = document.querySelector('.pagination-wrapper');
            var bigDotContainer = document.querySelector('.big-dot-container');
            var littleDot = document.querySelector('.little-dot');
            for(var i = 0; i < btns.length; i++) {
                btns[i].addEventListener('click', btnClick);
            }

            function btnClick() {
                if(this.classList.contains('btn--prev')) {
                    paginationWrapper.classList.add('transition-prev');
                } else {
                    paginationWrapper.classList.add('transition-next');
                }

                var timeout = setTimeout(cleanClasses, 500);
            }

            function cleanClasses() {
                if(paginationWrapper.classList.contains('transition-next')) {
                    paginationWrapper.classList.remove('transition-next')
                } else if(paginationWrapper.classList.contains('transition-prev')) {
                    paginationWrapper.classList.remove('transition-prev')
                }
            }
        </script>



    <?php

echo "<div class='pagination-wrapper'>";
    if(!($start>= $record_count-$per_page)){
        ///getting the last page
        echo " <a href='$page_link?start=$last_rec$other_param' >
         <svg class='btn btn--next' height='96' viewBox='0 0 24 24' width='96' >
         <path d='M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z'/>
         <path d='M0-.25h24v24H0z' fill='none'/>
         </svg>
         last
         </a>";

        echo " <a href='$page_link?start=$next$other_param'><svg class='btn btn--next' height='96' viewBox='0 0 24 24' width='96' >
        <path d='M8.59 16.34l4.58-4.59-4.58-4.59L10 5.75l6 6-6 6z'/>
         <path d='M0-.25h24v24H0z' fill='none'/>
         </svg></a>";
    }
    //show prev button
  ?>
    <div class="pagination-container">
    <div class="little-dot  little-dot--first"></div>
    <div class="little-dot">
      <div class="big-dot-container">
        <div class="big-dot"></div>
      </div>
    </div>
    <div class="little-dot  little-dot--last"></div>
  </div>

    <?php
    if($start > 0){

        echo " <a href='$page_link?start=0$other_param'>
       <svg class='btn btn--prev' height='96' viewBox='0 0 24 24' width='96' >
       <path d='M15.41 16.09l-4.58-4.59 4.58-4.59L14 5.5l-6 6 6 6z'/>
       <path d='M0-.5h24v24H0z' fill='none'/>
       </svg>first</a>";
 

           ///getting the first page

        echo " <a href='$page_link?start=$prev$other_param'>
       <svg class='btn btn--prev' height='96' viewBox='0 0 24 24' width='96' >
       <path d='M15.41 16.09l-4.58-4.59 4.58-4.59L14 5.5l-6 6 6 6z'/>
       <path d='M0-.5h24v24H0z' fill='none'/>
       </svg>
       </a>";
    }

echo "</div>";
}


function isRealDate($date) {

    //if (false === strtotime(tosting($date))) {
if (strpos($date, '-') !== false) {
         if(false === date_create_from_format('d-m-Y', $date)){
        return false;
        exit ;
         }

}else{
             if(false === date_create_from_format('d/m/Y', $date)) {
                 return false;
                 exit;
             }
         }



        if (strpos($date, '-') !== false) {
            list($day, $month, $year) = explode('-', $date);
        } else {
            list($day, $month, $year) = explode('/', $date);

        }

        return checkdate($month,$day,$year);
}

function valid_date($inputdate){
    if(isset($inputdate)){



        if (isRealDate($inputdate)) {
            return true;
        }
        else {

            return false;
        }
    }else{
        return false;
    }
}

function asignValue($value,$other_value){
    $Rvalue=$other_value ;
    if(isset($value)){
        $Rvalue=$value ;
    }
    return $Rvalue;
}
$max_length=30;

?>
