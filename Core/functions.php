<?php 

function dd($value) {
  echo '<pre>';
  var_dump($value);
  echo '</pre>';
  die();
}

function urlIs($value) {
  return $_SERVER['REQUEST_URI'] === $value;
}

function authorize($condition, $status = 403) {
  if (!$condition) abort($status);
}

function basePath($path) {
  return BASE_PATH . $path;
}

function view($path, $attributes = []) {
  extract($attributes);
  require BASE_PATH . "views/{$path}.view.php";
}

function abort($code = 404) {
  http_response_code($code);
  require view($code);
}
