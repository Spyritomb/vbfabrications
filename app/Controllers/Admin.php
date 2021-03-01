<?php


namespace App\Controllers;
use App\Entities\User;
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

    public function login()
    {
//        $userEntity= new User([
//            'username'=> 'Andreas'
//        ]);
//        $userModel = new UserModel();
//        $userEntity=$userModel->readByUsername($userEntity);
//        echo '<pre>';
//        var_dump($userEntity->id);
//        echo '</pre>';


        echo view('admin/login');
    }

    public function setlogin()
    {
        $this->session->set('loggedIn', true);
        return redirect()->to('/admin/dashboard');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    public function dashboard()
    {
        echo view('templates/adminheader');
        echo view('admin/portal');

    }


}