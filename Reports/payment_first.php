<?php
    $page_name=basename(__FILE__);
    include_once '../page_validation.php';
?>
<HTML dir=rtl>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">

  <head>
    <link rel="stylesheet" href="css/table_css.css">
  </head>
    <?php
    r_header($page_name,$con);
    include_once '../menu.php';
    write_menu('Reports')
    ?>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" bgcolor="#F2F2F2">

<BR>

<table>
<thead>
</thead>
<tbody>


<TR  align="middle">
<TD align="right"><a href="payment.php">
    تقارير المدفوعات تفصيلى
    </a></TD>
</TR>

<TR  align="middle">
    <TD align="right">
        <a href="all_payment.php">
تقارير المدفوعات إجمالى
        </a>
    </TD>
</TR>

<TD align="right"><a href="latancy.php">تقرير متأخرات </a></TD>
</TR>	

</tbody>

</table>

</BODY>

</HTML>
