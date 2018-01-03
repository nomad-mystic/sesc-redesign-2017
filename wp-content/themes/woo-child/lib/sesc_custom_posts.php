<?php

/**
 * @class SESC_custom_post_types
 * @summary This is were all custom posts will live
 */

class SESC_custom_posts {


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Start all hooks/functions here
	*/
	public function init() {

		add_action( 'init', [$this, 'news_custom_post'] );
		add_action( 'init', [$this, 'resources_custom_post'] );
		add_action( 'init', [$this, 'sesc_our_team_custom_post'] );

		// remove metaboxes
		add_action('add_meta_boxes', [$this, 'sesc_remove_wp_metabox'], 100);

		add_filter( 'enter_title_here', [$this, 'sesc_change_our_team_title_text'] );
	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Create our custom post type for News posts
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */

	public function news_custom_post() {
		$args = [
			'public' => true,
			'label'  => 'News Posts',
			'supports'  => [ 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ],
			'show_ui' => true,
			'publicly_queryable' => true,
			'taxonomies' => ['category', 'post_tag'],
			'rewrite' => [ 'slug' => 'news' ],
			'menu_position' => 8,
		];

		register_post_type('news', $args);

	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Create our custom post type for Resources posts
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */

	public function resources_custom_post() {

		$labels = [
			'name'                => _x( 'Resources', 'Post Type General Name', 'text_domain' ),
			'singular_name'       => _x( 'Resource', 'Post Type Singular Name', 'text_domain' ),
			'menu_name'           => __( 'Resources Posts', 'text_domain' ),
			'name_admin_bar'      => __( 'Resources Posts', 'text_domain' ),
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

	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Create our custom post type for Our Team posts
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	*/

	public function sesc_our_team_custom_post() {

		$labels = [
			'name' => _x('Our Team Posts', 'Our Team Posts', 'sesc'),
			'singular_name' => _x('Our Team Post', 'Our Team Post', 'sesc'),
		];

		$post_args = [
			'public' => true,
			'supports' => ['title', 'editor', 'thumbnail', 'revisions', 'custom-fields', 'post-formats',],
			'taxonomies' => ['our_team_category'],
			'has_archive' => true,
			'show_in_rest' => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'menu_position'       => 6,
			'capability_type'     => 'post',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'rewrite' => [ 'slug' => 'our_team' ],
			'labels' => $labels,
		];

		register_post_type('our_team', $post_args );
	}

	public function sesc_remove_wp_metabox () {
		remove_meta_box('wpseo_meta', 'our_team', 'normal');
		remove_meta_box('slugdiv', 'our_team', 'normal');
		remove_meta_box('woothemes-settings', 'our_team', 'normal');
		remove_meta_box('sharing_meta', 'our_team', 'normal');
	}

	public function sesc_change_our_team_title_text( $title ) {
		$screen = get_current_screen();

		if  ( 'our_team' === $screen->post_type ) {
			$title = 'Enter your name and byline here (example: First Last, Special Ed Teacher)';
		}

		return $title;
	}

} // end class
