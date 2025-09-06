const path = require("path");

/**
 * TailwindCSS configuration
 */
module.exports = {
  corePlugins: {
    container: false,
    preflight: false,
  },
  content: [
    path.resolve(__dirname, "./wp-content/themes/atelierdesign/*.{html,php}"),
    path.resolve(__dirname, "./wp-content/themes/atelierdesign/template/*.{html,php}"),
    path.resolve(__dirname, "./wp-content/themes/atelierdesign/blocks/*.{html,php}"),
    path.resolve(__dirname, "./wp-content/themes/atelierdesign/blocks/**/*.{html,php}"),
    path.resolve(__dirname, "./api/*.{html,php,js}"),
    path.resolve(__dirname, "./wp-content/themes/atelierdesign/template/*.{html,php,js}"),
    path.resolve(__dirname, "./src/globals/scripts/*.js"),
    path.resolve(__dirname, "./src/components/**/*.{html,php,js}"),
    path.resolve(__dirname, "./wp-content/themes/atelierdesign/inc/ajax.php"),
  ],
  safelist: [
    {
      pattern:
        /.*(layout|theme|paragraph|subtitle|heading|key\-numbers|icon|media|list|label|button|accordeon|group|quote|separator|form|media)((-\w+)?)+.*/,
    },
  ],
};