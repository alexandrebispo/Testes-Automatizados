<?php 
	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Interfaces;

    interface InputInterface
    {

        public function setValue($value);
        public function getValue();
        public function getType();
     
    }

 ?>