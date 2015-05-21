<?php

namespace App;

/**
 * Class Helpers
 *
 * @package App
 */
class Helpers {

    /**
     * Get route info - module / controller / action names.
     *
     */
    public function getRouteInfo()
    {
        $route = \Route::current()->getAction();

        $temp = snake_case(class_basename($route['controller']));

        return [
            'module' => ($route['prefix']) ? str_replace('/', '', $route['prefix']) : 'index',
            'controller' => substr($temp, 0, strpos($temp, '_controller@')),
            'action' => substr($temp, strpos($temp, '@') + 1)
        ];
    }

    /**
     * Get route action by route name.
     *
     * @param $routeName
     *
     * @return bool
     */
    public function getActionByRoute($routeName)
    {
        $routes = \Route::getRoutes();

        foreach ($routes as $route) {
            if ($route->getName() == $routeName) {
                return $route->getActionName();
            }
        }

        return false;
    }

    /**
     * Get application controllers list.
     *
     * @return array
     */
    public function getControllersList()
    {
        $loader = require base_path('vendor/autoload.php');

        $temp = [];
        foreach($loader->getClassMap() as $class => $file) {
            if (preg_match('/[a-z]+Controller$/', $class)) {
                $reflection = new \ReflectionClass($class);

                foreach ($reflection->getMethods() as $method) {
                    if ($method->name == '__construct') {
                        continue;
                    }

                    if ($method->class == $reflection->getName()) {
                        $temp[] = $class . '@' . $method->name;
                    }
                }
            }
        }

        return $temp;
    }

}
