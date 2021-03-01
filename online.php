<div class="biru" align="left">Site Stats</div>
<?php
date_default_timezone_set('Africa/Accra');
$data = $_SERVER['DOCUMENT_ROOT'];
$data .= "/online.dat";
//print date('his A',time()-((10*60*60)+(30*60)));
$time=time()-((10*60*60)+(30*60));
$past_time=$time-300;
$readdata=@fopen($data,"r") or die("? ? ? ? $data");
$data_array=file($data);
@fclose($readdata);
if (getenv('HTTP_X_FORWARDED_FOR'))
{
$user = getenv('HTTP_X_FORWARDED_FOR');
}
else
{
$user = getenv('REMOTE_ADDR');
}
$page = getenv('REQUEST_URI');
$agent = getenv('HTTP_USER_AGENT');
$d=count($data_array);
for($i=0;$i<$d;$i++)
{
list($live_agent,$live_user,$live_page,$last_time)=explode("::","$data_array[$i]");
if($live_user!=""&&$last_time!=""&&$live_agent!=""&&$live_page!=""):
if($last_time<$past_time):
$live_user="";
$last_time="";
$live_agent="";
endif;
if($live_user!=""&&$last_time!=""&&$live_agent!="")
{
if($user==$live_user&&$agent==$live_agent)
{
$online_array[]="$agent::$user::$page::$time\r\n";
}
else
$online_array[]="$live_agent::$live_user::$live_page::$last_time";
}
endif;
}
if(isset($online_array)):
foreach($online_array as $i=>$str)
{
if($str=="$agent::$user::$page::$time\r\n")
{
$ok=$i;
break;
}
}
foreach($online_array as $j=>$str)
{
if($ok==$j) { $online_array[$ok]="$agent::$user::$page::$time\r\n"; break;}
}
endif;
$writedata=@fopen($data,"w") or die("? ? ? ? $data");
@flock($writedata,2);
if($online_array=="") $online_array[]="$agent::$user::$page::$time\r\n";
foreach($online_array as $str)
fputs($writedata,"$str");
@flock($writedata,3);
@fclose($writedata);
$readdata=@fopen($data,"r") or die("? ? ? ? $data");
$data_array=@file($data);
@fclose($readdata);
$online=count($data_array);
print "Online:&nbsp;<a href='/who.php' class='12'>" .$online."</a>";
?>
