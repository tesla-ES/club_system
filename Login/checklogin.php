<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once '../db.php';
$con = connect();


if(!isset($_REQUEST['myusername']) || strlen($_REQUEST['myusername'])< 1){
    echo "<h3>·«   —ﬂ «”„ «·„” Œœ„ ›«—€ </h3>";
    exit ;
}

if(!isset($_REQUEST['mypassword']) || strlen($_REQUEST['mypassword'])<1){
    echo "<h3> ·« Ì„ﬂ‰  —ﬂ ﬂ·„Â «·„—Ê— ›«—€Â </h3>";
    exit ;
}

$myusername=$_REQUEST['myusername'];
$mypassword=$_REQUEST['mypassword'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);

$myusername = mysqli_real_escape_string($con,$myusername);
$mypassword = mysqli_real_escape_string($con,$mypassword);

$sql="SELECT id,username,Group_ID,password,arabic_name FROM members WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($con,$sql);

// Mysql_num_row is counting table row
$count=mysqli_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword $user_id and redirect to file "login_success.php"


while ($rows = mysqli_fetch_array($result,MYSQLI_ASSOC))
    {
        $_SESSION["myusername"]=$rows["username"] ;
        $_SESSION["mypassword"]=$rows["password"] ;
        $_SESSION["session_user_id"]=$rows["id"] ;
	}
   header("location:main.php");
}
else {
	// todo must define Error Message to return it to user in login page "Wrong Username or Password";
header("location:main_login.php");
}
?>

