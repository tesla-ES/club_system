<?php
include_once "function.php";

function write_menu($page){
switch($page){
	case 'Holder':
			?>
			<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR  >
            <TD VALIGN="top"  >
			<TH   align=center><A href="Holder_control.php" ><img src="../img/call-report-icon-3.png" border="0" width="40" height="26"><br clear="all">ﬂ‰ —Ê·</A></TH>
                 <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
			
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="../img/sperator.gif"><A href="Holder_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ≈÷«›… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Holder_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
				
				  <TH   align=center><A href="Holder_income.php" ><img src="../img/report.png" border="0" width="40" height="26"><br clear="all"> ﬁ«—Ì— «·Õ«›ŸÂ</A></TH>
                 <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>

				
                <TH   align=center background="../img/sperator.gif"><A href="Holder_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>
        </TD>
        </TR>
    </TABLE>
			<?
			break;
			case 'control':
			?>
			<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR  >
            <TD VALIGN="top"  >
			

				
                <TH   align=center background="../img/sperator.gif"><A href="Holder_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>
        </TD>
        </TR>
    </TABLE>
			<?
			break;
	case 'Honor':
			?>
			<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR  >


           <TD VALIGN="top"  >
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="../img/sperator.gif"><A href="Honor_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all">⁄÷Ê ÃœÌœ </A></TH>
             
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Honor_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Honor_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>
        </TD> </TR> </TABLE>
  
			<?
			break;
	case 'Basic_Reg':	
			?>
			<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR>
            <TD VALIGN="top">
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH  align=center background="../img/sperator.gif"><A href="Basic_Reg_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ⁄÷Ê ÃœÌœ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH  align=center background="../img/sperator.gif"><A href="../Secondary_Reg/Secondary_Reg_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ≈÷«›… √⁄»«¡ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
    			<TH  align=center background="../img/sperator.gif"><A href="../Wife_Reg/Wife_Reg_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ≈÷«›… “ÊÃ«  </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH  align=center background="../img/sperator.gif"><A href="../Payment/Payment_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all">≈’œ«— ≈–‰ «·”œ«œ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH> 
                <TH   align=center background="../img/sperator.gif"><A href="Basic_Reg_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Basic_Reg_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>
        </TD></TR></TABLE>
			<?
			break;
	case 'Basic_Reg_list':
			?>
		<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR  >
            <TD VALIGN="top" >
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="../img/sperator.gif"><A href="Basic_Reg_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ⁄÷Ê ÃœÌœ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Basic_Reg_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Basic_Reg_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>
        </TD>
        </TR>
    </TABLE>
	<?
          break;
    case 'Basic_Reg_View':
        ?>
        <table width=100% cellpadding=0 cellspacing=0 align=center border=0 background='../img/sperator.gif'  >
            <TR>
                <TD VALIGN='top'>
                    <img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
                <TH  align=center background='../img/sperator.gif'><A href='Basic_Reg_Add.php' ><img src='../img/nfolbtn.gif' border='0' width='26' height='26'><br clear='all'> ⁄÷Ê ÃœÌœ </A></TH>
                <TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
                <TH  align=center background='../img/sperator.gif'><A href='../Secondary_Reg/Secondary_Reg_Add.php?User_ID=<?php echo $pop0 ?>&Reg_Type=$pop1&Employee=$pop4' ><img src='../img/nfolbtn.gif' border='0' width='26' height='26'><br clear='all'> ≈÷«›… √⁄»«¡ </A></TH>
                <TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
                <TH  align=center background='../img/sperator.gif'><A href='../Wife_Reg/Wife_Reg_Add.php?User_ID=$pop0&Reg_Type=$pop1&Employee=$pop4' ><img src='../img/nfolbtn.gif' border='0' width='26' height='26'><br clear='all'> ≈÷«›… “ÊÃ«  </A></TH>

                <TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
                <TH   align=center background='../img/sperator.gif'><A href='Basic_Reg_Search.php' ><img src='../img/search.gif' border='0' width='26' height='26'><br clear='all'> »ÕÀ </A></TH>
                <TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
                <TH   align=center background='../img/sperator.gif'><A href='Basic_Reg_List.php?start=0' ><img src='../img/main.gif' border='0' width='26' height='26'><br clear='all'> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background='../img/sperator.gif'><img src='../img/sperator.gif' border='0' width='2' height='40'></TH>
                <TH   align=center background='../img/sperator.gif'><A href='../login/main.php' ><img src='../img/home.gif' border='0' width='26' height='26'><br clear='all'> «·’›Õ… «·√”«”Ì… </A></TH>

                </TD></TR></TABLE>
        <?
        break;
    case 'Secondary_Reg':
			?>
			
			<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR  >


            <TD VALIGN="top"  >
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="../img/sperator.gif"><A href="Secondary_Reg_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ≈÷«›… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Secondary_Reg_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Secondary_Reg_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>
       
        </TD></TR></TABLE>

			<?
		   break;
    case 'Payment':
			?>
			<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR>
            <TD VALIGN="top"  >
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Payment_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="pre_Payment_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>
       
        </TD>

        </TR>

    </TABLE>
			<?
		   break;

    case 'pre_Payment':
        ?>
        <table dir="rtl" width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
            <TR>
                <TD VALIGN="top"  >
                    <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Payment_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="pre_Payment_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>

                </TD>

            </TR>

        </TABLE>
        <?
        break;

	case 'Payment_search':
			?>
			<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR  >


           <TD VALIGN="top"  >
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Payment_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="pre_Payment_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../Login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>
        </TD>


        </TR>


			<?
		   break;
	case 'Wife_Reg':
			?>
			<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR  >


            <TD VALIGN="top"  >
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="../img/sperator.gif"><A href="Wife_Reg_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ≈÷«›… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Wife_Reg_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Wife_Reg_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../Login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>
       
        </TD>


        </TR>

    </TABLE>
			<?
		   break;
    case 'Reports':
			?>
			<table width=100% cellpadding=0 cellspacing=0 align=center class="menu_table" >
        <TR>
                <TH  align=center><A href="segel.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ”Ã· «·«⁄÷«¡ </A></TH>
                <TH  align=center class="separator"></TH>
				<TH  align=center><A href="hist_data.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all">”Ã· ”‰Ê«  ”«»ﬁÂ </A></TH>
                <TH  align=center class="separator"></TH>
                <TH   align=center><A href="payment_first.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> «·„œ›Ê⁄«  </A></TH>
                <TH  align=center class="separator"></TH>
				<TH   align=center><A href="secondary_reports.php" ><img src="../img/3.png" border="0" width="40" height="26"><br clear="all">«·«⁄»«¡</A></TH>
                <TH  align=center class="separator"></TH>
				<TH   align=center><A href="Holder_income.php" ><img src="../img/12.png" border="0" width="40" height="26"><br clear="all"> ﬁ«—Ì— «·Õ«›ŸÂ</A></TH>
                <TH  align=center  class="separator"></TH>
				<TH   align=center><A href="tax.php" ><img src="../img/KMM-Review-icon.png" border="0" width="26" height="26"><br clear="all">«·÷—«∆» </A></TH> 
                <TH  align=center class="separator"></TH>
                <TH   align=center><A href="regulation.php" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all">·«∆ÕÂ «·‰«œÏ «·⁄«„</A></TH>
                <TH  align=center class="separator"></TH>
                <TH   align=center><A href="../login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>
        </TR>
    </TABLE>
			<?
			break;
    case 'Wife_Reg':
        ?>
        <table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
            <TR  >


                <TD VALIGN="top"  >
                    <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH  align=center background="../img/sperator.gif"><A href="Wife_Reg_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ≈÷«›… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Wife_Reg_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Wife_Reg_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../Login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>

                </TD>


            </TR>

        </TABLE>
        <?
        break;
    case 'Registration':
        ?>
		<table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR><TD VALIGN="top"  >
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="../img/sperator.gif"><A href="Registeration_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ≈÷«›… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Registeration_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Registeration_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>
        </TD></TR></TABLE>
			<?
        break;
    case 'Reg_type':
        ?>
        <table width=100% cellpadding=0 cellspacing=0 align=center border=0 background="../img/sperator.gif"  >
        <TR>
            <TD VALIGN="top"  >
                <img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                 <TH  align=center background="../img/sperator.gif"><A href="Reg_Type_Add.php" ><img src="../img/nfolbtn.gif" border="0" width="26" height="26"><br clear="all"> ≈÷«›… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Reg_Type_Search.php" ><img src="../img/search.gif" border="0" width="26" height="26"><br clear="all"> »ÕÀ </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="Reg_Type_List.php?start=0" ><img src="../img/main.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·—∆Ì”Ì… </A></TH>
                <TH  align=center background="../img/sperator.gif"><img src="../img/sperator.gif" border="0" width="2" height="40"></TH>
                <TH   align=center background="../img/sperator.gif"><A href="../login/main.php" ><img src="../img/home.gif" border="0" width="26" height="26"><br clear="all"> «·’›Õ… «·√”«”Ì… </A></TH>

        </TD> </TR>
    </TABLE>
            <?
        break;
	}
}


?>