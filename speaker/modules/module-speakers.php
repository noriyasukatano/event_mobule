<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Speakers_Module extends Themify_Builder_Module {
	function __construct() {
		parent::__construct(array(
			'name' => __( 'Speakers', 'speakers' ),
			'slug' => 'speakers'
		));
	}

	public function get_options() {
		$posts_speakers = get_posts(array(
					'post_type' => 'speaker_themes',
				  'numberposts' => -1)
				);

		$speakers = array();
		if($posts_speakers){
			foreach($posts_speakers as $post){
				$dataNameEn = get_field("name_en", $post->ID);
				$part_arry = array('name' => $dataNameEn, 'value' => __($dataNameEn, 'themify'));
				array_push($speakers, $part_arry);
			}
		}


			$option = array(
				array(
					'id' => 'style_speaker',
					'type' => 'layout',
					'label' => __( 'Speaker Style', 'themify' ),
					'options' => array(
						array( 'img' => 'image-top.png', 'value' => 'image-top', 'label' => __( 'Speaker Top', 'themify' ) ),
						array( 'img' => 'image-left.png', 'value' => 'image-left', 'label' => __( 'Speaker Left', 'themify' ) ),
					),
				),
				array(
						'id' => 'column',
						'type' => 'select',
						'label' => __('PC Column number', 'themify'),
						'options' => array(
							1 => __( '1 Column', 'themify' ),
							2 => __( '2 Column', 'themify' ),
							3 => __( '3 Column', 'themify' ),
							4 => __( '4 column', 'themify' ),
							5 => __( '5 column', 'themify' ),
						)
				),
				array(
					'id' => 'sp_column',
					'type' => 'checkbox',
					'label' => __('SP Column number', 'themify'),
					'options' => array(
						array('name' => '1 column', 'value' => __('sp_one_column', 'themify')),
					),
				),
				array(
					'id' => 'img_width',
					'type' => 'text',
					'label' => __('Image Width', 'themify'),
					'class' => 'small',
				),
				array(
					'id' => 'popup',
					'type' => 'checkbox',
					'label' => __('Popup', 'themify'),
					'options' => array(
						array('name' => 'popup', 'value' => __('Popup', 'themify')),
					),
				),
				array(
					'id' => 'jp_tx',
					'type' => 'checkbox',
					'label' => __('Japanese Text', 'themify'),
					'options' => array(
						array('name' => 'japanese_tx_name', 'value' => __('Show japanese name', 'themify')),
						array('name' => 'japanese_tx_copy', 'value' => __('Show japanese copy', 'themify')),
						array('name' => 'japanese_tx_title', 'value' => __('Show japanese title', 'themify')),
						array('name' => 'japanese_tx_profile', 'value' => __('Show japanese profile', 'themify')),
					),
				),
				array(
					'id' => 'english_tx',
					'type' => 'checkbox',
					'label' => __('English Text', 'themify'),
					'options' => array(
						array('name' => 'english_tx_name', 'value' => __('Show english name', 'themify')),
						array('name' => 'english_tx_copy', 'value' => __('Show english copy', 'themify')),
						array('name' => 'english_tx_title', 'value' => __('Show english title', 'themify')),
						array('name' => 'english_tx_profile', 'value' => __('Show english profile', 'themify')),
					),
				),
				array(
					'id' => 'data',
					'type' => 'checkbox',
					'label' => __('Speakers', 'themify'),
					'options' => $speakers,
				),
			);
			return $option;
		}
	};

Themify_Builder_Model::register_module( 'Speakers_Module' );
