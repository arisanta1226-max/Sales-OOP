<?php

require_once "database.php";

class Products extends Database
{
    public function getAllProducts()
    {
        $sql = "SELECT * FROM Products";

        if ($result = $this->conn->query($sql)) {
            return $result;
        } else {
            die($this->conn->error);
        }
    }

    public function addProduct($request)
    {
        $product_name = $request['product_name'];
        $price        = $request['price'];
        $quantity     = $request['quantity'];

        $sql = "INSERT INTO Products (product_name, price, quantity) VALUES ('$product_name', $price, $quantity)";

        if ($this->conn->query($sql)) {
            header("location: ../views/dashboard.php");
            exit();
        } else {
            die('Error adding the product ' . $this->conn->error);
        }
    }

    public function deleteProduct($id)
    {

        $sql = "DELETE FROM Products WHERE id = $id";

        if ($this->conn->query($sql)) {
            header("location: ../views/dashboard.php");
            exit();
        } else {
            die('Error deleting the product ' . $this->conn->error);
        }
    }

    public function updateProduct($id, $request)
    {

        $product_name = $request['product_name'];
        $price = $request['price'];
        $quantity = $request['quantity'];

        $sql = "UPDATE Products SET product_name = '$product_name', price = $price, quantity = $quantity WHERE id = $id";

        if ($this->conn->query($sql)) {
            header("location: ../views/dashboard.php");
            exit();
        } else {
            die("Error" . $this->conn->error);
        }
    }

    public function getProduct($id)
    {

        $sql = "SELECT * FROM Products WHERE id = $id";

        if ($result = $this->conn->query($sql)) {
            return $result->fetch_assoc();
        } else {
            die('Error ' . $this->conn->error);
        }
    }


    public function buyProduct($id, $request)
    {


        $price = $request['price'];
        $quantity = $request['quantity'];
        $buy_quantity  = $request['buy_product'];

        $total_price = $price * $buy_quantity;
        $new_quantity = $quantity - $buy_quantity;

            session_start();
            $_SESSION['total_price'] = $total_price;
            $_SESSION['buy_quantity'] = $buy_quantity;
            $_SESSION['new_quantity'] = $new_quantity;

            header("location: ../views/payment.php?id=" . $id);
            exit();
 
    }

    public function payment($id, $request)
    {
        session_start();
        $payment = $request['payment'];
        $buy_quantity = $_SESSION['buy_quantity'];
        $new_quantity = $_SESSION['new_quantity'];
        $total_price = $_SESSION['total_price'];


        $sql = "UPDATE Products SET quantity = $new_quantity Where id = $id";


        if ($this->conn->query($sql)) {
            header("location: ../views/dashboard.php");
            exit();
        } else {
            die("Error" . $this->conn->error);
        }
    }
}
