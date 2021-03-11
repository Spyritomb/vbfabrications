<?php


namespace App\Controllers;

use App\Entities\User;
use App\Models\ProductModel;
use App\Models\UserModel;


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

    public function loginGet()
    {
        if ($this->session->get('loggedIn')) {
            return redirect()->to('/admin/dashboard');
        }
        return view('admin/login');
    }

    public function loginPost()
    {
        if ($this->request->getMethod() == 'post') {

            if ($this->session->get('loggedIn')) {
                return redirect()->to('/admin/dashboard');
            }

            $user = new User($this->request->getPost());
            $userModel = new UserModel();

            $userLogin = $userModel->login($user);

            if ($userLogin) {
                $this->session->set('loggedIn', true);
                return redirect()->to('/admin/dashboard');

            } else {
                return redirect()->back()->with('error', 'Incorrect credentials')->withInput();
            }

        }
        return view('admin/login');
    }

//    public function setlogin()
//    {
//        $this->session->set('loggedIn', true);
//        return redirect()->to('/admin/dashboard');
//    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function dashboard()
    {

        echo view('templates/header',['title'=>'Dashboard']);
        echo view('admin/dashboard');

    }


}