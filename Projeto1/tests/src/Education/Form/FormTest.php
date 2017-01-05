<?php 
	namespace Education\Form;

	use Education\Form\Form;

	/**
	* @Teste Form
	*/
	class FormTest extends \PHPUnit_Framework_TestCase
	{
		public function testeClasseRequest()
		{
			$request = new \Education\Http\Request();
			$this->assertInstanceOf("Education\Http\Request", $request);
			return $request;
		}

		/**
		* @depends testeClasseRequest
		*/
		public function testeClasseValidator(\Education\Http\Request $request)
		{
			$validator = new \Education\Validation\Validator($request);
			$this->assertInstanceOf("Education\Validation\Validator", $validator);
			return $validator;
		}
		
		/**
		* @depends testeClasseValidator
		*/
		public function testVerificaSeOTipoDaClasseEstaCorreta(\Education\Validation\Validator $validator)
		{
			//Asserts
			$this->assertInstanceOf("Education\Form\FieldContainer", new \Education\Form\Form($validator));
		}

		public function testeGetValidator()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);
			$form = new \Education\Form\Form($validator);
			$this->assertInstanceOf("Education\Validation\Validator", $form->getValidator());
		}

		public function testeGetAndSetAction(){
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);
			$form = new \Education\Form\Form($validator);
			$form->setAction('/alexandre.php');
			$this->assertEquals('/alexandre.php', $form->getAction());
		}

		/**
     	* @expectedException InvalidArgumentException
     	*/
		public function testeSetMethod()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);
			$form = new \Education\Form\Form($validator);
			$form->setMethod('alexandre');
		}

		public function testeGetAndSetMethod()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);
			$form = new \Education\Form\Form($validator);
			$this->assertEquals('POST', $form->getMethod());
		}

		/**
     	* @expectedException InvalidArgumentException
     	*/
		public function testeCreateFieldFailures()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);
			$form = new \Education\Form\Form($validator);
			$field = $form->createField('alexandre', ['name' => "categoria"]);

			$this->assertFalse($field);
		}

		public function testeCreateField()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);
			$form = new \Education\Form\Form($validator);
			$field = $form->createField('select', ['name' => "categoria"]);

			$this->assertInstanceOf('Education\Form\Select', $field);
		}

		public function testeRender()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);
			$form = new \Education\Form\Form($validator);
			$input = new \Education\Form\Input(['type' => 'text', 'name' => 'valor']);
			$field = $form->addField($input);

			$this->assertNull($form->render());
		}
	}
?>