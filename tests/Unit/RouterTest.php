<?php

declare (strict_types = 1);

namespace Tests\Unit;

use App\Router;
use PHPUnit\Framework\TestCase;

/**
 * two principles of unit testing:
 * 1. Isolation: Each test should be independent and not rely on the state of other tests. This ensures that tests can be run in any order and still produce consistent results.
 * 2. Simplicity: Tests should be simple and easy to understand, and should not have complex dependencies or side effects.
 *
 * Given, When, Then
 * Arange, Act, Assert (AAA)
 */
class RouterTest extends TestCase
{
    public function testRegisterRoute(): void
    {
        // 1. given that we have a router instance(object)
        // Prepare the objects, inputs, and conditions required for the test.
        $router = new Router();

        // 2. when we call the register method with a request method, route, and action
        // Execute the behavior being tested.
        $router->register('get', '/users', ['Users', 'index']);

        // 3. then we assert that the route is registered in the router's routes array
        // Verify that the actual result matches your expectation.
        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ],
        ];

        $this->assertEquals($expected, $router->routes());

    }

}
