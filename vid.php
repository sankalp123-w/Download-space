<?php
include 'inc/func.php';
include 'inc/info.php';
$yf = ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$key.'&part=snippet,contentDetails,statistics,topicDetails&id='.$_GET['v'].'');
$yf=json_decode($yf);
if($yf)
{
foreach ($yf->items as $item)
{
$name   = $item->snippet->title;
{$title ='Convert '.$name.' Mp4 Format Online - '.$sitename.'';}
$tag    = $name;
$tag    = str_replace(" ",",", $tag);
$dtag   = $des;
include 'inc/head.php';
echo '<div class="title" align="center">'.$name.'</div>';
echo '<div class="item" align="center">';
echo '<iframe src="http://www.music-clips.net/small-api/'.$_GET['v'].'/mp4/" width="auto" height="auto" marginwidth="0" marginheight="0" frameborder="0" scrolling="no"></iframe>';
echo '</div>';
}
}
include 'related.php';
include 'inc/foot.php';
?>
