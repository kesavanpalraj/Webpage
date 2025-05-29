<?php
include "db_conn.php";

// Check if the necessary data is available in $_POST
if (isset($_POST['product_id'], $_POST['product_title'], $_POST['product_price'], $_POST['product_image_url'], $_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price']; // Add this in the form
    $product_image_url = $_POST['product_image_url']; // Add this in the form
    $quantity = $_POST['quantity'];
    $total_price = $product_price * $quantity;

    // Check if the product already exists in the cart
    $check_sql = "SELECT * FROM cart WHERE product_id='$product_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Product already in cart, update quantity and total price
        $update_sql = "UPDATE cart SET quantity = quantity + $quantity, total_price = total_price + $total_price WHERE product_id='$product_id'";
        if ($conn->query($update_sql) === TRUE) {
            echo '<script type="text/javascript">';
            echo 'alert("Product updated in cart successfully");';
            echo 'window.location.href = "fetch_cart.php";';  // Redirect to cart page or wherever you want
            echo '</script>';
        } else {
            echo '<div style="text-align: center; margin-top: 20px;">';
            echo '<h2 style="color: red;">Error: ' . $conn->error . '</h2>';
            echo '</div>';
        }
    } else {
        // Insert data into cart table
        $sql = "INSERT INTO cart (product_id, product_title, product_image_url, product_price, quantity, total_price) 
                VALUES ('$product_id', '$product_title', '$product_image_url', '$product_price', '$quantity', '$total_price')";
        if ($conn->query($sql) === TRUE) {
            echo '<script type="text/javascript">';
            echo 'alert("Product added to cart successfully");';
            echo 'window.location.href = "fetch_cart.php";';  // Redirect to cart page or wherever you want
            echo '</script>';
        } else {
            echo '<div style="text-align: center; margin-top: 20px;">';
            echo '<h2 style="color: red;">Error: ' . $conn->error . '</h2>';
            echo '</div>';
        }
    }
} else {
    echo '<div style="text-align: center; margin-top: 20px;">';
    echo '<h2 style="color: red;">Error: Missing required data</h2>';
    echo '</div>';
}

$conn->close();
?>
