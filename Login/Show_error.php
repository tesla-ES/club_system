<?php
include_once '../function.php';
?>


<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1256" />
<title> Membeship System</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
    <link rel="stylesheet" href="../reports/css/table_css.css">
    <link rel="stylesheet" href="css/box.css">
</head>


<div class="content_center">
<table width=100% cellpadding=0 cellspacing=0 align=center border=0 bgcolor="#7A7A7A"  >
        <TR style="background-image: url('../img/background/abstract_color_background_picture_8015.jpg');background-position: 60% 30%;background-repeat: no-repeat;">

                 <TH style="text-align: center;font-size:17pt;color: #004488">
                     نظام شئون العضويه
                 <BR>
                 </TH>
                 <TH>
                 <img src="../img/logo.png" border="0" >
                 </TH>
                 </TR>
                 </Table>



    <div class="alert-box error">
     <span>خطأ : </span>
<?php
        $sql="select Message_text from error_message where Message_id =".$_SESSION["Session_ErroMessage"];
        $fin1=mysqli_query($con,$sql);
        while($res1=mysqli_fetch_array($fin1))
        {
         echo $res1["Message_text"];
        }

?>
    </div>
    <input type="button" value="عوده الى الصفحه السابقه " onclick="history.back(-1)" />
    <br>
    <br>

<div id="tooplate_footer">
    	<TH  align=center ><font size ="5" color="red">   إعداد وتصميم
	</div> <!-- end of footer --><br>
<img src="../img/t3.png" border="0" >
</div>