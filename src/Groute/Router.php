<?php
namespace Groute;

class Router {
    
    const STRATEGY_NONE = 'none';
    const STRATEGY_CRUD = 'crud';
    const STRATEGY_REST = 'rest';
    
    private $routes = [];
    
    public function __construct($routes = [])
    {
        if (!empty($routes))
        {
            $this->routes = $routes;
            $this->expandRoutes();
        }
    }
    
    public function getRoutes()
    {
        return $this->routes;
    }
    
    protected function expandRoutes()
    {
        return $this->routes;
    }
    
    public function handleRoute($route)
    {
        $route = explode('/', $route);
        return $route;
    }
}