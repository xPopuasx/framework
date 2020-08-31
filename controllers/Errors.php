<?php

namespace controllers;

class Errors extends \app\Controller{

	public function error_404()
	{
		$this->View->render('Errors','404',['title'=> 'Ошибка 404']);
	}
	
}