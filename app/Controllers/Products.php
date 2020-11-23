<?php


namespace App\Controllers;


class Products extends BaseController
{
    public function index()
    {

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
        echo view('templates/sidebar');
        echo view('products',$data);
        echo view('templates/footer');
    }

}