<?php 

	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Model;

    class Connect
    {
        protected static $instance;
        
        private function __construct(){}

        public static function getInstance()
        {
            if(static::$instance === NULL){
                static::$instance = new \PDO("sqlite:db.db");
            }

            return static::$instance;
        }
    }

?>


