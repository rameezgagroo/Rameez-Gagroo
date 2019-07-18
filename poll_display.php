<?Php


session_start();
$s_id=session_id();
require "config.php";

$count=$dbo->prepare("select s_id from plus_poll_ans where s_id='$s_id'");
$count->execute();
$no=$count->rowCount();
if($no <=0 ){
echo "<a href=view_poll_result.php>View the poll result</a>";
}

$qst_id=1;
$count=$dbo->prepare("select * from plus_poll where qst_id=:qst_id");
$count->bindParam(":qst_id",$qst_id,PDO::PARAM_INT,1);
if($count->execute()){
$query = $count->fetch(PDO::FETCH_OBJ);
}
echo "
<center> 
<form method=post action=poll_displayck.php>
<input type=hidden name=qst_id value=$qst_id>
<table border='1' cellspacing='2'  bordercolor='blue' width='500' id='AutoNumber1'>
  <tr>
    <td width='100%' bgcolor='green'><font face='Copperplate Gothic Bold' size='5' >$query->qst</font></td>
  </tr>
  <tr>
    <td width='100%' >
    <table border='0' cellspacing='0'  bordercolor='#111111' width='100%'  cellpadding='0'>
      <tr bgcolor='#f1f1f1'>
        <td width='10%'><input type='radio' value='$query->opt1'  name='opt'></td>
        <td width='90%'><font face='Forte' size='3' >$query->opt1</font></td>
      </tr>
      <tr>
        <td width='10%'><input type='radio' value='$query->opt2'  name='opt'></td>
        <td width='90%'><font face='Forte' size='3' >$query->opt2</font></td>
      </tr>
      <tr bgcolor='#f1f1f1'>
        <td width='10%'><input type='radio' value='$query->opt3'  name='opt'></td>
        <td width='90%'><font face='Forte' size='3' >$query->opt3</font></td>
      </tr>
      <tr>
        <td width='10%'><input type='radio' value='$query->opt4'  name='opt'></td>
        <td width='90%'><font face='Forte' size='3' >$query->opt4</font></td>
      </tr>
    </table>
    </td>
  </tr>
<tr>
    <td width='100%' bgcolor='green' align=center>
<font face='Forte' size='4' > <input type=submit value=SUBMIT> </form> </td></font>
  </tr>

</table>
</center> 
";
?>
<center> 
<a href=poll_display.php><font face='Matura MT Script Capitals' size='6' color='yellow'> Display Poll </a></font> 
&nbsp;&nbsp;|&nbsp;&nbsp;
<a href=view_poll_result.php><font face='Matura MT Script Capitals' size='6' color='pink'> View Result </a></font>
<br><br></center>















