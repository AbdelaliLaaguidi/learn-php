<?php 

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config);
$currentUser = 1;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $note = $db->query('select * from notes where id = :id', ['id' => $_POST['id']])->findOrFail();
  
  if (!$note) abort();
  authorize($note['user_id'] === $currentUser);

  $db->query('delete from notes where id = :id', ['id' => $_POST['id']]);
  header('Location: /notes' );
  exit();
} else {
  $note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOrFail();
  
  if (!$note) abort();
  authorize($note['user_id'] === $currentUser);
  
  view('notes/show', [
    'heading' => 'Note',
    'note' => $note
  ]);
}


