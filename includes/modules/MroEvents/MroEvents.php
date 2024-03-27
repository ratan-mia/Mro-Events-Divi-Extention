<?php

class MroEvents extends ET_Builder_Module {

	public $slug       = 'myex_mro_events'; //Unique Module Slug
	public $vb_support = 'on'; // Visual Builder Support Status

	//Module Footer Credit
	protected $module_credits = array(
        'module_uri' => 'https://shorifullislamratan.me/projects/mro-events',
		'author'     => 'Ratan Mia',
		'author_uri' => 'https://shorifullislamratan.me',
	);

	public function init() {
		//Defining Module Name
		$this->name = esc_html__( 'Mro Events', 'myex-my-extension' );
	}

	//Module's Necessary Fields
	public function get_fields() {
		return array(
			'title' => array(
				'label'           => esc_html__( 'Title', 'myex-my-extension' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Title entered here will appear inside the module.', 'myex-my-extension' ),
				'toggle_slug'     => 'main_content',
			),
			'content' => array(
				'label'           => esc_html__( 'Content', 'myex-my-extension' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'myex-my-extension' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	//Module Rendering in php
	public function render( $attrs, $content = null, $render_slug ) {
		$title =  sprintf( '<h1>%1$s</h1>', $this->props['title'] );
		$content =  sprintf( '<p>%1$s</p>', $this->props['content'] );
		
		$module = $title . $content;
		return $module;

	}
}

new MroEvents;