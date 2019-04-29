<?php
include_once '../function.php';
include('../QR5/lib/full/qrlib.php');

$valid = isset($_REQUEST["valid"])?$_REQUEST["valid"]:"" ;
$User_ID = isset($_REQUEST["User_ID"])?$_REQUEST["User_ID"]:"" ;
$Reg_Name = isset($_REQUEST["Reg_Name"])?$_REQUEST["Reg_Name"]:"" ;
$Pay_Year = isset($_REQUEST["Pay_Year"])?$_REQUEST["Pay_Year"]:"" ;
$Over_Num = isset($_REQUEST["Over_Num"])?$_REQUEST["Over_Num"]:"" ;
$overadd = $Over_Num ;
$employee = isset($_REQUEST["Employee"])?$_REQUEST["Employee"]:"" ;
$reg_type_code = isset($_REQUEST["Reg_Type"])?$_REQUEST["Reg_Type"]:"" ;
$Name = isset($_REQUEST["Name"])?$_REQUEST["Name"]:"" ;
$b_date = isset($_REQUEST["b_date"])?$_REQUEST["b_date"]:"" ;
$end_date = isset($_REQUEST["end_date"])?$_REQUEST["end_date"]:"" ;
$wife = isset($_REQUEST["Wife_s"])?$_REQUEST["Wife_s"]:0 ;
$secondary = isset($_REQUEST["Secondary_s"])?$_REQUEST["Secondary_s"]:0 ;
$Operation=isset($_REQUEST["Operation"])?$_REQUEST["Operation"]:"" ;
$Total_Secondary_Wife_Cards = isset($_REQUEST["Total_Secondary_Wife_Cards"])?$_REQUEST["Total_Secondary_Wife_Cards"]:0;

$image = isset($_REQUEST["image"])?$_REQUEST["image"]:"" ;
$over = $secondary + $wife;

$B_Y_G_T = isset($_REQUEST["B_Y_G_T"])?$_REQUEST["B_Y_G_T"]:"" ;
$Job = isset($_REQUEST["Job"])?$_REQUEST["Job"]:"" ;
$Guest_no = isset($_REQUEST["Guest_no"])?$_REQUEST["Guest_no"]:"" ;
$Receipt_No = isset($_REQUEST["Receipt_No"])?$_REQUEST["Receipt_No"]:"" ;
$session_user = isset($_REQUEST["session_user_id"])?$_REQUEST["session_user_id"]:"" ;

$Wife_Name =  explode(',', $_REQUEST["Wife_Name"]) ;

$Wife_Image =  explode(',', $_REQUEST["Wife_Image"]);

$Secondary_Name =explode(',', $_REQUEST["Secondary_Name"]);
$Secondary_Image =explode(',', $_REQUEST["Secondary_Image"]);
$Secondary_Date = explode(',', $_REQUEST["Secondary_Date"]);
$serials= explode(',', $_REQUEST["serials"]);
if($Operation==1){
$end_date = $Pay_Year . "/12/31" ;
}

?>

	<html>
    <head>
	<link rel="stylesheet" href="css/card.css">
        <script src=js/ajax.js type=text/javascript></script>
	<style type="text/css" media="print">
        @page port {size: portrait;}
        @page land {size: landscape;}
        .portrait {page: port;}
        .landscape {page: land;}
        .Member{color: #ff1213; text-align: center;background-color: #039cc7; display: inline-block; }
    </style>
        <script>
            function card_print_log() {
                $detail_link = "card_print_log.php";
                $param = {'User_ID': <?php echo $User_ID ?>,'Pay_Year':<?php echo $Pay_Year ?>,'employee':<?php echo $employee ?>,'reg_type_code':<?php echo $Reg_Type ?>,'Receipt_No':<?php echo $Receipt_No ?>,'session_user':<?php echo $session_user_id ?>};
                send_post($detail_link,$param,"POST",500,500);
            }

        </script>

    </head>
    <body style="margin-top:0px;margin-right:3px">
    <?php
	if($valid == 1){
    if ($reg_type_code == 1){
    ?>
    <table class="fram" border="0" class="landscape" align="right" CELLPADDING="0" cellspacing="0"
           background="../img/bkgr_sca.jpg">
        <?php }else{
        ?>
        <table class="fram" border="0" class="landscape" align="right" CELLPADDING="0" cellspacing="0"
               background="../img/bkgr.jpg">
            <?php } ?>

            <tbody align="right" valign=center>
            <TR>

                <?php
                if ($reg_type_code == 2 || $reg_type_code == 6 || $reg_type_code == 25 || $reg_type_code == 26 || $reg_type_code == 27 || $reg_type_code == 28 || $reg_type_code == 29 || $reg_type_code == 36)
                { ?>
                <td rowspan=6 valign=top><img
                            style="border-radius: 8px; position: relative; left: 8px; border: 1px solid #4262cc; "
                            SRC="<?php echo $image; ?>" width=90px height="120px "></td>
                <TD width="70%">
                    <?php
                    }elseif ($reg_type_code == 13 || $reg_type_code == 14 || $reg_type_code == 15 || $reg_type_code == 33 || $reg_type_code == 41 || $reg_type_code == 42)
                    { // «·‘—›Ì… Ê «·›Œ—Ì…
                    if ($image == "") { ?>
                <td rowspan=6 valign=top></TD>
                <TD width="80%">
                    <?php } else { ?>
                <td rowspan=6 valign=top><img
                            style=" position: relative; left: 8px; border-radius: 8px; top: 8px; border: 1px solid #4262cc;"
                            SRC="<?php echo $image; ?>" BORDER="0" width=90 height=120></td>
                <TD width=65%>
                    <?php }
                    } else { ?>
                <td rowspan=5 valign=top><img style=" position: relative; left: 8px; border-radius: 8px; top: 8px; border: 1px solid #4262cc;" SRC="<?php echo $image; ?>" BORDER="0" width=90 height=120></td>
                <TD width=70% nowrap>
                    <?php
                    }


                    if ($reg_type_code == 41 || $reg_type_code == 42 || $reg_type_code == 43) {
                        echo $Reg_Name;
                        ?>
                        <BR>
                        <?php
                        echo $B_Y_G_T;
                    } else {
                        if ($reg_type_code != 2 && $reg_type_code != 20) {
                            echo $Reg_Name;
                        } elseif ($reg_type_code == 20) {
                            if ($employee == 4) {
                                echo '⁄ﬁœ';
                            } elseif ($employee == 5) {
                                echo '„⁄«— ';
                            }
                        }
                    }
                    ?>


                </TD>
                <TD Width="10%" class="raplace">
                    <?php if ($reg_type_code == 40) {
                        echo '1/';
                    }


                    echo $User_ID; ?>
                </TD>
                <TD Width="20%" class="row26"> :&nbsp—ﬁ„ «·⁄÷ÊÌ…</TD>
            </TR>
            <?php
            if ($reg_type_code == 2 || $reg_type_code == 6 || $reg_type_code == 25 || $reg_type_code == 26 || $reg_type_code == 27 || $reg_type_code == 28 || $reg_type_code == 29 || $reg_type_code == 36) { ?>
                <TR>
                    <TD colspan="2" class="raplace">
                        <?php if ($reg_type_code == 36) {
                            $B_Y_G_T_ = $B_Y_G_T;
                        } else {
                            $B_Y_G_T_ = $Reg_Name + $B_Y_G_T;
                        }
                        echo $B_Y_G_T_; ?>

                    </TD>
                    <TD Width="30%" nowrap class="row26">:&nbsp‰Ê⁄ «·⁄÷ÊÌ…</TD>
                </TR>
            <?php }
            ?>


            <TR>
                <TD colspan="2" nowrap class="raplace">
                    <?php
                    echo $Name;
                    if ($reg_type_code == 13 || $reg_type_code == 14 || $reg_type_code == 33 || $reg_type_code == 41 || $reg_type_code == 42 || $reg_type_code == 15) {
                        if ($Guest_no > 0) { ?>
                            <BR>Ê «·√”—…
                        <?php }
                    }
                    ?>


                </TD>
                <TD Width="30%" nowrap class="row26">:&nbsp&nbsp«·≈”‹‹‹‹‹‹‹‹‹„</TD>
            </TR>
            <TD colspan=2 nowrap class="raplace">
                <?php
                if ($reg_type_code == 13 || $reg_type_code == 14 || $reg_type_code == 33 || $reg_type_code == 41 || $reg_type_code == 42 || $reg_type_code == 15 || $reg_type_code == 17)
                {
                echo $Job;
                ?>
            </TD>
                <TD width=35% nowrap class="row26">:&nbsp «·‹‹ÊŸÌ‹‹‹‹‹›…</TD>
                </TR>
            <TR>
                <TD colspan=2 class="raplace">
                    <?php
                    }

                    if ($reg_type_code == 13 || $reg_type_code == 14 || $reg_type_code == 15 || $reg_type_code == 41 || $reg_type_code == 42 || $reg_type_code == 33 || $reg_type_code == 44 || $reg_type_code == 17) {
                        null;
                    } else {
                        if($Operation == 8 || $Operation == 1 || $Operation == 2) {
                            if($Total_Secondary_Wife_Cards == 0) {
                                echo "»œÊ‰";
                            } else {
                                echo $Total_Secondary_Wife_Cards;
                                $overadd = $Total_Secondary_Wife_Cards;
                            }
                        } else {
                            if($over == 0) {

                                echo "»œÊ‰";
                            } else {
                                if($reg_type_code == 1 || $reg_type_code == 9) {
                                    if ($Operation == 8 || $Operation == 1 || $Operation == 2) {
                                        echo $Total_Secondary_Wife_Cards;
                                        $overadd = $Total_Secondary_Wife_Cards;
                                    } else {
                                        echo $Over_Num;
                                        $overadd = $Over_Num;
                                    }
                                    $overadd = $Over_Num;
                                } else {
                                    if($reg_type_code != 40) {
                                        if ($Operation == 8 || $Operation == 1 || $Operation == 2) {
                                            echo $Total_Secondary_Wife_Cards;
                                            $overadd = $Total_Secondary_Wife_Cards;
                                        } else {
                                            echo $over;
                                            $overadd = $over;
                                        }
                                        $overadd = $over;
                                    } else {
                                        echo "3";
                                        $overadd = 3;
                                    }

                                }
                            }
                        }
                    }


                    if($reg_type_code == 13 || $reg_type_code == 14 || $reg_type_code == 15 || $reg_type_code == 41 || $reg_type_code == 42 || $reg_type_code == 33 || $reg_type_code == 17){
                        $f = 0;
                    }
                    else{
                    if ($reg_type_code != 40 && $reg_type_code != 44)  { ?>
                </TD>
                <TD Width=30% nowrap class="row26">:&nbsp&nbsp⁄‹œœ «·√⁄‹»«¡</TD>
            </TR>
            <TR><TD colspan=2 class="raplace">
            <?php } elseif ($reg_type_code == 44) { ?>
            Œ„”… √›—«œ </TD>
            <TD Width=30% nowrap class="row26">&nbsp:⁄‹œœ «·„—«›ﬁÌ‰</TD>
            </TR><TR><TD colspan=2 class="raplace" style="text-align: right">
            <?php
            } elseif ($reg_type_code == 40) { ?>
            </TD>
            <TD Width=30% nowrap class="row26">&nbsp:⁄‹œœ «·„—«›ﬁÌ‰</TD>
            </TR>
            <TR>
                <TD colspan=2 class="raplace" style="text-align: right">
                    <?php }
                    }


                    $b_date = substr($b_date, 0, 4) + 60; /// „ÊŸ›Ì‰ «·ÂÌ∆…
                    if ($reg_type_code == 17){
                    echo 'œ«∆„Â'; ?>
                </TD>
                <TD width=30% nowrap class="row26"> :&nbsp&nbspÌ‰ ‹‹‹‹ÂÏ ›‹‹Ï</TD>
            </TR>
            <?php } else {
                if ($reg_type_code == 1 || $reg_type_code == 9) {
                    echo substr($end_date, 0, 4) . "/12/31"; ?>

                    </TD>
                    <TD width=30% nowrap class="row26">:&nbsp&nbspÌ‰ ‹‹‹‹ÂÏ ›‹‹Ï</TD></TR>
                <?php } else {
                    echo $Pay_Year . "/12/31"; ?>
                    </TD>
                    <TD width=30% nowrap class="row26">:&nbsp&nbspÌ‰ ‹‹‹‹ÂÏ ›‹‹Ï</TD></TR>
                <?php }

            }
            ?>

            <TR>
                <td colspan=2 class="row73"><P style="text-align:center;">—∆Ì” „Ã·” «·≈œ«—…<br/>„Â‰œ”<br/><A HREF="javascript:window.print();window.close();"><img SRC="../img/Sign.JPG" BORDER="0"  width=90></A><br/>„Õ„œ «·‘—ﬁ«ÊÏ Õ”‰</P></td>
                <td><?php echo QRcode::svg("[$User_ID ]/$reg_type_code/$employee/1/[$overadd]", false, false, QR_ECLEVEL_M, 70, 0); ?> </td>
            </TR>
            </tbody>
        </Table>
        <?php

        //////////////////////////////////////////////////wife card print

        for ($i = 0; $i < $wife; $i++){
        if($reg_type_code == 1)
        {
        ?>
        <table class="fram" border="0" class="landscape" align="right" CELLPADDING="0" cellspacing="0"  background="../img/bkgr_sca.jpg">
            <?php
            }else
            { ?>
            <table class="fram" border="0" class="landscape" align="right" CELLPADDING="0" cellspacing="0" background="../img/bkgr.jpg">
                <?php
                } ?>
                <tbody align="right">
                <TR>
                    <TD class="row26">
                        <?php
                        if ($reg_type_code != 17) {
                            ?>
                            <div class="row26 dependant"> ⁄÷Ê  «»⁄</div>
                            <?php
                        }
                        ?>

                    </TD>
                    <td colspan=2 nowrap></td>
                    <TD Width=30% height=20px nowrap>&nbsp</TD>
                </TR>
                <TR>
                    <td rowspan="5" valign=top><img SRC="<?php echo $Wife_Image[$i] ?> " BORDER="0" width=90 height=120  style="border-radius: 8px; position: relative; left: 8px; border: 1px solid #4262cc; ">
                    </td>
                    <TD width=70% nowrap>
                        <?php
                        if ($reg_type_code == 36) {
                            echo $Reg_Name;
                        } elseif ($reg_type_code == 20) {
                            if ($employee == 4) {
                                echo '⁄ﬁœ';
                            } elseif ($employee == 5) {
                                echo '„⁄«—';
                            }
                        } else {
                            echo $Reg_Name;
                        }
                        ?>

                    </TD>
                    <TD Width=10% class="raplace">
                        <?php echo $User_ID; ?>
                    </TD>
                    <TD Width=20% nowrap class="row26">:&nbsp—ﬁ„ «·⁄÷ÊÌ…</TD>
                </TR>
                <?php
                if ($reg_type_code == 2 || $reg_type_code == 6 || $reg_type_code == 25 || $reg_type_code == 26 || $reg_type_code == 27 || $reg_type_code == 28 || $reg_type_code == 29 || $reg_type_code == 36) {
                    ?>
                    <TR>
                        <TD colspan=2 nowrap class="raplace">
                            <?php echo $B_Y_G_T; ?>
                        </TD>
                        <TD Width=30% nowrap class="row26">:&nbsp‰Ê⁄ «·⁄÷ÊÌ…</TD>
                    </TR>
                    <?php
                }
                ?>
                <TR>
                    <TD colspan=2 width=60% nowrap class="raplace">
                        <?php echo $Wife_Name[$i]; ?>
                    </TD>
                    <TD Width=25% nowrap class="row26">:&nbsp&nbsp«·≈”‹‹‹‹„</TD>
                </TR>
                <TR>
                    <td colspan=2 class="raplace">
                        <?php
                        if ($reg_type_code == 17)
                        {
                        echo 'œ«∆„Â';
                        ?></TD>
                    <TD width=30% nowrap class="row26">:&nbsp&nbspÌ‰ ‹‹‹‹ÂÏ ›‹‹Ï</TD>
                </TR>

                <?php
                }
                else {
                    if ($reg_type_code == 1 || $reg_type_code == 9) {
                        echo substr($end_date,0, 4) . "/12/31"; ?>
                        </TD>
                        <TD width=30% nowrap class="row26">:&nbsp&nbspÌ‰ ‹‹‹‹ÂÏ ›‹‹Ï</TD></TR>
                    <?php } else {
                        echo $Pay_Year . "/12/31"; ?>
                        </TD>
                        <TD width=30% nowrap class="row26">:&nbsp&nbspÌ‰ ‹‹‹‹ÂÏ ›‹‹Ï</TD></TR>
                        <?php
                    }
                }

                ?>
                <TR>
                    <td colspan=2 class="row73"><P style="text-align:center;vertical-align:text-top;">—∆Ì” „Ã·” «·≈œ«—…<br/>„Â‰œ”<br/><A HREF="javascript:window.print();window.close();">
                                <img SRC="../img/Sign.JPG" BORDER="0" width=90></A><br/>„Õ„œ «·‘—ﬁ«ÊÏ Õ”‰</P>
                    </td>
                    <td> <?php echo QRcode::svg("[$User_ID]/$reg_type_code/$employee/2/[0]",false, false, QR_ECLEVEL_M, 70, 0); ?></td>
                </TR>
                </tbody>
            </Table>
            <?php
            }


            //////////////////////////////////////////////////Secondary card print

            for($i = 0; $i < $secondary; $i++){
            if ($reg_type_code == 1){ ?>
            <table class="fram" border="0" class="landscape" align="right" CELLPADDING="0" cellspacing="0"  background="../img/bkgr_sca.jpg"> <?php }
                else{
                ?>
                <table class="fram" border="0" class="landscape" align="right" CELLPADDING="0" cellspacing="0" background="../img/bkgr.jpg">
                    <?php } ?>

                    <tbody align="right">
                    <TR>
                        <TD class="row26">
                            <?php if($reg_type_code != 40 && $reg_type_code != 44) { ?>

                                <div class="row26 dependant"> ⁄÷Ê  «»⁄</div>
                            <?php } ?>
                        </TD>
                        <TD colspan=2 nowrap></TD>
                        <TD Width=30% height=20px nowrap>&nbsp</TD>
                    </TR>
                    <TR>
                        <td rowspan="5"  valign=top><img SRC="' <?php $Secondary_Image[$i]; ?> '" BORDER="0" width=90px height=120px style="border-radius: 5px;  position: relative; left: 8px; border: 1px solid #4262cc;">
                        </td>
                        <TD width=70% nowrap class="raplace">
                            <?php if ($Operation == 1) {
                                $Secondary_Date[$i] = $Pay_Year . "/12/31";
                            }
                            if ($reg_type_code == 36) {
                                echo $Reg_Name;

                            } elseif ($reg_type_code == 40) {
                                echo $Reg_Name;

                            } elseif ($reg_type_code == 20) {
                                if ($employee == 4) {
                                    echo '⁄ﬁœ';
                                } elseif ($employee == 5) {
                                    echo '„⁄«—';
                                }

                            } else {
                                echo $Reg_Name;
                            } ?>

                        </TD>
                        <TD Width=10% class="raplace">
                            <?php
                            if ($reg_type_code == 40) {
                                $j = $i + 2;
                                echo $j .'/';
                            }
                            echo $User_ID; ?>
                        </TD>
                        <TD Width=20% nowrap class="row26">:&nbsp—ﬁ„ «·⁄÷ÊÌ…</TD>
                    </TR>
                    <?php
                    if($reg_type_code == 2 || $reg_type_code == 6 || $reg_type_code == 25 || $reg_type_code == 26 || $reg_type_code == 27 || $reg_type_code == 28 || $reg_type_code == 29 || $reg_type_code == 36)
                    { ?>
                        <TR>
                            <TD colspan=2 style="text-align:right;font-size:10pt;" nowrap class="raplace">
                                <?php
                                echo $B_Y_G_T; ?>
                            </TD>
                            <TD Width=30% nowrap class="row26">:&nbsp‰Ê⁄ «·⁄÷ÊÌ…</TD>
                        </TR>
                    <?php } ?>


                    <TR>
                        <TD colspan=2 width=60% nowrap class="raplace">
                            <?php echo $Secondary_Name[$i]?>
                        </TD>
                        <TD Width=25% class="row26">:&nbsp&nbsp«·≈”‹‹‹‹‹‹‹„</TD>
                    </TR>
                    <TR>
                        <td colspan=2 class="raplace">
                            <?php
                            if ($reg_type_code != 40 && $reg_type_code != 44)  {
                            } elseif ($reg_type_code == 44) { ?>
                            Œ„”… √›—«œ
                        </TD>
                        <TD Width=30% nowrap class="row26">&nbsp:⁄‹œœ «·„—«›ﬁÌ‰</TD>
                    </TR>
                    <TR>
                        <TD colspan=2 class="raplace" style="text-align: right">
                            <?php
                            } elseif ($reg_type_code == 40) { ?>
                            3
                        </TD>
                        <TD Width=30% nowrap class="row26">&nbsp:⁄‹œœ «·„—«›ﬁÌ‰</TD>
                    </TR>
                    <TR>
                        <TD colspan=2 class="raplace" style="text-align: right">
                            <?php }

                            if ($reg_type_code == 1 || $reg_type_code == 9 || $reg_type_code == 17) { // „ÊŸ›Ì‰ «·ÂÌ∆…
                                echo $Secondary_Date[$i];
                            } else {
                                echo $Pay_Year . "/12/31";
                            } ?>
                        </TD>
                        <TD width=30% nowrap class="row26">:&nbsp&nbspÌ‰ ‹‹‹‹ÂÏ ›‹‹Ï</TD>
                    </TR>
                    <TR>
                        <td colspan=2 class="row73"><P style="text-align:center;vertical-align:text-top;">—∆Ì” „Ã·” «·≈œ«—…<br/>„Â‰œ”<br/><A HREF="javascript:window.print();window.close();"><img
                                            SRC="../img/Sign.JPG" BORDER="0" width=90></A><br/>„Õ„œ «·‘—ﬁ«ÊÏ Õ”‰</P></td>
                        <td><?php echo QRcode::svg("[$User_ID]/$reg_type_code/$employee/3/[$serials[$i]]",false,false,QR_ECLEVEL_L,70) ;?>
                        </td>
                    </TR>
                </Table>
                <?php
                }

     }
     echo "<script> window.onafterprint = function() {testPass($User_ID,$reg_type_code,$Pay_Year,$Receipt_No,$employee,$session_user);}; replaceDigits();</script>" ;

                ?>
    </body></html>
