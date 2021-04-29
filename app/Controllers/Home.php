<?php namespace App\Controllers;

/**
 * The Home controller gets the request form the browser and
 * returns one or more views from one or more models where required.
 *
 */
class Home extends BaseController
{
    /**
     * The default method of this controller
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function index()
    {

        $test = [
            'bruv' => 'images/homeframe.JPG'
        ];

        $homefarmview = [
            'src'    => 'images/homefarm.JPG',
            'alt'    => 'Farm View',
            'class'  => 'post_images',
            'width'  => '100%',
            'height' => '50%',
            'title'  => 'That was quite a night',
            'rel'    => 'lightbox'
        ];

        $data = [
            "title" => "V.B. Fabrications LTD",
            "images" => $homefarmview,
            'bruv2' => $test
        ];




        echo view('templates/header', $data);
        echo view('home',$data);
        echo view('templates/footer');
    }

}