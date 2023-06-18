<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:col-span-2 md:mt-0">
                <form method="POST" action="/users/<?= $user['id'] ?>">
                    <input type="hidden" name="_method" value="PUT">

                    <div class="shadow sm:overflow-hidden sm:rounded-md">
                        <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                            <div>
                                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                                <div class="mt-1">
                                    <input id="username" username="username" type="text"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= $user['username'] ?>" placeholder="Enter the user username">
                                    <?php if (isset($errors['username'])): ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['username'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <div class="mt-1">
                                    <input id="email" name="email" type="email"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        value="<?= $user['email'] ?>" placeholder="Enter the user email">
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
                                        value="" placeholder="Enter the user password">
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
                                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin
                                        </option>
                                        <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User
                                        </option>
                                    </select>
                                    <?php if (isset($errors['role'])): ?>
                                        <p class="text-red-500 text-xs mt-2">
                                            <?= $errors['role'] ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="bg-gray-50 px-4 py-3 text-right sm:px-6 flex gap-x-4 justify-end items-center">
                            <button type="button" class="text-red-500 mr-auto"
                                onclick="document.querySelector('#delete-form').submit()">Delete</button>

                            <a href="/users"
                                class="inline-flex justify-center rounded-md border border-transparent bg-gray-500 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Cancel</a>

                            <button type="submit"
                                class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Update</button>
                        </div>
                    </div>
                </form>

                <form id="delete-form" class="hidden" method="POST" action="/users/<?= $user['id'] ?>">
                    <input type="hidden" name="_method" value="DELETE">
                </form>
            </div>
        </div>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>