<?php

require_once 'PHPUnit/Framework.php';

require_once dirname(__FILE__) . '/../../source/query.class.php';

/**
 * Test class for query.
 * Generated by PHPUnit on 2011-01-26 at 19:39:13.
 */
class queryTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var query
	 */
	protected $q;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp() {
		$this->q = new query;
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown() {
		$this->q = null;
	}
	/**
	 * Test adding a single table to the query
	 */
	public function testAddTable(){
		$this->q->table('test');
		$this->assertEquals(array('table'=>'test', 'alias'=>null), $this->q->tables[0]);
	}
	/**
	 * Test chaining of functions
	 */
	public function testTableChaining(){
		$this->q->table('test')
				->table('test_2')
				->table('test_3');
		$expected = array(
			array(
				'table'=>'test',
				'alias'=>null
			),
			array(
				'table'=>'test_2',
				'alias'=>null
			),
			array(
				'table'=>'test_3',
				'alias'=>null
			)
		);
		$this->assertEquals($expected, $this->q->tables);
	}
	public function testAddColumn(){
		$this->q->column('test');
		$expected = array(
			'column'=>'test',
			'alias'=>null
		);
		$this->assertEquals($expected, $this->q->columns[0]);
	}
}

?>
