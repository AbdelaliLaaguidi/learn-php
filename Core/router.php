<?php 

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

function routeToController($route, $routes) {
  if (array_key_exists($route, $routes)) {
    require  basePath($routes[$route]);
  } else {
    abort();
  }
}

function abort($code = 404) {
  http_response_code($code);
  require view($code);
}

routeToController($uri, $routes);
