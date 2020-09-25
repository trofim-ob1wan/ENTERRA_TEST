<?php
namespace app\models;

use app\core\Model;

class Home extends Model
{
	public function postLists()
	{
		$result = $this->db->row('SELECT `id`, `title`, `description`, `text`, `date` FROM posts ORDER BY `date` DESC');
		return $result;
	}
}