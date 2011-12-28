<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Mood extends Controller_Main
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

	/**
	 * AJAX endpoint. Get todays score.
	 *
	 * 0 means not saved yet
	 *
	 * @ajax
	 * @since 1.0
	 */
	public function action_today()
	{
		if (($mood = $this->mood->today()) === NULL) {
			$this->respond(parent::STATUS_OK, 0);
		}
		$this->respond(parent::STATUS_OK, (int)$mood->score);
	}

	/**
	 * Add a new mood update and respond with JSON status code and mood message
	 *
	 * @ajax
	 * @since 1.0
	 */
	public function action_update()
	{
		if ($this->mood->add_score($this->id)) {
			$this->respond(parent::STATUS_OK, $this->mood->message());
		}
		$this->respond(parent::STATUS_ERROR);
	}

}
