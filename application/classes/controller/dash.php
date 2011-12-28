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
		$this->mood = ORM::factory('mood');
	}

	public function action_index()
	{
		Assets::use_script('raty');

	}

	/**
	 * Add a new mood update and respond with JSON status code and mood message
	 */
	public function action_update()
	{
		if ($this->mood->add_score($this->id)) {
			$this->respond(parent::STATUS_OK, $this->mood->message());
		}
		$this->respond(parent::STATUS_ERROR);
	}

}
