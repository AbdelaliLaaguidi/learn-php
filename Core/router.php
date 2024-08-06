<?php 

namespace Core;
class Router {
  protected $routes = [];
  public function add($uri, $controller, $method) {
    return [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
    ];
  }
  public function get($uri, $controller) {
    $this->routes[] = $this->add($uri, $controller, 'GET');
  }
  public function post($uri, $controller) {
    $this->routes[] = $this->add($uri, $controller, 'POST');
  }
  public function delete($uri, $controller) {
    $this->routes[] = $this->add($uri, $controller, 'DELETE');
  }
  public function patch($uri, $controller) {
    $this->routes[] = $this->add($uri, $controller, 'PATCH');
  }
  public function put($uri, $controller) {
    $this->routes[] = $this->add($uri, $controller, 'PUT');
  }
  public function route($uri, $method) {
    foreach ($this->routes as $route) {
      if ($route['uri'] === $uri && $route['method'] === $method) {
        return require basePath($route['controller']);
      }
    }
    $this->abort();
  }
  protected function abort($code = 404) {
    http_response_code($code);
    require view($code);
  }
}
