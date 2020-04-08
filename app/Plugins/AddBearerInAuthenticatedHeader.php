<?php

namespace App\Plugins;


use Illuminate\Routing\Route;
use Mpociot\ApiDoc\Extracting\Strategies\Strategy;
use ReflectionClass;
use ReflectionMethod;

class AddBearerInAuthenticatedHeader extends Strategy
{

    /**
     * @param Route $route
     * @param ReflectionClass $controller
     * @param ReflectionMethod $method
     * @param array $routeRules Array of rules for the ruleset which this route belongs to.
     * @param array $context Results from the previous stages
     *
     * @throws \Exception
     *
     * @return array
     */
    public function __invoke(Route $route, ReflectionClass $controller, ReflectionMethod $method, array $routeRules, array $context = [])
    {
        if ($context['metadata']['authenticated']) {
            return [
                'Authorization' => "Bearer {token}"
            ];
        }
    }
}