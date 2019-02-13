<?php

include_once "Database.php";

class Cart extends Database
{

    public function add_to_cart($itemID, $userID, $cartItemQuantity, $itemPrice)
    {

        //select from items to get quantity and price
        $selectItem = "SELECT * FROM items WHERE itemID = $itemID";
        $itemResult = $this->conn->query($sql);

        if ($itemResult) {
            //fetch values from item table
            $itemRow = $result->fetch_assoc();
            $new_item_quantity = $itemRow['quantity'] - $cartItemQuantity;
            $total_price = $itemPrice * $cartItemQuantity;

            //select if cart is existing
            $sql = "SELECT * FROM cart WHERE userID = $userID AND status = 'pending'";
            $result = $this->conn->query($sql);

            if ($result->num_rows == 1) {

                //fetch values from cart table
                $row = $result->fetch_assoc();

                $cartID = $row['cartID'];

                $insertCartItem = "INSERT INTO cartItems(cartId, itemId, cartItemQuantity, cartItemPrice) VALUES($cartID, $itemID, $cartItemQuantity, $total_price)";
                $result_cart_item = $this->conn->query($sql);

                if ($result_cart_item) {
                    $updateItem = "UPDATE items SET itemQuantity=$new_item_quantity WHERE itemId=$itemID";
                    $updatresult = $this->conn->query($sql);
                    if ($updatresult) {
                        $this->redirectjs('index.php');
                    } else {
                        echo $this->conn->error;
                    }
                } else {
                    echo $this->conn->error;
                }
            } else {
                $insertCart = "INSERT INTO cart(userId, cartStatus) VALUES($userId, 'pending')";
                $cart_insert_result = $this->conn->query($sql);

                if ($cart_insert_result) {
                    //get the last cart_id in the cart table
                    $cartID = $this->conn->insert_id;

                    $insertCartItem = "INSERT INTO cartItems(cartId, itemId, cartItemQuantity, cartItemPrice) VALUES($cartID, $itemID, $cartItemQuantity, $total_price)";
                    $result_cart_item = $this->conn->query($sql);

                    if ($result_cart_item) {
                        $updateItem = "UPDATE items SET itemQuantity=$new_item_quantity WHERE itemId=$itemID";
                        $updatresult = $this->conn->query($sql);
                        if ($updatresult) {
                            $this->redirectjs('index.php');
                        } else {
                            echo $this->conn->error;
                        }
                    } else {
                        echo $this->conn->error;
                    }
                }

            }
        }

    }
}
