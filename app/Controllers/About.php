<?php

namespace App\Controllers;

/**
 * The About controller gets the request form the browser and
 * returns one or more views from one or more models where required.
 *
 */

class About extends BaseController
{
    /**
     * The default method of this controller
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function index()
    {

        /**
         *
         */
        $imageProperties = [
            'src'    => 'images/Tractor.jpg',
            'alt'    => 'Me, demonstrating how to eat 4 slices of pizza at one time',
            'class'  => 'post_images',
            'width'  => '200',
            'height' => '200',
            'title'  => 'That was quite a night',
            'rel'    => 'lightbox'
        ];

        $data = [
            "title" => "About",
            "images" => $imageProperties
        ];




        echo view('templates/header', $data);
        echo view('about',$data);
        echo view('templates/footer');
    }

}