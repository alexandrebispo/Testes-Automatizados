<?php 
	
	namespace Education\Model;

	class ConnectTest extends AbstractEducationDatabaseTest
	{

	    public function testeVerificaTipodeConexao()
	    {
	    	$conn = $this->getConnection()->getConnection();
   			$this->assertInstanceOf("PDO", $conn);
	        
	    }

	}

?>