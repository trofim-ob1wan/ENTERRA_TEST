<?php
namespace app\controllers;

use app\core\Controller;
use app\core\View;

class AdminController extends Controller
{
	public function loginAction()
	{
		if (isset($_SESSION['admin'])) {
			$this->view->redirect('admin/postslist');
		}
		
		if (!empty($_POST)) {
			if (!$this->model->validateLogin($_POST)) {
				$this->view->message('error', $this->model->error);
			}
			$_SESSION['admin'] = true;
			$this->view->location('admin/postslist');
		}

		$this->view->render('Вход');
	}

	public function addAction()
	{
		if (!empty($_POST)) {
			if (!$this->model->validatePost($_POST, 'add')) {
				$this->view->message('error', $this->model->error);
			}
			$id = $this->model->postAdd($_POST);
			if (!$id) {
				$this->view->message('success', 'Ошибка');
			}
			$this->model->uploadImg($_FILES['img']['tmp_name'], $id);
			$this->view->message('success', 'Пост добавлен');
		}

		$this->view->render('Добавить пост');		
	}

	public function postslistAction()
	{
		$result = $this->model->postLists();
		$data = [
			'getAllPosts' => $result,
		];

		$this->view->render('Панель администратора', $data);		
	}

	public function updateAction()
	{
		if (!$this->model->chekPost($this->route['id'])) {
			View::error(404);
		}
		if (!empty($_POST)) {
			if (!$this->model->validatePost($_POST, 'update')) {
				$this->view->message('error', $this->model->error);
			}
			$this->model->updatePost($_POST, $this->route['id']);
			if ($_FILES['img']['tmp_name']) {
				$this->model->uploadImg($_FILES['img']['tmp_name'], $this->route['id']);
			}
			$this->view->message('success', 'Сохранено');
		}

		$data = [
			'data' => $this->model->getPost($this->route['id'])[0],
		];

		$this->view->render('Редактировать пост', $data);		
	}

	public function logoutAction()
	{
		unset($_SESSION['admin']);
		$this->view->redirect('admin');
	}
	
	public function deleteAction()
	{
		if (!$this->model->chekPost($this->route['id'])) {
			View::error(404);
		}
		
		$this->model->postDelete($this->route['id']);
		$this->view->redirect('admin/postslist');
	}
}