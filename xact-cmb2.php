<?php
/**
 * Define the metabox and fields configurations for work post type using cmb2.
*/

function cmb2_project_metaboxes() {

	/**
	 * Initiate the metabox
	 */
    
	$cmb = new_cmb2_box(
        array(
            'id'            => 'project_details',
            'title'         => __( 'Project Details', 'cmb2' ),
            'object_types'  => array('work'), // Post type
            'context'       => 'advanced', // where the fields will appear 'normal/side/advanced'
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
        )
    );

    /*
	 * add group field
    */

    $group_field_id = $cmb->add_field(
        array(
            'id'          => 'work_repeat_group',
            'type'        => 'group',
            'description' => __( 'Add Project Details ', 'cmb2' ),
            'options'     => array(
                'group_title'       => __( 'Entry Details {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'        => __( 'Add Another Entry', 'cmb2' ),
                'remove_button'     => __( 'Remove Entry', 'cmb2' ),
                'sortable'          => true,
            )
        )
    );
    /*
	 * add image field to group field
    */
    $cmb->add_group_field( $group_field_id,
        array(
            'name'           => __( 'Images', 'cmb2' ),
            'desc'           => __( 'Upload Images "optional"', 'cmb2' ),
            'id'             => 'project_images',
            'type'           => 'file_list',
            'preview_size'   => array( 200, 200 ), // Default: array( 50, 50 )
            'query_args'     => array( 'type' => 'image' ), // Only images attachment
            // Optional, override default text strings
            'text'           => array(
                'add_upload_files_text' => 'Add or Upload Images', // default: "Add or Upload Files"
                'file_text' => 'File', // default: "File:"
                'file_download_text' => 'Replacement', // default: "Download"
            ),
        )
    );
    /**
	 * add wysiwyg field to group field
	 */
    $cmb->add_group_field( $group_field_id,
        array(
            'name'    => 'Entry Description ',
            'desc'    => 'field description (optional)',
            'id'      => 'project_description',
            'type'    => 'wysiwyg',
            'options' => array(
                'wpautop' => true, // use wpautop?
                'media_buttons' => true, // show insert/upload button(s)
                // 'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
                'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
                'tabindex' => '',
                'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
                'editor_class' => '', // add extra class(es) to the editor textarea
                'teeny' => false, // output the minimal editor config used in Press This
                'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
                'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
                'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
            ),
        ),
    );
}




function cmb2_capabilities_metaboxes() {

	/**
	 * Initiate the metabox
	 */
    
	$cmb = new_cmb2_box(
        array(
            'id'            => 'capability',
            'title'         => __( 'Capability Details', 'cmb2' ),
            'object_types'  => array('capabilities'), // Post type
            'context'       => 'advanced', // where the fields will appear 'normal/side/advanced'
            'priority'      => 'high',
            'show_names'    => true, // Show field names on the left
        )
    );

    /*
	 * add group field
    */

    $group_field_id = $cmb->add_field(
        array(
            'id'          => 'capability_repeat_group',
            'type'        => 'group',
            'description' => __( 'Add capabilities Details ', 'cmb2' ),
            'options'     => array(
                'group_title'       => __( 'Entry Details {#}', 'cmb2' ), // since version 1.1.4, {#} gets replaced by row number
                'add_button'        => __( 'Add Another Entry', 'cmb2' ),
                'remove_button'     => __( 'Remove Entry', 'cmb2' ),
                'sortable'          => true,
            )
        )
    );
    /*
	 * add image field to group field
    */
    $cmb->add_group_field( $group_field_id,
        array(
            'name'           => __( 'Images', 'cmb2' ),
            'desc'           => __( 'Upload Images "optional"', 'cmb2' ),
            'id'             => 'capability_image',
            'type'           => 'file_list',
            'preview_size'   => array( 200, 200 ), // Default: array( 50, 50 )
            'query_args'     => array( 'type' => 'image' ), // Only images attachment
            // Optional, override default text strings
            'text'           => array(
                'add_upload_files_text' => 'Add or Upload Images', // default: "Add or Upload Files"
                'file_text' => 'File', // default: "File:"
                'file_download_text' => 'Replacement', // default: "Download"
            ),
        )
    );
    /**
	 * add wysiwyg field to group field
	 */
    $cmb->add_group_field( $group_field_id,
        array(
            'name'    => 'Capability Description ',
            'desc'    => 'field description (optional)',
            'id'      => 'capability_description',
            'type'    => 'wysiwyg',
            'options' => array(
                'wpautop' => true, // use wpautop?
                'media_buttons' => true, // show insert/upload button(s)
                // 'textarea_name' => $editor_id, // set the textarea name to something different, square brackets [] can be used here
                'textarea_rows' => get_option('default_post_edit_rows', 10), // rows="..."
                'tabindex' => '',
                'editor_css' => '', // intended for extra styles for both visual and HTML editors buttons, needs to include the `<style>` tags, can use "scoped".
                'editor_class' => '', // add extra class(es) to the editor textarea
                'teeny' => false, // output the minimal editor config used in Press This
                'dfw' => false, // replace the default fullscreen with DFW (needs specific css)
                'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
                'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
            ),
        ),
    );
}

add_action( 'cmb2_init', 'cmb2_project_metaboxes' );
add_action( 'cmb2_init', 'cmb2_capabilities_metaboxes' );

?>