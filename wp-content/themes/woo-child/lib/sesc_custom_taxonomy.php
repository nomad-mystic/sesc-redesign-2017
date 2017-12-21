<?php

/**
 * @author Keith Murphy - nomad - nomadmystics@gmail.com
 * @summary Build custom Taxonomies here
*/


class SESC_custom_taxonomy {

	public function init() {

		add_action( 'init', [ $this, 'sesc_our_team_tax' ]);

	}


	/**
	 * @author Keith Murphy - nomad - nomadmystics@gmail.com
	 * @summary Build a custom taxonomy for our team custom post type
	*/

	public function sesc_our_team_tax() {

		$tax = 'our_team_category';
		$object_type = 'our_team';
		$args = [
			'label' => __( 'Categories' ),
			'rewrite' => [ 'slug' => 'our_team' ],
			'hierarchical' => true,
		];

		register_taxonomy( $tax, $object_type, $args );
		register_taxonomy_for_object_type( $tax, $object_type );

	}

}
