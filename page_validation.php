 <?php
    include_once 'function.php';
    check_session();
    $session_user_id=$_SESSION["session_user_id"];
    $sql="select * from user_pages where user_id=$session_user_id and page_code =(select code from pages where name ='$page_name')" ;
    $is_user_valid=mysqli_query($con,$sql);
    $count=mysqli_num_rows($is_user_valid);
if($count==1)
{
     echo"<table class='header'> <tr><td align='right'> ";
     echo"ЦямхгП   ";
     echo"<B>".$_SESSION["myusername"]."</B> ";
     echo"<A href=../login/logout.php >| няФл </A></td></tr></table>";
 }
else{
 redirect("../login/validation_error.php ",false);
}
?>
 
