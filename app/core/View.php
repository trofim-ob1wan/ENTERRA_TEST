<?php
namespace app\core;

class View
{
	public $path;
	public $route;	

	public function __construct($route)
	{
		$this->route = $route;
		$this->path = $route['controller'].'/'.$route['action'];        
	}

	public function render($title, $data = [])
	{
		extract($data);
		$path = 'app/views/'.$this->path.'.php';					
		if (file_exists($path)) {
			require $path;			
		}
	}

	public function location($url)
	{
		exit(json_encode(['url' => $url]));
	}

	public function redirect($url)
	{
		header('location: /'.$url);
		exit;
	}

	public static function error($error)
	{
		http_response_code($error);
		$path = 'app/views/errors/'.$error.'.php';
		if (file_exists($path)) {
			require $path;
		}
		exit;
	}

	public function message($status, $message)
	{
		exit(json_encode(['status' => $status, 'message' => $message]));
	}	
}