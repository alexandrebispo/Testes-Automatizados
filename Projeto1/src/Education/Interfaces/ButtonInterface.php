<?php 
	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Interfaces;

    interface ButtonInterface
    {
    	public function setType($type);
        public function setName($name);
        public function setValue($value);
        public function setText($text);
        public function getType();
        public function getName();
        public function getValue();
        public function getText();

    }
 ?>