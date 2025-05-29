<?php
include "db_conn.php";

// Fetch data from cart table
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

// Initialize an array to store cart data
$cart_data = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cart_data[] = $row;
    }
} else {
    echo "<script>alert('Your cart is empty');</script>";
}

// Check if the remove button is clicked
if(isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];
    $sql_remove = "DELETE FROM cart WHERE id = $remove_id";
    if ($conn->query($sql_remove) === TRUE) {
        echo "<script>alert('Item removed from cart');</script>";
        header("Location: fetch_cart.php");
    } else {
        echo "Error removing item: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="navbar">
        <div class="logo">MSS Gift Shop</div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="fetch_cart.php">Cart</a></li>
            <li><a href="about.html">About Us</a></li>
        </ul>
    </nav>

    <div class="product-list">
        <?php foreach ($cart_data as $item) { ?>
            <div class="product">
                <img src="<?php echo $item['product_image_url']; ?>" alt="Product Image">
				<div class="product-info">
                <p><?php echo $item['product_title']; ?></p>
                <p>Price: ₹<?php echo $item['product_price']; ?></p>
                <p>Quantity: <?php echo $item['quantity']; ?></p>
                <p>Total: ₹<?php echo $item['total_price']; ?></p>
                <a href="fetch_cart.php?remove_id=<?php echo $item['id']; ?>" class="remove-btn">Remove</a>
				</div>
			</div>
        <?php } ?>
    </div>

    <div class="cart-total">
        <p>Total Price: ₹<?php echo array_sum(array_column($cart_data, 'total_price')); ?></p>
    </div>

    <!-- Footer Section -->
    <section class="footer">
        <div class="tag">
            <h2>MSS Gift Shop</h2>
            <p>The perfect gifts for every occasion. Find something special for your loved ones!</p>
        </div>

        <div class="tag">
            <h1>Quick Links</h1>
            <a href="home.php">Home</a>
            <a href="submenu (1).php">Greeting Cards</a>
            <a href="submenu (2).php">Plush Toys</a>
            <a href="submenu (3).php">Mugs</a>
            <a href="fetch_cart.php">Cart</a>
            <a href="about.html">About</a>
        </div>

        <div class="tag">
            <ul>
                <h1>Contact Us</h1>
                <li>Email: info@mssgiftshop.com</li>
                <li>Phone: +123-456-7890</li>
                <li>Address: 123 Gift Street, City, Country</li>
            </ul>
        </div>

        <div class="tag">
            <ul>
                <h1>Follow Us</h1>
                <li>Twitter</li>
                <li>Instagram</li>
                <li>Whatsapp</li>
            </ul>
        </div>            
    </section>
</body>
</html>

</body>
</html>

