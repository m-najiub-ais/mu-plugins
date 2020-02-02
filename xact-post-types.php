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
        'has_archive' => true,
        'rewrite' => array('slug' => 'works'),
        'supports' => array('title', 'excerpt', 'thumbnail'),
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
        'has_archive' => true,
        'rewrite' => array('slug' => 'works'),
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}

add_action("init", "xact_post_types");
?>