<?php
/**
* @author Keith Murphy - nomad - nomadmystics@gamil.com
* All Custom Widgets
*/

class SESC_widgets {

	public function init() {
		add_action( 'widgets_init', [ $this, 'cadre_login_widgets_init' ] );
		add_action( 'widgets_init', [ $this, 'cadre_file_cabinet_widgets_init' ] );
		add_action( 'widgets_init', [ $this, 'projects_page_widgets_init' ] );
		add_action( 'widgets_init', [ $this, 'resource_page_widgets_init' ] );
		add_action( 'widgets_init', [ $this, 'about_page_widgets_init' ] );
		add_action( 'widgets_init', [ $this, 'stay_current_nav_widgets_init' ] );
		add_action( 'widgets_init', [ $this, 'instructional_support_nav_widgets_init' ] );
	}

	/* This is going to add a Cadre Log in Area for members on the Cadre Page*/
	public function cadre_login_widgets_init() {

		register_sidebar(array(
			'name'          => 'Cadre Log In Page',
			'id'            => 'cadre_login',
			'before_widget' => '<div id="cadreLoginPageWidget">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

	}

	/* This is going to add a File Cabinet Area for members on the File Cabinet Page*/
	public function cadre_file_cabinet_widgets_init() {

		register_sidebar(array(
			'name'          => 'Cadre File Cabinet Page',
			'id'            => 'cadre_file_cabinet',
			'before_widget' => '<div id="cadreFileCabinetPageWidget">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

	}

	/*-------------This is going to be the Projects Page left Col Widget area---------*/
	public function projects_page_widgets_init() {

		register_sidebar( array(
			'name'          => 'Projects Page Left Col',
			'id'            => 'projects_page',
			'before_widget' => '<div id="projectsPageNavWidget">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

	}

	/*-------------This is going to be the Resources Page left Col Widget area---------*/
	public function resource_page_widgets_init() {

		register_sidebar( array(
			'name'          => 'Resource Page Left Col',
			'id'            => 'resource_page',
			'before_widget' => '<div id="resourcePageNavWidget">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

	}

	/*-------------This is for the aboutPage cadre area nav WIDGET ----------*/
	public function about_page_widgets_init() {

		register_sidebar( array(
			'name'          => 'About Page Left Col',
			'id'            => 'about_page',
			'before_widget' => '<div id="aboutPageNAVWidget">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

	}

	/*---------------this is for the Stay Current Page--------------*/
	public function stay_current_nav_widgets_init() {

		register_sidebar( array(
			'name'          => 'Stay Current Page Nav Left Col',
			'id'            => 'stay_current_page_nav',
			'before_widget' => '<div id="stayCurrentNav">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

	}

	/*-----------This is going to be the widget area for Instructional Support---*/
	public function instructional_support_nav_widgets_init() {

		register_sidebar( array(
			'name'          => 'Instructional Support Page Nav Left Col',
			'id'            => 'instructional_support_page_nav',
			'before_widget' => '<div id="instructionalSupportNav">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		) );

	}
}
