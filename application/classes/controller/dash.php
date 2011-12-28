<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dash extends Commoneer_Controller_Template
{
	public function before()
	{
		parent::before();
		$this->title = __('Dashboard');
	}

	public function action_index()
	{
		Assets::use_script('raty');

	}

}
