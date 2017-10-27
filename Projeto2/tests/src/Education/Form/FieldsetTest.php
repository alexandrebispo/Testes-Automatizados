<?php

namespace Education\Form;

class FieldsetTest extends \PHPUnit_Framework_TestCase
{
	
	public function testVerificaSeOTipoDaClasseEstaCorreta()
	{
		//Asserts
		$this->assertInstanceOf("Education\Form\Fieldset", new \Education\Form\Fieldset());
	}

	public function testVerificaSeInterfaceImplementada()
	{
		$this->assertInstanceOf("Education\Form\FieldContainer", new \Education\Form\Fieldset());
	}

	public function testVerificaSetAndGetLegend()
	{
		$fieldset = new \Education\Form\Fieldset();
		$fieldset->setLegend("Form Teste");
		$atual = $fieldset->getLegend();
		$this->assertEquals("Form Teste", $atual);
	}

	public function testverificaGetElement()
	{
		$fieldset = new \Education\Form\Fieldset();
		$fieldset->setLegend("Form Teste");
		$result = $fieldset->getElement();
		$this->assertNull($result);
	}
}

?>