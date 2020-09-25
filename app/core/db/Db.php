<?php
namespace app\core\db;

use PDO;

class Db 
{
	protected $db;
	
	public function __construct()
	{
		$config = require 'app/config/db.php';
		$this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'', $config['user'], $config['password']);
	}

	public function query($sql, $data = [])
	{
		$stmt = $this->db->prepare($sql);
		if (!empty($data)) {
			foreach ($data as $key => $val) {
				$stmt->bindValue(':'.$key, $val);
			}
		}
		$stmt->execute();
		return $stmt;
	}

	public function column($sql, $data = [])
	{
		$result = $this->query($sql, $data);
		return $result->fetchColumn();
	}

	public function row($sql, $data = [])
	{
		$result = $this->query($sql, $data);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function lastInsertId()
	{
		return $this->db->lastInsertId();
	}
}