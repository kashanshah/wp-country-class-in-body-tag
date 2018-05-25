<?php 
/*
Plugin Name: Include Content By Shortcode
Plugin URI: http://kashanshah.ga
Description: This plugin allows the user to add single content in multiple posts and pages by means of a shortcode. It is used to fulfill the concept of PHP's 'include' function.
Author: Kashan Shah
Version: 0.0.9
Author URI: http://www.kashanshah.ga
*/

function icbscbks_admin() {
    include('admin_view.php');
}
function icbscbks_admin_actions() {
    global $icbscbks_settings_page;

      $icbscbks_settings_page = add_submenu_page('edit.php?post_type=icbscbks', 'Settings', 'Settings', 'manage_options', 'include-content-by-shortcode', 'icbscbks_admin'); 
}
add_action('admin_menu', 'icbscbks_admin_actions');


// Our custom post type function
function icbscbks_create_posttype() {
 
    register_post_type( 'icbscbks',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Included Contents' ),
                'singular_name' => __( 'Included Content' ),
				'add_new' => _x('Add New', 'Included Content'),
				'add_new_item' => __('Add New Included Content'),
				'edit_item' => __('Edit Included Content'),
				'new_item' => __('New Included Content'),
				'view_item' => __('View Included Content'),
				'search_items' => __('Search Included Content'),
				'not_found' =>  __('Nothing found'),
				'not_found_in_trash' => __('Nothing found in Trash'), 
				'parent_item_colon' => '',
            ),
            'public' => true,
			'menu_icon' => 'dashicons-format-aside',
            'has_archive' => true,
            'rewrite' => array('slug' => 'icbscbks'),
			'supports' => array('title','editor','revisions', 'author')
        )
    );
}
add_action( 'init', 'icbscbks_create_posttype' );

// Add the custom columns to the icbscbks post type:
add_filter( 'manage_icbscbks_posts_columns', 'icbscbks_set_custom_edit_icbscbks_columns' );
function icbscbks_set_custom_edit_icbscbks_columns($columns) {
    $columns['Shortcode'] = 'Shortcode';
    return $columns;
}

// Add the data to the custom columns for the icbscbks post type:
add_action( 'manage_icbscbks_posts_custom_column' , 'icbscbks_custom_icbscbks_column', 10, 2 );
function icbscbks_custom_icbscbks_column( $column, $post_id ) {
    switch ( $column ) {

        case 'Shortcode' :
                echo '<span class="icbscbks_shortcode"><input style="background: inherit;color: inherit;font-size: 16px;width:100%;padding: 4px 8px;margin: 0;" type="text" value="[includedcontentbyshortcode id='.$post_id.']" readonly onfocus="this.select();" /></span>';
            break;

    }
}

function icbscbks_func( $atts ) {
    $icbscbks_scAttr = shortcode_atts( array(
        'slug' => 'something',
        'id' => '',
    ), $atts );
    
    // [icbscbks id=123]
    if($icbscbks_scAttr['id'] != ""){
        $icbscbks_post = get_post($icbscbks_scAttr['id']);
        $icbscbks_postcontent = $icbscbks_post->post_content;
        $icbscbks_postcontent = apply_filters('the_content', $icbscbks_postcontent);
    }
    // [icbscbks slug=included-content-one]
    else if($icbscbks_scAttr['slug'] != ""){
        $icbscbks_post = get_page_by_path( $icbscbks_scAttr['slug'], OBJECT, 'icbscbks' );
        $icbscbks_postcontent = $icbscbks_post->post_content;
        $icbscbks_postcontent = apply_filters('the_content', $icbscbks_postcontent);
    }
    else if($icbscbks_scAttr['slug'] != ""){
        $icbscbks_postcontent = '';
    }

    return $icbscbks_postcontent;
}
add_shortcode( 'includedcontentbyshortcode', 'icbscbks_func' );
