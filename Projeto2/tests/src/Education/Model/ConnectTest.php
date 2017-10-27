<?php 
	
	namespace Education\Model;

	class ConnectTest extends \PHPUnit_Framework_TestCase
	{
		/**
		* @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
		*/
	    public function testgetConnection()
	    {
	        $pdo = \Education\Model\Connect::getInstance();
	        $this->assertEquals($pdo->getAttribute(constant("PDO::ATTR_DRIVER_NAME")), "sqlite");
	    }

	}

?>