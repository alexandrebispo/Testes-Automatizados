<?php 
	/**
    *
    * @author: Alexandre Bispo
    * @email: alexandrebispo.mestre@gmail.com
    * @copyright 2015 the author
    *
    */

	namespace Education\Model;
	use Education\Model\Connect;
	use PDO;

	class Select
	{
		public $select;
		public $db;

		public function __construct(\PDO $db)
		{
			$this->db = $db;
		}

		public function InsertSelect($select)
		{
			$this->select = $select;
			$conn = $this->db;
			//Aqui esta com aspas na variavel ('{$this->select}'), por poder ser do tipo string;
			$sql = 'INSERT INTO "select"("select") VALUES ("{$this->select}")';
			$stmt = $conn->prepare($sql); 
			$stmt->execute();
		}

		public function getSelect($id)
		{
			$conn = $this->db;
			//Aqui esta sem aspas na variavel (id={$this->select}), por ser sempre do tipo INT;
			$sql = "SELECT * FROM `select` WHERE id={$id}";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetch();
			return $result["select"];
		}

		public function getOptions()
		{
			$conn = $this->db;
			$sql = "SELECT * FROM `select`";
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}
	}
 ?>