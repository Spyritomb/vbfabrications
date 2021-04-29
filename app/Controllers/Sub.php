<?php


namespace App\Controllers;

/**
 * The Sub controller gets the request form the browser and
 * returns one or more views from one or more models where required.
 *
 */

class Sub extends BaseController
{
    /**
     * The default method of this controller
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function index(){


        $data = [
            "title" => "AI Search",
        ];
        echo view('templates/header', $data);
        echo view('sub');
        echo view('templates/footer');
    }

}