<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />
<title> إعدادات النظام للعام الجديد</title>
<head>
    <link rel="stylesheet" href="../css/table_css.css">
    <script src="js/jquery-3.3.1.min.js"></script>
<link href="css/style.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<style>
    .info{
        position: relative;
        top: 75px;
        font: bold 23px arabicFont;
        color: #ff0909;
        height: 31px;
        text-align: center;
    }
    .info-text{
        display: list-item;
        direction: rtl;
        font: bold 20px arabicFont, sans-serif ;
        color: #2f0fa7
    }
    input[type="button"]:hover {
        background: #e27f00;
        background: -moz-linear-gradient(top, #e27f00 0%, #ff9000 3%, #ffad00 65%, #ffb700 97%, #ffe49e 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#e27f00), color-stop(3%,#ff9000), color-stop(65%,#ffad00), color-stop(97%,#ffb700), color-stop(100%,#ffe49e));
        background: -webkit-linear-gradient(top, #e27f00 0%,#ff9000 3%,#ffad00 65%,#ffb700 97%,#ffe49e 100%);
        background: -o-linear-gradient(top, #e27f00 0%,#ff9000 3%,#ffad00 65%,#ffb700 97%,#ffe49e 100%);
        background: -ms-linear-gradient(top, #e27f00 0%,#ff9000 3%,#ffad00 65%,#ffb700 97%,#ffe49e 100%);
        background: linear-gradient(to bottom, #e27f00 0%,#ff9000 3%,#ffad00 65%,#ffb700 97%,#ffe49e 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e27f00', endColorstr='#ffe49e',GradientType=0 );
    }

    input[type="button"] {
        display: inline-block;
        font:600 18px arabicFont ;
        color: #2f0fa7;
        transition: 0.1s all;
        -webkit-transition: 0.1s all;
        -moz-transition: 0.1s all;
        -o-transition: 0.1s all;
        cursor: pointer;
        outline: none;
        height: 42px;
        width: 10%;
        border: none;
        border-radius: 0.3em;
        -webkit-border-radius: 0.3em;
        -o-border-radius: 0.3em;
        -moz-border-radius: 0.3em;
        background: #ffe49e;
        background: -moz-linear-gradient(top, #ffe49e 0%, #ffb700 3%, #ffad00 35%, #ff9000 97%, #e27f00 100%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffe49e), color-stop(3%,#ffb700), color-stop(35%,#ffad00), color-stop(97%,#ff9000), color-stop(100%,#e27f00));
        background: -webkit-linear-gradient(top, #ffe49e 0%,#ffb700 3%,#ffad00 35%,#ff9000 97%,#e27f00 100%);
        background: -o-linear-gradient(top, #ffe49e 0%,#ffb700 3%,#ffad00 35%,#ff9000 97%,#e27f00 100%);
        background: -ms-linear-gradient(top, #ffe49e 0%,#ffb700 3%,#ffad00 35%,#ff9000 97%,#e27f00 100%);
        background: linear-gradient(to bottom, #ffe49e 0%,#ffb700 3%,#ffad00 35%,#ff9000 97%,#e27f00 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffe49e', endColorstr='#e27f00',GradientType=0 );
    }
</style>
</head>
<body>
<?php
r_header($page_name,$con);
?>
<!-----start-main---->
<div class="login-form" style="width: 60%">

    <div class="head" style="top: -14%;left: 40%">
        <img src="images/setting3.jpg" alt=""/>
    </div>
    <div class="info">
ملحوظه :- لن يتم التفعيل الا فى بدايه العام
    </div>
    <form name="form1" method="post" style="padding: 12% 2.5em 8% 2.5em;">

        <?php
        $sql="select * from new_year_setting ORDER by view_periority";
        $result = mysqli_query($con,$sql);
       $x=0 ;
        while($res=mysqli_fetch_array($result))
        {
            $x++;
            ?><div class="info-text">
          <h2 style="width:70%;display: inline-block"> <?php echo $res['view_text']?></h2>

                <?php
                $db_sql=$res['sql_select'];
                $db_result = mysqli_query($con,$db_sql);
                $db_query_result=0 ;
                if (mysqli_num_rows($db_result) > 0) {
                while($db_res=mysqli_fetch_array($db_result))
                {
                    $db_query_result=$db_res['cunt'];
                }}

                ?>
            <li style="text-align:center;width:120px;display: inline-block;margin-bottom:10px;">
            <input type="text" name="res_<?php echo $x?>"  id="res_<?php echo $x?>" readonly   class="text" value="<?php echo $db_query_result?>" ></a>
            </li>

            <input type="button" onclick="do_action('<?php echo $res["sql_action_id"];?>')" value="<?php echo $res["action_name"];?>">
            </div>
           <?php

        }
        ?>

    </form>

</div>


<script>
function do_action(action_id){
    $.ajax({
        method:"post",
        url: "admin_setting_action.php",
        data: {sql_action_id:action_id},
        cash:false
    }).done(function (data) {
        var result = $(data).filter('.result_msg').text();
        alert ($("#res_" + action_id).val());
        $("#res_" + action_id).val($(data).filter('.result').text());
        alert(result) ;
});
}

</script>
</body>
</html>