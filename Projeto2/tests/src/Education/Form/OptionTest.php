<?php 

	namespace Education\Form;

	/**
	* @Teste Option
	*/
	class OptionTest extends \PHPUnit_Framework_TestCase
	{
		public function testVerificaSeOTipoDaClasseEstaCorreta()
		{
			//Asserts
			$this->assertInstanceOf("Education\Form\Option", new \Education\Form\Option());
		}

		public function testVerificaGetAndSetValue()
		{
			$option = new \Education\Form\Option();
			$option->setValue("alexandre");

			$this->assertEquals($option->getValue(), 'alexandre');
		}

		public function testVerificaGetAndSetText()
		{
			$option = new \Education\Form\Option();
			$option->setText("alexandre");

			$this->assertEquals($option->getText(), 'alexandre');
		}

		public function testVerificaGetElement()
		{
			$option = new \Education\Form\Option(array('text' => 'Alfred', 'value' => 'Alexandre'));
			$this->assertNull($option->getElement());
		}
	}
?>	