<HTML>
<META content="text/html; charset=windows-1256" http-equiv=Content-Type>
	<meta http-equiv="Content-Language" content="it">
<head>
    <link rel="stylesheet" href="css/table_css.css">
</head>
	
      
      <?
$dbname="New_Club_DB";
session_start();
if(session_is_registered(myusername)){
$link =mysql_connect();
if(!$link)
{
print "can not connect to the server";
}

    if(!mysql_select_db($dbname,$link))
{
print "sorry";
$dberror=mysql_error();
return false;
}
}

mysql_query("SET CHARACTER_SET_SERVER 'CP1256'"); 
mysql_query("SET NAMES 'CP1256'");


      if($Membership_type =='all'){
          $Membership_type_name ='كل الانواع ' ;
          $sql="select   reg_type ,Name ,sum(basic_count) as basic_count ,sum(payment_count) as payment_count  from (select cunt basic_count,0 payment_count   ,basic.reg_type,reg_type.Name from ( SELECT count(*) cunt ,Reg_Type FROM basic_reg group by reg_type )basic ,reg_type where basic.reg_type=reg_type.Code union all  select 0 basic_count , cunt payment_count  ,basic.reg_type,reg_type.Name from ( SELECT count(*) cunt ,nn.Reg_Type FROM( select distinct User_ID ,employee,Reg_Type  from payment where Pay_Year =$payment_year and Operation =0 ) nn group by User_ID ,employee,Reg_Type )basic ,reg_type where basic.reg_type=reg_type.Code ) all_data group by reg_type,Name";
          ;      }else
      {
          $result = mysql_query("SELECT Code,Name FROM reg_type where Code = $Membership_type ");
          while($ress=mysql_fetch_array($result))
          {
              $Membership_type_name=$ress[Name];
          }
          $sql=" select  reg_type ,Name ,sum(basic_count) as basic_count ,sum(payment_count) as payment_count from (select cunt basic_count,0 payment_count   ,basic.reg_type,reg_type.Name from ( SELECT count(*) cunt ,Reg_Type FROM basic_reg group by reg_type )basic ,reg_type where basic.reg_type=reg_type.Code   union all  select 0 basic_count , cunt payment_count  ,basic.reg_type,reg_type.Name from ( SELECT count(*) cunt ,nn.Reg_Type FROM( select distinct User_ID ,employee,Reg_Type  from payment where Pay_Year =$payment_year and Operation =0 ) nn group by User_ID ,employee,Reg_Type )basic ,reg_type where basic.reg_type=reg_type.Code ) all_data where reg_type= $Membership_type group by reg_type,Name";

      }

    ?>
<body> 
<H4 align="right"  >هيئة قناة السويس &nbsp&nbsp&nbsp&nbsp<BR>النادى العام &nbsp&nbsp&nbsp&nbsp<BR>شئون العضويه &nbsp&nbsp&nbsp&nbsp<BR>


<div class='top_head'>
 مقارنه أعداد سجل الاعضاء بالمسددين الاشتراكات عن عام  <?=$payment_year?><BR>
    نوع العضويه : <?=$Membership_type_name ?><BR>
</div>
<hr>
 <?php

 $result = mysql_query($sql);

 $query = $result;

 if (($result)||(mysql_errno == 0))
{
  echo "<table  class='gridtable'  cols='9'  ><tr>";
 if (mysql_num_rows($result)>0)
  {
          //loop throw the field names to print the correct headers
          $i = 0;
          while ($i <= mysql_num_fields($result))
          {
            $headers[0]="م";
            $headers[1]="نوع العضويه";
            $headers[2]="مسمى نوع العضويه ";
            $headers[3]="أعداد السجل";
            $headers[4]="اعداد المسددين للاشتراك";

            echo "<th>". $headers[$i] . "</th>";
            $i++;
    }
     echo "</tr></thead><tbody>";
    //display the data
$num_rows=$start;
 
    while ($rows = mysql_fetch_array($result,MYSQL_NUM))
    {
    			if($num_rows & 1){
                      echo "<tr>";
      			}else{
                      echo "<tr>";
      			}
      			$num_rows++;
 	    $j=0;
		
		echo "<td> $num_rows </td>";
        foreach ($rows as $data)
          {
	          if($j<5){
				   $sum_val[$j]+=$rows[$j];
		           echo "<td>  $rows[$j]</td>";
	            }
	          $j++;
      }
    }


unset($data);
  }else{
    echo "<tr><td colspan='" . ($i+1) . "'>لا يوجد نتائج !</td></tr>";
  }
  echo "</tbody></table>";
  //show Next button
    include "sign.php" ;
}else{
  echo "Error in running query :". mysql_error();
}

?>
 <table BORDER=0 RULES=none frame="hsides" cellspacing="1" cellpadding="1" cols="3" width=100%>
 <TR><TH width=35%><A HREF="javascript:window.print();window.close();"><IMG SRC="../img/print.gif" BORDER="0" width=20 height=20 </A></TH ><TH width=35%></TH> <TH width=30%><font size=2pt align=right><?= date("Y/m/d")  ."  " .$myusername  ?></TH></TR>
 </Table>
 
 
 
 