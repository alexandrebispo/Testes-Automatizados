<?php 
	namespace Education\Form;

	/**
	* @Teste Input
	*/
	class InputTest extends \PHPUnit_Framework_TestCase
	{
		
		public function testVerificaSeOTipoDaClasseEstaCorreta()
		{
			//Asserts
			$this->assertInstanceOf("Education\Form\Input", new \Education\Form\Input());
		}

	}
?>