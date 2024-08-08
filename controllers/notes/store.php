<?php

use Core\Database;
use Core\App;

require basePath('Core/Validator.php');

$db = App::resolve(Database::class);

$currentUser = 1;

$body = trim($_POST['body']);

if (!Validator::string($body, 1, 1000)) {
  $errors = ['body' => 'The body can not be empty and can not exceeds 1000 character'];
}

if (empty($errors)) {
  $note = $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => $currentUser
  ]);
}

header('Location: /notes');
exit();

