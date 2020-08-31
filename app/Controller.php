<?php

namespace app;

use app\View;

class Controller
{

	public $view;

	public function __construct()
	{
		$this->View = new View;
	}

}
