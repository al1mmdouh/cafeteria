<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main class="container mx-auto py-6 px-4">
    <p class="text-center text-gray-600 mb-4">
        Hello,
        <?= $_SESSION['user']['email'] ?? 'Guest' ?>. Welcome to the home page.
    </p>

    <div class="flex justify-center">
        <a href="/orders"
            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Order
        </a>
    </div>
</main>

<?php require('partials/footer.php') ?>