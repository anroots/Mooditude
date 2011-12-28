<?php defined('SYSPATH') or die('No direct script access.');

class Model_Mood extends Commoneer_ORM
{

	protected $_belongs_to = array(
		'user' => array()
	);

	/**
	 * Add a new mood rating
	 *
	 * @since 1.0
	 * @param int $score Mood rating from 1...10
	 * @return bool|int Insert ID or FALSE
	 */
	public function add_score($score)
	{

		// Update existing score (only one score per day)
		if (($today = $this->today()) !== NULL) {
			$model = $today;
		} else {
			$model = $this;
		}

		$model->score = $score;
		$model->user_id = User::current()->id;

		try {
			$model->save();
			return $model->id;
		} catch (ORM_Validation_Exception $e) {
			Validation::show_errors($e);
			return FALSE;
		} catch (Database_Exception $e) {
			return FALSE;
		}
	}

	public function rules()
	{
		return array(
			'score' => array(
				array('in_array', array(':value', Arr::range(1, 10))),
				array('not_empty')
			)
		);
	}

	/**
	 * Get message for the current mood
	 *
	 * @since 1.0
	 * @example Mood score: 1, message: "Aww, that's too bad"
	 * @example Mood score: 10, message: "Wow, you're on top of the world!"
	 * @param int $score Mood score in range 1...10;
	 * @return string Mood message
	 */
	public function message($score)
	{
		return Kohana::$config->load('moods.' . $score);
	}

	/**
	 * Get the model for today's mood update
	 *
	 * @since 1.0
	 * @return null|Model_Mood
	 */
	public function today()
	{
		$q = ORM::factory('mood')
				->where('created', '>=', Date::mysql_date(date('Y-m-d')))
				->where('created', '<=', Date::mysql_date(date('Y-m-d 23:59:59')))
				->where('user_id', '=', User::current()->id)
				->find();

		if ($q->loaded()) {
			return $q;
		}
		return NULL;
	}

	/**
	 * Calculates the average score of all current user's mood updates
	 *
	 * @since 1.0
	 * @return float Average mood score
	 */
	public function average()
	{
		$average = DB::select(array('SUM("score")', 'sum'))
				->from('moods')
				->where('user_id', '=', User::current()->id)
				->execute()
				->get('sum');
		return $average == 0 ? 0 : round($average / User::current()->moods->count_all(), 3);
	}

	/**
	 * Get data for mood graph
	 *
	 * @since 1.0
	 * @return array Array of data for Google Chart
	 */
	public function graph()
	{
		if ($this->loaded()) {
			$this->clear();
		}
		$data = array();

		$rows = User::current()
				->moods
				->order_by('created', 'ASC')
				->find_all();

		if ($rows->count() > 0) {
			foreach ($rows as $mood) {
				/*
				 * Format: Date, happyness, unhappyness
				 * Date is converted to ms since epoch
				 */
				$data[] = array(strtotime($mood->created) * 1000, (int)$mood->score, 10 - $mood->score);
			}
		}
		return (array)$data;
	}
}