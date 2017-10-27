<?php 
	namespace Education\Form;

	use Education\Form\Form;

	/**
	* @Teste Form
	*/
	class FormTest extends \PHPUnit_Framework_TestCase
	{

		public function testeGetValidator()
		{
			
			$validator = $this->getMockBuilder('\Education\Validation\Validator')
				->disableOriginalConstructor()
                ->getMock()
            ;

			$form = new \Education\Form\Form($validator);
			$this->assertInstanceOf("Education\Validation\Validator", $form->getValidator());
		}

		public function testeGetAndSetAction(){
			$validator = $this->getMockBuilder('\Education\Validation\Validator')
				->disableOriginalConstructor()
                ->getMock()
            ;

			$form = new \Education\Form\Form($validator);
			$form->setAction('/alexandre.php');
			$this->assertEquals('/alexandre.php', $form->getAction());
		}

		/**
     	* @expectedException InvalidArgumentException
     	*/
		public function testeSetMethod()
		{
			$validator = $this->getMockBuilder('\Education\Validation\Validator')
				->disableOriginalConstructor()
                ->getMock()
            ;

			$form = new \Education\Form\Form($validator);
			$form->setMethod('alexandre');
		}

		public function testeGetAndSetMethod()
		{
			$validator = $this->getMockBuilder('\Education\Validation\Validator')
				->disableOriginalConstructor()
                ->getMock()
            ;

			$form = new \Education\Form\Form($validator);
			$this->assertEquals('POST', $form->getMethod());
		}

		/**
     	* @expectedException InvalidArgumentException
     	*/
		public function testeCreateFieldFailures()
		{
			$validator = $this->getMockBuilder('\Education\Validation\Validator')
				->disableOriginalConstructor()
                ->getMock()
            ;

			$form = new \Education\Form\Form($validator);
			$field = $form->createField('alexandre', ['name' => "categoria"]);

			$this->assertFalse($field);
		}

		public function testeCreateField()
		{
			$validator = $this->getMockBuilder('\Education\Validation\Validator')
				->disableOriginalConstructor()
                ->getMock()
            ;

			$form = new \Education\Form\Form($validator);
			$field = $form->createField('select', ['name' => "categoria"]);

			$this->assertInstanceOf('Education\Form\Select', $field);
		}

		public function testePopulate()
		{
			$validator = $this->getMockBuilder('\Education\Validation\Validator')
				->disableOriginalConstructor()
                ->getMock()
            ;

            $inputNome = $this->getMockBuilder('\Education\Form\Input')
            	->disableOriginalConstructor()
            	->setMethods(array("getName", "setValue"))
            	->getMock()
            ;

            $inputNome->method('getName')
            	->willReturn('nome');
            $inputNome->method('SetValue')
            	->willReturn(true);

            $inputValor = $this->getMockBuilder('\Education\Form\Input')
            	->disableOriginalConstructor()
            	->setMethods(array("getName", "setValue"))
            	->getMock()
            ;

            $inputValor->method('getName')
            	->willReturn('valor');
            $inputValor->method('SetValue')
            	->willReturn(true);

            $inputdesc = $this->getMockBuilder('\Education\Form\Input')
            	->disableOriginalConstructor()
            	->setMethods(array("getName", "setValue"))
            	->getMock()
            ;

            $inputdesc->method('getName')
            	->willReturn('descricao');
            $inputdesc->method('SetValue')
            	->willReturn(true);

            $form = new \Education\Form\Form($validator);

            $form->addField($inputNome);
            $form->addField($inputValor);
            $form->addField($inputdesc);

			$fieldDefs = array(
			    'nome' => 'Alexandre',
			    'valor' => '35',
			    'descricao' => 'Sapato preto'
			);

			$this->assertNull($form->populate($fieldDefs));
		}

		public function testeRender()
		{
			$validator = $this->getMockBuilder('\Education\Validation\Validator')
				->disableOriginalConstructor()
                ->getMock()
            ;

			$form = new \Education\Form\Form($validator);
			
			$inputValor = $this->getMockBuilder('\Education\Form\Input')
            	->disableOriginalConstructor()
            	->setMethods(array("getName", "setValue"))
            	->getMock()
            ;

            $inputValor->method('getName')
            	->willReturn('valor');
            $inputValor->method('SetValue')
            	->willReturn(true);

			$field = $form->addField($inputValor);

			$this->assertNull($form->render());
		}
	}
?>