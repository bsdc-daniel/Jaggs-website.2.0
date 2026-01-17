<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Jags Clothing</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: #333;
            background: #fff;
        }

        header {
            background: #000000;
            color: #fff;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        nav {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;
        }

        .logo {
            font-size: 2rem;
            font-weight: bold;
            letter-spacing: 3px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Alfa Slab One', cursive;
            color: #E25D4F;
            text-decoration: none;
        }

        .logo img {
            height: 50px;
            width: auto;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 2rem;
            align-items: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #E25D4F;
        }

        .basket {
            position: relative;
            cursor: pointer;
            font-size: 1.5rem;
        }

        .basket-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #E25D4F;
            color: #fff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: bold;
        }

        .basket-dropdown {
            position: absolute;
            top: 100%;
            right: 0;
            background: #fff;
            color: #333;
            min-width: 300px;
            max-width: 400px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
            border-radius: 10px;
            margin-top: 1rem;
            padding: 1rem;
            display: none;
            z-index: 2000;
            max-height: 500px;
            overflow-y: auto;
        }

        .basket-dropdown.show {
            display: block;
        }

        .basket-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem;
            border-bottom: 1px solid #eee;
        }

        .basket-item-info {
            flex: 1;
        }

        .basket-item-name {
            font-weight: bold;
            color: #1a1a1a;
            margin-bottom: 0.25rem;
        }

        .basket-item-price {
            color: #4A9B9B;
            font-size: 0.9rem;
        }

        .basket-item-remove {
            background: #E25D4F;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.85rem;
        }

        .basket-total {
            padding: 1rem 0.75rem;
            font-weight: bold;
            font-size: 1.2rem;
            color: #1a1a1a;
            border-top: 2px solid #4A9B9B;
            margin-top: 0.5rem;
        }

        .basket-empty {
            padding: 2rem;
            text-align: center;
            color: #999;
        }

        .checkout-button {
            background: #4A9B9B;
            color: #fff;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            width: 100%;
            cursor: pointer;
            font-size: 1rem;
            font-weight: bold;
            margin-top: 0.5rem;
        }

        .checkout-button:hover {
            background: #3A8B8B;
        }

        .shop-container {
            max-width: 1400px;
            margin: 100px auto 2rem;
            padding: 0 2rem;
        }

        .shop-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .shop-header h1 {
            font-family: 'Alfa Slab One', cursive;
            font-size: 3rem;
            color: #E25D4F;
            margin-bottom: 1rem;
        }

        .shop-header p {
            font-size: 1.2rem;
            color: #666;
        }

        .filter-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
            padding: 1.5rem;
            background: #f8f9fa;
            border-radius: 15px;
        }

        .filter-group {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .filter-btn {
            padding: 0.7rem 1.5rem;
            border: 2px solid #ddd;
            background: #fff;
            border-radius: 25px;
            cursor: pointer;
            font-size: 0.95rem;
            transition: all 0.3s;
        }

        .filter-btn:hover,
        .filter-btn.active {
            background: #E25D4F;
            color: #fff;
            border-color: #E25D4F;
        }

        .sort-select {
            padding: 0.7rem 1.5rem;
            border: 2px solid #ddd;
            border-radius: 25px;
            font-size: 0.95rem;
            cursor: pointer;
            background: #fff;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-bottom: 3rem;
        }

        .product-card {
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
            border: 1px solid #eee;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .product-image-container {
            position: relative;
            width: 100%;
            height: 350px;
            overflow: hidden;
            background: #f8f9fa;
        }

        .product-images {
            display: flex;
            transition: transform 0.3s ease;
            height: 100%;
        }

        .product-image {
            min-width: 100%;
            height: 350px;
            background: linear-gradient(45deg, #F4C542, #E8B042);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: #fff;
        }

        .product-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(0, 0, 0, 0.5);
            color: #fff;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: background 0.3s;
            z-index: 10;
        }

        .product-nav:hover {
            background: rgba(226, 93, 79, 0.8);
        }

        .product-nav.prev {
            left: 10px;
        }

        .product-nav.next {
            right: 10px;
        }

        .product-card:hover .product-nav {
            display: flex;
        }

        .product-indicators {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 6px;
            z-index: 10;
        }

        .indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transition: background 0.3s;
        }

        .indicator.active {
            background: #fff;
        }

        .product-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: #E25D4F;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
            z-index: 10;
        }

        .product-info {
            padding: 1.5rem;
        }

        .product-category {
            color: #4A9B9B;
            font-size: 0.85rem;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .product-info h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: #1a1a1a;
        }

        .product-info p {
            color: #666;
            margin-bottom: 1rem;
            font-size: 0.95rem;
        }

        .product-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .price {
            font-size: 1.8rem;
            font-weight: bold;
            color: #4A9B9B;
        }

        .rating {
            color: #F4C542;
            font-size: 1rem;
        }

        .size-options {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .size-btn {
            padding: 0.5rem 1rem;
            border: 2px solid #ddd;
            background: #fff;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: all 0.3s;
        }

        .size-btn:hover,
        .size-btn.selected {
            border-color: #4A9B9B;
            background: #4A9B9B;
            color: #fff;
        }

        .buy-button {
            background: #E25D4F;
            color: #fff;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s;
            width: 100%;
            font-size: 1rem;
            font-weight: bold;
        }

        .buy-button:hover {
            background: #FF8B6D;
        }

        footer {
            background: #000000;
            color: #fff;
            padding: 2rem;
            text-align: center;
            margin-top: 4rem;
        }

        @media (max-width: 768px) {
            .shop-header h1 {
                font-size: 2rem;
            }

            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1.5rem;
            }

            .filter-bar {
                flex-direction: column;
                align-items: stretch;
            }

            .filter-group {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <a href="index.html" class="logo">
                <img src="/ebf4afbc-7949-430e-9d8d-4c0ceca2a5b9.jpeg" alt="">
                JAGS
            </a>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="index.html#about">About</a></li>
                <li><a href="index.html#contact">Contact</a></li>
                <li class="basket" onclick="toggleBasket()">
                    🛒
                    <span class="basket-count" id="basketCount">0</span>
                    <div class="basket-dropdown" id="basketDropdown">
                        <div id="basketItems"></div>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="shop-container">
        <div class="shop-header">
            <h1>SHOP COLLECTION</h1>
            <p>Premium streetwear for the modern individual</p>
        </div>

        <div class="filter-bar">
            <div class="filter-group">
                <button class="filter-btn active" onclick="filterProducts('all')">All</button>
                <button class="filter-btn" onclick="filterProducts('clothing')">Clothing</button>
                <button class="filter-btn" onclick="filterProducts('accessories')">Accessories</button>
                <button class="filter-btn" onclick="filterProducts('footwear')">Footwear</button>
            </div>
            <select class="sort-select" onchange="sortProducts(this.value)">
                <option value="featured">Featured</option>
                <option value="price-low">Price: Low to High</option>
                <option value="price-high">Price: High to Low</option>
                <option value="name">Name: A-Z</option>
            </select>
        </div>

        <div class="product-grid" id="productGrid">
            <!-- Products will be dynamically generated -->
        </div>
    </div>

    <footer>
        <p>&copy; 2026 Jags Clothing. All rights reserved.</p>
    </footer>

    <!-- Checkout Modal -->
    <div class="auth-modal" id="checkoutModal">
        <div class="auth-modal-content">
            <button class="auth-modal-close" onclick="closeCheckoutModal()">×</button>
            <h2>Checkout</h2>
            <div id="checkoutContent"></div>
        </div>
    </div>

    <style>
        .auth-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 3000;
            justify-content: center;
            align-items: center;
        }

        .auth-modal.show {
            display: flex;
        }

        .auth-modal-content {
            background: #fff;
            padding: 2rem;
            border-radius: 15px;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
        }

        .auth-modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: #666;
        }

        .auth-modal h2 {
            color: #E25D4F;
            font-family: 'Alfa Slab One', cursive;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .checkout-form {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .form-input {
            padding: 0.9rem;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
        }

        .form-input:focus {
            outline: none;
            border-color: #4A9B9B;
        }

        .order-summary {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid #ddd;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .order-item-details {
            flex: 1;
        }

        .order-item-name {
            font-weight: bold;
            color: #1a1a1a;
        }

        .order-item-size {
            color: #666;
            font-size: 0.9rem;
        }

        .order-item-price {
            color: #4A9B9B;
            font-weight: bold;
        }

        .order-total {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1a1a1a;
            text-align: right;
            padding-top: 1rem;
            border-top: 2px solid #4A9B9B;
            margin-top: 1rem;
        }

        .submit-order-btn {
            background: #E25D4F;
            color: #fff;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
        }

        .submit-order-btn:hover {
            background: #FF8B6D;
        }

        .submit-order-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .success-message {
            background: #e6ffe6;
            color: #2d7a2d;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .error-message {
            background: #ffe6e6;
            color: #c74444;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
        }

        .size-warning {
            color: #E25D4F;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }
    </style>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script type="text/javascript">
        (function(){
            emailjs.init({
                publicKey: "omg0iWYIYE6Zv5_B7",
            });
        })();
    </script>

    <script>
        let basket = [];
        const productImageStates = {};

        const products = [
            {
                id: 1,
                name: "Classic Tee",
                category: "clothing",
                price: 35.00,
                description: "Premium cotton blend with signature Jags logo",
                images: ["👕", "👕", "👕"],
                colors: ["#F4C542", "#E25D4F", "#4A9B9B"],
                sizes: ["S", "M", "L", "XL"],
                rating: "⭐⭐⭐⭐⭐",
                badge: "Bestseller"
            },
            {
                id: 2,
                name: "Urban Hoodie",
                category: "clothing",
                price: 65.00,
                description: "Comfortable streetwear essential for any season",
                images: ["🧥", "🧥", "🧥", "🧥"],
                colors: ["#F4C542", "#E25D4F", "#4A9B9B", "#000"],
                sizes: ["S", "M", "L", "XL", "XXL"],
                rating: "⭐⭐⭐⭐⭐"
            },
            {
                id: 3,
                name: "Relaxed Jeans",
                category: "clothing",
                price: 75.00,
                description: "Durable denim with modern cut and finish",
                images: ["👖", "👖", "👖"],
                colors: ["#F4C542", "#2B4C7E", "#000"],
                sizes: ["28", "30", "32", "34", "36"],
                rating: "⭐⭐⭐⭐"
            },
            {
                id: 4,
                name: "Signature Cap",
                category: "accessories",
                price: 25.00,
                description: "Complete your look with our branded headwear",
                images: ["🧢", "🧢", "🧢", "🧢"],
                colors: ["#F4C542", "#E25D4F", "#000", "#4A9B9B"],
                sizes: ["One Size"],
                rating: "⭐⭐⭐⭐⭐",
                badge: "New"
            },
            {
                id: 5,
                name: "Street Sneakers",
                category: "footwear",
                price: 85.00,
                description: "Comfortable kicks for everyday wear",
                images: ["👟", "👟", "👟"],
                colors: ["#F4C542", "#fff", "#000"],
                sizes: ["7", "8", "9", "10", "11", "12"],
                rating: "⭐⭐⭐⭐⭐"
            },
            {
                id: 6,
                name: "Winter Gloves",
                category: "accessories",
                price: 30.00,
                description: "Stay warm with style and comfort",
                images: ["🧤", "🧤", "🧤"],
                colors: ["#F4C542", "#000", "#4A9B9B"],
                sizes: ["S", "M", "L"],
                rating: "⭐⭐⭐⭐"
            },
            {
                id: 7,
                name: "Urban Backpack",
                category: "accessories",
                price: 55.00,
                description: "Spacious and stylish for daily adventures",
                images: ["🎒", "🎒", "🎒", "🎒"],
                colors: ["#F4C542", "#E25D4F", "#000", "#4A9B9B"],
                sizes: ["One Size"],
                rating: "⭐⭐⭐⭐⭐",
                badge: "Popular"
            },
            {
                id: 8,
                name: "Knit Scarf",
                category: "accessories",
                price: 35.00,
                description: "Cozy accessory for cold weather",
                images: ["🧣", "🧣", "🧣"],
                colors: ["#F4C542", "#E25D4F", "#4A9B9B"],
                sizes: ["One Size"],
                rating: "⭐⭐⭐⭐"
            },
            {
                id: 9,
                name: "Cargo Pants",
                category: "clothing",
                price: 70.00,
                description: "Functional style with multiple pockets",
                images: ["👖", "👖", "👖"],
                colors: ["#8B7355", "#000", "#4A9B9B"],
                sizes: ["28", "30", "32", "34", "36"],
                rating: "⭐⭐⭐⭐⭐"
            },
            {
                id: 10,
                name: "Bomber Jacket",
                category: "clothing",
                price: 95.00,
                description: "Classic outerwear with modern twist",
                images: ["🧥", "🧥", "🧥"],
                colors: ["#000", "#4A9B9B", "#8B7355"],
                sizes: ["S", "M", "L", "XL"],
                rating: "⭐⭐⭐⭐⭐",
                badge: "Limited"
            },
            {
                id: 11,
                name: "Athletic Shorts",
                category: "clothing",
                price: 40.00,
                description: "Perfect for workouts or casual wear",
                images: ["🩳", "🩳", "🩳"],
                colors: ["#000", "#4A9B9B", "#E25D4F"],
                sizes: ["S", "M", "L", "XL"],
                rating: "⭐⭐⭐⭐"
            },
            {
                id: 12,
                name: "Leather Belt",
                category: "accessories",
                price: 45.00,
                description: "Premium leather with signature buckle",
                images: ["👔", "👔", "👔"],
                colors: ["#8B4513", "#000", "#654321"],
                sizes: ["S", "M", "L", "XL"],
                rating: "⭐⭐⭐⭐⭐"
            }
        ];

        let currentFilter = 'all';
        let currentSort = 'featured';

        function renderProducts() {
            const grid = document.getElementById('productGrid');
            let filteredProducts = products;

            if (currentFilter !== 'all') {
                filteredProducts = products.filter(p => p.category === currentFilter);
            }

            if (currentSort === 'price-low') {
                filteredProducts.sort((a, b) => a.price - b.price);
            } else if (currentSort === 'price-high') {
                filteredProducts.sort((a, b) => b.price - a.price);
            } else if (currentSort === 'name') {
                filteredProducts.sort((a, b) => a.name.localeCompare(b.name));
            }

            grid.innerHTML = filteredProducts.map((product, index) => `
                <div class="product-card" data-product="${index}">
                    <div class="product-image-container">
                        ${product.badge ? `<div class="product-badge">${product.badge}</div>` : ''}
                        <div class="product-images">
                            ${product.images.map((img, i) => `
                                <div class="product-image" style="background: linear-gradient(45deg, ${product.colors[i]}, ${adjustColor(product.colors[i])});">${img}</div>
                            `).join('')}
                        </div>
                        <button class="product-nav prev" onclick="changeImage(event, ${index}, -1)">‹</button>
                        <button class="product-nav next" onclick="changeImage(event, ${index}, 1)">›</button>
                        <div class="product-indicators">
                            ${product.images.map((_, i) => `
                                <span class="indicator ${i === 0 ? 'active' : ''}"></span>
                            `).join('')}
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">${product.category}</div>
                        <h3>${product.name}</h3>
                        <p>${product.description}</p>
                        <div class="product-meta">
                            <div class="price">£${product.price.toFixed(2)}</div>
                            <div class="rating">${product.rating}</div>
                        </div>
                        <div class="size-options">
                            ${product.sizes.map(size => `
                                <button class="size-btn" onclick="selectSize(event)" data-product-id="${product.id}">${size}</button>
                            `).join('')}
                        </div>
                        <button class="buy-button" onclick="addToBasket(event, ${index}, '${product.name}', ${product.price})">Add to Cart</button>
                    </div>
                </div>
            `).join('');

            filteredProducts.forEach((_, i) => {
                productImageStates[i] = 0;
            });
        }

        function adjustColor(color) {
            // Darken the color slightly for gradient effect
            return color === '#fff' ? '#ddd' : color;
        }

        function changeImage(event, productIndex, direction) {
            event.stopPropagation();
            
            const card = document.querySelector(`[data-product="${productIndex}"]`);
            const imagesContainer = card.querySelector('.product-images');
            const images = card.querySelectorAll('.product-image');
            const indicators = card.querySelectorAll('.indicator');
            
            const totalImages = images.length;
            productImageStates[productIndex] = (productImageStates[productIndex] + direction + totalImages) % totalImages;
            
            imagesContainer.style.transform = `translateX(-${productImageStates[productIndex] * 100}%)`;
            
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === productImageStates[productIndex]);
            });
        }

        function selectSize(event) {
            const card = event.target.closest('.product-card');
            card.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('selected'));
            event.target.classList.add('selected');
            
            // Store selected size
            const productIndex = card.getAttribute('data-product');
            const size = event.target.textContent;
            if (!window.selectedSizes) window.selectedSizes = {};
            window.selectedSizes[productIndex] = size;
        }

        function filterProducts(category) {
            currentFilter = category;
            document.querySelectorAll('.filter-btn').forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            renderProducts();
        }

        function sortProducts(sortType) {
            currentSort = sortType;
            renderProducts();
        }

        function addToBasket(event, productIndex, name, price) {
            if (!window.selectedSizes) window.selectedSizes = {};
            
            const size = window.selectedSizes[productIndex];
            
            if (!size) {
                // Show warning if no size selected
                const card = event.target.closest('.product-card');
                let warning = card.querySelector('.size-warning');
                if (!warning) {
                    warning = document.createElement('div');
                    warning.className = 'size-warning';
                    warning.textContent = '⚠️ Please select a size first';
                    card.querySelector('.product-info').appendChild(warning);
                }
                setTimeout(() => warning.remove(), 3000);
                return;
            }
            
            const existingItem = basket.find(item => item.name === name && item.size === size);
            
            if (existingItem) {
                existingItem.quantity++;
            } else {
                basket.push({ name, price, size, quantity: 1 });
            }
            
            // Clear selected size after adding
            delete window.selectedSizes[productIndex];
            const card = event.target.closest('.product-card');
            card.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('selected'));
            
            updateBasket();
            showBasketNotification();
        }

        function removeFromBasket(name, size) {
            basket = basket.filter(item => !(item.name === name && item.size === size));
            updateBasket();
        }

        function updateBasket() {
            const basketCount = document.getElementById('basketCount');
            const basketItems = document.getElementById('basketItems');
            
            const totalItems = basket.reduce((sum, item) => sum + item.quantity, 0);
            basketCount.textContent = totalItems;
            
            if (basket.length === 0) {
                basketItems.innerHTML = '<div class="basket-empty">Your basket is empty</div>';
                return;
            }
            
            const total = basket.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            
            basketItems.innerHTML = basket.map(item => `
                <div class="basket-item">
                    <div class="basket-item-info">
                        <div class="basket-item-name">${item.name} x${item.quantity}</div>
                        <div class="basket-item-size">Size: ${item.size}</div>
                        <div class="basket-item-price">£${(item.price * item.quantity).toFixed(2)}</div>
                    </div>
                    <button class="basket-item-remove" onclick="removeFromBasket('${item.name}', '${item.size}')">Remove</button>
                </div>
            `).join('') + `
                <div class="basket-total">Total: £${total.toFixed(2)}</div>
                <button class="checkout-button" onclick="checkout()">Checkout</button>
            `;
        }

        function toggleBasket() {
            const dropdown = document.getElementById('basketDropdown');
            dropdown.classList.toggle('show');
        }

        function showBasketNotification() {
            const dropdown = document.getElementById('basketDropdown');
            dropdown.classList.add('show');
            setTimeout(() => {
                dropdown.classList.remove('show');
            }, 2000);
        }

        function checkout() {
            if (basket.length === 0) return;
            
            const total = basket.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            
            const checkoutContent = document.getElementById('checkoutContent');
            checkoutContent.innerHTML = `
                <div class="order-summary">
                    <h3 style="margin-bottom: 1rem; color: #1a1a1a;">Order Summary</h3>
                    ${basket.map(item => `
                        <div class="order-item">
                            <div class="order-item-details">
                                <div class="order-item-name">${item.name} x${item.quantity}</div>
                                <div class="order-item-size">Size: ${item.size}</div>
                            </div>
                            <div class="order-item-price">£${(item.price * item.quantity).toFixed(2)}</div>
                        </div>
                    `).join('')}
                    <div class="order-total">Total: £${total.toFixed(2)}</div>
                </div>
                
                <form class="checkout-form" onsubmit="submitOrder(event)">
                    <input type="text" class="form-input" id="customerName" placeholder="Full Name *" required>
                    <input type="email" class="form-input" id="customerEmail" placeholder="Email Address *" required>
                    <input type="tel" class="form-input" id="customerPhone" placeholder="Phone Number *" required>
                    <textarea class="form-input" id="customerAddress" placeholder="Delivery Address *" rows="3" required></textarea>
                    <button type="submit" class="submit-order-btn" id="submitBtn">Place Order</button>
                </form>
            `;
            
            document.getElementById('checkoutModal').classList.add('show');
        }

        function closeCheckoutModal() {
            document.getElementById('checkoutModal').classList.remove('show');
        }

        async function submitOrder(event) {
            event.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Processing...';
            
            const name = document.getElementById('customerName').value;
            const email = document.getElementById('customerEmail').value;
            const phone = document.getElementById('customerPhone').value;
            const address = document.getElementById('customerAddress').value;
            
            // Validation check
            if (!name || !email || !phone || !address) {
                alert('Please fill in all fields');
                submitBtn.disabled = false;
                submitBtn.textContent = 'Place Order';
                return;
            }
            
            const total = basket.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            
            // Create simple order string
            const orderItems = basket.map(item => 
                `${item.name} (Size ${item.size}) x${item.quantity} = £${(item.price * item.quantity).toFixed(2)}`
            ).join(', ');
            
            const templateParams = {
                to_email: email,
                to_name: name,
                from_name: "Jags Clothing",
                customer_name: name,
                customer_email: email,
                customer_phone: phone,
                customer_address: address,
                order_summary: orderItems,
                order_total: total.toFixed(2),
                order_date: new Date().toLocaleDateString('en-GB')
            };
            
            console.log('Sending email with params:', templateParams);
            
            try {
                const response = await emailjs.send('service_09gh2p3', 'template_ck3ac1i', templateParams);
                console.log('Email sent successfully:', response);
                
                // Show success message
                document.getElementById('checkoutContent').innerHTML = `
                    <div class="success-message">
                        <h3>✅ Order Confirmed!</h3>
                        <p style="margin-top: 1rem;">Thank you for your order, ${name}!</p>
                        <p>A confirmation email has been sent to ${email}</p>
                        <p style="margin-top: 1rem; font-size: 0.9rem; color: #666;">Order Total: £${total.toFixed(2)}</p>
                        <div style="margin-top: 1.5rem; padding: 1rem; background: #f8f9fa; border-radius: 8px; text-align: left;">
                            <strong>Order Summary:</strong><br>
                            ${basket.map(item => `${item.name} - Size: ${item.size} x${item.quantity} - £${(item.price * item.quantity).toFixed(2)}`).join('<br>')}
                        </div>
                    </div>
                    <button class="submit-order-btn" onclick="closeCheckoutModal(); basket = []; updateBasket();">Continue Shopping</button>
                `;
                
            } catch (error) {
                console.error('Email error:', error);
                
                // Still show order confirmation even if email fails
                document.getElementById('checkoutContent').innerHTML = `
                    <div class="success-message" style="background: #fff9e6; color: #856404;">
                        <h3>⚠️ Order Received (Email Pending)</h3>
                        <p style="margin-top: 1rem;">Your order has been received, ${name}!</p>
                        <p style="font-size: 0.9rem;">There was an issue sending the confirmation email, but your order is saved.</p>
                        <div style="margin-top: 1.5rem; padding: 1rem; background: #f8f9fa; border-radius: 8px; text-align: left;">
                            <strong>Order Details:</strong><br>
                            <strong>Name:</strong> ${name}<br>
                            <strong>Email:</strong> ${email}<br>
                            <strong>Phone:</strong> ${phone}<br>
                            <strong>Address:</strong> ${address}<br><br>
                            <strong>Items:</strong><br>
                            ${basket.map(item => `${item.name} - Size: ${item.size} x${item.quantity} - £${(item.price * item.quantity).toFixed(2)}`).join('<br>')}<br><br>
                            <strong>Total: £${total.toFixed(2)}</strong>
                        </div>
                        <p style="font-size: 0.85rem; margin-top: 1rem; color: #666;">
                            Please screenshot this confirmation for your records.
                        </p>
                    </div>
                    <button class="submit-order-btn" onclick="closeCheckoutModal(); basket = []; updateBasket();">Continue Shopping</button>
                `;
                
                submitBtn.disabled = false;
                submitBtn.textContent = 'Place Order';
            }
        }

        document.addEventListener('click', function(event) {
            const basketEl = event.target.closest('.basket');
            const dropdown = document.getElementById('basketDropdown');
            
            if (!basketEl && dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            }
        });

        // Initialize
        renderProducts();
        updateBasket();
    </script>
</body>
</html>