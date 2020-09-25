<?php
namespace app\core;

use app\core\View;

abstract class Controller
{
	public $route;
	public $view;
	public $roles;

	public function __construct($route)
	{
		$this->route = $route;
		if (!$this->checkRoles()) {
			View::error(404);
		}

		$this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
	}

	public function loadModel($nameModel)
	{
		$path = 'app\models\\'.ucfirst($nameModel);
		if (class_exists($path)) {
			return new $path;
    	}
	}
	
	public function checkRoles()
	{
		$this->roles = require 'app/core/roles/'.$this->route['controller'].'.php';		
		if ($this->role('all')) {
			return true;
		} elseif (isset($_SESSION['admin']) and $this->role('admin')) {
			return true;
		}
		return false;
	}

	public function role($key)
	{
		return in_array($this->route['action'], $this->roles[$key]);
	}
}