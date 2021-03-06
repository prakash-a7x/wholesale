<?php

class OrderContr extends Order {

    private $user_id;
    private $product_id;
    private $created_at;
    private $updated_at;

    public function __construct($user_id, $product_id, $created_at = NULL, $updated_at = NULL)
    {
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        if ($created_at != NULL) {
            $this->created_at = $created_at;
        }
        if ($updated_at != NULL) {
            $this->updated_at = $updated_at;
        }
    }

    public static function getOrders() 
    {
        $orders = Order::getAllOrders();
        return $orders;
    }

}