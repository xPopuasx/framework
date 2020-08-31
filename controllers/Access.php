<?php

namespace controllers;

class Access extends \app\Controller{

	public function Login()
	{
		$this->View->render('access','login',['title'=> 'Авторизация']);
	}
	public function Loginout()
	{
		$this->View->render('access','loginout',['title'=> 'Выход']);
	}
	
}