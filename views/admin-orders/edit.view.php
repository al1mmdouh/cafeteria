<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="/admin-order">
                    <input type="hidden" name="_method" value="PATCH">
                    <input type="hidden" name="id" value="<?= $order['id'] ?>">

                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <label for="total_amount" class="block text-sm font-medium text-gray-700">Total
                                    Amount</label>
                                <div class="mt-1">
                                    <input id="total_amount" name="total_amount" type="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= $order['total_amount'] ?>" placeholder="Enter the total amount">
                                    <?php if (isset($errors['total_amount'])): ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['total_amount'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                                <div class="mt-1">
                                    <select id="status" name="status"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="processing"
                                            <?= $order['status'] === 'processing' ? 'selected' : '' ?>>Processing</option>
                                        <option value="out_for_delivery"
                                            <?= $order['status'] === 'out_for_delivery' ? 'selected' : '' ?>>Out for
                                            Delivery</option>
                                        <option value="done" <?= $order['status'] === 'done' ? 'selected' : '' ?>>Done
                                        </option>
                                    </select>
                                    <?php if (isset($errors['status'])): ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['status'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div>
                                <label for="user" class="block text-sm font-medium text-gray-700">User</label>
                                <div class="mt-1">
                                    <input id="user" type="text" readonly
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= $user['email'] ?>">
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end items-center">
                            <button type="button" class="text-red-500 mr-auto"
                                onclick="document.querySelector('#delete-form').submit()">Delete</button>

                            <a href="/orders"
                                class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</a>

                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update</button>
                        </div>
                    </div>
                </form>

                <form id="delete-form" class="hidden" method="POST" action="/admin-order">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="<?= $order['id'] ?>">
                </form>
            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>
