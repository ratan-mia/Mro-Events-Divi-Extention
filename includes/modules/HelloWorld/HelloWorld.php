<?php

class MRO_HelloWorld extends ET_Builder_Module {

	public $slug       = 'mro_hello_world';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://shorifullislamratan.me/projects/mro-events',
		'author'     => 'Ratan Mia',
		'author_uri' => 'https://shorifullislamratan.me',
	);

	public function init() {
		$this->name = esc_html__( 'Hello World', 'mro-mro-events-divi-extention' );
	}

	public function get_fields() {
		return array(
			'content' => array(
				'label'           => esc_html__( 'Content', 'mro-mro-events-divi-extention' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Content entered here will appear inside the module.', 'mro-mro-events-divi-extention' ),
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content = null, $render_slug ) {
		return sprintf( '<h1>%1$s</h1>', $this->props['content'] );
	}
}

new MRO_HelloWorld;
