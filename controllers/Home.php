<?php

namespace controllers;

class home extends \app\Controller{

	public function Index()
	{
		$this->View->render('Home','index',['title'=> 'Главная страница', 'has_sidebar' => ture]);
	}
	
}