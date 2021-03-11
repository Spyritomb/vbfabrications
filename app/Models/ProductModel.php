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
        'description' => 'required|max_length[211]',
        'filename' => 'uploaded[filename]|is_image[filename]'
        //'category'=> 'required|in_list[spares,feeders,bulktanks,robotmilkers]'
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

    public function createProduct()
    {
        try {
            $this->getCompiledInsert();
        } catch (\Exception $e) {

        }

    }

}