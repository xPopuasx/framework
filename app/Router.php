<?php

namespace app;

use app\session;

class Router{



	public function get_errors($controller_error, $action_error, $header)
	{
		header($header);
		if(file_exists('controllers/'.$controller_error.'.php'))
		{
			$error_class = 'controllers\\'.$controller_error;
			$error = new $error_class;
			$error->$action_error();
		}
	}


	public function get_routes()
	{
		$routes = include 'Routes.php';

		foreach ($routes as $key => $value) 
		{
			foreach ($value['url'] as $key_2 => $value_2) 
			{
				$url_array[$key_2] = $value_2;
			}
		}
		return $url_array;
	}


	public function __construct()
	{
		$Session = new Session();
		session_start();
		$access_user = unserialize($_SESSION['access']);

		if(isset($_GET['url']))
		{
			$url = mb_strtolower($_GET['url']);
			$url = explode('/', rtrim($url, '/'));
		}
		else
		{
			$url[0] = 'home';
		}
		$key = array_search($url[0], array_column($this->get_routes(), 'controller'));
		if(strlen($key) != 0)
		{
			$file_name = 'controllers/'.$url[0].'.php';
			if(file_exists($file_name))
			{
				if($_SESSION['auth'] != 1)
		    	{
		    		$url[0] = 'access';
		    		$url[1] = 'login';
		    	}
		    	elseif($_SESSION['auth'] == 1 && $url[0] == 'access' && $url[1] == 'login')
		    	{
		    		header('Location:http://'.$_SERVER['HTTP_HOST'].'/home/index');
		    		$url[0] = 'home';
		    		$url[1] = 'index';
		    	}

				$class_controller = 'controllers\\'.$url[0];
				$controller = new $class_controller;

				if(!isset($url[1]))
				{
					$url[1] = 'index';
				}

				if($url[1]!= 'login' && in_array($url[0].'/'.$url[1], $access_user))
				{
					if(isset($url[2]))
					{
						$controller -> {$url[1]}($url[2]);
					}
					else
					{
						$controller -> {$url[1]}();
					}
				}
				elseif($url[0] == 'access' && $url[1] == 'login')
				{
					$controller -> {$url[1]}();
				}
				else
				{
					$this->get_errors('Errors','error_404' ,'HTTP/1.0 404 Not Found');
				}
			}
			else
			{
				echo 'Не удалось найти контроллер для данного url';
			}
		}
		else
		{
			$this->get_errors('Errors','error_404' ,'HTTP/1.0 404 Not Found');
		}

	}
}

