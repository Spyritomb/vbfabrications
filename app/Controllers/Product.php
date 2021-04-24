<?php


namespace App\Controllers;


use App\Entities\Person;
use App\Models\PersonModel;
use App\Models\ProductModel;

class Product extends BaseController
{

    public function index()
    {

        $productModel = new ProductModel();
        $products = $productModel->findAll();

//        $imageProperties = [
//            'src' => 'images/Tractor.jpg',
//            'alt' => 'Me, demonstrating how to eat 4 slices of pizza at one time',
//            'class' => 'post_images',
//            'width' => '200',
//            'height' => '200',
//            'title' => 'That was quite a night',
//            'rel' => 'lightbox'
//        ];

        $data = [
            "title" => "Products",
//            "images" => $imageProperties,
            'products' => $products
        ];

        echo view('templates/header', $data);
        echo view('product/index', $data);
        echo view('templates/footer');
    }


    public function view()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        $data = [
            'products' => $products
        ];

        $data2 = [
            'title' => "Add Product"
        ];

        echo view('templates/header', $data2);
        echo view('product/view', $data);

    }

    public function deleteGet()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        $data = [
            'products' => $products
        ];

        $data2 = [
            'title' => "Add Product"
        ];

        echo view('templates/header', $data2);
        echo view('product/delete', $data);

    }

    public function deletePost()
    {
        $productModel = new ProductModel();
        $products = $productModel->findAll();

        helper('form');


        if (!$this->session->get('loggedIn')) {
            return redirect()->to('/admin/login');
        }

        if ($this->request->getMethod() == 'post') {

            $productModel = new ProductModel();

            $postData = $this->request->getPost();

            $products = array_values($postData['products']);
            foreach ($postData['products'] as $product) {
                $productModel->delete($product);
            }

            echo '<pre>';
            var_dump($products);
            echo '</pre>';

            return redirect()->to('admin/dashboard');
        }

    }

    public function updateGet($productID)
    {
        if (!$this->session->get('loggedIn')) {
            return redirect()->to('/admin/login', 401);
        }

        $productModel = new ProductModel();

        $product = $productModel->find($productID);


        $options = [
            'feeders' => 'Feeders',
            'spares' => 'Spares',
            'bulktanks' => 'Bulk Tanks',
            'robotmilkers' => 'Robot Milkers',
            'clusters' => 'Clusters'
        ];

        $data = [
            'title' => 'Update Product',
            'product' => $product,
            'options' => $options
        ];

        echo view('templates/header', $data);
        echo view('product/update', $data);
        echo view('templates/footer');

    }

    public function updatePost()
    {

        // Mak sure the product id is available in the post data or update won't work
        $product = new \App\Entities\Product($this->request->getPost());

        $productModel = new ProductModel();
        //$product = $productModel->find();

        try {

            $result = $productModel->modify($product);

            if ($result) {
                log_message('error', 'Product successfully updated.');
                return redirect()->to('/product/success')->with('message', 'Product was successfully updated!');
            } else {
                log_message('error', 'Failed to update product');
                return redirect()->back()->with('error', 'Product was not updated!')->withInput();
            }
        } catch (\Exception $e) {
            //TODO: log_message()
        }


    }

    //For sorting the products in index view
    public function category($category = 'all')
    {
        $productModel = new ProductModel();

        $products = $productModel->readCategory(new \App\Entities\Product(['category' => $category]));

        $data = [
            'title' => 'Update Product',
            'products' => $products
        ];

        echo view('templates/header', $data);
        echo view('product/index', $data);
        echo view('templates/footer');
    }

    public function productPost()
    {
        helper('form');

        if ($product->category) {
            $product = new \App\Entities\Product(['category' => $product->category]);
        }

        $productModel = new ProductModel();
        $products = $productModel->readCategory($product);
    }

    public function addGet()
    {
        if (!$this->session->get('loggedIn')) {
            return redirect()->to('/admin/login');
        }
        $options = [
            'feeders' => 'Feeders',
            'spares' => 'Spares',
            'bulktanks' => 'Bulk Tanks',
            'robotmilkers' => 'Robot Milkers',
            'clusters' => 'Clusters'
        ];

        $data = [
            "title" => "Products",
            'options' => $options
        ];


        //echo the views
        echo view('templates/header', $data);
        echo view('product/add', $data);
        echo view('templates/footer');
    }


    public function addPost()
    {
        if (!$this->session->get('loggedIn')) {
            return redirect()->to('/admin/login');
        }
        helper('form');
        if ($this->request->getMethod() == 'post') {

            $postData = $this->request->getPost();
            $product = new \App\Entities\Product($postData);

            $productModel = new ProductModel();

            $validationRules = $productModel->getValidationRules();

            if (!$this->validate($validationRules)) {
                log_message('error', 'Failed to validate');
                return redirect()
                    ->back()
//                    server-side error
                    ->with('error', 'Input validation failed, please fill all the required fields marked with (*).')
                    ->withInput();
            } else {
                try {
                    $file = $this->request->getFile('filename');

                    $product->filename = $file->getRandomName();

                    if ($file->isValid() && !$file->hasMoved()) {
                        $file->move('./uploads/images', $product->filename);
                    }

                    $result = $productModel->create($product);

                    if ($result) {
                        log_message('error', 'Product successfully created.');
                        return redirect()->to('/product/success')->with('message', 'Product was successfully added!');
                    } else {
                        log_message('error', 'Failed save product');
                        return redirect()->back()->with('error', 'Product was not added!')->withInput();
                    }
                } catch (\Exception $e) {
                    //TODO: log_message()
                }
            }

        }

    }

    public function success()
    {
        $data = [
            "title" => "Success",
        ];

        echo view('templates/header', $data);
        echo view('product/success');
    }


}