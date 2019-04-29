<?php

$page_name=basename(__FILE__);
include_once '../page_validation.php';

$sql_action_id=$_REQUEST["sql_action_id"];
$action_query_result="";
if(!empty($sql_action_id))
{
    $sql_action="select sql_action,action_type,function_name  from sql_actions where sql_action_id=$sql_action_id order BY periority";

    $action_result = mysql_query($sql_action);

    mysql_query("SET AUTOCOMMIT=OFF");
    mysql_query("START TRANSACTION");
    $a1=false ;
    while($action_res=mysql_fetch_array($action_result))
    {
        if ($action_res['action_type']==1) {
            $sql_query=str_replace('?last_year?','2018',$action_res['sql_action']);
            $a1 = mysql_query($sql_query);
        }else
        {
            include_once "action_file.php";
            call($action_res['function_name']);
        }

    }

    if ($a1) {
        mysql_query("COMMIT");
        $sql="select * from new_year_setting where sql_action_id =$sql_action_id";
        $result = mysql_query($sql);
        $db_query_result="";
        while($res=mysql_fetch_array($result))
        {
            $db_sql=$res['sql_select'];
            $db_result = mysql_query($db_sql);
            if (mysql_num_rows($db_result) > 0) {
                while($db_res=mysql_fetch_array($db_result))
                {
                    $db_query_result=$db_res['cunt'];
                }}
        }
        echo "<div class='result_msg'>  تم تنفيذ بنجاح  </div>  <div class='result'> $db_query_result</div> ";
    } else {
        mysql_query("ROLLBACK");
        echo "<div class='result_msg'> خطا فى اتنفيذ  </div>";
    }
}

?>