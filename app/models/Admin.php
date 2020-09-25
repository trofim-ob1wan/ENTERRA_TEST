<?php
namespace app\models;

use app\core\Model;

class Admin extends Model
{
	public $error;
	
	public function validateLogin($post)
	{
		$config = require 'app/config/admin.php';
		if ($config['login'] != $post['name'] or $config['password'] != $post['password']) {			
			$this->error = 'Введеный логин или пароль неверны';
			return false;
		}
		return true;
	}

	public function validatePost($post, $type)
	{
		$name = iconv_strlen($post['name']);
		$description = iconv_strlen($post['description']);
		$text = iconv_strlen($post['text']);

		if ($name < 4 ) {
			$this->error = 'Заголовок слишком короткий';
			return false;
		} elseif ($name > 50) {
			$this->error = 'Заголовок слишком большой';
			return false;
		} elseif ($description < 5) {
			$this->error = 'Описание слишком короткое';
			return false;
		} elseif ($description > 100) {
			$this->error = 'Описание слишком длинное';
			return false;
		} elseif ($text < 10 ) {
			$this->error = 'Текст слишком короткий';
			return false;
		} elseif ($text > 10000 ) {
			$this->error = 'Текст слишком большой';
			return false;
		}

		if (empty($_FILES['img']['tmp_name']) and $type == 'add' ) {
			$this->error = 'Изображение не выбрано';
			return false;
		}
		return true;
	}


	public function postAdd($post)
	{	
		$data = [
			'id' => '',
			'title' => $post['name'],
			'description' => $post['description'],
			'text' => $post['text'],
			'date' => $this->date,
		];

		$this->db->query('INSERT INTO posts VALUES (:id, :title, :description, :text, :date)', $data);
		return $this->db->lastInsertId();
	}

	public function uploadImg($path, $id)
	{
		move_uploaded_file($path, 'public/img_post/'.$id.'.jpg');
	}

	public function chekPost($id)
	{
		$data = [
			'id' => $id,
		];

		return $this->db->column('SELECT id FROM posts WHERE id = :id', $data);
	}

	public function postDelete($id)
	{
		$data = [
			'id' => $id,
		];

		$this->db->query('DELETE FROM posts WHERE id = :id', $data);
		unlink('public/img_post/'.$id.'.jpg');
	}

	public function getPost($id)
	{
		$data = [
			'id' => $id,
		];
		return $this->db->row('SELECT * FROM posts WHERE id = :id', $data);
	}

	public function updatePost($post, $id)
	{
		$data = [
			'id' => $id,
			'title' => $post['name'],
			'description' => $post['description'],
			'text' => $post['text'],
			'date' => $this->date,
		];

		$this->db->query('UPDATE posts SET title = :title, description = :description, text = :text, date = :date WHERE id = :id', $data);
	}

	public function postLists()
	{
		$result = $this->db->row('SELECT `id`, `title`, `description`, `text`, `date` FROM posts ORDER BY `date` DESC');
		return $result;
	} 

}