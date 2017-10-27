<?php 

	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Form;
    use Education\Interfaces\ButtonInterface;
    use Education\Interfaces\ElementInterface;

	/**
	* Criando Botão
	*/
	class Button extends AbstractField implements ButtonInterface, ElementInterface
	{
    	public function setType($type)
        {
        	$this->attributes['type'] = $type;
        	return $this->attributes['type'];
        }

        public function setValue($value)
        {
        	$this->attributes['value'] = $value;
        	return $this->attributes['value'];
        }

        public function setText($text)
        {
        	$this->attributes['text'] = $text;
        	return $this->attributes['text'];
        }

        public function setErrorMessage($message)
        {
            $this->attributes['message'] = $message;
            return $message;
        }

        /**
        * @param string $message
        * @return Message
        */
        public function getErrorMessage()
        {
            return (!is_null($this->attributes['message']) ? $this->attributes['message'] : null);
        }

        public function getType()
        {
            return (!is_null($this->attributes['type']) ? $this->attributes['type'] : null);
        }

        public function getValue()
        {
        	return (!is_null($attributes['value']) ? $attributes['value'] : null);
        }

        public function getText()
        {
        	return (!is_null($attributes['text']) ? $attributes['text'] : null);
        }

        public function getElement()
        {
            echo "<button name='".	$this->attributes['name']	."' type='".	$this->attributes['type']	."' value='".	$this->attributes['value']	."'>".	$this->attributes['text']	."</button>";
        }
	}