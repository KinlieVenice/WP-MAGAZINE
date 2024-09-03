<?php function fyrre_custom_post()
{
    $magazines_label = array(
        'name'     => __('Magazines', 'textdomain'),
        'singular_name' => __('Magazines', 'textdomain'),
        'add_new'    => __('Add Magazine', 'textdomain'),
        'edit_item'   => __('Edit Magazine', 'textdomain'),
        'add_new_item' => __('Add New Magazine', 'textdomain'),
        'all_items'   => __('Magazines', 'textdomain'),
    );

    $magazines_args = array(
        'labels' => $magazines_label,
        'public' => true,
        'capability_type' => 'post',
        'show_ui' => true,
        'supports' => array('title', 'editor' )
    );

    register_post_type('magazines', $magazines_args);
        register_taxonomy( 'categories', array('magazines'), array(
        'hierarchical' => true, 
        'label' => 'Categories', 
        'singular_label' => 'Category', 
        'rewrite' => array( 'slug' => 'categories', 'with_front'=> false )
        )
    );

    register_taxonomy_for_object_type( 'categories', 'magazines' );



    $authors_label = array(
        'name'     => __('Authors', 'textdomain'),
        'singular_name' => __('Author', 'textdomain'),
        'add_new'    => __('Add Author', 'textdomain'),
        'edit_item'   => __('Edit Author', 'textdomain'),
        'add_new_item' => __('Add New Author', 'textdomain'),
        'all_items'   => __('Authors', 'textdomain'),
    );

    $authors_args = array(
        'labels' => $authors_label,
        'public' => true,
        'capability_type' => 'post',
        'show_ui' => true,
        'supports' => array('title', 'editor' )
    );

    register_post_type('authors', $authors_args);




    $podcasts_label = array(
        'name'     => __('Podcasts', 'textdomain'),
        'singular_name' => __('Podcast', 'textdomain'),
        'add_new'    => __('Add Podcast', 'textdomain'),
        'edit_item'   => __('Edit Podcast', 'textdomain'),
        'add_new_item' => __('Add New Podcast', 'textdomain'),
        'all_items'   => __('Podcasts', 'textdomain'),
    );

    $podcasts_args = array(
        'labels' => $podcasts_label,
        'public' => true,
        'capability_type' => 'post',
        'show_ui' => true,
        'supports' => array('title', 'editor' )
    );

    register_post_type('podcasts', $podcasts_args);




}
add_action('init', 'fyrre_custom_post');
