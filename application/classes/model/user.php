<?php defined('SYSPATH') or die('No direct access allowed.');
/**
 * User model
 *
 * @package Model
 * @subpackage User
 * @author Ando Roots
 * @throws Exception_Not_Implemented
 *
 */
class Model_User extends Model_Auth_User
{

	protected $_has_many = array(
		'user_tokens' => array('model' => 'user_token'),
		'roles' => array('model' => 'role', 'through' => 'roles_users'),
		'moods' => array('model' => 'mood')
	);


	/**
	 * Stores current user's object.
	 *
	 * Should only be accessed using Model_User::current()
	 *
	 * @var ORM
	 */
	public static $_current_user;


	/**
	 * Create a new user account
	 *
	 * @since 1.0
	 * @param array $data Input data from the signup form
	 * @return bool TRUE on success
	 */
	public function signup(array $data)
	{
		if (!Arr::check_keys($data, array('name', 'username', 'email', 'password'))) {
			return FALSE;
		}

		if ($this->loaded()) {
			$this->clear();
		}

		$this->values($data, array('username', 'name', 'email', 'password'));
		try {
			$this->save();
			$this->add('roles', 1);
			Auth::instance()->login($data['username'], $data['password']);
		} catch (ORM_Validation_Exception $e) {
			Validation::show_errors($e);
			return FALSE;
		} catch (Database_Exception $e) {
			return FALSE;
		}

		return TRUE;
	}


	/**
	 * Return current user ID
	 *
	 * @static
	 * @return int|null
	 */
	public static function current_id()
	{
		return (Model_User::current() !== NULL) ? Model_User::current()->id : NULL;
	}

	/**
	 * Get the current user
	 *
	 * @static
	 * @return Model_Auth_User|null
	 */
	public static function current()
	{
		if (Model_User::$_current_user === NULL) {
			Model_User::$_current_user = ORM::factory('user');
		}
		return Model_User::$_current_user;
	}


	/**
	 * Load the user model with currently logged in user.
	 *
	 * The data is stored statically and is available globally
	 * @static
	 * @see Model_User::current()
	 * @return bool
	 */
	public static function load_user()
	{
		if (!Auth::instance()->logged_in()) {
			return FALSE;
		}
		Model_User::$_current_user = Auth::instance()->get_user();
		return TRUE;
	}


	/**
	 * Get statistics about the user
	 *
	 * @since 1.0
	 * @return array
	 */
	public function statistics()
	{
		return array(
			'since' => $this->created,
			'count' => $this->moods->count_all(),
			'average' => ORM::factory('mood')->average()
		);
	}
}