<?php
$page_name=basename(__FILE__);
include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>

	<link rel="stylesheet" href="../css/table_css.css">
	<style>
		input#image-button{
			background: #ccc url('../img/update.gif') no-repeat top left ;
			background-size: 30px 30px;
			padding-left: 35px;
			height: 30px;
		}
	</style>
</head>
<?php
r_header($page_name,$con);
$User_ID = $_REQUEST["User_ID"];
$Pay_Year =$_REQUEST["Pay_Year"];
$employee = $_REQUEST["employee"];
$reg_type_code =$_REQUEST["reg_type_code"];
$Receipt_No =$_REQUEST["Receipt_No"];
$session_user =$_REQUEST["session_user"];


$result = mysqli_query($con,"SELECT Name FROM reg_type WHERE Code = $reg_type_code ");
while($ress=mysqli_fetch_array($result))
{
	$reg_type_name = $ress["Name"];
}

?>
<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">
<FORM NAME="FORM1"  action="card_reprint_fun.php" method="post" enctype="multipart/form-data">
	<br>
	<div class="content_center">
		<table BORDER=1 cellspacing=1 cellpadding=8 >
			<tr>
				<td> رقم العضوية  </td>
			    <td><input type="text" value="<?php echo $User_ID ;?>" readonly name="User_ID" >
			</tr>
			<tr>
				<td> نوع العضويه </td>
				<td><input type="text" value="<?php echo $reg_type_name ;?>" readonly name="reg_type_name">
			      <input type="hidden" name="reg_type_code" value="<?php echo $reg_type_code?>"> </input>

				</td>
			</tr>

			<tr>
				<td> النوع </td>
				<td><input type="text" value="<?php echo $employee ;?>" readonly name="employee">
					<input type="hidden" name="session_user" value="<?php echo $session_user?>"> </input>
				</td>
			</tr>
			<tr>
				<td> رقم الايصال</td>
				<td><input type="text" value="<?php echo $Receipt_No ;?>" readonly name="Receipt_No"></td>
			</tr>
			<tr>
				<td>  سنه الايصال</td>
				<td><input type="text" value="<?php echo $Pay_Year ;?>" readonly name="Pay_Year"></td>
			</tr>
			<tr>
				<td> سبب إعاده الطباعه </td>
				<td><input type="text" name="notes" style="width: 250px" autofocus required=""/></td>
			</tr>
			<tr>
				<td colspan="2" style="text-align: center">
					<INPUT type='submit' name='b3' id="image-button" value="تنشيط طباعه الكارنيه مره اخرى">

				</input>
				</td>

			</tr>

	</div>
