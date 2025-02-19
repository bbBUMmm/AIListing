<?php

namespace Framework;

use App\Controllers\ErrorController;
class RouterClass {
    protected array $routes = [];

    /**
     * Add a new route
     *
     * @param $method
     * @param $uri
     * @param $action
     * @return void
     */
    public function registerRoute($method, $uri, $action):void
    {
        list($controller, $controllerMethod) = explode('@', $action);

//        inspect($controller, true);
//        inspect($controllerMethod, true);
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
        ];
    }


    /**
     * Get route
     *
     * @param string $uri
     * @param $controller
     * @return void
     */
    public function get(string $uri, $controller):void
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    /**
     * Post route
     *
     * @param string $uri
     * @param $controller
     * @return void
     */
    public function post(string $uri, $controller):void
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    /**
     * Put route
     *
     * @param string $uri
     * @param $controller
     * @return void
     */
    public function put(string $uri, $controller):void
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    /**
     * Delete route
     *
     * @param string $uri
     * @param $controller
     * @return void
     */
    public function delete(string $uri, $controller):void
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }

    /**
     * Route the request
     *
     * @param $uri
     * @param $method
     * @return void
     */
    public function route($uri)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];

        // Check for _method input
        if ($requestMethod === 'POST' && isset($_POST['_method'])) {
            // Override the request method with the value of _method
            $requestMethod = strtoupper($_POST['_method']);
        }

        foreach ($this->routes as $route) {

            // Split the current URI into segments
            $uriSegments = explode('/', trim($uri, '/'));

            // Split the route URI into segments
            $routeSegments = explode('/', trim($route['uri'], '/'));

            $match = true;

            // Check if the number of segments matches
            if (count($uriSegments) === count($routeSegments) && strtoupper($route['method'] === $requestMethod)) {
                $params = [];

                $match = true;

                for ($i = 0; $i < count($uriSegments); $i++) {
                    if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)}/', $routeSegments[$i])) {
                        $match = false;
                        break;
                    }

                    if (preg_match('/\{(.+?)}/', $routeSegments[$i], $matches)) {
                        $params[$matches[1]] = $uriSegments[$i];
                    }
                }

                if ($match) {
//                    foreach ($route['middleware'] as $middleware) {
//                        (new Authorize())->handle($middleware);
//                    }

                    $controller = 'App\\controllers\\' . $route['controller'];
                    $controllerMethod = $route['controllerMethod'];

                    $controllerInstance = new $controller();
                    $controllerInstance->$controllerMethod($params);
                    return;
                }
            }
        }

        ErrorController::notFound();
    }
}