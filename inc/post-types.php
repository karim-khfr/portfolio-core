<?php

/**
 * Enregistrement des types de contenu personnalisés.
 *
 * @package Portfolio_Core
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Enregistre le type de contenu Projet.
 *
 * @return void
 */
function portfolio_core_register_project_post_type(): void
{
    $labels = array(
        'name'                  => __('Projets', 'portfolio-core'),
        'singular_name'         => __('Projet', 'portfolio-core'),
        'menu_name'             => __('Projets', 'portfolio-core'),
        'name_admin_bar'        => __('Projet', 'portfolio-core'),
        'add_new'               => __('Ajouter', 'portfolio-core'),
        'add_new_item'          => __('Ajouter un projet', 'portfolio-core'),
        'new_item'              => __('Nouveau projet', 'portfolio-core'),
        'edit_item'             => __('Modifier le projet', 'portfolio-core'),
        'view_item'             => __('Voir le projet', 'portfolio-core'),
        'all_items'             => __('Tous les projets', 'portfolio-core'),
        'search_items'          => __('Rechercher des projets', 'portfolio-core'),
        'not_found'             => __('Aucun projet trouvé.', 'portfolio-core'),
        'not_found_in_trash'    => __('Aucun projet trouvé dans la corbeille.', 'portfolio-core'),
        'archives'              => __('Archives des projets', 'portfolio-core'),
        'featured_image'        => __('Image du projet', 'portfolio-core'),
        'set_featured_image'    => __('Définir l’image du projet', 'portfolio-core'),
        'remove_featured_image' => __('Supprimer l’image du projet', 'portfolio-core'),
        'use_featured_image'    => __('Utiliser comme image du projet', 'portfolio-core'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'publicly_queryable'  => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'show_in_rest'        => true,
        'exclude_from_search' => false,
        'has_archive'         => 'portfolio',
        'hierarchical'        => false,
        'menu_position'       => 20,
        'menu_icon'           => 'dashicons-portfolio',
        'rewrite'             => array(
            'slug'       => 'portfolio',
            'with_front' => false,
        ),
        'taxonomies' => array(
            'project_type',
        ),
        'supports'            => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
        ),
    );

    register_post_type('project', $args);
}
add_action('init', 'portfolio_core_register_project_post_type');
