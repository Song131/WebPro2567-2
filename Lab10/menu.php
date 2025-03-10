<?php
require_once("database.php");

class Menu extends DataMapper
{
    public const table = "manus";
    public const pk = "manu_id";
    public const fields = ['manu_name', 'price'];

    public $data = [];
    public $is_new = false;

    public function __construct($data = null, $is_new = false)
    {
        parent::__construct(self::table, self::pk, self::fields);
        $this->data = $data;
        $this->is_new = $is_new;
    }
}


$menu = new Menu();
$method = $_SERVER['REQUEST_METHOD'];

if (isset($_GET['list'])) {
    echo json_encode($menu->list());
} else if ($method == 'POST') {
    // $data = file_get_contents('php://input');
    // json_decode($data);
    $data = json_decode(file_get_contents('php://input'), true);
    $menu->add($data);
}