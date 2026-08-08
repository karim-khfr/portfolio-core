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

/**
 * Actions exécutées à l’activation du plugin.
 *
 * @return void
 */
function portfolio_core_activate(): void
{
    portfolio_core_register_project_post_type();
    portfolio_core_register_project_type_taxonomy();
    portfolio_core_register_project_technology_taxonomy();

    flush_rewrite_rules();
}

/**
 * Actions exécutées à la désactivation du plugin.
 *
 * @return void
 */
function portfolio_core_deactivate(): void
{
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'portfolio_core_activate');
register_deactivation_hook(__FILE__, 'portfolio_core_deactivate');
