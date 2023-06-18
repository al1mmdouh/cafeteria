<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($orders as $order): ?>
                <li>
                    <a href="/order?id=<?= $order['id'] ?>" class="text-blue-500 hover:underline">
                        Order ID: <?= $order['id'] ?> | Total Amount: $<?= $order['total_amount'] ?> | Order Date: <?= $order['order_date'] ?> | Status: <?= $order['status'] ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-6">
            <a href="/orders/create" class="text-blue-500 hover:underline">Create Order</a>
        </p>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>