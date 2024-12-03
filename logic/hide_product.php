<?php

use App\CProducts;
use App\Db;

require "../src/classes/Db.php";
require "../src/classes/CProducts.php";

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $request = new CProducts(Db::getConnection());
    $response = ['success' => $request->hideProduct($_POST['id'])];
    echo json_encode($response);
}


