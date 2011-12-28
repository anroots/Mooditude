<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Public_Auth extends Controller_Public_Main
{

	public function action_index()
	{

		if ($this->request->post('signup')) {

			/**
			 * Do some validation in the controller. Generally a bad idea!
			 */

			if ($this->request->post('password1') != $this->request->post('password2')) {
				Notify::msg('The passwords didn\'t match.', 'error');
			} else {
				$this->request->post('password', @$_POST['password1']);

				if (ORM::factory('user')->signup($this->request->post())) {
					Notify::msg('Welcome!', 'success');
					$this->request->redirect('');
				} else {
					Notify::msg('The data you provided did not validate.', 'error');
				}
			}
		}
		
		Assets::use_script('modal');
	}

	/**
	 * Shows the login page and handles login
	 * @return void
	 */
	public function action_login()
	{

		// Logged in users should not see this page
		if (Auth::instance()->logged_in()) {
			$this->request->redirect('');
		}

		// If the login form was posted...
		if ($this->request->post()) {

			// Try to login
			if (Auth::instance()->login($this->request->post('user'), $this->request->post('pass'))) {
				$this->request->redirect('dash');
			} else {
				Notify::msg('Login failed.', 'error');
			}
		}
		$this->request->redirect('public');
	}

	public function action_logout()
	{
		Auth::instance()->logout();
		$this->request->redirect('public');
	}

}