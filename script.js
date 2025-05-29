const searchBar = document.getElementById('search-bar'); 
        const products = document.querySelectorAll('.product');
        const errorMessage = document.querySelector('.error-message');

        // Add event listener to the search bar
        searchBar.addEventListener('keyup', (e) => {
            const searchString = e.target.value.trim().toLowerCase();
            let foundProducts = false;
            
            // Iterate through products and filter by title
            products.forEach(product => {
                const title = product.getAttribute('data-title').toLowerCase();
                
                // If title matches search string, show product, otherwise hide it
                if (title.includes(searchString)) {
                    product.style.display = '';
                    foundProducts = true;
                } else {
                    product.style.display = 'none';
                }
            });

            // Show error message if no products match the search
            if (!foundProducts) {
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
            }
        });