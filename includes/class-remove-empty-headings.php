<?php

/**
 * Removes empty headings from a text block.
 */
class Remove_Empty_Headings {
	/**
	 * Takes the page content and wraps it in a DOMDocument.
	 *
	 * @param string $content The page content.
	 * @return DOMDocument
	 */
	public static function load_document( $content ) {
		// This uses the logic from https://techsparx.com/software-development/wordpress/dom-document-pitfalls.html
		// and https://gist.github.com/westonruter/4b1fca6f20fbc95c3c34.
		$dom = new DOMDocument( null, 'UTF-8' );
		$dom->loadHTML( '<html><head><meta http-equiv="content-type" content="text/html; charset=utf-8"></head><body>' . $content . '</body></html>' );
		return $dom;
	}

	/**
	 * Given page content, remove all empty heading tags.
	 *
	 * @param string $content The current page content.
	 * @return string
	 */
	public static function remove_headings( $content ) {
		$dom = self::load_document( $content );
		$tags = array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' );
		foreach ( $tags as $tag ) {
			$headings = $dom->getElementsByTagName( $tag );
			if ( 0 == $headings->length ) {
				continue;
			}

			// Remove all headings with empty text.
			foreach ( $headings as $heading ) {
				if ( empty( $heading->textContent ) ) {
					$heading->parentNode->removeChild( $heading );
				}
			}
		}
		return $dom->saveHTML();
	}
}
