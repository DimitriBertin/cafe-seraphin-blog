<?php

function ACF_color_palette($excludes = []) {
  global $colorSystem;

  $colors = [];
  if (isset($colorSystem) && is_array($colorSystem)) {

    foreach ($colorSystem as $key => $value) {
      // HELLOOOO ------
      if (in_array($key, $excludes, true)) {
        continue; // On saute cette couleur
      }
      
      $color = digColorValue($value['layout']['background']);
      $colors[$color] = $key;
    }
  }
  // whatThemeIsThisColor
  return $colors;
}

?>