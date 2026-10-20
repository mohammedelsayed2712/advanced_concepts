<?php


// class UserRepository
// {
//     public function __construct(
//         private string $database = 'default'
//     ) {}

//     public function connect(): string
//     {
//         return 'Database connected to ' . $this->database;
//     }
// }

// class UserService
// {
//     public function __construct(
//         private UserRepository $repository
//     ) {}

//     public function findUser(int $id): ?array
//     {
//         return ['id' => $id];
//     }
// }

// $servive = new UserService(
//     new UserRepository()
// );

// // var_dump($servive);
// echo $servive->findUser(10);

// class UserService
// {
//     public function findUser(int $id): string
//     {
//         return "User ID: {$id}";
//     }
// }

// $reflection = new ReflectionClass(UserService::class);

// echo $reflection->getName() . PHP_EOL . "<br>"; // create obj that describe class
// echo $reflection->getShortName() . PHP_EOL . "<br>";
// echo $reflection->getFileName() . PHP_EOL . "<br>";

// class UserRepository
// {
// }

// class UserService
// {
//     public function __construct(
//         private UserRepository $repository,
//         int $cacheTtl = 300,
//         string $cacheDriver = 'redis',
//     ) {
//     }
// }

// $reflection = new ReflectionClass(UserService::class);
// $constructor = $reflection->getConstructor();

// // if ($constructor !== null) {
// //     echo $constructor->getName().PHP_EOL . "<br>";
// // }

// // echo $reflection->getName() . PHP_EOL . "<br>";
// // var_dump($constructor);

// foreach ($constructor->getParameters() as $parameter) {
//     echo 'Name: ' . $parameter->getName() . PHP_EOL . "<br>";
//     echo 'Type: ' . $parameter->getType() . PHP_EOL . "<br>";
//     echo 'Optional: ' . ($parameter->isOptional() ? 'yes' : 'no') . PHP_EOL . "<br>";
//     echo '---' . PHP_EOL . "<br>";
// }

// class UserRepository
// {
// }

// class ReportService
// {
//     public function __construct(
//         UserRepository $repository,
//         string $format,
//         int $limit,
//     ) {
//     }
// }

// $reflection = new ReflectionClass(ReportService::class);
// $constructor = $reflection->getConstructor();

// foreach ($constructor->getParameters() as $parameter) {
//     $type = $parameter->getType();

//     if ($type === null) {
//         echo $parameter->getName() . ': no declared type' . PHP_EOL . "<br>";
//         continue;
//     }

//     if ($type instanceof ReflectionNamedType) {
//         echo $parameter->getName() . ': ';
//         echo $type->getName() . PHP_EOL . "<br>";

//         if ($type->isBuiltin()) {
//             echo "This is a built-in type." . PHP_EOL . "<br>";
//         } else {
//             echo "This is a class, interface, or other named type." . PHP_EOL . "<br>";
//         }
//     }
// }

// class UserRepository
// {
// }

//  class UserService
// {
//     public function __construct(
//         // private UserRepository $repository,
//         // protected string $format,
//         // public int $limit,

//         private string $name,
//     ) {
//     }

//     // public function findUser(int $id): string
//     // {
//     //     return "User ID: {$id}";
//     // }

//      public function name(): string
//     {
//         return $this->name;
//     }
// }

// $reflection = new ReflectionClass(UserService::class);

// $service = $reflection->newInstanceArgs(['Mohammed']);

// echo $service->name();

// foreach ($reflection->getMethods() as $method) {
//     echo $method->getName() . PHP_EOL . "<br>";
// }

// foreach ($reflection->getProperties() as $property) {
//     echo $property->getName() . PHP_EOL . "<br>";
//     echo $property->getType() . PHP_EOL . "<br>";
// }

// class Logger
// {
//     public function log(): string
//     {
//         return 'Logging...';
//     }
// }

// $reflection = new ReflectionClass(Logger::class);

// $logger = $reflection->newInstance();

// echo $logger->log();

// class DatabaseConnection
// {
//     public function connect(): string
//     {
//         return 'Database connected';
//     }
// }

// class UserRepository
// {
//     public function __construct(
//         private DatabaseConnection $database
//     ) {
//     }

//     public function find(int $id): string
//     {
//         return $this->database->connect()
//             . " | Finding user {$id}";
//     }
// }

// class UserService
// {
//     public function __construct(
//         private UserRepository $repository
//     ) {
//     }

//     public function findUser(int $id): string
//     {
//         return $this->repository->find($id);
//     }
// }

// $database = new DatabaseConnection();
// $repository = new UserRepository($database);
// $userService = new UserService($repository);

// echo $userService->findUser(1);

// class Container
// {
//     private array $factories = [];

//     public function bind(string $id, callable $factory): void
//     {
//         $this->factories[$id] = $factory; // This line stores the factory inside the array.
//     }

//     public function make(string $id): mixed
//     {
//         if (!isset($this->factories[$id])) {
//             throw new RuntimeException(
//                 "No factory registered for {$id}"
//             );
//         }

//         return ($this->factories[$id])($this);
//     }
// }

// now register factories
// $container = new Container();

// $container->bind(
//     DatabaseConnection::class,
//     fn (Container $container) => new DatabaseConnection()
// );

// $container->bind(
//     UserRepository::class,
//     fn (Container $c) => new UserRepository (
//         $c->make(DatabaseConnection::class)
//     )
// );

// $container->bind(
//     UserService::class,
//     fn(Container $c) => new UserService (
//         $c->make(UserRepository::class)
//     )
// );

// $service = $container->make(UserService::class);

// $UnknownService = $container->make('UnknownService');
// // echo $UnknownService  . "<br>";
// var_dump($UnknownService);

// $service1 = $container->make(UserService::class);
// $service2 = $container->make(UserService::class);
// var_dump($service1);
// echo "<br>";
// var_dump($service2);
// echo "<br>";

// // echo $service->findUser(123);
// var_dump($service1 === $service2);

// class container
// {
//     private array $instances = [];

//     public function singleton(
//         string $id,
//         callable $factory
//     ): void {
//         $this->factories[$id] = function (Container $container) use ($id, $factory) {
//             if (!array_key_exists($id, $container->instances)) {
//                 $container->instances[$id] = $factory($container);
//             }

//             return $container->instances[$id];
//         };
//     }
// }

// class EmailSender
// {
//     public function send(string $message): void
//     {
//         echo "Sending email: {$message}";
//     }
// }

// class OrderService
// {
//     private EmailSender $sender;

//     public function __construct()
//     {
//         $this->sender = new EmailSender();
//     }

//     public function placeOrder(): void
//     {
//         $this->sender->send('Your order has been placed.');
//     }
// }

// $orderService = new OrderService();
// $orderService->placeOrder();

// function getNumbers(): array
// {
//     $numbers = [];

//     for($i = 1;  $i <= 1000000; $i++) {
//         $numbers[] = $i;
//     }

//     return $numbers;
// }
// $numbers = getNumbers();
// foreach ($numbers as $number) {
//     echo $number . PHP_EOL;
// }

// function getNumbers(): Generator
// {
//     yield 1;
//     yield 2;
//     yield 3;
// }

// echo getNumbers()->current() . PHP_EOL;
// echo getNumbers()->next() . PHP_EOL;
// echo getNumbers()->current() . PHP_EOL;

// foreach (getNumbers() as $number) {
//     echo $number . PHP_EOL;
// }

// function getValue(): int
// {
//     return 10;
// }

// echo getValue();

// echo $value;

// function generateNumbers(): Generator
// {
//     echo "Start" . "<br>";

//     yield 1;

//     echo "After first yield\n". "<br>";

//     yield 2;

//     echo "After second yield\n". "<br>";

//     yield 3;

//     echo "Finished\n". "<br>";
// }

// echo "Before calling function". "<br>";
// $generator = generateNumbers();

// foreach ($generator as $number) {
//     echo "Number: {$number}" . "<br>";
// }
// echo "After calling function\n";


// function test(): Generator
// {
//     echo "Function started\n". "<br>";

//     yield 100;

//     echo "Function resumed\n". "<br>";

//     yield 200;
// }

// $generator = test();

// echo "Generator created\n". "<br>";

// echo $generator->current() . "<br>"; // Starts execution; 100

// echo $generator->key() . "<br>";

// $generator->next();                // Resumes execution

// echo $generator->current() . "<br>"; // 200

// function generateNumbers(): Generator
// {
//     yield 10;
//     yield 20;
//     yield 30;
// }

// $numbers = iterator_to_array(generateNumbers());

// print_r($numbers);

// function getUsers(): Generator
// {
//     yield [
//         'id' => 1,
//         'name' => 'Ahmed',
//     ];

//     yield [
//         'id' => 2,
//         'name' => 'Sara',
//     ];

//     yield [
//         'id' => 3,
//         'name' => 'Ali',
//     ];
// }

// function numbersArray(int $limit): array
// {
//     $numbers = [];

//     for ($i = 1; $i <= $limit; $i++) {
//         $numbers[] = $i;
//     }

//     return $numbers;
// }

// function getNumbers(): Generator
// {
//     yield 1;
//     yield 2;
//     yield 3;
// }

// function getAllNumbers(): Generator
// {
//     yield from getNumbers();

//     yield 4;
//     yield 5;
// }

// foreach (getAllNumbers() as $number) {
//     echo $number . "<br>";
// }

// function calculate(): Generator
// {
//     yield 10;
//     yield 20;

//     return 999;
// }

// $generator = calculate();

// foreach ($generator as $value) {
//     echo $value . PHP_EOL;
// }

// echo 'Final result: ' . $generator->getReturn();


// function receiver(): Generator
// {
//     $value = yield 'Ready';

//     yield 'Received: ' . $value;
// }

// $generator = receiver();

// echo $generator->current() . PHP_EOL;

// echo $generator->send('Hello') . PHP_EOL;

// function process(): Generator
// {
//     try {
//         yield 'Processing';

//         yield 'Still processing';
//     } catch (RuntimeException $exception) {
//         yield 'Handled: ' . $exception->getMessage();
//     }
// }

// $generator = process();

// echo $generator->current() . "<br>";
// echo $generator->next();
// echo $generator->current() . "<br>";

// echo $generator
//     ->throw(new RuntimeException('Something went wrong'))
//     . PHP_EOL;

// function getNumbers(): array
// {
//     $numbers = [];

//     for($i = 1;  $i <= 1000000; $i++) {
//         $numbers[] = $i;
//     }

//     return $numbers;
// }
// $numbers = getNumbers();
// foreach ($numbers as $number) {
//     echo $number . PHP_EOL;
// }

// function getNumbers(): Generator
// {
//     for($i = 1;  $i <= 10; $i++) {
//         yield $i;
//     }
// }

// $numbers = getNumbers();

// foreach ($numbers as $number) {
//     echo $number . PHP_EOL;
// }

// function getUserDetails(): Generator
// {
//     yield "name" => "Mohammed";
//     yield "email" => "oBq6a@example.com";
//     yield "role" => "Backend Developer";
//     // yield [
// //         "name" => "Mohammed",
// //         "email" => "oBq6a@example.com",
// //         "role" => "Backend Developer",
// //     ];
// }

// $details = getUserDetails();

// foreach ($details as $key => $value) {
//     echo $key . ": " . $value . "<br>";
// }

function getEvenNumbers($limit): Generator
{
    for($i = 1;  $i <= $limit; $i++) {
        if ($i % 2 === 0) {
            yield $i;
        }
    }
}

$numbers = getEvenNumbers(100);

foreach ($numbers as $number) {
    echo $number . PHP_EOL;
}