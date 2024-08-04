<?php 

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config);

$notes = $db->query('select * from notes where user_id = 1')->get();

view('notes/index', [
  'heading' => 'Notes',
  'notes' => $notes
]);
