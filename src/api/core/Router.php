<?php
class Router {
    private $method;
    private $uri;
    private static $routes = [];

    public function __construct($method, $uri) {
        $this->method = $method;
        $this->uri = parse_url($uri, PHP_URL_PATH);
    }

    public static function add($method, $route, $handler) {
        self::$routes[$method][$route] = $handler;
    }

    public function resolve() {
        $callback = self::$routes[$this->method][$this->uri];

        if (!$callback) {
            http_response_code(404);
            echo json_encode(["error" => "Route non trouvée"]);
            return;
        }

        call_user_func($callback);
    }
}
?>