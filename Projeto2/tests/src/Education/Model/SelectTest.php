<?php 
namespace Education\Model;

/**
* 
*/
class SelectTest extends AbstractEducationDatabaseTest
{
	
	public function testeVerificaInsercaoEGetSelectNoDtabase()
	{
		$select = "InsertTest";
		$conn = $this->getConnection()->getConnection();
		$selectModel = new \Education\Model\Select($conn);
		$selectModel->InsertSelect($select);
		$id = $selectModel->db->lastInsertId();
		$sel = $selectModel->getSelect($id);
		$this->assertEquals("InsertTest", $sel);
	}

	public function testeVerificaGetOptions()
	{
		$conn = $this->getConnection()->getConnection();
		$selectModel = new \Education\Model\Select($conn);
		$options = $selectModel->getOptions();
		$count = count($options);
		$this->assertEquals(3, $count);
	}
}
?>