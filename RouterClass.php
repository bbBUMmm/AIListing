<?php

class RouterClass {
    protected array $routes = [];

    public function registerRoute($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
        ];

    }

//    get route
    public function get(string $uri, $controller):void
    {
        $this->registerRoute('GET', $uri, $controller);
    }

//    post route
    public function post(string $uri, $controller):void
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    public function put(string $uri, $controller):void
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    public function delete(string $uri, $controller):void
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }
//    route the request
    public function route($uri, $method){
        foreach($this->routes as $route){
            if($route['uri'] === $uri && $route['method'] === $method){
                require getBasePath($route['controller']);
                return;
            }
        }
        http_response_code(404);
        exit;
    }
}