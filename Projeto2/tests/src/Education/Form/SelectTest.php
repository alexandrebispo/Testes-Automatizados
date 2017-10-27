<?php 
	
	namespace Education\Form;

	class SelectTest extends \PHPUnit_Framework_TestCase
	{
		
		public function testVerificaSeOTipoDaClasseEstaCorreta()
    	{
			$this->assertInstanceOf("Education\Form\Select", new \Education\Form\Select());
    	}

    	public function testVerificaSeInterfaceImplementada()
		{
			$this->assertInstanceOf("Education\Form\AbstractField", new \Education\Form\Select());
		}

		public function testVerificaSetAndGetOpcoes()
		{
			$optionOne = $this->getMockBuilder('\Education\Form\Option')
            	->disableOriginalConstructor()
            	->setMethods(array("getText", "getValue"))
            	->getMock()
            ;

            $optionOne->method('getText')
            	->willReturn('Alexandre');
            $optionOne->method('getValue')
            	->willReturn("Alexandre");

            $optionTwo = $this->getMockBuilder('\Education\Form\Option')
            	->disableOriginalConstructor()
            	->setMethods(array("getText", "getValue"))
            	->getMock()
            ;

            $optionTwo->method('getText')
            	->willReturn('Rafael');
            $optionTwo->method('getValue')
            	->willReturn("Rafael");

			$select = new \Education\Form\Select();
			$select->addOption($optionOne);
			$select->addOption($optionTwo);
			

			$this->assertEquals(2, count($select->getOptions()));
		}

		public function testVerificaGetElement()
		{
			$optionOne = $this->getMockBuilder('\Education\Form\Option')
            	->disableOriginalConstructor()
            	->setMethods(array("getText", "getValue"))
            	->getMock()
            ;

            $optionOne->method('getText')
            	->willReturn('Alexandre');
            $optionOne->method('getValue')
            	->willReturn("Alexandre");

            $optionTwo = $this->getMockBuilder('\Education\Form\Option')
            	->disableOriginalConstructor()
            	->setMethods(array("getText", "getValue"))
            	->getMock()
            ;

            $optionTwo->method('getText')
            	->willReturn('Rafael');
            $optionTwo->method('getValue')
            	->willReturn("Rafael");

			$select = new \Education\Form\Select();
			$select->addOption($optionOne);
			$select->addOption($optionTwo);
			
			$this->assertNull($select->getElement());
		}

	}

?>