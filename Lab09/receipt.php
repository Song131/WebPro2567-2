<?php
require_once("database.php");
require_once("customer.php");

class Receipt extends DataMapper
{
    public $table = "receipt";
    public $pk = "receipt_id";
    public $fields = ['customer_id', 'menu_id'];


    public function getCustomer($customer_id)   
    {
        $customer_id = new Customer();
        $data = $customer_id->get($customer_id);
        if ($data)
            return $data;
        
    }

}

$receipt = new Receipt();
$data = $receipt->list();

var_dump($data);

echo "<br>";
$cake = $receipt->get(1);
var_dump($cake);