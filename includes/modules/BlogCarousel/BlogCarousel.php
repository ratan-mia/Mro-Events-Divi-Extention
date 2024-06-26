<?php

class DSM_BlogCarousel extends ET_Builder_Module_Type_PostBased {

	public $slug       = 'dsm_blog_carousel';
	public $vb_support = 'on';


	protected $module_credits = array(
        'module_uri' => 'https://shorifullislamratan.me/projects/mro-events',
        'author'     => 'Ratan Mia',
        'author_uri' => 'https://shorifullislamratan.me',
	);

	protected static $rendering = false;


	public function init() {
		$this->name      = esc_html__( 'MRO Events Carousel', 'mro-mro-events-divi-extention' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Content', 'mro-mro-events-divi-extention' ),
					'elements'     => esc_html__( 'Elements', 'mro-mro-events-divi-extention' ),
					'carousel'     => esc_html__( 'Carousel Settings', 'mro-mro-events-divi-extention' ),
				),
			),

			'advanced' => array(
				'toggles' => array(
					'post_item'    => esc_html__( 'Post Item', 'mro-mro-events-divi-extention' ),
					'image'        => esc_html__( 'Post Thumnail', 'mro-mro-events-divi-extention' ),
					'title'        => esc_html__( 'Post Entry Title', 'mro-mro-events-divi-extention' ),
					'body'         => esc_html__( 'Post Entry Summary', 'mro-mro-events-divi-extention' ),
					'meta'         => esc_html__( 'Post Entry Meta', 'mro-mro-events-divi-extention' ),
					'readmore'     => esc_html__( 'Readmore', 'mro-mro-events-divi-extention' ),
					'navigation'   => esc_html__( 'Navigation', 'mro-mro-events-divi-extention' ),
					'pagination'   => esc_html__( 'Pagination', 'mro-mro-events-divi-extention' ),
					'bottom_items' => esc_html__( 'Bottom Meta Items', 'mro-mro-events-divi-extention' ),
				),
			),
		);
	}

	public function get_custom_css_fields_config() {
		$fields = array();
		return $fields;
	}

	public function get_advanced_fields_config() {

		$advanced_fields = array();

		$advanced_fields['fonts']        = array();
		$advanced_fields['text']         = false;
		$advanced_fields['text_shadow']  = false;
		$advanced_fields['link_options'] = false;

		$advanced_fields['box_shadow']['post_box'] = array(
			'css'         => array(
				'main' => '%%order_class%% .dsm-blog-carousel-item',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'post_item',
		);

		$advanced_fields['borders']['post_box'] = array(
			'css'         => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .dsm-blog-carousel-item',
					'border_styles' => '%%order_class%% .dsm-blog-carousel-item',
				),
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'post_item',
		);

		$advanced_fields['borders']['image'] = array(
			'css'         => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .dsm-blog-carousel-item .dsm-entry-image',
					'border_styles' => '%%order_class%% .dsm-blog-carousel-item .dsm-entry-image',
				),
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'image',
		);

		$advanced_fields['box_shadow']['image'] = array(
			'css'         => array(
				'main' => '%%order_class%% .dsm-blog-carousel-item .dsm-entry-image img',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'image',
		);

		$advanced_fields['filters'] = array(
			'css'                  => array(
				'main' => '%%order_class%%',
			),
			'child_filters_target' => array(
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'image',
			),
		);

		$advanced_fields['fonts']['title'] = array(
			'label'        => esc_html__( 'Title', 'mro-mro-events-divi-extention' ),
			'css'          => array(
				'main'        => '%%order_class%% .dsm-entry-title',
				'font'        => '%%order_class%% .dsm-entry-title a',
				'color'       => '%%order_class%% .dsm-entry-title a',
				'hover'       => '%%order_class%% .dsm-entry-title:hover, %%order_class%% .dsm-entry-title:hover a',
				'color_hover' => '%%order_class%% .dsm-entry-title:hover a',
				'important'   => 'all',
			),
			'font_size'    => array(
				'default' => '18px',
			),
			'line_height'  => array(
				'default' => '1.3em',
			),
			'header_level' => array(
				'default'          => 'h2',
				'computed_affects' => array(
					'__blogcarousel',
				),
			),
			'tab_slug'     => 'advanced',
			'toggle_slug'  => 'title',
		);

		$advanced_fields['fonts']['body'] = array(
			'label'       => esc_html__( 'Summary', 'mro-mro-events-divi-extention' ),
			'css'         => array(
				'color'       => '%%order_class%% .dsm-post-excerpt *',
				'main'        => '%%order_class%% .dsm-post-excerpt',
				'line_height' => '%%order_class%% .dsm-post-excerpt p',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'body',
		);

		$advanced_fields['fonts']['date'] = array(
			'label'           => esc_html__( 'Date', 'mro-mro-events-divi-extention' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm-posted-on',
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'meta',
		);

		$advanced_fields['fonts']['author'] = array(
			'label'           => esc_html__( 'Author', 'mro-mro-events-divi-extention' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm-posted-by, %%order_class%% .dsm-posted-by a',
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'meta',
		);

		$advanced_fields['fonts']['category'] = array(
			'label'           => esc_html__( 'Category', 'mro-mro-events-divi-extention' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm-posted-category, %%order_class%% .dsm-posted-category a',
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'meta',
		);

		$advanced_fields['button']['readmore'] = array(
			'label'          => esc_html__( 'Readmore', 'mro-mro-events-divi-extention' ),
			'css'            => array(
				'main'      => '%%order_class%% .dsm-readmore-btn',
				'alignment' => '%%order_class%% .dsm-readmore-wrap',
				'important' => true,
			),
			'box_shadow'     => array(
				'css' => array(
					'main' => '%%order_class%% .dsm-readmore-btn',
				),
			),
			'margin_padding' => array(
				'css'           => array(
					'important' => 'all',
				),
				'custom_margin' => array(
					'default' => '15px||||false|false',
				),
			),
			'use_alignment'  => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'readmore',
		);

		$advanced_fields['box_shadow']['navi_arrow'] = array(
			'css'         => array(
				'main' => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'navigation',
		);

		$advanced_fields['borders']['navi_arrow'] = array(
			'css'         => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
					'border_styles' => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
				),
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'navigation',
		);

		$advanced_fields['margin_padding'] = array(
			'css'           => array(
				'main'      => '%%order_class%% .swiper-container',
				'important' => 'all', // needed to overwrite last module margin-bottom styling.
			),
			'custom_margin' => array(
				'default' => '||60px||false|false',
			),
		);

		$advanced_fields['fonts']['bottom_date'] = array(
			'label'           => esc_html__( 'Date', 'mro-mro-events-divi-extention' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm-bottom-meta .dsm-posted-on',
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'bottom_items',
		);

		$advanced_fields['fonts']['bottom_author'] = array(
			'label'           => esc_html__( 'Author', 'mro-mro-events-divi-extention' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm-bottom-meta .dsm-posted-by, %%order_class%% .dsm-bottom-meta .dsm-posted-by a',
			),
			'hide_text_align' => true,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'bottom_items',
		);

		$advanced_fields['borders']['bottom_author_image'] = array(
			'label'       => esc_html__( 'Author Image', 'mro-mro-events-divi-extention' ),
			'css'         => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .dsm-blog-carousel-item .dsm-bottom-meta .dsm-bottom-meta-image',
					'border_styles' => '%%order_class%% .dsm-blog-carousel-item .dsm-bottom-meta .dsm-bottom-meta-image',
				),
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'bottom_items',
		);

		$advanced_fields['box_shadow']['bottom_author_image'] = array(
			'label'       => esc_html__( 'Author Image', 'mro-mro-events-divi-extention' ),
			'css'         => array(
				'main' => '%%order_class%% .dsm-blog-carousel-item .dsm-bottom-meta .dsm-bottom-meta-image',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'bottom_items',
		);

		return $advanced_fields;
	}

	public function get_fields() {

		$fields = array();

        $fields['post_type'] = array(
            'label'            => esc_html__( 'Post Type', 'mro-mro-events-divi-extention' ),
            'type'             => 'select',
//            'option_category'  => 'configuration',
            'options'          => et_get_registered_post_type_options( false, false ),
            'description'      => esc_html__( 'Choose posts of which post type you would like to display.', 'mro-mro-events-divi-extention' ),
            'computed_affects' => array(
                '__posts',
            ),
            'toggle_slug'      => 'main_content',
            'default'          => 'post',
//            'show_if'          => array(
//                'use_current_loop' => 'off',
//            ),
        );



        $fields['meta_key'] = array(
            'label'           => esc_html__( 'Meta Key', 'mro-mro-events-divi-extention' ),
            'type'            => 'text',
//            'option_category' => 'basic_option',
            'toggle_slug'     => 'main_content',
            'computed_affects'=> array(
                '__posts',
            ),
//            'show_if'         => array(
//                'use_current_loop' => 'off',
//            ),
            'default'         => 'Event_Date',
            'description'     => esc_html__( 'Enter the meta key.', 'mro-mro-events-divi-extention' ),
            'allow_dynamic_content'=> true,
        );


//        $fields['compare'] = array(
//            'label'           => esc_html__( 'Comparison Type', 'mro-mro-events-divi-extention' ),
//            'type'            => 'select',
//           'option_category' => 'basic_option',
//            'options'         => array(
//                '='  => 'Equal',
//                '!=' => 'Not Equal',
//                '>'  => 'Greater Than',
//                '>=' => 'Greater Than or Equal To',
//                '<'  => 'Less Than',
//                '<=' => 'Less Than or Equal To',
//            ),
//            'description'     => esc_html__( 'Choose the comparison type.', 'mro-mro-events-divi-extention' ),
//        );



		$fields['posts_number'] = array(
			'label'            => esc_html__( 'Post Count', 'mro-mro-events-divi-extention' ),
			'type'             => 'text',
			'computed_affects' => array(
				'__blogcarousel',
			),
			'toggle_slug'      => 'main_content',
			'default'          => 10,
		);

		$fields['posts_offset'] = array(
			'label'            => esc_html__( 'Post Offset Number', 'mro-mro-events-divi-extention' ),
			'type'             => 'text',
			'computed_affects' => array(
				'__blogcarousel',
			),
			'toggle_slug'      => 'main_content',
			'default'          => 0,
		);

		$fields['include_categories'] = array(
			'label'            => esc_html__( 'Included Categories', 'mro-mro-events-divi-extention' ),
			'type'             => 'categories',
			'meta_categories'  => array(
				'all'     => esc_html__( 'All Categories', 'mro-mro-events-divi-extention' ),
				'current' => esc_html__( 'Current Category', 'mro-mro-events-divi-extention' ),
			),
			'renderer_options' => array(
				'use_terms' => false,
			),
			'computed_affects' => array(
				'__blogcarousel',
			),
			'toggle_slug'      => 'main_content',
		);

		$fields['use_overlay'] = array(
			'label'            => esc_html__( 'Show Overlay', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'options'          => array(
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'off',
			'computed_affects' => array( '__blogcarousel' ),
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'overlay',
		);

		$fields['overlay_icon'] = array(
			'label'       => esc_html__( 'Overlay Icon', 'mro-mro-events-divi-extention' ),
			'type'        => 'select_icon',
			'default'     => 'L',
			'show_if'     => array(
				'use_overlay' => 'on',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'overlay',
		);

		$fields['overlay_icon_color'] = array(
			'label'          => esc_html__( 'Overlay Icon Color', 'mro-mro-events-divi-extention' ),
			'type'           => 'color-alpha',
			'custom_color'   => true,
			'show_if'        => array(
				'use_overlay' => 'on',
			),
			'default'        => '#ffffff',
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay',
			'description'    => esc_html__( 'Here you can define a custom color for the overlay icon', 'mro-mro-events-divi-extention' ),
			'mobile_options' => true,
		);

		$fields['overlay_icon_size'] = array(
			'label'          => esc_html__( 'Overlay Icon Size', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'default'        => '25px',
			'show_if'        => array(
				'use_overlay' => 'on',
			),
			'range_settings' => array(
				'min'  => '0',
				'max'  => '500',
				'step' => '1',
			),
			'mobile_options' => true,
			'show_if'        => array(
				'use_overlay' => 'on',
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay',
		);

		$fields['hover_overlay_color'] = array(
			'label'          => esc_html__( 'Overlay Background Color', 'mro-mro-events-divi-extention' ),
			'type'           => 'color-alpha',
			'custom_color'   => true,
			'description'    => esc_html__( 'Here you can define a custom color for the overlay', 'mro-mro-events-divi-extention' ),
			'show_if'        => array(
				'use_overlay' => 'on',
			),
			'default'        => et_builder_accent_color(),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay',
		);

		$fields['use_thumbnail'] = array(
			'label'            => esc_html__( 'Show Featured Image', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'options'          => array(
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'on',
			'default_on_front' => 'on',
			'computed_affects' => array( '__blogcarousel' ),
			'toggle_slug'      => 'elements',
		);

		$fields['lazyload'] = array(
			'label'            => esc_html__( 'Enabled Lazy Load', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'elements',
			'description'      => esc_html__( 'If enable, images will be lazy loaded (Lazy loading images can improve performance, but it may not work with all performance caching plugins. Please test your settings before enabling this option).', 'mro-mro-events-divi-extention' ),
			'default'          => 'off',
			'default_on_front' => 'off',
			'show_if'          => array(
				'use_thumbnail' => 'on',
			),
		);

		$fields['thumbnail_img_type'] = array(
			'label'            => esc_html__( 'Thumbnail Type', 'mro-mro-events-divi-extention' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'options'          => array(
				'cover'   => esc_html__( 'Cover Fit', 'mro-mro-events-divi-extention' ),
				'contain' => esc_html__( 'Contain', 'mro-mro-events-divi-extention' ),
			),
			'show_if'          => array(
				'use_thumbnail' => 'on',
			),
			'default'          => 'cover',
			'default_on_front' => 'cover',
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'image',
		);

		$fields['thumbnail_height'] = array(
			'label'          => esc_html__( 'Thumbnail Height', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'default'        => '250px',
			'show_if'        => array(
				'use_thumbnail'      => 'on',
				'thumbnail_img_type' => 'cover',
			),
			'range_settings' => array(
				'min'  => '0',
				'max'  => '500',
				'step' => '10',
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'image',
		);

		$fields['use_title'] = array(
			'label'            => esc_html__( 'Show Title', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'options'          => array(
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'elements',
			'default_on_front' => 'on',
			'default'          => 'on',
			'computed_affects' => array( '__blogcarousel' ),
		);

		$fields['use_excerpt'] = array(
			'label'            => esc_html__( 'Show Excerpt', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'options'          => array(
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'elements',
			'default_on_front' => 'on',
			'default'          => 'on',
			'computed_affects' => array( '__blogcarousel' ),
		);

		$fields['excerpt_length'] = array(
			'label'            => esc_html__( 'Excerpt Text', 'mro-mro-events-divi-extention' ),
			'type'             => 'text',
			'description'      => esc_html__( 'Define the length of automatically generated excerpts. Leave blank for default ( 50 ) ', 'mro-mro-events-divi-extention' ),
			'show_if'          => array(
				'use_excerpt' => 'on',
			),
			'computed_affects' => array(
				'__blogcarousel',
			),
			'default'          => '50',
			'toggle_slug'      => 'elements',
		);

		$fields['use_date'] = array(
			'label'            => esc_html__( 'Show Date', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'options'          => array(
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
			),
			'computed_affects' => array(
				'__blogcarousel',
			),
			'default'          => 'on',
			'default_on_front' => 'on',
			'toggle_slug'      => 'elements',
		);

		$fields['meta_date'] = array(
			'label'            => esc_html__( 'Date Format', 'mro-mro-events-divi-extention' ),
			'type'             => 'text',
			'description'      => esc_html__( 'If you would like to adjust the date format, input the appropriate PHP date format here.', 'mro-mro-events-divi-extention' ),
			'toggle_slug'      => 'main_content',
			'computed_affects' => array(
				'__blogcarousel',
			),
			'default'          => 'M j, Y',
		);

		$fields['post_orderby'] = array(
			'label'            => esc_html__( 'Post Date Orderby', 'mro-mro-events-divi-extention' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'toggle_slug'      => 'main_content',
			'options'          => array(
				'date'     => esc_html__( 'Published Post Date', 'mro-mro-events-divi-extention' ),
				'modified' => esc_html__( 'Modified Post Date', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'published',
			'default_on_front' => 'published',
			'computed_affects' => array(
				'__blogcarousel',
			),
		);

		$fields['post_sortby'] = array(
			'label'            => esc_html__( 'Sortby', 'mro-mro-events-divi-extention' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'toggle_slug'      => 'main_content',
			'options'          => array(
				'asc'  => esc_html__( 'Older Post (Ascending Order)', 'mro-mro-events-divi-extention' ),
				'desc' => esc_html__( 'Latest Post (Descending Order)', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'desc',
			'computed_affects' => array(
				'__blogcarousel',
			),
		);

		$fields['use_category'] = array(
			'label'            => esc_html__( 'Show Category', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'options'          => array(
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'elements',
			'default'          => 'off',
			'computed_affects' => array( '__blogcarousel' ),
		);

		$fields['meta_seperator'] = array(
			'label'            => esc_html__( 'Meta Seperator', 'mro-mro-events-divi-extention' ),
			'type'             => 'text',
			'default'          => '|',
			'toggle_slug'      => 'elements',
			'show_if'          => array(
				'use_date' => 'on',
			),
			'computed_affects' => array( '__blogcarousel' ),
		);

		$fields['use_author'] = array(
			'label'            => esc_html__( 'Author', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'options'          => array(
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'elements',
			'default'          => 'on',
			'default_on_front' => 'on',
			'computed_affects' => array( '__blogcarousel' ),
		);

		$fields['use_readmore'] = array(
			'label'            => esc_html__( 'Read More Button', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'options'          => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'off',
			'default_on_front' => 'off',
			'computed_affects' => array(
				'__blogcarousel',
			),
			'toggle_slug'      => 'elements',
		);

		$fields['readmore_text'] = array(
			'label'            => esc_html__( 'Read More Text', 'mro-mro-events-divi-extention' ),
			'type'             => 'text',
			'default'          => 'Read More',
			'show_if'          => array(
				'use_readmore' => 'on',
			),
			'computed_affects' => array(
				'__blogcarousel',
			),
			'toggle_slug'      => 'elements',
		);

		$fields['readmore_url_new_window'] = array(
			'label'            => esc_html__( 'Read More Link Target', 'mro-mro-events-divi-extention' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'In The Same Window', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'In The New Tab', 'mro-mro-events-divi-extention' ),
			),
			'default_on_front' => 'off',
			'show_if'          => array(
				'use_readmore' => 'on',
			),
			'toggle_slug'      => 'elements',
			'description'      => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'mro-mro-events-divi-extention' ),
		);

		$fields['use_bottom'] = array(
			'label'            => esc_html__( 'Show Bottom Meta Elements', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'options'          => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'off',
			'default_on_front' => 'off',
			'computed_affects' => array(
				'__blogcarousel',
			),
			'toggle_slug'      => 'elements',
		);

		$fields['bottom_date'] = array(
			'label'            => esc_html__( 'Bottom Date', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'options'          => array(
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'on',
			'default_on_front' => 'on',
			'computed_affects' => array(
				'__blogcarousel',
			),
			'show_if'          => array(
				'use_bottom' => 'on',
			),
			'toggle_slug'      => 'elements',
		);

		$fields['bottom_author'] = array(
			'label'            => esc_html__( 'Bottom Author', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'options'          => array(
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'on',
			'computed_affects' => array(
				'__blogcarousel',
			),
			'show_if'          => array(
				'use_bottom' => 'on',
			),
			'toggle_slug'      => 'elements',
		);

		$fields['image_width'] = array(
			'label'          => esc_html__( 'Image Width', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'range_settings' => array(
				'min'  => '1',
				'max'  => '500',
				'step' => '1',
			),
			'default'        => '60px',
			'mobile_options' => true,
			'show_if'        => array(
				'use_bottom' => 'on',
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'bottom_items',
		);

		$fields['slider_orientation'] = array(
			'label'            => esc_html__( 'Carousel Orientation', 'mro-mro-events-divi-extention' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'options'          => array(
				'horizontal' => esc_html__( 'Horizontal', 'mro-mro-events-divi-extention' ),
				'vertical'   => esc_html__( 'Vertical', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'horizontal',
			'default_on_front' => 'horizontal',
			'toggle_slug'      => 'carousel',
		);

		$fields['slider_container_height'] = array(
			'label'            => esc_html__( 'Height', 'mro-mro-events-divi-extention' ),
			'type'             => 'range',
			'option_category'  => 'configuration',
			'default'          => '500px',
			'default_on_front' => '500px',
			'default_unit'     => 'px',
			'mobile_options'   => true,
			'responsive'       => true,
			'range_settings'   => array(
				'min'  => '100',
				'max'  => '2000',
				'step' => '10',
			),
			'toggle_slug'      => 'carousel',
			'show_if'          => array(
				'slider_orientation' => 'vertical',
			),
		);

		$fields['slider_vertical_height_msg'] = array(
			'label'           => '',
			'type'            => 'warning',
			'value'           => true,
			'display_if'      => true,
			'message'         => esc_html__( 'Increase Height If the content is being cut.', 'mro-mro-events-divi-extention' ),
			'option_category' => 'configuration',
			'tab_slug'        => 'general',
			'toggle_slug'     => 'carousel',

			'show_if'         => array(
				'slider_orientation' => 'vertical',
			),
		);

		$fields['slider_effect'] = array(
			'label'            => esc_html__( 'Carousel Effect', 'mro-mro-events-divi-extention' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'options'          => array(
				'default'   => esc_html__( 'Slide', 'mro-mro-events-divi-extention' ),
				'coverflow' => esc_html__( 'Coverflow', 'mro-mro-events-divi-extention' ),
				'flip'      => esc_html__( 'Flip', 'mro-mro-events-divi-extention' ),
				'cube'      => esc_html__( 'Cube', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'default',
			'default_on_front' => 'default',
			'toggle_slug'      => 'carousel',
		);

		$fields['slider_effect_shadows'] = array(
			'label'           => esc_html__( 'Show Shadow', 'mro-mro-events-divi-extention' ),
			'type'            => 'yes_no_button',
			'option_category' => 'configuration',
			'options'         => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'default'         => 'off',
			'show_if_not'     => array(
				'slider_effect' => 'default',
			),
			'toggle_slug'     => 'carousel',
		);

		$fields['slider_effect_coverflow_rotate'] = array(
			'label'            => esc_html__( 'Coverflow Rotate', 'mro-mro-events-divi-extention' ),
			'type'             => 'range',
			'option_category'  => 'configuration',
			'default'          => '30',
			'default_on_front' => '30',
			'default_unit'     => '',
			'validate_unit'    => false,
			'mobile_options'   => false,
			'unitless'         => true,
			'responsive'       => false,
			'range_settings'   => array(
				'min'  => '30',
				'max'  => '100',
				'step' => '1',
			),
			'toggle_slug'      => 'carousel',
			'show_if'          => array(
				'slider_effect' => 'coverflow',
			),
		);

		$fields['slider_effect_coverflow_depth'] = array(
			'label'            => esc_html__( 'Coverflow Depth', 'mro-mro-events-divi-extention' ),
			'type'             => 'range',
			'option_category'  => 'configuration',
			'default'          => '100',
			'default_on_front' => '100',
			'default_unit'     => '',
			'validate_unit'    => false,
			'mobile_options'   => false,
			'unitless'         => true,
			'responsive'       => false,
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '500',
				'step' => '1',
			),
			'toggle_slug'      => 'carousel',
			'show_if'          => array(
				'slider_effect' => 'coverflow',
			),
		);

		$fields['slider_direction'] = array(
			'label'            => esc_html__( 'Carousel Direction', 'mro-mro-events-divi-extention' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'options'          => array(
				'ltr' => esc_html__( 'Left to Right', 'mro-mro-events-divi-extention' ),
				'rtl' => esc_html__( 'Right to Left', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'ltr',
			'default_on_front' => 'ltr',
			'toggle_slug'      => 'carousel',
			'show_if'          => array(
				'slider_orientation' => 'horizontal',
			),
		);

		$fields['columns'] = array(
			'label'            => esc_html__( 'Columns', 'mro-mro-events-divi-extention' ),
			'type'             => 'range',
			'default'          => '3',
			'default_on_front' => '3',
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '12',
				'step' => '1',
			),
			'unitless'         => true,
			'mobile_options'   => true,
			'responsive'       => true,
			'toggle_slug'      => 'carousel',
			'show_if'          => array(
				'slider_orientation' => 'horizontal',
			),
		);

		$fields['rows_per_view'] = array(
			'label'            => esc_html__( 'Columns', 'mro-mro-events-divi-extention' ),
			'type'             => 'range',
			'default'          => '1',
			'default_on_front' => '1',
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '12',
				'step' => '1',
			),
			'unitless'         => true,
			'mobile_options'   => true,
			'responsive'       => true,
			'toggle_slug'      => 'carousel',
			'show_if'          => array(
				'slider_orientation' => 'vertical',
			),
		);

		$fields['multiple_slide_row'] = array(
			'label'            => esc_html__( 'Use Multiple Row', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'carousel',
			'description'      => esc_html__( 'To use multirow layout.', 'mro-mro-events-divi-extention' ),
			'default'          => 'off',
			'default_on_front' => 'off',
			'show_if'          => array(
				'slider_orientation' => 'horizontal',
			),
		);

		$fields['slide_row'] = array(
			'label'            => esc_html__( 'Row Per Slide', 'mro-mro-events-divi-extention' ),
			'type'             => 'range',
			'option_category'  => 'configuration',
			'default'          => '1',
			'default_on_front' => '1',
			'default_unit'     => '',
			'validate_unit'    => false,
			'mobile_options'   => true,
			'responsive'       => true,
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '5',
				'step' => '1',
			),
			'show_if'          => array(
				'multiple_slide_row' => 'on',
			),
			'toggle_slug'      => 'carousel',
		);

		$fields['centered_slides'] = array(
			'label'            => esc_html__( 'Centered Mode', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'carousel',
			'description'      => esc_html__( 'If enable, then active slide will be centered, not always on the left side.', 'mro-mro-events-divi-extention' ),
			'default'          => 'off',
			'default_on_front' => 'off',
		);

		$fields['spacing'] = array(
			'label'          => esc_html__( 'Spacing', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'default'        => '30',
			'range_settings' => array(
				'min'  => '5',
				'max'  => '100',
				'step' => '1',
			),
			'unitless'       => true,
			'mobile_options' => true,
			'responsive'     => true,
			'toggle_slug'    => 'carousel',
		);

		$fields['speed'] = array(
			'label'          => esc_html__( 'Transition Duration', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'range_settings' => array(
				'min'  => '1',
				'max'  => '5000',
				'step' => '100',
			),
			'default'        => 500,
			'validate_unit'  => false,
			'toggle_slug'    => 'carousel',
		);

		$fields['loop'] = array(
			'label'       => esc_html__( 'Infinite Loop', 'mro-mro-events-divi-extention' ),
			'type'        => 'yes_no_button',
			'options'     => array(
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
			),
			'default'     => 'on',
			'toggle_slug' => 'carousel',
			'show_if_not' => array(
				'centered_slides'    => 'on',
				'multiple_slide_row' => 'on',
			),
		);

		$fields['autoplay'] = array(
			'label'       => esc_html__( 'Autoplay', 'mro-mro-events-divi-extention' ),
			'type'        => 'yes_no_button',
			'options'     => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'default'     => 'on',
			'toggle_slug' => 'carousel',
		);

		$fields['autoplay_speed'] = array(
			'label'          => esc_html__( 'Autoplay Speed', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'range_settings' => array(
				'min'  => '1',
				'max'  => '10000',
				'step' => '500',
			),
			'default'        => 5000,
			'validate_unit'  => false,
			'show_if'        => array(
				'autoplay' => 'on',
			),
			'toggle_slug'    => 'carousel',
		);

		$fields['autoplay_viewport'] = array(
			'label'            => esc_html__( 'Autoplay Only On Viewport', 'mro-mro-events-divi-extention' ),
			'description'      => esc_html__( 'Autoplay when in viewport.', 'mro-mro-events-divi-extention' ),
			'type'             => 'range',
			'option_category'  => 'layout',
			'toggle_slug'      => 'carousel',
			'default'          => '80%',
			'default_on_front' => '80%',
			'unitless'         => false,
			'allow_empty'      => false,
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'responsive'       => false,
			'mobile_options'   => false,
			'show_if'          => array(
				'autoplay' => 'on',
			),
		);

		$fields['mousewheel'] = array(
			'label'            => esc_html__( 'Use Mouse Wheel', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'carousel',
			'description'      => esc_html__( 'To use mousewheel mousewheel swipes the slides.', 'mro-mro-events-divi-extention' ),
			'default'          => 'off',
			'default_on_front' => 'off',
		);

		$fields['pause_on_hover'] = array(
			'label'            => esc_html__( 'Pause on Hover', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'carousel',
			'default'          => 'off',
			'default_on_front' => 'off',
			'show_if'          => array(
				'autoplay' => 'on',
			),
			'description'      => esc_html__( 'If enable, blog carousel will pause on hover.', 'mro-mro-events-divi-extention' ),
		);

		$fields['use_pagi'] = array(
			'label'          => esc_html__( 'Pagination', 'mro-mro-events-divi-extention' ),
			'type'           => 'yes_no_button',
			'options'        => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'mobile_options' => true,
			'toggle_slug'    => 'carousel',
			'default'        => 'on',
		);

		$fields['pagi_position'] = array(
			'label'          => esc_html__( 'Pagination Position', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'default'        => '-40',
			'range_settings' => array(
				'min'  => '-200',
				'max'  => '200',
				'step' => '1',
			),
			'unitless'       => true,
			'mobile_options' => true,
			'show_if'        => array(
				'use_pagi' => 'on',
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'pagination',
		);

		$fields['pagi_ver_position'] = array(
			'label'          => esc_html__( 'Vertical Pagination Position', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'default'        => '50%',
			'range_settings' => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'default_unit'   => '%',
			'mobile_options' => true,
			'show_if'        => array(
				'use_pagi'           => 'on',
				'slider_orientation' => 'vertical',
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'pagination',
		);

		$fields['pagi_color'] = array(
			'label'          => esc_html__( 'Pagination Color', 'mro-mro-events-divi-extention' ),
			'type'           => 'color-alpha',
			'default'        => '#d8d8d8',
			'show_if'        => array(
				'use_pagi' => 'on',
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'pagination',
		);

		$fields['pagi_active_color'] = array(
			'label'          => esc_html__( 'Pagination Active Color', 'mro-mro-events-divi-extention' ),
			'type'           => 'color-alpha',
			'default'        => et_builder_accent_color(),
			'show_if'        => array(
				'use_pagi' => 'on',
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'pagination',
		);

		$fields['pagi_vertical_position'] = array(
			'label'            => esc_html__( 'Pagination Position', 'mro-mro-events-divi-extention' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'options'          => array(
				'left'  => esc_html__( 'Left', 'mro-mro-events-divi-extention' ),
				'right' => esc_html__( 'Right', 'mro-mro-events-divi-extention' ),
			),
			'default'          => 'right',
			'default_on_front' => 'right',
			'show_if'          => array(
				'slider_orientation' => 'vertical',
			),
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'pagination',
		);

		$fields['pagi_style'] = array(
			'label'           => esc_html__( 'Pagination Button Style', 'mro-mro-events-divi-extention' ),
			'type'            => 'select',
			'option_category' => 'layout',
			'options'         => array(
				'bullets'     => esc_html__( 'Default', 'mro-mro-events-divi-extention' ),
				'dynamic'     => esc_html__( 'Dynamic', 'mro-mro-events-divi-extention' ),
				'progressbar' => esc_html__( 'Progress Bar', 'mro-mro-events-divi-extention' ),
			),
			'default'         => 'bullets',
			'show_if'         => array(
				'use_pagi' => 'on',
			),
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'pagination',
		);

		$fields['use_navi'] = array(
			'label'          => esc_html__( 'Navigation', 'mro-mro-events-divi-extention' ),
			'type'           => 'yes_no_button',
			'options'        => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'mobile_options' => true,
			'toggle_slug'    => 'carousel',
			'default'        => 'on',
		);

		$fields['navi_position'] = array(
			'label'          => esc_html__( 'Navi Vertical Position', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'default'        => '50%',
			'range_settings' => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'show_if'        => array(
				'use_navi'           => 'on',
				'slider_orientation' => 'horizontal',
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'navigation',
		);

		$fields['left_navi_position'] = array(
			'label'          => esc_html__( 'Left Navigation Position', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'default'        => '-50px',
			'range_settings' => array(
				'min'  => '-100',
				'max'  => '100',
				'step' => '1',
			),
			'show_if'        => array(
				'use_navi'           => 'on',
				'slider_orientation' => 'horizontal',
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'navigation',
		);

		$fields['right_navi_position'] = array(
			'label'          => esc_html__( 'Right Navigation Position', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'default'        => '-50px',
			'range_settings' => array(
				'min'  => '-100',
				'max'  => '100',
				'step' => '1',
			),
			'show_if'        => array(
				'use_navi'           => 'on',
				'slider_orientation' => 'horizontal',
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'navigation',
		);

		$fields['navi_hori_position'] = array(
			'label'          => esc_html__( 'Navi Horizontal Position', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'default'        => '50%',
			'range_settings' => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'show_if'        => array(
				'use_navi'           => 'on',
				'slider_orientation' => 'vertical',
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'navigation',
		);

		$fields['top_navi_ver_position'] = array(
			'label'          => esc_html__( 'Top Navigation Position', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'default'        => '-50px',
			'range_settings' => array(
				'min'  => '-100',
				'max'  => '100',
				'step' => '1',
			),
			'show_if'        => array(
				'use_navi'           => 'on',
				'slider_orientation' => 'vertical',
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'navigation',
		);

		$fields['bottom_navi_ver_position'] = array(
			'label'          => esc_html__( 'Bottom Navigation Position', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'default'        => '-50px',
			'range_settings' => array(
				'min'  => '-100',
				'max'  => '100',
				'step' => '1',
			),
			'show_if'        => array(
				'use_navi'           => 'on',
				'slider_orientation' => 'vertical',
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'navigation',
		);

		$fields['navi_size'] = array(
			'label'          => esc_html__( 'Navi Arrow Icon Size', 'mro-mro-events-divi-extention' ),
			'type'           => 'range',
			'range_settings' => array(
				'min'  => '1',
				'max'  => '100',
				'step' => '1',
			),
			'show_if'        => array(
				'use_navi' => 'on',
			),
			'default'        => 40,
			'validate_unit'  => false,
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'navigation',
		);

		$fields['use_prev_icon'] = array(
			'label'       => esc_html__( 'Custom Prev Arrow Icon', 'mro-mro-events-divi-extention' ),
			'type'        => 'yes_no_button',
			'options'     => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'default'     => 'off',
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'navigation',
		);

		$fields['prev_icon'] = array(
			'label'       => esc_html__( 'Select Prev Icon', 'mro-mro-events-divi-extention' ),
			'type'        => 'select_icon',
			'class'       => array( 'et-pb-font-icon' ),
			'default'     => '4',
			'show_if'     => array(
				'use_prev_icon' => 'on',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'navigation',
		);

		$fields['use_next_icon'] = array(
			'label'       => esc_html__( 'Custom Next Arrow Icon', 'mro-mro-events-divi-extention' ),
			'type'        => 'yes_no_button',
			'options'     => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'default'     => 'off',
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'navigation',
		);

		$fields['next_icon'] = array(
			'label'       => esc_html__( 'Select Next Icon', 'mro-mro-events-divi-extention' ),
			'type'        => 'select_icon',
			'class'       => array( 'et-pb-font-icon' ),
			'default'     => '5',
			'show_if'     => array(
				'use_next_icon' => 'on',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'navigation',
		);

		$fields['navi_color'] = array(
			'label'          => esc_html__( 'Arrow Color', 'mro-mro-events-divi-extention' ),
			'type'           => 'color-alpha',
			'default'        => et_builder_accent_color(),
			'show_if'        => array(
				'use_navi' => 'on',
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'navigation',
		);

		$fields['navi_background_color'] = array(
			'label'          => esc_html__( 'Arrow Background Color', 'mro-mro-events-divi-extention' ),
			'type'           => 'color-alpha',
			'custom_color'   => true,
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'navigation',
		);

		$fields['post_padding'] = array(
			'label'          => esc_html__( 'Post Item', 'mro-mro-events-divi-extention' ),
			'type'           => 'custom_margin',
			'mobile_options' => true,
			'default'        => '0px|0px|0px|0px',
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'post_item',
		);

		$fields['post_equal_height'] = array(
			'label'            => esc_html__( 'Use Equal Height', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'carousel',
			'description'      => esc_html__( 'This will make all post item equal height.', 'mro-mro-events-divi-extention' ),
			'default'          => 'off',
			'default_on_front' => 'off',
		);

		$fields['touch_move'] = array(
			'label'            => esc_html__( 'Disable Touch/Dragging', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'carousel',
			'default'          => 'off',
			'default_on_front' => 'off',
			'description'      => esc_html__( 'This option will prevent user to touch/drag the slide.', 'mro-mro-events-divi-extention' ),
		);

		$fields['grab'] = array(
			'label'            => esc_html__( 'Use Grab Cursor', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'toggle_slug'      => 'carousel',
			'default'          => 'on',
			'default_on_front' => 'on',
			'show_if'          => array(
				'touch_move' => 'off',
			),
			'description'      => esc_html__( 'This option may a little improve desktop usability. If true, user will see the "grab" cursor when hover on Carousel.', 'mro-mro-events-divi-extention' ),
		);

		$fields['button_vertical_alignment_on_off'] = array(
			'label'            => esc_html__( 'Align Button Vertically', 'mro-mro-events-divi-extention' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'mro-mro-events-divi-extention' ),
				'on'  => esc_html__( 'Yes', 'mro-mro-events-divi-extention' ),
			),
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'readmore',
			'default'          => 'off',
			'default_on_front' => 'off',
			'show_if'          => array(
				'post_equal_height' => 'on',
			),
			'description'      => esc_html__( 'Button Alignment when using Equalize Card Heights.', 'mro-mro-events-divi-extention' ),
		);

		$fields['button_vertical_alignment'] = array(
			'label'           => esc_html__( 'Vertical Alignment', 'mro-mro-events-divi-extention' ),
			'type'            => 'select',
			'option_category' => 'layout',
			'options'         => array(
				'top'    => esc_html__( 'Top', 'mro-mro-events-divi-extention' ),
				'center' => esc_html__( 'Center', 'mro-mro-events-divi-extention' ),
				'bottom' => esc_html__( 'Bottom', 'mro-mro-events-divi-extention' ),
			),
			'default'         => 'top',
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'readmore',
			'show_if'         => array(
				'button_vertical_alignment_on_off' => 'on',
			),
			'description'     => esc_html__( 'This setting determines the vertical alignment of your button. Your button can either be align to the top, vertically centered, or aligned to the bottom.', 'mro-mro-events-divi-extention' ),
		);

		$fields['post_item_bg_color'] = array(
			'label'          => esc_html__( 'Background Color', 'mro-mro-events-divi-extention' ),
			'type'           => 'color-alpha',
			'default'        => '#ffffff',
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'post_item',
		);

		$fields['meta_alignment'] = array(
			'label'          => esc_html__( 'Alignment', 'mro-mro-events-divi-extention' ),
			'type'           => 'select',
			'default'        => 'left',
			'mobile_options' => true,
			'options'        => array(
				'left'   => esc_html__( 'Left', 'mro-mro-events-divi-extention' ),
				'center' => esc_html__( 'Center', 'mro-mro-events-divi-extention' ),
				'right'  => esc_html__( 'Right', 'mro-mro-events-divi-extention' ),
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'meta',
		);

		$fields['content_wrapper'] = array(
			'label'          => esc_html__( 'Content Wrapper', 'mro-mro-events-divi-extention' ),
			'type'           => 'custom_margin',
			'mobile_options' => true,
			'hover'          => 'tabs',
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'margin_padding',
			'default'        => '20px|20px|20px|20px',
			'description'    => esc_html__( 'Here you can define a custom padding size for the Content Wrapper.', 'mro-mro-events-divi-extention' ),
		);

		$fields['__blogcarousel'] = array(
			'type'                => 'computed',
			'computed_callback'   => array( 'DSM_BlogCarousel', 'get_blogposts_html' ),
			'computed_depends_on' => array(
                    'post_type',
                    'meta_key',

				'posts_number',
				'posts_offset',
				'include_categories',
				'post_orderby',
				'post_sortby',
				'use_overlay',
				'overlay_icon',
				'title_level',
				'use_thumbnail',
				'use_title',
				'use_date',
				'meta_date',
				'use_category',
				'meta_seperator',
				'use_excerpt',
				'excerpt_length',
				'use_author',
				'use_readmore',
				'readmore_text',
				'custom_readmore',
				'use_bottom',
				'bottom_date',
				'bottom_author',
				'readmore_use_icon',
				'readmore_icon',

			),
			'computed_minimum'    => array(
				'posts_number',
			),
		);

		return $fields;
	}

	public static function get_blogposts_html( $args = array(), $conditional_tags = array(), $current_page = array() ) {

        date_default_timezone_set(get_option('timezone_string'));
		global $paged, $post, $wp_query;

		if ( self::$rendering ) {
			return '';
		}

		$defaults = array(
            'post_type'               => 'post',
            'meta_key'                => '',
			'posts_number'            => '',
			'posts_offset'            => '',
			'post_orderby'            => '',
			'post_sortby'             => '',
			'include_categories'      => '',
			'use_overlay'             => '',
			'overlay_icon'            => '',
			'title_level'             => '',
			'use_thumbnail'           => '',
			'lazyload'                => '',
			'use_title'               => '',
			'use_date'                => '',
			'meta_date'               => '',
			'use_excerpt'             => '',
			'excerpt_length'          => '',
			'use_author'              => '',
			'meta_seperator'          => '',
			'use_readmore'            => '',
			'readmore_url_new_window' => '',
			'custom_readmore'         => '',
			'use_bottom'              => '',
			'bottom_date'             => '',
			'bottom_author'           => '',
			'readmore_icon'           => '',
			'readmore_use_icon'       => '',
		);

        echo "<pre>";
//        print_r($args);
        echo "</pre>";

		$args = wp_parse_args( $args, $defaults );

		$is_front_page = et_fb_conditional_tag( 'is_front_page', $conditional_tags );
		$is_single     = et_fb_conditional_tag( 'is_single', $conditional_tags );
		$post_id       = isset( $current_page['id'] ) ? (int) $current_page['id'] : 0;



		$query_args = array(
                'post_type'      => $args['post_type'],
			'posts_per_page' => intval( $args['posts_number'] ),
			'post_status'    => array( 'publish', 'private', 'inherit' ),
			'perm'           => 'readable',
//			'post_type'      => 'post',
//			'orderby'        => $args['post_orderby'],
           'meta_key'       => $args['meta_key'], // Use the meta key from the 'meta_key' field
           'orderby'        => 'meta_value',
			'order'          => $args['post_sortby'],
			'offset'         => intval( $args['posts_offset'] ),
           'meta_query'     => array(
               array(
                   'key'     => $args['meta_key'],
                   'value'   =>  date('Y-m-d'),
                   'compare' => '>=', // Use the comparison operator from the 'compare' field
                    'type'    => 'DATE', // Type of the custom field (date)
                ),
           ),
		);


		$query_args['cat'] = implode( ',', self::filter_include_categories( $args['include_categories'], $post_id ) );

		// WP_Query doesn't return sticky posts when it performed via Ajax.
		// This happens because `is_home` is false in this case, but on FE it's true if no category set for the query.
		// Set `is_home` = true to emulate the FE behavior with sticky posts in VB.
		if ( empty( $query_args['cat'] ) ) {
			add_action(
				'pre_get_posts',
				function ( $query ) {
					if ( true === $query->get( 'et_is_home' ) ) {
						$query->is_home = true;
					}
				}
			);

			$query_args['et_is_home'] = true;
		}

		if ( $is_single ) {
			$main_query_post = ET_Post_Stack::get_main_post();

			if ( null !== $main_query_post ) {
				$query_args['post__not_in'][] = $main_query_post->ID;
			}
		}

		$query = new WP_Query( $query_args );

//        var_dump($query->request) ;

		$wp_query_page = $wp_query;

		// $wp_query = $query;
		$overlay_class           = 'on' === $args['use_overlay'] ? ' et_pb_has_overlay' : '';
		$custom_readmore_class   = 'on' === $args['custom_readmore'] ? 'et_pb_button' : '';
		$readmore_url_new_window = 'on' === $args['readmore_url_new_window'] ? '_blank' : '';

		// $wp_query->et_pb_blog_query = true;
		$query->et_pb_blog_query = true;

		self::$rendering = false;
		ob_start();

		if ( $query->have_posts() ) :

			while ( $query->have_posts() ) :
				$query->the_post();

				$width                  = (int) apply_filters( 'et_pb_blog_image_width', 1080 );
				$height                 = (int) apply_filters( 'et_pb_blog_image_height', 675 );
				$blog_thumbnail         = get_the_post_thumbnail( get_the_ID(), array( $width, $height ), array( 'class' => 'on' === $args['lazyload'] ? 'swiper-lazy' : 'skip-lazy' ) );
				$excerpt_length         = '' !== $args['excerpt_length'] ? intval( $args['excerpt_length'] ) : 270;
				$processed_header_level = et_pb_process_header_level( $args['title_level'], 'h2' );
				$processed_header_level = esc_html( $processed_header_level );
				$processed_header_level = et_core_esc_previously( $processed_header_level );
				$overlay_icon           = et_pb_process_font_icon( $args['overlay_icon'] );

				global $authordata;

				$readmore_use_icon = $args['readmore_use_icon'];
				$readmore_icon     = $args['readmore_icon'];

				$data_icon       = '5';
				$data_icon_class = '';

				if ( 'on' === $readmore_use_icon ) {
					$data_icon       = $readmore_icon ? et_pb_process_font_icon( $readmore_icon ) : '5';
					$data_icon_class = ' et_pb_custom_button_icon';
				}
				?>

				<article class="dsm-blog-carousel-item swiper-slide">
					<div class="dsm-grid-post-holder-inner">
						<?php if ( 'on' === $args['use_thumbnail'] ) : ?>
							<div class="dsm-entry-image">
								<?php if ( 'on' === $args['use_overlay'] ) : ?>
									<div class="dsm-entry-overlay fade-in">
										<a href="<?php esc_url( the_permalink() ); ?>">
											<span class="et-pb-icon et-pb-font-icon">
												<?php
													echo esc_attr( $overlay_icon );
												?>
											</span>
										</a>
									</div>
								<?php endif; ?>
								<div class="dsm-entry-thumbnail">
									<a href="<?php esc_url( the_permalink() ); ?>">
										<?php echo et_core_esc_previously( $blog_thumbnail ); ?>
									</a>
								</div>
							</div>
						<?php endif; ?>

						<div class="dsm-entry-wrapper">
						<?php if ( 'on' === $args['use_title'] ) : ?>
								<header class="dsm-entry-header">
										<<?php echo esc_attr( $processed_header_level ); ?> class="dsm-entry-title">
											<a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>">
												<?php the_title(); ?>
											</a>
									</<?php echo esc_attr( $processed_header_level ); ?>>
								</header>
						<?php endif; ?>

						<?php if ( 'on' === $args['use_author'] || 'on' === $args['use_date'] || 'on' === $args['use_category'] ) : ?>
							<div class="dsm-entry-meta">
								<?php if ( 'on' === $args['use_author'] ) : ?>
									<span class="dsm-posted-by"><?php echo et_core_esc_previously( et_pb_get_the_author_posts_link() ); ?></span>
								<?php endif; ?>
								<?php if ( 'on' === $args['use_date'] ) : ?>
									<span class="dsm-meta-seperator"><?php echo et_core_esc_previously( $args['meta_seperator'] ); ?></span>
									<span class="dsm-posted-on"><time datetime="<?php echo esc_html( get_the_date( $args['meta_date'] ) ); ?>"><?php echo esc_html( get_the_date( $args['meta_date'] ) ); ?></time></span>
								<?php endif; ?>
								<?php if ( 'on' === $args['use_category'] ) : ?>
									<span class="dsm-meta-seperator"><?php echo et_core_esc_previously( $args['meta_seperator'] ); ?></span>
									<span class="dsm-posted-category"><?php echo et_core_esc_previously( et_builder_get_the_term_list( ', ' ) ); ?></span>
								<?php endif; ?>
							</div>
							<?php endif; ?>

							<?php if ( 'on' === $args['use_excerpt'] && '' !== dsm_excerpt( $excerpt_length ) ) : ?>
							<div class="dsm-entry-content">
								<div class="dsm-post-excerpt">
									<p><?php echo esc_attr( dsm_excerpt( $excerpt_length ) ); ?></p>
								</div>
							</div>
							<?php endif; ?>

								<?php if ( 'on' === $args['use_readmore'] ) : ?>
									<div class="dsm-readmore-wrap et_pb_bg_layout_light">
										<a href="<?php esc_url( the_permalink() ); ?>" class="dsm-readmore-btn <?php echo esc_attr( $custom_readmore_class . $data_icon_class ); ?>" data-icon="<?php echo esc_attr( $data_icon ); ?>" target="<?php echo esc_attr( $readmore_url_new_window ); ?>"><?php echo esc_attr( $args['readmore_text'] ); ?></a>
									</div>
								<?php endif ?>

							<?php if ( 'on' === $args['use_bottom'] ) : ?>
								<div class="dsm-bottom-meta">
									<span class="dsm-bottom-meta-image">
										<img src="<?php echo et_core_esc_previously( get_avatar_url( $authordata->ID ) ); ?>">
									</span>
									<div class="dsm-bottom-meta-right">
										<?php if ( 'on' === $args['bottom_author'] ) : ?>
											<span class="dsm-posted-by">
												<?php echo et_core_esc_previously( et_pb_get_the_author_posts_link() ); ?>
											</span>
										<?php endif; ?>

										<?php if ( 'on' === $args['bottom_date'] ) : ?>
											<span class="dsm-posted-on">
												<time datetime="<?php echo et_core_esc_previously( get_the_date( $args['meta_date'] ) ); ?>">
													<?php echo et_core_esc_previously( get_the_date( $args['meta_date'] ) ); ?>
												</time>
											</span>
										<?php endif; ?>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</article>

				<?php
			endwhile;
		endif;

		unset( $wp_query->et_pb_blog_query );

		// $wp_query = $wp_query_page;
		$query = $wp_query_page;

		if ( ! $posts = ob_get_clean() ) {
			$posts = self::get_no_results_template( et_core_esc_previously( $processed_header_level ) );
		}

		if ( ! $posts ) {
			$posts = 'No Blog Post Found!';
		}

		self::$rendering = false;

		return $posts;
	}

	public function render( $attrs, $content, $render_slug ) {

		$this->apply_css( $render_slug );

		$columns              = $this->props['columns'];
		$rows_per_view        = $this->props['rows_per_view'];
		$rows_per_view_tablet = $this->props['rows_per_view_tablet'] ? $this->props['rows_per_view_tablet'] : $rows_per_view;
		$rows_per_view_phone  = $this->props['rows_per_view_phone'] ? $this->props['rows_per_view_phone'] : $rows_per_view_tablet;

		$columns_tablet = $this->props['columns_tablet'] ? $this->props['columns_tablet'] : $columns;
		$columns_phone  = $this->props['columns_phone'] ? $this->props['columns_phone'] : $columns_tablet;

		if ( '3' === $columns && '3' === $columns_tablet && '3' === $columns_phone ) {
			$columns_tablet = '2';
			$columns_phone  = '1';
		}

		$spacing        = $this->props['spacing'];
		$spacing_tablet = $this->props['spacing_tablet'] ? $this->props['spacing_tablet'] : $spacing;
		$spacing_phone  = $this->props['spacing_phone'] ? $this->props['spacing_phone'] : $spacing_tablet;

		$speed             = $this->props['speed'];
		$loop              = $this->props['loop'];
		$autoplay          = $this->props['autoplay'];
		$autoplay_speed    = $this->props['autoplay_speed'];
		$autoplay_viewport = $this->props['autoplay_viewport'];
		$navi              = $this->props['use_navi'];
		$pagi              = $this->props['use_pagi'];

		$navi_hori_position       = $this->props['navi_hori_position'];
		$top_navi_ver_position    = $this->props['top_navi_ver_position'];
		$bottom_navi_ver_position = $this->props['bottom_navi_ver_position'];

		$slider_orientation               = $this->props['slider_orientation'];
		$slider_container_height          = $this->props['slider_container_height'];
		$slider_effect                    = $this->props['slider_effect'];
		$slider_effect_shadows            = $this->props['slider_effect_shadows'];
		$slider_effect_coverflow_rotate   = $this->props['slider_effect_coverflow_rotate'];
		$slider_effect_coverflow_depth    = $this->props['slider_effect_coverflow_depth'];
		$slider_direction                 = $this->props['slider_direction'];
		$centered_slides                  = $this->props['centered_slides'];
		$multiple_slide_row               = $this->props['multiple_slide_row'];
		$slide_row                        = $this->props['slide_row'];
		$slide_row_tablet                 = $this->props['slide_row_tablet'] ? $this->props['slide_row_tablet'] : $slide_row;
		$slide_row_phone                  = $this->props['slide_row_phone'] ? $this->props['slide_row_phone'] : $slide_row_tablet;
		$pagi_style                       = $this->props['pagi_style'];
		$pagi_vertical_position           = $this->props['pagi_vertical_position'];
		$pause_on_hover                   = $this->props['pause_on_hover'];
		$mousewheel                       = $this->props['mousewheel'];
		$button_vertical_alignment_on_off = $this->props['button_vertical_alignment_on_off'];
		$button_vertical_alignment        = $this->props['button_vertical_alignment'];
		$touch_move                       = $this->props['touch_move'];
		$grab                             = $this->props['grab'];

		$orderclass  = self::get_module_order_class( $render_slug );
		$ordernumber = str_replace( '_', '', str_replace( $this->slug, '', $orderclass ) );

		$loop_check = 'on' === $loop ? true : false;

		$slides_per_view        = 'horizontal' === $slider_orientation ? $columns : $rows_per_view;
		$slides_per_view_tablet = 'horizontal' === $slider_orientation ? $columns_tablet : $rows_per_view_tablet;
		$slides_per_view_phone  = 'horizontal' === $slider_orientation ? $columns_phone : $rows_per_view_phone;

		$options = array();

		$options['data-orientation']             = esc_attr( $slider_orientation );
		$options['data-loop']                    = 'off' !== $multiple_slide_row ? false : $loop_check;
		$options['data-speed']                   = esc_attr( $speed );
		$options['data-columnsdesktop']          = esc_attr( $slides_per_view );
		$options['data-columnsphone']            = esc_attr( $slides_per_view_phone );
		$options['data-columnstablet']           = esc_attr( $slides_per_view_tablet );
		$options['data-autoplay']                = esc_attr( $autoplay );
		$options['data-autoplayspeed']           = esc_attr( $autoplay_speed );
		$options['data-ordernumber']             = esc_attr( $ordernumber );
		$options['data-spacing']                 = esc_attr( $spacing );
		$options['data-spacingtablet']           = esc_attr( $spacing_tablet );
		$options['data-spacingphone']            = esc_attr( $spacing_phone );
		$options['data-effect']                  = esc_attr( $slider_effect );
		$options['data-effect-shadows']          = esc_attr( $slider_effect_shadows );
		$options['data-effect-coverflow-rotate'] = esc_attr( $slider_effect_coverflow_rotate );
		$options['data-effect-coverflow-depth']  = esc_attr( $slider_effect_coverflow_depth );
		$options['data-centered']                = esc_attr( $centered_slides );
		$options['data-multi-row']               = esc_attr( $multiple_slide_row );
		$options['data-row']                     = esc_attr( $slide_row );
		$options['data-rowstablet']              = esc_attr( $slide_row_tablet );
		$options['data-rowsphone']               = esc_attr( $slide_row_phone );
		$options['data-pagi-button-style']       = esc_attr( $pagi_style );
		$options['data-pause-on-hover']          = esc_attr( $pause_on_hover );
		$options['data-touch-move']              = esc_attr( $touch_move );
		$options['data-grab']                    = esc_attr( $grab );
		$options['data-mousewheel']              = esc_attr( $mousewheel );
		'off' !== $autoplay && '' !== $autoplay_viewport ? $options['data-autoplay-viewport'] = esc_attr( $autoplay_viewport ) : '';

		$options = implode(
			' ',
			array_map(
				function ( $keys, $values ) {
					return "{$keys}='{$values}'";
				},
				array_keys( $options ),
				$options
			)
		);

		$navigation = '';
		$pagination = '';

		$next_icon = sprintf(
			'data-icon=%1$s',
			et_core_esc_previously( et_pb_process_font_icon( $this->props['next_icon'] ) )
		);

		$prev_icon = sprintf(
			'data-icon=%1$s',
			et_core_esc_previously( et_pb_process_font_icon( $this->props['prev_icon'] ) )
		);

		$next_icon = 'on' === $this->props['use_next_icon'] ? $next_icon : 'data-icon=5';
		$prev_icon = 'on' === $this->props['use_prev_icon'] ? $prev_icon : 'data-icon=4';

		if ( 'on' === $navi ) {
			if ( 'on' === $this->props['use_prev_icon'] ) {
				// Overlay Icon Styles.
				$this->generate_styles(
					array(
						'hover'          => false,
						'utility_arg'    => 'icon_font_family',
						'render_slug'    => $render_slug,
						'base_attr_name' => 'prev_icon',
						'important'      => true,
						'selector'       => '%%order_class%% .swiper-arrow-button.swiper-button-prev:after',
						'processor'      => array(
							'ET_Builder_Module_Helper_Style_Processor',
							'process_extended_icon',
						),
					)
				);
			}
			if ( 'on' === $this->props['use_next_icon'] ) {
				// Overlay Icon Styles.
				$this->generate_styles(
					array(
						'hover'          => false,
						'utility_arg'    => 'icon_font_family',
						'render_slug'    => $render_slug,
						'base_attr_name' => 'next_icon',
						'important'      => true,
						'selector'       => '%%order_class%% .swiper-arrow-button.swiper-button-next:after',
						'processor'      => array(
							'ET_Builder_Module_Helper_Style_Processor',
							'process_extended_icon',
						),
					)
				);
			}

			$navigation = sprintf(
				'<div class="swiper-button-next swiper-arrow-button dsm-arrow-button-next%1$s" %2$s></div>
				<div class="swiper-button-prev swiper-arrow-button dsm-arrow-button-prev%1$s" %3$s></div>',
				$ordernumber,
				esc_attr( $next_icon ),
				esc_attr( $prev_icon )
			);
		}

		if ( 'on' === $pagi ) {
			$pagination = sprintf(
				'<div class="swiper-pagination dsm-pagination%1$s"></div>',
				$ordernumber
			);
		}

		$html_content = self::get_blogposts_html( $this->props );
		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-swiper' );
				wp_enqueue_style( 'dsm-blog-carousel', plugin_dir_url( __DIR__ ) . 'BlogCarousel/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}
		wp_enqueue_script( 'dsm-blog-carousel' );

		$output = sprintf(
			'<div class="dsm-blog-carousel%5$s" %2$s>
				<div class="swiper-container" dir="%6$s">
					<div class="dsm-blog-carousel-wrapper swiper-wrapper">
						%1$s
					</div>
				</div>
				%3$s
				<div class="swiper-container-horizontal">
					%4$s
				</div>
			</div>',
			et_core_intentionally_unescaped( $html_content, 'html' ),
			et_core_esc_previously( $options ),
			et_core_intentionally_unescaped( $navigation, 'html' ),
			et_core_intentionally_unescaped( $pagination, 'html' ),
			'on' === $button_vertical_alignment_on_off ? esc_html( " dsm-readmore-button-alignment dsm-readmore-button-alignment-${button_vertical_alignment}" ) : '',
			esc_attr( $slider_direction )
		);

		return $output;
	}

	public function apply_css( $render_slug ) {

		$this->post_padding( $render_slug );
		$this->post_equal_height( $render_slug );
		$this->thumbnail_height( $render_slug );
		$this->bottom_image_width( $render_slug );
		$this->navi_position( $render_slug );
		$this->right_navi_position( $render_slug );
		$this->left_navi_position( $render_slug );
		$this->content_wrapper( $render_slug );
		$this->use_navi( $render_slug );
		$this->use_pagi( $render_slug );

		$navi_size                   = $this->props['navi_size'];
		$navi_size_tablet            = $this->props['navi_size_tablet'] ? $this->props['navi_size_tablet'] : $navi_size;
		$navi_size_phone             = $this->props['navi_size_phone'] ? $this->props['navi_size_phone'] : $navi_size_tablet;
		$navi_size_last_edited       = $this->props['navi_size_last_edited'];
		$navi_size_responsive_status = et_pb_get_responsive_status( $navi_size_last_edited );

		$meta_alignment                   = $this->props['meta_alignment'];
		$meta_alignment_tablet            = $this->props['meta_alignment_tablet'] ? $this->props['meta_alignment_tablet'] : $navi_size;
		$meta_alignment_phone             = $this->props['meta_alignment_phone'] ? $this->props['meta_alignment_phone'] : $navi_size_tablet;
		$meta_alignment_last_edited       = $this->props['meta_alignment_last_edited'];
		$meta_alignment_responsive_status = et_pb_get_responsive_status( $meta_alignment_last_edited );
		if ( 'left' !== $meta_alignment ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-entry-meta, %%order_class%% .dsm-bottom-meta',
					'declaration' => sprintf( 'text-align: %1$s;', $meta_alignment ),
				)
			);
		}

		if ( $meta_alignment_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-entry-meta, %%order_class%% .dsm-bottom-meta',
					'declaration' => sprintf( 'text-align: %1$s;', $meta_alignment_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-entry-meta, %%order_class%% .dsm-bottom-meta',
					'declaration' => sprintf( 'text-align: %1$s;', $meta_alignment_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( '' !== $navi_size ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next:after, %%order_class%% .swiper-button-next:before, %%order_class%% .swiper-button-prev:after, %%order_class%% .swiper-button-prev:before',
					'declaration' => sprintf( 'font-size: %1$spx;', $navi_size ),
				)
			);
		}

		if ( '' !== $navi_size_tablet && $navi_size_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next:after, %%order_class%% .swiper-button-next:before, %%order_class%% .swiper-button-prev:after, %%order_class%% .swiper-button-prev:before',
					'declaration' => sprintf( 'font-size: %1$spx;', $navi_size_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $navi_size_phone && $navi_size_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next:after, %%order_class%% .swiper-button-next:before, %%order_class%% .swiper-button-prev:after, %%order_class%% .swiper-button-prev:before',
					'declaration' => sprintf( 'font-size: %1$spx;', $navi_size_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'vertical' === $this->props['slider_orientation'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
						'declaration' => 'width: 40px !important; height: 40px !important; font-size: 40px;',
					)
				);

				$slider_container_height_last_edited       = $this->props['slider_container_height_last_edited'];
				$slider_container_height_responsive_status = et_pb_get_responsive_status( $slider_container_height_last_edited );

			if ( '' !== $this->props['slider_container_height'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container',
						'declaration' => sprintf(
							'height: %1$s;',
							$this->props['slider_container_height']
						),
					)
				);
			}

			if ( '' !== $this->props['slider_container_height_tablet'] && $slider_container_height_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container',
						'declaration' => sprintf(
							'height: %1$s;',
							$this->props['slider_container_height_tablet']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( '' !== $this->props['slider_container_height_phone'] && $slider_container_height_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container',
						'declaration' => sprintf(
							'height: %1$s;',
							$this->props['slider_container_height_phone']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			$navi_hori_position_last_edited       = $this->props['navi_hori_position_last_edited'];
			$navi_hori_position_responsive_status = et_pb_get_responsive_status( $navi_hori_position_last_edited );

			if ( '' !== $this->props['navi_hori_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
						'declaration' => sprintf(
							'left: %1$s;',
							$this->props['navi_hori_position']
						),
					)
				);
			}

			if ( '' !== $this->props['navi_hori_position_tablet'] && $navi_hori_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
						'declaration' => sprintf(
							'left: %1$s;',
							$this->props['navi_hori_position_tablet']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( '' !== $this->props['navi_hori_position_phone'] && $navi_hori_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
						'declaration' => sprintf(
							'left: %1$s;',
							$this->props['navi_hori_position_phone']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			$top_navi_ver_position_last_edited       = $this->props['top_navi_ver_position_last_edited'];
			$top_navi_ver_position_responsive_status = et_pb_get_responsive_status( $top_navi_ver_position_last_edited );

			if ( '' !== $this->props['top_navi_ver_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev.swiper-arrow-button',
						'declaration' => sprintf(
							'top: %1$s;',
							$this->props['top_navi_ver_position']
						),
					)
				);
			}

			if ( '' !== $this->props['top_navi_ver_position_tablet'] && $top_navi_ver_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev.swiper-arrow-button',
						'declaration' => sprintf(
							'top: %1$s;',
							$this->props['top_navi_ver_position_tablet']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( '' !== $this->props['top_navi_ver_position_phone'] && $top_navi_ver_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev.swiper-arrow-button',
						'declaration' => sprintf(
							'top: %1$s;',
							$this->props['top_navi_ver_position_phone']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			$bottom_navi_ver_position_last_edited       = $this->props['bottom_navi_ver_position_last_edited'];
			$bottom_navi_ver_position_responsive_status = et_pb_get_responsive_status( $bottom_navi_ver_position_last_edited );

			if ( '' !== $this->props['bottom_navi_ver_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next',
						'declaration' => sprintf(
							'bottom: %1$s;',
							$this->props['bottom_navi_ver_position']
						),
					)
				);
			}

			if ( '' !== $this->props['bottom_navi_ver_position_tablet'] && $bottom_navi_ver_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next',
						'declaration' => sprintf(
							'bottom: %1$s;',
							$this->props['bottom_navi_ver_position_tablet']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( '' !== $this->props['bottom_navi_ver_position_phone'] && $bottom_navi_ver_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next',
						'declaration' => sprintf(
							'bottom: %1$s;',
							$this->props['bottom_navi_ver_position_phone']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-container',
					'declaration' => 'width: 100%; overflow:hidden;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next::after',
					'declaration' => 'transform: rotate(90deg);',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next',
					'declaration' => 'top: auto;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-prev::after',
					'declaration' => 'transform: rotate(90deg);',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination.swiper-pagination-progressbar',
					'declaration' => 'width: 10px !important; height: 100% !important;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
					'declaration' => 'transform: translateY(-50%);',
				)
			);

			$pagi_ver_position_last_edited       = $this->props['pagi_ver_position_last_edited'];
			$pagi_ver_position_responsive_status = et_pb_get_responsive_status( $pagi_ver_position_last_edited );

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
					'declaration' => sprintf(
						'top: %1$s !important;',
						$this->props['pagi_ver_position']
					),
				)
			);

			if ( $pagi_ver_position_responsive_status ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
						'declaration' => sprintf(
							'top: %1$s !important;',
							$this->props['pagi_ver_position_tablet']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
						'declaration' => sprintf(
							'top: %1$s !important;',
							$this->props['pagi_ver_position_phone']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( 'right' === $this->props['pagi_vertical_position'] ) {

				$pagi_position_last_edited       = $this->props['pagi_position_last_edited'];
				$pagi_position_responsive_status = et_pb_get_responsive_status( $pagi_position_last_edited );

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
						'declaration' => sprintf(
							'right: %1$spx;',
							$this->props['pagi_position']
						),
					)
				);

				if ( $pagi_position_responsive_status ) {

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
							'declaration' => sprintf(
								'right: %1$spx;',
								$this->props['pagi_position_tablet']
							),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
							'declaration' => sprintf(
								'right: %1$spx;',
								$this->props['pagi_position_phone']
							),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
				}

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination.swiper-pagination-bullets',
						'declaration' => 'left: auto;',
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination.swiper-pagination-progressbar',
						'declaration' => 'left: auto !important; right: 0px !important;',
					)
				);
			}

			if ( 'left' === $this->props['pagi_vertical_position'] ) {

				$pagi_position_last_edited       = $this->props['pagi_position_last_edited'];
				$pagi_position_responsive_status = et_pb_get_responsive_status( $pagi_position_last_edited );

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
						'declaration' => sprintf(
							'left: %1$spx;',
							$this->props['pagi_position']
						),
					)
				);

				if ( $pagi_position_responsive_status ) {

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
							'declaration' => sprintf(
								'left: %1$spx;',
								$this->props['pagi_position_tablet']
							),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
							'declaration' => sprintf(
								'left: %1$spx;',
								$this->props['pagi_position_phone']
							),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
				}

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination.swiper-pagination-bullets',
						'declaration' => 'right: auto;',
					)
				);
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination.swiper-pagination-bullets',
					'declaration' => 'top: 10px;
                                          bottom: auto;
                                          width: auto !important;
                                          display: flex;
                                          flex-direction: column;
                                          gap: 8px;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination-bullets-dynamic',
					'declaration' => 'height: auto !important;',
				)
			);
		}

		$navi_background_color_last_edited       = $this->props['navi_background_color_last_edited'];
		$navi_background_color_responsive_status = et_pb_get_responsive_status( $navi_background_color_last_edited );

		if ( '' !== $this->props['navi_background_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
					'declaration' => sprintf(
						'background-color: %1$s;',
						$this->props['navi_background_color']
					),
				)
			);
		}

		if ( '' !== $this->props['navi_background_color_tablet'] && $navi_background_color_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
					'declaration' => sprintf(
						'background-color: %1$s;',
						$this->props['navi_background_color_tablet']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $this->props['navi_background_color_phone'] && $navi_background_color_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
					'declaration' => sprintf(
						'background-color: %1$s;',
						$this->props['navi_background_color_phone']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$navi_color_last_edited       = $this->props['navi_color_last_edited'];
		$navi_color_responsive_status = et_pb_get_responsive_status( $navi_color_last_edited );
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .swiper-button-next:after, %%order_class%% .swiper-button-next:before, %%order_class%% .swiper-button-prev:after, %%order_class%% .swiper-button-prev:before',
				'declaration' => sprintf( 'color: %1$s;', $this->props['navi_color'] ),
			)
		);

		if ( $navi_color_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next:after, %%order_class%% .swiper-button-next:before, %%order_class%% .swiper-button-prev:after, %%order_class%% .swiper-button-prev:before',
					'declaration' => sprintf( 'color: %1$s;', $this->props['navi_color_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next:after, %%order_class%% .swiper-button-next:before, %%order_class%% .swiper-button-prev:after, %%order_class%% .swiper-button-prev:before',
					'declaration' => sprintf( 'color: %1$s;', $this->props['navi_color_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$pagi_color_last_edited       = $this->props['pagi_color_last_edited'];
		$pagi_color_responsive_status = et_pb_get_responsive_status( $pagi_color_last_edited );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .swiper-pagination-bullet, %%order_class%% .swiper-pagination-progressbar',
				'declaration' => sprintf(
					'background: %1$s;',
					$this->props['pagi_color']
				),
			)
		);

		if ( $pagi_color_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination-bullet, %%order_class%% .swiper-pagination-progressbar',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['pagi_color_tablet']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination-bullet, %%order_class%% .swiper-pagination-progressbar',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['pagi_color_phone']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$pagi_active_color_last_edited       = $this->props['pagi_active_color_last_edited'];
		$pagi_active_color_responsive_status = et_pb_get_responsive_status( $pagi_active_color_last_edited );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .swiper-pagination-bullet.swiper-pagination-bullet-active, %%order_class%% .swiper-pagination-progressbar .swiper-pagination-progressbar-fill',
				'declaration' => sprintf(
					'background: %1$s;',
					$this->props['pagi_active_color']
				),
			)
		);

		if ( $pagi_active_color_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination-bullet.swiper-pagination-bullet-active, %%order_class%% .swiper-pagination-progressbar .swiper-pagination-progressbar-fill',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['pagi_active_color_tablet']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination-bullet.swiper-pagination-bullet-active, %%order_class%% .swiper-pagination-progressbar .swiper-pagination-progressbar-fill',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['pagi_active_color_phone']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$pagi_position_last_edited       = $this->props['pagi_position_last_edited'];
		$pagi_position_responsive_status = et_pb_get_responsive_status( $pagi_position_last_edited );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
				'declaration' => sprintf(
					'bottom: %1$spx;',
					$this->props['pagi_position']
				),
			)
		);

		if ( $pagi_position_responsive_status ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
					'declaration' => sprintf(
						'bottom: %1$spx;',
						$this->props['pagi_position_tablet']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-container-horizontal > .swiper-pagination-bullets, %%order_class%% .swiper-pagination-fraction, %%order_class%% .swiper-pagination-custom',
					'declaration' => sprintf(
						'bottom: %1$spx;',
						$this->props['pagi_position_phone']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'on' === $this->props['use_overlay'] ) {
			// Overlay Icon Styles.
			$this->generate_styles(
				array(
					'hover'          => false,
					'utility_arg'    => 'icon_font_family',
					'render_slug'    => $render_slug,
					'base_attr_name' => 'overlay_icon',
					'important'      => true,
					'selector'       => '%%order_class%% .dsm-entry-overlay .et-pb-icon',
					'processor'      => array(
						'ET_Builder_Module_Helper_Style_Processor',
						'process_extended_icon',
					),
				)
			);

			// Font Icon Size Style.
			$this->generate_styles(
				array(
					'base_attr_name' => 'overlay_icon_size',
					'selector'       => '%%order_class%% .dsm-entry-overlay .et-pb-icon',
					'css_property'   => 'font-size',
					'render_slug'    => $render_slug,
					'type'           => 'range',
					'hover'          => false,
				)
			);
		}

		$overlay_icon_color_last_edited       = $this->props['overlay_icon_color_last_edited'];
		$overlay_icon_color_responsive_status = et_pb_get_responsive_status( $overlay_icon_color_last_edited );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-entry-overlay .et-pb-icon',
				'declaration' => sprintf(
					'color: %1$s;',
					$this->props['overlay_icon_color']
				),
			)
		);

		if ( $overlay_icon_color_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-entry-overlay .et-pb-icon',
					'declaration' => sprintf(
						'color: %1$s;',
						$this->props['overlay_icon_color_tablet']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-entry-overlay .et-pb-icon',
					'declaration' => sprintf(
						'color: %1$s;',
						$this->props['overlay_icon_color_phone']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-entry-overlay',
				'declaration' => sprintf(
					'background: %1$s;',
					$this->props['hover_overlay_color']
				),
			)
		);

		$hover_overlay_color_last_edited       = $this->props['hover_overlay_color_last_edited'];
		$hover_overlay_color_responsive_status = et_pb_get_responsive_status( $hover_overlay_color_last_edited );
		if ( $hover_overlay_color_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-entry-overlay',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['hover_overlay_color_tablet']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-entry-overlay',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['hover_overlay_color_phone']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

		}

		$post_item_bg_color_last_edited       = $this->props['post_item_bg_color_last_edited'];
		$post_item_bg_color_responsive_status = et_pb_get_responsive_status( $post_item_bg_color_last_edited );
		if ( '' !== $this->props['post_item_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-blog-carousel-item',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['post_item_bg_color']
					),
				)
			);
		}

		if ( $post_item_bg_color_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-blog-carousel-item',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['post_item_bg_color_tablet']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-blog-carousel-item',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['post_item_bg_color_phone']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

	public function post_equal_height( $render_slug ) {

		$post_equal_height = $this->props['post_equal_height'];

		if ( 'on' === $post_equal_height ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-blog-carousel-item',
					'declaration' => 'height: auto;',
				)
			);
		}
	}

	public function post_padding( $render_slug ) {
		$this->apply_custom_margin_padding(
			$render_slug,
			'post_padding',
			'padding',
			'%%order_class%% .dsm-blog-carousel-item'
		);
	}

	public function thumbnail_height( $render_slug ) {
		$thumbnail_img_type                 = $this->props['thumbnail_img_type'];
		$thumbnail_height                   = $this->props['thumbnail_height'];
		$thumbnail_height_tablet            = $this->props['thumbnail_height_tablet'];
		$thumbnail_height_phone             = $this->props['thumbnail_height_phone'];
		$thumbnail_height_last_edited       = $this->props['thumbnail_height_last_edited'];
		$thumbnail_height_responsive_status = et_pb_get_responsive_status( $thumbnail_height_last_edited );

		if ( 'cover' === $thumbnail_img_type ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-entry-thumbnail',
					'declaration' => sprintf( 'height: %1$s;', $thumbnail_height ),
				)
			);

			if ( '' !== $thumbnail_height_tablet && $thumbnail_height_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-entry-thumbnail',
						'declaration' => sprintf( 'height: %1$s;', $thumbnail_height_tablet ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( '' !== $thumbnail_height_phone && $thumbnail_height_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-entry-thumbnail',
						'declaration' => sprintf( 'height: %1$s;', $thumbnail_height_phone ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		} else {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-entry-thumbnail img',
					'declaration' => sprintf( 'object-fit: %1$s;', esc_attr( $thumbnail_img_type ) ),
				)
			);
		}
	}

	public function bottom_image_width( $render_slug ) {

		$image_width                   = $this->props['image_width'];
		$image_width_tablet            = $this->props['image_width_tablet'];
		$image_width_phone             = $this->props['image_width_phone'];
		$image_width_last_edited       = $this->props['image_width_last_edited'];
		$image_width_responsive_status = et_pb_get_responsive_status( $image_width_last_edited );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-bottom-meta img',
				'declaration' => sprintf( 'width: %1$s;', $image_width ),
			)
		);

		if ( '' !== $image_width_tablet && $image_width_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-bottom-meta img',
					'declaration' => sprintf( 'width: %1$s;', $image_width_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $image_width_phone && $image_width_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-bottom-meta img',
					'declaration' => sprintf( 'width: %1$s;', $image_width_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

	public function navi_position( $render_slug ) {

		$navi_position                   = $this->props['navi_position'];
		$navi_position_tablet            = $this->props['navi_position_tablet'];
		$navi_position_phone             = $this->props['navi_position_phone'];
		$navi_position_last_edited       = $this->props['navi_position_last_edited'];
		$navi_position_responsive_status = et_pb_get_responsive_status( $navi_position_last_edited );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .swiper-arrow-button',
				'declaration' => sprintf( 'top: %1$s;', $navi_position ),
			)
		);

		if ( '' !== $navi_position_tablet && $navi_position_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-arrow-button',
					'declaration' => sprintf( 'top: %1$s;', $navi_position_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $navi_position_phone && $navi_position_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-arrow-button',
					'declaration' => sprintf( 'top: %1$s;', $navi_position_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

	public function content_wrapper( $render_slug ) {
		$this->apply_custom_margin_padding(
			$render_slug,
			'content_wrapper',
			'padding',
			'%%order_class%% .dsm-entry-wrapper'
		);
	}

	public function use_navi( $render_slug ) {

		$use_navi                   = $this->props['use_navi'];
		$use_navi_tablet            = $this->props['use_navi_tablet'];
		$use_navi_phone             = $this->props['use_navi_phone'];
		$use_navi_last_edited       = $this->props['use_navi_last_edited'];
		$use_navi_responsive_status = et_pb_get_responsive_status( $use_navi_last_edited );

		if ( 'on' !== $use_navi ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-arrow-button.swiper-button-next, %%order_class%% .swiper-arrow-button.swiper-button-prev',
					'declaration' => 'display: none;',
				)
			);
		} else {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-arrow-button.swiper-button-next, %%order_class%% .swiper-arrow-button.swiper-button-prev',
					'declaration' => 'display: flex;',
				)
			);
		}

		if ( 'on' !== $use_navi_tablet && $use_navi_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-arrow-button.swiper-button-next, %%order_class%% .swiper-arrow-button.swiper-button-prev',
					'declaration' => 'display: none;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		} else {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-arrow-button.swiper-button-next, %%order_class%% .swiper-arrow-button.swiper-button-prev',
					'declaration' => 'display: flex;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'on' !== $use_navi_phone && $use_navi_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-arrow-button.swiper-button-next, %%order_class%% .swiper-arrow-button.swiper-button-prev',
					'declaration' => 'display: none;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		} else {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-arrow-button.swiper-button-next, %%order_class%% .swiper-arrow-button.swiper-button-prev',
					'declaration' => 'display: flex;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

	public function use_pagi( $render_slug ) {
		$use_pagi                   = $this->props['use_pagi'];
		$use_pagi_tablet            = $this->props['use_pagi_tablet'];
		$use_pagi_phone             = $this->props['use_pagi_phone'];
		$use_pagi_last_edited       = $this->props['use_pagi_last_edited'];
		$use_pagi_responsive_status = et_pb_get_responsive_status( $use_pagi_last_edited );

		if ( 'on' !== $use_pagi ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination',
					'declaration' => 'display: none;',
				)
			);
		} else {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination',
					'declaration' => 'display: block;',
				)
			);
		}

		if ( 'on' !== $use_pagi_tablet && $use_pagi_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination',
					'declaration' => 'display: none;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		} else {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination',
					'declaration' => 'display: block;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'on' !== $use_pagi_phone && $use_pagi_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination',
					'declaration' => 'display: none;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		} else {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination',
					'declaration' => 'display: block;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

	public function right_navi_position( $render_slug ) {

		$right_navi_position                   = $this->props['right_navi_position'];
		$right_navi_position_tablet            = $this->props['right_navi_position_tablet'];
		$right_navi_position_phone             = $this->props['right_navi_position_phone'];
		$right_navi_position_last_edited       = $this->props['right_navi_position_last_edited'];
		$right_navi_position_responsive_status = et_pb_get_responsive_status( $right_navi_position_last_edited );

		if ( '-50px' !== $right_navi_position ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next',
					'declaration' => sprintf( 'right: %1$s;', $right_navi_position ),
				)
			);
		}

		if ( '' !== $right_navi_position_tablet && $right_navi_position_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next',
					'declaration' => sprintf( 'right: %1$s;', $right_navi_position_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $right_navi_position_phone && $right_navi_position_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next',
					'declaration' => sprintf( 'right: %1$s;', $right_navi_position_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

	public function left_navi_position( $render_slug ) {

		$left_navi_position                   = $this->props['left_navi_position'];
		$left_navi_position_tablet            = $this->props['left_navi_position_tablet'];
		$left_navi_position_phone             = $this->props['left_navi_position_phone'];
		$left_navi_position_last_edited       = $this->props['left_navi_position_last_edited'];
		$left_navi_position_responsive_status = et_pb_get_responsive_status( $left_navi_position_last_edited );

		if ( '-50px' !== $left_navi_position ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-prev',
					'declaration' => sprintf( 'left: %1$s;', $left_navi_position ),
				)
			);
		}

		if ( '' !== $left_navi_position_tablet && $left_navi_position_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-prev',
					'declaration' => sprintf( 'left: %1$s;', $left_navi_position_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $left_navi_position_phone && $left_navi_position_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-prev',
					'declaration' => sprintf( 'left: %1$s;', $left_navi_position_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
	}

	public function apply_custom_margin_padding( $function_name, $slug, $type, $class, $important = false ) {
		$slug_value                   = $this->props[ $slug ];
		$slug_value_tablet            = $this->props[ $slug . '_tablet' ];
		$slug_value_phone             = $this->props[ $slug . '_phone' ];
		$slug_value_last_edited       = $this->props[ $slug . '_last_edited' ];
		$slug_value_responsive_active = et_pb_get_responsive_status( $slug_value_last_edited );

		if ( isset( $slug_value ) && ! empty( $slug_value ) ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value, $type, $important ),
				)
			);
		}

		if ( isset( $slug_value_tablet ) && ! empty( $slug_value_tablet ) && $slug_value_responsive_active ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value_tablet, $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( isset( $slug_value_phone ) && ! empty( $slug_value_phone ) && $slug_value_responsive_active ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value_phone, $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
		if ( et_builder_is_hover_enabled( $slug, $this->props ) ) {
			if ( isset( $this->props[ $slug . '__hover' ] ) ) {
				$hover = $this->props[ $slug . '__hover' ];
				ET_Builder_Element::set_style(
					$function_name,
					array(
						'selector'    => $this->add_hover_to_order_class( $class ),
						'declaration' => et_builder_get_element_style_css( $hover, $type, $important ),
					)
				);
			}
		}
	}


	/**
	 * Force load global styles.
	 *
	 * @param array $assets_list Current global assets on the list.
	 *
	 * @return array
	 */
	public function dsm_load_required_divi_assets( $assets_list, $assets_args, $instance ) {
		$assets_prefix     = et_get_dynamic_assets_path();
		$all_shortcodes    = $instance->get_saved_page_shortcodes();
		$this->_cpt_suffix = et_builder_should_wrap_styles() && ! et_is_builder_plugin_active() ? '_cpt' : '';

		if ( ! isset( $assets_list['et_jquery_magnific_popup'] ) ) {
			$assets_list['et_jquery_magnific_popup'] = array(
				'css' => "{$assets_prefix}/css/magnific_popup.css",
			);
		}

		if ( ! isset( $assets_list['et_pb_overlay'] ) ) {
			$assets_list['et_pb_overlay'] = array(
				'css' => "{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
			);
		}

		// BlogCarousel & Swiper.

		if ( ! isset( $assets_list['dsm_swiper'] ) ) {
			$assets_list['dsm_swiper'] = array(
				'css' => DSM_DIR_PATH . 'public/css/swiper.css',
			);
		}
		if ( ! isset( $assets_list['dsm_blog_carousel'] ) ) {
			$assets_list['dsm_blog_carousel'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'BlogCarousel/style.css',
			);
		}
		if ( ! isset( $assets_list['et_icons_all'] ) ) {
			$assets_list['et_icons_all'] = array(
				'css' => "{$assets_prefix}/css/icons_all.css",
			);
		}
		if ( ! isset( $assets_list['et_icons_fa'] ) ) {
			$assets_list['et_icons_fa'] = array(
				'css' => "{$assets_prefix}/css/icons_fa_all.css",
			);
		}

		return $assets_list;
	}
}

new DSM_BlogCarousel();

function dsm_excerpt( $limit ) {

	$excerpt = explode( ' ', get_the_excerpt(), $limit );

	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( ' ', $excerpt );
	} else {
		$excerpt = implode( ' ', $excerpt );
	}

	$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );

	if ( '' === $excerpt && et_pb_is_pagebuilder_used( get_the_ID() ) ) {
		$post = get_post( get_the_ID() );

		$excerpt = wp_strip_all_tags( do_shortcode( $post->post_content ) );
		$excerpt = wp_trim_words( $excerpt, $limit, '' );
		return $excerpt;
	}

	return $excerpt;
}

add_filter( 'et_pb_all_fields_unprocessed_dsm_blog_carousel', 'dsm_readme_icon' );

function dsm_readme_icon( $fields_unprocessed ) {
	$fields_unprocessed['readmore_icon']['computed_affects']     = array( '__blogcarousel' );
	$fields_unprocessed['readmore_use_icon']['computed_affects'] = array( '__blogcarousel' );
	return $fields_unprocessed;
}
