<?php


namespace App\Models;

use App\Entities\Product;
use CodeIgniter\Model;

class ProductModel extends Model
{
    /**Name of the table in the database.
     *
     * @var string
     */
    protected $table = 'product';

    /**Primary key of the table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $returnType = 'App\Entities\Product';

    /** Allows on the specified fields to be alternated.
     *
     * @var string[]
     */
    protected $allowedFields = [
        'name',
        'price',
        'tag',
        'description',
        'filename',
        'category',
    ];

    /** Validation rules array is a server side validation,
     * example: (The name is required and it can have a maximum of 211 characters).
     *
     * @var string[]
     */
    protected $validationRules = [
        'name' => 'required|max_length[211]',
//        'price' => 'required|max_length[211]',
//        'tag' => 'required|max_length[211]',
        'description' => 'required|max_length[600]'
    ];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';


    /**Function that inserts the product in the database.
     *
     *
     * @param Product $product
     * @return bool
     */
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

    /**The modify function is used during editing of a product.
     *
     *
     * @param Product $product
     * @return bool
     */
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


    /** Function which finds all products where the category is matched.
     *
     *
     * @param Product $product
     * @return array
     */
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