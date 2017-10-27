<?php 
	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Interfaces;

    interface OptionInterface
    {
    	public function setValue($value);
    	public function getValue();
    	public function setText($text);
    	public function getText();
    }