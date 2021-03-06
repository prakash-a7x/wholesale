<?php

$base_url = $_SERVER['DOCUMENT_ROOT'] ."/wholesale/";

// Instantiate Product class
include_once $base_url."classes/dbh.class.php";
include_once $base_url."classes/product.class.php";
include_once $base_url."classes/product-contr.class.php";

class ProductContent {
    public static function get_products() {
        return ProductContr::getProducts();
    }
    
    public static function get_product_by_id($product_id) {
        return ProductContr::getProductById($product_id);
    }

    public static function get_all_products($offset = null) {
        return ProductContr::getAllProducts($offset);
    }

    public static function get_product_detail_by_id($product_id) {
        return ProductContr::getProductDetailById($product_id);
    }

    public static function set_product_for_seller($product, $user_id) {
        return ProductContr::setProductSeller($product, $user_id);
    }
}
