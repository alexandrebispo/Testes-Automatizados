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

	/**
	* Criando Botão
	*/
	class Button extends AbstractField implements ButtonInterface
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

        public function getType()
        {
        	return (!is_null($attributes['type']) ? $attributes['type'] : null);
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