<!DOCTYPE html>
<html class="antialiased" <?php language_attributes(); ?>>

<head>
  <meta charset=" UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no,date=no,address=no,email=no,url=no">
  <!-- GOOGLE -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Source+Serif+4:ital,opsz,wght@0,8..60,200..900;1,8..60,200..900&display=swap" rel="stylesheet">

  <!-- YOUTUBE -->
  <script src="https://www.youtube.com/iframe_api"></script>
  <script>
    window.ytPlayers = []

    window.onYouTubeIframeAPIReady = function () {
      // Important : attendre que les iframes soient dans le DOM
      document.querySelectorAll("iframe[src*='youtube']").forEach((iframe) => {
        if (!iframe.id) {
          iframe.id = "yt_" + Math.random().toString(36).substring(2, 9);
        }
        window.ytPlayers[iframe.id] = new YT.Player(iframe.id, {
          events: {
            'onReady': (event) => {
              console.log("Player ready:", iframe.id);
            }
          }
        });
      });
    }
  </script>
  <?php wp_head(); ?>
</head>

<?php
//  GET PAGE PROFILE TO REDIRECT IF NO LOCALSTORAGE FOUND
$logo = get_field('logo', 'options');

?>

<body class="no-transition font-system font-normal bg-white">
  <header class="py-4 md:py-6 lg:py-8">
    <div class="container flex justify-between">
      <div class="flex items-center gap-4">
        <a href="<?php echo site_url()  ?>" title="Cafe seraphin" class="w-[200px]">
          <?php echo wp_get_attachment_image($logo['ID'], 'full', "", ['class' => 'object-contain w-full h-full object-position-center']); ?>
        </a>
        <!-- MENU -->
      </div>

    </div>
  </header>
