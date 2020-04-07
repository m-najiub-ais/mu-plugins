<?php
function xact_widgets_init()
{

    // register custom categories for work
    register_taxonomy('work_categories', array('work'), array(
        'hierarchical' => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels' => array(
            'name' => 'Categories',
            'singular_name' => 'Category',
            'search_items' => 'Search Work Categories',
            'all_items' => 'All Work Categories',
            'parent_item' => 'Parent Category',
            'parent_item_colon' => 'Parent Category:',
            'edit_item' => 'Edit Category',
            'update_item' => 'Update Category',
            'add_new_item' => 'Add New Project Category',
            'new_item_name' => 'New Category Name',
            'menu_name' => 'Categories',
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'projects_categories')
    ));

    // register custom categories capabilities
    register_taxonomy('capabilities_categories', array('capabilities'), array(
        'hierarchical' => true, // Set this to 'false' for non-hierarchical taxonomy (like tags)
        'labels' => array(
            'name' => 'Categories',
            'singular_name' => 'Category',
            'search_items' => 'Search Capability Categories',
            'all_items' => 'All Capability Categories',
            'parent_item' => 'Parent Category',
            'parent_item_colon' => 'Parent Category:',
            'edit_item' => 'Edit Category',
            'update_item' => 'Update Category',
            'add_new_item' => 'Add New Capability Category',
            'new_item_name' => 'New Category Name',
            'menu_name' => 'Categories',
        ),
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'capabilities_categories')
    ));
}

add_action('widgets_init', 'xact_widgets_init');
