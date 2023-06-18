<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a href="/users" class="text-blue-500 underline">go back...</a>
        </p>

        <p>Username:
            <?= htmlspecialchars($user['username']) ?>
        </p>
        <p>Email:
            <?= htmlspecialchars($user['email']) ?>
        </p>
        <p>Password:
            <?= htmlspecialchars($user['password']) ?>
        </p>
        <p>Role:
            <?= htmlspecialchars($user['role']) ?>
        </p>

        <footer class="mt-6">
            <a href="/user/edit?id=<?= $user['id'] ?>"
                class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Edit</a>
        </footer>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>