<?php
include 'inc/func.php';
include 'inc/info.php';
if($_GET['q'])
{
$q = $_GET['q'];
$qu=$q;
} 
$title ='Download '.$q.' Youtube Videos to 3GP, MP4, FLV, WEBM and MP3 - '.$sitename.'';
include 'inc/head.php';
echo '
<div class="biru"><i class="fa fa-file-text-o"></i>  Search Results for '.$q.'</div>';
$qu=$q;
$qu=str_replace(" ","+", $qu);
$qu=str_replace("-","+", $qu);
$qu=str_replace("_","+", $qu); 
if(strlen($_GET['page']) >1)
{
$yesPage=$_GET['page'];
}
else
{
$yesPage='';
}
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?part=snippet&order=relevance&regionCode=lk&q='.$qu.'&key='.$key.'&maxResults=10&pageToken='.$yesPage.'&type=video');
$json = json_decode($grab);
$nextpage=$json->nextPageToken;
$prevpage=$json->prevPageToken;
if($json)
{
foreach ($json->items as $hasil)
{
$id          = $hasil->id->videoId;
$name        = $hasil->snippet->title;
$ud          = strtolower("$ln");
$description = $hasil->snippet->description;
$channel     = $hasil->snippet->channelTitle;
$channelid   = $hasil->snippet->channelId;
$addedon     = dateyt($hasil->snippet->publishedAt);
$hasil       = ngegrab('https://www.googleapis.com/youtube/v3/videos?key='.$key.'&part=contentDetails,statistics&id='.$id.'');
$dt          = json_decode($hasil);
foreach ($dt->items as $dta)
{
$time        = $dta->contentDetails->duration;
$duration    = format_time($time);
$views       = $dta->statistics->viewCount;
$likes       = $dta->statistics->likeCount;
$dislikes    = $dta->statistics->dislikeCount;	
}
echo '<div class="center">';
echo '<table class="otable" width="100%">';
echo '<tbody>';
echo '<tr>';
echo '<td valign="middle" width="75px" align="center">';
echo '<img src="http://ytimg.googleusercontent.com/vi/'.$id.'/mqdefault.jpg" alt="'.$name.'" class="img-responsive zoom-img" height="80" width="120">';

echo '</td>';
echo '<td>';
echo '<a href="/watch?v='.$id.'" title="Download '.$name.' Video Free">'.$name.'</a>';
echo '<br/>';
echo '<span style="color:green">By:</span> <span style="color:red">'.$channel.'</span>';
echo '<br/>';
echo '<span style="color:green">Time:</span><span style="color:red">'.$duration.'</span>';
echo '<br/>';


echo '</td>';
echo '</tr>';
echo '</tbody>';
echo '</table>';
echo '</div>';
}
echo '<div class="nav" style="text-align:center;">';
if (strlen($prevpage)>1)
{
if (strlen($qu)>1)
{
echo '<a href="/search.php?q='.$qu.'&page='.$prevpage.'" class="page" title="Previous Page">Prev</a>';
}
}
if (strlen($nextpage)>1)
{
if (strlen($qu)>1)
{
echo '<a href="/search.php?q='.$qu.'&page='.$nextpage.'" class="page" title="Next Page">Next</a>';
}
}
echo '</div>';
}
if(!empty($qu) AND empty($_GET['utm_token']))
{
$user_query = ''.$qu.'';
write_to_file($user_query);
}
include 'inc/foot.php';
?>
