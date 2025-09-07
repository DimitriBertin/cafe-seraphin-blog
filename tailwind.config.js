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
    path.resolve(__dirname, "./wp-content/themes/cafeseraphin/*.{html,php}"),
    path.resolve(__dirname, "./wp-content/themes/cafeseraphin/template/*.{html,php}"),
    path.resolve(__dirname, "./wp-content/themes/cafeseraphin/blocks/*.{html,php}"),
    path.resolve(__dirname, "./wp-content/themes/cafeseraphin/blocks/**/*.{html,php}"),
    path.resolve(__dirname, "./api/*.{html,php,js}"),
    path.resolve(__dirname, "./wp-content/themes/cafeseraphin/template/*.{html,php,js}"),
    path.resolve(__dirname, "./src/globals/scripts/*.js"),
    path.resolve(__dirname, "./src/components/**/*.{html,php,js}"),
    path.resolve(__dirname, "./wp-content/themes/cafeseraphin/inc/ajax.php"),
  ],
  safelist: [
    {
      pattern:
        /.*(layout|theme|paragraph|subtitle|heading|key\-numbers|icon|media|list|label|button|accordeon|group|quote|separator|form|media)((-\w+)?)+.*/,
    },
  ],
};