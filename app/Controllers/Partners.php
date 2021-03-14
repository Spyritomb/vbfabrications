<?php


namespace App\Controllers;


class Partners extends BaseController
{

    public function delaval()
    {
        $data = [
            "title" => "About",
        ];

        echo view('templates/header', $data);
        echo view('partners/delaval', $data);
        echo view('templates/footer');
    }


    public function fullwood()
    {
        $data = [
            "title" => "About",
        ];

        echo view('templates/header', $data);
        echo view('partners/fullwood', $data);
        echo view('templates/footer');
    }

    public function gea()
    {
        $data = [
            "title" => "About",
        ];

        echo view('templates/header', $data);
        echo view('partners/gea', $data);
        echo view('templates/footer');
    }
}
