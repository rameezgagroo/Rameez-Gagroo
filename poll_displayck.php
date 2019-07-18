<?php


session_start();
$s_id=session_id();
require "config.php";
$opt=$_POST['opt'];
$qst_id=$_POST['qst_id'];
if(!isset($opt)){echo "<font face='Verdana' size='4' color='red'>Please select one option and then submit</font>";}
else{
$sql=$dbo->prepare("insert into plus_poll_ans(s_id,qst_id,opt)  values(:s_id,:qst_id,:opt)");
$sql->bindParam(':s_id',$s_id,PDO::PARAM_STR, 100);
$sql->bindParam(':qst_id',$qst_id,PDO::PARAM_INT, 1);
$sql->bindParam(':opt',$opt,PDO::PARAM_STR,2);
if($sql->execute()){
 echo "<font face='Matura MT Script Capitals' size='6' color='blue' >Thanks for your views; </a></font>";
 }
else{
echo " <font face='Matura MT Script Capitals' size='6' color='blue'> Not able to add data please contact ADMIN </font>";
}
}
?>
<center> 
<a href=poll_display.php><font face='Matura MT Script Capitals' size='6' color='yellow'> Display Poll </a></font> 
&nbsp;&nbsp;|&nbsp;&nbsp;
<a href=view_poll_result.php><font face='Matura MT Script Capitals' size='6' color='pink'> View Result </a></font>
<br><br></center>
