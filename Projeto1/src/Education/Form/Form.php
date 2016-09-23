<?php 

	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

  namespace Education\Form;

  use Education\Interfaces\FormFieldInterface;
  use Education\Interfaces\FormElementInterface;
  use Education\Validation\Validator;
  // Estas duas linhas acima pode ser representadas por, use Education\Interfaces\{FormElementInterface, FormFieldInterface};

  use Education\Form\FieldContainer;

    class Form extends FieldContainer implements FormElementInterface, FormFieldInterface
    {
        protected $validator;
        protected $method = "POST";
        protected $action = "/";
        protected $fields = [];

        public function __construct(Validator $validator)
        {
            $this->validator = $validator;
        }

        /**
        * @return Validator
        */
        public function getValidator()
        {
          return $this->validator;
        }

        /**
        * @param string $method
        * @return Form
        */
        public function setMethod($method)
        {
          $this->method = $method;
          return $this->method;
        }

        /**
        * @return $method
        */
        public function getMethod()
        {
          return $this->method;
        }

        /**
        * @param string $action
        * @return Form
        */
        public function setAction($action)
        {
          $this->action = $action;
          return $this->action;
        }

        /**
        * @return $action
        */
        public function getAction()
        {
          return $this->action;
        }

        /**
        * @param string $fieldName
        * @param array $fieldAttributes
        * @return bool|FormElement
        */
        public function createField($fieldName, $fieldAttributes = [])
        {
          $namespace = "Education\\Form\\";
          $className = $namespace . ucfirst(strtolower($fieldName));
          
          if (class_exists($className))
          {
            return new $className($fieldAttributes); 
          }

          return false;
        }

        /**
        * Prints an HTML form
        */
        public function render($placement = 'inField')
        {

          $this->validator->validate();

          if ($placement == 'top' || $placement == 'bottom') {
            foreach ($this->validator->getFieldsWithError() as $field) {
              $field->setErrorMessage(null);
            }
          }

          if ($placement == 'top') {
            $this->validator->renderErrorMessages("<li class='alert alert-danger'>");
          }

          if($placement == 'bottom'){
            $this->validator->renderErrorMessages("<li class='alert alert-danger'>");
          }

          echo "<form method='" . $this->method . "' action='" . $this->action . "'>";

          foreach ($this->fields as $field) {
            $field->getElement();
          }

          echo "<form/>";
        }


    }

 ?>