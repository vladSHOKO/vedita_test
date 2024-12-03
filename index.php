<?php

namespace App;

require_once __DIR__ . "/vendor/autoload.php";

$request = new CProducts(Db::getConnection());

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="/styles.css" rel="stylesheet">
    <title>VeDita_test</title>
</head>
<script src="http://code.jquery.com/jquery.min.js"></script>
<script src="script/index.js">


</script>

<body>
<table border="1">
    <tr>
        <th>id</th>
        <th>product_id</th>
        <th>name</th>
        <th>price</th>
        <th>article</th>
        <th>quantity</th>
        <th>createAt</th>
        <th>is hidden</th>
        <th>to hide</th>
    </tr>
<?php
$request->showProducts($request->getProducts(10));
?>
</table>

</body>
</html>
