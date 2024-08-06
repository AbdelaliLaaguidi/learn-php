<?php require basePath('views/partials/head.php') ?>
<?php require basePath('views/partials/nav.php') ?>
<?php require basePath('views/partials/banner.php') ?>

<main>
  <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
    <a href="/notes" class="text-blue-500 underline">Back to notes</a>
    <p><?= htmlspecialchars($note['body']) ?></p>
    <form method="POST">
      <input type="hidden" name="_method" value="DELETE">
      <input type="hidden" name="id" value="<?= $note['id'] ?>">
      <button type="submit" class="inline-block bg-red-700 text-white py-2 px-4 mt-6  ">Delete</button>
    </form>
  </div>
</main>

<?php require basePath('views/partials/footer.php') ?>
