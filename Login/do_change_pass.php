<?php
$host="localhost:3306"; // Host name
$username="root"; // Mysql username
$password="123"; // Mysql password
$db_name="new_club_db"; // Database name

$tbl_name="members"; // Table name

// Connect to server and select databse.

$link= mysql_connect("$host", "$username", "$password");

mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$my_username=$_POST['my_username']; 
$my_password=$_POST['my_password']; 
$new_password=$_POST['new_password']; 
$re_new_password=$_POST['re_new_password']; 


// To protect MySQL injection (more detail about MySQL injection)
$my_username = stripslashes($my_username);
$my_password = stripslashes($my_password);
$new_password = stripslashes($new_password);
$re_new_password = stripslashes($re_new_password);


$my_username = mysql_real_escape_string($my_username);
$my_password = mysql_real_escape_string($my_password);
$new_password = mysql_real_escape_string($new_password);
$re_new_password = mysql_real_escape_string($re_new_password);


$sql="SELECT * FROM $tbl_name WHERE username='$my_username' and password='$my_password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);


// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){

$update_sql="update $tbl_name set password = '$new_password' WHERE username='$my_username' and password='$my_password'";
$up_result=mysql_query($update_sql);

//echo $update_sql ;
header("location:main.php");
}
else {
echo "Wrong Username or Password";
//echo $sql ;
header("location:main_login.php");
}
?>

