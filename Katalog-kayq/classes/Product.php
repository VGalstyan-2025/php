<?php
class Product {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addProduct($user_id, $data) {
        $title = $data['title'];
        $brand = $data['brand'];
        $price = $data['price'];
        $color = $data['color'];
        $description = $data['description'];
        $image = $data['image'];

        $stmt = $this->conn->prepare(
            "INSERT INTO products(user_id,title,brand,price,color,description,image) 
             VALUES (?,?,?,?,?,?,?)"
        );
        $stmt->bind_param("issdsss", $user_id, $title, $brand, $price, $color, $description, $image);

        return $stmt->execute();
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM products ORDER BY id DESC");
    }
}
?>
