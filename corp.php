
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>


// Define an array to store the selected products
var cartItems = [];

// Function to handle the "Add to Cart" button click
function addToCart(productId) {
  // Find the product by its ID
  var product = catalogData.find(function(item) {
    return item.id === productId;
  });

  // Check if the product is already in the cart
  var existingProduct = cartItems.find(function(item) {
    return item.id === productId;
  });

  if (existingProduct) {
    // Increase the quantity if the product is already in the cart
    existingProduct.quantity++;
  } else {
    // Add the product to the cart with an initial quantity of 1
    cartItems.push({ id: product.id, name: product.name, quantity: 1 });
  }

  // Update the cart quantity display
  var cartQuantitySpan = document.getElementById("cart-quantity");
  cartQuantitySpan.textContent = getCartTotalQuantity();
}

// Function to calculate the total quantity of items in the cart
function getCartTotalQuantity() {
  var totalQuantity = 0;
  cartItems.forEach(function(item) {
    totalQuantity += item.quantity;
  });
  return totalQuantity;
}

?>