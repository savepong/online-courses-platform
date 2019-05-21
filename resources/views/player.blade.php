<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$title}}</title>

    <link rel='stylesheet prefetch' href='https://vjs.zencdn.net/5-unsafe/video-js.css'>

    <style>
        /*
        Player Skin Designer for Video.js
        http://videojs.com

        To customize the player skin edit 
        the CSS below. Click "details" 
        below to add comments or questions.
        This file uses some SCSS. Learn more  
        at http://sass-lang.com/guide)

        This designer can be linked to at:
        https://codepen.io/heff/pen/EarCt/left/?editors=010
        */

        .video-js {
            /* The base font size controls the size of everything, not just text.
            All dimensions use em-based sizes so that the scale along with the font size.
            Try increasing it to 15px and see what happens. */
            font-size: 10px;
            /* The main font color changes the ICON COLORS as well as the text */
            color: #ef4033;
        }

        /* The "Big Play Button" is the play button that shows before the video plays.
        To center it set the align values to center and middle. The typical location
        of the button is the center, but there is trend towards moving it to a corner
        where it gets out of the way of valuable content in the poster image.*/

        .vjs-default-skin .vjs-big-play-button {
            /* The font size is what makes the big play button...big. 
            All width/height values use ems, which are a multiple of the font size.
            If the .video-js font-size is 10px, then 3em equals 30px.*/
            font-size: 3em;
            /* We're using SCSS vars here because the values are used in multiple places.
            Now that font size is set, the following em values will be a multiple of the
            new font size. If the font-size is 3em (30px), then setting any of
            the following values to 3em would equal 30px. 3 * font-size. */
            /* 1.5em = 45px default */
            line-height: 1.5em;
            height: 1.5em;
            width: 3em;
            /* 0.06666em = 2px default */
            border: 0.06666em solid #ef4033;
            /* 0.3em = 9px default */
            border-radius: 0.3em;
            /* Align center */
            left: 50%;
            top: 50%;
            margin-left: -1.5em;
            margin-top: -0.75em;
        }

        /* The default color of control backgrounds is mostly black but with a little
        bit of blue so it can still be seen on all-black video frames, which are common. */

        .video-js .vjs-control-bar,
        .video-js .vjs-big-play-button,
        .video-js .vjs-menu-button .vjs-menu-content {
            /* IE8 - has no alpha support */
            background-color: #000;
            /* Opacity: 1.0 = 100%, 0.0 = 0% */
            background-color: rgba(0, 0, 0, 0.7);
        }

        /* Slider - used for Volume bar and Progress bar */

        .video-js .vjs-slider {
            background-color: #545454;
            background-color: rgba(84, 84, 84, 0.5);
        }

        /* The slider bar color is used for the progress bar and the volume bar
        (the first two can be removed after a fix that's coming) */

        .video-js .vjs-volume-level,
        .video-js .vjs-play-progress,
        .video-js .vjs-slider-bar {
            background: #ef4033;
        }

        /* The main progress bar also has a bar that shows how much has been loaded. */

    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
    <video id="my_video_1" class="video-js vjs-default-skin" width="640px" height="267px"
        controls preload="none" poster='http://video-js.zencoder.com/oceans-clip.jpg'
        data-setup='{ "aspectRatio":"640:267", "playbackRates": [1, 1.5, 2] }'>
        <source src="{{url($video)}}" type="{{$mime}}" type='video/mp4' />
        <source src="https://vjs.zencdn.net/v/oceans.webm" type='video/webm' />
    </video>


    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://vjs.zencdn.net/5-unsafe/video.js'></script>


    <script>
        videojs(document.getElementById('example_video_1'), {}, function() {
            // This is functionally the same as the previous example.
        });
    </script>
</body>
</html>