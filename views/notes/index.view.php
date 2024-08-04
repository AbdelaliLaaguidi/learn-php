<?php require basePath('views/partials/head.php') ?>
<?php require basePath('views/partials/nav.php') ?>
<?php require basePath('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <h2 class="text-xl mb-6">Welcome to the Notes page</h2>
    <ul>
      <?php foreach ($notes as $note) : ?>
        <li class="text-blue-500 underline">
          <a href="note?id=<?= $note['id'] ?>">
            <?= htmlspecialchars($note['body']) ?>
          </a>
        </li>
      <?php endforeach ?>
    </ul>
    <p class="mt-6">
      <a href="/notes/create" class="inline-block bg-gray-700 text-white py-2 px-4">Create a note</a>
    </p>
  </div>
</main>

<?php require basePath('views/partials/footer.php') ?>
