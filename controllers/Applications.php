<?php

class Applications  extends Controller{

	public function __construct()
	{
		parent::__construct();
		echo 'applications<br>';
		$this->view->render(get_class($this));
	}

	public function list($number = '')
	{

		echo 'list<br>';

		if($number != '')
		{
			echo 'list № '. $number;
		}
	}
	
}