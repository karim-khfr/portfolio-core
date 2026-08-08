<?php

/**
 * Enregistrement des taxonomies du portfolio.
 *
 * @package Portfolio_Core
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Enregistre la taxonomie Type de projet.
 *
 * @return void
 */
function portfolio_core_register_project_type_taxonomy(): void
{
    $labels = array(
        'name'              => __('Types de projet', 'portfolio-core'),
        'singular_name'     => __('Type de projet', 'portfolio-core'),
        'search_items'      => __('Rechercher des types de projet', 'portfolio-core'),
        'all_items'         => __('Tous les types de projet', 'portfolio-core'),
        'parent_item'       => __('Type parent', 'portfolio-core'),
        'parent_item_colon' => __('Type parent :', 'portfolio-core'),
        'edit_item'         => __('Modifier le type de projet', 'portfolio-core'),
        'update_item'       => __('Mettre à jour le type de projet', 'portfolio-core'),
        'add_new_item'      => __('Ajouter un type de projet', 'portfolio-core'),
        'new_item_name'     => __('Nom du nouveau type de projet', 'portfolio-core'),
        'menu_name'         => __('Types de projet', 'portfolio-core'),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'publicly_queryable' => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_in_rest'      => true,
        'rewrite'           => array(
            'slug'         => 'type-de-projet',
            'with_front'   => false,
            'hierarchical' => true,
        ),
    );

    register_taxonomy(
        'project_type',
        array('project'),
        $args
    );
}
/**
 * Enregistre la taxonomie Technologies.
 *
 * @return void
 */
function portfolio_core_register_project_technology_taxonomy(): void
{
    $labels = array(
        'name'                       => __('Technologies', 'portfolio-core'),
        'singular_name'              => __('Technologie', 'portfolio-core'),
        'search_items'               => __('Rechercher des technologies', 'portfolio-core'),
        'popular_items'              => __('Technologies populaires', 'portfolio-core'),
        'all_items'                  => __('Toutes les technologies', 'portfolio-core'),
        'edit_item'                  => __('Modifier la technologie', 'portfolio-core'),
        'update_item'                => __('Mettre à jour la technologie', 'portfolio-core'),
        'add_new_item'               => __('Ajouter une technologie', 'portfolio-core'),
        'new_item_name'              => __('Nom de la nouvelle technologie', 'portfolio-core'),
        'separate_items_with_commas' => __('Séparer les technologies par des virgules', 'portfolio-core'),
        'add_or_remove_items'        => __('Ajouter ou supprimer des technologies', 'portfolio-core'),
        'choose_from_most_used'      => __('Choisir parmi les technologies les plus utilisées', 'portfolio-core'),
        'not_found'                  => __('Aucune technologie trouvée.', 'portfolio-core'),
        'menu_name'                  => __('Technologies', 'portfolio-core'),
    );

    $args = array(
        'labels'            => $labels,
        'public'            => true,
        'publicly_queryable' => true,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_in_rest'      => true,
        'rewrite'           => array(
            'slug'       => 'technologie',
            'with_front' => false,
        ),
    );

    register_taxonomy(
        'project_technology',
        array('project'),
        $args
    );
}
add_action('init', 'portfolio_core_register_project_type_taxonomy');
add_action('init', 'portfolio_core_register_project_technology_taxonomy');
