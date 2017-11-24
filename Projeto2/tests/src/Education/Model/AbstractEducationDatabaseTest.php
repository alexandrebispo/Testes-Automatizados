<?php 
	
	namespace Education\Model;

	abstract class AbstractEducationDatabaseTest extends \PHPUnit_Extensions_Database_TestCase
	{

		private $conn;

		protected function getSetUpOperation() {
	        return \PHPUnit_Extensions_Database_Operation_Factory::CLEAN_INSERT(TRUE);
	    }

		/**
	     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
	     */
		public function getConnection()
	    {
	        // implementacao getConnection
	        if(null === $this->conn) {
           		$db = \Education\Model\Connect::getInstance();
 				//$db->exec("create table 'select' (`id` INTEGER PRIMARY KEY AUTOINCREMENT, `select` varchar(255))");
	            return $this->conn = $this->createDefaultDBConnection($db, "db");
		    }

		    return $this->conn;
	    }
		
		/**
	     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
	     */
	    public function getDataSet()
	    {
	        // implementacao getDataSet()
	        return $this->createXMLDataSet('tests/src/Education/Model/db.xml');
	    }

	}

?>