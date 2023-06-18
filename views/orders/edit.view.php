<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <div class="shadow sm:overflow-hidden sm:rounded-md">
                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                        <div>
                            <label for="total_amount" class="block text-sm font-medium text-gray-700">Total
                                Amount</label>
                            <div class="mt-1">
                                <input id="total_amount" name="total_amount" type="text"
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 cursor-not-allowed opacity-50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="<?= $order['total_amount'] ?>" placeholder="Enter the total amount" readonly>
                            </div>
                        </div>

                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                            <div class="mt-1">
                                <input id="status" name="status" type="text"
                                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 cursor-not-allowed opacity-50 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="<?= $order['status'] ?>" placeholder="Enter the status" readonly>
                            </div>
                        </div>
                    </div>

                    <?php if ($role === 'admin'): ?>
                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <form id="delete-form" method="POST" action="/order">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="id" value="<?= $order['id'] ?>">
                                <button type="submit"
                                    class="inline-flex justify-center rounded-md border border-transparent bg-red-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Delete</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>