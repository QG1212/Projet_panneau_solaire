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
        if (!isset(self::$routes[$this->method][$this->uri])) {
            http_response_code(404);
            header('Content-Type: application/json');
            echo json_encode(["error" => "Route non trouvée"]);
            var_dump(self::$routes); // pour voir les routes enregistrées
            var_dump($this->method, $this->uri);
            return;
        }
        $callback = self::$routes[$this->method][$this->uri];
        call_user_func($callback);
    }
}
?>