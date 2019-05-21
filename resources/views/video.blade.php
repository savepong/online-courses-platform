<!DOCTYPE html>
<html lang="en">
<head>
  <link href="http://vjs.zencdn.net/6.6.3/video-js.css" rel="stylesheet">

  <!-- If you'd like to support IE8 -->
  <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
</head>

<body>


<?php
$today = gmdate("n/j/Y g:i:s A");
$initial_url = "http://159.65.129.12:8081/vod/BigBuckBunny_320x180.mp4";
$ip = $_SERVER['REMOTE_ADDR'];
if (!empty($_SERVER["HTTP_CF_CONNECTING_IP"])) {
    $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
} elseif (!empty($_SERVER['HTTP_X_REAL_IP'])) {
    $ip = $_SERVER['HTTP_X_REAL_IP'];
} elseif (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $commapos = strrpos($ip, ',');
    $ip = trim( substr($ip, $commapos ? $commapos + 1 : 0) );
}

$key = "Boonyu6825"; //this is also set up in WMSPanel rule
$validminutes = 20;

$str2hash = $ip . $key . $today . $validminutes;
$md5raw = md5($str2hash, true);
$base64hash = base64_encode($md5raw);
$urlsignature = "server_time=" . $today ."&hash_value=" . $base64hash. "&validminutes=$validminutes";
$base64urlsignature = base64_encode($urlsignature);

$signedurlwithvalidinterval = "$initial_url?wmsAuthSign=$base64urlsignature";
?>


  <video id="my-video" class="video-js" controls preload="auto" width="640" height="264" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
    <source src="{{ $signedurlwithvalidinterval }}" type='video/mp4'>
    <source src="MY_VIDEO.webm" type='video/webm'>
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a web browser that
      <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
    </p>
  </video>


  <video controls="controls" preload="metadata" style="width: 100%;">
   <source src="http://159.65.129.12:8081/vod/BigBuckBunny_320x180.mp4/playlist.m3u8" type="application/x-mpegurl">
   <source src="http://159.65.129.12:8081/vod/BigBuckBunny_320x180.mp4" type="video/mp4">
  </video>

  <video controls="controls" preload="metadata" style="width: 100%;">
   <source src="{{ asset('myvideo.mp4') }}" type="video/mp4">
  </video>


  <script src="http://vjs.zencdn.net/6.6.3/video.js"></script>
</body>
</html>