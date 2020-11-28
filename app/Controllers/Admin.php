<?php


namespace App\Controllers;


class Admin extends BaseController
{
    public function index()
    {
        if ($this->session->get('loggedIn')) {
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->to('/admin/login');
        }
    }

    public function login()
    {

        echo view('admin/login');
    }

    public function setlogin()
    {
        $this->session->set('loggedIn', true);
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function dashboard()
    {

    }


}