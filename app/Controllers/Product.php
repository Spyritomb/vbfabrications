<?php


namespace App\Controllers;


use App\Entities\Person;
use App\Models\PersonModel;
use App\Models\ProductModel;

class Product extends BaseController
{
    public function index()
    {

        $imageProperties = [
            'src' => 'images/Tractor.jpg',
            'alt' => 'Me, demonstrating how to eat 4 slices of pizza at one time',
            'class' => 'post_images',
            'width' => '200',
            'height' => '200',
            'title' => 'That was quite a night',
            'rel' => 'lightbox'
        ];

        $data = [
            "title" => "Products",
            "images" => $imageProperties
        ];

        echo view('templates/header', $data);
        echo view('product/all', $data);
        echo view('templates/footer');
    }


    public function view()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        $data = [

            'products' => $products
        ];

        $data2 =[
            'title'=> "Add Product"
        ];

        echo view('templates/header',$data2);
        echo view('product/view', $data);

    }

    public function productGet(){

    }

    public function productPost(){

    }

    public function addGet()
    {
        if (!$this->session->get('loggedIn')) {
            return redirect()->to('/admin/login');
        }

        $data = [
            "title" => "Products",
        ];


        $options = [
        'feeders' => 'feeders',
        'spares' => 'spares',
        'bulktanks' => 'Bulk Tanks',
        'robotmilkers' => 'Robot Milkers'
        ];

        //echo the views
        echo view('templates/header', $data);
        echo view('product/add',$options);
        echo view('templates/footer');

    }

    public function addPost()
    {
        if (!$this->session->get('loggedIn')) {
            return redirect()->to('/admin/login');
        }

        helper('form');


        if ($this->request->getMethod() == 'post') {
            log_message('debug', 'got to the post bit inside addPost() :)');

            $postData = $this->request->getPost();
            $product = new \App\Entities\Product($postData);

            $productModel = new ProductModel();

            $validationRules = $productModel->getValidationRules();

            if (!$this->validate($validationRules)) {
                log_message('error', 'Failed to validate');
                return redirect()
                    ->back()
                    ->with('error', 'Input validation failed at server-side.')
                    ->withInput();
            } else {
                try {
                    $result = $productModel->create($product);

                    //Image related code///////////////////////////////////////
                    $file = $this->request->getFile('filename');

                    if($file->isValid()&& !$file->hasMoved()){
                        $file->move('./uploads/images');
                    }

//                    echo '<pre>';
//                    echo $file->getName();
//                    echo '</pre>';
                    //////////////////////////
                    if ($result) {
                        log_message('error', 'Product successfully created.');
                        return redirect()->to('/product/success')->with('message', 'Product was successfully added!');
                    } else {
                        log_message('error', 'Failed save product');
//                        echo '<pre>';
//                        var_dump($product);
//                        echo '</pre>';
                        return redirect()->back()->with('error', 'Product was not added!')->withInput();
                    }
                } catch (\Exception $e) {

                }
            }

        }

    }

    public function success(){
        echo view('product/success');
    }


}