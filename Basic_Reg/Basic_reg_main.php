<?php
include_once '../function.php';
check_session();
?>
<!DOCTYPE html>
<!-- saved from url=(0062)http://www.webstrot.com/html/myporto/light_version/# -->
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>بيانات عضويه</title>

    <!-- css include -->
    <link rel="stylesheet" type="text/css" href="../css/materialize.css">
    <link rel="stylesheet" href="../fontawesome/css/all.css" >

    <link rel="stylesheet" type="text/css" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.css">

    <!-- my css include -->
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/table_css.css">

    <script src="../JS/jquery.js"></script>
    <script src="../JS/popper.min.js"></script>
    <script src="../bootstrap/4.3.1/js/bootstrap.min.js" ></script>

    <script src=../payment/js/ajax.js type=text/javascript></script>
    <script src="../JS/functions.js" type="text/javascript"></script>
    <script>
        function go_page(pop0,pop1,pop4)
        {
            if (confirm("سيتم إجراء الحذف هل انت متاكد")){
                window.location.href="Basic_Reg_Delete.php?User_ID="+pop0+"&Reg_Type="+pop1+"&Employee="+pop4 ;
                return true;
            }else{
                return false;
            }
        }

    </script>
</head>

<body class="clearfix" onload="textCounter('Text6','counter',<?php echo $max_length?>)">
<?php
if(isset($_REQUEST['user_id'])) {
    $user_id = isset($_REQUEST['user_id']) ? $_REQUEST['user_id'] : 0;
    $reg_type = isset($_REQUEST['reg_type']) ? $_REQUEST['reg_type'] : 1;
    $employee = isset($_REQUEST['employee']) ? $_REQUEST['employee'] : 1;

    mysqli_set_charset($con, "utf8");

    $fin = mysqli_query($con, "select User_ID,Reg_Type,Sec_Type,Ser,Employee,Name,DATE_FORMAT(`b_date`,'%Y/%m/%d') as b_date1 ,gender,b_place,Nationality,Education,DATE_FORMAT(`Grade_Date`,'%Y/%m/%d') as Grade_Date1 ,Job,Employer,Job_Tel,Home_Tel,Address,Status,DATE_FORMAT(`Hire_date`,'%Y/%m/%d') as Hire_date1 ,Social_Type,Social_No,DATE_FORMAT(`Social_Date`,'%Y/%m/%d') as Social_Date1 ,Place,(select max(pay_year) from payment as p where p.user_id=b.user_id and p.reg_type = b.reg_type and p.employee = b.employee and status in(0,3) and operation in(0,5,6,7) ) as Last_Year,Valid,Last_Year_Card,Notes,image,Beach,Yacht,Golf,Tennis,Guest_No,Rowing,knighthood ,upd_date,(select username from members where upd_user = id ) as upd_user from Basic_Reg  as b where User_ID ='$user_id'&& reg_type ='$reg_type'&&employee='$employee'");
    $n_res = mysqli_num_rows($fin);

    while ($res = mysqli_fetch_array($fin)) {
        $User_ID = $res["User_ID"];
        $Reg_Type = $res["Reg_Type"];
        $Sec_Type = $res["Sec_Type"];
        $Ser = $res["Ser"];
        $Employee = $res["Employee"];
        $Name = $res["Name"];
        $b_date = isset($res["b_date1"]) ? date_create_from_format("Y/n/j", $res["b_date1"]) : date_create_from_format("Y/n/j", "1900/1/1");
        $gender = $res["gender"];
        $b_place = $res["b_place"];
        $Nationality = $res["Nationality"];
        $Education = $res["Education"];
        $Grade_Date1 = isset($res["Grade_Date1"]) ? date_create_from_format("Y/n/j", $res["Grade_Date1"]) : date_create_from_format("Y/n/j", "1900/1/1");
        $Job = $res["Job"];
        $Employer = $res["Employer"];
        $Job_Tel = $res["Job_Tel"];
        $Home_Tel = $res["Home_Tel"];
        $Address = $res["Address"];
        $Status = $res["Status"];
        $Hire_date1 = isset($res["Hire_date1"]) ? date_format(date_create_from_format("Y/n/j", $res["Hire_date1"]), "Y-m-d") : "";
        $Social_Type = $res["Social_Type"];
        $Social_No = $res["Social_No"];
        $Social_Date1 = isset($res["Social_Date1"]) ? date_format(date_create_from_format("Y/n/j", $res["Social_Date1"]), "Y-m-d") : "";
        $Place = $res["Place"];
        $Last_Year = $res["Last_Year"];
        $Valid = $res["Valid"];
        $Last_Year_Card = $res["Last_Year_Card"];
        $Notes = $res["Notes"];
        $image = check_null($res["image"]) ? $res["image"] : get_image($gender);

        $Beach = $res["Beach"];
        $Yacht = $res["Yacht"];
        $Golf = $res["Golf"];
        $Tennis = $res["Tennis"];
        $Rowing = $res["Rowing"];
        $knighthood = $res["knighthood"];

        $Guest_no = $res["Guest_No"];

        $upd_date = $res["upd_date"];
        $upd_user = $res["upd_user"];

    }
    $Reg_Type_name = "";
    $employee_type = "";
    $secondary_type = "";
    $result = mysqli_query($con, "SELECT Name FROM reg_type where code=$Reg_Type ");
    while ($ress = mysqli_fetch_array($result)) {
        $Reg_Type_name = $ress["Name"];
    }
    $result = mysqli_query($con, "SELECT Name FROM employee_type where code=$Employee ");
    while ($ress = mysqli_fetch_array($result)) {
        $employee_type = $ress["Name"];
    }

    $result1 = mysqli_query($con, "SELECT Code,Name FROM secondary_type  where code=$Sec_Type");
    while ($resss = mysqli_fetch_array($result1)) {
        $secondary_type = $resss["Name"];
    }


    ?>
    <div data-scroll="0" class="thetop"></div>
    <!-- for back to top -->
    <!-- ========== ========== fixed - left side body start ========== ========== -->
    <div class="fixed-left-side-body">
        <div class="profile">
            <div class="profile-image center-align">

                <img src="<?php echo $image ?>" alt="Image">
            </div>
            <!-- /.profile-image -->

            <div class="profile-name right-align" style="padding-right: 10%">
                <h1 class="user-name"><?php echo $Name ?></h1>
                <p>
                    عضويه : <span class="photoshop-color"><?php echo $Reg_Type_name ?></span>
                </p>
                <p>
                    الوظيفه : <span class="photoshop-color"><?php echo $Job ?></span>
                </p>
                <p>
                    تاريخ الميلاد : <span
                            class="photoshop-color raplace"><?php echo date_format($b_date, "Y/m/d") ?></span>
                </p>

            </div>
            <!-- /.profile-name -->

            <ul class="social-btn">
                <li>
                    <a href="#">
                        <i class="fa fa-facebook-f" aria-hidden="true"></i>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-behance" aria-hidden="true"></i>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="fa fa-dribbble" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>

            <div class="discription clearfix">

                <p>
                </p>
            </div>
            <!-- /.discription -->
            <div class="cv-btn">
                <FORM NAME="FORM1" action="Basic_Reg_img_Upload.php" method="post" enctype="multipart/form-data">
                    <a href="#" class="custom-btn waves-effect waves-light">
                        <i class="fa fa-file-upload" aria-hidden="true"></i>تغيير الصوره
                    </a>
                </FORM>
            </div>
        </div>
        <!-- /.profile -->
    </div>
    <!-- /.fixed-left-side-body -->
    <!-- ========== ========== fixed - left side body end ========== ========== -->

    <!-- ========== ========== right side body start ========== ========== -->
    <div class="right-side-body">

        <!-- ==================== header-section start ==================== -->
        <header id="header-section" class="header-section mb-30 clearfix">
            <div class="">
                <nav class="main-nav">
                    <div class="nav-wrapper main-nav-wrapper">

                        <ul class="alternative-menu ul-li responsive_menu_fixed">

                            <li class="alt-search-area">
                                <form action="#">
                                    <input class="alternative-search" type="search" placeholder="search">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </li>

                            <li class="side-menu-btn right">
                                <a href="#" class="button-collapse waves-effect default" data-activates="mobile-demo">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.alternative-menu -->
                        <div class=" hello_icon_menu hello_single_index_menu1">
                            <ul class="ul-li-block side-nav" id="mobile-demo" style="transform: translateX(-100%);">

                                <li class="sn-user active">
                                    <span class="sn-user-img">
								<img src="<?php echo $image ?>" alt="Image">
							</span>
                                    <span class="sn-user-name">
								 <?php echo $Name ?>
                                        <p>
                  عضويه :  <span class="photoshop-color"><?php echo $Reg_Type_name ?></span>
                </p>
                <p>
                    الوظيفه :  <span class="photoshop-color"><?php echo $Job ?></span>
                </p>
                <p>
                   تاريخ الميلاد :  <span
                            class="photoshop-color raplace"><?php echo date_format($b_date, "Y/m/d") ?></span>
                </p>
							</span>
                                    <a href="#" class="sn-cv-link common-color">تغيير الصوره</a>
                                </li>
                                <!-- /.sn-user -->

                                <li class="sn-item">
                                    <a href="0" class="waves-effect">
                                        <i class="fa fa-home" aria-hidden="true"></i> Home
                                    </a>
                                </li>
                                <li class="sn-item">
                                    <a href="1" class="waves-effect">
                                        <i class="fa fa-user-o" aria-hidden="true"></i> بيانات العضويه
                                    </a>
                                </li>
                                <li class="sn-item">
                                    <a href="2" class="waves-effect">
                                        <i class="fa fa-lightbulb" aria-hidden="true"></i> بيانات شخصيه
                                    </a>
                                </li>
                                <li class="sn-item">
                                    <a href="3" class="waves-effect">
                                        <i class="fa fa-graduation-cap" aria-hidden="true"></i> الزوج/الزوجه
                                    </a>
                                </li>
                                <li class="sn-item">
                                    <a href="4" class="waves-effect">
                                        <i class="fa fa-briefcase" aria-hidden="true"></i> الاعباء
                                    </a>
                                </li>
                                <li class="sn-item">
                                    <a href="5" class="waves-effect">
                                        <i class="fa fa-quote-left" aria-hidden="true"></i> المدفوعات
                                    </a>
                                </li>
                                <li class="sn-item">
                                    <a href="6" class="waves-effect">
                                        <i class="fa fa-pencil-alt" aria-hidden="true"></i> الانشطه
                                    </a>
                                </li>
                                <li class="sn-item">
                                    <a href="7" class="waves-effect">
                                        <i class="fa fa-newspaper-o" aria-hidden="true"></i> الارشيف
                                    </a>
                                </li>
                                <li class="sn-item">
                                    <a href="8" class="waves-effect">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i> بيانات الاتصال
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="hello_main_navigation hello_single_index_menu2">
                            <ul id="nav-mobile" class="right main-nav-ul">
                                <li class="active"><a href="0" class="nav-mobile">home</a></li>
                                <li class=""><a href="1" class="waves-effect default">بيانات العضويه</a></li>
                                <li class=""><a href="2" class="waves-effect default">بيانات شخصيه</a></li>
                                <li class=""><a href="3" class="waves-effect default">الزوج/الزوجه</a></li>
                                <li class=""><a href="4" class="waves-effect default">الاعباء</a></li>
                                <li><a href="5" class="waves-effect default">المدفوعات</a></li>
                                <li><a href="6" class="waves-effect default">الانشطه</a></li>
                                <li><a href="7" class="waves-effect default">الارشيف</a></li>
                                <li><a href="8" class="waves-effect default">بيانات الاتصال</a></li>
                                <li>
                                    <a href="0" class="waves-effect default cd-search-trigger">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- /.main-nav-ul -->

                        <div class="hello_menu_fixed_main_wrapper" style="display: none;">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="hello_logo_wrapper">
                                        <div class="hello_logo">
                                            <img src="../img/scc.jpg" alt="hello_logo" class=".scc_img">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                    <div class="hello_fixed_nav_wrapper hello_single_index_menu3">
                                        <ul class="hello_nav_fixed">
                                            <li class="active"><a href="0" class="nav-mobile">home</a></li>
                                            <li class=""><a href="1" class="waves-effect default">بيانات العضويه</a>
                                            </li>
                                            <li class=""><a href="2" class="waves-effect default">بيانات شخصيه</a></li>
                                            <li class=""><a href="3" class="waves-effect default">الزوج/الزوجه</a></li>
                                            <li class=""><a href="4" class="waves-effect default">الاعباء</a></li>
                                            <li><a href="5" class="waves-effect default">المدفوعات</a></li>
                                            <li><a href="6" class="waves-effect default">الانشطه</a></li>
                                            <li><a href="7" class="waves-effect default">الارشيف</a></li>
                                            <li><a href="8" class="waves-effect default">بيانات الاتصال</a></li>
                                            <li>
                                                <a href="0" class="waves-effect default cd-search-trigger">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.main-nav-wrapper -->
                </nav>
            </div>
            <!-- /.
			-->

            <div id="cd-search" class="cd-search">
                <form action="Basic_Reg_Search_fun.php" method="post">
                  <!--  <button type="button" class="btn btn-outline-primary">رقم العضويه</button>-->
                    <input type="text" name="Text1" placeholder="ابحث برقم العضويه"/>
                    <?php /*todo load result in list item with reg_type and employee and user_id and name */ ?>
                </form>
            </div>

        </header>
        <!-- /#header-section -->
        <!-- ==================== header-section end ==================== -->

        <!-- ==================== main-slider-section start ==================== -->
        <section id="main-slider-section" class="main-slider-section mb-30 clearfix">

            <div class="main-slider owl-carousel owl-theme owl-loaded owl-drag">

                <div class="owl-stage-outer">

                    <div class="owl-item active" style="width: 891.75px;">
                        <div class="item">
                            <div class="row">

                                <div class="col l6 m6">
                                    <div class="item-child-left right-align" style="padding: 40px 20px">
                                        <h2 class="hi">مرحبا</h2>
                                        <p class="name"> <?php echo $Name ?></p>
                                        <small class="position mb-30"> نوع العضويه <?php echo $Reg_Type_name ?></small>
                                        <!--
                                                                        <a href="#" class="custom-btn waves-effect waves-light">
                                                                            <i class="fa fa-picture-o" aria-hidden="true"></i> view protfolio
                                                                        </a>-->
                                    </div>
                                    <!-- /.item-child-left -->
                                </div>
                                <!-- coll6 -->

                                <div class="col l6 m6">
                                    <div class="item-child-right right-align">
                                        <img src="<?php echo $image ?>" alt="Image">
                                        <a href="#" class="chat waves-effect waves-light">
                                            <i class="fa fa-comment-dots" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <!-- /.item-child-right -->
                                </div>
                                <!-- coll6 -->

                            </div>
                            <!-- row -->
                        </div>
                    </div>

                </div>
                <div class="owl-nav disabled">
                    <div class="owl-prev">prev</div>
                    <div class="owl-next">next</div>
                </div>
                <div class="owl-dots">
                    <div class="owl-dot"><span></span></div>
                    <div class="owl-dot"><span></span></div>
                    <div class="owl-dot active"><span></span></div>
                </div>
            </div>
            <!-- /.main-slider -->

        </section>
        <!-- /.main-slider-section -->
        <!-- ==================== main-slider-section end ==================== -->

        <!-- ==================== aboutme-section start ==================== -->
        <div data-scroll="1" class="aboutme-section sec-p100-bg-bs mb-30 clearfix" id="about">
            <div class="Section-title">
                <h2>
                    <i class="fa fa-user" aria-hidden="true"></i>
                    بيانات العضوية
                </h2>
                <span>بيانات العضوية</span>

            </div>
            <!-- /.Section-title -->

            <div class="personal-details-area">
                <div class="row">
                    <div class="col l6 m6 s6">
                        <div class="personal-details-left">
                            <ul class="service-list ul-li">
                                <li class="logodesign">
                                    <i class="fa fa-folder-open" aria-hidden="true"></i>
                                    <span class="service-name">الاطلاع على الملف</span>
                                    <a href="#" class="more"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                </li>
                                <li class="website">
                                    <i class="fa fa-file-upload" aria-hidden="true"></i>
                                    <span class="service-name">إضافه مستند</span>
                                    <a href="#" class="more"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                </li>

                            </ul>
                            <!-- /.service-list -->
                        </div>
                        <!-- /.personal-details-left -->
                    </div>
                    <!-- colm6 -->

                    <div class="col l6 m6 s6">
                        <div class="personal-details-right">
                            <h2 class="title">بيانات اساسيه</h2>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="td-w25">رقم العضو</td>
                                    <td class="td-w10">:</td>
                                    <td class="td-w65"><?php echo $user_id ?></td>
                                </tr>
                                <tr>
                                    <td class="td-w25">نوع العضوية</td>
                                    <td class="td-w10">:</td>
                                    <td class="td-w65"><?php echo $Reg_Type_name ?></td>
                                </tr>
                                <tr>
                                    <td class="td-w25">نوع العمالة</td>
                                    <td class="td-w10">:</td>
                                    <td class="td-w65"><?php echo $employee_type ?></td>
                                </tr>
                                <tr>
                                    <td class="td-w25"> نوع الأعباء</td>
                                    <td class="td-w10">:</td>
                                    <td class="td-w65"><?php echo $secondary_type ?></td>
                                </tr>
                                <tr>
                                    <td class="td-w25">الترتيب</td>
                                    <td class="td-w10">:</td>
                                    <td class="td-w65"><?php echo $Ser > 0 ? $Ser : 'لا يوجد' ?></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.personal-details-right -->
                    </div>
                    <!-- colm6 -->
                </div>
                <!-- row -->
            </div>
            <!-- /.personal-details-area -->


            <!-- /.success -->
        </div>
        <!-- /.aboutme-section -->
        <!-- ==================== aboutme-section end ==================== -->

        <!-- ==================== my-skill-section start ==================== -->
        <div data-scroll="2" class="my-skill-section sec-p100-bg-bs mb-30 clearfix aboutme-section" id="skill">
            <div class="Section-title">

                <h2>
                    <div class="fixed-action-btn click-to-toggle active" style="bottom: 23px; right: 2px;">
                        <a class="btn-floating btn-large red">
                            <i class="material-icons">menu</i>
                        </a>
                        <ul>
                            <li><a class="btn-floating red"
                                   style="transform: scaleY(1) scaleX(1) translateY(0px) translateX(0px); opacity: 1;"><i
                                            class="material-icons">delete_sweep</i></a></li>
                            <li><a class="btn-floating yellow darken-1"
                                   style="transform: scaleY(1) scaleX(1) translateY(0px) translateX(0px); opacity: 1;"><i
                                            class="material-icons">person_add</i></a></li>
                            <li><a class="btn-floating green"
                                   style="transform: scaleY(1) scaleX(1) translateY(0px) translateX(0px); opacity: 1;"><i
                                            class="material-icons">edit</i></a></li>
                            <li><a class="btn-floating blue"
                                   style="transform: scaleY(1) scaleX(1) translateY(0px) translateX(0px); opacity: 1;"><i
                                            class="material-icons">home</i></a></li>
                        </ul>
                    </div>

                    <i class="fa fa-id-card" aria-hidden="true"></i>
                    بيانات شخصية
                </h2>
                <span>بيانات شخصية</span>
                <p>
                    يمكن تعديل البيانات الشخصيه بالكامل . بشرط امتلاك صلاحيه تعديل البيانات الشخصيه للاعضاء
                </p>
            </div>
            <!-- /.Section-title
            User_ID,$Text1
            Reg_Type,$Text2
            Sec_Type,$Text3
            Ser,$Text4
            Employee,$Text5
            Name,$Text6
            b_date,$Text8
            gender,$Text9
            b_place,$Text10
            Nationality,$Text11
            Education,$Text12
            Grade_Date,$Text13
            Job,$Text14
            Employer,$Text15
            Job_Tel,$Text16
            Home_Tel,$Text17
            Address,$Text18
            Status,$Text19
            Hire_date,$Text20
            Social_Type,$Text21
            Social_No,$Text22
            Social_Date,$Text23
            Place,$Text24
            Last_Year,$Text25
            Valid,$Text26
            Notes,$Text27
            Beach,$Beach
            Yacht,$Yacht
            Golf,$Golf
            Tennis,$Tennis
            Rowing,$Rowing
            knighthood,$knighthood
            Guest_No,$Text60
            end_date,$end_date
            ins_date,sysdate()
            ins_user,$session_user_id
            -->


            <form action="Basic_reg_main.php">
                <div id="graphicdesign">

                    <h2 class="title">بيانات اساسيه</h2>
                    <div class="row">
                        <div class="col l6 m6 s12">
                            <div class="personal-details-right">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="td-w25">الإسم</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<INPUT TYPE='TEXT' NAME='Name'  style=' height:30px;width:200px' value='$Name' maxlength='$max_length' size='$max_length' onkeyup=textCounter(this,'counter',$max_length) readonly><input type='text' class='counter'  readonly size='2' maxlength='2' id='counter' value='$max_length'>" ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25">تاريخ الميلاد</td>
                                        <td class="td-w10">:</td>

                                        <td class="td-w65"><?php echo "<INPUT type='text' class='datepicker' name='b_date' style=' height:30px;width:200px' readonly value='" . date_format($b_date, "Y-m-d") . "'>" ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25">النوع</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "
                                    <select name='gender' style=' height:30px;width:100px' value=$gender>";
                                            echo "<option value=1";
                                            if ($gender == 1) {
                                                echo " selected='yes'>";
                                            } else echo ">";
                                            echo "ذكر</option>";
                                            echo "<option value=2";
                                            if ($gender == 2) {
                                                echo " selected='yes'>";
                                            } else echo ">";
                                            echo "أنثى</option>";
                                            echo "</select>" ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25"> جهه الميلاد</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<INPUT TYPE='TEXT' NAME='b_place'  style=' height:30px;width:200px' value='$b_place' readonly>" ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25">الجنسيه</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "
                                 <select name='Nationality' style=' height:30px;width:100px' value=$Nationality  >";
                                            echo "<option value=0";
                                            if ($Nationality == 0) {
                                                echo " selected='yes'>";
                                            } else echo ">";
                                            echo "مصرى</option>";
                                            echo "<option value=1";
                                            if ($Nationality == 1) {
                                                echo " selected='yes'>";
                                            } else echo ">";
                                            echo "أخرى</option";
                                            echo "</select>"
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25">المؤهل</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<INPUT TYPE='Education' NAME='Text6' style=' height:30px;width:200px' value='$Education' readonly>" ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25">تاريخ الحصول على المؤهل</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php
                                            echo "<INPUT type='text' class='datepicker' name='Grade_Date' style=' height:30px;width:200px'  value ='" . date_format($Grade_Date1, "Y-m-d") . "'>"
                                            ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col l6 m6 s12">
                            <div class="personal-details-right">
                                <table>
                                    <tbody>


                                    <tr>
                                        <td class="td-w25">الوظيفة</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<INPUT TYPE='TEXT' NAME='Job'  style=' height:30px;width:200px' value='$Job' readonly>" ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25"> جهة العمل</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<INPUT TYPE='TEXT' NAME='Employer'  style=' height:30px;width:200px' value='$Employer' readonly>" ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25">تليفون العمل</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<INPUT TYPE='TEXT' NAME='Job_Tel  style=' height:30px;width:200px' value='" . $Job_Tel . "' readonly>"; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25">تليفون المنزل</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<INPUT TYPE='TEXT' NAME='Home_Tel' style=' height:30px;width:200px' value='$Home_Tel' readonly>" ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25">العنوان</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php
                                            echo "<INPUT TYPE='TEXT' NAME='Address' style=' height:30px;width:200px' value='$Address' readonly>";
                                            ?></td>
                                    </tr>

                                    <tr>
                                        <td class="td-w25">الحالة الإجتماعية</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php
                                            $result = mysqli_query($con, "SELECT social_id,social_name FROM social_states ");
                                            echo "<select name='Status' style=' height:30px;width:100px' value=$Status  >";

                                            while ($ress = mysqli_fetch_array($result)) {
                                                echo "<option value=" . $ress["social_id"];
                                                if ($Status == $ress["social_id"]) {
                                                    echo " selected='yes'>";
                                                } else {
                                                    echo ">";
                                                }
                                                echo $ress["social_name"];
                                                echo "</option>";
                                            }

                                            echo "</select>" ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25"> تاريخ القرار</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<INPUT type='text' class='datepicker' name='Hire_date' style=' height:30px;width:200px'  value ='" . $Hire_date1 . "'>"; ?></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col  m12 s12">
                            <div class="personal-details-right">
                                <table>
                                    <tbody>


                                    <tr>
                                        <td class="td-w25">الرقم القومى</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<INPUT TYPE='TEXT' NAME='Social_No'  style=' height:30px;width:200px' value='$Social_No' readonly>" ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25">تاريخ صدور تحقيق الشخصية</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php
                                            echo "<INPUT type='text' class='datepicker' name='Social_Date' style=' height:30px;width:200px' readonly value ='" . $Social_Date1 . "'>"
                                            ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25">جهة إصدار تحقيق الشخصية</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<INPUT TYPE='TEXT' NAME='Place'  style=' height:30px;width:200px' value='$Place' readonly>" ?></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col l6 m6 s12">
                            <div class="personal-details-right">
                                <table>
                                    <tbody>

                                    <tr>
                                        <td class="td-w25"> أخر سنة سدد عنها</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<INPUT TYPE='TEXT' NAME='Last_Year'  style=' height:30px;width:200px' value='$Last_Year' readonly>" ?></td>
                                    </tr>
                                    <tr>
                                        <td class="td-w25"> حالة العضوية</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php

                                            $result = mysqli_query($con, "SELECT Validity_id,Validity_name FROM Validity_states ");
                                            echo "<select name='Valid' style=' height:30px;width:100px' value=$Valid  >";

                                            while ($ress = mysqli_fetch_array($result)) {
                                                echo "<option value=" . $ress["Validity_id"];
                                                if ($Status == $ress["Validity_id"]) {
                                                    echo " selected='yes'>";
                                                } else {
                                                    echo ">";
                                                }
                                                echo $ress["Validity_name"];
                                                echo "</option>";
                                            }
                                            echo "</select>" ?></td>

                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col l6 m6 s12">
                            <div class="personal-details-right">
                                <table>
                                    <tbody>

                                    <tr>
                                        <td class="td-w25"> ملاحظات</td>
                                        <td class="td-w10">:</td>
                                        <td class="td-w65"><?php echo "<textarea name='Notes' aria-readonly='true' cols='40' rows='4' readonly > $Notes</textarea>" ?></td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="graphicdesign">

                    <h2 class="title">الانديه</h2>
                    <div class="row">
                        <div class="col  m12 s12">
                            <div class="personal-details-right">
                                <table>
                                    <tbody>
                                    <tr>
                                        <?php

                                        $result1 = mysqli_query($con, "SELECT Code,Name,EN_name FROM club_name ORDER BY Code");
                                        $club_count = mysqli_num_rows($result1);
                                        while ($res = mysqli_fetch_array($result1)) {
                                            $check_name = $res["EN_name"];

                                            $checked = check_zero(${$check_name}) ? 'checked' : '';
                                            echo " <td  style='width:calc(100% / $club_count)'><input type='checkbox' id='" . $res["EN_name"] . "' name='" . $res["EN_name"] . "'" . $checked . " /> <label for='" . $res["EN_name"] . "'> " . $res["Name"] . "</label></td>";
                                        }
                                        ?>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.professional-skills-area -->


        <!-- /.languages-skills -->


        <!-- /.my-skill-section -->
        <!-- ==================== my-skill-section end ==================== -->

        <!-- ==================== education-section start ==================== -->
        <div data-scroll="3" class="education-section sec-p100-bg-bs mb-30 clearfix" id="education">

            <div class="Section-title">
                <h2>
                    <i class="fa fa-female" aria-hidden="true"></i><i class="fa fa-male" aria-hidden="true"></i>
                    الزوج/ الزوجه
                </h2>
                <span>الزوج/ الزوجه</span>
                <p>
                    يمكنك تعديل واضافه وحذف بيانات الزوج/ الزوجه بشرط توافر صلاحيات ذلك لديك
                </p>
            </div>
            <!-- /.Section-title -->

            <ul class="accordion collapsible" data-collapsible="accordion" style="margin-top: 20px;">
                <?php
                $sql = "SELECT User_ID,Name,Ser,image FROM Wife_Reg where (User_ID=$user_id)&& (Reg_Type=$reg_type) && (employee=$Employee) ORDER BY User_ID";
                $result = mysqli_query($con, $sql);

                if (($result) || (mysqli_errno($con) == 0)) {
                    if (mysqli_num_rows($result) > 0) {
                        while ($rows = mysqli_fetch_array($result, MYSQLI_BOTH)) {
                            ?>

                            <li class="">
                                <div class="accordion-header acco-clr1 collapsible-header"
                                     style="padding: 0px 20px 0px 0px;direction: rtl;">
                                     <span class="icon">
							           <i class="fa fa-pencil-alt" aria-hidden="true"></i>
						              </span>
                                    <p>
                                        <?php echo $rows["Name"]; ?>
                                    </p>
                                </div>
                                <div class="accordion-body collapsible-body" style="display: none;">


                                    <div class="wife_carousel">
                                        <div class="item">

                                            <div class="testomonial-img">
                                                <img src="index-gradient_files/testomonial-img1.jpg" alt="Image">
                                            </div>
                                            <!-- /.testomonial-img -->

                                            <div class="testomonial-contant">
                                                <h2>
                                                    Collis Ta'eed <span>(CEO at ABC)</span>
                                                </h2>
                                                <p>
                                                    Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat
                                                    ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh
                                                    vulputate cursus a sit amet mauris.
                                                </p>
                                                <a href="#" class="common-color">https:example.com</a>
                                            </div>

                                            <!-- /.testomonial-contant -->
                                        </div>
                                    </div>


                                </div>
                            </li>

                            <?php
                        }

                    }
                }


                ?>
            </ul>


        </div>


        <!-- /.education-section -->
        <!-- ==================== education-section end ==================== -->

        <!-- ==================== my-portfolio-section start ==================== -->
        <div data-scroll="4" class="my-portfolio-section sec-p100-bg-bs mb-30 clearfix" id="portfolio">

            <div class="Section-title">
                <h2>
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    My Portfolio
                </h2>
                <span>My Portfolio</span>
                <p>
                    Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                    consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulpuate cursus a sit
                    amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt.
                </p>
            </div>
            <!-- /.Section-title -->

            <div class="portfolio-area">

                <div id="filters" class="button-group">
                    <button class="button waves-effect default is-checked" data-filter="*">all</button>
                    <button class="button waves-effect default" data-filter=".metal">logos</button>
                    <button class="button waves-effect default" data-filter=".transition">websites</button>
                    <button class="button waves-effect default" data-filter=".alkali, .alkaline-earth">apps</button>
                    <button class="button waves-effect default" data-filter=":not(.transition)">softwars</button>

                </div>

                <div class="grid" style="position: relative; height: 560px;">
                    <div class="element-item transition metal" data-category="transition"
                         style="position: absolute; left: 0px; top: 0px;">
                        <div class="ei-child">
                            <img src="index-gradient_files/img-1.jpg" alt="Image">
                            <a href="#" class="more">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="element-item metalloid" data-category="metalloid"
                         style="position: absolute; left: 263px; top: 0px;">
                        <div class="ei-child">
                            <img src="index-gradient_files/img-2.jpg" alt="Image">
                            <a href="#" class="more">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="element-item post-transition metal" data-category="post-transition"
                         style="position: absolute; left: 527px; top: 0px;">
                        <div class="ei-child">
                            <img src="index-gradient_files/img-3.jpg" alt="Image">
                            <a href="#" class="more">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="element-item post-transition metal" data-category="post-transition"
                         style="position: absolute; left: 0px; top: 280px;">
                        <div class="ei-child">
                            <img src="index-gradient_files/img-4.jpg" alt="Image">
                            <a href="#" class="more">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="element-item transition metal" data-category="transition"
                         style="position: absolute; left: 263px; top: 280px;">
                        <div class="ei-child">
                            <img src="index-gradient_files/img-5.jpg" alt="Image">
                            <a href="#" class="more">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                    <div class="element-item alkali metal" data-category="alkali"
                         style="position: absolute; left: 527px; top: 280px;">
                        <div class="ei-child">
                            <img src="index-gradient_files/img-6.jpg" alt="Image">
                            <a href="#" class="more">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.grid -->

                <a href="#" class="custom-btn waves-effect waves-light">
                    <i class="fa fa-refresh" aria-hidden="true"></i> load more
                </a>
            </div>
            <!-- /.portfolio-area -->

        </div>
        <!-- /.my-portfolio-section -->
        <!-- ==================== my-portfolio-section end ==================== -->

        <!-- ==================== testomonials-section start ==================== -->
        <div data-scroll="5" class="testomonials-section sec-p100-bg-bs mb-30 clearfix" id="testimonial">

            <div class="Section-title">
                <h2>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                    testomonials
                </h2>
                <span>testomonials</span>
                <p>
                    Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                    consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulpuate cursus a sit
                    amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt.
                </p>
            </div>
            <!-- /.Section-title -->
            <div class="hello_testi_slider_wrapper">
                <div id="testomonial-carousel" class="owl-carousel owl-theme owl-loaded owl-drag">

                    <div class="owl-stage-outer">
                        <div class="owl-stage"
                             style="transform: translate3d(-2465px, 0px, 0px); transition: all 0s ease 0s; width: 9040px;">
                            <div class="owl-item cloned" style="width: 791.75px; margin-right: 30px;">
                                <div class="item">
                                    <div class="testomonial-img">
                                        <img src="index-gradient_files/testomonial-img3.jpg" alt="Image">
                                    </div>
                                    <!-- /.testomonial-img -->

                                    <div class="testomonial-contant">
                                        <h2>
                                            Collis Ta'eed <span>(CEO at ABC)</span>
                                        </h2>
                                        <p>
                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris.
                                        </p>
                                        <a href="#" class="common-color">https:example.com</a>
                                    </div>
                                    <!-- /.testomonial-contant -->
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 791.75px; margin-right: 30px;">
                                <div class="item">
                                    <div class="testomonial-img">
                                        <img src="index-gradient_files/testomonial-img4.jpg" alt="Image">
                                    </div>
                                    <!-- /.testomonial-img -->

                                    <div class="testomonial-contant">
                                        <h2>
                                            Collis Ta'eed <span>(CEO at ABC)</span>
                                        </h2>
                                        <p>
                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris.
                                        </p>
                                        <a href="#" class="common-color">https:example.com</a>
                                    </div>
                                    <!-- /.testomonial-contant -->
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 791.75px; margin-right: 30px;">
                                <div class="item">
                                    <div class="testomonial-img">
                                        <img src="index-gradient_files/testomonial-img5.jpg" alt="Image">
                                    </div>
                                    <!-- /.testomonial-img -->

                                    <div class="testomonial-contant">
                                        <h2>
                                            Collis Ta'eed <span>(CEO at ABC)</span>
                                        </h2>
                                        <p>
                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris.
                                        </p>
                                        <a href="#" class="common-color">https:example.com</a>
                                    </div>
                                    <!-- /.testomonial-contant -->
                                </div>
                            </div>
                            <div class="owl-item active" style="width: 791.75px; margin-right: 30px;">
                                <div class="item">

                                    <div class="testomonial-img">
                                        <img src="index-gradient_files/testomonial-img1.jpg" alt="Image">
                                    </div>
                                    <!-- /.testomonial-img -->

                                    <div class="testomonial-contant">
                                        <h2>
                                            Collis Ta'eed <span>(CEO at ABC)</span>
                                        </h2>
                                        <p>
                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris.
                                        </p>
                                        <a href="#" class="common-color">https:example.com</a>
                                    </div>

                                    <!-- /.testomonial-contant -->
                                </div>
                            </div>
                            <div class="owl-item" style="width: 791.75px; margin-right: 30px;">
                                <div class="item">
                                    <div class="testomonial-img">
                                        <img src="index-gradient_files/testomonial-img2.jpg" alt="Image">
                                    </div>
                                    <!-- /.testomonial-img -->

                                    <div class="testomonial-contant">
                                        <h2>
                                            Collis Ta'eed <span>(CEO at ABC)</span>
                                        </h2>
                                        <p>
                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris.
                                        </p>
                                        <a href="#" class="common-color">https:example.com</a>
                                    </div>
                                    <!-- /.testomonial-contant -->
                                </div>
                            </div>
                            <div class="owl-item" style="width: 791.75px; margin-right: 30px;">
                                <div class="item">
                                    <div class="testomonial-img">
                                        <img src="index-gradient_files/testomonial-img3.jpg" alt="Image">
                                    </div>
                                    <!-- /.testomonial-img -->

                                    <div class="testomonial-contant">
                                        <h2>
                                            Collis Ta'eed <span>(CEO at ABC)</span>
                                        </h2>
                                        <p>
                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris.
                                        </p>
                                        <a href="#" class="common-color">https:example.com</a>
                                    </div>
                                    <!-- /.testomonial-contant -->
                                </div>
                            </div>
                            <div class="owl-item" style="width: 791.75px; margin-right: 30px;">
                                <div class="item">
                                    <div class="testomonial-img">
                                        <img src="index-gradient_files/testomonial-img4.jpg" alt="Image">
                                    </div>
                                    <!-- /.testomonial-img -->

                                    <div class="testomonial-contant">
                                        <h2>
                                            Collis Ta'eed <span>(CEO at ABC)</span>
                                        </h2>
                                        <p>
                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris.
                                        </p>
                                        <a href="#" class="common-color">https:example.com</a>
                                    </div>
                                    <!-- /.testomonial-contant -->
                                </div>
                            </div>
                            <div class="owl-item" style="width: 791.75px; margin-right: 30px;">
                                <div class="item">
                                    <div class="testomonial-img">
                                        <img src="index-gradient_files/testomonial-img5.jpg" alt="Image">
                                    </div>
                                    <!-- /.testomonial-img -->

                                    <div class="testomonial-contant">
                                        <h2>
                                            Collis Ta'eed <span>(CEO at ABC)</span>
                                        </h2>
                                        <p>
                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris.
                                        </p>
                                        <a href="#" class="common-color">https:example.com</a>
                                    </div>
                                    <!-- /.testomonial-contant -->
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 791.75px; margin-right: 30px;">
                                <div class="item">

                                    <div class="testomonial-img">
                                        <img src="index-gradient_files/testomonial-img1.jpg" alt="Image">
                                    </div>
                                    <!-- /.testomonial-img -->

                                    <div class="testomonial-contant">
                                        <h2>
                                            Collis Ta'eed <span>(CEO at ABC)</span>
                                        </h2>
                                        <p>
                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris.
                                        </p>
                                        <a href="#" class="common-color">https:example.com</a>
                                    </div>

                                    <!-- /.testomonial-contant -->
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 791.75px; margin-right: 30px;">
                                <div class="item">
                                    <div class="testomonial-img">
                                        <img src="index-gradient_files/testomonial-img2.jpg" alt="Image">
                                    </div>
                                    <!-- /.testomonial-img -->

                                    <div class="testomonial-contant">
                                        <h2>
                                            Collis Ta'eed <span>(CEO at ABC)</span>
                                        </h2>
                                        <p>
                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris.
                                        </p>
                                        <a href="#" class="common-color">https:example.com</a>
                                    </div>
                                    <!-- /.testomonial-contant -->
                                </div>
                            </div>
                            <div class="owl-item cloned" style="width: 791.75px; margin-right: 30px;">
                                <div class="item">
                                    <div class="testomonial-img">
                                        <img src="index-gradient_files/testomonial-img3.jpg" alt="Image">
                                    </div>
                                    <!-- /.testomonial-img -->

                                    <div class="testomonial-contant">
                                        <h2>
                                            Collis Ta'eed <span>(CEO at ABC)</span>
                                        </h2>
                                        <p>
                                            Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum,
                                            nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus
                                            a sit amet mauris.
                                        </p>
                                        <a href="#" class="common-color">https:example.com</a>
                                    </div>
                                    <!-- /.testomonial-contant -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="owl-nav">
                        <div class="owl-prev">prev</div>
                        <div class="owl-next">next</div>
                    </div>
                    <div class="owl-dots">
                        <div class="owl-dot active"><span></span></div>
                        <div class="owl-dot"><span></span></div>
                        <div class="owl-dot"><span></span></div>
                        <div class="owl-dot"><span></span></div>
                        <div class="owl-dot"><span></span></div>
                    </div>
                </div>
            </div>
            <!-- /#testomonial-carousel -->

            <ul class="brand-list ul-li">
                <li>
                    <a href="#">
                        <img src="index-gradient_files/brand1.png" alt="Brand Image">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="index-gradient_files/brand2.png" alt="Brand Image">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="index-gradient_files/brand3.png" alt="Brand Image">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="index-gradient_files/brand4.png" alt="Brand Image">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="index-gradient_files/brand5.png" alt="Brand Image">
                    </a>
                </li>
            </ul>

        </div>
        <!-- /.testomonials-section -->
        <!-- ==================== testomonials-section end ==================== -->

        <!-- ==================== experience-section start ==================== -->
        <div data-scroll="6" class="experience-section sec-p100-bg-bs mb-30 clearfix" id="exprience">

            <div class="Section-title">
                <h2>
                    <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                    Work Experience
                </h2>
                <span>Work Experience</span>
                <p>
                    Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                    consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulpuate cursus a sit
                    amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt.
                </p>
            </div>
            <!-- /.Section-title -->

            <div class="row">
                <div class="col l8 m12 s12">
                    <div class="experience-left">
                        <div class="experience-left-item-area">
                            <div class="border-left">

                                <div class="experience-item exp1">
                                    <h2 class="title">Web Designer at Microsoft Inc.</h2>
                                    <ul class="post-mate ul-li">
                                        <li class="photoshop-color">Jun 2016 - <span class="current photoshop-bg">Current</span>
                                        </li>
                                    </ul>
                                    <!-- /.post-mate -->
                                    <p>
                                        Working as Web Developer at MicroSoft. Leading the support administration and
                                        quality controlling of products submited by the global freelance authors.
                                    </p>
                                    <a href="#" class="photoshop-color">https:example.com</a>
                                </div>
                                <!-- /.experience-item -->

                                <div class="experience-item exp2">
                                    <h2 class="title">Web Designer at Microsoft Inc.</h2>
                                    <ul class="post-mate ul-li">
                                        <li class="jquery-color">Jun 2015 - july 2016</li>
                                    </ul>
                                    <!-- /.post-mate -->
                                    <p>
                                        Working as Web Developer at MicroSoft. Leading the support administration and
                                        quality controlling of products submited by the global freelance authors.
                                    </p>
                                    <a href="#" class="jquery-color">https:example.com</a>
                                </div>
                                <!-- /.experience-item -->

                                <div class="experience-item exp3">
                                    <h2 class="title">Web Designer at Microsoft Inc.</h2>
                                    <ul class="post-mate ul-li">
                                        <li class="php-color">April 2014 - November 2015</li>
                                    </ul>
                                    <!-- /.post-mate -->
                                    <p>
                                        Working as Web Developer at MicroSoft. Leading the support administration and
                                        quality controlling of products submited by the global freelance authors.
                                    </p>
                                    <a href="#" class="php-color">https:example.com</a>
                                </div>
                                <!-- /.experience-item -->

                                <div class="experience-item exp1">
                                    <h2 class="title">Web Designer at Microsoft Inc.</h2>
                                    <ul class="post-mate ul-li">
                                        <li class="photoshop-color">Jun 2016 - <span class="current photoshop-bg">Current</span>
                                        </li>
                                    </ul>
                                    <!-- /.post-mate -->
                                    <p>
                                        Working as Web Developer at MicroSoft. Leading the support administration and
                                        quality controlling of products submited by the global freelance authors.
                                    </p>
                                    <a href="#" class="photoshop-color">https:example.com</a>
                                </div>
                                <!-- /.experience-item -->

                                <div class="experience-item exp2">
                                    <h2 class="title">Web Designer at Microsoft Inc.</h2>
                                    <ul class="post-mate ul-li">
                                        <li class="jquery-color">Jun 2015 - july 2016</li>
                                    </ul>
                                    <!-- /.post-mate -->
                                    <p>
                                        Working as Web Developer at MicroSoft. Leading the support administration and
                                        quality controlling of products submited by the global freelance authors.
                                    </p>
                                    <a href="#" class="jquery-color">https:example.com</a>
                                </div>
                                <!-- /.experience-item -->

                                <div class="experience-item exp3">
                                    <h2 class="title">Web Designer at Microsoft Inc.</h2>
                                    <ul class="post-mate ul-li">
                                        <li class="php-color">April 2014 - November 2015</li>
                                    </ul>
                                    <!-- /.post-mate -->
                                    <p>
                                        Working as Web Developer at MicroSoft. Leading the support administration and
                                        quality controlling of products submited by the global freelance authors.
                                    </p>
                                    <a href="#" class="php-color">https:example.com</a>
                                </div>
                                <!-- /.experience-item -->

                            </div>
                            <!-- border-left -->
                        </div>
                        <!-- /.experience-left-item-area -->

                    </div>
                    <!-- /.experience-left -->
                </div>
                <!-- colm8 -->

                <div class="col l4 m12 s12">
                    <div class="experience-right">

                        <div class="achivement">
                            <h2 class="title">
								<span class="thumb achived-color">
									<i class="fa fa-trophy" aria-hidden="true"></i>
								</span>
                                <!-- /.thumb -->
                                03 Adward Wins
                            </h2>
                        </div>
                        <!-- /.achivement -->

                        <div class="achivement">
                            <h2 class="title">
								<span class="thumb">
									01
								</span>
                                <!-- /.thumb -->
                                Css Awwwards
                            </h2>
                            <p>
                                Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum.
                            </p>
                        </div>
                        <!-- /.achivement -->

                        <div class="achivement">
                            <h2 class="title">
								<span class="thumb">
									02
								</span>
                                <!-- /.thumb -->
                                The Web Awards
                            </h2>
                            <p>
                                Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum.
                            </p>
                        </div>
                        <!-- /.achivement -->

                        <div class="achivement">
                            <h2 class="title">
								<span class="thumb">
									03
								</span>
                                <!-- /.thumb -->
                                Logo Design
                            </h2>
                            <p>
                                Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum.
                            </p>
                        </div>
                        <!-- /.achivement -->

                    </div>
                    <!-- /.experience-right -->
                </div>
                <!-- col m4 -->
            </div>
            <!-- row -->

        </div>
        <!-- /.experience-section -->
        <!-- ==================== experience-section end ==================== -->

        <!-- ==================== latest-news-section start ==================== -->
        <div data-scroll="7" class="latest-news-section sec-p100-bg-bs mb-30 clearfix" id="blog">

            <div class="Section-title">
                <h2>
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    Latest News
                </h2>
                <span>Latest News</span>
                <p>
                    Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                    consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulpuate cursus a sit
                    amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt.
                </p>
            </div>
            <!-- /.Section-title -->

            <div class="news-item clearfix">
                <div class="news-image b4-1 left">
                    <img src="index-gradient_files/news1.jpg" alt="Image">
                </div>
                <!-- /.news-image -->
                <div class="news-contant right left-align">
                    <h2 class="title">Creative Deisng News</h2>
                    <ul class="post-mate2">
                        <li class="pm-r25">By <a href="#">akshay</a></li>
                        <li class="pm-r25">11 march 2017</li>
                        <li class="pm-r25">4 comment</li>
                    </ul>
                    <p>
                        Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                        consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit. This is Photoshop's version
                        of Lorem Ipsum. Proin gravida nibh.
                    </p>
                    <a href="#" class="custom-btn waves-effect waves-light">
                        <i class="fa fa-address-book-o" aria-hidden="true"></i> Read More
                    </a>
                </div>
                <!-- /.news-contant -->
            </div>
            <!-- /.news-item -->

            <div class="news-item clearfix">
                <div class="news-image b4-2 right">
                    <img src="index-gradient_files/news2.jpg" alt="Image">
                </div>
                <!-- /.news-image -->
                <div class="news-contant left right-align">
                    <h2 class="title">Creative Deisng News</h2>
                    <ul class="post-mate2">
                        <li class="pm-r25">By <a href="#">akshay</a></li>
                        <li class="pm-r25">11 march 2017</li>
                        <li class="pm-r25">4 comment</li>
                    </ul>
                    <p>
                        Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                        consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit. This is Photoshop's version
                        of Lorem Ipsum. Proin gravida nibh.
                    </p>
                    <a href="#" class="custom-btn waves-effect waves-light">
                        <i class="fa fa-address-book-o" aria-hidden="true"></i> Read More
                    </a>
                </div>
                <!-- /.news-contant -->
            </div>
            <!-- /.news-item -->

            <div class="news-item clearfix">
                <div class="news-image b4-1 left">
                    <img src="index-gradient_files/news3.jpg" alt="Image">
                </div>
                <!-- /.news-image -->
                <div class="news-contant right left-align">
                    <h2 class="title">Creative Deisng News</h2>
                    <ul class="post-mate2">
                        <li class="pm-r25">By <a href="#">akshay</a></li>
                        <li class="pm-r25">11 march 2017</li>
                        <li class="pm-r25">4 comment</li>
                    </ul>
                    <p>
                        Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                        consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit. This is Photoshop's version
                        of Lorem Ipsum. Proin gravida nibh.
                    </p>
                    <a href="#" class="custom-btn waves-effect waves-light">
                        <i class="fa fa-address-book-o" aria-hidden="true"></i> Read More
                    </a>
                </div>
                <!-- /.news-contant -->
            </div>
            <!-- /.news-item -->

            <ul class="pagination clearfix">
                <li class="left-arrow waves-effect left">
                    <a href="#"><i class="fa fa-long-arrow-alt-left" aria-hidden="true"></i></a>
                </li>

                <li class="waves-effect"><a href="#">01</a></li>
                <li class="active"><a href="#">02</a></li>
                <li class="waves-effect"><a href="#">03</a></li>

                <li class="right-arrow waves-effect right">
                    <a href="#"><i class="fa fa-long-arrow-alt-right" aria-hidden="true"></i></a>
                </li>
            </ul>

        </div>
        <!-- /.latest-news-section -->
        <!-- ==================== latest-news-section end ==================== -->

        <!-- ==================== contact-me-section start ==================== -->
        <div data-scroll="8" class="contact-me-section sec-p100-bg-bs mb-30 clearfix" id="contact">

            <div class="Section-title">
                <h2>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    contact me
                </h2>
                <span>contact me</span>
                <p>
                    Proin gravida nibh vel velit quet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit
                    consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulpuate cursus a sit
                    amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt.
                </p>
            </div>
            <!-- /.Section-title -->

            <div class="row">
                <div class="col l6 m12 s12">
                    <div class="contact-left">

                        <div class="cont-item phone">
                            <h2 class="title mb-30">phone</h2>
                            <div class="cont-numbers">
                                <p>
                                    <span>Mob.</span>+0 123456789
                                </p>
                                <p>
                                    <span>Landline</span>+0 123456789
                                </p>
                                <p>
                                    <span>Skype</span>webstrot
                                </p>
                            </div>
                            <!-- /.cont-numbers -->
                        </div>
                        <!-- /.cont-item -->

                        <div class="cont-item email">
                            <h2 class="title mb-30">email</h2>
                            <div class="cont-numbers">
                                <p>support@example.com</p>
                                <p>support@example.com</p>
                            </div>
                            <!-- /.cont-numbers -->
                        </div>
                        <!-- /.cont-item -->

                        <div class="cont-item address">
                            <h2 class="title mb-30">address</h2>
                            <div class="cont-numbers">
                                <p>Street 110-B Kalani Bag, Dewas, M.P. INDIA</p>
                                <p><a href="#" class="photoshop-color">https:example.com</a></p>
                            </div>
                            <!-- /.cont-numbers -->
                        </div>
                        <!-- /.cont-item -->

                    </div>
                    <!-- /.contact-left -->
                </div>
                <!-- colm6 -->

                <div class="col l6  s12">
                    <div class="contact-right clearfix">

                        <form action="#">

                            <h2 class="title mb-30">here me</h2>

                            <div class="input-field">
                                <input type="text" name="full_name" class="require">
                                <label>First Name</label>
                            </div>

                            <div class="input-field">
                                <input type="text" name="email" class="require" data-valid="email"
                                       data-error="Email should be valid.">
                                <label>Email</label>
                            </div>

                            <div class="input-field">
                                <input type="text" name="subject" class="require">
                                <label>Subject</label>
                            </div>

                            <div class="input-field">

                                <textarea rows="7" name="message" class="materialize-textarea"></textarea>
                                <label>Message</label>
                                <div class="response"></div>
                            </div>

                            <button type="button" class="submitForm custom-btn waves-effect"><i class="fa fa-envelope-o"
                                                                                                aria-hidden="true"></i>Send
                            </button>
                        </form>

                    </div>
                    <!-- /.contact-right -->
                </div>
                <!-- colm6 -->
            </div>
            <!-- row -->

        </div>
        <!-- /.contact-me-section -->
        <!-- ==================== contact-me-section end ==================== -->

        <!-- ==================== footer-section start ==================== -->
        <footer id="footer-section" class="footer-section clearfix">
            <p>© كافه الحقوق محفوظه للجنه الحاسبات والبرمجه </p>

            <div class="backtotop">
                <a href="#" class="scroll">
                    <i class="fa fa-long-arrow-alt-up" aria-hidden="true"></i>
                </a>
            </div>
            <!-- backtotop -->
        </footer>
        <!-- /.footer-section -->
        <!-- ==================== footer-section end ==================== -->
    </div>
    <!-- ========== ========== right side body end ========== ========== -->

    <!-- jquery and bootstrap.js -->


    <script src="../JS/materialize.min.js"></script>

    <script src="../JS/owl.carousel.min.js"></script>
    <script src="../JS/isotope.pkgd.min.js"></script>
    <script src="../JS/circle-progress.js"></script>

    <!-- my custom js -->
    <script src="../JS/custom.js"></script>
    <script>
        replaceDigits();
    </script>
    <div class="drag-target" data-sidenav="mobile-demo"
         style="left: 0px; touch-action: pan-y; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></div>
    <?php
}else{
    redirect("basic_reg_list.php");
}
?>

<div class="hiddendiv common"></div></body></html>