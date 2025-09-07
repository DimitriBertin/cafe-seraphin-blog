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
  <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100..900;1,100..900&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,100,0,0&display=swap" rel="stylesheet">
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
