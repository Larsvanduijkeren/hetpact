<?php

function project_year()
{
    $labels = [
        'name'              => _x('Years', 'taxonomy general name'),
        'singular_name'     => _x('Year', 'taxonomy singular name'),
        'search_items'      => __('Search Years'),
        'all_items'         => __('All Years'),
        'parent_item'       => __('Parent Year'),
        'parent_item_colon' => __('Parent Year:'),
        'edit_item'         => __('Edit Year'),
        'update_item'       => __('Update Year'),
        'add_new_item'      => __('Add New Year'),
        'new_item_name'     => __('New Country Name'),
        'menu_name'         => __('Years'),
    ];

    register_taxonomy('project_year', ['project'], [
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
        'public'            => true,
    ]);
}

// Add action hook to register taxonomy
add_action('init', 'project_year');
