<?php 
	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Form;

    use Education\Interfaces\OptionInterface;
    use Education\Interfaces\ElementInterface;

    /**
    * @return Option
    */
    class Option implements OptionInterface, ElementInterface
    {
    	
    	protected $value;
    	protected $text;

    	public function __construct(array $attributes = [])
    	{
    		$this->value = (!is_null($attributes['value']) ? $attributes['value'] : null);
    		$this->text = (!is_null($attributes['text']) ? $attributes['text'] : null);
    	}

    	/**
    	* @return mixed
    	*/
    	public function getValue()
    	{
    		return $this->value;
    	}

    	/**
    	*	@param string $value
    	*	@return Option
    	*/
    	public function setValue($value)
    	{
    		$this->value = $value;
    		return $this->value;
    	}

    	/**
    	* @return string $text
    	*/
    	public function getText()
    	{
    		return $this->text;
    	}

    	/**
    	* @param string $text
    	* @return Option
    	*/ 
    	public function setText($text)
    	{
    		$this->text = $text;
    		return $text;
    	}

    	public function getElement()
    	{
    		echo '<option value="'.	$this->getValue()	.'">'.	$this->getText()	.'</option>';
    	}
    }