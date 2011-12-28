<?php defined('SYSPATH') or die('No direct access allowed.');

class Controller_Public_Auth extends Controller_Public_Main
{

    public function action_index()
    {
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