<?php


namespace App\Controllers;


class Sub extends BaseController
{
    public function index(){


        $data = [
            "title" => "AI Search",
            //"images" => $imageProperties
        ];
        echo view('templates/header', $data);
        echo view('sub',$data);
        echo view('templates/footer');
    }

}