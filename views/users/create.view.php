<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="/users/store">
                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                                <div class="mt-1">
                                    <input id="name" name="name" type="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= $_POST['name'] ?? '' ?>" placeholder="Enter the name">
                                    <?php if (isset($errors['name'])): ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['name'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= $_POST['email'] ?? '' ?>" placeholder="Enter the email">
                                    <?php if (isset($errors['email'])): ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['email'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                <div class="mt-1">
                                    <input id="password" name="password" type="password"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= $_POST['password'] ?? '' ?>" placeholder="Enter the password">
                                    <?php if (isset($errors['password'])): ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['password'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div>
                                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                                <div class="mt-1">
                                    <select id="role" name="role"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                        <option value="admin" <?= ($_POST['role'] ?? '') === 'admin' ? 'selected' : '' ?>>
                                            Admin</option>
                                        <option value="user" <?= ($_POST['role'] ?? '') === 'user' ? 'selected' : '' ?>>
                                            User</option>
                                    </select>
                                    <?php if (isset($errors['role'])): ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['role'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>