<?php

/**
 * Enregistrement des champs personnalisés du portfolio.
 *
 * @package Portfolio_Core
 */

if (! defined('ABSPATH')) {
    exit;
}

/**
 * Enregistre les champs SCF du CPT Projet.
 *
 * @return void
 */
function portfolio_core_register_project_fields(): void
{
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(
        array(
            'key'   => 'group_portfolio_core_project',
            'title' => __('Informations du projet', 'portfolio-core'),
            'fields' => array(
                array(
                    'key'      => 'field_portfolio_core_project_year',
                    'label'    => __('Année', 'portfolio-core'),
                    'name'     => 'project_year',
                    'type'     => 'number',
                    'required' => 0,
                    'min'      => 1900,
                    'max'      => 2100,
                    'step'     => 1,
                ),
                array(
                    'key'      => 'field_portfolio_core_project_status',
                    'label'    => __('Statut', 'portfolio-core'),
                    'name'     => 'project_status',
                    'type'     => 'select',
                    'required' => 0,
                    'choices'  => array(
                        'ongoing'   => __('En cours', 'portfolio-core'),
                        'completed' => __('Terminé', 'portfolio-core'),
                        'archived'  => __('Archivé', 'portfolio-core'),
                    ),
                    'allow_null' => 1,
                    'multiple'   => 0,
                    'ui'         => 1,
                ),
                array(
                    'key'      => 'field_portfolio_core_project_role',
                    'label'    => __('Rôle', 'portfolio-core'),
                    'name'     => 'project_role',
                    'type'     => 'text',
                    'required' => 0,
                ),
                array(
                    'key'      => 'field_portfolio_core_project_client',
                    'label'    => __('Client / organisation', 'portfolio-core'),
                    'name'     => 'project_client',
                    'type'     => 'text',
                    'required' => 0,
                ),
                array(
                    'key'          => 'field_portfolio_core_project_url',
                    'label'        => __('URL du projet', 'portfolio-core'),
                    'name'         => 'project_url',
                    'type'         => 'url',
                    'required'     => 0,
                    'instructions' => __('Lien vers le projet ou une démonstration publique, si disponible.', 'portfolio-core'),
                ),
                array(
                    'key'          => 'field_portfolio_core_project_repository_url',
                    'label'        => __('URL du dépôt', 'portfolio-core'),
                    'name'         => 'project_repository_url',
                    'type'         => 'url',
                    'required'     => 0,
                    'instructions' => __('Lien vers un dépôt de code, si le projet en possède un.', 'portfolio-core'),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'project',
                    ),
                ),
            ),
            'position' => 'normal',
            'style'    => 'default',
            'active'   => true,
        )
    );
}
/**
 * Enregistre les métadonnées Projet pour l'API REST et les Block Bindings.
 *
 * @return void
 */
function portfolio_core_register_project_meta(): void
{
    $meta_fields = array(
        'project_year',
        'project_status',
        'project_role',
        'project_client',
        'project_url',
        'project_repository_url',
    );

    foreach ($meta_fields as $meta_key) {
        register_post_meta(
            'project',
            $meta_key,
            array(
                'type'         => 'string',
                'single'       => true,
                'show_in_rest' => true,
            )
        );
    }
}
/**
 * Traduit les valeurs techniques du statut d'un projet
 * lors de leur affichage via les Block Bindings.
 *
 * @param mixed  $value       Valeur du binding.
 * @param string $source_name Source du binding.
 * @param array  $source_args Arguments du binding.
 * @return mixed
 */
function portfolio_core_format_project_status_binding(
    mixed $value,
    string $source_name,
    array $source_args
): mixed {
    if (
        'core/post-meta' !== $source_name
        || 'project_status' !== ($source_args['key'] ?? '')
    ) {
        return $value;
    }

    $statuses = array(
        'ongoing'   => __('En cours', 'portfolio-core'),
        'completed' => __('Terminé', 'portfolio-core'),
        'archived'  => __('Archivé', 'portfolio-core'),
    );

    return $statuses[$value] ?? $value;
}

add_filter(
    'block_bindings_source_value',
    'portfolio_core_format_project_status_binding',
    10,
    3
);
add_action('init', 'portfolio_core_register_project_meta');
add_action('acf/init', 'portfolio_core_register_project_fields');
