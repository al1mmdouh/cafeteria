<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php if (count($orders) > 0): ?>
            <ul>
                <?php
                $totalAmount = 0; // Variable to store the total amount
                foreach ($orders as $order):
                    $totalAmount += $order['total_amount']; // Add the total amount of each order to the total
                    ?>
                    <li>
                        <a href="/check?id=<?= $order['id'] ?>" class="text-blue-500 hover:underline">
                            Order ID: <?= $order['id'] ?> | Total Amount: <?= $order['total_amount'] ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <p>Total Amount of All Orders:
                <?= $totalAmount ?>
            </p> <!-- Display the total amount -->
        <?php else: ?>
            <p>No orders with 'done' status found.</p>
        <?php endif; ?>

    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>