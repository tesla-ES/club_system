
<!DOCTYPE html>
<html>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Membeship System</title>

		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->

		<!--//webfonts-->
</head>
<body>

				 <!-----start-main---->
				<div class="login-form">

					<div class="head">
						<img src="images/user.png" alt=""/>
						
					</div>
				<form name="form1" method="post" action="do_change_pass.php">
				
					<li>
						<input type="text" name="my_username"  id="myusername" class="text" value="إسم المستخدم" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'اسم المستخدم';}" ></a>
					</li>
					
					<li>
						<input type="text" name="my_password" type="text"  value=" كلمه المرور القديمه " onfocus="this.value = ''; this.type='password'" onblur="if (this.value == '') {this.value = ' كلمه المرور القديمه ';this.type='text'}"></a>
					</li>
					
                    <li>
						<input type="text" name="new_password" type="text"  value="  كلمه المرور الجديده " onfocus="this.value = '';this.type='password'" onblur="if (this.value == '') {this.value = '  كلمه المرور الجديده ';this.type='text'}"></a>
					</li>

					<li>
						<input type="text" name="re_new_password" type="text"  value=" اعاده كلمه المرور الجديده" onfocus="this.value = '';this.type='password'" onblur="if (this.value == '') {this.value = ' اعاده كلمه المرور الجديده';this.type='text'}"></a>
					</li>
					
					<div class="icon_bar">
						<input type="submit"  value="تغيير كلمه المرور"  >
					</div>

				</form>

			</div>

				


		 		
</body>
</html>