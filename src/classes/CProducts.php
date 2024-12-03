<?php

namespace App;

use PDO;

class CProducts
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getProducts($limit): array
    {
        $request = $this->connection->prepare('select * from Products where IS_HIDDEN = 0 order by DATE_CREATE limit :limit');
        $request->bindParam(':limit', $limit, PDO::PARAM_INT);
        $request->execute();
        $products = [];
        while ($row = $request->fetch(PDO::FETCH_ASSOC)) {
            $products[] = $row;
        }
        return $products;
    }

    public function showProducts($products)
    {
        foreach ($products as $product) {
            echo '<tr id="' . $product['ID'] . '">';
            foreach ($product as $key => $column) {
                echo '<td>';

                if ($key == 'PRODUCT_QUANTITY') {
                    echo "<button class='plus' id=" . $product['ID'] . 'plus' . " value='plus'>+</button>";
                    echo "<span class='$key'> $column </span>";
                    echo "<button class='minus' id=" . $product['ID'] . 'minus' . " value='minus'>-</button>";
                } else {
                    echo $column;
                }

                echo '</td>';
            }
            echo '<td><button class="hide" id=' . "hide" . $product['ID'] . ' value=' . $product['ID'] . '>Скрыть</button></td>';

            echo '</tr>';
        }

    }

    public function hideProduct($id): bool
    {
        $request = $this->connection->prepare('update Products set IS_HIDDEN = 1 where ID = :id');
        $request->bindParam('id', $id, PDO::PARAM_INT);
        return $request->execute();
    }

    public function updateQuantity($id, $quantity): bool
    {
        $request = $this->connection->prepare('update Products set PRODUCT_QUANTITY = :quantity where ID = :id');
        $request->bindParam(':quantity', $quantity, PDO::PARAM_INT);
        $request->bindParam(':id', $id, PDO::PARAM_INT);
        return $request->execute();
    }
}