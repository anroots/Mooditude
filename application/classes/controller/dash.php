<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Dash extends Controller_Main
{

	/**
	 * @var Model_Mood
	 */
	protected $mood;

	public function before()
	{
		parent::before();
		$this->title = __('Dashboard');

		$mood = ORM::factory('mood')->today();
		$this->mood = $mood === NULL ? ORM::factory('mood') : $mood;
	}

	public function action_index()
	{
		$this->content->mood = $this->mood;
		Assets::use_script('raty');
	}



}
