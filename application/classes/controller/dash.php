<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dash extends Commoneer_Controller_Ajax
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

	public function action_update()
	{
		$this->respond();
	}

}
