<?php

/**
 * Disable Application Passwords on WP Profiles
 */

add_filter('wp_is_application_passwords_available', '__return_false');
