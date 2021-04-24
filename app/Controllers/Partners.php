<?php


namespace App\Controllers;


class Partners extends BaseController
{

    public function index()
    {

        $data = [
            "title" => "Partners",
        ];

        echo view('templates/header', $data);
        echo view('partners/partners', $data);
        echo view('templates/footer');
    }


}