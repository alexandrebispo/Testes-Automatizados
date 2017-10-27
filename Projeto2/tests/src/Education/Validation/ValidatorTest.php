<?php 
	namespace Education\Validation;

	use Education\Validation\Validator;

	/**
	* @Teste Validator
	*/
	class ValidatorTest extends \PHPUnit_Framework_TestCase
	{
		
		public function testeSeTipoDaClasseRequest()
		{
			$request = new \Education\Http\Request();
			$this->assertInstanceOf("Education\Http\Request", $request);
			return $request;
		}

		/**
		* @depends testeSeTipoDaClasseRequest
		*/
		public function testeVerificaOTipoDeClasseEstaCorreta(\Education\Http\Request $request)
		{
			$validator = new \Education\Validation\Validator($request);
			$this->assertInstanceOf("Education\Validation\Validator", $validator);
			return $validator;
		}

		public function testeAddRule()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);
			
			$validator->addRule(array('element' => 'alexandre', 'rules' => array(array('rule' => 'is_required'))));
			$validator->addRule(array('element' => 30, 'rules' => array(array('rule' => 'is_numeric'))));
			$validator->addRule(array('element' => 'Descrição', 'rules' => array(array('rule' => 'max_length', 'params' => array('max' => 200)))));

			$comp = array(array('element' => 'alexandre', 'rules' => array(array('rule' => 'is_required'))), array('element' => 30, 'rules' => array(array('rule' => 'is_numeric'))), array('element' => 'Descrição', 'rules' => array(array('rule' => 'max_length', 'params' => array('max' => 200)))));

			$this->assertEquals($comp, $validator->getRules());

		}

		public function testeRenderSemErrorMessages()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);

			$this->assertNull($validator->renderErrorMessages());
		}

		public function testeIsRequired()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);

			$form1 = new \Education\Form\Form($validator);
			$inputNome = new \Education\Form\Input(['type' => 'text', 'name' => 'nome']);
			$inputNome->setValue("alexandre");

			$inputSobreNome = new \Education\Form\Input(['type' => 'text', 'name' => 'nome']);
			$inputSobreNome->setValue("Bispo");

			$this->assertTrue($validator->is_required($inputNome));
			$this->assertTrue($validator->is_required($inputSobreNome));
		}

		public function testeIsRequiredReturnFalse()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);

			$form1 = new \Education\Form\Form($validator);
			$inputNome = new \Education\Form\Input(['type' => 'text', 'name' => 'nome']);

			$inputSobreNome = new \Education\Form\Input(['type' => 'text', 'name' => 'nome']);
			$inputSobreNome->setValue(null);

			$this->assertFalse($validator->is_required($inputNome));
			$this->assertFalse($validator->is_required($inputSobreNome));
		}

		public function testeGetFieldsWithError()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);

			$form1 = new \Education\Form\Form($validator);
			$inputNome = new \Education\Form\Input(['type' => 'text', 'name' => 'nome']);

			$inputSobreNome = new \Education\Form\Input(['type' => 'text', 'name' => 'nome']);
			$inputSobreNome->setValue(null);

			$validator->is_required($inputNome);
			$validator->is_required($inputSobreNome);

			$this->assertCount(2, $validator->getFieldsWithError());
		}

		public function testeGetMessages()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);

			$form1 = new \Education\Form\Form($validator);
			$inputNome = new \Education\Form\Input(['type' => 'text', 'name' => 'nome']);

			$inputSobreNome = new \Education\Form\Input(['type' => 'text', 'name' => 'Sobrenome']);
			$inputSobreNome->setValue(null);

			$validator->is_required($inputNome);
			$validator->is_required($inputSobreNome);
			
			$this->assertCount(2, $validator->getMessages());
		}

		public function testeIsNumeric()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);

			$form1 = new \Education\Form\Form($validator);

			$inputValor = new \Education\Form\Input(['type' => 'text', 'name' => 'Valor1']);
			$inputValor2 = new \Education\Form\Input(['type' => 'text', 'name' => 'Valor2']);
			$inputValor3 = new \Education\Form\Input(['type' => 'text', 'name' => 'Valor3']);

			$inputValor2->setValue(1);
			$inputValor3->setValue(null);

			$this->assertTrue($validator->is_numeric($inputValor2));
			$this->assertFalse($validator->is_numeric($inputValor3));
			$this->assertFalse($validator->is_numeric($inputValor));
		}

		public function testeMax_length()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);

			$form1 = new \Education\Form\Form($validator);

			$inputValor = new \Education\Form\Input(['type' => 'text', 'name' => 'Valor1']);
			$inputValor2 = new \Education\Form\Input(['type' => 'text', 'name' => 'Valor2']);
			$inputValor3 = new \Education\Form\Input(['type' => 'text', 'name' => 'Valor3']);

			$inputValor2->setValue("Alexandre");
			$inputValor3->setValue(null);

			$this->assertTrue($validator->max_length($inputValor2, array('max' => 10)));
			$this->assertFalse($validator->max_length($inputValor3, array('max' => 9)));
			$this->assertFalse($validator->max_length($inputValor, array('max' => 10)));
		}

		/**
		*	@expectedException InvalidArgumentException
		*/
		public function testeValidateError()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);

			$form1 = new \Education\Form\Form($validator);
			$inputValor = new \Education\Form\Input(['type' => 'text', 'name' => 'Valor1']);
			$validator->validate();
		}

		public function testeValidate()
		{
			$request = new \Education\Http\Request();
			$validator = new \Education\Validation\Validator($request);

			$form1 = new \Education\Form\Form($validator);
			$inputValor1 = new \Education\Form\Input(['type' => 'text', 'name' => 'Valor1']);
			$inputValor2 = new \Education\Form\Input(['type' => 'text', 'name' => 'Valor2']);
			$inputValor3 = new \Education\Form\Input(['type' => 'text', 'name' => 'Valor3']);

			$form1->addField($inputValor1);
			$form1->addField($inputValor2);
			$form1->addField($inputValor3);

			$inputValor1->setValue('Alexandre');
			$inputValor2->setValue('10');
			$inputValor3->setValue('Sapato preto');

			$validator->addRule(array('element' => $inputValor1, 'rules' => array(array('rule' => 'is_required'))));
			$validator->addRule(array('element' => $inputValor2, 'rules' => array(array('rule' => 'is_numeric'))));
			$validator->addRule(array('element' => $inputValor3, 'rules' => array(array('rule' => 'max_length', 'params' => array('max' => 200)))));
			//Se return error === true return not error === null
			$this->assertNull($validator->validate());
		}

	}
?>