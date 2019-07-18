<?Php
require "config.php";
echo "<font size='4' face='Forte' color='blue'> Program Written By <b>Rameez Ahmad Gagroo</b></font>";
$qst_id=1; 
$count=$dbo->prepare("select qst from plus_poll where qst_id=:qst_id");
$count->bindParam(":qst_id",$qst_id,PDO::PARAM_INT,3);

if($count->execute()){
$row = $count->fetch(PDO::FETCH_OBJ);
}else{
echo "Database Problem";
}
echo "<br><b><br>$row->qst</b><br>";

$count=$dbo->prepare("select ans_id from plus_poll_ans where qst_id=:qst_id");
$count->bindParam(":qst_id",$qst_id,PDO::PARAM_INT,3);
$count->execute();
$rt=$count->rowCount();
echo "<b> No of records</b> = ".$rt; 

$sql="select count(*) as no,qst,plus_poll_ans.opt from plus_poll,plus_poll_ans where plus_poll.qst_id=plus_poll_ans.qst_id and plus_poll.qst_id='$qst_id' group by opt";

echo "<table cellpadding='0' cellspacing='0' border='0' >";
 
foreach ($dbo->query($sql) as $noticia) {
echo "<tr>
    <td width='40%' bgcolor='#F1F1F1'>&nbsp;<font size='1' face='Verdana' color='#000000'>$noticia[opt]</font></td>";
$width2=$noticia['no'] *10 ; 
$ct=($noticia[no]/$rt)*100;
$ct=sprintf ("%01.2f", $ct);  

echo "    <td width='10%' bgcolor='#F1F1F1'>&nbsp;<font size='1' face='Verdana' color='#000000'>($ct %)</font></td>
          <td width='50%' bgcolor='#F1F1F1'>&nbsp;<img src='graph.jpg' height=10 width=$width2></td>
    </tr>";
 echo "<tr>
           <td  bgcolor='#ffffff' colspan=2></td>
	   </tr>";
}
echo "</table>";
echo "</font>";
?>
<center> 
<a href=poll_display.php><font face='Matura MT Script Capitals' size='6' color='yellow'> Display Poll </a></font> 
&nbsp;&nbsp;|&nbsp;&nbsp;
<a href=view_poll_result.php><font face='Matura MT Script Capitals' size='6' color='pink'> View Result </a></font>
<br><br></center>
