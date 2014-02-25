<?php
App::uses('BoostCakeHtmlHelper', 'BoostCake.View/Helper');
App::uses('View', 'View');

class BoostCakeHtmlHelperTest extends CakeTestCase {

	public function setUp() {
		parent::setUp();
		$View = new View();
		$this->Html = new BoostCakeHtmlHelper($View);
	}

	public function tearDown() {
		unset($this->Html);
	}

	public function testUseTag() {
		$result = $this->Html->useTag(
			'radio', 'one', 'two', array('three' => 'four'), '<label for="one">label</label>'
		);
		$this->assertTags($result, array(
			'label' => array('for' => 'one'),
			'input' => array('type' => 'radio', 'name' => 'one', 'id' => 'two', 'three' => 'four'),
			' label',
			'/label'
		));
	}

}
