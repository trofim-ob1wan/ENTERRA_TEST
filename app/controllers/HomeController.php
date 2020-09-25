<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Admin;
use app\core\View;

class HomeController extends Controller
{
	public function indexAction() 
	{
		$result = $this->model->postLists();
		$data = [
			'getAllPosts' => $result,
		];

		$this->view->render('Главная страница', $data);
	}

	public function postAction()
	{
		$admin = new Admin;

		if (!$admin->chekPost($this->route['id'])) {
			View::error(404);
		}
		
		$data = [
			'data' => $admin->getPost($this->route['id'])[0],
		];
	
		$this->view->render('Пост', $data);
	}
}