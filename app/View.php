<?php

namespace app;

class View
{
	public $layout = 'layout';

	public function render($controller, $action, $vars=[])
	{
		$cont 	= $_SERVER['DOCUMENT_ROOT'].'/views/'.$controller.'/'.$action.'.php';
		$layout = $_SERVER['DOCUMENT_ROOT'].'/views/'.$controller.'/'.$this->layout.'.php';
		try 
		{
			if(file_exists($layout))
			{
				ob_start();
	            require 'views/includes/main_sidebar.php';
	            $menu = ob_get_clean();

	            ob_start();
	            require 'views/includes/navbar.php';
	            $navbar = ob_get_clean();

				ob_start();
	            require $cont;
	            $content = ob_get_clean();
	            
	            if(array_key_exists('has_sidebar', $vars))
	            {
	            	ob_start();
		            require 'views/'.$controller.'/structure/right_sidebar.php';
		            $right_sidebar = ob_get_clean();
	            }
	            

				require $layout;
			}
			else
			{
				throw new Exception('Не удалось найти шаблон');
			}
		} 
		catch (Exception $e) 
		{
		    echo 'Возникла проблема, причина: '.  $e->getMessage(). "\n";
		}
	}

}