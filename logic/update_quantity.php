<?php

use App\CProducts;
use App\Db;

require "../src/classes/Db.php";
require "../src/classes/CProducts.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $request = new CProducts(Db::getConnection());
    $response = ['success' => $request->updateQuantity($_POST['id'], $_POST['quantity'])];
    echo json_encode($response);
}