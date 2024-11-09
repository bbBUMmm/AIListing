<?php

namespace Framework;
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
    public function route($uri, $method)
    {
        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === $method){
//                Extract controller and controller method
                $controller = 'App\\Controllers\\'.$route['controller'];
                $controllerMethod = $route['controllerMethod'];

//                Initialize the controller and call the method
                $controllerInstance = new $controller();

                $controllerInstance->$controllerMethod();
                return;
            }
        }
        http_response_code(404);
        exit;
    }
}