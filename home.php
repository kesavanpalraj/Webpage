<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MSS Gift Shop</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="logo">
            <img src="images/logo.jpeg" alt="MSS Gift Shop Logo" class="logo-img">MSS Gift Shop
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li>
                <a href="#categories">Categories</a>
                <ul class="dropdown">
                    <li><a href="submenu (1).php">Greeting Cards</a></li>
                    <li><a href="submenu (2).php">Plush Toys</a></li>
                    <li><a href="submenu (3).php">Mugs</a></li>
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

    <!-- Search Bar -->
    <div class="search-container">
        <input type="text" id="search-bar" placeholder="Search for gifts...">
    </div>

    <!-- Product Listings -->
    <div class="product-list">
        <!-- Product Form 1 -->
        <form action="add_to_cart.php" method="POST">
            <div class="product" data-title="Personalized Mug">
                <img src="images/gift1.jpeg" alt="Personalized Mug">
                <div class="product-info">
					<h3>Personalized Mug</h3>
					<h3>Price:499</h3>
                    <input type="hidden" name="product_id" value="1">
                    <input type="hidden" name="product_title" value="Personalized Mug">
                    <input type="hidden" name="product_price" value="499">
                    <input type="hidden" name="product_image_url" value="images/gift1.jpeg">

                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" required class="quantity-input">

                    <button type="submit" class="main_btn">Add to Cart</button><br><br>
                    <a href="product_review/review (1).html" class="but_btn">Learn More</a>
                </div>
            </div>
        </form>

        <!-- Product Form 2 (similar to form 1) -->
        <form action="add_to_cart.php" method="POST">
            <div class="product" data-title="keychain">
                <img src="images/gift1.jpeg" alt="keychain">
                <div class="product-info">
					<h3>Keychain</h3>
                    <input type="hidden" name="product_id" value="2">
                    <input type="hidden" name="product_title" value="keychain">
                    <input type="hidden" name="product_price" value="499">
                    <input type="hidden" name="product_image_url" value="images/gift1.jpeg">
                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" required class="quantity-input">
                    <button type="submit" class="main_btn">Add to Cart</button><br><br>
                    <a href="product_review/review (1).html" class="but_btn">Learn More</a>
                </div>
            </div>
        </form>

        <!-- Product Form 3 (Personalized Mug with Header) -->
        <form action="add_to_cart.php" method="POST">
            <div class="product" data-title="frame">
                <img src="images/gift1.jpeg" alt="frame">
                <div class="product-info">
                    <h3>Photo Frame</h3>
                    <input type="hidden" name="product_id" value="3">
                    <input type="hidden" name="product_title" value="frame">
                    <input type="hidden" name="product_price" value="499">
                    <input type="hidden" name="product_image_url" value="images/gift1.jpeg">

                    <label for="quantity">Quantity:</label>
                    <input type="number" name="quantity" id="quantity" value="1" min="1" required class="quantity-input">

                    <button type="submit" class="main_btn">Add to Cart</button><br><br>
                    <a href="product_review/review (1).html" class="but_btn">Learn More</a>
                </div>
            </div>
        </form>
    </div>

    <!-- Error Message (Hidden by Default) -->
    <div class="error-message" style="display: none;">
        <p>No such gift found.</p>
    </div>

    <!-- JavaScript for Cart Operations -->
    <script>
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-id');
                fetch('add_to_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'product_id=' + productId
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                });
            });
        });
    </script>

    <script src="script.js"></script>

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
