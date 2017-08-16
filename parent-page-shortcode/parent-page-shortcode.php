<?php
/**
 * Plugin Name: Parent Page Shortcode
 * Plugin URI:
 * Description: Plugin to display a link to the parent page
 * Author: Anderson Grudtner Martins
 * Author URI: http://anderson.grudtner.me
 * Version: 1.0.0
 *
 * Copyright (c) 2017 Anderson Grudtner Martins
 *
 * GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 * @package Parent Page Shortcode
 * @category Core
 * @author Anderson Grudtner Martins
 */

add_shortcode( 'parent-page', 'parent_page_shortcode_render' );

function parent_page_shortcode_render( $attrs ) {
	global $post;

	if ( ! empty( $post->post_parent ) ) {
		$parent = get_post( $post->post_parent );
		if ( ! empty( $parent ) ) {
			$html = sprintf(
				'<a href="%s">%s</a>',
				get_post_permalink( $parent->ID ),
				$parent->post_title
			);
			return $html;
		}
	}
}
