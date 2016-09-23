<?php 
	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

	namespace Education\Validation;

	use Education\Http\Request;
	use Education\Interfaces\ValidatorInterface;
	
	class Validator implements ValidatorInterface
	{
		private $request;

		private $rules = [];
		private $messages = [];
		private $fieldsWithError = [];

		public function __construct(Request $request)
		{
			$this->request = $request;
		}

		public function validate()
		{
			if (count($this->rules) == 0){
				throw new \InvalidArgumentException("Nenhuma regra de validação foi recebida.");
			}

			foreach ($this->rules as $arrayRules) {
				$element = $arrayRules['element'];
				$rules = $arrayRules['rules'];

				foreach ($rules as $rule) {
					if (isset($rule['params'])) {
						$this->$rule['rule']($element, $rule['params']);
                        $this->renderErrorMessages();
					} else {
						$this->$rule['rule']($element);
                        $this->renderErrorMessages();
					}
				}
			}
		}
    
        public function addRule(Array $rule)
        {
        	$this->rules[] = $rule;
        }
        
        public function renderErrorMessages($openTag = '<li>', $closeTag = '</li>')
        {
        	if (count($this->messages) == 0) {
        		return null;
        	}

        	$listMessages = "";
            $listMessages .= "<ul>";
            
        	foreach ($this->messages as $message) {
        		$listMessages .= $openTag . $message . $closeTag;
        	}

            $listMessages .= "</ul>";

        	return print_r($listMessages);
        }
        
        public function getMessages()
        {
        	return $this->messages;
        }
        
        public function getFieldsWithError()
        {
        	return $this->fieldsWithError;
        }
        
        public function is_required($target)
        {
        	if (!$target->getValue() && $target->getValue() == '') {
        		$target->setErrorMessage("O campo ".  $target->getName()  ." é obrigatório!");
	            $this->fieldsWithError[] = $target;
	            $this->messages[$target->getName()] = "O campo {$target->getName()} é obrigatório!";
        		return false;
        	}

        		return true;
        }
        
        protected function is_numeric($target)
        {
        	if (!is_numeric($target->getValue())) {
        		$target->setErrorMessage("O campo ".	$target->getName()	." deve ser númerico!");
        		$this->fieldsWithError[] = $target;
        		$this->messages[$target->getName()] = "O campo ".	$target->getName()	." deve ser númerico!";
	            return false;
        	}

        	return true;
        }
        
        protected function max_length($target, $params)
        {
        	if (strlen($target->getValue()) <= $params['max']) {
        		return true;
        	}

        	$target->setErrorMessage("O campo". $target->getName() . "deve ter no máximo". $params['max'] . "caracteres!");
        	$this->fieldsWithError[] = $target;
        	$this->messages[$target->getName()] = "O campo {$target->getName()} deve ser no máximo ".  $params['max'] ." caracteres!";
        	return false;
        }
	}
?>