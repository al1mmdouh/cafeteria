<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($orders as $order): ?>
                <?php
                // Check if the user exists in the user map
                $user = isset($userMap[$order['user_id']]) ? $userMap[$order['user_id']] : null;
                ?>

                <li>
                    <a href="/admin-order?id=<?= $order['id'] ?>" class="text-blue-500 hover:underline">
                        Order ID: <?= $order['id'] ?> | Total Amount: $<?= $order['total_amount'] ?> | Order Date: <?= $order['order_date'] ?> | Status: <?= $order['status'] ?> | User Email: <?= $user ? $user['email'] : '' ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-6">
            <a href="/admin-orders/create" class="text-blue-500 hover:underline">Create Order</a>
        </p>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>