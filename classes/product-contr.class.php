<?php

class ProductContr extends Product {

    private $name;
    private $retail_price;
    private $wholesale_price;
    private $image;
    private $image_2;
    private $publish_by;
    private $status;
    private $created_at;
    private $updated_at;

    public function __construct($name, $retail_price, $wholesale_price, $publish_by, $status, $created_at = NULL, $updated_at = NULL)
    {
        $this->name = $name;
        $this->retail_price = $retail_price;
        $this->wholesale_price = $wholesale_price;
        $this->publish_by = $publish_by;
        $this->status = $status;
        if ($created_at != NULL) {
            $this->created_at = $created_at;
        }
        if ($updated_at != NULL) {
            $this->updated_at = $updated_at;
        }
    }

    public function addProduct()
    {
        if ($this->emptyInput() == false) {
            $result = array(
                "status" => "error",
                "message" => "Please Input all the required fields"
            );
            return $result;
        }

        $product_id = $this->setProduct($this->name, $this->retail_price, $this->wholesale_price, $this->publish_by, $this->status, $this->created_at, $this->updated_at);

        return $product_id;
    }

    public function updateProduct($id)
    {
        if ($this->emptyInput() == false) {
            $result = array(
                "status" => "error",
                "message" => "Please Input all the required fields"
            );
            return $result;
        }

        $product_id = $this->editProduct($id, $this->name, $this->retail_price, $this->wholesale_price, $this->publish_by, $this->status, $this->updated_at);

        return $product_id;
    }

    public function addImage($image_path, $product_id, $column_name)
    {
        return $this->setImage($image_path, $product_id, $column_name);
    }

    public static function getProducts() 
    {
        $products = Product::getSellerProducts();
        return $products;
    }

    public static function getAllProducts($offset = null)
    {
        $products = Product::getAllSellerProducts($offset);
        return $products;
    }

    public static function getProductById($id)
    {
        $product = Product::getSellerProductById($id);
        return $product;
    }

    public static function getProductDetailById($id)
    {
        $product = Product::getProductDetailById($id);
        return $product;
    }

    public static function setProductSeller($product, $user_id)
    {
        $name = $product["name"];
        $retail_price = $product["retail_price"];
        $wholesale_price = $product["wholesale_price"];
        $image = $product["image"];
        $image_2 = $product["image_2"];
        $publish_by = $user_id;
        $status = "published";
        $created_at = date("Y-m-d H:i:s");
        $updated_at = $created_at;
        $set_product = Product::setProductForSeller($name, $retail_price, $wholesale_price, $image, $image_2, $publish_by, $status, $created_at, $updated_at);
        
        return $set_product;
    }

    private function emptyInput()
    {
        $result = false;
        if (empty($this->name) || empty($this->retail_price) || empty($this->status)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

}