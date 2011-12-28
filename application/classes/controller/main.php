<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Main extends Commoneer_Controller_Ajax
{

	public function before()
	{
		$this->require_login();
		parent::before();

	}


}
