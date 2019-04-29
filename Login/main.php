<?php
$page_name="main.php";
include_once '../page_validation.php';
?>
<!DOCTYPE html>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head >
	<link rel="stylesheet" href="../css/table_css.css">

	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="css/demo.css" />
	<link rel="stylesheet" type="text/css" href="css/menu_cornermorph.css" />
	<link rel="stylesheet" type="text/css" href="../css/fontawesome-all.css" />
	<script type="text/javascript" src="js/date_time.js"></script>
	</style>

 </style>

    <SCRIPT language=JavaScript>

        mydate = new Date();

        var year=mydate.getYear()
        if (year < 1000)
            year+=1900

        var myweekday=mydate.getDate()
        if (myweekday<10)
            myweekday="0"+myweekday

        myday = mydate.getDay();
        mymonth = mydate.getMonth();


        if(myday == 0)
            day = " الأحد "
        else if(myday == 1)
            day = " الإثنين"
        else if(myday == 2)
            day = " الثلاثاء"
        else if(myday == 3)
            day = " الاربعاء"
        else if(myday == 4)
            day = " الخميس"
        else if(myday == 5)
            day = " الجمعة"
        else if(myday == 6)
            day = " السبت"
        if(mymonth == 0) {
            month = " يناير "}
        else if(mymonth ==1)
            month = "قبراير "
        else if(mymonth ==2)
            month = "مارس "
        else if(mymonth ==3)
            month = "ابريل "
        else if(mymonth ==4)
            month = "مايو "
        else if(mymonth ==5)
            month = "يونية "
        else if(mymonth ==6)
            month = "يوليو "
        else if(mymonth ==7)
            month = "اغسطس "
        else if(mymonth ==8)
            month = "سبتمبر "
        else if(mymonth ==9)
            month = " اكتوبر "
        else if(mymonth ==10)
            month = "نوفمبر  "
        else if(mymonth ==11)
            month = "ديسمبر  "
        // End -->
    </SCRIPT>

</head>
<body>





<table width=100% cellpadding=0 cellspacing=0 align=center border=0 style="color: darkblue;"  >
        <TR  style="background-image: url('../img/background/abstract_color_background_picture_8015.jpg');background-position: 60% 30%;background-repeat: no-repeat;">

                 <TH  style="color: darkblue;font-size: 20px;" width="33%" >    قاعدة بيانات الأعضاء
                 </TH>
                 <TH width="33%">
                     <img class="date" src="../img/cal.png" border="0" width = 2% alt="Image 03" style="width: 40px"/>
                     <span id="date_time" style="color:blue;font-size: 16px;  width: 40px"></span>
                     <script type="text/javascript">window.onload = date_time('date_time');</script>
                     <img class="date" src="../img/cal.png" border="0" width = 2% alt="Image 03"  style="width: 40px"/>
                 </TH>
                 <TH width="33%"><div style="text-align: center;">
                    <img src="../img/logo.png" border="0" align="center">
                </div>
				
                 </TH>
                 </TR>

                 </Table>


<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">




<div style="overflow: auto;width: 100%;height: 400px;" class="scrollbar" id="style-7">
	<TABLE width=100% cellpadding=0 cellspacing=0 align=center >
		<?php
		$sql = mysqli_query($con,"SELECT * FROM pages where show_icon =1 and code in(select page_code from user_pages where user_id=$session_user_id)  ORDER BY periority");
		$Column_count=0;


		while($ress=mysqli_fetch_array($sql)) {

			if ($Column_count == 0) {
				echo "<TR><TD VALIGN='top'>";

			}

			echo "<TH  align=center ><div class='main_item_'><A href='" . $ress["href"] . "' ><img src='" . $ress["icon"] . "' border='0' width='80' heigh='80'>";
			echo "</div><br clear='all'><font size ='3' color='#0000A0'>" . $ress["arabic_name"] . "</A></TH>";

			$Column_count+=1;

			if ($Column_count == 3) {
				echo "</TD></TR>";
				$Column_count = 0;
			}

		}
?>
		</TABLE>

</div>
<div class="container">
	<div class="menu-wrap">
		<nav class="menu">
			<div class="profile"><img src="images/user.png" alt=""/><span>
					<?php
					$sql=mysqli_query($con,"select arabic_name from members where id= $session_user_id");

					while($row=mysqli_fetch_array($sql))
					{
						echo $row["arabic_name"];
					}

					?>
				</span></div>
			<div class="link-list">
				<a href="#"><span>إعدادات</span></a>
				<a href="change_pass.php"><span>تغيير كلمه المرور</span></a>
				<a href="#"><span>بيانات هامه</span></a>
				<a href="#"><span> حسابى </span></a>
			</div>
			<div class="icon-list">
				<a href="#"><i class="fa fa-home"></i></a>
				<a href="#"><i class="fa fa-question-circle fa-spin"></i></a>
				<a href="logout.php"><i class="fa fa-power-off fa-spin"></i></a>
			</div>
		</nav>
	</div>

	<button class="menu-button" id="open-button"><i class="fas fa-cog fa-spin fa-2x"></i><span>Open Menu</span></button>
	<div class="content-wrap" >
		<div class="content" style="height: 100%">
			<header class="codrops-header">	<div class="codrops-links"></div>	</header>
		</div>
	</div><!-- /content-wrap -->
</div><!-- /container -->
<script src="js/classie.js"></script>
<script src="js/main.js"></script>



</body>
