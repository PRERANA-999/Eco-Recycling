<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Waste Collection and Recycling</title>
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <header>
    <h1>Waste Collection and Recycling</h1>
  </header>

  <nav>
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#products">Products</a></li>
      <li><a href="#services">Services</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
  </nav>

  <section id="home">
    <h2>Welcome to our Waste Collection and Recycling Website!</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae nunc velit. Ut id posuere nunc.
      Curabitur vestibulum leo a est vestibulum, at ultrices sapien commodo.</p>
  </section>

  <section id="products">
    <h2>Our Products</h2>
    <div class="product">
      <img src="product1.jpg" alt="Product 1">
      <h3>Product 1</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <button class="buy-button" onclick="addToCart('Product 1')">Add to Cart</button>
      <p>Price: $10</p>
    </div>

    <div class="product">
      <img src="product2.jpg" alt="Product 2">
      <h3>Product 2</h3>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      <button class="buy-button" onclick="addToCart('Product 2')">Add to Cart</button>
      <p>Price: $15</p>
    </div>

    <!-- Add more product elements as needed -->
  </section>

  <section id="services">
    <h2>Our Services</h2>
    <ul>
      <li>Waste Collection</li>
      <li>Recycling Consultation</li>
      <li>Delivery and Pickup</li>
      <!-- Add more services as needed -->
    </ul>
  </section>

  <section id="contact">
    <h2>Contact Us</h2>
    <form>
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea>

      <button type="submit">Send Message</button>
    </form>
  </section>

  <footer>
    <p>&copy; 2023 Waste Collection and Recycling</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>
