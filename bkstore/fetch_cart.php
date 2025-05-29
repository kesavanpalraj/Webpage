<?php
include "db_conn.php";

// Fetch data from cart table
$sql = "SELECT * FROM cart";
$result = $conn->query($sql);

// Initialize an array to store cart data
$cart_data = array();

if ($result->num_rows > 0) {
    // Fetch each row and store in the array
    while($row = $result->fetch_assoc()) {
        $cart_data[] = $row;
    }
} else {
    echo "<script>alert('Your cart empty');</script>";
}

// Check if the remove button is clicked
if(isset($_GET['remove_id'])) {
    $remove_id = $_GET['remove_id'];
    // SQL to remove item from cart
    $sql_remove = "DELETE FROM cart WHERE id = $remove_id";
    if ($conn->query($sql_remove) === TRUE) {
        echo "<script>alert('Item removed from cart');</script>";
        // Redirect to this page to refresh the cart
        header("Location: fetch_cart.php");
    } else {
        echo "Error removing item from cart: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cart</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="http://localhost/bkstore/book review/styles.css">
</head>
<body>
    <nav class="navbar">
    <div class="logo-container">
            <a href="#" class="imglogo">
                <img src="book images/logo.jpg" alt="Logo" class="logo-img">
            </a>
            <span class="logo-text">Book Store</span>
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="#categories">Categories</a>
                <ul class="dropdown">
                    <li><a href="submenu (1).php">Historys</a></li>
                    <li><a href="submenu (2).php">Love Storys</a></li>
                    <li><a href="submenu (3).php">Poetrys</a></li>
                </ul>
            </li>
            <li><a href="fetch_cart.php">Cart</a></li>
            <li><a href="about.html">About Us</a></li>
        </ul>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>

    <div class="cart-list">
    <?php 
    if ($result->num_rows == 0) { 
        echo "<div class='empty-cart-message'>
                <p>Your cart is empty!</p>
                <a href='home.php' class='add-book-btn'>Add a Book</a>
              </div>";
    } else {
        foreach ($cart_data as $book) { ?>
            <div class="cart-item">
                <img src="<?php echo $book['image_url']; ?>" alt="Book Cover">
                <p style="font-size: 22px;"><?php echo $book['book_name']; ?></p>
                <a href="<?php echo $book['book_pdf_url']; ?>" target="_blank" class="btn-pdf">Read this book</a><br><br> 
                <button class="rm_btn"><a href="fetch_cart.php?remove_id=<?php echo $book['id']; ?>">Remove</a></button>
            </div>
    <?php 
        } // End foreach
    } // End if-else
    ?>
</div>

    <section class="footer">
        <div class="footer-container">
            <div class="tag">
                <h2>Our Online Bookstore</h2>     
                <p>The more that you read, the more things you will know.<br>The more that you learn, the more places you’ll go.</p>
            </div>
            
            <div class="tag">
                <h1>Quick Links</h1>
                <a href="http://localhost/bkstore/home.php">Home</a>
                <a href="http://localhost/bkstore/fetch_cart.php">Cart</a>
                <a href="http://localhost/bkstore/about.html">About</a>
            </div>

            <div class="tag">
                <h1>Community</h1>
                <ul>
                    <li><a href="#">Book Reviews</a></li>
                    <li><a href="#">Reading Forums</a></li>
                    <li><a href="#">Book Clubs</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Events & Meetups</a></li>
                </ul>
            </div>
                        
            <div class="tag">
                <h1>Contact Us</h1>
                <ul>
                    <li>Email: info@yourbookstore.com</li>
                    <li>Phone: +123-456-7890</li>
                    <li>Address: 123 Bookstore Street, City, Country</li>
                    <li>Working Hours: Mon-Fri, 9 AM - 6 PM</li>
                </ul>
            </div>
            
            <div class="tag">
                <h1>Follow Us</h1>
                <ul>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">WhatsApp</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Twitter</a></li>
                    <li><a href="#">YouTube</a></li>
                </ul>
            </div>
        </div>
    
        <!-- Copyright should be outside the flex container -->
        <div class="copyright">
            <p>&copy; 2025 Your Bookstore. All rights reserved.</p>
        </div>
    </section></body>
</html>
