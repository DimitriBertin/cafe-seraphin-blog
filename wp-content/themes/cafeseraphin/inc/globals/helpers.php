<?php
function icon($name, $class = '' ) {
  echo "<svg class=\"$class fill-current\"><use xlink:href=\"#icon-$name\"></use></svg>";
}
function _icon($name, $class = '' ) {
  return "<svg class=\"$class fill-current\"><use xlink:href=\"#icon-$name\"></use></svg>";
}