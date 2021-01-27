<?php

/**
 * Plugin Name:       ProteusThemes Shortcodes
 * Plugin URI:        https://github.com/proteusthemes/pt-shortcodes
 * Description:       ProteusThemes shortcodes used in our themes.
 * Version:           1.7.3
 * Author:            ProteusThemes
 * Author URI:        https://www.proteusthemes.com/
 * Text Domain:       pt-shortcodes
 */

// If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class PT_Shortcodes {

	private $shortcode_settings;

	function __construct() {
		$this->shortcode_settings = apply_filters( 'pt-shortcodes/shortcode_settings', array(
			'fa_version' => 4,
		) );

		// Initialize shortcodes
		add_shortcode( 'fa', array ( $this , 'fa_shortcode' ) );
		add_shortcode( 'button', array ( $this , 'button_shortcode' ) );
		add_shortcode( 'zocial', array( $this, 'sc_zocial' ) );

		// Add shortcodes in text widget.
		if ( apply_filters( 'pt/widget_text_do_shortcode', false ) || apply_filters( 'pt/convert_widget_text', false ) ) {
			add_filter( 'widget_text', 'do_shortcode' );
		}
	}

	/**
	 * Shortcode for Font Awesome
	 * @param  array $atts
	 * @return string HTML
	 */
	function fa_shortcode( $atts ) {
		$fa_prefix = ( 4 < $this->shortcode_settings['fa_version'] ) ? '' : 'fa ';

		$atts = shortcode_atts(
			apply_filters(
				'pt-shortcodes/fa_shortcode_attributes',
				array(
					'icon'   => 'fa-home',
					'href'   => '',
					'color'  => '',
					'target' => '_self',
				)
			),
			$atts
		);

		return apply_filters(
			'pt-shortcodes/fa_shortcode_output',
			sprintf(
				'%1$s<span class="%2$s"%3$s></span>%4$s',
				! empty( $atts['href'] ) ? '<a class="icon-container" href="' . ( isset( $atts['href'] ) ? esc_url( $atts['href'] ) : '#' ) . '" target="' . esc_attr( $atts['target'] ) . '">' : '<span class="icon-container">',
				$fa_prefix . esc_attr( strtolower( $atts['icon'] ) ),
				! empty( $atts['color'] ) ? ' style="color:' . esc_attr( $atts['color'] ) . ';"' : '',
				! empty( $atts['href'] ) ? '</a>' : '</span>'
			),
			$atts
		);
	}


	/**
	 * Shortcode for Buttons
	 * @param  array $atts
	 * @return string HTML
	 */
	function button_shortcode( $atts, $content = '' ) {
		$fa_prefix = ( 4 < $this->shortcode_settings['fa_version'] ) ? '' : 'fa ';

		$atts = shortcode_atts(
			apply_filters(
				'pt-shortcodes/button_shortcode_attributes',
				array(
					'style'     => 'primary',
					'href'      => '#',
					'target'    => '_self',
					'corners'   => '',
					'fa'        => null,
					'fullwidth' => false,
					'class'     => '',
				)
			),
			$atts
		);

		return apply_filters(
			'pt-shortcodes/button_shortcode_output',
			sprintf(
				'<a class="btn  %1$s%2$s%3$s%4$s" href="%5$s" target="%6$s">%7$s %8$s</a>',
				'btn-' . esc_attr( strtolower( $atts['style'] ) ),
				'rounded' == $atts['corners'] ? '  btn-rounded' : '',
				'true' == $atts['fullwidth'] ? '  col-xs-12' : '',
				! empty( $atts['class'] ) ? '  ' . esc_attr( $atts['class'] ) : '',
				isset( $atts['href'] ) ? esc_url( $atts['href'] ) : '#',
				esc_attr( $atts['target'] ),
				isset( $atts['fa'] ) ? '<i class="' . $fa_prefix . esc_attr( $atts['fa'] )  . '"></i> ' : '',
				wp_kses_post( $content )
			),
			$atts,
			$content
		);
	}


	/**
	 * Shortcode for zocial icons.
	 *
	 * @param  array $atts
	 * @return string HTML
	 */
	public function sc_zocial( $atts ) {
		if ( apply_filters( 'pt-shortcodes/enable_zocial_shortcode', false ) ) {
			extract( shortcode_atts( array(
				'service' => 'acrobat',
				'href'    => '#',
				'target'  => '_self',
			), $atts ) );

			return '<a class="social-container" href="' . esc_html( $href ) . '" target="' . esc_attr( $target ) . '"><span class="zocial-' . esc_attr( $service ) . '"></span></a>';
		}

		return false;
	}
}

add_action( 'after_setup_theme', function() {
	$pt_shortcodes = new PT_Shortcodes();
} );
