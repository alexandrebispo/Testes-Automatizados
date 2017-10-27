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

		public function testVerificaSeInterfaceImplementada()
		{
			$this->assertInstanceOf("Education\Form\AbstractField", new \Education\Form\Input());
		}

		public function testVerificaSetAndGetValue()
		{
			$input = new \Education\Form\Input();
			$input->setValue("Nome");
			
			$expected = "Nome";
			$atual = $input->getValue();

			$this->assertEquals($expected, $atual);
		}

		public function testverificaSetAndGetErrorMessage()
		{
			$input = new \Education\Form\Input();
			$input->setErrorMessage("Erro acusado!");
			$atual = $input->getErrorMessage();
			$this->assertEquals("Erro acusado!", $atual);
		}

		public function testverificaSetAndGetType()
		{
			$input = new \Education\Form\Input(array("type" => "Alexandre"));
			$atual = $input->getType();
			$this->assertEquals("Alexandre", $atual);
		}

		public function testverificaGetElement()
		{
			$input = new \Education\Form\Input(array('type' => 'text', 'name' => 'nome'));
			$result = $input->getElement();
			$this->assertNull($result);
		}

	}
?>