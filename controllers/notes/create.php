<?php 

use Core\Database;

require basePath('Core/Validator.php');

$config = require basePath('config.php');
$db = new Database($config);
$currentUser = 1;
$errors = [];

if ($_SERVER['REQUEST_METHOD']  === 'POST') {

  $body = trim($_POST['body']);

  if (! Validator::string($body, 1, 1000)) $errors = ['body' => 'The body can not be empty and can not exceeds 1000 character'];

  if (empty($errors)) {
    $note = $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
      'body' => $_POST['body'],
      'user_id' => $currentUser
    ]);
  }

}

view('notes/create', [
  'heading' => 'Create a Note',
  'errors' => $errors
]);
