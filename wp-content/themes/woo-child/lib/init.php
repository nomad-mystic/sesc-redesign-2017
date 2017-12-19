<?php
/**
* @author Keith Murphy - nomad - nomadmystics@gamil.com
* Custom Functions at init hook
*/

class SESC_init_functions {


    public function init() {
        add_action( 'init', [ $this, 'news_custom_post' ] );
        add_action( 'init', [ $this, 'resources_custom_post' ] );
    }

    /**
    * @author Keith Murphy - nomad - nomadmystics@gamil.com
    * @summary Add News posts to the dashboard
    */
    public function news_custom_post() {
        $args = [
            'public' => true,
            'label'  => 'News',
            'supports'  => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ],
            'show_ui' => true,
            'publicly_queryable' => true,
            'taxonomies' => ['category', 'post_tag'],
            'rewrite' => [ 'slug' => 'news' ]
        ];

        register_post_type('news', $args);

    }

    /*---------------This for the resources custom post type----*/
    // Register Custom Post Type
    public function resources_custom_post() {

      	$labels = [
            'name'                => _x( 'Resources', 'Post Type General Name', 'text_domain' ),
      		'singular_name'       => _x( 'Resource', 'Post Type Singular Name', 'text_domain' ),
      		'menu_name'           => __( 'Resources Post', 'text_domain' ),
      		'name_admin_bar'      => __( 'Resources Post', 'text_domain' ),
      		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
      		'all_items'           => __( 'All Items', 'text_domain' ),
      		'add_new_item'        => __( 'Add New Item', 'text_domain' ),
      		'add_new'             => __( 'Add New', 'text_domain' ),
      		'new_item'            => __( 'New Item', 'text_domain' ),
      		'edit_item'           => __( 'Edit Item', 'text_domain' ),
      		'update_item'         => __( 'Update Item', 'text_domain' ),
      		'view_item'           => __( 'View Item', 'text_domain' ),
      		'search_items'        => __( 'Search Item', 'text_domain' ),
      		'not_found'           => __( 'Not found', 'text_domain' ),
      		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' )
        ];

      	$args = [
            'label'               => __( 'Resource', 'text_domain' ),
      		'description'         => __( 'resources_custom_post', 'text_domain' ),
      		'labels'              => $labels,
      		'supports'            => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ],
      		'taxonomies'          => [ 'category', 'post_tag' ],
      		'hierarchical'        => true,
      		'public'              => true,
      		'show_ui'             => true,
      		'show_in_menu'        => true,
      		'menu_position'       => 5,
      		'show_in_admin_bar'   => true,
      		'show_in_nav_menus'   => true,
      		'can_export'          => true,
      		'has_archive'         => true,
      		'exclude_from_search' => false,
      		'publicly_queryable'  => true,
      		'capability_type'     => 'post'
        ];

      	register_post_type( 'resources_post', $args );
    }
}
