<?php require base_path('/src/views/partials/head.php') ?>
<?php require base_path('/src/views/partials/nav.php') ?>
<?php require base_path('/src/views/partials/banner.php') ?>
<?php /** @var array $notes */ ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <ul class="list-none">
            <?php foreach ($notes as $note) : ?>
                <li>
                    <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                        <?= htmlspecialchars($note['body']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <p class="mt-6">
            <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
        </p>
    </div>
</main>

<?php require base_path('/src/views/partials/footer.php') ?>