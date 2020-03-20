<?php 

/* 
*register xact post types
*/
function xact_post_types()
{
    // our work post type
    register_post_type('work', array(
        'public' => true,
        'labels' => array(
            'name' => 'Our work',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'all_items' => 'All Work',
            'singular_name' => "Project"
        ),
        'menu_icon' => 'dashicons-category',
        'has_archive' => false,
        'rewrite' => array('slug' => 'works'),
        'supports' => array('title', 'excerpt', 'thumbnail'),
        // the post type doesn't have single page
        'publicly_queryable' => false
    ));

    // our capabilities post type
    register_post_type('capabilities', array(
        'public' => true,
        'labels' => array(
            'name' => 'Our Capabilities',
            'add_new_item' => 'Add New Capability',
            'edit_item' => 'Edit Capability',
            'all_items' => 'All Capabilities',
            'singular_name' => "Capability"
        ),
        'menu_icon' => 'dashicons-performance',
        'has_archive' => false,
        'rewrite' => array('slug' => 'works'),
        'supports' => array('title', 'editor', 'thumbnail'),
        // the post type doesn't have single page
        'publicly_queryable' => false
    ));

    // our Team post type
    register_post_type('team', array(
        'public' => true,
        'labels' => array(
            'name' => 'Team',
            'new_item' => "Add Member",
            'add_new' => "Add Member",
            'add_new_item' => 'Add Member',
            'edit_item' => 'Edit Member',
            'all_items' => 'All Members',
            'singular_name' => 'Team Member',
            'search_items' => 'There is no team members had been added',
            'featured_image' => 'Member Image',
            'set_featured_image ' => 'Set Member Image',
            'remove_featured_image  ' => 'Remover Member Image',
            'use_featured_image' => 'Use as Member Image',
            'item_updated' => 'Member Updated'
        ),
        'menu_icon' => 'dashicons-buddicons-buddypress-logo',
        'has_archive' => false,
        'rewrite' => array('slug' => 'works'),
        'supports' => array('title', 'editor', 'thumbnail'),
        // the post type doesn't have single page
        'publicly_queryable' => false
    ));
}

add_action("init", "xact_post_types");
?>