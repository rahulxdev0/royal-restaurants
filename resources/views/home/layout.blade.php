<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }} | Tase Better</title>
    @vite('resources/css/app.css')
</head>

<body>

    @include('home.components.PublicHeader')
    @section('content')

    @show

</body>

</html>

<script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');

    menuToggle.addEventListener('click', () => {
        mobileMenu.style.display = mobileMenu.style.display === 'none' ? 'block' : 'none';
    });

    const quantities = '';

    // Initialize quantity
    function initializeQuantity(dishId) {
        const container = document.getElementById('quantity-container-' + dishId);
        quantities[dishId] = 1;

        // Replace "+" button with quantity controls
        container.innerHTML = `
      <button onclick="decrementQuantity('${dishId}')" class="text-xl">-</button>
      <span id="quantity-${dishId}" class="mx-2">1</span>
      <button onclick="incrementQuantity('${dishId}')" class="text-xl">+</button>
    `;
    }

    // Increment quantity
    function incrementQuantity(dishId) {
        const quantityElement = document.getElementById('quantity-' + dishId);
        let quantity = parseInt(quantityElement.innerText);
        quantityElement.innerText = ++quantity;
        quantities[dishId] = quantity;
    }

    // Decrement quantity
    function decrementQuantity(dishId) {
        const quantityElement = document.getElementById('quantity-' + dishId);
        let quantity = parseInt(quantityElement.innerText);
        if (quantity > 1) {
            quantityElement.innerText = --quantity;
            quantities[dishId] = quantity;
        } else {
            // Reset to initial state if quantity is 1
            const container = document.getElementById('quantity-container-' + dishId);
            container.innerHTML = `
        <button onclick="initializeQuantity('${dishId}')" class="text-xl">+</button>
      `;
            delete quantities[dishId];
        }
    }
</script>
