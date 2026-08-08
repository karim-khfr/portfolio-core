<?php

/**
 * Plugin Name: Portfolio Core
 * Description: Gestion des projets, taxonomies et données métier du portfolio.
 * Version: 0.1.0
 * Author: Karim Khenifer
 * Text Domain: portfolio-core
 */

if (! defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/inc/post-types.php';
require_once __DIR__ . '/inc/taxonomies.php';
require_once __DIR__ . '/inc/fields.php';
