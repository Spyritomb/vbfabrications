<?php


namespace App\Controllers;

/**
 * The Partners controller gets the request form the browser and
 * returns one or more views from one or more models where required.
 *
 */

class Partners extends BaseController
{

    /**
     * The default method of this controller
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
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