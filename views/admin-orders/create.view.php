<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main class="container mx-auto py-6 px-4">

    <div class="flex">
        <div class="w-1/2 bg-white rounded-lg shadow-lg p-6 mr-6">
            <h2 class="text-3xl font-bold mb-4">Products</h2>
            <ul class=" pl-6">
                <?php foreach ($products as $product): ?>
                    <li class="text-lg text-gray-800">
                        <a href="?product=<?= $product['id'] ?>" class="text-blue-500 hover:underline">
                            <?= $product['name'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="w-1/2 bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-3xl font-bold mb-4">Cart</h2>
            <form action="/admin-orders" method="POST">
                <div class="mb-4">
                    <label for="user" class="text-lg font-bold">Select User:</label>
                    <select name="user_email" id="user"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                        <?php foreach ($users as $user): ?>
                            <option value="<?= $user['email'] ?>"><?= $user['email'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <ul class=" pl-6">
                    <?php
                    if (isset($_GET['product'])) {
                        $selectedProductId = $_GET['product'];

                        // Initialize the cart array if it doesn't exist
                        if (!isset($_SESSION['cart'])) {
                            $_SESSION['cart'] = [];
                        }

                        // Check if the selected product is already in the cart
                        $productIndex = null;
                        foreach ($_SESSION['cart'] as $index => $cartProduct) {
                            if ($cartProduct['id'] == $selectedProductId) {
                                $productIndex = $index;
                                break;
                            }
                        }

                        // If the product is not in the cart, add it with quantity 1
                        if ($productIndex === null) {
                            $selectedProduct = null;
                            foreach ($products as $product) {
                                if ($product['id'] == $selectedProductId) {
                                    $selectedProduct = $product;
                                    break;
                                }
                            }

                            if ($selectedProduct) {
                                $quantity                    = 1;
                                $selectedProductWithQuantity = array_merge($selectedProduct, ['quantity' => $quantity]);
                                $_SESSION['cart'][]          = $selectedProductWithQuantity;
                            }
                        } else {
                            // If the product is already in the cart, increment its quantity
                            $_SESSION['cart'][$productIndex]['quantity']++;
                        }
                    }

                    // Remove a product from the cart
                    if (isset($_GET['remove'])) {
                        $productIdToRemove = $_GET['remove'];

                        foreach ($_SESSION['cart'] as $index => $cartProduct) {
                            if ($cartProduct['id'] == $productIdToRemove) {
                                unset($_SESSION['cart'][$index]);
                                break;
                            }
                        }
                    }

                    // Increase the quantity of a product in the cart
                    if (isset($_GET['increase'])) {
                        $productIdToIncrease = $_GET['increase'];

                        foreach ($_SESSION['cart'] as $index => $cartProduct) {
                            if ($cartProduct['id'] == $productIdToIncrease) {
                                $_SESSION['cart'][$index]['quantity']++;
                                break;
                            }
                        }
                    }

                    // Decrease the quantity of a product in the cart
                    if (isset($_GET['decrease'])) {
                        $productIdToDecrease = $_GET['decrease'];

                        foreach ($_SESSION['cart'] as $index => $cartProduct) {
                            if ($cartProduct['id'] == $productIdToDecrease) {
                                if ($_SESSION['cart'][$index]['quantity'] > 1) {
                                    $_SESSION['cart'][$index]['quantity']--;
                                } else {
                                    // If the quantity reaches 1, remove the product from the cart
                                    unset($_SESSION['cart'][$index]);
                                }
                                break;
                            }
                        }
                    }

                    // Display the products in the cart
                    $totalPrice = 0;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $cartProduct) {
                            $totalPrice += $cartProduct['quantity'] * $cartProduct['price'];
                            echo '<li class="text-lg text-gray-800">';
                            echo $cartProduct['name'] . ' - $' . $cartProduct['price'] . ' - Quantity: ' . $cartProduct['quantity'];
                            echo ' - Total Price: $' . ($cartProduct['quantity'] * $cartProduct['price']);
                            echo ' <a href="?remove=' . $cartProduct['id'] . '" class="text-red-500 hover:underline">Remove</a>';
                            echo ' <a href="?increase=' . $cartProduct['id'] . '" class="text-blue-500 hover:underline">+</a>';
                            echo ' <a href="?decrease=' . $cartProduct['id'] . '" class="text-blue-500 hover:underline">-</a>';
                            echo '</li>';
                        }
                    }

                    // Display the total price
                    echo '<li class="text-lg text-gray-800 font-bold mt-4">Total Price: $' . $totalPrice . '</li>';

                    // Include the total_amount field
                    echo '<li class="text-lg text-gray-800 font-bold mt-4">';
                    echo '<input type="hidden" name="total_amount" value="' . $totalPrice . '">';
                    echo '</li>';
                    ?>

                    <li class="text-lg text-gray-800 font-bold mt-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                            Place Order
                        </button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>