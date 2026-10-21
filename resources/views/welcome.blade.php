<?php

// class User
// {
//     public function __construct(
//         public string $name
//     ) {}
// }

// $user = new User('John Doe');

// $data = new WeakMap();

// $data[$user] = 'foo';
// // $data[$user] = [
// //     'foo' => 'bar',
// //     'baz' => 'qux'
// // ];

// print_r($data[$user]);
// // print_r($user);


// class Product
// {
//     public function __construct(
//         public string $name,
//         public float $price,
//     ) {}
// }

// $product = new Product('Laptop', 1000);

// $cache = new WeakMap();

// // Add an entry.
// $cache[$product] = [
//     'discount' => 10,
//      'calculated' => true,
// ];

// // Read an entry.
// var_dump($cache[$product]);

// // Check whether the key exists.
// var_dump(isset($cache[$product])); // true

// // Number of entries.
// var_dump(count($cache)); // 1

// // Remove an entry manually.
// unset($cache[$product]);

// var_dump(count($cache)); // 0

class User
{
    public function __construct(
        public string $name
    ) {}
}

$user1 = new User('Mohammed');
$user2 = new User('Ahmed');

$storage = new SplObjectStorage();

// Add objects
$storage->attach($user1);
$storage->attach($user2);

// Check whether objects exist
var_dump($storage->contains($user1)); // true
var_dump($storage->contains($user2)); // true

echo $storage->count(); // 2


// Remove an object
$storage->detach($user1);

var_dump($storage->contains($user1)); // false
var_dump($storage->contains($user2)); // true

echo $storage->count(); // 1