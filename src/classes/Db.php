<?php

namespace App;

use PDO;

class Db
{
    private static string $hostname = '127.0.0.1';
    private static string $username = 'user';
    private static string $password = 'password';
    private static string $dbname = 'Products';

    private static ?PDO $connection = null;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            self::$connection = new PDO(
                sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::$hostname, self::$dbname),
                self::$username,
                self::$password
            );
        }
        return self::$connection;
    }

    /*
     * CREATE TABLE IF NOT EXISTS Products (
        ID INT PRIMARY KEY AUTO_INCREMENT,
        PRODUCT_ID INT NOT NULL,
        PRODUCT_NAME VARCHAR(255) NOT NULL,
        PRODUCT_PRICE DECIMAL(10, 2) NOT NULL,
        PRODUCT_ARTICLE VARCHAR(100),
        PRODUCT_QUANTITY INT NOT NULL,
        DATE_CREATE DATETIME DEFAULT CURRENT_TIMESTAMP,
        IS_HIDDEN TINYINT DEFAULT 0
    )
     */
}
