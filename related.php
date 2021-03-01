<?php
$key = 'AIzaSyDYLmj95E0W03D2fgFk1whOl3GLwWdWgTI'; //Please don't edit it
echo '<div class="biru2" align="center">Related Videos</div>';
$grab=ngegrab('https://www.googleapis.com/youtube/v3/search?part=snippet&order=relevance&regionCode=lk&q='.$qu.'&key='.$key.'&part=snippet&maxResults=10&relatedToVideoId='.$_GET['v'].'&type=video');
$json = json_decode($grab);
if($json)
{
foreach($json->items as $hasil) 
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
echo '</td>';
echo '</tr>';
echo '</tbody>';
echo '</table>';
echo '</div>';
}
}
?>