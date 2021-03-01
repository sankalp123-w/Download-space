<?php
include 'inc/func.php';
include 'inc/info.php';
$yf=ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$key.'&part=snippet,contentDetails,statistics,topicDetails&id='.$_GET['v'].'&vid='.$_GET['v'].'');
$yf=json_decode($yf);
if($yf)
{
foreach ($yf->items as $item)
{
$name          = $item->snippet->title;
$des           = $item->snippet->description;
$date          = dateyt($item->snippet->publishedAt);
$channelid     = $item->snippet->channelId;
$channel       = $item->snippet->channelTitle;
$ctd           = $item->contentDetails;
$duration      = format_time($ctd->duration);
$hd            = $ctd->definition;
$st            = $item->statistics;
$views         = $st->viewCount;
$likes         = $st->likeCount;
$dislikes      = $st->dislikeCount;
$favoriteCount = $st->favoriteCount;
$commentCount  = $st->commentCount;

$download = file_get_contents('http://api3.video55.in/getvideo.php?videoid='.$_GET['v'].'');
{
$title='Download '.$name.' - '.$sitename.'';
}
require_once "inc/head.php";
$tag           = $name;
$tag           = str_replace(" ",",", $tag);
$dtag          = $des;


echo '<div class="biru2" align="center">'.$name.'</div>';
echo '<div class="item" align="center">';
echo '<iframe width="350" height="200" src="//www.youtube.com/embed/'.$_GET['v'].'" frameborder="0" allowfullscreen></iframe>';



echo '<br/>';
echo '<table style="width:100%"><tbody><tr valign="top"> <td width="33%"> <img src="http://ytimg.googleusercontent.com/vi/'.$_GET['v'].'/1.jpg" alt="Akon - Hurt Somebody (Explicit) ft. French Montana" class="thumbs-up"></td><td width="34%"><img src="http://ytimg.googleusercontent.com/vi/'.$_GET['v'].'/2.jpg" alt="Akon - Hurt Somebody (Explicit) ft. French Montana" class="thumbs-up"></td> 
<td width="33%"><img src="http://ytimg.googleusercontent.com/vi/'.$_GET['v'].'/3.jpg" alt="Akon - Hurt Somebody (Explicit) ft. French Montana" class="thumbs-up"></td> 
</tr> 
</tbody></table>';
echo '</div>';
echo '<div class="biru2" align="center">Video Description</div>';
echo '<div class="menu">';
echo '<table style="width:100%">';
echo '<tbody>';
echo '<tr valign="top">';
echo '<td width="30%"> Title</td>';
echo '<td> :</td>';
echo '<td>'.$name.'</td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%"> Duration</td>';
echo '<td> : </td>';
echo '<td> '.$duration.' </td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%"> Uploader</td>';
echo '<td> : </td>';
echo '<td><a href="/channel.php?id='.$channelid.'" title="Browse '.$channel.' Channel All Videos"> '.$channel.'</a></td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%"> Added On:</td>';
echo '<td> : </td>';
echo '<td>'.$date.'</td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%"> Views</td>';
echo '<td> : </td>';
echo '<td>';
echo ''.$views.'';
echo '</td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%"> Likes</td>';
echo '<td> : </td>';
echo '<td>';
echo ''.$likes.'';
echo '</td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%"> Dislikes:</td>';
echo '<td> : </td>';
echo '<td>';
echo ''.$dislikes.'';
echo '</td>';
echo '</tr>';
echo '<tr valign="top">';
echo '<td width="30%"> Source</td>';
echo '<td> : </td>';
echo '<td><a href="http://youtube.com/watch?v='.$_GET['v'].'" target="_blank" title="Source '.$name.' On YouTube">www.YouTube.com</a>';
echo '</td>';
echo '</tr>';
echo '</tbody>';
echo '</table>';
echo '</div>';
echo '<div class="biru2" align="center">Share This On</div>';
echo '<div class="item" align="center">';
echo '<a href="https://www.facebook.com/share.php?u=http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" target="_blank" title="Share On Facebook"><i class="fa fa-facebook fb-lite fb-fixed"></i></a> <a href="http://twitter.com/share?via='.$sitename.'&text=Download '.$name.'" target="_blank" title="Share On Twitter"><i class="fa fa-twitter tw-lite tw-fixed"></i></a> <a href="https://plus.google.com/share?url=http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" target="_blank" title="Share On Google+"><i class="fa fa-google-plus gp-lite gp-fixed"></i></a> <a href="whatsapp://send?text=Free Download '.$name.' With '.$sitename.' http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'" target="_blank" title="Share With Whats App"><i class="fa fa-whatsapp wa-lite"></i></a>';


echo '<div class="biru2" align="center">Download Video </div>';
echo $download;
echo '<div class="biru2" align="center">Download Audio</div>';
echo '<div class="menu">';
echo '<i class="fa fa-music"></i> <a href="http://mp3.video55.in/getmp3.php?mp3id='.$_GET['v'].'" title="Convert To Mp3(HQ Quality)">Convert To Mp3</a> <span style="color:#000000">(HQ Quality)</span>';
echo '</div>';



}
}
include 'related.php';
include 'inc/foot.php';
?>
