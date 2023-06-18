<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="/product">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">

                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <div class="mt-1">
                                    <input id="name" name="name" type="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= $product['name'] ?>" placeholder="Enter the product name">
                                    <?php if (isset($errors['name'])): ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['name'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                                <div class="mt-1">
                                    <input id="price" name="price" type="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= $product['price'] ?>" placeholder="Enter the product price">
                                    <?php if (isset($errors['price'])): ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['price'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700">Category
                                    ID</label>
                                <div class="mt-1">
                                    <select id="category_id" name="category_id"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="1" <?= $product['category_id'] == 1 ? 'selected' : '' ?>>1</option>
                                        <option value="2" <?= $product['category_id'] == 2 ? 'selected' : '' ?>>2</option>
                                    </select>
                                    <?php if (isset($errors['category_id'])): ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['category_id'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end items-center">
                            <button type="button" class="text-red-500 mr-auto"
                                onclick="document.querySelector('#delete-form').submit()">Delete</button>

                            <a href="/products"
                                class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</a>

                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update</button>
                        </div>
                    </div>
                </form>

                <form id="delete-form" class="hidden" method="POST" action="/product">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                </form>
            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>