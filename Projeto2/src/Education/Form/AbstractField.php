<?php 

	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Form;

    use Education\Interfaces\ElementInterface;

	abstract class AbstractField implements ElementInterface
	{

		protected $attributes = [];

		public function __construct(array $attributes = [])
		{
			$this->attributes = $attributes;
		}

		public function setName($name)
		{
			$this->attributes['name'] = $name;
			return $this->attributes['name'];
		}

		public function getName()
		{
			return $this->attributes['name'];
		}

		public function setClass($class)
		{
			$this->attributes['class'] = $class; 
			return $this->attributes['class'];
		}

		public function getClass()
		{
			return (isset($this->attributes['class']) ? $this->attributes['class'] : null);
		}

	}