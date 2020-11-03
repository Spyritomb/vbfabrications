<?php namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message'); //welcome_message
    }

    #
    public function about()
    {

        $data = [
            "title" => "about"
        ];

        echo view('templates/header', $data);
        echo view('about');
        echo view('templates/footer');
    }

    //--------------------------------------------------------------------

}
