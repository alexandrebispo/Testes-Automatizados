<?php 
	
	namespace Education\Form;

	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    class ButtonTest extends \PHPUnit_Framework_TestCase
    {
    	
    	public function testVerificaSeOTipoDaClasseEstaCorreta()
    	{
    		//Asserts
			$this->assertInstanceOf("Education\Form\Button", new \Education\Form\Button());
    	}

    	public function testVerificaSeInterfaceImplementada()
		{
			$this->assertInstanceOf("Education\Form\AbstractField", new \Education\Form\Button());
		}

		public function testverificaSetAndGetErrorMessage()
		{
			$button = new \Education\Form\Button();
			$button->setErrorMessage("Erro acusado!");
			$atual = $button->getErrorMessage();
			$this->assertEquals("Erro acusado!", $atual);
		}

		public function testverificaSetAndGetType()
		{
			$button = new \Education\Form\Button();
			$button->setType("Alexandre");
			$atual = $button->getType();
			$this->assertEquals("Alexandre", $atual);
		}

		public function testverificaGetElement()
		{
			$button = new \Education\Form\Button(array('type' => 'text', 'name' => 'enviar', 'value' => 'Enviar'));
			$result = $button->getElement();
			$this->assertNull($result);
		}
    }
?>