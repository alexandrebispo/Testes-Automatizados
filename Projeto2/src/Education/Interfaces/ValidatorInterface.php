<?php 
    /**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Interfaces;

    interface ValidatorInterface
    {
        public function validate();
    
        public function addRule(Array $rule);
        
        public function renderErrorMessages($openTag = '<li>', $closeTag = '</li>');
        
        public function getMessages();
        
        public function getFieldsWithError();
        
        public function is_required($target);
        
    }
?>