<?php 
	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

    namespace Education\Interfaces;

    interface TextAreaInterface
    {
    	function setCols($cols);

        function setName($name);

        function setRows($rows);

        function setPlaceholder($placeholder);

        function getCols();

        function getName();

        function getRows();

        function getPlaceholder();
    }
 ?>