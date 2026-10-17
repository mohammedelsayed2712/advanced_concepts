<?php

declare (strict_types = 1);

namespace Tests\Unit;

use App\Exceptions\RouteNotFoundException;
use App\Router;
use PHPUnit\Framework\Attributes\DataProvider;
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
    private Router $router;
    // This method is called before each test method is executed.
    // You can use it to set up any common test data or configurations.
    protected function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }
    public function testRegisterRoute(): void
    {
        // 1. given that we have a router instance(object)
        // Prepare the objects, inputs, and conditions required for the test.
        // $router = new Router();

        // 2. when we call the register method with a request method, route, and action
        // Execute the behavior being tested.
        $this->router->register('get', '/users', ['Users', 'index']);

        // 3. then we assert that the route is registered in the router's routes array
        // Verify that the actual result matches your expectation.
        $expected = [
            'get' => [
                '/users' => ['Users', 'index'],
            ],
        ];

        $this->assertEquals($expected, $this->router->routes());

    }

    public function testGetMethod(): void
    {
        // 1. Arrange
        // $router = new Router();
        // 2. Act
        $this->router->get('/users', ['Users', 'index']);
        // 3. Assert
        $this->assertArrayHasKey('get', $this->router->routes());
    }

    public function testPostMethod(): void
    {
        // 1. Arrange
        $router = new Router();
        // 2. Act
        $router->post('/users', ['Users', 'store']);
        // 3. Assert
        $this->assertArrayHasKey('post', $router->routes());
    }

    /**
     * @test
     */
    public function there_is_no_route_registered_for_the_given_request_method_and_route(): void
    {
        // 1. Arrange
        // $router = new Router();
        // 2. Act & Assert
        $this->assertEmpty($this->router->routes());
    }

    /**
     * @test
     * @dataProvider routeNotFoundCases
     */
    public function it_throws_route_not_found_exception(
        string $requestUri,
        string $requestMethod
    ): void {
        $users = new class()
        {
            public function delete(): bool
            {
                return true;
            }
        };

        $this->router->post('users', [$users, 'store']);
        $this->router->get('users', ['Users', 'index']);

        $this->expectException(RouteNotFoundException::class);

        // 2. Act & Assert (Wnen & Then)
        $this->router->resolve($requestUri, $requestMethod);
    }

    public function routeNotFoundCases(): array
    {
        return [
            ['/users', 'put'],
            ['/users', 'delete'],
            ['/invoices', 'get'],
            ['users', 'get'],
            ['users', 'post'],
        ];
    }
}
