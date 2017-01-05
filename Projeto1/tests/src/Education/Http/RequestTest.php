<?php
	namespace Education\Http;

	/**
	* @Teste Request
	*/
	class RequestTest extends \PHPUnit_Framework_TestCase
	{
		
		public function testeVerificaSeOTipoDaClasseEstaCorreta()
		{
			$this->assertInstanceOf("Education\Http\Request", new \Education\Http\Request());
		}
	}


?>