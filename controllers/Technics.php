<?php

namespace controllers;

class technics extends \app\Controller{

	public function Index()
	{
		$this->View->render('technics','index',['title'=> 'Главная страница', 'has_sidebar' => ture,]);
	}

	public function Management()
	{
		$this->View->render('technics','management',['title'=> 'Работа с данными', 'has_sidebar' => true,]);
	}

	public function Counterparty()
	{
		$this->View->render('technics','Counterparty',['title'=> 'Контрагенты', 'has_sidebar' => true,]);
	}

	public function Event()
	{
		$this->View->render('technics','Event',['title'=> 'Собыите', 'has_sidebar' => false,]);
	}

}
