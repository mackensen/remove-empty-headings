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
		$page = array(
			'title'        => 'Test page',
			'type'         => 'page',
			'post_status'  => 'publish',
			'post_content' => "<h3>Introductory Courses</h3>\n<h4><a name=\"105\"></a>HIST 105: History of the Modern World</h4>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In hendrerit quam molestie tincidunt porttitor. Offered: Fall semester. [SS] <strong>Staff</strong></p>\n<h4><a name=\"106\"></a></h4>",
		);
		$pageid = wp_insert_post( $page );
		$newpage = get_post( $pageid );
		$this->assertEquals( $newpage->post_content, "<h3>Introductory Courses</h3>\n<h4><a name=\"105\"></a>HIST 105: History of the Modern World</h4>\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In hendrerit quam molestie tincidunt porttitor. Offered: Fall semester. [SS] <strong>Staff</strong></p>" );
	}
}
