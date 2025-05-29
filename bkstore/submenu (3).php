<!DOCTYPE html>
<html>
<head>
    <title>Book Store</title>
    <link rel="stylesheet" href="styles.css">
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

    <div class="search-container">
        <input type="text" id="search-bar" placeholder="Search for books...">
    </div>

    <div class="book-list">
        <div class="book" data-title="Our Secret World: Poetry book For Kids">
            <img src="book images/poetry (1).jpeg">
            <div class="book-info">
                <h3>Our Secret World:<br>Poetry Book</h3>
		<form action="add_to_cart.php" method="POST">
 		    <input type="hidden" name="book_id" value="23">
    		    <input type="hidden" name="book_title" value="Our Secret World: Poetry book For Kids">
		    <input type="hidden" name="image_url" value="book images/poetry (1).jpeg">
		    <input type="hidden" name="book_name" value="Our Secret World:<br>Poetry Book">
		    <input type="hidden" name="book_pdf_url" value="book pdf/book1.pdf">
		    <button type="submit" class="main_btn">Add to Cart</button><br><br>
 		    <a href="book review/review (19).html" class="but_btn">Learn More</a>
		</form>
            </div>
        </div>

        <div class="book" data-title="Indian English Poetry: A Critical Casebook">
            <img src="book images/poetry (2).jpeg">
            <div class="book-info">
                <h3>Indian English Poetry</h3>
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="book_id" value="24">
                    <input type="hidden" name="book_title" value="Indian English Poetry">
                    <input type="hidden" name="image_url" value="book images/poetry (2).jpeg">
		    <input type="hidden" name="book_name" value="Indian English<br>Poetry">
		    <input type="hidden" name="book_pdf_url" value="book pdf/book1.pdf">
                    <button type="submit" class="main_btn">Add to Cart</button><br><br>
                    <a href="book review/review (20).html" class="but_btn">Learn More</a>
                </form>
            </div>
        </div>

        <div class="book" data-title="The Book Of Job in Poetry">
            <img src="book images/poetry (3).jpeg">
            <div class="book-info">
                <h3>The Book Of Job<br>in Poetry<br></h3>
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="book_id" value="25">
                    <input type="hidden" name="book_title" value="The Book Of Job in Poetry">
                    <input type="hidden" name="image_url" value="book images/poetry (3).jpeg">
		    <input type="hidden" name="book_name" value="The Book Of Job<br>in Poetry">
		    <input type="hidden" name="book_pdf_url" value="book pdf/book1.pdf">
                    <button type="submit" class="main_btn">Add to Cart</button><br><br>
                    <a href="book review/review (21).html" class="but_btn">Learn More</a>
                </form>
            </div>
        </div>
        <div class="book" data-title="The History Of English Poetry">
            <img src="book images/poetry (4).jpeg">
            <div class="book-info">
                <h3>The History Of<br>English Poetry</h3>
                <form action="add_to_cart.php" method="POST">
                    <input type="hidden" name="book_id" value="26">
                    <input type="hidden" name="book_title" value="The History Of English Poetry">
                    <input type="hidden" name="image_url" value="book images/poetry (4).jpeg">
		    <input type="hidden" name="book_name" value="The History Of<br>English Poetry">
		    <input type="hidden" name="book_pdf_url" value="book pdf/book1.pdf">
                    <button type="submit" class="main_btn">Add to Cart</button><br><br>
                    <a href="book review/review (22).html" class="but_btn">Learn More</a>
                </form>
            </div>
        </div>
    </div>   
    <div class="error-message" style="display: none;">
        <p>No such book found.</p>
    </div>
    <script>
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const bookId = this.getAttribute('data-id');
                fetch('add_to_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'book_id=' + bookId
                })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                });
            });
        });
    </script>
    <script src="script.js"></script>

    <section class="footer">
        <div class="footer-container">
            <div class="tag">
                <h2>Our Online Bookstore</h2>     
                <p>The more that you read, the more things you will know.<br>The more that you learn, the more places you’ll go.</p>
            </div>
            
            <div class="tag">
                <h1>Quick Links</h1>
                <a href="#">Home</a>
                <a href="#">Cart</a>
                <a href="#">About</a>
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