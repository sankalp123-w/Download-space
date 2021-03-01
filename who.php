<?php
include 'inc/info.php';
$title = 'Online Users - '.$sitename.'';
include 'inc/head.php';
echo '<div class="biru" align="center">Online Users Counter</div>';
$data = file('online.dat');
foreach($data as $val)
{
$ex = explode('::', $val);
$ex2 = explode(' ', $ex[0]);
$punk = explode('.', $ex[1]);
$hiddenip = ''.$punk[0].'.'.$punk[1].'.'.$punk[2].'.'.$punk[3].'';
$page = str_replace('%20',' ',$ex[2]);
$i++;
echo "<div class='tag'><b>$i. </b>$ex2[0]<br/><b>IP:</b> $hiddenip<br/><b>Current Page:</b> <a href=\"$ex[2]\">http://$host$page</a><br/><b>Time:</b> ".date('h:i A', (int)(trim($ex[3])))."</div>";
}
include 'inc/foot.php';
?>