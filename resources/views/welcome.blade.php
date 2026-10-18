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

class DatabaseConnection
{
    public function connect(): string
    {
        return 'Database connected';
    }
}

class UserRepository
{
    public function __construct(
        private DatabaseConnection $database
    ) {
    }

    public function find(int $id): string
    {
        return $this->database->connect()
            . " | Finding user {$id}";
    }
}

class UserService
{
    public function __construct(
        private UserRepository $repository
    ) {
    }

    public function findUser(int $id): string
    {
        return $this->repository->find($id);
    }
}

$database = new DatabaseConnection();
$repository = new UserRepository($database);
$userService = new UserService($repository);

echo $userService->findUser(1);