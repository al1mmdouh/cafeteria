<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul>
            <?php foreach ($users as $user): ?>
                <li>
                    <a href="/user?id=<?= $user['id'] ?>" class="text-blue-500 hover:underline">
                        <?= htmlspecialchars($user['email']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-6">
            <a href="/users/create" class="text-blue-500 hover:underline">Create User</a>
        </p>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
