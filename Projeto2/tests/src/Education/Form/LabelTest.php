<?php 
	
	namespace Education\Form;

	/**
	* 
	*/
	class LabelTest extends \PHPUnit_Framework_TestCase
	{
		
		public function testVerificaSeOTipoDaClasseEstaCorreta()
    	{
    		//Asserts
			$this->assertInstanceOf("Education\Form\Label", new \Education\Form\Label());
    	}

    	public function testVerificaSeInterfaceImplementada()
		{
			$this->assertInstanceOf("Education\Form\FieldContainer", new \Education\Form\Label());
		}

		public function testVerificaSetAndGetText()
		{
			$label = new \Education\Form\Label();
			$label->setText("Alexandre");
			$result = $label->getText();
			$this->assertEquals("Alexandre", $result);
		}

		public function testVerificaSetAndGetFor()
		{
			$label = new \Education\Form\Label();
			$label->setFor("Alexandre");
			$result = $label->getFor();
			$this->assertEquals("Alexandre", $result);
		}

		public function testVerificaGetElement()
		{
			$label = new \Education\Form\Label();
			$label->setText("Nome: ");
			$label->setFor("nome");

			$field = new \Education\Form\Input(array('type' => 'text', 'name' => 'nome'));
			$field2 = new \Education\Form\Input(array('type' => 'text', 'name' => 'tel'));

			$label->addField($field);
			$label->addField($field2);

			$this->assertNull($label->getElement());
		}

	}
?>