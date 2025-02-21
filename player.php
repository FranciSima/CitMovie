<?php
session_start();

// Assuming $_SESSION['movie'] stores the movie ID
$movie_id = isset($_SESSION['movie']) ? intval($_SESSION['movie']) : 0;
$movie_file = $movie_id > 0 ? "{$movie_id}.mp4" : "default.mp4";
?>

<head>
  <link href="https://vjs.zencdn.net/8.16.1/video-js.css" rel="stylesheet" />
</head>

<body>
  <video
    id="my-video"
    class="video-js"
    controls
    preload="auto"
    width="auto"
    height="auto"
    poster="MY_VIDEO_POSTER.jpg"
    data-setup="{}"
  >
    <source src="<?php echo htmlspecialchars($movie_file); ?>" type="video/mp4" />
    <p class="vjs-no-js">
      To view this video please enable JavaScript, and consider upgrading to a
      web browser that
      <a href="https://videojs.com/html5-video-support/" target="_blank"
        >supports HTML5 video</a
      >
    </p>
  </video>

  <script src="https://vjs.zencdn.net/8.16.1/video.min.js"></script>
</body>
