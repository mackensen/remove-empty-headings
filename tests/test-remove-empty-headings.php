<?php
/**
 * Class RemoveEmptyHeadingsTest
 *
 * @package Remove_Empty_Headings
 */

/**
 * Sample test case.
 */
class RemoveEmptyHeadingsTest extends WP_UnitTestCase {

	/**
	 * Simple example.
	 */
	public function test_removal() {
		// No changes.
		$page    = array(
			'title'        => 'Zeroeth page',
			'type'         => 'page',
			'post_status'  => 'publish',
			'post_content' => '<h4><a name="212">AAA</a></h4><h4><a name="247"></a>Lorem Ipsum</h4><h4><a name="213">BBB</a></h4>',
		);
		$pageid  = wp_insert_post( $page );
		$content = $this->cleanContent( get_post( $pageid )->post_content );
		$this->assertEquals( '<h4><a name="212">AAA</a></h4><h4><a name="247"></a>Lorem Ipsum</h4><h4><a name="213">BBB</a></h4>', $content );

		// Test a link.
		$page    = array(
			'title'        => 'First test page',
			'type'         => 'page',
			'post_status'  => 'publish',
			'post_content' => "<ul><li><a href=\"#247\">247</a></li></ul><h4><a name=\"212\"></a></h4>\n<h4><a name=\"247\"></a>Lorem Ipsum</h4>\n<h4><a name=\"213\"></a></h4>",
		);
		$pageid  = wp_insert_post( $page );
		$content = $this->cleanContent( get_post( $pageid )->post_content );
		$this->assertEquals( '<ul><li><a href="#247">247</a></li></ul><h4><a name="247"></a>Lorem Ipsum</h4>', $content );

		$page    = array(
			'title'        => 'Second test page',
			'type'         => 'page',
			'post_status'  => 'publish',
			'post_content' => '<h3>Introductory Courses</h3><br><h4><a name="105"></a>HIST 105: History of the Modern World</h4><br><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In hendrerit quam molestie tincidunt porttitor. Offered: Fall semester. [SS] <strong>Staff</strong></p><br><h4><a name="106"></a></h4>',
		);
		$pageid  = wp_insert_post( $page );
		$content = $this->cleanContent( get_post( $pageid )->post_content );
		$this->assertEquals( '<h3>Introductory Courses</h3><br><h4><a name="105"></a>HIST 105: History of the Modern World</h4><br><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In hendrerit quam molestie tincidunt porttitor. Offered: Fall semester. [SS] <strong>Staff</strong></p><br>', $content );
	}

	/**
	 * Strip out newlines and other garbage.
	 *
	 * @param string $string The content to clean.
	 * @return string
	 */
	private function cleanContent( $string ) {
		$string = preg_replace( '~[[:cntrl:]]~', '', $string );
		return $string;
	}
}
