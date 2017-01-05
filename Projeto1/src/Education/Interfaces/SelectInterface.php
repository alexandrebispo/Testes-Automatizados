<?php 
	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Interfaces;
    use Education\interfaces\OptionInterface;


    interface SelectInterface
    {
        public function addOption(OptionInterface $option);
    }

 ?>