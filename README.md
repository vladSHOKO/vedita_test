## Запуск

Для запуска необходимо выполнить следующие команды:

```
docker compose up -d
```

Также, необходимо выполнить SQL запрос для создания таблицы

```
CREATE TABLE IF NOT EXISTS Products (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    PRODUCT_ID INT NOT NULL,
    PRODUCT_NAME VARCHAR(255) NOT NULL,
    PRODUCT_PRICE DECIMAL(10, 2) NOT NULL,
    PRODUCT_ARTICLE VARCHAR(100),
    PRODUCT_QUANTITY INT NOT NULL,
    DATE_CREATE DATETIME DEFAULT CURRENT_TIMESTAMP,
    IS_HIDDEN TINYINT DEFAULT 0
);
```

А для демонтрации работы добавить некоторые продукты(фикстуры)
