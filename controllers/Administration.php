<?php

namespace controllers;

class administration extends \app\Controller{

	public function Index()
	{
		$this->View->render('Домашняя страница','Home','index',['']);
	}

	public function Access()
	{
		$this->View->render('administration','access',['title'=> 'Управление доступами', 'has_sidebar' => ture]);
	}

	public function Users()
	{
		$this->View->render('administration','users',['title'=> 'Управление пользователям', 'has_sidebar' => ture]);
	}

	public function Management()
	{
		$this->View->render('administration','management',['title'=> 'Управление структурой', 'has_sidebar' => ture]);
	}
	
}