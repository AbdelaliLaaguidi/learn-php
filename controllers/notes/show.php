<?php 

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config);
$currentUser = 1;

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOrFail();

if (!$note) abort();

authorize($note['user_id'] === $currentUser);

view('notes/show', [
  'heading' => 'Note',
  'note' => $note
]);
