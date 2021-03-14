<?php


namespace App\Models;

use App\Entities\Product;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $returnType = 'App\Entities\Product';

    protected $allowedFields = [
        'name',
        'price',
        'tag',
        'description',
        'filename',
        'category',
    ];


    protected $validationRules = [
        'name' => 'required|max_length[211]',
        'price' => 'required|max_length[211]',
        'tag' => 'required|max_length[211]',
        'description' => 'required|max_length[600]',
    ];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    public function create(Product $product): bool
    {
        try {
            if ($this->insert($product)) {
                return true;
            } else {
                return false;
            }
        } catch (\ReflectionException $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            return false;
        }
    }


    //Check ed's code for this
    public function modify(Product $product): bool
    {
        try {
            if ($this->update($product->id, $product)) {
                return true;
            } else {
                return false;
            }
        } catch (\ReflectionException $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e]);
            return false;
        }
    }

    public function createProduct()
    {
        try {
            $this->getCompiledInsert();
        } catch (\Exception $e) {

        }

    }

    public function readCategory(Product $product)
    {
        if ($product->category == 'all') {
            return $this->findAll();
        } else {
            return $this
                ->select()
                ->where('category', $product->category)
                ->findAll();

        }
    }

}