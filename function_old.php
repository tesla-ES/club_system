<?php
session_start();
if(!session_is_registered(myusername)){
//if user not login
    redirect("../login/main_login.php ",false);
}
else {

    $dbname = "New_Club_DB";
    $link = mysql_connect();
    if (!$link) {
        print "can not connect to the server";
    }

    if (!mysql_select_db($dbname, $link)) {
        print "sorry";
        $dberror = mysql_error();
        return false;
    }

    mysql_query("SET CHARACTER_SET_SERVER 'CP1256'");
    mysql_query("SET NAMES 'CP1256'");
}

function redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    if (headers_sent() === false)
    {
      header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();

  /*  $url='/new_Membership/'.$url;
    echo '<META HTTP-EQUIV=REFRESH CONTENT="0; '.$url.'">';*/
}

$Curr_Year=date("Y");

function selectbox_write($sname,$show_all=false,$class="select_default",$for_print=false){

    switch ($sname){
        //--------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/
        case "Membership_type":
          echo "<select name='$sname' class='select_default'>";
            if($show_all){
               echo"<option value='all'> ﬂ· «·«‰Ê«⁄  </option>";
            }
            $result = mysql_query("SELECT Code,Name FROM reg_type ORDER BY Code");
            while($res=mysql_fetch_array($result))
            {
                $s_id=$res[Code];
                $s_name=$res[Name];
                echo"<option value='$s_id'>$s_name</option>";
            }
            echo"</select>";
            break;
        //------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/

        case "operation_type":

            echo "<select name='$sname'  class='$class'>";

            if($show_all){
                echo"<option value='all'> ﬂ· «·«‰Ê«⁄  </option>";
            }
            if($for_print)
            {
                echo"<option value='for_print' selected> «·„ÿ·Ê» ÿ»«⁄ Â </option>";
            }
            $result = mysql_query("SELECT op_id,op_name FROM operation_type ORDER BY op_id");
            while($res=mysql_fetch_array($result))
            {
                $s_id=$res[op_id];
                $s_name=$res[op_name];
                echo"<option value='$s_id'>$s_name</option>";
            }
            echo"</select>";
            break;
        //------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/

        case "employee_type":
            echo "<select name='$sname'  class='select_default'>";
            if($show_all){
                echo"<option value='99'> ﬂ· «·«‰Ê«⁄  </option>";
            }
            $result2 = mysql_query("SELECT Code,Name FROM employee_type ORDER BY Code");
            while($res=mysql_fetch_array($result2))
            {
                $pops0=$res[Code];
                $pops1=$res[Name];
                echo"<option value='$pops0'>$pops1</option>";
            }
            echo"</select>";
            break;
        //------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/
        //--------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/
        case "payment_status":
            echo "<select name='$sname' class='select_default'>";
            if($show_all){
                echo"<option value='all'> ﬂ· «·«‰Ê«⁄  </option>";
            }
            $result = mysql_query("SELECT Code,Name FROM payment_status ORDER BY Code");
            while($res=mysql_fetch_array($result))
            {
                $s_id=$res[Code];
                $s_name=$res[Name];
                echo"<option value='$s_id'>$s_name</option>";
            }
            echo"</select>";
            break;
        //------------------------------*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/*/

    }


}

function order_list(){?>
    <TR  align="middle">
        <TH ><FONT size="4"  > «· — Ì»</TH><TD align="right">

            <select name="order_arrange" class="select_default">";
                <option value='User_ID'>—ﬁ„ «·⁄÷ÊÌÂ</option>
                <option value='Name'>«”„ «·⁄÷Ê</option>
                <option value='pay_Date'> «—ÌŒ «·œ›⁄</option></select>

        </TD> </TR>
<?php
}
function result_count(){?>
    <TR  align="middle">
        <TH ><FONT size="4"  > ⁄œœ «·‰ «∆Ã ›Ï «·’›ÕÂ  :</TH><TD align="right">

            <select name="per_page" class="select_default">";
                <option value='all'>ﬂ· «·‰ «∆Ã</option>
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
        ÂÌ∆Â ﬁ‰«Â «·”ÊÌ”
    </TH> </tr>
     <tr><th></th><th style="text-align: right">
             «·‰«œÏ «·⁄«„
         </th></tr>
        <tr><th></th><th style="text-align: right">
‘∆Ê‰ «·⁄÷ÊÌÂ
           </th></tr>
</table>
<?
}
function report_uncompleate_parameter(){
    echo "<div class='nots'>";
    echo "·« Ì„ﬂ‰ ⁄—÷ «· ﬁ—Ì— --- »⁄÷ «·»Ì«‰«  €Ì— „ﬂ „·Â --- „‰ ›÷·ﬂ ﬁ„ »⁄—÷ «· ﬁ—Ì— „‰ «·“— «·„Œ’’  ";
    echo "</div>";
}


function r_header($page_name){

    $sql="select arabic_name from pages where name ='$page_name'";
    $result = mysql_query($sql);
    while($res=mysql_fetch_array($result))
    {
        $page_arabic_name=$res[arabic_name];
    }
    ?>

       <table width=100% cellpadding=0 cellspacing=0 align=center class="report_header">
       <TR><TH style="color: #FFCC00 ;text-align: center" ><?php echo $page_arabic_name ;?> </TH></TR> </Table>

<?php
}
function report_footer($username_param){

?>
<table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=90%>
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 class="no-print"></A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$username_param  ?></TH></TR>
</Table>

<?php
}

$max_length=35;
?>
